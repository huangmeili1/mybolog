<meta charset="utf-8" />
<?php
session_start();
@$type=$_GET['type'];
if($type=='销量'){
	?>
	<div class="col-xs-6 col-md-12" style="background-color: white;">
			<div class="row">
				<?php
					include("../conn/dataconnection.php");
					$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%道歉%' or good_use like '%老婆%') order by sales desc");
					@$num=mysql_num_rows($sql);
					if($num<=0){
						?>
						<div class="col-xs-6 col-md-12" style="text-align: center;">
							<span style="text-align: center;line-height: 80px;">暂无长辈鲜花推荐，<a class="btn btn-danger" href="flower.php">更多鲜花查看</a></span>
						</div>
						<?php
					}else{
						$i=0;
						$pagesize=20;
						if(isset($_GET['page'])){
							$page=$_GET['page'];
						}else{
							$page=1;
						}
					    $number=ceil($num/$pagesize);
					    $ps=($page-1)*$pagesize;
					    $SQL=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%道歉%' or good_use like '%老婆%') order by sales desc limit $ps,$pagesize");
						include("sorry2_1.php");
					}
					?>
			</div>
			
			<?php include("sorry2_2.php"); ?>
	<?php
}else if($type=='价格'){
	?>
	<div class="col-xs-6 col-md-12" style="background-color: white;">
			<div class="row">
				<?php
					include("../conn/dataconnection.php");
					$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%道歉%' or good_use like '%老婆%') order by good_price asc");
					@$num=mysql_num_rows($sql);
					if($num<=0){
						?>
						<div class="col-xs-6 col-md-12" style="text-align: center;">
							<span style="text-align: center;line-height: 80px;">暂无长辈鲜花推荐，<a class="btn btn-danger" href="flower.php">更多鲜花查看</a></span>
						</div>
						<?php
					}else{
						$i=0;
						$pagesize=20;
						if(isset($_GET['page'])){
							$page=$_GET['page'];
						}else{
							$page=1;
						}
					    $number=ceil($num/$pagesize);
					    $ps=($page-1)*$pagesize;
					    $SQL=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%道歉%' or good_use like '%老婆%') order by good_price asc limit $ps,$pagesize");
						include("sorry2_1.php");
					}
					?>
			</div>
			
			<?php include("sorry2_2.php"); ?>
	<?php
}else if($type=='最新'){
	?>
	<div class="col-xs-6 col-md-12" style="background-color: white;">
			<div class="row">
				<?php
					include("../conn/dataconnection.php");
					$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%道歉%' or good_use like '%老婆%') order by good_time desc");
					@$num=mysql_num_rows($sql);
					if($num<=0){
						?>
						<div class="col-xs-6 col-md-12" style="text-align: center;">
							<span style="text-align: center;line-height: 80px;">暂无长辈鲜花推荐，<a class="btn btn-danger" href="flower.php">更多鲜花查看</a></span>
						</div>
						<?php
					}else{
						$i=0;
						$pagesize=20;
						if(isset($_GET['page'])){
							$page=$_GET['page'];
						}else{
							$page=1;
						}
					    $number=ceil($num/$pagesize);
					    $ps=($page-1)*$pagesize;
					    $SQL=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%道歉%' or good_use like '%老婆%') order by good_time desc limit $ps,$pagesize");
						include("sorry2_1.php");
					}
					?>
			</div>
			
			<?php include("sorry2_2.php"); ?>
	<?php
}else{
	?>
	<div class="col-xs-6 col-md-12" style="text-align: center;">
		<span style="text-align: center;line-height: 80px;">暂无长辈鲜花推荐，<a class="btn btn-danger" href="flower.php">更多鲜花查看</a></span>
	</div>
	<?php
}
?>