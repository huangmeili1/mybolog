<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>查看留言</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
	session_start();
	if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
		include("../conn/dataconnection.php");
		$ly_id=$_GET['ly_id'];
		$sql=mysql_query("select * from ly where ly_id='$ly_id'");
		$ly=mysql_fetch_array($sql);
?>
<div class="container" style="width: 100%;">
	<?php include("top.php"); ?>
	<div class="row" style="width: 90%;margin: 0 auto;">
		<div class="col-md-12" style="padding: 0;margin: 0;background-color: white;">
			<ol class="breadcrumb" style="background-color: white;">
			    <li><a href="index.php">首页</a></li>
			    <li><a href="personcenter.php">个人中心</a></li>
			    <li class="active">查看留言</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			
				<div style="width: 70%;margin: 0 auto;text-align: left;">
					<h4 style="text-align: center;"><?php echo $ly['title']; ?>
						<small>留言时间:<?php echo $ly['ly_time']; ?></small>
					</h4>
					<?php echo $ly['content']; ?>
					<p>
						<b>客服回复：</b><br>
							
							<?php
								@$get=mysql_query("select * from getly where ly_id='$ly_id'");
								@$get_num=mysql_num_rows($get);
								if($get_num<=0){
									echo "暂无回复";
								}else{
									@$g=mysql_fetch_array($get);
									?>
									<small>回复时间：<?php echo $g['re_time']; ?></small>
									<?php echo $g['content']; ?>
									<?php
								}
								?>
					</p>
				</div>
		</div>
	</div>
	<?php
		include("footer.php");
		?>
</div>
<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='login.php';</script>";}  ?>
	<script type="text/javascript" src="../js/index.js"></script>