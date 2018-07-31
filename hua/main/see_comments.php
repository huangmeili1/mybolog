<meta charset="utf-8" />

<?php
	session_start();
	include_once("../conn/dataconnection.php");
//	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		@$num=$_POST['num'];
		@$good_id=$_POST['good_id'];
		if($num==0){
			@$comments=mysql_query("select * from comments where good_id='$good_id'");
			@$con_num=mysql_num_rows($comments);
			if($con_num>0){
								?>
											<div style="text-align: center;margin-bottom: 25px;">全部评价共<?php echo @$con_num; ?>条</div>
											<?php
											while($con=mysql_fetch_array($comments)){
												?>
												
													<div class="panel panel-default">
													    <div class="panel-body">
															<div class="media">
															    <div class="media-left" style="width: 150px;">
															    	<?php
															    		if($con['content_img']==''){
															    			
															    		}else{
															    			?>
															    			<img style="width: 150px;height: 150px;" class="media-object" src="<?php echo $con['content_img']; ?>" alt="媒体对象">
															    	<h5 align="center">评价图片</h5>
															    			<?php
															    		}
															    		?>
															        
															    </div>
															    <div class="media-body">
															        <h5 class="media-heading">
															        	整体评分
															        	<?php
															        		$xinxin=$con['xinxin'];
															        		$xin=array("很不好","不好","一般","好","很好");
															        		?>
															        	<ul class="rating" id="rating">
															        		<?php
															        			for($i=0;$i<$xinxin;$i++){
															        				?>
															        				<li class="rating-item" style="background-position-y: -38px;" title="<?php echo $xin[$i]; ?>"></li>
															        				<?php
															        			}
															        			$le=count($xin);
															        			for($i=$xinxin;$i<$le;$i++){
															        				?>
															        				<li class="rating-item" title="<?php echo $xin[$i]; ?>"></li>
															        				<?php
															        			}
															        			?>
															        	</ul>
															        	<span style="margin-left: 200px;">评价时间：<?php
															        		echo $con['comment_time'];
															        		?></span>
															        </h5>
															        <hr size="3" color="gray" />
															        <p>
															        	<?php echo $con['content']; ?>
															        </p>
															    </div>
															</div>
													    </div>
													</div>
												
												<?php
											}
											?>
											<?php
										}
		}else{
			@$comments=mysql_query("select * from comments where good_id='$good_id' and xinxin='$num'");
			@$con_num=mysql_num_rows($comments);
			if($con_num>0){
								?>
									<div style="text-align: center;margin-bottom: 25px;"><?php echo $num ?>星评价共<?php echo @$con_num; ?>条</div>
											<?php
											while($con=mysql_fetch_array($comments)){
												?>
												
													<div class="panel panel-default">
													    <div class="panel-body">
															<div class="media">
															    <div class="media-left" style="width: 150px;">
															    	<?php
															    		if($con['content_img']==''){
															    			?>
															    			<?php
															    		}else{
															    			?>
																	    	<img style="width: 150px;height: 150px;" class="media-object" src="<?php echo $con['content_img']; ?>" alt="媒体对象">
																	    	<h5 align="center">评价图片</h5>
															    			<?php
															    		}
															    		?>
															        
															    </div>
															    <div class="media-body">
															        <h5 class="media-heading">
															        	整体评分
															        	<?php
															        		$xinxin=$con['xinxin'];
															        		$xin=array("很不好","不好","一般","好","很好");
															        		?>
															        	<ul class="rating" id="rating">
															        		<?php
															        			for($i=0;$i<$xinxin;$i++){
															        				?>
															        				<li class="rating-item" style="background-position-y: -38px;" title="<?php echo $xin[$i]; ?>"></li>
															        				<?php
															        			}
															        			$le=count($xin);
															        			for($i=$xinxin;$i<$le;$i++){
															        				?>
															        				<li class="rating-item" title="<?php echo $xin[$i]; ?>"></li>
															        				<?php
															        			}
															        			?>
															        	</ul>
															        	<span style="margin-left: 200px;">评价时间：<?php
															        		echo $con['comment_time'];
															        		?></span>
															        </h5>
															        <hr size="3" color="gray" />
															        <p>
															        	<?php echo $con['content']; ?>
															        </p>
															    </div>
															</div>
													    </div>
													</div>
												
												<?php
											}
											?>
											<?php
										}else{
											?>
											<div class="row">
												<div class="col-md-12">
													<h4 style="text-align: center;">暂无<?php echo $num ?>星评价</h4>
												</div>
											</div>
											<?php
										}
		}
?>
<?php
//		 }else{
//	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";} 
	?>