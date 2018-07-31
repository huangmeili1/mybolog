<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>查看订单</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	body{
		margin-top: 70px;
	}
	#rating li{
		background: url(../img/star.png);
	    list-style: none;
		float: left;
		width: 31px;
		height: 33px;
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
						<div class="co-md-12">
							<h4 style="text-align: center;">查看订单</h4>
		<?php
		@$book_id=$_GET['book_id'];
		@$bo=mysql_query("select * from book where book_id='$book_id'");
		@$bo_num=mysql_num_rows($bo);
		if($bo_num<=0){
			?>
			<h4 style="text-align: center;">订单编号为：<?php echo $book_id; ?>的订单已经被删除</h4>
			<?php
		}else{
			?>
								<div class="panel panel-default" style="width: 90%;margin: 0 auto;">
								    <div class="panel-heading">
								        
								    <p>
								    	订单编号:<?php echo $book_id; ?>
								    	  <?php
								     	@$book=mysql_fetch_array($bo);
								     	echo $book['state'];
								     	?>
								    </p>
								   
								    </div>
								    <div class="panel-body">
								    	<table class="table">
								    		<caption>
								    			<b style="color: red;">订货人信息</b>
								        	    <b>订货人编号:<a style="text-decoration: none;" target="_blank" href="select_user.php?sel=用户编号&keyword=<?php echo $book['user_id']; ?>&tj=tj"><?php echo $book['user_id']; ?></a></b>
								    		</caption>
								        		<?php
								        			@$user_id=$book['user_id'];
								        			@$sql=mysql_query("select * from user where user_id='$user_id'");
								        			@$sql_num=mysql_num_rows($sql);
								        			if($sql<=0){
								        				?>
								        			<tr>
								        				<td colspan="2">此订单人已经删除</td>
								        			</tr>
								        				<?php
								        			}else{
								        				$user=mysql_fetch_array($sql);
								        				?>
								        				<tr>
								        					<td>订货人姓名:</td>
								        					<td><?php echo $user['realname']; ?></td>
								        				</tr>
								        				<tr>
								        					<td>订货人手机:</td>
								        					<td><?php echo $user['user_tel']; ?></td>
								        				</tr>
								        				<?php
								        			}
								        			?>
								        	
								        </table>
								        <table class="table">
								        	<?php
								        		@$get_id=$book['get_id'];
								        		@$get=mysql_query("select * from getinfo where get_id='$get_id'");
								        		@$get_num=mysql_num_rows($get);
								        		if($get_num<=0){
								        			?>
								        			<caption><b style="color: red;">收货人信息：</b></caption>
								        			<tr>
								        				<td colspan="2">此收货人信息已经被删除</td>
								        			</tr>
								        			<?php
								        		}else{
								        			@$get_g=mysql_fetch_array($get);
								        			?>
								        			<caption><b style="color: red;">收货人信息：</b><b>收货人编号:<?php echo $get_id; ?></b></caption>
								        			<tr>
								        				<td>收货人姓名:</td>
								        				<td><?php echo $get_g['get_name']; ?></td>
								        			</tr>
								        			<tr>
								        				<td>收货人手机:</td>
								        				<td><?php echo $get_g['get_tel']; ?></td>
								        			</tr>
								        			<tr>
								        				<td>收货地址：</td>
								        				<td><?php echo $get_g['get_add']; ?></td>
								        			</tr>
								        			<tr>
								        				<td>收货人邮编：</td>
								        				<td><?php echo $get_g['get_post']; ?></td>
								        			</tr>
								        			<?php
								        		}
								        		?>
								        </table>
								        <?php
								        	@$de=mysql_query("select * from order_detail where book_id='$book_id'");
								        	@$de_num=mysql_num_rows($de);
								        	if($de_num<=0){
								        		?>
								        		<b style="text-align: center;">此订单的商品已经全部下架了</b>
								        		<?php
								        	}else{
								        		?>
								        		<table class="table">
								        			<caption><b style="color: red;">商品信息：</b></caption>
								        			<thead>
								        				<tr>
								        					<th>商品名称</th>
								        					<th>购买价格</th>
								        					<th>购买数量</th>
								        					<th>小计</th>
								        				</tr>
								        			</thead>
								        			<?php
								        				while($good=mysql_fetch_array($de)){
								        					@$good_id=$good['good_id'];
								        					@$go=mysql_query("select * from goods where good_id='$good_id'");
								        					@$go_num=mysql_num_rows($go);
								        					if($go_num<=0){
								        						?>
								        						<tr>
								        							<td>此商品已经下架了</td>
								        							<td><?php echo $good['price']; ?></td>
								        							<td><?php echo $good['num']; ?></td>
								        							<td><?php echo $good['price']*$good['num']; ?></td>
								        						</tr>
								        						<?php
								        					}else{
								        						@$r_g=mysql_fetch_array($go);
								        						?>
								        						<tr>
								        							<td>
								        								<div class="thumbnail" style="width: 150px;border: 0;padding: 0;height: 180px;"> 
								        									<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $r_g['good_id'] ?>">
								        									<img style="width: 150px;" src="<?php echo $r_g['main_img']; ?>" />
								        									<div class="caption" style="text-align: center;">
								        										<?php echo $r_g['good_name']; ?>
								        									</div>
								        									</a>
								        								</div>
								        							</td>
								        							<td style="line-height: 150px;">￥<?php echo $good['price']; ?></td>
								        							<td style="line-height: 150px;"><?php echo $good['num']; ?></td>
								        							<td style="line-height: 150px;">￥<?php echo $good['price']*$good['num']; ?></td>
								        						</tr>
								        						<?php
								        					}
								        				}
								        				?>
								        				<tr>
								        					<td colspan="4" style="text-align: center;">
								        						此订单总金额为:<b style="color: red;">￥<?php echo $book['sum_price']; ?></b>
								        						所用优惠:<b style="color: red;">￥<?php echo $book['cheap']; ?></b>
								        					</td>
								        				</tr>
								        		</table>
								        		<?php
								        	}
								        	?>
								        	<table class="table">
								        		<caption><b style="color: red;">商品评价</b></caption>
								        		<?php
								        			@$con=mysql_query("select * from comments where book_id='$book_id'");
								        			@$con_num=mysql_num_rows($con);
								        			if($con_num<=0){
								        				?>
								        				<tr>
								        					<td colspan="2">该商品暂无评价</td>
								        				</tr>
								        				<?php
								        			}else{
								        				while($r_con=mysql_fetch_array($con)){
								        					@$g_id=$r_con['good_id'];
								        					@$g_g=mysql_query("select * from goods where good_id='$g_id'");
								        					@$gg_num=mysql_num_rows($g_g);
								        					?>
								        					<tr>
								        						<td>
								        							<div class="thumbnail" style="width: 230px;height: 310px;">
								        								<h5 style="text-align: center;">评价商品</h5>
								        								<?php
								        									if($gg_num<=0){
								        										?>
								        										此商品已经下架了
								        										<?php
								        									}else{
								        										@$gf=mysql_fetch_array($g_g);
								        										?>
								        										<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $g_id; ?>">
								        										<img style="width: 230px;" src="<?php echo $gf['main_img']; ?>" />
								        										<div class="caption" style="text-align: center;"><?php echo $gf['good_name']; ?></div>
								        										</a>
								        										<?php
								        									}
								        									?>
								        								
								        							</div>
								        						</td>
								        						<td>
								        							<div class="thumbnail" style="width: 230px;height: 310px;">
								        								<h6>评价图片</h6>
								        								<img style="width: 230px;" src="<?php echo $r_con['content_img'] ?>" />
								        								<div class="caption" style="text-align: center;">
								        									<?php
														    				$xinxin=$r_con['xinxin'];
														    				$ar=array("很不好","不好","一般","好","很好");
														    				?>
														    				<ul class="rating" id="rating">
														    					<?php
														    						for($i=0;$i<$xinxin;$i++){
														    							?>
														    							<li style="background-position-y: -38px;" class="rating-item" title="<?php echo $ar[$i]; ?>"></li>
														    							<?php
														    						}
														    						@$l=count($ar);
														    						for($i=$xinxin;$i<$l;$i++){
														    							?>
														    							<li class="rating-item" title="<?php echo $ar[$i]; ?>"></li>
														    							<?php
														    						}
														    						?>
														    				</ul>
								        								</div>
								        							</div>
								        						</td>
								        						<td>
								        							<div class="thumbnail" style="min-height: 310px;">
								        								<h5>评价内容:<small><?php echo $r_con['comment_time']; ?></small></h5>
								        								<p>
								        									<?php echo $r_con['content']; ?>
								        								</p>
								        							</div>
								        						</td>
								        					</tr>
								        					<?php
								        				}
								        			}
								        			?>
								        	</table>
								    </div>
								</div>
 
						</div>
					</div>
			</div>
			<?php
		}
		?>
	<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>
