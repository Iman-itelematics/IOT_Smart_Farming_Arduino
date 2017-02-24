//#include <dht.h>

#include <RH_ASK.h>
#include <SPI.h> // Not actually used but needed to compile
#include <dht.h>
#include <Wire.h> //Including wire library
#include <SFE_BMP180.h> //Including BMP180 library

#define ALTITUDE 35.6 //Altitude where I live (change this to your altitude)
#define dht_apin 9

SFE_BMP180 pressure; //Creating an object
dht DHT;
RH_ASK driver(4000,2,4);

void setup()
{
  pinMode(13,OUTPUT);
  Serial.begin(9600);   // Debugging only
  if (!driver.init())
      Serial.println("init failed");
      
  if (pressure.begin()) //If initialization was successful, continue
    Serial.println("BMP180 init success");
  else //Else, stop code forever
  {
    Serial.println("BMP180 init fail");
    while (1);
  }
 
}


void loop()
{
  char status;
  double T, P, p0;

  Serial.print("You provided altitude: ");
  Serial.print(ALTITUDE, 0);
  Serial.println(" meters");

  status = pressure.startTemperature();
  if (status != 0) {
    delay(status);

    status = pressure.getTemperature(T);
    if (status != 0) {
      Serial.print("Temp: ");
      Serial.print(T, 1);
      Serial.println(" deg C");

      status = pressure.startPressure(3);

      if (status != 0) {
        delay(status);

        status = pressure.getPressure(P, T);
        if (status != 0) {
          Serial.print("Pressure measurement: ");
          Serial.print(P);
          Serial.println(" hPa (Pressure measured using temperature)");

          p0 = pressure.sealevel(P, ALTITUDE);
          Serial.print("Relative (sea-level) pressure: ");
          Serial.print(p0);
          Serial.println("hPa");
        }
      }
    }
  }  
  
  DHT.read11(dht_apin);
  
  int sensorReading=555;
  int sensorReading2=666;
  
//  Serial.println("#A"+(String)ALTITUDE);  
//  Serial.println("#H"+(String)DHT.humidity);
//  Serial.println("#C"+(String)DHT.temperature);
//  Serial.println("#T"+(String)T);
//  Serial.println("#P"+(String)P);
//  Serial.println("#P0"+(String)p0);
    
  //SendData("#H"+(String)sensorReading);
  //SendData("#C"+(String)sensorReading2);  
  
  SendData("#H"+(String)DHT.humidity);
  SendData("#C"+(String)DHT.temperature);
  SendData("#T"+(String)T);
  SendData("#P"+(String)P);
  SendData("#A"+(String)p0);
  
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
