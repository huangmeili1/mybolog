<style>
	body{
		margin-top: 50px;
	}
	/*[class *= col-]{
  background-color: #eee;
}*/
#p li{
		 list-style: none outside none;
		float: left;
		margin-top: 30px;
		
	}
	#uul li a:hover{
	background-color: #cc0303;
	color: white;
}
#uul li a:visited{
	background-color: #cc0303;
}
body{
	 overflow:-Scroll;
	 overflow-x:hidden
}
</style>
<?php
include("../conn/dataconnection.php");
@session_start();
@$user_id=$_SESSION['user_id'];
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
						<li><a href="person_sign.php">退出</a></li>
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
			        <div class="navbar navbar-default" role="navigation" style="width: 100%;margin: 0;background-color: transparent;border: 0;">
			         	<div class="container-fluid" style="margin-left: 200px;">
			         		<div class="navbar-header dropdown">
			         			<button style="border: 0;background-color: #e33939;" class="navbar-brand dropdown-toggle" data-toggle="dropdown" href="#" style="background-color: #e33939;color: white;">全部商品分类
			         				<span style="margin-left: 20px;" class="glyphicon glyphicon-th-list"></span>
			         			</button>
									<ul id="uul" class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" style="background-color: #e33939;border-radius: 0;margin-left: -15px;">
								        <li role="presentation">
								            <a id="button5" style="color: white;line-height: 70px;" role="menuitem" tabindex="-1" href="#" data-stopPropagation="true">按节日送礼
								            <span style="margin-left: 40px;" class="glyphicon glyphicon-chevron-down"></span>
								            </a>
								            <div id="div5" style="height: auto;width: 100%;background-color: white;display: none;" data-stopPropagation="true">
								            <table style="margin-left: 5px;">
								            		<tr>
								            			<td align="center"><a href="graduation.php">毕业</a></td>
								            			<td width="80" height="50" align="center"><a href="newyear.php">春节</a></td>
								            			<td width="80" height="50" align="center"><a href="qingrenjie.php">情人</a></td>
								            			
								            		</tr>
								            		<tr>
								            			<td width="80" height="50" align="center"><a href="chongyangjie.php">重阳</a></td>
								            			<td align="center"><a href="womanday.php">妇女节</a></td>
								            			<td align="center"><a href="fater.php">父亲节</a></td>
								            		</tr>
								            		<tr>
								            			<td align="center"><a href="hushijie.php">护士节</a></td>
								            			<td width="80" height="50" align="center"><a href="duanwujie.php">端午节</a></td>
								            			<td align="center"><a href="yuandanjie.php">元旦</a></td>
								            		</tr>
								            		<tr>
								            			<td align="center"><a href="zhongqiu.php">中秋</a></td>
								            			<td width="80" height="50" align="center"><a href="teacher.php">教师</a></td>
								            			
								            			<td width="80" align="center"><a href="thanksday.php">感恩节</a></td>
								            		</tr>
								            		<tr>
								            			<td><a href="MothersDay.php">母亲节</a></td>
								            		</tr>
								            		
								            </table>
								            </div>
								        </li>
								         <li role="presentation" class="divider" style="margin: 0;"></li>
								        <li role="presentation" style="margin: 0;">
								            <a id="button1" style="color: white;line-height: 70px;margin: 0;" role="menuitem" tabindex="-1" href="#" data-stopPropagation="true">按用途送礼
								            	<span style="margin-left: 40px;" class="glyphicon glyphicon-chevron-down"></span>
								            </a>
								            
								            <div id="div1" style="height: auto;width: 100%;background-color: white;display: none;" data-stopPropagation="true">
								            	<table style="margin-left: 5px;">
								            		<tr>
								            			<td align="center"><a href="Love.php">爱情</a></td>
								            			<td width="80" height="50" align="center"><a href="friend.php">友情</a></td>
								            		</tr>
								            		<tr>
								            			<td width="80" align="center"><a href="brith.php">生日</a></td>
								            			<td width="80" height="50" align="center"><a href="elder.php">问候长辈</a></td>
								            		</tr>
								            		<tr>
								            			<td align="center"><a href="sorry.php">道歉</a></td>
								            			<td width="80" height="50" align="center"><a href="visted.php">探病慰问</a></td>
								            		</tr>
								            		<tr>
								            			<td align="center"><a href="zhuhe.php">祝贺</a></td>
								            			<td width="80" height="50" align="center"><a href="hunqing.php">婚庆</a></td>
								            		</tr>	
								            		<tr>
								            			<td align="center"><a href="business.php">开业乔迁</a></td>
								            			<td width="80" height="50" align="center"></td>
								            		</tr>
								            	</table>
								            </div>
								        </li>
								        
								        <li role="presentation" class="divider" style="margin: 0;"></li>
								        <li role="presentation">
								            <a id="button2" style="color: white;line-height: 70px;" role="menuitem" tabindex="-1" href="#" data-stopPropagation="true">按花材送礼
								            <span style="margin-left: 40px;" class="glyphicon glyphicon-chevron-down"></span>
								            </a>
								            
								            <div id="div2" style="height: auto;width: 100%;background-color: white;display: none;" data-stopPropagation="true">
								            	<table style="margin-left: 5px;">
								            		<tr>
								            			<td align="center"><a href="category.php?type=玫瑰">玫瑰</a></td>
								            			<td width="80" height="50" align="center"><a href="category.php?type=红玫瑰">红玫瑰</a></td>
								            		</tr>
								            		<tr>
								            			<td width="80" align="center"><a href="category.php?type=粉玫瑰">粉玫瑰</a></td>
								            			<td width="80" height="50" align="center"><a href="category.php?type=红玫瑰">红玫瑰</a></td>
								            		</tr>
								            		<tr>
								            			<td align="center"><a href="category.php?type=白玫瑰">白玫瑰</a></td>
								            			<td width="80" height="50" align="center"><a href="category.php?type=紫玫瑰">紫玫瑰</a></td>
								            		</tr>
								            		<tr>
								            			<td align="center"><a href="category.php?type=蓝玫瑰">蓝玫瑰</a></td>
								            			<td width="80" height="50" align="center"><a href="category.php?type=香槟玫瑰">蓝玫瑰</a></td>
								            		</tr>
								            		<tr>
								            			<td align="center"><a href="category.php?type=黄玫瑰">蓝玫瑰</a></td>
								            			<td width="80" height="50" align="center"><a href="category.php?type=康乃馨">康乃馨</a></td>
								            		</tr>
								            		<tr>
								            			<td align="center"><a href="category.php?type=向日葵">向日葵</a></td>
								            			<td width="80" height="50" align="center"><a href="category.php?type=扶郎">扶郎</a></td>
								            		</tr>
								            		<tr>
								            			<td align="center"><a href="category.php?type=郁金香">郁金香</a></td>
								            			<td width="80" height="50" align="center"><a href="category.php?type=马蹄莲"></a></td>
								            		</tr>
								            		<tr>
								            			<td align="center"><a href="category.php?type=百合">百合</a></td>
								            			<td width="80" height="50" align="center"></td>
								            		</tr>
								            	</table>
								            </div>
								            
								        </li>
								        <li role="presentation" class="divider" style="margin: 0;"></li>
								        <li role="presentation">
								            <a id="button3" style="color: white;line-height: 70px;" role="menuitem" tabindex="-1" href="#" data-stopPropagation="true">按价格送礼
								            <span style="margin-left: 40px;" class="glyphicon glyphicon-chevron-down"></span>
								            </a>
								            
								            <div id="div3" style="display:none;height: auto;width: 100%;background-color: white;" data-stopPropagation="true">
								            	<table style="">
								            		<tr>
								            			<td align="center"><a href="price.php?small=0&big=150">150元以下</a></td>
								            			<td width="80" height="50" align="center"><a href="price.php?small=150&big=250">150-250元</a></td>
								            		</tr>
								            		<tr>
								            			<td width="80" align="center"><a href="price.php?small=250&big=350">250-350元</a></td>
								            			<td width="80" height="50" align="center">&nbsp;<a href="price.php?small=350&big=550">350-550元</a></td>
								            		</tr>
								            		<tr>
								            			<td align="center"><a href="price.php?small=550&big=800">550-800元</a></td>
								            			<td width="80" height="50" align="center"><a href="price.php?small=800&big=0">800元以上</a></td>
								            		</tr>
								            	</table>
								            </div>
								        </li>
								        <li role="presentation" class="divider" style="margin: 0;"></li>
								        <li role="presentation">
								            <a id="button4" style="color: white;line-height: 70px;" role="menuitem" tabindex="-1" href="#" data-stopPropagation="true">按枝数送礼
								            <span style="margin-left: 40px;" class="glyphicon glyphicon-chevron-down"></span>
								            </a>
								            <div id="div4" style="display:none;height: auto;width: 100%;background-color: white;" data-stopPropagation="true">
								            <table style="margin-left: 5px;">
								            		<tr>
								            			<td align="center"><a href="flower_num.php?type=9">9枝</a></td>
								            			<td width="80" height="50" align="center"><a href="flower_num.php?type=10">10枝</a></td>
								            			<td width="80" align="center"><a href="flower_num.php?type=11">11枝</a></td>
								            		</tr>
								            		<tr>
								            			<td width="80" height="50" align="center"><a href="flower_num.php?type=12">12枝</a></td>
								            			<td align="center"><a href="flower_num.php?type=16">16枝</a></td>
								            			<td width="80" height="50" align="center"><a href="flower_num.php?type=18">18枝</a></td>
								            		</tr>
								            		<tr>
								            			<td align="center"><a href="flower_num.php?type=19">19枝</a></td>
								            			<td width="80" height="50" align="center"><a href="flower_num.php?type=20">20枝</a></td>
								            			<td align="center"><a href="flower_num.php?type=12">22枝</a></td>
								            		</tr>
								            		<tr>
								            			
								            			<td width="80" height="50" align="center"><a href="flower_num.php?type=29">29枝</a></td>
								            			<td align="center"><a href="flower_num.php?type=33">33枝</a></td>
								            			<td width="80" height="50" align="center"><a href="flower_num.php?type=36">36枝</a></td>
								            		</tr>
								        
								            		<tr>
								            			<td align="center"><a href="flower_num.php?type=50">50枝</a></td>
								            			<td width="80" height="50" align="center"><a href="flower_num.php?type=66">66枝</a></td>
								            			<td align="center"><a href="flower_num.php?type=99">99枝以上</a></td>
								            		</tr>
								            		
								            </table>
								            </div>
								        </li>
								    </ul>
			         		</div>
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
<script type="text/javascript">
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
</script>