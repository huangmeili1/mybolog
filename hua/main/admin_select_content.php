<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>查找评价</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	body{
		margin-top: 70px;
	}
	#rating li{
		background: url(../img/star.png);
	    list-style: none;
		float: left;
		width: 31px;
		height: 33px;
	}
</style>
<?php
	session_start();
	include("../conn/dataconnection.php");
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		?>
		<div class="container" style="width: 100%;">
			<?php
				include("m_top.php");
				?>
				<div class="row">
					<div class="col-md-12" style="background-color:white;height: 100px;width: 100%;">
							<form class="bs-example bs-example-form" role="form" action="admin_select_content.php">
								<div class="input-group input-group-lg" style="margin-top: 40px;width: 700px;margin: 0 auto;margin-top: 40px;">
							        <select class="form-control" name="sel" style="height: 49px;;width: 130px;border: 2px solid #e4313d;background:#e4313d;color: white;">
										<option>评价编号</option>
										<option>用户编号</option>
										<option>订单号</option>
										<option>评价星级</option>
										<option>商品编号</option>
										<option>评价商品名称</option>
									</select>
									<input required="required" style="width: 490px;height: 49px;" name="keyword" type="text" class="form-control">
				           			 <span class="input-group-btn">
				                      <button name="tj" value="tj" class="btn btn-default" type="submit" style="height: 49px;width: 80px;background-color: #e43a3d;border: 1px solid #e43a3d;"><span style="font-size: 21px;color: white;" class="glyphicon glyphicon-search"></span></button>
				                   	</span>
								</div>
							</form>
						</div>
					</div>
				<div class="row">
					<div class="col-md-12">
						<?php
							@$keyword=$_GET['keyword'];
							@$sel=$_GET['sel'];
							?>
							<h4 style="text-align: center;">查找评价<b style="color: gray;"><?php echo $sel; ?>：<?php echo $keyword; ?></b></h4>
							<?php
							if($sel=='评价编号'){
								$sql=mysql_query("select * from comments where commet_id='$keyword'");
								@$sql_num=mysql_num_rows($sql);
							if(@$sql_num<=0){
								?>
								<div class="row">
									<div class="col-md-12" style="text-align: center;">所查找的<?php echo $sel; ?>:<?php echo $keyword; ?>暂无评价</div>
								</div>
								<?php
							}else{
								$con=mysql_fetch_array($sql);
								?>
								<div class="row">
									<div class="col-md-3" style="padding: 0;margin: 0;">
										<div class="thumbnail" style="height: 440px;width: 100%;">
											<h5 style="text-align: center;">评价商品</h5>
											<?php
												@$good_id=$con['good_id'];
												@$good=mysql_query("select * from goods where good_id='$good_id'");
												@$good_num=mysql_num_rows($good);
												if($good_num<=0){
													?>
													此商品已经下架了
													<?php
												}else{
													$g_g=mysql_fetch_array($good);
													?>
													<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $g_g['good_id'] ?>">
													<img style="height: 350px;width: 100%;" src="<?php echo $g_g['main_img']; ?>" />
													<div class="caption" style="text-align: center;"><?php echo $g_g['good_name']; ?></div>
													</a>
													<?php
												}
												?>
										</div>
									</div>
									<div class="col-md-3" style="padding: 0;margin: 0;">
													<div class="thumbnail" style="height: 440px;width: 100%;">
														<h5 style="text-align: center;">评价图片</h5>
														<?php
															if($con['content_img']==''){
																echo "此评价没有图片";
															}else{
																?>
																<img style="height: 350px;width: 100%;" src="<?php echo $con['content_img']; ?>" />
																<?php
															}
															?>
															<div class="caption">
														<?php
											    				$xinxin=$con['xinxin'];
											    				$ar=array("很不好","不好","一般","好","很好");
											    				?>
											    				<ul class="rating" id="rating">
											    					<?php
											    						for($i=0;$i<$xinxin;$i++){
											    							?>
											    							<li style="background-position-y: -38px;" class="rating-item" title="<?php echo $ar[$i]; ?>"></li>
											    							<?php
											    						}
											    						@$l=count($ar);
											    						for($i=$xinxin;$i<$l;$i++){
											    							?>
											    							<li class="rating-item" title="<?php echo $ar[$i]; ?>"></li>
											    							<?php
											    						}
											    						?>
											    				</ul>
													</div>
													</div>
												</div>
												<div class="col-md-6" style="padding: 0;margin: 0;">
													<div class="thumbnail" style="width: 100%;border: 0;padding: 0;">
													<h5><b>评价内容:</b></h5>
													<p style="line-height: 25px;text-indent: 2em;font-size: 18px;">
														<?php echo $con['content']; ?>
													</p>
													</div>
												</div>
								</div>
								<?php
							}

							}else if($sel=='用户编号'){
								$sql=mysql_query("select * from comments where user_id='$keyword'");
								@$num=mysql_num_rows($sql);
								if($num<=0){
									?>
									<div class="row">
										<div class="col-md-12" style="text-align: center;">暂无用户编号为:<?php echo $keyword; ?>的评价</div>
									</div>
									<?php
								}else{
									$pagesize=4;
									if(isset($_GET['page'])){
									$page=$_GET['page'];
									}else{
									$page=1;
									}
									$number=ceil($num/$pagesize);
									$ps=($page-1)*$pagesize;
									$SQL=mysql_query("select * from comments where user_id='$keyword' limit $ps,$pagesize");
									?>
									<?php include("admin_select_content2.php"); ?>
										<?php
								}
							}else if($sel=='订单号'){
								$sql=mysql_query("select * from comments where book_id='$keyword'");
								@$num=mysql_num_rows($sql);
								if($num<=0){
									?>
									<div class="row">
										<div class="col-md-12" style="text-align: center;">暂无订单编号为:<?php echo $keyword; ?>的评价</div>
									</div>
									<?php
								}else{
									$pagesize=20;
									if(isset($_GET['page'])){
									$page=$_GET['page'];
									}else{
									$page=1;
									}
									$number=ceil($num/$pagesize);
									$ps=($page-1)*$pagesize;
									$SQL=mysql_query("select * from comments where book_id='$keyword' limit $ps,$pagesize");
									?>
									<?php include("admin_select_content2.php"); ?>
									<?php
								}
							}else if($sel=='商品编号'){
								$sql=mysql_query("select * from comments where good_id='$keyword'");
								@$num=mysql_num_rows($sql);
								if($num<=0){
									?>
									<div class="row">
										<div class="col-md-12" style="text-align: center;">暂无商品编号为:<?php echo $keyword; ?>的评价</div>
									</div>
									<?php
								}else{
									$pagesize=20;
									if(isset($_GET['page'])){
									$page=$_GET['page'];
									}else{
									$page=1;
									}
									$number=ceil($num/$pagesize);
									$ps=($page-1)*$pagesize;
									$SQL=mysql_query("select * from comments where good_id='$keyword' limit $ps,$pagesize");
									?>
									<?php include("admin_select_content2.php"); ?>
									
								<?php
								}
							}else if($sel=='评价星级'){
								$sql=mysql_query("select * from comments where xinxin='$keyword'");
								@$num=mysql_num_rows($sql);
								if($num<=0){
									?>
									<div class="row">
										<div class="col-md-12" style="text-align: center;">暂无评价星级为:<?php echo $keyword; ?>的评价</div>
									</div>
									<?php
								}else{
									$pagesize=20;
									if(isset($_GET['page'])){
									$page=$_GET['page'];
									}else{
									$page=1;
									}
									$number=ceil($num/$pagesize);
									$ps=($page-1)*$pagesize;
									$SQL=mysql_query("select * from comments where xinxin='$keyword' limit $ps,$pagesize");
									?>
									<?php include("admin_select_content2.php"); ?>
									
								<?php
								}
							}else if($sel=='评价商品名称'){
								@$g=mysql_query("select * from goods where good_name='$keyword'");
								@$g_num=mysql_num_rows($g);
								if($g_num<=0){
									echo "<script>alert('无此商品名称的评价');history.go(-1);</script>";
								}else{
									@$gg=mysql_fetch_array($g);
									@$good_id=$gg['good_id'];
									$sql=mysql_query("select * from comments where good_id='$good_id'");
									while($con=mysql_fetch_array($sql)){
										
									
									
								?>
								<div class="row">
									<div class="col-md-3" style="padding: 0;margin: 0;">
										<div class="thumbnail" style="height: 440px;width: 100%;">
											<h5 style="text-align: center;">评价商品</h5>
											<?php
												@$good_id=$con['good_id'];
												@$good=mysql_query("select * from goods where good_id='$good_id'");
												@$good_num=mysql_num_rows($good);
												if($good_num<=0){
													?>
													此商品已经下架了
													<?php
												}else{
													$g_g=mysql_fetch_array($good);
													?>
													<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $g_g['good_id'] ?>">
													<img style="height: 350px;width: 100%;" src="<?php echo $g_g['main_img']; ?>" />
													<div class="caption" style="text-align: center;"><?php echo $g_g['good_name']; ?></div>
													</a>
													<?php
												}
												?>
										</div>
									</div>
									<div class="col-md-3" style="padding: 0;margin: 0;">
													<div class="thumbnail" style="height: 440px;width: 100%;">
														<h5 style="text-align: center;">评价图片</h5>
														<?php
															if($con['content_img']==''){
																echo "此评价没有图片";
															}else{
																?>
																<img style="height: 350px;width: 100%;" src="<?php echo $con['content_img']; ?>" />
																<?php
															}
															?>
															<div class="caption">
														<?php
											    				$xinxin=$con['xinxin'];
											    				$ar=array("很不好","不好","一般","好","很好");
											    				?>
											    				<ul class="rating" id="rating">
											    					<?php
											    						for($i=0;$i<$xinxin;$i++){
											    							?>
											    							<li style="background-position-y: -38px;" class="rating-item" title="<?php echo $ar[$i]; ?>"></li>
											    							<?php
											    						}
											    						@$l=count($ar);
											    						for($i=$xinxin;$i<$l;$i++){
											    							?>
											    							<li class="rating-item" title="<?php echo $ar[$i]; ?>"></li>
											    							<?php
											    						}
											    						?>
											    				</ul>
													</div>
													</div>
												</div>
												<div class="col-md-6" style="padding: 0;margin: 0;">
													<div class="thumbnail" style="width: 100%;border: 0;padding: 0;">
													<h5><b>评价内容:</b></h5>
													<p style="line-height: 25px;text-indent: 2em;font-size: 18px;">
														<?php echo $con['content']; ?>
													</p>
													</div>
												</div>
								</div>
								<?php
								}
								}
								?>
								<?php
							}else{
								echo "<script>alert('对不起，系统出错了，请稍后再试');history.go(-1);</script>";
							}
						?>
					</div>
				</div>
		</div>
<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>
	<script type="text/javascript">
		function show_contet(con_id){
			var commet_id=document.getElementsByClassName("commet_id");
			var show_content=document.getElementById("show_content"+con_id);
			var id=new Array();
			var a=-1;
			for(var i=0;i<commet_id.length;i++){
				a++;
				id[a]=commet_id[i].value;
			}
			if(show_content.style.display=='none'){
				show_content.style.display='block';
			}else{
				show_content.style.display='none';
			}
//			alert(id);
			for(var i=0;i<id.length;i++){
				if(id[i]==con_id){
					
				}else{
					var com=document.getElementById("show_content"+id[i]);
					com.style.display='none';
				}
			}
			
		}
	</script>