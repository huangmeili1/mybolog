<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>修改付款方式</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	body{
		margin-top: 70px;
	}
</style>
<div class="container" style="width: 100%;">
<?php
	session_start();
	include_once("../conn/dataconnection.php");
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		@$money_id=$_GET['money_id'];
		@$sql=mysql_query("select * from getmoney where money_id='$money_id'");
		@$ss=mysql_fetch_array($sql);
		?>
		   <?php  include("m_top.php"); ?>
		   	<div class="row" style="width: 50%;margin: 0 auto;">
		   		<div class="col-md-12">
		   			<h4 style="text-align: center;">修改付款方式</h4>
					<form class="form-horizontal" role="form" enctype="multipart/form-data" method="post">
					  <div class="form-group">
					    <label for="firstname" class="col-sm-2 control-label">付款方式名称</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="name" value="<?php echo $ss['get_money'] ?>" name="name" required="required" placeholder="请输入付款方式名称">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="lastname" class="col-sm-2 control-label">付款类型</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="type" value="<?php echo $ss['get_type'] ?>" name="type" required="required" placeholder="请输入付款类型">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="lastname" class="col-sm-2 control-label">付款帐号</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="mo" value="<?php echo $ss['get_mo'] ?>" required="required" name="mo" placeholder="请输入付款帐号">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="lastname" class="col-sm-2 control-label">开户人</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" value="<?php echo $ss['get_user'] ?>" required="required" id="get_user" name="get_user" placeholder="请输入开户人">
					    </div> 
					  </div>
					  <div class="thumbnail" style="width: 180px;">
						<img style="width: 150px;" src="<?php echo $ss['get_img']; ?>" />
						<input type="file" name="img" />
						<!--<div class="caption">
							<button class="btn btn-danger">修改图片</button>
						</div>-->
					</div>
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" name="tj" class="btn btn-default">修改</button>
					    </div>
					  </div>
					</form>
					<?php
						if(isset($_POST['tj'])){
							@$name=$_POST['name'];
							@$type=$_POST['type'];
							@$mo=$_POST['mo'];
							@$get_user=$_POST['get_user'];
							@$image=$_FILES["img"]["name"];
							if($image==''){
							@$u=mysql_query("update getmoney set get_money='$name',get_mo='$mo',get_type='$type',get_user='$get_user' where money_id='$money_id'");
							@$u_num=mysql_affected_rows();
							if(@$u_num<=0){
								echo "<script>alert('你没有做任何修改');</script>";
							}else{
								echo "<script>alert('修改成功');window.location.href='money_list.php';</script>";
							}
							}else{
								$d=date('Ymdhis').rand(0,999);
								$arr=explode(".", $_FILES["img"]["name"]);
			                    @$img=$d.'.'.$arr[1];
			                    $y=$arr[1];
								if(($y!='jpg'&&$y!='jpge'&&$y!='png')&&($y!='JPG'&&$y!='JPGE'&&$y!='PNG')){
									echo "<script>alert('图片格式不正确，请重新选择');</script>";
								}else{
								move_uploaded_file($_FILES['img']["tmp_name"],"../rederimg/".$img);
								$man_img="../rederimg/".$img;
								@$u=mysql_query("update getmoney set get_img='$man_img',get_money='$name',get_mo='$mo',get_type='$type',get_user='$get_user' where money_id='$money_id'");
								@$u_num=mysql_affected_rows();
								if(@$u_num<=0){
									echo "<script>alert('你没有做任何修改');</script>";
								}else{
									echo "<script>alert('修改成功');window.location.href='money_list.php';</script>";
								}
								}
							}
							
							
						}
						?>
					
		   		</div>
		   	</div>
	<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>