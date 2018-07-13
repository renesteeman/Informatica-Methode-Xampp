from tkinter import *
from tkinter import ttk
from tkinter import filedialog
from tkinter import messagebox
import os
import codecs
import PyPDF2
import docx2txt

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

    fileContent = """
<?php
include('../../../components/headerChapter.php');
?>

<body>

    <div class="title-small">
        <h2> 
        """+ChapterName+""" 
        </h2>
    </div>

    <div class="bar-par-overview">
        <div class="paragraph-tiles">
    """

    i = 1

    while i < Nparagraphs:
        if paragraphNumber == i:

            fileContent += """
    <div class="ptile active">
        <span class="ptile-content"><a href="p"""+str(i)+""".php">
        §"""+str(i)+"""
        </a></span>
    </div>
            """
        else:
            fileContent += """
    <div class="ptile">
        <span class="ptile-content"><a href="p"""+str(i)+""".php">
        §"""+str(i)+"""
        </a></span>
    </div>
            """

        i += 1

    fileContent += """</div>
    </div>

    <div class="theorie">
        <div class="bar-s">
            <h3>
                Theorie
            </h3>
        </div>

        <div class="theorie-content">
            
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
    splitContent = fileContent.split("#VRAGEN")
    
    #TODO split answers

    return splitContent

def createTheory(fileContent, fileLocation):
    #find 2 new lines after each other and insert a <p>
    fileContent = fileContent.strip()
    buffer = ""

    toAddToFile = ""

    for char in fileContent:

        if char == "\n":
            buffer = buffer.strip()
            if len(buffer) > 0:
                buffer = "<p>" + buffer + "</p>\n\n"
                toAddToFile += buffer
                buffer = ""

        else:
            buffer += char


    #if there's anything left in the buffer at the end, paste that in (needed when the file doesn't end with an \n)
    buffer = buffer.strip()
    if len(buffer) > 0:
        buffer = "<p>" + buffer + "</p>\n"
        toAddToFile += buffer

    #close html tag
    toAddToFile += "</div>"

    file = codecs.open(fileLocation, "a", "utf-8")
    file.write(toAddToFile)

def createQuestions(fileContent, fileLocation):
    toAddToFile = ""

    file = codecs.open(fileLocation, "a", "utf-8")
    file.write(toAddToFile)


def addBody(fileLocation, paragraphNumber):
    
    fileContent = readFile(fileLocation, paragraphNumber)

    #TODO filter theory and questions
    splitContent = seperateContent(fileContent)
    theory = splitContent[0]
    questions = splitContent[1]

    createTheory(theory, fileLocation)
    createQuestions(questions, fileLocation)

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