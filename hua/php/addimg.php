<meta charset="utf-8" />
<?php
	session_start();
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		?>
		<div style="margin: 0 auto;text-align: center;width: 100%;height: 100%;">
			<?php
		include("top1.php");
		include_once("../conn/dataconnection.php");
		$sql=mysql_query("select * from goods where good_img=''");
		@$num=mysql_num_rows($sql);
		$pagesize=15;
	if(isset($_GET['page'])){
		$page=$_GET['page'];
	}else{
		$page=1;
	}
    $number=ceil($num/$pagesize);
    $ps=($page-1)*$pagesize;
	$SQL=mysql_query("select * from goods where good_img='' limit $ps,$pagesize"); 
		if($num>0){
			?>
			<div style="margin: 0 auto;text-align: center;margin-top: 5px;width: 100%;height: 10%;">
			<form style="margin-left: 350px;" action="selectgood.php" method="get" name="form1" onsubmit="return checkform()">
				<table style="height: 10%;">
					<tr>
						<td>
				<select name="ty" style="height: 100%;">
					<option>商品编号</option>
					<option>商品名称</option>
					<option>用途</option>
					<option>适合对象</option>
					<option>适合节日</option>
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
				<h2>商品信息</h2>
			<table align="center" border="1">
				<tr>
					<td>商品名称</td>
					<td>商品售价</td>
					<td>进口价</td>
					<td>销量</td>
					<td>总量</td>
					<td>库存</td>
					<td>用途</td>
					<td>适合节日</td>
					<td>适合对象</td>
					<td>入库时间</td>
					<td>操作</td>
				</tr>
				<?php
					while(@$mess=mysql_fetch_array($SQL)){
//						?>
						<tr>
							<td><?php echo $mess['good_name'] ?></td>
							<td><?php echo $mess['good_price'] ?></td>
							<td><?php echo $mess['buy_price'] ?></td>
							<td><?php echo $mess['sales'] ?></td>
							<td><?php echo $mess['sum'] ?></td>
							<td><?php echo $mess['good_num'] ?></td>
							<td><?php echo $mess['good_use'] ?></td>
							<td><?php echo $mess['festival'] ?></td>
							<td><?php echo $mess['object'] ?></td>
							<td><?php echo $mess['good_time'] ?></td>
							<td>
								<a href="delgood.php?good_id=<?php echo $mess['good_id'] ?>">删除</a>
								<a href="seegood.php?good_id=<?php echo $mess['good_id'] ?>">查看</a>
								<a href="addotherimg.php?good_id=<?php echo $mess['good_id'] ?>">为商品添加其他图片</a>
							</td>
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
			echo "<a href='book.php?page=1'>第一页</a><a href='book.php?page=$pr'>上一页</a>";
		}
		if($page>=$number){
			echo "下一页｜未页";
		}else{
			echo "<a href='book.php?page=$pn'>下一页</a>&nbsp;&nbsp;&nbsp;<a href='book.php?page=$number'>未页</a>";
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