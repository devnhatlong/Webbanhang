<?php
    $fullname = $email = $msg = '';

    if(!empty($_POST)) {
        $fullname = getPost('fullname');
        $email = getPost('email');
        $pwd = getPost('password');
    }
    //var_dump($_POST); 
    
    //validate
    if(empty($fullname) || empty($email) || empty($pwd) || strlen($pwd) < 6) {
        //$msg = 'Đăng ký thất bại.';
    } else {
        //validate thanh cong
        $userExist = executeResult("SELECT * FROM user WHERE email = '$email'", true);
        if($userExist != null) {
            $msg = 'Email đã được đăng ký trên hệ thống.';
        } else {
            $created_at = $updated_at = date('Y-m-d H-i-s');

            //Ma hoa 1 chieu -> md5 (custom)
            $pwd = getSecurityMD5($pwd);

            $sql = "INSERT INTO user (fullname, email, password, created_at, updated_at, deleted) VALUES ('$fullname', '$email', '$pwd', '$created_at', '$updated_at', 0)";
            execute($sql);
            header('Location: login.php');
            die();
        }
    }
?>