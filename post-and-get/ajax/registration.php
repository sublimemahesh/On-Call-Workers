<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
session_start();
if (isset($_POST['create'])) {
    if ($_SESSION['CAPTCHACODE'] == $_POST['captcha']) {
        $WORKER = new Worker(NULL);


        $WORKER->category = $_POST['category'];
        $WORKER->sub_category = $_POST['sub_category'];
        $WORKER->name = $_POST['name'];
        $WORKER->phone = $_POST['phone'];
        $WORKER->email = $_POST['email'];
        $WORKER->district = $_POST['district'];
        $WORKER->city = $_POST['city'];

        $res = $WORKER->create();
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
