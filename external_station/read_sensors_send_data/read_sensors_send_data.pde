///////////////////////////////////////////
// Libraries
//////////////////////////////////////////
#include <WaspSensorCities_PRO.h>
#include <WaspLoRaWAN.h>

///////////////////////////////////////////
// Socket connections for sensor/LoRa
///////////////////////////////////////////
bmeCitiesSensor  bme(SOCKET_4);
luxesCitiesSensor luxes(SOCKET_2);
uint8_t socket = SOCKET0;
///////////////////////////////////////////
// Variables
///////////////////////////////////////////
float temperature;  // Stores the temperature in ºC
float humidity;   // Stores the realitve humidity in %RH
float pressure;   // Stores the pressure in Pa
float lum; //Stores the luminosity in luxes
uint8_t error;
///////////////////////////////////////////
// Radio Settings
///////////////////////////////////////////
uint8_t power = 15;
uint32_t frequency;
char spreading_factor[] = "sf12";
char coding_rate[] = "4/5";
uint16_t bandwidth = 125;
char crc_mode[] = "on";

void setup()
{
  USB.println(F("Estacion Externa"));
  USB.println(F("Temperature, humidity and pressure sensor, Luxes sensor"));
  USB.println(F("Radio P2P - Sending packets\n"));

  // Module setup
  error = radioModuleSetup();
  
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
  ///////////////////////////////////////////
  // 1. Power on  sensors
  ///////////////////////////////////////////
  ///////////////////BME Sensor////////////////////////////////
  // switch on BME sensor (temperature, humidity and pressure)
  bme.ON();
  // Read enviromental variables
  temperature = bme.getTemperature();
  humidity = bme.getHumidity();
  pressure = bme.getPressure();
  // Power off the BME sensor
  bme.OFF();
  ///////////////////Luxes Sensor////////////////////////////////
  // switch on luxes sensor
  luxes.ON();
  // Read the luminosity sensor
  lum = luxes.getLuminosity();
  // Power off the luxes sensor
  luxes.OFF();

  ///////////////////////////////////////////
  // 2. Screen Format
  ///////////////////////////////////////////
  // And print the values via USB
  USB.println(F("***************************************"));
  USB.print(F("Temperature: "));
  USB.printFloat(temperature, 3);
  USB.println(F(" Celsius degrees"));
  USB.print(F("RH: "));
  USB.printFloat(humidity, 3);
  USB.println(F(" %"));
  USB.print(F("Pressure: "));
  USB.printFloat(pressure, 3);
  USB.println(F(" Pa"));
  USB.println(F("***************************************"));
  USB.print(F("Luminosity: "));
  USB.print(lum);
  USB.println(F(" luxes"));
  USB.println(F("***************************************"));

  // Conversion Hexadecimal
  char temp[20];
  char lux[20];
  char pre[10];
  char hum[10];
  Utils.float2String (lum, lux, 3);
  Utils.float2String (temperature, temp, 3);
  Utils.float2String (pressure, pre, 3);
  Utils.float2String (humidity, hum, 3);
  char message[800];
  sprintf(message,"TEMPEXT=%s&PRESEXT=%s&HUMEXT=%s&LUMINOSIDAD=%s",temp,pre,hum,lux);
  char payload_hex[1600];
  Utils.hex2str((uint8_t*)message, payload_hex,strlen(message));
  USB.println(message);
  USB.println(payload_hex);
  
  // Send packet
  error = LoRaWAN.sendRadio(payload_hex);
  
  // Check status
  if (error == 0)
  {
    USB.println(F("--> Packet sent OK"));
  }
  else 
  {
    USB.print(F("Error waiting for packets. error = "));  
    USB.println(error, DEC);   
  }
  
  delay(5000);

}

/***********************************************************************************
*
* radioModuleSetup()
*
*   This function includes all functions related to the module setup and configuration
*   The user must keep in mind that each time the module powers on, all settings are set
*   to default values. So it is better to develop a specific function including all steps
*   for setup and call it everytime the module powers on.
*
*
***********************************************************************************/
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
