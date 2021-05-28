<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if ($_POST['action'] == 'GETSUBCATEGORIESBYCATEGORY') {

    $SUBCAT = new SubCategory(NULL);

    $result = $SUBCAT->getSubCategoriesByCategory($_POST["category"]);

    echo json_encode($result);
    header('Content-type: application/json');
    exit();
}
?>