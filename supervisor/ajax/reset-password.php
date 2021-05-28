<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
session_start();

$SUPERVISOR = new Supervisor(NULL);
$code = $_POST["code"];
$password = $_POST["password"];
$confpassword = $_POST["confirm_password"];

if ($SUPERVISOR->SelectResetCode($code)) {
    $SUPERVISOR->updatePassword($password, $code);
    $result = ["status" => 'success'];
    echo json_encode($result);
    exit();
} else {
    $result = ["status" => 'error'];
    echo json_encode($result);
    exit();
}
