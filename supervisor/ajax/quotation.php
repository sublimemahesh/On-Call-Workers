<?php
include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['add-quotation'])) {
    $QUOTATION = new Quotation(NULL);
    $QUOTATION->supervisor = $_POST['supervisor'];
    $QUOTATION->title = $_POST['title'];
    $QUOTATION->job = $_POST['job'];

    $VALID = new Validator();
    $VALID->check($QUOTATION, [
        'title' => ['required' => TRUE],
        'supervisor' => ['required' => TRUE],
        'job' => ['required' => TRUE]
    ]);
    if ($VALID->passed()) {
        $res = $QUOTATION->create();
        if($res) {
            $JOB = new Job($_POST['job']);
            $JOB->status = 2;
            $JOB->updateStatus();
        }
        $result = ["status" => 'success', "id" => $res->id];
        echo json_encode($result);
        exit();
    } else {
        $result = ["status" => 'error'];
        echo json_encode($result);
        exit();
    }
}
if (isset($_POST['edit-quotation'])) {

    $QUOTATION = new Quotation($_POST['id']);
    $QUOTATION->title = $_POST['title'];

    $VALID = new Validator();
    $VALID->check($QUOTATION, [
        'title' => ['required' => TRUE]
    ]);
    if ($VALID->passed()) {
        $res = $QUOTATION->update();
        $JOB = new Job($QUOTATION->job);
        $result = ["status" => 'success', "id" => $res->id, "job" => $JOB->id];
        echo json_encode($result);
        exit();
    } else {
        $result = ["status" => 'error'];
        echo json_encode($result);
        exit();
    }
}
if ($_POST['option'] == 'delete') {

    $QUOTATION = new Quotation($_POST['id']);

    $result = $QUOTATION->delete();

    if ($result) {
        $data = array("status" => TRUE);
        header('Content-type: application/json');
        echo json_encode($data);
    }
}
