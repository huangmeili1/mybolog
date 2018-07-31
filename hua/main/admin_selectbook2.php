<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>订单查询</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	body{
		margin-top: 70px;
	}
</style>
<?php
	session_start();
	include_once("../conn/dataconnection.php");
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		@$book_time2=$_GET['book_time2'];
		@$book_time1=$_GET['book_time1'];
		
		@$state=$_GET['state'];
		
		?>
		<div class="container" style="width: 100%;">
			<?php include("m_top.php"); ?>
				<h4 style="text-align: center;font-size: 24px;">订单查询</h4>
				<div class="row">
					<div class="col-md-12">
						<?php
							if($state=='全部'){
								@$sql=mysql_query("select * from book where book_time between '$book_time1' and '$book_time2'");
							}else{
								@$sql=mysql_query("select * from book where state='$state' and book_time between '$book_time1' and '$book_time2'");
							}
							@$sql_num=mysql_num_rows($sql);
							if($sql_num<=0){
								?>
								<h4 style="font-size: 18px;text-align: center;"><?php echo $book_time1 ?>~<?php echo $book_time2; ?>的<?php echo $state; ?>暂时没有</h4>
								<?php
							}else{
								?>
								<a href="xin_date_order.php?state=<?php echo $state ?>&book_time1=<?php echo $book_time1 ?>&book_time2=<?php echo $book_time2; ?>" class="btn btn-danger">下载<?php echo $book_time1 ?>~<?php echo $book_time2 ?>所有<?php echo $state ?>的订单(<?php echo $sql_num; ?>)</a>
								<table class="table table-hover">
									<thead>
										<?php
											    			if($state=='未发货'||$state=='已评价'){
											    				?>
																<th>
																	<button onclick="all_select()" class="btn btn-danger">全选</button>
																</th>
											    				<?php
											    			}
											    			?>
										<th>订单编号</th>
											<th>购买用户编号</th>
											<th>订单总金额</th>
											<th>收货人</th>
											<th>订单状态</th>
											<th>付款方式</th>
											<th>下单时间</th>
											<th>发货时间</th>
											<th>操作</th>
									</thead>
									<?php
										while(@$order=mysql_fetch_array($sql)){
											?>
											<tr id="trrr<?php echo $order['book_id']; ?>">
												<?php
											    			if($state=='未发货'||$state=='已评价'){
											    				?>
													    		<td>
													    			<input name="book_select" id="book_<?php echo $order['book_id']; ?>" type="checkbox" value="<?php echo $order['book_id']; ?>" />
													    		</td>
											    				<?php
											    			}
											    			?>
											    		
											    		<td>
											    			<?php echo $order['book_id']; ?>
											    		</td>
											    		<td>
											    			<?php echo $order['user_id']; ?>
											    		</td>
											    		<td>
											    			￥
											    			<?php
											    				echo $order['sum_price'];
											    				?>
											    		</td>
											    		<td>
											    			<?php
											    				$get_id=$order['get_id'];
											    				@$g=mysql_query("select * from getinfo where get_id='$get_id'");
											    				@$get_num=mysql_num_rows($g);
											    				if($get_num<=0){
											    					?>
											    					<span>该收货人已被用户删除</span>
											    					<?php
											    				}else{
											    					@$get_name=mysql_fetch_array($g);
											    					echo $get_name['get_name'];
											    				}
											    				?>
											    		</td>
											    		<td>
											    			<?php echo $order['state']; ?>
											    		</td>
											    		<td>
											    			<?php
											    				@$get_money=$order['money_id'];
											    				@$m=mysql_query("select * from getmoney where money_id='$get_money'");
											    				@$m_e=mysql_num_rows($m);
											    				if($m_e<=0){
											    					?>
											    					<span>该付钱方式已经被取消</span>
											    					<?php
											    				}else{
											    					@$money_name=mysql_fetch_array($m);
											    					echo $money_name['get_money'];
											    				}
											    				?>
											    		</td>
											    		<td>
											    			<?php
											    				echo $order['book_time'];
											    				?>
											    		</td>
											    		<td>
											    			<?php
											    				echo $order['send_time'];
											    				?>
											    		</td>
											    		<td>
											    			<a href="admin_see_order.php?book_id=<?php echo $order['book_id']; ?>" class="btn btn-default"  style="text-decoration: none;">查看</a>
											    			<?php
											    				if($order['state']=='未发货'){
											    					?>
											    					<button id="bu_confirm<?php echo $order['book_id']; ?>" onclick="con_send(<?php echo $order['book_id']; ?>)" class="btn btn-default" style="text-decoration: none;">确认发货</button>
											    					<?php
											    				}
//											    				else if($order['state']=='已评价'){
//											    					?>
							    					<!--<button class="btn btn-default" style="text-decoration: none;">查看评价</button>-->
										    					<?php
//											    				}
											    				?>
											    		</td>
											    	</tr>
											<?php
										}
										?>
										<tr>
											<td colspan="9">
												<?php
													if($state=='未发货'){
														?>
														<button onclick="all_sent()" class="btn btn-danger">
															批量发货
														</button>
														<?php
													}
													?>
													<?php
														if($state=='已评价'){
															?>
															<button onclick="all_sent()" class="btn btn-danger">
															批量删除
														</button>
															<?php
														}
														?>
											</td>
										</tr>
								</table>
								<?php
							}
							?>
					</div>
				</div>
		</div>
		
<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>
<?php

?>
<script type="text/javascript">
function all_del(){
	var book_select=document.getElementsByName("book_select");
	var a=0;
	for(var i=0;i<book_select.length;i++){
		if(book_select[i].checked){
			a++;
		}
	}
	if(a==0){
		alert("你还没有选择要删除的订单");
	}else{
		var books=new Array();
		var b=-1;
		for(var i=0;i<book_select.length;i++){
		if(book_select[i].checked){
			b++;
			books[b]=book_select[i].value;
		}
	}
	var url="all_del_order.php";
	var data={"books":books};
	var success=function(response){
		if(response.errno=='0'){
			alert("删除成功，已经成功删除"+response.a+"条记录");
			location.reload();
		}else{
			alert("删除失败，请稍后再试");
		}
	}
	$.post(url,data,success,"json");
	}
	
}
function all_select(){
	var book_select=document.getElementsByName("book_select");
	var a=0;
	for(var i=0;i<book_select.length;i++){
		if(book_select[i].checked){
			a++;
		}
	}
	if(a==book_select.length){
		for(var i=0;i<book_select.length;i++){
			book_select[i].checked=false;
		}
	}else{
		for(var i=0;i<book_select.length;i++){
			book_select[i].checked=true;
		}
	}
}
	function con_send(book_id){
	var con=confirm('你确定要对订单号为'+book_id+'发货');
	if(con){
		var url="confirm_book.php";
		var data={"book_id":book_id};
		var success=function(response){
			if(response.errno==0){
				alert("请登录");
				window.location.href='login.php';
			}else if(response.errno==1){
				alert("此订单已经发货");
			}else if(response.errno==2){
				alert("订单发货成功");
				var tr=document.getElementById("trrr"+book_id);
				var bu_confirm=document.getElementById("bu_confirm"+book_id);
				bu_confirm.style.display='none';
				tr.style.color='green';
				tr.style.backgroundColor='burlywood';
			}else if(response.errno==3){
				alert("发货失败，请联系系统维护员");
			}else{
				alert("操作失败，请联系系统维护员");
			}
		}
		$.post(url,data,success,"json");
	}
}
function all_sent(){
	var book_select=document.getElementsByName("book_select");
	var a=0;
	for(var i=0;i<book_select.length;i++){
		if(book_select[i].checked){
			a++;
		}
	}
	if(a==0){
		alert("你还没有选择要发货的订单");
	}else{
		var books=new Array();
		var b=-1;
		for(var i=0;i<book_select.length;i++){
		if(book_select[i].checked){
			b++;
			books[b]=book_select[i].value;
		}
	}
	var url="all_sent_order.php";
	var data={"books":books};
	var success=function(response){
		if(response.errno=='0'){
			alert("已经成功发货"+response.a+"条记录");
			location.reload();
		}else{
			alert("发货失败，请稍后再试");
		}
	}
	$.post(url,data,success,"json");
	}
}
</script>