<?php !defined("admin") ? header("location: hatali-sayfa") : null ?>
<div class="container-fluid">
    <div class="customers-table box-div">
        <h2 class="table-title bolder pl-2"><i class="bi bi-list-stars"></i> Postlar <a href="post-ekle"><span
                    class="bi bi-plus"></span> Post Ekle</a></h2>
        <?php
        $getData = $data->prepare("SELECT * FROM posts");
        $getData->execute();
        $fetchData = $getData->fetchAll(PDO::FETCH_ASSOC);

        if ($getData->rowCount()) {
            ?>
            <div class="table-responsive">
                <table class="table table-borderless" id="myTable">
                    <thead>
                    <tr>
                        <th>Resim</th>
                        <th>Başlık</th>
                        <th>link</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($fetchData as $writeData) {
                        ?>
                        <tr>
                            <td><img src="<?php echo $siteUrl . $writeData['image']; ?>" alt=""></td>
                            <td><?php echo $writeData['title']; ?></td>
                            <td><a class="statistic plus mr-1" target="_blank" href="<?php echo $writeData['link']; ?>">Göster</a></td>
                            <td>
                                <a class="statistic minus mr-1" href="" data-toggle="modal"
                                   data-target="#exampleModalCenter-<?php echo $writeData['id']; ?>"><i
                                        class="bi bi-trash"></i></a>
                            </td>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter-<?php echo $writeData['id']; ?>"
                                 tabindex="-1"
                                 role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Blog yazısını silmek
                                                istediğinize emin
                                                misiniz?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="px-2 py-4"><i
                                                        class="bi bi-x"></i></span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Seçtiğiniz blog yazısı silinecektir! Bu işlem geri alınamaz. Onaylıyor musunuz?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="link_box red" data-dismiss="modal">Vazgeç
                                            </button>
                                            <a href="post-sil/<?php echo $writeData['id']; ?>" class="link_box">Evet,
                                                Sil</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <?php
        } else {
            ?>
            <div class="alert alert-danger" role="alert">
                Eklenmiş bir post bulunamadı!
            </div>
            <?php
        }
        ?>
    </div>
</div>


