<meta charset="utf-8" />
<?php
session_start();
include("../conn/dataconnection.php");
$type=$_GET['type'];
if($type=='销量'){
	?>
				<div class="row">
					<?php
						$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%老婆%' or good_use like '%女朋友%' or good_use like '%情侣%' or festival like '%情人节%' or festival like'%结婚%' or object like '%老婆%' or object like '%女朋友%' or object like '%情侣%' or object like '%情人%') order by sales desc");
						@$num=mysql_num_rows($sql);
						if(@$num<=0){
							echo "暂无爱情鲜花，你可以浏览其他种类。";
						}else{
					$pagesize=12;
					if(isset($_GET['page'])){
						$page=$_GET['page'];
					}else{
						$page=1;
					}
				    $number=ceil($num/$pagesize);
				    $ps=($page-1)*$pagesize;
				    $SQL=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%老婆%' or good_use like '%女朋友%' or good_use like '%情侣%' or festival like '%情人节%' or festival like'%结婚%' or object like '%老婆%' or object like '%女朋友%' or object like '%情侣%' or object like '%情人%') order by sales desc limit $ps,$pagesize");
					include("changelove_1.php");
	   		}
	   			 ?>
	   	
	<?php
}else if($type=='价格'){
	?>
				<div class="row">
					<?php
						$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%老婆%' or good_use like '%女朋友%' or good_use like '%情侣%' or festival like '%情人节%' or festival like'%结婚%' or object like '%老婆%' or object like '%女朋友%' or object like '%情侣%' or object like '%情人%') order by good_price asc");
						@$num=mysql_num_rows($sql);
						if(@$num<=0){
							echo "暂无爱情鲜花，你可以浏览其他种类。";
						}else{
					$pagesize=12;
					if(isset($_GET['page'])){
						$page=$_GET['page'];
					}else{
						$page=1;
					}
				    $number=ceil($num/$pagesize);
				    $ps=($page-1)*$pagesize;
				    $SQL=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%老婆%' or good_use like '%女朋友%' or good_use like '%情侣%' or festival like '%情人节%' or festival like'%结婚%' or object like '%老婆%' or object like '%女朋友%' or object like '%情侣%' or object like '%情人%') order by good_price asc limit $ps,$pagesize");
							include("changelove_1.php");
	   		}
	   			 ?>
	<?php
}else if($type=='最新'){
	?>
				<div class="row">
					<?php
						$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%老婆%' or good_use like '%女朋友%' or good_use like '%情侣%' or festival like '%情人节%' or festival like'%结婚%' or object like '%老婆%' or object like '%女朋友%' or object like '%情侣%' or object like '%情人%') order by good_time desc");
						@$num=mysql_num_rows($sql);
						if(@$num<=0){
							echo "暂无爱情鲜花，你可以浏览其他种类。";
						}else{
					$pagesize=12;
					if(isset($_GET['page'])){
						$page=$_GET['page'];
					}else{
						$page=1;
					}
				    $number=ceil($num/$pagesize);
				    $ps=($page-1)*$pagesize;
				    $SQL=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%老婆%' or good_use like '%女朋友%' or good_use like '%情侣%' or festival like '%情人节%' or festival like'%结婚%' or object like '%老婆%' or object like '%女朋友%' or object like '%情侣%' or object like '%情人%') order by good_time desc limit $ps,$pagesize");
							include("changelove_1.php");
	   		}
	   			 ?>
	<?php
}else{
	echo "暂无分类";
}
?>