<meta charset="utf-8" />
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<?php
	function trimall($str)//删除空格
	{
								
	$qian=array(" ","　","\t","\n","\r");$hou=array("","","","","");
								
	return str_replace($qian,$hou,$str);    
	}
	function getWord($content){
	$str=strip_tags($content);//将html格式去掉
								
	$str=trimall($str);//删除空格
								
	$str=mb_substr($str,0,90,'utf-8');//截取字段
								
	return $str;
	}
	?>
<?php
	session_start();
	@$user_id=$_SESSION['user_id'];
	include("../conn/dataconnection.php");
									$sql=mysql_query("select * from comments where user_id='$user_id' order by comment_time asc");
									@$num=mysql_num_rows($sql);
									if(@$num<=0){
										?>
										<p style="margin-left: 200px;">你还有任何评价请去给你喜欢的<a href="see_order.php?type=待评价" class="btn btn-danger">评价吧</a>，让更多人知道</p>
										<?php
									}else{
										?>
										<table class="table table-hover">
											<caption><b>按时间倒序<span class="glyphicon glyphicon-arrow-down"></span></b></caption>
											<thead>
												<th>被评价商品</th>
												<th>评价内容</th>
												<th>评价星级</th>
												<th>操作</th>
											</thead>
											<tbody>
											<?php
												$pagesize=10;
												if(isset($_GET['page'])){
													$page=$_GET['page'];
												}else{
													$page=1;
												}
											    $number=ceil($num/$pagesize);
											    $ps=($page-1)*$pagesize;
												$SQL=mysql_query("select * from comments where user_id='$user_id' order by comment_time asc limit $ps,$pagesize");
												while($content=mysql_fetch_array($SQL)){
													$good_id=$content['good_id'];
													$good=mysql_query("select * from goods where good_id='$good_id'");
													@$g=mysql_fetch_array($good);
													?>
													<tr>
														<td>
															<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $good_id; ?>">
															<div class="thumbnail" style="width: 180px;">
																<img src="<?php echo $g['main_img']; ?>" />
																<div class="caption" style="text-align: center;">
																	<?php echo $g['good_name']; ?>
																</div>
															</div>
															</a>
														</td>
														<td style="width: 200px;">
															<div style="margin-top: 10px;">
																<?php
																	$con=$content['content'];
																	echo getWord($con);
																	?>
															</div>
														</td>
														<td>
															<ul id="rating" class="rating">
															<?php 
																$say=array("很不好","不好","一般","好","很好");
																$xinxin=$content['xinxin']; 
																for($i=0;$i<$xinxin;$i++){
																	?>
																	<li style="background-position-y: -38px;"  class="rating-item" title="<?php echo $say[$i]; ?>"></li>
																	<?php
																}
																$saylength=count($say);
																for($i=$xinxin;$i<$saylength;$i++){
																	?>
																	<li  class="rating-item" title="<?php echo $say[$i]; ?>"></li>
																	<?php
																}
																
																?>
																</ul>
														</td>
														<td style="line-height: 200px;">
															<a href="see_content.php?content_id=<?php echo $content['commet_id'] ?>">查看</a>
															<a href="del_content.php?content_id=<?php echo $content['commet_id']; ?>">删除</a>
														</td>
													</tr>
													<?php
												}	
																							?>
																							<tr>
												<td colspan="7">
												 <?php if(@$num>0){ ?>
											   		<div class="row" style="width: 100%;margin: 0 auto;margin-bottom: 50px;margin-top: 30px;background-color: white;">
											   			<div class="col-xs-6 col-md-12" style="width: 100%;">
											   				<span style="line-height: 80px;font-size: 20px;"><?php echo $page; ?>-<?php echo $number; ?>页/共<?php echo $num; ?>条个评价</span>
											   				<?php
															$pr=$page-1;
															$pn=$page+1;
															?>
																<?php
																	if($number>=9){
																		?>
																		<ul class="pagination pagination-lg" style="float: right;">
																						<?php
																				if($page<=1){
																					?>
																					<li class="disabled"><span style="color: darkgray;">&laquo;上一页</span></li>
																					<?php 
																					}else{
																						?>
																						<li><a href="javascript:lop('1.php?page=<?php echo $pr; ?>')">&laquo;上一页</a></li>
																						<?php
																					}
																						?>
																						
																						<li><a href="javascript:lop('1.php?page=1')">1</a></li>
																						<li><a href="javascript:lop('1.php?page=2')">2</a></li>
																						<li><a href="javascript:lop('1.php?page=3')">3</a></li>
																						<li><a href="javascript:lop('1.php?page=4')">4</a></li>
																						<li><a href="javascript:lop('1.php?page=5')">5</a></li>
																						<li><a href="javascript:lop('1.php?page=6')">6</a></li>
																						<li class="disabled"><span>.....</span></li>
																						<li><a href="javascript:lop('1.php?page=<?php echo $number; ?>')"><?php echo $number; ?></a></li>
																						<?php
																				if($page>=$number){
																				?>
																				<li class="disabled"><span style="color: darkgray;">下一页&raquo;</span></li>
																				<?php
																				}else{
																					?>
																					<li><a href="javascript:lop('1.php?page=<?php echo $pn; ?>')">下一页&raquo;</a></li>
																					<?php
																				}
																					?>
																						
																				</ul>
																		<?php
																	}else{
																		?>
																		<ul class="pagination pagination-lg" style="float: right;">
																						<?php
																				if($page<=1){
																					?>
																					<li class="disabled"><span style="color: darkgray;">&laquo;上一页</span></li>
																					<?php 
																					}else{
																						?>
																						<li><a href="javascript:lop('1.php?page=<?php echo $pr; ?>')">&laquo;上一页</a></li>
																						<?php
																					}
																						?>
																						<?php
																							for($i=1;$i<=$number;$i++){
																								?>
																								<li><a href="javascript:lop('1.php?page=<?php echo $i; ?>')"><?php echo $i; ?></a></li>
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
																					<li><a href="javascript:lop('1.php?page=<?php echo $pn; ?>')">下一页&raquo;</a></li>
																					<?php
																				}
																					?>
																						
																				</ul>
																		<?php
																	}
																	?>
													
																</div>
												
												
																
															</tr>
														</table>
											   			</div>
											   		<?php } ?>
												</td>
											</tr>
											</tbody>
										</table>
										<?php
									}
									?>
									

<script type="text/javascript">
	function lop(page){
		$("#div").load(page);
	}
</script>