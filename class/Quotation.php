<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Quotation
 *
 * @author W j K n``
 */
class Quotation
{

    public $id;
    public $createdAt;
    public $job;
    public $supervisor;
    public $title;
    public $status;

    public function __construct($id)
    {
        if ($id) {

            $query = "SELECT `id`,`created_at`,`job`,`supervisor`,`title`,`status` FROM `quotation` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->createdAt = $result['created_at'];
            $this->job = $result['job'];
            $this->supervisor = $result['supervisor'];
            $this->title = $result['title'];
            $this->status = $result['status'];

            return $this;
        }
    }

    public function create()
    {
        date_default_timezone_set('Asia/Colombo');
        $createdAt = date('Y-m-d H:i:s');

        $db = new Database();
        $query = "INSERT INTO `quotation` (`created_at`,`job`,`supervisor`,`title`,`status`) VALUES  ('"
            . $createdAt . "','"
            . mysql_real_escape_string($this->job) . "','"
            . mysql_real_escape_string($this->supervisor) . "', '"
            . mysql_real_escape_string($this->title) . "', '"
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

        $query = "SELECT * FROM `quotation` ORDER BY status ASC";
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
  $db = new Database();
        $query = "UPDATE  `quotation` SET "
            . "`title` ='" . mysql_real_escape_string($this->title) . "', "
            . "`status` ='" . mysql_real_escape_string($this->status) . "' "
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
        $this->deleteQuotationItems();
        $query = 'DELETE FROM `quotation` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }
    public function deleteQuotationItems()
    {

        $QUOTATION_ITEM = new QuotationItem(NULL);
        $QUOTATION_ITEM->quotation  = $this->id;
        $result = $QUOTATION_ITEM->deleteByQuotation();
        return $result;
    }
    public function pendingQuotation()
    {

        $query = "SELECT * FROM `quotation` WHERE `status` = '0'";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }
    public function getQuotationsbyBySupervisorAndJob($supervisor, $job)
    {

        $query = "SELECT * FROM `quotation` WHERE `supervisor` = $supervisor AND `job` = $job";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }
    public function getQuotationsbyByJob($job)
    {

        $query = "SELECT * FROM `quotation` WHERE `job` = $job";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }
}
