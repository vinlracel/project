<?php
include 'connection.php';
session_start();
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$cnum = $_SESSION['cnum'];
$address = $_SESSION['address'];
$date = $_SESSION['date'];
$time = $_SESSION['time'];
$img = $_SESSION['img'];
$_SESSION['selected_island'] = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $activities = $_POST['destinations'] ?? [];

    foreach ($activities as $index => $island) {

        $selectedIslands[] = [
            "island" => $island
        ];
    }
    foreach ($selectedIslands as $item) {
        $_SESSION['selected_island'] = $_SESSION['selected_island']  . $item['island'].', ';
    }
}
$fee = $_SESSION['price'];
$activity = $_SESSION['activities'];
$islands = $_SESSION['selected_island'];

$query = "INSERT INTO `reservation`(`name`, `email`, `cnum`,`date`, `time`, `address`, `img_dir`, `fee`, `activities`, `islands`) VALUES ('$name','$email','$cnum','$date', '$time','$address','$img','$fee','$activity','$islands')";
mysqli_query($con, $query);
if($query > 0){
    ?>
        <script>
            window.location = 'index.php?showAlert=true';
        </script>
        
    <?php
}

?>