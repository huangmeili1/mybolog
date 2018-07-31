<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>情人节鲜花</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	 body{
	   cursor: url('../img/mouse-heart.ico');
	 @keyframes Img{
 	0%{ transform:translateX(-100%) scale(0); }
 	100%{ transform:translateX(0) scale(1); }
 	}
	 }
</style>
<?php

?>
<div class="container" style="width: 100%;background: url(../img/bg.jpg);">
	<?php
		include("top.php");
		?>
		<div class="row">
			<div class="col-md-12" style="width: 100%;height: 520px;padding: 0;margin: 0;background: url(../img/q_banner.jpg) no-repeat;">
				<div class="row" style="margin: 0;">
					<div class="col-md-7">
						<div class="thumbnail" style="border: 0;background: transparent;margin-top: 130px;margin-left: 120px;">
							<img style="animation: Img 2s ease-out;" src="../img/pc-banner-title.png" />
						</div>
					</div>
					<div class="col-md-5">
						<div class="thumbnail" style="margin: 0;border: 0;background: transparent;margin-top: 50px;margin-left: 0px;">
							<img style="animation: Img 2s ease-out;" src="../img/banner-tips.png" />
						</div>
					</div>
				</div>
			</div>
		</div>
				<div class="row">
					<div class="col-md-12" style="padding: 0;margin:0;">
						<div class="row">
							<div class="col-md-12" style="text-align: center;">
								<span style="color: crimson;font-size: 38px;">真爱如初——66朵花束</span>
								<br>
									<span style="color: white;font-size: 24px;">
										爱之深，不轻说，美好如初
									</span>
							</div>
						</div>
					</div>
					
				</div>
				<div class="row" style="width: 80%;margin: 0 auto;margin-top: 50px;">
					<?php
						@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and flower_num=66 order by sales desc limit 0,4");
						@$sql_num=mysql_num_rows($sql);
						if($sql_num<=0){
							
						}else{
							while($f=mysql_fetch_array($sql)){
								?>
								<div class="col-md-3">
									<div class="thumbnail" style="margin: 0;padding: 0;width: 100%;height: 400px;">
										<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $f['good_id'] ?>">
										<img style="height: 300px;width: 100%;" src="<?php echo $f['main_img']; ?>" />
										<div class="caption" style="text-align: center;">
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
											</a>
									</div>
								</div>
								<?php
							}
							?>
							
							<?php
						}
						?>
				</div>
				<div class="row" style="margin-top: 80px;">
					<div class="col-md-12" style="padding: 0;margin:0;">
						<div class="row">
							<div class="col-md-12" style="text-align: center;">
								<span style="color: crimson;font-size: 38px;">熊抱来袭——熊抱花束</span>
								<br>
									<span style="color: white;font-size: 24px;">
										在阳光正好的那天，说爱，让她抱个满怀
									</span>
							</div>
						</div>
					</div>
					
				</div>
				<div class="row" style="width: 80%;margin: 0 auto;margin-top: 50px;">
					<?php
						@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_name like '%熊抱%' order by sales desc limit 0,4");
						@$sql_num=mysql_num_rows($sql);
						if($sql_num<=0){
							
						}else{
							while($f=mysql_fetch_array($sql)){
								?>
								<div class="col-md-3">
									<div class="thumbnail" style="margin: 0;padding: 0;width: 100%;height: 400px;">
										<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $f['good_id'] ?>">
										<img style="height: 300px;width: 100%;" src="<?php echo $f['main_img']; ?>" />
										<div class="caption" style="text-align: center;">
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
											</a>
									</div>
								</div>
								<?php
							}
							?>
							
							<?php
						}
						?>
				</div>
				<div class="row" style="margin-top: 80px;">
					<div class="col-md-12" style="padding: 0;margin:0;">
						<div class="row">
							<div class="col-md-12" style="text-align: center;">
								<span style="color: crimson;font-size: 38px;">爱之长久——99朵花束</span>
								<br>
									<span style="color: white;font-size: 24px;">
										岁月是神偷，也偷不走我们久久的爱
									</span>
							</div>
						</div>
					</div>
					
				</div>
				<div class="row" style="width: 80%;margin: 0 auto;margin-top: 50px;">
					<?php
						@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and flower_num=99 order by sales desc limit 0,4");
						@$sql_num=mysql_num_rows($sql);
						if($sql_num<=0){
							
						}else{
							while($f=mysql_fetch_array($sql)){
								?>
								<div class="col-md-3">
									<div class="thumbnail" style="margin: 0;padding: 0;width: 100%;height: 400px;">
										<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $f['good_id'] ?>">
										<img style="height: 300px;width: 100%;" src="<?php echo $f['main_img']; ?>" />
										<div class="caption" style="text-align: center;">
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
											</a>
									</div>
								</div>
								<?php
							}
							?>
							
							<?php
						}
						?>
				</div>
				<div class="row" style="margin-top: 80px;">
					<div class="col-md-12" style="padding: 0;margin:0;">
						<div class="row">
							<div class="col-md-12" style="text-align: center;">
								<span style="color: crimson;font-size: 38px;">情定三生——求婚必备</span>
								<br>
									<span style="color: white;font-size: 24px;">
										任凭弱水三千，我只取一瓢饮
									</span>
							</div>
						</div>
					</div>
					
				</div>
				<div class="row" style="width: 80%;margin: 0 auto;margin-top: 50px;">
					<?php
						@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and flower_num>99 order by sales desc limit 0,4");
						@$sql_num=mysql_num_rows($sql);
						if($sql_num<=0){
							
						}else{
							while($f=mysql_fetch_array($sql)){
								?>
								<div class="col-md-3">
									<div class="thumbnail" style="margin: 0;padding: 0;width: 100%;height: 400px;">
										<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $f['good_id'] ?>">
										<img style="height: 300px;width: 100%;" src="<?php echo $f['main_img']; ?>" />
										<div class="caption" style="text-align: center;">
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
											</a>
									</div>
								</div>
								<?php
							}
							?>
							
							<?php
						}
						?>
				</div>
				<div class="row" style="margin-top: 80px;">
					<div class="col-md-12" style="padding: 0;margin:0;">
						<div class="row">
							<div class="col-md-12" style="text-align: center;">
								<span style="color: crimson;font-size: 38px;">爱之永恒——永不凋谢的玫瑰</span>
								<br>
									<span style="color: white;font-size: 24px;">
										进转千回，只为定格爱情最美好的瞬间
									</span>
							</div>
						</div>
					</div>
					
				</div>
				<div class="row" style="width: 80%;margin: 0 auto;margin-top: 50px;">
					<?php
						@$s=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='永生花') and material like '%玫瑰%' order by sales desc limit 0,4");
						@$s_num=mysql_num_rows($s);
						if($s_num<=0){
							
						}else{
							while($ff=mysql_fetch_array($s)){
								?>
								<div class="col-md-3">
									<div class="thumbnail" style="margin: 0;padding: 0;width: 100%;height: 400px;">
										<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $ff['good_id'] ?>">
										<img style="height: 300px;width: 100%;" src="<?php echo $ff['main_img']; ?>" />
										<div class="caption" style="text-align: center;">
											<p>
											<?php echo $ff['good_name']; ?>
											</p>
											<p class="text-muted">
											<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $ff['material']; ?>
											</div>  
											</p>
											<p style="font-size: 20px;color: #E03636;">
												￥<?php echo $ff['good_price']; ?>
											</p>
											</div>
											</a>
									</div>
								</div>
								<?php
							}
							?>
							
							<?php
						}
						?>
				</div>
				<div class="row" style="margin-top: 80px;">
					<div class="col-md-12" style="padding: 0;margin:0;">
						<div class="row">
							<div class="col-md-12" style="text-align: center;">
								<span style="color: crimson;font-size: 38px;">臻爱保鲜——泰国进口保鲜花</span>
								<br>
									<span style="color: white;font-size: 24px;">
										遇见你的每一天，都是新鲜的
									</span>
							</div>
						</div>
					</div>
					
				</div>
				<div class="row" style="width: 80%;margin: 0 auto;margin-top: 50px;">
					<?php
						@$s=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='永生花') and packing like '%瓶%' order by sales desc limit 0,4");
						@$s_num=mysql_num_rows($s);
						if($s_num<=0){
							
						}else{
							while($ff=mysql_fetch_array($s)){
								?>
								<div class="col-md-3">
									<div class="thumbnail" style="margin: 0;padding: 0;width: 100%;height: 400px;">
										<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $ff['good_id'] ?>">
										<img style="height: 300px;width: 100%;" src="<?php echo $ff['main_img']; ?>" />
										<div class="caption" style="text-align: center;">
											<p>
											<?php echo $ff['good_name']; ?>
											</p>
											<p class="text-muted">
											<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $ff['material']; ?>
											</div>  
											</p>
											<p style="font-size: 20px;color: #E03636;">
												￥<?php echo $ff['good_price']; ?>
											</p>
											</div>
											</a>
									</div>
								</div>
								<?php
							}
							?>
							
							<?php
						}
						?>
				</div>
				<?php
					include("footer.php");
					?>
		
</div>
<script type="text/javascript" src="../js/index.js"></script>