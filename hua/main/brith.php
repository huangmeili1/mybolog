<meta charset="utf-8" />
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>生日鲜花</title>
<style>
#uul li a:hover{
	background-color: #cc0303;
}
#uul li a:visited{
	background-color: #f3eee4;
}
#container{
	background-color: #f5f0e4;
}

</style>
<?php
	include("top.php");
	?>
<div class="container" id="container" style="width: 100%;">
<?php

include("../conn/dataconnection.php");
?>
	<div class="row">
		<div class="col-xs-6 col-md-12" style="width: 100%;padding: 0;border: 0;margin: 0;background-color: #f5f0e4;">
			<div class="thumbnail" style="padding: 0;border: 0;">
				<img style="padding: 0;" src="../img/Birth.png" />
			</div>
			
		</div>
	</div>
	<div class="row" style="width: 100%;margin: 0 auto;padding: 0;">
		<div class="col-xs-6 col-md-12" style="width: 100%;margin: 0;padding: 0;background-color: #f5f0e4;">
			<div class="row">
				<div class="col-xs-6 col-md-12" style="background-color: #f5f0e4;">
					<div style="width: 100%;text-align: center;">
						<HR style="border:2px double #c11229" width="30%" color="#987cb9" SIZE="2">
						<span style="color: #c11229;font-size: 28px;"><b>给爱的TA挑选生日礼物 </b></span>
						<HR style="border:2px double #c11229" width="30%" color="#987cb9" SIZE="2">
							<span class="text-muted" style="font-size: 18px;width: 50px;">我们每个人，都是某人一生的至爱谢谢你出现在我的生命里</span>
					</div>
				</div>
			</div>
			<div class="row" style="margin: 0 auto;margin-top: 60px;">
				<div class="col-xs-6 col-md-12" style="width: 90%;margin-left: 5%;text-align: center;background-color: #f5f0e4;">
					<div class="row" style="width: 100%;margin: 0 auto;background: transparent;">
						<div class="col-xs-6 col-md-12" style="width: 100%;background: transparent;margin: 0 auto;">
							<?php
								$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%老婆%' or good_use like'%女朋友%' or good_use like '%情侣%' or festival='生日' or object like '%老婆%' or object like '%女朋友%') order by sales desc limit 0,6");
								@$num=mysql_num_rows($sql);
								if(@$num<=0){
									?>
									<span style="color: #c11229;font-size: 18px;">暂无鲜花推荐查看更多</span><a class="btn btn-danger btn-lg" href="Love.php">爱情鲜花</a>
									<?php
								}else{
									?>
									<div class="row">
										<?php
											$i=0;
											while($fo=mysql_fetch_array($sql)){
												$i++;
										?>
										<div class="col-xs-6 col-md-4" style="background-color: #f5f0e4;" id="bbb<?php echo $i; ?>" onmouseover="check(<?php echo $i ?>)" onmouseout="check1(<?php echo $i ?>)">
											<div class="thumbnail" id="thumbnail<?php echo $i ?>" style="height: 530px;background-color: #f5f0e4;border: 0;">
												<img style="height: 400px;width: 100%;" src="<?php echo $fo['main_img'] ?>" />
												<div class="caption" style="" id="brith<?php echo $i; ?>">
													<p class="text-muted"><?php echo $fo['good_name'] ?></p>
													<p>
														<?php echo $fo['material'] ?>
													</p>
													<p style="font-size: 24px;">￥<?php echo $fo['good_price'] ?></p>
												</div>
												<div class="caption" style="display: none;background-color:#f3ddb3;height: 120px;" id="b<?php echo $i; ?>">
													<a style="height: 50px;line-height: 30px;width: 200px;background: #c11229;margin-top: 30px;" class="btn btn-danger btn-lg" href="see_good.php?good_id=<?php echo $fo['good_id']; ?>"><span>立即购买</span></a>
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
					<div class="rows" style="margin-top: 40px;">
						<div class="col-xs-6 col-md-12" style="margin-bottom: 100px;background-color: transparent;">
							<span>
								<a class="btn btn-danger" style="height: 45px;line-height: 30px;font-size: 22px;" href="Love.php">更多爱情鲜花></a>
								<a class="btn btn-danger" style="height: 45px;line-height: 30px;font-size: 22px;margin-left: 50px;" href="gift.php">更多生日礼物></a>
							</span>
						</div>
					</div>
					
					<div class="row">
						<div class="col-xs-6 col-md-12" style="width: 100%;margin: 0 auto;background-color: transparent;">
								<div style="width: 100%;text-align: center;">
									<HR style="border:2px double #c11229" width="30%" color="#987cb9" SIZE="2">
									<span style="color: #c11229;font-size: 28px;"><b>给父母挑选生日礼物 </b></span>
									<HR style="border:2px double #c11229" width="30%" color="#987cb9" SIZE="2">
										<span class="text-muted" style="font-size: 18px;width: 50px;">情到深处人词穷，父母的爱不华丽却珍贵我们相信，有人惦记，被人牵挂,是这个世界上最美好的存在。</span>
								</div>
						</div>
					</div>
					<div class="row" style="margin-top: 50px;">
						<div class="col-xs-6 col-md-12" style="width: 100%;margin: 0 auto;background-color: transparent;">
							<div class="row">
								<?php
									$sqll=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%长辈%' or good_use like'%父母%' or festival='父亲节' or festival='母亲节' or object like '%父母%' or object like '%长辈%') order by sales desc limit 0,6");
									@$n=mysql_num_rows($sqll);
									if(@$n<=0){
										?>
										<span style="color: #c11229;font-size: 18px;">暂无鲜花推荐查看更多</span><a class="btn btn-danger btn-lg" href="Love.php">问候长辈鲜花</a>
										<?php
									}else{
										?>
										<?php
											while($foo=mysql_fetch_array($sqll)){
												$i++;
										?>
										<div class="col-xs-6 col-md-4" style="background-color: #f5f0e4;" id="bbb<?php echo $i; ?>" onmouseover="check(<?php echo $i ?>)" onmouseout="check1(<?php echo $i ?>)">
											<div class="thumbnail" id="thumbnail<?php echo $i ?>" style="height: 530px;background-color: #f5f0e4;border: 0;">
												<img style="height: 400px;width: 100%;" src="<?php echo $foo['main_img'] ?>" />
												<div class="caption" style="" id="brith<?php echo $i; ?>">
													<p class="text-muted"><?php echo $foo['good_name'] ?></p>
													<p>
														<?php echo $foo['material'] ?>
													</p>
													<p style="font-size: 24px;">￥<?php echo $foo['good_price'] ?></p>
												</div>
												<div class="caption" style="display: none;background-color:#f3ddb3;height: 120px;" id="b<?php echo $i; ?>">
													<a style="height: 50px;line-height: 30px;width: 200px;background: #c11229;margin-top: 30px;" class="btn btn-danger btn-lg" href="see_good.php?good_id=<?php echo $foo['good_id']; ?>"><span>立即购买</span></a>
												</div>
											</div>
										</div>
										<?php
									} 
									}
											?>
									
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-xs-6 col-md-12" style="margin-top: 40px;background-color: transparent;">
							<div class="col-xs-6 col-md-12" style="margin-bottom: 100px;background-color: transparent;">
								<span>
									<a class="btn btn-danger" style="height: 45px;line-height: 30px;font-size: 22px;" href="elder.php">更多问候鲜花></a>
									<a class="btn btn-danger" style="height: 45px;line-height: 30px;font-size: 22px;margin-left: 50px;" href="gift.php">更多生日礼物></a>
								</span>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-xs-6 col-md-12" style="width: 100%;margin: 0 auto;background-color: transparent;">
								<div style="width: 100%;text-align: center;">
									<HR style="border:2px double #c11229" width="30%" color="#987cb9" SIZE="2">
									<span style="color: #c11229;font-size: 28px;"><b>给朋友挑选生日礼物 </b></span>
									<HR style="border:2px double #c11229" width="30%" color="#987cb9" SIZE="2">
										<span class="text-muted" style="font-size: 18px;width: 50px;">
											<p>真正的朋友就算是许久未见，再次遇见一如既往与你相遇，很幸运！</p>
											<p>在这个特别的日子里，给Ta道一声：生日快乐</p>
										</span>
								</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-xs-6 col-md-12" style="background-color: transparent;">
							<div class="row">
								<?php  
									$sq=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%朋友%' or object like '%朋友%') order by sales desc limit 0,6");
									@$nn=mysql_num_rows($sq);
									if(@$nn<=0){
										?>
										<span style="color: #c11229;font-size: 18px;">暂无鲜花推荐查看更多</span><a class="btn btn-danger btn-lg" href="Love.php">友情鲜花</a>
										<?php
									}else{
										?>
										<?php
											while($ff=mysql_fetch_array($sq)){
												$i++;
										?>
										<div class="col-xs-6 col-md-4" style="background-color: #f5f0e4;" id="bbb<?php echo $i; ?>" onmouseover="check(<?php echo $i ?>)" onmouseout="check1(<?php echo $i ?>)">
											<div class="thumbnail" id="thumbnail<?php echo $i ?>" style="height: 530px;background-color: #f5f0e4;border: 0;">
												<img style="height: 400px;width: 100%;" src="<?php echo $ff['main_img'] ?>" />
												<div class="caption" style="" id="brith<?php echo $i; ?>">
													<p class="text-muted"><?php echo $ff['good_name'] ?></p>
													<p>
														<?php echo $ff['material'] ?>
													</p>
													<p style="font-size: 24px;">￥<?php echo $ff['good_price'] ?></p>
												</div>
												<div class="caption" style="display: none;background-color:#f3ddb3;height: 120px;" id="b<?php echo $i; ?>">
													<a style="height: 50px;line-height: 30px;width: 200px;background: #c11229;margin-top: 30px;" class="btn btn-danger btn-lg" href="see_good.php?good_id=<?php echo $ff['good_id']; ?>"><span>立即购买</span></a>
												</div>
											</div>
										</div>
										<?php
									} 
									}
											?>
									
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-md-12" style="margin-top: 40px;background-color: transparent;">
							<div class="col-xs-6 col-md-12" style="margin-bottom: 100px;background-color: transparent;">
								<span>
									<a class="btn btn-danger" style="height: 45px;line-height: 30px;font-size: 22px;" href="friend.php">更多友情鲜花></a>
									<a class="btn btn-danger" style="height: 45px;line-height: 30px;font-size: 22px;margin-left: 50px;" href="gift.php">更多生日礼物></a>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			
			
			
		</div>
	</div>
	
	<?php include("footer.php"); ?>
	
</div>

<script type="text/javascript" src="../js/index.js"></script>
<script type="text/javascript">
	function check(i){
		var brith1=document.getElementById("brith"+i);
		brith1.style.display='none';
		var bb=document.getElementById("b"+i);
		bb.style.display='block';
		var thumbnail=document.getElementById("thumbnail"+i);
		thumbnail.style.border='1px solid  gainsboro';
	}
	function check1(i){
		var brith1=document.getElementById("brith"+i);
		brith1.style.display='block';
		var bb=document.getElementById("b"+i);
		bb.style.display='none';
		var thumbnail=document.getElementById("thumbnail"+i);
		thumbnail.style.border='0';
	}
</script>