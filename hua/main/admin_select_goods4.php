<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>商品查询</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	body{
		margin-top: 70px;
	}
</style>
<?php
	session_start();
	include_once("../conn/dataconnection.php");
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		@$sel=$_GET['sel'];
		@$keywrod=$_GET['keyword'];
		?>
<div class="container" style="width: 100%;">
	   <?php  include("m_top.php"); ?>
	   	<div class="row">
	   		<div class="col-md-12">
	   			<h4 style="text-align: center;">查询条件:<b><?php echo $sel ?>:<?php echo $keywrod; ?></b></h4>
	   			<?php
	   				if($sel=='节日'){
	   					@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='绿色植物') and festival like '%$keywrod%' order by good_time desc");
	   					@$sql_num=mysql_num_rows($sql);
	   					if($sql_num<=0){
	   						?>
	   						<div class="row">
	   							<div class="col-md-12">
	   								<h4 style="text-align: center;">你要查询的商品不存在</h4>
	   							</div>
	   						</div>
	   						<?php
	   					}else{
	   						?>
	   						<div class="row">
	   							<div class="col-md-12">
	   								<h4 style="text-align: center;">共查询：<?php echo $sql_num ?>件商品</h4>
	   								<table class="table table-hover">
	   									<thead>
	   									<th>商品图片</th>
										<th>商品名称</th>
										<th>商品现价</th>
										<th>商品原价</th>
										<th>商品成本价</th>
										<th>销量</th>
										<th>库存</th>
										<th>总量</th>
										<th>适合对象</th>
										<th>操作</th>
	   									</thead>
	   									<tbody>
	   										<?php
										$pagesize=20;
										if(isset($_GET['page'])){
											$page=$_GET['page'];
										}else{
											$page=1;
										}
									    $number=ceil($sql_num/$pagesize);
									    $ps=($page-1)*$pagesize;
									    $SQL=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='绿色植物') and festival like '%$keywrod%' order by good_time desc limit $ps,$pagesize");
										?>
										<?php
											include("admin_select_goods4_1.php");
											?>
	   						<?php
	   					}
	   				}else if($sel=='对象'){
	   					$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='绿色植物') and object like '%$keywrod%' order by good_time desc");
	   					@$sql_num=mysql_num_rows($sql);
	   					if($sql_num<=0){
	   						?>
	   						<div class="row">
	   							<div class="col-md-12">
	   								<h4 style="text-align: center;">你要查询的商品不存在</h4>
	   							</div>
	   						</div>
	   						<?php
	   					}else{
	   						?>
	   						<div class="row">
	   							<div class="col-md-12">
	   								<h4 style="text-align: center;">共查询：<?php echo $sql_num ?>件商品</h4>
	   								<table class="table table-hover">
	   									<thead>
	   									<th>商品图片</th>
										<th>商品名称</th>
										<th>商品现价</th>
										<th>商品原价</th>
										<th>商品成本价</th>
										<th>销量</th>
										<th>库存</th>
										<th>总量</th>
										<th>适合对象</th>
										<th>操作</th>
	   									</thead>
	   									<tbody>
	   										<?php
										$pagesize=20;
										if(isset($_GET['page'])){
											$page=$_GET['page'];
										}else{
											$page=1;
										}
									    $number=ceil($sql_num/$pagesize);
									    $ps=($page-1)*$pagesize;
									    $SQL=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='绿色植物') and object like '%$keywrod%' order by good_time desc limit $ps,$pagesize");
										?>
										<?php
											include("admin_select_goods4_1.php");
											?>
	   						<?php
	   					}
	   				}else if($sel=='枝数'){
	   					$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='绿色植物') and flower_num='$keywrod' order by good_time desc");
	   					@$sql_num=mysql_num_rows($sql);
	   					if($sql_num<=0){
	   						?>
	   						<div class="row">
	   							<div class="col-md-12">
	   								<h4 style="text-align: center;">你要查询的商品不存在</h4>
	   							</div>
	   						</div>
	   						<?php
	   					}else{
	   						?>
	   						<div class="row">
	   							<div class="col-md-12">
	   								<h4 style="text-align: center;">共查询：<?php echo $sql_num ?>件商品</h4>
	   								<table class="table table-hover">
	   									<thead>
	   									<th>商品图片</th>
										<th>商品名称</th>
										<th>商品现价</th>
										<th>商品原价</th>
										<th>商品成本价</th>
										<th>销量</th>
										<th>库存</th>
										<th>总量</th>
										<th>适合对象</th>
										<th>操作</th>
	   									</thead>
	   									<tbody>
	   										<?php
										$pagesize=20;
										if(isset($_GET['page'])){
											$page=$_GET['page'];
										}else{
											$page=1;
										}
									    $number=ceil($sql_num/$pagesize);
									    $ps=($page-1)*$pagesize;
									    $SQL=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='绿色植物') and flower_num='$keywrod' order by good_time desc limit $ps,$pagesize");
										?>
										<?php
											include("admin_select_goods4_1.php");
											?>
	   						<?php
	   					}
	   				}else if($sel=='花材'){
	   					$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='绿色植物') and material like'%$keywrod%' order by good_time desc");
	   					@$sql_num=mysql_num_rows($sql);
	   					if($sql_num<=0){
	   						?>
	   						<div class="row">
	   							<div class="col-md-12">
	   								<h4 style="text-align: center;">你要查询的商品不存在</h4>
	   							</div>
	   						</div>
	   						<?php
	   					}else{
	   						?>
	   						<div class="row">
	   							<div class="col-md-12">
	   								<h4 style="text-align: center;">共查询：<?php echo $sql_num ?>件商品</h4>
	   								<table class="table table-hover">
	   									<thead>
	   									<th>商品图片</th>
										<th>商品名称</th>
										<th>商品现价</th>
										<th>商品原价</th>
										<th>商品成本价</th>
										<th>销量</th>
										<th>库存</th>
										<th>总量</th>
										<th>适合对象</th>
										<th>操作</th>
	   									</thead>
	   									<tbody>
	   										<?php
										$pagesize=20;
										if(isset($_GET['page'])){
											$page=$_GET['page'];
										}else{
											$page=1;
										}
									    $number=ceil($sql_num/$pagesize);
									    $ps=($page-1)*$pagesize;
									    $SQL=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='绿色植物') and material like'%$keywrod%' order by good_time desc limit $ps,$pagesize");
										?>
										<?php
											include("admin_select_goods4_1.php");
											?>
	   						<?php
	   					}
	   				}else if($sel=='用途'){
	   					$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='绿色植物') and good_use like'%$keywrod%' order by good_time desc");
	   					@$sql_num=mysql_num_rows($sql);
	   					if($sql_num<=0){
	   						?>
	   						<div class="row">
	   							<div class="col-md-12">
	   								<h4 style="text-align: center;">你要查询的商品不存在</h4>
	   							</div>
	   						</div>
	   						<?php
	   					}else{
	   						?>
	   						<div class="row">
	   							<div class="col-md-12">
	   								<h4 style="text-align: center;">共查询：<?php echo $sql_num ?>件商品</h4>
	   								<table class="table table-hover">
	   									<thead>
	   									<th>商品图片</th>
										<th>商品名称</th>
										<th>商品现价</th>
										<th>商品原价</th>
										<th>商品成本价</th>
										<th>销量</th>
										<th>库存</th>
										<th>总量</th>
										<th>适合对象</th>
										<th>操作</th>
	   									</thead>
	   									<tbody>
	   										<?php
										$pagesize=20;
										if(isset($_GET['page'])){
											$page=$_GET['page'];
										}else{
											$page=1;
										}
									    $number=ceil($sql_num/$pagesize);
									    $ps=($page-1)*$pagesize;
									    $SQL=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='绿色植物') and good_use like'%$keywrod%' order by good_time desc limit $ps,$pagesize");
										?>
										<?php
											include("admin_select_goods4_1.php");
											?>
	   						<?php
	   					}
	   				}else{
	   					echo "<script>alert('对不起，系统出错了，请稍后再试');history.go(-1);</script>";
	   				}
	   				
	   				?>
	   		</div>
	   	</div>
</div>
	<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>