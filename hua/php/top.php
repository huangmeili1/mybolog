<meta charset="utf-8" />
<style type="text/css">
	#a1{
		list-style: none;
		float: left;
		margin: 0 auto;
	}
	#a1 li{
		 list-style: none outside none;
		float: left;
		padding:7px 10px;
		font-size: 13px;
		color: black;
	}
	body a{
	 text-decoration: none;
	}
	#a1 a{
		color: #343434;
	}
	#a1 a:hover{
		color: #990000;
	}
	#a1 li{background:linear-gradient(to bottom,gainsboro,black) no-repeat right / 1px 15px;}
        /*删除第一项和最后一项导航分隔线*/
	#a1 li:last-child{background:none;}
	#p li{
		 list-style: none outside none;
		float: left;
		margin-top: 30px;
		
	}
	#u{
		padding: 0 8px;
		background:linear-gradient(to bottom,#dd2926,#a82724,#dd2926) no-repeat right / 1px 15px;
		
	}
	#u:last-child{background:none;}
	
	.nav1{
		width: 80%;
		height: 25%;
		/*background-color: red;*/
		margin: 0 auto;
		text-align: center;
		border-radius: 10px 10px 10px 10px;
		color: white;
	}
	.nav li{
		list-style: none;
		float: left;
		padding: 0 16px;
		margin-top: 9px;
		font-size: 20px;
		color: white;
	}
	.help-block a{
		color: grey;
	}
	.help-block a{
		color: black;
		text-decoration: none;
		
	}
	#top{
		position: fixed;
		z-index: 200;
	}
	
</style>
<?php
@session_start();
include("../conn/dataconnection.php");
@$user_id=$_SESSION['user_id'];
$sql=mysql_query("select * from cart where user_id='$user_id'");
@$num=mysql_num_rows($sql);
?>
<div id="topa" style="width: 100%;height: 25%;">
	<div id="top" style="margin: 0 auto;text-align: center;background-color:gainsboro;width: 100%;height: 30px;">
	<div id="a2" style="width: 55%;float: right;margin-top: 0;">
		<ul id="a1">
		<li>
			<a href="login.php">你好,请登录</a>
		</li>
		<li>
			<a href="useradd.php">找回密码</a>
		</li>
		<li>
			<a href="reg.php" target="_blank">注册</a>
		</li>
		<li>
			<a href="personcenter.php">个人中心</a>
		</li>
		<li>
			<a href="">帮助中心</a>
		</li>
		<li>
			<a style="color: red;" href="cart.php">购物车(<?php echo $num; ?>)</a>
		</li>
		<li>
			<a href="login.php">我的订单</a>
		</li>
		<li>
			<?php
				$pn=mysql_query("select * from storegood where user_id='$user_id'");
				@$hn=mysql_num_rows($pn);
				?>
			<a href="login.php">我的收藏(<?php echo $hn; ?>)</a>
		</li>
		<li><div class="time" id="colok"></div></li>
	</ul>
  </div>
</div>
	<div id="top1" style="width: 100%;height: 80%;">
		  <div id="tt" style="width: 30%;height: 100%;float: left;">
			<img style="margin-top: 70px;margin-left: 150px;" src="../img/logo1.png" />
		  </div>
	  <div id="yy" style="float: right;width: 70%;height: 100%;">
			   <div id="yy1" style="float: left;height: 100%;width: 60%;">
			    <form style="margin-top: 90px;" id="f1" action="">
				<input type="text" name="keyword" size="70" style="height: 40px;border: 2px solid #990000;border-radius: 8px;">
				<input type="submit" name="tj" value="提交" style="border-radius: 10px;height: 38px;width: 80px;background-color: #990000;border: 0;color: white;font-size: 18px;">
			    </form>
			    <span class="help-block" style="color: gainsboro;font-size: 12px;">
                 <a href="/hongmeigui/" target="_blank">红玫瑰</a> | <a href="/yongshenghua/" target="_blank">永生花</a> | <a href="/shengriliwu/" target="_blank">生日鲜花</a> | <a href="/qiyetuangou/gift_card.html" target="_blank">礼品卡</a>
                </span>
			   </div>
			   <div id="yy2" style="float: right;width:40%;height: 100%;margin-top: 45px;">
					<ul id="p">
						<li><img style="" width="80" src="../img/tel.png" /></li>
						<li style="margin-top: 55px;" id="u"><span>400-889-8188 </span></li>
					    <li style="margin-top: 55px;" id="u"><span>在线客服</span></li>
					</ul>
				</div>
	  </div>
	</div>
</div>

<script type="text/javascript">
	function get10(i) {
    if (i < 10) {
        i = "0" + i
    };
    return i
}
//setInterval(function() {
//  var d = new Date()
//  var t = d.getHours()
//  var m = d.getMinutes()
//  $(".time").html("当前时间:"+" <font color='red' style='font-size:18px'>"+get10(t) + ":" + get10(m) + "</font>")
//}, 100)
 function clock(){
    var time=new Date();          
    var attime=time.toLocaleTimeString();
    $(".time").html(attime);
  }
  var int=setInterval(clock,1000);
</script>
 