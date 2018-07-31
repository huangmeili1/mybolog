<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>个人中心</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
	session_start();
	if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
		include("../conn/dataconnection.php");
		@$user_id=$_SESSION['user_id'];
		$book_id=$_GET['book_id'];
		$sql=mysql_query("select * from order_detail where book_id='$book_id'");
		@$num=mysql_num_rows($sql);
		if(@$num<=0){
			echo "<script>alert('系统出错了，请稍后再试');history.go(-1);</script>";
		}else{
			?>
				<div class="container" style="width: 100%;">
					<?php include("top.php"); ?>
						<div class="row" style="width: 90%;margin: 0 auto;">
							<div class="col-md-12" style="padding: 0;margin: 0;background-color: white;">
								<ol class="breadcrumb" style="background-color: white;">
								    <li><a href="index.php">首页</a></li>
								    <li><a href="flower.php">鲜花</a></li>
								    <li class="active">个人中心</li>
								</ol>
							</div>
						</div>
						<div class="row" style="width: 90%;margin: 0 auto;margin-bottom: 100px;">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3" style="height: auto;border: 1px;background: white;margin-bottom: 100px;">
										
										<?php include("personleft.php"); ?>
										
									</div>
									<div class="col-md-9">
										<div class="panel panel-default">
										    <div class="panel-heading">
										        评价商品
										    </div>
										    <div class="panel-body">
										     <table class="table table-hover">
										     	<tr>
										     		<th>商品名称</th>
										     		<th>价格</th>
										     		<th>数量</th>
										     		<th>操作</th>
										     	</tr>
										     	<tbody>
										     		<?php
										     			while($b=mysql_fetch_array($sql)){
										     				$good_id=$b['good_id'];
										     				@$s=mysql_query("select * from goods where good_id='$good_id'");
										     				@$good=mysql_fetch_array($s);
										     				?>
										     				<tr>
										     					<td>
										     						<div class="thumbnail" style="width: 150px;">
										     							<img src="<?php echo $good['main_img']; ?>" />
										     						</div>
										     					</td>
										     					<td style="line-height: 150px;">
										     						<?php echo $good['good_name']; ?>
										     					</td>
										     					<td style="line-height: 150px;">￥<?php echo $good['good_price']; ?></td>
										     					<td style="line-height: 150px;">
										     						<?php
										     							$c=mysql_query("select * from comments where good_id='$good_id' and book_id='$book_id'");
										     							@$c_num=mysql_num_rows($c);
										     							@$c_n=mysql_fetch_array($c);
										     							if($c_num>0){
										     								?>
										     								<a style="text-decoration: none;" href="see_content.php?content_id=<?php echo $good_id; ?>&content_id=<?php echo $c_n['commet_id'] ?>">查看评价</a>
										     								<?php
										     							}else{
										     								?>
										     								<a style="text-decoration: none;" href="add_content.php?good_id=<?php echo $good_id; ?>&book_id=<?php echo $book_id; ?>">评价</a>
										     								<?php
										     							}
										     							?>
										     					</td>
										     				</tr>
										     				<?php
										     			}
										     			?>
										     	</tbody>
										     </table>
										    </div>
										</div>
									</div>
								</div>
							</div>
						</div>
				</div>
			<?php
		}
		?>
<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='login.php';</script>";}  ?>
<script type="text/javascript" src="../js/index.js"></script>