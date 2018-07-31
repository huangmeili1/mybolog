<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>个人中心-我的收藏</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
	session_start();
	if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
		@$user_id=$_SESSION['user_id'];
?>
<div id="contarier" class="container" style="width: 100%;">
	<?php 
		include("top.php");
		 ?>
		<div class="row" style="width: 90%;margin: 0 auto;">
			<div class="col-md-12" style="padding: 0;margin: 0;background-color: white;">
				<ol class="breadcrumb" style="background-color: white;">
				    <li><a href="index.php">首页</a></li>
				    <li><a href="personcenter.php">个人中心</a></li>
				    <li class="active">我的订单</li>
				</ol>
			</div>
		</div>
		<div class="row" style="width: 90%;margin: 0 auto;margin-bottom: 100px;">
			<div class="col-md-12" style="background-color: white;">
				<div class="row">
					<div class="col-md-3" style="background-color: transparent;">
						<?php include("personleft.php"); ?>
					</div>
					<div class="col-md-9">
						<div class="panel panel-default">
						    <div class="panel-heading">
						        我的收藏
						    </div>
						    <div id="div" class="panel-body">
						    	<?php
						       			@$store=mysql_query("select * from storegood where user_id='$user_id'");
						       			@$num=mysql_num_rows($store);
						       			if($num<=0){
						       				?>
						       				<span style="margin-left: 260px;">你还没有收藏商品，快去<a class="btn btn-danger btn-lg" href="index.php">收藏你所喜欢的商品吧</a></span>
						       				<?php
						       			}else{
						       				?>
									       <table class="table table-hover">
									       	<thead>
									       		<tr>
									       			<th width="30"><button onclick="allSelect()" class="btn btn-danger">全选</button></th>
									       			<th>商品名称</th>
									       			<th>商品价格</th>
									       			<th>收藏时间</th>
									       			<th>操作</th>
									       		</tr>
									       	</thead>
									       	<tbody>
									       		<?php
									       		$pagesize=20;
												if(isset($_GET['page'])){
													$page=$_GET['page'];
												}else{
													$page=1;
												}
											    $number=ceil($num/$pagesize);
											    $ps=($page-1)*$pagesize;
											    @$SQL=mysql_query("select * from storegood where user_id='$user_id' limit $ps,$pagesize");
									       		while(@$fo=mysql_fetch_array($SQL)){
									       				$good_id=$fo['good_id'];
									       				$good=mysql_query("select * from goods where good_id='$good_id'");
									       				@$god=mysql_fetch_array($good);
									       				?>
									       				<tr>
									       					<td width="30">
															  <div class="checkbox">
															    <label>
															      <input name="items" value="<?php echo $good_id; ?>" type="checkbox">
															    </label>
															  </div>
									       					</td>
									       					<td width="220">
									       						<div class="thumbnail" style="width: 150px;text-align: center;">
									       							<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $god['good_id']; ?>">
									       							<img src="<?php echo $god['main_img']; ?>" />
									       							<?php echo $god['good_name']; ?>
									       							</a>
									       						</div>
									       					</td>
									       					<td style="line-height: 150px;">￥<?php echo $god['good_price']; ?></td>
									       					<td style="line-height: 150px;"><?php echo $fo['store_time']; ?></td>
									       					<td style="line-height: 150px;">
									       						<?php
									       							if($god['good_num']==0){
									       								?>
									       								<a class="btn btn-danger">库存不足</a>
									       								<?php
									       							}else{
									       								?>
									       								<a class="btn btn-danger" onclick="addCart(<?php echo $good_id ?>,1)">移入购物车</a>
									       								<?php
									       							}
									       							?>
									       						<a class="btn btn-default" onclick="del_collect(<?php echo $good_id ?>)">删除</a>
									       					</td>
									       				</tr>
									       				<?php
									       			}
									       			?>
									       			<td colspan="5" align="center">
									       				<a class="btn btn-danger btn-lg" onclick="all_collect(<?php echo $good_id ?>)">批量删除</a>
									       			</td>
									       	</tbody>
									       	<tr>
												<td colspan="7">
												 <?php if(@$num>0){ ?>
											   		<div class="row" style="width: 100%;margin: 0 auto;margin-bottom: 50px;margin-top: 30px;background-color: white;">
											   			<div class="col-xs-6 col-md-12" style="width: 100%;">
											   				<span style="line-height: 80px;font-size: 20px;"><?php echo $page; ?>-<?php echo $number; ?>页/共<?php echo $num; ?>个商品</span>
											   				<?php
															$pr=$page-1;
															$pn=$page+1;
															?>
																<?php
																	if($number>=9){
																		?>
																		<ul class="pagination pagination-lg" style="float: right;">
																						<?php
																				if($page<=1){
																					?>
																					<li class="disabled"><span style="color: darkgray;">&laquo;上一页</span></li>
																					<?php 
																					}else{
																						?>
																						<li><a href="javascript:lop('person_collect.php?page=<?php echo $pr; ?>')">&laquo;上一页</a></li>
																						<?php
																					}
																						?>
																						
																						<li><a href="javascript:lop('person_collect.php?page=1')">1</a></li>
																						<li><a href="javascript:lop('person_collect.php?page=2')">2</a></li>
																						<li><a href="javascript:lop('person_collect.php?page=3')">3</a></li>
																						<li><a href="javascript:lop('person_collect.php?page=4')">4</a></li>
																						<li><a href="javascript:lop('person_collect.php?page=5')">5</a></li>
																						<li><a href="javascript:lop('person_collect.php?page=6')">6</a></li>
																						<li class="disabled"><span>.....</span></li>
																						<li><a href="javascript:lop('person_collect.php?page=<?php echo $number; ?>')"><?php echo $number; ?></a></li>
																						<?php
																				if($page>=$number){
																				?>
																				<li class="disabled"><span style="color: darkgray;">下一页&raquo;</span></li>
																				<?php
																				}else{
																					?>
																					<li><a href="javascript:lop('person_collect.php?page=<?php echo $pn; ?>')">下一页&raquo;</a></li>
																					<?php
																				}
																					?>
																						
																				</ul>
																		<?php
																	}else{
																		?>
																		<ul class="pagination pagination-lg" style="float: right;">
																						<?php
																				if($page<=1){
																					?>
																					<li class="disabled"><span style="color: darkgray;">&laquo;上一页</span></li>
																					<?php 
																					}else{
																						?>
																						<li><a href="javascript:lop('person_collect.php?page=<?php echo $pr; ?>')">&laquo;上一页</a></li>
																						<?php
																					}
																						?>
																						<?php
																							for($i=1;$i<=$number;$i++){
																								?>
																								<li><a href="javascript:lop('person_collect.php?page=<?php echo $i; ?>')"><?php echo $i; ?></a></li>
																								<?php
																							}
																							?>
																						<?php
																				if($page>=$number){
																				?>
																				<li class="disabled"><span style="color: darkgray;">下一页&raquo;</span></li>
																				<?php
																				}else{
																					?>
																					<li><a href="javascript:lop('person_collect.php?page=<?php echo $pn; ?>')">下一页&raquo;</a></li>
																					<?php
																				}
																					?>
																						
																				</ul>
																		<?php
																	}
																	?>
													
																</div>
												
												
																
															</tr>
														</table>
											   			</div>
											   		<?php } ?>
												</td>
											</tr>
									      </table>
						       				<?php
						       			}
						       			?>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='login.php';</script>";}  ?>
	
<script type="text/javascript">
	function addCart(good_id,num){
		var url="addcart.php";
		var data={"good_id":good_id,"num":num};
		var success=function(response){
			if(response.errno==0){
				alert("加入购物车成功");
				del_collect(good_id);
				$("#topa").load(location.href + " #topa");			
			}else if(response.errno=-1){
				alert("加入购物车失败，请稍后再试");
			}else if(response.errno=2){
                window.location.href="login.php";
			}else{
				alert("你的购物车中已经存在此商品");
			}
		}
		$.post(url,data,success,"json");
	}
	function del_collect(good_id){
		var url="delcollect.php";
		var data={"good_id":good_id};
		var success=function(response){
			if(response.errno==0){
				alert("删除收藏成功");
				location.reload();
			}else if(response.errno==1){
				alert("删除失败，请稍后再试");
			}else{
				window.location.href='login.php';
			}
		}
		$.post(url,data,success,"json");
	}
	function allSelect(){
		var items=document.getElementsByName("items");
		var check=0;
		for(var i=0;i<items.length;i++){
			if(items[i].checked){
				check++;
			}
		}
		if(check==items.length){
			for(var i=0;i<items.length;i++){
				items[i].checked=false;
			}
		}else{
			for(var i=0;i<items.length;i++){
				items[i].checked='checked';
			}
		}
//		alert(items.length);
	}
	function all_collect(){
		var items=document.getElementsByName("items");
		var check=0;
		for(var i=0;i<items.length;i++){
			if(items[i].checked){
				check++;
			}
		}
		if(check==0){
			alert("请选择你要删除的商品");
		}else{
			var goods=new Array();
			var j=-1;
			for(var i=0;i<items.length;i++){
				if(items[i].checked){
					j++;
					goods[j]=items[i].value;
				}
			}
		   var url="all_del_collect.php";
		   var data={"goods":goods};
		   var success=function(reponse){
		   	if(reponse.errno==1){
		   		alert("删除成功");
		   		location.reload();
		   	}else if(reponse.errno==0){
		   		alert("删除失败，请稍后再试");
		   	}else{
		   		window.location.href='login.php';
		   	}
		   }
		   $.post(url,data,success,"json");
		}
	}
	function lop(page){
		$("#contarier").load(page);
	}
</script>
