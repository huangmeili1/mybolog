<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>重阳节鲜花</title>
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
					<img src="../img/z_17pc_banner.jpg" />
				</div>
			</div>
		</div>
		<div class="row" style="padding: 0;">
			<div class="col-md-12" style="padding: 0;margin: 0;background-color: #e1d1d3;">
				<div class="row" style="width: 80%;margin: 0 auto;margin-top: 30px;">
					<?php
						$f=mysql_query("select * from goods where object like '%长辈%' order by sales desc limit 0,3");
						@$f_num=mysql_num_rows($f);
						if($f_num<=0){
							
						}else{
							while($ff=mysql_fetch_array($f)){
								?>
								<div class="col-md-4" style="">
									<a style="text-decoration: none;color: white;" href="see_good.php?good_id=<?php echo $ff['good_id'] ?>">
									<div class="thumbnail" style="height: 450px;">
										<img style="height: 350px;width: 100%;" src="<?php echo $ff['main_img']; ?>" />
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
						}
						?>
				</div>
				<div class="row" style="width: 80%;margin: 0 auto;margin-top: 40px;">
						<div class="col-md-12" style="background: url(../img/d_line.png);width: 100%;height: 100px;text-align: center;">
							<span style="color: white;font-size: 28px;line-height: 80px;">重阳节鲜花推荐</span>
						</div>
				</div>
				<div class="row" style="width: 80%;margin: 0 auto;">
					<?php 
						$fu=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%送长辈%' or festival like '%父亲节%' or festival like '%母亲节%' or object like '%长辈%') order by sales desc limit 3,8");
						@$fu_num=mysql_num_rows($fu);
						if(@$fu_num<=0){
							
						}else{
							while($fuu=mysql_fetch_array($fu)){
								?>
								<div class="col-md-3" style="">
									<a style="text-decoration: none;color: white;" href="see_good.php?good_id=<?php echo $fuu['good_id'] ?>">
									<div class="thumbnail" style="height: 400px;">
										<img style="height: 300px;width: 100%;" src="<?php echo $fuu['main_img']; ?>" />
										<div class="caption" style="text-align: center;">
											<p>
											<?php echo $fuu['good_name']; ?>
											</p>
											<p class="text-muted">
											<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $fuu['material']; ?>
											</div>  
											</p>
											<p style="font-size: 20px;color: #E03636;">
												￥<?php echo $fuu['good_price']; ?>
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
				<div class="row" style="width: 80%;margin: 0 auto;margin-top: 40px;">
						<div class="col-md-12" style="background: url(../img/d_line.png);width: 100%;height: 100px;text-align: center;">
							<span style="color: white;font-size: 28px;line-height: 80px;">重阳节礼盒推荐</span>
						</div>
				</div>
				<div class="row" style="width: 80%;margin: 0 auto;">
					<?php
						@$zi=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and packing like '%盒%' order by sales desc limit 0,8");
						@$zi_num=mysql_num_rows($zi);
						if($zi_num<=0){
							
						}else{
							while($zi_zi=mysql_fetch_array($zi)){
								?>
								<div class="col-md-3" style="">
									<a style="text-decoration: none;color: white;" href="see_good.php?good_id=<?php echo $zi_zi['good_id'] ?>">
									<div class="thumbnail" style="height: 400px;">
										<img style="height: 300px;width: 100%;" src="<?php echo $zi_zi['main_img']; ?>" />
										<div class="caption" style="text-align: center;">
											<p>
											<?php echo $zi_zi['good_name']; ?>
											</p>
											<p class="text-muted">
											<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $zi_zi['material']; ?>
											</div>  
											</p>
											<p style="font-size: 20px;color: #E03636;">
												￥<?php echo $zi_zi['good_price']; ?>
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
							<span style="color: white;font-size: 28px;line-height: 80px;">重阳节礼品推荐</span>
						</div>
				</div>
				<div class="row" style="width: 80%;margin: 0 auto;">
					<?php
						@$gift=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='礼品') and (festival not like '%中秋节%' and object like '%长辈%') order by sales desc limit 0,8");
						@$gift_num=mysql_num_rows($gift);
						if($gift_num<=0){
							
						}else{
							while($g=mysql_fetch_array($gift)){
								?>
								<div class="col-md-3" style="">
									<a style="text-decoration: none;color: white;" href="see_good.php?good_id=<?php echo $g['good_id'] ?>">
									<div class="thumbnail" style="height: 400px;">
										<img style="height: 300px;width: 100%;" src="<?php echo $g['main_img']; ?>" />
										<div class="caption" style="text-align: center;">
											<p>
											<?php echo $g['good_name']; ?>
											</p>
											<p class="text-muted">
											<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $g['material']; ?>
											</div>  
											</p>
											<p style="font-size: 20px;color: #E03636;">
												￥<?php echo $g['good_price']; ?>
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