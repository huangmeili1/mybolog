 <?php
 	while(@$order=mysql_fetch_array($SQL)){
											    	?>
											    	<tr id="trrr<?php echo $order['book_id']; ?>">
											    		<?php
											    			if(($sel=='订单状态'&&$keyword=='已评价')||($sel=='订单状态'&&$keyword=='未发货')){
											    				?>
													    		<td>
													    			<input name="book_select" id="book_<?php echo $order['book_id']; ?>" type="checkbox" value="<?php echo $order['book_id']; ?>" />
													    		</td>
											    				<?php
											    			}
											    			?>
											    		
											    		<td>
											    			<?php echo $order['book_id']; ?>
											    		</td>
											    		<td>
											    			<?php echo $order['user_id']; ?>
											    		</td>
											    		<td>
											    			￥
											    			<?php
											    				echo $order['sum_price'];
											    				?>
											    		</td>
											    		<td>
											    			<?php
											    				$get_id=$order['get_id'];
											    				@$g=mysql_query("select * from getinfo where get_id='$get_id'");
											    				@$get_num=mysql_num_rows($g);
											    				if($get_num<=0){
											    					?>
											    					<span>该收货人已被用户删除</span>
											    					<?php
											    				}else{
											    					@$get_name=mysql_fetch_array($g);
											    					echo $get_name['get_name'];
											    				}
											    				?>
											    		</td>
											    		<td>
											    			<?php echo $order['state']; ?>
											    		</td>
											    		<td>
											    			<?php
											    				@$get_money=$order['money_id'];
											    				@$m=mysql_query("select * from getmoney where money_id='$get_money'");
											    				@$m_e=mysql_num_rows($m);
											    				if($m_e<=0){
											    					?>
											    					<span>该付钱方式已经被取消</span>
											    					<?php
											    				}else{
											    					@$money_name=mysql_fetch_array($m);
											    					echo $money_name['get_money'];
											    				}
											    				?>
											    		</td>
											    		<td>
											    			<?php
											    				echo $order['book_time'];
											    				?>
											    		</td>
											    		<td>
											    			<?php
											    				echo $order['send_time'];
											    				?>
											    		</td>
											    		<td>
											    			<a href="admin_see_order.php?book_id=<?php echo $order['book_id']; ?>" class="btn btn-default"  style="text-decoration: none;">查看</a>
											    			<?php
											    				if($order['state']=='未发货'){
											    					?>
											    					<button id="bu_confirm<?php echo $order['book_id']; ?>" onclick="con_send(<?php echo $order['book_id']; ?>)" class="btn btn-default" style="text-decoration: none;">确认发货</button>
											    					<?php
											    				}
//											    				else if($order['state']=='已评价'){
//											    					?>
							    					<!--<button class="btn btn-default" style="text-decoration: none;">查看评价</button>-->
										    					<?php
//											    				}
											    				?>
											    		</td>
											    	</tr>
											    	<?php
											    }
												?>
												<?php
													if($sel=='订单状态'&&$keyword=='已评价'){
														?>
														<tr>
															<td colspan="10">
																<button onclick="all_del()" class="btn btn-danger">
																	批量删除
																</button>
															</td>
														</tr>
														<?php
													}
													if($sel=='订单状态'&&$keyword=='未发货'){
														?>
														<tr>
															<td colspan="10">
																<button onclick="all_sent()" class="btn btn-danger">
																	批量发货
																</button>
																<a href="xina_sent_order.php" class="btn btn-danger">下载所有未发货订单</a>
															</td>
														</tr>
														<?php
													}
													if($sel=='订单状态'&&$keyword=='待收货'){
														?>
														<tr>
															<td colspan="10">
																<a href="xina_order_state.php?sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>" class="btn btn-danger">下载所有待收货订单</a>
															</td>
														</tr>
														<?php
													}
													
													if($sel=='用户编号'){
														?>
														<tr>
															<td colspan="10">
																<a href="xina_select_user.php?sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>" class="btn btn-danger">
																	下载表格文件
																</a>
															</td>
														</tr>
														<?php
													}
													?>
												
												<tr>
												<td colspan="10" style="text-align: center;">
									   				<span style="line-height: 80px;font-size: 20px;"><?php echo $page; ?>-<?php echo $number; ?>页/共<?php echo $sql_num; ?>个订单</span>
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
																				<li><a href="select_order.php?page=<?php echo $pr; ?>&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>&tj=tj">&laquo;上一页</a></li>
																				<?php
																			}
																				?>
																				
																				<li><a href="select_order.php?page=1&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>&tj=tj">1</a></li>
																				<li><a href="select_order.php?page=2&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>&tj=tj">2</a></li>
																				<li><a href="select_order.php?page=3&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>&tj=tj">3</a></li>
																				<li><a href="select_order.php?page=4&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>&tj=tj">4</a></li>
																				<li><a href="select_order.php?page=5&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>&tj=tj">5</a></li>
																				<li><a href="select_order.php?page=6&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>&tj=tj">6</a></li>
																				<li class="disabled"><span>.....</span></li>
																				<li><a href="select_order.php?page=<?php echo $number; ?>&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>&tj=tj"><?php echo $number; ?></a></li>
																				<?php
																		if($page>=$number){
																		?>
																		<li class="disabled"><span style="color: darkgray;">下一页&raquo;</span></li>
																		<?php
																		}else{
																			?>
																			<li><a href="select_order.php?page=<?php echo $pn; ?>&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>&tj=tj">下一页&raquo;</a></li>
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
																				<li><a href="select_order.php?page=<?php echo $pr; ?>&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>&tj=tj">&laquo;上一页</a></li>
																				<?php
																			}
																				?>
																				<?php
																					for($i=1;$i<=$number;$i++){
																						?>
																						<li><a href="select_order.php?page=<?php echo $i; ?>&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>&tj=tj"><?php echo $i; ?></a></li>
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
																			<li><a href="select_order.php?page=<?php echo $pn; ?>&sel=<?php echo $sel ?>&keyword=<?php echo $keyword; ?>&tj=tj">下一页&raquo;</a></li>
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
			<?php
		
		?>
		</div>
		<script type="text/javascript">
			function xina_selec(){
				alert("你好");
			}
		</script>