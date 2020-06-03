<?php
include "../../admin/netting/connect.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require("PHPMailer.php");
require("Exception.php");
require("SMTP.php");



if (
    isset($_POST['mailgonder'])
    && !empty($_POST['name'])
    && !empty($_POST['email'])
    && !empty($_POST['subject'])
    && !empty($_POST['message'])

) {
    $ayarsor = $db->prepare("SELECT * FROM ayar WHERE ayar_id=:id");
    $ayarsor->execute(array(
        ':id' => 0
    ));
    $ayarcek = $ayarsor->fetch(PDO::FETCH_ASSOC);
    $mail = new PHPMailer();

    
    $mail->isSMTP();
    $mail->SMTPDebug = "1";
    $mail->CharSet = "UTF-8";
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Host = $ayarcek['ayar_smtphost'];
    $mail->Username = $ayarcek['ayar_smtpuser'];
    $mail->Password = $ayarcek['ayar_smtppassword'];
    $mail->Port = $ayarcek['ayar_smtpport'];
    $mail->From = $ayarcek['ayar_smtpuser'];
    $mail->FromName = "Nesir123";
    $mail->addAddress("name55255@gmail.com", "Form Mail");
    $mail->Subject = $_POST['subject'];
    $mail->Body = implode("  ", $_POST);

    if (!$mail->send()) {

        echo "Mail Xəta baş verdi." . $mail->ErrorInfo;
    } else {

        echo "Mesaj Göndərildi.";
    }
}
