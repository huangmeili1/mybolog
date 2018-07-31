<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>商品销售排行榜</title>
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
				 <?php
							      	@$sql=mysql_query("select DISTINCT(yr) from good_sales");
							      	@$sql_num=mysql_num_rows($sql);
							      	if($sql_num<=0){
							      		?>
							      		<div class="row">
							      			<div class="col-md-12" style="text-align: center;">暂无可查看的销售排行</div>
							      		</div>
							      		<?php
							      	}else{
							      		?>
											<div class="row">
												<div class="col-md-12">
														<form class="form-horizontal" action="admin_sales_ranking2.php" role="form" style="width: 50%;margin: 0 auto;background-color: paleturquoise;">
															<h3 style="text-align: center;">商品销售排行</h3>
														  <div class="form-group" style="margin-left: 160px;">
														    <label for="firstname" class="col-sm-2 control-label">请选择年份</label>
														    <div class="col-sm-10">
														    	<select style="width: 150px;" id="acct_yr" name="acct_yr">
														    	<?php
														     	while($y=mysql_fetch_array($sql)){
														     		?>
														     		<option>
														     			<?php
														     				echo $y['yr'];
														     				?>
														     		</option>
														     		<?php
														     	}
														     	?>
														    	</select>
														    </div>
														  </div>
														  <div class="form-group" style="margin-left: 160px;">
														    <label for="lastname" class="col-sm-2 control-label">请选择月份</label>
														    <div class="col-sm-10">
														      <?php
														      	@$y=mysql_query("select DISTINCT(mh) from good_sales")
														      	?>
														      	<select id="yu" name="yu" style="width: 150px;">
														      		<?php
														      			while($yu=mysql_fetch_array($y)){
														      				?>
														      				<option><?php echo $yu['mh']; ?></option>
														      				<?php
														      			}
														      			?>
														      	</select>
														    </div>
														  </div>
														  <div class="form-group" style="margin-left: 160px;">
														    <div class="col-sm-offset-2 col-sm-10">
														      <button type="submit" class="btn btn-default">查看</button>
														    </div>
														  </div>
														</form>
												</div>
											</div>
							      		<?php
							      	}
							      	?>
		</div>
		<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>
