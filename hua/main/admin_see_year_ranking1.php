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
		$yr=$_GET['yr'];
		$sql=mysql_query("select good_id,zongfen,yuhui,sales_money,getreal_money from (select good_id,sum(sales_amount) as zongfen,sum(yuhui) as yuhui,sum(sales_money) as sales_money,sum(getreal_money) as getreal_money from good_sales where yr='$yr' group by good_id) a order by a.zongfen desc");
		$sql_num=mysql_num_rows($sql);
//		echo $sql_num;
		?>
		<div class="container" style="width: 100%;">
			<?php include("m_top.php"); ?>
				<div class="row">
					<div class="col-md-12">
						<table class="table table-hover">
							<caption style="text-align: center;font-size: 20px;"><?php echo $yr; ?>年商品销量排行榜<a href="xina_year_amount.php?yr=<?php echo $yr; ?>" style="margin-left: 20px;" class="btn btn-success">下载</a></caption>
							<thead>
								<tr>
									<th>排名</th>
									<th>商品编号</th>
									<th>商品名称</th>
									<th>现售价</th>
									<th>成本</th>
									<th>年销售量</th>
									<th>年优惠额</th>
									<th>年销售额</th>
									<th>年利润</th>
									<th>种类</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i=0;
									@$sales=0;
									@$yuhui=0;
									@$sales_money=0;
									@$money=0;
									while($good=mysql_fetch_array($sql)){
										$i++;
										$good_id=$good['good_id'];
										@$g=mysql_query("select * from goods where good_id='$good_id'");
										@$g_num=mysql_num_rows($g);
										?>
										<tr>
											<td><?php echo $i; ?></td>
											<?php
												if($g_num<=0){
											?>
											<td colspan="4" style="text-align: center;">此商品已经下架了</td>
											<?php
										}else{
											@$goo=mysql_fetch_array($g);
											?>
											<td><?php echo $goo['good_id']; ?></td>
											<td><?php echo $goo['good_name']; ?></td>
											<td>￥<?php echo $goo['good_price']; ?></td>
											<td>￥<?php echo $goo['buy_price']; ?></td>
											<td><?php echo $good['zongfen']; ?></td>
											<?php
												@$sales=$sales+$good['zongfen'];
												?>
											<td>￥<?php echo $good['yuhui']; ?></td>
											<?php $yuhui=$yuhui+$good['yuhui']; ?>
											<td>￥<?php echo $good['sales_money']-$good['yuhui']; ?></td>
											<?php
												$sales_money=$sales_money+($good['sales_money']-$good['yuhui']);
												?>
											<td>￥<?php echo $good['getreal_money']-$good['yuhui']; ?></td>
											<?php $money=$money+($good['getreal_money']-$good['yuhui']); ?>
											<?php
												@$kind_id=$goo['kind_id'];
												@$kind=mysql_query("select * from kind where kind_id='$kind_id'");
												@$kin=mysql_fetch_array($kind);
												
												?>
												<td><?php echo $kin['kind_name']; ?></td>
											<?php
										}
												?>
										</tr>
										<?php
									}
									?>
									<tr>
										<td colspan="10">
											<p><?php echo $yr ?>年销售情况:</p>
										 	<p>
										 		年销售总量:<?php echo $sales; ?>
										 		年优惠总量:<?php echo $yuhui; ?>
										 		年销售额:￥<?php echo $sales_money; ?>
										 		年利润:￥<?php echo $money; ?>
										 	</p>
										</td>
									</tr>
							</tbody>
						</table>
					</div>
				</div>
		</div>
	<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>