<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
session_start();

$SUPERVISOR = new Supervisor(NULL);

$email = $_POST['login_email'];

if ($SUPERVISOR->checkEmailForResetPassword($email)) {

    if ($SUPERVISOR->GenarateCode($email)) {
        $res = $SUPERVISOR->selectForgetSupervisor($email);

        require_once "Mail.php";
        date_default_timezone_set('Asia/Colombo');
        $todayis = date("l, F j, Y, g:i a");
        $site_link = "http://" . $_SERVER['HTTP_HOST'];

        $name = $SUPERVISOR->name;
        $visitor_email = $SUPERVISOR->email;
        $resetcode = $SUPERVISOR->resetcode;
        //---------------------- SERVER WEBMAIL LOGIN ------------------------
        $host = "sg1-ls7.a2hosting.com";
        $username = "test@synotec.lk";
        $password = "x_EC#_KC!,7s";
        $port = 465;
        //------------------------ MAIL ESSENTIALS --------------------------------

        $comEmail = "test@synotec.lk";
        $webmail = "test@synotec.lk";
        $visitorSubject = "Supervisor Dashboard - Password Reset";

        $html = "<table style='border:solid 1px #F0F0F0; font-size: 15px; font-family: sans-serif; padding: 0;'>";

        $html .= "<tr><th colspan='3' style='font-size: 18px; padding: 30px 25px 0 25px; color: #fff; text-align: center; background-color: #4184F3;'><h2>On Call Workers</h2> </th> </tr>";

        $html .= "<tr><td colspan='3' style='font-size: 16px; padding: 20px 25px 10px 25px; color: #333; text-align: left; background-color: #fff;'><h3>" . $subject . "</h3> </td> </tr>";

        $html .= "<tr><td colspan='3' style='font-size: 14px; padding: 5px 25px 10px 25px; color: #666; background-color: #fff; line-height: 25px;'><b>Password Reset Code: </b> " . $resetcode . "</td></tr>";

        $html .= "<tr><td colspan='3' style='font-size: 14px; background-color: #FAFAFA; padding: 25px; color: #333; font-weight: 300; text-align: justify; '>Thank you</td></tr>";

        $html .= "</table>";

        $visitorHeaders = array(
            'MIME-Version' => '1.0', 'Content-Type' => "text/html; charset=ISO-8859-1", 'From' => $webmail,
            'To' => $visitor_email,
            'Reply-To' => $comEmail,
            'Subject' => $visitorSubject
        );
        $smtp = Mail::factory('smtp', array(
            'host' => $host,
            'auth' => true,
            'username' => $username,
            'password' => $password
        ));
        $visitorMail = $smtp->send($visitor_email, $visitorHeaders, $html);

        if (PEAR::isError($visitorMail)) {
            $result = ["status" => 'error'];
            echo json_encode($result);
            exit();
        } else {
            $result = ["status" => 'success'];
            echo json_encode($result);
            exit();
        }
    }

    exit();
} else {
    $result = ["status" => 'email_does_not_exist'];
    echo json_encode($result);
    exit();
}
