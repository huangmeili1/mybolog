<meta charset="utf-8" />
<?php
session_start();
include("../conn/dataconnection.php");
$type=$_GET['type'];
$ad=$_GET['ad'];
if($type=='销量'){
	?>
	<div class="col-xs-6 col-md-12" style="width: 100%;margin: 0 auto;background-color: white;">
				<?php 
					include("../conn/dataconnection.php");
					$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%开业%' or festival like '%开业%' or object like '%开业%') order by sales desc");
					@$num=mysql_num_rows($sql);
					if($num<=0){
						?>
						<div class="row">
						<div class="col-xs-6 col-md-12" style="width: 100%;margin: 0 auto;">
							<span style="text-align: center;margin: 0 auto;">暂无鲜花推荐,<a class="btn btn-danger" href="index.php">更多鲜花</a></span>
						</div>
						</div>
						
						<?php
					}else{
						?>
						<div class="row">
						<?php
						$i=0;
						$pagesize=20;
						if(isset($_GET['page'])){
							$page=$_GET['page'];
						}else{
							$page=1;
						}
					    $number=ceil($num/$pagesize);
					    $ps=($page-1)*$pagesize;
					    $SQL=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%开业%' or festival like '%开业%' or object like '%开业%') order by sales desc limit $ps,$pagesize");
					    include("zhuhe2_1.php");
					    ?>
					    
					    <?php
					}
					?>
		</div>
	<?php
}else if($type=='价格'){
	?>
	<div class="col-xs-6 col-md-12" style="width: 100%;margin: 0 auto;background-color: white;">
				<?php 
					include("../conn/dataconnection.php");
					$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%开业%' or festival like '%开业%' or object like '%开业%') order by good_price asc");
					@$num=mysql_num_rows($sql);
					if($num<=0){
						?>
						<div class="row">
						<div class="col-xs-6 col-md-12" style="width: 100%;margin: 0 auto;">
							<span style="text-align: center;margin: 0 auto;">暂无鲜花推荐,<a class="btn btn-danger" href="index.php">更多鲜花</a></span>
						</div>
						</div>
						
						<?php
					}else{
						?>
						<div class="row">
						<?php
						$i=0;
						$pagesize=20;
						if(isset($_GET['page'])){
							$page=$_GET['page'];
						}else{
							$page=1;
						}
					    $number=ceil($num/$pagesize);
					    $ps=($page-1)*$pagesize;
					    $SQL=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%开业%' or festival like '%开业%' or object like '%开业%') order by good_price asc limit $ps,$pagesize");
					    include("zhuhe2_1.php");
					    ?>
					    
					    <?php
					}
					?>
		</div>
	<?php
	
}else if($type=='最新'){
	?>
	<div class="col-xs-6 col-md-12" style="width: 100%;margin: 0 auto;background-color: white;">
				<?php 
					include("../conn/dataconnection.php");
					$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%开业%' or festival like '%开业%' or object like '%开业%') order by good_time desc");
					@$num=mysql_num_rows($sql);
					if($num<=0){
						?>
						<div class="row">
						<div class="col-xs-6 col-md-12" style="width: 100%;margin: 0 auto;">
							<span style="text-align: center;margin: 0 auto;">暂无鲜花推荐,<a class="btn btn-danger" href="index.php">更多鲜花</a></span>
						</div>
						</div>
						
						<?php
					}else{
						?>
						<div class="row">
						<?php
						$i=0;
						$pagesize=20;
						if(isset($_GET['page'])){
							$page=$_GET['page'];
						}else{
							$page=1;
						}
					    $number=ceil($num/$pagesize);
					    $ps=($page-1)*$pagesize;
					    $SQL=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%开业%' or festival like '%开业%' or object like '%开业%') order by good_time desc limit $ps,$pagesize");
					    include("zhuhe2_1.php");
					    ?>
					    
					    <?php
					}
					?>
		</div>
	<?php
}else{
	?>
	<span>暂无鲜花推荐,<a class="btn btn-danger" href="index.php">更多鲜花</a></span>
	<?php
}
?>