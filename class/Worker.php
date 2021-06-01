<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of Worker
 *
 * @author Suharshana DsW
 */
class Worker
{
    public $id;
    public $registeredAt;
    public $category;
    public $sub_category;
    public $name;
    public $email;
    public $phone;
    public $district;
    public $city;
    public function __construct($id)
    {
        if ($id) {
            $query = "SELECT * FROM `worker` WHERE `id`=" . $id;
            $db = new Database();
            $result = mysql_fetch_array($db->readQuery($query));
            $this->id = $result['id'];
            $this->registeredAt = $result['registered_at'];
            $this->category = $result['category'];
            $this->sub_category = $result['sub_category'];
            $this->name = $result['name'];
            $this->email = $result['email'];
            $this->phone = $result['phone'];
            $this->district = $result['district'];
            $this->city = $result['city'];
            return $this;
        }
    }
    public function create()
    {
        date_default_timezone_set('Asia/Colombo');
        $registeredAt = date('Y-m-d H:i:s');
        $query = "INSERT INTO `worker` ("
            . "`registered_at`,"
            . "`category`,"
            . "`sub_category`,"
            . "`name`,"
            . "`email`,"
            . "`phone`,"
            . "`district`,"
            . "`city`"
            . ") VALUES  ('"
            . $registeredAt . "','"
            . $this->category . "','"
            . $this->sub_category . "','"
            . $this->name . "','"
            . $this->email . "','"
            . $this->phone . "','"
            . $this->district . "','"
            . $this->city . "')";
        $db = new Database();
        $result = $db->readQuery($query);
        if ($result) {
            $last_id = mysql_insert_id();
            return $this->__construct($last_id);
        } else {
            return FALSE;
        }
    }
    public function all()
    {
        $query = "SELECT * FROM `worker` ORDER BY `id` DESC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();
        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }
    
    public function update()
    {
        $query = "UPDATE  `worker` SET "
            . "`category` ='" . $this->category . "', "
            . "`sub_category` ='" . $this->sub_category . "', "
            . "`name` ='" . $this->name . "', "
            . "`email` ='" . $this->email . "', "
            . "`phone` ='" . $this->phone . "', "
            . "`district` ='" . $this->district . "', "
            . "`city` ='" . $this->city . "' "
            . "WHERE `id` = '" . $this->id . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        if ($result) {
            return $this->__construct($this->id);
        } else {
            return FALSE;
        }
    }
    public function delete()
    {
        $query = 'DELETE FROM `worker` WHERE id="' . $this->id . '"';
        $db = new Database();
        return $db->readQuery($query);
    }
    
}
