<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>熊抱鲜花</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php

?>
<div id="up" style="position: fixed;height: 160px;width: 110px;left: 94%;z-index: 8;top: 30%;display: none;">
	<a onclick="go_to_up()" onmouseover="cha()" onmouseleave="cha2()" id="folwer_top" style="width: 100%;height: 100%;">
		<div id="flower_top2" style="height: 110px;width: 80px;background:url(../img/rocket_button_up.png);margin: 0 auto;margin-right: 30px;background-position-x: -30px;background-position-y: -10px;">
			
		</div>
	</a>
</div>
<div class="container" style="width: 100%;">
	<?php include("top.php"); ?>
   		<div class="row">
			<div class="col-md-12" style="text-align: center;padding: 0;margin: 0;height: 180px;width: 100%;background: url(../img/green_top.png);background-size: cover;background-position-x: -230px;background-repeat: no-repeat;">
				<span style="line-height: 180px;color: white;font-size: 30px;">熊抱鲜花，让她满怀开心</span>
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
						<div class="col-md-4" style="margin-top: 30px;">
							<div onmouseleave="change_type2(<?php echo $f['good_id']; ?>)" onmouseover="change_type(<?php echo $f['good_id']; ?>)" id="show_flower<?php echo $f['good_id']; ?>" class="thumbnail">
								<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $f['good_id']; ?>">
								<img style="height: 350px;width: 100%;" src="<?php echo $f['main_img']; ?>" />
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
</div>
<script type="text/javascript" src="../js/index.js"></script>
<script>
	function change_type2(good_id){
		var show_flower=document.getElementById("show_flower"+good_id);
		show_flower.style.boxShadow='none';
	}
		function change_type(good_id){
		var show_flower=document.getElementById("show_flower"+good_id);
		show_flower.style.boxShadow='5px 5px 8px 10px #888888';
	}
</script>
	