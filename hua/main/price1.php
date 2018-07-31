<div class="row" style="width: 100%;margin: 0 auto;background-color: white;">
		<?php
			include("../conn/dataconnection.php");
			@$small=$_GET['small'];
			@$big=$_GET['big'];
			if(@$small==800){
			$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price>800");	
			}else{
			$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price between $small and $big");
			}
			
			@$num=mysql_num_rows($sql);
			if($num<=0){
				?>
				<div class="col-xs-6 col-md-12">
					<div>
						<?php
							if($small==800){
								?>
								<span>暂无价格<span style="color: #f13a3a;">￥<?php echo $small ?>以上</span>的鲜花推荐，<a class="btn btn-danger" href="index.php">查看更多鲜花</a></span>
								<?php
							}else{
								?>
								<span>暂无价格<span style="color: #f13a3a;">￥<?php echo $small ?>-￥<?php echo $big; ?></span>的鲜花推荐，<a class="btn btn-danger" href="index.php">查看更多鲜花</a></span>
								<?php
							}
							?>
						
					</div>
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
					    if($small==800){
					    	 $SQL=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price>800 limit $ps,$pagesize");
					    }else{
					    	 $SQL=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price between $small and $big limit $ps,$pagesize");
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
												<li><a href="javascript:lop('price1.php?page=<?php echo $pr; ?>&small=<?php echo $small ?>&big=<?php echo $big ?>')">&laquo;上一页</a></li>
												<?php
											}
												?>
												
												<li><a href="javascript:lop('price1.php?page=1&small=<?php echo $small ?>&big=<?php echo $big ?>')">1</a></li>
												<li><a href="javascript:lop('price1.php?page=2&small=<?php echo $small ?>&big=<?php echo $big ?>')">2</a></li>
												<li><a href="javascript:lop('price1.php?page=3&small=<?php echo $small ?>&big=<?php echo $big ?>')">3</a></li>
												<li><a href="javascript:lop('price1.php?page=4&small=<?php echo $small ?>&big=<?php echo $big ?>')">4</a></li>
												<li><a href="javascript:lop('price1.php?page=5&small=<?php echo $small ?>&big=<?php echo $big ?>')">5</a></li>
												<li><a href="javascript:lop('price1.php?page=6&small=<?php echo $small ?>&big=<?php echo $big ?>')">6</a></li>
												<li class="disabled"><span>.....</span></li>
												<li><a href="javascript:lop('price1.php?page=<?php echo $number; ?>&small=<?php echo $small ?>&big=<?php echo $big ?>')"><?php echo $number; ?></a></li>
												<?php
										if($page>=$number){
										?>
										<li class="disabled"><span style="color: darkgray;">下一页&raquo;</span></li>
										<?php
										}else{
											?>
											<li><a href="javascript:lop('price1.php?page=<?php echo $pn; ?>&small=<?php echo $small ?>&big=<?php echo $big ?>')">下一页&raquo;</a></li>
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
												<li><a href="javascript:lop('price1.php?page=<?php echo $pr; ?>&small=<?php echo $small ?>&big=<?php echo $big ?>')">&laquo;上一页</a></li>
												<?php
											}
												?>
												<?php
													for($i=1;$i<=$number;$i++){
														?>
														<li><a href="javascript:lop('price1.php?page=<?php echo $i; ?>&small=<?php echo $small ?>&big=<?php echo $big ?>')"><?php echo $i; ?></a></li>
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
											<li><a href="javascript:lop('price1.php?page=<?php echo $pn; ?>&small=<?php echo $small ?>&big=<?php echo $big ?>')">下一页&raquo;</a></li>
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