<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>花知识大全</title>
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
</style>
					<?php
						function trimall($str)//删除空格
								{
								
								    $qian=array(" ","　","\t","\n","\r");$hou=array("","","","","");
								
								    return str_replace($qian,$hou,$str);    
								}
							function getWord($content){
								$str=strip_tags($content);//将html格式去掉
								
								$str=trimall($str);//删除空格
								
								$str=mb_substr($str,0,80,'utf-8')."......";//截取字段
								
								return $str;
								}
					?>
<?php

?>
<div class="container" style="width: 100%;">
	<?php include("top.php"); ?>
		<div class="row" style="width: 90%;margin: 0 auto;">
		<div class="col-md-10" style="background-color: white;">
		<div class="row" style="margin: 0 auto;margin-top: 20px;">
			<div class="col-md-12">
				<?php
				$sql=mysql_query("select * from know order by see_num desc limit 0,10");
				@$sql_num=mysql_num_rows($sql);
				if($sql_num<=0){
					
				}else{
					?>
					<div class="row">
						<div class="col-md-12" style="background-color: white;border: 1px solid gainsboro;">
							<div class="row">
							<h4>热门推荐</h4>
							<?php
								while($know=mysql_fetch_array($sql)){
									?>
									<div id="show" class="col-md-6" style="background-color: transparent;height: 200px;">
									<div class="row">
									<div class="col-md-4" style="background-color: transparent;">
										<div class="thumbnail">
											<a href="article.php?hua_id=<?php echo $know['hua_id']; ?>">
												<img style="height: 150px;min-width: 150px;" src="<?php echo $know['img']; ?>" />
											</a>
										</div>
									</div>
									<div class="col-md-8" style="background-color: transparent;overflow: hidden;">
										<h4><a href="article.php?hua_id=<?php echo $know['hua_id']; ?>"><?php echo $know['hua_title']; ?></a></h4>
										<p style="line-height: 30px;">
											<?php echo  getWord($know['hua_content']) ?>
										</p>
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
			
		</div>
		<?php 
							$if_know=mysql_query("select * from know where if_letknow='推荐' limit 0,10");
							@$if_know_num=mysql_num_rows($if_know);
							if(@$if_know_num<=0){
								
							}else{
								?>
								<div class="row" style="border: 1px solid gainsboro;margin: 0 auto;margin-top: 20px;">
									<h4>小编推荐文章</h4>
									<?php
										while($if_know_see=mysql_fetch_array($if_know)){
											?>
											<div class="col-md-12" style="background-color: white;">
												<h4><a href="article.php?hua_id=<?php echo $if_know_see['hua_id']; ?>"><?php echo $if_know_see['hua_title']; ?></a></h4>
												<div>
												<p style="line-height: 30px;">
													<?php echo  getWord($if_know_see['hua_content']) ?>
												</p>
												</div>
											</div>
											<?php
										}
										?>
								</div>
								<?php
							}
							?>
							<?php
								$new=mysql_query("select * from know order by hua_time desc limit 0,10");
								@$new_num=mysql_num_rows($new);
								if(@$new_num<=0){
									
								}else{
									?>
									<div class="row" style="margin: 0 auto;margin-top: 20px;border: 1px solid gainsboro;">
										<h4>最新文章</h4>
										<?php
											while($new_know=mysql_fetch_array($new)){
												?>
												<div class="col-md-12" style="background-color: white;">
													<h4><a href="article.php?hua_id=<?php echo $new_know['hua_id']; ?>"><?php echo $new_know['hua_title']; ?></a></h4>
													<p style="line-height: 30px;">
													<?php echo  getWord($new_know['hua_content']) ?>
													</p>
												</div>
												<?php
											}
											?>
									</div>
									<?php
								}
								?>
			</div>
			<div class="col-md-2" style="background-color: white;margin-top: 20px;">
						<div style="width: 100%;background-color: white;margin: 0 auto;border: 1px solid gainsboro;">
							<div style="background: url(../img/lu.jpg);background-size: cover;width:100%;height: 30px;"><span style="line-height: 30px;">相关分类</span></div>
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
												<li style="width: 100%;"><a href="article_cat.php?type=<?php echo $kn['know_id']; ?>"><?php echo $kn['know_name']; ?></a></li>
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
								<?php include("footer.php"); ?>
</div>
<script type="text/javascript" src="../js/index.js"></script>