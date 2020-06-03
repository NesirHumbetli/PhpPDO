<?php
include "header.php";

$emlaksor = $db->prepare("SELECT * FROM emlak where emlak_id=:id");
$emlaksor->execute(array(
    ':id' => $_GET['emlak_id']
));
$emlakcek = $emlaksor->fetch(PDO::FETCH_ASSOC);

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
                            <h2>Əmlak Redaktə <small>
                                    <?php
                                    if (isset($_GET['status']) && $_GET['status'] == 'ok') { ?>

                                        <b style="color: green;">Güncəlləndi.</b>

                                    <?php } elseif (isset($_GET['status']) && $_GET['status'] == 'no') { ?>

                                        <b style="color: red;">Güncəllənmədi.</b>

                                    <?php } ?>
                                </small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                            <div style="text-align: right" class="col-md-9">
                                <a href="emlak.php"><button class="btn btn-warning"><i class="fa fa-undo"></i> Geri</button></a>
                            </div>
                            </ul>
                            
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                            <form action="../netting/process.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <input type="hidden" name="emlak_id" value="<?php echo $emlakcek['emlak_id']; ?>">
                                <input type="hidden" name="emlak_resimyol" value="<?php echo $emlakcek['emlak_resimyol']; ?>">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklü Resim <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <img width="200" height="100" src="../../<?php echo $emlakcek['emlak_resimyol']; ?>" alt="emlak">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Əmlak Resim <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="file" id="first-name" name="emlak_resimyol" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Əmlak Başlıq <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" value="<?php echo $emlakcek['emlak_basliq']; ?>" name="emlak_basliq" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Əmlak Adres <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" value="<?php echo $emlakcek['emlak_adres']; ?>" name="emlak_adres" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Əmlak Qiymət <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" value="<?php echo $emlakcek['emlak_qiymet'] ?>" name="emlak_qiymet" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Əmlak Məzmun <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea class="ckeditor" name="emlak_detay"><?php echo $emlakcek['emlak_detay']; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Əmlak Status <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select id="heard" class="form-control" name="emlak_durum" required>
                                           
                                                <option value="Satılır" <?php if($emlakcek['emlak_durum'] == "Satılır"){ echo "selected";} ?>>Satılır</option>
                                                <option value="Kirayə" <?php if($emlakcek['emlak_durum'] == "Kirayə"){ echo "selected";} ?>>Kirayə</option>
                                            
                                        </select>
                                    </div>

                                </div>

                                <div style="text-align: right;" class="col-md-6 col-sm-6 col-xs-12 col-sm-offset-3">
                                    <button type="submit" name="emlakduzenle" class="btn btn-primary">Saxla</button>
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