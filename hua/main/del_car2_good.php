<?php
session_start();
@$good_id=$_POST['good_id'];
@$good=explode("$",$_SESSION['cart']);
@$nums=explode("*",$_SESSION['num']);
$new_good=array();
$new_num=array();
$a=-1;
for($i=0;$i<count($good);$i++){
	if($good[$i]==$good_id){
		
	}else{
		$a++;
		$new_good[$a]=$good[$i];
		$new_num[$a]=$nums[$i];
	}
}
@$neww_good=implode("$",$new_good);
@$neww_num=implode("*",$new_num);
@$_SESSION['cart']=$neww_good;
@$_SESSION['num']=$neww_num;
echo "删除成功";
?>