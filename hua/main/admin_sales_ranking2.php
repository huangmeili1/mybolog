<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>销售排行查看</title>
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
		@$acct_yr=$_GET['acct_yr'];
		@$yu=$_GET['yu'];
		@$sql=mysql_query("select * from good_sales where yr='$acct_yr' and mh='$yu' order by sales_amount desc");
		@$sql_num=mysql_num_rows($sql);
		?>
<div class="container" style="width: 100%;">
	<?php
		include("m_top.php");
		?>
		<?php
			if($sql_num<=0){
				?>
				<div class="row">
					<div class="col-md-12" style="text-align: center;">
						你要查看的数据已经暂时没有
					</div>
				</div>
				<?php
			}else{
				$i=0;
				?>
				<div class="row">
					<div class="col-md-12">
						<h4 style="text-align: center;"><?php echo $acct_yr ?>年<?php echo $yu ?>月份的商品销售排行榜<a  style="margin-left: 30px;" href="xina_yu_year.php?acct_yr=<?php echo $acct_yr; ?>&yu=<?php echo $yu; ?>" class="btn btn-success">下载</a></h4>
						<table class="table table-hover">
							<thead>
								<tr>
									<th>排名</th>
									<th>商品名称</th>
									<th>现售价</th>
									<th>成本价</th>
									<th><?php echo $yu; ?>月销量</th>
									<th>优惠</th>
									<th><?php echo $yu; ?>月销售额</th>
									<th><?php echo $yu; ?>月利润</th>
									<th>年度累计销量</th>
									<th>年度累计优惠</th>
									<th>年度累计销售额</th>
									<th>年度累计利润</th>
									<th>所属种类</th>
								</tr>
							</thead>
							<tbody>
								<?php
									@$total_money=0;//总销售额
									@$total_rel_money=0;//总利润
									while(@$good=mysql_fetch_array($sql)){
										@$good_id=$good['good_id'];
										$i++;
										?>
										<tr>
											<td><?php echo $i; ?></td>
											
												<?php
													@$g=mysql_query("select * from goods where good_id='$good_id'");
													@$g_num=mysql_num_rows($g);
													if($g_num<=0){
														?>
														<td colspan="3">此商品已经下架</td>
														<?php
													}else{
														@$go=mysql_fetch_array($g);
														?>
														<td>
														<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $go['good_id']; ?>"><?php echo $go['good_name']; ?></a>
														</td>
														<td>
															￥<?php echo $go['good_price']; ?>
														</td>
														<td>￥<?php echo $go['buy_price']; ?></td>
														
														<?php
													}
													?>
													<td>
														<?php
															echo $good['sales_amount'];
															?>
													</td>
													<td>￥
														<?php
															echo $good['yuhui'];
															?>
													</td>
													<td>
														￥
														<?php
															@$sale_money=$good['sales_money'];
															@$sales_money=$sale_money-$good['yuhui'];
															echo $sales_money;
															@$total_money=$total_money+$rel_price;
															?>
													</td>
													<?php
														@$total_rel_money=@$total_rel_money+$money;
														?>
													<td>￥<?php
														@$getreal_money=$good['getreal_money'];
														@$real_money=$getreal_money-$good['yuhui'];
														echo $real_money;
														?></td>
													<td>
														<?php
															@$y_g=mysql_query("select sum(sales_amount) from good_sales where yr='$acct_yr' and good_id='$good_id'");
															@$ygg=mysql_fetch_array($y_g);
															echo $ygg['sum(sales_amount)'];
															?>
													</td>
													<td>
														￥<?php
															@$y_g1=mysql_query("select sum(yuhui) from good_sales where yr='$acct_yr' and good_id='$good_id'");
															@$ygg1=mysql_fetch_array($y_g1);
															echo $ygg1['sum(yuhui)'];
															?>
													</td>
													<td>
														￥
														<?php
															@$all_money=mysql_query("select sum(sales_money) from good_sales where yr='$acct_yr' and good_id='$good_id'");
															@$all_money1=mysql_fetch_array($all_money);
															@$all_money2=$all_money1['sum(sales_money)']-$ygg1['sum(yuhui)'];
															echo $all_money2;
															?>
													</td>
													<td>
														￥
														<?php
															@$reall1_money=mysql_query("select sum(getreal_money) from good_sales where yr='$acct_yr' and good_id='$good_id'");
															@$all_money11=mysql_fetch_array($reall1_money);
															@$reall1_money2=$all_money11['sum(getreal_money)']-$ygg1['sum(yuhui)'];
															echo @$reall1_money2;
															?>
													</td>
													<td>
														<?php
															@$kind_id=$go['kind_id'];
															@$kind=mysql_query("select * from kind where kind_id='$kind_id'");
															@$knn=mysql_fetch_array($kind);
															echo $knn['kind_name'];
															?>
													</td>
										</tr>
										<?php
									}
									?>
									<tr>
										<td colspan="13" style="">
											<span style="font-size: 20px;">
											<?php
												echo $acct_yr."年".$yu."的销售情况:";
												?>	
											</span>
											<span>
												总销量：
												<?php
													@$all_sales=mysql_query("select sum(sales_amount) from good_sales where yr='$acct_yr' and mh='$yu'");
													@$all_sales1=mysql_fetch_array($all_sales);
													echo $all_sales1['sum(sales_amount)'];
													?>
											</span>
											<span>
												总优惠：
												￥<?php
													@$all_yuhui=mysql_query("select sum(yuhui) from good_sales where yr='$acct_yr' and mh='$yu'");
													@$all_yuhui1=mysql_fetch_array($all_yuhui);
													echo $all_yuhui1['sum(yuhui)'];
													?>
											</span>
											<span>
												总销售额:
												￥<?php
													@$all1=mysql_query("select sum(sales_money) from good_sales where yr='$acct_yr' and mh='$yu'");
													@$all2=mysql_fetch_array($all1);
													@$f_all_money=$all2['sum(sales_money)']-$all_yuhui1['sum(yuhui)'];
													echo $f_all_money;
													?>
											</span>
											<span>
												总利润:
												￥<?php
													@$all2=mysql_query("select sum(getreal_money) from good_sales where yr='$acct_yr' and mh='$yu'");
													@$all3=mysql_fetch_array($all2);
													@$f_all_money2=$all3['sum(getreal_money)']-$all_yuhui1['sum(yuhui)'];
													echo $f_all_money2;
													?>
											</span>
											<br>
											<span style="font-size: 20px;">
												<?php echo $acct_yr; ?>年的销售情况：
											</span>
											
											<span>
													总销量：
													<?php
														@$all_year=mysql_query("select sum(sales_amount) from good_sales where yr='$acct_yr'");
														@$all_year1=mysql_fetch_array($all_year);
														echo $all_year1['sum(sales_amount)'];
														?>
											</span>
											
											<?php 
												$year=mysql_query("select * from good_sales where yr='$acct_yr'");
												@$year_money=0;
												@$year_real_money=0;
												@$year_yuhui=0;
												while($year1=mysql_fetch_array($year)){
													@$year_yuhui=$year_yuhui+$year1['yuhui'];
													$g_d_id=$year1['good_id'];
													$y_good=mysql_query("select * from goods where good_id='$g_d_id'");
													$y_goods=mysql_fetch_array($y_good);
													$m=$year1['sales_money']-$year1['yuhui'];//每件商品总钱
													$year_money=$year_money+$m;
													$m_hua=$year1['getreal_money']-$year1['yuhui'];
													$year_real_money=$year_real_money+$m_hua;
												}
												?>
												<span>
													总优惠:
													￥<?php echo $year_yuhui; ?>
												</span>
												<span>
													总销售额:
													￥<?php echo $year_money; ?>
												</span>
												
												<span>
													总利润:
													￥<?php echo $year_real_money; ?>
												</span>
										</td>
									</tr>
							</tbody>
						</table>
					</div>
				</div>
				<?php
			}
			?>
</div>
		<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>