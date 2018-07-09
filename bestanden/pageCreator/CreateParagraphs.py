from tkinter import *
from tkinter import ttk

def contiueToParagraphs(*args):
    try:
        value = int(Nparagraphs_entry.get())
    except ValueError:
        pass

Nparagraphs = StringVar

root = Tk()
root.title("Page creator")

mainframe = ttk.Frame(root, padding="3 3 12 12")
mainframe.grid(column=0, row=0, sticky=(N,W,E,S))
mainframe.columnconfigure(0, weight=1)
mainframe.rowconfigure(0, weight=1)

Nparagraphs_entry = ttk.Entry(mainframe, width=7, textvariable=Nparagraphs)
Nparagraphs_entry.grid(column=2, row=1, sticky=(W,E))

ttk.Button(mainframe, text="contiue", command=contiueToParagraphs).grid(column=1, row=2, sticky=W)

ttk.Label(mainframe, text="aantal paragraven: ").grid(column=1, row=1, sticky=W)

for child in mainframe.winfo_children(): child.grid_configure(padx=5, pady=5)

Nparagraphs_entry.focus()
root.bind('<Return>', contiueToParagraphs)

root.mainloop()