<meta charset="utf-8" />
<style type="text/css">
div,ul,li,dl,dt,dd{
	margin:0;
	padding:0;
}
	.aaaa15{
		width: 80%;
		height: 25%;
		margin: 0 auto;
		text-align: center;
	}
	.aaaa15 li{
		list-style: none;
		float: left;
		padding: 0 16px;
		font-size: 20px;
		text-align: center;
	}
	.aaaa15 li a{
		color: white;
		font-size: 18px;
		text-align: center;
	}
	.a12 table tr td a{
		font-size: 12px;
	}
	.aaaa1:after{
		content:"";
		height: 0;
		line-height: 0;
		display: block;
		visibility: hidden;
		clear: both;
	}
	.aa1:after{
		content:"";
		height: 0;
		line-height: 0;
		display: block;
		visibility: hidden;
		clear: both;
	}
	.ff2:after{
		content:"";
		height: 0;
		line-height: 0;
		display: block;
		visibility: hidden;
		clear: both;
	}
	.fill:after{
		content:"";
		height: 0;
		line-height: 0;
		display: block;
		visibility: hidden;
		clear: both;
	}
	.aaaa1 .aa1{
		zoom: 1;
	}
	.item:after{
		content:"";
		height: 0;
		line-height: 0;
		display: block;
		visibility: hidden;
		clear: both;
	}
 /**{ margin: 0; padding: 0; text-decoration: none;}*/
        /*body { padding: 20px;}*/
        #container { width: 650px; height: 450px;  overflow: hidden; position: relative;}
        #list { width: 4550px; height: 450px; position: absolute; z-index: 1;}
        #list img { float: left;}
        #buttons { position: absolute; height: 15px; width: 100px; z-index: 2; bottom: 20px; left: 250px;}
        #buttons span { cursor: pointer; float: left; border: 1px solid #fff; width: 10px; height: 10px; border-radius: 50%; background: #333; margin-right: 5px;}
        #buttons .on {  background: orangered;}
        .arrow { cursor: pointer; display: none; line-height: 39px; text-align: center; font-size: 36px; font-weight: bold; width: 40px; height: 40px;  position: absolute; z-index: 2; top: 180px; background-color: RGBA(0,0,0,.3); color: #fff;}
        .arrow:hover { background-color: RGBA(0,0,0,.7);}
        #container:hover .arrow { display: block;}
        #prev { left: 20px;}
        #next { right: 20px;}
        
        
    *{margin:0px;padding:0px;}
	body{font:"微软雅黑";font-size:14px;}
	a{text-decoration:none;}
	ul,li{list-style:none;}
	#box{height:auto;width:100%;margin:0 auto;/*border: 1px solid pink;*/overflow:hidden;}
	#box ul li{height:auto;/*border:1px solid #aaa;/*@问题?如何让每个@float:left*/float:left;margin:6px;} 
	/*.a-img{height:164px;width:164px;display:block;overflow:hidden;/*问题overflow：hide，如何隐藏超出部分的图片？overflow:hidden;还有其他什么左右？*/}*/
	p a,p span{
		display:block;/*显示在下一行*/
		line-height:23px;
		padding-left:10px;
	}
	.bottom{height:40px;line-height:40px;width: 230px;text-align:center;overflow: hidden;}
	#loveyou:after{
		content:"";
		height: 0;
		line-height: 0;
		display: block;
		visibility: hidden;
		clear: both;
		}
		#friend:after{
		content:"";
		height: 0;
		line-height: 0;
		display: block;
		visibility: hidden;
		clear: both;
			}
			
		 #menu {
            position: fixed;
            top: 230px;
            left: 50%;
            margin-left: 650px;
            width: 50px;
        }

        #menu ul li a {
            display: block;
            margin: 5px 0;
            font-size: 14px;
            font-weight: bold;
            color: #333;
            width: 80px;
            height: 50px;
            line-height: 50px;
            text-decoration: none;
            text-align: center;
        }

        #menu ul li a:hover,
        #menu ul li a.current {
            color: #fff;
            background: #0088bb;
        }
        #comment1:after{
        content:"";
		height: 0;
		line-height: 0;
		display: block;
		visibility: hidden;
		clear: both;
        	}
        #tf a{
        	color: gray;
        	}
        	#loveyou a{
        		color: lightsteelblue;
        		}
        	.item a:hover{
        		color: orange;
        		}
        		#uii a{
        			color: gray;
        			font-size: 15px;
        		}
         #goToTop {
            position: fixed;
            top: 690px;
            left: 50%;
            margin-left: 710px;
            width: 50px;
            height: 40px;
            text-align: center;
            background-color: grey;
            border-radius: 8px;
           line-height:40px;/*
        }
</style>
<?php
include_once("../conn/dataconnection.php");
?>
<?php include("top.php"); ?>
<div id="menu">
    <ul>
        <li><a href="#item1" class="current">顶部</a></li>
        <li><a href="#loveyou">爱情鲜花</a></li>
        <li><a href="#friend">长辈鲜花</a></li>
        <li><a href="#cake">全国蛋糕</a></li>
        <li><a href="#gift">精美礼品</a></li>
        <li><a href="#comment">公告与评价</a></li>
    </ul>
</div>
<div id="goToTop">
	<a href="javascript:;"><span style="font-size: 36px;color: white;">^</span></a>
</div>
<div class="aaaa1" style="width: 100%;height: 75%;margin: 0 auto;">
	<div id="item1" class="aaa11" style="width: 100%;height: 8%;margin: 0 auto;background-color: deeppink;">
		<div class="aaa12" style="height: 100%;width: 8%;float: left;"></div>
		<div class="aaaa13" style="height: 100%;width: 92%;float: right;">
			<div class="aaaa14" style="width: 19%;height: 100%;float: left;background-color: orange;"><span style="color: white;padding: 40px;font-size: 18px;text-align: center;line-height: 50px;">全部商品导购</span></div>
			<div class="aaaa15" style="width: 81%;height: 100%;float: right;margin-top: 8px;">
				<ul>
				<li><a href="index.php">首页</a></li>
				<li><a href="flower.php">鲜花</a></li>
		    	<li><a href="">永生花</a></li>
		    	<li><a href="">商务花篮</a></li>
		    	<li><a href="">绿色植物</a></li>
		    	<li><a href="">蛋糕</a></li>
		    	<li><a href="">礼品</a></li>
		    	<li><a href="">花语大全</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="a11" style="width: 100%;height: 80%;margin: 0 auto;">
		<div class="item active">
            <div class="fill" style="width: 100%;height: 100%;z-index: 3;"><!--background-image:url(../img/longtou.jpg);-->
            	<div id="ff" style="width: 25%;float: left;height: 100%;">
            	<div id="ui" style="width: 33%;height: 100%;float: left;">
            		
            	</div>
			        <div id="uii" style="width: 67%;height: 100%;float: right;">
			            <div id="a121" style="width: 100%;height: 110px;">
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
					    <div id="a122" style="width: 100%;height: 110px;">
					    	<hr size="1" color="gainsboro" width="260" />
							<span style="color: orange;padding-left: 5px;font-size: 17px;">鲜花花材</span>
							<table style="margin-left: 10px;line-height: 17px;" cellspacing="7">
								<tr>
									<td><a href="">玫瑰</a></td>
									<td><a href="">康乃馨</a></td>
									<td><a href="">郁金香</a></td>
								</tr>
								<tr>
									<td><a href="">百合</a></td>
									<td><a href="">扶郞</a></td>
									<td><a href="">马蹄莲</a></td>
								</tr>
								<tr>
									<td><a href="">向日葵</a></td>
									<td><a href="">友情鲜花</a></td>
									<td><a href="">生日鲜花</a></td>
								</tr>
							</table>
					    </div>
					    <div id="a123" style="width: 100%;height: 110px;">
							<span style="color: orange;padding-left: 5px;font-size: 17px;">鲜花用途</span>
							<table style="margin-left: 10px;line-height: 17px;" cellspacing="7">
								<tr>
									<td><a href="">爱情鲜花</a></td>
									<td><a href="">友情鲜花</a></td>
									<td><a href="">生日鲜花</a></td>
								</tr>
								<tr>
									<td><a href="">爱情鲜花</a></td>
									<td><a href="">友情鲜花</a></td>
									<td><a href="">生日鲜花</a></td>
								</tr>
								<tr>
									<td><a href="">爱情鲜花</a></td>
									<td><a href="">友情鲜花</a></td>
									<td><a href="">生日鲜花</a></td>
								</tr>
							</table>
					    </div>
					    <div id="a124" style="width: 100%;height: 110px;">
							<span style="color: orange;padding-left: 5px;font-size: 17px;">鲜花用途</span>
							<table style="margin-left: 10px;line-height: 17px;" cellspacing="7">
								<tr>
									<td><a href="">爱情鲜花</a></td>
									<td><a href="">友情鲜花</a></td>
									<td><a href="">生日鲜花</a></td>
								</tr>
								<tr>
									<td><a href="">爱情鲜花</a></td>
									<td><a href="">友情鲜花</a></td>
									<td><a href="">生日鲜花</a></td>
								</tr>
								<tr>
									<td><a href="">爱情鲜花</a></td>
									<td><a href="">友情鲜花</a></td>
									<td><a href="">生日鲜花</a></td>
								</tr>
							</table>
					    </div>
            		</div>
            	</div>
            	<div class="ff2" style="width: 75%;float: right;height: 100%;">
            		<div id="at" style="width: 57.2%;float: left;height: 100%;">
						 <div id="container">
						    <div id="list" style="left: -650px;">
						        <img style="width: 650px;" src="../img/5.jpg" alt="1"/>
						        <img style="width: 650px;" src="../img/1.jpg" alt="1"/>
						        <img style="width: 650px;" src="../img/2.jpg" alt="2"/>
						        <img style="width: 650px;" src="../img/3.jpg" alt="3"/>
						        <img style="width: 650px;" src="../img/4.jpg" alt="4"/>
						        <img style="width: 650px;" src="../img/5.jpg" alt="5"/>
						        <img style="width: 650px;" src="../img/1.jpg" alt="5"/>
						    </div>
						    <div id="buttons">
						        <span index="1" class="on"></span>
						        <span index="2"></span>
						        <span index="3"></span>
						        <span index="4"></span>
						        <span index="5"></span>
						    </div>
						    <a href="javascript:;" id="prev" class="arrow">&lt;</a>
						    <a href="javascript:;" id="next" class="arrow">&gt;</a>
					    </div>
            		</div>
            		<div id="att" style="width: 42.8%;float: left;height: 100%;">
            			<div id="ww" style="width: 30%;height: 100%;float: right;">
            			
            			</div>
            			<div id="ww" style="width: 70%;height: 100%;float: left;background-color: pink;">
            				<table>
            					<tr>
            						<td><a href="/product/9010877.html" target="_blank"><img src="//img02.hua.com/tuijian/rightbox_1_180224.jpg" height="145" width="225"></a></td>
            						<td>
            							幸福之花<br>
            							售价：298元
            						</td>
            					</tr>
            					<tr>
            						<td><a href="/product/9012009.html" target="_blank"><img src="//img02.hua.com/tuijian/rightbox_2_180224.jpg" height="145" width="225"></a></td>
            						<td>
            							忘情巴黎<br>
            							售价：298元
            						</td>
            					</tr>
            					<tr>
            						<td><a class="last-child" href="/product/9012150.html" target="_blank"><img src="//img02.hua.com/tuijian/rightbox_3_180224.jpg" height="145" width="225"></a></td>
            						<td>
            							幸福久久<br>
            							售价：300元
            							</td>
            					</tr>
            					
            				</table>
            				
				            
				            
            			</div>
            		</div>
            	</div>
            </div>
        </div>
        <?php
        	$sql=mysql_query("select * from goods limit 0,4");
        	@$num=mysql_num_rows($sql);
//      	echo $num;
        	
        	?>
        
        <div class="item">
            <div class="fill" style="width: 82.2%;height: 100%;margin-left: 122px;">
            	<div class="p1" style="width: 100%;height: 350px;">
            		<div class="pp1" style="width: 20.2%;height: 100%;float: left;background-color: limegreen;">
            			<img style="margin-left: 25px;margin-top: 80px;" width="210" align="center" height="150" src="../img/clock.png" /><br>
						<h2 style="text-align: center;color: white;">限时推荐</h2>
            		</div>
            		<div class="demo" style="width: 79.8%;height: 100%;float: right;">
            				<div id="box">
								<ul>
									<?php 
										if($num<=0){
											echo "暂无推荐";
										}else{
											while($f=mysql_fetch_array($sql)){
											?>
									<li>
										<div class="con">
										<a href="see_good.php?good_id=<?php echo $f['good_id'] ?>" class="a-img ">
											<img style="width: 228px;height: 75%;" src="<?php echo $f['main_img'] ?>" />
										</a>
										<p align="center">
											<span>
												<del style="color: red;text-align: center;">原价:￥<?php echo $f['prime_cost'] ?></del>
												<h3 style="color: black;text-align: center;">现价:￥<?php echo $f['good_price'] ?></h3>
											</span>
										 </p> 
										 </div>
										 <div class="bottom" style="overflow:hidden;">
										 	<a href="see_good.php?good_id=<?php echo $f['good_id'] ?>"><?php echo $f['good_name'] ?></a>
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
            	</div>
            	<div id="loveyou" style="width: 100%;height: auto;margin-top: 30px;">
            		<div id="cc1" style="width: 20.2%;float: left;">
						<div class="hd">
			              <h3><a style="text-decoration: none;color: black;font-size: 21px;color: deeppink;" href="/aiqingxianhua/" target="_blank">爱情鲜花</a>&nbsp;&nbsp;<span style="font-size: 15px;color: gray;">送·让你怦然心动的人</span></h3>
			            </div>
			            <div class="bd-l">
			                <div class="banner-box">
			                    <a href="/aiqingxianhua/" target="_blank"><img width="252" height="530" src="../img/banner_love.jpg"></a>
			                </div>
			                <div style="background-color: pink;height: 110px;margin: 0 auto;text-align: center;padding-top: 50px;"><a style="text-decoration: none;color: white;font-size: 20px;border: 2px solid white;text-align: center;" class="banner-link" href="/aiqingxianhua/" target="_blank">爱情鲜花专区 &gt;&gt;</a></div>
			            </div>
					</div>
					<div id="love2" style="float: right;width: 79.8%;height: auto;margin-top: 21px;">
						<div id="box">
						 <ul>
						<?php
							$pl=mysql_query("select * from goods limit 0,8");
							@$n=mysql_num_rows($pl);
							if($n<=0){
								echo "暂无鲜花信息";
							}else{
								while($love=mysql_fetch_array($pl)){
									?>
									<li>
										<div class="con">
										<a href="see_good.php?good_id=<?php echo $love['good_id'] ?>" class="a-img ">
											<img style="width: 228px;height: 60%;" src="<?php echo $love['main_img'] ?>" />
										</a>
										<p align="center">
											<span><del style="color: red;text-align: center;">原价:￥<?php echo $love['prime_cost'] ?></del></span>
											<span><h3 style="color: black;text-align: center;">现价:￥<?php echo $love['good_price'] ?></h3></span>
										 </p> 
										 </div>
										 <div class="bottom" style="overflow:hidden;">
										 	<a href="see_good.php?good_id=<?php echo $love['good_id'] ?>"><?php echo $love['good_name'] ?></a>
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
            	</div>
            	
            	
            	<div id="friend" style="width: 100%;height: auto;">
            		<div id="friend1" style="width: 20.2%;height: auto;float: left;">
            			<div id="friend11" style="margin-top: 30px;">
            				<span><h3 style="font-size: 15px;color: gray;"><a style="font-size: 22px; color: darkviolet;" href="">送长辈鲜花</a>赠·父母/恩师/长辈</h3></span>
            			</div>
            			<div id="friend12">
            				<img width="252" height="530" src="../img/friend.jpg" />
            			</div>
            			<div style="background-color: mediumpurple;height: 120px;margin: 0 auto;text-align: center;padding-top: 50px;"><a style="text-decoration: none;color: white;font-size: 20px;border: 2px solid white;text-align: center;" href="" target="_blank">长辈鲜花专区 &gt;&gt;</a></div>
            		</div>
            		<div id="friend13" style="width: 79.8%;height: auto;float: right;margin-top: 53px;">
            			<div id="box">
						 <ul>
            			<?php 
            				$friend=mysql_query("select * from goods limit 0,8");
            				$nm=mysql_num_rows($friend);
            				if($nm<=0){
            					echo "暂无鲜花信息";
            				}else{
            					while($fr=mysql_fetch_array($friend)){
            						?>
            						<li>
										<div class="con">
										<a href="see_good.php?good_id=<?php echo $fr['good_id'] ?>" class="a-img ">
											<img style="width: 228px;height: 60%;" src="<?php echo $fr['main_img'] ?>" />
										</a>
										<p align="center">
											<span><del style="color: red;text-align: center;">原价:￥<?php echo $fr['prime_cost'] ?></del></span>
											<span><h3 style="color: black;text-align: center;">现价:￥<?php echo $fr['good_price'] ?></h3></span>
										 </p> 
										 </div>
										 <div class="bottom" style="overflow:hidden;">
										 	<a href="see_good.php?good_id=<?php echo $fr['good_id'] ?>"><?php echo $fr['good_name'] ?></a>
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
            	</div>
           
           
              <div id="cake">
              	<div id="cake1" style="width: 100%;height: auto;">
              		<h3 style="font-size: 26px;">全国蛋糕&nbsp;&nbsp;&nbsp;<span style="font-size: 15px;color: gray;">以下蛋糕可配送全国各地城市，由当地正规蛋糕店新鲜提供，蛋糕品牌以当地为准，当天制作，当天配送，新鲜送到家！</span></h3>
              	</div>
              	<div id="cake2" style="width: 100%;height: auto;">
              		<div id="box">
						 <ul>
              		<?php
              			$o1=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='蛋糕') limit 0,15");
              			@$mm=mysql_num_rows($o1);
              			if(@$mm<=0){
              				echo "暂无蛋糕推荐";
              			}else{
              				while($cake=mysql_fetch_array($o1)){
              					?>
              					<li>
										<div class="con">
										<a href="see_good.php?good_id=<?php echo $cake['good_id'] ?>" class="a-img ">
											<img style="width: 228px;height: 60%;" src="<?php echo $cake['main_img'] ?>" />
										</a>
										<p align="center">
											<span><del style="color: red;text-align: center;">原价:￥<?php echo $cake['prime_cost'] ?></del></span>
											<span><h3 style="color: black;text-align: center;">现价:￥<?php echo $cake['good_price'] ?></h3></span>
										 </p> 
										 </div>
										 <div class="bottom" style="overflow:hidden;">
										 	<a href="see_good.php?good_id=<?php echo $cake['good_id'] ?>"><?php echo $cake['good_name'] ?></a>
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
              </div>
              
              <div id="gift">
              	<div id="gift1" style="width: 100%;height: auto;">
              		<div id="gift2" style="width: 100%;height: auto;">
              			<h3 style="font-size: 25px;">精美礼品&nbsp;&nbsp;&nbsp;<span style="font-size: 15px; color: grey;">让你关心的TA笑逐颜开</span></h3>
              		</div>
              		<div id="gift4" style="width: 100%;height: auto;">
              			<div id="box">
						 <ul>
              		<?php
              			$o11=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='蛋糕') limit 0,15");
              			@$mm1=mysql_num_rows($o11);
              			if(@$mm1<=0){
              				echo "暂无蛋糕推荐";
              			}else{
              				while($gift=mysql_fetch_array($o11)){
              					?>
              					<li>
										<div class="con">
										<a href="see_good.php?good_id=<?php echo $gift['good_id'] ?>" class="a-img ">
											<img style="width: 228px;height: 60%;" src="<?php echo $gift['main_img'] ?>" />
										</a>
										<p align="center">
											<span><del style="color: red;text-align: center;">原价:￥<?php echo $gift['prime_cost'] ?></del></span>
											<span><h3 style="color: black;text-align: center;">现价:￥<?php echo $gift['good_price'] ?></h3></span>
										 </p> 
										 </div>
										 <div class="bottom" style="overflow:hidden;">
										 	<a href="see_good.php?good_id=<?php echo $gift['good_id'] ?>"><?php echo $gift['good_name'] ?></a>
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
              	</div>
              </div>
              
              <div id="comment">
              	<div id="comment1" style="width: 100%;height: auto;">
              		<div iad="comment2" style="width: 60%;height: auto;border: 1px solid grey;float: left;">
              			<div id="title" style="width: 100%;background-color: gainsboro;">
              				<h3 align="left">最新评价<span style="text-align: right;">查看更多</span></h2>
              			</div>
              		    <div id="content" style="width: 100%;height: 300px;background-color: black;">
              		    	<div id="con">
              		    		
              		    	</div>
              		    </div>
              		</div>
              		<div id="go" style="width: 39%;height: auto;border: 1px solid gray;float: right;">
              			<div id="title" style="width: 100%;background-color: gainsboro;">
              				<h3 align="left">最新评价</h2>
              			</div>
              			<div id="content" style="width: 100%;height: 300px;background-color: black;">
              		    	<div id="con">
              		    		
              		    	</div>
              		    </div>
              		</div>
              	</div>
              </div>
   
           <div id="foot1">
           	<div id="foot2" style="width: 100%;height: auto;">
           		<div id="img" style="width: 100%;height: auto;">
           			<img style="width: 100%;" src="../img/foot_a.jpg" />
           		</div>
           		<div id="frint" style="width: 100%;height: auto;">
           			
			       	<div id="tf">
			       		<b>友链</b>
            			<a href="http://www.chinaname.cn/" target="_blank">中华取名网</a> <a href="http://sz.fang.com/" target="_blank">深圳房产网</a> <a href="http://www.juanpi.com" target="_blank">卷皮网</a> <a href="http://www.wbiao.cn" target="_blank">腕表</a>  <a href="http://www.bbhun.com" target="_blank">宝贝婚团网</a> <a href="http://www.yuanlin365.com/" target="_blank">苗木</a> <a href="http://www.zocai.com/" target="_blank">佐卡伊珠宝网</a> <a href="http://www.blove.com/" target="_blank">钻石婚戒定制</a> <a href="http://www.spider.com.cn/" target="_blank">杂志</a> <a href="http://www.iyijiao.com/" target="_blank">中国青少年艺术教育网</a> <a href="http://www.aiuw.com/" target="_blank">装修网</a> <a href="http://www.dog126.com/" target="_blank">淘狗网</a> <a href="http://www.liwuyou.com/" target="_blank">礼无忧网</a> <a href="http://www.goupuzi.com/" target="_blank">宠物狗</a> <a href="http://www.jiyouwang.com/" target="_blank">机友网</a> <a href="http://www.cocodiy.com/" target="_blank">礼物网</a> <a href="http://zx.meilele.com/" target="_blank">装修</a> <a href="http://www.ipo3.com/" target="_blank">新三板</a> <a href="http://www.huoming.com/" target="_blank">商标注册</a> <a href="http://www.loho88.com" target="_blank">眼镜店</a>
			       	</div>
			       </div>
           		</div>
           	</div>
           	
           	<div id="foot">
           		<div id="foott" style="width: 100%;height: 150px;background-color: black;">
           			<h4 style="color: white;padding-left: 350px;padding-top: 75px;">鲜花店客服中心电话：4006-728-555 配送鲜花时间9:00-22:00 </h4>
           		</div>
           	
           </div>
           
           </div>
        </div>
        
        
       
        
	</div>
	</div>
<script type="text/javascript" src="../easyui/jquery.min.js"></script>
<script type="text/javascript">
		$(function() {
     $('#goToTop a').click(function() {
         $('html , body').animate({
             scrollTop: 0
         }, 'slow');
     });
 });

        $(function () {
            var container = $('#container');
            var list = $('#list');
            var buttons = $('#buttons span');
            var prev = $('#prev');
            var next = $('#next');
            var index = 1;
            var len = 5;
            var interval = 3000;
            var timer;


            function animate (offset) {
                var left = parseInt(list.css('left')) + offset;
                if (offset>0) {
                    offset = '+=' + offset;
                }
                else {
                    offset = '-=' + Math.abs(offset);
                }
                list.animate({'left': offset}, 300, function () {
                    if(left > -200){
                        list.css('left', -650 * len);
                    }
                    if(left < (-650 * len)) {
                        list.css('left', -650);
                    }
                });
            }

            function showButton() {
                buttons.eq(index-1).addClass('on').siblings().removeClass('on');
            }

            function play() {
                timer = setTimeout(function () {
                    next.trigger('click');
                    play();
                }, interval);
            }
            function stop() {
                clearTimeout(timer);
            }

            next.bind('click', function () {
                if (list.is(':animated')) {
                    return;
                }
                if (index == 5) {
                    index = 1;
                }
                else {
                    index += 1;
                }
                animate(-650);
                showButton();
            });

            prev.bind('click', function () {
                if (list.is(':animated')) {
                    return;
                }
                if (index == 1) {
                    index = 5;
                }
                else {
                    index -= 1;
                }
                animate(650);
                showButton();
            });

            buttons.each(function () {
                 $(this).bind('click', function () {
                     if (list.is(':animated') || $(this).attr('class')=='on') {
                         return;
                     }
                     var myIndex = parseInt($(this).attr('index'));
                     var offset = -650 * (myIndex - index);

                     animate(offset);
                     index = myIndex;
                     showButton();
                 })
            });

            container.hover(stop, play);

            play();

        });
    </script>