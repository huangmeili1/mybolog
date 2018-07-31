<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>新年鲜花</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php

?>
<div id="flame" class="container" style="width: 100%;">
	<?php
		include("top.php");
		?>
		<div class="row">
			<div class="col-md-12" style="padding: 0;margin: 0;">
				<div class="thumbnail" style="margin: 0;padding: 0;border: 0;">
					<img src="../img/new_banner.jpg" />
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="background: url(../img/product-bg.jpg);">
				<div class="row" style="margin-top: 30px;">
					<div class="col-md-12">
						<div class="thumbnail" style="background: transparent;border: 0;padding: 0;">
							<img src="../img/title-1.png" />
						</div>
					</div>
				</div>
				<div class="row" style="width: 80%;margin: 0 auto;">
					<?php
						$sql=mysql_query("select * from goods where (good_use like '%送女朋友%' or festival like '%情人节%' or object like '%女朋友%') order by sales desc limit 0,6");
						@$sql_num=mysql_num_rows($sql);
						if($sql_num<=0){
							
						}else{
							while($f=mysql_fetch_array($sql)){
								?>
								<div class="col-md-4">
									<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $f['good_id'] ?>">
									<div class="thumbnail" style="border: 0;padding: 0;">
										<img style="height: 400px;" src="<?php echo $f['main_img']; ?>" />
										<div class="caption">
											<div class="row">
												<div class="col-md-8">
													<p>
													<?php echo $f['good_name']; ?>
													</p>
													<p class="text-muted">
													<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
															<?php echo $f['material']; ?>
													</div>  
													</p>
													<p style="font-size: 20px;color: #E03636;">
														￥<?php echo $f['good_price']; ?>
													</p>
												</div>
												<div class="col-md-4">
													<div class="thumbnail" style="border: 0;padding: 0;margin-top: 10px;">
														<img src="../img/btn.png" />
													</div>
												</div>
											</div>
										</div>
									</div>
									</a>
								</div>
								<?php
							}
							?>
							
							<?php
						}
						?>
				</div>
				<div class="row" style="margin-top: 30px;">
					<div class="col-md-12">
						<div class="thumbnail" style="background: transparent;border: 0;padding: 0;">
							<img src="../img/title-2.png" />
						</div>
					</div>
				</div>
				
				<?php
					@$elder=mysql_query("select * from goods where (good_use like '%长辈%' or festival like '%长辈%' or object like '%长辈%') order by sales desc limit 0,6");
					@$elder_num=mysql_num_rows($elder);
					if(@$elder_num<=0){
						
					}else{
						?>
						<div class="row" style="width: 80%;margin: 0 auto;">
							<?php
								while($el=mysql_fetch_array($elder)){
									?>
									<div class="col-md-4">
									<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $el['good_id'] ?>">
									<div class="thumbnail" style="border: 0;padding: 0;">
										<img style="height: 400px;" src="<?php echo $el['main_img']; ?>" />
										<div class="caption">
											<div class="row">
												<div class="col-md-8">
													<p>
													<?php echo $el['good_name']; ?>
													</p>
													<p class="text-muted">
													<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
															<?php echo $el['material']; ?>
													</div>  
													</p>
													<p style="font-size: 20px;color: #E03636;">
														￥<?php echo $el['good_price']; ?>
													</p>
												</div>
												<div class="col-md-4">
													<div class="thumbnail" style="border: 0;padding: 0;margin-top: 10px;">
														<img src="../img/btn.png" />
													</div>
												</div>
											</div>
										</div>
									</div>
									</a>
								</div>
									<?php
								}
								?>
						</div>
						<?php
					}
					?>
				<div class="row" style="margin-top: 30px;">
					<div class="col-md-12">
						<div class="thumbnail" style="background: transparent;border: 0;padding: 0;">
							<img src="../img/title-3.png" />
						</div>
					</div>
				</div>
				<?php
					@$fe=mysql_query("select * from goods where (good_use like '%送朋友%' or festival like '%朋友节%' or object like '%朋友%') order by sales desc limit 6,6");
					@$fe_num=mysql_num_rows($fe);
					if(@$fe_num<=0){
						
					}else{
						?>
						<div class="row" style="width: 80%;margin: 0 auto;">
							<?php
								while($fe_fe=mysql_fetch_array($fe)){
									?>
									<div class="col-md-4">
									<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $fe_fe['good_id'] ?>">
									<div class="thumbnail" style="border: 0;padding: 0;">
										<img style="height: 400px;" src="<?php echo $fe_fe['main_img']; ?>" />
										<div class="caption">
											<div class="row">
												<div class="col-md-8">
													<p>
													<?php echo $fe_fe['good_name']; ?>
													</p>
													<p class="text-muted">
													<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
															<?php echo $fe_fe['material']; ?>
													</div>  
													</p>
													<p style="font-size: 20px;color: #E03636;">
														￥<?php echo $fe_fe['good_price']; ?>
													</p>
												</div>
												<div class="col-md-4">
													<div class="thumbnail" style="border: 0;padding: 0;margin-top: 10px;">
														<img src="../img/btn.png" />
													</div>
												</div>
											</div>
										</div>
									</div>
									</a>
								</div>
									<?php
								}
								?>
						</div>
						<?php
					}
					?>
					<div class="row" style="margin-top: 30px;">
						<div class="col-md-12">
							<div class="thumbnail" style="background: transparent;border: 0;padding: 0;">
								<img src="../img/title-4.png" />
							</div>
						</div>
					</div>
					<?php
						@$birth=mysql_query("select * from goods where (good_use like '%送朋友%' or festival like '%朋友节%' or object like '%朋友%') order by sales desc limit 12,6");
						@$birth_num=mysql_num_rows($birth);
						if($birth_num<=0){
							
						}else{
							?>
							<div class="row" style="width: 80%;margin: 0 auto;">
								<?php
									while($b=mysql_fetch_array($birth)){
										?>
										<div class="col-md-4">
									<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $b['good_id'] ?>">
									<div class="thumbnail" style="border: 0;padding: 0;">
										<img style="height: 400px;" src="<?php echo $b['main_img']; ?>" />
										<div class="caption">
											<div class="row">
												<div class="col-md-8">
													<p>
													<?php echo $b['good_name']; ?>
													</p>
													<p class="text-muted">
													<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
															<?php echo $b['material']; ?>
													</div>  
													</p>
													<p style="font-size: 20px;color: #E03636;">
														￥<?php echo $b['good_price']; ?>
													</p>
												</div>
												<div class="col-md-4">
													<div class="thumbnail" style="border: 0;padding: 0;margin-top: 10px;">
														<img src="../img/btn.png" />
													</div>
												</div>
											</div>
										</div>
									</div>
									</a>
								</div>
										<?php
									}
									?>
							</div>
							<?php
						}
						?>
						<?php
							include("footer.php");
							?>
			</div>
		</div>
</div>
<script type="text/javascript" src="../js/index.js"></script>
<script type="text/javascript">
	
</script>
<script>
     
 
    function Obj(){}  //创建一个对象
 
    /*为这个对象添加一个具有一个参数的原型方法*/
    Obj.prototype.draw=function(o){
        var speed=0;   //雪花每次下落的数值（10px）
        var startPosLeft=Math.ceil(Math.random()*document.documentElement.clientWidth);//设置雪花随机的开始x值的大小
        o.style.opacity=(Math.ceil(Math.random()*3)+7)/10;  //设置透明度
        o.style.left=startPosLeft+'px'; 
        o.style.color="#fff";
        o.style.fontSize=12+Math.ceil(Math.random()*14)+'px';
        setInterval(function(){
            //雪花下落的top值小鱼屏幕的可视区域高时执行下列
            if(speed<document.documentElement.clientHeight){
                o.style.top=speed+'px';
                o.style.left=startPosLeft+Math.ceil(Math.random()*8)+'px';
                speed+=10;
            }
            else{
                o.style.display='none';
            }
        },400);
    }
 
    var flame=document.getElementById('flame');
  
    /*使用setInterval定时器每800毫秒创建一个雪花*/
    setInterval(function(){
        var odiv=document.createElement('div');  //创建div
        odiv.innerHTML="✽";   //div的内容
        odiv.style.position='absolute';  //div的绝对定位
        flame.appendChild(odiv);   //把创建好的div放进flame中
        var obj=new Obj();   //创建函数
        obj.draw(odiv);  //执行obj的draw方法
    },800);  
 
</script>