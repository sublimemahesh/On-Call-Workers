<?php
include_once(dirname(__FILE__) . '/../../class/include.php');

if ($_POST['option'] == "ACTIVEMEMBER") {

    if (Supervisor::SupervisorActivation($_POST['supervisor'], 1)) {

        echo json_encode("activated");
        exit;
    }
}

if ($_POST['option'] == "INACTIVEMEMBER") {

    if (Supervisor::SupervisorActivation($_POST['supervisor'], 0)) {

        echo json_encode("inactivated");
        exit;
    }
}
