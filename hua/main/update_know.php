<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>公告修改</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../utf8-php/ueditor.config.js"></script>
<script type="text/javascript" src="../utf8-php/ueditor.all.min.js"></script>
<script type="text/javascript" src="../utf8-php/lang/zh-cn/zh-cn.js"></script>
<?php
	session_start();
	include("../conn/dataconnection.php");
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		$hua_id=$_GET['hua_id'];
		$sql=mysql_query("select * from know where hua_id='$hua_id'");
		@$num=mysql_num_rows($sql);
		if($num<=0){
			echo "<script>alert('对不起，系统出错了');history.go(-1);</script>";
		}else{
			$know=mysql_fetch_array($sql);
			?>
				<div class="container" style="width: 100%;">
					<div class="row">
						<div class="col-md-12" style="background-color: black;height: 100px;color: white;">
							<h2><a style="color: white;text-decoration: none;" href="managecenter.php">管理中心</a></h2>
							<h4 style="margin-left: 700px;">当前用户:<?php echo @$_SESSION['admin_name']; ?></h4>
						</div>
					</div>
						<div class="row">
							<div class="col-md-12" style="margin: 0 auto;text-align: center;">
								<h1 style="text-shadow:5px 5px 5px gray;">修改公告</h1>
								<hr size="5" color="gray" />
								<div style="width: 90%;margin: 0 auto;background-color: gainsboro;margin-bottom: 200px;">
									<form class="form-horizontal" role="form" method="post" action="" style="margin-bottom: 200px;">
										<div class="form-group">
											<label for="firstname" class="col-sm-2 control-label">公告标题</label>
											<div class="col-sm-10">
												<input style="width: 900px;" type="text" required="required" value="<?php echo @$know['hua_title'] ?>" class="form-control" id="hua_title" name="hua_title" 
													   placeholder="请输入公告标题">
											</div>
										</div>
										<div class="form-group">
											<label for="firstname" class="col-sm-2 control-label">公告内容</label>
											<div class="col-sm-10">
												<textarea nowrap="content" id="content" name="content" required="required" placeholder="请填写公告内容">
													<?php echo @$know['hua_content']; ?>
												</textarea>
											</div>
										</div>
										<div class="form-group">
											<label for="firstname" class="col-sm-2 control-label">公告类型</label>
											<div class="col-sm-10">
												<?php
													$ss=mysql_query("select * from know_type");
													@$snum=mysql_num_rows($ss);
													if($snum<=0){
														?>
														<span>暂无公告类型</span>
														
														<?php
													}else{
														$know_id=$know['kown_id'];
														while($type=mysql_fetch_array($ss)){
															if($type['know_id']==$know_id){
																?>
																<input checked="checked" name="type" type="radio" value="<?php echo $type['know_id'] ?>" /><?php echo $type['know_name']; ?>&nbsp;&nbsp;&nbsp;&nbsp;
																<?php
															}else{
																?>
																<input name="type" type="radio" value="<?php echo $type['know_id'] ?>" /><?php echo $type['know_name']; ?>&nbsp;&nbsp;&nbsp;&nbsp;
																<?php
															}
															?>
															<?php
														}
													}
													?>
											</div>
										</div>
										<div class="form-group">
											<label for="firstname" class="col-sm-2 control-label">是否推荐</label>
											<div class="col-sm-10">
												<?php
													$if_letknow=$know['if_letknow'];
													if($if_letknow=='推荐'){
														?>
														<input name="if_letknow" type="radio" checked="checked" value="<?php echo $if_letknow ?>" /><?php echo $if_letknow ?>
														<input name="if_letknow" type="radio" value="不推荐" />不推荐
														<?php
													}else{
														?>
														<input name="if_letknow" type="radio" checked="checked" value="<?php echo $if_letknow ?>" /><?php echo $if_letknow ?>
														<input name="if_letknow" type="radio" value="推荐" />推荐
														<?php
													}
													?>
											</div>
										</div>
										<div class="form-group" >
											<div class="col-sm-10" style="margin-bottom: 100px;">
												<button name="tj" style="margin-left: 200px;" type="submit" class="btn btn-danger btn-lg">确认更新</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						
						<?php  
							if(isset($_POST['tj'])){
								@$hua_title=$_POST['hua_title'];
								@$content=$_POST['content'];
								@$type=$_POST['type'];
								@$if_letknow=$_POST['if_letknow'];
								$update=mysql_query("update know set hua_title='$hua_title',hua_content='$content',kown_id='$type',if_letknow='$if_letknow' where hua_id='$hua_id'");
								@$unum=mysql_affected_rows();
								if(@$unum>=0){
									echo "<script>alert('更新成功');window.location.href='article.php?hua_id=$hua_id';</script>";
								}else{
									echo "<script>alert('你没有做任何修改');</script>";
								}
							}
							?>
						
				</div>
			<?php
		}
		?>
<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>
	

<script type="text/javascript">
	UE.getEditor('content',{initialFrameWidth:900,initialFrameHeight:200})
</script>