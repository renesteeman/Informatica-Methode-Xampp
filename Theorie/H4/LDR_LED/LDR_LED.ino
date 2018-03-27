int sensorPin = A0; //stel de pin in voor het meten van de weerstand van de LDR
int ledPin = 3; //stel de pin voor de led in (dit moet een pin met het golfje zijn)
int sensorValue = 0; 
int ledValue = 0;

void setup() { 
  Serial.begin(9600); //zet snelheid
  pinMode(sensorPin, INPUT); //zet de sensorPin op aflees modus
  pinMode(ledPin, OUTPUT); //zet de ledPin op output modus 
} 
void loop() { 
  //zet sensorValue gelijk aan de waarde van de weerstand van de LDR die afgelezen wordt
  sensorValue = analogRead(sensorPin); 
  
  //laat de sensorwaarde zien
  Serial.print("sensorValue = "); 
  Serial.println(sensorValue);

  //zorg ervoor de helderheid van de led omgekeerd evenredig is met de weerstand (als het donker is geeft de led meer licht)
  ledValue = (30000/sensorValue);

  //zorg dat de led waarde niet groter is dan 255 (dit is de maximum waarde) 
  if(ledValue>255){
    ledValue = 255;
  }

  //laat de waarde voor de led zien
  Serial.print("ledValue =");
  Serial.println(ledValue);
  Serial.println();

  //zet de helderheid van het licht gelijk aan de weerstands waarde van de LDR
  analogWrite(ledPin, ledValue); 
  delay(1000); //wacht 1s
} 


//Probeer het uit door jouw vinger op de LDR te leggen (niet op de 'draad')
//Schijn nu met een lampje op de LDR
//Laat nu een lampje knipperen en kijk naar de reactie van het led lampje
