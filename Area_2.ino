#include <Servo.h>
#include <SoftwareSerial.h>
#include <ESP8266WiFi.h>
#include "ThingSpeak.h"

// Wi-Fi Settings
const char* ssid = "ece"; // your wireless network name (SSID)
const char* password = "123456789"; // your Wi-Fi network password



WiFiClient client;
// ThingSpeak Settings
unsigned long channelID = 999068;
String writeAPIKey = "1K3XWZ01FGWB0455"; // write API key for your ThingSpeak Channel
String readAPIKey = "SI1WWS26YWILCY44";
const char * mywriteAPIKey =  "1K3XWZ01FGWB0455";
const char * myreadAPIKey =  "SI1WWS26YWILCY44";
const char* server = "api.thingspeak.com";
const int postingInterval = 1 * 1000; // post data every 20 seconds

SoftwareSerial mySerial(D4 , D5);


Servo gate1;
Servo gate2;
#define IR1 D0
#define IR2 D1
#define SERVOPIN1 D2
#define SERVOPIN2 D3
#define LED1 D6
#define LED2 D7
char tag1[] = "000000000000";
char tag2[] = "000000000000";
char tags1[] = "0000000000000";
char tags2[] = "0000000000000";
char taga1 = 2;
char taga2 = 2;
char input[12];
int gateSensor;
int count = 0;
boolean flag1 = 0;
boolean flag2 = 0;
int val1 = 0;
int val2 = 0;

void setup()
{
  mySerial.begin(9600);
  pinMode(IR1, INPUT);
  pinMode(IR2, INPUT);
  pinMode(SERVOPIN1, OUTPUT);
  pinMode(SERVOPIN2, OUTPUT);
  pinMode(LED1, OUTPUT);
  pinMode(LED2, OUTPUT);
  gate1.attach(SERVOPIN1);
  gate2.attach(SERVOPIN2);
  Serial.begin(115200);
  WiFi.begin(ssid, password);
gate1.write(90);
gate2.write(90);
  WiFi.mode(WIFI_STA);
  ThingSpeak.begin(client);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
  }
}
void loop()
{
  int statusCode = 0;
s: while (!mySerial.available()) {
    val1 = digitalRead(IR1);
    val2 = digitalRead(IR2);
    if (val1 == LOW && val2 == LOW) {
      Serial.println("Cycle in slot1 unavailable");
      Serial.println("Cycle in slot2 unavailable");
      digitalWrite(LED1, HIGH);
      digitalWrite(LED2, HIGH);
      delay(100);
    }
    if (val1 == LOW && val2 == HIGH) {
      Serial.println("Cycle in slot1 unavailable");
      Serial.println("Cycle in slot2 available");
      digitalWrite(LED1, HIGH);
      digitalWrite(LED2, LOW);
      delay(100);
    }
    if (val1 == HIGH && val2 == LOW) {
      Serial.println("Cycle in slot1 available");
      Serial.println("Cycle in slot2 unavailable");
      digitalWrite(LED1, LOW);
      digitalWrite(LED2, HIGH);
      delay(100);
    }
    if (val1 == HIGH && val2 == HIGH) {
      Serial.println("Cycle in slot1 available");
      Serial.println("Cycle in slot2 available");
      digitalWrite(LED1, LOW);
      digitalWrite(LED2, LOW);
      delay(100);
    }
    if (client.connect(server, 80)) {

      // Measure Analog Input (A0)
      int a = digitalRead(D0);
      int b = digitalRead(D1);

      // Construct API request body
      String sendData = writeAPIKey + "&field5=" + String(a) + "&field6=" + String(b);

      Serial.print("A0: ");
      Serial.println(a);
      Serial.println(b);
      client.print("POST /update HTTP/1.1\n");
      client.print("Host: api.thingspeak.com\n");
      client.print("Connection: close\n");
      client.print("X-THINGSPEAKAPIKEY: " + writeAPIKey + "\n");
      client.print("Content-Type: application/x-www-form-urlencoded\n");
      client.print("Content-Length: ");
      client.print(sendData.length());
      client.print("\n\n");
      client.print(sendData);

      Serial.print("slot1: ");
      Serial.print(a);
      Serial.print("slot 2: ");
      Serial.print(b);
      Serial.println("%. Connecting to Thingspeak.");

    }


    // wait and then post again
    delay(postingInterval);


    String rfidd = ThingSpeak.readStringField (channelID, 7, myreadAPIKey);

    statusCode = ThingSpeak.getLastReadStatus();
    if (statusCode == 200) {
      Serial.println("The Slot 1 rfid number is : " + String(rfidd));
      rfidd.toCharArray(tags1, 14);
      for (int is = 0; is < 12; is++) {
        tag1[is] = tags1[is];
      }
      Serial.println("ls" + tags1[12]);
      taga1 = tags1[12];
      Serial.println(tag1);
    }
    else {
      Serial.println("Problem reading channel. HTTP error code " + String(statusCode));
    }
    String rfiddd = ThingSpeak.readStringField (channelID, 8, myreadAPIKey);
    if (statusCode == 200) {
      Serial.println("The Slot2 rfid number is : " + String(rfiddd));
      rfiddd.toCharArray(tags2, 14);
      for (int ia = 0; ia < 12; ia++) {
        tag2[ia] = tags2[ia];
      }
      Serial.println(tags2[12]);
      taga2 = tags2[12];
      Serial.println(tag2);
    }
    else {
      Serial.println("Problem reading channel. HTTP error code " + String(statusCode));
    }
  }
  client.stop();
  delay(200);
  if (mySerial.available())
  {
    Serial.println("hi");
    count = 0;
    val1 = digitalRead(IR1);
    val2 = digitalRead(IR2);
    if (val1 == LOW) {
      Serial.println("Cycle in slot1 unavailable");
      digitalWrite(LED1, HIGH);
      if (val2 == LOW) {
        Serial.println("Cycle in slot2 unavailable");
        digitalWrite(LED2, HIGH);
        delay(100);
      }
      else {
        Serial.println("Cycle in slot2 available");
        digitalWrite(LED2, LOW);
      }
    }
    else {
      Serial.println("Cycle in slot1 available");
      digitalWrite(LED1, LOW);
      if (val2 == LOW) {
        Serial.println("Cycle in slot2 unavailable");
        digitalWrite(LED2, HIGH);
        delay(100);
      }
      else {
        Serial.println("Cycle in slot2 available");
        digitalWrite(LED2, LOW);
      }
    }
    delay(200);
    while (mySerial.available() && count < 12)
    {
      input[count] = mySerial.read();
      Serial.print(input[count]);
      count++;
      delay(5);
    }
    Serial.println();
    gateSensor = 0;
    if (count == 12)
    {
      count = 0;

      while (count < 12 )
      {
        if (input[count] == tag1[count]) {
          Serial.print(tag1[count]);
          Serial.println();

          Serial.print(input[count]);

          flag1 = 1;
          flag2 = 0;
        }
        else if (input[count] == tag2[count]) {
          Serial.print(tag2[count]);
          Serial.println();

          Serial.print(input[count]);
          flag2 = 1;
          flag1 = 0;
        }
        else {
          Serial.println();


          Serial.print(input[count]);
          flag1 = 0;
          flag2 = 0;
        }
        count++;
      }
    }
    if (flag1 == 1)
    {
      Serial.println("Access Allowed for slot 1 !");

      if (client.connect(server, 80)) {
        // Construct API request body

        String sendData = writeAPIKey + "&field7=0000000000000";

        Serial.print("A0: ");
 //        Serial.println(a);
 //       Serial.println(b);
        client.print("POST /update HTTP/1.1\n");
        client.print("Host: api.thingspeak.com\n");
        client.print("Connection: close\n");
        client.print("X-THINGSPEAKAPIKEY: " + writeAPIKey + "\n");
        client.print("Content-Type: application/x-www-form-urlencoded\n");
        client.print("Content-Length: ");
        client.print(sendData.length());
        client.print("\n\n");
        client.print(sendData);

        Serial.println("%. Connecting to Thingspeak.");
        Serial.println("%. slot 1 is free");

      }

      if (taga1 == '0')
      {
        Serial.println("  gate of slot1 is open        ");
        gateSensor = 1;
        gate1.write(10);
        Serial.println("gate 1 opened");
       
      }
      else if (taga1 == '1')
      {
        Serial.println("  gate 1 destintion is closed    ");
        gateSensor = 0;
        gate1.write(90);

        Serial.println("gate 1 closed");
        
      }

      
      goto s;
    }
    else  if (flag2 == 1)
    {
      Serial.println("Access Allowed for slot 2 !");

           if (client.connect(server, 80)) {
        // Construct API request body

        String sendData = writeAPIKey + "&field8=0000000000000";

        Serial.print("A0: ");
    //    Serial.println(a);
    //    Serial.println(b);
        client.print("POST /update HTTP/1.1\n");
        client.print("Host: api.thingspeak.com\n");
        client.print("Connection: close\n");
        client.print("X-THINGSPEAKAPIKEY: " + writeAPIKey + "\n");
        client.print("Content-Type: application/x-www-form-urlencoded\n");
        client.print("Content-Length: ");
        client.print(sendData.length());
        client.print("\n\n");
        client.print(sendData);

        Serial.println("%. Connecting to Thingspeak.");
        Serial.println("%. slot 2 is free");
 
      if (taga2 == '0')
      {
        Serial.println("  gate of slot2 is open        ");
        gateSensor = 1;

        gate2.write(10);
        Serial.println("gate 2 opened");
      }
      else  if (taga2 == '1')
      {
        Serial.println("  gate 2 is destintion closed    ");
        gateSensor = 0;
        gate2.write(90);

        Serial.println("gate 2 closed");
       
      }

      }
        goto s;

    }

    else
    {
      Serial.println("Access Denied");

      delay (1000);

    }
  }
}
