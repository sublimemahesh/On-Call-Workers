<!DOCTYPE html>
<?php
include '../class/include.php';

$SUPERVISOR = new Supervisor(NULL);

if ($SUPERVISOR->logOut()) {
    header('Location: ../');
}
?>
 
