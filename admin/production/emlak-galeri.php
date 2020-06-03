<?php
include "header.php";

$galerisor = $db->prepare("SELECT * FROM galeri WHERE mezmun_id=:id");
$galerisor->execute(array(
    ':id' => $_GET['emlak_id']
));

$say = $galerisor->rowCount();


?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">

        </div>
        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <form action="" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" name="axtarilan" placeholder="Açar sözü girin...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" name="axtaran" type="submit">Axtar</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">

                            <h2 style="margin-top: 20px" class="col-md-4">Galeri Paneli<small>
                                    <?php echo $say . " Seçilmiş Resm"; ?>

                                    <?php
                                    if (isset($_GET['status']) && $_GET['status'] == 'ok') { ?>

                                        <b style="color: green;">Əlavə olundu.</b>

                                    <?php } elseif (isset($_GET['status']) && $_GET['status'] == 'no') { ?>

                                        <b style="color: red;">Əlavə olunmadı.</b>

                                    <?php } elseif (isset($_GET['kontrol']) && $_GET['kontrol'] == 'ok') { ?>

                                        <b style="color: green;">Resm Silindi.</b>

                                    <?php } elseif (isset($_GET['kontrol']) && $_GET['kontrol'] == 'no') { ?>

                                        <b style="color: red;">Resm Silinmədi.</b>

                                    <?php } ?>
                                </small></h2>

                            <div style="text-align: right" class="col-md-8">
                                <!-- <button href="../netting/process.php"><button type="submit" style="margin-top: 10px" class="btn btn-danger"><i class="fa fa-trash"></i> Seçilənləri Sil</button></a> -->
                                <a href="galeri-yukle.php?emlak_id=<?php echo $_GET['emlak_id']; ?>"><button style="margin-top: 10px" class="btn btn-success"><i class="fa fa-plus"></i> Galeri Yüklə</button></a>
                            </div>
                            <div class="clearfix"></div>

                            <div class="x_content">
                                <div class="row">
                                    <form action="../netting/process.php" method="POST">
                                        <input type="hidden" name="emlak_id" value="<?php echo $_GET['emlak_id']; ?>">
                                        <?php
                                        while ($galericek = $galerisor->fetch(PDO::FETCH_ASSOC)) {

                                        ?>

                                            <div class="col-md-55">

                                                <div class="image view view-first">
                                                    <img style="width: 100%;height: 120px; display: block;" src="../../<?php echo $galericek['galeri_resimyol']; ?>" alt="image" />
                                                </div>

                                                <div>
                                                    <input type="checkbox" name="check[]" value="<?php echo $galericek['galeri_id']; ?>"> Seç
                                                </div>

                                            </div>
                                        <?php } ?>
                                        <div style="position: relative;">
                                            <div style="text-align: right;position: absolute;left: 75%;bottom: 114%;margin-bottom: 5px;">
                                                <button type="submit" name="galerigonder" style="margin-top: 10px;" class="btn btn-danger"><i class="fa fa-trash"></i> Seçilənləri Sil</button></a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<?php include "footer.php"; ?>