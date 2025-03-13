<?php
$accept = "SELECT * FROM accepted";
$rejected = "SELECT * FROM rejected";
$pending = "SELECT * FROM reservation";
$accepted_counter = mysqli_query($con,$accept);
$rejected_counter = mysqli_query($con,$rejected);
$pending_counter = mysqli_query($con,$pending);
$accepted_count = mysqli_num_rows($accepted_counter);
$rejected_count = mysqli_num_rows($rejected_counter);
$pending_count = mysqli_num_rows($pending_counter);
?>