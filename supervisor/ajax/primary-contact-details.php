<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
include_once(dirname(__FILE__) . '/../auth.php');

if ($_POST['action'] == 'send_email_verification') {


    $SUPERVISOR = new Supervisor($_POST['supervisor_id']);
    $SUPERVISOR->e_verification_code = rand(10000, 99999);
    $result = $SUPERVISOR->update();
    $HELPER = new Helper(NULL);

    $sent_from_email = 'noreply@oncallworkers.lk';
    $sent_from_name = 'ONCALLWORKERS';
    $recipient_email = $SUPERVISOR->email;
    $recipient_email_name = $SUPERVISOR->name;
    $subject = 'Email Verification Code - ON CALL WORKERS';
    $reply_email = 'noreply@oncallworkers.lk';
    $reply_email_name = 'ONCALLWORKERS';


    // Compose a simple HTML email message
    $message = '<html>';
    $message .= '<body>';
    $message .= '<div  style="padding: 10px; max-width: 650px; background-color: #f2f1ff; border: 1px solid #d4d4d4;">';
    $message .= '<h4>Thank you for registering on www.oncallworkers.lk</h4>';
    $message .= '<p>You must verify your email before publishing content on the website. Please copy the below code and insert into the verification page of the website!</p>';
    $message .= '<p>Email: ' . $SUPERVISOR->email . '</p>';
    $message .= '<hr/>';
    $message .= '<h3>Verification Code : ' . $SUPERVISOR->e_verification_code . '</h3>';
    $message .= '<hr/>';
    $message .= '<p>Thanks & Best Regards!.. <br/> www.oncallworkers.lk<p/>';
    $message .= '<small>*Please do not reply to this email. This is an automated email & you will not receive a response.</small><br/>';
    $message .= '<span>Hotline: +94 77 123 4567 </span><br/>';
    $message .= '<span>Email: info@oncallworkers.lk</span>';
    $message .= '</div>';
    $message .= '</body>';
    $message .= '</html>';

    if ($HELPER->PHPMailer($sent_from_email, $sent_from_name, $reply_email, $reply_email_name, $recipient_email, $recipient_email_name, $subject, $message)) {
        header('Content-Type: application/json; charset=UTF8');
        $response['status'] = 'success';
        $response['code'] = $SUPERVISOR->e_verification_code;
        $response['email'] = $SUPERVISOR->email;
        echo json_encode($response);
        exit();
    } else {
        header('Content-Type: application/json; charset=UTF8');
        $response['status'] = 'error';
        echo json_encode($response);
    }
}

if ($_POST['action'] == 'email_verification_code') {

    $SUPERVISOR = new Supervisor($_POST['supervisor_id']);

    if ($SUPERVISOR->e_verification_code == $_POST['email_verification_code']) {
        $SUPERVISOR->email_verified = 1;
        $result = $SUPERVISOR->update();
        if ($result) {
            header('Content-Type: application/json; charset=UTF8');
            $response['status'] = 'success';
            echo json_encode($response);
            exit();
        } else {
            header('Content-Type: application/json; charset=UTF8');
            $response['status'] = 'error';
            echo json_encode($response);
        }
    } else {
        header('Content-Type: application/json; charset=UTF8');
        $response['status'] = 'incorrect';
        echo json_encode($response);
    }
}

if ($_POST['action'] == 'change_email') {
    $HELPER = new Helper(NULL);
    $SUPERVISOR = new Supervisor($_POST['supervisor_id']);
    $SUPERVISOR->e_verification_code = rand(10000, 99999);
    $SUPERVISOR->email_verified = 0;
    $SUPERVISOR->email = $_POST['email'];
    $result = $SUPERVISOR->update();

    $sent_from_email = 'noreply@oncallworkers.lk';
    $sent_from_name = 'ONCALLWORKERS';
    $recipient_email = $SUPERVISOR->email;
    $recipient_email_name = $SUPERVISOR->name;
    $subject = 'Email Verification Code - ON CALL WORKERS';
    $reply_email = 'noreply@oncallworkers.lk';
    $reply_email_name = 'ONCALLWORKERS';


    // Compose a simple HTML email message
    $message = '<html>';
    $message .= '<body>';
    $message .= '<div  style="padding: 10px; max-width: 650px; background-color: #f2f1ff; border: 1px solid #d4d4d4;">';
    $message .= '<h4>Thank you for registering on www.oncallworkers.lk</h4>';
    $message .= '<p>You must verify your email before publishing content on the website. Please copy the below code and insert into the verification page of the website!</p>';
    $message .= '<p>Email: ' . $SUPERVISOR->email . '</p>';
    $message .= '<hr/>';
    $message .= '<h3>Verification Code : ' . $SUPERVISOR->e_verification_code . '</h3>';
    $message .= '<hr/>';
    $message .= '<p>Thanks & Best Regards!.. <br/> www.oncallworkers.lk<p/>';
    $message .= '<small>*Please do not reply to this email. This is an automated email & you will not receive a response.</small><br/>';
    $message .= '<span>Hotline: +94 77 123 4567 </span><br/>';
    $message .= '<span>Email: info@oncallworkers.lk</span>';
    $message .= '</div>';
    $message .= '</body>';
    $message .= '</html>';

    if ($HELPER->PHPMailer($sent_from_email, $sent_from_name, $reply_email, $reply_email_name, $recipient_email, $recipient_email_name, $subject, $message)) {
        header('Content-Type: application/json; charset=UTF8');
        $response['status'] = 'success';
        $response['code'] = $SUPERVISOR->e_verification_code;
        $response['email'] = $SUPERVISOR->email;
        echo json_encode($response);
        exit();
    } else {
        header('Content-Type: application/json; charset=UTF8');
        $response['status'] = 'error';
        echo json_encode($response);
    }
}
