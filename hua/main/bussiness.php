<meta  charset="utf-8" />
<title>开业花篮</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
		[class *= col-]{
  background-color: #eee;
}
body a:link{
	text-decoration: none;
	
}
</style>
<?php

?>
<div class="container" style="width: 100%;">
	<?php include("top.php"); ?>
		<div class="row">
			<div class="col-xs-6 col-md-12" style="opacity: 0.8;text-align: center;margin: 0 auto;padding: 0;background: url(../img/06.jpg);height: 200px;width: 100%;">
					<h2 style="margin-top: 80px;color: #f13a3a;">开业花篮</h2>
			</div>
		</div>
		<div class="row" id="main" style="width: 80%;margin: 0 auto;margin-top: 20px;margin-bottom: 100px;">
			<?php include("bussines.php"); ?>
		</div>
		
		
		
		
		<?php include("footer.php"); ?>
</div>
<script type="text/javascript" src="../js/index.js"></script>
<script type="text/javascript">
	function check(i){
		var thumbanil=document.getElementById("thumbnail"+i);
		thumbanil.style.border="1px solid  gainsboro";
		thumbanil.style.padding="5px";
	}
	function check1(i){
		var thumbanil=document.getElementById("thumbnail"+i);
		thumbanil.style.border="0px";
		thumbanil.style.padding="0px";
	}
	
	function lop(page){
	   $("#main").load(page);
	}
</script>