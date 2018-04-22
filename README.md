<h1>Smart GreenHouse UAL</h1>
<B>Authors:</B> Vitor Hugo Augusto Rodrigues, German Ruano Garcia, Claudio Peña Rodriguez
<h2>I) Project Description</h2>
In this project we will simulate the communication and data collection of the sensors of a greenhouse, we will also make a visualization in an application and act according to the collected data.
	

<h2>II) Advanced Description of the Project</h2>
This project will be divided into three parts, external station, internal station and server-actuator

![Scheme](img/esquema.png)

<h2>II.I) External Station </h2>
In this part we will assemble the external station that will be responsible for measuring the external climate of the greenhouse.

It will collect the following data:

- Temperature
- Pressure
- Humidity
- Luminosity

<h3>External Station Assembly</h3>
For the assembly we will need:

- 1 x Waspmote
- 1 x Smart Cities Pro
- 1 x LoRa
- 1 x BME Sensor
- 1 x Luxe Sensor

| Component                 | Image                           |
| ------------------------- | ------------------------------- |
| Waspmote                  | ![Waspmote](img/was.png)     |
| Smart Cities Pro          | ![SmartCitie](img/smart.jpg) |
| LoRa                      | ![LoRa](img/lo.jpg)          |
| BME Sensor                | ![BME](img/bme.jpg)          |
| Luxe Sensor               | ![Luxe](img/luxe.jpg)        |

![Real](img/re.png)

<h3>Read Sensors from External Station</h3>
In the external station we will use the smart cities board, so we must include this library.

```
#include <WaspSensorCities_PRO.h>
````

The first thing will be to initialize the sensors with their socket.

![Init](img/init.png) 

To read the values ​​of the sensors we will use the following code.

![Read](img/read.png) 

<h3>Send Data with LoRa</h3>
Now we have the sensors data so we can send them to the internal station.
For this purpose we will use the LoRa communication, so we need include this library.

```
#include <WaspLoRaWAN.h>
````

For this we only need use the example of communication with LoRa (P2P) include in the Waspmote IDE. And initialize the LoRa socket.

![Ini](img/sock.png) 

We should only know that LoRa sends the messages in hexadecimal, so we must convert the values ​​of the sensors, with this code for example.

![Hex](img/hex.png) 

When we have the hexadecimal messages we only need use this function.

```
sendRadio()
````

![Radio](img/radio.png) 

<h3>Output</h3>

![Out](img/out.png)

<h2>II.II) Internal Station </h2>
In this part we will assemble the internal station that will be responsible for measuring the internal climate of the greenhouse.

It will collect the following data:

- Temperature
- Pressure
- Humidity
- Soil Moisture

<h3>Internal Station Assembly</h3>
For the assembly we will need:

- 1 x Waspmote
- 1 x Agriculture Sensor Pro
- 1 x LoRa
- 1 x BME Sensor
- 1 x Soil Moisture Sensor
- 1 x Wifi

| Component                 | Image                           |
| ------------------------- | ------------------------------- |
| Waspmote                  | ![Waspmote](img/was.png)     |
| Agriculture Sensor Pro    | ![Agriculture](img/agr.jpeg) |
| LoRa                      | ![LoRa](img/lo.jpg)          |
| BME Sensor                | ![BME](img/bme.jpg)          |
| Soil Moisture Sensor      | ![Soil](img/soil.png)        |
| Wifi                      | ![Wifi](img/wifi.png)        |


<h3>Read Sensors from Internal Station</h3>

In the internal station we will use the agricuture 3.0 board, so we must include this library.

```
#include <WaspSensorAgr_v30.h>
```
The first thing we have to do is to initialize the watermark and pt1000 sensors

```
watermarkClass wmSensor1(SOCKET_1);
pt1000Class pt1000Sensor;
```
To read the sensor we can use the following code.

```
Agriculture.ON();
sensorTemp = pt1000Sensor.readPT1000();  
sensorHum = wmSensor1.readWatermark();
temp = Agriculture.getTemperature();
humd  = Agriculture.getHumidity();
pres = Agriculture.getPressure(); 
```

<h3>Receive Data from LoraWan</h3>
We have used the same code as the libelium example.  

Just use this code to transalte the data to text

```
USB.println(F("--> Packet received"));
USB.print(F("packet: "));
USB.println((char*) LoRaWAN._buffer);
uint8_t bufferTranslated[100];
uint16_t size;
size = Utils.str2hex((char*) LoRaWAN._buffer, bufferTranslated,sizeof(bufferTranslated));
USB.println(bufferTranslated,size);
```
<h3>Send Data with Wifi</h3>

First we have to upload and execute the example called "WiFi PRO 01: Configure ESSID", just change the following lines with your router credentials.

````
char ESSID[] = "libelium_AP";
char PASSW[] = "password";
````
When you have executed that code, the waspmote board makes a file storaged in the sd card, this file will be used to connect to the WIFI when we call the following function

````
uint8_t socket1 = SOCKET1;
WIFI_PRO.ON(socket1);
````

Once we have reached this point, we used the same code as the libelium "WiFi PRO 15: HTTPS POST" example, just changing the following lines with your web server information

````
char type[] = "http";
char host[] = "192.168.43.180";
char port[] = "80";
char url[] = "smartgreenhouse/insertar.php?";
````

And that lines to say what want to send and how to send(POST or GET)

``
char body[] = "varA=1&varB=2&varC=3&varD=4&varE=5";
WIFI_PRO.post(body); 
``

<h2>II.III) Server-Actuator </h2>
