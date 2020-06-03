<?php include "header.php"; ?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">


        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">

                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <div class="col-md-3">
                                                <h2>Çoxsaylı Rəsm yükləmə</h2>
                                            </div>
                                            <div style="text-align: right;" class="col-md-9">
                                                <a href="emlak-galeri.php?emlak_id=<?php echo $_GET['emlak_id']; ?>"><button class="btn btn-success"><i class="fa fa-eye"></i> Seçilənləri Gör</button></a>
                                            </div>
                                            <div class="clearfix"></div>

                                        </div>
                                        <div class="x_content">
                                            <p>Çox yükləmə üçün aşağıdakı qutuya birdən çox fayl sürün və ya faylları seçmək üçün vurun.</p>
                                            <form action="galeri.php" class="dropzone">
                                                <input type="hidden" name="emlak_id" value="<?php echo $_GET['emlak_id']; ?>">
                                            </form>

                                        </div>
                                    </div>
                                </div>
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