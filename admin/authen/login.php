<?php
    session_start();

    require_once('../../utils/utility.php');
    require_once('../../database/dbhelper.php');
    require_once('./process_form_login.php');

    $user = getUserToken();
    if($user != null) {
        header('Location: ../');
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>BJE: Đăng Nhập</title>
    <meta charset="utf8">

    <!-- Icon -->
    <link rel="icon" type="image/png" href="https://gokisoft.com/uploads/2021/03/s-568-ico-web.jpg" />

    <!-- CSS -->
    <link rel="stylesheet" href="./styles.css">
    
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="panel panel-primary bg-image main-reg" style="box-shadow: 5px 5px #6496a1">
            <div class="panel-heading">
                <h2 class="text-center">Đăng Nhập</h2>
            </div>
            <div class="panel-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input required="true" type="email" class="form-control" id="email" name="email" value="<?=$email?>">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Mật khẩu:</label>
                        <input required="true" type="password" class="form-control" id="pwd" name="password" minlength="6">
                    </div>
                    <h5 style="color:red; font-size: 15px"><?=$msg?></h5>
                    <p>Bạn chưa có tài khoản? <a href="register.php">Đăng ký</a></p>

                    <button class="btn btn-success gradient-custom-4" style="border: none; padding: 10px;">Đăng nhập</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>