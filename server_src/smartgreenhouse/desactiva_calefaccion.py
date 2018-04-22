#!usr/bin/env/ python

#Importamos la libreria y le cambiamos el nombre a GPIO
import RPi.GPIO as GPIO
#Establecemos el sistema de numeracion que queramos, 
#en este caso el sistema BCM
GPIO.setmode(GPIO.BCM)
#Configuramos el pin GPIO 26 como una salida
GPIO.setup(26, GPIO.OUT)
#Apagamos el led
GPIO.output(26, GPIO.LOW)
#Y liberamos los GPIO
GPIO.cleanup()
