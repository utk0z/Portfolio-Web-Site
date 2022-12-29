<?php

include "admin/db_file.php";

$getSettings = $data->prepare("SELECT * FROM settings where id=?");
$getSettings->execute(array(1));
$fetchSettings = $getSettings->fetch();

$siteUrl = $fetchSettings['site'];

?>
<base href="<?php echo $siteUrl ?>">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ozgnsmh</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>
   
    <?php include "header.php"; ?>

    
    <?php
    $getUrl = @$_GET['sayfa'];
    switch ($getUrl){
      case '' : include "home.php"; break;
      case 'calismalar' : include "works.php"; break;
      case 'calisma' : include "workDetail.php"; break;
      case 'postlar' : include "posts.php"; break;
     
      default:
          header("Location: hatali-sayfa");
  }

    ?>
    
    <?php include "footer.php"; ?>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/type.js"></script>
    <script>
      const modeBtn = document.querySelector(".mode-button");
      const body = document.querySelector("body");

      let selectMode; 
      if(localStorage.getItem("mode")){
        selectMode = localStorage.getItem("mode");
      }else{
        localStorage.setItem("mode","light")
        selectMode = localStorage.getItem("mode");
      }

      body.className = selectMode;
      modeBtn.className = "mode-button " + selectMode;

      modeBtn.addEventListener("click", () => {

        if(body.className == "dark"){
          localStorage.setItem("mode","ligth")
        }else{
          localStorage.setItem("mode","dark")
        }
        
        selectLocalMode = localStorage.getItem("mode");

        body.className = selectLocalMode;
        modeBtn.className = "mode-button " + selectLocalMode;
      })
    </script>


<script>
    let type = new Typed(".typed",{
        strings: [
            "Merhabalar ben <a>Türkiye</a>'de bir öğrenciyim !"
        ],
        typeSpeed: 50,
        backSpeed: 20,
        loop: true,
        smartBackspace: true
    });
    </script>
</body>
</html>