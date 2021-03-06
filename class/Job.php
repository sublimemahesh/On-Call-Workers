<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Job
 *
 * @author W j K n``
 */
class Job
{

    public $id;
    public $createdAt;
    public $category;
    public $sub_category;
    public $description;
    public $district;
    public $city;
    public $name;
    public $email;
    public $phone;
    public $nature_of_the_work;
    public $status;
    public $supervisor;
    public $assignedAt;

    public function __construct($id)
    {
        if ($id) {

            $query = "SELECT * FROM `job` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->createdAt = $result['created_at'];
            $this->category = $result['category'];
            $this->sub_category = $result['sub_category'];
            $this->description = $result['description'];
            $this->district = $result['district'];
            $this->city = $result['city'];
            $this->name = $result['name'];
            $this->email = $result['email'];
            $this->phone = $result['phone'];
            $this->nature_of_the_work = $result['nature_of_the_work'];
            $this->status = $result['status'];
            $this->supervisor = $result['supervisor'];
            $this->assignedAt = $result['assigned_at'];

            return $this;
        }
    }

    public function create()
    {
        date_default_timezone_set('Asia/Colombo');
        $createdAt = date('Y-m-d H:i:s');
        $db = new Database();

        $query = "INSERT INTO `job` ("
            . "`created_at`,"
            . "`category`,"
            . "`sub_category`,"
            . "`description`,"
            . "`district`,"
            . "`city`,"
            . "`name`,"
            . "`email`,"
            . "`phone`,"
            . "`nature_of_the_work`,"
            . "`status`"
            . ") VALUES  ('"
            . $createdAt . "','"
            . mysql_real_escape_string($this->category) . "', '"
            . mysql_real_escape_string($this->sub_category) . "', '"
            . mysql_real_escape_string($this->description) . "', '"
            . mysql_real_escape_string($this->district) . "', '"
            . mysql_real_escape_string($this->city) . "', '"
            . mysql_real_escape_string($this->name) . "', '"
            . mysql_real_escape_string($this->email) . "', '"
            . mysql_real_escape_string($this->phone) . "', '"
            . mysql_real_escape_string($this->nature_of_the_work) . "', '"
            . 0 . "')";


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

        $query = "SELECT * FROM `job` ORDER BY `id` DESC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function getAllPendingJobs()
    {

        $query = "SELECT j.*,c.name category_name,sc.name sub_category_name FROM `job` j, `category` c , `sub_category` sc WHERE c.id = j.category AND sc.id = j.sub_category AND j.status = 0 ORDER BY `id` DESC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function getAllAssignedJobs()
    {

        $query = "SELECT j.*,c.name category_name,sc.name sub_category_name FROM `job` j, `category` c , `sub_category` sc WHERE c.id = j.category AND sc.id = j.sub_category AND j.status = 1 ORDER BY  `id` DESC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function getJobsBySupervisorAndStatus($supervisor, $status) {

        $query = "SELECT j.*,c.name category_name,sc.name sub_category_name FROM `job` j, `category` c , `sub_category` sc WHERE c.id = j.category AND sc.id = j.sub_category AND j.status = $status AND j.supervisor = $supervisor ORDER BY `id` DESC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }
    public function getJobsByStatus($status) {

        $query = "SELECT j.*,c.name category_name,sc.name sub_category_name FROM `job` j, `category` c , `sub_category` sc WHERE c.id = j.category AND sc.id = j.sub_category AND j.status = $status ORDER BY `id` DESC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function AssignSupervisor()
    {
        date_default_timezone_set('Asia/Colombo');
        $assignedAt = date('Y-m-d H:i:s');
        $query = "UPDATE `job` SET  `supervisor`= $this->supervisor, `assigned_at` = '" . $assignedAt . "', `status` = 1 WHERE `id` = $this->id";
        // dd($query);
        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {

            return TRUE;
        } else {

            return FALSE;
        }
    }
    public function updateStatus()
    {
        date_default_timezone_set('Asia/Colombo');
        $query = "UPDATE `job` SET  `status` = $this->status WHERE `id` = $this->id";
        // dd($query);
        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {

            return TRUE;
        } else {

            return FALSE;
        }
    }

    public function update()
    {

        $db = new Database();
        $query = "UPDATE  `job` SET "
            . "`category` ='" . mysql_real_escape_string($this->category) . "', "
            . "`sub_category` ='" . mysql_real_escape_string($this->sub_category) . "', "
            . "`district` ='" . mysql_real_escape_string($this->district) . "', "
            . "`city` ='" . mysql_real_escape_string($this->city) . "', "
            . "`description` ='" . mysql_real_escape_string($this->description) . "', "
            . "`name` ='" . mysql_real_escape_string($this->name) . "', "
            . "`email` ='" . mysql_real_escape_string($this->email) . "', "
            . "`phone` ='" . mysql_real_escape_string($this->phone) . "', "
            . "`phone` ='" . mysql_real_escape_string($this->nature_of_the_work) . "', "
            . "`status` ='" . 0 . "' "
            . "WHERE `id` = '" . $this->id . "'";


        $result = $db->readQuery($query);

        if ($result) {
            return $this->__construct($this->id);
        } else {
            return FALSE;
        }
    }

    public function delete()
    {

        $query = 'DELETE FROM `job` WHERE id="' . $this->id . '"';
        $db = new Database();

        return $db->readQuery($query);
    }
}
