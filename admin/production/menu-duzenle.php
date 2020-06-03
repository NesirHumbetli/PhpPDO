<?php
include "header.php";

/* $ayarsor = $db->prepare("SELECT * FROM ayar where ayar_id=?");
$ayarsor->execute(array(0));
$ayarcek = $ayarsor->fetch(PDO::FETCH_ASSOC); */
$menusor = $db->prepare("SELECT * FROM menu WHERE menu_id=:id");
$menusor->execute(array(
    ':id' => $_GET['menu_id']
));
$menucek = $menusor->fetch(PDO::FETCH_ASSOC);


?>

<head>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
</head>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Menu Parametrlər</h3>
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
                            <h2>Menu Parametrlər <small>
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
                            <form action="../netting/process.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <input type="hidden" name="menu_id" value="<?php echo $menucek['menu_id']; ?>">

                               

                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Üst menu</label>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <select class="select2_single form-control" tabindex="-1" required name="menu_ust">

                                            <option value=""></option>
                                            <option value="0">Üst menu</option>
                                            <?php
                                            $menusor = $db->prepare("SELECT * FROM menu WHERE menu_ust=:menu_ust ORDER BY menu_ad ASC ");
                                            $menusor->execute(array(
                                                ':menu_ust' => 0
                                            ));
                                            while ($menucek = $menusor->fetch(PDO::FETCH_ASSOC)) { ?>

                                                <option value="<?php echo $menucek['menu_id']; ?>"><?php echo $menucek['menu_ad']; ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <?php
                                $menusor = $db->prepare("SELECT * FROM menu WHERE menu_id=:id");
                                $menusor->execute(array(
                                    ':id' => $_GET['menu_id']
                                ));
                                $menucek = $menusor->fetch(PDO::FETCH_ASSOC);

                                ?>

                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Menu Ad <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" id="first-name" value="<?php echo $menucek['menu_ad']; ?>" name="menu_ad" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Menu Url <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" id="first-name" value="<?php echo $menucek['menu_url']; ?>" name="menu_url" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Menu Məzmun <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <textarea class="ckeditor" name="menu_detay"><?php echo $menucek['menu_detay']; ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Menu Sıra <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" id="first-name" value="<?php echo $menucek['menu_sira']; ?>" name="menu_sira" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Menu Status <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select id="heard" class="form-control" name="menu_durum" required>
                                            <?php
                                            if ($menucek['menu_durum'] == 1) { ?>

                                                <option value="1">Aktif</option>
                                                <option value="0">Deaktiv</option>
                                            <?php } elseif ($menucek['menu_durum'] == 0) { ?>

                                                <option value="1">Aktif</option>
                                                <option value="0">Deaktiv</option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                </div>

                                <div style="text-align: right;" class="col-md-8 col-sm-8 col-xs-12 col-sm-offset-3">
                                    <button type="submit" name="menuguncelle" class="btn btn-primary">Saxla</button>
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

<script src="../vendors/select2/dist/js/select2.full.min.js"></script>
<script>
    $(document).ready(function() {
        $(".select2_single").select2({
            placeholder: "Select a state",
            allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
            maximumSelectionLength: 4,
            placeholder: "With Max Selection limit 4",
            allowClear: true
        });
    });
</script>

<?php include "footer.php"; ?>