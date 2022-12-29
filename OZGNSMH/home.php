<div class="container">
      <div class="text-animate"> <p class="typed hello"></p> </div>
      <?php include "profile.php"; ?>
        <?php
        $aboutData = $data->prepare("SELECT * FROM about where id=1 limit 1");
        $aboutData->execute(array(1));
        $fetchAbout = $aboutData->fetch();
        if($aboutData->rowCount()){
            ?>
            <h3 class="text-title">Work</h3>
            <div class="padding-text">
                <p><?= $fetchAbout['work'] ?></p> </div>
            <button class="my-button"><a href="calismalar">My Portfolio</a></button>
            <h3 class="text-title">Bio</h3>
            <div class="padding-text">
                <p><?= $fetchAbout['about'] ?></p> </div>
            <h3 class="text-title">I love</h3>
            <div class="padding-text">
                <p><?= $fetchAbout['love'] ?></p> </div>
            <h3 class="text-title">On the Web</h3>
            <ul class="social-links">
                <li><a href="">@instagram</a></li>
                <li><a href="">@Discord</a></li>
                <li><a href="">@Linkedin</a></li>
                <li><a href="">@GitHub</a></li> </ul> <?php } ?>
          <div class="row">
        <?php
        $postData = $data->prepare("SELECT * FROM posts order by id desc limit 2");
        $postData->execute();
        $fetchData = $postData->fetchAll(PDO::FETCH_ASSOC);
        if($postData->rowCount()){
            foreach($fetchData as $writeData){
                ?>
                <div class="col-md-6 col-12">
                <div class="post-box">
                    <div class="post-img">
                        <a href="<?= $writeData['link'] ?>">
                        <img src="<?= $writeData['image'] ?>" alt="post image">
                        </a>
                    </div>
                    <div class="post-text">
                    <p class="post-title"><?= $writeData['title'] ?></p>
                    <p class="post-exp"><?= $writeData['exp'] ?></p>
                    </div>
                </div>
                </div>
                <?php } } ?> </div>
      <button class="my-button"><a href="postlar">Popular post's</a></button>
    </div>  