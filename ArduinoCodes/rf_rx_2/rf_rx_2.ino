#include <RH_ASK.h>
#include <SPI.h> // Not actualy used but needed to compile

RH_ASK driver(4000,D2,D4);

String TempC; //Temp in C
String Vocht; //humidity
String Soil;//Soil moisture
String Temp;
String Press;
String Press0;
String SoilTemp;

void setup()
{
  
  Serial.begin(115200);
  Serial.println("Device is ready");
  if (!driver.init())
         Serial.println("init failed");
}

void loop()
{
 // Serial.println("loop working");
    uint8_t buf[64];
    uint8_t buflen = sizeof(buf);
  if (driver.recv(buf, &buflen)) // Non-blocking
  {
    int i;
    char Char[buflen];
    //Serial.print("Received: ");
    for (int i = 0; i < buflen; i++)
    {
      //Serial.write(buf[i]);
      Char[i]=char(buf[i]);
    }
    
    //Serial.println(Char);
    Decode(Char);
  }
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
