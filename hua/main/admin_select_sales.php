<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>销量查询</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	body{
		margin-top: 70px;
	}
	.style1 {
 font-size: 16px;
 font-weight: bold;
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
	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover">
			   <caption style="text-align: center;font-size: 22px;">销量查询</caption>
				<tbody>
					<tr>
						<?php
							@$kin=mysql_query("select * from kind");
							@$kin_num=mysql_num_rows($kin);
							if(@$kin_num<=0){
								?>
								<td style="text-align: center;">暂无商品销量可查询</td>
								<?php
							}else{
								?>
								<td><a href="admin_see_all_sales.php"  class="btn btn-danger">全部商品销量查询</a></td>
								<?php
									while($k=mysql_fetch_array($kin)){
										?>
										<td><a href="select_fever.php?kind_id=<?php echo $k['kind_id']; ?>" class="btn btn-danger"><?php echo $k['kind_name']; ?>销量查询</a></td>
										<?php
									}
							}
							?>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

</div>
<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>
<script type="text/javascript">
	function check(){
		var end_mth=document.getElementById("end_mth");
		var start_mth=document.getElementById("start_mth").value;
		var options=end_mth.children;
//		alert(options.length);
		for(var i=0;i<options.length;i++){
			options[i].removeAttribute("disabled");
//			alert(options[i].innerHTML);
			if(parseInt(options[i].innerHTML)<=parseInt(start_mth)){
				options[i].setAttribute("disabled","disabled");
			}
		}
	}
	function check2(){
		var end_mth=document.getElementById("end_mth").value;
		var start_mth=document.getElementById("start_mth");
		var options=start_mth.children;
		for(var i=0;i<options.length;i++){
			options[i].removeAttribute("disabled");
			if(parseInt(options[i].innerHTML)>=parseInt(end_mth)){
				options[i].setAttribute("disabled","disabled");
			}
		}
	}
	function checkForm(){
		var end_mth=document.getElementById("end_mth").value;
		var start_mth=document.getElementById("start_mth").value;
		if(end_mth<=start_mth){
			alert("开始与结束日期选不合理，请重新选择");
			return false;
		}
	}
</script>