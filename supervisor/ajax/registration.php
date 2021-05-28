<?php
include_once(dirname(__FILE__) . '/../../class/include.php');
session_start();

$SUPERVISOR = new Supervisor(NULL);
$SUPERVISOR->name = $_POST['name'];
$SUPERVISOR->phone = $_POST['phone'];
$SUPERVISOR->email = $_POST['email'];
$SUPERVISOR->password = md5($_POST['password']);
if (isset($_POST['subscribe'])) {
    $SUPERVISOR->is_subscribed = 1;
} else {
    $SUPERVISOR->is_subscribed = 0;
}

$checkEmail = $SUPERVISOR->checkEmail(null, $_POST['email']);
if (!$checkEmail) {
    $SUPERVISOR->create();
    if ($SUPERVISOR->id) {
        $data = $SUPERVISOR->login($SUPERVISOR->email, $SUPERVISOR->password);
        $result = ["status" => 'success'];
        echo json_encode($result);
        exit();
    } else {
        $redirect = '';
        $result = ["status" => 'error', 'redirect' => $redirect];
        echo json_encode($result);
        exit();
    }
} else {
    $result = ["status" => 'emailex'];
    echo json_encode($result);
    exit();
}
