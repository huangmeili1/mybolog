<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>商品查询</title>
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
		@$sel=$_GET['sel'];
		@$keywrod=$_GET['keyword'];
		?>
		<div class="container" style="width: 100%;">
			<?php
				include("m_top.php");
				?>
				<div class="row">
					<h4 style="text-align: center;">调整节日<b><?php echo @$keywrod; ?></b>的鲜花价格</h4>
					<div class="col-md-12">
						<form method="post" onsubmit="return check_num()" class="form-horizontal" style="margin: 0 auto;width: 40%;">
							<div class="form-group">
							    <label style="width: 200px;" for="firstname" class="col-sm-2 control-label">调整为原来价格的:</label>
									<div class="input-group" style="width: 300px;">
							            <input style="height: 50px;" id="num" name="num" required="required" value="<?php echo @$_POST['num']; ?>" type="text" class="form-control">
							            <span style="font-size: 30px;" class="input-group-addon">倍</span>
							        </div>
							 </div>
							 <div class="form-group">
							   <label  for="lastname" style="width: 180px;" class="col-sm-2 control-label">原价格调整？:</label>
									<div class="input-group">
									      <input checked="checked" type="radio" name="re" value="是" />是
									      <input type="radio" style="margin-left: 50px;" name="re" value="否" />否
							        </div>
							 </div>
								<div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
								      <button name="tj" type="submit" class="btn btn-default">修改</button>
								    </div>
								</div>
						</form>
						<?php
							if(isset($_POST['tj'])){
								@$num=$_POST['num'];
								@$re=$_POST['re'];
								if($re=='否'){
									$sql=mysql_query("update goods set good_price=good_price*$num where kind_id=(select kind_id from kind where kind_name='鲜花') and (festival like '%母亲节%')");
								}else{
									$sql=mysql_query("update goods set good_price=good_price*$num,prime_cost=prime_cost*$num where kind_id=(select kind_id from kind where kind_name='鲜花') and (festival like '%母亲节%')");
								}
								@$sql_num=mysql_affected_rows();
								if(@$sql_num>0){
									echo "<script>alert('调价成功');window.location.href='admin_select_good.php?sel=$sel&keyword=$keywrod';</script>";
								}else{
									echo "<script>alert('调价失败，请稍后再试');</script>";
								}
							}
							?>
					</div>
				</div>
		</div>
		
	<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>
	

<script type="text/javascript">
	function check_num(){
		var num=document.getElementById("num").value;
		var regPos = /^\d+(\.\d+)?$/;
		if(!regPos.test(num)||num==1){
			alert('请输入正确的倍数');
			document.getElementById("num").focus();
			return false;
		}
	}
</script>