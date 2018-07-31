<meta charset="utf-8" />
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
	include_once("../conn/dataconnection.php");
	@$know_id=$_GET['kown_id'];
	@$know_name=$_GET['know_name'];
	$sql=mysql_query("select * from know where kown_id='$know_id'");
	@$num=mysql_num_rows($sql);
	?>
	<title><?php echo $know_name; ?></title>
<div class="container" style="width: 100%;">
	<?php include("top.php"); ?>
		<div class="row" style="width: 90%;margin: 0 auto;">
			<div class="col-md-12" style="background-color: white;">
				<ol class="breadcrumb" style="background-color: transparent;margin-bottom: 0;">
				    <li><a href="index.php">首页</a></li>
				    <li><a href="all_hua.php">花语大全</a></li>
				    <li class="active"><?php echo $know_name ?></li>
				</ol>
			</div>
		</div>
			<div class="row" style="width: 80%;margin: 0 auto;">
				<div class="col-md-9">
			<?php
			if($num<=0){
				
			}else{
				?>
				<div class="row">
					<div class="col-md-12" style="background-color: white;">
					<div class="panel panel-default">
						<div class="panel-heading">
							<?php echo $know_name; ?>
						</div>
						<div class="panel-body">
							<ul class="list-group">
								<?php
									while($hua=mysql_fetch_array($sql)){
										?>
										<li class="list-group-item"><a href="see_hua.php?hua_id=<?php echo $hua['hua_id'] ?>"><?php echo $hua['hua_title'] ?></a></li>
										<?php
									}
									?>
							</ul>
						</div>
					</div>
				</div>
				</div>
				</div>
					<?php
			}
			?>
				<div class="col-md-3" style="background-color: white;">
					<div style="width: 75%;background-color: gainsboro;margin: 0 auto;">
							<div style="background: url(../img/lu.jpg);background-size: cover;width: 100%;height: 30px;"><span style="line-height: 30px;">相关分类</span></div>
							<?php  
								$type=mysql_query("select * from know_type");
								@$aa=mysql_num_rows($type);
								if($aa<=0){
									?>
									<span>暂无分类</span>
									<?php
								}else{
									?>
									<ul id="type" style="line-height: 50px;">
										<?php  
											while($kn=mysql_fetch_array($type)){
												?>
												<li style="width: 100%;"><a href="see_type.php?know_id=<?php echo $kn['know_id'] ?>"><?php echo $kn['know_name']; ?></a></li>
												<?php
											}
											?>
									</ul>
									<?php
								}
								?>
						</div>
				</div>
				
			</div>
	<?php include("footer.php") ?>
</div>
<?php
	
	?>