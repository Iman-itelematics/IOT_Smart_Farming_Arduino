#include <RH_ASK.h>
#include <SPI.h>
#include <OneWire.h>
#include <DallasTemperature.h>

#define ONE_WIRE_BUS 7

OneWire oneWire(ONE_WIRE_BUS);

DallasTemperature sensors(&oneWire);

RH_ASK driver(4000,2,12);

float tempC = 0;
float tempF = 0;

void setup()
{
  sensors.begin();
  pinMode(13,OUTPUT);
  Serial.begin(9600);   // Debugging only
  if (!driver.init())
      Serial.println("init failed");
 
}

void loop()
{
  sensors.requestTemperatures();
  tempC = sensors.getTempCByIndex(0);
  tempF = sensors.toFahrenheit(tempC);
  
  int sensorReading=analogRead(A1);
//   int sensorReading2=666;
  
  Serial.println((String)sensorReading);
  Serial.print("C: ");
  Serial.print(tempC);
  Serial.print("   F: ");
  Serial.println(tempF);
  
  SendData("#S"+(String)sensorReading);
  SendData("#W"+(String)tempC);
  
  delay(1000);
}


void SendData(String Data)
{
  //Debug
  Serial.println("-->"+ Data + "<-- ");

  //Making char Array of String
  const char* rawdata = Data.c_str();

  digitalWrite(13, true); // Flash a light to show transmitting
  driver.send((uint8_t *)rawdata, strlen(rawdata));
  driver.waitPacketSent();
  digitalWrite(13, false);
}
