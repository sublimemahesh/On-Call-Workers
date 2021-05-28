<?php
include_once(dirname(__FILE__) . '/../../class/include.php');

$SUPERVISOR = new Supervisor($_POST['id']);
$SUPERVISOR->name = $_POST['name'];
$SUPERVISOR->phone = $_POST['phone'];
$SUPERVISOR->email = $_POST['email'];
$SUPERVISOR->district = $_POST['district'];
$SUPERVISOR->city = $_POST['city'];
$SUPERVISOR->address = $_POST['address'];
$SUPERVISOR->nic = $_POST['nic'];
$SUPERVISOR->description = $_POST['description'];
$SUPERVISOR->type = $_POST['type'];

$handle1 = new Upload($_FILES['image_name']);
if ($handle1->uploaded) {
    $handle1->image_resize = true;
    $handle1->file_new_name_ext = 'jpg';
    $handle1->image_ratio_crop = 'C';
    if (empty($_POST['image_name_ex'])) {
        $SUPERVISOR->picture = Helper::randamId();
    }
    $handle1->file_new_name_body = explode(".", $SUPERVISOR->picture)[0];
    $handle1->file_overwrite = TRUE;
    $handle1->image_x = 300;
    $handle1->image_y = 300;
    $handle1->Process('../../upload/supervisor/profile/');
    $SUPERVISOR->picture = $handle1->file_dst_name;
}

$VALID = new Validator();
$VALID->check($SUPERVISOR, [
    'name' => ['required' => TRUE],
    'phone' => ['required' => TRUE],
    'email' => ['required' => TRUE],
    'district' => ['required' => TRUE],
    'city' => ['required' => TRUE],
    'address' => ['required' => TRUE],
    'nic' => ['required' => TRUE],
    'picture' => ['required' => TRUE],
    'description' => ['required' => TRUE],
    'type' => ['required' => TRUE]
]);
$checkEmail = $SUPERVISOR->checkEmail($_POST['id'], $_POST['email']);
if (!$checkEmail || $checkEmail['id'] == $_POST['id']) {
    if ($VALID->passed()) {
        $SUPERVISOR->update();
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
