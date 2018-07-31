<meta charset="utf-8" />
<?php
	session_start();
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
include("../conn/dataconnection.php");
@$key=$_POST['key'];
$sql=mysql_query("select * from know where hua_title like '%$key%' or hua_time like '%$key%'");
@$num=mysql_num_rows($sql);
if(@$num>0){
	?>
	<table id="store" class="table table-hover">
						<thead>
							<tr>
								<th>封面图片</th>
								<th>公告标题</th>
								<th>公告内容</th>
								<th>公告类型</th>
								<th>发表时间</th>
								<th>是否推荐</th>
								<th>浏览量</th>
								<th>发表人</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
							<?php
								while($know=mysql_fetch_array($sql)){
									?>
									<tr>
										<td>
											<div class="thumbnail" style="width: 150px;">
												<a href="article.php?hua_id=<?php echo $know['hua_id'] ?>"><img style="height: 150px;" src="<?php echo $know['img']; ?>" /></a>
											</div>
										</td>
										<td width="150" >
											<span>
												<a href="article.php?hua_id=<?php echo $know['hua_id'] ?>"><?php echo $know['hua_title']; ?>
												</a>
												</span>
										</td>
										<td width="150">
											<?php
												$content=$know['hua_content'];
												echo getWord($content);
												?>
										</td>
										<td style="line-height: 150px;">
											<?php
												$kown_id=$know['kown_id'];
												$type=mysql_query("select * from know_type where know_id='$kown_id'");
												$ty=mysql_fetch_array($type);
												$b=$ty['know_name'];
												?>
												<a href="article_cat.php?type=<?php echo $b; ?>"><?php echo $b; ?></a>
										</td>
										<td style="line-height: 150px;">
											<?php echo $know['hua_time']; ?>
										</td>
										<td style="line-height: 150px;">
											<?php
												echo $know['if_letknow'];
												?>
										</td>
										<td style="line-height: 150px;">
											<?php echo $know['see_num']; ?>
										</td>
										<td style="line-height: 150px;">
											<?php  
												$admin_id=$know['admin_id'];
												$ad=mysql_query("select * from admin where admin_id='$admin_id'");
												@$admin_name=mysql_fetch_array($ad);
												echo $admin_name['admin_name'];
												?>
										</td>
										<td style="line-height: 150px;">
											<a href="article.php?hua_id=<?php echo $know['hua_id'] ?>">查看</a>｜
											<?php
												$admin_id=$admin_name['admin_id'];
												if(@$_SESSION['admin_id']==$admin_id){
													?>
													<a href="update_know.php?hua_id=<?php echo $know['hua_id'] ?>">修改</a>
													<?php
												}else{
													?>
													<span>修改</span>
													<?php
												}
												?>
											
											|<a onclick="return confirm('你确认要删除？')" href="del_know.php?hua_id=<?php echo $know['hua_id'] ?>">删除</a>
										</td>
									</tr>
									<?php
								}
								?>
								<?php
}else{
	echo "<script>alert('没有你所要查找的内容');window.location.href='List_know.php';</script>";
}
?>