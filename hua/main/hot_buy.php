<div style="height: 35px;background: #FF7100;line-height: 35px;text-align: center;">热销鲜花推荐</div>
			<div class="row" style="margin-top:10px;">
				<?php 
					$sql2=mysql_query("select * from goods order by sales desc limit 0,4");
					@$u=mysql_num_rows($sql2);
					if($u<0){
						echo "暂无热销鲜花推荐";
					}else{
						while($e=mysql_fetch_array($sql2)){
							?>
							<div class="col-xs-6 col-md-12" style="background: white;">
								<div class="thumbnail" style="text-align: center;height: 370px;border: 0;">
									<a style="color: black;" href="see_good.php?good_id=<?php echo $e['good_id']; ?>">
										<img style="height: 230px;" src="<?php  echo $e['main_img']; ?>" />
									</a>
									<div class="caption">
					                <a style="color: black;" href="see_good.php?good_id=<?php echo $e['good_id']; ?>">
					                	<p class="text-muted"><?php echo $e['good_name'] ?></p>
					                </a>
					                <span style="color: red;">原价:<del><?php echo $e['prime_cost'] ?>&nbsp;&nbsp;&nbsp;</del></span>
					                <span style="font-size: 16px;color: #F01B2D;">现价:<?php echo $e['good_price'] ?></span>
					                <p>
					                	
					                	<?php
					                		if($e['sum']==0){
					                			?>
					                			<button class="btn btn-danger">库存不足</button>
					                			<?php
					                		}else{
					                			if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
											?>
											<a style="color: black;" href="#" onclick="addCart(<?php echo $e['good_id'] ?>)" class="btn btn-default" role="button">
						                        	加入购物车<span class="glyphicon glyphicon-shopping-cart"></span>
						                   </a>
											<?php
										}else{
											?>
											<a style="color: black;" href="#"  data-toggle="modal" data-target="#myModal" class="btn btn-default" role="button">
						                        	加入购物车<span class="glyphicon glyphicon-shopping-cart"></span>
						                   </a>
											<?php
										}
					                		}
										
										?>
					                </p>
					            </div>
					            <hr size="2" color="gainsboro" />
								</div>
							</div>
							<?php
						}
					}
					
					 ?>
			</div>