<?php
include('connection.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $name = $_GET["name"];
    $email = $_GET["email"];
    $address = $_GET["address"];
    $cnum = $_GET["cnum"];
    $date = $_GET["date"];
    $time = $_GET["time"];
    $fee = $_GET["fee"];
    $activities = $_GET["activities"];
    $islands = $_GET["islands"];

    $mail = new PHPMailer(true);

    try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth =true;
    $mail->Username = 'elma.zarcilla.up@phinmaed.com';
    $mail->Password = 'gtfbyilxqozsvefu';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('elma.zarcilla.up@phinmaed.com','Hundred Islands Reservation Team');

    $mail->addAddress($email);

    $mail->isHTML(true);

    $mail->Subject = "Reservation Status";

    $mail->Body = "
    Confirmation of Your Reservation to Hundred Islands <br>

    Dear $name,<br><br>

    Greetings from Hundred Islands National Park!<br>

    We are pleased to inform you that your reservation for a trip to the Hundred Islands has been successfully confirmed. We appreciate your trust in our services and look forward to providing you with an enjoyable and memorable experience.<br>

    Please ensure that you bring a valid ID and a copy of this confirmation on the day of your trip. If you have any special requests or require further assistance, feel free to contact us.<br>

    Thank you for choosing Hundred Islands National Park! We look forward to welcoming you on your adventure to the Hundred Islands.<br><br>

    Best regards,<br>
    Hundred Island National Park <br>";

    $mail->send();


    }catch(Exception $e){
        echo"Message not sent. Error: " . $mail->ErrorInfo;
    }


    //$sql = "SELECT * FROM reservation WHERE id = $id";
    //$result = $con->query($sql);

    $insert = "INSERT INTO `accepted`(`id`, `name`, `email`, `cnum`, `address`, `date`, `time`, `fee`, `activities`, `islands`) VALUES ('$id','$name','$email','$cnum','$address','$date','$time','$fee', '$activities', '$islands')";
    $con->query($insert);
    /*while($row = $result->fetch_assoc())
    {
    $insert = "INSERT INTO `accepted`(`id`, `name`, `email`, `cnum`, `address`, `date`, `time`) VALUES ('$id','$row[name]','$row[email]','$row[cnum]','$row[address]','$row[date]','$row[time]')";
    $con->query($insert);
    }*/
    
    $delete = "DELETE FROM reservation WHERE id=$id";
    $con->query($delete);
    
    echo
    "
    <script>
        alert('Sent Successfully');
        document.location.href = 'admin.php';
    </script>
    
    ";
}
?>