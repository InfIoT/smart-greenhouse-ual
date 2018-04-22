#!usr/bin/env/ python

#Import the library and change the name to GPIO
import RPi.GPIO as GPIO
#Establish the numbering system that we want, in this case the BCM system
GPIO.setmode(GPIO.BCM)
#Configure GPIO 26 pin as an output
GPIO.setup(26, GPIO.OUT)
#Turn on the LED
GPIO.output(26, GPIO.HIGH)

