<?php


include_once(dirname(__FILE__) . '/Category.php');
include_once(dirname(__FILE__) . '/City.php');
include_once(dirname(__FILE__) . '/Comments.php');
include_once(dirname(__FILE__) . '/Database.php');
include_once(dirname(__FILE__) . '/DefaultData.php');
include_once(dirname(__FILE__) . '/District.php');
include_once(dirname(__FILE__) . '/Helper.php');
include_once(dirname(__FILE__) . '/Job.php');
include_once(dirname(__FILE__) . '/Supervisor.php');
include_once(dirname(__FILE__) . '/Message.php');
include_once(dirname(__FILE__) . '/Page.php');
include_once(dirname(__FILE__) . '/Quotation.php');
include_once(dirname(__FILE__) . '/QuotationItem.php');
include_once(dirname(__FILE__) . '/Service.php');
include_once(dirname(__FILE__) . '/ServicePhoto.php');
include_once(dirname(__FILE__) . '/Setting.php');
include_once(dirname(__FILE__) . '/Slider.php');
include_once(dirname(__FILE__) . '/SubCategory.php');
include_once(dirname(__FILE__) . '/Upload.php');
include_once(dirname(__FILE__) . '/User.php');
include_once(dirname(__FILE__) . '/Validator.php');
include_once(dirname(__FILE__) . '/Worker.php');

function dd($data) {
    var_dump($data);
    exit();
}
function redirect($url) {
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' . $url . '"';
    $string .= '</script>';

    echo $string;
    exit();
}
