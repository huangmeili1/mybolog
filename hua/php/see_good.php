<meta charset="utf-8" />
<style type="text/css">
body{
		padding: 0;
		margin: 0 auto;
	}
.aaaa15 li{
		list-style: none;
		float: left;
		padding: 0 16px;
		font-size: 20px;
		text-align: center;
	}
	#show:after{
		content:"";
		height: 0;
		line-height: 0;
		display: block;
		visibility: hidden;
		clear: both;
	}
	#menu {
            position: fixed;
            top: 450px;
            left: 47%;
            margin-left: 650px;
            width: 50px;
        }

        #menu ul li a {
            display: block;
            margin: 5px 0;
            font-size: 14px;
            font-weight: bold;
            color: #333;
            width: 80px;
            height: 50px;
            line-height: 50px;
            text-decoration: none;
            text-align: center;
        }

        #menu ul li a:hover,
        #menu ul li a.current {
            color: #fff;
            background: #0088bb;
        }
        body li{
        	list-style: none;
        }
        #a2{
        	margin: 0 auto;
        	text-align: center;
        }
        #hu:after{
        content:"";
		height: 0;
		line-height: 0;
		display: block;
		visibility: hidden;
		clear: both;
        }
</style>
<script type="text/javascript" src="../easyui/jquery.min.js"></script>
<?php
include("top.php");
@$good_id=$_GET['good_id'];
include_once("../conn/dataconnection.php");
$sql=mysql_query("select * from goods where good_id='$good_id'");
@$num=mysql_num_rows($sql);
//echo $num;
if($num<=0){
	echo "对不起，系统出错了,请稍后再操作";
}else{
	$f=mysql_fetch_array($sql);
	?>
	
	<?php
}

?>
<?php 
	include("test4.php");
	?>


<div id="menu">
    <ul>
        <li><a href="#show1" class="current">商品详情</a></li>
        <li><a href="#comment2">用户评价</a></li>
        <li><a href="#friend">购物保障</a></li>
    </ul>
</div>
<div id="new">
<div id="item1" class="aaa11" style="width: 100%;height: 35px;background-color: deeppink;">
			<div class="aaaa15" style="height: auto;margin-left: 350px;color: white;">
				<ul>
				<li><a href="index.php">首页</a></li>
				<li><a href="">鲜花</a></li>
		    	<li><a href="">永生花</a></li>
		    	<li><a href="">商务花篮</a></li>
		    	<li><a href="">绿色植物</a></li>
		    	<li><a href="">蛋糕</a></li>
		    	<li><a href="">礼品</a></li>
		    	<li><a href="">花语大全</a></li>
				</ul>
		</div>
	</div>
	
	
	<div id="show" style="width: 80%;margin: 0 auto;text-align: center;height:auto;border: 1px solid gray;">
		<?php
			$sql=mysql_query("select * from goods where good_id='$good_id'");
			@$num=mysql_num_rows($sql);
			//echo $num;
			if($num<=0){
				echo "对不起，系统出错了,请稍后再操作";
			}else{
				$f=mysql_fetch_array($sql);
				$img=$f['details_img'];
				$image=explode("*",$img);
				$image[3]=$f['main_img'];
//				echo $image;
				?>
				<div id="show1" style="width: 45%;height: auto;float: left;margin: 20px 20px 20px 20px;">
					<div id="img">
						<img width="300" height="355" src="<?php echo $f['main_img'] ?>"><br>
					</div>
					
					<table align="center">
						<tr style="line-height: 10px;">
							<!--<td><div style="border: 1px solid;height:80px;width: 70px;"><img style="width: 70px;height: 80px;" src="<?php echo $f['main_img'] ?>"></div></td>-->
							<?php
								$bb=-1;
								foreach($image as $i){
									$bb=$bb+1;
									?>
									<!--<input type="hidden" name="a" value="<?php echo $i; ?>" />-->
									<td width="70"><div  style="margin-top: 20px;border: 1px solid;height:80px;width: 70px;"><img onmouseover="check(<?php echo $bb; ?>,<?php echo $image ?>,<?php echo $f['good_id'] ?>)" style="width: 70px;height: 80px;" src="<?php echo $i; ?>"></div></td>
									<?php
								}
								?>
						</tr>
					</table>
				</div>
				<div id="show1" style="width: 50%;height: auto;float: right;margin-top: 22px;">
					<h4><?php echo $f['good_name'] ?>----<?php echo $f['material'] ?></h4>
					<hr size="1" color="gray" width="520">
					<div id="tt">
					<table style="font-size: 13px;color: grey;">
						<tr>
							<td width="80">类别：</td>
							<?php 
								$kind_id=$f['kind_id'];
								$s=mysql_query("select * from kind where kind_id='$kind_id'"); 
								$t=mysql_fetch_array($s);
								?>
							<td><?php echo $t['kind_name']; ?></td>
						</tr>
						<tr>
							<td>材料：</td>
							<td><?php echo $f['material'] ?></td>
						</tr>
						<tr>
							<td>包装：</td>
							<td><?php echo $f['packing'] ?></td>
						</tr>
						<tr>
							<td>花语：</td>
							<td><?php echo $f['good_hua'] ?></td>
						</tr>
						<tr>
							<td>适合节日：</td>
							<td><?php echo $f['festival'] ?></td>
						</tr>
						<tr>
							<td>朵数：</td>
							<td><?php echo $f['flower_num'] ?>朵</td>
						</tr>
						<tr>
							<td>库存：</td>
							<td><?php echo $f['good_num'] ?></td>
						</tr>
						<tr>
							<td>销量：</td>
							<td><?php echo $f['sales'] ?></td>
						</tr>
						<tr>
							<td>收藏：</td>
							<?php 
								$n=mysql_query("select * from storegood where good_id='$good_id'");
								@$nn=mysql_num_rows($n);
								?>
							<td><?php echo $nn; ?></td>
						</tr>
						<tr style="color: red;">
							
							<td>原价：</td>
							<td><del><?php echo $f['prime_cost'] ?>元</del></td>
							
						</tr>
						<tr style="color: orangered;font-size: 15px;">
							<td>现价：</td>
							<td><?php echo $f['good_price'] ?>元</td>
						</tr>
						<form name="mrof" method="get" action="buy.php" target="_blank">
						<tr>
							<input type="hidden" name="good_id" value="<?php echo $f['good_id'] ?>" />
							<td>购买数量：</td>
							<td><input type="text" id="number" name="number" value="1" size="4" style="border: 1px solid #CCDD55;"></td>
						</tr>
						<tr>
							<td colspan="2">
							<?php
								if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
									?>
									<a href="collect.php?good_id=<?php echo $f['good_id'] ?>"><img width="90" src="../img/store.png"></a>
									<?php
								}else{
									?>
									<a href="javascript:openLogin();"><img width="90" src="../img/store.png"></a>
									<?php
								}
								?>
							</td>
						</tr>
						<tr>
							<td align="center">
								<td>
									<?php
										if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
											?>
											<input type="submit" name="tj" value="立&nbsp;即&nbsp;购&nbsp;买" style="background-color: red;border: 0px;width: 200px;height: 38px;color: white;font-size: 20px;">
											<?php
										}else{
											?>
											<input type="button" onclick="openL(<?php echo $good_id; ?>)" name="tj" value="立&nbsp;即&nbsp;购&nbsp;买" style="background-color: red;border: 0px;width: 200px;height: 38px;color: white;font-size: 20px;">
											<?php
										}
										?>
									</form>
								</td>
								<?php
									if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
									?>
									<td><a style="color: white;width: 110px;" href="javascript:addCart(<?php echo $f['good_id'] ?>)"><div style="width: 110px;height: 30px;background-color: red;color: white;font-size: 20px;padding-top: 6px;margin-right: 60px;padding-left: 50px;">加入购物车</div></a></td>
									<?php	
									}else{
										?>
										<td><a href="javascript:openLogin();"><div style="width: 110px;height: 30px;background-color: red;color: white;font-size: 20px;padding-top: 6px;margin-right: 60px;padding-left: 50px;">加入购物车</div></a></td>
										<?php
									}
									
									?>
								
							</td>
						</tr>
					</table>
					</div>
				</div>
				
				
			
	</div>
	<div id="hu" style="width: 80%;height: auto;margin: 0 auto;text-align: center;margin-top: 40px;">
		<div id="hu1" style="width: 23%;height: auto;text-align: center;float: left;margin-right: 10px;">
			<div id="se" style="width: 100%;height: 200px;background-color: blueviolet;border: 1px solid gray;">
				<div style="width: 100%;height: 35px;background-color: pink;"><span style="font-size: 20px;text-align: center;color: grey;">浏览记录</span></div>
			</div>
			<div id="sales" style="width: 100%;height: auto;border: 1px solid gray;margin-top: 20px;">
				<?php
					$yu=mysql_query("select * from goods order by sales desc limit 0,6");
					while($hg=mysql_fetch_array($yu)){
						?>
						<div style="margin-top: 20px;">
							<img style="width: 100%;height: 250px;" src="<?php echo $hg['main_img'] ?>" />
							<span style="color: gray;"><?php echo $hg['good_name'] ?></span><br>
							<span style="color: orange;">￥<?php echo $hg['good_price'] ?></span>
						</div>
						<?php
					}
					?>
			</div>
		</div>
		<div id="comment" style="width: 75%;height: auto;margin: 0 auto;text-align: center;float: right;">
					<div id="conmment1" style="width: 100%;height:auto;border: 1px solid;">
						<?php 
							$to=$f['good_img']; 
							$k=explode("*",$to);
							foreach($k as $ll){
								?>
							<div style="margin-top: 20px;">
								<img src="<?php echo $ll ?>">
							</div>
							
							<?php
							}
							?>
					</div>
					
					
					
					<div id="comment2" style="width: 100%;height: 100px;text-align: center;margin: 0 auto;background-color: red;"></div>
	
	
		</div>
	</div>
	
		<?php
			}

			?>
	
</div>

<script type="text/javascript">
function addCart(productid){
var url="addcart.php";
var data={"good_id":productid,"num":parseInt($("#number").val())};
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


function check(i,image,good_id){
 var url='eximg.php';
 var data={"good_id":good_id,'i':i,'image':image};
 var success=function(response){
$("#img").html("<img width='300' height='355' src="+response+">");
}
$.post(url,data,success,"json");
}
</script>

