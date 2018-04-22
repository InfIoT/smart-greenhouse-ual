#!usr/bin/env/ python

#Importamos la libreria y le cambiamos el nombre a GPIO
import RPi.GPIO as GPIO
#Establecemos el sistema de numeracion que queramos, 
#en este caso el sistema BCM
GPIO.setmode(GPIO.BCM)
#Configuramos el pin GPIO 5 como una salida
GPIO.setup(5, GPIO.OUT)
#Encendemos el led
GPIO.output(5, GPIO.HIGH)

