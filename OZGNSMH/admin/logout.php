<?php !defined("admin") ? header("location: hatali-sayfa") : null ?>
<?php
unset($_SESSION['username']);
?>
    <div class="container-fluid">
        <div class="alert alert-success" role="alert">
            Oturumunuz başarılı bir şekilde sonlandırıldı! Lütfen bekleyin..
        </div>
    </div>
<?php
header("refresh: 1; url=login.php");

?>