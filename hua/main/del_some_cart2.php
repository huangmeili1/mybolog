<?php
session_start();
@$goods=$_POST['goods'];
@$nums=$_POST['nums'];
@$ji_wu=$_POST['ju_wu'];
@$old_good=explode("$",$_SESSION['cart']);
@$old_num=explode("*",$_SESSION['num']);
@$wu=explode(",",$ji_wu);
@$good=explode(",",$goods);
@$num=explode(",",$nums);
@$new_good=array();
$new_num=array();
$aa=-1;
for($i=0;$i<count($old_num);$i++){
	if(in_array($i, $wu)){
		
	}else{
		$aa++;
		$new_num[$aa]=$old_num[$i];
	}
}
//$new_num=array_merge(array_diff($old_num,$num),array_diff($num,$old_num));

$new_good=array_merge(array_diff($old_good,$good),array_diff($good,$old_good));//查询两个数组中不同的部分
@$neww_good=implode("$",$new_good);
@$neww_num=implode("*",$new_num);
$_SESSION['cart']=$neww_good;
$_SESSION['num']=$neww_num;
//echo "删除成功";
?>