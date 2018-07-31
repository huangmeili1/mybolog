<meta charset="utf-8" />
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	#type li a:hover{
		background-color:orangered;
		color: white;
	}
</style>
<?php
include_once("../conn/dataconnection.php");
@$hua_id=$_GET['hua_id'];
$sql=mysql_query("select * from know where hua_id='$hua_id'");
@$n=mysql_num_rows($sql);
@$hua=mysql_fetch_array($sql);

?>
<title><?php echo $hua['hua_title']; ?></title>
<div class="container" style="width: 100%;">
	<?php include("top.php"); ?>
		<div class="row" style="width: 90%;margin: 0 auto;">
			<div class="col-md-12" style="background-color: white;">
				<ol class="breadcrumb" style="background-color: transparent;margin-bottom: 0;">
				    <li><a href="index.php">首页</a></li>
				    <li><a href="all_hua.php">花语大全</a></li>
				    <li><a href="see_know_type.php?know_id=<?php echo $hua['kown_id']; ?>">花语大全</a></li>
				    <li class="active"><?php echo $hua['hua_title']; ?></li>
				</ol>
			</div>
		</div>
		
		<div class="row" style="width: 90%;margin: 0 auto;">
			<div class="col-md-10" style="background-color: white;">
			<?php
			if(@$n<=0){
				?>
				<div class="row" style="width: 80%;margin: 0 auto;text-align: center;">
					<div class="col-md-12">
						暂无文章内容；
					</div>
				</div>
				<?php
			}else{
				?>
				<div class="row" style="width: 100%;margin: 0 auto;">
					<div class="col-md-12" style="background-color: white;">
						<div class="panel panel-default" style="margin-top: 0;border: 1px solid groove;">
						    <div class="panel-heading" style="text-align: center;background-color: white;margin: 0;padding: 0;">
						        <h3><?php echo $hua['hua_title']; ?></h3>
						        <div style="text-align: left;background-color: #eee;width: 100%;margin: 0;padding: 0;">
						        	<hr size="4" color="gray" />
						        	<span>花间杂物铺/</span>
						        	<span><?php echo $hua['know_time']; ?></span>
						        	</div>
						    </div>
						    <div class="panel-body" style="width: 85%;margin:0 auto;">
						       	<?php  
						       		echo $hua['hua_content'];
						       		?>
						    </div>
						</div>
					</div>
				</div>
				<?php
			}
			?>
			
			<?php
				function selectHua($hua_idd){
					return $yu="select * from know where hua_id='$hua_idd'";
				}
				@$hua1=$hua_id-1;
				$o=selectHua($hua1);
			$r=mysql_query($o);
			@$q=mysql_num_rows($r);
				
				?>
			<div class="row">
				<div class="col-md-12">
					<ul class="pager">
						<?php  
							if($q<=0){
								?>
								  <li class="previous disabled"><a href="see_hua.php">&larr;无上一篇</a></li>
								<?php
							}else{
								$hua2=mysql_fetch_array($r);
								?>
								<li class="previous"><a href="see_hua.php?hua_id=<?php echo $hua2['hua_id']; ?>">&larr;上一篇:<?php echo $hua2['hua_title']; ?></a></li>
								<?php
							}					
							?>
							<?php
								@$hua3=$hua_id+1;
								$w=selectHua($hua1);
								$m=mysql_query($w);
								@$z=mysql_num_rows($m);
								if($z<=0){
									?>
									<li class="next disabled"><a href="see_hua.php">无下一篇 &rarr;</a></li>
									<?php
								}else{
									$c=mysql_fetch_array($m);
									?>
									<li class="next"><a href="see_hua.php?hua_id=<?php echo $c['hua_id']; ?>">下一篇:<?php echo $c['hua_title']; ?> &rarr;</a></li>
									<?php
								}
								?>
					</ul>
				</div>
			</div>
			</div>
			<div class="col-md-2" style="background-color: white;margin: 0;padding: 0;">
				<div class="row" style="">
					<div class="col-md-12" style="width: 100%;margin: 0;padding: 0;">
						<div class="panel panel-default" style="width: 100%;margin: 0 auto;padding: 0;">
							<div class="panel-heading" style="width: 100%;">
								热门点击排行
							</div>
							<div class="panel-body" style="width: 100%;">
								<?php
									
									$ss=mysql_query("select * from know order by see_num desc limit 0,10");
									@$nn=mysql_num_rows($ss);
									if($nn<=0){
										?>
										<span>暂无点击排行</span>
										<?php
									}else{
										while($de=mysql_fetch_array($ss)){
											?>
											<ul class="list-group">
												<li class="list-group-item"><?php echo $de['hua_title']; ?></li>
											</ul>
											<?php
										}
									}
									?>
							</div>
						</div>
					</div>
				</div>
				<div class="row" style="margin-top: 30px;">
					<div class="col-md-12" style="margin: 0;padding: 0;">
						<div style="">
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
												<li style="width: 100%;"><a href="see_type?know_id=<?php echo $kn['know_id'] ?>"><?php echo $kn['know_name']; ?></a></li>
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
		<?php
			include("footer.php");
			?>
</div>

<script type="text/javascript" src="../js/index.js"></script>