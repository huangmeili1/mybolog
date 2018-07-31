<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>查看留言</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../utf8-php/ueditor.config.js"></script>
<script type="text/javascript" src="../utf8-php/ueditor.all.min.js"></script>
<script type="text/javascript" src="../utf8-php/lang/zh-cn/zh-cn.js"></script>
<style>
	body{
		margin-top: 50px;
	}
</style>
<?php
	session_start();
	include("../conn/dataconnection.php");
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		?>
		<div class="container" style="width: 100%;">
			<?php
				include("m_top.php");
				?>
				<div class="row">
					<div class="col-md-12">
						<h3 style="text-align: center;">查看留言</h3>
						<?php
							@$ly_id=$_GET['ly_id'];
							@$sql=mysql_query("select * from ly where ly_id='$ly_id'");
							@$sql_n=mysql_fetch_array($sql);
							?>
							<h4 style="text-align: center;"><?php echo $sql_n['title']; ?><small style="margin-left: 20px;">留言时间:<?php echo $sql_n['ly_time'];  ?></small></h4>
							<div style="width: 70%;margin: 0 auto;">
								<?php echo $sql_n['content']; ?>
							</div>
							<?php
								@$get=mysql_query("select * from getly where ly_id='$ly_id'");
								@$get_num=mysql_num_rows($get);
								if(@$get_num<=0){
									
									?>
									<div class="row" style="width: 70%;margin: 0 auto;">
										<div class="col-md-12">
											<button onclick="open_re_ly()" class="btn btn-danger">回复</button>
											<div id="re_ly" style="display: none;">
												<p style="font-size: 24px;">回复内容:</p>
												<form method="post">
														<div class="form-group" style="height: 400px;">
														    <div class="col-sm-10" style="margin: 0 auto;padding: 0;">
														    	<textarea nowrap="content" id="content" name="content"></textarea>
														    </div>
														  </div>
												<input name="tj" value="回复" type="submit" class="btn btn-danger btn-lg">
												</form>
														<?php
														if(isset($_POST['tj'])){
															@$content=$_POST['content'];
															@$data=date("Y-m-d");
															$insert=mysql_query("insert into getly(ly_id,content,re_time) values('$ly_id','$content','$data')");
															@$insert_num=mysql_affected_rows();
															if($insert_num>0){
																echo "<script>alert('回复成功');window.location.href='ly_list.php';</script>";
															}else{
																echo "<script>alert('回复失败，请稍后再试');window.location.href='ly_list.php';</script>";
															}
														}
														?>
											</div>
										</div>
									</div>
									<?php
								}else{
									@$get_ly=mysql_fetch_array($get);
									?>
									<div class="row" style="width: 70%;margin: 0 auto;">
										<div class="col-md-12" style="">
											<h3>回复:<small>回复时间:<?php echo $get_ly['re_time']; ?></small></h3>
											<p>
												<?php
													echo $get_ly['content'];
													?>
											</p>
										</div>
									</div>
									<?php
									
								}
								?>
					</div>
				</div>
		</div>
			<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>
	<script type="text/javascript">
		UE.getEditor('content',{initialFrameWidth:900,initialFrameHeight:300})
	</script>
	<script type="text/javascript">
		function open_re_ly(){
			var re_ly=document.getElementById("re_ly");
			if(re_ly.style.display=='none'){
				re_ly.style.display='block';
			}else{
				re_ly.style.display='none';
			}
		}
	</script>