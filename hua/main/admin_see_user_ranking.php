<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>会员购物量排行</title>
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
	include("../conn/dataconnection.php");
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		?>
		<div class="container" style="width: 100%;">
			<?php include("m_top.php"); ?>
				<?php
					@$sql=mysql_query("select * from book");
					@$sql_num=mysql_num_rows($sql);
					if($sql_num<=0){
						?>
						<div class="row">
							<div class="col-md-12">
								<h4 style="text-align: center;">暂无订单</h4>
							</div>
						</div>
						<?php
					}else{
						?>
						<div class="row">
							<div class="col-md-12">
								<h4 style="text-align: center;">用户购物量排行榜(按金额排列)<a href="xina_user_ranking.php" class="btn btn-success">下载</a></h4>
								<table class="table table-hover">
									<thead>
										<th>排名</th>
										<th>用户编号</th>
										<th>用户真实姓名</th>
										<th>用户手机</th>
										<th>总购物金额</th>
										<th>总优惠</th>
										<th>注册时间</th>
										<th>订单数量</th>
										<th>操作</th>
									</thead>
									<tbody>
										<?php
											//$sql=mysql_query("select good_id,zongfen,yuhui,sales_money,getreal_money from (select good_id,sum(sales_amount) as zongfen,sum(yuhui) as yuhui,sum(sales_money) as sales_money,sum(getreal_money) as getreal_money from good_sales where yr='$yr' group by good_id) a order by a.zongfen desc");
											$sqll=mysql_query("select user_id,zongfen,cheaap,b from (select user_id,sum(sum_price) as zongfen,sum(cheap) as cheaap,count(*) as b from book group by user_id) a order by a.zongfen desc");
											@$sqll_num=mysql_num_rows($sqll);
											if($sqll_num<=0){
												?>
												<tr>
													<td colspan="8" style="text-align: center;">暂时无法查看</td>
												</tr>
												<?php
											}else{
												$i=0;
												while($user=mysql_fetch_array($sqll)){
													$i++;
													?>
													<tr>
														<td><?php echo $i; ?></td>
														<td><?php echo @$user['user_id']; ?></td>
														<td>
															<?php
																@$user_id=$user['user_id'];
																@$u_u=mysql_query("select * from user where user_id='$user_id'");
																@$uu=mysql_fetch_array($u_u);
																echo $uu['realname'];
																?>
														</td>
														<td><?php echo @$uu['user_tel']; ?></td>
														<td>￥<?php echo @$user['zongfen']; ?></td>
														<td>￥<?php echo @$user['cheaap']; ?></td>
														<td><?php echo @$uu['user_time']; ?></td>
														<td><?php echo @$user['b']; ?></td>
														<td>
															<a href="amdin_see_user_all.php?user_id=<?php echo $user_id ?>">查看更多</a>
														</td>
													</tr>
													<?php
												}
											}
											?>
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