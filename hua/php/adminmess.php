<meta charset="utf-8" />
<?php
	session_start();
	include_once("../conn/dataconnection.php");
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
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
$admin_id=$_SESSION['admin_id'];
$sql=mysql_query("select * from admin where admin_id='$admin_id'");
@$num=mysql_num_rows($sql);
if($num<=0){
	echo "暂无个人信息";
}else{
	$admin=mysql_fetch_array($sql);
	?>
	<div id="aa" style="margin-left: 500px;margin-top: 100px;">
		<table border="1" style="width: 50%;">
			<tr>
				<td colspan="2" align="center">个人资料</td>
			</tr>
			<tr>
				<td>编号</td>
				<td><?php echo $admin['admin_id']; ?></td>
			</tr>
			<tr>
				<td>姓名</td>
				<td><?php echo $admin['admin_name']; ?></td>
			</tr>
			<tr>
				<td>地址</td>
				<td><?php echo $admin['admin_addr']; ?></td>
			</tr>
			<tr>
				<td>手机号码</td>
				<td><?php echo $admin['admin_tel']; ?></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><a href="updateadmin.php?admin_id=<?php echo $admin['admin_id'] ?>"><input type="button" value="修改" style="border: 0;color: white;width: 100px;height: 30px;background-color: blue;font-size: 20px;"></a></td>
			</tr>
		</table>
	</div>
	<?php
}
		?>
</div>	
		
		
	</div>	
	</div>
	<div style="width: 100%;height: 10%;padding-top: 20px;"><h2>版权所有</h2></div>
<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>
	<script type="text/javascript">
		function checkuser(){
			
		}
	</script>