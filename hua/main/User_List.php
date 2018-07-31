<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>用户列表</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	body{
		margin-top: 40px;
	}
</style>
<?php
	session_start();
	include_once("../conn/dataconnection.php");
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		?>
<div class="container" style="width: 100%;">
			 <?php  include("m_top.php"); ?>
	<?php
		$user=mysql_query("select * from user");
		@$user_num=mysql_num_rows($user);
		if($user_num<=0){
			?>
			<div class="row">
				<div class="col-md-12" style="text-align: center;font-size: 24px;">
					<span>暂无可查看用户</span>
				</div>
			</div>
			<?php
		}else{
			?>
			<div class="row">
						<div class="col-md-12" style="background-color:white;height: 100px;width: 100%;">
							<form class="bs-example bs-example-form" method="get" role="form" action="select_user.php">
								<div class="input-group input-group-lg" style="margin-top: 40px;width: 700px;margin: 0 auto;margin-top: 40px;">
							        <select class="form-control" name="sel" style="height: 49px;;width: 130px;border: 2px solid #e4313d;background:#e4313d;color: white;">
										<option>用户编号</option>
										<option>用户昵称</option>
										<option>用户真实姓名</option>
										<option>用户手机号码</option>
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
							<div style="margin: 0 auto;text-align: center;height: auto;"><h2>用户列表</h2></div>
							<!--<div>
								排序：
								<select id="sel_order" onchange="sel_order()">
									<option>--请选择排序方式--</option>
									<option>按注册时间降序</option>
									<option>按拥有订单数降序</option>
									<option>按评价次数降序</option>
								</select>
							</div>-->
							<div class="row">
								<div class="col-md-12">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>用户编号</th>
												<th>用户昵称</th>
												<th>用户真实姓名</th>
												<th>性别</th>
												<th>手机号码</th>
												<th>邮箱</th>
												<th>注册时间</th>
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
											    $number=ceil($user_num/$pagesize);
											    $ps=($page-1)*$pagesize;
											    $User=mysql_query("select * from user limit $ps,$pagesize");
											    while($user_n=mysql_fetch_array($User)){
											    	?>
											    	<tr>
											    		<td><?php echo $user_n['user_id']; ?></td>
											    		<td><?php echo $user_n['user_name']; ?></td>
											    		<td><?php echo $user_n['realname']; ?></td>
											    		<td><?php echo $user_n['sex']; ?></td>
											    		<td><?php echo $user_n['user_tel']; ?></td>
											    		<td><?php echo $user_n['email']; ?></td>
											    		<td><?php echo $user_n['user_time']; ?></td>
											    		<td>
											    			<button onclick="see_user(<?php echo $user_n['user_id']; ?>)" class="btn btn-default">查看更多</button>
											    			<button onclick="del_user(<?php echo $user_n['user_id']; ?>)" class="btn btn-default">删除</button>
											    			<a class="btn btn-default" href="amdin_see_user_all.php?user_id=<?php echo $user_n['user_id'] ?>">更多详情查看</a>
											    		</td>
											    	</tr>
											    	<?php
											    }
												?>
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
		<div id="see_book" class="row" style="display: none;width: 90%;margin: 0 auto;height:600px;background-color: white;position: fixed;top: 10%;left:5%;z-index: 3;overflow: scroll;">
				<div class="col-md-12" style="margin: 0 auto;padding: 0;">
					<div class="panel panel-default" style="border-radius: 0;">
					    <div class="panel-heading" style="border-radius: 0;">
					        用户详情<span onclick="colse()" style="display: inherit;float: right;font-size:24px;text-align: center;" class="glyphicon glyphicon-remove"></span>
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
function del_user(user_id){
	var y=confirm('确定要删除该用户，此用户的所有信息都会被清空？是否是删除？');
	if(y){
	var url="del_user.php";
	var data={"user_id":user_id};
	var success=function(response){
		if(response.errno==0){
			alert("该用户还有订单未签收，不能删除");
		}else if(response.errno==2){
			alert("删除成功2");
			location.reload();
		}else{
			alert("删除成功");
			location.reload();
		}
	}
	$.post(url,data,success,"json");
	}
	
}


function sel_order(){
	var sel_order=document.getElementById("sel_order");
	var mess=sel_order.value;
	
}

	function colse(){
	var hidden_book=document.getElementById("hidden_book");
	var see_book=document.getElementById("see_book");
	hidden_book.style.display='none';
	see_book.style.display='none';
	window.location.href="User_List.php";
}

var $val = $('#ajax-test-val'),
	// 获取当前页面的标记
	m = window.location.search.match(/\?user_id=(\d+)/);
//	alert(m);
	// 新进入页面，通过url中的标记初始化数据
	if (m&&m!='') {
//		alert(m[1]);
	increaseVal(m[1]);
	}
	
	function increaseVal(user_id) {
//		alert("你好");
//		alert(user_id);
	var hidden_book=document.getElementById("hidden_book");
	var see_book=document.getElementById("see_book");
	var show_order=document.getElementById("show_order");
	hidden_book.style.display='block';
	see_book.style.display='block';
	$.post('amdin_see_user.php', {
	user_id: user_id
	}, function(newVal) {
	$("#show_order").html(newVal);
	// 存储相关值至对象中
	var state = {
//	user_id:user_id,
	val: newVal,
	title: 'title-' + user_id,
	url: '?user_id=' + user_id
	}
	// 将相关值压入history栈中
	window.history.pushState && window.history.pushState(state, state.title, state.url);
	});
	}
function see_user(user_id){
	increaseVal(user_id);
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