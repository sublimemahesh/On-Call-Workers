<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');

if (isset($_POST['create'])) {

    $SUPERVISOR = new Supervisor(NULL);
    $VALID = new Validator();

    $SUPERVISOR->name = $_POST['name'];
    $SUPERVISOR->phone = $_POST['phone'];
    $SUPERVISOR->email = $_POST['email'];
    $SUPERVISOR->nic = $_POST['nic'];
    $SUPERVISOR->address = $_POST['address'];
    $SUPERVISOR->district = $_POST['district'];
    $SUPERVISOR->city = $_POST['city'];

    $res = $SUPERVISOR->create();
    if ($res) {
        $SUPERVISOR->sendRegistrationEmail();
        $result = 'success';
    } else {
        $result = 'error';
    }

    echo json_encode($result);
    exit();
}

if (isset($_POST['update'])) {

    $SUPERVISOR = new Supervisor($_POST['id']);

    $SUPERVISOR->name = $_POST['name'];
    $SUPERVISOR->phone = $_POST['phone'];
    $SUPERVISOR->email = $_POST['email'];
    $SUPERVISOR->nic = $_POST['nic'];
    $SUPERVISOR->address = $_POST['address'];
    $SUPERVISOR->district = $_POST['district'];
    $SUPERVISOR->city = $_POST['city'];
    $res = $SUPERVISOR->update();

    if ($res) {
        $result = 'success';
    } else {
        $result = 'error';
    }
    echo json_encode($result);
    exit();
}

if (isset($_POST['arrange'])) {

    foreach ($_POST['sort'] as $key => $img) {
        $key = $key + 1;
        $SUPERVISOR = Supervisor::arrange($key, $img);
    }
    $result = ["status" => 'success'];
    echo json_encode($result);
    exit();
}

if ($_POST['option'] == "ACTIVEMEMBER") {

    if (Supervisor::MemberActivation($_POST['supervisor'], 1)) {

        echo json_encode("activated");
        exit;
    }
}

if ($_POST['option'] == "INACTIVEMEMBER") {

    if (Supervisor::MemberActivation($_POST['supervisor'], 0)) {

        echo json_encode("inactivated");
        exit;
    }
}
if ($_POST['option'] == "GETALLSUPERVISORS") {
    $supervisors = Supervisor::all();
// foreach($supervisors as $supervisor) {

// }
// $arr1 = array();
// $arr1 = ['#ff0000': 'Red'],
// '#00ff00': 'Green',
// '#0000ff': 'Blue'];
    echo json_encode($supervisors);
    exit;
}
