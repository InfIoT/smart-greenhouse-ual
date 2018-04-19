#include <WaspLoRaWAN.h>
#include <WaspSensorAgr_v30.h>
#include <WaspWIFI_PRO.h>



//uint8_t socket = SOCKET0;


//--POST SETTINGS--//
char type[] = "http";
char host[] = "192.168.43.180";
char port[] = "80";
char url[]  = "smartgreenhouse/insertar.php?";

//----------------//


//--SENSORES--//
float sensorTemp;
float sensorHum;
float temp,humd,pres;
watermarkClass wmSensor1(SOCKET_1);
pt1000Class pt1000Sensor;
//-----------//

//--LORA--//
//uint8_t socket = SOCKET0;
uint8_t power = 15;
uint32_t frequency;
char spreading_factor[] = "sf12";
char coding_rate[] = "4/5";
uint16_t bandwidth = 125;
char crc_mode[] = "on";
//-------//

uint8_t socket = SOCKET0;
// variable
uint8_t error;
uint8_t status;
unsigned long previous;

uint8_t error2;
uint8_t status2;
unsigned long previous2;


void setup() 
{
  USB.ON();
  USB.println(F("Radio P2P example - Receiving packets\n"));

  // module setup
  error = radioModuleSetup();
  
  Agriculture.ON(); 


  // Check status
  if (error == 0)
  {
    USB.println(F("Module configured OK"));     
  }
  else 
  {
    USB.println(F("Module configured ERROR"));     
  }  

}


void loop() 
{

  char sensorTempS[80];
  char sensorHumS[80];
  char tempS[80];
  char humdS[80];
  char presS[80];
  char body[] = "varA=1&varB=2&varC=3&varD=4&varE=5";
  
  
  sensorTemp = pt1000Sensor.readPT1000();  
  sensorHum = wmSensor1.readWatermark();
  temp = Agriculture.getTemperature();
  humd  = Agriculture.getHumidity();
  pres = Agriculture.getPressure(); 

  //--Conversion de float a string
  Utils.float2String (sensorTemp, sensorTempS, 3);
  Utils.float2String (sensorHum, sensorHumS, 3);
  Utils.float2String (temp, tempS, 3);
  Utils.float2String (humd, humdS, 3);
  Utils.float2String (pres, presS, 3);


  
  USB.print(F("PT1000: "));
  USB.printFloat(sensorTemp,3);
  USB.println(F(" ºC"));  

  USB.print(F("Watermark 1 - Frequency: "));
  USB.print(sensorHum);
  USB.println(F(" Hz"));
  delay(100);

  USB.print(F("Temperature: "));
  USB.print(temp);
  USB.println(F(" Celsius"));
  USB.print(F("Humidity: "));
  USB.print(humd);
  USB.println(F(" %"));  
  USB.print(F("Pressure: "));
  USB.print(pres);
  USB.println(F(" Pa"));  
  USB.println("---------FIN-SENSORES-------");  
   char mensaje[800];
   char mensaje2[800];
  sprintf(mensaje,"TEMPSUELO=%s&HUMSUELO=%s&BMETEMP=%s&BMEHUM=%s&BMEPRES=%s",sensorTempS, sensorHumS, tempS, humdS, presS);
  
  
  USB.println(F("\nListening to packets..."));
  
   // rx
  error = LoRaWAN.receiveRadio(10000);

 
  // Check status
  if (error == 0)
  {
    USB.println(F("--> Packet received"));
    USB.print(F("packet: "));
    USB.println((char*) LoRaWAN._buffer);
    uint8_t buffer1[100];
    uint16_t size;
    size = Utils.str2hex((char*) LoRaWAN._buffer, buffer1,sizeof(buffer1));
    USB.println(buffer1,size);


    sprintf(mensaje2,"%s&%s",mensaje, buffer1);
     
    USB.print(mensaje2);
    
  }
  else 
  {
    // error code
    //  1: error
    //  2: no incoming packet
    USB.print(F("Error waiting for packets. error = "));  
    USB.println(error, DEC);   
  }
 

USB.print("HOLA 1");
//////////7--------------------------------------------------
  previous = millis();
  USB.print("HOLA 2");
  //////////////////////////////////////////////////
  // 1. Switch ON
  //////////////////////////////////////////////////  
  uint8_t socket1 = SOCKET1;
  USB.print("HOLA 3");
  WIFI_PRO.ON(socket1);

  USB.print("HOLA 4");
  if (error2 == 0)
  {    
    USB.println(F("1. WiFi switched ON"));
  }
  else
  {
    USB.println(F("1. WiFi did not initialize correctly"));
  }
  //////////////////////////////////////////////////
  // 2. Set url
  //////////////////////////////////////////////////  
  error2 = WIFI_PRO.setURL( type, host, port, url );

  // check response
  if (error2 == 0)
  {
    USB.println(F("2. setURL OK"));
  }
  else
  {
    USB.println(F("2. Error calling 'setURL' function"));
    WIFI_PRO.printErrorCode();
  }
  //////////////////////////////////////////////////
  // 3. Join AP
  //////////////////////////////////////////////////  

  // check connectivity
  status2 =  WIFI_PRO.isConnected();


  // Check if module is connected
  if (status2 == true)
  {    
    USB.print(F("3. WiFi is connected OK"));
    USB.print(F(" Time(ms):"));
    USB.println(millis()-previous2);   
    ////////////////////////////////////////////////
    // 3.1. http request
    ////////////////////////////////////////////////
    error2 = WIFI_PRO.post(mensaje2); 

    // check response
    if (error2 == 0)
    {
      USB.print(F("3.1. HTTP POST OK. "));
      USB.print(F("HTTP Time from OFF state (ms):"));
      USB.println(millis()-previous2);
      
      USB.print(F("\nServer answer:"));
      USB.println(WIFI_PRO._buffer, WIFI_PRO._length);
    }
    else
    {
      USB.println(F("3.1. Error calling 'post' function"));
      WIFI_PRO.printErrorCode();
    }
  }
  else
  {
    USB.print(F("3. WiFi is connected ERROR"));
    USB.print(F(" Time(ms):"));
    USB.println(millis()-previous2);
  }

/////////////------------------------------------------------

    
}



uint8_t radioModuleSetup()
{ 

  uint8_t status = 0;
  uint8_t e = 0;
  
  //////////////////////////////////////////////
  // 1. switch on
  //////////////////////////////////////////////
  
  e = LoRaWAN.ON(socket);

  // Check status
  if (e == 0)
  {
    USB.println(F("1. Switch ON OK"));     
  }
  else 
  {
    USB.print(F("1. Switch ON error = ")); 
    USB.println(e, DEC);
    status = 1;
  }
  USB.println(F("-------------------------------------------------------"));

    if (LoRaWAN._version == RN2483_MODULE)
  {
    frequency = 868100000;
  }
  else if(LoRaWAN._version == RN2903_MODULE)
  {
    frequency = 902300000;
  }
  

  //////////////////////////////////////////////
  // 2. Enable P2P mode
  //////////////////////////////////////////////

  e = LoRaWAN.macPause();

  // Check status
  if (e == 0)
  {
    USB.println(F("2. P2P mode enabled OK"));
  }
  else 
  {
    USB.print(F("2. Enable P2P mode error = "));
    USB.println(e, DEC);
    status = 1;
  }
  USB.println(F("-------------------------------------------------------"));



  //////////////////////////////////////////////
  // 3. Set/Get Radio Power
  //////////////////////////////////////////////

  // Set power
  e = LoRaWAN.setRadioPower(power);

  // Check status
  if (e == 0)
  {
    USB.println(F("3.1. Set Radio Power OK"));
  }
  else 
  {
    USB.print(F("3.1. Set Radio Power error = "));
    USB.println(e, DEC);
    status = 1;
  }

  // Get power
  e = LoRaWAN.getRadioPower();

  // Check status
  if (e == 0) 
  {
    USB.print(F("3.2. Get Radio Power OK. ")); 
    USB.print(F("Power: "));
    USB.println(LoRaWAN._radioPower);
  }
  else 
  {
    USB.print(F("3.2. Get Radio Power error = ")); 
    USB.println(e, DEC);
    status = 1;
  }
  USB.println(F("-------------------------------------------------------"));



  //////////////////////////////////////////////
  // 4. Set/Get Radio Frequency
  //////////////////////////////////////////////

  // Set frequency
  e = LoRaWAN.setRadioFreq(frequency);

  // Check status
  if (e == 0)
  {
    USB.println(F("4.1. Set Radio Frequency OK"));
  }
  else 
  {
    USB.print(F("4.1. Set Radio Frequency error = "));
    USB.println(e, DEC);
    status = 1;
  }

  // Get frequency
  e = LoRaWAN.getRadioFreq();

  // Check status
  if (e == 0) 
  {
    USB.print(F("4.2. Get Radio Frequency OK. ")); 
    USB.print(F("Frequency: "));
    USB.println(LoRaWAN._radioFreq);
  }
  else 
  {
    USB.print(F("4.2. Get Radio Frequency error = ")); 
    USB.println(e, DEC);
    status = 1;
  }
  USB.println(F("-------------------------------------------------------"));



  //////////////////////////////////////////////
  // 5. Set/Get Radio Spreading Factor (SF)
  //////////////////////////////////////////////

  // Set SF
  e = LoRaWAN.setRadioSF(spreading_factor);

  // Check status
  if (e == 0)
  {
    USB.println(F("5.1. Set Radio SF OK"));
  }
  else 
  {
    USB.print(F("5.1. Set Radio SF error = "));
    USB.println(e, DEC);
    status = 1;
  }

  // Get SF
  e = LoRaWAN.getRadioSF();

  // Check status
  if (e == 0) 
  {
    USB.print(F("5.2. Get Radio SF OK. ")); 
    USB.print(F("Spreading Factor: "));
    USB.println(LoRaWAN._radioSF);
  }
  else 
  {
    USB.print(F("5.2. Get Radio SF error = ")); 
    USB.println(e, DEC);
    status = 1;
  }
  USB.println(F("-------------------------------------------------------"));



  //////////////////////////////////////////////
  // 6. Set/Get Radio Coding Rate (CR)
  //////////////////////////////////////////////

  // Set CR
  e = LoRaWAN.setRadioCR(coding_rate);

  // Check status
  if (e == 0)
  {
    USB.println(F("6.1. Set Radio CR OK"));
  }
  else 
  {
    USB.print(F("6.1. Set Radio CR error = "));
    USB.println(e, DEC);
    status = 1;
  }

  // Get CR
  e = LoRaWAN.getRadioCR();

  // Check status
  if (e == 0) 
  {
    USB.print(F("6.2. Get Radio CR OK. ")); 
    USB.print(F("Coding Rate: "));
    USB.println(LoRaWAN._radioCR);
  }
  else 
  {
    USB.print(F("6.2. Get Radio CR error = ")); 
    USB.println(e, DEC);
    status = 1;
  }
  USB.println(F("-------------------------------------------------------"));



  //////////////////////////////////////////////
  // 7. Set/Get Radio Bandwidth (BW)
  //////////////////////////////////////////////

  // Set BW
  e = LoRaWAN.setRadioBW(bandwidth);

  // Check status
  if (e == 0)
  {
    USB.println(F("7.1. Set Radio BW OK"));
  }
  else 
  {
    USB.print(F("7.1. Set Radio BW error = "));
    USB.println(e, DEC);
  }

  // Get BW
  e = LoRaWAN.getRadioBW();

  // Check status
  if (e == 0) 
  {
    USB.print(F("7.2. Get Radio BW OK. ")); 
    USB.print(F("Bandwidth: "));
    USB.println(LoRaWAN._radioBW);
  }
  else 
  {
    USB.print(F("7.2. Get Radio BW error = ")); 
    USB.println(e, DEC);
    status = 1;
  }
  USB.println(F("-------------------------------------------------------"));



  //////////////////////////////////////////////
  // 8. Set/Get Radio CRC mode
  //////////////////////////////////////////////

  // Set CRC
  e = LoRaWAN.setRadioCRC(crc_mode);

  // Check status
  if (e == 0)
  {
    USB.println(F("8.1. Set Radio CRC mode OK"));
  }
  else 
  {
    USB.print(F("8.1. Set Radio CRC mode error = "));
    USB.println(e, DEC);
    status = 1;
  }

  // Get CRC
  e = LoRaWAN.getRadioCRC();

  // Check status
  if (e == 0) 
  {
    USB.print(F("8.2. Get Radio CRC mode OK. ")); 
    USB.print(F("CRC status: "));
    USB.println(LoRaWAN._crcStatus);
  }
  else 
  {
    USB.print(F("8.2. Get Radio CRC mode error = ")); 
    USB.println(e, DEC);
    status = 1;
  }
  USB.println(F("-------------------------------------------------------"));


  return status;
}
