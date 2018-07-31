<meta charset="utf-8">
<title>购物车</title>
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	body{
		margin-top: 50px;
	}
	[class *= col-]{
  background-color: #eee;
  border: 1px solid black;
}
</style>
<?php
@session_start();
if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
include_once("../conn/dataconnection.php");
@$user_id=$_SESSION['user_id'];
$sql=mysql_query("select * from cart where user_id='$user_id'");
@$num=mysql_num_rows($sql);
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
<div class="container" style="width: 100%;">
	<div class="row" style="width: 80%;margin: 0 auto;margin-top: 30px;height: 82px;">
		<div class="col-md-6" style="height: 82px;background-color: white;border: 0;">
			<img src="../img/logo1.png" />
		</div>
		<div class="col-md-6" style="height: 82px;background-color: white;border: 0;">
			<img style="margin-top: 5px;" src="../img/r2.png" /><br>
			<span style="margin-left:20px;">购物车<span style="margin-left: 80px;">提交订单</span><span style="margin-left: 85px;">支付</span><span style="margin-left: 110px;">完成</span></span>
		</div>
	</div>
	<div class="row" style="margin-top: 5px;background-color: white;">
		<div class="col-md-12" style="background-color: transparent;border: 0;">
			<hr size="2">
		</div>
	</div>
	<?php
		if($num<=0){
			?>
			<div class="row" style="width: 80%;margin: 0 auto;text-align: center;min-height: 300px;">
				<div class="col-md-12" style="border: 0;background-color: white;">
					<span>你的购物车还没有东西，快去把你喜欢的东西&nbsp;&nbsp;&nbsp;<a href="index.php" class="btn btn-danger">加入购物车吧</a></span>
						<div class="row" style="width: 50%;margin: 0 auto;background-color: red;">
							<div class="col-md-12" style="border: 0;background-color: white;">
								<form action="select.php" method="get">
									<div class="input-group input-group-lg" style="margin-top: 40px;">
								        <select class="form-control" name="sel" style="width: 100px;border: 2px solid #e4313d;background:#e4313d;color: white;">
											<option>节日</option>
											<option>对象</option>
											<option>枝数</option>
											<option>花材</option>
											<option>用途</option>
										</select>
										<input style="border: 2px solid #e43a3d;width: 370px;" type="text" aria-required="true" required="required" name="key" class="form-control" placeholder="请输入关键字" />
										<span class="input-group-btn">
					                      <button name="tj" value="tj" class="btn btn-default" type="submit" style="width: 80px;background-color: #e43a3d;border: 1px solid #e43a3d;"><span style="font-size: 21px;color: white;" class="glyphicon glyphicon-search"></span></button>
					                   	</span>
									</div>
								</form>
							</div>
						</div>
				</div>
			</div>
			<?php
		}else{
			?>
				<div class="row" style="width: 80%;margin: 0 auto;">
					<div class="col-md-12" style="background-color: white;">
						<table class="table table-hover">
							<thead>
								<tr>
									<td>
										<button type="button" onclick="allSelect()" style="height: 25px;font-size: 14px;" class="btn btn-danger">全选</button>
									</td>
									<td>商品图片</td>
									<td>商品名称</td>
									<td>订购价</td>
									<td>数量</td>
									<td>小计</td>
									<td>操作</td>
								</tr>
							</thead>
							<tbody>
								
									<?php 
										$total=0;
										while($f=mysql_fetch_array($sql)){
											$good=$f['good_id'];
						 					$r=mysql_query("select * from goods where good_id='$good'");
						 					$rt=mysql_fetch_array($r);
						 					$total=$total+$rt['good_price']*$f['good_num'];
											?>
											<tr>
											<td>
												<input type="hidden" name="goods_num" id="goods_num_<?php echo $rt['good_id'] ?>" value="<?php echo $rt['good_num']; ?>" />
												<?php
													if($rt['good_num']==0){
														?>
														<button class="btn btn-danger">库存不足</button>
														<?php
													}
													?>
												<input type="checkbox" id="item<?php echo $good; ?>" class="item" onclick="youlove()" value="<?php echo $rt['good_price']*$f['good_num']; ?>" />
												<input type="hidden" class="goodd" value="<?php echo $good; ?>">
											</td>
											<td><a href="see_good.php?good_id=<?php echo $good; ?>"><img style="width: 130px;" src="<?php echo $rt['main_img']; ?>"></a></td>
											<td style="width: 400px;text-align: center;">
												<div style="margin-top: 40px;"><a href="see_good.php?good_id=<?php echo $good; ?>"><?php echo $rt['good_name']; ?></a></div>
												<div style="width:350px; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $rt['material']; ?>
												</div>  
												
											</td>
											<td><div style="margin-top: 50px;">￥<span id="smallprice<?php echo $good; ?>"><?php echo $rt['good_price']; ?></span></div></td>
											<td style=""><div style="margin-top: 50px;"><input id="num<?php echo $good; ?>" style="text-align: center;" size="4" type="text" onblur="changeNum(<?php echo $good; ?>,this.value)" value="<?php echo $f['good_num']; ?>"></div></td>
											<td><div style="margin-top: 50px;">￥<span class="all" id="total<?php echo $good; ?>"><?php echo $rt['good_price']*$f['good_num']; ?></span></div></td>
											<td><div style="margin-top: 50px;"><a href="collect.php?good_id=<?php echo $good; ?>">移入收藏夹</a>&nbsp;&nbsp;&nbsp;<a href="del_cart.php?good_id=<?php echo $f['good_id']; ?>">删除</a></div></td>
											</tr>
											<?php
										}
										?>
								<tr>
									<td colspan="7" align="center">
										<div style="margin-top: 20px;margin-bottom: 10px;">
											<span>你的购物车共有<b style="color: red;"><?php echo $num; ?></b>件商品</span>&nbsp;&nbsp;&nbsp;
											<span>购物金额共计:<b style="color: red;">￥<span id="alltotal"><?php echo $total;  ?></span></b></span>
										</div>
										
									</td>
								</tr>
								<tr>
									<td colspan="7">
										<div style="margin-top: 20px;margin-bottom: 20px;">
											<table>
												<tr>
													<td width="100"><a style="color: black;" class="btn btn-default" onclick="more_del()">删除</a></td>
													<td width="150"><a onclick="delcart(<?php echo $user_id; ?>)" class="btn btn-default" href="#">清空购物车</a></td>
													<td width="250">共计:<span style="color: red;" id="ge">0</span>件商品</td>
													<td>合计(不含运费)</td>
													<td width="200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;￥<span id="buymoney">0</span>元</td>
													<td width="200" align="right"><a href="index.php" class="btn btn-danger btn-lg">继续购物</a></td>
													<td align="right" width="100"><button onclick="buything()" class="btn btn-danger btn-lg">去结算</button></td>
												</tr>
											</table>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			<?php
		}
		?>
	
	<?php include("footer.php"); ?>
</div>
<?php }else{echo "<script>alert('请登录');window.location.href='login.php';</script>";} ?>
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
	 function delcart(user_id){
  	var url='delcart.php';
  	var data = {"user_id":user_id};
  	var success=function(response){
  		 if(response.errno==0){
  		 	location.reload();
  		 }
  	}
  	$.post(url,data,success,"json");
  }
  
  
  function changeNum(good_id,num){//改变数量
    var total=document.getElementById("total"+good_id);
	var smallprice=document.getElementById("smallprice"+good_id);
	var price=num*(smallprice.innerText);//小计改变
	var goodss_num=document.getElementById("goods_num_"+good_id).value;
	if(num==''||num<=0||isNaN(num)||num%1!=0){
		alert('请输入正确的数量');
		location.reload();
	}else if(num>parseInt(goodss_num)){
		alert('你输入的数量，已经超过库存'+goodss_num+'，请重新输入');
		location.reload();
	}else{
		var url="changeNum.php";
		var data={"good_id":good_id,"num":num};
		var success=function(response){
			if(response.errno==0){
				total.innerText=price.toFixed(3);//小计
				var all=document.getElementsByClassName("all");
				var toalll=0;
				for(var i=0;i<all.length;i++){
//					toall=toall+all[i].innerText;//连接字符串
					toalll=toalll+parseFloat(all[i].innerText);
				}
				$("#alltotal").html(toalll.toFixed(3));//总数
				var ites=document.getElementById("item"+good_id);
				ites.value=price;
				var items=document.getElementsByClassName("item");//用户所选金额
				var total1=0;
				for(var i=0;i<items.length;i++){
		  		if(items[i].checked){
		  			total1=total1+parseFloat(items[i].value);
		  		}
		  	}
		  	
		  	
			$("#buymoney").html(total1.toFixed(3));
				
			}
			
		}
		$.post(url,data,success,"json");
	
	}
	
	
	
  }
  
  function allSelect(){//全选
  	var items=document.getElementsByClassName("item");
  	var a=0;
  	for(var i=0;i<items.length;i++){//计算被选中的个数
  		if(items[i].checked){
  			a++;
  		}
  	}
  	if(a<items.length){//全选
  		var b=0;
  		for(var i=0;i<items.length;i++){
  			items[i].checked=true;
  			b++;
  		}
  		var alltotal=document.getElementById("alltotal").innerText;
  		$("#ge").html(b);
  		$("#buymoney").html(alltotal);
  	}else{//全不选
  		for(var i=0;i<items.length;i++){
  			items[i].checked=false;
  		}
  		$("#ge").html('0'); 
  		$("#buymoney").html('0');
  	}
  	
  }
  function youlove(good_id){
  	var goods=new Array();
  	var items=document.getElementsByClassName("item");
  	var b=0;
  	var total=0;
  	for(var i=0;i<items.length;i++){
  		if(items[i].checked){
  			total=total+parseFloat(items[i].value);
  			b++;
  		}
  	}
	$("#buymoney").html(total.toFixed(3));
  	$("#ge").html(b);
  }
  
  
  function buything(){
  	var goods=document.getElementsByClassName("goodd");
  	var good_id=new Array();
  	var nums=new Array();
//	var a=0;
	for(var i=0;i<goods.length;i++){
		good_id[i]=goods[i].value;//给数组赋值
	}
	var a=-1;
	var finallygoods=new Array();
	for(var j=0;j<good_id.length;j++){
		var item=document.getElementById("item"+good_id[j]);
		if(item.checked){
			a++;
			finallygoods[a]=good_id[j];
//			nums[a]=$("#num"+good_id[j]).value;
			var n=document.getElementById("num"+good_id[j]).value;
			nums[a]=n;
		}
	}
	if(finallygoods.length==0){
		alert("你还没有选择商品");
	}else{
		window.open("Order.php?goods="+finallygoods+"&nums="+nums+"","_blank"); 
//		window.location.href='Order.php?goods='+finallygoods+'&nums='+nums+'';
	}
  }
  function more_del(){
  var goods=document.getElementsByClassName("goodd");
  var good_id=new Array();
  var a=-1;
   for(var i=0;i<goods.length;i++){
		 good_id[i]=goods[i].value;
		
   }
   var g=new Array();
   for(var j=0;j<good_id.length;j++){
   var item=document.getElementById("item"+good_id[j]);
		if(item.checked){
			a++;
			g[a]=good_id[j];
		}
   }
   if(a==-1){
   	alert("你还没有选择商品");
   }else{
   	 var url="del_cart_all.php";
  var data={"g":g};
  var success=function(response){
  	if(response.errno==1){
  		alert("删除成功");
  		location.reload();
  	}else if(response.errno==0){
  		alert("删除失败，请稍后再试");
  		location.reload();
  	}else{
  		alert("请登录");
  		window.location.href='login.php';
  	}
  }
  $.post(url,data,success,"json");
   }
   
  
  }
</script>