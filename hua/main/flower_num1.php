<div class="row" style="width: 100%;margin: 0 auto;background-color: white;">
		<?php
			include("../conn/dataconnection.php");
			@$type=$_GET['type'];
			if(@$type==99){
				$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and flower_num>=$type");
			}else{
				$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and flower_num=$type");
			}
			
			@$num=mysql_num_rows($sql);
			if($num<=0){
				?>
				<div class="col-xs-6 col-md-12">
					<div><span>暂无<?php echo $type; ?>鲜花推荐，<a class="btn btn-danger" href="index.php">查看更多鲜花</a></span></div>
				</div>
				<?php
			}else{
						$i=0;
						$pagesize=20;
						if(isset($_GET['page'])){
							$page=$_GET['page'];
						}else{
							$page=1;
						}
					    $number=ceil($num/$pagesize);
					    $ps=($page-1)*$pagesize;
					    if(@$type==99){
					    	$SQL=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and flower_num>=$type limit $ps,$pagesize");
					    }else{
					    	$SQL=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and flower_num=$type limit $ps,$pagesize");
					    }
						while($ff=mysql_fetch_array($SQL)){
							$i++;
							?>
							<div class="col-xs-6 col-md-4" style="background-color: white;" class="main<?php echo $i; ?>"  onmouseover="check(<?php echo $i ?>)" onmouseout="check1(<?php echo $i ?>)">
								
								<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $ff['good_id']; ?>">
								<div class="thumbnail" id="thumbnail<?php echo $i; ?>" style="width: 90%;height: 485px;margin-top: 25px;padding: 0;border: 0;">
									<img style="width: 100%;height: 370px;" src="<?php echo $ff['main_img']; ?>" />
									<div class="caption" style="text-align: center;">
										<p class="text-muted" style="text-align: center;">
											<div style="text-align: center;width:100%;color: #f13a3a; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
												<b><?php echo $ff['material']; ?></b>
											</div>  
										</p>
										<p class="text-muted">
											<b style="font-size: 18px;"><?php echo $ff['good_name'] ?></b>
										</p>
										<p>
											<b style="font-size: 18px;color: #f13a3a;">￥<?php echo $ff['good_price'] ?></b>
										</p>
									</div>
								
								</div>
								</a>
								
							</div>
							<?php
						}
			}
			?>
	</div>
	
	 <?php if(@$num>0){ ?>
	   		<div class="row" style="width: 100%;margin: 0 auto;margin-bottom: 50px;margin-top: 30px;background-color: white;">
	   			<div class="col-xs-6 col-md-12" style="width: 100%;background-color: white;">
	   				<span style="line-height: 80px;font-size: 20px;"><?php echo $page; ?>-<?php echo $number; ?>页/共<?php echo $num; ?>件商品</span>
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
												<li><a href="javascript:lop('flower_num1.php?page=<?php echo $pr; ?>&type=<?php echo $type; ?>')">&laquo;上一页</a></li>
												<?php
											}
												?>
												
												<li><a href="javascript:lop('flower_num1.php?page=1&type=<?php echo $type; ?>')">1</a></li>
												<li><a href="javascript:lop('flower_num1.php?page=2&type=<?php echo $type; ?>')">2</a></li>
												<li><a href="javascript:lop('flower_num1.php?page=3&type=<?php echo $type; ?>')">3</a></li>
												<li><a href="javascript:lop('flower_num1.php?page=4&type=<?php echo $type; ?>')">4</a></li>
												<li><a href="javascript:lop('flower_num1.php?page=5&type=<?php echo $type; ?>')">5</a></li>
												<li><a href="javascript:lop('flower_num1.php?page=6&type=<?php echo $type; ?>')">6</a></li>
												<li class="disabled"><span>.....</span></li>
												<li><a href="javascript:lop('flower_num1.php?page=<?php echo $number; ?>&type=<?php echo $type; ?>')"><?php echo $number; ?></a></li>
												<?php
										if($page>=$number){
										?>
										<li class="disabled"><span style="color: darkgray;">下一页&raquo;</span></li>
										<?php
										}else{
											?>
											<li><a href="javascript:lop('flower_num1.php?page=<?php echo $pn; ?>&type=<?php echo $type; ?>')">下一页&raquo;</a></li>
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
												<li><a href="javascript:lop('flower_num1.php?page=<?php echo $pr; ?>&type=<?php echo $type; ?>')">&laquo;上一页</a></li>
												<?php
											}
												?>
												<?php
													for($i=1;$i<=$number;$i++){
														?>
														<li><a href="javascript:lop('flower_num1.php?page=<?php echo $i; ?>&type=<?php echo $type; ?>')"><?php echo $i; ?></a></li>
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
											<li><a href="javascript:lop('flower_num1.php?page=<?php echo $pn; ?>&type=<?php echo $type; ?>')">下一页&raquo;</a></li>
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