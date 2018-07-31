<div class="row">
											<div class="col-md-12">
												<table class="table table-hover">
													<thead>
														<th>评价编号</th>
														<th>评价商品</th>
														<th>评价图片</th>
														<th>评价订单号</th>
														<th>评价星级</th>
														<th>评价时间</th>
														<th>操作</th>
													</thead>
													<tbody>
														<?php
													while(@$con=mysql_fetch_array($SQL)){
														?>
														<tr>
															<td><?php echo $con['commet_id']; ?></td>
															<td>
																<?php
																	@$good_id=$con['good_id'];
																	@$g=mysql_query("select * from goods where good_id='$good_id'");
																	@$gg=mysql_num_rows($g);
																	?>
																	<div class="thumbnail" style="width: 180px;height: 220px;">
																		<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $good_id ?>">
																		<h5 style="text-align: center;">评价商品</h5>
																		<?php  
																			if($gg<=0){
																				echo "此评价商品已经下架了";
																			}else{
																				@$good=mysql_fetch_array($g);
																			?>
																			<img style="width: 150px;height: 150px;" src="<?php echo $good['main_img']; ?>" />
																			<?php
																			}
																			?>
																			<div class="caption" style="text-align: center;"><?php echo $good['good_name']; ?></div>
																		</a>
																	</div>
															</td>
															<td>
																<div class="thumbnail" style="width: 180px;height: 200px;">
																	<h5 style="text-align: center;">评价图片</h5>
																	<?php
																		if($con['content_img']==''){
																			echo "此评价没有评价图片";
																		}else{
																			?>
																			<img style="width: 150px;height: 150px;" src="<?php echo $con['content_img']; ?>" />
																			<?php
																		}
																		?>
																</div>
															</td>
															<td style="line-height: 200px;">
																<a href="admin_see_order.php?book_id=<?php echo $con['book_id']; ?>"><?php echo $con['book_id']; ?></a>
															</td>
															<td>
											    			<?php
											    				$xinxin=$con['xinxin'];
											    				$ar=array("很不好","不好","一般","好","很好");
											    				?>
											    				<ul class="rating" id="rating" style="margin-top: 75px;">
											    					<?php
											    						for($i=0;$i<$xinxin;$i++){
											    							?>
											    							<li style="background-position-y: -38px;" class="rating-item" title="<?php echo $ar[$i]; ?>"></li>
											    							<?php
											    						}
											    						@$l=count($ar);
											    						for($i=$xinxin;$i<$l;$i++){
											    							?>
											    							<li class="rating-item" title="<?php echo $ar[$i]; ?>"></li>
											    							<?php
											    						}
											    						?>
											    				</ul>
											    				<?php
											    				?>
											    		</td>
											    		<td style="line-height: 200px;"><?php echo $con['comment_time']; ?></td>
											    		<td><button onclick="show_contet(<?php echo $con['commet_id']; ?>)" style="margin-top: 75px;" class="btn btn-default">查看更多</button></td>
														</tr>
														<tr>
											    		<td colspan="7">
											    			<div id="show_content<?php echo $con['commet_id'] ?>" style="width: 100%;min-height: 120px;height: auto;display: none;">
											    				<span><b>评价内容:</b></span>
											    				<div>
											    					<p>
											    						<?php echo $con['content']; ?>
											    					</p>
											    				</div>
											    			</div>
											    		</td>
											    	</tr>
														<?php
													}
														?>
														<tr>
														<td colspan="8" style="text-align: center;">
									   				<span style="line-height: 80px;font-size: 20px;"><?php echo $page; ?>-<?php echo $number; ?>页/共<?php echo $num; ?>条评价</span>
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
																				<li><a href="admin_select_content.php?page=<?php echo $pr; ?>&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>">&laquo;上一页</a></li>
																				<?php
																			}
																				?>
																				
																				<li><a href="admin_select_content.php?page=1&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>">1</a></li>
																				<li><a href="admin_select_content.php?page=2&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>">2</a></li>
																				<li><a href="admin_select_content.php?page=3&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>">3</a></li>
																				<li><a href="admin_select_content.php?page=4&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>">4</a></li>
																				<li><a href="admin_select_content.php?page=5&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>">5</a></li>
																				<li><a href="admin_select_content.php?page=6&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>">6</a></li>
																				<li class="disabled"><span>.....</span></li>
																				<li><a href="admin_select_content.php?page=<?php echo $number; ?>&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>"><?php echo $number; ?></a></li>
																				<?php
																		if($page>=$number){
																		?>
																		<li class="disabled"><span style="color: darkgray;">下一页&raquo;</span></li>
																		<?php
																		}else{
																			?>
																			<li><a href="admin_select_content.php?page=<?php echo $pn; ?>&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>">下一页&raquo;</a></li>
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
																				<li><a href="admin_select_content.php?page=<?php echo $pr; ?>&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>">&laquo;上一页</a></li>
																				<?php
																			}
																				?>
																				<?php
																					for($i=1;$i<=$number;$i++){
																						?>
																						<li><a href="admin_select_content.php?page=<?php echo $i; ?>&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>"><?php echo $i; ?></a></li>
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
																			<li><a href="admin_select_content.php?page=<?php echo $pn; ?>&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>">下一页&raquo;</a></li>
																			<?php
																		}
																			?>
																				
																		</ul>
																<?php
															}
															?>
											
										
										
														
													</tr>
													</tbody>
												</table>
											</div>
										</div>