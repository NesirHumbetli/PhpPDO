<?php
include "header.php";


if (isset($_POST['axtaran'])) {

  $axtarilan = $_POST['axtarilan'];

  $emlaksor = $db->prepare("SELECT * FROM emlak WHERE emlak_ad LIKE '%$axtarilan%'  ORDER BY emlak_id ASC LIMIT 25");

  $emlaksor->execute();

  $say = $emlaksor->rowCount();
} else {

  $emlaksor = $db->prepare("SELECT * FROM emlak ORDER BY emlak_zaman LIMIT 25");

  $emlaksor->execute();

  $say = $emlaksor->rowCount();
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

              <h2 style="margin-top: 20px" class="col-md-4">Əmlak Parametr<small>
                <?php echo $say . " Seçilmiş Siyahı"; ?>

                  <?php
                  if (isset($_GET['status']) && $_GET['status'] == 'ok') { ?>

                    <b style="color: green;">Əlavə olundu.</b>

                  <?php } elseif (isset($_GET['status']) && $_GET['status'] == 'no') { ?>

                    <b style="color: red;">Əlavə olunmadı.</b>

                  <?php } elseif (isset($_GET['kontrol']) && $_GET['kontrol'] == 'ok') { ?>

                    <b style="color: green;">Əmlak Silindi.</b>

                  <?php } elseif (isset($_GET['kontrol']) && $_GET['kontrol'] == 'no') { ?>

                    <b style="color: red;">Əmlak Silinmədi.</b>

                  <?php } ?>
                </small></h2>

              <div style="text-align: right" class="col-md-8">
                <a href="emlak-ekle.php"><button style="margin-top: 10px" class="btn btn-success"><i class="fa fa-plus"></i> Yeni</button></a>
              </div>
              <div class="clearfix"></div>
            </div>

            <div class="x_content">


              <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                  <thead>
                    <tr class="headings">

                      <th class="column-title">Əmlak Foto </th>
                      <th class="column-title text-center">Əmlak Başlıq </th>
                      <th class="column-title text-center">Əmlak Qiymət </th>
                      <th class="column-title text-center">Əmlak Status </th>
                      <th style="width: 80px" class="column-title"></th>
                      <th style="width: 80px" class="column-title"></th>
                      <th style="width: 80px" class="column-title"></th>


                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    /* $emlaksor = $db->prepare("SELECT * FROM emlak ORDER BY emlak_sira ASC,emlak_durum DESC LIMIT 25");
                    $emlaksor->execute(); */
                    while ($emlakcek = $emlaksor->fetch(PDO::FETCH_ASSOC)) { 
                        $emlak_id = $emlakcek['emlak_id'];
                      ?>

                      <tr class="even pointer">

                        
                        <td style="width: 100px;"><img style="width: 120px;height: 70px;" src="../../<?php echo $emlakcek['emlak_resimyol']; ?>" alt=""></td>
                        <td class="text-center"><?php echo $emlakcek['emlak_basliq']; ?></td>
                        <td class="text-center"><?php echo $emlakcek['emlak_qiymet']; ?> $(USD)</td>
                        <td class="text-center">
                          <?php
                          if ($emlakcek['emlak_durum'] == "Satılır") {
                            echo "Satılır";
                          } elseif ($emlakcek['emlak_durum'] == "Kirayə") {

                            echo "Kirayə";
                          }

                          ?>

                        </td>
                        <td class=" "><a href="emlak-galeri.php?emlak_id=<?php echo $emlakcek['emlak_id']; ?>"><button class="btn btn-success btn-sm"><i class="fa fa-image"></i> Galeri</button></a></td>
                        <td class=" "><a href="emlak-duzenle.php?emlak_id=<?php echo $emlakcek['emlak_id']; ?>"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Redaktə</button></a></td>
                        <td class=" "><a href="../netting/process.php?yol=<?php echo  $emlakcek['emlak_resimyol']; ?>&emlaksil=ok&emlak_id=<?php echo $emlakcek['emlak_id']; ?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Sil</button></a></td>
                      </tr>

                      <!-- ALT emlak -->
                      <?php 
                        $altemlaksor = $db->prepare("SELECT * FROM emlak WHERE emlak_ust=:ust");
                        $altemlaksor->execute(array(
                          ':ust' => $emlak_id
                        ));

                        while ($altemlakcek = $altemlaksor->fetch(PDO::FETCH_ASSOC)) { ?>

                      <tr class="even pointer">

                        
                        <td>--- <?php echo $altemlakcek['emlak_ad'] ?></td>
                        <td class="text-center"></i><?php echo $altemlakcek['emlak_ust'] ?></td>
                        <td class="text-center"><?php echo $altemlakcek['emlak_sira'] ?></td>
                        <td class="text-center">
                          <?php
                          if ($altemlakcek['emlak_durum'] == "1") {
                            echo "Aktiv";
                          } else {

                            echo "Deaktiv";
                          }

                          ?>

                        </td>
                        <td class=" "><a href="emlak-duzenle.php?emlak_id=<?php echo $altemlakcek['emlak_id']; ?>"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Redaktə</button></a></td>
                        <td class=" "><a href="../netting/process.php?yol=&emlaksil=ok&emlak_id=<?php echo $altemlakcek['emlak_id']; ?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Sil</button></a></td>
                      </tr>
                        <?php } ?>
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