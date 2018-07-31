<meta charset="utf-8" />
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<style>
#table1	td{
		border: 0px solid transparent;
	}
	body{
		margin-top: 70px;
	}
	body{
	 overflow:-Scroll;
	 overflow-x:hidden
}
#rating li{
	list-style: none;
	width: 31px;
	height: 33px;
	background: url(../img/star.png);
	float: left;
}
</style>
<?php
session_start();
include_once("../conn/dataconnection.php");
@$user_id=$_SESSION['user_id'];
?>
<div id="up" style="position: fixed;height: 160px;width: 110px;left: 94%;z-index: 8;top: 30%;display: none;">
	<a onclick="go_to_up()" onmouseover="cha()" onmouseleave="cha2()" id="folwer_top" style="width: 100%;height: 100%;">
		<div id="flower_top2" style="height: 110px;width: 80px;background:url(../img/rocket_button_up.png);margin: 0 auto;margin-right: 30px;background-position-x: -30px;background-position-y: -10px;">
			
		</div>
	</a>
</div>
<div class="container" id="container" style="width: 100%;margin-top: 50px;">
	<?php
$u7=mysql_query("select * from cart where user_id='$user_id'");
@$cart=mysql_num_rows($u7);
	?>
<div id="topa" class="navbar navbar-default navbar-fixed-top" role="navigation" style="width: 100%;">
		<div class="container-fluid" style="width: 80%;margin: 0 auto;text-align: center;">
			<div class="navbar-header">
				<div class="navbar-brand"><a style="text-decoration: none;color: gray;" href="index.php">欢迎来到花间杂货铺</a></div>
			</div>
			<ul class="nav navbar-nav">
				<?php
					if(@$_SESSION['user_id']!=''and @$_SESSION['user_name']!=''){
						
						?>
						<li><a href="personcenter.php">你好,<?php echo @$user_id; ?></a></li>
						<li><a href="amind_sign.php">退出</a></li>
						<?php
					}else{
						?>
						<li><a href="login.php">你好，请登录</a></li>
						<li><a href="find_pass.php">找回密码</a></li>
						<li><a href="Reg.php">注册</a></li>
						<?php
					}
					?>
				<li><a href="personcenter.php">个人中心</a></li>
				<!--<li><a href="#">帮助中心</a></li>-->
				<?php if(@$_SESSION['user_id']!=''and @$_SESSION['user_name']!=''){
					?>
					<li><a href="cart.php">购物车<span style="color: red;" class="glyphicon glyphicon-shopping-cart">(<?php echo $cart; ?>)</span></a></li>
					<?php
				}else{
					if(!isset($_SESSION['cart'])||!isset($_SESSION['num'])||($_SESSION['cart']==''&&$_SESSION['num']=='')){
						$num2=0;
					}else{
						@$good2=explode("$",$_SESSION['cart']);
						@$nums2=explode("*",$_SESSION['num']);
						$num2=count($good2);
					}
					?>
					<li><a href="cart2_1.php">购物车<span style="color: red;" class="glyphicon glyphicon-shopping-cart">(<?php echo $num2; ?>)</span></a></li>
					<?php
				} ?>
				
				<?php if(@$_SESSION['user_id']==''and @$_SESSION['user_name']==''){
					?>
					<li><a href="login.php">我的订单<span style="color: black;" class="glyphicon glyphicon-list-alt">()</span></a></li>
					<?php
				}else{
					@$book=mysql_query("select * from book where user_id='$user_id'");
					@$book_num=mysql_num_rows($book);
					?>
					<li><a href="person_order.php">我的订单<span style="color: red;" class="glyphicon glyphicon-shopping-cart">(<?php echo $book_num; ?>)</span></a></li>
					<?php
				} ?>
				<?php if(@$_SESSION['user_id']==''and @$_SESSION['user_name']==''){
					?>
					<li><a href="login.php">我的收藏()</a></li>
					<?php
				}else{
					@$store=mysql_query("select * from storegood where user_id='$user_id'");
					@$store_num=mysql_num_rows($store);
					?>
					<li><a href="person_collect.php">我的收藏<span style="color: red;" class="glyphicon glyphicon-shopping-cart">(<?php echo $store_num; ?>)</span></a></li>
					<?php
				} ?>
				<?php
					if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
					?>
					<li><a href="managecenter.php">管理中心</a></li>
					<?php
					}
					?>
				<!--<li><a href="#"><span style="font-size: 16px;" class="glyphicon glyphicon-time">&nbsp;</span><span id="timeShow"></span></a></li>-->
				<li><a href="person_select_order.php">查找订单</a></li>
				<li><a href="#">客服电话:4008-930-100</a></li>
				<!--<?php echo PHP_VERSION; ?>-->
					
			</ul>
		</div>
</div>
<div class="row" style="background: white;height: 120px;width: 1500px;background: white;">
			<div class="col-xs-6 col-md-3" style="height: 120px;background: white;">
				<img style="margin-top: 20px;margin-left: 90px;" src="../img/logo1.png" />
			</div>
			<div class="col-xs-6 col-md-9" style="height: 120px;width: 650px;background: white;">
				<form action="select.php" method="get">
				<div class="input-group input-group-lg" style="margin-top: 40px;">
			        <select class="form-control" name="sel" style="width: 110px;border: 2px solid #e4313d;background:#e4313d;color: white;">
						<option>节日</option>
						<option>对象</option>
						<option>枝数</option>
						<option>花材</option>
						<option>用途</option>
					</select>
					<input style="border: 2px solid #e43a3d;width: 430px;" type="text" aria-required="true" required="required" name="key" class="form-control" placeholder="请输入关键字" />
					<span class="input-group-btn">
                      <button name="tj" value="tj" class="btn btn-default" type="submit" style="width: 80px;background-color: #e43a3d;border: 1px solid #e43a3d;"><span style="font-size: 21px;color: white;" class="glyphicon glyphicon-search"></span></button>
                   	</span>
				</div>
				</form>
			</div>
		</div>
				 <div class="row">
			      <div class="col-xs-6 col-sm-12" style="width: 100%;background-color: #f13a3a;border: 0;">
			        <div class="navbar navbar-default" role="navigation" style="width: 100%;margin: 0;background-color: transparent;border: 0;overflow: hidden;">
			         	<div class="container-fluid" style="margin-left: 200px;">
			         		<div class="collapse navbar-collapse" id="example-navbar-collapse">
			         			<ul class="nav navbar-nav">
			         				<li><a style="color: white;font-size: 20px;" href="index.php">首页</a></li>
			         				<li><a style="color: white;font-size: 20px;" href="flower.php">鲜花</a></li>
			         				<li><a style="color: white;font-size: 20px;" href="forever_flower.php">永生花</a></li>
			         				<li><a style="color: white;font-size: 20px;" href="bussiness.php">商务花篮</a></li>
			         				<li><a style="color: white;font-size: 20px;" href="green.php">绿色植物</a></li>
			         				<li><a style="color: white;font-size: 20px;" href="rankinglist.php">销量排行榜</a></li>
			         				<li><a style="color: white;font-size: 20px;" href="see_list.php">浏览排行榜</a></li>
			         				<li><a style="color: white;font-size: 20px;" href="gift.php">礼品</a></li>
			         				<li><a style="color: white;font-size: 20px;" href="all_know.php">花语大全</a></li>
			         			</ul>
			         		</div>
			         	</div>
			        </div>
			      </div>
			   </div>
<?php
include("../conn/dataconnection.php");
@$good_id=$_GET['good_id'];
$up=mysql_query("update goods set see=see+1 where good_id='$good_id'");
$sql=mysql_query("select * from goods where good_id='$good_id'");
@$num=mysql_num_rows($sql);

?>
<?php include("login_reg.php"); ?>
		
			   <?php
			   	if(@$num>0){
			   		$f=mysql_fetch_array($sql);
			   		?>
			   		<title><?php echo $f['good_name']; ?></title>
			  <div class="row" style="width: 80%;margin: 0 auto;border: 1px solid gainsboro;margin-top: 20px;">
			   	<div class="col-xs-12 col-md-6" style="margin-bottom: 10px;background: white;margin-top: 20px;">
			   		<div id="img" class="thumbnail" style="margin-top: 20px;border: 0;margin-top: 50px;">
			   			<img style="height:640px;width: 100%;" style="border: 0;" src="<?php echo $f['main_img']; ?>" />
			   		</div>
			   	</div>
			   	<div class="col-xs-12 col-md-6" style="background: white;">
			   		<ul class="list-group" style="margin-top: 10px;border: 0;">
			   			<li class="list-group-item" style="border: 0;">
			   				<h3><?php echo $f['good_name'] ?>--<small><?php echo $f['material'] ?></small></h3>
			   				<hr size="2" color="darkgray" />
			   			</li>
			   			<li class="list-group-item" style="border: 0;">
			   				<form name="mrof" method="get" action="Order.php" target="_blank">
							<table id="table1" class="table table-hover table-responsive" style="font-size: 14px;">
								<tbody>
									<tr>
										<td>类别：</td>
										<td>
											<?php 
											$kind_id=$f['kind_id'];
											$s=mysql_query("select * from kind where kind_id='$kind_id'"); 
											$t=mysql_fetch_array($s);
											echo $t['kind_name']
											?>
										</td>
									</tr>
									<tr>
										<td>材料：</td>
										<td><?php echo $f['material']; ?></td>
									</tr>
									<tr>
										<td>包装：</td>
										<td><?php echo $f['packing'] ?></td>
									</tr>
									<tr>
										<td style="width: 80px;">花语：</td>
										<td style="height: 50px;"><?php echo $f['good_hua'] ?></td>
									</tr>
									<tr>
										<td style="width: 100px;">适合节日：</td>
										<td><?php echo $f['festival'] ?></td>
									</tr>
									<tr>
										<td>朵数：</td>
										<td><?php echo $f['flower_num'] ?></td>
									</tr>
									<tr>
										<td>库存：</td>
										<input type="hidden" name="goodss_num" id="goodss_num" value="<?php echo $f['good_num']; ?>" />
										<td>
											<?php echo $f['good_num'] ?>
											&nbsp;&nbsp;&nbsp;销量：<?php echo $f['sales'] ?>
											&nbsp;&nbsp;&nbsp;收藏：<?php 
										$n=mysql_query("select * from storegood where good_id='$good_id'");
										@$nn=mysql_num_rows($n);
										echo $nn;
										?>
										</td>
									</tr>
									<tr>
										<td>附赠：</td>
										<td><?php echo $f['send']; ?></td>
									</tr>
									<tr>
										<td>配送：</td>
										<td><?php echo $f['ad']; ?></td>
									</tr>
									<tr>
										<td>说明：</td>
										<td><?php echo $f['say']; ?></td>
									</tr>
									<tr>
										<td width="120"><del style="color: #F01B2D;">原价：￥<?php echo $f['prime_cost'] ?></del></td>
										<td style="color:#F01B2D ;">现价:￥<?php echo $f['good_price'] ?></td>
									</tr>
									<tr>
										<td>购买数量:</td>
										<td>
												<input type="hidden" name="goods" value="<?php echo $f['good_id'] ?>" />
												<input type="text" id="nums" onchange="checknum(this.value)" name="nums" value="1" size="4" style="border: 1px solid #CCDD55;">
										</td>
									</tr>
									<tr>
										<td colspan="2">收藏:
								<?php
								if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
									?>
									<a href="collect.php?good_id=<?php echo $f['good_id'] ?>"><img width="90" src="../img/store.png"></a>
									<?php
								}else{
									?>
									<a href="#" data-toggle="modal" data-target="#myModal"><img width="90" src="../img/store.png"></a>
									<?php
								}
								?>
										</td>
										
									</tr>
									<tr>
									   <?php
									   	if($f['good_num']==0){
									   		?>
									   		<td colspan="2">
									   			<button type="button" class="btn btn-danger">库存不足</button>
									   		</td>
									   		<?php
									   	}else{
									   
										if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
											?>
											<td><button name="tj" type="submit" class="btn btn-danger btn-lg">立即购买</button></td>
											<?php
										}else{
											?>
											<td><button type="button" name="tj" data-toggle="modal" data-target="#myModal" onclick="openL(<?php echo $good_id; ?>)" class="btn btn-danger btn-lg">立即购买</button></td>
											<?php
										}
										?>
										<?php
									if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
									?>
									<td><button type="button" class="btn btn-danger btn-lg" onclick="addCart(<?php echo $f['good_id'] ?>)">加入购物车</button></td>
									<?php	
									}else{
										?>
									<td><button data-toggle="modal" data-target="#myModal" type="button" onclick="open_add_cart(<?php echo $f['good_id']; ?>)" class="btn btn-danger btn-lg">加入购物车</button></td>
										<?php
									}
									
									   	}
									   	?>
										
									
									</tr>
								</tbody>
							</table>
							</form>
			   			</li>
			   		</ul>
			   	</div>
			   </div>
			   
			   
			   
			   <div class="row" style="width: 80%;margin: 0 auto;margin-top: 30px;border: 0;">
			   	<div class="col-xs-6 col-md-3" style="border: 1px solid gray;height: auto;border: 0;background: white;">
			   		<div class="row" style="width: 98%;">
			   			<div class="col-xs-6 col-md-12" style="background: #FD602D;height: 35px;">
			   				<span style="line-height: 35px;text-align: center;margin-left: 100px;font-size: 20px;">热销推荐</span>
			   			</div>
			   		</div>
			   		<div class="row" style="width: 98%;border: 1px solid gainsboro;">
			   			<div class="col-xs-6 col-md-12" style="background: white;height: auto;">
			   				
							   		<?php
									$yu=mysql_query("select * from goods where kind_id='$kind_id' order by sales desc limit 0,10");
									while($hg=mysql_fetch_array($yu)){
										?>
									<div class="row">
										<div class="col-xs-6 col-md-12">
											<div onmouseleave="chagne_hot_type2(<?php echo $hg['good_id']; ?>)" onmouseover="change_hot_type(<?php echo $hg['good_id']; ?>)" id="hot<?php echo $hg['good_id'] ?>" class="thumbnail" style="border: 0;padding: 0;">
												<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $hg['good_id']; ?>">
									            <img style="height: 210px;" src="<?php echo $hg['main_img']; ?>">
									            <div class="caption" style="text-align: center;">
									                <h3 class="text-muted" style="font-size: 18px;"><?php echo $hg['good_name'] ?></h3>
									            	<p style="font-size: 15px;color: #F23207;">￥<?php echo $hg['good_price'] ?></p>
									            </div>
									            </a>
									        </div>
										</div>
									</div>
										<?php
									}
									?>
			   					
			   				
			   			</div>
			   		</div>
			   	</div>
				<div id="show_you" class="col-xs-6 col-md-9" style="background: white;border: 1px solid gainsboro;">
					<div class="row" style="">
						<div class="col-xs-6 col-md-12">
							<ul id="myTab" class="nav nav-tabs">
								<li class="active">
									<a href="#home" data-toggle="tab">商品详情</a>
								</li>
								<li><a href="#ios" data-toggle="tab">用户评价</a></li>
								<li><a href="#ios2" data-toggle="tab">购物保障</a></li>
							</ul>
						</div>
					</div>
					
					<div class="row" style="margin: 0 auto;margin-top: 10px;">
						<div class="col-xs-6 col-md-12" style="background:white;">
							<div id="myTabContent" class="tab-content" style="margin: 0 auto;">
								<div class="tab-pane fade in active" id="home" style="margin: 0 auto;margin-left: 30px;">
									
									<?php 
									$to=$f['good_img']; 
									$k=explode("*",$to);
									foreach($k as $ll){
										?>
									<div style="margin-top: 20px;">
										<div class="thumbnail" style="border: 0;padding: 0;">
											<img style="" src="<?php echo $ll ?>">
										</div>
									</div>
									
									<?php
									}
									?>
									
								</div>
								<div class="tab-pane fade" id="ios">
									
									<?php
										@$comments=mysql_query("select * from comments where good_id='$good_id'");
										@$con_num=mysql_num_rows($comments);
										if($con_num>0){
											?>
											<div style="text-align: center;margin-bottom: 25px;">本商品评价共<?php echo @$con_num; ?>条</div>
											<div class="row" style="margin-bottom: 20px;">
												<?php
													@$x1=mysql_query("select * from comments where good_id='$good_id' and xinxin='1'");
													@$x1_num=mysql_num_rows($x1);
													@$x2=mysql_query("select * from comments where good_id='$good_id' and xinxin='2'");
													@$x2_num=mysql_num_rows($x2);
													@$x3=mysql_query("select * from comments where good_id='$good_id' and xinxin='3'");
													@$x3_num=mysql_num_rows($x3);
													@$x4=mysql_query("select * from comments where good_id='$good_id' and xinxin='4'");
													@$x4_num=mysql_num_rows($x4);
													@$x5=mysql_query("select * from comments where good_id='$good_id' and xinxin='5'");
													@$x5_num=mysql_num_rows($x5);
													?>
												<div class="col-md-12">
													<button id="button0" onclick="see_comment(0,<?php echo $good_id; ?>)" class="btn btn-success">全部(<?php echo @$con_num; ?>)</button>
													<button id="button2" onclick="see_comment(1,<?php echo $good_id; ?>)" class="btn btn-success">很不好(<?php echo @$x1_num; ?>)</button>
													<button id="button3" onclick="see_comment(2,<?php echo $good_id; ?>)" class="btn btn-success">不好(<?php echo $x2_num; ?>)</button>
													<button id="button4" onclick="see_comment(3,<?php echo $good_id; ?>)" class="btn btn-success">一般(<?php echo $x3_num; ?>)</button>
													<button id="button5" onclick="see_comment(4,<?php echo $good_id; ?>)" class="btn btn-success">好(<?php echo $x4_num; ?>)</button>
													<button id="button6" onclick="see_comment(5,<?php echo $good_id; ?>)" class="btn btn-success">很好(<?php echo $x5_num; ?>)</button>
												</div>
											</div>
											<div id="show_comment" style="margin: 0 auto;text-align: center;">
											<?php
											while($con=mysql_fetch_array($comments)){
												?>
												
													<div class="panel panel-default">
													    <div class="panel-body">
															<div class="media">
															    <div class="media-left" style="width: 150px;">
															    	<?php
															    		if($con['content_img']==''){
															    			?>
															    			
															    			<?php
															    		}else{
															    			?>
															    			<img style="width: 150px;height: 150px;" class="media-object" src="<?php echo $con['content_img']; ?>" alt="媒体对象">
															    			<h5 align="center">评价图片</h5>
															    			<?php
															    		}
															    		?>
															    	
															    </div>
															    <div class="media-body">
															        <h5 class="media-heading">
															        	整体评分
															        	<?php
															        		$xinxin=$con['xinxin'];
															        		$xin=array("很不好","不好","一般","好","很好");
															        		?>
															        	<ul class="rating" id="rating">
															        		<?php
															        			for($i=0;$i<$xinxin;$i++){
															        				?>
															        				<li class="rating-item" style="background-position-y: -38px;" title="<?php echo $xin[$i]; ?>"></li>
															        				<?php
															        			}
															        			$le=count($xin);
															        			for($i=$xinxin;$i<$le;$i++){
															        				?>
															        				<li class="rating-item" title="<?php echo $xin[$i]; ?>"></li>
															        				<?php
															        			}
															        			?>
															        	</ul>
															        	<span style="margin-left: 200px;">评价时间：<?php
															        		echo $con['comment_time'];
															        		?></span>
															        </h5>
															        <hr size="3" color="gray" />
															        <p>
															        	<?php echo $con['content']; ?>
															        </p>
															    </div>
															</div>
													    </div>
													</div>
												
												<?php
											}
											?>
											</div>
											<?php
										}
										?>
								</div>
								<div class="tab-pane fade" id="ios2">
									<div class="row">
										<div class="col-md-12">
											<div class="col-md-2">
												<a class="show_server" onmouseover="change(0)" href="#div0" style="color: orange;">
												<div class="thumbnail show_back" style="margin: 0 auto;height: 60px;width: 60px;background-color: red;margin-top: 30px;background: url(../img/server_z.png) no-repeat;background-position-y: -60px;border: 0;padding: 0;">
													
												</div>
												<h5 style="text-align: center;">13年品牌</h5>
												</a>
											</div>
											<div class="col-md-2">
												<a class="show_server" onmouseover="change(1)" href="#div1" style="color: black;">
												<div class="thumbnail show_back" style="margin: 0 auto;height: 60px;width: 60px;background-color: red;margin-top: 30px;background: url(../img/server_z.png);background-position-x: -60px;border: 0;padding: 0;">
													
												</div>
												<h5 style="text-align: center;">销量第一</h5>
												</a>
											</div>
											<div class="col-md-2">
												<a class="show_server" onmouseover="change(2)" href="#div2" style="color: black;">
												<div class="thumbnail show_back" style="margin: 0 auto;height: 60px;width: 60px;background-color: red;margin-top: 30px;background: url(../img/server_z.png);background-position-x: -120px;border: 0;padding: 0;">
													
												</div>
												<h5 style="text-align: center;">400万用户+信赖</h5>
												</a>
											</div>
											<div class="col-md-2">
												<a class="show_server" onmouseover="change(3)" href="#div3" style="color: black;">
												<div class="thumbnail show_back" style="margin:0 auto;height: 60px;width: 60px;background-color: red;margin-top: 30px;background: url(../img/server_z.png);background-position-x: -180px;border: 0;padding: 0;">
													
												</div>
												<h5 style="text-align: center;">订单实拍</h5>
												</a>
											</div>
											<div class="col-md-2">
												<a class="show_server" onmouseover="change(4)" href="#div4" style="color: black;">
												<div class="thumbnail show_back" style="margin: 0 auto;height: 60px;width: 60px;background-color: red;margin-top: 30px;background: url(../img/server_z.png);background-position-x: -240px;border: 0;padding: 0;">
														
												</div>
												<h5 style="text-align: center;">3小时配送</h5>
												</a>
											</div>
											<div class="col-md-2" style="">
												<a class="show_server" onmouseover="change(5)" href="#div5" style="color: black;">
												<div class="thumbnail show_back" style="margin: 0 auto;height: 60px;width: 60px;background-color: red;margin-top: 30px;background: url(../img/server_z.png);background-position-x: -300px;border: 0;padding: 0;">
													
												</div>
												<h5 style="text-align: center;">200%退赔承诺</h5>
												</a>
											</div>
										</div>
									</div>
									<div class="row" style="">
										<div class="col-md-12" style="position: relative;">
											<div id="div0" class="thumbnail" style="margin-top: 40px;border: 0;padding: 0;">
												<img src="../img/server_01.jpg" />
											</div>
											<div id="div1" class="thumbnail" style="margin-top: 40px;border: 0;padding: 0;display: none;">
												<img src="../img/server_02.jpg" />
											</div>
											<div id="div2" class="thumbnail" style="margin-top: 40px;border: 0;padding: 0;display: none;">
												<img src="../img/server_03.jpg" />
											</div>
											<div id="div3" class="thumbnail" style="margin-top: 40px;border: 0;padding: 0;display: none;">
												<img src="../img/server_04.jpg" />
											</div>
											<div id="div4" class="thumbnail" style="margin-top: 40px;border: 0;padding: 0;display: none;">
												<img src="../img/server_05.jpg" />
											</div>
											<div id="div5" class="thumbnail" style="margin-top: 40px;border: 0;padding: 0;display: none;">
												<img src="../img/server_06.jpg" />
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
			   	</div>
			   </div>
			   
			   		<?php
			   	}else{
			   		echo "对不起，系统出错了";
			   	}
			   	?>
			   
			   
			  <?php include("footer.php"); ?>
			   	
</div>

<script type="text/javascript">
	var str=window.location.hash;
	var m=str.match(/\d+/g);//#?num=1&good_id=46查找出此客串后所有整数
//	alert(m);
	if (m&&m!='') {
//		alert(m[1]);
	increaseVal(m[0],m[1]);
	}
	
	function increaseVal(num,good_id) {
	$.post('see_comments.php', {
	num: num,
	good_id:good_id
	}, function(newVal) {
	$("#show_comment").html(newVal);
	// 存储相关值至对象中
	var state = {
//	book_id:book_id,
	val: newVal,
	title: 'title-' + num,
	url: '#num=' + num+"&good_id="+good_id
	}
	// 将相关值压入history栈中
	window.history.pushState && window.history.pushState(state, state.title, state.url);
	});
	}
	
function see_comment(num,good_id){
	increaseVal(num,good_id);
}
	// 浏览器的前进后退，触发popstate事件
window.onpopstate = function(){
var state = window.history.state;
console.log(state)
// 直接将值取出，或再次发个ajax请求
if(state==null){
	location.reload();
}
$("#show_comment").html(state.val);
window.history.replaceState && window.history.replaceState(state, state.title, state.url);
};
</script>
<script type="text/javascript">
window.onscroll=function(){
		var this_top=$(this).scrollTop();
		var show_you=$("#show_you").offset().top;
		var top=document.getElementById("up");
		$(window).scroll(function(){
        if(this_top>show_you+200){
            top.style.display='block';
        }else{
        	top.style.display='none';
        }
    });
	}
function cha(){
	var flower_top2=document.getElementById("flower_top2");
	var flower_top=document.getElementById("flower_top");
	flower_top2.style.backgroundPositionX='-180px';
}
function go_to_up(){
	var flower_top2=document.getElementById("flower_top2");
	var flower_top=document.getElementById("flower_top");
	flower_top2.style.height='500px';
	flower_top2.style.backgroundPositionX='-340px';
	 $('html,body').animate({  
        scrollTop: 0  
    }, 800); 
}
function cha2(){
	var flower_top2=document.getElementById("flower_top2");
	var flower_top=document.getElementById("flower_top");
	flower_top2.style.height='110px';
	flower_top2.style.backgroundPositionX='-30px';
}


	function change(num){
		
		var show_server=document.getElementsByClassName("show_server");
		var show_back=document.getElementsByClassName("show_back");
//		alert(show_back.length);
	for(var i=0;i<show_back.length;i++){
		if(i==num){
			show_back[i].style.backgroundPositionY='-60px';
			show_server[i].style.color='orange';
			document.getElementById("div"+i).style.display='block';
		}else{
			document.getElementById("div"+i).style.display='none';
			show_back[i].style.backgroundPositionY='0px';
			show_server[i].style.color='black';
		}
	}
}
</script>
<script type="text/javascript">
function change_hot_type(good_id){
	var hot=document.getElementById("hot"+good_id);
	hot.style.boxShadow='5px 5px 8px 10px #888888';
}
function chagne_hot_type2(good_id){
	var hot=document.getElementById("hot"+good_id);
	hot.style.boxShadow='none';
}
function checknum(num){//商品数量监控
	var goodss_num=document.getElementById("goodss_num").value;
	if(num==''||num<=0||isNaN(num)||num%1!=0){
		alert("请输入正确的商品数量");
		var numbe=document.getElementById("nums");
		numbe.value=1;
	}else{
//		alert(num);
		if(num>parseInt(goodss_num)){
			alert('你所购买的商品数量已经超过库存，'+goodss_num+'，请重新填写');
			var numbe=document.getElementById("nums");
			numbe.value=1;
		}
	}
}
function addCart(productid){
var url="addcart.php";
var data={"good_id":productid,"num":parseInt($("#nums").val())};
var sccess=function(response){
	if(response.errno==2){
	alert('请登录');window.location.href='login.php';
	}else if(response.errno==0){
		alert("加入购物车成功");
		 $("#topa").load(location.href + " #topa");
	}else{
		alert("加入购物车失败");
	}
}
$.post(url,data,sccess,"json");
}
function check(i,image,good_id){
 var url='eximg.php';
 var data={"good_id":good_id,'i':i,'image':image};
 var success=function(response){
$("#img").html("<img  width='355' height='355' src="+response+">");
}
$.post(url,data,success,"json");
}

function open_add_cart(good_id){
	var addcart=document.getElementById("addcart");
	addcart.style.display='block';
	var add=document.getElementById("add");
	var num=document.getElementById("nums").value;
	add.onclick=function(){
		var form=new FormData();//新建一个表单
		var request=new XMLHttpRequest();
		request.open("POST","cart2.php");
		form.append("good_id",good_id);//为表单
		form.append("num",num);
		request.send(form);//发送表单数据
		request.onreadystatechange=function(){
			if(request.readyState===4){
				if(request.status===200){
					alert(request.responseText);
					location.reload();
				}else{
					alert("发生错误"+request.status);
				}
			}
		}
//		alert("我是按键");
//		alert(num);
	}
//	alert("你好");
}
</script>