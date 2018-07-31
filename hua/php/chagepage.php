<meta charset="utf-8" />
<?php
$type=$_GET['type'];
include_once("../conn/dataconnection.php");
$rt=mysql_query("select * from goods");
@$num=mysql_num_rows($rt);
$pagesize=12;
if(isset($_GET['page'])){
$page=$_GET['page'];
}else{
$page=1;
}
$number=ceil($num/$pagesize);
$ps=($page-1)*$pagesize;
if($type=='销量'){
$SQL=mysql_query("select * from goods order by sales desc limit $ps,$pagesize");	
}else if($type=='价格'){
$SQL=mysql_query("select * from goods order by good_price desc limit $ps,$pagesize");
}else if($type=='最新'){
$SQL=mysql_query("select * from goods order by good_time desc limit $ps,$pagesize");
}
?>

<?php
	if($num<=0){
	echo "暂无鲜花信息";
	}else{
		?>
		<div id="main" style="width: 100%;height: auto;"> 
		<div id="box">
			<ul>
				<?php
			while($fo=mysql_fetch_array($SQL)){
				?>
				<li>
							<div id="pn">
							<div class="con" style="margin-top: 20px;">
							<a href="see_good.php?good_id=<?php echo $fo['good_id'] ?>" class="a-img ">
							<img style="width: 228px;height: 280px;" src="<?php echo $fo['main_img'] ?>" />
							</a>
							<p align="center">
							<span><h3 style="color: orange;text-align: center;">￥<?php echo $fo['good_price'] ?></h3></span>
							</p> 
							</div>
							<div class="bottom" style="overflow:hidden;">
							<a href="see_good.php?good_id=<?php echo $fo['good_id'] ?>"><?php echo $fo['good_name'] ?></a>
							</div>
							<div style="margin-top: 10px;">
							<div style="border: 1px solid gray;width: 80px;height: 20px;text-align: center;float: left;margin-left: 40px;">收藏</div>
							<a href="javascript:addCart(<?php echo $fo['good_id'] ?>,1)"><div style="border: 1px solid gray;width: 85px;float: right;height: 20px;margin-right: 10px;">加入购物车</div></a>
							</div>
							</div>
						</li>
				<?php
			}
			?>
			</ul>
			</div>
			</div>
			<div id="yes" style="width: 100%;height: 100px;color: gray;">
			<hr size="1" color="black" />
			<div>
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
											<td width="80"><a style="color: dimgrey;" href="javascript:lou('chagepage.php?type=<?php echo $type; ?>&page=<?php echo $pr; ?>')"><span><上一页</span></a></td>
											<?php
										}
										?>
									<td width="35" align="center" height="40"><a href="javascript:lou('chagepage.php?type=<?php echo $type; ?>&page=1')"><span>1</span></a></td>
									<td width="35" align="center" height="40"><a href="javascript:lou('chagepage.php?type=<?php echo $type; ?>&page=2')"><span>2</span></a></td>
									<td width="35" align="center" height="40"><a href="javascript:lou('chagepage.php?type=<?php echo $type; ?>&page=3')"><span>3</span></a></td>
									<td width="35" align="center" height="40"><a href="javascript:lou('chagepage.php?type=<?php echo $type; ?>&page=4')"><span>4</span></a></td>
									<td width="35" align="center" height="40"><a href="javascript:lou('chagepage.php?type=<?php echo $type; ?>&page=5')"><span>5</span></a></td>
									<td width="35" align="center" height="40"><a href="javascript:lou('chagepage.php?type=<?php echo $type; ?>&page=6')"><span>6</span></a></td>
									<td width="35" align="center" height="40"><span>.....</span></td>
									<td width="35" align="center" height="40"><a href="javascript:lou('chagepage.php?type=<?php echo $type; ?>&page=<?php echo $page=$number; ?>')"><span><?php echo $number; ?></span></a></td>
										<?php
										if($page>=$number){
										?>
										<td width="80"><span>下一页></span></td>
										<?php	
										}else{
											?>
											<td width="80"><a href="javascript:lou('chagepage.php?type=<?php echo $type; ?>&page=<?php echo $pn; ?>')"><span>下一页></span></a></td>
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
											<td width="80"><a href="javascript:lou('chagepage.php?type=<?php echo $type; ?>&page=<?php echo $pr; ?>')"><span><上一页</span></a></td>
											<?php
										}
										for($i=1;$i<=$number;$i++){
											?>
											<td width="35" height="40" align="center"><a href="javascript:lou('chagepage.php?type=<?php echo $type; ?>&page=<?php echo $i; ?>')"><span><?php echo $i; ?></span></a></td>
											<?php
										}
										if($page>=$number){
										?>
										<td width="80"><span>下一页></span></td>
										<?php	
										}else{
											?>
											<td width="80"><a href="javascript:lou('chagepage.php?type=<?php echo $type; ?>&page=<?php echo $pn; ?>')"><span>下一页></span></a></td>
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
			<span style=""><hr size="1" color="black" /></span>
		</div>
			
	<?php } ?>