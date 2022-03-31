<?php 
    session_start();
    require_once('utils/utility.php');
    require_once('database/dbhelper.php');

    $sql = "SELECT * FROM category";
    $menuItems = executeResult($sql);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ - Shop Thời Trang</title>
    <link rel="shortcut icon" href="./assets/logo/logo.png">
    <link rel="stylesheet" href="./assets/css/main.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

</head>
<body>
    <!-- MENU BEGIN -->
      <!-- NAV BOOTSTRAP -->
    <div class="container">
        <nav class="header_navbar" style="display: flex; justify-content: space-between;">
            <ul class="nav nav-container">
                <li class="nav-item" style="margin-top: 0px;"><a href="index.php"><img src="./assets/logo/logo.png" alt="logo" style="height: 80px"></a></li>
              <li class="nav-item">
                <a class="nav-link" href="index.php">Trang Chủ <span class="sr-only">(current)</span></a>
              </li>
              <?php 
                foreach($menuItems as $item) {
                  echo '<li class="nav-item">
                            <a class="nav-link" href="category.php?id='.$item['id'].'">'.$item['name'].'</a>
                        </li>';
                }
              ?>
              
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Liên Hệ</a>
              </li>
            </ul>
            <ul class="nav nav-container">
              <?php 
                $user = getUserToken();
                if($user == null) {
                    echo '<li class="nav-item">
                            <a class="nav-link" href="../webbanhang/admin/authen/register.php">Đăng Ký</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="../webbanhang/admin/authen/login.php">Đăng Nhập</a>
                          </li>';
                } else if($user['role_id'] != 1) {
                      echo '<li class="nav-item">
                              <a class="nav-link" href="">'.$user['fullname'].'</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link btn-logout" href="../webbanhang/admin/authen/logout.php">Thoát</a>
                            </li>';
                }
              ?>
                  
            </ul>
        </nav>
    </div>
    <!-- MENU END -->