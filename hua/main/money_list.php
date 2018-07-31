<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>付款方式列表</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	body{
		margin-top: 70px;
		overflow-x: hidden;
	}
</style>
<style>
</style>
<div class="container" style="width: 100%;">
<?php
	session_start();
	include_once("../conn/dataconnection.php");
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		?>
		   <?php  include("m_top.php"); ?>
		   	<div class="row">
		   		<h4 style="text-align: center;">付款方式列表</h4>
		   		<?php
		   			$sql=mysql_query("select * from getmoney");
		   			@$sql_num=mysql_num_rows($sql);
		   			if($sql_num<=0){
		   				?>
		   				
		   					<div class="col-md-12" style="text-align: center;">
		   						暂无付款方式
		   					</div>
		   				
		   				<?php
		   			}else{
		   				?>
		   				<div class="col-md-12">
		   					<table class="table table-hover">
		   						<thead>
		   							<th>付款方式</th>
		   							<th>图片</th>
		   							<th>帐号</th>
		   							<th>类型</th>
		   							<th>开户人</th>
		   							<th>操作</th>
		   						</thead>
		   						<tbody>
		   							<?php 
		   								while($get=mysql_fetch_array($sql)){
		   									?>
		   									<tr>
		   										<td><?php echo $get['get_money']; ?></td>
		   										<td>
		   											<div class="thumbnail" style="width: 150px;">
		   												<img style="width: 150px;" src="<?php echo $get['get_img']; ?>" />
		   											</div>
		   										</td>
		   										<td><?php
		   											echo $get['get_mo'];
		   											?></td>
		   											<td>
		   												<?php echo $get['get_type']; ?>
		   											</td>
		   											<td>
		   												<?php
		   													echo $get['get_user'];
		   													?>
		   											</td>
		   											<td>
		   												<a href="updat_money.php?money_id=<?php echo $get['money_id']; ?>">修改</a>
		   												<a onclick="return confirm('确定要删除此付款方式?')" href="del_money.php?money_id=<?php echo $get['money_id']; ?>">删除</a>
		   											</td>
		   									</tr>
		   									<?php
		   								}
		   								 ?>
		   						</tbody>
		   					</table>
		   				</div>
		   				<?php
		   			}
		   			?>
		   			<a style="margin-left: 300px;" href="addget_money.php" class="btn btn-danger">增加付款方式</a>
		   			</div>
		   	</div>
	<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>