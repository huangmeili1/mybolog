<meta charset="utf-8" />
<?php
	session_start();
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		?>
		<div style="margin: 0 auto;text-align: center;width: 100%;height: 100%;">
			<?php
		include("top1.php");
		include_once("../conn/dataconnection.php");
		$sql=mysql_query("select * from user");
		@$num=mysql_num_rows($sql);
		$pagesize=9;
	if(isset($_GET['page'])){
		$page=$_GET['page'];
	}else{
		$page=1;
	}
    $number=ceil($num/$pagesize);
    $ps=($page-1)*$pagesize;
	$SQL=mysql_query("select * from user limit $ps,$pagesize"); 
		if($num>0){
			?>
			<div style="margin: 0 auto;text-align: center;margin-top: 5px;width: 100%;height: 10%;">
			<form style="margin-left: 350px;" action="selectuser.php" method="get" name="form1" onsubmit="return checkform()">
				<table style="height: 10%;">
					<tr>
						<td>
				<select name="ty" style="height: 100%;">
					<option>编号</option>
					<option>用户名</option>
					<option>真实姓名</option>
					<option>性别</option>
				</select>
						</td>
						<td>
							<input type="text" size="90" name="keyword" value="<?php echo @$_POST['keyword'] ?>" style="height: 40px;"/>
						</td>
						<td>
						<input type="submit" name="tj" value="查&nbsp;&nbsp;找" style="width: 60px;height: 100%;border: 0;color:white ;background-color: blue;">	
						</td>
					</tr>
				</table>
				
			</form>
			</div>
			
			<div style="width: 100%;height: 77%;margin: 0 auto;text-align: center;">
				<h2>用户信息</h2>
			<table align="center" border="1">
				<tr>
					<td>用户编号</td>
					<td>用户名</td>
					<td>用户密码</td>
					<td>真实姓名</td>
					<td>性别</td>
					<td>电话</td>
					<td>注册时间</td>
					<td>操作</td>
				</tr>
				<?php
					while(@$mess=mysql_fetch_array($SQL)){
//						?>
						<tr>
							<td><?php echo $mess['user_id'] ?></td>
							<td><?php echo $mess['user_name'] ?></td>
							<td><?php echo $mess['user_pass'] ?></td>
							<td><?php echo $mess['realname'] ?></td>
							<td><?php echo $mess['sex'] ?></td>
							<td><?php echo $mess['user_tel'] ?></td>
							<td><?php echo $mess['user_time'] ?></td>
							<td><a href="deluser.php?user_id=<?php echo $mess['user_id'] ?>">删除</a></td>
							</tr>
					<?php
					}
					?>
				<tr>
				<td colspan="12" align="center">
					<?php  
		$pr=$page-1;
		$pn=$page+1;
		if($page<=1){
			echo "第一页｜上一页";
		}else{
			echo "<a href='usermessage.php?page=1'>第一页</a><a href='usermessage.php?page=$pr'>上一页</a>";
		}
		if($page>=$number){
			echo "下一页｜未页";
		}else{
			echo "<a href='usermessage.php?page=$pn'>下一页</a>&nbsp;&nbsp;&nbsp;<a href='usermessage.php?page=$number'>未页</a>";
		}
						?>
						<a href="managecenter.php">返回管理中心</a>
				</td>
			</tr>
			</table>	
		</div>
			<?php
		}else{
			echo "暂无用户信息";
		}
			?>
			
		
		
		</div>
		<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>
	<script type="text/javascript">
	   			function checkform(){
		if(form1.keyword.value==''){
			alert('条件不能为空');
			return false;
		}
		}
	   		</script>