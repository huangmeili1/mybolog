<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>花间杂物铺销量排行榜</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	
</style>
<?php

?>
<div id="up" style="position: fixed;height: 160px;width: 110px;left: 94%;z-index: 8;top: 30%;display: none;">
	<a onclick="go_to_up()" onmouseover="cha()" onmouseleave="cha2()" id="folwer_top" style="width: 100%;height: 100%;">
		<div id="flower_top2" style="height: 110px;width: 80px;background:url(../img/rocket_button_up.png);margin: 0 auto;margin-right: 30px;background-position-x: -30px;background-position-y: -10px;">
			
		</div>
	</a>
</div>
   <div class="container" style="width: 100%;">
   	<?php include("top.php"); ?>
   		<div class="row">
			<div class="col-md-12" style="text-align: center;padding: 0;margin: 0;height: 180px;width: 100%;background: url(../img/green_top.png);background-size: cover;background-position-x: -230px;background-repeat: no-repeat;">
				<span style="line-height: 180px;color: white;font-size: 30px;">销量排行榜，众人所爱</span>
			</div>
		</div>
		<div id="show_you" class="row" style="width: 90%;margin: 0 auto;text-align: center;margin-top: 70px;margin-bottom: 100px;">
			<div class="col-md-12">
				<?php
					@$sql=mysql_query("select * from goods order by sales desc limit 0,30");
					@$sql_num=mysql_num_rows($sql);
					if($sql_num<=0){
						?>
						<span style="font-size: 24px;text-align: center;">暂无排行榜</span>
						<?php
					}else{
						$i=0;
						while($f=mysql_fetch_array($sql)){
							$i++;
							?>
							<div class="col-md-4" style="margin-top: 30px;">
								<div onmouseleave="change_type2(<?php echo $f['good_id']; ?>)" onmouseover="change_type(<?php echo $f['good_id']; ?>)" id="show_flower<?php echo $f['good_id']; ?>" class="thumbnail" style="height: 580px;padding: 0;border: 0;margin-left: 20px;">
									<a style="text-align: center;" href="see_good.php?good_id=<?php echo $f['good_id'] ?>">
									<img style="height: 450px;width: 100%;" src="<?php echo $f['main_img']; ?>" />
									<div class="caption">
										<div class="row">
											<div class="col-md-9" style="text-align: left;margin: 0 auto;">
												<p class="text-muted">
													<div style="font-size: 16px;width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
														<?php echo $f['material']; ?>
													</div>  
												</p>
												<p style="font-size: 16px;">
													<?php echo $f['good_name']; ?>
												</p>
												<p style="color: #E03636;font-size: 24px;">
													￥<?php echo $f['good_price']; ?>
												</p>
											</div>
											<?php
												if($i==1){
													?>
														<div class="col-md-3" style="margin: 0 auto;padding: 0;text-align: center;">
															<div class="thumbnail" style="height: 57px;width: 68px;background: url(../img/top-1.png);border: 0;padding: 0;margin: 0;margin-top: 10px;">
																<span style="color:white;font-size: 18px;">top</span><br>
																<span style="color:white;font-size: 20px;"><?php echo $i; ?></span>
															</div>
															<span style="padding: 0;margin: 0;margin-right: 50px;">
																销量：<?php echo $f['sales'] ?>
															</span>
														</div>
													<?php
												}else if($i==2){
													?>
														<div class="col-md-3" style="margin: 0 auto;padding: 0;text-align: center;">
															<div class="thumbnail" style="height: 57px;width: 68px;background: url(../img/top-2.png);border: 0;padding: 0;margin: 0;margin-top: 10px;">
																<span style="color:white;font-size: 18px;">top</span><br>
																<span style="color:white;font-size: 20px;"><?php echo $i; ?></span>
															</div>
															<span style="padding: 0;margin: 0;margin-right: 50px;">
																销量：<?php echo $f['sales'] ?>
															</span>
														</div>
													<?php
												}else if($i==3){
													?>
														<div class="col-md-3" style="margin: 0 auto;padding: 0;text-align: center;">
															<div class="thumbnail" style="height: 57px;width: 68px;background: url(../img/top-3.png);border: 0;padding: 0;margin: 0;margin-top: 10px;">
																<span style="color:white;font-size: 18px;">top</span><br>
																<span style="color:white;font-size: 20px;"><?php echo $i; ?></span>
															</div>
															<span style="padding: 0;margin: 0;margin-right: 50px;">
																销量：<?php echo $f['sales'] ?>
															</span>
														</div>
													<?php
												}else{
													?>
														<div class="col-md-3" style="margin: 0 auto;padding: 0;text-align: center;">
															<div class="thumbnail" style="height: 57px;width: 68px;background: url(../img/top.jpg);border: 0;padding: 0;margin: 0;margin-top: 10px;border: 0;padding: 0;">
																<span style="color:white;font-size: 18px;">top</span><br>
																<span style="color:white;font-size: 20px;"><?php echo $i; ?></span>
															</div>
															<span style="padding: 0;margin: 0;margin-right: 50px;">
																销量：<?php echo $f['sales'] ?>
															</span>
														</div>
													<?php
												}
												?>
										</div>
									</div>
								</div>
								</a>
							</div>
							<?php
						}
					}
					?>
			</div>
		</div>
		<?php include("footer.php"); ?>
   </div>
   <script type="text/javascript" src="../js/index.js"></script>
   
<script type="text/javascript">
function go_to_up(){
	var flower_top2=document.getElementById("flower_top2");
	var flower_top=document.getElementById("flower_top");
	flower_top2.style.height='500px';
	flower_top2.style.backgroundPositionX='-340px';
	 $('html,body').animate({  
        scrollTop: 0  
    }, 800); 
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
	function change_type2(good_id){
		var show_flower=document.getElementById("show_flower"+good_id);
		show_flower.style.boxShadow='none';
	}
		function change_type(good_id){
		var show_flower=document.getElementById("show_flower"+good_id);
		show_flower.style.boxShadow='5px 5px 8px 10px #888888';
	}
	window.onscroll=function(){
		var this_top=$(this).scrollTop();
		var show_you=$("#show_you").offset().top;
		var top=document.getElementById("up");
		$(window).scroll(function(){
        if(this_top>show_you+400){
            top.style.display='block';
        }else{
        	top.style.display='none';
        }
    });
	}
</script>