<div class="col-xs-6 col-md-12" style="width: 100%;margin: 0 auto;height: 40px;">
			<div class="row" id="elder">
				<?php
					include_once("../conn/dataconnection.php");
					$sqll=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%长辈%' or good_use like'%父母%' or festival='父亲节' or festival='母亲节' or object like '%父母%' or object like '%长辈%')");
					@$num=mysql_num_rows($sqll);
					if(@$num<=0){
						?>
						<div class="col-xs-6 col-md-12" style="text-align: center;">
							<span style="text-align: center;line-height: 80px;">暂无长辈鲜花推荐，<a class="btn btn-danger" href="flower.php">更多鲜花查看</a></span>
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
					    $SQL=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_use like '%长辈%' or good_use like'%父母%' or festival='父亲节' or festival='母亲节' or object like '%父母%' or object like '%长辈%') limit $ps,$pagesize");
						while($ff=mysql_fetch_array($SQL)){
							$i++;
							?>
								<div class="col-xs-6 col-md-3" id="bbb<?php echo $i; ?>" onmouseover="check(<?php echo $i ?>)" onmouseout="check1(<?php echo $i ?>)">
									<a href="see_good.php?good_id=<?php echo $ff['good_id']; ?>">
									<div class="thumbnail" id="thumbnail<?php echo $i ?>" style="height: 420px;text-align: center;">
										<img style="height: 300px;width: 100%;" src="<?php echo $ff['main_img'] ?>" />
										<div class="caption" id="brith<?php echo $i; ?>">
											<p class="text-muted"><?php echo $ff['good_name'] ?></p>
											<p>
												<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
													<?php echo $ff['material']; ?>
												</div>  
											</p>
											<p style="font-size: 24px;">￥<?php echo $ff['good_price'] ?></p>
											
										</div>
										<div class="caption" style="display: none;background-color:#f3ddb3;height: 110px;" id="b<?php echo $i; ?>">
											<a style="height: 50px;line-height: 30px;width: 200px;background: #c11229;margin-top: 30px;" class="btn btn-danger btn-lg" href="see_good.php?good_id=<?php echo $ff['good_id']; ?>"><span>立即购买</span></a>
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
											<td width="80"><a style="color: dimgrey;" href="javascript:lop('elder1.php?page=<?php echo $pr; ?>)"><span>上一页</span></a></td>
											<?php
										}
										?>
									<td width="35" align="center" height="40"><a href="javascript:lop('elder1.php?page=1')"><span>1</span></a></td>
									<td width="35" align="center" height="40"><a href="javascript:lop('elder1.php?page=2')"><span>2</span></a></td>
									<td width="35" align="center" height="40"><a href="javascript:lop('elder1.php?page=3')"><span>3</span></a></td>
									<td width="35" align="center" height="40"><a href="javascript:lop('elder1.php?page=4')"><span>4</span></a></td>
									<td width="35" align="center" height="40"><a href="javascript:lop('elder1.php?page=5')"><span>5</span></a></td>
									<td width="35" align="center" height="40"><a href="javascript:lop('elder1.php?page=6')"><span>6</span></a></td>
									<td width="35" align="center" height="40"><span>.....</span></td>
									<td width="35" align="center" height="40"><a href="javascript:lop('elder1.php?page=<?php echo $number; ?>')"><span><?php echo $number; ?></span></a></td>
										<?php
										if($page>=$number){
										?>
										<td width="80"><span>下一页></span></td>
										<?php	
										}else{
											?>
											<td width="80"><a href="javascript:lop('elder1.php?page=<?php echo $pn; ?>')"><span>下一页></span></a></td>
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
											<td width="80"><a href="javascript:lop('elder1.php?page=<?php echo $pr ?>')"><span>上一页</span></a></td>
											<?php
										}
										for($i=1;$i<=$number;$i++){
											?>
											<td width="35" height="40" align="center"><a href="javascript:lop('elder1.php?page=<?php echo $i; ?>')"><span><?php echo $i; ?></span></a></td>
											<?php
										}
										if($page>=$number){
										?>
										<td width="80"><span>下一页></span></td>
										<?php	
										}else{
											?>
											<td width="80"><a href="javascript:lop('elder1.php?page=<?php echo $pn; ?>')"><span>下一页></span></a></td>
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