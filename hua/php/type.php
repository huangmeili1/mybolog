<meta charset="utf-8" />
<?php
	session_start();
	include_once("../conn/dataconnection.php");
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		?>
<div style="margin: 0 auto;text-align: center;width: 100%;height: 100%;">
	<?php
		include("top1.php");
		?>
	<div id="aa" style="margin: 0 auto;text-align: center;width: 100%;height: 80%;">
	<div style="margin: 0 auto;text-align: center;float: left;width: 15%;height: 100%;">
		<?php  
			include("left.php");
			?>
	</div>
	<div id="aa" style="margin: 0 auto;text-align: center;height: 100%;width: 85%;float: right;">
		<?php
			$sql=mysql_query("select * from kind");
			@$n=mysql_num_rows($sql);
			if($n<=0){
				echo "暂无商品类型信息";
			}else{
				?>
				<table border="1" style="margin-left: 400px;margin-top: 20px;border: 1px;">
					<tr>
						<td colspan="2" align="center">商品信息表</td>
					</tr>
					<tr>
						<td>类型编号</td>
						<td>类型名称</td>
					</tr>
					<?php
						while($type=mysql_fetch_array($sql)){
							?>
							<tr>
								<td><?php echo $type['kind_id'] ?></td>
								<td><?php echo $type['kind_name'] ?></td>
							</tr>
							<?php
						}
						?>
				</table>
				<?php
			}
			?>
	</div>	
	</div>
	<div style="width: 100%;height: 10%;padding-top: 20px;"><h2>版权所有</h2></div>
	
</div>
<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>