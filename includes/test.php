<?php

include("php-mailjet-v3-simple.class.php");


function sendEmail() {
    $mj = new Mailjet();
    $params = array(
        "method" => "POST",
        "from" => "info@getdstv.co.ke",
        "to" => "kevinwaki@gmail.com",
        "subject" => "Hello World!",
        "html" => "<html>Greetings from Mailjet </html>"
    );

    $result = $mj->sendEmail($params);

    if ($mj->_response_code == 200)
       echo "success - email sent";
    else
       echo "error - ".$mj->_response_code;

    return $result;
}
sendEmail();
?>