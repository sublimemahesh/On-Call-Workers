<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of QuotationItem
 *
 * @author W j K n``
 */
class QuotationItem
{

    public $id;
    public $createdAt;
    public $quotation;
    public $description;
    public $amount;
    public $status;

    public function __construct($id)
    {
        if ($id) {

            $query = "SELECT `id`,`quotation`,`description`,`amount` FROM `quotation_item` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->quotation = $result['quotation'];
            $this->description = $result['description'];
            $this->amount = $result['amount'];

            return $this;
        }
    }

    public function create()
    {
        date_default_timezone_set('Asia/Colombo');
        $createdAt = date('Y-m-d H:i:s');
$db = new Database();
        $query = "INSERT INTO `quotation_item` (`quotation`,`description`,`amount`) VALUES  ('"
            . $this->quotation . "','"
            . mysql_real_escape_string($this->description) . "', '"
            . $this->amount . "')";

        

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

        $query = "SELECT * FROM `quotation_item` ORDER BY status ASC";
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
        $query = "UPDATE  `quotation_item` SET "
            . "`description` ='" . mysql_real_escape_string($this->description) . "', "
            . "`amount` ='" . $this->amount . "' "
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

        $query = 'DELETE FROM `quotation_item` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }
    public function deleteByQuotation()
    {

        $query = 'DELETE FROM `quotation_item` WHERE `quotation`="' . $this->quotation . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function getItemsByQuotation($id)
    {

        $query = "SELECT * FROM `quotation_item` WHERE `quotation` = $id";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }
}
