<meta charset="utf-8" />
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../utf8-php/ueditor.config.js"></script>
<script type="text/javascript" src="../utf8-php/ueditor.all.min.js"></script>
<script type="text/javascript" src="../utf8-php/lang/zh-cn/zh-cn.js"></script>
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>添加公告</title>
<style>
	body{
		margin-top: 60px;
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
		$s=mysql_query("select * from know_type");
		@$num=mysql_num_rows($s);
		if($num<=0){
			?>
			<div class="row">
				<div class="col-md-12" style="text-align: center;">
					<span>暂无公告类型，请先去添加公告类型</span>
				</div>
			</div>
			<?php	
		}else{
			?>
			<div class="row">
		<div class="col-md-12">
			<h2 align="center">添加公告</h2>
				<form class="form-horizontal" role="form" onsubmit="return check_form()" method="post" action="" enctype="multipart/form-data">
				  <div class="form-group">
				    <label for="firstname" class="col-sm-2 control-label">公告标题</label>
				    <div class="col-sm-10">
				      <input style="width: 900px;" type="text" required="required" class="form-control" id="title" name="title" placeholder="请输入名字">
				    </div>
				  </div>
				  <div class="form-group" style="margin-bottom: 30px;">
				    <label for="firstname" class="col-sm-2 control-label">公告封面图片</label>
				    <div class="col-sm-10">
				    	<table>
				    		<tr>
				    			<td><input type="file" required="required" name="img" onchange="changImg(event)"></td>
		   						<td><img alt="暂无图片" id="myImg" src="" height="100px" width="100px"></td>
				    		</tr>
				    	</table>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="firstname" class="col-sm-2 control-label">公告内容</label>
				    <div class="col-sm-10">
				    	<textarea nowrap="content" required="required" id="content" name="content" required="required" placeholder="请填写公告内容"></textarea>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="firstname" class="col-sm-2 control-label">公告类型</label>
				    <div class="col-sm-10">
				    	<?php while($t=mysql_fetch_array($s)){
				    		$type_name=$t['know_id'];
				    		?>
				    		<input type="radio" name="know_id" checked="checked" value="<?php echo $type_name ?>" />&nbsp;&nbsp;<?php echo $t['know_name']; ?>&nbsp;&nbsp;&nbsp;&nbsp;
				    		<?php
				    	} ?>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="firstname" class="col-sm-2 control-label">是否推荐：</label>
				    <div class="col-sm-10">
				    	<input type="radio" value="推荐" name="ifletknow" />&nbsp;&nbsp;推荐&nbsp;&nbsp;&nbsp;&nbsp;
				    	<input type="radio" checked="checked" value="不推荐" name="ifletknow" />不推荐
				    </div>
				  </div>
					<div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" name="tj" class="btn btn-default">提交</button>
					    </div>
					 </div>
				</form>
				<a href="managecenter.php" type="button" class="btn btn-danger" style="margin: 0 auto;text-align: center;margin-left: 250px;">返回管理中心</a>
		</div>
	</div>
			<?php
		}
				 ?>
</div>


<?php  
	if(isset($_POST['tj'])){
		$content=$_POST['content'];
		$title=$_POST['title'];
		$know_id=$_POST['know_id'];
		$data=date("Y-m-d");
		$d=date('Ymdhis').rand(0,999);
		$admin_id=$_SESSION['admin_id'];
		$ifletknow=$_POST['ifletknow'];
		$arr=explode(".", $_FILES["img"]["name"]);
        @$img=$d.'.'.$arr[1];
         $y=$arr[1];
		if(($y!='jpg'&&$y!='jpge'&&$y!='png')&&($y!='JPG'&&$y!='JPGE'&&$y!='PNG')){
		echo "封面图片：".$_FILES["img"]["name"]."格式不正确"."<br>";
		}else{
		
		move_uploaded_file($_FILES['img']["tmp_name"],"../know/".$img);
		$man_img="../know/".$img;
		$sql=mysql_query("insert into know(hua_title,hua_content,hua_time,admin_id,kown_id,if_letknow,img) values('$title','$content','$data','$admin_id','$know_id','$ifletknow','$man_img')");
		@$n=mysql_affected_rows();
		if($n>0){
			echo "<script>alert('添加成功');</script>";
		}else{
			echo "<script>alert('添加失败');</script>";
		}
		
		}
					
		
	}
	?>
	<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>
<script type="text/javascript">
	UE.getEditor('content',{initialFrameWidth:900,initialFrameHeight:200})
function changImg(e){
 var myImg = document.getElementById('myImg');
 for (var i = 0; i < e.target.files.length; i++) {
 var file = e.target.files[i];
 console.log(file);
 if (!(/^image\/.*$/i.test(file.type))) {
  continue; //不是图片 就跳出这一次循环
 }
 //实例化FileReader API
 var freader = new FileReader();
 freader.readAsDataURL(file);
 freader.onload = function(e) {
  console.log(e);
  myImg.setAttribute('src', e.target.result);
 }
 }
 }
 function check_form(){
 	var content=document.getElementById("content");
 	if(content==''){
 		alert("请填写公告内容");
 		return false;
 	}
 }
</script>