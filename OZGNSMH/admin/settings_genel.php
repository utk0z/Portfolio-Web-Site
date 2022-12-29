<?php !defined("admin") ? header("location: hatali-sayfa") : null ?>
<?php
$getData = $data->prepare("SELECT * FROM settings where id=?");
$getData->execute(array(1));
$fetchData = $getData->fetch();

if ($getData->rowCount()){

    if ($_POST){

        $locationUrl = $panelUrl . "ayarlar";
        $site = $_POST['site'];
        $name = $_POST['username'];
        $password = $_POST['password'];
        $password_md5 = md5($_POST['password']);

        
            $editData = $data->prepare("update settings set
                            site=?,
                            username=?,
                            passwordText=?,
                            password=?
                            where id=?
                        ");

            $editProcess = $editData->execute(array($site,$name,$password,$password_md5,1));

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
            <h1 class="page_title">Genel Ayarlar</h1>
        </div>

        <div class="alert alert-primary mt-3" role="alert">
            <b>*</b> ile gösterilen alanlar zorunludur!
        </div>

        <form action="" method="post" enctype="multipart/form-data" class="form">

            <div class="row">
            <div class=" col-12">
                    <div class="inputBox">
                        <label for="">Site Adresi <span class="required">*</span></label>
                        <input type="text" name="site" required placeholder="Kullanıcı adı.." value="<?php echo $fetchData['site']; ?>">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="inputBox">
                        <label for="">Kullanıcı Adı <span class="required">*</span></label>
                        <input type="text" name="username" required placeholder="Kullanıcı adı.." value="<?php echo $fetchData['username']; ?>">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="inputBox">
                        <label for="">Şifre <span class="required">*</span></label>
                        <input type="text" name="password" required placeholder="Şifrenizi yazınız.." value="<?php echo $fetchData['passwordText']; ?>">
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
