
<?php
include "db_file.php";

$findDomain = $data->prepare("SELECT * FROM settings");
$findDomain->execute();
$fetchDomain = $findDomain->fetchAll(PDO::FETCH_ASSOC);

foreach ($fetchDomain as $find) {
    $site = $find['site'];
}
$sitePanel = $site . "admin/";

$imageUploadUrl = $site . "assets/img/editor/";

if(isset($_FILES['upload']['name']))
{
    function ChangeImagesName($changeName){
        $changeName = explode(".",$changeName);
        $newChangeName = permalink($changeName[0]) . "." . $changeName[1];
        return $newChangeName;
    }

    $file = $_FILES['upload']['tmp_name'];
    $file_name = $_FILES['upload']['name'];
    $file_name_array = explode(".",$file_name);
    $extension = end($file_name_array);
    $allowed_extension = array("jpg","gif","png","svg","webp");
    if (in_array($extension,$allowed_extension)){
        $file_name = ChangeImagesName($file_name);
        move_uploaded_file($file, '../assets/img/editor/' . $file_name);
        $function_number = $_GET['CKEditorFuncNum'];
        $url = $imageUploadUrl . $file_name;
        $message = '';
        echo "<script>window.parent.CKEDITOR.tools.callFunction('".$function_number."','".$url."','".$message."');</script>";
    }

}
?>