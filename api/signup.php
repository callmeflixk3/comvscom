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
        $username = $_POST['username'];
        $password = $_POST['password'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];


        $salt = generateRandomString(10);
        $newpassword = md5($password . $salt);

        $query = "insert into user (username, password, salt, fullname, email) values (?,?,?,?,?)";
        $stmt = $db->prepare($query);
        if($stmt->execute([
            $username,$newpassword,$salt,$fullname,$email
        ])){
            $object = new stdClass();
            $object->RespCode = 200;
            $object->RespMessage = 'good';
            $object->Fullname = $fullname;
        }
        else{
            $object = new stdClass();
            $object->RespCode = 400;
            $object->RespMessage = 'bad';
            $object->Log = 1;
        }
        echo json_encode($object);
        http_response_code(200);
    }
    else{
        http_response_code(405);
    }
?>