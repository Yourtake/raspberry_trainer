#!/usr/bin/python
# Import the modules to send commands to the system and access GPIO pins 
#from subprocess
import RPi.GPIO as GPIO 
import time 
import os 
GPIO.setmode(GPIO.BCM) 
GPIO.setwarnings(False) 

GPIO.setup(16, GPIO.IN) 
GPIO.setup(17, GPIO.IN) 
GPIO.setup(19, GPIO.OUT) 
GPIO.setup(18, GPIO.OUT) 
GPIO.output(18, GPIO.HIGH) 
GPIO.output(19, GPIO.HIGH) 

while True:
	GPIO.output(19, GPIO.LOW)
	time.sleep(0.05)
	GPIO.output(19, GPIO.HIGH)
	time.sleep(0.06)
	if(GPIO.input(17) == True):
		print("Shutdown Button Pressed")
		os.system("sudo shutdown -h now")
	if(GPIO.input(16) == True ):
		print("Reboot Button Pressed")
		#GPIO.output(18,GPIO.LOW)
		os.system("sudo shutdown -r now")
  

