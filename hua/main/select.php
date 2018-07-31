<meta charset="utf-8" />
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>查阅商品</title>
	<?php include("login_reg.php"); ?>
<style>
body a{
	color: black;
}
a:hover{
	text-decoration: none;
}
a:visited{
	text-decoration: none;
}
a:link{
	text-decoration: none;
}
	.carousel-control.left {  
    
  background-image:none;  
  background-repeat: repeat-x;  
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#80000000', endColorstr='#00000000', GradientType=1);  
}  
.carousel-control.right {  
  left: auto;  
  right: 0;  
   
  background-image:none;  
  background-repeat: repeat-x;  
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1);  
}
</style>
<?php
	include("top.php");
	
	include("../conn/dataconnection.php");
	if(isset($_GET['tj'])){
	$sel=$_GET['sel'];
	$key=$_GET['key'];
		?>
	  <div class="container" style="width: 100%;">
			   
			   <div class="row">
			   	<div class="col-xs-6 col-md-12" style="height: 350px;padding: 0;margin: 0;">
					<div id="myCarousel" class="carousel slide" style="">
					    <!-- 轮播（Carousel）指标 -->
					    <ol class="carousel-indicators">
					        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					        <li data-target="#myCarousel" data-slide-to="1"></li>
					        <li data-target="#myCarousel" data-slide-to="2"></li>
					    </ol>   
					    <!-- 轮播（Carousel）项目 -->
					    <div class="carousel-inner" style="height: 350px;">
					        <div class="item active">
					            <img style="height: 350px;width: 100%;" src="../img/yd1.jpg" alt="First slide">
					        </div>
					        <div class="item">
					            <img style="height: 350px;width: 100%;" src="../img/111.png" alt="Second slide">
					        </div>
					        <div class="item">
					            <img style="height: 350px;width: 100%;" src="../img/222.jpg" alt="Third slide">
					        </div>
					    </div>
					    <!-- 轮播（Carousel）导航 -->
					    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					        <span class="sr-only">Previous</span>
					    </a>
					    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					        <span class="sr-only">Next</span>
					    </a>
					</div> 
			   	</div>
			   </div>
	   
	   <div class="row" style="margin:0 auto;margin-top: 20px;">
	   	<div class="col-xs-6 col-md-2" style="border: 1px solid gainsboro;height:auto;background: white;">
			<?php include("hot_buy.php"); ?>
	   	</div>
	   	<div class="col-xs-6 col-md-10" style="background: white;">
	   		<div class="row">
	   			<div class="col-xs-6 col-md-12" style="width: 100%;margin-left:38px;text-align: center;">
			   		<div style="width: 100%;float: left;height: 40px;">
						<table style="line-height: 20px;font-size: 20px;margin-left: 20px;">
							<tr style="margin-top: 10px;">
								<td width="60"><a href="select.php?sel=<?php echo $sel ?>&tj=tj&key=<?php echo $key ?>" style="color: orangered;"><span id="zz">综合</span></a></td>
								<td width="70"><a style="color: black;" href="javascript:lou('chage.php?type=销量&sel=<?php echo $sel ?>&key=<?php echo $key; ?>&tj=tj','销量')"><span id="z1">销量<span style="font-size: 24px;" class="caret"></span></span></a></td>
								<td width="70"><a style="color: black;" href="javascript:lou('chage.php?type=价格&sel=<?php echo $sel ?>&key=<?php echo $key; ?>&tj=tj','价格')"><span class="dropup" id="z2">价格<span style="font-size: 14px;" class="caret"></span></span></a></td>
								<td width="60"><a style="color: black;" href="javascript:lou('chage.php?type=最新&sel=<?php echo $sel ?>&key=<?php echo $key; ?>&tj=tj','最新')"><span id="z3">最新<span style="font-size: 24px;" class="caret"></span></span></a></td>
							</tr>
						</table>
					</div>
	   			</div>
	   		</div>
	   		
	   		<div id="main1">
	   		<div class="row" style="margin-top: 20px;">
	   			<?php
	   				if(isset($_GET['tj'])){
					include("../conn/dataconnection.php");
					$sel=$_GET['sel'];
					$key=$_GET['key'];
					if($sel=='节日'){
					$sql=mysql_query("select * from goods where festival like '%$key%'");
					@$num=mysql_num_rows($sql);
					$pagesize=16;
					if(isset($_GET['page'])){
						$page=$_GET['page'];
					}else{
						$page=1;
					}
				    $number=ceil($num/$pagesize);
				    $ps=($page-1)*$pagesize;
					if(@$num>0){
					$SQL=mysql_query("select * from goods where festival like '%$key%' limit $ps,$pagesize");
					include("select_1.php");
					}else{
						echo "<script>alert('你要找的节日不存在，请稍后再试');history.go(-1);</script>";
					}
					}else if($sel=='对象'){
					$sql=mysql_query("select * from goods where object like '%$key%'");
					@$num=mysql_num_rows($sql);
					$pagesize=16;
					if(isset($_GET['page'])){
						$page=$_GET['page'];
					}else{
						$page=1;
					}
				    $number=ceil($num/$pagesize);
				    $ps=($page-1)*$pagesize;
					if(@$num>0){
					$SQL=mysql_query("select * from goods where object like '%$key%' limit $ps,$pagesize");
					include("select_1.php");
					}else{
						echo "<script>alert('你要找的对象不存在，请稍后再试');history.go(-1);</script>";
					}
					}else if($sel=='枝数'){
					$sql=mysql_query("select * from goods where flower_num like '%$key%'");
					@$num=mysql_num_rows($sql);
					$pagesize=16;
					if(isset($_GET['page'])){
						$page=$_GET['page'];
					}else{
						$page=1;
					}
				    $number=ceil($num/$pagesize);
				    $ps=($page-1)*$pagesize;
					if(@$num>0){
					$SQL=mysql_query("select * from goods where flower_num like '%$key%' limit $ps,$pagesize");
					include("select_1.php");
					}else{
						echo "<script>alert('你要找的枝数不存在，请稍后再试');history.go(-1);</script>";
					}
					}else if($sel=='花材'){
					$sql=mysql_query("select * from goods where material like '%$key%'");
					@$num=mysql_num_rows($sql);
					$pagesize=16;
					if(isset($_GET['page'])){
						$page=$_GET['page'];
					}else{
						$page=1;
					}
				    $number=ceil($num/$pagesize);
				    $ps=($page-1)*$pagesize;
					if(@$num>0){
					$SQL=mysql_query("select * from goods where material like '%$key%' limit $ps,$pagesize");
					include("select_1.php");
					}else{
						echo "<script>alert('你要找的花材不存在，请稍后再试');history.go(-1);</script>";
					}
					}else if($sel=='用途'){
					$sql=mysql_query("select * from goods where good_use like '%$key%'");
					@$num=mysql_num_rows($sql);
					$pagesize=16;
					if(isset($_GET['page'])){
						$page=$_GET['page'];
					}else{
						$page=1;
					}
				    $number=ceil($num/$pagesize);
				    $ps=($page-1)*$pagesize;
					if(@$num>0){
					$SQL=mysql_query("select * from goods where good_use like '%$key%' limit $ps,$pagesize");
					include("select_1.php");
					}else{
						echo "<script>alert('你要找的用途不存在，请稍后再试');history.go(-1);</script>";
					}
					}else{
						echo "<script>alert('对不起，系统出错了，请稍后再试');history.go(-1);</script>";
					}
	   				}
	   				?>
	   				
	   		</div>
	   		<?php if(@$num>0){ ?>
	   		<div class="row">
	   			<div class="col-xs-6 col-md-12" style="width: 100%;">
	   				<?php
					$pr=$page-1;
					$pn=$page+1;
					?>
				<table style="line-height: 100px;width: 100%;">
					<tr>
						<td align="left">
							1-<?php echo $number; ?>/共<?php echo $num;?>件商品
						</td>
						<?php
							if($number>=9){
								?>
						<td align="right" style="width: 830px;">
							<table border="1">
								<tr>
									<?php
										if($page<=1){
											?>
											<td width="80"><span><上一页</span></td>
											<?php
										}else{
											?>
											<td width="80"><a style="color: dimgrey;" href="select.php?page=<?php echo $pr ?>"><span><上一页</span></a></td>
											<?php
										}
										?>
									<td width="35" align="center" height="40"><a href="select.php?page=1&tj=tj&key=<?php echo $key; ?>&sel=<?php echo $sel; ?>"><span>1</span></a></td>
									<td width="35" align="center" height="40"><a href="select.php?page=2&tj=tj&key=<?php echo $key; ?>&sel=<?php echo $sel; ?>"><span>2</span></a></td>
									<td width="35" align="center" height="40"><a href="select.php?page=3&tj=tj&key=<?php echo $key; ?>&sel=<?php echo $sel; ?>"><span>3</span></a></td>
									<td width="35" align="center" height="40"><a href="select.php?page=4&tj=tj&key=<?php echo $key; ?>&sel=<?php echo $sel; ?>"><span>4</span></a></td>
									<td width="35" align="center" height="40"><a href="select.php?page=5&tj=tj&key=<?php echo $key; ?>&sel=<?php echo $sel; ?>"><span>5</span></a></td>
									<td width="35" align="center" height="40"><a href="select.php?page=6&tj=tj&key=<?php echo $key; ?>&sel=<?php echo $sel; ?>"><span>6</span></a></td>
									<td width="35" align="center" height="40"><span>.....</span></td>
									<td width="35" align="center" height="40"><a href="select.php?page=<?php echo $number ?>&tj=tj&key=<?php echo $key; ?>&sel=<?php echo $sel; ?>"><span><?php echo $number; ?></span></a></td>
										<?php
										if($page>=$number){
										?>
										<td width="80"><span>下一页></span></td>
										<?php	
										}else{
											?>
											<td width="80"><a href="select.php?page=<?php echo $pn ?>&tj=tj&key=<?php echo $key; ?>&sel=<?php echo $sel; ?>"><span>下一页></span></a></td>
											<?php
										}
										?>
								</tr>
							</table>
						</td>
								<?php
							}else{
								?>
						<td align="right" style="width: 830px;">
							<table border="1">
								<tr>
									<?php
										if($page<=1){
											?>
											<td width="80"><span><上一页</span></td>
											<?php
										}else{
											?>
											<td width="80"><a href="select.php?page=<?php echo $pr ?>&tj=tj&key=<?php echo $key; ?>&sel=<?php echo $sel; ?>"><span><上一页</span></a></td>
											<?php
										}
										for($i=1;$i<=$number;$i++){
											?>
											<td width="35" height="40" align="center"><a href="select.php?page=<?php echo $i; ?>&tj=tj&key=<?php echo $key; ?>&sel=<?php echo $sel; ?>"><span><?php echo $i; ?></span></a></td>
											<?php
										}
										if($page>=$number){
										?>
										<td width="80"><span>下一页></span></td>
										<?php	
										}else{
											?>
											<td width="80"><a href="select.php?page=<?php echo $pn; ?>&tj=tj&key=<?php echo $key; ?>&sel=<?php echo $sel; ?>"><span>下一页></span></a></td>
											<?php
										}
										?>
								</tr>
							</table>
						</td>
								<?php
							}
							?>
						
					</tr>
				</table>
	   			</div>
	   		</div>
	   		<?php } ?>
	   			</div>
	   			
	   	</div>
	   </div>
	   <?php include("footer.php"); ?>
	</div>
		<?php
	}
	?>
<script type="text/javascript" src="../js/index.js"></script>
<script type="text/javascript">
	function lou(page,mess){
	var zz=document.getElementById("zz");
	var z1=document.getElementById("z1");
	var z2=document.getElementById("z2");
	var z3=document.getElementById("z3");
	if(mess=='销量'){
		zz.style.color="dimgrey";
		z1.style.color="orangered";
		z2.style.color="dimgrey";
		z3.style.color="dimgrey";
	}else if(mess=='价格'){
		zz.style.color="dimgrey";
		z1.style.color="dimgrey";
		z2.style.color="orangered";
		z3.style.color="dimgrey";
	}else if(mess=='最新'){
		zz.style.color="dimgrey";
		z1.style.color="dimgrey";
		z2.style.color="dimgrey";
		z3.style.color="orangered";
	}
		$("#main1").load(page);
	}
	
function addCart(productid){
var url="addcart.php";
var data={"good_id":productid,"num":1};
var sccess=function(response){
	if(response.errno==2){
	alert('请登录');window.location.href='login.php';
	}else if(response.errno==0){
		alert("加入购物车成功");
	$("#topa").load(location.href + " #topa");
	}else{
		alert("加入购物车失败");
	}
}
$.post(url,data,sccess,"json");
}
</script>