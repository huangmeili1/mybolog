<meta charset="utf-8" />
<?php
if(isset($_POST['ttj'])){
	include("../conn/dataconnection.php");
	@$good_id=$_GET['good_id'];
	$image=$_FILES["ima"]["name"];
	$y=-1;
	for($i=0;$i<count($image);$i++){
		$y++;
		$d=date("Ymdhis").rand(2,4000);
		$aa=strrchr($image[$i], '.');
		move_uploaded_file($_FILES['ima']["tmp_name"][$i],"../update/".$d.$aa);
		$images[$y]="../update/".$d.$aa;
	}
	@$stra=implode("*",$images);
	$sql=mysql_query("select * from goods where good_id='$good_id'");
	@$f=mysql_fetch_array($sql);
	$new=$f['good_img']."*".$stra;
	$up=mysql_query("update goods set good_img='$new' where good_id='$good_id'");
	@$num=mysql_affected_rows();
	if(@$num<=0){
		echo "<script>alert('更新出错，请联系系统维护员');history.go(-1);</script>";
	}else{
		echo "<script>alert('更新成功');window.location.href='see_good.php?good_id=$good_id';</script>";
	}
}
?>