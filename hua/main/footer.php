			<style>
				#footer a{
					color: white;
				}
				#footer a:active{
					color: white;
					text-decoration: none;
				}
			</style>
			<?php
				$sql_know_type=mysql_query("select * from know_type limit 0,8");
				@$know_type_num=mysql_num_rows($sql_know_type);
				?>
			<div class="row" style="" id="footer">
			   	<div class="col-xs-6 col-md-12" style="background-color: #3A3A3A;height: 250px;padding: 0;margin: 0 auto;margin-top: 30px;color: white;">
					
					<div class="row" style="width: 90%;margin: 0 auto;margin-top: 30px;border: 0;padding: 0;">
					   	<div class="col-xs-6 col-md-3" style="height: 150px;border: 0;background-color: transparent;">
					   		<?php
					   			if(@$know_type_num<=0){
									?>
									
									<?php
									}else{
										?>
										<div>
										<h4>花心思</h4>
										<?php
										$S=mysql_query("select * from know_type where know_name!='支付方式' and know_name!='售后服务' limit 0,3");
										while(@$SKnow=mysql_fetch_array($S)){
											?>
											<p>
								   				<a href="article_cat.php?type=<?php echo $SKnow['know_id']; ?>"><?php echo $SKnow['know_name']; ?></a>
								   			</p>
											<?php
										}
										?>
								   		</div>
										<?php
									}
					   			?>
					   	</div>
					   	<div class="col-xs-6 col-md-3" style="height: 150px;border: 0;background-color: transparent;">
					   		<?php
					   			if(@$know_type_num<=0){
									?>
									
									<?php
									}else{
										?>
										<div>
								   			<h4>花知识</h4>
										<?php
										$Skow1=mysql_query("select * from know_type where know_name!='支付方式' and know_name!='售后服务' limit 3,4");
										while($Sknow1_2=mysql_fetch_array($Skow1)){
											?>
											<p>
								   				<a href="article_cat.php?type=<?php echo $Sknow1_2['know_id']; ?>"><?php echo $Sknow1_2['know_name']; ?></a>
								   			</p>
											<?php
										}
										?>
								   		</div>
										<?php
										
									}
					   			?>
					   	</div>
					   	<div class="col-xs-6 col-md-3" style="height: 150px;border: 0;background-color: transparent;">
					   			<?php
					   				$money=mysql_query("select * from know where kown_id=(select know_id from know_type where know_name='支付方式')");
					   				@$money_type=mysql_num_rows($money);
					   				if($money_type<=0){
					   					
					   				}else{
					   					?>
							   		<div>
							   			<h4>支付方式</h4>
					   					<?php
					   					?>
					   					<?php
					   						while($gmoney=mysql_fetch_array($money)){
					   							?>
									   			<p>
									   				<a href="article.php?hua_id=<?php echo $gmoney['hua_id']; ?>"><?php echo $gmoney['hua_title']; ?></a>
									   			</p>
					   							<?php
					   						}
					   						?>
					   					<?php
					   						?>
					   						</div>
					   						<?php
					   				}
					   				?>
					   	</div>
					   	<div class="col-xs-6 col-md-3" style="height: 150px;border: 0;padding: 0;background-color: transparent;">
					   		<div style="margin: 0 auto;text-align: center;">
					   			
					   			<?php
					   				$fu=mysql_query("select * from know where kown_id=(select know_id from know_type where know_name='售后服务')");
					   				@$fun_num=mysql_num_rows($fu);
					   				if(@$fun_num<=0){
					   					
					   				}else{
					   					?>
					   					<h4>售后</h4>
					   					<?php
					   					while($fu_fu=mysql_fetch_array($fu)){
					   						?>
									   			<p>
									   				<a href="article.php?hua_id=<?php echo $fu_fu['hua_id']; ?>"><?php echo $fu_fu['hua_title']; ?></a>
									   			</p>
					   						<?php
					   					}
					   				}
					   				?>
					   		</div>
					   	</div>
					</div>
			   	</div>
			   </div>