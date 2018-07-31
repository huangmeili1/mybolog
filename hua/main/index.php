<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>花间杂物铺首页</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	body{
		margin-top: 50px;
	}
	[class *= col-]{
  background-color: #eee;
}
#p li{
		 list-style: none outside none;
		float: left;
		margin-top: 30px;
		
	}
#uul li a:hover{
	background-color: #cc0303;
}
#uul li a:visited{
	background-color: #cc0303;
}
#object li{
	list-style: none;
	line-height: 30px;
}
#object li a:hover{
	color: orange;
}
.carousel-control.left {  
    
  background-image:none;  
  background-repeat: repeat-x;  
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#80000000', endColorstr='#00000000', GradientType=1);  
}  
.carousel-control.right {  
  left: auto;  
  right: 0;  
   
  background-image:none;  
  background-repeat: repeat-x;  
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1);  
}
.cent{ 
	 height:720px; width:100%; 
} 
.cs{ 
width:100%; 
height:720px; 
background: rgba(0,0,0) ; 
top:0px; 
position:absolute; 
opacity: 0; 
display: block; 
font-size: 12px; 

} 
.cent:hover .cs{ 
color: #656e73; 
opacity: 0.9;
animation: Img 0.5s ease-in-out;
} 
@keyframes Img{
	/*transition: 1s; 
-webkit-transition: 1s; 
-moz-transition: 1s; */
 	0%{ transform:translateY(-10%) scale(0); }
 	100%{ transform:translateY(0) scale(1); }
 	}
.cent1{
	 width:100%; 
}
.cs1{ 
background: rgba(0,0,0); 
top:0px; 
position:absolute; 
opacity: 0; 
display: block; 
font-size: 12px; 
}
.cent1:hover .cs1{ 
color: white; 
opacity: 0.8;
animation: Img 0.5s ease-in-out;
} 
.flower3{
	background-color: #eee;
}
.flower3:hover a{
	color: white;
	text-decoration: none;
	background-color:#e03636;
}
.table a{
	color: black;
}
</style>
<?php

?>
<div id="up" style="position: fixed;height: 160px;width: 110px;left: 94%;z-index: 8;top: 30%;display: none;">
	<a onclick="go_to_up()" onmouseover="cha()" onmouseleave="cha2()" id="folwer_top" style="width: 100%;height: 100%;">
		<div id="flower_top2" style="height: 110px;width: 80px;background:url(../img/rocket_button_up.png);margin: 0 auto;margin-right: 30px;background-position-x: -30px;background-position-y: -10px;">
			
		</div>
	</a>
</div>
<div>
	<?php include("top.php"); ?>
   <div class="container" style="width: 100%;">
			   
			   
			   <div class="row">
			   	<div class="col-xs-6 col-md-12" style="height: 350px;padding: 0;margin: 0;">
					<div id="myCarousel" class="carousel slide" style="">
					    <!-- 轮播（Carousel）指标 -->
					    <ol class="carousel-indicators">
					        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					        <li data-target="#myCarousel" data-slide-to="1"></li>
					        <li data-target="#myCarousel" data-slide-to="2"></li>
					    </ol>   
					    <!-- 轮播（Carousel）项目 -->
					    <div class="carousel-inner" style="height: 350px;">
					        <div class="item active">
					            <img style="height: 350px;width: 100%;" src="../img/yd1.jpg" alt="First slide">
					        </div>
					        <div class="item">
					            <img style="height: 350px;width: 100%;" src="../img/111.png" alt="Second slide">
					        </div>
					        <div class="item">
					            <img style="height: 350px;width: 100%;" src="../img/222.jpg" alt="Third slide">
					        </div>
					    </div>
					    <!-- 轮播（Carousel）导航 -->
					    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					        <span class="sr-only">Previous</span>
					    </a>
					    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					        <span class="sr-only">Next</span>
					    </a>
					</div> 
			   	</div>
			   </div>
		
		
			<div class="row" style="width: 85%;margin: 0 auto;margin-top: 40px;padding: 0;">
				<div  class="col-md-12" style="margin: 0;padding: 0;background-color: white;">
					<div class="row">
						<div class="col-md-3" style="background-color: white;">
							<div class="thumbnail" style="border: 0;padding: 0;margin: 0;">
								<a href="big_flower.php">
								<img src="../img/activity041.jpg" />
								</a>
							</div>
						</div>
						<div class="col-md-3" style="background-color: white;">
							<a style="text-decoration: none;" href="green.php">
							<div class="thumbnail" style="border: 0;padding: 0;margin: 0;">
								<img src="../img/activity031.jpg" >
							</div>
							</a>
						</div>
						<div class="col-md-3" style="background-color: white;">
							<a style="text-decoration: none;" href="forever_flower.php">
							<div class="thumbnail" style="border: 0;padding: 0;margin: 0;">
								<img src="../img/fever.png">
							</div>
							</a>
						</div>
						<div class="col-md-3" style="background-color: white;">
							<a href="business.php">
							<div class="thumbnail" style="border: 0;padding: 0;margin: 0;">
								<img src="../img/activity011.jpg" />
							</div>
							</a>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row" style="width: 87%;margin: 0 auto;margin-top: 40px;">
				<div class="col-md-12" style="background-color: white;">
					<table class="table table-hover" id="table" style="text-align: center;color: black;">
						<tbody>
							<tr>
								<td style="background: black;color: white;height: 100px;width: 100px;">
									<img style="margin-top: 20px;" style="" src="../img/jq.jpg"><br />
									<span style="padding: 0;">价格/订花</span>
								</td>
								<td style="line-height: 100px;">
									<a style="color: black;" href="price.php?small=0&big=150">150元以下</a>
								</td>
								<td style="line-height: 100px;">
									<a href="price.php?small=150&big=250">150-250元</a>
								</td>
								<td style="line-height: 100px;">
									<a href="price.php?small=250&big=350">250-350元</a>
								</td>
								<td style="line-height: 100px;">
									<a href="price.php?small=350&big=550">350-550元</a>
								</td>
								<td style="line-height: 100px;">
									<a href="price.php?small=550&big=800">550-800元</a>
								</td>
								<td style="line-height: 100px;">
									<a href="price.php?small=800&big=0">800元以上</a>
								</td>
								
							</tr>
							<tr>
								<td style="background: black;color: white;height: 100px;width: 100px;">
									<img style="margin-top: 20px;" style="" src="../img/yongtu.jpg"><br />
									<span style="padding: 0;">用途/订花</span>
								</td>
								<td style="line-height: 100px;">
									<a href="business.php">开业花篮</a>
								</td>
								<td style="line-height: 100px;">
									<a href="Love.php">爱情鲜花</a>
								</td>
								<td style="line-height: 100px;">
									<a href="brith.php">生日鲜花</a>
								</td>
								<td style="line-height: 100px;">
									<a href="friend.php">友情鲜花</a>
								</td>
								<td style="line-height: 100px;">
									<a href="elder.php">问候长辈</a>
								</td>
								<td style="line-height: 100px;">
									<a href="hunqing.php">婚庆鲜花</a>
								</td>
								<td style="line-height: 100px;">
									<a href="visted.php">探病慰问</a>
								</td>
								<td style="line-height: 100px;">
									<a href="zhuhe.php">祝贺鲜花</a>
								</td>
								<td style="line-height: 100px;">
									<a href="sorry.php">道歉鲜花</a>
								</td>
							</tr>
							<tr>
								<td style="background: black;color: white;height: 100px;width: 100px;">
									<img style="margin-top: 20px;" style="" src="../img/huac.jpg"><br />
									<span style="padding: 0;">花材/订花</span>
								</td>
								<td style="line-height: 100px;">
									<a href="category.php?type=玫瑰">玫瑰</a>
								</td>
								<td style="line-height: 100px;">
									<a href="category.php?type=红玫瑰">红玫瑰</a>
								</td>
								<td style="line-height: 100px;">
									<a href="category.php?type=粉玫瑰">粉玫瑰</a>
								</td>
								<td style="line-height: 100px;">
									<a href="category.php?type=白玫瑰">白玫瑰</a>
								</td>
								<td style="line-height: 100px;">
									<a href="category.php?type=紫玫瑰">紫玫瑰</a>
								</td>
								<td style="line-height: 100px;">
									<a href="category.php?type=蓝玫瑰">蓝玫瑰</a>
								</td><td style="line-height: 100px;">
									<a href="category.php?type=康乃馨">康乃馨</a>
								</td>
								<td style="line-height: 100px;">
									<a href="category.php?type=向日葵">向日葵</a>
								</td>
								<td style="line-height: 100px;">
									<a href="category.php?type=扶郞">扶郞</a>
								</td>
								<td style="line-height: 100px;">
									<a href="category.php?type=郁金香">郁金香</a>
								</td>
								<td style="line-height: 100px;">
									<a href="category.php?type=百合">百合</a>
								</td>
								<td></td><td></td><td></td>
							</tr>
							<tr>
								<td style="background: black;color: white;height: 100px;width: 100px;">
									<img style="margin-top: 20px;" src="../img/shuliang.jpg" /><br />
									<span>数量/订花</span>
								</td>
								<td style="line-height: 100px;">
									<a href="flower_num.php?type=9">9枝</a>
								</td>
								<td style="line-height: 100px;">
									<a href="flower_num.php?type=10">10枝</a>
								</td>
								<td style="line-height: 100px;">
									<a href="flower_num.php?type=11">11枝</a>
								</td>
								<td style="line-height: 100px;">
									<a href="flower_num.php?type=12">12枝</a>
								</td>
								<td style="line-height: 100px;">
									<a href="flower_num.php?type=16">16枝</a>
								</td>
								<td style="line-height: 100px;">
									<a href="flower_num.php?type=18">18枝</a>
								</td>
								<td style="line-height: 100px;">
									<a href="flower_num.php?type=19">19枝</a>
								</td>
								<td style="line-height: 100px;">
									<a href="flower_num.php?type=20">20枝</a>
								</td>
								<td style="line-height: 100px;">
									<a href="flower_num.php?type=22">22枝</a>
								</td>
								<td style="line-height: 100px;">
									<a href="flower_num.php?type=29">29枝</a>
								</td>
								<td style="line-height: 100px;">
									<a href="flower_num.php?type=33">33枝</a>
								</td>
								<td style="line-height: 100px;">
									<a href="flower_num.php?type=50">50枝</a>
								</td>
								<td style="line-height: 100px;">
									<a href="flower_num.php?type=66">66枝</a>
								</td>
								<td style="line-height: 100px;">
									<a href="flower_num.php?type=99">99枝以上</a>
								</td>
							</tr>
							<tr>
								<td style="background: black;color: white;height: 100px;width: 100px;">
									<img style="margin-top: 20px;" src="../img/yanse.jpg" /><br />
									<span>节日/订花</span>
								</td>
								<td style="line-height: 100px;">
									<a href="MothersDay.php">母亲节</a>
								</td>
								<td style="line-height: 100px;">
									<a href="yuandanjie.php">元旦</a>
								</td>
								<td style="line-height: 100px;">
									<a href="newyear.php">春节</a>
								</td>
								<td style="line-height: 100px;">
									<a href="qingrenjie.php">情人节</a>
								</td>
								<td style="line-height: 100px;">
									<a href="womanday.php">妇女节</a>
								</td>
								
								<td style="line-height: 100px;">
									<a href="graduation.php">毕业</a>
								</td>
								<td style="line-height: 100px;">
									<a href="duanwujie.php">端午节</a>
								</td>
								<td style="line-height: 100px;">
									<a href="fater.php">父亲节</a>
								</td>
								<td style="line-height: 100px;">
									<a href="teacher.php">教师节</a>
								</td>
								<td style="line-height: 100px;">
									<a href="zhongqiu.php">中秋节</a>
								</td>
								<td style="line-height: 100px;">
									<a href="zhongqiu.php">重阳节</a>
								</td>
								<td style="line-height: 100px;">
									<a href="thanksday.php">感恩节</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			
						<?php
							$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and flower_num=33 limit 0,5");
							@$n=mysql_num_rows($sql);
							if($n<=0){
								
							}else{
								$f=mysql_fetch_array($sql);
								?>
								<div id="flower33" class="row" style="width: 87%;margin: 0 auto;margin-top: 30px;">
									<div class="col-md-12" style="background-color: white;">
										<div class="row">
											<div class="col-md-12" style="width: 100%;margin: 0;padding: 0;">
												<ul class="list-group" style="padding: 0;margin: 0;">
													<li class="list-group-item" style="border: 0;">
														<span style="font-size: 26px;">33朵系列 | THIRTY THREE SERIES</span>
														<a href="flower_num.php?type=33"><span style="float: right;">更多｜MORE<img style="width: 30px;" src="../img/more.png"></span></a>
													</li>
												</ul>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4" style="padding: 0;margin: 0;">
												<div class="cent"> 
													<div class="thumbnail" style="height: 720px;text-align: center;width: 100%;padding: 0;margin: 0;background-color: #ebebeb;">
														<img style="height: 500px;width: 100%;" src="<?php echo $f['main_img'] ?>" />
														<div class="caption">
															<h2><?php echo $f['good_name']; ?></h2>
															<h3>￥<?php echo $f['good_price'] ?></h3>
														</div>
													</div>
													
													<div class="cs"> 
															<div class="caption" style="color: white;">
																<p style="width: 150px;text-align: center;margin-left: 150px;margin-top: 30px;font-size: 20px;">
																	<?php echo $f['good_hua'] ?>
																</p>
																<h2 style="text-align: center;"><?php echo $f['good_name']; ?></h2>
																<h3 style="text-align: center;">￥<?php echo $f['good_price'] ?></h3>
																<a style="width: 160px;margin-top: 20px;text-align: center;margin-left: 140px;" class="btn btn-danger btn-lg" href="see_good.php?good_id=<?php echo $f['good_id']; ?>">立即购买</a>
															</div>
													</div> 
												</div> 
												
							<?php			
								     
								
								?>
											</div>
											<div class="col-md-8" style="background-color: white;">
												<div class="row">
													<?php
													while($ff=mysql_fetch_array($sql)){
														?>
														<div class="col-md-6" style="background-color: white;">
															<div class="cent1">
																<div class="thumbnail" style="height: 380px;text-align: center;padding: 0;margin: 0;border: 0;">
																	<img style="height: 280px;width: 100%;" src="<?php echo $ff['main_img'] ?>" />
																	<div class="caption" style="background-color: #ebebeb;height: 62px;">
																		<h5><?php echo $ff['good_name']; ?></h5>
																		<h4 style="color: orangered;">￥<?php echo $ff['good_price']; ?></h4>
																	</div>
																</div>
																<div class="cs1" style="height: 340px;width:401px;">
																<div class="thumbnail" style="background-color: transparent;border: 0;margin: 0;padding: 0;margin-top: 20px;">
																	<div class="caption" style="color: white;width:391px;">
																			<p style="font-size: 18px;margin: 0 auto;width: 100%;text-align: center;">
																				<?php echo $ff['good_hua'] ?>
																			</p>
																			<h3 style="text-align: center;">￥<?php echo $ff['good_price'] ?></h3>
																			<a style="text-align: center;margin-left: 140px;" class="btn btn-danger btn-lg" href="see_good.php?good_id=<?php echo $ff['good_id']; ?>">立即购买</a>
																	</div>
																</div>
															</div>
															</div>
																	
														</div>
														<?php
													}
													?>
													
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php
							}
							?>
							<?php
							$s=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and flower_num=11 limit 0,5");
							@$nn=mysql_num_rows($s);
							if($nn<=0){
								
							}else{
								$flower1=mysql_fetch_array($s);
							?>
							<div class="row" style="width: 90%;margin: 0 auto;margin-top: 30px;">
								<div class="col-md-12" style="background-color: white;">
										<div class="row">
											<div class="col-md-12" style="width: 100%;margin: 0;padding: 0;">
												<ul class="list-group" style="padding: 0;margin: 0;">
													<li class="list-group-item" style="border: 0;">
														<span style="font-size: 26px;">11朵系列 | ELEVEN SERIES</span>
														<a href="flower_num.php?type=11"><span style="float: right;">更多｜MORE<img style="width: 30px;" src="../img/more.png"></span></a>
													</li>
												</ul>
											</div>
										</div>
									<div class="row">
										<div class="col-md-8" style="background-color: white;">
											<div class="row">
												<?php
													while($flower=mysql_fetch_array($s)){
														
														?>
														
														<div class="col-md-6" style="background-color: white;">
															<div class="cent1">
																<div class="thumbnail" style="height: 380px;text-align: center;padding: 0;margin: 0;border: 0;">
																	<img style="height: 280px;width: 100%;" src="<?php echo $flower['main_img'] ?>" />
																	<div class="caption" style="background-color: #ebebeb;height: 62px;">
																		<h5><?php echo $flower['good_name']; ?></h5>
																		<h4 style="color: orangered;">￥<?php echo $flower['good_price']; ?></h4>
																	</div>
																</div>
																<div class="cs1" style="height: 340px;width:401px;">
																<div class="thumbnail" style="background-color: transparent;border: 0;margin: 0;padding: 0;margin-top: 20px;">
																	<div class="caption" style="color: white;width:391px;">
																			<p style="font-size: 18px;margin: 0 auto;width: 100%;text-align: center;">
																				<?php echo $flower['good_hua'] ?>
																			</p>
																			<h3 style="text-align: center;">￥<?php echo $flower['good_price'] ?></h3>
																			<a style="text-align: center;margin-left: 140px;" class="btn btn-danger btn-lg" href="see_good.php?good_id=<?php echo $flower['good_id']; ?>">立即购买</a>
																	</div>
																</div>
															</div>
															</div>
														</div>
														<?php
													}
													?>
											</div>
										</div>
										<div class="col-md-4" style="background-color: white;">
											<div class="cent"> 
													<div class="thumbnail" style="height: 720px;text-align: center;width: 100%;padding: 0;margin: 0;background-color: #ebebeb;">
														<img style="height: 500px;width: 100%;" src="<?php echo $flower1['main_img'] ?>" />
														<div class="caption">
															<h2><?php echo $flower1['good_name']; ?></h2>
															<h3>￥<?php echo $flower1['good_price'] ?></h3>
														</div>
													</div>
													
													<div class="cs"> 
															<div class="caption" style="color: white;">
																<p style="width: 150px;text-align: center;margin-left: 150px;margin-top: 30px;font-size: 20px;">
																	<?php echo $flower1['good_hua'] ?>
																</p>
																<h2 style="text-align: center;"><?php echo $flower1['good_name']; ?></h2>
																<h3 style="text-align: center;">￥<?php echo $flower1['good_price'] ?></h3>
																<a style="width: 160px;margin-top: 20px;text-align: center;margin-left: 140px;" class="btn btn-danger btn-lg" href="see_good.php?good_id=<?php echo $flower1['good_id']; ?>">立即购买</a>
															</div>
													</div> 
												</div> 
										</div>
									</div>
								</div>
							</div>
							<?php
							}
		?>
		<?php
							$ss=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and flower_num=19 limit 0,5");
							@$nnn=mysql_num_rows($ss);
							if($nnn<=0){
								
							}else{
								$fff=mysql_fetch_array($ss);
								?>
								<div class="row" style="width: 87%;margin: 0 auto;margin-top: 30px;">
									<div class="col-md-12" style="background-color: white;">
										<div class="row">
											<div class="col-md-12" style="width: 100%;margin: 0;padding: 0;">
												<ul class="list-group" style="padding: 0;margin: 0;">
													<li class="list-group-item" style="border: 0;">
														<span style="font-size: 26px;">19朵系列 | THIRTY THREE SERIES</span>
														<a href="flower_num.php?type=19"><span style="float: right;">更多｜MORE<img style="width: 30px;" src="../img/more.png"></span></a>
													</li>
												</ul>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4" style="padding: 0;margin: 0;">
												<div class="cent"> 
													<div class="thumbnail" style="height: 720px;text-align: center;width: 100%;padding: 0;margin: 0;background-color: #ebebeb;">
														<img style="height: 500px;width: 100%;" src="<?php echo $fff['main_img'] ?>" />
														<div class="caption">
															<h2><?php echo $fff['good_name']; ?></h2>
															<h3>￥<?php echo $fff['good_price'] ?></h3>
														</div>
													</div>
													
													<div class="cs" style=""> 
															<div class="caption" style="color: white;">
																<p style="width: 150px;text-align: center;margin-left: 150px;margin-top: 30px;font-size: 20px;">
																	<?php echo $f['good_hua'] ?>
																</p>
																<h2 style="text-align: center;"><?php echo $fff['good_name']; ?></h2>
																<h3 style="text-align: center;">￥<?php echo $fff['good_price'] ?></h3>
																<a style="width: 160px;margin-top: 20px;text-align: center;margin-left: 140px;" class="btn btn-danger btn-lg" href="see_good.php?good_id=<?php echo $f['good_id']; ?>">立即购买</a>
															</div>
													</div> 
												</div> 
												
							<?php			
								     
								
								?>
											</div>
											<div class="col-md-8" style="background-color: white;">
												<div class="row">
													<?php
													while($fff=mysql_fetch_array($ss)){
														?>
														<div class="col-md-6" style="background-color: white;">
															<div class="cent1">
																<div class="thumbnail" style="height: 380px;text-align: center;padding: 0;margin: 0;border: 0;">
																	<img style="height: 280px;width: 100%;" src="<?php echo $fff['main_img'] ?>" />
																	<div class="caption" style="background-color: #ebebeb;height: 62px;">
																		<h5><?php echo $fff['good_name']; ?></h5>
																		<h4 style="color: orangered;">￥<?php echo $fff['good_price']; ?></h4>
																	</div>
																</div>
																<div class="cs1" style="height: 340px;width:401px;">
																<div class="thumbnail" style="background-color: transparent;border: 0;margin: 0;padding: 0;margin-top: 20px;">
																	<div class="caption" style="color: white;width:391px;">
																			<p style="font-size: 18px;margin: 0 auto;width: 100%;text-align: center;">
																				<?php echo $fff['good_hua'] ?>
																			</p>
																			<h3 style="text-align: center;">￥<?php echo $fff['good_price'] ?></h3>
																			<a style="text-align: center;margin-left: 140px;" class="btn btn-danger btn-lg" href="see_good.php?good_id=<?php echo $fff['good_id']; ?>">立即购买</a>
																	</div>
																</div>
															</div>
															</div>
																	
														</div>
														<?php
													}
													?>
													
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php
							}
							?>
							
						<div class="row">
							<div class="col-md-12" style="width: 100%;padding: 0;margin: 0;">
								<div class="thumbnail" style="padding: 0;margin: 0;width: 100%;border: 0;">
									<img src="../img/nav.png" />
								</div>
							</div>
						</div>
						<div class="row" style="width: 90%;margin: 0 auto;margin-top: 50px;">
							<div class="col-md-4" style="background: white;text-align: center;">
								
									<div class="flower3"  style="width: 90%;height: 150px;margin: 0 auto;">
										<a style="height: 150px;width: 100%;display: inline-block;" href="category.php?type=红玫瑰">
											<p style="line-height: 20px;padding-top: 50px;"><span>红玫瑰</span><br>
											<span>CLASSIC RED ROSE</span></p>
										</a>
									</div>
								
								
								
							</div>
							<div class="col-md-4" style="background: white;text-align: center;">
								<div class="flower3" style="width: 90%;height: 150px;margin: 0 auto;">
									<a style="height: 150px;width: 100%;display: inline-block;" href="category.php?type=粉玫瑰">
									<p style="line-height: 20px;padding-top: 50px;"><span>粉玫瑰</span><br>
									<span>CLASSIC PINK ROSE</span></p>
									</a>
								</div>
							</div>
							<div class="col-md-4" style="background: white;text-align: center;">
								<div class="flower3" style="width: 90%;height: 150px;margin: 0 auto;">
									<a style="height: 150px;width: 100%;display: inline-block;" href="category.php?type=礼盒">
									<p style="line-height: 20px;padding-top: 50px;"><span>礼盒装</span><br>
									<span>A GIFT BOX OF FLOWERS</span></p>
									</a>
								</div>
							</div>
						</div>
						
						<div class="row" style="width:90%;margin: 0 auto;margin-top: 30px;">
							<div class="col-md-3" style="background-color: white;">
								<a href="scene.php?type=表白">
								<?php 
									$e=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_use like '%表白%' order by good_time desc limit 0,1");
									@$e1=mysql_num_rows($e);
									if($e1<=0){
										?>
										<div class="thumbnail"  style="height: 400px;padding: 0;margin: 0;border: 0;">
											<a href="flower.php">
												<img style="height: 330px;" src="../img/r.png" />
											</a>
											<div class="caption"  style="text-align: center;background-color: gainsboro;">
												<h5 style="font-size: 16px;">鲜花</h5>
											</div>
										</div>
										
										<?php
									}else{
										$e2=mysql_fetch_array($e);
										?>
										<div class="thumbnail" id="thu1" onmousemove="care(1)" onmouseout="care2(1)" style="height: 400px;padding: 0;margin: 0;border: 0;">
											<img style="height: 330px;" src="<?php echo $e2['main_img']; ?>" />
											<div class="caption" id="caption1" style="text-align: center;background-color: gainsboro;width: 298px;height: 65px;">
												<h5 style="font-size: 16px;"><a id="a1" style="color: black;" href="scene.php?type=表白">表白场景</a></h5>
											</div>
										</div>
										
										<?php
									}
									?>
									</a>
							</div>
							<div class="col-md-3" style="margin-top: 40px;background-color: white;">
								<a href="scene.php?type=追求">
								<?php 
									$ee=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_use like '%追求%' order by good_time desc limit 0,1");
									@$ee1=mysql_num_rows($ee);
									if($ee1<=0){
										?>
										<div class="thumbnail" style="height: 400px;padding: 0;margin: 0;border: 0;">
											<a href="flower.php">
												<img style="height: 330px;" src="../img/r.png" />
											</a>
											<div class="caption" style="text-align: center;background-color: gainsboro;">
												<h5 style="font-size: 16px;">鲜花</h5>
											</div>
										</div>
										
										<?php
									}else{
										$ee2=mysql_fetch_array($ee);
										?>
										<div class="thumbnail" id="thu2" onmousemove="care(2)" onmouseout="care2(2)" style="400px;padding: 0;margin: 0;border: 0;">
											<img style="height: 335px;" src="<?php echo $ee2['main_img']; ?>" />
											<div class="caption" id="caption2" style="text-align: center;background-color: gainsboro;">
												<h5 style="font-size: 16px;"><a id="a2" style="color: black;" href="scene.php?type=追求">追求场景</a></h5>
											</div>
										</div>
										
										<?php
									}
									?>
									</a>
							</div>
							<div class="col-md-3" style="background-color: white;">
								<a href="scene.php?type=热恋">
								<?php 
									$eee=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_use like '%热恋%' order by good_time desc limit 0,1");
									@$eee1=mysql_num_rows($eee);
									if($eee1<=0){
										?>
										<div class="thumbnail" style="height: 400px;padding: 0;margin: 0;border: 0;">
											<a href="flower.php">
												<img style="height: 330px;" src="../img/r.png" />
											</a>
											<div class="caption" style="text-align: center;background-color: gainsboro;">
												<h5 style="font-size: 16px;">鲜花</h5>
											</div>
										</div>
										
										<?php
									}else{
										$eee2=mysql_fetch_array($eee);
										?>
										<div class="thumbnail" id="thu3" onmousemove="care(3)" onmouseout="care2(3)" style="400px;padding: 0;margin: 0;border: 0;">
											<img style="height: 335px;" src="<?php echo $eee2['main_img']; ?>" />
											<div class="caption" id="caption3" style="text-align: center;background-color: gainsboro;">
												<h5 style="font-size: 16px;"><a id="a3" style="color: black;" href="scene.php?type=热恋">热恋场景</a></h5>
											</div>
										</div>
										
										<?php
									}
									?>
									</a>
							</div>
							<div class="col-md-3" style="margin-top: 40px;background-color: white;">
								<a href="scene.php?type=浪漫">
								<?php 
									$eeee=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_use like '%浪漫%' order by good_time desc limit 0,1");
									@$eeee1=mysql_num_rows($eeee);
									if($eeee1<=0){
										?>
										<div class="thumbnail" style="height: 400px;padding: 0;margin: 0;border: 0;">
											<a href="flower.php">
												<img style="height: 330px;" src="../img/r.png" />
											</a>
											<div class="caption" style="text-align: center;background-color: gainsboro;">
												<h5 style="font-size: 16px;">鲜花</h5>
											</div>
										</div>
										
										<?php
									}else{
										$eeee2=mysql_fetch_array($eeee);
										?>
										<div class="thumbnail" id="thu4" onmousemove="care(4)" onmouseout="care2(4)" style="400px;padding: 0;margin: 0;border: 0;">
											<img style="height: 335px;" src="<?php echo $eeee2['main_img']; ?>" />
											<div class="caption" id="caption4" style="text-align: center;background-color: gainsboro;">
												<h5 style="font-size: 16px;"><a id="a4" style="color: black;" href="scene.php?type=浪漫">浪漫场景</a></h5>
											</div>
										</div>
										
										<?php
									}
									?>
							</div>
						</div>
						<?php
							$w=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') order by sales desc limit 0,30");
							@$w1=mysql_num_rows($w);
							if($w1<=0){
								
							}else{
								?>
								<div class="row" style="width: 90%;margin: 0 auto;margin-top: 50px;">
									<div class="col-md-12" style="background-color: white;">
										<div class="row">
											<div class="col-md-12" style="width: 100%;margin: 0;padding: 0;">
														<ul class="list-group" style="padding: 0;margin: 0;width: 100%;">
															<li class="list-group-item" style="border: 0;">
																<span style="font-size: 26px;">热卖系列 | HOT SELLING SERIES</span>
																<a href="flower.php"><span style="float: right;">更多｜MORE<img style="width: 30px;" src="../img/more.png"></span></a>
															</li>
														</ul>
											</div>
										</div>
										<div class="row">
											<?php  
												while($w2=mysql_fetch_array($w)){
													?>
													<div class="col-md-4" id="see<?php echo $w2['good_id']; ?>" onmousemove="trank(<?php echo $w2['good_id']; ?>)" onmouseout="trank2(<?php echo $w2['good_id']; ?>)" style="margin-top: 30px;background-color: white;">
														<a id="thumba<?php echo $w2['good_id']; ?>" href="see_good.php?good_id=<?php echo $w2['good_id']; ?>" class="thumbnail" style="text-align: center;height: 530px;padding: 0;border: 0;text-decoration: none;width: 90%;">
															<img id="img<?php echo $w2['good_id']; ?>" style="height: 420px;"  src="<?php echo $w2['main_img']; ?>" />
															<div class="caption" id="cap<?php echo $w2['good_id']; ?>">
																<p style="color: #BF0A10;font-size: 18px;">￥<?php echo $w2['good_price']; ?></p>
																	<p class="text-muted">
																		<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
																			<?php echo $w2['material']; ?>
																		</div>  
																	</p>
																	<p class="text-muted" style="color: #BF0A10;font-size: 18px;">
																		<?php echo $w2['good_name']; ?>
																	</p>
															</div>
														</a>
													</div>
													<?php
												}
												?>
										</div>
									</div>
								</div>
								<?php
							}
						?>
		<?php include("footer.php"); ?>
		
	</div>
</div>

<script type="text/javascript" src="../js/index.js"></script>

<script type="text/javascript">
	function check(){
		var black=document.getElementById("black");
		black.style.display='block';
	}
	function care(i){
		var a=document.getElementById("a"+i);
		var thu=document.getElementById("thu"+i);
		var caption=document.getElementById("caption"+i);
		caption.style.color='white';
		caption.style.backgroundColor='#e03636';
		thu.style.border='1px solid  red';
		a.style.color='white';
	}
	function care2(i){
	    var a=document.getElementById("a"+i);
		var thu=document.getElementById("thu"+i);
		var caption=document.getElementById("caption"+i);
		caption.style.color='black';
		caption.style.backgroundColor='#eee';
		thu.style.border='0px';
		a.style.color='black';
	}
	function trank(i){
		var see=document.getElementById("thumba"+i);
		see.style.border='2px solid  #eee';
		var img=document.getElementById("img"+i);
		see.style.transform='scale(1.08)';
		
	}
	function trank2(i){
		var see=document.getElementById("thumba"+i);
		see.style.border='0px';
		var img=document.getElementById("img"+i);
		see.style.transform='scale(1)';
	}
function go_to_up(){
	var flower_top2=document.getElementById("flower_top2");
	var flower_top=document.getElementById("flower_top");
	flower_top2.style.height='500px';
	flower_top2.style.backgroundPositionX='-340px';
	 $('html,body').animate({  
        scrollTop: 0  
    }, 800); 
}
window.onscroll=function(){
		var this_top=$(this).scrollTop();
		var show_you=$("#flower33").offset().top;
		var top=document.getElementById("up");
		$(window).scroll(function(){
        if(this_top>show_you+100){
            top.style.display='block';
        }else{
        	top.style.display='none';
        }
    });
	}
function cha(){
	var flower_top2=document.getElementById("flower_top2");
	var flower_top=document.getElementById("flower_top");
	flower_top2.style.backgroundPositionX='-180px';
}
function cha2(){
	var flower_top2=document.getElementById("flower_top2");
	var flower_top=document.getElementById("flower_top");
	flower_top2.style.height='110px';
	flower_top2.style.backgroundPositionX='-30px';
}
</script>




