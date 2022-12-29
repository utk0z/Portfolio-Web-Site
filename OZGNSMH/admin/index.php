<?php define("admin", true);  ?>
<?php

session_start();
ob_start();
include "db_file.php";

$getSettings = $data->prepare("SELECT * FROM settings where id=?");
$getSettings->execute(array(1));
$fetchSettings = $getSettings->fetch();

$siteUrl = $fetchSettings['site'];
$panelUrl = $siteUrl . "admin/";

if (!isset($_SESSION['username'])){
    header('location: login.php');
}

function ChangeImagesName($changeName){
    $changeName = explode(".",$changeName);
    $newChangeName = permalink($changeName[0]) . "." . $changeName[1];
    return $newChangeName;
}
?>
<base href="<?php echo $panelUrl ?>">
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/stylrers.css">
    <link rel="stylesheet" href="assets/css/form.css">
    <link rel="stylesheet" href="assets/css/sidebar.css">
    <link rel="stylesheet" href="assets/css/table.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
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
    <!--  Datatables  -->
    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <!-- CkEditör JS -->
    <script src="CkEditor/ckeditor.js"></script>
</head>
<body>

<?php
include "sidebar.php";
?>
<div class="section">
    <div class="container-flud">
    <?php
    $processUrl = @$_GET['sayfa'];

    switch ($processUrl){
        case '' : include "about.php"; break;
        case 'hakkinda-sayfasi' : include "about.php"; break;
        case 'bloglar' : include "blogs.php"; break;
        case 'blog-ekle' : include "add_blog.php"; break;
        case 'blog-duzenle' : include "edit_blog.php"; break;
        case 'blog-sil' : include "delete_blog.php"; break;
        case 'postlar' : include "posts.php"; break;
        case 'post-ekle' : include "add_post.php"; break;
        case 'post-sil' : include "delete_post.php"; break;
        case 'ayarlar' : include "settings_genel.php"; break;
        case 'cikis' : include "logout.php"; break;
        case 'hatali-sayfa' : include "404.php"; break;

        default:
            header("Location: hatali-sayfa");
    }
    ?>
    </div>
</div>



<!-- Ajax & Jquery CDN -->
<script src="../assets/js/ajax.js"></script>
<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>
<!-- Shopier JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js"></script>
<script src="https://s3.eu-central-1.amazonaws.com/shopier/framework.js"></script>
<!-- Bootstrap JS -->
<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/boostrap-cdn.js"></script>
<!-- Custom JS -->
<script src="assets/js/datatables.min.js"></script>
<script src="assets/js/language.js"></script>
<script>
    var site = '<?php  echo $panelUrl; ?>' ;
    CKEDITOR.replace('ckeditor', {
        height: 450,
        extraPlugins: 'filebrowser,justify,colorbutton',
        filebrowserBrowseUrl: site  + 'browser.php',
        filebrowserUploadMethod: 'form',
        filebrowserUploadUrl: site + "uploads.php"
    })
</script>
<!-- 2 Adet CKeditor için -->
<script>
    $(document).ready(function(){	
        $(".ck_editor").each(function(index){	
            var input_name = $(this).attr("name");	
            CKEDITOR.replace(input_name, {
                height: 450,
                extraPlugins: 'filebrowser,justify,colorbutton',
                filebrowserBrowseUrl: site  + 'browser.php',
                filebrowserUploadMethod: 'form',
                filebrowserUploadUrl: site + "uploads.php"
            });	
        });
    });
</script>


</body>
</html>
