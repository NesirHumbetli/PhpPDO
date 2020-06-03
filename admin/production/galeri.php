<?php 
include "../netting/connect.php";



if(!empty($_FILES)){

    $upload_dir= "../../images/galeri";
    @$tmp_name = $_FILES['file']['tmp_name'];
    @$name = $_FILES['file']['name'];
    $mezmun_id = $_POST['emlak_id'];
    $randomname = rand(20000,32000);
    $galeriyol = substr($upload_dir,6)."/".$randomname.$name;
    @move_uploaded_file($tmp_name,"$upload_dir/$randomname$name");
    $yukle = $db->prepare("INSERT INTO galeri SET
        galeri_resimyol = :resimyol,
        mezmun_id =:id
    ");

    $insert = $yukle->execute(array(
        ':resimyol' => $galeriyol,
        ':id' => $mezmun_id
    ));

    if($insert) {

        header("Location:emlak-galeri.php");
    }else {
        echo "Xeta";
    }
}


?>