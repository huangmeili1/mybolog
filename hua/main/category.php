<meta charset="utf-8" />
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
include("top.php");
@$type=$_GET['type'];
include("../conn/dataconnection.php");
?>
<div class="container" style="width: 100%;">
	<div class="row">
		<div class="col-xs-6 col-md-12" style="text-align: center;margin: 0 auto;padding: 0;background: url(../img/06.jpg);height: 200px;width: 100%;">
			<?php if($type=='盒'){
				?>
				<h2 style="margin-top: 80px;color: #f13a3a;">礼盒装</h2>
				<?php
			}else{
				?>
				<h2 style="margin-top: 80px;color: #f13a3a;"><?php echo @$type; ?></h2>
				<?php
			} ?>
		</div>
	</div>
	<div class="row" style="width: 80%;margin: 0 auto;margin-top: 50px;">
	<div class="col-xs-6 col-md-12" id="flower" style="background: white;">
			<?php
				include("category1.php");
				?>
	   		</div>
	</div>
	
	
	
</div>

<script type="text/javascript" src="../js/index.js"></script>
<script type="text/javascript">
	function check(i){
		var thumbnail=document.getElementById("thumbnail"+i);
		thumbnail.style.padding='5px';
		thumbnail.style.border='1px solid gainsboro';
		thumbnail.style.width='100%';
	}
	function check1(i){
		var thumbnail=document.getElementById("thumbnail"+i);
		thumbnail.style.padding='0px';
		thumbnail.style.border='0';
		thumbnail.style.width='90%';
	}
	function lop(page){
	   $("#flower").load(page);
	}
</script>