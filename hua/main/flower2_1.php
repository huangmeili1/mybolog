<?php
while($ff=mysql_fetch_array($SQL)){
					    	$i++;
					    	?>
					    	<div class="col-md-4" style="background-color: white;">
					    		<a href="see_good.php?good_id=<?php echo $ff['good_id']; ?>">
					    		<div class="thumbnail" style="animation: Img 2s ease-out;border: 0;padding: 0;width: 100%;height: 505px;margin-top: 30px;" onmouseout="check1(<?php echo $i; ?>)" onmouseover="check(<?php echo $i; ?>)" id="thumbnail<?php echo $i; ?>">
					    			<img id="img<?php echo $i; ?>" style="width: 100%;height: 400px;" src="<?php echo $ff['main_img']; ?>" />
					    			<div class="caption" style="text-align: center;width: 100%;">
					    				<p style="color: #8A3324;font-size: 18px;"><?php echo $ff['good_name']; ?></p>
					    				<p class="text-muted">
											<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
												<?php echo $ff['material']; ?>
											</div>  
										</p>
										<p style="color: #8A3324;font-size: 20px;"><b>￥<?php echo $ff['good_price']; ?></b></p>
					    			</div>
					    		</div>
					    		</a>
					    	</div>
					    	<?php
					    }
				?>
				</div>
				
				 <?php if(@$n>0){ ?>
	   		<div class="row" style="width: 100%;margin: 0 auto;margin-bottom: 50px;margin-top: 30px;background-color: white;">
	   			<div class="col-xs-6 col-md-12" style="width: 100%;">
	   				<span style="line-height: 80px;font-size: 20px;"><?php echo $page; ?>-<?php echo $number; ?>页/共<?php echo $n; ?>件商品</span>
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
												<li><a href="javascript:lop('flower2.php?page=<?php echo $pr; ?>&type=<?php echo $type; ?>')">&laquo;上一页</a></li>
												<?php
											}
												?>
												
												<li><a href="javascript:lou('flower2.php?page=1&type=<?php echo $type; ?>')">1</a></li>
												<li><a href="javascript:lou('flower2.php?page=2&type=<?php echo $type; ?>')">2</a></li>
												<li><a href="javascript:lou('flower2.php?page=3&type=<?php echo $type; ?>')">3</a></li>
												<li><a href="javascript:lou('flower2.php?page=4&type=<?php echo $type; ?>')">4</a></li>
												<li><a href="javascript:lou('flower2.php?page=5&type=<?php echo $type; ?>')">5</a></li>
												<li><a href="javascript:lou('flower2.php?page=6&type=<?php echo $type; ?>')">6</a></li>
												<li class="disabled"><span>.....</span></li>
												<li><a href="javascript:lou('flower2.php?page=<?php echo $number; ?>&type=<?php echo $type; ?>')"><?php echo $number; ?></a></li>
												<?php
										if($page>=$number){
										?>
										<li class="disabled"><span style="color: darkgray;">下一页&raquo;</span></li>
										<?php
										}else{
											?>
											<li><a href="javascript:lou('flower2.php?page=<?php echo $pn; ?>&type=<?php echo $type; ?>')">下一页&raquo;</a></li>
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
												<li><a href="javascript:lou('flower2.php?page=<?php echo $pr; ?>&type=<?php echo $type; ?>')">&laquo;上一页</a></li>
												<?php
											}
												?>
												<?php
													for($i=1;$i<=$number;$i++){
														?>
														<li><a href="javascript:lou('flower2.php?page=<?php echo $i; ?>&type=<?php echo $type; ?>')"><?php echo $i; ?></a></li>
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
											<li><a href="javascript:lop('flower2.php?page=<?php echo $pn; ?>&type=<?php echo $type; ?>')">下一页&raquo;</a></li>
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
	   		<?php } 