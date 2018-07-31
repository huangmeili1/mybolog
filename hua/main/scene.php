<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
@$type=$_GET['type'];
?>
<title><?php echo $type; ?>场景</title>
<div class="container" style="width: 100%;">
	<?php include('top.php'); ?>
		<div class="row">
			<div class="col-md-12" style="text-align: center;height: 200px;width: 100%;background: url(../img/login.jpg);background-position-y: 200px;background-position-x: 1200px;">
				<span style="color: white;line-height: 200px;font-size: 30px;"><?php echo $type; ?>场景</span>
			</div>
		</div>
		
		<?php 
			if($type=='表白'){
				$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%$type%')");
				@$num=mysql_num_rows($sql);
				if($num<=0){
					?>
					<div class="row">
						<div class="col-md-12">
							<span>暂无表白鲜花推荐，<a class="btn btn-daner btn-lg" href="flower.php">查看更多</a></span>
						</div>
					</div>
					<?php
				}else{
					?>
					<div class="row" style="width: 85%;margin: 0 auto;">
					<?php
					while($bibai=mysql_fetch_array($sql)){
						?>
						<div class="col-md-4" id="see<?php echo $bibai['good_id']; ?>" onmousemove="trank(<?php echo $bibai['good_id']; ?>)" onmouseout="trank2(<?php echo $bibai['good_id']; ?>)" style="margin-top: 30px;background-color: white;">
							<a id="thumba<?php echo $bibai['good_id']; ?>" href="see_good.php?good_id=<?php echo $bibai['good_id']; ?>" class="thumbnail" style="text-align: center;height: 530px;padding: 0;border: 0;text-decoration: none;width: 90%;">
							<img id="img<?php echo $bibai['good_id']; ?>" style="height: 420px;"  src="<?php echo $bibai['main_img']; ?>" />
								<div class="caption" id="cap<?php echo $bibai['good_id']; ?>">
									<p style="color: #BF0A10;font-size: 18px;">￥<?php echo $bibai['good_price']; ?></p>
										<p class="text-muted">
											<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $bibai['material']; ?>
											</div>  
										</p>
											<p class="text-muted" style="color: #BF0A10;font-size: 18px;">
													<?php echo $bibai['good_name']; ?>
											</p>
								</div>
							</a>
						</div>
						<?php
					}
					?>
					</div>
					<?php
				}
				
			}else if($type=='追求'){
				$Seek=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%追求%'  or festival like '%情人节%')");
				$seek_num=mysql_num_rows($Seek);
				if($seek_num<=0){
					?>
					<div class="row">
						<div class="col-md-12">
							<span>暂无追求鲜花推荐，<a class="btn btn-daner btn-lg" href="flower.php">查看更多</a></span>
						</div>
					</div>
					<?php
				}else{
					?>
					<div class="row" style="width: 85%;margin: 0 auto;">
					<?php
					while($Se=mysql_fetch_array($Seek)){
						?>
						<div class="col-md-4" id="see<?php echo $Se['good_id']; ?>" onmousemove="trank(<?php echo $Se['good_id']; ?>)" onmouseout="trank2(<?php echo $Se['good_id']; ?>)" style="margin-top: 30px;background-color: white;">
							<a id="thumba<?php echo $Se['good_id']; ?>" href="see_good.php?good_id=<?php echo $Se['good_id']; ?>" class="thumbnail" style="text-align: center;height: 530px;padding: 0;border: 0;text-decoration: none;width: 90%;">
							<img id="img<?php echo $Se['good_id']; ?>" style="height: 420px;"  src="<?php echo $Se['main_img']; ?>" />
								<div class="caption" id="cap<?php echo $Se['good_id']; ?>">
									<p style="color: #BF0A10;font-size: 18px;">￥<?php echo $Se['good_price']; ?></p>
										<p class="text-muted">
											<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $Se['material']; ?>
											</div>  
										</p>
											<p class="text-muted" style="color: #BF0A10;font-size: 18px;">
													<?php echo $Se['good_name']; ?>
											</p>
								</div>
							</a>
						</div>
						<?php
					}
					?>
					</div>
					<?php
				}
				

				
			}else if($type=='热恋'){
				$rèliàn=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (festival like '%情人节%' or object like '%女朋友%')");
				@$rèliàn_num=mysql_num_rows($rèliàn);
				if($rèliàn_num<=0){
					?>
					<div class="row">
						<div class="col-md-12">
							<span>暂无追求鲜花推荐，<a class="btn btn-daner btn-lg" href="flower.php">查看更多</a></span>
						</div>
					</div>
					<?php
				}else{
					?>
					<div class="row" style="width: 85%;margin: 0 auto;">
					<?php
					while($re=mysql_fetch_array($rèliàn)){
						?>
						<div class="col-md-4" id="see<?php echo $re['good_id']; ?>" onmousemove="trank(<?php echo $re['good_id']; ?>)" onmouseout="trank2(<?php echo $re['good_id']; ?>)" style="margin-top: 30px;background-color: white;">
							<a id="thumba<?php echo $re['good_id']; ?>" href="see_good.php?good_id=<?php echo $re['good_id']; ?>" class="thumbnail" style="text-align: center;height: 530px;padding: 0;border: 0;text-decoration: none;width: 90%;">
							<img id="img<?php echo $re['good_id']; ?>" style="height: 420px;"  src="<?php echo $re['main_img']; ?>" />
								<div class="caption" id="cap<?php echo $re['good_id']; ?>">
									<p style="color: #BF0A10;font-size: 18px;">￥<?php echo $re['good_price']; ?></p>
										<p class="text-muted">
											<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $re['material']; ?>
											</div>  
										</p>
											<p class="text-muted" style="color: #BF0A10;font-size: 18px;">
													<?php echo $re['good_name']; ?>
											</p>
								</div>
							</a>
						</div>
						<?php
					}
					?>
					</div>
					<?php
				}
			}else if($type=='浪漫'){
				$romantic=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%浪漫%' or festival like '%情人节%' or object like '%女朋友%')");
				@$romantic_num=mysql_num_rows($romantic);
				if($romantic_num<=0){
					?>
					<div class="row">
						<div class="col-md-12">
							<span>暂无追求浪漫鲜花推荐，<a class="btn btn-daner btn-lg" href="flower.php">查看更多</a></span>
						</div>
					</div>
					<?php
				}else{
					?>
					<div class="row" style="width: 85%;margin: 0 auto;">
					<?php
					while($ra=mysql_fetch_array($romantic)){
						?>
						<div class="col-md-4" id="see<?php echo $ra['good_id']; ?>" onmousemove="trank(<?php echo $ra['good_id']; ?>)" onmouseout="trank2(<?php echo $ra['good_id']; ?>)" style="margin-top: 30px;background-color: white;">
							<a id="thumba<?php echo $ra['good_id']; ?>" href="see_good.php?good_id=<?php echo $ra['good_id']; ?>" class="thumbnail" style="text-align: center;height: 530px;padding: 0;border: 0;text-decoration: none;width: 90%;">
							<img id="img<?php echo $ra['good_id']; ?>" style="height: 420px;"  src="<?php echo $ra['main_img']; ?>" />
								<div class="caption" id="cap<?php echo $ra['good_id']; ?>">
									<p style="color: #BF0A10;font-size: 18px;">￥<?php echo $ra['good_price']; ?></p>
										<p class="text-muted">
											<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $ra['material']; ?>
											</div>  
										</p>
											<p class="text-muted" style="color: #BF0A10;font-size: 18px;">
													<?php echo $ra['good_name']; ?>
											</p>
								</div>
							</a>
						</div>
						<?php
					}
					?>
					</div>
					<?php
				}
			}
			
			
			?>
		
</div>



<script type="text/javascript" src="../js/index.js"></script>
<script type="text/javascript">
	function trank(i){
		var see=document.getElementById("thumba"+i);
		see.style.border='2px solid  #eee';
		var img=document.getElementById("img"+i);
		see.style.transform='scale(1.08)';
		
	}
	function trank2(i){
		var see=document.getElementById("thumba"+i);
		see.style.border='0px';
		var img=document.getElementById("img"+i);
		see.style.transform='scale(1)';
	}
</script>