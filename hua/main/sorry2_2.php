<?php
 if(@$num>0){ ?>
	   		<div class="row" style="">
	   			<div class="col-xs-6 col-md-12" style="width: 100%;">
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
											<td width="80"><a style="color: dimgrey;" href="javascript:lop('sorry2.php?page=<?php echo $pr; ?>&type=<?php echo $type; ?>')"><span>上一页</span></a></td>
											<?php
										}
										?>
									<td width="35" align="center" height="40"><a href="javascript:lop('sorry2.php?page=1&type=<?php echo $type; ?>')"><span>1</span></a></td>
									<td width="35" align="center" height="40"><a href="javascript:lop('sorry2.php?page=2&type=<?php echo $type; ?>')"><span>2</span></a></td>
									<td width="35" align="center" height="40"><a href="javascript:lop('sorry2.php?page=3&type=<?php echo $type; ?>')"><span>3</span></a></td>
									<td width="35" align="center" height="40"><a href="javascript:lop('sorry2.php?page=4&type=<?php echo $type; ?>')"><span>4</span></a></td>
									<td width="35" align="center" height="40"><a href="javascript:lop('sorry2.php?page=5&type=<?php echo $type; ?>')"><span>5</span></a></td>
									<td width="35" align="center" height="40"><a href="javascript:lop('sorry2.php?page=6&type=<?php echo $type; ?>')"><span>6</span></a></td>
									<td width="35" align="center" height="40"><span>.....</span></td>
									<td width="35" align="center" height="40"><a href="javascript:lop('sorry2.php?page=<?php echo $number; ?>&type=<?php echo $type; ?>')"><span><?php echo $number; ?></span></a></td>
										<?php
										if($page>=$number){
										?>
										<td width="80"><span>下一页></span></td>
										<?php	
										}else{
											?>
											<td width="80"><a href="javascript:lop('sorry2.php?page=<?php echo $pn; ?>&type=<?php echo $type; ?>')"><span>下一页></span></a></td>
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
											<td width="80"><a href="javascript:lop('sorry2.php?page=<?php echo $pr ?>&type=<?php echo $type; ?>')"><span>上一页</span></a></td>
											<?php
										}
										for($i=1;$i<=$number;$i++){
											?>
											<td width="35" height="40" align="center"><a href="javascript:lop('sorry2.php?page=<?php echo $i; ?>&type=<?php echo $type; ?>')"><span><?php echo $i; ?></span></a></td>
											<?php
										}
										if($page>=$number){
										?>
										<td width="80"><span>下一页></span></td>
										<?php	
										}else{
											?>
											<td width="80"><a href="javascript:lop('sorry2.php?page=<?php echo $pn; ?>&type=<?php echo $type; ?>')"><span>下一页></span></a></td>
											<?php
										}
										?>
								</tr>
							</table>
						</td>
								<?php
							}
							?>
			
		</div>
		
		
						
					</tr>
				</table>
	   			</div>
	   		</div>
	   		<?php } ?>
