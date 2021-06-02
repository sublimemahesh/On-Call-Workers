<?php

//------------------------- IMPORTANT -------------------------

include_once(dirname(__FILE__) . '/../class/include.php');

date_default_timezone_set('Asia/Colombo');
$todayis = date("l, F j, Y, g:i a");
$site_link = "https://" . $_SERVER['HTTP_HOST'];

//----------------------- DISPLAY STRINGS ---------------------
$comany_name = "On Call Workers";
$website_name = "www.oncallworkers.lk";
$comConNumber = "(+94) 27 7211 300";
$comEmail = "info@oncallworkers.lk";
$comOwner = "Team On Call Workers";
$customer_msg = 'Hello, and thank you for your interest in ' . $comany_name . '. We have received your enquiry, and we will get back to you as soon as possible.';
$reply_email_name = 'ON CALL WORKERS';
//----------------------- LOGO ---------------------------------

$logo = $site_link . '/contact-form/img/logo.png';
// $logo = 'https://ci4.googleusercontent.com/proxy/lz0tSijRTHwJ3I7PQ1iXA67lYFfULG0evRbR_St785VeiABNukQPJl-JGBcLKTkZz1q4pG6g25P1uxTW4dYkOznHHNV3f-zB=s0-d-e1-ft#http://romaya.galle.website/contact-form/img/logo.png';

// ----------------------- POST VARIABLES --------------------------

$visitor_name = $_POST['visitor_name'];
$visitor_email = $_POST['visitor_email'];
$visitor_phone = $_POST['visitor_phone'];
//$visitor_subject = $_POST['subject'];
$message = $_POST['message'];


//------------------------ MAIL ESSENTIALS --------------------------------

$webmail = "test@synotec.lk";
// $webmail = "info@oncallworkers.lk";
$visitorSubject = "Thank You " . $visitor_name . " - " . $comany_name;
$companySubject = "Contact Inquiry - " . $visitor_name;

//----------------------CAPTCHACODE---------------------

session_start();
$response = array();

if ($_SESSION['CAPTCHACODE'] != $_POST['captchacode']) {
    $response['status'] = 'wrong_code';
    $response['msg'] = 'Security Code is invalid';
    echo json_encode($response);
    exit();
}

include("mail-template.php");

$HELPER = new Helper();
$visitorMail = $HELPER->PHPMailer($webmail, $comany_name, $comEmail, $reply_email_name, $visitor_email, $visitor_name, $visitorSubject, $visitor_message);

$companyMail = $HELPER->PHPMailer($webmail, $visitor_name, $visitor_email, $visitor_name, $comEmail, $comany_name, $companySubject, $company_message);

if ($visitorMail && $companyMail) {
    $response['status'] = 'correct';
    $response['msg'] = "Your message has been sent successfully";
    echo json_encode($response);
    exit();
} else {
    $response['status'] = 'incorrect';
    $response['msg'] = "Your message has not been sent";
    echo json_encode($response);
    exit();
}
