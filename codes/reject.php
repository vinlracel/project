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

    $mail->setFrom('elma.zarcilla.up@phinmaed.com','Hundred Island Reservation Team');

    $mail->addAddress($email);

    $mail->isHTML(true);

    $mail->Subject = "Reservation Status";

    $mail->Body = "Notice of Reservation Decline to Hundred Islands<br><br>

Dear $name,<br><br>

Thank you for your interest in booking a trip to the Hundred Islands with us. We regret to inform you that your reservation request, has been declined due to incomplete requirements, payment issues, etc.<br>

We sincerely apologize for any inconvenience this may cause. If you would like to reschedule or make alternative arrangements, please feel free to contact us at [Company Contact Information], and we will do our best to assist you.<br>

Should you require further clarification or have any concerns, please do not hesitate to reach out. We truly appreciate your understanding and hope to have the opportunity to accommodate you in the future.<br>

Best regards,<br>
Hundred Islands National Park";

    $mail->send();

    
    }catch(Exception $e){
        echo"Message not sent. Error: " . $mail->ErrorInfo;
    }


    //$sql = "SELECT * FROM reservation WHERE id = $id";
    //$result = $con->query($sql);

    $insert = "INSERT INTO `rejected`(`id`, `name`, `email`, `cnum`, `address`, `date`, `time`,`fee`,`activities`,`islands`) VALUES ('$id','$name','$email','$cnum','$address','$date','$time','$fee','$activities','$islands')";
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