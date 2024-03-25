<?php
require_once('./config.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $logoutResult = performLogout();

    if ($logoutResult === true) {
        $object = new stdClass();
        $object->RespCode = 200;
        $object->RespMessage = 'good';
    } else {
        $object = new stdClass();
        $object->RespCode = 400;
        $object->RespMessage = 'bad';
    }

    echo json_encode($object);
    http_response_code(200);
} else {
    http_response_code(405);
}

function performLogout() {
    return true;
}
?>
