<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>鲜花</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
body a:link{
	text-decoration: none;
	}
	[class *= col-]{
  background-color: #eee;
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
		::selection{
			background: pink;
			color: red;
		}
		p{
			text-indent: 2em;
		}
			.coumns{
				outline: gray solid 2px;
				width: 80%;
				height: 390px;
				margin: 0 auto;
				/*margin: 100px auto;*/
				padding: 15px;
				padding-top: 5px;
				border: 2px solid black;
				box-shadow:darkgrey 0px 0px 30px 5px;
				-webkit-columns: 250px 3;
				-moz-columns: 250px 3;
				  -o-columns:250px 3;
				  -ms-columns: 250px 3;
				  columns:250px 2;
				  column-gap: 2em;
				  column-rule: 3px dotted black;
			}
			h2{
				font-size: 22px;
				padding: 0;
				margin: 0;
			/*	column-span:all;*/
				text-align: center;
			}
	@keyframes Img{
 	0%{ transform:translateX(-100%) scale(0); }
 	100%{ transform:translateX(0) scale(1); }
 	}
 	@keyframes Text{
 	0%{ transform:translateX(100%) scale(0); }
 	100%{ transform:translateX(0) scale(1); }
 	}
</style>
<?php
include("../conn/dataconnection.php");
?>
<div class="container" style="width: 100%;">
	<?php include("top.php"); ?>
		<div class="row" style="width: 80%;margin: 0 auto;">
				<?php
					$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') order by see desc limit 0,6");
					@$num=mysql_num_rows($sql);
					if($num<=0){
						echo "系统出错了，请联系管理员";
					}else{
						
						?>
							<div id="myCarousel" class="carousel slide" style="">
								<!-- 轮播（Carousel）指标 -->
								<ol class="carousel-indicators">
									<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
									<li data-target="#myCarousel" data-slide-to="1"></li>
									<li data-target="#myCarousel" data-slide-to="2"></li>
									<li data-target="#myCarousel" data-slide-to="3"></li>
									<li data-target="#myCarousel" data-slide-to="4"></li>
									<li data-target="#myCarousel" data-slide-to="5"></li>
								</ol>   
								<!-- 轮播（Carousel）项目 -->
								<div class="carousel-inner">
									<?php
										$i=0;
										while($f=mysql_fetch_array($sql)){
											$i++;
											if($i==1){
												?>
													<div class="item active" style="height: 390px;">
														<a href="see_good.php?good_id=<?php echo $f['good_id']; ?>">
														<div class="coumns">
															<img style="height: 365px;padding: 0;margin: 0;margin-left: 40px;animation: Img 2s ease-out;" src="<?php echo $f['main_img']; ?>" />
															<div style="animation: Text 2s ease-out;">
																<h2 style="color:#E03636 ;"><?php echo $f['good_name'] ?></h2>
																<p class="text-muted" style="width: 300px;margin: 0 auto;margin-top: 40px;line-height: 25px;"><span style="font-size: 20px;">花材:</span><span style="line-height: 30px;"><?php echo $f['material'] ?></span></p>
																	<p class="text-muted" style="width: 300px;margin: 0 auto;margin-top: 40px;">
																		<span style="color:#E03636 ;font-size: 20px;">花语:</span>
																		<span style=""><?php echo $f['good_hua'] ?></span>
																		
																	</p>
																	<p style="margin-left: 80px;color:#E03636;font-size: 20px;">RMB：￥<?php echo $f['good_price'] ?></p>
																	<a style="margin-left: 150px;margin-top: 20px;" class="btn btn-danger btn-lg" href="see_good.php?good_id=<?php echo $f['good_id']; ?>">立即购买</a>
															</div>
															
														</div>
														</a>
													</div>
												<?php
											}else{
												?>
													<div class="item" style="height: 390px;">
														<a href="see_good.php?good_id=<?php echo $f['good_id']; ?>">
														<div class="coumns">
															<img style="height: 365px;padding: 0;margin: 0;margin-left: 40px;animation:Img 2s ease-out;" src="<?php echo $f['main_img']; ?>" />
															<div style="animation: Text 2s ease-out;">
																<h2 style="color:#E03636 ;"><?php echo $f['good_name'] ?></h2>
																<p class="text-muted" style="width: 300px;margin: 0 auto;margin-top: 40px;"><span style="font-size: 20px;">花材:</span><?php echo $f['material'] ?></p>
																	<p class="text-muted" style="width: 300px;margin: 0 auto;margin-top: 40px;">
																		<span style="color:#E03636 ;font-size: 20px;">花语:</span>
																		<span style=""><?php echo $f['good_hua'] ?></span>
																	</p>
																	<p style="margin-left: 80px;color:#E03636;font-size: 20px;">RMB：￥<?php echo $f['good_price'] ?></p>
																	<a style="margin-left: 150px;margin-top: 20px;" class="btn btn-danger btn-lg" href="see_good.php?good_id=<?php echo $f['good_id']; ?>">立即购买</a>
															</div>
															
														</div>
														</a>
													</div>
												<?php
											}
										}
										?>
								</div>
								<!-- 轮播（Carousel）导航 -->
								<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
									<span style="background-color: #4D4D4D;text-align: center;" class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
									<span style="background-color: #4D4D4D;" class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div> 
						<?php
					}
					?>
		</div>
		
		<div class="row" style="margin: 0 auto;margin-top: 30px;width: 80%;">
			<div class="col-md-12" style="height: 40px;">
					<table style="line-height: 40px;font-size: 20px;">
							<tr>
								<td width="70"><a href="flower.php" style="color: orangered;"><span id="zz">综合</span></a></td>
								<td width="70"><a href="javascript:lou('flower2.php?type=销量','销量')"><span id="z1">销量<span class="caret"></span></span></a></td>
								<td width="70"><a href="javascript:lou('flower2.php?type=价格','价格')"><span id="z2">价格</span></a></td>
								<td width="70"><a href="javascript:lou('flower2.php?type=最新','最新')"><span id="z3">最新<span class="caret"></span></span></a></td>
							</tr>
					</table>
			</div>
		</div>
		<div class="row" id="main" style="width: 80%;margin: 0 auto;margin-top: 20px;">
			<?php include("flower1.php"); ?>
			
		</div>
	
		<?php include("footer.php"); ?>
</div>

<script type="text/javascript" src="../js/index.js"></script>
<script type="text/javascript">
	function check(i){
		var thumbanil=document.getElementById("thumbnail"+i);
		thumbanil.style.border="1px solid  gainsboro";
		thumbanil.style.padding="5px";
	}
	function check1(i){
		var thumbanil=document.getElementById("thumbnail"+i);
		thumbanil.style.border="0px";
		thumbanil.style.padding="0px";
	}
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
		$("#main").load(page);
	}
	
	function lop(page){
	   $("#main").load(page);
	}
</script>