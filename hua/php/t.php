<meta charset="utf-8" />
<style type="text/css">
	#aa12 ul li{
		 list-style: none outside none;
		float: left;
		padding:7px 10px;
		font-size: 13px;
		color: black;
		margin-top: -8px;
		background:linear-gradient(to bottom,gainsboro,black) no-repeat right / 1px 15px;
	}
	#aa12 li:last-child{background:none;}
	#aa12 ul li a{
		color: black;
		text-decoration: none;
		
	}
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
	.help-block a{
		color: gray;
		text-decoration: none;
		
	}
</style>
<?php
$sql=mysql_query("select * from goods limit 0,3");
?>
<div id="aa">
	<div id="aa1">
		<div id="aa11" style="float: left;width: 100%;height: 40px;background-color: gainsboro;">
			<div id="aa12" style="float: right;width: 50%;">
				<ul id="a1">
					<li>
						<a href="">你好,请登录</a>
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
						<a style="color: red;" href="">购物车()</a>
					</li>
					<li>你的心意，交给我们</li>
				</ul>
			</div>
		</div>
	</div>
	<div id="bb" style="width: 100%;height: 200px;">
		 <div id="tt" style="width: 30%;height: 100%;float: left;">
			<img style="margin-top: 30px;margin-left: 150px;" src="../img/lo.png" />
		  </div>
		  <div id="yy" style="float: right;width: 70%;height: 100%;">
			<div id="yy1" style="float: left;height: 100%;width: 60%;">
					    <form style="margin-top: 50px;" id="f1" action="">
								<input type="text" name="keyword" size="70" style="height: 40px;">
								<input type="submit" name="tj" value="提交" style="height: 38px;width: 80px;background-color: orange;border: 0;color: white;font-size: 16px;">
					    </form>
					    <span class="help-block" style="color: gainsboro;font-size: 12px;">
		                 	<a href="/hongmeigui/" target="_blank">红玫瑰</a> | <a href="/yongshenghua/" target="_blank">永生花</a> | <a href="/shengriliwu/" target="_blank">生日鲜花</a> | <a href="/qiyetuangou/gift_card.html" target="_blank">礼品卡</a>
		                </span>
			</div>
			<div id="yy2" style="float: right;width:40%;height: 100%;">
						<ul id="p">
							<li><img style="" width="80" src="../img/tel.png" /></li>
							<li style="margin-top: 55px;" id="u"><span>400-889-8188 </span></li>
						    <li style="margin-top: 55px;" id="u"><span>在线客服</span></li>
						</ul>
		    </div>
	  </div>
	</div>
</div>
<?php include("dome.php") ?>