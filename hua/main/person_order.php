<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>个人中心-我的订单</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	#changeadd{
		position:fixed;
		top: 10%;  
    	bottom:0;
		left: 20%;
		height:100%;  
		margin-top: 100px;
    	overflow:scroll;
	}
</style>
<?php
	session_start();
	if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
		@$user_id=$_SESSION['user_id'];
?>
<div id="container" class="container" style="width: 100%;">
	<?php include("top.php"); ?>
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
					<div class="col-md-9" style="background-color: transparent;">
						<div class="panel panel-default" style="min-height: 830px;">
							<div class="panel-heading">
								我的订单
							</div>
							<div class="panel-body">
								<table class="table table-hover">
									
									<tbody>
										<?php
											$sql=mysql_query("select * from book where user_id='$user_id' order by book_time desc");
											@$num=mysql_num_rows($sql);
											if(@$num<=0){
												?>
												<tr>
													<td colspan="7" style="text-align: center;">你还没有任何订单哦，赶快去购买你所喜欢的商品吧。<a href="index.php" class="btn btn-danger">选购吧</a></td>
												</tr>
												<?php
											}else{
												$pagesize=10;
												if(isset($_GET['page'])){
													$page=$_GET['page'];
												}else{
													$page=1;
												}
											    $number=ceil($num/$pagesize);
											    $ps=($page-1)*$pagesize;
											    $SQL=mysql_query("select * from book where user_id='$user_id' order by book_time desc limit $ps,$pagesize");
												while($book=mysql_fetch_array($SQL)){
													$get_id=$book['get_id'];
													$get=mysql_query("select * from getinfo where get_id='$get_id'");
													@$get_num=mysql_num_rows($get);
													if($get_num<=0){
														echo "<script>alert('对不起，系统出错了，请联系网站管理员');</script>";
													}else{
														$get_name=mysql_fetch_array($get);
														$b_book_id=$book['book_id'];
														$order_detail=mysql_query("select order_detail.good_id,order_detail.name,order_detail.num,order_detail.price,goods.main_img from order_detail,goods where order_detail.good_id=goods.good_id and book_id='$b_book_id'");
														@$nn=mysql_num_rows($order_detail);
														if($nn<=0){
																?>
																<span>对不起，系统出错了，请联系网站管理员</span>
																<?php
																}else{
																	?>
																	<tr>
																		<td colspan="7">
																			<div class="panel panel-default">
																			    <div class="panel-heading">
																			        <b><?php echo $book['book_time']; ?></b>
																			        订单号：<?php echo $book['book_id']; ?>
																			        	此订单优惠:￥<?php echo $book['cheap']; ?>
																			        <p style="float: right;text-align: center;">
																			        	<a style="text-decoration: none;" href="see_order_detail.php?book_id=<?php echo $book['book_id'] ?>">查看详情</a>
																			        	<?php
																			        		if($book['state']=='待评价'){
																			        			?>
																			        			<a style="font-size: 20px;text-decoration: none;margin-right: 20px;margin-bottom: 10px;" href="good_content.php?book_id=<?php echo $book['book_id']; ?>">评价</a>
																			        			<a style="" href="del_order.php?book_id=<?php echo $book['book_id']; ?>"><span style="font-size: 23px;" class="glyphicon glyphicon-trash"></span></a>
																			        			<?php
																			        		}else if($book['state']=='未发货'){
																			        			?>
																			        			<!--<a style="text-decoration: none;">提醒发货</a>-->
																			        			<!--<input type="hidden" id="book<?php echo $book ?>" value="<?php echo $book['book_id']; ?>" />-->
																			        			<a href="#"  onclick="change_add(<?php echo $book['book_id'] ?>,<?php echo $get_id; ?>)" style="text-decoration: none;">修改地址</a>
																			        			<?php
																			        		}else if($book['state']=='待收货'){
																			        			?>
																			        			<a style="text-decoration: none;" onclick="confrim_get_good(<?php echo $book['book_id']; ?>)" class="btn btn-success">确认收货</a>
																			        			<?php
																			        		}else if($book['state']=='待付款'){
																			        			?>
																			        			<a style="text-decoration: none;">去付款</a>
																			        			<?php
																			        				
																			        		}else if($book['state']=='已评价'){
																			        			?>
																			        			<a style="text-decoration: none;" href="see_all_content.php?book_id=<?php echo $book['book_id']; ?>">查看评价</a>
																			        			<a style="" href="del_order.php?book_id=<?php echo $book['book_id']; ?>"><span style="font-size: 23px;" class="glyphicon glyphicon-trash"></span></a>
																			        			<?php
																			        		}
																			        		?>
																			        </p>
																			    </div>
																			    <div class="panel-body">
																			       <table class="table table-hover">
																						<thead>
																							<!--<th>订单编号</th>-->
																							<th>商品名称</th>
																							<th>数量</th>
																							<th>收货人</th>
																							<th>
																								订单状态
																								<!--<select>
																									<option>全部订单</option>
																									<option>待付款</option>
																									<option>待收货</option>
																									<option>待评价</option>
																									<option>退款/售后</option>
																								</select>-->
																							</th>
																							<th>订单金额</th>
																							<th>付款方式</th>
																							<th>操作</th>
																						</thead>
																			       	<?php
																			       		while($b=mysql_fetch_array($order_detail)){
																			       			$good_id=$b['good_id'];
																			       			@$g=mysql_query("select * from goods where good_id='$good_id'");
																			       			@$g_num=mysql_num_rows($g);
																			       			if($g_num<=0){
																			       				?>
																				       			<tr>
																				       				<td colspan="7" align="center">
																				       					对不起，系统出错了
																				       				</td>
																				       			</tr>
																			       				<?php
																			       			}else{
																			       				@$g_good=mysql_fetch_array($g);
																			       				?>
																					       			<tr>
																					       				<td>
																					       					<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $good_id; ?>">
																					       					<div class="thumbnail" style="width: 150px;">
																					       						<img src="<?php echo $g_good['main_img']; ?>" />
																					       						<div class="caption" style="text-align: center;">
																					       							<p><?php echo $g_good['good_name']; ?></p>
																					       						</div>
																					       					</div>
																					       					</a>
																					       				</td>
																					       				<td style="line-height: 220px;">
																					       					<?php echo $b['num']; ?>
																					       				</td>
																					       				
																					       				<td style="line-height: 220px;"><?php echo $get_name['get_name']; ?></td>
																					       				<?php  
																					       					
																					       					?>
																					       				<td style="line-height: 220px;"><?php echo  $book['state']; ?></td>
																					       				<td style="line-height: 220px;">￥<?php echo $book['sum_price']; ?></td>
																					       				<?php
																					       					$get_money=$book['money_id'];
																											$money=mysql_query("select * from getmoney where money_id='$get_money'");
																											@$n=mysql_num_rows($money);
																											if($n<=0){
																												?>
																												<td>
																													对不起，系统出错了
																												</td>
																												<?php
																											}else{
																												$mo=mysql_fetch_array($money);
																												?>
																												<td style="line-height: 220px;"><?php echo $mo['get_money']; ?></td>
																												<?php
																											}
																											
																					       					?>
																					       					<td style="line-height: 220px;">
																					       						<?php
																					       							if($book['state']=='待评价'){
																					       								$c=mysql_query("select * from comments where good_id='$good_id' and book_id='$b_book_id'");
																						     							@$c_num=mysql_num_rows($c);
																						     							@$c_n=mysql_fetch_array($c);
																						     							if($c_num>0){
																						     								?>
																						     								<a style="text-decoration: none;" href="see_content.php?content_id=<?php echo $good_id; ?>&content_id=<?php echo $c_n['commet_id'] ?>">查看评价</a>
																						     								<?php
																						     							}else{
																						     								?>
																						     								<a style="text-decoration: none;" href="add_content.php?good_id=<?php echo $good_id; ?>&book_id=<?php echo $b_book_id; ?>">评价</a>
																						     								<?php
																						     							}
																						     							?>
																					       								<?php
																					       							}else{
																					       								echo "无";
																					       								?>
																					       								
																					       								<?php
																					       									
																					       							}
																					       							?>
																					       					</td>
																					       			</tr>
																			       				<?php
																			       			}
																			       			?>
																			       			<?php
																			       		}
																			       		?>
																			       </table>
																			    </div>
																			</div>
																		</td>
																	</tr>
																	<?php
																}
													}
												}
											}
											?>
											<tr>
												<td colspan="7" style="float: right;">
												 <?php if(@$num>0){ ?>
											   		<div class="row" style="width: 100%;margin: 0 auto;margin-bottom: 50px;margin-top: 30px;background-color: white;">
											   			<div class="col-xs-6 col-md-12" style="width: 100%;">
											   				<span style="line-height: 80px;font-size: 20px;"><?php echo $page; ?>-<?php echo $number; ?>页/共<?php echo $num; ?>件个订单</span>
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
																						<li><a href="javascript:lop('person_order.php?page=<?php echo $pr; ?>')">&laquo;上一页</a></li>
																						<?php
																					}
																						?>
																						
																						<li><a href="javascript:lop('person_order.php?page=1')">1</a></li>
																						<li><a href="javascript:lop('person_order.php?page=2')">2</a></li>
																						<li><a href="javascript:lop('person_order.php?page=3')">3</a></li>
																						<li><a href="javascript:lop('person_order.php?page=4')">4</a></li>
																						<li><a href="javascript:lop('person_order.php?page=5')">5</a></li>
																						<li><a href="javascript:lop('person_order.php?page=6')">6</a></li>
																						<li class="disabled"><span>.....</span></li>
																						<li><a href="javascript:lop('person_order.php?page=<?php echo $number; ?>')"><?php echo $number; ?></a></li>
																						<?php
																				if($page>=$number){
																				?>
																				<li class="disabled"><span style="color: darkgray;">下一页&raquo;</span></li>
																				<?php
																				}else{
																					?>
																					<li><a href="javascript:lop('person_order.php?page=<?php echo $pn; ?>')">下一页&raquo;</a></li>
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
																						<li><a href="javascript:lop('person_order.php?page=<?php echo $pr; ?>')">&laquo;上一页</a></li>
																						<?php
																					}
																						?>
																						<?php
																							for($i=1;$i<=$number;$i++){
																								?>
																								<li><a href="javascript:lop('person_order.php?page=<?php echo $i; ?>')"><?php echo $i; ?></a></li>
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
																					<li><a href="javascript:lop('person_order.php?page=<?php echo $pn; ?>')">下一页&raquo;</a></li>
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
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div id="new_content" class="row" style="display: none;width: 100%;height: 100%;background: rgba(0,0,0,0.2);position: fixed;top: 0;left: 0;padding: 0;margin: 0 auto;z-index: 2;">
			<div class="col-md-12" style="height: 100%;">
				<div id="changeadd" class="row" style="height: 100%;display: none;width: 60%;margin: 0 auto;height: auto;border: 12px solid rgba(0,0,0,0.2);background-clip: padding-box;">
					<div class="col-md-12" style="padding: 0;margin: 0;height: 100%;">
						<div class="panel panel-default" style="padding: 0;margin: 0;border-radius: 0px;min-height: 100%;">
						    <div class="panel-heading">
						       <span><b>修改地址</b></span>
						       <span onclick="colse()" style="float: right;color: red;"><span class="glyphicon glyphicon-remove"></span></span> 
						    </div>
						    <div class="panel-body" id="panel-body">
						       <div style="border: 1px solid gainsboro;width: 700px;margin: 0 auto;line-height: 25px;">
						       	<p style="">
						       		<span style="color: deepskyblue;font-size: 24px;margin-left: 14px;" class="glyphicon glyphicon-exclamation-sign"></span>修改地址会影响物流时效，只能原价修改且付款后只能修改一次，若商品已发货、换仓、库存及配送变更等原因，可能会导致修改地址失败，请您谅解。
						       	</p>
						       </div>
						       <div style="width: 700px;margin: 0 auto;margin-top: 15px;">
						       	<span><b>修改收货地址</b></span>
						       	<?php
						       		@$xh=mysql_query("select * from getinfo where user_id='$user_id'");
						       		@$xh_nu=mysql_num_rows($xh);
						       		if(@$xh_nu<=0){
						       			echo "暂时无法修改收货地址";
						       		}else{
						       			?>
						       			<input hidden="hidden" name="nnnn" id="nnnn" value="<?php echo $xh_nu; ?>" />
						       			<table class="table table-hover">
						       				
						       			
						       			<?php
						       				$b=0;
						       			while($xh_n=mysql_fetch_array($xh)){
						       				$b++;
						       				if($b<=4){
						       					?>
								       				<tr class="tr" height="50" style="letter-spacing: 1px;font-family:'隶书';">
								       					<td onclick="select_ordio(<?php echo $b; ?>)" id="td<?php echo $b; ?>">
								       						<input id="sel<?php echo $b; ?>" onchange="check()" type="radio" class="get_id" name="get_id" value="<?php echo $xh_n['get_id']; ?>" />
								       						<span class="get_idid">
								       							<?php echo $xh_n['get_add']; ?>(<?php echo $xh_n['get_post']; ?>),<?php echo $xh_n['get_name']; ?>,<?php echo $xh_n['get_tel']; ?>
								       						</span>
								       					</td>
								       				</tr>
						       					<?php
						       				}else{
						       					?>
							       				<tr class="tr" id="tr<?php echo $b; ?>" height="50" style="letter-spacing: 1px;font-family:'隶书';display: none;">
							       					<td onclick="select_ordio(<?php echo $b; ?>)" id="td<?php echo $b; ?>">
							       						<input id="sel<?php echo $b; ?>" onchange="check()" type="radio" class="get_id" name="get_id" value="<?php echo $xh_n['get_id']; ?>" />
							       						<span class="get_idid">
							       							<?php echo $xh_n['get_add']; ?>(<?php echo $xh_n['get_post']; ?>),<?php echo $xh_n['get_name']; ?>,<?php echo $xh_n['get_tel']; ?>
							       						</span>
							       					</td>
							       				</tr>
						       					<?php
						       				}
						       				?>
						       				
						       				<?php
						       			}
						       			?>
						       			<?php
						       				if($xh_nu==20){
						       					
						       				}else{
						       				?>
								       			<tr id="add_new" style="display:block;">
								       				<td>
								       					<a onclick="new_address()" style="text-decoration: none;" href="#">添加新地址</a>
								       				</td>
								       			</tr>
						       				<?php	
						       				}
						       				?>
						       			<?php
						       				if($xh_nu>=5){
						       					?>
								       			<tr style="display: block;margin-top: 15px;">
								       				<td><button id="button11" onclick="show_all_add()" class="btn btn-default">显示全部地址</button></td>
								       			</tr>
						       					<?php
						       				}
						       				?>
						       			<?php
						       		}
						       		?>
						       		</table>
						       		<?php
						       		?>
						       </div>
						       
						       <div id="form_div" style="margin-top: 30px;display: none;">
								       	<form id="fr" class="form-horizontal" role="form" name="form1" method="post" action="#" onsubmit="return checkform()"  style="margin: 0 auto;">
											<div class="form-group">
											    <label for="firstname"  class="col-sm-2 control-label">收货人名字</label>
											    <div class="col-sm-10">
											      <input type="text" style="width: 400px;height: 50px;" class="form-control" id="get_name" name="get_name" required="required" value="<?php echo @$_POST['get_name']; ?>" placeholder="请输入收货人名字">
											    </div>
											 </div>
											 <div class="form-group">
											    <label for="firstname" class="col-sm-2 control-label">收货人电话</label>
											    <div class="col-sm-10">
											      <input type="text" style="width: 400px;height: 50px;" class="form-control" id="get_tel" name="get_tel" required="required" value="<?php echo @$_POST['get_tel']; ?>" placeholder="请输入收货人电话">
											    </div>
											 </div>
												 <div class="form-group">
												    <label for="lastname" class="col-sm-2 control-label">收货地址</label>
												    <div class="col-sm-10">
												     <?php include("address.php"); ?>
												    </div>
												  </div>
												  <div class="form-group">
												    <label for="lastname" class="col-sm-2 control-label">请输入收货详细地址</label>
												    <div class="col-sm-10">
														<div class="input-group">
												            <span class="input-group-addon" id="bv"></span>
												            <input onfocus="setStyle()" type="text" style="width: 400px;height: 50px;" required="required" class="form-control" id="get_add" name="get_add" value="<?php echo @$_POST['get_add']; ?>" placeholder="请输入收货人详细地址">
												        </div>
												    </div>
												  </div>
												 <div class="form-group">
												    <label for="lastname" class="col-sm-2 control-label">收货人邮政编码</label>
												    <div class="col-sm-10">
												      <input type="text" style="width: 400px;height: 50px;" required="required" class="form-control" id="get_post" name="get_post" value="<?php echo @$_POST['get_post']; ?>" placeholder="请输入收货人邮政编码">
												    </div>
												  </div>
												  <div class="form-group" style="margin-left: 180px;">
												    <div class="col-sm-10">
												      <input class="btn btn-danger btn-lg" onclick="add_new_address()" type="button" name="tj" value="提交" />
												    </div>
												  </div>
												  
												  
												  
										</form>
						       </div>
						       
						    </div>
						    
							<div class="row" style="width: 80%;margin: 0 auto;">
								<div class="col-md-12">
									<input type="hidden" id="old_get_id" value="" />
									<input id="book_iddd" type="hidden" value="" />
									<button style="float: right;" onclick="colse()" class="btn btn-default">关闭</button>
									<button style="float: right;display: none;" id="conrime" onclick="confirm_change()" class="btn btn-success">确认修改</button>
								</div>
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
	function confrim_get_good(book_id){
		var url="confrim_get_good.php";
		var data={"book_id":book_id};
		var success=function(response){
			if(response.errno==0){
				alert("确认收货成功");
				location.reload();
			}else if(response.errno==1){
				alert("确认收货成功");
				location.reload();
			}else if(response.errno==2){
				alert("确认收货失败，请稍后再试");
				location.reload();
			}else{
				alert("确认收货失败，请稍后再试");
			}
		}
		$.post(url,data,success,"json");
	}
	
	
	function setStyle(){
		var a=form1.province.value;
		var b=form1.city.value;
		var c=form1.area.value;
		var d=a;
		d=d+b;
		d=d+c;
		$("#bv").html(d);
	}
	function lop(page){
		$("#container").load(page);
	}
		function change_add(book_id,get_idd){
			var old_get_id=document.getElementById("old_get_id");
			old_get_id.value=get_idd;
			var book_iid=document.getElementById("book_iddd");
			book_iid.value=book_id;
			var new_content=document.getElementById("new_content");
			new_content.style.display='block';
			var changeadd=document.getElementById("changeadd");
			changeadd.style.display='block';
			var get_id=document.getElementsByClassName("get_id");
			var get_idid=document.getElementsByClassName("get_idid");
			for(var i=0;i<get_id.length;i++){
				if(get_id[i].value==get_idd){
					get_id[i].checked='checked';
					get_idid[i].style.color='red';
				}
			}
		}
		function colse(){
			var new_content=document.getElementById("new_content");
			new_content.style.display='none';
			var changeadd=document.getElementById("changeadd");
			changeadd.style.display='none';
		}
		function show_all_add(){
			var add_new=document.getElementById("add_new");
			var button1=document.getElementById("button11");
			var tr=document.getElementsByClassName("tr");
			var test=document.getElementById("tr5");
			if(test.style.display=='block'){
				for(var i=5;i<=tr.length;i++){
				var t=document.getElementById("tr"+i);
				t.style.display='none';
			}
			add_new.style.display='none';
			button1.innerText='显示全部地址';
			}else{
				for(var i=5;i<=tr.length;i++){
				var t=document.getElementById("tr"+i);
				t.style.display='block';
			}
			add_new.style.display='block';
			button1.innerText='隐藏部分地址';
			}
			
			
		}
		function add_new_address(){
					var get_name=form1.get_name.value;
					var get_add=form1.get_add.value;
					var get_post=form1.get_post.value;
					var tel1=form1.get_tel.value;
				   	var a=form1.province.value;
					var b=form1.city.value;
					var c=form1.area.value;
				   	var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
				   	if(get_name==''){
				   		alert('请正确填写收货人姓名');
				   	}else if(!myreg.test(tel1)){  
				           alert("请正确填写收货人手机号码");  
				          }else if((a=='请选择省份')||(a=='')||(b=='请选择城市')||(b=='')||(c=='请选择地区')||(c=='')){
				          	alert("请正确选择收货人地址");
				          }else if(get_add==''){
				          	alert('请正确填写收货详细地址');
				          }else if(get_post==''){
				          	alert("请正确填写收货人邮编");
				          }else{
							var form=new FormData(document.getElementById("fr"));
							$.ajax({
								type:"post",
								url:"add_address1.php",
								data:form,
								processData:false,
								contentType:false,
								dataType: "json",
								success:function(response){
									if(response.errno==0){
										alert("你已有此收货地址");
									}else if(response.errno==1){
										alert('你的收货地址已经达到20个，不能再添加了');
									}else if(response.errno==2){
										alert('添加成功');
										var tr=document.getElementsByClassName("tr");
//										 $("#new_content").load(location.href + " #new_content");
								  $("#panel-body").load(location.href + " #panel-body");
								 			 for(var i=5;i<=tr.length;i++){
												var t=document.getElementById("tr"+i);
												t.style.display='block';
											}
									}else if(response.errno==3){
										alert('添加失败，请稍后再试')
									}else{
										alert('现在不能添加地址，请稍后再试')
									}
								}
						//		async:true
							});
				          }
		}
		
		function check(){
			var get_id=document.getElementsByClassName("get_id");
			var old_get_id=document.getElementById("old_get_id");
			var old=old_get_id.value;
			for(var i=0;i<get_id.length;i++){
				if(get_id[i].checked){
					var newget_id=get_id[i].value;
				}
			}
			var conrime=document.getElementById("conrime");
			if(old==newget_id){
				conrime.style.display='none';
			}else{
				conrime.style.display='block';
			}
		}
		
		function confirm_change(){
			var get_id=document.getElementsByClassName("get_id");
			for(var i=0;i<get_id.length;i++){
				if(get_id[i].checked){
					var g_id=get_id[i].value;
				}
			}
			var book_id=document.getElementById("book_iddd");
			if(book_id.value!=''){
				var b_id=book_id.value;
				var url="update_order_address.php";
				var data={"book_id":b_id,"get_id":g_id};
				var success=function(response){
					if(response.errno==0){
						alert("修改成功");
						var new_content=document.getElementById("new_content");
						new_content.style.display='none';
						var changeadd=document.getElementById("changeadd");
						changeadd.style.display='none';
						location.reload();
					}else if(response.errno==1){
						alert("对不起，暂时不能地址了");
					}
				}
				$.post(url,data,success,"json");
			}else{
				alert("对不起，暂时不能地址了");
			}
			
		}
		
		
		function select_ordio(b){
			var sel=document.getElementById("sel"+b);
		    sel.checked='checked';
		    var get_id=document.getElementsByClassName("get_id");
			var old_get_id=document.getElementById("old_get_id");
			var old=old_get_id.value;
			for(var i=0;i<get_id.length;i++){
				if(get_id[i].checked){
					var newget_id=get_id[i].value;
				}
			}
			var conrime=document.getElementById("conrime");
			if(old==newget_id){
				conrime.style.display='none';
			}else{
				conrime.style.display='block';
			}
		}
		
		
		function new_address(){
			
			var button1=document.getElementById("button11");
			var form_div=document.getElementById("form_div");
			if(form_div.style.display=='none'){
				var tr=document.getElementsByClassName("tr");
				for(var i=5;i<=tr.length;i++){
					var t=document.getElementById("tr"+i);
					t.style.display='none';
				}
				var nnnn=document.getElementById("nnnn").value;
				if(nnnn>=5){
					button1.innerText='显示全部地址';
				}
				form_div.style.display='block';
			}else{
				form_div.style.display='none';
			}
		}
	</script>
	

<!--20052720181024117-->