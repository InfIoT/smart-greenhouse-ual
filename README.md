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

For this we only need use the example of communication with LoRa (P2P) include in the Waspmote IDE.
We should only know that LoRa sends the messages in hexadecimal, so we must convert the values ​​of the sensors, with this code for example.

![Hex](img/hexa.png) 

When we have the hexadecimal messages we only need use this function.

```
sendRadio()
````

![Radio](img/radio.png) 


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



<h3>Send Data with Wifi</h3>

<h2>II.III) Server-Actuator </h2>