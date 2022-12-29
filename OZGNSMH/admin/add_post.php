<?php !defined("admin") ? header("location: hatali-sayfa") : null ?>
<?php
if ($_POST){

    $locationUrl = $panelUrl . "postlar";
    $title = $_POST['title'];
    $exp = $_POST['exp'];
    $link = $_POST['link'];

    if ($_FILES['resim']['name']){
        $fileName = $_FILES["resim"]["name"];
        $fileName =  ChangeImagesName($fileName);
        $newFileName = "assets/img/postlar/" . $fileName;

        if ($_FILES["resim"]["type"] == "image/jpeg" || $_FILES["resim"]["type"] == "image/png" || $_FILES["resim"]["type"] == "image/svg+xml"){
            if (move_uploaded_file($_FILES["resim"]["tmp_name"], "../".$newFileName)){

                $editData = $data->prepare("insert into posts set
                            title=?,
                            image=?,
                            exp=?,
                            link=?
                        ");


                $editProcess = $editData->execute(array($title,$newFileName,$exp,$link));


                if ($editProcess) {
                    ?>
                    <div class="alert alert-success" role="alert">
                        İçerik başarılı şekilde eklendi. Bekleyiniz...
                    </div>
                    <?php
                    header("refresh: 2; url=$locationUrl");
                } else {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        İşlem yapılırken bir hata oluştu! Tekrar deneyiniz.
                    </div>
                    <?php
                    header("refresh: 2; url=$locationUrl");
                }
            }else{
                ?>
                <div class="alert alert-danger" role="alert">
                    Dosya yüklenirken bir hata oluştu! Bu hatadan dolayı özür diler ve tekrar denemenizi rica ederiz.
                </div>
                <?php
                header("refresh: 2; url=$locationUrl");
            }
        }else{
            ?>
            <div class="alert alert-danger" role="alert">
                Eklediğiniz Dosya uzantısı sadece <b>JPG</b>, <b>PNG</b> veya <b>SVG</b> formatında olmalıdır!
            </div>
            <?php
            header("refresh: 2; url=$locationUrl");
        }
    }else{
        ?>
        <div class="alert alert-danger" role="alert">
            Lütfen dosya seçiniz!
        </div>
        <?php
        header("refresh: 2; url=$locationUrl");
    }
}else{
    ?>
    <div class="page_title_area">
        <h1 class="page_title">Post Ekle</h1>
    </div>

    <div class="alert alert-primary mt-3" role="alert">
        <b>*</b> ile gösterilen alanlar zorunludur!
    </div>

    <form action="" method="post" enctype="multipart/form-data" class="form">

        <div class="row">
            <div class="col-md-6 col-12">
                <div class="inputBox">
                    <label for="">Başlık <span class="required">*</span></label>
                    <input type="text" name="title" required placeholder="Başlık giriniz..">
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="inputBox">
                    <label for="">Resim <span class="required">*</span></label>
                    <input type="file" name="resim" required>
                </div>
            </div>
            <div class="col-12">
                <div class="inputBox">
                    <label for="">Kısa Açıklama <span class="required">*</span></label>
                    <textarea name="exp" cols="30" rows="10"></textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="inputBox">
                    <label for="">Link <span class="required">*</span></label>
                    <textarea name="link" cols="30" rows="10"></textarea>
                </div>
            </div>
        </div>
        <button class="login-btn load-btn" onclick="this.classList.toggle('loading-button')" type="submit">
            <div class="load_text"><i class="bi bi-plus-circle"></i> <span>Kaydet</span></div>
        </button>
    </form>
    <br>
    <br>
    <br>
    <?php
}

?>
