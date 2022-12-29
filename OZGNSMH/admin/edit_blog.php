<?php !defined("admin") ? header("location: hatali-sayfa") : null ?>
<?php
$getUrl = @$_GET['icerik'];

if ($getUrl) {

    $getData = $data->prepare("SELECT * FROM works where id=?");
    $getData->execute(array($getUrl));
    $fetchData = $getData->fetch();

    if ($getData->rowCount()) {

        if ($_POST) {

            $locationUrl = $panelUrl . "blog-duzenle/" . $getUrl;

            $title = $_POST['title'];
            $content = $_POST['content'];
            $exp = $_POST['exp'];
            $seo = permalink($title);
            $onay = $_POST['publish'];

            if ($_FILES["resim"]["name"]){
                $fileName = $_FILES["resim"]["name"];
                $fileName =  ChangeImagesName($fileName);
                $newFileName = "assets/img/bloglar/" . $fileName;

                if ($_FILES["resim"]["type"] == "image/jpeg" || $_FILES["resim"]["type"] == "image/png" || $_FILES["resim"]["type"] == "image/svg+xml"){
                    if (move_uploaded_file($_FILES["resim"]["tmp_name"], "../".$newFileName)){

                        $editData = $data->prepare("update works set
                            title=?,
                            content=?,
                            image=?,
                            exp=?,
                            link=?
                            where id=?
                        ");
                        $editProcess = $editData->execute(array($title,$content,$newFileName,$exp,$seo,$getUrl));

                        if ($editProcess) {
                            ?>
                            <div class="alert alert-success" role="alert">
                                İçerik başarılı şekilde düzenlendi. Bekleyiniz...
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
                $editData = $data->prepare("update works set
                            title=?,
                            content=?,
                            exp=?,
                            link=?
                            where id=?
                        ");

                    $editProcess = $editData->execute(array($title,$content,$exp,$seo,$getUrl));


                if ($editProcess) {
                    ?>
                    <div class="alert alert-success" role="alert">
                        İçerik başarılı şekilde düzenlendi. Bekleyiniz...
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
            }
        } else {
            ?>
            <div class="page_title_area">
                <h1 class="page_title">Blog Düzenle</h1>
            </div>

            <div class="alert alert-primary mt-3" role="alert">
                <b>*</b> ile gösterilen alanlar zorunludur!
            </div>

            <form action="" method="post" enctype="multipart/form-data" class="form">

                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="inputBox">
                            <label for="">Başlık <span class="required">*</span></label>
                            <input type="text" name="title" required placeholder="Başlık yazınız.."
                                   value="<?php echo $fetchData['title']; ?>">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="inputBox">
                            <label for="">Onay <span class="required">*</span></label>
                            <select name="publish" id="" required>
                                <?php
                                if ($fetchData['publish'] == 1){
                                    ?>
                                    <option selected value="1">Onaylı</option>
                                    <option value="0">Onaysız</option>
                                    <?php
                                }else{
                                    ?>
                                    <option value="1">Onaylı</option>
                                    <option selected value="0">Onaysız</option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="inputBox">
                            <label for="">Resim </label>
                            <input type="file" name="resim">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="inputBox">
                            <label for=""> Mevcut Resim</label>
                            <img src="<?php echo $siteUrl . $fetchData['image']; ?>" alt="yüklenemedi..">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="inputBox">
                            <label for="">Açıklama <span class="required">*</span></label>
                            <textarea name="content" id="ckeditor" cols="30" rows="3"><?php echo $fetchData['content']; ?></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="inputBox">
                            <label for="">Kısa Açıklama <span class="required">*</span></label>
                            <textarea name="exp" cols="30" rows="3"><?php echo $fetchData['content']; ?></textarea>
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
    } else {
        header('location: hatali-sayfa');
    }

} else {
    header('location: hatali-sayfa');
}
?>