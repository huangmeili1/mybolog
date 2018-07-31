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
		<form method="post" enctype="multipart/form-data">
			<table align="center" style="margin-top: 150px;margin-left: 340px;">
				<tr>
					<td colspan="2" align="center" style="font-size: 26px;">添加付款方式</td>
				</tr>
				<tr>
					<td>付款方式名称：</td>
					<td><input type="text" name="name" value="<?php echo @$_POST['name'] ?>" size="50" style="height: 35px;"></td>
				</tr>
				<tr>
					<td>付款类型：</td>
					<td><input type="text" name="ty" value="<?php echo @$_POST['ty'] ?>" size="50" style="height: 35px;"></td>
				</tr>
				<tr>
					<td>付款方式帐号：</td>
					<td><input type="text" name="no" value="<?php echo @$_POST['no'] ?>" size="50" style="height: 35px;"></td>
				</tr>
				<tr>
					<td>开户人：</td>
					<td><input type="text" name="user" value="<?php echo @$_POST['user'] ?>" size="50" style="height: 35px;"></td>
				</tr>
				<tr>
					<td>付款方式图片:</td>
					<td><input type="file" name="img"></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input type="submit" value="提交" name="tj" style="width: 90px;height: 35px;color: white;font-size: 24px;background-color: red;border: 0;border-radius: 10px;">
					</td>
				</tr>
			</table>
		</form>
		<?php
	if(isset($_POST['tj'])){
		$name=$_POST['name'];
		$img=$_FILES["img"]["name"];
		$no=$_POST['no'];
		$ty=$_POST['ty'];
		$user=$_POST['user'];
		$d=date('Ymdhis').rand(0,999);
		$aa=explode(".", $img);
		$type=$aa[1];
		if(($type=='jpeg'||$type=='png'||$type='jpg'||$type=='gif'||$type=='bmp')||($type=='JPEG'||$type=='PNG'||$type=='JPG'||$type=='GIF'||$type=='BMP')){
			$image=$d.'.'.$type;
			move_uploaded_file($_FILES['img']["tmp_name"],"../money/".$image);
			$im="../money/".$image;
			$sql=mysql_query("insert into getmoney(get_money,get_img,get_mo,get_type,get_user) values('$name','$im','$no','$ty','$user')");
			@$num=mysql_affected_array();
			if($num<=0){
				echo "<script>alert('对不起，系统出错了，请稍后再试');</script>";
			}else{
				echo "<script>alert('添加成功');</script>";
			}
		}else{
			echo "<script>alet('图片格式不正确，请重新选择');</script>";
		}
	}
	?>
	</div>	
	</div>
	<div style="width: 100%;height: 10%;padding-top: 20px;"><h2>版权所有</h2></div>
	
</div>
<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>