<div class="container">
  <?php
  $getWork = @$_GET['icerik'];
  $getWorkData = $data->prepare("SELECT * FROM works where publish=? and link=? limit 1");
  $getWorkData->execute(array(1,$getWork));
  $fetchWork = $getWorkData->fetch();
  ?>
  <?php include "profile.php"; ?>
  <div class="detail-title">
    <span>Calısmalar ></span><h1><?= $fetchWork['title']; ?></h1>
  </div>
  <div class="detail-exp">
    <?= $fetchWork['exp']; ?>
  </div>
  <div class="detail-content">
    <?= $fetchWork['content']; ?>
  </div>
</div>
