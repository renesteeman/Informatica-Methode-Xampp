from tkinter import *
from tkinter import ttk
from tkinter import filedialog
from tkinter import messagebox
import os

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

    ttk.Checkbutton(mainframe, text='quiz', variable=UQuiz).grid(column=1, row=3, sticky=W)

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
        Nparagraphs = int(Nparagraphs)

        global IsQuiz
        IsQuiz = UQuiz.get()

        global Savepath
        Savepath = str(USavepath)

        clearFrame(mainframe)

        createParagraphFrame(Nparagraphs)

    except ValueError:
        pass

def clearFrame(FrameName):
    
    for widget in FrameName.winfo_children():
        widget.destroy()

def createParagraphFrame(Nparagraphs):
    i = 0
    while i < Nparagraphs:
        #voeg paragraaf toe
        ttk.Label(mainframe, text="paragraaf " + str(i)).grid(column=1, row=i, sticky=W)
        ttk.Button(mainframe, text="selecteer bestand", command=openFileSelector).grid(column=2, row=i, sticky=W)

        i += 1

    ttk.Button(mainframe, text="Maak bestanden de aan", command=processFiles).grid(column=1, row=i, sticky=W)

    for child in mainframe.winfo_children(): child.grid_configure(padx=5, pady=5)

def openFileSelector(*args):
    try:
        file =  filedialog.askopenfilename(initialdir = "/",title = "Select file",filetypes = (("text files","*.txt *.pdf *.docx"),("all files","*.*")))
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

def createFolder(savepath):
    if not os.path.exists(savepath):
        try:
          #os.makedirs(savepath)
          print ("create dir")

        except OSError:
            pass

def addHeader(file):
    file = "header"

def processFiles():
    print(Savepath)

    createFolder(Savepath)

    files = []
    while len(files) < Nparagraphs:
        files.append(len(files))

    print (files)

    

root = Tk()

#variables
UChapterName = StringVar()
UNparagraphs = StringVar()
UQuiz = IntVar()
USavepath = StringVar()

setUp()

root.mainloop()