s#!/bin/bash

# this is the cron line goes in cron tab
# /bin/bash /home/readachunk/readachunk.com/cron.sh

#the following is what is intended to do

cd /home/readachunk/readachunk.com

/usr/local/bin/php scheduler.php
