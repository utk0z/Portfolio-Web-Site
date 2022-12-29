 <div class="container">
    <?php include "profile.php"; ?>
      <div class="row">
        <?php 
        $getWork = $data->prepare("SELECT * FROM works where publish=?");
        $getWork->execute(array(1));
        $fetchWork = $getWork->fetchAll(PDO::FETCH_ASSOC);
        if($getWork->rowCount()){
            foreach($fetchWork as $writeWork){
                ?>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="work-box">
                        <a href="<?= $siteUrl . "calisma/" . $writeWork['link'] ?>">
                        <div class="work-img">
                            <img src="<?= $siteUrl . $writeWork['image'] ?>" alt="work image">
                        </div>
                        </a>
                        <div class="work-text">
                        <p class="work-title"><?= $writeWork['title'] ?></p>
                        <p class="work-exp"><?= $writeWork['exp'] ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
      </div>
    </div>
    