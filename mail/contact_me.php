<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'mitra27042004@gmail.com'; // GANTI dengan email kamu
    $mail->Password   = 'YOUR_APP_PASSWORD';    // GANTI dengan App Password Gmail kamu
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('mitra27042004@gmail.com', 'Form Kontak Desa Laea');
    $mail->addAddress('mitra27042004@gmail.com'); // GANTI jika email tujuan berbeda

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $mail->isHTML(true);
    $mail->Subject = "Pesan dari Website Desa Laea - $name";
    $mail->Body    = "
        <h3>Pesan baru dari website:</h3>
        <p><strong>Nama:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Telepon:</strong> $phone</p>
        <p><strong>Pesan:</strong><br>$message</p>
    ";

    $mail->send();
    echo 'Pesan berhasil dikirim!';
} catch (Exception $e) {
    echo "Pesan gagal dikirim. Error: {$mail->ErrorInfo}";
}
?>
