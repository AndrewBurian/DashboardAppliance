#!/bin/bash

# Make sure only root can run the shell script.
if [[ $EUID -ne 0 ]]; then
	echo "This script must be run as root"
	exit 1
fi


#update/upgrade the pi software
#apt-get update && sudo apt-get upgrade -y

#install all of the needed packages
#apt-get install chromium x11-xserver-utils unclutter matchbox


#Set the pi to always use HDMI output even if it isn't plugged in.
#Set change the /boot/config.txt
#Uncomment the line hdmi_force_hotplug=1


#other maybe useful information
#http://mainstreetanswers.org/raspbian.php
