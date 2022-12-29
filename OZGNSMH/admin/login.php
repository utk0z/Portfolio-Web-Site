<?php
session_start();
ob_start();
include "db_file.php"

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel Giriş</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/stylrers.css">
    <link rel="stylesheet" href="assets/css/form.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-icon.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- Chrome, Firefox ve Opera içim -->
    <meta name="theme-color" content="#66bb6a">
    <!-- iOS Safari için -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#66bb6a">
    <!-- Windows Phone için -->
    <meta name="msapplication-navbutton-color" content="#66bb6a">
    <!-- Favicon Logo -->
    <link rel="shortcut icon" type="image/png" href=""/>
    <!-- FontAwesome -->
    <script src="../assets/js/fontawesome.js" defer></script>
</head>
<body>

<div class="login_form_area">
    <form action="" class="form" method="post">
        <?php

        $getContent = $data->prepare("SELECT * FROM settings where id=?");
        $getContent->execute(array(1));
        $fetchSetting = $getContent->fetch();

        $siteUrl = $fetchSetting['site'];
        $panelUrl = $fetchSetting['site'] . "admin/";

        if ($_POST){
            $name = $_POST['name'];
            $password = md5($_POST['password']);

            if ($name == $fetchSetting['username'] && $password == $fetchSetting['password']){
                $_SESSION['username'] = $fetchSetting['username'];
                header('location:index.php');
            }else{
                ?>
                <div class="alert alert-danger" role="alert">
                    Kullanıcı bulunamadı!
                </div>
                <?php
            }
        }
        ?>
        <div class="inputBox">
            <label for="">Kullanıcı Adı</label>
            <input type="text" name="name" required placeholder="Kullanıcı adı..">
        </div>
        <div class="inputBox">
            <label for="">Şifre</label>
            <input type="password" name="password" required placeholder="Şifre giriniz..">
        </div>
        <button class="login-btn load-btn" onclick="this.classList.toggle('loading-button')" type="submit">
            <div class="load_text"><i class="bi bi-box-arrow-in-right"></i> <span>Giriş Yap</span></div>
        </button>
    </form>
</div>



<!-- Ajax & Jquery CDN -->
<script src="../assets/js/ajax.js"></script>
<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/boostrap-cdn.js"></script>
</body>
</html>