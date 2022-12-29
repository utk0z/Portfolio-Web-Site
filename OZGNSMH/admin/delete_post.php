<?php !defined("admin") ? header("location: hatali-sayfa") : null ?>
<div class="my-3">
    <?php
    $getId = @$_GET['icerik'];
    $locationUrl = $panelUrl . "postlar";
    if ($getId){

        $deleteData_1 = $data->prepare("delete from posts where id=?");
        $deleteProcess_1 = $deleteData_1->execute(array($getId));

        if ($deleteProcess_1){
            ?>
            <div class="alert alert-success" role="alert">
                İçerik başarılı bir şekilde silindi. Bekleyiniz..
            </div>
            <?php
            header("refresh: 2; url=$locationUrl");
        }else{
            ?>
            <div class="alert alert-danger" role="alert">
                İçerik silinirken bir hata oluştu! Bu hatadan dolayı özür diler ve tekrar denemenizi rica ederiz.
            </div>
            <?php
            header("refresh: 2; url=$locationUrl");
        }
    }else{
        header("refresh: 0; url=$locationUrl");
    }
    ?>
</div>

