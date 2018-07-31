<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>订单列表</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	body{
		margin-top: 70px;
	}
</style>
<style>
</style>
<div class="container" style="width: 100%;">
<?php
	session_start();
	include_once("../conn/dataconnection.php");
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		?>
	   <?php  include("m_top.php"); ?>
	<?php
		$sql=mysql_query("select * from book order by book_time desc");
		@$num=mysql_num_rows($sql);
		if($num<=0){
			?>
			<div class="row">
				<div class="col-md-12" style="text-align: center;font-size: 24px;">
					<span>暂无可查看订单</span>
				</div>
			</div>
			<?php
		}else{
			?>
			<div class="row">
						<div class="col-md-12" style="background-color:white;height: 100px;width: 100%;">
							<form method="get" action="select_order.php" class="bs-example bs-example-form" role="form">
								<div class="input-group input-group-lg" style="margin-top: 40px;width: 700px;margin: 0 auto;margin-top: 40px;">
							        <select class="form-control" name="sel" style="height: 49px;;width: 130px;border: 2px solid #e4313d;background:#e4313d;color: white;">
										<option>订单编号</option>
										<option>订单状态</option>
										<option>付款方式</option>
										<option>用户编号</option>
										<option>商品编号</option>
									</select>
									<input style="width: 490px;height: 49px;" required="required" name="keyword" type="text" class="form-control">
				           			 <span class="input-group-btn">
				                      <button name="tj" value="tj" class="btn btn-default" type="submit" style="height: 49px;width: 80px;background-color: #e43a3d;border: 1px solid #e43a3d;"><span style="font-size: 21px;color: white;" class="glyphicon glyphicon-search"></span></button>
				                   	</span>
								</div>
							</form>
						</div>
					</div>
					<div class="row" id="start">
						<div class="col-md-12">
							<div style="margin: 0 auto;text-align: center;height: auto;"><h2>订单列表</h2></div>
							<div class="row">
								<div class="col-md-12">
									<table class="table table-hover">
										<thead>
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
										<tbody>
											<?php
												$pagesize=40;
												if(isset($_GET['page'])){
													$page=$_GET['page'];
												}else{
													$page=1;
												}
											    $number=ceil($num/$pagesize);
											    $ps=($page-1)*$pagesize;
											    @$SQL=mysql_query("select * from book order by book_time desc limit $ps,$pagesize");
											    while($order=mysql_fetch_array($SQL)){
											    	?>
											    	<tr id="trrr<?php echo $order['book_id']; ?>">
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
											    			<button class="btn btn-default" onclick="see_order(<?php echo $order['book_id']; ?>)" style="text-decoration: none;">查看</button>
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
								<td colspan="9" style="text-align: center;">
									   				<span style="line-height: 80px;font-size: 20px;"><?php echo $page; ?>-<?php echo $number; ?>页/共<?php echo $num; ?>个订单</span>
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
																				<li><a href="Order_List.php?page=<?php echo $pr; ?>">&laquo;上一页</a></li>
																				<?php
																			}
																				?>
																				
																				<li><a href="Order_List.php?page=1">1</a></li>
																				<li><a href="Order_List.php?page=2">2</a></li>
																				<li><a href="Order_List.php?page=3">3</a></li>
																				<li><a href="Order_List.php?page=4">4</a></li>
																				<li><a href="Order_List.php?page=5">5</a></li>
																				<li><a href="Order_List.php?page=6">6</a></li>
																				<li class="disabled"><span>.....</span></li>
																				<li><a href="Order_List.php?page=<?php echo $number; ?>"><?php echo $number; ?></a></li>
																				<?php
																		if($page>=$number){
																		?>
																		<li class="disabled"><span style="color: darkgray;">下一页&raquo;</span></li>
																		<?php
																		}else{
																			?>
																			<li><a href="Order_List.php?page=<?php echo $pn; ?>">下一页&raquo;</a></li>
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
																				<li><a href="Order_List.php?page=<?php echo $pr; ?>">&laquo;上一页</a></li>
																				<?php
																			}
																				?>
																				<?php
																					for($i=1;$i<=$number;$i++){
																						?>
																						<li><a href="Order_List.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
																			<li><a href="Order_List.php?page=<?php echo $pn; ?>">下一页&raquo;</a></li>
																			<?php
																		}
																			?>
																				
																		</ul>
																<?php
															}
															?>
											
										
										
														
													</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
			<?php
		}
		?>
		
		<div class="row" id="hidden_book" onclick="colse()" style="display: none;">
			<div class="col-md-12" style="width: 100%;height: 100%;background: rgba(0,0,0,0.5);position: fixed;left: 0;top: 0;z-index: 2;">
				
			</div>
		</div>
		<div id="see_book" class="row" style="display: none;width: 70%;margin: 0 auto;height:600px;background-color: white;position: fixed;top: 10%;left:15%;z-index: 3;overflow: scroll;">
				<div class="col-md-12" style="margin: 0 auto;padding: 0;">
					<div class="panel panel-default" style="border-radius: 0;">
					    <div class="panel-heading" style="border-radius: 0;">
					        订单详情<span onclick="colse()" style="display: inherit;float: right;font-size:24px;text-align: center;" class="glyphicon glyphicon-remove"></span>
					    </div>
					    <div class="panel-body" id="show_order">
					    </div>
					    <button onclick="colse()" style="float: right;margin-top: 30px;margin-bottom: 20px;margin-right: 50px;" class="btn btn-default">关闭</button>
					</div>	
				</div>
		</div>
		
	</div>
	</div>
	<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>
	
<script type="text/javascript">
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


function colse(){
	var hidden_book=document.getElementById("hidden_book");
	var see_book=document.getElementById("see_book");
	hidden_book.style.display='none';
	see_book.style.display='none';
	window.location.href="Order_List.php";
}
	
	var $val = $('#ajax-test-val'),
	// 获取当前页面的标记
	m = window.location.search.match(/\?book_id=(\d+)/);
//	alert(m);
	// 新进入页面，通过url中的标记初始化数据
	if (m&&m!='') {
//		alert(m[1]);
	increaseVal(m[1]);
	}
	
	function increaseVal(book_id) {
//		alert("你好");
//		alert(book_id);
	var hidden_book=document.getElementById("hidden_book");
	var see_book=document.getElementById("see_book");
	var show_order=document.getElementById("show_order");
	hidden_book.style.display='block';
	see_book.style.display='block';
	$.post('amdin_see_order.php', {
	book_id: book_id
	}, function(newVal) {
	$("#show_order").html(newVal);
	// 存储相关值至对象中
	var state = {
//	book_id:book_id,
	val: newVal,
	title: 'title-' + book_id,
	url: '?book_id=' + book_id
	}
	// 将相关值压入history栈中
	window.history.pushState && window.history.pushState(state, state.title, state.url);
	});
	}
	
function see_order(book_id){
	increaseVal(book_id);
}
	// 浏览器的前进后退，触发popstate事件
window.onpopstate = function(){
var state = window.history.state;
console.log(state)
// 直接将值取出，或再次发个ajax请求
var hidden_book=document.getElementById("hidden_book");
var see_book=document.getElementById("see_book");
var show_order=document.getElementById("show_order");
hidden_book.style.display='block';
see_book.style.display='block';
//alert(state);
if(state==null){
	location.reload();
}
$("#show_order").html(state.val);
window.history.replaceState && window.history.replaceState(state, state.title, state.url);
};
</script>
