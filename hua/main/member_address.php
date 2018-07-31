<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>个人中心-新增收货人</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
</style>
<?php
	session_start();
	if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
?>
<div class="container" style="width: 100%;">
	<?php  include("top.php"); ?>
		<div class="row" style="width: 90%;margin: 0 auto;">
			<div class="col-md-12" style="padding: 0;margin: 0;background-color: white;">
				<ol class="breadcrumb" style="background-color: white;">
				    <li><a href="index.php">首页</a></li>
				    <li><a href="flower.php">鲜花</a></li>
				    <li class="active">个人中心</li>
				</ol>
			</div>
		</div>
		<div class="row" style="width: 90%;margin: 0 auto;margin-bottom: 100px;">
			<div class="col-md-12" style="background-color: white;">
				<div class="row">
					<div class="col-md-3" style="height: auto;border: 1px;background: white;margin-bottom: 100px;">
						<?php include("personleft.php"); ?>
					</div>
					<div class="col-md-9">
						<div class="panel panel-default">
							<div class="panel-heading">
								<?php
									$user_id=$_SESSION['user_id'];
									@$sql=mysql_query("select * from getinfo where user_id='$user_id'");
									@$num=mysql_num_rows($sql);
									?>
								<h4>我的收货地址管理<small>您已经创建<span style="color: red;"><?php echo $num; ?></span>个收货地址，最多可创建<span style="color: red;">20</span>个</small></h4>
							</div>
							<div class="panel-body">
								<table class="table table-hover">
									<thead>
										<th>编号</th>
										<th>收货人姓名</th>
										<th>收货人电话</th>
										<th>收货地址</th>
										<th>邮政编码</th>
										<th>操作</th>
									</thead>
									<tbody>
										<?php
											$i=0;
											while($get=mysql_fetch_array($sql)){
												$i++;
												?>
												<tr style="text-align: center;">
													<td><?php echo $i; ?></td>
													<td class="t" style="text-align: center;">
														<?php  echo $get['get_name']; ?>
														<input style="display: none;"  type="text" value="<?php echo $get['get_name'] ?>" id="type_name<?php echo $get['get_id']; ?>" />
													</td>
													<td class="t" style="text-align: center;">
														<?php echo $get['get_tel']; ?>
													</td>
													<td class="t" align="center">
													<?php echo $get['get_add']; ?>
													</td>
													<td><?php echo $get['get_post']; ?></td>
													<td><a style="text-decoration: none;color:blue;" onclick="update_address(<?php echo $get['get_id']; ?>)" href="#">修改</a>&nbsp;&nbsp;&nbsp;
														<a style="text-decoration: none;color:blue;" onclick="return confirm('确认要删除收货人为<?php echo $get['get_name'] ?>的记录吗?,与此有关的所有订单信息也将会被删除')" href="del_address.php?get_id=<?php echo $get['get_id']; ?>">删除</a></td>
												</tr>
												<?php
											}
											?>
									</tbody>
								</table>
								
								<?php
									if($num>=20){
										
									}else{
										?>
										<button onclick="showform()" style="margin-left: 400px;margin-bottom: 20px;" class="btn btn-danger" style="margin-left: 30px;margin-top: 40px;">新增收货地址</button>
										<div id="form" style="margin: 0 auto;width: 80%;display: none;">
										<form class="form-horizontal" role="form" name="form1" method="post" action="add_address.php" onsubmit="return checkform()"  style="margin: 0 auto;">
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
												      <input class="btn btn-danger btn-lg"  type="submit" name="tj" value="提交" />
												    </div>
												  </div>
												  
												  
												  
										</form>
										</div>
										<?php
									}
									?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div id="bod" class="row" style="display: none;">
			<div class="col-md-12" style="width: 100%;height: 100%;background: rgba(0,0,0,0.5);position: fixed;top:0;left: 0;z-index: 2;"></div>
		</div>
		
			<div id="upd" class="row" style="width: 90%;margin: 0 auto;padding: 0;display: none;">
					<div class="col-md-12" style="background-color: white;width: 65%;height: auto;position: fixed;top: 15%;left: 28%;margin: 0 auto;z-index: 3;padding: 0;">
						<div class="panel panel-default" style="padding: 0;margin: 0;border-radius: 0px;min-height: 400px;">
						    <div class="panel-heading">
						        <b>修改地址</b>
						        <span style="float: right;" onclick="colse()" class="glyphicon glyphicon-remove"></span>
						    </div>
						    <div class="panel-body" id="panel-body">
						        面板内容
						        <?php
						        	
						        	?>
						    </div>
						</div>
					</div>
			</div>
		
</div>

<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='login.php';</script>";}  ?>
	
<script type="text/javascript">
function checkform(){
   	var tel1=form1.get_tel.value;
   	var a=form1.province.value;
	var b=form1.city.value;
	var c=form1.area.value;
   	var myreg=/^[1][3,4,5,7,8][0-9]{9}$/; 
   	if(!myreg.test(tel1)){  
           alert("请正确填写收货人手机号码");
           return false;  
          }else if((a=='请选择省份')||(a=='')||(b=='请选择城市')||(b=='')||(c=='请选择地区')||(c=='')){
          	alert("请正确选择收货人地址");
           return false; 
          }else if(form1.money_id.value==''){
          	alert('请选择付款方式');
          	return false;
          }else{
          	return true;
          }
    
}
function showform(){
	var form=document.getElementById("form");
	if(form.style.display=='none'){
		form.style.display='block';
	}else{
		form.style.display='none';
	}
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


function update_address(get_id){
	var bod=document.getElementById("bod");
	var upd=document.getElementById("upd");
	var url="update_adress.php";
	var data={"get_id":get_id};
	var success=function(response){
	bod.style.display='block';
	upd.style.display='block';
	$("#panel-body").html(response);
	}
	$.post(url,data,success,"html");
}
function update_ok(get_id){
	var f=document.getElementById("up_form");
	var get_name=document.getElementById("u_get_name").value;
	var get_tel=document.getElementById("u_get_tel").value;
	var u_get_add=document.getElementById("u_get_add").value;
	var u_get_post=document.getElementById("u_get_post").value;
	var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
	if(get_name==''){
		alert("请正确填写收货人姓名");
		document.getElementById("u_get_name").focus();
	}else if(!myreg.test(get_tel)){
		alert("请正确填写收货人手机号码");
		document.getElementById("u_get_tel").focus();
	}else if(u_get_add==''){
		alert("请正确填写收货人详细地址");
		document.getElementById("u_get_post").focus();
	}else if(u_get_post==''){
		alert("请正确填写收货人邮政编码");
		document.getElementById("u_get_post").focus();
	}else{
		var form=new FormData(document.getElementById("up_form"));
		$.ajax({
			type:"post",
			data:form,
			url:"upate_address_ok.php",
			dataType:"json",
			processData:false,
			contentType:false,
			success:function(response){
				if(response.ernno==1){
					alert("修改成功");
					var bod=document.getElementById("bod");
					var upd=document.getElementById("upd");
					bod.style.display='none';
					upd.style.display='none';
				}else if(response.ernno==2){
					alert("你没有做任何修改");
				}else if(response.ernno==3){
					alert("请登录");
					window.location.href='login.php';
				}
			}
	//		async:true
		});
	}
	
}
var bod=document.getElementById("bod");
bod.onclick=function(){
	var upd=document.getElementById("upd");
	upd.style.display='none';
	bod.style.display='none';
}
function colse(){
	var bod=document.getElementById("bod");
	var upd=document.getElementById("upd");
	upd.style.display='none';
	bod.style.display='none';
}
</script>