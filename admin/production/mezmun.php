<?php
include "header.php";


if (isset($_POST['axtaran'])) {

  $axtarilan = $_POST['axtarilan'];

  $mezmunsor = $db->prepare("SELECT * FROM mezmun WHERE mezmun_ad LIKE '%$axtarilan%'  ORDER BY mezmun_id ASC LIMIT 25");

  $mezmunsor->execute();

  $say = $mezmunsor->rowCount();
} else {

  $mezmunsor = $db->prepare("SELECT * FROM mezmun ORDER BY mezmun_id DESC LIMIT 25");

  $mezmunsor->execute();

  $say = $mezmunsor->rowCount();
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

              <h2 style="margin-top: 20px" class="col-md-4">Məzmun Paneli<small>
                <?php echo $say . " Seçilmiş Siyahı"; ?>

                  <?php
                  if (isset($_GET['status']) && $_GET['status'] == 'ok') { ?>

                    <b style="color: green;">Əlavə olundu.</b>

                  <?php } elseif (isset($_GET['status']) && $_GET['status'] == 'no') { ?>

                    <b style="color: red;">Əlavə olunmadı.</b>

                  <?php } elseif (isset($_GET['kontrol']) && $_GET['kontrol'] == 'ok') { ?>

                    <b style="color: green;">Məzmun Silindi.</b>

                  <?php } elseif (isset($_GET['kontrol']) && $_GET['kontrol'] == 'no') { ?>

                    <b style="color: red;">Məzmun Silinmədi.</b>

                  <?php } ?>
                </small></h2>

              <div style="text-align: right" class="col-md-8">
                <a href="mezmun-ekle.php"><button style="margin-top: 10px" class="btn btn-success"><i class="fa fa-plus"></i> Yeni</button></a>
              </div>
              <div class="clearfix"></div>
            </div>

            <div class="x_content">


              <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                  <thead>
                    <tr class="headings">

                      <th class="column-title text-center">Məzmun Tarix </th>
                      <th class="column-title">Məzmun Ad </th>
                      <th class="column-title text-center">Məzmun Durum </th>
                      <th style="width: 80px" class="column-title"></th>
                      <th style="width: 80px" class="column-title"></th>


                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    /* $mezmunsor = $db->prepare("SELECT * FROM mezmun ORDER BY mezmun_sira ASC,mezmun_durum DESC LIMIT 25");
                    $mezmunsor->execute(); */
                    while ($mezmuncek = $mezmunsor->fetch(PDO::FETCH_ASSOC)) { ?>

                      <tr class="even pointer">

                        
                        <td style="width: 170px" class="text-center "><?php echo $mezmuncek['mezmun_zaman'] ?></td>
                        <td><?php echo $mezmuncek['mezmun_ad'] ?></td>
                        <td class="text-center ">
                          <?php
                          if ($mezmuncek['mezmun_durum'] == "1") {
                            echo "Aktiv";
                          } else {

                            echo "Deaktiv";
                          }

                          ?>

                        </td>
                        <td class=" "><a href="mezmun-duzenle.php?mezmun_id=<?php echo $mezmuncek['mezmun_id']; ?>"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Redaktə</button></a></td>
                        <td class=" "><a href="../netting/process.php?yol=<?php echo $mezmuncek['mezmun_resimyol']; ?>&mezmunsil=ok&mezmun_id=<?php echo $mezmuncek['mezmun_id']; ?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Sil</button></a></td>
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