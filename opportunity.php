<?php

$from = $_POST['email'];

$fromName = $_POST['name'];
$to = 'denschools2016@gmail.com';
$toName = 'support';
$subject = 'Hii';
$message = $_POST['phonenumber'];


require_once dirname(__FILE__).'/MailSendingWorker.php';
$mailSendingWorker2 = new MailSendingWorker();

$result = $mailSendingWorker2->send($from, $fromName, $to, $toName, $subject, $message);


echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Your details has been sent successfully. We will contact you shortly.')
    window.location.href='http://192.168.0.3/website1/career.html';
    </SCRIPT>");

?>