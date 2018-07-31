<meta charset="utf-8" />
<?php
session_start();
include_once("../conn/dataconnection.php");
$type=$_GET['type'];
if($type=='销量'){
	?>
	<div class="col-xs-6 col-md-12" style="width: 100%;margin: 0 auto;height: 40px;">
			<div class="row" id="elder">
				<?php
					$sqll=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%长辈%' or good_use like'%父母%' or festival='父亲节' or festival='母亲节' or object like '%父母%' or object like '%长辈%') order by sales desc");
					@$num=mysql_num_rows($sqll);
					if(@$num<=0){
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
					    $SQL=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%长辈%' or good_use like'%父母%' or festival='父亲节' or festival='母亲节' or object like '%父母%' or object like '%长辈%') order by sales desc limit $ps,$pagesize");
						include("elder2_1.php");
	   		}
	   			?>
<?php
}else if($type=='价格'){
	?>
	<div class="col-xs-6 col-md-12" style="width: 100%;margin: 0 auto;height: 40px;">
			<div class="row" id="elder">
				<?php
					$sqll=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%长辈%' or good_use like'%父母%' or festival='父亲节' or festival='母亲节' or object like '%父母%' or object like '%长辈%') order by good_price asc");
					@$num=mysql_num_rows($sqll);
					if(@$num<=0){
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
					    $SQL=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%长辈%' or good_use like'%父母%' or festival='父亲节' or festival='母亲节' or object like '%父母%' or object like '%长辈%') order by good_price asc limit $ps,$pagesize");
						include("elder2_1.php");
	   		}
	   			?>
	   		<?php
	
	
}else if($type=='最新'){
	?>
	<div class="col-xs-6 col-md-12" style="width: 100%;margin: 0 auto;height: 40px;">
			<div class="row" id="elder">
				<?php
					$sqll=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%长辈%' or good_use like'%父母%' or festival='父亲节' or festival='母亲节' or object like '%父母%' or object like '%长辈%') order by good_time desc");
					@$num=mysql_num_rows($sqll);
					if(@$num<=0){
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
					    $SQL=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%长辈%' or good_use like'%父母%' or festival='父亲节' or festival='母亲节' or object like '%父母%' or object like '%长辈%') order by good_time desc limit $ps,$pagesize");
						include("elder2_1.php");
	   		}
	   			?>
	   		<?php
	
}else{
	?>
	<span>暂无鲜花推荐,<a class="btn btn-danger" href="index.php">更多鲜花</a></span>
	<?php
}
?>