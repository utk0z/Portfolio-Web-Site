<div class="container">
  <div class="row">
  <?php
    $postData = $data->prepare("SELECT * FROM posts order by id desc ");
    $postData->execute();
    $fetchData = $postData->fetchAll(PDO::FETCH_ASSOC);

    if($postData->rowCount()){
        foreach($fetchData as $writeData){
            ?>
            <div class="col-lg-4 col-md-6 col-12">
              <div class="post-box posts">
                <div class="post-img">
                  <a target="_blank" href="<?= $writeData['link'] ?>">
                      <img src="<?= $writeData['image'] ?>" alt="post image">
                    </a>
                </div>
                <div class="post-text">
                  <p class="post-title"><?= $writeData['title'] ?></p>
                  <p class="post-exp"><?= $writeData['exp'] ?></p>
                </div>
              </div>
            </div>
            <?php
        }
    }
    ?>
  </div> 
</div>
