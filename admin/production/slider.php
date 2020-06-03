<?php
include "header.php";


if (isset($_POST['axtaran'])) {

  $axtarilan = $_POST['axtarilan'];

  $slidersor = $db->prepare("SELECT * FROM slider WHERE slider_ad LIKE '%$axtarilan%'  ORDER BY slider_sira ASC,slider_durum DESC LIMIT 25");

  $slidersor->execute();

  $say = $slidersor->rowCount();
} else {

  $slidersor = $db->prepare("SELECT * FROM slider ORDER BY slider_sira ASC,slider_durum DESC LIMIT 25");

  $slidersor->execute();

  $say = $slidersor->rowCount();
}

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
            <div class="x_title">

              <h2 style="margin-top: 20px" class="col-md-4">Slider Paneli<small>
                <?php echo $say . " Seçilmiş Siyahı"; ?>

                  <?php
                  if (isset($_GET['status']) && $_GET['status'] == 'ok') { ?>

                    <b style="color: green;">Əlavə olundu.</b>

                  <?php } elseif (isset($_GET['status']) && $_GET['status'] == 'no') { ?>

                    <b style="color: red;">Əlavə olunmadı.</b>

                  <?php } elseif (isset($_GET['kontrol']) && $_GET['kontrol'] == 'ok') { ?>

                    <b style="color: green;">Slider Silindi.</b>

                  <?php } elseif (isset($_GET['kontrol']) && $_GET['kontrol'] == 'no') { ?>

                    <b style="color: red;">Slider Silinmədi.</b>

                  <?php } ?>
                </small></h2>

              <div style="text-align: right" class="col-md-8">
                <a href="slider-ekle.php"><button style="margin-top: 10px" class="btn btn-success"><i class="fa fa-plus"></i> Yeni</button></a>
              </div>
              <div class="clearfix"></div>
            </div>

            <div class="x_content">


              <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                  <thead>
                    <tr class="headings">

                      <th style="width: 150px" class="column-title">Slider Resim </th>
                      <th class="column-title">Slider Ad </th>
                      <th class="column-title text-center">Slider Sira </th>
                      <th class="column-title text-center">Slider Durum </th>
                      <th style="width: 80px" class="column-title"></th>
                      <th style="width: 80px" class="column-title"></th>


                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    /* $slidersor = $db->prepare("SELECT * FROM slider ORDER BY slider_sira ASC,slider_durum DESC LIMIT 25");
                    $slidersor->execute(); */
                    while ($slidercek = $slidersor->fetch(PDO::FETCH_ASSOC)) { ?>

                      <tr class="even pointer">

                        <td class=" ">
                          <img width="200" height="100" src="../../<?php echo $slidercek['slider_resimyol'] ?>" alt="Resim">
                        </td>
                        <td class=""><?php echo $slidercek['slider_ad'] ?></td>
                        <td class="text-center "><?php echo $slidercek['slider_sira'] ?></td>
                        <td class="text-center ">
                          <?php
                          if ($slidercek['slider_durum'] == "1") {
                            echo "Aktiv";
                          } else {

                            echo "Deaktiv";
                          }

                          ?>

                        </td>
                        <td class=" "><a href="slider-duzenle.php?slider_id=<?php echo $slidercek['slider_id']; ?>"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Redaktə</button></a></td>
                        <td class=" "><a href="../netting/process.php?yol=<?php echo $slidercek['slider_resimyol']; ?>&slidersil=ok&slider_id=<?php echo $slidercek['slider_id']; ?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Sil</button></a></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
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