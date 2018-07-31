<meta charset="utf-8" />
<?php
include("../conn/dataconnection.php");
@$good_id=$_POST['good_id'];
$s=mysql_query("select * from goods where good_id='$good_id'");
$flower=mysql_fetch_array($s);
$old=$flower['good_num'];
@$old_num=$flower['sum'];
@$good_name=$_POST['good_name'];
@$good_price=$_POST['good_price'];
@$prime_cost=$_POST['prime_cost'];
@$buy_price=$_POST['buy_price'];
@$good_hua=$_POST['good_hua'];
@$sum=$_POST['sum'];
@$kind_id=$_POST['kind'];
$good_num=$old+($sum-$old_num);
//echo $sum."<br>";
//echo $good_num."a".$sum.$old;
//echo $good_num;
@$flower_num=$_POST['flower_num'];
@$material=$_POST['material'];
@$good_use=$_POST['good_use'];
@$festival=$_POST['festival'];
@$packing=$_POST['packing'];
@$object=$_POST['object'];
@$send=$_POST['send'];
@$ad=$_POST['ad'];
@$say=$_POST['say'];
$sql=mysql_query("update goods set good_name='$good_name',good_price='$good_price',good_hua='$good_hua',good_num='$good_num',sum='$sum',flower_num='$flower_num',material='$material',prime_cost='$prime_cost',buy_price='$buy_price',good_use='$good_use',festival='$festival',packing='$packing',object='$object',kind_id='$kind_id',send='$send',ad='$ad',say='$say' where good_id='$good_id'");
@$num=mysql_affected_rows();
if($num<=0){
//	echo $num."wrwe";
//	echo $good_num;
	echo "<script>alert('更新失败，请检查');history.go(-1);</script>";
}else{
	echo "<script>alert('更新成功');history.go(-2);</script>";
}
?>