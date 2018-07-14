import re

text= """
Vragen
1) Wat is het antwoord op v1?
2) Wat is het antwoord op v2?
33) Wat is het antwoord op v33?
4. Wat is het antwoord op v4?
"""

vragen = []

pattern = re.compile(r'\d+[).]')
matches = pattern.finditer(text)

matches2 = re.split(pattern, text)

for match in matches2:
    print ("match = " + match)




#for match in matches:
#    print('match =' + match)

