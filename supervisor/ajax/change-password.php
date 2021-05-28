<?php
include_once(dirname(__FILE__) . '/../../class/include.php');
session_start();

$SUPERVISOR = new Supervisor($_SESSION['m_id']);

$OldPassOk = Supervisor::checkOldPass($_SESSION['m_id'], $_POST["oldPass"]);

if ($_POST["newPass"] === $_POST["confPass"]) {
    if ($OldPassOk) {
        $result = Supervisor::changePassword($_SESSION['m_id'], $_POST["newPass"]);
        if ($result == 'TRUE') {
            $result = ["status" => 'success'];
            echo json_encode($result);
            exit();
        } else {
            $result = ["status" => 'error'];
            echo json_encode($result);
            exit();
        }
    } else {
        $result = ["status" => 'error1'];
        echo json_encode($result);
        exit();
    }
} else {
    $result = ["status" => 'error2'];
    echo json_encode($result);
    exit();
}
