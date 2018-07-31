<meta charset="utf-8" />
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>公告类型</title>
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
			$sql=mysql_query("select * from know_type where know_name!='支付方式' and know_name!='售后服务' order by know_id desc");
			@$n=mysql_num_rows($sql);
			if($n<=0){
				?>
				<span style="color: red;font-size: 18px;"><b>暂无公告类型</b></span>
				<span><a class="btn btn-default" href="#" onclick="openadd()">添加更多公告类型</a></span>
				<?php
					
			}else{
						$pagesize=2;
						if(isset($_GET['page'])){
							$page=$_GET['page'];
						}else{
							$page=1;
						}
					    $number=ceil($n/$pagesize);
					    $ps=($page-1)*$pagesize;
					    $SQL=mysql_query("select * from know_type where know_name!='支付方式' and know_name!='售后服务' order by know_id desc limit $ps,$pagesize");
				?>
				<table class="table table-bordered table-hover" style="width: 50%;margin: 0 auto;margin-top: 30px;">
				<caption>公告类型</caption>
				<thead>
					<tr>
						<td>类型名称</td>
						<td>操作</td>
					</tr>
				</thead>
				<tbody>
					<?php  
						while($type=mysql_fetch_array($SQL)){
							?>
							<tr>
								<td>
									<span id="type<?php echo $type['know_id']; ?>"><?php echo $type['know_name']; ?></span>
									<input style="display: none;" type="text" required="required" value="<?php echo $type['know_name'] ?>"  id="type_name<?php echo $type['know_id']; ?>" />
								</td>
								<td>
									<a onclick="del_Type(<?php echo $type['know_id']; ?>)" id="del<?php echo $type['know_id']; ?>" class="btn btn-default" href="">删除</a>
									<a id="update<?php echo $type['know_id']; ?>" class="btn btn-default" href="#" onclick="update_type(<?php echo $type['know_id']; ?>)">修改</a>
									<a onclick="changeType(<?php echo $type['know_id']; ?>)" style="display: none;width: 80px;" id="up<?php echo $type['know_id']; ?>" class="btn btn-default" href="#">确认修改</a>
								</td>
							</tr>
							<?php
						}
						?>
						<?php
							$pr=$page-1;
							$pn=$page+1;
							if($number>=9){
								?>
						<tr>
							<td colspan="2" align="center">
								<ul class="pagination pagination-lg">
								<?php
										if($page<=1){
											?>
											<li class="disabled"><span style="color: darkgray;">&laquo;上一页</span></li>
											<?php 
											}else{
												?>
												<li><a href="know_type.php?page=<?php echo $pr; ?>">&laquo;上一页</a></li>
												<?php
											}
											?>
										    <li><a href="know_type.php?page=1">1</a></li>
										    <li><a href="know_type.php?page=2">2</a></li>
										    <li><a href="know_type.php?page=3">3</a></li>
										    <li><a href="know_type.php?page=4">4</a></li>
										    <li><a href="know_type.php?page=5">5</a></li>
										     <li class="disabled"><a href="#">...</a></li>
										    <li><a href="know_type.php?page=<?php echo $number; ?>"><?php echo $number; ?></a></li>
										    <?php
										    	if($page>=$number){
										?>
										<li class="disabled"><span style="color: darkgray;">下一页&raquo;</span></li>
										<?php
										}else{
											?>
											<li><a href="know_type.php?page=<?php echo $pn; ?>">下一页&raquo;</a></li>
											<?php
										}
											?>
										    	
											<?php
											
												?>
								</ul>
							</td>
						</tr>			
							<?php
							}else{
								?>
								<tr>
									<td colspan="2" align="center">
								<ul class="pagination pagination-lg">
												<?php
										if($page<=1){
											?>
											<li class="disabled"><span style="color: darkgray;">&laquo;上一页</span></li>
											<?php 
											}else{
												?>
												<li><a href="know_type.php?page=<?php echo $pr; ?>">&laquo;上一页</a></li>
												<?php
											}
												?>
												<?php
													for($i=1;$i<=$number;$i++){
														?>
														<li><a href="know_type.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
														<?php
													}
													?>
												<?php
										if($page>=$number){
										?>
										<li class="disabled"><span style="color: darkgray;">下一页&raquo;</span></li>
										<?php
										}else{
											?>
											<li><a href="know_type.php?page=<?php echo $pn; ?>">下一页&raquo;</a></li>
											<?php
										}
											?>
												
										</ul>
										</td>
								</tr>
								<?php
							}
							?>
							
						<tr>
							<td colspan="2" align="center"><a class="btn btn-default" onclick="openadd()" href="#">添加更多公告类型</a></td>
						</tr>
				</tbody>
			</table>
			<?php
			?>
				<?php
					
			}
			?>
			
			<div id="addtype" style="margin: 0 auto;margin-top: 50px;width: 50%;display: none;">
				<form class="form-horizontal" role="form" method="post" action="">
					<div class="form-group">
						<label for="firstname" class="col-sm-2 control-label">类型名称:</label>
						<div class="col-sm-10">
							<input style="width: 250px;height: 50px;" required="required" type="text" value="<?php echo @$_POST['typename']; ?>" class="form-control" id="typename" name="typename" placeholder="请输入类型名称" />
							<button class="btn btn-default" type="submit" name="tijie">添加</button>
						</div>
					</div>
				</form>
			</div>
			
			<?php  
				if(isset($_POST['tijie'])){
					@$typename=$_POST['typename'];
					$ss=mysql_query("select * from know_type where know_name='$typename'");
					@$nn=mysql_num_rows($ss);
					if($nn>0){
						echo "<script>alert('你要添加的公告类型已经存在了');</script>";
					}else{
						$aa=mysql_query("insert into know_type(know_name) values('$typename')");
						@$e=mysql_affected_rows();
						if($e>0){
							echo "<script>alert('添加成功');window.reload();</script>";
						}else{
							echo "<script>alert('系统出问题了，请联系系统管理员');</script>";
						}
					}
				}
				?>
			
	</div>	
	</div>
	<div style="width: 100%;height: 10%;padding-top: 20px;"><h2>版权所有</h2></div>
	
</div>
<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>
	
<script type="text/javascript">
	function update_type(know_id){
		var type=document.getElementById("type"+know_id);
		var type_name=document.getElementById("type_name"+know_id);
		type.style.display='none';
		type_name.style.display='block';
		var update=document.getElementById("update"+know_id);
		update.style.display='none';
		var up=document.getElementById("up"+know_id);
		up.style.display='block';
		var del=document.getElementById("del"+know_id);
		del.style.display='none';
	}
	
	function changeType(know_id){
		var old_type=document.getElementById("type"+know_id).innerText;
		var type_name=document.getElementById("type_name"+know_id).value;
		if(type_name==''){
			alert("请输入公告类型");
		}else{
			if(old_type==type_name){
			alert("你没有做任何修改哦");
			location.reload();
		}else{
			var url='UpdateKnow.php';
			var data={"know_id":know_id,"type_name":type_name,"type":'修改'};
			var success=function(response){
			if(response.ernno==0){
				alert('修改成功');
				location.reload();
			}else if(response.ernno==3){
				alert('修改失败,你要修改的类型名称已经存在了');
				location.reload();
			}else if(response.ernno=1){
				alert("更新失败，请联系维护管理员");
				location.reload();
			}else if(response==2){
				alert('请登录');
				window.location.href='managelogin.php';
			}
		}
		$.post(url,data,success,"json");
		}
		}
		
	}
	function del_Type(know_id){
		var url="UpdateKnow.php";
		var data={"know_id":know_id,"type":'删除'};
		var success=function(response){
			if(response.ernno==4){
				alert('删除成功');
				location.reload();
			}else if(response.ernno==5){
				alert('删除失败，请联系维护管理员');
			}else if(response==2){
				alert('请登录');
				window.location.href='managelogin.php';
			}
		}
		$.post(url,data,success,"json");
	}
	
	function openadd(){
		var addtype=document.getElementById("addtype");
		if(addtype.style.display=='none'){
			addtype.style.display='block';
		}else{
			addtype.style.display='none';
		}
		
	}
</script>