<?php
    if(!empty($_POST)) {
        $id = getPost('id');
        $fullname = getPost('fullname');
        $email = getPost('email');
        $phone_number = getPost('phone_number');
        $address = getPost('address');
        $password = getPost('password');
        if($password != '') {
            $password = getSecurityMD5($password);
        }
        
        $role_id = getPost('role_id');
        $created_at = $updated_at = date("Y-m-d H:i:s");
        

        if($id > 0) {
            //check email đã có người dùng hay chưa (theo update)
            $sql = "SELECT * FROM user WHERE email = '$email' AND id <> $id";
            $userItem = executeResult($sql, true);
            if($userItem != null) {
                $msg = 'Email đã được sử dụng trong tài khoản khác.';
            } else {
                //update
                if($password != '') {
                    $sql = "UPDATE user SET fullname = '$fullname', email = '$email', phone_number = '$phone_number', address = '$address', password = '$password', role_id = '$role_id', updated_at = '$updated_at' WHERE id = $id";
                } else {
                    // Nếu không nhập password (không update)
                    $sql = "UPDATE user SET fullname = '$fullname', email = '$email', phone_number = '$phone_number', address = '$address', role_id = '$role_id', updated_at = '$updated_at' WHERE id = $id";
                }
                execute($sql);
                header('Location: index.php');
                die();
            }
        } else {
            //check email đã có người dùng hay chưa (theo insert)
            $sql = "SELECT * FROM user WHERE email = '$email'";
            $userItem = executeResult($sql, true);
            //insert
            if($userItem == null) {
                //insert
                $sql = "INSERT INTO user(fullname, email, phone_number, address, password, role_id, created_at, updated_at, deleted) 
                        VALUES ('$fullname', '$email', '$phone_number', '$address', '$password', '$role_id', '$created_at', '$updated_at', 0)";
                executeResult($sql);
                header('Location: index.php');
                die();
            } else {
                //tai khoan ton tai -> failed
                $msg = 'Email đã được đăng ký trên hệ thống.';
            }
        }
        
    }
?>