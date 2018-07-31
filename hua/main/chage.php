<meta charset="utf-8" />
<?php
include("../conn/dataconnection.php");
if(isset($_GET['tj'])){
	session_start();
	$sel=$_GET['sel'];
	$key=$_GET['key'];
	$type=$_GET['type'];
	if($type=='销量'){
		if($sel=='节日'){
					$sql=mysql_query("select * from goods where festival like '%$key%' order by sales desc");
					@$num=mysql_num_rows($sql);
					$pagesize=16;
					if(isset($_GET['page'])){
						$page=$_GET['page'];
					}else{
						$page=1;
					}
				    $number=ceil($num/$pagesize);
				    $ps=($page-1)*$pagesize;
					if(@$num>0){
					$SQL=mysql_query("select * from goods where festival like '%$key%' order by sales desc limit $ps,$pagesize");
					include("select_1.php");
					include("select_2.php");
					}else{
						echo "<script>alert('你要找的节日不存在，请稍后再试');</script>";
					}
		}else if($sel=='对象'){
					$sql=mysql_query("select * from goods where object like '%$key%' order by sales desc");
					@$num=mysql_num_rows($sql);
					$pagesize=16;
					if(isset($_GET['page'])){
						$page=$_GET['page'];
					}else{
						$page=1;
					}
				    $number=ceil($num/$pagesize);
				    $ps=($page-1)*$pagesize;
					if(@$num>0){
					$SQL=mysql_query("select * from goods where object like '%$key%' order by sales desc limit $ps,$pagesize");
					include("select_1.php");
					include("select_2.php");
					}else{
						echo "<script>alert('你要找的对象不存在，请稍后再试');</script>";
					}
		}else if($sel=='枝数'){
					$sql=mysql_query("select * from goods where flower_num like '%$key%' order by sales desc");
					@$num=mysql_num_rows($sql);
					$pagesize=16;
					if(isset($_GET['page'])){
						$page=$_GET['page'];
					}else{
						$page=1;
					}
				    $number=ceil($num/$pagesize);
				    $ps=($page-1)*$pagesize;
					if(@$num>0){
					$SQL=mysql_query("select * from goods where flower_num like '%$key%' order by sales desc limit $ps,$pagesize");
					include("select_1.php");
					include("select_2.php");
					}else{
						echo "<script>alert('你要找的枝数不存在，请稍后再试');</script>";
					}
		}else if($sel=='花材'){
					$sql=mysql_query("select * from goods where material like '%$key%' order by sales desc");
					@$num=mysql_num_rows($sql);
					$pagesize=16;
					if(isset($_GET['page'])){
						$page=$_GET['page'];
					}else{
						$page=1;
					}
				    $number=ceil($num/$pagesize);
				    $ps=($page-1)*$pagesize;
					if(@$num>0){
					$SQL=mysql_query("select * from goods where material like '%$key%' order by sales desc limit $ps,$pagesize");
					include("select_1.php");
					include("select_2.php");
					}else{
						echo "<script>alert('你要找的花材不存在，请稍后再试');</script>";
					}
		}else if($sel=='用途'){
					$sql=mysql_query("select * from goods where good_use like '%$key%' order by sales desc");
					@$num=mysql_num_rows($sql);
					$pagesize=16;
					if(isset($_GET['page'])){
						$page=$_GET['page'];
					}else{
						$page=1;
					}
				    $number=ceil($num/$pagesize);
				    $ps=($page-1)*$pagesize;
					if(@$num>0){
					$SQL=mysql_query("select * from goods where good_use like '%$key%' order by sales desc limit $ps,$pagesize");
					include("select_1.php");
					include("select_2.php");
					}else{
						echo "<script>alert('你要找的用途不存在，请稍后再试');</script>";
					}
		}else{
			echo "对不起，系统出错了";
		}
	}else if($type=='价格'){
		if($sel=='节日'){
					$sql=mysql_query("select * from goods where festival like '%$key%' order by good_price desc");
					@$num=mysql_num_rows($sql);
					$pagesize=16;
					if(isset($_GET['page'])){
						$page=$_GET['page'];
					}else{
						$page=1;
					}
				    $number=ceil($num/$pagesize);
				    $ps=($page-1)*$pagesize;
					if(@$num>0){
					$SQL=mysql_query("select * from goods where festival like '%$key%' order by good_price desc limit $ps,$pagesize");
					include("select_1.php");
					include("select_2.php");
					}else{
						echo "<script>alert('你要找的节日不存在，请稍后再试');</script>";
					}
		}else if($sel=='对象'){
					$sql=mysql_query("select * from goods where object like '%$key%' order by good_price desc");
					@$num=mysql_num_rows($sql);
					$pagesize=16;
					if(isset($_GET['page'])){
						$page=$_GET['page'];
					}else{
						$page=1;
					}
				    $number=ceil($num/$pagesize);
				    $ps=($page-1)*$pagesize;
					if(@$num>0){
					$SQL=mysql_query("select * from goods where object like '%$key%' order by good_price desc limit $ps,$pagesize");
					include("select_1.php");
					include("select_2.php");
					}else{
						echo "<script>alert('你要找的对象不存在，请稍后再试');</script>";
					}
		}else if($sel=='枝数'){
					$sql=mysql_query("select * from goods where flower_num like '%$key%' order by good_price desc");
					@$num=mysql_num_rows($sql);
					$pagesize=16;
					if(isset($_GET['page'])){
						$page=$_GET['page'];
					}else{
						$page=1;
					}
				    $number=ceil($num/$pagesize);
				    $ps=($page-1)*$pagesize;
					if(@$num>0){
					$SQL=mysql_query("select * from goods where flower_num like '%$key%' order by good_price desc limit $ps,$pagesize");
					include("select_1.php");
					include("select_2.php");
					}else{
						echo "<script>alert('你要找的枝数不存在，请稍后再试');</script>";
					}
		}else if($sel=='花材'){
					$sql=mysql_query("select * from goods where material like '%$key%' order by good_price desc");
					@$num=mysql_num_rows($sql);
					$pagesize=16;
					if(isset($_GET['page'])){
						$page=$_GET['page'];
					}else{
						$page=1;
					}
				    $number=ceil($num/$pagesize);
				    $ps=($page-1)*$pagesize;
					if(@$num>0){
					$SQL=mysql_query("select * from goods where material like '%$key%' order by good_price desc limit $ps,$pagesize");
					include("select_1.php");
					include("select_2.php");
					}else{
						echo "<script>alert('你要找的花材不存在，请稍后再试');</script>";
					}
		}else if($sel=='用途'){
					$sql=mysql_query("select * from goods where good_use like '%$key%' order by good_price desc");
					@$num=mysql_num_rows($sql);
					$pagesize=16;
					if(isset($_GET['page'])){
						$page=$_GET['page'];
					}else{
						$page=1;
					}
				    $number=ceil($num/$pagesize);
				    $ps=($page-1)*$pagesize;
					if(@$num>0){
					$SQL=mysql_query("select * from goods where good_use like '%$key%' order by good_price desc limit $ps,$pagesize");
					include("select_1.php");
					include("select_2.php");
					}else{
						echo "<script>alert('你要找的用途不存在，请稍后再试');</script>";
					}
		}else{
			echo "对不起，系统出错了";
		}
		
		
	}else if($type=='最新'){
		if($sel=='节日'){
					$sql=mysql_query("select * from goods where festival like '%$key%' order by good_time desc");
					@$num=mysql_num_rows($sql);
					$pagesize=16;
					if(isset($_GET['page'])){
						$page=$_GET['page'];
					}else{
						$page=1;
					}
				    $number=ceil($num/$pagesize);
				    $ps=($page-1)*$pagesize;
					if(@$num>0){
					$SQL=mysql_query("select * from goods where festival like '%$key%' order by good_time desc limit $ps,$pagesize");
					include("select_1.php");
					include("select_2.php");
					}else{
						echo "<script>alert('你要找的节日不存在，请稍后再试');</script>";
					}
		}else if($sel=='对象'){
					$sql=mysql_query("select * from goods where object like '%$key%' order by good_time desc");
					@$num=mysql_num_rows($sql);
					$pagesize=16;
					if(isset($_GET['page'])){
						$page=$_GET['page'];
					}else{
						$page=1;
					}
				    $number=ceil($num/$pagesize);
				    $ps=($page-1)*$pagesize;
					if(@$num>0){
					$SQL=mysql_query("select * from goods where object like '%$key%' order by good_time desc limit $ps,$pagesize");
					include("select_1.php");
					include("select_2.php");
					}else{
						echo "<script>alert('你要找的对象不存在，请稍后再试');</script>";
					}
		}else if($sel=='枝数'){
					$sql=mysql_query("select * from goods where flower_num like '%$key%' order by good_time desc");
					@$num=mysql_num_rows($sql);
					$pagesize=16;
					if(isset($_GET['page'])){
						$page=$_GET['page'];
					}else{
						$page=1;
					}
				    $number=ceil($num/$pagesize);
				    $ps=($page-1)*$pagesize;
					if(@$num>0){
					$SQL=mysql_query("select * from goods where flower_num like '%$key%' order by good_time desc limit $ps,$pagesize");
					include("select_1.php");
					include("select_2.php");
					}else{
						echo "<script>alert('你要找的枝数不存在，请稍后再试');</script>";
					}
		}else if($sel=='花材'){
					$sql=mysql_query("select * from goods where material like '%$key%' order by good_time desc");
					@$num=mysql_num_rows($sql);
					$pagesize=16;
					if(isset($_GET['page'])){
						$page=$_GET['page'];
					}else{
						$page=1;
					}
				    $number=ceil($num/$pagesize);
				    $ps=($page-1)*$pagesize;
					if(@$num>0){
					$SQL=mysql_query("select * from goods where material like '%$key%' order by good_time desc limit $ps,$pagesize");
					include("select_1.php");
					include("select_2.php");
					}else{
						echo "<script>alert('你要找的花材不存在，请稍后再试');</script>";
					}
		}else if($sel=='用途'){
					$sql=mysql_query("select * from goods where good_use like '%$key%' order by good_time desc");
					@$num=mysql_num_rows($sql);
					$pagesize=16;
					if(isset($_GET['page'])){
						$page=$_GET['page'];
					}else{
						$page=1;
					}
				    $number=ceil($num/$pagesize);
				    $ps=($page-1)*$pagesize;
					if(@$num>0){
					$SQL=mysql_query("select * from goods where good_use like '%$key%' order by good_time desc limit $ps,$pagesize");
					include("select_1.php");
					include("select_2.php");
					}else{
						echo "<script>alert('你要找的用途不存在，请稍后再试');</script>";
					}
		}else{
			echo "对不起，系统出错了";
		}
	}else{
		echo "对不起，系统出错了";
	}
}
?>