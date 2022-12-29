<?php !defined("admin") ? header("location: hatali-sayfa") : null ?>
<?php
$getData = $data->prepare("SELECT * FROM about where id=?");
$getData->execute(array(1));
$fetchData = $getData->fetch();

if ($getData->rowCount()){

    if ($_POST){

        $locationUrl = $panelUrl . "hakkinda-sayfasi";
        $work = $_POST['work'];
        $about = $_POST['about'];
        $love = $_POST['love'];
        $instagram = $_POST['instagram'];
        $discord = $_POST['discord'];
        $linkedin = $_POST['linkedin'];
        $github = $_POST['github'];

        $editData = $data->prepare("update about set
                            work=?,
                            about=?,
                            love=?,
                            instagram=?,
                            discord=?,
                            linkedin=?,
                            github=?
                            where id=?
            ");

        $editProcess = $editData->execute(array($work,$about,$love,$instagram,$discord,$linkedin,$github,1));

        if ($editProcess){
            ?>
            <div class="alert alert-success" role="alert">
                İçerik başarılı şekilde düzenlendi. Bekleyiniz...
            </div>
            <?php
            header("refresh: 2; url=$locationUrl");
        }else{
            ?>
            <div class="alert alert-danger" role="alert">
                İşlem yapılırken bir hata oluştu! Tekrar deneyiniz.
            </div>
            <?php
            header("refresh: 2; url=$locationUrl");
        }
    }else{
        ?>
        <div class="page_title_area">
            <h1 class="page_title">Hakkımda Sayfası</h1>
        </div>

        <div class="alert alert-primary mt-3" role="alert">
            <b>*</b> ile gösterilen alanlar zorunludur!
        </div>

        <form action="" method="post" enctype="multipart/form-data" class="form">

            <div class="row">
                
                <div class="col-12">
                    <div class="inputBox">
                        <label for="">WORK <span class="required">*</span></label>
                        <textarea name="work" required class="ck_editor" id="ckeditor" cols="30" rows="10"><?php echo $fetchData['work']; ?></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="inputBox">
                        <label for="">ABOUT <span class="required">*</span></label>
                        <textarea name="about" required class="ck_editor" id="ckeditor" cols="30" rows="10"><?php echo $fetchData['about']; ?></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="inputBox">
                        <label for="">LOVE <span class="required">*</span></label>
                        <textarea name="love" required class="ck_editor" id="ckeditor" cols="30" rows="10"><?php echo $fetchData['love']; ?></textarea>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="inputBox">
                        <label for="">İnstagram <span class="required">*</span></label>
                        <input type="text" name="instagram" required placeholder="Link giriniz.." value="<?php echo $fetchData['instagram']; ?>">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="inputBox">
                        <label for="">linkedin <span class="required">*</span></label>
                        <input type="text" name="linkedin" required placeholder="Link giriniz.." value="<?php echo $fetchData['linkedin']; ?>">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="inputBox">
                        <label for="">discord <span class="required">*</span></label>
                        <input type="text" name="discord" required placeholder="Link giriniz.." value="<?php echo $fetchData['discord']; ?>">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="inputBox">
                        <label for="">github <span class="required">*</span></label>
                        <input type="text" name="github" required placeholder="Link giriniz.." value="<?php echo $fetchData['github']; ?>">
                    </div>
                </div>
            </div>

            <button class="login-btn load-btn" onclick="this.classList.toggle('loading-button')" type="submit">
                <div class="load_text"><i class="bi bi-plus-circle"></i> <span>Kaydet</span></div>
            </button>
        </form>
        <?php
    }
}else{
    header('location: hatali-sayfa');
}

?>
