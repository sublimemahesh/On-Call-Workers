<?php

include_once(dirname(__FILE__) . '/../../class/include.php');



$SUPERVISOR = new Supervisor(NULL);

if ($SUPERVISOR->logOut()) {
    header('location: ../login-or-register.php');
} else {
    header('location: ../?error=2');
}
 