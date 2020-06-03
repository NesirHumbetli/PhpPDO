if (isset($_GET['emlaksil']) == 'ok') {
    $emlak_id = $_GET['emlak_id'];
    $galeri_sil = $db->prepare("DELETE FROM galeri WHERE mezmun_id = :mid");
    $galeriyol->execute(array(
        ':mid' => $emlak_id
    ));
    while($galericek = $galeriyol->fetch(PDO::FETCH_ASSOC)){
        $galresimyol = $galericek['galeri_resimyol'];
        unlink("../../$galresimyol");
        
    }


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
