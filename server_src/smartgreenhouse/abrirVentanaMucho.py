import RPi.GPIO as GPIO
import time

GPIO.setmode(GPIO.BOARD)
GPIO.setup(7,GPIO.OUT)

p = GPIO.PWM(7,50)
p.start(12.5)

try:

		p.ChangeDutyCycle(12.5)
		time.sleep(0.5)

except KeyboardInterrupt:
	p.stop()

	GPIO.cleanup()
