<?php
include "header.php";


if (isset($_POST['axtaran'])) {

  $axtarilan = $_POST['axtarilan'];

  $menusor = $db->prepare("SELECT * FROM menu WHERE menu_ad LIKE '%$axtarilan%'  ORDER BY menu_id ASC LIMIT 25");

  $menusor->execute();

  $say = $menusor->rowCount();
} else {

  $menusor = $db->prepare("SELECT * FROM menu WHERE menu_ust=:menu_ust ORDER BY menu_sira ASC LIMIT 25");

  $menusor->execute(array(
    ':menu_ust' => 0
  ));

  $say = $menusor->rowCount();
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

              <h2 style="margin-top: 20px" class="col-md-4">Menu Paneli<small>
                <?php echo $say . " Seçilmiş Siyahı"; ?>

                  <?php
                  if (isset($_GET['status']) && $_GET['status'] == 'ok') { ?>

                    <b style="color: green;">Əlavə olundu.</b>

                  <?php } elseif (isset($_GET['status']) && $_GET['status'] == 'no') { ?>

                    <b style="color: red;">Əlavə olunmadı.</b>

                  <?php } elseif (isset($_GET['kontrol']) && $_GET['kontrol'] == 'ok') { ?>

                    <b style="color: green;">Menu Silindi.</b>

                  <?php } elseif (isset($_GET['kontrol']) && $_GET['kontrol'] == 'no') { ?>

                    <b style="color: red;">Menu Silinmədi.</b>

                  <?php } ?>
                </small></h2>

              <div style="text-align: right" class="col-md-8">
                <a href="menu-ekle.php"><button style="margin-top: 10px" class="btn btn-success"><i class="fa fa-plus"></i> Yeni</button></a>
              </div>
              <div class="clearfix"></div>
            </div>

            <div class="x_content">


              <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                  <thead>
                    <tr class="headings">

                      <th class="column-title">Menu Ad </th>
                      <th class="column-title text-center">Üst menu </th>
                      <th class="column-title text-center">Menu Sıra </th>
                      <th class="column-title text-center">Menu Durum </th>
                      <th style="width: 80px" class="column-title"></th>
                      <th style="width: 80px" class="column-title"></th>


                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    /* $menusor = $db->prepare("SELECT * FROM menu ORDER BY menu_sira ASC,menu_durum DESC LIMIT 25");
                    $menusor->execute(); */
                    while ($menucek = $menusor->fetch(PDO::FETCH_ASSOC)) { 
                        $menu_id = $menucek['menu_id'];
                      ?>

                      <tr class="even pointer">

                        
                        <td><?php echo $menucek['menu_ad'] ?></td>
                        <td class="text-center"><?php echo $menucek['menu_ust'] ?></td>
                        <td class="text-center"><?php echo $menucek['menu_sira'] ?></td>
                        <td class="text-center">
                          <?php
                          if ($menucek['menu_durum'] == "1") {
                            echo "Aktiv";
                          } else {

                            echo "Deaktiv";
                          }

                          ?>

                        </td>
                        <td class=" "><a href="menu-duzenle.php?menu_id=<?php echo $menucek['menu_id']; ?>"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Redaktə</button></a></td>
                        <td class=" "><a href="../netting/process.php?yol=&menusil=ok&menu_id=<?php echo $menucek['menu_id']; ?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Sil</button></a></td>
                      </tr>

                      <!-- ALT MENU -->
                      <?php 
                        $altmenusor = $db->prepare("SELECT * FROM menu WHERE menu_ust=:ust");
                        $altmenusor->execute(array(
                          ':ust' => $menu_id
                        ));

                        while ($altmenucek = $altmenusor->fetch(PDO::FETCH_ASSOC)) { ?>

                      <tr class="even pointer">

                        
                        <td>--- <?php echo $altmenucek['menu_ad'] ?></td>
                        <td class="text-center"></i><?php echo $altmenucek['menu_ust'] ?></td>
                        <td class="text-center"><?php echo $altmenucek['menu_sira'] ?></td>
                        <td class="text-center">
                          <?php
                          if ($altmenucek['menu_durum'] == "1") {
                            echo "Aktiv";
                          } else {

                            echo "Deaktiv";
                          }

                          ?>

                        </td>
                        <td class=" "><a href="menu-duzenle.php?menu_id=<?php echo $altmenucek['menu_id']; ?>"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Redaktə</button></a></td>
                        <td class=" "><a href="../netting/process.php?yol=&menusil=ok&menu_id=<?php echo $altmenucek['menu_id']; ?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Sil</button></a></td>
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