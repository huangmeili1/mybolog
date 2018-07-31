<meta charset="utf-8" />
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php @$type=$_GET['type']; ?>
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<?php
			include_once("../conn/dataconnection.php");
	$s=mysql_query("select know_name from know_type where know_id='$type'");
	$ss=mysql_fetch_array($s);
	?>
<title>玫瑰<?php echo $ss['know_name']; ?>-花心思</title>
<?php
function trimall($str)//删除空格
								{
								
								    $qian=array(" ","　","\t","\n","\r");$hou=array("","","","","");
								
								    return str_replace($qian,$hou,$str);    
								}
							function getWord($content){
								$str=strip_tags($content);//将html格式去掉
								
								$str=trimall($str);//删除空格
								
								$str=mb_substr($str,0,90,'utf-8');//截取字段
								
								return $str;
								}
?>
<div class="container" style="width: 100%;">
	<?php
		include("top.php");
		?>
		<div class="row">
			<div class="col-md-12" style="text-align: center;height: 200px;width: 100%;background: url(../img/login.jpg);background-position-y: 200px;background-position-x: 1200px;">
				<span style="color: white;line-height: 200px;font-size: 30px;">花心思</span>
			</div>
		</div>
		<div class="row" style="min-height: 250px;">
			<div class="col-md-12">
		<?php
			$sql=mysql_query("select * from know where kown_id='$type'");
			@$num=mysql_num_rows($sql);
			if($num<=0){
				?>
				<div style="width: 50%;margin: 0 auto;">
				<span style="font-size: 20px;margin-left: 200px;">暂无<?php echo $ss['know_name']; ?>方面的知识<a href="all_know.php" class="btn btn-danger btn-lg">查看更多</a></span>
				</div>
				<?php
			}else{
				while($know=mysql_fetch_array($sql)){
					?>
					<div class="row" style="width: 80%;margin: 0 auto;margin-top: 30px;background-color: white;">
					<div class="col-md-12" style="background-color: white;">
						<div class="row">
							<div class="col-md-3" style="background-color: white;">
								<a href="article.php?hua_id=<?php echo $know['hua_id']; ?>" class="thumbnail" style="padding: 0;margin: 0;border: 0;">
									<img src="<?php echo $know['img']; ?>" />
								</a>
							</div>
							<div class="col-md-9" style="text-align: left;background-color: white;">
								<a style="text-decoration: none;color: black;" href="article.php?hua_id=<?php echo $know['hua_id']; ?>">
								<h4><?php echo $know['hua_title'] ?></h4>
								<p></p>
								<?php
										$content=$know['hua_content'];
										?>
										<p style="text-align: left;text-indent: 2em;line-height: 30px;">
											<?php
												echo getWord($content);
											?>
										</p>
										</a>
										
							</div>
						</div>
						<div class="row" style="margin-top: 20px;">
							<div class="col-md-12" style="width: 100%;height: 2px;"></div>
						</div>
					</div>			
				</div>
					<?php
				}
				?>
				
				<?php
			}
			?>
			
			</div>
		</div>
			
			<?php include("footer.php"); ?>
</div>