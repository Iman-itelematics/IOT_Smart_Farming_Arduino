/*
 *  This sketch sends data via HTTP GET requests to data.sparkfun.com service.
 *
 *  You need to get streamId and privateKey at data.sparkfun.com and paste them
 *  below. Or just customize this script to talk to other HTTP servers.
 *
 */
#include <RH_ASK.h>
#include <SPI.h> // Not actualy used but needed to compile
#include <ArduinoJson.h>
RH_ASK driver(4000,D2,D4);

String TempC; //Temp in C
String Vocht; //humidity
String Soil;//Soil moisture
String Temp;
String Press;
String Press0;
String SoilTemp;

#include <ESP8266WiFi.h>
String data;
const char* ssid     = "Network Not Found";
const char* password = "testtest";

const char* host = "192.168.8.102";

String path          = "http://localhost/iot/waterpump.json";  
const int pin        = D5;

void setup() {
  pinMode(pin, OUTPUT); 
  pinMode(pin, HIGH);
  Serial.begin(115200);
  delay(10);
  data = "";
  // We start by connecting to a WiFi network

  Serial.println();
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);
  
  WiFi.begin(ssid, password);
  
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi connected");  
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());

  
  Serial.println("Device is ready");
  if (!driver.init())
         Serial.println("init failed");
           
}


void loop() {
  // Serial.println("loop working");
    uint8_t buf[64];
    uint8_t buflen = sizeof(buf);
  if (driver.recv(buf, &buflen)) // Non-blocking
  {
    int i;
    char Char[buflen];
    Serial.print("Received: ");
    for (int i = 0; i < buflen; i++)
    {
      //Serial.write(buf[i]);
      Char[i]=char(buf[i]);
    }
    
    Serial.println(Char);
    Decode(Char);
  }
  

  
  //delay(5000);
  delay(1000);
  Serial.print("connecting to ");
  Serial.println(host);
  // Use WiFiClient class to create TCP connections
  WiFiClient client;
  const int httpPort = 80;
  if (!client.connect(host, httpPort)) {
    Serial.println("connection failed");
    return;
    
  }
      client.print(String("GET ") + path + " HTTP/1.1\r\n" +
               "Host: " + host + "\r\n" + 
               "Connection: keep-alive\r\n\r\n");

    data = String("temp1=") + TempC + String("&hum1=") + Vocht + String("&tempr1=")+Temp +String("&press1=")+ Press+String("&press01=")+Press0+String("&soil1=")+Soil +String("&soilTemp1=")+SoilTemp;
//    data = String("temp1=") + 55 + String("&hum1=") + 66 + String("&tempr1=")+77 +String("&press1=")+ 88+String("&press01=")+99+String("&soil1=")+11 +String("&soilTemp1=")+55;
    client.println("POST /add.php HTTP/1.1"); 
    client.println("Host: 192.168.8.101"); // SERVER ADDRESS HERE TOO

    client.println("Content-Type: application/x-www-form-urlencoded"); 
    client.print("Content-Length: "); 
    client.println(data.length()); 
    client.println(); 
    client.print(data);
    
    

  delay(500); // wait for server to respond
String section="header";
  while(client.available()){
    String line = client.readStringUntil('\r');
    // Serial.print(line);
    // we’ll parse the HTML body here
    if (section=="header") { // headers..
      Serial.print(".");
      if (line=="\n") { // skips the empty space at the beginning 
        section="json";
      }
    }
    else if (section=="json") {  // print the good stuff
      section="ignore";
      String result = line.substring(1);

      // Parse JSON
      int size = result.length() + 1;
      char json[size];
      result.toCharArray(json, size);
      StaticJsonBuffer<200> jsonBuffer;
      JsonObject& json_parsed = jsonBuffer.parseObject(json);
      if (!json_parsed.success())
      {
        Serial.println("parseObject() failed");
        return;
      }

      // Make the decision to turn off or on the LED
      if (strcmp(json_parsed["waterpump"], "on") == 0) {
        digitalWrite(pin, HIGH); 
        Serial.println("waterpump ON");
      }
      else {
        digitalWrite(pin, LOW);
        Serial.println("waterpump off");
      }
    }
  }
//  int reading=15;
//  Serial.println(reading);
//  
//  // We now create a URI for the request
//  String url = "/WeatherStation/DataCenter?soil=" + String(reading);
//  
//  Serial.print("Requesting URL: ");
//
//  client.print(String("GET ") + url + " HTTP/1.1\r\n" +
//               "Host:localhost:8080\r\n" + 
//               "Connection: keep-alive\r\n\r\n");
 
  unsigned long timeout = millis();
  while (client.available() == 0) {
    if (millis() - timeout > 5000) {
      Serial.println(">>> Client Timeout !");
      client.stop();
      return;
    }
  }
  //delay(30000);
  delay(500);
  // Read all the lines of the reply from server and print them to Serial
  while(client.available()){
    String line = client.readStringUntil('\r');
    Serial.print(line);
  }
  
  Serial.println();
  Serial.println("closing connection");
}

void Decode(char* Raw)
{
  String Code = (String)Raw;
  if (Code.startsWith("#H")) //Looks if Code starts With #C
  {
     Vocht = Code.substring(2,6); //get 2 to 7 char and put in int TempC string
  }

  if (Code.startsWith("#C")) //Looks if Code starts With #H
  {
    TempC = Code.substring(2,6);//get 2 to 4 char and put in int Vocht string
  }
  if (Code.startsWith("#T")) //Looks if Code starts With #H
  {
     Temp = Code.substring(2,7);//get 2 to 4 char and put in int Vocht string
  }
  if (Code.startsWith("#P")) //Looks if Code starts With #H
  {
    Press = Code.substring(2,8);//get 2 to 4 char and put in int Vocht string
  }
  if (Code.startsWith("#A")) //Looks if Code starts With #H
  {
    Press0 = Code.substring(2,8);//get 2 to 4 char and put in int Vocht string
  }
  if (Code.startsWith("#S")) //Looks if Code starts With #H
  {
    Soil = Code.substring(2,5);//get 2 to 4 char and put in int Vocht string
  }
  if (Code.startsWith("#W")) //Looks if Code starts With #H
  {
    SoilTemp = Code.substring(2,6);//get 2 to 4 char and put in int Vocht string
  }
  SetScreen();
}
void SetScreen()
{
  Serial.println("---Weather Station---");
  Serial.println("humidy : "+Vocht);
  Serial.println("temp : "+TempC);
  Serial.println("temp : "+Temp);
  Serial.println("press : "+Press);
  Serial.println("press0 : "+Press0);
  Serial.println("---Soil Station---");
  Serial.println("Soil : "+Soil);
  Serial.println("Soiltemp : "+SoilTemp);
}
