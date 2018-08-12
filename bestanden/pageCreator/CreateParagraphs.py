from tkinter import *
from tkinter import ttk
from tkinter import filedialog
from tkinter import messagebox
import os
import codecs
import PyPDF2
import docx2txt
import re

testbestand = """TESTBESTAND

Div1 kjaskdjfiudhgjnkcvdnbk djskj ij g ijg jkdfnbdiiji jj iikdafnbn ojedfkj giqw34
Akdjfkjasdf

Div2 aksjdfkj sadfkjg sdkjiew kvckjeri cdkj sdkeridk erkire

Div3 kajkdjfkjakdjgsdghijskdg

Div 4 www.link.com

Div5
Table Left	Table Right
Table Left 2	Table Right 2
Table Left 3	Table Right 3
"""

def setUp():
    global root
    root.title("Page creator")
    
    global mainframe 
    mainframe = ttk.Frame(root, padding="3 3 12 12")
    mainframe.grid(column=0, row=0, sticky=(N,W,E,S))
    mainframe.columnconfigure(0, weight=1)
    mainframe.rowconfigure(0, weight=1)

    #algemene info
    ttk.Label(mainframe, text="hoofdstuk naam: ").grid(column=1, row=1, sticky=W)
    global ChapterName_entry
    ChapterName_entry = ttk.Entry(mainframe, width=7, textvariable=UChapterName)
    ChapterName_entry.grid(column=2, row=1, sticky=(W,E))

    ttk.Label(mainframe, text="aantal paragrafen: ").grid(column=1, row=2, sticky=W)
    global Nparagraphs_entry
    Nparagraphs_entry = ttk.Entry(mainframe, width=7, textvariable=UNparagraphs)
    Nparagraphs_entry.grid(column=2, row=2, sticky=(W,E))

    #ttk.Checkbutton(mainframe, text='quiz', variable=UQuiz).grid(column=1, row=3, sticky=W)

    ttk.Label(mainframe, text="opslaglocatie voor de aan te maken bestanden").grid(column=1, row=4, sticky=W)
    ttk.Button(mainframe, text="selecteer folder", command=folderSelector).grid(column=2, row=4, sticky=W)

    ChapterName_entry.focus()

    #doorgaan naar volgende pagina
    ttk.Button(mainframe, text="volgende", command=contiueToParagraphs).grid(column=1, row=5, sticky=W)

    for child in mainframe.winfo_children(): child.grid_configure(padx=5, pady=5)

def contiueToParagraphs(*args):
    try:
        global ChapterName
        ChapterName = ChapterName_entry.get()

        global Nparagraphs 
        Nparagraphs = Nparagraphs_entry.get()
        Nparagraphs = int(Nparagraphs) + 1

        #global IsQuiz
        #IsQuiz = UQuiz.get()

        global SaveFolder
        Savepath = str(USavepath)
        SaveFolder = Savepath + "/" + ChapterName

        clearFrame(mainframe)

        createParagraphFrame(Nparagraphs)

    except ValueError:
        pass

def clearFrame(FrameName):
    
    for widget in FrameName.winfo_children():
        widget.destroy()

def createParagraphFrame(Nparagraphs):
    i = 1
    while i < Nparagraphs:
        #voeg paragraaf toe
        ttk.Label(mainframe, text="paragraaf " + str(i)).grid(column=1, row=i, sticky=W)
        ttk.Button(mainframe, text="selecteer bestand", command=openFileSelector).grid(column=2, row=i, sticky=W)

        i += 1

    ttk.Button(mainframe, text="Maak bestanden de aan", command=processFiles).grid(column=1, row=i, sticky=W)

    for child in mainframe.winfo_children(): child.grid_configure(padx=5, pady=5)

def openFileSelector(*args):
    global OldFiles

    try:
        currentPath = os.path.dirname(os.path.abspath(__file__))
        cFile =  filedialog.askopenfilename(initialdir = currentPath,title = "Select file",filetypes = (("text files","*.txt *.docx"),("all files","*.*")))
        OldFiles.append(cFile)

    except ValueError:
        pass

def folderSelector(*args):
    try:
        currentPath = os.path.dirname(os.path.abspath(__file__))
        directory =  filedialog.askdirectory(initialdir = currentPath,title = "Select save path")

        global USavepath
        USavepath = directory
    except ValueError:
        pass

def createFolder(SaveFolder):
    if not os.path.exists(SaveFolder):
        try:
          os.makedirs(SaveFolder)
          print ("created dir at " + SaveFolder)

        except OSError:
            print("Error: could't create directory")
            pass

def addHeader(fileLocation, paragraphNumber):

    fileContent = """<?php
include('../../../components/headerChapter.php');
?>

<body>

\t<div class="title-small">
\t\t<h2> 
\t\t\t"""+ChapterName+ ' §' + str(paragraphNumber) + """ 
\t\t</h2>
\t </div>

\t<div class="bar-par-overview">
\t\t<div class="paragraph-tiles">
"""

    i = 1

    while i < Nparagraphs:
        if paragraphNumber == i:

            fileContent += """
\t\t\t<div class="ptile active">
\t\t\t\t<span class="ptile-content"><a href="p"""+str(i)+""".php">
\t\t\t\t\t§"""+str(i)+"""
\t\t\t\t</a></span>
\t\t\t</div>
"""
        else:
            fileContent += """
\t\t\t<div class="ptile">
\t\t\t\t<span class="ptile-content"><a href="p"""+str(i)+""".php">
\t\t\t\t\t§"""+str(i)+"""
\t\t\t\t</a></span>
\t\t\t</div>
"""

        i += 1

    fileContent += """
\t\t</div>
\t</div>

\t<div class="theorie">
\t\t<div class="bar-s">
\t\t\t<h3>
\t\t\t\tTheorie
\t\t\t</h3>
\t\t</div>

\t\t<div class="theorie-content">
        
"""

    file = codecs.open(fileLocation, "a", "utf-8")
    file.write(fileContent)

def readFile(fileLocation, paragraphNumber):
    cFileContent = ""

    try:
        if len(OldFiles) >= (paragraphNumber-1):
            cFile = OldFiles[paragraphNumber-1]

            #check file type (pdf, txt or docx)
            if cFile[-3:] == "txt":
                cFile = codecs.open(cFile, "r", "utf-8")
                cFileContent = cFile.read()

            elif cFile[-4:] == "docx":
                cFileContent = docx2txt.process(cFile)

            return cFileContent

    except:
        print("Error: could't read file")
        pass

def seperateContent(fileContent):
    splitTheory = fileContent.split("#VRAGEN")
    if(len(splitTheory[0]) > 0):
        Theory = splitTheory[0]
    else:
        Theory = ""

    if(len(splitTheory) > 1):
        splitQuestions = splitTheory[1].split("#ANTWOORDEN")
        if(len(splitQuestions[0]) > 0):
            Questions = splitQuestions[0]
        else:
            Questions = ""

        if(len(splitQuestions[1]) > 0):
            Answers = splitQuestions[1]
        else:
            Answers = ""

    else:
        Questions = ""
        Answers = ""
    
    
    print(Questions + Answers + Theory)

    splitContent = (Theory, Questions, Answers)

    return splitContent

def createTheory(theory, fileLocation):
    #find 2 new lines after each other and insert a <p>
    theory = theory.strip()
    buffer = ""
    i = 0

    toAddToFile = ""

    for char in theory:

        if char == "\n":
            buffer = buffer.strip()
            if len(buffer) > 0:
                if i == 0:
                    buffer = "\t\t\t<p>" + buffer + "</p>\n\n"
                    toAddToFile += buffer
                    buffer = ""
                    i += 1
                else:
                    buffer = "\t\t\t<p>" + buffer + "</p>\n\n"
                    toAddToFile += buffer
                    buffer = ""
                    i += 1

        else:
            buffer += char


    #if there's anything left in the buffer at the end, paste that in (needed when the file doesn't end with an \n)
    buffer = buffer.strip()
    if len(buffer) > 0:
        buffer = "\t\t\t<p>" + buffer + "</p>\n"
        toAddToFile += buffer

    #close html tag
    toAddToFile += "\n\t\t</div>"

    file = codecs.open(fileLocation, "a", "utf-8")
    file.write(toAddToFile)

def createQuestions(questions, fileLocation):
    if len(questions.strip()) > 0:
        toAddToFile = ""

        #add questions start
        toAddToFile += """\n
\t\t<div class="bar-s">
\t\t\t<h3>
\t\t\t\tVragen
\t\t\t</h3>
\t\t</div>

\t\t<div class="theorie-content">
\t\t\t<ol>\n"""

        #add questions body
        pattern = re.compile(r'\d+[).]')
        matches = re.split(pattern, questions)

        for match in matches:
            match = match.strip()

            if len(match) > 0:
                toAddToFile += "\t\t\t\t<li>" + match + "</li>\n"

        #add questions end
        toAddToFile += "\t\t\t</ol>\n\t\t</div>"

        file = codecs.open(fileLocation, "a", "utf-8")

        file.write(toAddToFile)

def createAnswers(answers, fileLocation):
    if len(answers.strip()) > 0:
        toAddToFile = ""

        #add questions start
        toAddToFile += """\n
\t\t<div class="bar-s">
\t\t\t<h3>
\t\t\t\tAntwoorden
\t\t\t</h3>
\t\t</div>

\t\t<div class="theorie-content theorie-answers">
\t\t\t<ol>\n"""

        #add questions body
        pattern = re.compile(r'\d+[).]')
        matches = re.split(pattern, answers)

        for match in matches:
            match = match.strip()

            if len(match) > 0:
                toAddToFile += "\t\t\t\t<li>" + match + "</li>\n"

        #add questions end
        toAddToFile += "\t\t\t</ol>\n\t\t</div>"

        file = codecs.open(fileLocation, "a", "utf-8")
        file.write(toAddToFile)

def addBody(fileLocation, paragraphNumber):
    
    fileContent = readFile(fileLocation, paragraphNumber)

    splitContent = seperateContent(fileContent)
    theory = splitContent[0]
    questions = splitContent[1]
    answers = splitContent[2]

    createTheory(theory, fileLocation)
    createQuestions(questions, fileLocation)
    createAnswers(answers, fileLocation)

def addFooter(fileLocation, paragraphNumber):
    toAddToFile = """\n\t</div>

\t<?php
\t\tinclude('../../../components/footerChapter.php');
\t?>

</body>"""

    file = codecs.open(fileLocation, "a", "utf-8")
    file.write(toAddToFile)

def addLinks(fileLocation, paragraphNumber):
    #TODO finish

    #fileContent = readFile(fileLocation, paragraphNumber)

    fileContent = testbestand
    toAddToFile = ""

    #find links
    pattern = re.compile(r'www\..+\..+')
    matches = re.split(pattern, fileContent)

    for match in matches:
        match = match.strip()

        if len(match) > 0:
            #TODO change to 'edit' file, instead of adding to it
            toAddToFile += """<a href=" """ + match + """>" """ + match + "</a>"
            
    print(toAddToFile)

#TODO delete
addLinks("x", "x")


def finishFile(fileLocation, paragraphNumber):
    addLinks(fileLocation, paragraphNumber)

def processFiles():
    createFolder(SaveFolder)

    #create file if it doesn't exist, else delete the file and create a new one
    #also add the file's content via additional functions
    i = 1
    while i < Nparagraphs:
        paragraph = "p" + str(i) + ".php"
        paragraphLocation = SaveFolder + "/" + paragraph

        if not os.path.isfile(paragraphLocation):
            codecs.open(paragraphLocation, "x", "utf-8")
            print("bestand is aangemaakt")
        else:
            print("bestand bestaal al, het wordt opnieuw aangemaakt")
            os.remove(paragraphLocation)
            codecs.open(paragraphLocation, "x", "utf-8")

        addHeader(paragraphLocation, i)

        addBody(paragraphLocation, i)

        addFooter(paragraphLocation, i)

        i += 1 

root = Tk()

#variables
UChapterName = StringVar()
UNparagraphs = StringVar()
#UQuiz = IntVar()
USavepath = StringVar()
OldFiles = []

setUp()

root.mainloop()
