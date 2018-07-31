<meta charset="utf-8" />
<title>花语大全</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--<script type="text/javascript" src="../utf8-php/ueditor.config.js"></script>
<script type="text/javascript" src="../utf8-php/ueditor.all.min.js"></script>
<script type="text/javascript" src="../utf8-php/lang/zh-cn/zh-cn.js"></script>-->
<style>
	[class *= col-]{
  background-color: #eee;
}
</style>
<?php

?>
<div class="container" style="width: 100%;">
	<?php include_once("top.php"); ?>
		<div  class="row" style="width: 90%;margin: 0 auto;margin-top: 10px;">
			<div class="col-md-12">
				<div class="row" style="background-color: white;">
					<div class="col-md-9" style="background: white;border: 1px solid black;"> 
						<div class="row">
							<?php  
								$sql=mysql_query("select * from know where if_letknow='推荐'");
								@$num=mysql_num_rows($sql);
								if($num<=0){
									?>
												
									<?php
									}else{
										?>
										<div class="col-md-12"  style="background: white;">
											<h4>推荐文章</h4>
											<div class="row">
												<div class="col-md-12"  style="background: white;">
													<?php
														while($hua=mysql_fetch_array($sql)){
															?>
																<div class="panel panel-default" style="border: 0;">
																	<div class="panel-heading" style="padding: 0;margin: 0;">
																		<div class="row">
																			<div class="col-md-6" style="background: white;">
																				<a href="see_hua.php?hua_id=<?php echo $hua['hua_id']; ?>">
																					<span><?php echo $hua['hua_title']; ?></span>
																				</a>
																			</div>
																			<div class="col-md-6" style="text-align: right;background-color: white;">
																				<?php  
																					$know_id=$hua['kown_id'];
																					$p=mysql_query("select * from know_type where know_id='$know_id'");
																					$aa=mysql_fetch_array($p);
																					?>
																				<span><a href="see_know_type.php?kown_id=<?php echo $know_id; ?>&know_name=<?php echo $aa['know_name'] ?>"><?php echo $aa['know_name']; ?></a></span>
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
										<?php
									}
									?>
							
						</div>
						
						
						<div class="row">
							<div class="col-md-12" style="background-color: white;">
								<div class="row">
									<div class="col-md-12" style="background-color: white;">
										<hr size="2" color="red" />
										<h4>分类推荐</h4>
										
										<?php
											$type=mysql_query("select * from know_type");
											@$b=mysql_num_rows($type);
											if($b<=0){
												?>
												<div class="row">
													<div class="col-md-12">暂无分类</div>
												</div>
												<?php
											}else{
												?>
												<div class="row">
													<?php  
														while($p=mysql_fetch_array($type)){
															?>
															<div class="col-md-5  col-md-offset-1" style="background-color: white;">
																<div class="panel panel-default">
																	<div class="panel-heading" style="background-color: white;">
																		<a href="know_type.php?<?php echo $p['know_id']; ?>"><?php echo $p['know_name'] ?></a>
																		
																			<a href="know_type.php?<?php echo $p['know_id'] ?>"><span style="float: right;">更多》</span></a>
																	</div>
																	<div class="panel-body">
																		<?php
																			$id=$p['know_id'];
																			$e=mysql_query("select * from know where kown_id='$id' limit 0,8");
																			@$g=mysql_num_rows($e);
																			if($g<=0){
																				
																			}else{
																				?>
																				<ul style="line-height: 30px;">
																					<?php 
																						while($know=mysql_fetch_array($e)){
																							?>
																							<li><a href="see_hua.php?hua_id=<?php echo $know['hua_id'] ?>"><?php echo $know['hua_title']; ?></a></li>
																							<?php
																						}
																						?>
																				</ul>
																				<?php
																			}
																			?>
																	</div>
																</div>
															</div>
															<?php
														}
														?>
												</div>
												<?php
											}
											?>
									</div>
								</div>
							</div>
						</div>
						
						
								<?php  
									$pn=mysql_query("select * from know limit 0,8");
									@$all=mysql_num_rows($pn);
									if($all<=0){
										
									}else{
										?>
									<div class="row">
										<div class="col-md-12" style="background-color: white;">
											<hr size="2" />
											<h4>最新文章</h4>
											<ul class="list-group">
												<?php
												while($ff=mysql_fetch_array($pn)){
													$id=$ff['kown_id'];
													$knk=mysql_query("select * from know_type where know_id='$id'");
													@$r=mysql_fetch_array($knk);
													?>
												<li class="list-group-item">
													<span>
														<a href="see_hua.php?hua_id=<?php echo $ff['hua_id']; ?>"><?php echo $ff['hua_title'] ?></a>
														<a style="float: right;"><a style="float: right;" href="see_type.php?know_id=<?php echo $id; ?>"><?php echo $r['know_name']; ?></a></a>
													</span>
													
															
												</li>
													<?php
												}
												?>
											</ul>
										</div>
									</div>
										<?php
									}
									
									?>
						
					</div>
					<div class="col-md-3" style="background-color:white ;">
						<div style="width: 75%;background-color: gainsboro;margin: 0 auto;">
							<div style="background: url(../img/lu.jpg);background-size: cover;width: 100%;height: 30px;"><span style="line-height: 30px;">相关分类</span></div>
							<?php  
								$type=mysql_query("select * from know_type");
								@$aa=mysql_num_rows($type);
								if($aa<=0){
									?>
									<span>暂无分类</span>
									<?php
								}else{
									?>
									<ul id="type" style="line-height: 50px;">
										<?php  
											while($kn=mysql_fetch_array($type)){
												?>
												<li style="width: 100%;"><a href="article_cat.php?type=<?php echo $kn['know_name']; ?>"><?php echo $kn['know_name']; ?></a></li>
												<?php
											}
											?>
									</ul>
									<?php
								}
								?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php include("footer.php"); ?>
</div>