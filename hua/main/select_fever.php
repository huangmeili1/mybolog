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
		@$kind_id=$_GET['kind_id'];
		@$sql=mysql_query("select * from kind where kind_id='$kind_id'");
		@$k=mysql_fetch_array($sql);
		@$ssql=mysql_query("select DISTINCT(acct_yr) from summary where kind_id='$kind_id'");
		@$sql_num=mysql_num_rows($ssql);
		?>
		<div class="container" style="width: 100%;">
			<?php include("m_top.php"); ?>
				<?php
					if($sql_num<=0){
						?>
						<div class="row">
							<div class="col-md-12" style="text-align: center;">暂无<?php echo $k['kind_name'] ?>销量查询</div>
						</div>
						<?php
					}else{
						?>
							<div class="row">
									<div class="col-md-12">
										<h4 style="text-align: center;"><?php echo $k['kind_name']; ?>销量查询</h4>
										<div style="width: 30%;margin: 0 auto;">
											<button style="width: 200px;" onclick="open_show_table()" class="btn btn-danger">表格形式</button>
											<button style="width: 200px;" onclick="open_show_tu()" class="btn btn-danger">图形式</button>
										</div>
									</div>
								</div>
								<div id="show_table" class="row" style="margin-top: 40px;display: none;">
									<div class="col-md-12">
										<h4 style="text-align: center;"><?php echo $k['kind_name']?>销量查询-表格形式</h4>
							<form name="form1" onsubmit="return checkForm()" method="get" action="select_fever2.php">
								  <table width="300" border="1" align="center" cellpadding="3" cellspacing="3">
								    <tr>
								    	<input type="hidden" name="kind_id" name="kind_id" value="<?php echo $kind_id; ?>" />
								      <td width="85"><strong>查询年份</strong></td>
								      <td width="188">
								      	<select name="acct_yr" id="acct_yr">
								      		<?php
								      			@$i=-1;
								      			while($year=mysql_fetch_array($ssql)){
								      				@$i++;
								      				if($i==1){
								      					?>
								      					<option value="<?php echo $year['acct_yr']; ?>" selected><?php echo $year['acct_yr']; ?></option>
								      					<?php
								      				}else{
								      					?>
								      					<option value="<?php echo $year['acct_yr']; ?>"><?php echo $year['acct_yr']; ?></option>
								      					<?php
								      				}
								      				?>
								      				
								      				<?php
								      			}
								      			?>
								      </select></td>
								    </tr>
								    <tr>
								      <td><strong>起始月份</strong></td>
								      <?php
								      	@$yu=mysql_query("select DISTINCT(acct_mth) from summary where kind_id='$kind_id'");
								      	?>
								      <td><select onchange="check()" name="start_mth" id="start_mth">
								      	<?php
								      		$a=-1;
								      		while($fu=mysql_fetch_array($yu)){
								      			$a++;
								      			if($a==1){
								      				?>
								      				<option selected><?php echo $fu['acct_mth']; ?></option>
								      				<?php
								      			}else{
								      				?>
								      				<option><?php echo $fu['acct_mth']; ?></option>
								      				<?php
								      			}
								      		}
								      		?>
								      </select></td>
								    </tr>
								    <tr>
								      <td><strong>终止月份</strong></td>
								      <td><select onchange="check2()" name="end_mth" id="end_mth">
								        <?php
								        	@$yu2=mysql_query("select DISTINCT(acct_mth) from summary where kind_id='$kind_id'");
								      		$aa=-1;
								      		while($fu2=mysql_fetch_array($yu2)){
								      			$aa++;
								      			if($aa==1){
								      				?>
								      				<option selected><?php echo $fu2['acct_mth']; ?></option>
								      				<?php
								      			}else{
								      				?>
								      				<option><?php echo $fu2['acct_mth']; ?></option>
								      				<?php
								      			}
								      		}
								      		?>
								      </select>
								       </td>
								    </tr>
								  </table>
								  <p align="center">
								    <input type="submit" value="查询">
								    <input type="reset" name="Submit2" value="重置">
								  </p>
								</form>
									</div>
								</div>
								<div id="show_tu" class="row" style="display: none;margin-top: 40px;">
									<div class="col-md-12">
											<form name="form1" onsubmit="return checkform1()" method="get" action="select_fever3.php">
											  <p align="center" class="style1"> <?php echo $k['kind_name']?>销量查询-图形式</p>
											  <table width="300" border="1" align="center" cellpadding="3" cellspacing="3">
											    <tr>
											    	<input type="hidden" name="k_id" id="k_id" value="<?php echo $kind_id; ?>" />
											      <td width="85"><strong>查询年份</strong></td>
											      <td width="188">
											      	<select name="acct_yr" id="acct_yr">
											      		<?php
											      			@$sql=mysql_query("select DISTINCT(acct_yr) from summary where kind_id='$kind_id'");
															@$sql_num=mysql_num_rows($sql);
											      			@$i=-1;
											      			while($year=mysql_fetch_array($sql)){
											      				@$i++;
											      				if($i==1){
											      					?>
											      					<option value="<?php echo $year['acct_yr']; ?>" selected><?php echo $year['acct_yr']; ?></option>
											      					<?php
											      				}else{
											      					?>
											      					<option value="<?php echo $year['acct_yr']; ?>"><?php echo $year['acct_yr']; ?></option>
											      					<?php
											      				}
											      				?>
											      				
											      				<?php
											      			}
											      			?>
											      </select></td>
											    </tr>
											    <tr>
											      <td><strong>起始月份</strong></td>
											      <?php
											      	@$yu=mysql_query("select DISTINCT(acct_mth) from summary where kind_id='$kind_id'");
											      	?>
											      <td><select onchange="check()" name="start_mth" id="start_mth2">
											      	<?php
											      		$a=-1;
											      		while($fu=mysql_fetch_array($yu)){
											      			$a++;
											      			if($a==1){
											      				?>
											      				<option selected><?php echo $fu['acct_mth']; ?></option>
											      				<?php
											      			}else{
											      				?>
											      				<option><?php echo $fu['acct_mth']; ?></option>
											      				<?php
											      			}
											      		}
											      		?>
											      </select></td>
											    </tr>
											    <tr>
											      <td><strong>终止月份</strong></td>
											      <td><select onchange="check2()" name="end_mth" id="end_mth2">
											        <?php
											        	@$yu2=mysql_query("select DISTINCT(acct_mth) from summary where kind_id='$kind_id'");
											      		$aa=-1;
											      		while($fu2=mysql_fetch_array($yu2)){
											      			$aa++;
											      			if($aa==1){
											      				?>
											      				<option selected><?php echo $fu2['acct_mth']; ?></option>
											      				<?php
											      			}else{
											      				?>
											      				<option><?php echo $fu2['acct_mth']; ?></option>
											      				<?php
											      			}
											      		}
											      		?>
											      </select>
											       </td>
											    </tr>
											    <tr>
											      <td><strong>统计图类别</strong></td>
											      <td><select name="graph" id="graph">
											        <option value="1" selected>X-Y图</option>
											        <option value="2">柱形图</option>
											        <option value="3">饼图</option>
											        <option value="4">3D饼图</option>
											      </select></td>
											    </tr>
											  </table>
											  <p align="center">
											    <input type="submit" value="查询">
											    <input type="reset" name="Submit2" value="重置">
											  </p>
											</form>
									</div>
							</div>
						<?php
					}
					?>
			
		</div>
		<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>
	<script type="text/javascript">
	function checkform1(){
		var end_mth=document.getElementById("end_mth2").value;
		var start_mth=document.getElementById("start_mth2").value;
		if(end_mth<=start_mth){
			alert("开始与结束日期选不合理，请重新选择");
			return false;
		}
	}
	function open_show_table(){
		var show_table=document.getElementById("show_table");
		var show_tu=document.getElementById("show_tu");
		if(show_table.style.display=='none'){
			show_table.style.display='block';
		}else{
			show_table.style.display='none';
		}
		show_tu.style.display='none';
	}
	function open_show_tu(){
		var show_table=document.getElementById("show_table");
		var show_tu=document.getElementById("show_tu");
		if(show_tu.style.display=='none'){
			show_tu.style.display='block';
		}else{
			show_tu.style.display='none';
		}
		show_table.style.display='none';
	}
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