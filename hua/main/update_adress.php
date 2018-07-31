<meta charset="utf-8" />
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
@$get_id=$_POST['get_id'];
include("../conn/dataconnection.php");
@$sql=mysql_query("select * from getinfo where get_id='$get_id'");
@$sql_num=mysql_num_rows($sql);
if($sql_num>0){
	$get=mysql_fetch_array($sql);
	?>
	<form class="form-horizontal" role="form" id="up_form">
		<div class="form-group">
		    <label for="firstname" class="col-sm-2 control-label">收货人姓名</label>
		    <div class="col-sm-10" style="width: 400px;">
		      <input type="text" class="form-control" id="u_get_name" name="u_get_name" value="<?php echo @$get['get_name']; ?>" placeholder="请输入收货人名字">
		    </div>
		 </div>
		 <div class="form-group">
		    <label for="firstname" class="col-sm-2 control-label">收货人电话</label>
		    <div class="col-sm-10" style="width: 400px;">
		      <input type="text" class="form-control" id="u_get_tel" name="u_get_tel" value="<?php echo @$get['get_tel']; ?>" placeholder="请输入收货人名字">
		    </div>
		 </div>
		  <!--<div class="form-group">
		    <label for="firstname" class="col-sm-2 control-label">收货人地址</label>
		    <div class="col-sm-10" style="width: 400px;">
		      <?php include("address.php"); ?>
		    </div>
		 </div>-->
		 <div class="form-group">
			<label for="lastname" class="col-sm-2 control-label">请输入收货详细地址</label>
				<div class="col-sm-10">
					<div class="col-sm-10" style="width: 400px;">
				      <input type="text" class="form-control" id="u_get_add" name="u_get_add" value="<?php echo @$get['get_add']; ?>" placeholder="请输入收货人详细地址">
				    </div>
				</div>
			</div>
			<div class="form-group">
			<label for="lastname" class="col-sm-2 control-label">请输入收货邮政编码</label>
				<div class="col-sm-10">
					<div class="col-sm-10" style="width: 400px;">
				      <input type="text" class="form-control" id="u_get_post" name="u_get_post" value="<?php echo @$get['get_post']; ?>" placeholder="请输入收货人邮政编码">
				    </div>
				</div>
			</div>
			<input type="hidden" name="get_id" value="<?php echo @$get_id; ?>" />
			 <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="button" onclick="update_ok(<?php echo $get_id; ?>)" class="btn btn-default">确认更改</button>
			      <button type="button" onclick="colse()" class="btn btn-default">关闭</button>
			    </div>
			  </div>
	</form>
	<?php 
}else{
	?>
	<span>不好意思，暂时不能更改收货地址</span>
	<?php
}
?>