<meta charset="utf-8" />
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>友情鲜花</title>
<style>
	#uul li a:hover{
	background-color: #cc0303;
}
#uul li a:visited{
	background-color: #cc0303;
}
#span1 span a{
	color: #666666;
	font-size: 18px;
}
#span1 span a:visited{
	color: #666666;
	font-size: 18px;
	text-decoration: none;
}
#span1 span a:hover{
	color: #FF9900;
	text-decoration: none;
}
</style>
<div class="container" style="width: 100%;">
<?php
session_start();
include("top.php");
include("../conn/dataconnection.php");
?>
<div class="row" style="width: 90%;margin: 0 auto;margin-top: 10px;">
	<div class="col-xs-6 col-md-12" style="width: 100%;background: white;">
		<ol class="breadcrumb" style="margin: 0 auto;padding: 0;background: white;">
		    <li><a href="index.php">首页</a></li>
		    <li><a href="flower.php">鲜花</a></li>
		    <li class="active">友情鲜花</li>
		</ol>
	</div>
</div>

<div class="row" style="width: 90%;margin: 0 auto;">
	<div class="col-xs-6 col-md-12" style="background: white;">
		<div class="row">
			<div class="col-xs-6 col-md-12" style="background: white;width: 100%;">
				<div class="col-sm-6 col-md-3" style="width: 100%;margin: 0 auto;background: white;">
			        <img style="margin: 0 auto;width: 1282px;height: 400px;" src="https://img02.hua.com/pc/pimg/flower_bannerFriend_171019.jpg" />
			    </div>
			</div>
		</div>
		<div class="row" style="width: 98%;margin: 0 auto;">
			<div class="col-xs-6 col-md-2" style="border: 1px solid gainsboro;margin-top: 10px;">
			<div style="height: 30px;line-height: 35px;text-align: center;">热销鲜花推荐</div>
			<div class="row" style="margin-top:10px;">
				<?php 
					$sql2=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') order by sales desc limit 0,4");
					@$u=mysql_num_rows($sql2);
					if($u<0){
						echo "暂无热销鲜花推荐";
					}else{
						while(@$e=mysql_fetch_array($sql2)){
							?>
							<div class="col-xs-6 col-md-12" style="background: white;">
								<div class="thumbnail" style="text-align: center;height: 320px;border: 0;">
									<a href="see_good.php?good_id=<?php echo $e['good_id']; ?>">
										<img style="height: 200px;" src="<?php  echo $e['main_img']; ?>" />
									</a>
									<div class="caption">
					                <a href="see_good.php?good_id=<?php echo $e['good_id']; ?>">
					                	<p class="text-muted"><?php echo $e['good_name'] ?></p>
					                </a>
					                <span style="color: red;">原价:<del><?php echo $e['prime_cost'] ?>&nbsp;&nbsp;&nbsp;</del></span>
					                <span style="font-size: 16px;color: #F01B2D;">现价:<?php echo $e['good_price'] ?></span>
					                <p>
					                	
					                	<?php
					                		if($e['sum']==0){
					                			?>
					                			<button class="btn btn-danger">库存不足</button>
					                			<?php
					                		}else{
					                			if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
								                ?>
								                <a href="#" onclick="addCart(<?php echo $e['good_id'] ?>)" class="btn btn-default" role="button">
								                     	加入购物车
								                </a> 
								                <?php
								                }else{
								                	?>
								                <a href="#" onclick="checkuser()" class="btn btn-default" role="button">
								                     	加入购物车
								                </a>
								                <?php
								                }
					                		}
								               
								                ?>
					                </p>
					            </div>
					            <hr size="2" color="gainsboro" />
								</div>
							</div>
							<?php
						}
					}
					
					 ?>
			</div>
			</div>
			<div class="col-xs-6 col-md-10" style="background: white;">
		<div class="row">
			<div id="span1" class="col-xs-6 col-md-12" style="width: 98.5%;margin-top: 10px;height: 35px;margin-left: 15px;background: white;">
				<table style="line-height: 40px;font-size: 20px;">
							<tr>
								<td width="70"><a href="friend.php" style="color: orangered;"><span id="zz">综合</span></a></td>
								<td width="70"><a href="javascript:lou('friend_1.php?type=销量','销量')"><span id="z1">销量<span class="caret"></span></span></a></td>
								<td width="70"><a href="javascript:lou('friend_1.php?type=价格','价格')"><span id="z2">价格</span></a></td>
								<td width="70"><a href="javascript:lou('friend_1.php?type=最新','最新')"><span id="z3">最新<span class="caret"></span></span></a></td>
							</tr>
					</table>
				
			</div>
		</div>
		
		<div  class="row" style="margin-top: 25px;">
			<div class="col-xs-6 col-md-12" id="lovemain" style="width: 100%;background: white;">
				<div class="row">
					<?php
						$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%朋友%' or object like '朋友%')");
						@$num=mysql_num_rows($sql);
						if(@$num<=0){
							echo "暂无爱情鲜花，你可以浏览其他种类。";
						}else{
					$pagesize=12;
					if(isset($_GET['page'])){
						$page=$_GET['page'];
					}else{
						$page=1;
					}
				    $number=ceil($num/$pagesize);
				    $ps=($page-1)*$pagesize;
				    $SQL=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%朋友%' or object like '朋友%') limit $ps,$pagesize");
							while($f=mysql_fetch_array($SQL)){
								?>
								<div class="col-xs-6 col-md-3" style="background: white;">
									<div  class="thumbnail" style="padding: 0;">
										<a href="see_good.php?good_id=<?php echo $f['good_id'] ?>"><img style="height: 230px;width: 250px;" src="<?php echo $f['main_img']; ?>" /></a>
											<div class="caption" style="height: 110px;text-align: center;">
								                <h5 style="color:#FF9900 ;"><b>￥<?php echo $f['good_price'] ?></b></h5>
								                <a style="color: dimgray;" href="see_good.php?good_id=<?php echo $f['good_id'] ?>"><p><?php echo $f['good_name'] ?></p></a>
								                <p>
								                	
								                	<?php
								                		if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
								                			?>
								                			<a href="collect.php?good_id=<?php echo $f['good_id']; ?>" class="btn btn-default" role="button">
								                     		  收藏
								                    		</a> 
								                			<?php
								                		}else{
								                			?>
								                			<a href="#" onclick="checkuser()" class="btn btn-default" role="button">
								                     		  收藏
								                    		</a> 
								                			<?php
								                		}
								                		?>
								                    
								                    <?php
								                    	if($f['sum']==0){
					                			?>
					                			<button class="btn btn-danger">库存不足</button>
					                			<?php
					                		}else{
					                			if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
								                			?>
								                			<a href="#" onclick="addCart(<?php echo $f['good_id'] ?>)" class="btn btn-default" role="button">
								                     		加入购物车
								                   			 </a> 
								                			<?php
								                		}else{
								                			?>
								                			<a href="#" onclick="checkuser()" class="btn btn-default" role="button">
								                     		加入购物车
								                    		</a>
								                			<?php
								                		}
					                		}
								                		
								                		?>
								                </p>
								            </div>
									</div>
								</div>
								<?php
							}
						}
						?>
						
						
				</div>
				<?php if(@$num>0){ ?>
	   		<div class="row" style="margin-left: 2px;">
	   			<div class="col-xs-6 col-md-12" style="width: 97.7%;">
	   				<?php
					$pr=$page-1;
					$pn=$page+1;
					?>
				<table style="line-height: 100px;width: 100%;">
					<tr>
						<td align="left">
							<?php echo @$page; ?>-<?php echo $number; ?>/共<?php echo $num;?>件商品
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
											<td width="80"><a style="color: dimgrey;" href="friend.php?page=<?php echo $pr ?>"><span><上一页</span></a></td>
											<?php
										}
										?>
									<td width="35" align="center" height="40"><a href="friend.php?page=1"><span>1</span></a></td>
									<td width="35" align="center" height="40"><a href="friend.php?page=2"><span>2</span></a></td>
									<td width="35" align="center" height="40"><a href="friend.php?page=3"><span>3</span></a></td>
									<td width="35" align="center" height="40"><a href="friend.php?page=4"><span>4</span></a></td>
									<td width="35" align="center" height="40"><a href="friend.php?page=5"><span>5</span></a></td>
									<td width="35" align="center" height="40"><a href="friend.php?page=6"><span>6</span></a></td>
									<td width="35" align="center" height="40"><span>.....</span></td>
									<td width="35" align="center" height="40"><a href="friend.php?page=<?php echo $number ?>"><span><?php echo $number; ?></span></a></td>
										<?php
										if($page>=$number){
										?>
										<td width="80"><span>下一页></span></td>
										<?php	
										}else{
											?>
											<td width="80"><a href="friend.php?page=<?php echo $pn ?>"><span>下一页></span></a></td>
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
											<td width="80"><a href="friend.php?page=<?php echo $pr ?>"><span><上一页</span></a></td>
											<?php
										}
										for($i=1;$i<=$number;$i++){
											?>
											<td width="35" height="40" align="center"><a href="friend.php?page=<?php echo $i; ?>"><span><?php echo $i; ?></span></a></td>
											<?php
										}
										if($page>=$number){
										?>
										<td width="80"><span>下一页></span></td>
										<?php	
										}else{
											?>
											<td width="80"><a href="friend.php?page=<?php echo $pn; ?>"><span>下一页></span></a></td>
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
		</div>
		
		
		
	</div>
</div>
<?php include("footer.php"); ?>
</div>
<script type="text/javascript" src="../js/index.js"></script>
<script type="text/javascript">
	function checkuser(){
		alert("请登录");
		window.location.href='login.php';
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
		$("#lovemain").load(page);
	}
</script>