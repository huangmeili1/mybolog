<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>查找留言</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	body{
		margin-top: 50px;
	}
</style>
<?php
function trimall($str)//删除空格
{
								
$qian=array(" ","　","\t","\n","\r");$hou=array("","","","","");
								
return str_replace($qian,$hou,$str);    
}
function getWord($content){
$str=strip_tags($content);//将html格式去掉
								
$str=trimall($str);//删除空格
								
$str=mb_substr($str,0,40,'utf-8')."......";//截取字段
								
return $str;
}
	?>
<?php
	session_start();
	include("../conn/dataconnection.php");
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		?>
		<div class="container" style="width: 100%;">
			
			<?php
				include("m_top.php");
				?>
				<?php
					@$sel=$_GET['sel'];
					@$keyword=$_GET['keyword'];
					?>
					<h4 style="text-align: center;">查找<b><?php echo $sel ?>为:<?php echo $keyword; ?></b>的留言</h4>
					<?php
					if($sel=='留言编号'){
						@$sql=mysql_query("select * from ly where ly_id='$keyword' order by ly_time desc");
						@$sql_num=mysql_num_rows($sql);
						if($sql_num>0){
							@$ly=mysql_fetch_array($sql);
							?>
							<table class="table table-hover">
							<thead>
								<th>留言编号</th>
								<th>留言标题</th>
								<th>留言内容</th>
								<th>留言时间</th>
								<th>留言者</th>
								<th>是否回复</th>
								<th>操作</th>
							</thead>
							<tr>
								<td><?php echo $ly['ly_id']; ?></td>
								<td><?php echo $ly['title'] ?></td>
								<td><?php echo getWord($ly['content']) ?></td>
								<td><?php echo $ly['ly_time']; ?></td>
								<td>
										<a style="text-decoration: none;" target="_blank" href="select_user.php?sel=用户编号&keyword=<?php echo $ly['user_id']; ?>&tj=tj">
										<?php
											echo $ly['user_id'];
											?>
										</a>
								</td>
								<td>
									<?php
										$ly_id=$ly['ly_id'];
										@$get=mysql_query("select * from getly where ly_id='$ly_id'");
										@$get_num=mysql_num_rows($get);
										if($get_num<=0){
											echo "未回复";
										}else{
											echo "已回复";
										}
										?>
								</td>
								<td>
									<?php
										if($get_num<=0){
											?>
											<a href="re_ly.php?ly_id=<?php echo $ly['ly_id'] ?>">回复</a>
											<?php
										}
										?>
									
									<a href="admin_see_ly.php?ly_id=<?php echo $ly['ly_id'] ?>">查看</a>
									<a href="del_ly.php?ly_id=<?php echo $ly['ly_id'] ?>">删除</a>
								</td>
							</tr>
							</table>
							<?php
						}
					}else if($sel=='是否回复'){
						@$re=mysql_query("select * from ly");
						?>
						<table class="table table-hover">
							<thead>
								<th>留言编号</th>
								<th>留言标题</th>
								<th>留言内容</th>
								<th>留言时间</th>
								<th>留言者</th>
								<th>是否回复</th>
								<th>操作</th>
							</thead>
					<?php
						while(@$re_n=mysql_fetch_array($re)){
							@$ly_id=$re_n['ly_id'];
							@$sq=mysql_query("select * from getly where ly_id='$ly_id'");
							$sq_num=mysql_num_rows($sq);
							if($sq_num<=0&&$keyword=='未回复'){
								
								?>
								<tr>
									<td><?php echo $re_n['ly_id']; ?></td>
									<td><?php echo $re_n['title']; ?></td>
									<td><?php echo getWord($re_n['content']) ?></td>
									<td><?php echo $re_n['ly_time']; ?></td>
									<td>
										<a style="text-decoration: none;" target="_blank" href="select_user.php?sel=用户编号&keyword=<?php echo $re_n['user_id']; ?>&tj=tj">
										<?php
											echo $re_n['user_id'];
											?>
										</a>
									</td>
									<td>
										未回复
									</td>
									<td>
										<a href="re_ly.php?ly_id=<?php echo $re_n['ly_id'] ?>">回复</a>
										<a href="admin_see_ly.php?ly_id=<?php echo $re_n['ly_id'] ?>">查看</a>
										<a href="del_ly.php?ly_id=<?php echo $re_n['ly_id'] ?>">删除</a>
									</td>
								</tr>
								<?php
							}else if($sq_num>0&&$keyword=='已回复'){
								@$l=mysql_fetch_array($sq);
								?>
								<tr>
									<td><?php echo $l['ly_id']; ?></td>
									<td><?php echo $re_n['title']; ?></td>
									<td><?php echo getWord($re_n['content']) ?></td>
									<td><?php echo $re_n['ly_time']; ?></td>
									<td>
										<a style="text-decoration: none;" target="_blank" href="select_user.php?sel=用户编号&keyword=<?php echo $re_n['user_id']; ?>&tj=tj">
										<?php
											echo $re_n['user_id'];
											?>
										</a>
									</td>
									<td>
										已回复
									</td>
									<td>
										<a href="admin_see_ly.php?ly_id=<?php echo $re_n['ly_id'] ?>">查看</a>
										<a href="del_ly.php?ly_id=<?php echo $re_n['ly_id'] ?>">删除</a>
									</td>
								</tr>
								<?php
							}
						}
						?>
						</table>
						<?php
						
					}else if($sel=='留言标题'){
						$sql=mysql_query("select * from ly where title like '%$keyword%'");
						@$sql_num=mysql_num_rows($sql);
						if($sql_num<=0){
							?>
							<h5 style="text-align: center;">暂无<?php echo $sel ?>为：<?php echo $keyword ?>的留言</h5>
							<?php
						}else{
							?>
							<table class="table table-hover">
							<thead>
								<th>留言编号</th>
								<th>留言标题</th>
								<th>留言内容</th>
								<th>留言时间</th>
								<th>留言者</th>
								<th>是否回复</th>
								<th>操作</th>
							</thead>
							<tbody>
								<?php
									while($ly=mysql_fetch_array($sql)){
										?>
										<tr>
											<td><?php
												echo $ly['ly_id'];
												?></td>
												<td><?php echo $ly['ly_id']; ?></td>
												<td><?php echo $ly['title'] ?></td>
												<td><?php echo getWord($ly['content']) ?></td>
												<td><?php echo $ly['ly_time']; ?></td>
												<td>
														<a style="text-decoration: none;" target="_blank" href="select_user.php?sel=用户编号&keyword=<?php echo $ly['user_id']; ?>&tj=tj">
														<?php
															echo $ly['user_id'];
															?>
														</a>
												</td>
												<td>
													<?php
														$ly_id=$ly['ly_id'];
														@$get=mysql_query("select * from getly where ly_id='$ly_id'");
														@$get_num=mysql_num_rows($get);
														if($get_num<=0){
															echo "未回复";
														}else{
															echo "已回复";
														}
														?>
												</td>
												<td>
													<?php
														if($get_num<=0){
															?>
															<a href="re_ly.php?ly_id=<?php echo $ly['ly_id'] ?>">回复</a>
															<?php
														}
														?>
													
													<a href="admin_see_ly.php?ly_id=<?php echo $ly['ly_id'] ?>">查看</a>
													<a href="del_ly.php?ly_id=<?php echo $ly['ly_id'] ?>">删除</a>
												</td>
										</tr>
										<?php
									}
									?>
							</tbody>
							</table>
							<?php
						}
						
					}else if($sel=='留言用户编号'){
						$sql=mysql_query("select * from ly where user_id='$keyword'");
						@$sql_num=mysql_num_rows($sql);
						if($sql_num<=0){
							?>
							<h5 style="text-align: center;">暂无<?php echo $sel ?>为：<?php echo $keyword ?>的留言</h5>
							<?php
						}else{
							?>
							<table class="table table-hover">
							<thead>
								<th>留言编号</th>
								<th>留言标题</th>
								<th>留言内容</th>
								<th>留言时间</th>
								<th>留言者</th>
								<th>是否回复</th>
								<th>操作</th>
							</thead>
							<tbody>
								<?php
									while($ly=mysql_fetch_array($sql)){
										?>
										<tr>
											<td><?php
												echo $ly['ly_id'];
												?></td>
												<td><?php echo $ly['ly_id']; ?></td>
												<td><?php echo $ly['title'] ?></td>
												<td><?php echo getWord($ly['content']) ?></td>
												<td><?php echo $ly['ly_time']; ?></td>
												<td>
														<a style="text-decoration: none;" target="_blank" href="select_user.php?sel=用户编号&keyword=<?php echo $ly['user_id']; ?>&tj=tj">
														<?php
															echo $ly['user_id'];
															?>
														</a>
												</td>
												<td>
													<?php
														$ly_id=$ly['ly_id'];
														@$get=mysql_query("select * from getly where ly_id='$ly_id'");
														@$get_num=mysql_num_rows($get);
														if($get_num<=0){
															echo "未回复";
														}else{
															echo "已回复";
														}
														?>
												</td>
												<td>
													<?php
														if($get_num<=0){
															?>
															<a href="re_ly.php?ly_id=<?php echo $ly['ly_id'] ?>">回复</a>
															<?php
														}
														?>
													
													<a href="admin_see_ly.php?ly_id=<?php echo $ly['ly_id'] ?>">查看</a>
													<a href="del_ly.php?ly_id=<?php echo $ly['ly_id'] ?>">删除</a>
												</td>
										</tr>
										<?php
									}
									?>
							</tbody>
							</table>
							<?php
						}
						
						
					}else{
						echo "<script>alert('系统出错了，请稍后再试');history.go(-1);</script>";
					}
					?>
		</div>
		<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>