#!usr/bin/env/ python

#Import the library and change the name to GPIO
import RPi.GPIO as GPIO
#Establish the numbering system that we want, in this case the BCM system
GPIO.setmode(GPIO.BCM)
#Configure GPIO 5 pin as an output
GPIO.setup(5, GPIO.OUT)
#Turn on the led
GPIO.output(5, GPIO.HIGH)

