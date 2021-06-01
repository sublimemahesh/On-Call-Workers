<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');

if ($_POST['option'] == "ASSIGNSUPERVISOR") {

    $JOB = new Job($_POST['job']);
    $VALID = new Validator();

    $JOB->supervisor = $_POST['supervisor'];

    $res = $JOB->assignSupervisor();
    if ($res) {
        $result = 'success';
    } else {
        $result = 'error';
    }

    echo json_encode($result);
    exit();
}
if ($_POST['option'] == "APPROVEJOB") {

    $JOB = new Job($_POST['id']);
    $JOB->status = 3;

    $res = $JOB->updateStatus();
    if ($res) {
        $result = 'success';
    } else {
        $result = 'error';
    }

    echo json_encode($result);
    exit();
}
if ($_POST['option'] == "COMPLETEJOB") {

    $JOB = new Job($_POST['id']);
    $JOB->status = 4;

    $res = $JOB->updateStatus();
    if ($res) {
        $result = 'success';
    } else {
        $result = 'error';
    }

    echo json_encode($result);
    exit();
}