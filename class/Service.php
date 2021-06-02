<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of service
 *
 * @author Suharshana DsW
 */
class Service
{

    public $id;
    public $title;
    public $image_name;
    public $short_description;
    public $description;
    public $queue;

    public function __construct($id)
    {
        if ($id) {

            $query = "SELECT `id`,`title`,`image_name`,`short_description`,`description`,`queue` FROM `service` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->title = $result['title'];
            $this->image_name = $result['image_name'];
            $this->short_description = $result['short_description'];
            $this->description = $result['description'];
            $this->queue = $result['queue'];

            return $this;
        }
    }

    public function create()
    {
        $db = new Database();
        $query = "INSERT INTO `service` (`title`,`image_name`,`short_description`,`description`,`queue`) VALUES  ('"
            . mysql_real_escape_string($this->title) . "','"
            . mysql_real_escape_string($this->image_name) . "', '"
            . mysql_real_escape_string($this->short_description) . "', '"
            . mysql_real_escape_string($this->description) . "', '"
            . mysql_real_escape_string($this->queue) . "')";



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

        $query = "SELECT * FROM `service` ORDER BY queue ASC";
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
        $query = "UPDATE  `service` SET "
            . "`title` ='" . mysql_real_escape_string($this->title) . "', "
            . "`image_name` ='" . mysql_real_escape_string($this->image_name) . "', "
            . "`short_description` ='" . mysql_real_escape_string($this->short_description) . "', "
            . "`description` ='" . mysql_real_escape_string($this->description) . "', "
            . "`queue` ='" . mysql_real_escape_string($this->queue) . "' "
            . "WHERE `id` = '" . mysql_real_escape_string($this->id) . "'";

        $result = $db->readQuery($query);

        if ($result) {
            return $this->__construct($this->id);
        } else {
            return FALSE;
        }
    }

    public function delete()
    {
        $this->deleteServicePhotos();
        unlink(Helper::getSitePath() . "upload/service/" . $this->image_name);

        $query = 'DELETE FROM `service` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }
    public function deleteServicePhotos()
    {

        $SERVICE_PHOTO = new ServicePhoto(NULL);
        $photos = $SERVICE_PHOTO->getServicePhotosById($this->id);
        foreach($photos as $photo) {
            $SERVICE_PHOTO->id  = $photo['id'];
            $result = $SERVICE_PHOTO->delete();
        }
        
        return $result;
    }
    public function arrange($key, $img)
    {
        $query = "UPDATE `service` SET `queue` = '" . $key . "'  WHERE id = '" . $img . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }
}
