<?php
include "header.php";

$ayarsor = $db->prepare("SELECT * FROM ayar where ayar_id=?");
$ayarsor->execute(array(0));
$ayarcek = $ayarsor->fetch(PDO::FETCH_ASSOC);

?>

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
                            <h2>Ümumi Parametrlər <small>
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

                            <!-- ÜMUMİ PARAMETRLƏR -->

                            <form action="../netting/process.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sayt Adresi <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" value="<?php echo $ayarcek['ayar_sayturl']; ?>" name="ayar_sayturl" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sayt Başlığı <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" value="<?php echo $ayarcek['ayar_title']; ?>" name="ayar_title" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Saytın İzahı <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" value="<?php echo $ayarcek['ayar_description']; ?>" name="ayar_description" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sayt Açar sözlər<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" value="<?php echo $ayarcek['ayar_keywords']; ?>" name="ayar_keywords" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Saytın Müəllifi<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" value="<?php echo $ayarcek['ayar_author']; ?>" name="ayar_author" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <hr>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Durum<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">

                                        <select id="heard" class="form-control" name="ayar_slider" required>

                                                <option value="1" <?php if($ayarcek['ayar_slider'] == 1) {echo 'selected';} ?>>Aktif</option>
                                                <option value="0" <?php if($ayarcek['ayar_slider'] == 0) {echo 'selected';} ?>>Deaktiv</option>
                                            
                                        </select>
                                    </div>
                                </div>

                                <div style="text-align: right;" class="col-md-6 col-sm-6 col-xs-12 col-sm-offset-3">
                                    <button type="submit" name="genelayarkaydet" class="btn btn-primary">Güncəllə</button>
                                </div>

                            </form>

                            <!-- HEADER LOGO -->

                            <form action="../netting/process.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklü Logo <span class="required">*<br>313x103px</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php
                                        if (strlen($ayarcek['ayar_logo']) > 0) { ?>

                                            <img width="200" style="background-color: rgba(0, 0, 0, 0.1);" src="../../<?php echo $ayarcek['ayar_logo']; ?>" alt="Slider">
                                        <?php } else { ?>

                                            <img width="200" style="background-color: rgba(0, 0, 0, 0.1);" src="../../images/logo-yok.png" alt="Empty">

                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Logo Resim <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="file" id="first-name" name="ayar_logo" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <input type="hidden" name="ayar_kohne" value="<?php echo $ayarcek['ayar_logo']; ?>">

                                <div style="text-align: right;" class="col-md-6 col-sm-6 col-xs-12 col-sm-offset-3">
                                    <button type="submit" name="logoduzenle" class="btn btn-primary">Güncəllə</button>
                                </div>
                            </form>

                            <!-- MAİN ƏLAQƏ BACKGROUND -->

                            <form action="../netting/process.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Main Əlaqə Background <span class="required">*<br></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php
                                        if (strlen($ayarcek['ayar_mainbg']) > 0) { ?>

                                            <img width="200" src="../../<?php echo $ayarcek['ayar_mainbg']; ?>" alt="Slider">
                                        <?php } else { ?>

                                            <img width="200" src="../../images/logo-yok.png" alt="Empty">

                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Logo Resim <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="file" id="first-name" name="ayar_mainbg" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <input type="hidden" name="ayar_oldbg" value="<?php echo $ayarcek['ayar_mainbg']; ?>">

                                <div style="text-align: right;" class="col-md-6 col-sm-6 col-xs-12 col-sm-offset-3">
                                    <button type="submit" name="mainbgduzenle" class="btn btn-primary">Güncəllə</button>
                                </div>
                            </form>

                            <!-- FOOTER LOGO -->

                            <form action="../netting/process.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklü Footer Logo <span class="required">*<br>313x103px</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php
                                        if (strlen($ayarcek['ayar_altlogo']) > 0) { ?>

                                            <img style="background-color: rgba(0, 0, 0, 0.1)" width="200" src="../../<?php echo $ayarcek['ayar_altlogo']; ?>" alt="Photo">
                                        <?php } else { ?>

                                            <img width="200" src="../../images/logo-yok.png" alt="Photo">

                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Logo Resim <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="file" id="first-name" name="ayar_altlogo" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <input type="hidden" name="ayar_altkohne" value="<?php echo $ayarcek['ayar_altlogo']; ?>">

                                <div style="text-align: right;" class="col-md-6 col-sm-6 col-xs-12 col-sm-offset-3">
                                    <button type="submit" name="altlogoduzenle" class="btn btn-primary">Güncəllə</button>
                                </div>
                            </form>
                            <hr>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<?php include "footer.php"; ?>