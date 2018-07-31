<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>查看评价</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	#rating li{
		background: url(../img/star.png);
		list-style: none;
		padding: 8px;
		height: 31px;
		width: 31px;
		float: left;
	}
</style>
<?php
	function trimall($str){
		$qian=array(" ","　","\t","\n","\r");
		$hou=array("","","","","");
		return str_replace($qian,$hou,$str);
	}
	function getWord($content){
		$str=strip_tags($content);
		$str=trimall($str);
		$str=mb_substr($str,0,90,'utf-8');
		return $str;
	}
	?>
<?php
	session_start();
	if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
		include("../conn/dataconnection.php");
		@$book_id=$_GET['book_id'];
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
						<div class="col-md-12" style="background-color: white;">
							<div class="row">
								<div class="col-md-3" style="height: auto;border: 1px;background: white;margin-bottom: 100px;">
									
									<?php include("personleft.php"); ?>
									
								</div>
								<div class="col-md-9" style="background-color: white;">
									<div class="panel panel-default">
										<div class="panel-heading">
											<b>查看评价</b><span style="margin-left: 80px;">订单号:<?php echo $book_id; ?></span>
										</div>
										<div class="panel-body">
										<?php
										$sql=mysql_query("select * from comments where book_id='$book_id'");
										$sql_num=mysql_num_rows($sql);
										if($sql_num<=0){
											?>
											<div class="row">
												<div class="col-md-12" style="text-align: center;">
													<b>此订单的评价已经被删除了</b>
												</div>
											</div>
											<?php
								//			echo "<script>alert('对不起，系统出错了');</script>";
										}else{
											?>
											<table class="table table-hover">
												<thead>
													<th>商品名称</th>
													<th>评价内容</th>
													<th>评价星级</th>
													<th>操作</th>
												</thead>
												<?php
													while($con=mysql_fetch_array($sql)){
														$good_id=$con['good_id'];
														@$sg=mysql_query("select * from goods where good_id='$good_id'");
														@$go=mysql_fetch_array($sg);
														?>
														<tr>
															<td width="200">
																<div class="thumbnail" style="width: 150px;">
																	<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $good_id; ?>">
																	<img src="<?php echo $go['main_img']; ?>" />
																	<div class="caption" style="text-align: center;">
																		<?php echo $go['good_name']; ?>
																	</div>
																	</a>
																</div>
															</td>
															<td width="200">
																<?php echo getWord($con['content']) ?>
															</td>
															<td>
																<ul style="padding: 80px;" class="rating" id="rating">
																<?php
																	 $xinxin=$con['xinxin']; 
																	 $xin=array('很不好','不好','一般','好','很好');
																	 for($i=0;$i<$xinxin;$i++){
																	 	?>
																	 	<li style="background-position-y: -38px;"  class="rating-item" title="<?php echo $xin[$i]; ?>"></li>
																	 	<?php
																	 }
																	 ?>
																	 <?php
																	 	$le=count($xin);
																	 	for($i=$xinxin;$i<$le;$i++){
																	 		?>
																	 		<li class="rating-item" title="<?php echo $xin[$i] ?>"></li>
																	 		<?php
																	 	}
																	 	?>
																</ul>
															</td>
															<td style="line-height: 200px;">
																<a href="see_content.php?content_id=<?php echo $con['commet_id']; ?>">查看</a>
																<a href="del_content.php?content_id=<?php echo $con['commet_id']; ?>">删除</a>
															</td>
														</tr>
														<?php
													}
													?>
											</table>
			<?php
		}
?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='login.php';</script>";}  ?>
<script type="text/javascript" src="../js/index.js"></script>