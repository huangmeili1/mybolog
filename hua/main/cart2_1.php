<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>购物车</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	body{
		margin-top: 50px;
	}
</style>
<?php
	session_start();
	include("../conn/dataconnection.php");
	@$user_id=$_SESSION['user_id'];
	$u7=mysql_query("select * from cart where user_id='$user_id'");
	@$cart=mysql_num_rows($u7);
	if(!isset($_SESSION['cart'])||!isset($_SESSION['num'])||($_SESSION['cart']==''&&$_SESSION['num']=='')){
		$num=0;
	}else{
		@$good=explode("$",$_SESSION['cart']);
		@$nums=explode("*",$_SESSION['num']);
		$num=count($good);
	}
	?>
	<div class="navbar navbar-default navbar-fixed-top" role="navigation" style="width: 100%;">
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
					<li><a href="login.php">我的订单<span style="color: red;" class="glyphicon glyphicon-shopping-cart">(<?php echo $book_num; ?>)</span></a></li>
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
	if(@$num<=0){
		?>
		<div class="row" style="width: 80%;margin: 0 auto;min-height: 50%;">
			<div class="col-md-12" style="text-align: center;">
				<span style="line-height: 150px;text-align: center;font-size: 24px;">
					你的购物车中暂无商品，快去看看你喜欢的商品吧。<a href="index.php" class="btn btn-danger">走吧</a>
				</span>
			</div>
		</div>
		<?php
	}else{
		?>
	<div class="row" style="width: 80%;margin: 0 auto;">
		<div class="col-md-12">
			<table class="table table-hover">
				<thead>
					<th>
						<button onclick="All_select()" class="btn btn-danger">全选</button>
					</th>
					<th>商品图片</th>
					<th>商品名称</th>
					<th>订购价</th>
					<th>数量</th>
					<th>小计</th>
					<th>操作</th>
				</thead>
				<tbody>
				<?php
					$total=0;
				for($i=0;$i<count($good);$i++){
					$good_id=$good[$i];
					$sql_g=mysql_query("select * from goods where good_id='$good_id'");
					@$sql_g_num=mysql_num_rows($sql_g);
					if($sql_g_num<=0){
						?>
						<tr>
							<td colspan="6" align="center">
								<span>对不起，该商品已经下架了</span>
							</td>
						</tr>
						
						<?php
					}else{
						$good_n=mysql_fetch_array($sql_g);
						$total=$total+$good_n['good_price']*$nums[$i];
						?>
							
						<tr>
							<td>
								<?php
									if($good_n['good_num']==0){
										?>
										<button type="button" class="btn btn-danger">库存不足</button>
										<?php
									}
									?>
								<input onchange="sel_check_2(<?php echo $good_n['good_id']; ?>)" class="checkb" id="checkbox<?php echo $good_n['good_id']; ?>" type="checkbox" value="<?php echo $nums[$i]*$good_n['good_price'] ?>" />
										
							</td>
							<td>
								<input type="hidden" name="goods_num" value="<?php echo $good_n['good_num'] ?>" id="goods_num_<?php echo $good_n['good_id']; ?>" />
								<div class="thumbnail" style="width: 150px;">
									<a target="_blank" style="text-decoration: none;" href="see_good.php?good_id=<?php echo $good_n['good_id'] ?>">
									<img src="<?php echo $good_n['main_img']; ?>" />
									</a>
								</div>
							</td>
							<td style="width: 400px;text-align: center;">
								<div style="margin-top: 40px;"><a href="see_good.php?good_id=<?php echo $good[$i]; ?>"><?php echo $good_n['good_name']; ?></a></div>
								<div style="width:350px; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
								<?php echo $good_n['material']; ?>
								</div>  
												
							</td>
							<td style="line-height: 150px;">￥<span id="price<?php echo $good[$i]; ?>"><?php
								echo $good_n['good_price'];
								?></span>
								</td>
							<td>
								<input type="hidden" class="goods" value="<?php echo $good_n['good_id']; ?>" />
								<div class="input-group input-group-lg" style="margin-top: 55px;width: 80px;">
							        <span class="input-group-btn">
				                      <button id="shao<?php echo $good_n['good_id']; ?>"  name="shao" onclick="shao(<?php echo $good_n['good_id']; ?>)" value="shao" class="btn btn-default" type="button" style="width: 20px;background-color: gainsboro;border: 0;">-</button>
				                   	</span>
									<input class="nums" onchange="change_re(<?php echo $good_n['good_id'];?>)" id="input<?php echo $good_n['good_id']; ?>" style="width: 40px;height: 45.5px;background-color: white;"  type="text" value="<?php echo $nums[$i]; ?>" />
									<span class="input-group-btn">
				                      <button name="add" id="add<?php echo $good_n['good_id']; ?>" value="add" onclick="add(<?php echo $good_n['good_id']; ?>)" class="btn btn-default" type="button" style="width: 20px;background-color: gainsboro;border: 0;">+</button>
				                   	</span>
								</div>
							</td>
							<td style="line-height: 150px;">
								￥<span class="all" id="small_price<?php echo $good_n['good_id']; ?>"><?php echo $nums[$i]*$good_n['good_price']; ?></span>
							</td>
							<td style="line-height: 150px;">
								<a  style="text-decoration: none;" onclick="del_good(<?php echo $good_n['good_id']; ?>)" href="#">删除</a>
							</td>
						</tr>
						<?php
					}
					?>
					<?php
				}
				?>
				<tr>
					<td colspan="6" align="center">
					  你的购物车共有<span style="color: red;"><?php echo $num; ?></span>件商品
					  购物金额共：￥<span style="color: red;" id="total"><?php echo $total; ?></span>
					</td>
				</tr>
				<tr>
					<td colspan="6" style="line-height: 150px;">
						<button onclick="All_select()" class="btn btn-danger">全选</button>
						<a onclick="del_select()" style="margin-left: 30px;text-decoration: none;" href="#" class="btn btn-default">删除</a>
						<a style="margin-left: 50px;" onclick="return confirm('确定要清空购物车？')" href="all_del_cart2.php" class="btn btn-default">清空购物车</a>
						<span style="margin-left: 50px;">共选中<span style="color: red;" id="numn">0</span>件商品</span>
						<span style="margin-left: 50px;">合计：(不含运费)<span style="color: red;margin-left: 50px;" id="select_price">0</span>元</span>
						<a style="margin-left: 60px;height: 50px;text-align:center;line-height: 40px;font-size: 24px;" href="index.php" class="btn btn-danger">继续购物</a>
						<a onclick="Buy_thing()" style="margin-left: 20px;height: 50px;text-align:center;line-height: 40px;font-size: 24px;" href="#" class="btn btn-danger">去结算</a>
					</td>
				</tr>
				</tbody>
			</table>
		</div>
	</div>
		<?php
	}
	?>
	<?php  include("footer.php"); ?>
	</div>


<script type="text/javascript">
	function Buy_thing(){
		var checkb=document.getElementsByClassName("checkb");
		var goods=document.getElementsByClassName("goods");
		var nums=document.getElementsByClassName("nums");
//		document.getElementById("num");
		var a=-1;
		var sel_num=new Array();
		var sel_good=new Array();
		for(var i=0;i<checkb.length;i++){
			if(checkb[i].checked){
				a++;
				sel_num[a]=nums[i].value;
				sel_good[a]=goods[i].value;
			}
		}
		if(sel_good.length<=0){
			alert("你还没有选择要购买的商品");
		}else{
			window.open("Order.php?goods="+sel_good+"&nums="+sel_num+"","_blank"); 
		}
		
	}


     function del_select(){
     	var checkb=document.getElementsByClassName("checkb");
     	var goods=document.getElementsByClassName("goods");
     	var nums=document.getElementsByClassName("nums");
//   	alert(goods.length);
//		alert(nums.length);
		var sel_good=new Array();
		var sel_num=new Array();
		var ji_wu=new Array();
		var a=-1;
		var wu=-1;
		for(var i=0;i<checkb.length;i++){
			if(checkb[i].checked){
				a++;
				wu++;
				ji_wu[wu]=i;
				sel_num[a]=nums[i].value;
				sel_good[a]=goods[i].value;
			}
		}
		if(sel_good.length<=0){
			alert("你还没有选择要删除的元素");
		}else{
			 var confirmdel=confirm('确认要删除吗?');
			if(confirmdel){
			var form=new FormData();
			form.append("ju_wu",ji_wu);
			form.append("goods",sel_good);
			form.append("nums",sel_num);
			var request=new XMLHttpRequest();
			request.open("POST","del_some_cart2.php");
			request.send(form);
			request.onreadystatechange=function(){
				if(request.readyState===4){
					if(request.status===200){
						alert("删除成功");
						location.reload();
					}else{
					alert("发生错误"+request.status);
					}
				}
			}
			}else{
				
			}
			
			
			
		}
		
     	
     }
	function shao(good_id){
		var num=document.getElementById("input"+good_id);
		var n=num.value;
		if(n==1){
			alert("数量已经是最小的，不能再减了");
			var shao=document.getElementById("shao"+good_id);
			shao.setAttribute("disabled","disabled");
		}else{
			var ne=n-1;
			num.value=ne;
			var total=document.getElementById("total");
			var price=document.getElementById("price"+good_id);
			var good_price=parseFloat(price.innerText);
			var reduce_price=good_price*1;
			var old_total=total.innerText;
			var new_total=old_total-reduce_price;
			total.innerText=new_total.toFixed(3);
			var small_price=document.getElementById("small_price"+good_id);
			var new_pirce=good_price*ne;
			small_price.innerText=new_pirce.toFixed(3);
			var sel_total=0;
			var checkb=document.getElementsByClassName("checkb");
			var all=document.getElementsByClassName("all");
			for(var i=0;i<checkb.length;i++){
				if(checkb[i].checked){
					var p=parseFloat(all[i].innerText);
					sel_total=parseFloat(sel_total)+p;
				}
			}
			var select_price=document.getElementById("select_price");
			select_price.innerText=sel_total.toFixed(3);
			var url="change_car2_num.php";
			var data={"good_id":good_id,"num":ne};
			var success=function(response){
				

			}
			$.post(url,data,success,"json");
			
			
			var checkb=document.getElementsByClassName("checkb");
			var all_price=document.getElementsByClassName("all");
			var sel_total=0;
			for(var i=0;i<checkb.length;i++){
				if(checkb[i].checked){
					var pp=all_price[i].innerText;
					sel_total=sel_total+parseFloat(pp);
//					alert(all_price[i].innerText);
				}
			}
			var select_price=document.getElementById("select_price");
			select_price.innerText=sel_total.toFixed(3);
		}
	}
	function add(good_id){
			var num=document.getElementById("input"+good_id);
			var goodss_num=document.getElementById("goods_num_"+good_id).value;
			var n=num.value;
			var add=parseInt(n)+1;
			if(add>parseInt(goodss_num)){
				alert("你所加的数量已经超过库存"+goodss_num+",不能再加了");
			}else{
				num.value=add;
			var total=document.getElementById("total");
			var price=document.getElementById("price"+good_id);
			var good_price=parseFloat(price.innerText);
			var add_price=good_price*1;
			var old_total=total.innerText;
			var new_total=parseFloat(old_total)+add_price;
			total.innerText=new_total.toFixed(3);
			var small_price=document.getElementById("small_price"+good_id);
			var new_pirce=good_price*add;
			small_price.innerText=new_pirce.toFixed(3);
			var url="change_car2_num.php";
			var data={"good_id":good_id,"num":add};
			var success=function(response){
				
			}
			$.post(url,data,success,"json");
			var checkb=document.getElementsByClassName("checkb");
			var all_price=document.getElementsByClassName("all");
			var sel_total=0;
			for(var i=0;i<checkb.length;i++){
				if(checkb[i].checked){
					var pp=all_price[i].innerText;
					sel_total=sel_total+parseFloat(pp);
//					alert(all_price[i].innerText);
				}
			}
			var select_price=document.getElementById("select_price");
			select_price.innerText=sel_total.toFixed(3);
			var shao=document.getElementById("shao"+good_id);
			shao.removeAttribute("disabled");
			}
			
			
	}
	
	function change_re(good_id){
		var patrn = /^([1-9]\d*|0)(\.\d*[1-9])?$/;
		var num=document.getElementById("input"+good_id);
		var n=num.value;
		var goodss_num=document.getElementById("goods_num_"+good_id).value;
	if(n==''||n<=0||isNaN(n)||n%1!=0||!patrn.exec(n)){
		alert("请输入正确的商品数量");
		location.reload();
	}else if(n>parseInt(goodss_num)){
		alert("你输入的数量已经超过库存"+goodss_num+",请重新输入");
		location.reload();
	}else{
		var price=document.getElementById("price"+good_id);
		var good_price=parseFloat(price.innerText);
		var small_price=document.getElementById("small_price"+good_id);
		var new_pirce=good_price*n;
		small_price.innerText=new_pirce.toFixed(3);
		var total=document.getElementById("total");
		var old_total=total.innerText;
		var all=document.getElementsByClassName("all");
		var new_total=0;
		for(var i=0;i<all.length;i++){
			new_total=parseFloat(new_total)+parseFloat(all[i].innerText);
		}
		total.innerText=new_total.toFixed(3);
		var url="change_car2_num.php";
		var data={"good_id":good_id,"num":n};
		var success=function(response){
				
		}
		$.post(url,data,success,"json");
		var checkb=document.getElementsByClassName("checkb");
			var all_price=document.getElementsByClassName("all");
			var sel_total=0;
			for(var i=0;i<checkb.length;i++){
				if(checkb[i].checked){
					var pp=all_price[i].innerText;
					sel_total=sel_total+parseFloat(pp);
//					alert(all_price[i].innerText);
				}
			}
			var select_price=document.getElementById("select_price");
			select_price.innerText=sel_total.toFixed(3);
			if(n>1){
			var shao=document.getElementById("shao"+good_id);
			shao.removeAttribute("disabled","disabled");
			}
	}
	
	
	
	
	}
	
	function sel_check_2(good_id){
//		alert(good_id);
		var checkb=document.getElementsByClassName("checkb");
		var sel=0;
		var total=0;
		for(var i=0;i<checkb.length;i++){
			if(checkb[i].checked){
				sel++;
			}
		}
		var numn=document.getElementById("numn");
		var select_price=document.getElementById("select_price");
		var all=document.getElementsByClassName("all");
		numn.innerText=sel;
		for(var i=0;i<checkb.length;i++){
			if(checkb[i].checked){
				var pp=all[i].innerText;
				total=total+parseFloat(pp);
//				alert(total+"你");
//				alert(parseFloat(pp));
			}
		}
//		alert(total);
		select_price.innerText=total.toFixed(3);
	}
	
	
	function del_good(good_id){
//		alert(good_id);
		var request=new XMLHttpRequest();
		request.open("POST","del_car2_good.php");
		var form=new FormData();
		form.append("good_id",good_id);
		request.send(form);
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
	}
	
	
	function All_select(){//全选
		var checkb=document.getElementsByClassName("checkb");
		var selcheck=0;
		for(var i=0;i<checkb.length;i++){
			if(checkb[i].checked){
				selcheck++;
			}
			
		}
//		alert(selcheck);
		var total=document.getElementById("total");
		var total_price=parseFloat(total.innerText);
		var select_price=document.getElementById("select_price");
		var numn=document.getElementById("numn");
		if(selcheck==checkb.length){//全不选
			for(var i=0;i<checkb.length;i++){
				checkb[i].checked=false;
			}
			select_price.innerText=0;
			numn.innerText=0;
		}else{
			for(var i=0;i<checkb.length;i++){
				checkb[i].checked='checked'
			}
			select_price.innerText=total_price.toFixed(3);
			numn.innerText=checkb.length;
		}
	}
</script>