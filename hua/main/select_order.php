<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>查找订单</title>
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
		@$keyword=$_GET['keyword'];
		@$sel=$_GET['sel'];
		if(@$sel=='订单编号'){
			@$sql=mysql_query("select * from book where book_id='$keyword' order by book_time desc");
			?>
			<div class="container" style="width: 100%;">
			<?php  include("m_top.php"); ?>
		<?php
		@$sql_num=mysql_num_rows($sql);
		if(@$sql_num<=0){
			?>
			<div class="row">
				<div class="col-md-12" style="text-align: center;font-size: 24px;">
					查无此<?php echo $sel; ?>:<?php echo $keyword; ?>
				</div>
			</div>
			<?php
		}else{
			?>
			<div class="row" style="margin-top: 80px;">
				<div class="col-md-12" style="text-align: center;font-size: 24px;">查找结果:<?php echo $sql_num; ?>条记录</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-hover">
										<thead>
											<?php
											    			if(($sel=='订单状态'&&$keyword=='已评价')||($sel=='订单状态'&&$keyword=='未发货')){
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
										<tbody>
											<?php
												$pagesize=2;
												if(isset($_GET['page'])){
													$page=$_GET['page'];
												}else{
													$page=1;
												}
											    $number=ceil($sql_num/$pagesize);
											    $ps=($page-1)*$pagesize;
											    @$SQL=mysql_query("select * from book where book_id='$keyword' order by book_time desc limit $ps,$pagesize");
												include("select_order2.php");
										}	   
			
		}else if(@$sel=='订单状态'){
			@$sql=mysql_query("select * from book where state='$keyword' order by book_time desc");
			?>
			<div class="container" style="width: 100%;">
			<?php  include("m_top.php"); ?>
		<?php
		@$sql_num=mysql_num_rows($sql);
		if(@$sql_num<=0){
			?>
			<div class="row">
				<div class="col-md-12" style="text-align: center;font-size: 24px;">
					查无此<?php echo $sel; ?>:<?php echo $keyword; ?>
				</div>
			</div>
			<?php
		}else{
			?>
			<div class="row" style="margin-top: 80px;">
				<div class="col-md-12" style="text-align: center;font-size: 24px;">查找结果:<?php echo $sql_num; ?>条记录</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-hover">
										<thead>
											<?php
											    			if(($sel=='订单状态'&&$keyword=='已评价')||($sel=='订单状态'&&$keyword=='未发货')){
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
										<tbody>
											<?php
												$pagesize=30;
												if(isset($_GET['page'])){
													$page=$_GET['page'];
												}else{
													$page=1;
												}
											    $number=ceil($sql_num/$pagesize);
											    $ps=($page-1)*$pagesize;
											    @$SQL=mysql_query("select * from book where state='$keyword' order by book_time desc limit $ps,$pagesize");
												include("select_order2.php");
										}
		}else if(@$sel=='付款方式'){
			@$get=mysql_query("select * from getmoney where get_money like '%$keyword%' or get_type like '%$keyword%'");
			@$get_num=mysql_num_rows($get);
			if(@$get_num<=0){
				@$sql=mysql_query("select * from book where like '%$keyword%'");
				?>
			<div class="container" style="width: 100%;">
			<?php  include("m_top.php"); ?>
		<?php
		@$sql_num=mysql_num_rows($sql);
		if(@$sql_num<=0){
			?>
			<div class="row">
				<div class="col-md-12" style="text-align: center;font-size: 24px;">
					查无此<?php echo $sel; ?>:<?php echo $keyword; ?>
				</div>
			</div>
			<?php
		}else{
			?>
			<div class="row" style="margin-top: 80px;">
				<div class="col-md-12" style="text-align: center;font-size: 24px;">查找结果:<?php echo $sql_num; ?>条记录</div>
			</div>
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
												$pagesize=30;
												if(isset($_GET['page'])){
													$page=$_GET['page'];
												}else{
													$page=1;
												}
											    $number=ceil($sql_num/$pagesize);
											    $ps=($page-1)*$pagesize;
											    @$SQL=mysql_query("select * from book where like '%$keyword%' limit $ps,$pagesize");
												include("select_order2.php");
										}
			}else{
				@$get_id=mysql_fetch_array($get);
				@$g_id=$get_id['money_id'];
				@$sql=mysql_query("select * from book where money_id='$g_id'");
				?>
				<div class="container" style="width: 100%;">
			<?php  include("m_top.php"); ?>
		<?php
		@$sql_num=mysql_num_rows($sql);
		if(@$sql_num<=0){
			?>
			<div class="row">
				<div class="col-md-12" style="text-align: center;font-size: 24px;">
					查无此<?php echo $sel; ?>:<?php echo $keyword; ?>
				</div>
			</div>
			<?php
		}else{
			?>
			<div class="row" style="margin-top: 80px;">
				<div class="col-md-12" style="text-align: center;font-size: 24px;">查找结果:<?php echo $sql_num; ?>条记录</div>
			</div>
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
												$pagesize=2;
												if(isset($_GET['page'])){
													$page=$_GET['page'];
												}else{
													$page=1;
												}
											    $number=ceil($sql_num/$pagesize);
											    $ps=($page-1)*$pagesize;
											    @$SQL=mysql_query("select * from book where money_id='$g_id' order by book_time desc limit $ps,$pagesize");
												include("select_order2.php");
										}
			}
			
			
		}else if($sel=='用户编号'){
			$sql=mysql_query("select * from book where user_id='$keyword' order by book_time desc");
			?>
				<div class="container" style="width: 100%;">
			<?php  include("m_top.php"); ?>
		<?php
		@$sql_num=mysql_num_rows($sql);
		if(@$sql_num<=0){
			?>
			<div class="row">
				<div class="col-md-12" style="text-align: center;font-size: 24px;">
					查无此<?php echo $sel; ?>:<?php echo $keyword; ?>
				</div>
			</div>
			<?php
		}else{
			?>
			<div class="row" style="margin-top: 80px;">
				<div class="col-md-12" style="text-align: center;font-size: 24px;">查找结果:<?php echo $sql_num; ?>条记录</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-hover">
										<thead>
											<?php
											    			if(($sel=='订单状态'&&$keyword=='已评价')||($sel=='订单状态'&&$keyword=='未发货')){
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
										<tbody>
											<?php
												$pagesize=2;
												if(isset($_GET['page'])){
													$page=$_GET['page'];
												}else{
													$page=1;
												}
											    $number=ceil($sql_num/$pagesize);
											    $ps=($page-1)*$pagesize;
											    @$SQL=mysql_query("select * from book where user_id='$keyword' order by book_time desc limit $ps,$pagesize");
												include("select_order2.php");
										}
		}else if($sel=='商品编号'){
			@$sql=mysql_query("select * from order_detail where good_id='$keyword'");
			?>
				<div class="container" style="width: 100%;">
			<?php  include("m_top.php"); ?>
		<?php
		$sql_num=mysql_num_rows($sql);
		if(@$sql_num<=0){
			?>
			<div class="row">
				<div class="col-md-12" style="text-align: center;font-size: 24px;">
					查无此<?php echo $sel; ?>:<?php echo $keyword; ?>
				</div>
			</div>
			<?php
		}else{
			?>
			<div class="row" style="margin-top: 80px;">
				<div class="col-md-12" style="text-align: center;font-size: 24px;">查找结果:<?php echo $sql_num; ?>条记录</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-hover">
										<thead>
											<?php
											    			if(($sel=='订单状态'&&$keyword=='已评价')||($sel=='订单状态'&&$keyword=='未发货')){
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
										<tbody>
											<?php
												$pagesize=20;
												if(isset($_GET['page'])){
													$page=$_GET['page'];
												}else{
													$page=1;
												}
											    $number=ceil($sql_num/$pagesize);
											    $ps=($page-1)*$pagesize;
											    @$SQL=mysql_query("select * from order_detail where good_id='$keyword' limit $ps,$pagesize");
												
												while(@$de=mysql_fetch_array($SQL)){
													
													?>
													<tr>
														<td><?php echo $de['book_id']; ?></td>
														<?php
															@$book_id=$de['book_id'];
															@$user=mysql_query("select * from book where book_id='$book_id'");
															@$book=mysql_fetch_array($user);
															?>
															<td><?php echo $book['user_id']; ?></td>
															<td>￥<?php echo $book['sum_price'] ?></td>
															<td>
											    			<?php
											    				$get_id=$book['get_id'];
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
											    		<td><?php echo $book['state']; ?></td>
											    		<td>
											    			<?php
											    				@$get_money=$book['money_id'];
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
											    		<td><?php echo $book['book_time']; ?></td>
											    		<td><?php echo $book['send_time']; ?></td>
											    		<td>
											    			<a href="admin_see_order.php?book_id=<?php echo $book['book_id']; ?>" class="btn btn-default"  style="text-decoration: none;">查看</a>
											    			<?php
											    				if($book['state']=='未发货'){
											    					?>
											    					<button id="bu_confirm<?php echo $book['book_id']; ?>" onclick="con_send(<?php echo $book['book_id']; ?>)" class="btn btn-default" style="text-decoration: none;">确认发货</button>
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
														<a href="xina_goods_order.php?sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>" class="btn btn-danger">下载<?php echo $sel ?>为<?php echo $keyword; ?>的订单信息</a>
													</td>
												</tr>
												<tr>
												
												<td colspan="10" style="text-align: center;">
									   				<span style="line-height: 80px;font-size: 20px;"><?php echo $page; ?>-<?php echo $number; ?>页/共<?php echo $sql_num; ?>个订单</span>
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
																				<li><a href="select_order.php?page=<?php echo $pr; ?>&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>&tj=tj">&laquo;上一页</a></li>
																				<?php
																			}
																				?>
																				
																				<li><a href="select_order.php?page=1&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>&tj=tj">1</a></li>
																				<li><a href="select_order.php?page=2&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>&tj=tj">2</a></li>
																				<li><a href="select_order.php?page=3&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>&tj=tj">3</a></li>
																				<li><a href="select_order.php?page=4&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>&tj=tj">4</a></li>
																				<li><a href="select_order.php?page=5&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>&tj=tj">5</a></li>
																				<li><a href="select_order.php?page=6&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>&tj=tj">6</a></li>
																				<li class="disabled"><span>.....</span></li>
																				<li><a href="select_order.php?page=<?php echo $number; ?>&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>&tj=tj"><?php echo $number; ?></a></li>
																				<?php
																		if($page>=$number){
																		?>
																		<li class="disabled"><span style="color: darkgray;">下一页&raquo;</span></li>
																		<?php
																		}else{
																			?>
																			<li><a href="select_order.php?page=<?php echo $pn; ?>&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>&tj=tj">下一页&raquo;</a></li>
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
																				<li><a href="select_order.php?page=<?php echo $pr; ?>&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>&tj=tj">&laquo;上一页</a></li>
																				<?php
																			}
																				?>
																				<?php
																					for($i=1;$i<=$number;$i++){
																						?>
																						<li><a href="select_order.php?page=<?php echo $i; ?>&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>&tj=tj"><?php echo $i; ?></a></li>
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
																			<li><a href="select_order.php?page=<?php echo $pn; ?>&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>&tj=tj">下一页&raquo;</a></li>
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
												<?php
													
													
													
													
													
													
										}
		}else{
			echo "<script>alert('系统出错了，请稍后再试');history.go(-1);</script>";
		}
		
		?>
		
		
		
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
				location.reload();
			}else if(response.errno==3){
				alert("发货失败，请联系系统维护员");
			}else{
				alert("操作失败，请联系系统维护员");
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