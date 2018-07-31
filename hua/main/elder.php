<meta charset="utf-8" />
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
</style>
<?php
include("top.php");
include("../conn/dataconnection.php");
?>
<div class="container" id="container" style="width: 100%;">
	<div class="row" style="width: 90%;margin: 0 auto;">
		<div class="col-xs-6 col-md-12" style="margin: 0;padding: 0;width: 100%;">
			<div class="thumbnail" style="padding: 0;margin: 0;overflow: hidden;border: 0;">
				<img style="width: 100%;height: 400px;" src="../img/older.jpg" />
			</div>
		</div>
	</div>
	<div class="row" style="width: 90%;margin: 0 auto;margin-top: 20px;">
		<div class="col-xs-6 col-md-12" style="width: 100%;margin: 0 auto;height: 40px;">
			<table style="line-height: 40px;font-size: 20px;">
					<tr>
						<td width="60"><a href="elder.php" style="color: orangered;"><span id="zz">综合</span></a></td>
						<td width="60"><a href="javascript:lou('elder2.php?type=销量','销量')"><span id="z1">销量</span></a></td>
						<td width="60"><a href="javascript:lou('elder2.php?type=价格','价格')"><span id="z2">价格</span></a></td>
						<td width="60"><a href="javascript:lou('elder2.php?type=最新','最新')"><span id="z3">最新</span></a></td>
					</tr>
			</table>
		</div>
	</div>
	
	<div class="row" id="main" style="width: 90%;margin: 0 auto;margin-top: 20px;">
		<div class="col-xs-6 col-md-12" style="width: 100%;margin: 0 auto;height: 40px;background: white;">
			<div class="row" id="elder">
				<?php
					$sqll=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%长辈%' or good_use like'%父母%' or festival='父亲节' or festival='母亲节' or object like '%父母%' or object like '%长辈%')");
					@$num=mysql_num_rows($sqll);
					if(@$num<=0){
						?>
						<div class="col-xs-6 col-md-12" style="text-align: center;">
							<span style="text-align: center;line-height: 80px;">暂无长辈鲜花推荐，<a class="btn btn-danger" href="flower.php">更多鲜花查看</a></span>
						</div>
						
						<?php
					}else{
						$i=0;
						$pagesize=20;
						if(isset($_GET['page'])){
							$page=$_GET['page'];
						}else{
							$page=1;
						}
					    $number=ceil($num/$pagesize);
					    $ps=($page-1)*$pagesize;
					    $SQL=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%长辈%' or good_use like'%父母%' or festival='父亲节' or festival='母亲节' or object like '%父母%' or object like '%长辈%') limit $ps,$pagesize");
						while($ff=mysql_fetch_array($SQL)){
							$i++;
							?>
								<div class="col-xs-6 col-md-3" style="background: white;" id="bbb<?php echo $i; ?>" onmouseover="check(<?php echo $i ?>)" onmouseout="check1(<?php echo $i ?>)">
									<a href="see_good.php?good_id=<?php echo $ff['good_id']; ?>">
									<div class="thumbnail" id="thumbnail<?php echo $i ?>" style="height: 420px;text-align: center;">
										<img style="height: 300px;width: 100%;" src="<?php echo $ff['main_img'] ?>" />
										<div class="caption" id="brith<?php echo $i; ?>">
											<p class="text-muted"><?php echo $ff['good_name'] ?></p>
											<p>
												<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $ff['material']; ?>
												</div>  
											</p>
											<p style="font-size: 24px;">￥<?php echo $ff['good_price'] ?></p>
											
										</div>
										<div class="caption" style="display: none;background-color:#f3ddb3;height: 110px;" id="b<?php echo $i; ?>">
											<a style="height: 50px;line-height: 30px;width: 200px;background: #c11229;margin-top: 30px;" class="btn btn-danger btn-lg" href="see_good.php?good_id=<?php echo $ff['good_id']; ?>"><span>立即购买</span></a>
										</div>
									</div>
									</a>
								</div>
							
							<?php
						}
					}
					?>
			</div>
			<?php if(@$num>0){ ?>
	   		<div class="row" style="">
	   			<div class="col-xs-6 col-md-12" style="width: 100%;">
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
											<td width="80"><a style="color: dimgrey;" href="javascript:lop('elder1.php?page=<?php echo $pr; ?>)"><span>上一页</span></a></td>
											<?php
										}
										?>
									<td width="35" align="center" height="40"><a href="javascript:lop('elder1.php?page=1')"><span>1</span></a></td>
									<td width="35" align="center" height="40"><a href="javascript:lop('elder1.php?page=2')"><span>2</span></a></td>
									<td width="35" align="center" height="40"><a href="javascript:lop('elder1.php?page=3')"><span>3</span></a></td>
									<td width="35" align="center" height="40"><a href="javascript:lop('elder1.php?page=4')"><span>4</span></a></td>
									<td width="35" align="center" height="40"><a href="javascript:lop('elder1.php?page=5')"><span>5</span></a></td>
									<td width="35" align="center" height="40"><a href="javascript:lop('elder1.php?page=6')"><span>6</span></a></td>
									<td width="35" align="center" height="40"><span>.....</span></td>
									<td width="35" align="center" height="40"><a href="javascript:lop('elder1.php?page=<?php echo $number; ?>')"><span><?php echo $number; ?></span></a></td>
										<?php
										if($page>=$number){
										?>
										<td width="80"><span>下一页></span></td>
										<?php	
										}else{
											?>
											<td width="80"><a href="javascript:lop('elder1.php?page=<?php echo $pn; ?>')"><span>下一页></span></a></td>
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
											<td width="80"><a href="javascript:lop('elder1.php?page=<?php echo $pr ?>')"><span>上一页</span></a></td>
											<?php
										}
										for($i=1;$i<=$number;$i++){
											?>
											<td width="35" height="40" align="center"><a href="javascript:lop('elder1.php?page=<?php echo $i; ?>')"><span><?php echo $i; ?></span></a></td>
											<?php
										}
										if($page>=$number){
										?>
										<td width="80"><span>下一页></span></td>
										<?php	
										}else{
											?>
											<td width="80"><a href="javascript:lop('elder1.php?page=<?php echo $pn; ?>')"><span>下一页></span></a></td>
											<?php
										}
										?>
								</tr>
							</table>
						</td>
								<?php
							}
							?>
			
		</div>
		
		
						
					</tr>
				</table>
	   			</div>
	   		</div>
	   		<?php } ?>
		<div class="row" style="width: 90%;margin: 0 auto;margin-top: 100px;border: 0;height: 20px;background: white;">
			<div class="col-xs-6 col-md-12" style="border: 0;margin: 0 auto;text-align: center;background: white;"><span>Copyright&copy;2017-2018黄梅丽All rights reserved</span></div>
		</div>
	</div>
	
	
	
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
		$("#main").load(page);
	}
	
	function lop(page){
	   $("#main").load(page);
	}
</script>