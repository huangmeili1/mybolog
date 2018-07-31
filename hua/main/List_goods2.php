<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>礼品列表</title>
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
				<div class="row">
						<div class="col-md-12" style="background-color:white;height: 100px;width: 100%;">
							<form class="bs-example bs-example-form" role="form" action="admin_select_goods2.php">
								<div class="input-group input-group-lg" style="margin-top: 40px;width: 670px;margin: 0 auto;margin-top: 40px;">
							        <select class="form-control" name="sel" style="height: 49px;;width: 110px;border: 2px solid #e4313d;background:#e4313d;color: white;">
										<option>节日</option>
										<option>对象</option>
										<option>枝数</option>
										<option>花材</option>
										<option>用途</option>
									</select>
									<input style="width: 480px;height: 49px;" type="text" name="keyword" required="required" class="form-control">
				           			 <span class="input-group-btn">
				                      <button name="tj" value="tj" class="btn btn-default" type="submit" style="height: 49px;width: 80px;background-color: #e43a3d;border: 1px solid #e43a3d;"><span style="font-size: 21px;color: white;" class="glyphicon glyphicon-search"></span></button>
				                   	</span>
								</div>
							</form>
						</div>
					</div>
				<?php
					@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='礼品') order by good_time desc");
					@$num=mysql_num_rows($sql);
					if($num<=0){
						?>
						<div class="row">
							<div class="col-md-12">
								<h4 style="text-align: center;">暂无礼品</h4>
							</div>
						</div>
						<?php
					}else{
						?>
						<div class="row">
							<div class="col-md-12">
								<table class="table table-hover">
									<caption style="font-size: 24px;text-align: center;"><b>礼品列表</b></caption>
									<thead>
										<tr>
											<th>商品图片</th>
											<th>商品名称</th>
											<th>商品现价</th>
											<th>商品原价</th>
											<th>商品成本价</th>
											<th>销量</th>
											<th>库存</th>
											<th>总量</th>
											<th>适合对象</th>
											<th>操作</th>
										</tr>
									</thead>
									<tbody>
									<?php
										$pagesize=20;
										if(isset($_GET['page'])){
											$page=$_GET['page'];
										}else{
											$page=1;
										}
									    $number=ceil($num/$pagesize);
									    $ps=($page-1)*$pagesize;
									    $SQL=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='礼品') order by good_time desc limit $ps,$pagesize");
										while($flower=mysql_fetch_array($SQL)){
											?>
											<tr>
												<td>
													<div class="thumbnail" style="padding: 0;margin: 0;width: 100px;">
														<img src="<?php echo $flower['main_img']; ?>" />
													</div>
												</td>
												<td style="line-height: 100px;"><?php echo $flower['good_name']; ?></td>
												<td style="line-height: 100px;">￥<?php echo $flower['good_price']; ?></td>
												<td style="line-height: 100px;">￥<?php echo $flower['prime_cost']; ?></td>
												<td style="line-height: 100px;">￥<?php echo $flower['buy_price']; ?></td>
												<td style="line-height: 100px;"><?php echo $flower['sales']; ?></td>
												<td style="line-height: 100px;"><?php echo $flower['good_num'] ?></td>
												<td style="line-height: 100px;"><?php echo $flower['sum'] ?></td>
												<td style="line-height: 100px;"><?php echo $flower['object'] ?></td>
												<td style="line-height: 100px;">
													<a href="see_good.php?good_id=<?php echo $flower['good_id'] ?>">查看</a>
													<a href="update_good.php?good_id=<?php echo $flower['good_id'] ?>">修改</a>
													<a href="del_goods.php?good_id=<?php echo $flower['good_id']; ?>">删除</a>
												</td>
											</tr>
											<?php
										}
										?>
										<tr>
											<td colspan="10" style="text-align: center;">
									   				<span style="line-height: 80px;font-size: 20px;"><?php echo $page; ?>-<?php echo $number; ?>页/共<?php echo $num; ?>件商品</span>
									   				<?php
													$pr=$page-1;
													$pn=$page+1;
													?>
														<?php
															if($number>=9){
																?>
																<ul class="pagination pagination-lg" style="float: right;">
																				<?php
																		if($page<=1){
																			?>
																			<li class="disabled"><span style="color: darkgray;">&laquo;上一页</span></li>
																			<?php 
																			}else{
																				?>
																				<li><a href="List_goods2.php?page=<?php echo $pr; ?>">&laquo;上一页</a></li>
																				<?php
																			}
																				?>
																				
																				<li><a href="List_goods2.php?page=1">1</a></li>
																				<li><a href="List_goods2.php?page=2">2</a></li>
																				<li><a href="List_goods2.php?page=3">3</a></li>
																				<li><a href="List_goods2.php?page=4">4</a></li>
																				<li><a href="List_goods2.php?page=5">5</a></li>
																				<li><a href="List_goods2.php?page=6">6</a></li>
																				<li class="disabled"><span>.....</span></li>
																				<li><a href="List_goods2.php?page=<?php echo $number; ?>"><?php echo $number; ?></a></li>
																				<?php
																		if($page>=$number){
																		?>
																		<li class="disabled"><span style="color: darkgray;">下一页&raquo;</span></li>
																		<?php
																		}else{
																			?>
																			<li><a href="List_goods2.php?page=<?php echo $pn; ?>">下一页&raquo;</a></li>
																			<?php
																		}
																			?>
																				
																		</ul>
																<?php
															}else{
																?>
																<ul class="pagination pagination-lg" style="float: right;">
																				<?php
																		if($page<=1){
																			?>
																			<li class="disabled"><span style="color: darkgray;">&laquo;上一页</span></li>
																			<?php 
																			}else{
																				?>
																				<li><a href="List_goods2.php?page=<?php echo $pr; ?>">&laquo;上一页</a></li>
																				<?php
																			}
																				?>
																				<?php
																					for($i=1;$i<=$number;$i++){
																						?>
																						<li><a href="List_goods2.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
																						<?php
																					}
																					?>
																				<?php
																		if($page>=$number){
																		?>
																		<li class="disabled"><span style="color: darkgray;">下一页&raquo;</span></li>
																		<?php
																		}else{
																			?>
																			<li><a href="List_goods2.php?page=<?php echo $pn; ?>">下一页&raquo;</a></li>
																			<?php
																		}
																			?>
																				
																		</ul>
																<?php
															}
															?>
											
										
										
														
													</tr>
												</table>
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