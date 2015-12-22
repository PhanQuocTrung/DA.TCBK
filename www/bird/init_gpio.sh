#! /bin/bash

#Initialisation GPIO pin in out mode and set to 0

#GPIO 8 in out mode and set to 0 (OFF): for white leds
/usr/local/bin/gpio mode 8 out
/usr/local/bin/gpio write 8 0

#GPIO 9 in out mode and set to 1 (ON): for IR leds
/usr/local/bin/gpio mode 9 out
/usr/local/bin/gpio write 9 1

