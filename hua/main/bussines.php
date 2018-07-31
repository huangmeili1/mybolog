<div class="col-md-12" style="background-color: white;">
				<div class="row">
					<?php
				include("../conn/dataconnection.php");
				$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%开业%' or festival like '%开业%' or object like '%开业%')");
				@$n=mysql_num_rows($sql);
				if(@$n<=0){
					?>
					<div class="col-md-12">
						<span>暂无鲜花推荐，<a class="btn btn-danger" href="index.php">查看更多</a></span>
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
					    $number=ceil($n/$pagesize);
					    $ps=($page-1)*$pagesize;
					    $SQL=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%开业%' or festival like '%开业%' or object like '%开业%') limit $ps,$pagesize");
 						while($ff=mysql_fetch_array($SQL)){
					    	$i++;
					    	?>
					    	<div class="col-md-4" style="background-color: white;">
					    		<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $ff['good_id']; ?>">
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
					    	}?>
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
												<li><a href="javascript:lop('bussines.php?page=<?php echo $pr; ?>')">&laquo;上一页</a></li>
												<?php
											}
												?>
												
												<li><a href="javascript:lop('bussines.php?page=1')">1</a></li>
												<li><a href="javascript:lop('bussines.php?page=2')">2</a></li>
												<li><a href="javascript:lop('bussines.php?page=3')">3</a></li>
												<li><a href="javascript:lop('bussines.php?page=4')">4</a></li>
												<li><a href="javascript:lop('bussines.php?page=5')">5</a></li>
												<li><a href="javascript:lop('bussines.php?page=6')">6</a></li>
												<li class="disabled"><span>.....</span></li>
												<li><a href="javascript:lop('bussines.php?page=<?php echo $number; ?>')"><?php echo $number; ?></a></li>
												<?php
										if($page>=$number){
										?>
										<li class="disabled"><span style="color: darkgray;">下一页&raquo;</span></li>
										<?php
										}else{
											?>
											<li><a href="javascript:lop('bussines.php?page=<?php echo $pn; ?>')">下一页&raquo;</a></li>
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
												<li><a href="javascript:lop('bussines.php?page=<?php echo $pr; ?>')">&laquo;上一页</a></li>
												<?php
											}
												?>
												<?php
													for($i=1;$i<=$number;$i++){
														?>
														<li><a href="javascript:lop('bussines.php?page=<?php echo $i; ?>')"><?php echo $i; ?></a></li>
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
											<li><a href="javascript:lop('bussines.php?page=<?php echo $pn; ?>')">下一页&raquo;</a></li>
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
				
			</div>
				<?php
				}
				?>