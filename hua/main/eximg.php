<?php
include("../conn/dataconnection.php");
$i=$_POST['i'];
$good_id=$_POST['good_id'];
$sql=mysql_query("select main_img,details_img from goods where good_id='$good_id'");
$f=mysql_fetch_array($sql);
$image=$f['details_img'];
$img=explode("*",$image);
$img[3]=$f['main_img'];
$response=$img[$i];
echo json_encode($response);
?>
