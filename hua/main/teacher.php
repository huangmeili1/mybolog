<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>教师节鲜花</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	#container{
		background: #556961;
	}
</style>
<?php

?>
<div class="container" style="width: 100%;">
	<?php include("top.php"); ?>
		<div class="row" style="">
			<div class="col-md-12" style="padding: 0;margin: 0;">
				<div class="thumbnail" style="width: 100%;padding: 0;margin: 0;border: 0;">
					<img style="width: 100%;" src="../img/teacher3.png"/>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="background-color: #556961;">
				<div class="row" style="margin-top: 30px;">
					<div class="col-md-12" style="padding: 0;margin: 0;">
						<div class="thumbnail" style="background-color: transparent;border: 0;padding: 0;border-radius: 0;">
							<img src="../img/title-sale.png" />
						</div>
					</div>
				</div>
				<div class="row" style="width: 80%;margin: 0 auto;">
					<?php
						$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') order by good_price asc limit 0,3");
						@$sql_num=mysql_num_rows($sql);
						if($sql_num<=0){
							
						}else{
							$a=0;
							while($f=mysql_fetch_array($sql)){
								$a++;
								if($a==2){
									?>
									<div class="col-md-6">
										<div class="thumbnail" style="border: 0;padding: 0;">
											<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $f['good_id']; ?>">
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
								}else{
									?>
									<div class="col-md-3">
										<div class="thumbnail" style="border: 0;padding: 0;">
											<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $f['good_id']; ?>">
											<img style="height: 300px;" src="<?php echo $f['main_img']; ?>" />
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
						}
						?>
				</div>
				<div class="row" style="margin-top: 30px;">
					<div class="col-md-12" style="padding: 0;margin: 0;">
						<div class="thumbnail" style="background-color: transparent;border: 0;padding: 0;border-radius: 0;">
							<img src="../img/title-saleFlower.png" />
						</div>
					</div>
				</div>
				<div class="row" style="width: 80%;margin: 0 auto;">
					<?php
						@$love=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%长辈%' or festival like '%教师节%' or object like '%长辈%') order by sales desc limit 0,9");
						@$love_num=mysql_num_rows($love);
						if(@$love_num<=0){
							
						}else{
							$b=0;
							while($l=mysql_fetch_array($love)){
								$b++;
								if($b==3||$b==4||$b==9){
									?>
									<div class="col-md-6">
										<div class="thumbnail" style="border: 0;padding: 0;">
											<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $l['good_id']; ?>">
											<img style="height: 400px;width: 100%;" src="<?php echo $l['main_img']; ?>" />
											<div class="caption" style="text-align: center;">
											<p>
											<?php echo $l['good_name']; ?>
											</p>
											<p class="text-muted">
											<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $l['material']; ?>
											</div>  
											</p>
											<p style="font-size: 20px;color: #E03636;">
												￥<?php echo $l['good_price']; ?>
											</p>
											</div>
											</a>
										</div>
									</div>
									<?php
								}else{
									?>
									<div class="col-md-3">
										<div class="thumbnail" style="border: 0;padding: 0;">
											<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $l['good_id']; ?>">
											<img style="height: 400px;width: 100%;" src="<?php echo $l['main_img']; ?>" />
											<div class="caption" style="text-align: center;">
											<p>
											<?php echo $l['good_name']; ?>
											</p>
											<p class="text-muted">
											<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $l['material']; ?>
											</div>  
											</p>
											<p style="font-size: 20px;color: #E03636;">
												￥<?php echo $l['good_price']; ?>
											</p>
											</div>
											</a>
										</div>
									</div>
									<?php
								}
							}
						}
						?>
				</div>
				<div class="row" style="margin-top: 30px;">
					<div class="col-md-12" style="padding: 0;margin: 0;">
						<div class="thumbnail" style="background-color: transparent;border: 0;padding: 0;border-radius: 0;">
							<img src="../img/title-saleYSH.png" />
						</div>
					</div>
				</div>
				<div class="row" style="width: 80%;margin: 0 auto;">
					<?php
						$fe=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='永生花') order by sales desc limit 0,6");
						@$fe_num=mysql_num_rows($fe);
						if($fe_num<=0){
							
						}else{
							$a=0;
							while($fefe=mysql_fetch_array($fe)){
								$a++;
								if($a==1||$a==6){
									?>
									<div class="col-md-6">
										<div class="thumbnail" style="border: 0;padding: 0;">
											<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $fefe['good_id']; ?>">
											<img style="height: 400px;width: 100%;" src="<?php echo $fefe['main_img']; ?>" />
											<div class="caption" style="text-align: center;">
											<p>
											<?php echo $fefe['good_name']; ?>
											</p>
											<p class="text-muted">
											<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $fefe['material']; ?>
											</div>  
											</p>
											<p style="font-size: 20px;color: #E03636;">
												￥<?php echo $fefe['good_price']; ?>
											</p>
											</div>
											</a>
										</div>
									</div>
									<?php
								}else{
									?>
									<div class="col-md-3">
										<div class="thumbnail" style="border: 0;padding: 0;">
											<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $fefe['good_id']; ?>">
											<img style="height: 400px;width: 100%;" src="<?php echo $fefe['main_img']; ?>" />
											<div class="caption" style="text-align: center;">
											<p>
											<?php echo $fefe['good_name']; ?>
											</p>
											<p class="text-muted">
											<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $fefe['material']; ?>
											</div>  
											</p>
											<p style="font-size: 20px;color: #E03636;">
												￥<?php echo $fefe['good_price']; ?>
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
						}
						?>
				</div>
				<div class="row" style="margin-top: 30px;">
					<div class="col-md-12" style="padding: 0;margin: 0;">
						<div class="thumbnail" style="background-color: transparent;border: 0;padding: 0;border-radius: 0;">
							<img src="../img/title-saleGift.png" />
						</div>
					</div>
				</div>
				<div class="row" style="width: 80%;margin: 0 auto;">
					<?php  
						@$g=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='礼品') and (good_use like '%长辈%' or festival like '教师节' or object like '长辈') order by sales desc limit 0,7");
						@$g_num=mysql_num_rows($g);
						if($g_num<=0){
							
						}else{
							$c=0;
							while($gg=mysql_fetch_array($g)){
								$c++;
								if($c==1){
									?>
									<div class="col-md-6">
										<div class="thumbnail" style="border: 0;padding: 0;">
											<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $gg['good_id']; ?>">
											<img style="height: 400px;width: 100%;" src="<?php echo $gg['main_img']; ?>" />
											<div class="caption" style="text-align: center;">
											<p>
											<?php echo $gg['good_name']; ?>
											</p>
											<p class="text-muted">
											<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $gg['material']; ?>
											</div>  
											</p>
											<p style="font-size: 20px;color: #E03636;">
												￥<?php echo $gg['good_price']; ?>
											</p>
											</div>
											</a>
										</div>
									</div>
									<?php
								}else{
									?>
									<div class="col-md-3">
										<div class="thumbnail" style="border: 0;padding: 0;">
											<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $gg['good_id']; ?>">
											<img style="height: 400px;width: 100%;" src="<?php echo $gg['main_img']; ?>" />
											<div class="caption" style="text-align: center;">
											<p>
											<?php echo $gg['good_name']; ?>
											</p>
											<p class="text-muted">
											<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $gg['material']; ?>
											</div>  
											</p>
											<p style="font-size: 20px;color: #E03636;">
												￥<?php echo $gg['good_price']; ?>
											</p>
											</div>
											</a>
										</div>
									</div>
									<?php
								}
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