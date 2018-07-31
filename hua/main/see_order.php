<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>查看订单</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
	header('Content-type: text/html; charset=utf-8');
	session_start();
	if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
		@$type=$_GET['type'];
?>
<div class="container" style="width: 100%;">
		<?php include("top.php"); ?>
		<div class="row" style="width: 90%;margin: 0 auto;">
			<div class="col-md-12" style="padding: 0;margin: 0;background-color: white;">
				<ol class="breadcrumb" style="background-color: white;">
				    <li><a href="index.php">首页</a></li>
				    <li><a href="personcenter.php">个人中心</a></li>
				    <li class="active">查看订单</li>
				</ol>
			</div>
		</div>
		<div class="row" style="width: 90%;margin: 0 auto;margin-bottom: 100px;">
			<div class="col-md-12" style="background-color: white;">
				<div class="row">
					<div class="col-md-3" style="height: auto;border: 1px;background: white;margin-bottom: 100px;">
						<?php include("personleft.php"); ?>
					</div>
					<div class="col-md-9">
						<div class="panel panel-default">
						    <div class="panel-heading">
						    	<b>
						    	<?php
						       	echo @$type;
						       	?>
						    	</b>
						       	订单
						    </div>
							<?php
							include("../conn/dataconnection.php");
							@$user_id=$_SESSION['user_id'];
							$sql=mysql_query("select * from book where user_id='$user_id' and state='$type'");
							$num=mysql_num_rows($sql);
							if($num<=0){
								?>
								<span style="margin-left: 200px;">你还没有任何待评价的订单，快去<a class="btn btn-danger" href="person_order.php">查看其他订单</a>吧</span>
								<?php
							}else{
								?>
						    <div class="panel-body">
						       <table class="table table-hover">
						       	<thead>
						       		<tr>
						       			<th>订单编号</th>
						       			<th>商品名称和购买数量</th>
						       			<th>小计</th>
						       			<th>操作</th>
						       		</tr>
						       	</thead>
						       	<tbody>
						       		<?php
									while($book=mysql_fetch_array($sql)){
										?>
										<tr>
							       			<td><?php echo $book['book_id']; ?></td>
							       			<td>
							       				<table>
							       				<?php
												$id=$book['book_id'];
												$ssql=mysql_query("select * from order_detail where book_id='$id'");
												while(@$de=mysql_fetch_array($ssql)){
													?>
													<tr>
														<td>
															<?php
																$good=$de['good_id'];
																$bk=mysql_query("select * from goods where good_id='$good'");
																@$bd=mysql_fetch_array($bk);
																?>
															<?php
																$str=$bd['good_name'];
																$pa = '/[\x{4e00}-\x{9fa5}]/siu';
																preg_match_all($pa, $str, $r);
																$count = count($r[0]);
																if($count>4){
																	echo mb_substr($str,0,4,'utf-8')."...";
																}else{
																	echo $str;
																}
															 ?>
														</td>
														<td align="center" width="60"><?php echo $de['num'] ?></td>
													</tr>
													<?php
												}
												?>
							       				</table>
							       			</td>
							       			<td>￥<?php echo $book['sum_price']; ?></td>
							       			<td>
							       				<a href="see_order_detail.php?book_id=<?php echo $book['book_id']; ?>">
							       					查看订单
							       				</a>
							       				<?php
							       					if(@$type=='待付款'){
							       						?>
							       						<a href="get_money.php">付款</a>
							       						<a href="get_money.php">删除订单</a>
							       						<?php
							       					}
							       					?>
							       				<?php
							       					if(@$type=='待评价'){
							       						?>
							       						<a href="good_content.php?book_id=<?php echo $book['book_id']; ?>">评价</a>
							       						<?php
							       					}
							       					?>
							       					<?php
							       						if(@$type=='待收货'){
							       							?>
							       							<a class="btn btn-success" onclick="confrim_get_good(<?php echo $book['book_id']; ?>)">确认收货</a>
							       							<?php
							       						}
							       						?>
							       						<?php
							       							if(@$type=='已评价'){
							       								
							       								?>
							       								<a class="btn btn-success" href="see_all_content.php?book_id=<?php echo $book['book_id']; ?>">查看评价</a>
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
	<?php
//	while($book=mysql_fetch_array($sql)){
//		$id=$book['book_id'];
//		$ssql=mysql_query("select * from order_detail where book_id='$id'");
//	}
	
	}
		?>
</div>	
<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='login.php';</script>";}  ?>
<script type="text/javascript" src="../js/index.js"></script>
<script type="text/javascript">
	function confrim_get_good(book_id){
		var url="confrim_get_good.php";
		var data={"book_id":book_id};
		var success=function(response){
			if(response.errno==0){
				alert("确认收货成功");
				location.reload();
			}else if(response.errno==1){
				alert("确认收货成功");
				location.reload();
			}else if(response.errno==2){
				alert("确认收货失败，请稍后再试");
				location.reload();
			}else{
				alert("确认收货失败，请稍后再试");
			}
		}
		$.post(url,data,success,"json");
	}
</script>