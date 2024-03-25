<?php
    require_once('./config.php');
    
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $txt_username = $_POST['username'];
        $txt_password = $_POST['password'];

        $query = "select * from user where username = ? ";
        $stmt = $db->prepare($query);
        if($stmt->execute([
            $txt_username
        ])){
            $num = $stmt->rowCount();
            if($num > 0){
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);

                    $encpassword = md5($txt_password . $salt);
                    if($encpassword == $password){
                        $userid = $id;
                        if($stmt->execute([
                            $userid
                        ])){
                        $object = new stdClass();
                        $result = new stdClass();

                        $result->Fullname = $fullname;

                        $object->RespCode = 200;
                        $object->RespMessage = 'good';
                        $object->Result = $result;
                    }
                    else {
                        $object = new stdClass();
                        $object->RespCode = 400;
                        $object->RespMessage = 'bad';
                        $object->Log = 4;
                    }
                }
                else {
                    $object = new stdClass();
                    $object->RespCode = 400;
                    $object->RespMessage = 'bad';
                    $object->Log = 3;
                }
            }
        }
        else {
            $object = new stdClass();
            $object->RespCode = 400;
            $object->RespMessage = 'bad';
            $object->Log = 2;
        }
    }
    else {
        $object = new stdClass();
        $object->RespCode = 400;
        $object->RespMessage = 'bad';
        $object->Log = 1;
    }
    echo json_encode($object);
    http_response_code(200);
}
else {
    http_response_code(405);
}
?>