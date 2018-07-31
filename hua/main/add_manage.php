<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>添加管理员</title>
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
		
		?>
		<div class="container">
			<?php
				include("m_top.php");
				?>
				<div class="row">
					<div class="col-md-12">
						<h4 style="text-align: center;">添加管理员</h4>
						<form id="form_add_admin" class="form-horizontal" role="form">
						  <div class="form-group">
						    <label for="firstname" class="col-sm-2 control-label">管理员编号</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" required="required" name="admin_id" id="admin_id" placeholder="请输入管理员编号">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="lastname" class="col-sm-2 control-label">管理员姓名</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" required="required" id="admin_name" name="admin_name" placeholder="请输入管理员姓名">
						    </div>
						  </div>
						   <div class="form-group">
						    <label for="lastname" class="col-sm-2 control-label">管理员密码</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" required="required" id="admin_pass" name="admin_pass" placeholder="请输入管理员密码">
						    </div>
						  </div>
						   <div class="form-group">
						    <label for="lastname" class="col-sm-2 control-label">管理员手机号码</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" required="required" id="admin_tel" name="admin_tel" placeholder="请输入管理员手机号码">
						    </div>
						  </div>
						   <div class="form-group">
						    <label for="lastname" class="col-sm-2 control-label">管理员地址</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" required="required" id="admin_add" name="admin_add" placeholder="请输入管理员地址">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="lastname" class="col-sm-2 control-label">管理员类型</label>
						    <div class="col-sm-10">
						      <input type="radio" checked="checked" name="admin_type" value="普通管理员">普通管理员
						      <input style="margin-left: 30px;" name="admin_type" type="radio" value="超级管理员">超级管理员
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="lastname" class="col-sm-2 control-label">管理员性别</label>
						    <div class="col-sm-10">
						      <input type="radio" checked="checked" name="admin_sex" value="女">女
						      <input style="margin-left: 30px;" name="admin_sex" type="radio" value="男">男
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      <button type="button" onclick="check_admin()" name="tj" class="btn btn-default">添加</button>
						    </div>
						  </div>
						</form>
					</div>
				</div>
		</div>
<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>
	
<script type="text/javascript">
function check_admin(){

		var admin_id=document.getElementById("admin_id").value;
		var admin_name=document.getElementById("admin_name").value;
		var admin_pass=document.getElementById("admin_pass").value;
		var admin_tel=document.getElementById("admin_tel").value;
		var admin_add=document.getElementById("admin_add").value;
		var sex=document.getElementsByName("admin_sex");
		var type=document.getElementsByName("admin_type");
		for(var i=0;i<sex.length;i++){
			if(sex[i].checked){
				var admin_sex=sex[i].value;
			}
		}
		for(var i=0;i<type.length;i++){
			if(type[i].checked){
				var admin_type=type[i].value;
			}
		}
		var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
		if(admin_id==''){
			alert("请填写管理员编号");
			document.getElementById("admin_id").focus();
		}else if(admin_name==''){
			alert("请填写管理员姓名");
			document.getElementById("admin_name").focus();
		}else if(!myreg.test(admin_tel)){
			alert("请正确填写管理员手机号码");
			document.getElementById("admin_tel").focus();
		}else if(admin_pass==''){
			alert("请正确填写管理员密码");
			document.getElementById("admin_pass").focus();
		}else if(admin_add==''){
			alert("请正确填写管理员地址");
			document.getElementById("admin_add").focus();
		}else{
			var url="check_admin_id.php";
			var data={"admin_id":admin_id};
			var success=function(response){
				if(response.errno==0){
				alert("此管理员编号已经存在，请重新填写");
				document.getElementById("admin_id").focus();
				}else{
					var url2="check_admin_tel.php";
					var data2={"tel":admin_tel};
					var success2=function(response){
						if(response.errno==0){
							alert("此手机号码已经存在了，请重新填写");
							document.getElementById("admin_tel").focus();
						}else{
							var url3="add_admin_ok.php";
							var data3={"admin_id":admin_id,"admin_name":admin_name,"admin_pass":admin_pass,"admin_tel":admin_tel,"admin_add":admin_add,"admin_sex":admin_sex,"admin_type":admin_type};
							var success3=function(response){
								if(response.errno==0){
									alert("添加成功");
									window.location.href='see_manage.php';
								}else{
									alert("添加失败，请稍后再试");
								}
							}
							$.post(url3,data3,success3,'json');
						}
						}
						$.post(url2,data2,success2,"json");
				}
			}
			$.post(url,data,success,"json");
		}
}
	
</script>