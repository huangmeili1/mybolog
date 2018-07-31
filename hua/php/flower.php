<meta charset="utf-8" />
<title>鲜花</title>
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<link type="text/css" rel="stylesheet" href="../css/flower.css">
<style type="text/css">
	body{
		font-family: tahoma, arial, 'Hiragino Sans GB', '\5b8b\4f53', sans-serif;
		padding: 0;
		margin: 0;
		font-size: 14px;
	}
	body a:hover{
		color: orange;
	}
	body a{
		color: grey;
	}
	.aaaa15{
		/*background-color: orange;*/
	}
	.aaaa15 li{
		padding: 0 16px;
		list-style: none;
		display: inline-block;
		text-align:center;
	}
	#tn:after{
		content:"";
		height: 0;
		line-height: 0;
		display: block;
		visibility: hidden;
		clear: both;
	}
	.aaaa11:after{
		content:"";
		height: 0;
		line-height: 0;
		display: block;
		visibility: hidden;
		clear: both;
	}
	#tn12 a{
		color: dimgrey;
	}
	#tn12 a:hover{
		color: red;
	}
	#main1 ul li{
		list-style: none;
		float: left;
		display:inline-block;
		padding: 10px 7px;
	}
	#box a{
		color: #323232;
	}
	#main:after{
		content:"";
		height: 0;
		line-height: 0;
		display: block;
		visibility: hidden;
		clear: both;
	}
</style>
<?php
include("top.php");
include("../conn/dataconnection.php");
?>
<div id="flower">
	<div id="flower1" style="width: 100%;height: auto;">
			<div class="aaaa11" style="width: 30%;height: 35px;float: left;background-color: orangered;">
				<div id="mmn" style="width: 29%;height: auto;float: left;"></div>
				<div id="mnn" style="width: 51%;height: auto;float: right;background-color: black;margin-right: 72px;">
					<div id="mnn1" style="width: 100%;height: 35px;background-color: red;">
					 <table align="right" style="text-align: center;margin-top: 0px;font-size: 20px;">
						<tr>
							<td style="color: white;">全部商品导航</td>
							<td><img width="40" height="30" src="../img/xin.png"></td>
						</tr>
					 </table>
					</div>
					<div id="first" style="width: 100%;height: 800px;background-color: #0081C2;display: none;">
						<div>
							<span style="color: orange;padding-left: 5px;font-size: 17px;">鲜花用途</span>
							<table style="margin-left: 10px;line-height: 17px;" cellspacing="7">
								<tr>
									<td><a href="">爱情鲜花</a></td>
									<td><a href="">友情鲜花</a></td>
									<td><a href="">生日鲜花</a></td>
								</tr>
								<tr>
									<td><a href="">问候长辈</a></td>
									<td><a href="">探病慰问</a></td>
									<td><a href="">道歉鲜花</a></td>
								</tr>
								<tr>
									<td><a href="">祝贺鲜花</a></td>
									<td><a href="">婚庆鲜花</a></td>
									<td><a href="">商务鲜花</a></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				
			</div>
			<div class="aaaa15" style="height: 35px;width: 70%;float: right;font-size: 20px;background-color: orangered;">
				<ul style="margin-top: 8px;">
					<li><a href="index.php">首页</a></li>
					<li><a href="flower.php"><span style="color: #000000;">鲜花</span></a></li>
			    	<li><a href="">永生花</a></li>
			    	<li><a href="">商务花篮</a></li>
			    	<li><a href="">绿色植物</a></li>
			    	<li><a href="">蛋糕</a></li>
			    	<li><a href="">礼品</a></li>
			    	<li><a href="">花语大全</a></li>
				</ul>
			</div>
	</div>
	<div id="tn" style="width: 80%;height: auto;margin: 0 auto;text-align: center;">
		<div id="tn1" style="width: 19%;height: auto;margin-top: 10px;float: left;border: 1px solid gray;">
			<div id="tn12" style="width: 100%;height: 880px;background-color: white;">
				
				
				<div id="table1" style="margin-bottom: 20px;">
					<table style="margin-left: 10px;line-height: 17px;" cellspacing="7">
					<tr>
						<td rowspan="7" align="center"><span style="color: orangered;">用途</span></td>
						<td><a href="">爱情鲜花</a></td>
						<td><a href="">友情鲜花</a></td>
					</tr>
					<tr>
						<td><a href="">生日鲜花</a></td>
						<td><a href="">问候长辈</a></td>
					</tr>
					<tr>
						<td><a href="">回报老师</a></td>
						<td><a href="">探病慰问</a></td>
					</tr>
					<tr>
						<td><a href="">道歉鲜花</a></td>
						<td><a href="">婚庆鲜花</a></td>
					</tr>
					<tr>
						<td><a href="">祝贺鲜花</a></td>
						<td><a href="">哀思鲜花</a></td>
					</tr>
					<tr>
						<td><a href="">商务鲜花</a></td>
						<td><a href="">开业鲜花</a></td>
					</tr>
					<tr>
						<td><a href="">自选鲜花</a></td>
						<td><a href="">定制鲜花</a></td>
					</tr>
				    </table>
			    </div>
			    <div id="table2" style="margin-bottom: 20px;margin-top: 10px;">
			    	<hr size="2" style="width: 200px;text-align: center;margin: 0 auto;" color="black" />
					<table style="margin-left: 10px;line-height: 17px;" cellspacing="7">
					<tr>
						<td rowspan="14"><span style="color: orangered;">花材</span></td>
						<td><a href="">玫瑰</a></td>
						<td><a href="">红玫瑰</a></td>
					</tr>
					<tr>
						<td><a href="">粉玫瑰</a></td>
						<td><a href="">白玫瑰</a></td>
					</tr>
					<tr>
						<td><a href="">紫玫瑰</a></td>
						<td><a href="">蓝玫瑰</a></td>
					</tr>
					<tr>
						<td><a href="">香槟玫瑰</a></td>
						<td><a href="">黄玫瑰</a></td>
					</tr>
					<tr>
						<td><a href="">康乃馨</a></td>
						<td><a href="">百合</a></td>
					</tr>
					<tr>
						<td><a href="">扶郞</a></td>
						<td><a href="">向日葵</a></td>
					</tr>
					<tr>
						<td><a href="">郁金香</a></td>
						<td><a href="">马蹄莲</a></td>
					</tr>
				    </table>
			    </div>
			     <div id="table3" style="margin-bottom: 20px;margin-top: 10px;">
			    	<hr size="2" style="width: 200px;text-align: center;margin: 0 auto;" color="black" />
					<table style="margin-left: 10px;line-height: 17px;" cellspacing="7">
					<tr>
						<td rowspan="4"><span style="color: orangered;">价格</span></td>
						<td><a href="">特价鲜花</a></td>
						<td><a href="">150元以下</a></td>
					</tr>
					<tr>
						<td><a href="">150-250元</a></td>
						<td><a href="">250-350元</a></td>
					</tr>
					<tr>
						<td><a href="">350-550元</a></td>
						<td><a href="">550-800元</a></td>
					</tr>
					<tr>
						<td><a href="">800以上</a></td>
					</tr>
				    </table>
			    </div>
			     <div id="table4" style="margin-bottom: 20px;margin-top: 10px;">
			    	<hr size="2" style="width: 200px;text-align: center;margin: 0 auto;" color="black" />
					<table style="margin-left: 10px;line-height: 17px;" cellspacing="7">
					<tr>
						<td rowspan="5"><span style="color: orangered;">枝数</span></td>
						<td><a href="">9枝</a></td>
						<td><a href="">10枝</a></td>
						<td><a href="">11枝</a></td>
					</tr>
					<tr>
						<td><a href="">12枝</a></td>
						<td><a href="">16枝</a></td>
						<td><a href="">18枝</a></td>
					</tr>
					<tr>
						<td><a href="">19枝</a></td>
						<td><a href="">20枝</a></td>
						<td><a href="">22枝</a></td>
					</tr>
					<tr>
						<td><a href="">29枝</a></td>
						<td><a href="">33枝</a></td>
						<td><a href="">36枝</a></td>
					</tr>
					<tr>
						<td><a href="">50枝</a></td>
						<td><a href="">66枝</a></td>
						<td><a href="">99枝以上</a></td>
					</tr>
				    </table>
			    </div>
			     <div id="table5" style="margin-bottom: 20px;margin-top: 10px;">
			    	<hr size="2" style="width: 200px;text-align: center;margin: 0 auto;" color="black" />
					<table style="margin-left: 10px;line-height: 17px;" cellspacing="7">
					<tr>
						<td rowspan="4"><span style="color: orangered;">对象</span></td>
						<td><a href="">恋人</a></td>
						<td><a href="">朋友</a></td>
					</tr>
					<tr>
						<td><a href="">父母</a></td>
						<td><a href="">客户</a></td>
					</tr>
					<tr>
						<td><a href="">老师</a></td>
						<td><a href="">领导</a></td>
					</tr>
					<tr>
						<td><a href="">儿童</a></td>
						<td><a href="">病人</a></td>
					</tr>
				    </table>
			    </div>
			    <div id="table6" style="margin-bottom: 20px;margin-top: 10px;">
			    	<hr size="2" style="width: 200px;text-align: center;margin: 0 auto;" color="black" />
					<table style="margin-left: 10px;line-height: 17px;" cellspacing="7">
					<tr>
						<td rowspan="4"><span style="color: orangered;">节日</span></td>
						<td><a href="">情人节</a></td>
						<td><a href="">七夕节</a></td>
						<td><a href="">圣诞节</a></td>
					</tr>
					<tr>
						<td><a href="">母亲节</a></td>
						<td><a href="">女生节</a></td>
						<td><a href="">父亲节</a></td>
					</tr>
					<tr>
						<td><a href="">中秋节</a></td>
						<td><a href="">教师节</a></td>
						<td><a href="">春节</a></td>
					</tr>
					<tr>
						<td><a href="">儿童</a></td>
						<td><a href="">病人</a></td>
					</tr>
				    </table>
			    </div>
			</div>
			 
			<div id="buy" style="width: 100%;height: auto;margin-top: 40px;">
				<div id="tit" style="width: 100%;height: 30px;background-color: #FF6600 ;"><span style="color: #3D3D3D;font-size: 24px;">热销鲜花推荐</span></div>
			 	<div id="buy1" style="width: 100%;height: auto;">
			 		<div id="box">
						<ul>
			 		<?php 
			 			$ss=mysql_query("select * from goods limit 0,8");
			 			@$n=mysql_num_rows($ss);
			 			if($n<=0){
			 				echo "暂无鲜花信息";
			 			}else{
			 				while($ff=mysql_fetch_array($ss)){
			 					?>
			 			<li>
			 				<hr size="1" color="gray" />
							<div id="pn">
							<div class="con" style="margin-top: 20px;">
							<a href="see_good.php?good_id=<?php echo $ff['good_id'] ?>" class="a-img ">
							<img style="width: 228px;height: 280px;" src="<?php echo $ff['main_img'] ?>" />
							</a>
							<p align="center">
							<span><h3 style="color: orange;text-align: center;">￥<?php echo $ff['good_price'] ?></h3></span>
							</p> 
							</div>
							<div class="bottom" style="overflow:hidden;margin-bottom: 20px;">
							<a href="see_good.php?good_id=<?php echo $ff['good_id'] ?>"><?php echo $ff['good_name'] ?></a>
							</div>
							</div>
						</li>
			 					<?php
			 				}
			 				?>
			 					</ul>
							</div>
			 				<?php
			 			}
			 			?>
			 	</div>
			 	<div id="com" style="width: 100%;height: 500px;margin-top: 30px;background-color: red;">
			 		<div id="test" style="width: 100%;height: 30px;background-color: white;border: 0;"></div>
			 		<div id="com1" style="width: 100%;height: 40px;background-color: pink;"><span style="font-size: 24px;">最新鲜花订单评价</span></div>
			 	</div>
			 </div>
			 
		</div>
		<div id="tn2" style="width: 80%;height: auto;float: right;">
			<div id="tn21" style="width: 100%;height: auto;margin-top: 10px;">
			<div id="playBox">
			      <div class="pre" style="font-size: 36px;color: white;background-color: gray;">&lt;</div>
			      <div class="next" style="font-size: 36px;color: white;background-color: gray;">&gt;</div>
			      <div class="smalltitle">
			    	<ul>
			          <li class="thistitle"></li>
			          <li></li>
			          <li></li>
			          <li></li>
			          <li></li>
			        </ul>
			  	  </div>
				  <ul class="oUlplay">
				    <li><img src="../img/xianhua.jpg"></li>
				    <li><img src="../img/xianhua02.jpg"></li>
				    <li><img src="../img/xianhua02.jpg"></li>
				    <li><img src="../img/xianhua02.jpg"></li>
				    <li><img src="../img/xianhua02.jpg"></li>
				  </ul>
 			</div>
		</div>
		<div id="fff" style="width: 100%;height: 35px;background-color: gainsboro;margin-top: 10px;">
			<div style="width: 30%;height: 100%;float: left;">
				<table style="line-height: 35px;font-size: 20px;">
					<tr>
						<td width="60"><a href="flower.php" style="color: orangered;"><span id="zz">综合</span></a></td>
						<td width="60"><a href="javascript:lou('chagepage.php?type=销量','销量')"><span id="z1">销量</span></a></td>
						<td width="60"><a href="javascript:lou('chagepage.php?type=价格','价格')"><span id="z2">价格</span></a></td>
						<td width="60"><a href="javascript:lou('chagepage.php?type=最新','最新')"><span id="z3">最新</span></a></td>
					</tr>
				</table>
			</div>
			<div style="width: 70%;height: 100%;float: right;">
				
			</div>
		</div>
		<div id="dd">
		<div id="main1" style="width: 100%;height:auto;">
			<div id="main" style="width: 100%;height: auto;">
			<div id="box">
				<ul>
			<?php
				$sql=mysql_query("select * from goods");
				@$num=mysql_num_rows($sql);
				if($num<=0){
					echo "暂无鲜花信息";
				}else{
					$pagesize=12;
					if(isset($_GET['page'])){
						$page=$_GET['page'];
					}else{
						$page=1;
					}
				    $number=ceil($num/$pagesize);
				    $ps=($page-1)*$pagesize;
					$SQL=mysql_query("select * from goods limit $ps,$pagesize"); 
					while($fo=mysql_fetch_array($SQL)){
						?>
						<li>
							<div id="pn">
							<div class="con" style="margin-top: 10px;">
							<a href="see_good.php?good_id=<?php echo $fo['good_id'] ?>" class="a-img ">
							<img style="width: 228px;height: 280px;" src="<?php echo $fo['main_img'] ?>" />
							</a>
							<p align="center">
							<span><h3 style="color: orange;text-align: center;">￥<?php echo $fo['good_price'] ?></h3></span>
							</p> 
							</div>
							<div class="bottom" style="overflow:hidden;">
							<a href="see_good.php?good_id=<?php echo $fo['good_id'] ?>"><?php echo $fo['good_name'] ?></a>
							</div>
							<div style="margin-top: 10px;">
							<div style="border: 1px solid gray;width: 80px;height: 20px;text-align: center;float: left;margin-left: 40px;">收藏</div>
							<a href="javascript:addCart(<?php echo $fo['good_id'] ?>,1)"><div style="border: 1px solid gray;width: 85px;float: right;height: 20px;margin-right: 10px;">加入购物车</div></a>
							</div>
							</div>
						</li>
						<?php
					}
						?>
				</ul>
			</div>
						<?php
				}
				?>
				</div>
		
		<div id="yes" style="width: 100%;height: 100px;color: gray;">
			<hr size="1" color="black" />
			<div>
				<?php
					$pr=$page-1;
					$pn=$page+1;
					?>
				<table style="line-height: 100px;width: 100%;">
					<tr>
						<td align="left">
							1-<?php echo $number; ?>/共<?php echo $num;?>件商品
						</td>
						<?php
							if($number>=9){
								?>
						<td align="right" style="width: 830px;">
							<table border="1">
								<tr>
									<?php
										if($page<=1){
											?>
											<td width="80"><span><上一页</span></td>
											<?php
										}else{
											?>
											<td width="80"><a style="color: dimgrey;" href="flower.php?page=<?php echo $pr ?>"><span><上一页</span></a></td>
											<?php
										}
										?>
									<td width="35" align="center" height="40"><a href="flower.php?page=1"><span>1</span></a></td>
									<td width="35" align="center" height="40"><a href="flower.php?page=2"><span>2</span></a></td>
									<td width="35" align="center" height="40"><a href="flower.php?page=3"><span>3</span></a></td>
									<td width="35" align="center" height="40"><a href="flower.php?page=4"><span>4</span></a></td>
									<td width="35" align="center" height="40"><a href="flower.php?page=5"><span>5</span></a></td>
									<td width="35" align="center" height="40"><a href="flower.php?page=6"><span>6</span></a></td>
									<td width="35" align="center" height="40"><span>.....</span></td>
									<td width="35" align="center" height="40"><a href="flower.php?page=<?php echo $number ?>"><span><?php echo $number; ?></span></a></td>
										<?php
										if($page>=$number){
										?>
										<td width="80"><span>下一页></span></td>
										<?php	
										}else{
											?>
											<td width="80"><a href="flower.php?page=<?php echo $pn ?>"><span>下一页></span></a></td>
											<?php
										}
										?>
								</tr>
							</table>
						</td>
								<?php
							}else{
								?>
						<td align="right" style="width: 830px;">
							<table border="1">
								<tr>
									<?php
										if($page<=1){
											?>
											<td width="80"><span><上一页</span></td>
											<?php
										}else{
											?>
											<td width="80"><a href="flower.php?page=<?php echo $pr ?>"><span><上一页</span></a></td>
											<?php
										}
										for($i=1;$i<=$number;$i++){
											?>
											<td width="35" height="40" align="center"><a href="flower.php?page=<?php echo $i; ?>"><span><?php echo $i; ?></span></a></td>
											<?php
										}
										if($page>=$number){
										?>
										<td width="80"><span>下一页></span></td>
										<?php	
										}else{
											?>
											<td width="80"><a href="flower.php?page=<?php echo $pn; ?>"><span>下一页></span></a></td>
											<?php
										}
										?>
								</tr>
							</table>
						</td>
								<?php
							}
							?>
						
					</tr>
				</table>
		</div>
			<span style=""><hr size="1" color="black" /></span>
		</div>
		</div>
		
		
		</div>
		<div id="zhange" style="width: 100%;height: 500px;background-color: red;">
			
		</div>
	  </div>
	</div>
</div>
<script type="text/javascript" src="../easyui/jquery.min.js"></script>

<script type="text/javascript" src="../js/flower.js"></script>
<script type="text/javascript">
    window.onload = function(){
        var ms = document.getElementById("mnn1");
        var add = document.getElementById("first");
        var app = document.getElementById("mnn");
        ms.onmouseover = function(){
            add.style.display = "block";
        };
        app.onmouseleave = function(){
            add.style.display = "none";
        };
       
    };
</script>

<script type="text/javascript">
	function lou(page,mess){
	var zz=document.getElementById("zz");
	var z1=document.getElementById("z1");
	var z2=document.getElementById("z2");
	var z3=document.getElementById("z3");
	if(mess=='销量'){
		zz.style.color="dimgrey";
		z1.style.color="orangered";
		z2.style.color="dimgrey";
		z3.style.color="dimgrey";
	}else if(mess=='价格'){
		zz.style.color="dimgrey";
		z1.style.color="dimgrey";
		z2.style.color="orangered";
		z3.style.color="dimgrey";
	}else if(mess=='最新'){
		zz.style.color="dimgrey";
		z1.style.color="dimgrey";
		z2.style.color="dimgrey";
		z3.style.color="orangered";
	}
		$("#main1").load(page);
	}
	
	

function addCart(productid,num){
var url="addcart.php";
var data={"good_id":productid,"num":num};
var sccess=function(response){
	if(response.errno==2){
	alert('请登录');window.location.href='login.php';
	}else if(response.errno==0){
		alert("加入购物车成功");
        $("#topa").load(location.href + " #topa");
		//只刷新一个div
	}else{
		alert("加入购物车失败");
	}
}
$.post(url,data,sccess,"json");
}
//$(function () {
//      setInterval(function () {
//          $("#topa").load(location.href + " #topa");//只刷新一个div
//      }, 8000);//8秒自动刷新
//  })
</script>