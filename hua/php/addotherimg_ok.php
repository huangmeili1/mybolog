<meta charset="utf-8" />
<?php
	if(isset($_POST['tijie'])){
$image=$_FILES["img"]["name"];
$good_id=$_GET['good_id'];
$flag=1;
$i=-1;
foreach($image as $a){
					$i=$i+1;
					$aa=explode(".", $a);
					$aaa=$aa[1];
					$d=date("Ymd").rand(2,4000);
					$r1=$d.".".$aaa;
					$pp[$i]=$r1;
					if(($aaa!='jpg'&&$aaa!='jpge'&&$aaa!='png')&&($aaa!='JPG'&&$aaa!='JPGE'&&$aaa!='PNG')){
						echo "图片：".$a."格式不正确"."<br>";
						$flag=0;
						break;
					}
				}
				$pn=-1;
				if($flag=='1'){
					include_once("../conn/dataconnection.php");
					for($n=0;$n<count($image);$n++){
					$pn=$pn+1;
					move_uploaded_file($_FILES['img']["tmp_name"][$n],"../other/".$pp[$n]);
					$images[$pn]="../other/".$pp[$n];	
					}
				@$stra=implode("*",$images);
				//echo $stra;
				$sql=mysql_query("update goods set good_img='$stra' where good_id='$good_id'");
				$n=mysql_affected_rows();
				if($n>0){
					echo "<script>alert('添加成功');window.location.href='selectgood.php?keyword=$good_id&tj=tj&ty=商品编号';</script>";
				}else{
					echo "<script>alert('添加失败');window.location.href='addotherimg.php?good_id=$good_id';</script>";
				}
				}
				
}				
?>