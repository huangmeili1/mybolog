<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>添加商品的其他图片</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	body{margin-top: 70px;
	     overflow-x: hidden;
	}
</style>
<?php
	session_start();
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		$good_id=$_GET['good_id'];
		?>
		<div style="margin: 0 auto;text-align: center;width: 100%;height: 100%;">
			<?php
		include("m_top.php");
			?>
		<div id="sum" style="margin: 0 auto;text-align: center;margin-left: 10px;">
		<form name="a1" action="" method="post" enctype="multipart/form-data" onsubmit="return checkform()">
			你想添加几张图片:<input type="text" name="tt"/>
			<input name="tj" type="submit" value="提交" />
		</form>
		</div>
		<?php
			if(isset($_POST['tj'])){
				$key=$_POST['tt'];
				?>
				<div id="oo">
					<h3>(必须是jpge或png或jpg格式的图片)</h3>
					<form name="form1" method="post" action="addotherimg_ok.php?good_id=<?php echo $good_id ?>" enctype="multipart/form-data" onsubmit="return formchk2()">
						<?php
							for($i=1;$i<=$key;$i++){
								?>
								
								图片<?php echo $i ?>:&nbsp;&nbsp;&nbsp;<input style="margin-left: 650px;" type="file" name="img[]"><br>
								<?php
							}
							?>
							<input name="tijie" style="font-size: 20px;color: white;border: 0;background-color: #0088CC;width: 100px;height: 35px;margin-top: 10px;" type="submit" value="提交">
					</form>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>
	<script type="text/javascript">
	   			function checkform(){
		if(a1.tt.value==''){
			alert('不能为空');
			return false;
		}
		}
	   		</script>
	   		<script  type="text/javascript" language="javascript">
	function formchk2(){
    var inputs=form1.getElementsByTagName('input');
    for(i=0;i<inputs.length;i++){
        if(inputs[i].value==''){
            inputs[i].focus();
            return false;
        }
    }
 
    return true;
}
</script>