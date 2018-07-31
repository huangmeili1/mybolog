<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>管理员列表</title>
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
		
		?>
		<div class="container" style="width: 100%;">
			<?php include("m_top.php"); ?>
				<div class="row">
					<div class="col-md-12">
						<h4 style="text-align: center;">修改管理员信息</h4>
						<?php
							@$admin_id=$_GET['admin_id'];
							@$sql=mysql_query("select * from admin where admin_id='$admin_id'");
							@$admin=mysql_fetch_array($sql);
							?>
							<form method="post" action="#">
							<table class="table" style="width: 50%;margin: 0 auto;">
								<caption style="text-align: center;font-size: 24px;">修改信息</caption>
								<tr>
									<td>管理员编号</td>
									<td><?php echo $admin['admin_id'] ?></td>
								</tr>
								<tr>
									<td>管理员姓名</td>
									<td>
										<input type="text" required="required" class="form-control" name="amdin_name" value="<?php echo $admin['admin_name'] ?>" />
									</td>
								</tr>
								<tr>
									<td>管理员电话号码</td>
									<td><?php echo $admin['admin_tel'] ?>
									</td>
								</tr>
								<tr>
									<td>管理员地址</td>
									<td><?php echo $admin['admin_addr'] ?>
										
									</td>
								</tr>
								<tr>
									<td>管理员地位(<?php echo $admin['admin_type']; ?>)</td>
									<td>
										<?php
											if($admin['admin_type']=='普通管理员'){
												?>
												<input  type="radio" name="admin_type" checked="checked" value="普通管理员" />普通管理员
												<input  type="radio" name="admin_type" value="超级管理员" />超级管理员
												<?php
											}
											?>
										
									</td>
									
								</tr>
								<tr>
									<td colspan="2" style="text-align: center;">
										<button name="tj" class="btn btn-danger btn-lg"  type="submit">修改</button>
									</td>
								</tr>
							</table>
							</form>
							<?php
								if(isset($_POST['tj'])){
									@$admin_name=$_POST['amdin_name'];
									@$admin_type=$_POST['admin_type'];
									@$u=mysql_query("update admin set admin_name='$admin_name',admin_type='$admin_type' where admin_id='$admin_id'");
									@$u_num=mysql_affected_rows();
									if($u_num>0){
										echo "<script>alert('更新成功');window.location.href='see_manage.php';</script>";
									}else{
										echo "<script>alert('你没有做任何更新');</script>";
									}
								}
								?>
					</div>
				</div>
		</div>
	<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>