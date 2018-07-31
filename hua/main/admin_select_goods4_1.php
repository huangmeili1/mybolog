<?php while($flower=mysql_fetch_array($SQL)){
											?>
											<tr>
												<td>
													<div class="thumbnail" style="padding: 0;margin: 0;width: 100px;">
														<img src="<?php echo $flower['main_img']; ?>" />
													</div>
												</td>
												<td style="line-height: 100px;"><?php echo $flower['good_name']; ?></td>
												<td style="line-height: 100px;">￥<?php echo $flower['good_price']; ?></td>
												<td style="line-height: 100px;">￥<?php echo $flower['prime_cost']; ?></td>
												<td style="line-height: 100px;">￥<?php echo $flower['buy_price']; ?></td>
												<td style="line-height: 100px;"><?php echo $flower['sales']; ?></td>
												<td style="line-height: 100px;"><?php echo $flower['good_num'] ?></td>
												<td style="line-height: 100px;"><?php echo $flower['sum'] ?></td>
												<td style="line-height: 100px;"><?php echo $flower['object'] ?></td>
												<td style="line-height: 100px;">
													<a href="see_good.php?good_id=<?php echo $flower['good_id'] ?>">查看</a>
													<a href="update_good.php?good_id=<?php echo $flower['good_id'] ?>">修改</a>
													<a href="del_goods.php?good_id=<?php echo $flower['good_id']; ?>">删除</a>
												</td>
											</tr>
											<?php
										}
											?>
											<tr>
											<td colspan="10" style="text-align: center;">
									   				<span style="line-height: 80px;font-size: 20px;"><?php echo $page; ?>-<?php echo $number; ?>页/共<?php echo $sql_num; ?>件商品</span>
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
																				<li><a href="admin_select_goods4.php?page=<?php echo $pr; ?>&sel=<?php echo $sel ?>&keyword=<?php echo $keywrod; ?>&tj=tj">&laquo;上一页</a></li>
																				<?php
																			}
																				?>
																				
																				<li><a href="admin_select_goods4.php?page=1&sel=<?php echo $sel ?>&keyword=<?php echo $keywrod; ?>&tj=tj">1</a></li>
																				<li><a href="admin_select_goods4.php?page=2&sel=<?php echo $sel ?>&keyword=<?php echo $keywrod; ?>&tj=tj">2</a></li>
																				<li><a href="admin_select_goods4.php?page=3&sel=<?php echo $sel ?>&keyword=<?php echo $keywrod; ?>&tj=tj">3</a></li>
																				<li><a href="admin_select_goods4.php?page=4&sel=<?php echo $sel ?>&keyword=<?php echo $keywrod; ?>&tj=tj">4</a></li>
																				<li><a href="admin_select_goods4.php?page=5&sel=<?php echo $sel ?>&keyword=<?php echo $keywrod; ?>&tj=tj">5</a></li>
																				<li><a href="admin_select_goods4.php?page=6&sel=<?php echo $sel ?>&keyword=<?php echo $keywrod; ?>&tj=tj">6</a></li>
																				<li class="disabled"><span>.....</span></li>
																				<li><a href="admin_select_goods4.php?page=<?php echo $number; ?>&sel=<?php echo $sel ?>&keyword=<?php echo $keywrod; ?>&tj=tj"><?php echo $number; ?></a></li>
																				<?php
																		if($page>=$number){
																		?>
																		<li class="disabled"><span style="color: darkgray;">下一页&raquo;</span></li>
																		<?php
																		}else{
																			?>
																			<li><a href="admin_select_goods4.php?page=<?php echo $pn; ?>&sel=<?php echo $sel ?>&keyword=<?php echo $keywrod; ?>&tj=tj">下一页&raquo;</a></li>
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
																				<li><a href="admin_select_goods4.php?page=<?php echo $pr; ?>&sel=<?php echo $sel ?>&keyword=<?php echo $keywrod; ?>&tj=tj">&laquo;上一页</a></li>
																				<?php
																			}
																				?>
																				<?php
																					for($i=1;$i<=$number;$i++){
																						?>
																						<li><a href="admin_select_goods4.php?page=<?php echo $i; ?>&sel=<?php echo $sel ?>&keyword=<?php echo $keywrod; ?>&tj=tj"><?php echo $i; ?></a></li>
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
																			<li><a href="admin_select_goods4.php?page=<?php echo $pn; ?>&sel=<?php echo $sel ?>&keyword=<?php echo $keywrod; ?>&tj=tj">下一页&raquo;</a></li>
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