<?php

/**
 * Description of Supervisor
 *
 * @author synotec holdings
 * @web www.synotec.lk
 */
class Supervisor
{
    public $id;
    public $joinedAt;
    public $name;
    public $phone;
    public $email;
    public $nic;
    public $address;
    public $district;
    public $city;
    public $picture;
    public $description;
    public $password;
    private $authToken;
    public $resetcode;
    public $isActive;
    public $email_verified;
    public $e_verification_code;
    public $is_subscribed;
    public $type;

    public function __construct($id)
    {
        if ($id) {
            $query = "SELECT  * FROM `supervisor` WHERE `id`=" . $id;
            $db = new Database();
            $result = mysql_fetch_array($db->readQuery($query));
            $this->id = $result['id'];
            $this->joinedAt = $result['joined_at'];
            $this->name = $result['name'];
            $this->phone = $result['phone'];
            $this->email = $result['email'];
            $this->nic = $result['nic'];
            $this->address = $result['address'];
            $this->city = $result['city'];
            $this->district = $result['district'];
            $this->picture = $result['picture'];
            $this->description = $result['description'];
            $this->password = $result['password'];
            $this->authToken = $result['auth_token'];
            $this->isActive = $result['is_active'];
            $this->email_verified = $result['email_verified'];
            $this->e_verification_code = $result['e_verification_code'];
            $this->is_subscribed = $result['is_subscribed'];
            $this->type = $result['type'];
            return $this;
        }
    }
    public function create()
    {
        date_default_timezone_set('Asia/Colombo');
        $createdAt = date('Y-m-d H:i:s');

        $password = md5(12345678);

        $db = new Database();
        $query = "INSERT INTO `supervisor` ("
            . "`joined_at`, "
            . "`name`, "
            . "`phone`, "
            . "`email`,"
            . "`password`,"
            . "`nic`,"
            . "`address`,"
            . "`district`,"
            . "`city`,"
            . "`is_active`,"
            . "`is_subscribed`"
            . ") VALUES  ('"
            . $createdAt . "','"
            . mysql_real_escape_string($this->name) . "','"
            . mysql_real_escape_string($this->phone) . "', '"
            . mysql_real_escape_string($this->email) . "', '"
            . mysql_real_escape_string($password) . "', '"
            . mysql_real_escape_string($this->nic) . "', '"
            . mysql_real_escape_string($this->address) . "', '"
            . mysql_real_escape_string($this->district) . "', '"
            . mysql_real_escape_string($this->city) . "', '"
            . 1 . "', '"
            . 1 . "')";


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
        $query = "SELECT * FROM `supervisor` ";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();
        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }
    public function login($email, $password)
    {
        $query = "SELECT  * FROM `supervisor` WHERE `email`= '" . $email . "' AND `password`= '" . $password . "'";
        $db = new Database();
        $result = mysql_fetch_array($db->readQuery($query));
        if (!$result) {
            return FALSE;
        } else {
            $this->id = $result['id'];
            $this->setAuthToken($result['id']);
            $this->setUserSession($this->id);
            $supervisor = $this->__construct($this->id);
            return $supervisor;
        }
    }
    public function logOut()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        unset($_SESSION["m_id"]);
        unset($_SESSION["m_login"]);
        unset($_SESSION["m_name"]);
        unset($_SESSION["m_email"]);
        return TRUE;
    }
    private function setUserSession($supervisor)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $supervisor = $this->__construct($supervisor);
        $_SESSION["m_login"] = true;
        $_SESSION["m_id"] = $supervisor->id;
        $_SESSION["m_name"] = $supervisor->name;
        $_SESSION["m_email"] = $supervisor->email;
        $_SESSION["m_phone"] = $supervisor->phone;
        $_SESSION["m_authToken"] = $supervisor->authToken;
        $_SESSION["m_picture"] = $supervisor->picture;
    }
    private function setAuthToken($id)
    {
        $authToken = md5(uniqid(rand(), true));
        $query = "UPDATE `supervisor` SET `auth_token` ='" . $authToken . "' WHERE `id`='" . $id . "'";
        $db = new Database();
        if ($db->readQuery($query)) {
            return $authToken;
        } else {
            return FALSE;
        }
    }
    public function authenticate()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $id = NULL;
        $authToken = NULL;
        if (isset($_SESSION["m_id"])) {
            $id = $_SESSION["m_id"];
        }
        if (isset($_SESSION["m_authToken"])) {
            $authToken = $_SESSION["m_authToken"];
        }
        $query = "SELECT `id` FROM `supervisor` WHERE `id`= '" . $id . "' AND `auth_token`= '" . $authToken . "'";
        $db = new Database();
        $result = mysql_fetch_array($db->readQuery($query));
        if (!$result) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function checkEmailForResetPassword($email)
    {

        $query = "SELECT `email`,`name` FROM `supervisor` WHERE `email`= '" . $email . "'";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        if (!$result) {
            return FALSE;
        } else {
            return $result;
        }
    }
    public function checkEmail($id, $email)
    {
        $query = "SELECT `email`,`name` FROM `supervisor` WHERE `email`= '" . $email . "' AND `id` != '" . $id . "'";
        $db = new Database();
        $result = mysql_fetch_array($db->readQuery($query));
        if (!$result) {
            return FALSE;
        } else {
            return $result;
        }
    }
    public function checkEmailIsExist($email)
    {
        $query = "SELECT `id` FROM `supervisor` WHERE `email`= '" . $email . "'";
        $db = new Database();
        $result = mysql_fetch_array($db->readQuery($query));
        if (!$result) {
            return FALSE;
        } else {
            return $result;
        }
    }
    public function genarateCode($email)
    {
        $rand = rand(10000, 99999);
        $query = "UPDATE  `supervisor` SET "
            . "`reset_code` ='" . $rand . "' "
            . "WHERE `email` = '" . $email . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function selectForgetSupervisor($email)
    {
        if ($email) {
            $query = "SELECT `email`,`name`,`reset_code` FROM `supervisor` WHERE `email`= '" . $email . "'";
            $db = new Database();
            $result = mysql_fetch_array($db->readQuery($query));
            $this->name = $result['name'];
            $this->email = $result['email'];
            $this->resetcode = $result['reset_code'];
            return $result;
        }
    }
    public function selectResetCode($code)
    {
        $query = "SELECT `id` FROM `supervisor` WHERE `reset_code`= '" . $code . "'";
        $db = new Database();
        $result = mysql_fetch_array($db->readQuery($query));
        if (!$result) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function updatePassword($password, $code)
    {
        $enPass = md5($password);
        $query = "UPDATE  `supervisor` SET "
            . "`password` ='" . $enPass . "', "
            . "`reset_code` ='" . 0 . "' "
            . "WHERE `reset_code` = '" . $code . "'";
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
        $query = "UPDATE  `supervisor` SET "
            . "`name` ='" . $this->name . "', "
            . "`phone` ='" . $this->phone . "', "
            . "`email` ='" . $this->email . "', "
            . "`nic` ='" . $this->nic . "', "
            . "`district` ='" . $this->district . "', "
            . "`city` ='" . $this->city . "', "
            . "`address` ='" . $this->address . "', "
            . "`picture` ='" . $this->picture . "', "
            . "`description` ='" . $this->description . "', "
            . "`email_verified` ='" . $this->email_verified . "', "
            . "`e_verification_code` ='" . $this->e_verification_code . "' "
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
        $query = 'DELETE FROM `supervisor` WHERE id="' . $this->id . '"';
        $db = new Database();
        return $db->readQuery($query);
    }
    public function GetSupervisorByDistrict($district)
    {
        $query = "SELECT * FROM `supervisor` WHERE `district` = '" . $district . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();
        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }
    public function getActiveAgents($pageLimit, $setLimit)
    {
        $query = "SELECT * FROM `supervisor` WHERE `is_active` = 1 AND `type` LIKE 'agent' ORDER BY `joined_at` ASC LIMIT " . $pageLimit . " , " . $setLimit . "";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();
        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }
    public function arrange($key, $img)
    {
        $query = "UPDATE `supervisor` SET `sort` = '" . $key . "'  WHERE id = '" . $img . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }
    public function checkOldPass($id, $password)
    {

        $enPass = md5($password);

        $query = "SELECT `id` FROM `supervisor` WHERE `id`= '" . $id . "' AND `password`= '" . $enPass . "'";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        if (!$result) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function changePassword($id, $password)
    {

        $enPass = md5($password);

        $query = "UPDATE  `supervisor` SET "
            . "`password` ='" . $enPass . "' "
            . "WHERE `id` = '" . $id . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function SupervisorActivation($id, $status)
    {
        $query = "UPDATE  `supervisor` SET "
            . "`is_active` ='" . $status . "' "
            . "WHERE `id` = '" . $id . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function checkEmptyBasicData()
    {

        $query = "SELECT `name`,`email`,`district`,`city`,`address`,`phone`,`nic`, `picture`, `description` FROM `supervisor` WHERE `id` = '" . $this->id . "'";

        $db = new Database();
        $result = $db->readQuery($query);
        $count = 0;
        foreach (mysql_fetch_assoc($result) as $key => $data) {

            if (!empty($data) && $data != '0') {
                $count++;
            }
        }
        if ($count == '9') {
            return 1;
        } else {
            return 0;
        }
    }

    public function MemberActivation($id, $status)
    {
        $query = "UPDATE  `supervisor` SET "
            . "`is_active` ='" . $status . "' "
            . "WHERE `id` = '" . $id . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function sendRegistrationEmail()
    {

        $HELPER = new Helper(NULL);

        $sent_from_email = 'test@synotec.lk';
        $sent_from_name = 'ON CALL WORKERS';
        $recipient_email = $this->email;
        $recipient_email_name = $this->name;
        $subject = 'Your Registration is Successful!. - ON CALL WORKERS';
        $reply_email = 'test@synotec.lk';
        $reply_email_name = 'ON CALL WORKERS';

        $message = '<html>';
        $message .= '<body>';
        $message .= '<div  style="padding: 10px; max-width: 650px; background-color: #f2f1ff; border: 1px solid #d4d4d4;">';
        $message .= '<h4>Welcome to the ON CALL WORKERS!.</h4>';
        $message .= '<p>Dear sir/madam, </br></br>Thank you for requesting to register for the www.oncallworkers.lk. Your registration was successfull. Please use following details for login to the supervisor dashboard...</p>';
        $message .= '<p><b>URL: </b><a href="http://www.oncallworkers.lk/supervisor/" target="_blank">http://www.oncallworkers.lk/supervisor/</a> </p>';
        $message .= '<p><b>Username: </b> ' . $recipient_email . '</p>';
        $message .= '<p><b>Password: </b> 12345678</p>';
        $message .= '<hr/>';
        $message .= '<p>Thanks & Best Regards!.. <br/> www.oncallworkers.lk<p/>';
        $message .= '<small>*Please do not reply to this email. This is an automated email & you will not receive a response.</small><br/>';
        $message .= '<span>Hotline: (+94) 71 123 4567 </span><br/>';
        $message .= '<span>info@oncallworkers.lk</span>';
        $message .= '</div>';
        $message .= '</body>';
        $message .= '</html>';


        if ($HELPER->PHPMailer($sent_from_email, $sent_from_name, $reply_email, $reply_email_name, $recipient_email, $recipient_email_name, $subject, $message)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
