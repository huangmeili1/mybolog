<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>回复留言</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../utf8-php/ueditor.config.js"></script>
<script type="text/javascript" src="../utf8-php/ueditor.all.min.js"></script>
<script type="text/javascript" src="../utf8-php/lang/zh-cn/zh-cn.js"></script>
<style>
	body{
		margin-top: 70px;
	}
</style>
<?php
	session_start();
	include("../conn/dataconnection.php");
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		@$ly_id=$_GET['ly_id'];
		$sql=mysql_query("select * from ly where ly_id='$ly_id'");
		$ly=mysql_fetch_array($sql);
		?>
		<div class="container" style="width: 100%;">
			<?php
				include("m_top.php");
				?>
				<div class="row">
					<div class="col-md-12">
						<h4 style="text-align: center;">对留言<span style="color: cadetblue;"><a style="text-decoration: none;" href="person_see_ly.php?ly_id=<?php echo $ly['ly_id'] ?>"><?php echo $ly['title'] ?></a></span>的回复</h4>
						<div style="width: 60%;margin: 0 auto;">
							<p style="font-size: 24px;">回复内容:</p>
							<form method="post">
									<div class="form-group" style="height: 400px;">
									    <div class="col-sm-10" style="margin: 0 auto;padding: 0;">
									    	<textarea nowrap="content" id="content" name="content"></textarea>
									    </div>
									  </div>
							<input name="tj" value="回复" type="submit" class="btn btn-danger btn-lg">
							</form>
						</div>
						
					</div>
				</div>
				<?php
					if(isset($_POST['tj'])){
						@$content=$_POST['content'];
						if($content==''){
							echo "<script>alert('回复内容不能为空');</script>";
						}else{
						@$data=date("Y-m-d");
						$insert=mysql_query("insert into getly(ly_id,content,re_time) values('$ly_id','$content','$data')");
						@$insert_num=mysql_affected_rows();
						if($insert_num>0){
							echo "<script>alert('回复成功');window.location.href='ly_list.php';</script>";
						}else{
							echo "<script>alert('回复失败，请稍后再试');window.location.href='ly_list.php';</script>";
						}
						}
						
					}
					?>
		</div>
		<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>
	<script type="text/javascript">
		UE.getEditor('content',{initialFrameWidth:900,initialFrameHeight:300})
	</script>
