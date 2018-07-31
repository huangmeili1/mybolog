<?php
$type=$_GET['type'];
if($type=='销量'){
	?>
	<div class="col-md-12" style="background-color: white;">
				<div class="row">
					<?php
				include("../conn/dataconnection.php");
				$s=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') order by sales desc");
				@$n=mysql_num_rows($s);
				if($n<=0){
					?>
					<div class="col-md-12">
						<span>暂无鲜花推荐，<a class="btn btn-danger" href="index.php">查看更多</a></span>
					</div>
					<?php
				}else{
						$i=0;
						$pagesize=21;
						if(isset($_GET['page'])){
							$page=$_GET['page'];
						}else{
							$page=1;
						}
					    $number=ceil($n/$pagesize);
					    $ps=($page-1)*$pagesize;
					    $SQL=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') order by sales desc limit $ps,$pagesize");
					    include("flower2_1.php");
	   		}
	   			?>
				
			</div>
	<?php
}else if($type=='价格'){
	?>
	<div class="col-md-12" style="background-color: white;">
				<div class="row">
					<?php
				include("../conn/dataconnection.php");
				$s=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') order by good_price asc");
				@$n=mysql_num_rows($s);
				if($n<=0){
					?>
					<div class="col-md-12">
						<span>暂无鲜花推荐，<a class="btn btn-danger" href="index.php">查看更多</a></span>
					</div>
					<?php
				}else{
						$i=0;
						$pagesize=21;
						if(isset($_GET['page'])){
							$page=$_GET['page'];
						}else{
							$page=1;
						}
					    $number=ceil($n/$pagesize);
					    $ps=($page-1)*$pagesize;
					    $SQL=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') order by good_price asc limit $ps,$pagesize");
					    include("flower2_1.php");
	   		}
	   			?>
				
			</div>
	<?php
}else if($type=='最新'){
	?>
	<div class="col-md-12" style="background-color: white;">
				<div class="row">
					<?php
				include("../conn/dataconnection.php");
				$s=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') order by good_time desc");
				@$n=mysql_num_rows($s);
				if($n<=0){
					?>
					<div class="col-md-12">
						<span>暂无鲜花推荐，<a class="btn btn-danger" href="index.php">查看更多</a></span>
					</div>
					<?php
				}else{
						$i=0;
						$pagesize=21;
						if(isset($_GET['page'])){
							$page=$_GET['page'];
						}else{
							$page=1;
						}
					    $number=ceil($n/$pagesize);
					    $ps=($page-1)*$pagesize;
					    $SQL=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') order by good_time desc limit $ps,$pagesize");
					    include("flower2_1.php");
	   		}
	   			?>
				
			</div>
	<?php
	
}else{
	
}
?>