<?php
$config["User"]["passwordMinLength"] = 6;
$config["User"]["passwordMaxLength"] = 30;

$config["General"]["cdn"] = false;

$config["Banner"]["defaultWidth"] = 700;
$config["Banner"]["panelWidth"] = 460;

$config["ActivityFeed"]["defaultWidth"] = 100;
$config["ActivityFeed"]["defaultHeight"] = 100;
// the number of days to populate feed from
$config["ActivityFeed"]["daysOfRelevance"] = 90;
$config["ActivityFeed"]["limit"] = 10;

$config["PostContentImage"]["defaultThumbWidth"] = 140;
$config["PostContentImage"]["defaultThumbHeight"] = 140;
$config["PostContentImage"]["defaultWidth"] = 720;
$config["PostContentImage"]["defaultHeight"] = 500;

# delivery options as specified in http://book.cakephp.org/view/1284/Class-Attributes-and-Variables
# debug, mail or smtp
$config["Email"]["delivery"] = "smtp";

# if delivery = "smtp"
$config["Email"]["smtpPort"] = 465;
$config["Email"]["smtpTimeout"] = 30;
$config["Email"]["smtpHost"] = "ssl://smtp.gmail.com";
$config["Email"]["smtpUsername"] = "amos.s.chan@gmail.com";
$config["Email"]["smtpPassword"] = "p@ssw0rD";

$config["Language"]["default"] = "eng";

