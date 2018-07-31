<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>管理中心-我的信息</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
	session_start();
	include_once("../conn/dataconnection.php");
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		@$admin_id=$_SESSION['admin_id'];
		@$sql=mysql_query("select * from admin where admin_id='$admin_id'");
		@$sql_num=mysql_num_rows($sql);
		?>
<div style="margin: 0 auto;text-align: center;width: 100%;height: 100%;">
	<?php
		include("top1.php");
		?>
	<div id="aa" style="margin: 0 auto;text-align: center;width: 100%;height: 80%;">
	<div style="margin: 0 auto;text-align: center;float: left;width: 15%;height: 100%;">
		<?php  
			include("left.php");
			?>
	</div>
	<div id="aa" style="margin: 0 auto;text-align: center;height: 100%;width: 85%;float: right;">
		<?php
			if($sql_num<=0){
			?>
			<h4 style="text-align: center;">暂时无法查看，请稍后再试</h4>
			<?php
		}else{
			@$admin=mysql_fetch_array($sql);
			?>
			<div class="row" id="show_mess_s" style="display: block;">
				<div class="col-md-12">
					<table class="table" style="width: 50%;margin: 0 auto;">
						<caption style="text-align: center;font-size: 24px;">我的信息</caption>
						<tr>
							<td>我的编号</td>
							<td><?php echo $admin['admin_id']; ?></td>
						</tr>
						<tr>
							<td>我的姓名</td>
							<td><?php echo $admin['admin_name'] ?></td>
						</tr>
						<tr>
							<td>我的电话号码</td>
							<td><?php echo $admin['admin_tel'] ?></td>
						</tr>
						<tr>
							<td>我的地址</td>
							<td><?php echo $admin['admin_addr'] ?></td>
						</tr>
						<tr>
							<td>我的地位</td>
							<td><?php echo $admin['admin_type']; ?></td>
						</tr>
						<tr>
							<td colspan="2"><a style="text-decoration: none;color: white;" href="update_admin_mess.php" type="button" class="btn btn-danger">修改</a></td>
						</tr>
					</table>
				</div>
			</div>
			<?php
		}
			?>
	</div>	
	</div>
	<div style="width: 100%;height: 10%;padding-top: 20px;"><h2>版权所有</h2></div>
	
</div>
<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>
	<script type="text/javascript">
	function open(){
		alert("你好");
//		var show_mess=document.getElementById("show_mess_s");
//		var update=document.getElementById("update");
//		show_mess.style.display='none';
//		update.style.display='block';
	}
	
	
	
$(function (){
	setInterval("getTime()",1000);
});
	function getTime(){
		var data=new Date();
		var mydate=data.toLocaleDateString();//2018/4/27
		var hours=data.getHours();
		var minutes=data.getMinutes();
		var seconds=data.getSeconds();
		$("#timeShow").html(mydate+" "+hours+":"+minutes+":"+seconds);
	}
</script>