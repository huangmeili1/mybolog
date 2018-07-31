<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>年度销售排行查看</title>
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
						<?php
							@$sql=mysql_query("select DISTINCT(yr) from good_sales");
							@$sql_num=mysql_num_rows($sql);
							if($sql_num<=0){
								?>
								<div class="row">
									<div class="col-md-12">
										暂无年销售排行榜
									</div>
								</div>
								<?php
							}else{
								?>
								<div class="row">
									<div class="col-md-12">
										<form class="form-horizontal" action="admin_see_year_ranking1.php" role="form" style="width: 40%;margin: 0 auto;background-color: lightblue;">
											<h4 style="text-align: center;">年销售排行榜查看</h4>
										  <div class="form-group" style="width: 100%;margin-left: 90PX;">
										    <label for="firstname" class="col-sm-2 control-label">请选择要查看的年份</label>
										    <div class="col-sm-10">
										    	<select id="yr" name="yr" style="width: 200px;height: 30px;">
										    		 <?php
										      	while($sql1=mysql_fetch_array($sql)){
													?>
													<option>
														<?php echo $sql1['yr']; ?>
													</option>
													<?php
													}
										      	?>
										    	</select>
										    </div>
										  </div>
										  <div class="form-group" style="width: 100%;margin-left: 90PX;">
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
				</div>
		</div>
	<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>