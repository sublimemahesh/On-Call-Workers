<?php



if (!isset($_SESSION)) {

    session_start();

}



if (!Supervisor::authenticate()) {

    redirect('login.php');

}