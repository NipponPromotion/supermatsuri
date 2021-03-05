<?php

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];



// Include config file
require_once "config.php";

$conn = new mysqli( DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME );
if ( $conn->connect_error ) {
    die( "Connection failed: " . $conn->connect_error );
}
$sql="insert into contact (email,name,subject,message,answered) values ('$email','$name','$subject','$message','0')";
		if ( $conn->query( $sql ) === TRUE ) {
        echo "Kayıtlar eklendi contactlara";}
// Düzenleme: Domainhizmetleri.com

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Gerekli dosyaları include ediyoruz
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //SMTP Sunucu Ayarları
    $mail->SMTPDebug = 0;										// DEBUG Kapalı: 0, DEBUG Açık: 2 // Detaylı bilgi için: https://github.com/PHPMailer/PHPMailer/wiki/SMTP-Debugging
    $mail->isSMTP();											// SMTP gönderimi kullan
    $mail->Host       = 'smtp.yandex.com';						// Email sunucu adresi. Genellikle mail.domainadi.com olarak kullanilir. Bu adresi hizmet saglayiciniza sorabilirsiniz
    $mail->SMTPAuth   = true;									// SMTP kullanici dogrulama kullan
    $mail->Username   = 'contact@supermatsuri.com';		// SMTP sunucuda tanimli email adresi
    $mail->Password   = 'dghfqfbxehvnwckh';						// SMTP email sifresi
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;			// SSL icin `PHPMailer::ENCRYPTION_SMTPS` kullanin. SSL olmadan 587 portundan gönderim icin `PHPMailer::ENCRYPTION_STARTTLS` kullanin
    $mail->Port       = 465;									// Eger yukaridaki deger `PHPMailer::ENCRYPTION_SMTPS` ise portu 465 olarak guncelleyin. Yoksa 587 olarak birakin
    $mail->setFrom('contact@supermatsuri.com', 'NPP.WORLD CONTACT FORM'); // Gonderen bilgileri yukaridaki $mail->Username ile aynı deger olmali

    //Alici Ayarları
    $mail->addAddress('mkursadulusoy@hotmail.com.tr', 'Alıcı Ad Soyad'); // Alıcı bilgileri
    //$mail->addAddress('alex@supermatsuri.com');					// İkinci alıcı bilgileri
    //$mail->addReplyTo('YANITADRESI@domainadi.com');			// Alıcı'nın emaili yanıtladığında farklı adrese göndermesini istiyorsaniz aktif edin
    //$mail->addCC('CC@domainadi.com');
    //$mail->addBCC('BCC@domainadi.com');

    // Mail Ekleri
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Attachment ekleme
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Opsiyonel isim degistirerek Attachment ekleme

    // İçerik
    $mail->isHTML(true); // Gönderimi HTML türde olsun istiyorsaniz TRUE ayarlayin. Düz yazı (Plain Text) icin FALSE kullanin
    $mail->Subject = 'New Contact Form Message Arrived';
    $mail->Body    = '<p>There is a new contact request from '.$name.' '.$email.'</p> 
	<p><strong>Subject:</strong>'.$subject.'</p>
	<p><strong>Message:</strong>'.$message.'</p>';
	
	
    $mail->send();
    echo 'Tebrikler! Email başarıyla gönderildi!';
	header( "location:contact.php?success=true" );
} catch (Exception $e) {
    echo "Ops! Email iletilemedi. Hata: {$mail->ErrorInfo}";
	header( "location:contact.php?success=false" );
}