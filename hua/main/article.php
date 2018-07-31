<meta charset="utf-8" />
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<?php

?>
<div class="container" style="width: 100%;">
	<?php include("top.php"); ?>
		<div class="row">
			<div class="col-md-12" style="text-align: center;height: 200px;width: 100%;background: url(../img/login.jpg);background-position-y: 200px;background-position-x: 1200px;">
				<span style="color: white;line-height: 200px;font-size: 30px;">花心思</span>
			</div>
		</div>
		<?php
			@$hua_id=$_GET['hua_id'];
			$sql=mysql_query("select * from know where hua_id='$hua_id'");
			@$num=mysql_num_rows($sql);
			if(@$num<=0){
				
			}else{
				$ssql=mysql_query("update know set see_num=see_num+1 where hua_id='$hua_id'");
				$hua=mysql_fetch_array($sql);
				?>
				<title><?php echo $hua['hua_title']; ?></title>
				<div class="row" style="width: 80%;margin: 0 auto;margin-top: 50px;background-color: white;">
					<div class="col-md-12" style="background-color: white;">
						<h3 style="text-align: center;"><?php echo $hua['hua_title']; ?></h3>
						<?php echo $hua['hua_content']; ?>
					</div>
				</div>
				<?php
					
			}
			?>
			
			<?php include("footer.php"); ?>
</div>