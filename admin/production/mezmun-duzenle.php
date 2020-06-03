<?php
include "header.php";

$ayarsor = $db->prepare("SELECT * FROM ayar where ayar_id=?");
$ayarsor->execute(array(0));
$ayarcek = $ayarsor->fetch(PDO::FETCH_ASSOC);

$mezmunsor = $db->prepare("SELECT * FROM mezmun WHERE mezmun_id=:id");
$mezmunsor->execute(array(
    ':id' => $_GET['mezmun_id']
));
$mezmuncek = $mezmunsor->fetch(PDO::FETCH_ASSOC);

?>

<head>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</head>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Parametrlər</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Açar sözü girin...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Axtar</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>mezmun Parametrlər <small>
                                    <?php
                                    if (isset($_GET['status']) && $_GET['status'] == 'ok') { ?>

                                        <b style="color: green;">Güncəlləndi.</b>

                                    <?php } elseif (isset($_GET['status']) && $_GET['status'] == 'no') { ?>

                                        <b style="color: red;">Güncəllənmədi.</b>

                                    <?php } ?>
                                </small></h2>
                            <ul class="nav navbar-right panel_toolbox">

                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                            <form action="../netting/process.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <input type="hidden" name="mezmun_id" value="<?php echo $mezmuncek['mezmun_id']; ?>">
                                <input type="hidden" name="mezmun_resimyol" value="<?php echo $mezmuncek['mezmun_resimyol']; ?>">
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Yüklü Resim <span class="required">*</span>
                                    </label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <img width="200" height="100" src="../../<?php echo $mezmuncek['mezmun_resimyol']; ?>" alt="Resim">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Məzmun Resim <span class="required">*</span>
                                    </label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <input type="file" id="first-name" name="mezmun_resimyol"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Məzmun Ad <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" id="first-name" value="<?php echo $mezmuncek['mezmun_ad']; ?>" name="mezmun_ad" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Məzmun Tarix <span class="required">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="date" id="first-name" value="<?php echo $tarix = substr($mezmuncek['mezmun_zaman'], 0, 10); ?>" name="mezmun_tarix" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="time" id="first-name" value="<?php echo $vaxt = substr($mezmuncek['mezmun_zaman'], 11); ?>" name="mezmun_vaxt" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Məzmun <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <textarea class="ckeditor" name="mezmun_movzu"><?php echo $mezmuncek['mezmun_movzu']; ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Məzmun Açar söz <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" id="first-name" value="<?php echo $mezmuncek['mezmun_keyword']; ?>" name="mezmun_keyword" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Məzmun Status <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select id="heard" class="form-control" name="mezmun_durum" required>
                                            <?php if ($mezmuncek['mezmun_durum'] == 0) { ?>
                                                <option value="1">Aktif</option>
                                                <option value="0">Deaktiv</option>
                                            <?php } elseif ($mezmuncek['mezmun_durum'] == 1) { ?>
                                                <option value="1">Aktif</option>
                                                <option value="0">Deaktiv</option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                </div>

                                <div style="text-align: right;" class="col-md-8 col-sm-8 col-xs-12 col-sm-offset-3">
                                    <button type="submit" name="mezmunduzenle" class="btn btn-primary">Saxla</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<?php include "footer.php"; ?>