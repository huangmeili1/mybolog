<?php
session_start();
@$good=explode("$",$_SESSION['cart']);
@$nums=explode("*",$_SESSION['num']);
$_SESSION['cart']='';
$_SESSION['num']='';
header('location:cart2_1.php');
?>