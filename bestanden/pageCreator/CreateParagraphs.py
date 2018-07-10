from tkinter import *
from tkinter import ttk
from tkinter import filedialog

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

    ttk.Button(mainframe, text="Maak bestanden de aan").grid(column=1, row=i, sticky=W)

    for child in mainframe.winfo_children(): child.grid_configure(padx=5, pady=5)
        
    

def contiueToParagraphs(*args):
    try:
        ChapterName = ChapterName_entry.get()
        Nparagraphs = Nparagraphs_entry.get()
        IsQuiz = str(Quiz.get())

        print(ChapterName + Nparagraphs + IsQuiz)

        clearFrame(mainframe)

        createParagraphFrame(int(Nparagraphs))

    except ValueError:
        pass

def openFileSelector(*args):
    try:
        root.filename =  filedialog.askopenfilename(initialdir = "/",title = "Select file",filetypes = (("text files","*.txt *.pdf *.docx"),("all files","*.*")))
    except ValueError:
        pass

root = Tk()
root.title("Page creator")

#variables
ChapterName = StringVar()
Nparagraphs = StringVar()
Quiz = IntVar()

mainframe = ttk.Frame(root, padding="3 3 12 12")
mainframe.grid(column=0, row=0, sticky=(N,W,E,S))
mainframe.columnconfigure(0, weight=1)
mainframe.rowconfigure(0, weight=1)

#algemene info over het hoofdstuk
ttk.Label(mainframe, text="hoofdstuk naam: ").grid(column=1, row=1, sticky=W)
ChapterName_entry = ttk.Entry(mainframe, width=7, textvariable=ChapterName)
ChapterName_entry.grid(column=2, row=1, sticky=(W,E))

ttk.Label(mainframe, text="aantal paragrafen: ").grid(column=1, row=2, sticky=W)
Nparagraphs_entry = ttk.Entry(mainframe, width=7, textvariable=Nparagraphs)
Nparagraphs_entry.grid(column=2, row=2, sticky=(W,E))

ttk.Checkbutton(mainframe, text='quiz', variable=Quiz).grid(column=1, row=3, sticky=W)

ChapterName_entry.focus()

#doorgaan naar volgende pagina
ttk.Button(mainframe, text="volgende", command=contiueToParagraphs).grid(column=1, row=4, sticky=W)

for child in mainframe.winfo_children(): child.grid_configure(padx=5, pady=5)

root.mainloop()