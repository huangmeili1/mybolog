<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>全部商品销量查询-表格形式</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	body{
		margin-top: 70px;
		overflow-x: hidden;
	}
	.style1 {
 font-size: 16px;
 font-weight: bold;
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
		</div>
		<?php
			@$acct_yr=$_GET['acct_yr'];
			@$start_mth=$_GET['start_mth'];
			@$end_mth=$_GET['end_mth'];
			$sql=mysql_query("SELECT DISTINCT(acct_mth) FROM summary WHERE acct_yr = '$acct_yr' and acct_mth between '$start_mth' and '$end_mth'");
			@$sql_num=mysql_num_rows($sql);
			if($sql_num<=0){
				?>
				<div class="row">
					<div class="col-md-12" style="text-align: center;">你所查询的<?php echo $acct_yr ?>年<?php echo $start_mth; ?>~<?php echo $end_mth; ?>的销售情况</div>
				</div>
				<?php
			}else{
				?>
				<input type="hidden" name="acct_yr" id="acct_yr" value="<?php echo $acct_yr; ?>" />
				<input type="hidden" name="start_mth" id="start_mth" value="<?php echo $start_mth; ?>" />
				<input type="hidden" name="end_mth" id="end_mth" value="<?php echo $end_mth; ?>" />
				<div class="row">
					<div class="col-md-12">
						<table class="table table-hover">
							<caption style="text-align: center;"><?php echo $acct_yr; ?>年<?php echo $start_mth; ?>~<?php echo $end_mth; ?>月份销售情况</caption>
							<thead>
								<tr>
									<th>月份</th>
									<th>销量</th>
									<th>销量总金额</th>
									<th>净利润</th>
								</tr>
								<?php
									$yu=array();
									$i=-1;
									$amount=array();
									$money=array();
									$sum_money=array();
									$sum_order=array();
									while($row_rs_prod=mysql_fetch_assoc($sql)){
										$i++;
										$yu[$i]=$row_rs_prod['acct_mth'];
									//	$amount[$i]=$row_rs_prod['amount'];
									}
									$a=-1;
									for($i=0;$i<count($yu);$i++){
										$a++;
										$y=$yu[$i];
										@$sql=mysql_query("select sum(amount),sum(money),sum(sum_money) from summary where acct_mth='$y'");
										@$sql_f=mysql_fetch_array($sql);
										$amount[$i]=$sql_f['sum(amount)'];
										$money[$i]=$sql_f['sum(money)'];
										$sum_money[$i]=$sql_f['sum(sum_money)'];
									}
									?>
							</thead>
							<tbody>
								<?php
								   for($i=0;$i<count($yu);$i++){
								   	?>
								   	<tr>
								   		<td><?php echo $yu[$i]; ?>月</td>
								   		<td><?php echo $amount[$i]; ?></td>
								   		<td><?php echo $sum_money[$i]; ?>元</td>
								   		<td><?php echo $money[$i]; ?>元</td>
								   	</tr>
								   	<?php
								   }
									?>
									<tr>
										<td colspan="5" style="text-align: center;"><a href="xian_all_sales.php?acct_yr=<?php echo $acct_yr ?>&start_mth=<?php echo $start_mth ?>&end_mth=<?php echo $end_mth; ?>" class="btn btn-danger">下载</button></td>
									</tr>
							</tbody>
						</table>
					</div>
				</div>
				<?php
			}
			?>
		<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>
	<script type="text/javascript">
		
	</script>
