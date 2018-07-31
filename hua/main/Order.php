<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>购物流程-下订单</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>  
    $(document).ready(function(){    
            $("#new").modal("show")    
    })  
    </script>   
<style>
	body{
		margin-top: 50px;
		overflow-x: hidden;
	}
	.border_image {
    margin:0 auto;
	height: 140px;
	text-align:center;
	border:35px solid;
    border-image:url(../img/wu.png) 30 round;
	}
</style>
<?php
session_start();
@$goods=$_GET['goods'];//字符串
@$nums=$_GET['nums'];//字符串
?>
<?php
include("../conn/dataconnection.php");
@session_start();
@$user_id=$_SESSION['user_id'];
$u7=mysql_query("select * from cart where user_id='$user_id'");
@$cart=mysql_num_rows($u7);
	?>

<div id="topa" class="navbar navbar-default navbar-fixed-top" role="navigation" style="width: 100%;overflow: hidden;">
		<div class="container-fluid" style="width: 80%;margin: 0 auto;text-align: center;">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">欢迎来到花间杂货铺</a>
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
				<li><a href="#">帮助中心</a></li>
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
					<li><a href="person_order.php">我的订单<span style="color: black;" class="glyphicon glyphicon-list-alt">()</span></a></li>
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
					<li><a href="person_collect.php">我的收藏()</a></li>
					<?php
				}else{
					@$store=mysql_query("select * from storegood where user_id='$user_id'");
					@$store_num=mysql_num_rows($store);
					?>
					<li><a href="login.php">我的收藏<span style="color: red;" class="glyphicon glyphicon-shopping-cart">(<?php echo $store_num; ?>)</span></a></li>
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
			</ul>
		</div>
</div>
<?php
	if(@$_SESSION['user_id']==''&&@$_SESSION['user_name']==''){
	?>
		<div class="modal fade" id="new">  
		      <div class="modal-dialog">    
		              <div class="modal-content">    
		                <div class="modal-header"> 
		                  <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">&times;</button>
		                </div>    
		                 <div class="modal-body" style="text-align: center;">
		                 	<p style="font-size: 24px;text-align: center;padding-top: 50px;">注册或登录会员可以获得积分，购物更优惠</p>
		                 	<p style="margin-top: 50px;margin-bottom: 80px;text-align: left;"><a href="Reg.php" style="margin-left: 130px;" class="btn btn-default btn-lg">去注册</a><a href="login.php" style="margin-left: 150px;" class="btn btn-danger btn-lg">去登录</a></p>
		                 </div>
		              </div>    
		     </div>    
		</div>   
<?php } ?>


<div class="container" style="width: 100%;overflow: hidden;">
		<div class="row" style="width: 80%;margin: 0 auto;margin-top: 30px;height: 82px;">
			<div class="col-md-6" style="height: 82px;background-color: white;border: 0;">
				<a href="index.php"><img src="../img/logo1.png" /></a>
			</div>
			<div class="col-md-6" style="height: 82px;background-color: white;border: 0;">
				<img style="margin-top: 5px;" src="../img/_r2_c2_2.jpg" /><br>
				<span style="margin-left:20px;">购物车<span style="margin-left: 80px;">提交订单</span><span style="margin-left: 85px;">支付</span><span style="margin-left: 110px;">完成</span></span>
			</div>
		</div>
		
		<div class="row" style="width: 95%;margin: 0 auto;">
			<div class="col-md-12" style="height: 2px;width: 100%;">
				
			</div>
		</div>
		
		
		
		<div class="row" style="width: 90%;margin: 0 auto;">
			<div class="cl-md-12" style="min-height: 300px;">
				<h3 style="text-align: center;">填写核对订单信息</h3>
					<form name="form1" class="form-horizontal" role="form" onsubmit="return checkform()" method="post" action="order_success.php">
					
					   
						<?php
							if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
							?>
							<div class="row">
								<h3><b>请选择地址</b></h3>
								<hr size="3" color="gray" />
								<?php  
									$get=mysql_query("select * from getinfo where user_id='$user_id'");
									@$get_num=mysql_num_rows($get);
									if($get_num<=0){
										?>
											<div class="form-group">
											    <label for="firstname"  class="col-sm-2 control-label">收货人名字</label>
											    <div class="col-sm-10">
											      <input type="text" style="width: 400px;height: 50px;" class="form-control" id="login_get_name" name="login_get_name" required="required" value="<?php echo @$_POST['login_get_name']; ?>" placeholder="请输入收货人名字">
											    </div>
											 </div>
											 <div class="form-group">
											    <label for="firstname" class="col-sm-2 control-label">收货人电话</label>
											    <div class="col-sm-10">
											      <input type="text" style="width: 400px;height: 50px;" class="form-control" id="login_get_tel" name="login_get_tel" required="required" value="<?php echo @$_POST['login_get_tel']; ?>" placeholder="请输入收货人电话">
											    </div>
											 </div>
												 <div class="form-group">
												    <label for="lastname" class="col-sm-2 control-label">收货地址</label>
												    <div class="col-sm-10">
												     <?php include("address.php"); ?>
												    </div>
												  </div>
												  <div class="form-group">
												    <label for="lastname" class="col-sm-2 control-label">请输入收货详细地址</label>
												    <div class="col-sm-10">
														<div class="input-group">
												            <span class="input-group-addon" id="bv"></span>
												            <input onfocus="setStyle()" type="text" style="width: 400px;height: 50px;" required="required" class="form-control" id="login_get_add" name="login_get_add" value="<?php echo @$_POST['get_add']; ?>" placeholder="请输入收货人详细地址">
												        </div>
												    </div>
												  </div>
												 <div class="form-group">
												    <label for="lastname" class="col-sm-2 control-label">收货人邮政编码</label>
												    <div class="col-sm-10">
												      <input type="text" style="width: 400px;height: 50px;" required="required" class="form-control" id="login_get_post" name="login_get_post" value="<?php echo @$_POST['login_get_post']; ?>" placeholder="请输入收货人邮政编码">
												    </div>
												  </div>
												  <div class="form-group" style="margin-left: 180px;">
												    <div class="col-sm-10">
												      <input class="btn btn-danger btn-lg" onclick="add_address()" type="button" name="tj" value="添加收货人地址" />
												    </div>
												  </div>
										<?php
									}else{
										$a=0;
										while($get_name=mysql_fetch_array($get)){
											$a++;
											if($a<=4){
												if($a==1){
													?>
													<div onclick="selectBox(<?php echo $a; ?>)" class="col-md-3" style="margin-top: 20px;">
															<p style="background-color: red;">
																<input class="get_id" checked="checked" value="<?php echo $get_name['get_id']; ?>" name="get_id" id="checkbox<?php echo $a; ?>" style="float: left;background-color: red;" type="radio" />
															</p>
														
														<div style="border: 35px solid;border-image:url(../img/you.png) 30 round;" onmouseleave="change(<?php echo $a; ?>)" onmousemove="changeBorder(<?php echo $a; ?>)" id="border_image<?php echo $a; ?>" class="border_image">
															
														<p>
															<?php echo $get_name['get_name']; ?>
															<?php
															echo $get_name['get_tel'];
															?>
														</p>
														<p>
															<?php echo $get_name['get_add']; ?>
														</p>
															
														</div>
													</div>
													<?php
												}else{
													?>
														<div onclick="selectBox(<?php echo $a; ?>)" class="col-md-3" style="margin-top: 20px;">
																<p style="background-color: red;">
																	<input class="get_id" value="<?php echo $get_name['get_id']; ?>" name="get_id" id="checkbox<?php echo $a; ?>" style="float: left;background-color: red;" type="radio" />
																</p>
															
															<div onmouseleave="change(<?php echo $a; ?>)" onmousemove="changeBorder(<?php echo $a; ?>)" id="border_image<?php echo $a; ?>" class="border_image">
																
															<p>
																<?php echo $get_name['get_name']; ?>
																<?php
																echo $get_name['get_tel'];
																?>
															</p>
															<p>
																<?php echo $get_name['get_add']; ?>
															</p>
																
															</div>
														</div>
													<?php
												}
												?>
												<?php
											}else{
												?>
												<div onclick="selectBox(<?php echo $a; ?>)" class="col-md-3 hidea" style="margin-top: 20px;display: none;">
													<p style="background-color: red;">
														<input class="get_id" value="<?php echo $get_name['get_id']; ?>" name="get_id" id="checkbox<?php echo $a; ?>" style="float: left;background-color: red;" type="radio" />
													</p>
												<div style="display: none;" onmouseleave="change(<?php echo $a; ?>)" onmousemove="changeBorder(<?php echo $a; ?>)" id="border_image<?php echo $a; ?>" class="border_image">
													
												<p>
													<?php echo $get_name['get_name']; ?>
													<?php
													echo $get_name['get_tel'];
													?>
												</p>
												<p>
													<?php echo $get_name['get_add']; ?>
												</p>
												
												</div>
											</div>
												<?php
											}
											?>
											<?php
										}
										?>
										<?php
											if($get_num<=4){
												
											}else{
												?>
												<p id="p"><a onclick="showimg()" class="btn btn-danger">显示全部地址</a></p>
												<?php
											}
											?>
										<?php
									}
									?>
							</div>
							
							<?php	
							}else{
								?>
							<button type="button" id="hidemessage" onclick="hidemess()" class="btn btn-danger">折叠起订货人和收货人信息</button>
							<div id="message">
								<h4>订货人信息</h4>
								<hr size="3" color="red" />
								  <div class="form-group">
								    <label for="firstname" class="col-sm-2 control-label">订购真实姓名</label>
								    <div class="col-sm-10">
								      <input type="text" style="width: 400px;height: 50px;" required="required" class="form-control" id="realname" name="realname" value="<?php echo @$_POST['realname']; ?>" placeholder="请输入你的真实姓名">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="lastname" class="col-sm-2 control-label">手机号码</label>
								    <div class="col-sm-10">
								      <input type="text" style="width: 400px;height: 50px;" required="required" class="form-control" id="user_tel" name="user_tel" value="<?php echo @$_POST['user_tel']; ?>" placeholder="请输入你的手机号码">
								    </div>
								  </div>
								  <div style="margin-left: 400px;" id="show_tel"></div>
								  <div class="form-group">
								    <label for="lastname" class="col-sm-2 control-label">手机验证码</label>
								    <div class="input-group" style="width: 320px;">
							            <input name="code" id="code" required="required" disabled="disabled" style="width: 210px;height: 50px;" type="text" class="form-control" placeholder="短信验证码">
										    <span class="input-group-btn" style="height: 50px;">
						                      <button id="btnSendCode" name="tj" value="tj" onclick="sendMessage()" class="btn btn-default" type="button" style="width: 150px;height: 50px;background-color: orange;color: white;border: 1px solid #e43a3d;">发送手机验证码</button>
						                    </span>
							        </div>
								  </div>
								  <div id="show_code"></div>
									<div id="hi_login" style="display: none;" class="form-group">
										<div class="col-sm-offset-2 col-sm-10" style="background-color: white;">
											<button style="width: 140px;" type="button" onclick="login('登录')" name="tj" class="btn btn-danger btn-lg">登录</button>
										</div>
									</div>
									<div id="hi_check_code" style="display: block;" class="form-group">
										<div class="col-sm-offset-2 col-sm-10" style="background-color: white;">
											<button style="width: 140px;" type="button" onclick="check_code()" name="tj" class="btn btn-danger btn-lg">验证手机号码</button>
										</div>
									</div>
									
								   
								 
								  <h4>收货人信息</h4>
								  <hr size="3" color="red" />
								  <div class="form-group">
								    <label for="lastname" class="col-sm-2 control-label">收货人姓名</label>
								    <div class="col-sm-10">
								      <input type="text" style="width: 400px;height: 50px;" required="required" class="form-control" id="get_name" name="get_name" value="<?php echo @$_POST['get_name']; ?>"  placeholder="请输入收货人姓名">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="lastname" class="col-sm-2 control-label">收货地址</label>
								    <div class="col-sm-10">
								     <?php include("address.php"); ?>
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="lastname" class="col-sm-2 control-label">请输入收货详细地址</label>
								    <div class="col-sm-10">
										<div class="input-group">
								            <span class="input-group-addon" id="bv"></span>
								            <input onfocus="setStyle()" type="text" style="width: 400px;height: 50px;" required="required" class="form-control" id="get_add" name="get_add" value="<?php echo @$_POST['get_add']; ?>" placeholder="请输入收货人详细地址">
								        </div>
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="lastname" class="col-sm-2 control-label">收货人邮政编码</label>
								    <div class="col-sm-10">
								      <input type="text" style="width: 400px;height: 50px;" required="required" class="form-control" id="get_post" name="get_post" value="<?php echo @$_POST['get_post']; ?>" placeholder="请输入收货人邮政编码">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="lastname" class="col-sm-2 control-label">收货人手机号码</label>
								    <div class="col-sm-10">
								      <input type="text" style="width: 400px;height: 50px;" required="required" class="form-control" id="get_tel" name="get_tel" placeholder="请输入收货人手机号码" value="<?php echo @$_POST['get_tel']; ?>">
								    </div>
								  </div>
								  	<?php
							}
						?>
								  <div class="form-group" style="margin-top: 30px;">
								    <label for="lastname" class="col-sm-2 control-label">贺卡内容</label>
								    <div class="col-sm-10">
								      <textarea class="form-control" style="width: 400px;height: 150px;" placeholder="请输入内容" name="get_hua" id="get_hua" value="<?php echo @$_POST['get_hua']; ?>"></textarea>
								    </div>
								  </div>
								  </div>
								  
					  
					  <h4>购买清单</h4>
					  <table class="table table-hover">
					  	<tbody>
					  		<?php
							$good_ids= explode(',',$goods);
							$numss= explode(',',$nums);
							$total=0; 
							for($index=0;$index<count($good_ids);$index++) 
							{ 
								@$aa=mysql_query("select * from goods where good_id='$good_ids[$index]' and good_num=0");
								@$a_num=mysql_num_rows($aa);
								if($a_num>0){
									
								}else{
							   $sql=mysql_query("select * from goods where good_id='$good_ids[$index]'");
							   @$n=mysql_num_rows($sql);
							  if(@$n<=0){
							  	
							  }else{
							  	$good=mysql_fetch_array($sql);
							  	$total=$total+$numss[$index]*$good['good_price'];
							  	?>
							  	<input type="hidden" name="goods[]" value="<?php echo $good['good_id']; ?>" />
							  	<input type="hidden" name="nums[]" value="<?php echo $numss[$index]; ?>" />
							  	<tr style="text-align: center;">
							  		<td style="width: 150px;">
										<a href="see_good.php?good_id=<?php echo $good['good_id'] ?>" class="thumbnail">
								            <img src="<?php echo $good['main_img']; ?>"
								                 alt="通用的占位符缩略图">
								        </a>
							  		</td>
							  		<td style="line-height: 150px;">商品名称：<a href="see_good.php?good_id=<?php echo $good['good_id']; ?>"><?php echo $good['good_name']; ?></a><input type="hidden" name="names[]" value="<?php echo $good['good_name']; ?>"></td>
							  		<td style="line-height: 150px;">单价：￥<?php echo $good['good_price']; ?><input type="hidden" name="prices[]" value="<?php echo $good['good_price']; ?>"></td>
							  		<td style="line-height: 150px;">数量:<?php echo $numss[$index]; ?></td>
							  		<td style="line-height: 150px;">小计：<?php echo $numss[$index]*$good['good_price']; ?></td>
							  	</tr>
							  	<?php
							  }
							  }
							} 
					  			?>
					  	</tbody>
					  </table>
					  <h4>支付方式</h4>
					  <hr size="3" color="#eee" />
						<ul id="myTab" class="nav nav-tabs">
							<li class="active">
								<a href="#home" data-toggle="tab">
									在线支付
								</a>
							</li>
							<li><a href="#ios" data-toggle="tab">线下银行支付</a></li>
							<li><a href="#jmeter" data-toggle="tab">货到付款</a></li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div class="tab-pane fade in active" id="home">
								<?php
									$ss=mysql_query("select * from getmoney where get_money='在线支付'");
									@$x=mysql_num_rows($ss);
									if($x<=0){
										?>
										<span>暂无在线支付方式</span>
										<?php
									}else{
										?>
										<table>
											<tr>
										<?php
										while($mymoney=mysql_fetch_array($ss)){
											?>
											<td>
												<input required="required" type="radio" name="money_id" id="money_id<?php echo $mymoney['money_id']; ?>" value="<?php echo $mymoney['money_id']; ?>" /><img onclick="Select(<?php echo $mymoney['money_id']; ?>)" src="<?php echo $mymoney['get_img']; ?>" />
											</td>
											
											<?php
										}
										?>
										</tr>
										</table>
										<?php
									}
									?>
							</div>
							<div class="tab-pane fade" id="ios">
								<?php
									$sss=mysql_query("select * from getmoney where get_money='线下银行支付'");
									@$xx=mysql_num_rows($ss);
									if($xx<=0){
										?>
										<span>暂无线下银行支付</span>
										<?php
									}else{
										?>
										<table>
										<tr>
										<?php
										while($money=mysql_fetch_array($sss)){
											?>
											
											<td style="width: 300px;">
												<input required="required" type="radio" name="money_id" id="money_id<?php echo $money['money_id']; ?>" value="<?php echo $money['money_id']; ?>" /><img onclick="Select(<?php echo $money['money_id']; ?>)" style="width: 170px;" src="<?php echo $money['get_img']; ?>" />
											</td>
											
											
											<?php
										}
										?>
											</tr>
											</table>
										<?php
									}
									?>
							</div>
							<div class="tab-pane fade" id="jmeter">
								<?php
									$ssss=mysql_query("select * from getmoney where get_money='货到付款'");
									@$xxx=mysql_num_rows($ssss);
									if($xxx<=0){
										?>
										<span>暂无在线支付</span>
										<?php
									}else{
										while($moneya=mysql_fetch_array($ssss)){
											?>
											<input required="required" type="radio" name="money_id" id="money_id<?php echo $moneya['money_id']; ?>" value="<?php echo $moneya['money_id']; ?>" /><img onclick="Select(<?php echo $moneya['money_id']; ?>)" style="width: 120px;" src="<?php echo $moneya['get_img']; ?>" />
											<?php
										}
									}
									?>
							</div>
						</div>
					   
					   <h4 style="margin-top: 60px;">费用清单</h4>
					   <hr size="5" color="black" />
						 <?php
						if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
							?>
								 <div class="form-group" style="float: right;">
								    	<?php
								    		@$j=mysql_query("select * from user where user_id='$user_id'");
								    		@$j_u=mysql_fetch_array($j);
								    		@$mm=$j_u['money'];
								    		?>
								    <input type="hidden" name="total" value="<?php echo $total-$mm; ?>"/>
								    <input type="hidden" name="cheap" value="<?php echo $mm; ?>" />
								    <p style="font-size: 24px;line-height: 50px;">总金额:￥<?php echo $total; ?></p>
								    <p style="font-size: 24px;">帐户优惠:￥<?php echo $mm; ?></p>
								    <p style="font-size: 24px;line-height: 50px;margin-right: 100px;">实付价:￥<?php echo $total-$mm; ?></p>
								  </div>
							<?php
						}else{
							?>
							<div class="form-group" style="float: right;">
							    <input type="hidden" name="total" value="<?php echo $total; ?>"/>
							    <p style="font-size: 24px;line-height: 50px;margin-right: 100px;">实付价:￥<?php echo $total;?></p>
							 	<p style="font-size: 24px;">帐户优惠:￥0</p>
							 	<p style="font-size: 24px;line-height: 50px;">总金额:￥<?php echo $total; ?></p>
							  </div>
							<?php
						}
						?>
					  
					  
					  <?php
					  	if(@$_SESSION['user_id']==''&&@$_SESSION['user_name']==''){
					  		?>
							 <div id="get_address" style="display: none;">
							  <div class="form-group">
							    <div class="col-sm-10">
							      <button style="float: right;width: 120px;height: 50px;" type="submit" class="btn btn-danger">提交订单</button>&nbsp;&nbsp;&nbsp;
							      <a style="width: 120px;height: 50px;line-height: 35px;" type="button" class="btn btn-danger">返回购物车</a>
							    </div>
							  </div>
							  </div>
							  <div id="first" class="form-group">
							    <div class="col-sm-10">
							      <span style="float: right;width: 160px;height: 50px;" type="button" class="btn btn-danger">请先验证手机验证码</span>&nbsp;&nbsp;&nbsp;
							      <a style="width: 120px;height: 50px;line-height: 35px;" type="button" class="btn btn-danger">返回购物车</a>
							    </div>
							  </div>
					  		<?php
					  	}else{
					  		?>
					  		<?php
					  			if(@$get_num<=0){
					  				?>
					  		<div id="nnew" class="form-group" style="display: none;">
							    <div class="col-sm-10">
							      <button style="float: right;width: 120px;height: 50px;" type="submit" class="btn btn-danger">提交订单</button>&nbsp;&nbsp;&nbsp;
							      <a style="width: 120px;height: 50px;line-height: 35px;" type="button" class="btn btn-danger">返回购物车</a>
							    </div>
							  </div>
							  
							<div id="nnew_address" style="display:block;">
					  		 <div class="form-group">
							    <div class="col-sm-10">
							      <button style="float: right;width: 180px;height: 50px;" type="button" class="btn btn-danger">请先提交收货人地址信息</button>&nbsp;&nbsp;&nbsp;
							      <a style="width: 120px;height: 50px;line-height: 35px;" type="button" class="btn btn-danger">返回购物车</a>
							    </div>
							  </div>
							  </div>
					  				<?php
					  			}else{
					  				?>
							  			<div class="col-sm-10">
									      <button style="float: right;width: 120px;height: 50px;" type="submit" class="btn btn-danger">提交订单</button>&nbsp;&nbsp;&nbsp;
									      <a style="width: 120px;height: 50px;line-height: 35px;" type="button" class="btn btn-danger">返回购物车</a>
									    </div>
					  				<?php
					  			}
					  			?>
					  		<?php
					  	}
					  	?>
					</form>
			</div>
		</div>
		
		<?php include("footer.php"); ?>
</div>

<script type="text/javascript">
function check_code(){
	var code=document.getElementById("code").value;
	if(code==''){
		alert("请填写你的验证码");
		document.getElementById("code").focus();
	}else{
		var url="check_Order_code.php";
		var data={"code":code};
		var success=function(resposne){
			if(resposne.errno==0){
				alert("验证码不正确,请重新填写");
				var show_code=document.getElementById("show_code");
				$("#show_code").html("<span class='glyphicon glyphicon-exclamation-sign' style='color:red;margin-left:130px'></span><span style='color:red;'>验证码不正确</span>");
			}else{
				alert("验证成功");
				$("#show_code").html("<span class='glyphicon glyphicon-exclamation-sign' style='color:green;margin-left:130px'></span><span style='color:green;'>验证码正确</span>");
				var get_address=document.getElementById("get_address");
				get_address.style.display='block';
				var user_tel=document.getElementById("user_tel");
//				user_tel.setAttribute('disabled','disabled');
//				user_tel.style.display='none';
				user_tel.setAttribute('readonly','readonly');
//				var show_tel=document.getElementById("show_tel");
//				show_tel.innerText=user_tel.value;
				var first=document.getElementById("first");
				first.style.display='none';
				var btnSendCode=document.getElementById("btnSendCode");
				btnSendCode.setAttribute('disabled','disabled');
			}
		}
		$.post(url,data,success,"json");
	}
}


function add_address(){
	var login_get_name=document.getElementById("login_get_name").value;
	var login_get_add=document.getElementById("login_get_add").value;
	var login_get_tel=document.getElementById("login_get_tel").value;
	var login_get_post=document.getElementById("login_get_post").value;
   	var a=form1.province.value;
	var b=form1.city.value;
	var c=form1.area.value;
   	var myreg=/^[1][3,4,5,7,8][0-9]{9}$/; 
   	if(login_get_name==''){
   		alert("请填写收货人姓名");
   		document.getElementById("login_get_name").focus();
   	}else if(!myreg.test(login_get_tel)){  
           alert("请正确填写收货人手机号码");
           document.getElementById("login_get_tel").focus();
          }else if((a=='请选择省份')||(a=='')||(b=='请选择城市')||(b=='')||(c=='请选择地区')||(c=='')){
          	alert("请正确选择收货人地址");
          }else if(login_get_add==''){
          	alert("请正确填写收货人详细地址");
          	document.getElementById("login_get_add").focus();
          }else if(login_get_post==''){
          	alert("请正确填写收货人邮政编码");
          	document.getElementById("login_get_post").focus();
          }else{
          	var add=a+b+c+login_get_add;
          	var url="add_address_order.php";
          	var data={"get_name":login_get_name,"get_tel":login_get_tel,"get_add":add,"get_post":login_get_post};
          	var success=function(response){
          		if(response.errno=1){
          			location.reload();
          		}else{
          			alert("添加失败，请稍后再试");
          		}
          	}
          	$.post(url,data,success,"json");
          	
          }
    
}





    function hidemess(){
    	var message=document.getElementById("message");
    	var varl=message.style.display;
    	if(varl=='none'){
					message.style.display='block';
				}else{
					message.style.display='none';
				}
    }
	
	function Select(menoey){
		var ra=document.getElementById("money_id"+menoey);
		ra.checked=true;
	}
	
	function checkform(){
//		alert("你好");
    var inputs=form1.getElementsByTagName('input');
    for(i=0;i<inputs.length;i++){
        if(inputs[i].value==''){
            inputs[i].focus();
            return false;
        }
    }
   	var tel=form1.user_tel.value;
   	var tel1=form1.get_tel.value;
   	var a=form1.province.value;
	var b=form1.city.value;
	var c=form1.area.value;
   	var myreg=/^[1][3,4,5,7,8][0-9]{9}$/; 
   	if (!myreg.test(tel)){ 
   		alert("请正确填写订购人手机号码");
           return false;  
         }else if(!myreg.test(tel1)){  
           alert("请正确填写收货人手机号码");
           document.getElementById("get_tel").focus();
           return false;  
          }else if((a=='请选择省份')||(a=='')||(b=='请选择城市')||(b=='')||(c=='请选择地区')||(c=='')){
          	alert("请正确选择收货人地址");
           return false; 
          }else if(form1.money_id.value==''){
          	alert('请选择付款方式');
          	return false;
          }else{
          	return true;
          }
          return false;
    
}
function setStyle(){
	var a=form1.province.value;
	var b=form1.city.value;
	var c=form1.area.value;
	var d=a;
	d=d+b;
	d=d+c;
	$("#bv").html(d);
	
}

$(function (){
	setInterval("getTime()",1000);
});
	function getTime(){
		var data=new Date();
		var mydate=data.toLocaleDateString();//2018/4/27
		var hours=data.getHours();
		var minutes=data.getMinutes();
		var seconds=data.getSeconds();
		$("#timeShow").html(mydate+" "+hours+":"+minutes+":"+seconds);
	}
function changeBorder(i){
	var image_border=document.getElementById("border_image"+i);
	image_border.style.border='35px solid';
	image_border.style.borderImage='url(../img/you.png) 30 round';
}
function change(i){
	var image_border=document.getElementById("border_image"+i);
	image_border.style.border='35px solid';
	image_border.style.borderImage='url(../img/wu.png) 30 round';
	var border_image=document.getElementsByClassName('border_image');
	var get_id=document.getElementsByClassName("get_id");
	for(var i=0;i<get_id.length;i++){
		if(get_id[i].checked==false){
			border_image[i].style.backgroundColor='white';
			border_image[i].style.border='35px solid';
			border_image[i].style.borderImage='url(../img/wu.png) 30 round';
		}
		if(get_id[i].checked==true){
			border_image[i].style.border='35px solid';
			border_image[i].style.borderImage='url(../img/you.png) 30 round';
		}
	}
	
}
function showimg(){
	var hidea=document.getElementsByClassName("hidea");
	var showimg=document.getElementsByClassName("border_image");
	for(var i=5;i<=showimg.length;i++){
		var border_image=document.getElementById("border_image"+i);
		border_image.style.display='block';
	}
	for(var j=0;j<hidea.length;j++){
		hidea[j].style.display='block';
	}
	var p=document.getElementById("p");
	p.style.display='none';

}
function selectBox(i){
	var border_image=document.getElementById("border_image"+i);
	var checkB=document.getElementById("checkbox"+i);
	checkB.checked='checked';
	var a=border_image.style.borderImage;
	border_image.style.backgroundColor='#F8F4E8';
}

var InterValObj; //timer变量，控制时间  
var count =90; //间隔函数，1秒执行  
var curCount;//当前剩余秒数  
function sendMessage(){  
	var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
	var tel=document.getElementById("user_tel");
     var phone=tel.value;
     if(!myreg.test(phone)){
     	alert("请正确输入你的手机号码");
     	document.getElementById("user_tel").focus();
     }else{
     	  	var url="check_tel.php";
		    var data={"tel":phone};
		    var success=function(resposne){
    			if(resposne.errno==1){
    				$("#show_tel").html("<span class='glyphicon glyphicon-exclamation-sign' style='color:red;margin-left:130px'></span><span style='color:red;'>手机号码已经被注册</span>");
    				var yes=confirm("该手机号码已经被注册,是否发送验证码进行登录操作？");
    				if(yes){
    					var hi_check_code=document.getElementById("hi_check_code");
    					var hi_login=document.getElementById("hi_login");
    					hi_login.style.display='block';
    					hi_check_code.style.display='none';
	    				curCount = count;  
					　　//设置button效果，开始计时  
					     document.getElementById("btnSendCode").setAttribute("disabled","disabled");
					     document.getElementById("btnSendCode").innerText="请在" + curCount + "秒内输入验证码";
					     InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次  
					　　  //向后台发送处理数据  
					    	var url="Login_code.php";
					    	var data={"phone":phone};
					    	var success=function(curl){
					    		if(curl.Code=='OK'){
					    			alert('发送成功');
					    			document.getElementById("code").removeAttribute("disabled");
					    		}else if(curl.Code=='101'){
					    			alert('手机号码错误');
					    		}else if(curl.Code=='102'){
					    			alert('验证码内容过长(超过20位)');
					    		}else if(curl.Code=='isv.BUSINESS_LIMIT_CONTROL'){
					    			alert('每分钟对同一手机号多次重复发送,请稍后再试');
					    		}
					    	}
					    	$.post(url,data,success,"json");
    				}else{
    					var hi_login=document.getElementById("hi_login");
    					hi_login.style.display='none';
    				}
    			}else{
    				document.getElementById("btnSendCode").removeAttribute("disabled");
    				$("#show_tel").html("<span class='glyphicon glyphicon-exclamation-sign' style='color:blue;margin-left:130px'></span><span style='color:blue;'>手机号码格式正确</span>");
			    	curCount = count;  
				　　//设置button效果，开始计时  
				     document.getElementById("btnSendCode").setAttribute("disabled","disabled");
				     document.getElementById("btnSendCode").innerText="请在" + curCount + "秒内输入验证码";
				     InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次  
				　　  //向后台发送处理数据  
				    	var url="Login_code.php";
				    	var data={"phone":phone};
				    	var success=function(curl){
				    		if(curl.Code=='OK'){
				    			alert('发送成功');
				    			document.getElementById("code").removeAttribute("disabled");
				    		}else if(curl.Code=='101'){
				    			alert('手机号码错误');
				    		}else if(curl.Code=='102'){
				    			alert('验证码内容过长(超过20位)');
				    		}else if(curl.Code=='isv.BUSINESS_LIMIT_CONTROL'){
				    			alert('每分钟对同一手机号多次重复发送,请稍后再试');
				    		}
				    	}
				    	$.post(url,data,success,"json");
    			}
    		}
    		
    	$.post(url,data,success,"json");
     	
     }
}  
function login(mess){
		var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
		var tel=document.getElementById("user_tel").value;
			var code=document.getElementById("code").value;
			if(!myreg.test(tel)){
				alert("请正确填写你的手机号码");
				document.getElementById("user_tel").focus();
			}else if(code==''){
				alert("请填写你的手机验证码");
				document.getElementById("code").focus();
			}else{
				var url="login_success_ok.php";
			var data={"tel":tel,"code":code,"mess":mess};
			var success=function(response){
				if(response.errno==2){
					alert("登录成功");
					location.reload();
				}else if(response.errno==1){
					alert("验证码不正确，请重新输入");
				}else if(response.errno==3){
					alert("此手机号码没有注册");
				}else{
					alert("系统出错了，请反馈");
				}
			}
			$.post(url,data,success,"json");
			}
		}
//timer处理函数  
function SetRemainTime() {  
            if (curCount == 0) {                  
                window.clearInterval(InterValObj);//停止计时器  
                document.getElementById("btnSendCode").removeAttribute("disabled");//启用按钮  
               document.getElementById("btnSendCode").innerText="重新发送验证码";  
            }  
            else {  
                curCount--;  
                document.getElementById("btnSendCode").innerText="请在" + curCount + "秒内输入验证码";
            }  
       }  
</script>