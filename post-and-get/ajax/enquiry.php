<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
session_start();
if (isset($_POST['create'])) {
    if ($_SESSION['CAPTCHACODE'] == $_POST['captcha']) {
        $JOB = new Job(NULL);


        $JOB->category = $_POST['category'];
        $JOB->sub_category = $_POST['sub_category'];
        $JOB->description = $_POST['description'];
        $JOB->district = $_POST['district'];
        $JOB->city = $_POST['city'];
        $JOB->name = $_POST['name'];
        $JOB->phone = $_POST['phone'];
        $JOB->email = $_POST['email'];

        $res = $JOB->create();
        if ($res) {
            $result = 'success';
        } else {
            $result = 'error';
        }

        echo json_encode($result);
        exit();
    } else {
        $result = 'wrong_code';
        echo json_encode($result);
        exit();
    }
}
