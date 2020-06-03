<?php
include "header.php";

$emlaksor = $db->prepare("SELECT * FROM emlak WHERE emlak_id=:id");
$emlaksor->execute(array(
    ':id' => $_GET['emlak_id']
));
$emlakcek = $emlaksor->fetch(PDO::FETCH_ASSOC);

?>
<div role="main" class="main">

    <section class="page-header page-header-light page-header-more-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;"><?php echo $emlakcek['emlak_basliq']; ?><span><?php echo $emlakcek['emlak_adres']; ?> - <a href="#map" data-hash data-hash-offset="100">(Xəritə Ünvan)</a></span></h1>

                    <!-- Premium Lazim ola biler -->
                    <!-- <ul class="breadcrumb breadcrumb-valign-mid">
									<li><a href="demo-real-estate.html">Home</a></li>
									<li><a href="demo-real-estate-properties.html">Properties</a></li>
									<li class="active">Detail</li>
								</ul> -->
                </div>
            </div>
        </div>
    </section>

    <div class="container">

        <div class="row pb-xl pt-md">
            <div class="col-md-9">

                <div class="row">
                    <div class="col-md-7">

                        <span <?php
                                if ($emlakcek['emlak_durum'] == "Satılır") { ?> style="background-color: #ff2626!important;" <?php } elseif ($emlakcek['emlak_durum'] == "Kirayə") { ?> style="background-color: #2bca6e!important;" <?php } ?> class="thumb-info-listing-type thumb-info-listing-type-detail background-color-secondary text-uppercase text-color-light font-weight-semibold p-sm pl-md pr-md">
                            <?php echo $emlakcek['emlak_durum']; ?>
                        </span>

                        <div class="thumb-gallery">
                            <div class="lightbox" data-plugin-options='{"delegate": "a", "type": "image", "gallery": {"enabled": true}}'>
                                <div class="owl-carousel owl-theme manual thumb-gallery-detail show-nav-hover" id="thumbGalleryDetail">
                                    <div>
                                        <a href="<?php echo $emlakcek['emlak_resimyol']; ?>">
                                            <span class="thumb-info thumb-info-centered-info thumb-info-no-borders font-size-xl">
                                                <span class="thumb-info-wrapper font-size-xl">
                                                    <img alt="Property Detail" src="<?php echo $emlakcek['emlak_resimyol']; ?>" class="img-responsive">
                                                    <span class="thumb-info-title font-size-xl">
                                                        <span class="thumb-info-inner font-size-xl"><i class="icon-magnifier icons font-size-xl"></i></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </a>
                                    </div>

                                    <?php
                                    $galerisor = $db->prepare("SELECT * FROM galeri WHERE mezmun_id = :id");
                                    $galerisor->execute(array(
                                        ':id' => $emlakcek['emlak_id']
                                    ));

                                    while ($galericek = $galerisor->fetch(PDO::FETCH_ASSOC)) { ?>

                                        <div>
                                            <a href="<?php echo $galericek['galeri_resimyol']; ?>">
                                                <span class="thumb-info thumb-info-centered-info thumb-info-no-borders font-size-xl">
                                                    <span class="thumb-info-wrapper font-size-xl">
                                                        <img alt="Property Detail" src="<?php echo $galericek['galeri_resimyol']; ?>" class="img-responsive">
                                                        <span class="thumb-info-title font-size-xl">
                                                            <span class="thumb-info-inner font-size-xl"><i class="icon-magnifier icons font-size-xl"></i></span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="owl-carousel owl-theme manual thumb-gallery-thumbs mt" id="thumbGalleryThumbs">

                                <div>
                                    <img alt="Property Detail" src="<?php echo $emlakcek['emlak_resimyol']; ?>" class="img-responsive cur-pointer">
                                </div>
                                
                                <?php
                                $altgalerisor = $db->prepare("SELECT * FROM galeri WHERE mezmun_id = :id");
                                $altgalerisor->execute(array(
                                    ':id' => $emlakcek['emlak_id']
                                ));
                                while ($altgalericek = $altgalerisor->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <div>
                                        <img style="width: 110px;height: 73px;" alt="Property Detail" src="<?php echo $altgalericek['galeri_resimyol']; ?>" class="img-responsive cur-pointer">
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-5">

                        <table class="table table-striped">
                            <colgroup>
                                <col width="35%">
                                <col width="65%">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <td class="background-color-primary text-light pt-md">
                                        Qiymət
                                    </td>
                                    <td class="font-size-xl font-weight-bold pt-sm pb-sm background-color-primary text-light">
                                        <?php echo $emlakcek['emlak_qiymet']; ?>$
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Elan Tarix
                                    </td>
                                    <td>
                                        <?php echo substr($emlakcek['emlak_zaman'], 0, 10); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Elan Nömrəsi
                                    </td>
                                    <td>
                                        #<?php echo $emlakcek['emlak_id']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Elan Ünvan
                                    </td>
                                    <td>
                                        <?php echo $emlakcek['emlak_adres']; ?><br><a href="#map" class="font-size-sm" data-hash data-hash-offset="100">(Xəritə Ünvan)</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Elan Status
                                    </td>
                                    <td>
                                        <?php echo $emlakcek['emlak_durum']; ?>
                                    </td>
                                </tr>
                                <!-- Premium Siyahi Davam Etdire bilersen Sonda -->
                                <!-- <tr>
                                    <td>
                                        Beds
                                    </td>
                                    <td>
                                        7
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Baths
                                    </td>
                                    <td>
                                        8
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Garages
                                    </td>
                                    <td>
                                        2
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Living Area
                                    </td>
                                    <td>
                                        8,000
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Lot Size
                                    </td>
                                    <td>
                                        20,000
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Year Built
                                    </td>
                                    <td>
                                        1999
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        <h4 class="mt-md mb-md">Elan Haqqında</h4>
                        <p><?php echo $emlakcek['emlak_detay']; ?></p>



                        <hr class="solid tall">

                        <h4 class="mt-md mb-md">Features</h4>

                        <ul class="list list-icons list-secondary row m-none">
                            <li class="col-sm-6 col-md-4"><i class="fa fa-check"></i> Air conditioning <a href="#" data-plugin-tooltip data-toggle="tooltip" data-placement="top" title="+ Central Heating"><i class="fa fa-info-circle"></i></a></li>
                            <li class="col-sm-6 col-md-4"><i class="fa fa-check"></i> Home Theater</li>
                            <li class="col-sm-6 col-md-4"><i class="fa fa-check"></i> Central Heating</li>
                            <li class="col-sm-6 col-md-4"><i class="fa fa-check"></i> Laundry</li>
                            <li class="col-sm-6 col-md-4"><i class="fa fa-check"></i> Balcony</li>
                            <li class="col-sm-6 col-md-4 custom-list-item-disabled"><i class="fa fa-check"></i> Storage</li>
                            <li class="col-sm-6 col-md-4 custom-list-item-disabled"><i class="fa fa-check"></i> Garage</li>
                            <li class="col-sm-6 col-md-4 custom-list-item-disabled"><i class="fa fa-check"></i> Yard</li>
                            <li class="col-sm-6 col-md-4"><i class="fa fa-check"></i> Electric Water Heater</li>
                            <li class="col-sm-6 col-md-4"><i class="fa fa-check"></i> Deck</li>
                            <li class="col-sm-6 col-md-4"><i class="fa fa-check"></i> Gym</li>
                            <li class="col-sm-6 col-md-4"><i class="fa fa-check"></i> Ocean View</li>
                        </ul>

                        <hr class="solid tall">

                        <h4 class="mt-md mb-md" id="map">Əmlak Xəritə</h4>
                        <div id="googlemaps" class="google-map m-none mb-xlg">
                            <iframe width="100%" height="100%" frameborder="0" style="border: 0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDNOZOHy6l4dkrBQjYRWmfnH_Wwrqt7LFc&q=<?php echo $emlakcek['emlak_adres']; ?>" allowfullscreen></iframe>

                        </div>


                    </div>
                </div>

            </div>

            <?php include "sidebar.php"; ?>

        </div>

    </div>

    <?php include "footer.php"; ?>