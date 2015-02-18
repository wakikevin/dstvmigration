<?php

include('includes/functions.php');

$htmllink = 'scangroup/index.html';
$message = file_get_contents($htmllink);

$message = str_replace(chr(194),"", $message);
//send email to admin
sendEmail('kevinwaki@gmail.com','DSTV Kenya',$message);