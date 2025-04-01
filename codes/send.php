<?php
//abco ytww xvll vudc
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST['send'])){
    $mail = new PHPMailer(true);

    try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth =true;
    $mail->Username = 'elma.zarcilla.up@phinmaed.com';
    $mail->Password = 'gtfbyilxqozsvefu';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('elma.zarcilla.up@phinmaed.com','Elvin');

    $mail->addAddress($_POST['email']);

    $mail->isHTML(true);

    $mail->Subject = "Reservation Status";

    $mail->Body = "Accepted";

    $mail->send();

    echo
    "
    <script>
        alert('Sent Successfully');
        document.location.href = 'test.php';
    </script>
    
    ";
    }catch(Exception $e){
        echo"Message not sent. Error: " . $mail->ErrorInfo;
    }

}


?>