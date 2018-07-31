<?php
while($ff=mysql_fetch_array($SQL)){
						?>
						<div class="col-xs-6 col-md-3" style="background: white;border: 0;">
							<div class="thumbnail" style="text-align: center;height: 370px;border: 0;">
					            <a href="see_good.php?good_id=<?php echo $ff['good_id']; ?>">
					            	<img style="height: 250px;" src="<?php echo $ff['main_img']; ?>"
					            </a>
					            <div class="caption">
					                <p class="text-muted">
					                	  <a style="color: black;" href="see_good.php?good_id=<?php echo $ff['good_id']; ?>">
					                	  	<?php echo $ff['good_name'] ?>
					                	  		
					                	  	</a>
					                	
					                </p>
					                <span style="color: red;">原价:<del><?php echo $ff['prime_cost'] ?>&nbsp;&nbsp;&nbsp;</del></span>
					                <span style="font-size: 18px;color: #F01B2D;">现价:<?php echo $ff['good_price'] ?></span>
					                <p>
					                	
					            <?php
								if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
									?>
									<a style="color: black;" href="collect.php?good_id=<?php echo $ff['good_id'] ?>" class="btn btn-default" role="button">
					                             	 收藏&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-heart-empty"></span>
					               </a>
									<?php
								}else{
									?>
									<a style="color: black;" href="#" class="btn btn-default" data-toggle="modal" data-target="#myModal" role="button">
					                             	 收藏&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-heart-empty"></span>
					               </a>
									<?php
								}
								?>
					                    
					                    <?php
					                    	if($ff['sum']==0){
					                			?>
					                			<button  class="btn btn-danger">库存不足</button>
					                			<?php
					                		}else{
							                	if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
													?>
													<a style="color: black;" href="#"  onclick="addCart(<?php echo $ff['good_id'] ?>)" class="btn btn-default" role="button">
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
					        </div>
						</div>
						<?php
					}
?>