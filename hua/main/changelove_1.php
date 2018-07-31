<?php 
	
	while($f=mysql_fetch_array($SQL)){
						?>
						<div class="col-xs-6 col-md-3" style="background: white;">
									<div  class="thumbnail">
										<a href="see_good.php?good_id=<?php echo $f['good_id'] ?>"><img style="height: 230px;width: 250px;" src="<?php echo $f['main_img']; ?>" /></a>
											<div class="caption" style="height: 110px;text-align: center;">
								                <h5 style="color:#FF9900 ;"><b>￥<?php echo $f['good_price'] ?></b></h5>
								                <a style="color: dimgray;" href="see_good.php?good_id=<?php echo $f['good_id'] ?>"><p><?php echo $f['good_name'] ?></p></a>
								                <p>
								                	
								                	<?php
								                		if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
								                			?>
								                			<a href="collect.php?good_id=<?php echo $f['good_id']; ?>" class="btn btn-default" role="button">
								                     		  收藏
								                    		</a> 
								                			<?php
								                		}else{
								                			?>
								                			<a href="#" onclick="checkuser()" class="btn btn-default" role="button">
								                     		  收藏
								                    		</a> 
								                			<?php
								                		}
								                		?>
								                    
								                    <?php
								                    	if($f['sum']==0){
								                    		?>
								                    		<button class="btn btn-danger">库存不足</button>
								                    		<?php
								                    	}else{
								                    		if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
								                			?>
								                			<a href="#" onclick="addCart(<?php echo $f['good_id'] ?>)" class="btn btn-default" role="button">
								                     		加入购物车
								                   			 </a> 
								                			<?php
								                		}else{
								                			?>
								                			<a href="#" onclick="checkuser()" class="btn btn-default" role="button">
								                     		加入购物车
								                    		</a>
								                			<?php
								                		}
								                    	}
								                		
								                		?>
								                </p>
								            </div>
									</div>
								</div>
								<?php
					}
	   		
	   			 ?>
	   	</div>
	   	<?php if(@$num>0){ ?>
	   		<div class="row">
	   			<div class="col-xs-6 col-md-12" style="width: 97.7%;">
	   				<?php
					$pr=$page-1;
					$pn=$page+1;
					?>
				<table style="line-height: 100px;width: 100%;">
					<tr>
						<td align="left">
							<?php echo @$page; ?>-<?php echo $number; ?>/共<?php echo $num;?>件商品
						</td>
						<?php
							if($number>=9){
								?>
						<td align="right" style="width: 830px;">
							<table border="1">
								<tr>
									<?php
										if($page<=1){
											?>
											<td width="80"><span><上一页</span></td>
											<?php
										}else{
											?>
											<td width="80"><a style="color: dimgrey;" href="javascript:lou('chagelove.php?type=<?php echo $type; ?>&page=<?php echo $pr; ?>')"><span><上一页</span></a></td>
											<?php
										}
										?>
									<td width="35" align="center" height="40"><a href="javascript:lou('chagelove.php?type=<?php echo $type; ?>&page=1')"><span>1</span></a></td>
									<td width="35" align="center" height="40"><a href="javascript:lou('chagelove.php?type=<?php echo $type; ?>&page=2')"><span>2</span></a></td>
									<td width="35" align="center" height="40"><a href="javascript:lou('chagelove.php?type=<?php echo $type; ?>&page=3')"><span>3</span></a></td>
									<td width="35" align="center" height="40"><a href="javascript:lou('chagelove.php?type=<?php echo $type; ?>&page=4')"><span>4</span></a></td>
									<td width="35" align="center" height="40"><a href="javascript:lou('chagelove.php?type=<?php echo $type; ?>&page=5')"><span>5</span></a></td>
									<td width="35" align="center" height="40"><a href="javascript:lou('chagelove.php?type=<?php echo $type; ?>&page=6')"><span>6</span></a></td>
									<td width="35" align="center" height="40"><span>.....</span></td>
									<td width="35" align="center" height="40"><a href="javascript:lou('chagelove.php?type=<?php echo $type; ?>&page=<?php echo $number; ?>')"><span><?php echo $number; ?></span></a></td>
										<?php
										if($page>=$number){
										?>
										<td width="80"><span>下一页></span></td>
										<?php	
										}else{
											?>
											<td width="80"><a href="javascript:lou('chagelove.php?type=<?php echo $type; ?>&page=<?php echo $pn; ?>')"><span>下一页></span></a></td>
											<?php
										}
										?>
								</tr>
							</table>
						</td>
								<?php
							}else{
								?>
						<td align="right" style="width: 830px;">
							<table border="1">
								<tr>
									<?php
										if($page<=1){
											?>
											<td width="80"><span><上一页</span></td>
											<?php
										}else{
											?>
											<td width="80"><a href="javascript:lou('chagelove.php?type=<?php echo $type; ?>&page=<?php echo $pr; ?>')"><span><上一页</span></a></td>
											<?php
										}
										for($i=1;$i<=$number;$i++){
											?>
											<td width="35" height="40" align="center"><a href="javascript:lou('chagelove.php?type=<?php echo $type; ?>&page=<?php echo $i; ?>')"><span><?php echo $i; ?></span></a></td>
											<?php
										}
										if($page>=$number){
										?>
										<td width="80"><span>下一页></span></td>
										<?php	
										}else{
											?>
											<td width="80"><a href="javascript:lou('chagelove.php?type=<?php echo $type; ?>&page=<?php echo $pn; ?>')"><span>下一页></span></a></td>
											<?php
										}
										?>
								</tr>
							</table>
						</td>
								<?php
							}
							?>
						
					</tr>
				</table>
	   			</div>
	   		</div>
	   		<?php }
	?>