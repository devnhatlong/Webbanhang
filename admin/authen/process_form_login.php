<?php 
    $email = $msg = '';

    if(!empty($_POST)) {
        $email = getPost('email');
        $pwd = getPost('password');
        $pwd = getSecurityMD5($pwd);

        $sql = "SELECT * From user WHERE email = '$email' AND password = '$pwd' AND deleted = 0";

        $userExist = executeResult($sql, true);

        if($userExist == null) {
            $msg = 'Đăng nhập thất bại, sai email hoặc mật khẩu';
        } else {
            //login thành công
            $token = getSecurityMD5($userExist['email'].time());
            setcookie('token', $token, time() + 7 * 24 * 60 * 60, '/');
            $created_at = date('Y-m-d H-i-s');

            $_SESSION['user'] = $userExist;

            $userId = $userExist['id'];
            $sql = "INSERT INTO tokens (user_id, token, created_at) VALUES ('$userId', '$token', '$created_at')";
            execute($sql);

            header('Location: ../');
            die();
        }

    }
?>