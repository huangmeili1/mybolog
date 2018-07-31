<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>评价列表</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	body{
		margin-top: 40px;
	}
	#rating li{
		background: url(../img/star.png);
	    list-style: none;
		float: left;
		width: 31px;
		height: 33px;
	}
</style>
<?php
	session_start();
	include_once("../conn/dataconnection.php");
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		?>
<div class="container" style="width: 100%;">
	<?php
		include("m_top.php");
		?>
		<?php
			@$sql=mysql_query("select * from comments order by comment_time desc");
			@$num=mysql_num_rows($sql);
			if($num<=0){
				?>
				<div class="row">
					<div class="col-md-12" style="text-align: center;">暂无用户评价</div>
				</div>
				<?php
			}else{
				?>
				<div class="row">
					<div class="col-md-12" style="background-color:white;height: 100px;width: 100%;">
							<form class="bs-example bs-example-form" role="form" action="admin_select_content.php">
								<div class="input-group input-group-lg" style="margin-top: 40px;width: 700px;margin: 0 auto;margin-top: 40px;">
							        <select class="form-control" name="sel" style="height: 49px;;width: 130px;border: 2px solid #e4313d;background:#e4313d;color: white;">
										<option>评价编号</option>
										<option>用户编号</option>
										<option>订单号</option>
										<option>评价星级</option>
										<option>商品编号</option>
										<option>评价商品名称</option>
									</select>
									<input required="required" style="width: 490px;height: 49px;" name="keyword" type="text" class="form-control">
				           			 <span class="input-group-btn">
				                      <button name="tj" value="tj" class="btn btn-default" type="submit" style="height: 49px;width: 80px;background-color: #e43a3d;border: 1px solid #e43a3d;"><span style="font-size: 21px;color: white;" class="glyphicon glyphicon-search"></span></button>
				                   	</span>
								</div>
							</form>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div style="margin: 0 auto;text-align: center;"><h2>评价列表</h2></div>
							<table class="table table-hover">
								<thead>
									<th>编号</th>
									<th>评价商品</th>
									<th>评价图片</th>
									<th>评价订单号</th>
									<th>评价星级</th>
									<th>评价时间</th>
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
											    $number=ceil($num/$pagesize);
											    $ps=($page-1)*$pagesize;
											    @$SQL=mysql_query("select * from comments order by comment_time desc limit $ps,$pagesize");
											    $i=0;
											    while($con=mysql_fetch_array($SQL)){
											    	$i++;
											    	?>
											    	<tr>
											    		<input class="commet_id" type="hidden" value="<?php echo $con['commet_id']; ?>" />
											    		<td style="line-height: 185px;"><?php echo $i; ?></td>
											    		<td>
											    			<?php
											    				@$good_id=$con['good_id'];
											    				@$g=mysql_query("select * from goods where good_id='$good_id'");
											    				@$g_num=mysql_num_rows($g);
											    				if($g_num<=0){
											    					?>
											    					<span>此商品已经下架了</span>
											    					<?php
											    				}else{
											    					?>
											    					<?php $go_n=mysql_fetch_array($g);
											    						
											    						 ?>
											    						 <div class="thumbnail" style="width: 150px;">
											    						 	<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $go_n['good_id']; ?>">
											    						 	<img src="<?php echo $go_n['main_img']; ?>" />
											    							<div class="caption" style="text-align: center;"><?php echo $go_n['good_name']; ?></div>
											    						 	</a>
											    						 </div>
											    					<?php
											    				}
											    				?>
											    		</td>
											    		<td>
											    			<div class="thumbnail" style="width: 150px;height: 185px;">
											    				<?php
											    					if($con['content_img']==''){
											    						?>
											    						无评价图片
											    						<?php
											    					}else{
											    						?>
											    						<img style="height: 180px;" src="<?php echo $con['content_img']; ?>" />
											    						<?php
											    					}
											    					?>
											    				
											    			</div>
											    		</td>
											    		<td>
											    			<button style="margin-top: 75px;border: 0;color: deepskyblue;" class="btn btn-default" style="text-decoration: none;" onclick="see_order(<?php echo $con['book_id']; ?>)"><?php echo $con['book_id']; ?></button>
											    		</td>
											    		<td>
											    			<?php
											    				$xinxin=$con['xinxin'];
											    				$ar=array("很不好","不好","一般","好","很好");
											    				?>
											    				<ul class="rating" id="rating" style="margin-top: 75px;">
											    					<?php
											    						for($i=0;$i<$xinxin;$i++){
											    							?>
											    							<li style="background-position-y: -38px;" class="rating-item" title="<?php echo $ar[$i]; ?>"></li>
											    							<?php
											    						}
											    						@$l=count($ar);
											    						for($i=$xinxin;$i<$l;$i++){
											    							?>
											    							<li class="rating-item" title="<?php echo $ar[$i]; ?>"></li>
											    							<?php
											    						}
											    						?>
											    				</ul>
											    				<?php
											    				?>
											    		</td>
											    		<td style="line-height: 185px;">
											    			<?php echo $con['comment_time']; ?>
											    		</td>
											    		<td><button onclick="show_contet(<?php echo $con['commet_id']; ?>)" style="margin-top: 75px;" class="btn btn-default">查看更多</button></td>
											    	</tr>
											    	<tr>
											    		<td colspan="7">
											    			<div id="show_content<?php echo $con['commet_id'] ?>" style="width: 100%;min-height: 120px;height: auto;display: none;">
											    				<span><b>评价内容:</b></span>
											    				<div>
											    					<p>
											    						<?php echo $con['content']; ?>
											    					</p>
											    				</div>
											    			</div>
											    		</td>
											    	</tr>
											    	<?php
											    }
										?>
								</tbody>
								<tr>
								<td colspan="8" style="text-align: center;">
									   				<span style="line-height: 80px;font-size: 20px;"><?php echo $page; ?>-<?php echo $number; ?>页/共<?php echo $num; ?>条评价</span>
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
																				<li><a href="Content_List.php?page=<?php echo $pr; ?>">&laquo;上一页</a></li>
																				<?php
																			}
																				?>
																				
																				<li><a href="Content_List.php?page=1">1</a></li>
																				<li><a href="Content_List.php?page=2">2</a></li>
																				<li><a href="Content_List.php?page=3">3</a></li>
																				<li><a href="Content_List.php?page=4">4</a></li>
																				<li><a href="Content_List.php?page=5">5</a></li>
																				<li><a href="Content_List.php?page=6">6</a></li>
																				<li class="disabled"><span>.....</span></li>
																				<li><a href="Content_List.php?page=<?php echo $number; ?>"><?php echo $number; ?></a></li>
																				<?php
																		if($page>=$number){
																		?>
																		<li class="disabled"><span style="color: darkgray;">下一页&raquo;</span></li>
																		<?php
																		}else{
																			?>
																			<li><a href="Content_List.php?page=<?php echo $pn; ?>">下一页&raquo;</a></li>
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
																				<li><a href="Content_List.php?page=<?php echo $pr; ?>">&laquo;上一页</a></li>
																				<?php
																			}
																				?>
																				<?php
																					for($i=1;$i<=$number;$i++){
																						?>
																						<li><a href="Content_List.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
																			<li><a href="Content_List.php?page=<?php echo $pn; ?>">下一页&raquo;</a></li>
																			<?php
																		}
																			?>
																				
																		</ul>
																<?php
															}
															?>
											
										
										
														
													</tr>
							</table>
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
<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>
	<script type="text/javascript">
		function show_contet(con_id){
			var commet_id=document.getElementsByClassName("commet_id");
			var show_content=document.getElementById("show_content"+con_id);
			var id=new Array();
			var a=-1;
			for(var i=0;i<commet_id.length;i++){
				a++;
				id[a]=commet_id[i].value;
			}
			if(show_content.style.display=='none'){
				show_content.style.display='block';
			}else{
				show_content.style.display='none';
			}
//			alert(id);
			for(var i=0;i<id.length;i++){
				if(id[i]==con_id){
					
				}else{
					var com=document.getElementById("show_content"+id[i]);
					com.style.display='none';
				}
			}
			
		}
	</script>
	<script type="text/javascript">
	function colse(){
	var hidden_book=document.getElementById("hidden_book");
	var see_book=document.getElementById("see_book");
	hidden_book.style.display='none';
	see_book.style.display='none';
	window.location.href="Content_List.php";
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