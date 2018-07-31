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
</style>
<?php
if(isset($_GET['tj'])){
include_once("../conn/dataconnection.php");
@session_start();
@$user_id=$_SESSION['user_id'];
$sql=mysql_query("select * from cart where user_id='$user_id'");
@$num=mysql_num_rows($sql);
$good_id=$_GET['good_id'];
$numm=$_GET['number'];
?>
<div id="topa" style="width: 100%;height: 25%;background-color: white;">
	<div id="top" style="margin: 0 auto;text-align: center;background-color:gainsboro;width: 100%;height: 30px;">
	<div id="a2" style="width: 50%;float: right;margin-top: 0;">
		<ul id="a1">
		<li>
			<a href="login.php">你好,请登录</a>
		</li>
		<li>
			<a href="reg.php">注册</a>
		</li>
		<li>
			<a href="">个人中心</a>
		</li>
		<li>
			<a href="">帮助中心</a>
		</li>
		<li>
			<a style="color: red;" href="cart.php">购物车(<?php echo $num; ?>)</a>
		</li>
		<li>你的心意，交给我们</li>
	</ul>
  </div>
</div>
	<div id="top1" style="width: 100%;height: 80%;">
			<img style="margin-top: 70px;margin-left: 150px;" src="../img/logo1.png" />
			<img style="margin-left: 230px;" src="../img/_r2_c2_2.jpg" /><br>
				<span style="margin-left: 635px;">购物车<span style="margin-left: 80px;">提交订单</span><span style="margin-left: 85px;">支付</span><span style="margin-left: 110px;">完成</span></span>
	</div>
	<hr style="margin-top: 35px;" size="2" color="darkmagenta" />
</div>
<form name="form1" onsubmit="return checkform()" action="user.php" method="get"  target="_blank">
<div id="b" style="width: 100%;height: 100%;margin: 0 auto;">
<div id="buy">	
	<div id="bookuser" style="border: 1px solid gray;margin-top: 30px;">
		<span><div style="color: white;background-color: black;height: 30px;margin: 0 auto;">修改订购人信息</div></span>
		<hr size="1" color="gray" />
			<table style="margin-top: 20px;">
				<tr>
					<td>订购真实姓名：</td>
					<td><input type="text" name="name" value="<?php echo @$_GET['name'] ?>" size="20" placeholder="请正确填写真实姓名">*</td>
				</tr>
				<tr>
					<td>邮箱：</td>
					<td><input type="email" name="email" value="<?php echo @$_GET['email'] ?>" size="40" placeholder="请正确填写邮箱">*</td>
				</tr>
				<tr>
					<td>手机号码：</td>
					<td><input type="text" name="tel" value="<?php echo @$_GET['tel'] ?>" size="30" placeholder="请正确填写手机号码"></td>
				</tr>
			</table>
	</div>
	<div id="bookuser" style="border: 1px solid gray;margin-top: 30px;">
		<span><div style="color: white;background-color: black;height: 30px;margin: 0 auto;">修改收货人信息</div></span>
		<hr size="1" color="gray" />
			<table style="margin-top: 20px;">
				<tr>
					<td>收货姓名：</td>
					<td><input type="text" name="name1" size="20" value="<?php echo @$_GET['name1'] ?>" placeholder="请正确填写真实姓名">*</td>
				</tr>
				<tr>
					<td>收货地址：</td>
					<td>
						<?php include("address.php"); ?>
					</td>
				</tr>
				<tr>
					<td>收货地址：</td>
					<td><span id="bv"></span><input onfocus="setStyle()" type="text" name="address1" value="<?php echo @$_GET['address1'] ?>" size="40" placeholder="请填写详细地址">*</td>
				</tr>
				<tr>
					<td>邮编：</td>
					<td><input type="text" name="get_post" value="<?php echo @$_GET['get_post'] ?>" size="40" placeholder="请填写详细地址">*</td>
				</tr>
				<tr>
					<td>手机号码：</td>
					<td><input type="text" name="tel1" value="<?php echo @$_GET['tel1'] ?>" size="30" placeholder="请填写手机号码"></td>
				</tr>
			</table>
	</div>
	<div id="bookuser" style="border: 1px solid gray;margin-top: 30px;">
		<span><div style="color: white;background-color: black;height: 30px;margin: 0 auto;">填写支付信息</div></span>
		<hr size="1" color="gray" />
			<span style="width: 50px;height: auto;background-color: red;">选择支付方式</span>
			<a href="#" onclick="Bg1()" style="margin-left: 10px;width: 90px;"><span id="online" style="width: 80px;height: auto;background-color: gainsboro;">在线支付</span></a>
			<a href="#" onclick="Bg2()" style="margin-left: 10px;"><span id="usercard" style="width: auto;height: auto;background-color: gainsboro;">线下银行支付</span></a>
			<a href="#" onclick="Bg3()" style="margin-left: 10px;"><span id="user" style="width: auto;height: auto;background-color: gainsboro;">货到付款</span></a>
			<div id="showmenoy" style="margin-left: 100px;height: auto;">
				<div id="div1" style="margin-top: 30px;display: none;">
					<?php
					$sp=mysql_query("select * from getmoney where get_money='在线支付'");
					@$n=mysql_num_rows($sp);
					if($n<=0){
						echo "暂无在线支付方式";
					}else{
						?>
						<table>
							<tr>
						<?php
						while($ft=mysql_fetch_array($sp)){
							?>
							
									<input type="radio" name="ch" id="ch" value="<?php echo $ft['money_id'] ?>"><img width="150" src="<?php echo $ft['get_img'] ?>">
								
							<?php
						}
						?>
						</tr>
					</table>
						<?php
					}
					?>
				</div>
				<div id="div2" style="display: none;">
					<?php
					$sspp=mysql_query("select * from getmoney where get_money='线下银行支付'");
					@$nn=mysql_num_rows($sspp);
					if($nn<=0){
						echo "暂无在线支付方式";
					}else{
						?>
						<table>
							<tr>
						<?php
						while($ftt=mysql_fetch_array($sspp)){
							?>
							
									<input type="radio" name="ch" id="ch" value="<?php echo $ftt['money_id'] ?>"><img width="200" src="<?php echo $ftt['get_img'] ?>">
								
							<?php
						}
						?>
						</tr>
					</table>
						<?php
					}
					?>
				</div>
				<div id="div3" style="display: none;">
					<?php
					$s3=mysql_query("select * from getmoney where get_money='货到付款'");
					@$n3=mysql_num_rows($s3);
					if($nn<=0){
						echo "暂无货到付款方式";
					}else{
						?>
						<table>
							<tr>
						<?php
						while($ftt3=mysql_fetch_array($s3)){
							?>
							
									<input type="radio" name="ch" id="ch" value="<?php echo $ftt3['money_id'] ?>"><img width="180" src="<?php echo $ftt3['get_img'] ?>">
								
							<?php
						}
						?>
						</tr>
					</table>
						<?php
					}
					?>
				</div>
			</div>
	</div>
	<div id="bookuser" style="border: 1px solid gray;margin-top: 30px;">
		<span><div style="color: white;background-color: black;height: 30px;margin: 0 auto;">订单商品信息</div></span>
		<table width="100%">
			<tr bgcolor="ghostwhite">
				<td align="center">商品图片</td>
				<td>商品名称</td>
				<td>订购价</td>
				<td>数量</td>
				<td>小计</td>
			</tr>
			<tr>
				<input type="hidden" id="good_id" name="good_id" value="<?php echo $good_id; ?>">
				<?php
					$ss=mysql_query("select * from goods where good_id='$good_id'");
					$f=mysql_fetch_array($ss);
					?>
				<td align="center"><a target="_blank" href="see_good.php?good_id=<?php echo $f['good_id']; ?>"><img width="150" src="<?php echo $f['main_img'] ?>"></a></td>
				<td><a target="_blank" style="color: gray;" href="see_good.php?good_id=<?php echo $f['good_id'] ?>"><?php echo $f['good_name'] ?></a></td>
				<td><span id="price"><?php echo $f['good_price'] ?></span>元</td>
				<td><input type="text" id="n" name="n" onblur="changeNum(this.value)" value="<?php echo $numm; ?>" size="4" style="border: 1px solid #CCDD55;"></td>
				<td><span id="total"><?php echo $f['good_price']*$numm ?></span>元</td>
				<input type="hidden" id="price" name="price" value="<?php echo $f['good_price'] ?>">
				<input type="hidden" id="good_name" name="good_name" value="<?php echo $f['good_name'] ?>">
			</tr>
			<hr size="1" color="gray" />
			<tr>
				<td align="center">备注:<textarea style="width: 500px;height: 70px;" placeholder="你还有什么要叮嘱的吗？请告诉我们"></textarea></td>
				<td style="color: red;font-size: 16px;">商品金额：￥<span  id="ta"><?php echo $f['good_price']*$numm ?></span>元<br>
					配送费用:  ￥0元<br>
					共计金额:  ￥<span id="to"><?php echo $f['good_price']*$numm ?></span>元<br>
				</td>
			</tr>
		</table>
	</div>
</div>
<div id="last" style="margin: 0 auto;text-align: center;width: 80%;height: auto;margin-bottom: 200px;">
	<table width="99%" align="center" border="0" cellpadding="5" cellspacing="0" bgcolor="#DDDDDD">
		<tbody>
			<tr>
				<td bgcolor="#FFFFFF"><a href="#"><button>返回购物车</button></a></td>
			    <td bgcolor="#FFFFFF" align="right"><input type="submit" style="width: 100px;height: 40px;color: white;font-size: 20px;background-color: red;border: 0;" value="确认下单"></td>
			</tr>
		</tbody>
	</table>
	
</div>
</div>
</form>
<?php } ?>
<script type="text/javascript" src="../easyui/jquery.min.js"></script>
<script type="text/javascript">
	function changeNum(num){
	var price=($("#price").html())*num;
	$("#total").html(price);
	$("#to").html(price);
	$("#ta").html(price);
//	$("#allme").value=price;
	}
</script>

<script  type="text/javascript" language="javascript">
function checkform(){
    var inputs=form1.getElementsByTagName('input');
    for(i=0;i<inputs.length;i++){
        if(inputs[i].value==''){
            inputs[i].focus();
            return false;
        }
    }
   	var tel=form1.tel.value;
   	var tel1=form1.tel1.value;
   	var a=form1.province.value;
	var b=form1.city.value;
	var c=form1.area.value;
   	var myreg=/^[1][3,4,5,7,8][0-9]{9}$/; 
   	if (!myreg.test(tel)){ 
   		alert("请正确填写订购人手机号码");
           return false;  
         }else if(!myreg.test(tel1)){  
           alert("请正确填写收货人手机号码");
           return false;  
          }else if((a=='请选择省份')||(a=='')||(b=='请选择城市')||(b=='')||(c=='请选择地区')||(c=='')){
          	alert("请正确选择收货人地址");
           return false; 
          }else if(form1.ch.value==''){
          	alert('请选择付款方式');
          	return false;
          }else{
          	return true;
          }
    
}
function Bg1(){
	 $("#div1").fadeToggle();
	 $("#div2").fadeOut();
	 $("#div3").fadeOut();
}
function Bg2(){
	 $("#div2").fadeToggle();
	 $("#div1").fadeOut();
	 $("#div3").fadeOut();
}
function Bg3(){
	 $("#div3").fadeToggle();
	 $("#div1").fadeOut();
	 $("#div2").fadeOut();
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
</script>