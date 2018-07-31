<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>添加商品的其他图片</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
.cent{ 
	
} 
.cs{
padding: 0;
margin: 0;
top:0px; 
opacity: 0;
position:absolute; 
display: block; 
font-size: 12px; 

} 
.cent:hover .cs{
background-color: rgba(0,0,0,0.8);
color: #656e73; 
opacity: 0.8;
animation: Img 0.5s ease-in-out;
} 
</style>
<?php
	session_start();
	include("../conn/dataconnection.php");
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		@$good_id=$_GET['good_id'];
		?>
		<div class="container" style="width: 100%;">
					<div class="row">
						<div class="col-md-12" style="background-color: black;height: 100px;color: white;">
							<h2>管理中心</h2>
							<h4 style="margin-left: 700px;">当前用户:<?php echo @$_SESSION['admin_name']; ?></h4>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12" style="text-align: center;">
							你要添加多少张图片：
							<form method="post" onsubmit="return checkform()">
								<input id="num" name="num" type="text" required="required" /><button type="submit" name="tj">确定</button>
							</form>
							<?php
								if(isset($_POST['tj'])){
									@$num=$_POST['num'];
									?>
									<div class="row">
										<div class="col-md-12" style="text-align: center;">
											<form style="margin-left: 500px;" action="add_imgs.php?good_id=<?php echo $good_id; ?>" method="post" enctype="multipart/form-data">
												<table id="table" border="1">
												<?php
													for($i=0;$i<$num;$i++){
														?>
														<tr id="tr<?php echo $i; ?>">
															<td><input required="required" id="images<?php echo $i; ?>" onchange="changeImg(event,<?php echo $i; ?>)" type="file" name="ima[]" /></td>
															<td>
																
																	<div id="thumbnail<?php echo $i; ?>" class="thumbnail" style="padding: 0;margin: 0;border: 0;display: none;">
																		<img style="height: 150px;width: 200px;" src="" id="img<?php echo $i; ?>">
																	</div>
															</td>
															<td><a onclick="del_img(<?php echo $i; ?>)" class="btn btn-danger">删除</a></td>
														</tr>
														
														<?php
													}
													?>
													<tr>
														<td align="left" style="text-align: left;" colspan="<?php echo $i+1; ?>"><a onclick="add(<?php echo $i; ?>)" class="btn btn-danger">添加行</a>
														<input name="ttj" class="btn btn-danger" style="margin-left: 80px;width: 80px;" type="submit" value="提交" />
														</td>
															
													</tr>
													</table>
													
											</form>
										</div>
									</div>
									<?php
								}
								?>
						</div>
					</div>
		</div>
	<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>
	

<script type="text/javascript">
	function checkform(){
		var num=document.getElementById("num");
		var anum=num.value;
		if(!/^\d+$/.test(anum)){
			alert("你输入的不是整数,请重新输入");
			return false;
		}else{
			return true;
		}
	}
	function changeImg(e,I){
 var myImg = document.getElementById('img'+I);
 var images=document.getElementById("images"+I);
 if(images.value==''){
 	myImg.style.display='none';
 }else{
 	myImg.style.display='block';
 	for (var i = 0; i < e.target.files.length; i++) {
 var file = e.target.files[i];
 console.log(file);
 if (!(/^image\/.*$/i.test(file.type))) {
 	alert("请选择正确格式的图片");
 	images.value='';
  continue; //不是图片 就跳出这一次循环
 }
 //实例化FileReader API
 var freader = new FileReader();
 freader.readAsDataURL(file);
 freader.onload = function(e) {
  console.log(e);
  var thumbnail=document.getElementById("thumbnail"+I);
  thumbnail.style.display='block';
  myImg.setAttribute('src', e.target.result);
 }
 }
 }
	}
	
function add(I){
	var table=document.getElementById("table");
	var tr=document.createElement("tr");
	var td=document.createElement("td");
	var td1=document.createElement("td");
	var td2=document.createElement("td");
	var images=document.getElementsByName("ima[]");
	var L=images.length;
	tr.setAttribute('id','tr'+L);
	td.innerHTML="<input required='required' name='ima[]' id='images"+L+"' onchange='changeImg(event,"+L+")' type='file' value='删除'/>";;
	td1.innerHTML="<div id='thumbnail"+L+"' class='thumbnail' style='padding: 0;margin: 0;border: 0;display: none;'><img style='height: 150px;width: 200px;' src='' id='img"+L+"'></div>";
	tr.appendChild(td);
	tr.appendChild(td1);
	td2.innerHTML="<a onclick='del_img("+L+")' class='btn btn-danger'>删除</a>";
	tr.appendChild(td2);
	$('tr:last').before(tr);
}
function del_img(I){
	$("#tr"+I).remove();
}
</script>