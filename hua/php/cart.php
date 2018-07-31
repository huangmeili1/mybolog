<meta charset="utf-8" />
<link rel="stylesheet" href="../css/top.css" />
<style type="text/css">
	body{padding: 0;
	margin: 0;
	background-color:ghostwhite;
	}
	#buy{
		background-color: white;
		width: 80%;
		margin: 0 auto;
	}
	#d1 a{
		color: black;
	}
	#d1 a:hover{
		color: orange;
	}
</style>

<?php
@session_start();
if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
include_once("../conn/dataconnection.php");
@$user_id=$_SESSION['user_id'];
$sql=mysql_query("select * from cart where user_id='$user_id'");
@$num=mysql_num_rows($sql);
?>
<div id="topa" style="width: 100%;height: 25%;background-color: white;">
	<div id="top" style="margin: 0 auto;text-align: center;background-color:gainsboro;width: 100%;height: 30px;">
	<div id="a2" style="width: 50%;float: right;margin-top: 0;">
		<ul id="a1">
		<li>
			<a href="index.php">首页</a>
		</li>
		<li>
			<a href="login.php">你好,请登录</a>
		</li>
		<li>
			<a href="">注册</a>
		</li>
		<li>
			<a href="">个人中心</a>
		</li>
		<li>
			<a href="">帮助中心</a>
		</li>
		<li>
			<a style="color: red;" href="">购物车(<?php echo $num; ?>)</a>
		</li>
		<li>
			<a href="login.php">我的订单</a>
		</li>
		<li>
			<a href="login.php">我的收藏</a>
		</li>
		<li>你的心意，交给我们</li>
	</ul>
  </div>
</div>
	<div id="top1" style="width: 100%;height: 80%;">
			<img style="margin-top: 70px;margin-left: 150px;" src="../img/logo1.png" />
			<img style="margin-left: 230px;" src="../img/r2.png" /><br>
				<span style="margin-left: 635px;">购物车<span style="margin-left: 80px;">提交订单</span><span style="margin-left: 85px;">支付</span><span style="margin-left: 110px;">完成</span></span>
	</div>
	<hr style="margin-top: 35px;" size="2" color="darkmagenta" />
</div>
<div id="d1">
	<div id="div1" style="width: 80%;height: auto;background-color: white;margin: 0 auto;margin-top: 20px;margin-bottom: 200px;">
		
			<?php
				$t=mysql_query("select * from cart where user_id='$user_id' order by cart_time desc");
				@$numm=mysql_num_rows($t);
				if($numm<=0){
					?>
					 <form style="margin-top: 90px;" id="f1" action="">
					 	<h3 style="margin-left: 230px;">您还没有挑选商品，赶快行动吧！<a href="index.php" style="color: red;">马上去挑选商品&gt;&gt;</a> </h3>
					 	<span style="margin-left: 200px;"><input type="text" size="80" style="height: 50px;border: 3px solid gray;border-radius: 10px;" placeholder="试试搜索"></span>
					 	<input type="submit" value="搜索" style="width: 90px;height: 50px;font-size: 18px;border-radius: 10px;">
					 </form>
					<?php
				}else{
					?>
		<form method="post" name="ppl" action="delother.php">
		<table width="100%" style="font-size: 13px;color: black;">
			<tr bgcolor="gainsboro">
				<td width="140">
					<input type="button" id="checkedAllBtn" value="全选" style="border: 0;background-color: red;color: white;border-radius: 8px;">
				    <input type="button" id="checkedNoBtn" value="全不选" style="border: 0;background-color: red;color: white;border-radius: 8px;">
				</td>
				<td align="center" width="130">商品图片</td>
				<td align="center">商品名称</td>
				<td width="90" align="center">订购价</td>
				<td width="90" align="center">数量</td>
				<td width="90" align="center">小计</td>
				<td width="120" align="center">操作</td>
			</tr>
			
			<?php
				$tatol=0;
			 while($tt=mysql_fetch_array($t)){
			 	$good=$tt['good_id'];
			 	$r=mysql_query("select * from goods where good_id='$good'");
			 	$rt=mysql_fetch_array($r);
			 	?>
			 	<tr>
			 	<td>
			 		<div id="box">
			 		<span style="text-align: center;top: -12px;">
			 		<input type="checkbox" name="items[]" onclick = "jisuan(this,<?php echo $good; ?>)" value="<?php echo $rt['good_price']*$tt['good_num'] ?>">
			 		<!--<input type="hidden" name="good_id" id="good_id" class="good_id" value="<?php echo $good; ?>">-->
			 		</span>
			 		</div>
			 	</td>
			 	<td align="center"><a href="see_good.php?good_id=<?php echo $good ?>"><img width="130" src="<?php echo $rt['main_img'] ?>"></a></td>	
			 	<td><a style="text-align: center;" href="see_good.php?good_id=<?php echo $good ?>"><?php echo $rt['good_name'] ?>&nbsp;&nbsp;<?php echo $rt['material'] ?></a></td>
			 	<td align="center"><span id="p_<?php echo $good; ?>"><?php echo $rt['good_price'] ?></span>元</td>
			 	<td align="center"><input onblur="changeNum(<?php echo $good; ?>,this.value)" id="good_<?php echo $good; ?>" style="text-align: center;" size="4" type="text" value="<?php echo $tt['good_num'] ?>"></td>
			 	<td align="center"><span id="total_<?php echo $good; ?>"><?php echo $rt['good_price']*$tt['good_num'] ?></span>元</td>
			 	<td align="center"><a href="#">移入收藏夹</a>&nbsp;&nbsp;&nbsp;<a href="del_cart.php?good_id=<?php echo $good; ?>">删除</a></td>
			 	</tr>
			 	<tr>
			 		<td colspan="7"><hr size="1" color="gainsboro" ></td>
			 	</tr>
			 	<?php
			 		$tatol=$tatol+($rt['good_price']*$tt['good_num']);
			 }
				?>
				<tr>
				<td colspan="2" align="center" style="font-size: 15px;">你的购物车共有:<span style="color: red;font-size: 20px;"><?php echo $numm; ?></span>件商品
				<td><span style="font-size: 15px;">本页购物金额总计:￥<span id="alltotal" style="color: red;font-size: 20px;"><?php echo $tatol; ?></span>元</span>
				</td>
				</tr>
				<table style="margin-top: 50px;background-color: gainsboro;" width="100%">
				<tr>
					<td align="right">
						<input type="submit" value="删除" name="tj" style="width: 55px;height: 35px;background-color: white;border: 1px solid black;border-radius: 5px;">
					</td>
					<td align="left">&nbsp;&nbsp;&nbsp;<input onclick="delcart(<?php echo $user_id; ?>)" type="button" value="清空购物车" style="width: 80px;height: 35px;background-color: white;border: 1px solid black;border-radius: 5px;"></td>
					<td>共:</td>
					<td id="ge" style="color: red;">0</td>
					<td>件商品</td>
					<td align="left"><span style="color: grey;margin-right: 70px;">合计(不含运费)</span>￥<span id="myspan">0元</span></td>
					<td align="right" style="background-color: #555555;font-size: 20px;width: 130px;color: white;"><a style="color: white;margin-right: 20px;" href="#"><span>继续购物</span></a></td>
					<td align="right" style="width: 120px;background-color: red;font-size: 24px;color: white;height: 100%;"><a style="margin-right: 20px;color: white;" id="Gotobuy" href="#"><span>去结算</span></a></td>
				</tr>
				</table>
					<?php
				}
				?>
		</table>
		<div>你好:<span id="ou"></span></div>
		</form>
	</div>
</div>
<?php }else{echo "<script>alert('请登录');window.location.href='login.php';</script>";} ?>

<script type="text/javascript" src="../easyui/jquery.min.js"></script>
<script type="text/javascript">
	function changeNum(good_id,num){
	if(num<=0){
		alert('不能小于零，请重新输入');
		location.reload();
	}else{
	var url = "changeNum.php";
    var data = {"good_id":good_id,"num":num};
    var success = function(response){
    if(response.errno==0){
	var price=($("#good_"+good_id).val())*($("#p_"+good_id).html());
	$("#total_"+good_id).html(price);
	location.reload();
      }
    }
    $.post(url,data,success,"json");
	}
    //通过ajax把参数传给php后台在购物车表中进行商品数量的修改
   
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
  
</script>
<script type="text/javascript">
	window.onload=function(){
		var items=document.getElementsByName("items[]");
		var checkedAllBtn=document.getElementById("checkedAllBtn");
		var total=parseInt($("#alltotal").text());
		checkedAllBtn.onclick=function(){
			
//			alert('全先');
		
			for(var i=0;i<items.length;i++){
				items[i].checked=true;
			}
			var n=items.length;
			myspan.innerText = total + "元"; 
			ge.innerText = n; 
		}
		checkedNoBtn.onclick=function(){
			//全不选
//			alert('全先');
		var items=document.getElementsByName("items[]");
			for(var i=0;i<items.length;i++){
				items[i].checked=false;
			}
			myspan.innerText ="0元";
			ge.innerText = 0; 
		}
		
	}
</script>

<script language = "javascript" type = "text/javascript"> 
var good=new Array();


function jisuan(obj,good_id){ //计算总价
var count=0;
var total = 0; 
var j=0;
var fruits = document.getElementsByName("items[]"); 
for(var i=0;i<fruits.length;i++){ 
if(fruits[i].checked){
	 good[j]=good_id;
	 j++;
	count=count+1;
total += parseFloat(fruits[i].value); 
} 
} 
ou.innerText=ge;
myspan.innerText = total + "元"; 
ge.innerText = count; 
} 

var Gotobuy=document.getElementById("Gotobuy");
	Gotobuy.onclick=function (){
	var total=parseInt($("#myspan").text());//获取总价
	alert(total);
	alert("你好");
	alert(good.length);
for(var y=0;y<good.length;y++){
	alert(good[y]);
}
}

</script> 

