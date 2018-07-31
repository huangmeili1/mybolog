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
			<?php
				include("m_top.php");
				?>
				<div class="row">
					<div class="col-md-12">
						<h4 style="text-align: center;">管理员列表</h4>
						<table class="table table-hover">
							<thead>
								<th>管理员编号</th>
								<th>管理员姓名</th>
								<th>管理员密码</th>
								<th>手机号码</th>
								<th>住址</th>
								<th>管理员性别</th>
								<th>管理员类型</th>
								<th>操作</th>
							</thead>
							<?php
								@$sql=mysql_query("select * from admin");
								while(@$admin=mysql_fetch_array($sql)){
									?>
									<tr>
										<td><?php echo $admin['admin_id']; ?></td>
										<td><?php echo $admin['admin_name']; ?></td>
										<td><?php echo $admin['admin_pass'] ?></td>
										<td><?php echo $admin['admin_tel'] ?></td>
										<td><?php echo $admin['admin_addr'] ?></td>
										<td><?php echo $admin['admin_sex'] ?></td>
										<td><?php echo $admin['admin_type'] ?></td>
										<td>
											<?php
												if($admin['admin_type']!='超级管理员'){
													?>
													<a onclick="return confirm('你确定要删除此管理员')" href="del_admin.php?admin_id=<?php echo $admin['admin_id'] ?>">
														删除
													</a>
													<a href="update_admin.php?admin_id=<?php echo $admin['admin_id']; ?>">
														修改
													</a>
													<?php
												}
												?>
										</td>
									</tr>
									<?php
								}
								?>
						</table>
					</div>
				</div>
		</div>
<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>
