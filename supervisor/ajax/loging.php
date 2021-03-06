<?php
include_once(dirname(__FILE__) . '/../../class/include.php');

session_start();
$SUPERVISOR = new Supervisor(NULL);

$username = filter_var($_POST['login_email'], FILTER_SANITIZE_STRING);
$password = $_POST['login_password'];

if ($SUPERVISOR->login($username, md5($password))) {
    $data = $SUPERVISOR->login($username, md5($password));
    $result = ["status" => 'success'];
    echo json_encode($result);
    exit();
} else {
    $result = ["status" => 'error'];
    echo json_encode($result);
    exit();

}