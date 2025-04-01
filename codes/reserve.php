<?php
session_start();
$_SESSION['price'] = 0;
if(isset($_GET['small'])){
    $_SESSION['price'] = 1500;
}
else if(isset($_GET['medium'])){
    $_SESSION['price'] = 3000;
}
else if(isset($_GET['large'])){
    $_SESSION['price'] = 5000;
}
header('Location:activity_selection.html');
?>