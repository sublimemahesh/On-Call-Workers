<?php
include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['add-quotation-item'])) {
    $QUOTATION_ITEM = new QuotationItem(NULL);
    $QUOTATION_ITEM->quotation = $_POST['quotation'];
    $QUOTATION_ITEM->amount = $_POST['amount'];
    $QUOTATION_ITEM->description = $_POST['description'];

    $VALID = new Validator();
    $VALID->check($QUOTATION_ITEM, [
        'quotation' => ['required' => TRUE],
        'amount' => ['required' => TRUE],
        'description' => ['required' => TRUE]
    ]);
    if ($VALID->passed()) {
        $res = $QUOTATION_ITEM->create();
        $result = ["status" => 'success', "id" => $res->id];
        echo json_encode($result);
        exit();
    } else {
        $result = ["status" => 'error'];
        echo json_encode($result);
        exit();
    }
}
if (isset($_POST['edit-quotation-item'])) {

    $QUOTATION_ITEM = new QuotationItem($_POST['id']);
    $QUOTATION_ITEM->amount = $_POST['amount'];
    $QUOTATION_ITEM->description = $_POST['description'];

    $VALID = new Validator();
    $VALID->check($QUOTATION_ITEM, [
        'amount' => ['required' => TRUE],
        'description' => ['required' => TRUE]
    ]);
    if ($VALID->passed()) {
        $res = $QUOTATION_ITEM->update();
        $result = ["status" => 'success', "id" => $res->id, "quotation" => $res->quotation];
        echo json_encode($result);
        exit();
    } else {
        $result = ["status" => 'error'];
        echo json_encode($result);
        exit();
    }
}
if ($_POST['option'] == 'delete') {

    $QUOTATION_ITEM = new QuotationItem($_POST['id']);

    $result = $QUOTATION_ITEM->delete();

    if ($result) {
        $data = array("status" => TRUE);
        header('Content-type: application/json');
        echo json_encode($data);
    }
}
