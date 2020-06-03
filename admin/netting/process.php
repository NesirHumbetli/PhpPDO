<?php
ob_start();
session_start();
include "connect.php";

if (isset($_POST['loggin'])) {

    $user_ad = $_POST['user_name'];
    $user_password = md5($_POST['user_password']);

    if ($user_ad && $user_password) {

        $userquery = $db->prepare("SELECT * FROM kullanici WHERE user_ad = :ad AND user_password = :passw");
        $userquery->execute(array(
            ':ad' => $user_ad,
            ':passw' => $user_password
        ));

        $say = $userquery->rowCount();

        if ($say > 0) {
            $_SESSION['user_ad'] = $user_ad;
            $_SESSION['user_password'] = $user_password;

            header("Location:../production/index.php");
        } else {

            header("Location:../production/login.php?status=no");
        }
    }
}




if (isset($_POST['genelayarkaydet'])) {

    $ayarkaydet = $db->prepare("UPDATE ayar SET
    ayar_sayturl=:surl,
    ayar_title=:title,
    ayar_description=:descrip,
    ayar_keywords=:keywords,
    ayar_slider=:slider,
    ayar_author=:author
    Where ayar_id=0");

    $update = $ayarkaydet->execute(array(
        ':surl' => $_POST['ayar_sayturl'],
        ':title' => $_POST['ayar_title'],
        ':descrip' => $_POST['ayar_description'],
        ':keywords' => $_POST['ayar_keywords'],
        ':slider' => $_POST['ayar_slider'],
        ':author' => $_POST['ayar_author']
    ));

    if ($ayarkaydet->rowCount() > 0) {

        header("Location:../production/genel-ayar.php?status=ok");
    } else {

        header("Location:../production/genel-ayar.php?status=no");
    }
}

if (isset($_POST['elaqeayarkaydet'])) {

    $elaqekaydet = $db->prepare("UPDATE ayar SET 
    ayar_tel=:tel,
    ayar_gsm=:gsm,
    ayar_faks=:faks,
    ayar_mail=:mail,
    ayar_adres=:adres,
    ayar_ray=:ray,
    ayar_sehr=:sehr,
    ayar_isvaxt=:isvaxt
    WHERE ayar_id=0");

    $elaqekaydet->execute(array(
        ':tel' => $_POST['ayar_tel'],
        ':gsm' => $_POST['ayar_gsm'],
        ':faks' => $_POST['ayar_faks'],
        ':mail' => $_POST['ayar_mail'],
        ':adres' => $_POST['ayar_adres'],
        ':ray' => $_POST['ayar_ray'],
        ':sehr' => $_POST['ayar_sehr'],
        ':isvaxt' => $_POST['ayar_isvaxt']
    ));

    if ($elaqekaydet->rowCount() > 0) {

        header("Location:../production/elaqe-ayar.php?status=ok");
    } else {

        header("Location:../production/elaqe-ayar.php?status=no");
    }
}

if (isset($_POST['apiayarkaydet'])) {

    $apikaydet = $db->prepare("UPDATE ayar SET 
    ayar_recaptcha=:recaptcha,
    ayar_googlemap=:googlemap,
    ayar_analystic=:analystic
    WHERE ayar_id=0");

    $apikaydet->execute(array(
        ':recaptcha' => $_POST['ayar_recaptcha'],
        ':googlemap' => $_POST['ayar_googlemap'],
        ':analystic' => $_POST['ayar_analystic']
    ));

    if ($apikaydet->rowCount() > 0) {

        header("Location:../production/api-ayar.php?status=ok");
    } else {

        header("Location:../production/api-ayar.php?status=no");
    }
}

if (isset($_POST['sosialayarkaydet'])) {

    $sosialkaydet = $db->prepare("UPDATE ayar SET 
    ayar_facebook=:facebook,
    ayar_twitter=:twitter,
    ayar_youtube=:youtube,
    ayar_google=:google
    WHERE ayar_id=0");

    $sosialkaydet->execute(array(
        ':facebook' => $_POST['ayar_facebook'],
        ':twitter' => $_POST['ayar_twitter'],
        ':youtube' => $_POST['ayar_youtube'],
        ':google' => $_POST['ayar_google']
    ));

    if ($sosialkaydet->rowCount() > 0) {

        header("Location:../production/sosial-ayar.php?status=ok");
    } else {

        header("Location:../production/sosial-ayar.php?status=no");
    }
}

if (isset($_POST['mailayarkaydet'])) {

    $mailkaydet = $db->prepare("UPDATE ayar SET 
    ayar_smtphost=:host,
    ayar_smtpuser=:user,
    ayar_smtppassword=:userpassword,
    ayar_smtpport=:port
    WHERE ayar_id=0");

    $mailkaydet->execute(array(
        ':host' => $_POST['ayar_smtphost'],
        ':user' => $_POST['ayar_smtpuser'],
        ':userpassword' => $_POST['ayar_smtppassword'],
        ':port' => $_POST['ayar_smtpport']
    ));

    if ($mailkaydet->rowCount() > 0) {

        header("Location:../production/mail-ayar.php?status=ok");
    } else {

        header("Location:../production/mail-ayar.php?status=no");
    }
}


if (isset($_POST['haqqimizdakaydet'])) {

    $aboutsor = $db->prepare("UPDATE haqqimizda SET 
    haqqimizda_basliq=:basliq,
    haqqimizda_mezmun=:mezmun,
    haqqimizda_video=:video,
    haqqimizda_hedef=:hedef,
    haqqimizda_missiya=:missiya
    WHERE haqqimizda_id=0");

    $aboutsor->execute(array(
        ':basliq' => $_POST['haqqimizda_basliq'],
        ':mezmun' => $_POST['haqqimizda_mezmun'],
        ':video' => $_POST['haqqimizda_video'],
        ':hedef' => $_POST['haqqimizda_hedef'],
        ':missiya' => $_POST['haqqimizda_missiya']
    ));

    if ($aboutsor->rowCount() > 0) {

        header("Location:../production/haqqimizda.php?status=ok");
    } else {

        header("Location:../production/haqqimizda.php?status=no");
    }
}


if (isset($_POST['sliderkaydet'])) {

    $uploads_dir = '../../images/slider';
    @$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
    @$name = $_FILES['slider_resimyol']["name"];
    $ferqliad1 = rand(20000, 30000);
    $ferqliad2 = rand(20000, 30000);
    $ferqliad3 = rand(20000, 30000);
    $ferqliad4 = rand(20000, 30000);
    $ferqliad = $ferqliad1 . $ferqliad2 . $ferqliad3 . $ferqliad4;
    $resimyol = substr($uploads_dir, 6) . "/" . $ferqliad . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$ferqliad$name");

    $slidersor = $db->prepare("INSERT INTO slider set 
        slider_ad=:ad,
        slider_url=:surl,
        slider_sira=:sira,
        slider_durum=:durum,
        slider_resimyol=:resimyol");
    $insert = $slidersor->execute(array(
        ':ad' => $_POST['slider_ad'],
        ':surl' => $_POST['slider_url'],
        ':sira' => $_POST['slider_sira'],
        ':durum' => $_POST['slider_durum'],
        ':resimyol' => $resimyol
    ));

    if ($insert) {

        header("Location:../production/slider.php?status=ok");
    } else {

        header("Location:../production/slider.php?status=no");
    }
}


if (isset($_GET['slidersil']) == "ok") {

    $slidersil = $db->prepare("DELETE FROM slider WHERE slider_id=:id");
    $kontrol = $slidersil->execute(array(
        ':id' => $_GET['slider_id']
    ));

    if ($kontrol) {
        $sil = $_GET['yol'];
        unlink("../../$sil");
        header("Location:../production/slider.php?kontrol=ok");
    } else {

        header("Location:../production/slider.php?kontrol=no");
    }
}


if (isset($_POST['sliderduzenle'])) {
    if ($_FILES['slider_resimyol']["size"] > 0) {

        $uploads_dir = "../../images/slider";
        $tmp_name = $_FILES['slider_resimyol']['tmp_name'];
        $name = $_FILES['slider_resimyol']['name'];
        $ferqliad1 = rand(20000, 32000);
        $ferqliad2 = rand(20000, 32000);
        $ferqliad3 = rand(20000, 32000);
        $ferqliad4 = rand(20000, 32000);
        $ferqliad = $ferqliad1 . $ferqliad2 . $ferqliad3 . $ferqliad4;
        $resimyol = substr($uploads_dir, 6) . "/" . $ferqliad . $name;
        @move_uploaded_file($tmp_name, "$uploads_dir/$ferqliad$name");

        $sliderduzenle = $db->prepare("UPDATE slider SET 
        slider_ad = :ad,
        slider_url = :surl,
        slider_sira = :sira,
        slider_durum = :durum,
        slider_resimyol = :resimyol
        WHERE slider_id = :id");

        $sliderduzenle->execute(array(
            ':ad' => $_POST['slider_ad'],
            ':surl' => $_POST['slider_url'],
            ':sira' => $_POST['slider_sira'],
            ':durum' => $_POST['slider_durum'],
            ':id' => $_POST['slider_id'],
            ':resimyol' => $resimyol
        ));

        $id = $_POST['slider_id'];

        if ($sliderduzenle->rowCount() > 0) {

            $resimsil = $_POST['slider_resimyol'];
            unlink("../../$resimsil");
            header("Location:../production/slider-duzenle.php?slider_id=$id&status=ok");
        } else {

            header("Location:../production/slider-duzenle.php?slider_id=$id&status=no");
        }
    } else {
        $sliderduzenle = $db->prepare("UPDATE slider SET 
        slider_ad = :ad,
        slider_url = :surl,
        slider_sira = :sira,
        slider_durum = :durum
        WHERE slider_id = :id");

        $sliderduzenle->execute(array(
            ':ad' => $_POST['slider_ad'],
            ':surl' => $_POST['slider_url'],
            ':sira' => $_POST['slider_sira'],
            ':durum' => $_POST['slider_durum'],
            ':id' => $_POST['slider_id']
        ));
        $id = $_POST['slider_id'];
        if ($sliderduzenle->rowCount() > 0) {

            header("Location:../production/slider-duzenle.php?slider_id=$id&status=ok");
        } else {

            header("Location:../production/slider-duzenle.php?slider_id=$id&status=no");
        }
    }
}

if (isset($_POST['mezmunkaydet'])) {

    $uploads_dir = "../../img/mezmun";
    @$tmp_name = $_FILES['mezmun_resimyol']['tmp_name'];
    @$name = $_FILES['mezmun_resimyol']['name'];

    $ferqliad1 = rand(20000, 32000);
    $ferqliad2 = rand(20000, 32000);
    $ferqliad3 = rand(20000, 32000);
    $ferqliad4 = rand(20000, 32000);
    $ferqliad = $ferqliad1 . $ferqliad2 . $ferqliad3 . $ferqliad4;

    $resimyol = substr($uploads_dir, 6) . "/" . $ferqliad . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$ferqliad$name");

    $tarix = $_POST['mezmun_tarix'];
    $vaxt = $_POST['mezmun_vaxt'];

    $zaman = $tarix . " " . $vaxt;
    $mezmunyukle = $db->prepare("INSERT INTO mezmun SET
        mezmun_ad = :ad,
        mezmun_movzu = :movzu,
        mezmun_keyword = :keyword,
        mezmun_durum = :durum,
        mezmun_zaman = :zaman,
        mezmun_resimyol = :resimyol");
    $insert = $mezmunyukle->execute(array(
        ':ad' => $_POST['mezmun_ad'],
        ':movzu' => $_POST['mezmun_movzu'],
        ':keyword' => $_POST['mezmun_keyword'],
        ':durum' => $_POST['mezmun_durum'],
        ':zaman' => $zaman,
        ':resimyol' => $resimyol
    ));

    if ($insert) {

        header("location:../production/mezmun.php?status=ok");
    } else {

        header("location:../production/mezmun.php?status=no");
    }
}


if (isset($_POST['mezmunduzenle'])) {

    if ($_FILES['mezmun_resimyol']['size'] > 0) {
        $uploads_dir = "../../img/mezmun";
        @$tmp_name = $_FILES['mezmun_resimyol']['tmp_name'];
        @$name = $_FILES['mezmun_resimyol']['name'];

        $mezmunad1 = rand(20000, 32000);
        $mezmunad2 = rand(20000, 32000);
        $mezmunad3 = rand(20000, 32000);
        $mezmunad4 = rand(20000, 32000);
        $mezmunad = $mezmunad1 . $mezmunad2 . $mezmunad3 . $mezmunad4;

        $mezmunresimyol = substr($uploads_dir, 6) . "/" . $mezmunad . $name;
        @move_uploaded_file($tmp_name, "$uploads_dir/$mezmunad$name");
        $zaman = $_POST['mezmun_tarix'] . " " . $_POST['mezmun_vaxt'];
        $id = $_POST['mezmun_id'];
        $upmezmun = $db->prepare("UPDATE mezmun SET
        mezmun_ad = :ad,
        mezmun_zaman = :zaman,
        mezmun_movzu = :movzu,
        mezmun_keyword = :keyword,
        mezmun_durum = :durum,
        mezmun_resimyol = :resimyol
        WHERE mezmun_id = :id");

        $upmezmun->execute(array(
            ':ad' => $_POST['mezmun_ad'],
            ':zaman' => $zaman,
            ':movzu' => $_POST['mezmun_movzu'],
            ':keyword' => $_POST['mezmun_keyword'],
            ':durum' => $_POST['mezmun_durum'],
            ':resimyol' => $mezmunresimyol,
            ':id' => $id
        ));

        if ($upmezmun->rowCount() > 0) {
            $upmezmunsil = $_POST['mezmun_resimyol'];
            unlink("../../$upmezmunsil");
            header("Location:../production/mezmun-duzenle.php?mezmun_id=$id&status=ok");
        } else {

            header("Location:../production/mezmun-duzenle.php?mezmun_id=$id&status=no");
        }
    } else {

        $zaman = $_POST['mezmun_tarix'] . " " . $_POST['mezmun_vaxt'];
        $id = $_POST['mezmun_id'];
        $upmezmun = $db->prepare("UPDATE mezmun SET
            mezmun_ad = :ad,
            mezmun_zaman = :zaman,
            mezmun_movzu = :movzu,
            mezmun_keyword = :keyword,
            mezmun_durum = :durum
            WHERE mezmun_id = :id");

        $upmezmun->execute(array(
            ':ad' => $_POST['mezmun_ad'],
            ':zaman' => $zaman,
            ':movzu' => $_POST['mezmun_movzu'],
            ':keyword' => $_POST['mezmun_keyword'],
            ':durum' => $_POST['mezmun_durum'],
            ':id' => $id
        ));

        if ($upmezmun->rowCount() > 0) {

            header("Location:../production/mezmun-duzenle.php?mezmun_id=$id&status=ok");
        } else {

            header("Location:../production/mezmun-duzenle.php?mezmun_id=$id&status=no");
        }
    }
}



if (isset($_GET['mezmunsil']) == "ok") {
    $id = $_GET['mezmun_id'];
    $mezmundel = $db->prepare("DELETE FROM mezmun WHERE mezmun_id=:id");
    $kontrol = $mezmundel->execute(array(':id' => $id));

    if ($kontrol) {

        $resimsil = $_GET['yol'];
        unlink("../../$resimsil");

        header("Location:../production/mezmun.php?kontrol=ok");
    } else {

        header("Location:../production/mezmun.php?kontrol=no");
    }
}


if (isset($_POST['menukaydet'])) {

    $menusor = $db->prepare("INSERT INTO menu SET
     menu_ust = :ust,
     menu_ad = :ad,
     menu_url = :murl,
     menu_detay = :detay,
     menu_sira = :sira,
     menu_durum = :durum
    ");

    $insert = $menusor->execute(array(
        ':ust' => $_POST['menu_ust'],
        ':ad' => $_POST['menu_ad'],
        ':murl' => $_POST['menu_url'],
        ':detay' => $_POST['menu_detay'],
        ':sira' => $_POST['menu_sira'],
        ':durum' => $_POST['menu_durum']
    ));

    if ($insert) {

        header("Location:../production/menu.php?status=ok");
    } else {

        header("Location:../production/menu.php?status=no");
    }
}

if (isset($_POST['menuguncelle'])) {
    $id = $_POST['menu_id'];
    $menusorgu = $db->prepare("UPDATE menu SET
        menu_ust = :ust,
        menu_ad = :ad,
        menu_url = :murl,
        menu_detay = :detay,
        menu_sira = :sira,
        menu_durum = :durum
        WHERE menu_id =:id");

    $menusorgu->execute(array(
        ':ust' => $_POST['menu_ust'],
        ':ad' => $_POST['menu_ad'],
        ':murl' => $_POST['menu_url'],
        ':detay' => $_POST['menu_detay'],
        ':sira' => $_POST['menu_sira'],
        ':durum' => $_POST['menu_durum'],
        ':id' => $id
    ));


    if ($menusorgu->rowCount() > 0) {

        header("Location:../production/menu-duzenle.php?menu_id=$id&status=ok");
    } else {

        header("Location:../production/menu-duzenle.php?menu_id=$id&status=no");
    }
}


if (isset($_GET['menusil']) == "ok") {

    $menusorgu = $db->prepare("DELETE FROM menu WHERE menu_id = :id");
    $menusorgu->execute(array(
        ':id' => $_GET['menu_id']
    ));

    if ($menusorgu) {

        header("Location:../production/menu.php?kontrol=ok");
    } else {

        header("Location:../production/menu.php?kontrol=ok");
    }
}

if (isset($_POST['logoduzenle'])) {

    $uploads_dir = "../../images";
    @$tmp_name = $_FILES['ayar_logo']["tmp_name"];
    @$name = $_FILES['ayar_logo']["name"];
    $ferqliad = rand(20000, 32000);
    $logoyol = substr($uploads_dir, 6) . "/" . $ferqliad . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$ferqliad$name");

    $logoguncelle = $db->prepare("UPDATE ayar SET
    ayar_logo = :logo    
    WHERE ayar_id=:id");
    $logoguncelle->execute(array(
        ':logo' => $logoyol,
        ':id' => 0
    ));
    $ayar_resimyol = $_POST['ayar_kohne'];

    if ($logoguncelle->rowCount() > 0) {

        unlink("../../$ayar_resimyol");
        header("location:../production/genel-ayar.php?status=ok");
    } else {

        header("location:../production/genel-ayar.php?status=no");
    }
}

if (isset($_POST['altlogoduzenle'])) {

    $uploads_dir = "../../images";
    @$tmp_name = $_FILES['ayar_altlogo']["tmp_name"];
    @$name = $_FILES['ayar_altlogo']["name"];
    $ferqliad = rand(20000, 32000);
    $logoyol = substr($uploads_dir, 6) . "/" . $ferqliad . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$ferqliad$name");

    $logoguncelle = $db->prepare("UPDATE ayar SET
    ayar_altlogo = :logo    
    WHERE ayar_id=:id");
    $logoguncelle->execute(array(
        ':logo' => $logoyol,
        ':id' => 0
    ));
    $ayar_resimyol = $_POST['ayar_altkohne'];

    if ($logoguncelle->rowCount() > 0) {

        unlink("../../$ayar_resimyol");
        header("location:../production/genel-ayar.php?status=ok");
    } else {

        header("location:../production/genel-ayar.php?status=no");
    }
}

if (isset($_POST['mainbgduzenle'])) {

    $uploads_dir = "../../images/Mainbg";
    @$tmp_name = $_FILES['ayar_mainbg']["tmp_name"];
    @$name = $_FILES['ayar_mainbg']["name"];

    $randomname = rand(1000, 10000);
    $bgyol = substr($uploads_dir, 6) . "/" . $randomname . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$randomname$name");

    $mainsor = $db->prepare("UPDATE ayar SET
        ayar_mainbg = :bg
        WHERE ayar_id = :id ");

    $mainsor->execute(array(
        ':bg' => $bgyol,
        ':id' => 0
    ));

    $bgold = $_POST['ayar_oldbg'];

    if ($mainsor->rowCount() > 0) {

        unlink("../../$bgold");
        Header("Location:../production/genel-ayar.php?status=ok");
    } else {

        Header("Location:../production/genel-ayar.php?status=no");
    }
}

if (isset($_POST['usresimduzenle'])) {

    $uploads_dir = "../../images/user";
    @$tmp_name = $_FILES['user_resim']['tmp_name'];
    @$name = $_FILES['user_resim']['name'];

    $randomname = rand(100, 10000);
    $userresimyol = substr($uploads_dir, 6) . "/" . $randomname . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$randomname$name");

    $userup = $db->prepare("UPDATE kullanici SET
        user_resim = :resim
    WHERE user_id =  {$_POST['user_id']}");
    $userup->execute(array(
        ':resim' => $userresimyol
    ));
    $user_old = $_POST['user_kohne'];

    if ($userup->rowCount() > 0) {

        unlink("../../$user_old");
        Header("Location:../production/user-profil.php?status=ok");
    } else {

        Header("Location:../production/user-profil.php?status=no");
    }
}

if (isset($_POST['userkaydet'])) {

    if (!empty($_POST['user_password'])) {

        $userup = $db->prepare("UPDATE kullanici SET
        user_adsoyad = :adsoyad,
        user_password = :pasw
        WHERE user_id = {$_POST['user_id']}");
        $userup->execute(array(
            ':adsoyad' => $_POST['user_adsoyad'],
            ':pasw' => md5($_POST['user_password'])
        ));

        if ($userup->rowCount() > 0) {

            Header("Location:../production/user-profil.php?status=ok");
        } else {

            Header("Location:../production/user-profil.php?status=no");
        }
    } else {
        $userup = $db->prepare("UPDATE kullanici SET
        user_adsoyad = :adsoyad
        WHERE user_id = {$_POST['user_id']}");
        $userup->execute(array(
            ':adsoyad' => $_POST['user_adsoyad']
        ));

        if ($userup->rowCount() > 0) {

            Header("Location:../production/user-profil.php?status=ok");
        } else {

            Header("Location:../production/user-profil.php?status=no");
        }
    }
}

if (isset($_POST['emlakkaydet'])) {

    $uploads_dir = '../../images/emlak';
    @$tmp_name = $_FILES['emlak_resimyol']["tmp_name"];
    @$name = $_FILES['emlak_resimyol']["name"];
    $ferqliad1 = rand(20000, 30000);
    $ferqliad2 = rand(20000, 30000);
    $ferqliad3 = rand(20000, 30000);
    $ferqliad4 = rand(20000, 30000);
    $ferqliad = $ferqliad1 . $ferqliad2 . $ferqliad3 . $ferqliad4;
    $resimyol = substr($uploads_dir, 6) . "/" . $ferqliad . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$ferqliad$name");

    $emlak_vaxt = date('H:i:s');
    $emlak_tarix = date('Y-m-d');
    $emlak_zaman = $emlak_tarix . " " . $emlak_vaxt;

    $emlaksor = $db->prepare("INSERT INTO emlak set 
        emlak_basliq=:basliq,
        kullanici_id=:id,
        emlak_zaman=:zaman,
        emlak_adres=:adres,
        emlak_qiymet=:qiymet,
        emlak_durum=:durum,
        emlak_detay=:detay,
        emlak_resimyol=:resimyol");
    $insert = $emlaksor->execute(array(
        ':basliq' => $_POST['emlak_basliq'],
        ':id' => $_POST['kullanici_id'],
        ':zaman' => $emlak_zaman,
        ':adres' => $_POST['emlak_adres'],
        ':qiymet' => $_POST['emlak_qiymet'],
        ':durum' => $_POST['emlak_durum'],
        ':detay' => $_POST['emlak_detay'],
        ':resimyol' => $resimyol
    ));

    if ($insert) {

        header("Location:../production/emlak.php?status=ok");
    } else {

        header("Location:../production/emlak.php?status=no");
    }
}

if (isset($_POST['emlakduzenle'])) {
    if ($_FILES['emlak_resimyol']["size"] > 0) {

        $uploads_dir = "../../images/emlak";
        $tmp_name = $_FILES['emlak_resimyol']['tmp_name'];
        $name = $_FILES['emlak_resimyol']['name'];
        $ferqliad = rand(20000, 32000);
        $resimyol = substr($uploads_dir, 6) . "/" . $ferqliad . $name;
        @move_uploaded_file($tmp_name, "$uploads_dir/$ferqliad$name");

        $emlakduzenle = $db->prepare("UPDATE emlak SET 
        emlak_basliq=:basliq,
        emlak_adres=:adres,
        emlak_qiymet=:qiymet,
        emlak_durum=:durum,
        emlak_detay=:detay,
        emlak_resimyol=:resimyol
        WHERE emlak_id = :id");

        $emlakduzenle->execute(array(
            ':basliq' => $_POST['emlak_basliq'],
            ':adres' => $_POST['emlak_adres'],
            ':qiymet' => $_POST['emlak_qiymet'],
            ':durum' => $_POST['emlak_durum'],
            ':detay' => $_POST['emlak_detay'],
            ':resimyol' => $resimyol,
            ':id' => $_POST['emlak_id']
        ));

        $id = $_POST['emlak_id'];

        if ($emlakduzenle->rowCount() > 0) {

            $resimsil = $_POST['emlak_resimyol'];
            unlink("../../$resimsil");
            header("Location:../production/emlak-duzenle.php?emlak_id=$id&status=ok");
        } else {

            header("Location:../production/emlak-duzenle.php?emlak_id=$id&status=no");
        }
    } else {
        $emlakduzenle = $db->prepare("UPDATE emlak SET 
        emlak_basliq=:basliq,
        emlak_adres=:adres,
        emlak_qiymet=:qiymet,
        emlak_durum=:durum,
        emlak_detay=:detay
        WHERE emlak_id = :id");

        $emlakduzenle->execute(array(
            ':basliq' => $_POST['emlak_basliq'],
            ':adres' => $_POST['emlak_adres'],
            ':qiymet' => $_POST['emlak_qiymet'],
            ':durum' => $_POST['emlak_durum'],
            ':detay' => $_POST['emlak_detay'],
            ':id' => $_POST['emlak_id']
        ));
        $id = $_POST['emlak_id'];
        if ($emlakduzenle->rowCount() > 0) {

            header("Location:../production/emlak-duzenle.php?emlak_id=$id&status=ok");
        } else {

            header("Location:../production/emlak-duzenle.php?emlak_id=$id&status=no");
        }
    }
}


if (isset($_GET['emlaksil']) == 'ok') {

    $emlak_id = $_GET['emlak_id'];

    $resimsor = $db->prepare("SELECT * FROM galeri WHERE mezmun_id = :munid");
    $resimsor->execute(array(
        ':munid' => $emlak_id
    ));
    while($resimcek=$resimsor->fetch(PDO::FETCH_ASSOC)){
        $resimyol = $resimcek['galeri_resimyol'];
        unlink("../../$resimyol");
    }

    $galeri_sil = $db->prepare("DELETE FROM galeri WHERE mezmun_id = :mid");
    $galeri_sil->execute(array(
        ':mid' => $emlak_id
    ));

    
    
    $emlaksil = $db->prepare("DELETE FROM emlak WHERE emlak_id=:id");
    $control = $emlaksil->execute(array(
        ':id' => $_GET['emlak_id']
    ));

    if ($control) {
        $resimsil = $_GET['yol'];
        unlink("../../$resimsil");
        header("Location:../production/emlak.php?kontrol=ok");
    } else {

        header("Location:../production/emlak.php?kontrol=no");
    }
}


if (isset($_POST['galerigonder'])) {

    if (!empty($_POST['check'])) {

        $dizi = $_POST['check'];
        $say = count($dizi);
        for ($i=0; $i<$say;) { 
             $sorgu = $db->prepare("SELECT * FROM galeri WHERE galeri_id = :galid");
             $sorgu->execute(array(
                 ':galid' => $dizi[$i]
             ));
             
             $del = $db->prepare("DELETE FROM galeri WHERE galeri_id = :gdel");
             $del->execute(array(
                 ':gdel' => $dizi[$i]
             ));

             $resimsil = $sorgu->fetch(PDO::FETCH_ASSOC);
             $galeriyol = $resimsil['galeri_resimyol'];
             unlink("../../$galeriyol");
            
            $i++;
        }
        $emlak_id = $_POST['emlak_id'];
        if($sorgu) {

            header("Location:../production/emlak-galeri.php?emlak_id=$emlak_id&kontrol=ok");
        }else {

            header("Location:../production/emlak-galeri.php?emlak_id=$emlak_id&kontrol=no");
        }

    }else {

        header("Location:../production/emlak.php");
    }
}
