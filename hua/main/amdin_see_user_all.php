<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>用户全部信息</title>
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
<div class="container" style="width: 100%;">
<?php
	session_start();
	include_once("../conn/dataconnection.php");
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		@$user_id=$_GET['user_id'];
		?>
	   <?php  include("m_top.php"); ?>
	   	<div class="row">
	   		<div class="col-md-12" style="text-align: center;">
	   			<span style="font-size: 24px;">用户编号为:<?php echo @$user_id; ?>的全部信息</span>
	   		</div>
	   	</div>
	   	<div class="row">
	   		<div class="col-md-12">
	   			<table class="table table-hover" style="text-align: center;">
	   				<caption style="text-align: center;font-size: 20px;">用户的注册信息</caption>
	   				<thead>
	   					<tr>
	   						<th>用户编号</th>
	   						<th>用户名</th>
	   						<th>用户密码</th>
	   						<th>用户真实姓名</th>
	   						<th>用户性别</th>
	   						<th>用户手机号码</th>
	   						<th>用户注册时间</th>
	   						<th>邮箱</th>
	   						<th>ip</th>
	   						<th>积分</th>
	   						<!--<th>经验值</th>-->
	   						<th>金额</th>
	   						<th>操作</th>
	   					</tr>
	   				</thead>
	   				<tbody>
	   					<?php
	   						@$sql=mysql_query("select * from user where user_id='$user_id'");
	   						@$sql_num=mysql_num_rows($sql);
	   						if(@$sql_num<=0){
	   							?>
	   							<span>暂时无法查看该用户的信息</span>
	   							<?php
	   						}else{
	   							@$user=mysql_fetch_array($sql);
	   							?>
	   							<tr>
	   								<td><?php echo $user['user_id']; ?></td>
	   								<td><?php echo $user['user_name']; ?></td>
	   								<td><?php echo $user['user_pass']; ?></td>
	   								<td><?php echo $user['realname']; ?></td>
	   								<td><?php echo $user['sex'] ?></td>
	   								<td><?php echo $user['user_tel'] ?></td>
	   								<td><?php echo $user['user_time']; ?></td>
	   								<td><?php echo $user['email'] ?></td>
	   								<td><?php echo $user['ip'] ?></td>
	   								<td><?php echo $user['jifen']; ?></td>
	   								<!--<td><?php echo $user['jingyan']; ?></td>-->
	   								<!--<td><?php
	   									@$type_id=$user['type_id'];
	   									@$s=mysql_query("select * from user_type where type_id='$type_id'");
	   									@$ss=mysql_fetch_array($s);
	   									echo $ss['type_name'];
	   									?></td>-->
	   									<td><?php echo $user['money']; ?></td>
	   									<td>
	   										<button onclick="del_user(<?php echo $user['user_id']; ?>)" class="btn btn-default">删除</button>
	   									</td>
	   							</tr>
	   							<?php
	   						}
	   						?>
	   				</tbody>
	   			</table>
	   			<div id="user_book" class="row">
	   				<div class="col-md-12">
	   			<table class="table table-hover">
	   				<caption style="text-align: center;font-size: 20px;">用户的订单信息</caption>
	   				<thead>
	   					<tr>
	   						<th>订单编号</th>
	   						<th>收货人编号</th>
	   						<th>订单总金额</th>
	   						<th>订单状态</th>
	   						<th>下单时间</th>
	   						<th>发货时间</th>
	   						<th>收货时间</th>
	   						<th>付款方式</th>
	   						<th>所用积分</th>
	   						<th>操作</th>
	   					</tr>
	   				</thead>
	   				<tbody>
	   					<?php
	   						@$s_book=mysql_query("select * from book where user_id='$user_id'");
	   						@$s_book_num=mysql_num_rows($s_book);
	   						if(@$s_book_num<=0){
	   							?>
	   							<tr>
	   								<td colspan="9" style="text-align: center;font-size: 24px;">此用户无订单</td>
	   							</tr>
	   							<?php
	   						}else{
	   							while($b=mysql_fetch_array($s_book)){
	   								?>
	   								<tr>
	   									<td><?php echo $b['book_id']; ?></td>
	   									<td><?php echo $b['get_id']; ?></td>
	   									<td>￥<?php echo $b['sum_price']; ?></td>
	   									<td><?php echo $b['state']; ?></td>
	   									<td><?php echo $b['book_time'] ?></td>
	   									<td><?php echo $b['send_time']; ?></td>
	   									<td><?php echo $b['get_time']; ?></td>
	   									<td><?php 
	   										@$get_id=$b['money_id'];
	   										@$bb=mysql_query("select * from getmoney where money_id='$get_id'");
	   										@$bb_num=mysql_num_rows($bb);
	   										if($bb_num<=0){
	   											echo "该付款方式已经不启用";
	   										}else{
	   											$a=mysql_fetch_array($bb);
	   											echo $a['get_type'];
	   											?>
	   											
	   											<?php
	   										}
	   										 ?></td>
	   										 <td><?php
	   										 	echo $b['cheap'];
	   										 	?></td>
	   										 	<td><a href="amin_see_select_user.php?book_id=<?php echo $b['book_id']; ?>" class="btn btn-default">查看更多</a></td>
	   								</tr>
	   								<?php
	   							}
	   						}
	   						?>
	   				</tbody>
	   			</table>
	   			</div>
	   		</div>
	   		<input type="hidden" id="user_id" value="<?php echo $user_id ?>"  />
	   		<div class="row" id="user_get">
	   			<div class="col-md-12">
	   				<table class="table table-hover">
	   					<caption style="text-align: center;font-size: 20px;">用户收货地址</caption>
	   					<thead>
	   						<tr>
	   							<th>
	   								收货编号
	   							</th>
	   							<th>
	   								收货人姓名
	   							</th>
	   							<th>收货手机</th>
	   							<th>收货地址</th>
	   							<th>收货邮政编码</th>
	   						</tr>
	   					</thead>
	   					<tbody>
	   						<?php
	   							@$user_get=mysql_query("select * from getinfo where user_id='$user_id'");
	   							@$user_get_num=mysql_num_rows($user_get);
	   							if(@$user_get_num<=0){
	   								?>
	   								<tr>
	   									<td colspan="5" style="text-align: center;">此用户暂时无收货地址</td>
	   								</tr>
	   								<?php
	   							}else{
	   								while(@$u_g=mysql_fetch_array($user_get)){
	   									?>
	   									<tr>
	   										<td><?php echo $u_g['get_id']; ?></td>
	   										<td><?php echo $u_g['get_name']; ?></td>
	   									    <td><?php echo $u_g['get_tel']; ?></td>
	   									    <td><?php echo $u_g['get_add']; ?></td>
	   									    <td><?php echo $u_g['get_post']; ?></td>
	   									</tr>
	   									<?php
	   								}
	   							}
	   							?>
	   					</tbody>
	   				</table>
	   			</div>
	   		</div>
	   		
	   		<div class="row">
	   			<div class="col-md-12">
	   				<table class="table table-hover">
	   					<caption style="text-align: center;font-size: 20px;">用户评价</caption>
	   					<?php
	   						@$comments=mysql_query("select * from comments where user_id='$user_id'");
	   						@$comments_num=mysql_num_rows($comments);
	   						if(@$comments_num<=0){
	   							?>
	   							<tr>
	   								<td colspan="5" style="text-align: center;">此用户暂时没有评价<?php echo $comments_num; ?></td>
	   							</tr>
	   						<?php
	   						}else{
	   							while($con=mysql_fetch_array($comments)){
	   								?>
	   								<?php
	   												@$good_id=$con['good_id'];
	   												@$g=mysql_query("select * from goods where good_id='$good_id'");
	   												@$gg=mysql_fetch_array($g);
	   												?>
	   								<tr>
	   									<td>
	   										<div class="thumbnail" style="width: 200px;">
	   											<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $good_id ?>">
	   											<h4 style="text-align: center;">评价商品</h4>
	   											
	   											<img style="width: 150px;height: 150px;" src="<?php echo $gg['main_img']; ?>"/>
	   											<div class="caption" style="text-align: center;">
	   												<?php echo $gg['good_name']; ?>
	   											</div>
	   											</a>
	   										</div>
	   									</td>
	   									<td>
	   										<div class="thumbnail" style="width: 230px;height: 250px;text-align: center;">
	   											<h4 style="text-align: center;">评价图片</h4>
	   											<?php
	   												if($con['content_img']==''){
	   													echo "无评价图片";
	   												}else{
	   													?>
	   													<img style="width: 150px;height: 150px;" src="<?php echo $con['content_img']; ?>" />
	   												<?php
	   												}
	   												?>
	   														<div class="caption" style="text-align: center;">
																<?php
											    				$xinxin=$con['xinxin'];
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
	   										<h4>评价内容:</h4>
	   										<p>
	   											<?php echo $con['content']; ?>
	   										</p>
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
	   	
	   	<div class="row" id="hidden_book" onclick="colse()" style="display: none;">
			<div class="col-md-12" style="width: 100%;height: 100%;background: rgba(0,0,0,0.5);position: fixed;left: 0;top: 0;z-index: 2;">
				
			</div>
		</div>
		<div id="see_book" class="row" style="display: none;width: 70%;margin: 0 auto;height:600px;background-color: white;position: fixed;top: 10%;left:15%;z-index: 3;overflow: scroll;">
				<div class="col-md-12" style="margin: 0 auto;padding: 0;">
					<div class="panel panel-default" style="border-radius: 0;">
					    <div class="panel-heading" style="border-radius: 0;">
					        订单详情<span onclick="colse()" style="display: inherit;float: right;font-size:24px;text-align: center;" class="glyphicon glyphicon-remove"></span>
					    </div>
					    <div class="panel-body" id="show_order">
					    </div>
					    <button onclick="colse()" style="float: right;margin-top: 30px;margin-bottom: 20px;margin-right: 50px;" class="btn btn-default">关闭</button>
					</div>	
				</div>
		</div>
	   	
</div>
	<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>
	

<script type="text/javascript">
function del_user(user_id){//删除用户
	var y=confirm('确定要删除该用户，此用户的所有信息都会被清空？是否是删除？');
	if(y){
	var url="del_user.php";
	var data={"user_id":user_id};
	var success=function(response){
		if(response.errno==0){
			alert("该用户还有订单未签收，不能删除");
		}else if(response.errno==2){
			alert("删除成功2");
			location.reload();
		}else{
			alert("删除成功");
			location.reload();
		}
	}
	$.post(url,data,success,"json");
	}
	
}
</script>