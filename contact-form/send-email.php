<?php

//------------------------- IMPORTANT -------------------------

require_once "Mail.php";

date_default_timezone_set('Asia/Colombo');
$todayis = date("l, F j, Y, g:i a");
$site_link = "https://" . $_SERVER['HTTP_HOST'];

//----------------------- DISPLAY STRINGS ---------------------
$comany_name = "HBS Tours and Taxi";
$website_name = "www.hbstoursandtaxi.com";
$comConNumber = "+94 76 887 8088";
$comEmail = "hbstoursandtaxi@gmail.com";
$comOwner = "HBS Tours and Taxi";
$customer_msg = 'Hello, and thank you for your interest in ' . $comany_name . '. We have received your enquiry , and we will get back to you as soon as possible.';

//----------------------- LOGO ---------------------------------

$logo = $site_link . '/contact-form/img/logo.png';
// $logo = 'https://ci4.googleusercontent.com/proxy/lz0tSijRTHwJ3I7PQ1iXA67lYFfULG0evRbR_St785VeiABNukQPJl-JGBcLKTkZz1q4pG6g25P1uxTW4dYkOznHHNV3f-zB=s0-d-e1-ft#http://romaya.galle.website/contact-form/img/logo.png';

// ----------------------- POST VARIABLES --------------------------

$visitor_name = $_POST['visitor_name'];
$visitor_email = $_POST['visitor_email'];
$visitor_phone = $_POST['visitor_phone'];
$subject = $_POST['subject'];
$message = $_POST['message'];


//---------------------- SERVER WEBMAIL LOGIN ------------------------

$host = "sg1-ls7.a2hosting.com";
$username = "info@hbstoursandtaxi.com";
$password = ".9Bd6V^w=bSg";

// $host = "sg1-ls7.a2hosting.com";
// $username = "info@srilankapetertours.com";
// $password = "Peter@7027";
// $password = "(yq5,xL*HVoV";

//------------------------ MAIL ESSENTIALS --------------------------------

$webmail = "info@hbstoursandtaxi.com";
$visitorSubject = "Thank You " . $visitor_name . " - HBS Tours & Taxi";
$companySubject = "Contact Inquiry - " . $visitor_name;

//----------------------CAPTCHACODE---------------------

session_start();

$response = array();

if ($_SESSION['CAPTCHACODE'] != $_POST['captchacode']) {

    $response['status'] = 'incorrect';

    $response['msg'] = 'Security Code is invalid';

    echo json_encode($response);

    exit();
}

include("mail-template.php");


$visitorHeaders = array('MIME-Version' => '1.0', 'Content-Type' => "text/html; charset=ISO-8859-1", 'From' => $webmail,
    'To' => $visitor_email,
    'Reply-To' => $comEmail,
    'Subject' => $visitorSubject);

$companyHeaders = array('MIME-Version' => '1.0', 'Content-Type' => "text/html; charset=ISO-8859-1", 'From' => $webmail,
    'To' => $webmail,
    'Reply-To' => $visitor_email,
    'Subject' => $companySubject);


$smtp = Mail::factory('smtp', array('host' => $host,
            'auth' => true,
            'username' => $username,
            'password' => $password));

$visitorMail = $smtp->send($visitor_email, $visitorHeaders, $visitor_message);
$companyMail = $smtp->send($webmail, $companyHeaders, $company_message);

if (PEAR::isError($visitorMail && $companyMail)) {

    $response['status'] = 'correct';

    $response['msg'] = $mail->getMessage();

//"Your message has not been sent"

    echo json_encode($response);

    exit();
} else {
    $response['status'] = 'correct';

    $response['msg'] = "Your message has been sent successfully";

//"Your message has been sent successfully"

    echo json_encode($response);

    exit();
}
