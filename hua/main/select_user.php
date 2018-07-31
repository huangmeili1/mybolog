<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>查找用户</title>
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
		@$keyword=$_GET['keyword'];
		@$sel=$_GET['sel'];
		if(@$sel=='用户编号'){
			@$sql=mysql_query("select * from user where user_id='$keyword'");
		}else if(@$sel=='用户昵称'){
			@$sql=mysql_query("select * from user where user_name like '%$keyword%'");
		}else if(@$sel=='用户真实姓名'){
			@$sql=mysql_query("select * from user where realname like '%$keyword%'");
		}else if(@$sel=='用户手机号码'){
			@$sql=mysql_query("select * from user where user_tel='$keyword'");
		}else{
			echo "<script>alert('系统出错了，请稍后再试');history.go(-1);</script>";
		}
		
		?>
		<div class="container" style="width: 100%;">
			<?php  include("m_top.php"); ?>
		<?php
		@$sql_num=mysql_num_rows($sql);
		if(@$sql_num<=0){
			?>
			<div class="row">
				<div class="col-md-12" style="text-align: center;font-size: 24px;">
					查无此<?php echo $sel; ?>:<?php echo $keyword; ?>
				</div>
			</div>
			<?php
		}else{
			?>
			<div class="row" style="margin-top: 80px;">
				<div class="col-md-12" style="text-align: center;font-size: 24px;">查找结果</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-hover">
										<thead>
											<tr>
												<th>用户编号</th>
												<th>用户昵称</th>
												<th>用户真实姓名</th>
												<th>性别</th>
												<th>手机号码</th>
												<th>邮箱</th>
												<th>注册时间</th>
												<th>操作</th>
											</tr>
										</thead>
										<tbody>
											<?php
											    while($user_n=mysql_fetch_array($sql)){
											    	?>
											    	<tr>
											    		<td><?php echo $user_n['user_id']; ?></td>
											    		<td><?php echo $user_n['user_name']; ?></td>
											    		<td><?php echo $user_n['realname']; ?></td>
											    		<td><?php echo $user_n['sex']; ?></td>
											    		<td><?php echo $user_n['user_tel']; ?></td>
											    		<td><?php echo $user_n['email']; ?></td>
											    		<td><?php echo $user_n['user_time']; ?></td>
											    		<td>
											    			<a href="amdin_see_user_all.php?user_id=<?php echo $user_n['user_id']; ?>" class="btn btn-default">查看更多</a>
											    			<button onclick="del_user(<?php echo $user_n['user_id']; ?>)" class="btn btn-default">删除</button>
											    		</td>
											    	</tr>
											    	<?php
											    }
												?>
										</tbody>
									</table>
				</div>
			</div>
			<?php
		}
		?>
		</div>
		
		
			<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>
	<script type="text/javascript">
		function del_user(user_id){
	var y=confirm('确定要删除该用户，此用户的所有信息都会被清空？是否是删除？');
	if(y){
	var url="del_user.php";
	var data={"user_id":user_id};
	var success=function(response){
		if(response.errno==0){
			alert("该用户还有订单未签收，不能删除");
		}else if(response.errno==2){
			alert("删除成功2");
			location.reload();
		}else{
			alert("删除成功");
			location.reload();
		}
	}
	$.post(url,data,success,"json");
	}
	
}

	</script>