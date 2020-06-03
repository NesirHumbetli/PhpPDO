<?php
include "header.php";

$ayarsor = $db->prepare("SELECT * FROM ayar where ayar_id=?");
$ayarsor->execute(array(0));
$ayarcek = $ayarsor->fetch(PDO::FETCH_ASSOC);

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

                                        <b style="color: green;">Əlavə olundu.</b>

                                    <?php } elseif (isset($_GET['status']) && $_GET['status'] == 'no') { ?>

                                        <b style="color: red;">Əlavə olunmadı.</b>

                                    <?php } ?>
                                </small></h2>
                            <ul class="nav navbar-right panel_toolbox">

                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                            <form action="../netting/process.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Məzmun Resim <span class="required">*</span>
                                    </label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <input type="file" id="first-name" name="mezmun_resimyol" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Məzmun Ad <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" id="first-name" placeholder="Məzmun Ad" name="mezmun_ad" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Məzmun Tarix <span class="required">*</span>
                                    </label>
                                        <div class="col-md-3">
                                            <input type="date" id="first-name" value="<?php echo date('Y-m-d'); ?>" name="mezmun_tarix" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="time" id="first-name" value="<?php echo date('H:i:s'); ?>" name="mezmun_vaxt" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Məzmun <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <textarea class="ckeditor" name="mezmun_movzu"></textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Məzmun Açar söz <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" id="first-name" placeholder="Məzmun Açar söz" name="mezmun_keyword" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Məzmun Status <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select id="heard" class="form-control" name="mezmun_durum" required>
                                            <option value="1">Aktif</option>
                                            <option value="0">Deaktiv</option>

                                        </select>
                                    </div>

                                </div>

                                <div style="text-align: right;" class="col-md-8 col-sm-8 col-xs-12 col-sm-offset-3">
                                    <button type="submit" name="mezmunkaydet" class="btn btn-primary">Saxla</button>
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