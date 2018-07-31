<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>护士节鲜花</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php

?>
<div class="container" style="width: 100%;">
	<?php
		include("top.php");
		?>
		<div class="row">
			<div class="col-md-12" style="padding: 0;margin: 0;">
				<div class="thumbnail" style="border: 0;padding: 0;margin: 0;">
					<img src="../img/banner_17nursesday.jpg" />
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="background-color: #f8e4e6;">
				<div class="row" style="width: 80%;margin: 0 auto;margin-top: 40px;">
					<?php
						@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') order by sales desc limit 0,3");
						@$sql_num=mysql_num_rows($sql);
						if(@$sql_num<=0){
							
						}else{
							while($s=mysql_fetch_array($sql)){
								?>
								<div class="col-md-4" style="">
									<a style="text-decoration: none;color: white;" href="see_good.php?good_id=<?php echo $s['good_id'] ?>">
									<div class="thumbnail" style="height: 420px;">
										<img style="height: 300px;width: 100%;" src="<?php echo $s['main_img']; ?>" />
										<div class="caption" style="text-align: left;">
											<div class="row">
												<div class="col-md-10">
													<p style="font-size: 20px;">
													<?php echo $s['good_name']; ?>
													</p>
													<p class="text-muted">
													<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
															<?php echo $s['material']; ?>
													</div>  
													</p>
													<p><span style="font-size: 20px;">￥<b><?php echo $s['good_price']; ?></b></span></p>
												</div>
												<div class="col-md-2" style="height: 50px;background: url(../img/tan_ico_2.png) no-repeat;">
													
												</div>
											</div>
											</div>
											</a>
									</div>
								</div>
								<?php
							}
						}
						?>
				</div>
				<div class="row" style="width: 80%;margin: 0 auto;margin-top: 40px;">
						<div class="col-md-12" style="background: url(../img/d_line.png);width: 100%;height: 100px;text-align: center;">
							<span style="color: white;font-size: 28px;line-height: 80px;background-color: #f8e4e6;">送白衣天使鲜花-恋人篇</span>
						</div>
				</div>
				<div class="row" style="width: 80%;margin: 0 auto;">
					<?php 
						@$love=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%送女朋友%' or festival like '%情人节%' or object like '%女朋友%') order by sales desc limit 3,8");
						@$love_num=mysql_num_rows($love);
						if(@$love_num<=0){
							
						}else{
							while($love_f=mysql_fetch_array($love)){
								?>
								<div class="col-md-3" style="">
									<a style="text-decoration: none;color: white;" href="see_good.php?good_id=<?php echo $love_f['good_id'] ?>">
									<div class="thumbnail" style="height: 350px;">
										<img style="height: 250px;width: 100%;" src="<?php echo $love_f['main_img']; ?>" />
										<div class="caption" style="text-align: center;">
											<p>
											<?php echo $love_f['good_name']; ?>
											</p>
											<p class="text-muted">
											<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $love_f['material']; ?>
											</div>  
											</p>
											<p style="font-size: 20px;color: #E03636;">
												￥<?php echo $love_f['good_price']; ?>
											</p>
											</div>
											</a>
									</div>
								</div>
								<?php
							}
						}
						?>
				</div>
				<div class="row" style="width: 80%;margin: 0 auto;margin-top: 40px;">
						<div class="col-md-12" style="background: url(../img/d_line.png);width: 100%;height: 100px;text-align: center;">
							<span style="color: white;font-size: 28px;line-height: 80px;background-color: #f8e4e6;">送白衣天使鲜花-长辈篇</span>
						</div>
				</div>
				<div class="row" style="width: 80%;margin: 0 auto;">
					<?php
						@$elder=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%长辈%' or object like '%长辈%') order by sales limit 0,8");
						@$elder_num=mysql_num_rows($elder);
						if(@$elder_num<=0){
							
						}else{
							while($e=mysql_fetch_array($elder)){
								?>
								<div class="col-md-3" style="">
									<a style="text-decoration: none;color: white;" href="see_good.php?good_id=<?php echo $e['good_id'] ?>">
									<div class="thumbnail" style="height: 350px;">
										<img style="height: 250px;width: 100%;" src="<?php echo $e['main_img']; ?>" />
										<div class="caption" style="text-align: center;">
											<p>
											<?php echo $e['good_name']; ?>
											</p>
											<p class="text-muted">
											<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $e['material']; ?>
											</div>  
											</p>
											<p style="font-size: 20px;color: #E03636;">
												￥<?php echo $e['good_price']; ?>
											</p>
											</div>
											</a>
									</div>
								</div>
								<?php
							}
						}
						?>
				</div>
				<div class="row" style="width: 80%;margin: 0 auto;margin-top: 40px;">
						<div class="col-md-12" style="background: url(../img/d_line.png);width: 100%;height: 100px;text-align: center;">
							<span style="color: white;font-size: 28px;line-height: 80px;background-color: #f8e4e6;">唯美永生花推荐</span>
						</div>
				</div>
				<div class="row" style="width: 80%;margin: 0 auto;">
					<?php
						@$fe=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='永生花') order by sales desc limit 0,8");
						@$fe_num=mysql_num_rows($fe);
						if(@$fe_num<=0){
							
						}else{
							while($fe_fe=mysql_fetch_array($fe)){
								?>
								<div class="col-md-3" style="">
									<a style="text-decoration: none;color: white;" href="see_good.php?good_id=<?php echo $fe_fe['good_id'] ?>">
									<div class="thumbnail" style="height: 350px;">
										<img style="height: 250px;width: 100%;" src="<?php echo $fe_fe['main_img']; ?>" />
										<div class="caption" style="text-align: center;">
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
											</a>
									</div>
								</div>
								<?php
							}
						}
						?>
				</div>
				<div class="row" style="width: 80%;margin: 0 auto;margin-top: 40px;">
						<div class="col-md-12" style="background: url(../img/d_line.png);width: 100%;height: 100px;text-align: center;">
							<span style="color: white;font-size: 28px;line-height: 80px;background-color: #f8e4e6;">精美礼品推荐</span>
						</div>
				</div>
				<div class="row" style="width: 80%;margin: 0 auto;">
					<?php
						@$g=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='礼品') order by sales desc limit 0,8");
						@$g_num=mysql_num_rows($g);
						if(@$g_num<=0){
							
						}else{
							while($g_fe=mysql_fetch_array($g)){
								?>
								<div class="col-md-3" style="">
									<a style="text-decoration: none;color: white;" href="see_good.php?good_id=<?php echo $g_fe['good_id'] ?>">
									<div class="thumbnail" style="height: 350px;">
										<img style="height: 250px;width: 100%;" src="<?php echo $g_fe['main_img']; ?>" />
										<div class="caption" style="text-align: center;">
											<p>
											<?php echo $g_fe['good_name']; ?>
											</p>
											<p class="text-muted">
											<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $g_fe['material']; ?>
											</div>  
											</p>
											<p style="font-size: 20px;color: #E03636;">
												￥<?php echo $g_fe['good_price']; ?>
											</p>
											</div>
											</a>
									</div>
								</div>
								<?php
							}
						}
						?>
				</div>
				<?php
					include("footer.php");
					?>
			</div>
		</div>
</div>
<script type="text/javascript" src="../js/index.js"></script>