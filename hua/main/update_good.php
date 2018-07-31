<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>修改商品</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	#ImgBox{ 
		position:fixed;width: 0px;height: 650px;z-index: 100 !important;left: 340px;top:0px;
		opacity: 1;
	}
	.carousel-control.left {  
    
  background-image:none;  
  background-repeat: repeat-x;  
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#80000000', endColorstr='#00000000', GradientType=1);  
}  
.carousel-control.right {  
  left: auto;  
  right: 0;  
   
  background-image:none;  
  background-repeat: repeat-x;  
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1);  
}
.cent{ 
	
} 
.cs{
	padding: 0;
	margin: 0;
	width: 200px;
	height: 100%;

top:0px; 
opacity: 0;
position:absolute; 

display: block; 
font-size: 12px; 

} 
.cent:hover .cs{
background-color: rgba(0,0,0,0.8);
color: #656e73; 
opacity: 0.8;
animation: Img 0.5s ease-in-out;
} 
</style>
<?php
	session_start();
	include("../conn/dataconnection.php");
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		?>
		<?php
			@$good_id=$_GET['good_id'];
			$sql=mysql_query("select * from goods where good_id='$good_id'");
			@$num=mysql_num_rows($sql);
			if(@$num<=0){
				?>
				
				<?php
			}else{
				$flower=mysql_fetch_array($sql);
				?>
				<div class="container" style="width: 100%;">
					<div class="row">
						<div class="col-md-12" style="background-color: black;height: 100px;color: white;">
							<h2>管理中心</h2>
							<h4 style="margin-left: 700px;">当前用户:<?php echo @$_SESSION['admin_name']; ?></h4>
						</div>
					</div>
					
					<div class="row" style="width: 90%;margin: 0 auto;background-color: white;">
						<div class="col-md-12">
							<h2 style="margin-left: 600px;">修改商品</h2>
							<form class="form-horizontal" role="form" method="post" action="update_good_1.php">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										    <label for="firstname" class="col-sm-2 control-label">商品名称</label>
										    <div class="col-sm-10">
										    	<input type="hidden" name="good_id" value="<?php echo $good_id; ?>" />
										      <input type="text" style="width: 500px;" class="form-control" required="required" name="good_name" value="<?php echo @$flower['good_name']; ?>" placeholder="请输入商品名称">
										    </div>
										  </div>
										  <div class="form-group">
										    <label for="lastname" class="col-sm-2 control-label">现价</label>
										    <div class="col-sm-10">
										      <input type="text" style="width: 500px;" class="form-control" required="required" value="<?php echo @$flower['good_price']; ?>" name="good_price" placeholder="请商品现价">
										    </div>
										  </div>
										  <div class="form-group">
										    <label for="lastname" class="col-sm-2 control-label">原价</label>
										    <div class="col-sm-10">
										      <input type="text" style="width: 500px;" class="form-control" required="required" name="prime_cost" value="<?php echo @$flower['prime_cost']; ?>" placeholder="请输入姓">
										    </div>
										  </div>
										  <div class="form-group">
										    <label for="lastname" class="col-sm-2 control-label">进口价</label>
										    <div class="col-sm-10">
										      <input type="text" style="width: 500px;" class="form-control" required="required" name="buy_price" value="<?php echo @$flower['buy_price']; ?>" placeholder="请输入姓">
										    </div>
										  </div>
											<div class="form-group">
												<div class="col-sm-10">
											    <label for="lastname" class="col-sm-2 control-label">花语</label>
											    <textarea style="width: 500px;margin-left: 100px;" placeholder="请输入花语" class="form-control" required="required" name="good_hua" rows="3">
											    	<?php echo @$flower['good_hua']; ?>
											    </textarea>
												</div>
											</div>
										  <div class="form-group">
										    <label for="lastname" class="col-sm-2 control-label">总数</label>
										    <div class="col-sm-10">
										      <input type="text" style="width: 500px;" class="form-control" required="required"  name="sum" value="<?php echo @$flower['sum']; ?>" placeholder="请输入姓">
										    </div>
										  </div>
										  <div class="form-group">
										    <label for="lastname" class="col-sm-2 control-label">枝数</label>
										    <div class="col-sm-10">
										      <input type="text" style="width: 500px;" class="form-control" required="required"  name="flower_num" value="<?php echo @$flower['flower_num']; ?>" placeholder="请输入姓">
										    </div>
										  </div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
									    <label for="lastname" class="col-sm-2 control-label">材料</label>
									    <div class="col-sm-10">
									      <input type="text" style="width: 500px;" class="form-control" required="required"  name="material" value="<?php echo @$flower['material']; ?>" placeholder="请输入姓">
									    </div>
									  </div>
									  <div class="form-group">
									    <label for="lastname" class="col-sm-2 control-label">用途</label>
									    <div class="col-sm-10">
									      <input type="text" style="width: 500px;" class="form-control" required="required"  name="good_use" value="<?php echo @$flower['good_use']; ?>" placeholder="请输入姓">
									    </div>
									  </div>
									  <div class="form-group">
									    <label for="lastname" class="col-sm-2 control-label">适合节日</label>
									    <div class="col-sm-10">
									      <input type="text" style="width: 500px;" class="form-control" required="required"  name="festival" value="<?php echo @$flower['festival']; ?>" placeholder="请输入姓">
									    </div>
									  </div>
									  <div class="form-group">
									    <label for="lastname" class="col-sm-2 control-label">包装</label>
									    <div class="col-sm-10">
									      <input type="text" style="width: 500px;" class="form-control" required="required"  name="packing" value="<?php echo @$flower['packing']; ?>" placeholder="请输入姓">
									    </div>
									  </div>
									  <div class="form-group">
									    <label for="lastname" class="col-sm-2 control-label">适合对象</label>
									    <div class="col-sm-10">
									      <input type="text" style="width: 500px;" class="form-control" required="required"  name="object" value="<?php echo @$flower['object']; ?>" placeholder="请输入姓">
									    </div>
									  </div>
									  <div class="form-group">
									    <label for="lastname" class="col-sm-2 control-label">附赠</label>
									    <div class="col-sm-10">
									      <input type="text" style="width: 500px;" class="form-control" required="required"  name="send" value="<?php echo @$flower['send']; ?>" placeholder="请输入姓">
									    </div>
									  </div>
									   <div class="form-group">
									    <label for="lastname" class="col-sm-2 control-label">配送</label>
									    <div class="col-sm-10">
									      <input type="text" style="width: 500px;" class="form-control" required="required"  name="ad" value="<?php echo @$flower['ad']; ?>" placeholder="请输入姓">
									    </div>
									  </div>
									   <div class="form-group">
									    <label for="lastname" class="col-sm-2 control-label">说明</label>
									    <div class="col-sm-10">
									      <input type="text" style="width: 500px;" class="form-control" required="required"  name="say" value="<?php echo @$flower['say']; ?>" placeholder="请输入姓">
									    </div>
									  </div>
									 <div class="form-group">
								    <label for="lastname" class="col-sm-2 control-label">品种</label>
								    <div class="col-sm-10">
								     <?php
	   								include_once("../conn/dataconnection.php");
	   								$sql=mysql_query("select * from kind");
	   								@$num=mysql_num_rows($sql);
	   								if($num<=0){
	   									echo "暂无品种";
	   								}else{
	   									while($a=mysql_fetch_array($sql)){
	   										if($a['kind_id']==$flower['kind_id']){
	   										?>
	   										<input style="margin-left: 40px;" checked="checked" type="radio"  name="kind" value="<?php echo $a['kind_id'] ?>" /><?php echo $a['kind_name'] ?>
	   										<?php
	   										}else{
	   											?>
	   										<input style="margin-left: 40px;" type="radio"  name="kind" value="<?php echo $a['kind_id'] ?>" /><?php echo $a['kind_name'] ?>
	   										<?php
	   										}
	   										
	   									}
	   								}
	   								?>
								    </div>
								  </div>
									</div>
								</div>
							  <div class="form-group">
							    <div class="col-sm-offset-2 col-sm-10">
							      <button style="margin-left: 350px;width: 150px;" type="submit" class="btn btn-danger btn-lg">修改</button>
							    </div>
							  </div>
							</form>
						</div>
						<div class="row">
							<div class="col-md-12" style="background-color: red;width: 100%;height: 3px;">
								
							</div>
						</div>
					</div>
					
					<div class="row" style="width: 80%;margin: 0 auto;">
						<div class="col-md-12">
							<div class="row" style="width: 35%;">
									<div class="col-md-7" style="background-color: white;">
										<h4 id="h4">封面图片:</h4>
										<div class="thumbnail" style="padding: 0;margin: 0;width: 100%;">
									    	<img id="han" src="<?php echo $flower['main_img']; ?>" />
									    	<div class="caption" style="margin-left: 60px;">
									    		<a onclick="update_img()" class="btn btn-danger">修改</a>
									    	</div>
									    </div>
									    <div id="update" style="display: none;">
									    	<input id="n1" type="file" onchange="changImg(event)" name="main_img" />
									    </div>
									</div>
									<div class="col-md-5" id="showimg" style="display: none;">
										<h4>修改后图片:</h4>
										<div class="cent">
											<div class="thumbnail" style="padding: 0;margin: 0;width: 250px;height: 300px;">
										    	<img style="height: 300px;" alt="暂无图片" id="myImg" src="">
										    </div>
										    <div class="cs" style="width: 250px;">
											    <div class="thumbnail" style="border: 0;padding: 0;margin: 0;width:250px;height: 200px;background-color: transparent;">
											    	<a onclick="del_main_img()" style="margin-top: 55%;margin-left: 38%;" class="btn btn-danger">删除</a>
											    </div>
											    <div class="caption">
											    	<a onclick="change_img(<?php echo $good_id; ?>)" style="margin-top: 50px;margin-left: 70px;" class="btn btn-danger btn-lg">确认修改</a>
											    </div>
										    </div>
									  </div>
									</div>
										<div class="row">
											<div class="col-md-12" style="background-color: red;width: 100%;height: 3px;">
												
											</div>
										</div>
								</div>
								
								<?php
											@$good_img=$flower['good_img'];
											$imgs= explode("*", $good_img);
											if($imgs[0]==''){
												?>
												<div class="row" style="margin-top: 50px;">
													<div class="col-md-12">
														<a class="btn btn-primary btn-lg" href="addotherimg.php?good_id=<?php echo $good_id ?>">
   														 添加其他照片
														</a>
													</div>
												</div>
												<?php
											}else{
												?>
													<div class="row">
														<div class="col-md-12">
														<h4>其他图片</h4>
																	<div class="row" id="ImgBox" style="margin: 0;perspective: 0;display: none;">
																		<div class="col-md-12">
																		<div id="myCarousel" class="carousel slide" style="width: 750px;height: 650px;">
																			<div style="height: 30px;width: 100%;background-color: transparent;opacity: 0.8;">
																				<span style="text-align: center;margin-left: 350px;font-size: 24px;color:orangered;">其他图片</span>
																			</div>
																			<!-- 轮播（Carousel）指标 -->
																			<ol class="carousel-indicators">
																				
																				<?php
																					for($i=0;$i<count($imgs);$i++){
																						if($i==0){
																							?>
																							<li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class="active"></li>
																							<?php
																						}else{
																							?>
																							<li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>"></li>
																							<?php
																						}
																					}
																					?>
																			
																			</ol>   
																			
																			<!-- 轮播（Carousel）项目 -->
																			<div class="carousel-inner">
																				<?php
																				for($i=0;$i<count($imgs);$i++){
																					if($i==0){
																						?>
																						<div class="item active" style="background: rgba(0,0,0,0.5);">
																							<div class="thumbnail" style="background-color: transparent;padding: 0;margin: 0;border: 0;">
																								<img style="width: 500px;height: 650px;" src="<?php echo $imgs[$i]; ?>" alt="First slide">
																								<div class="caption">
																									<div style="height: 30px;width: 10%;background-color: rgba(0,0,0,0.8);border-radius: 5px;">
																										<a href="#" onclick="colse()" style="text-decoration: none;opacity: 0.8;color: white;float: right;width: 100%;height: 30px;background-color: red;margin-right: 10px;text-align: center;border-radius: 5px;">点击关闭</a>
																									</div>
																								</div>
																							</div>
																							<div class="carousel-caption">图片<?php echo $i+1; ?></div>
																						</div>
																						<?php
																					}else{
																						?>
																						<div class="item" style="background: rgba(0,0,0,0.5);">
																							<div class="thumbnail" style="background-color: transparent;padding: 0;margin: 0;border: 0;">
																								<img style="width: 500px;height: 650px;" src="<?php echo $imgs[$i]; ?>" alt="First slide">
																									<div style="height: 30px;width: 10%;background-color: rgba(0,0,0,0.8);border-radius: 5px;">
																										<a onclick="colse()" style="text-decoration: none;opacity: 0.8;color: white;float: right;width: 100%;height: 30px;background-color: red;margin-right: 10px;text-align: center;border-radius: 5px;">点击关闭</a>
																									</div>
																							</div>
																							<div class="carousel-caption">图片<?php echo $i+1; ?></div>
																						</div>
																						<?php
																					}
																				}
																				?>
																			</div>
																			<!-- 轮播（Carousel）导航 -->
																			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
																			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
																			    <span class="sr-only">Previous</span>
																			</a>
																			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
																			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
																			    <span class="sr-only">Next</span>
																			</a>
																		</div> 
																		</div>
																	</div>
																	<div class="row">
																		<!--<form method="post" action="update_other_img.php">-->
																		<?php
																			for($i=0;$i<count($imgs);$i++){
																				?>
																				<div class="col-md-4" style="margin-top: 20px;">
																					<div class="row">
																						<div class="col-md-6">
																							<h4 id="h<?php echo $i+1; ?>">图片<?php echo $i+1; ?>:</h4>
																							<div class="cent"> 
																								<div class="thumbnail" style="padding: 0;margin: 0;width: 200px;">
																									<img id="loveimg<?php echo $i+1; ?>" class="img" style="height: 200px;" src="<?php echo $imgs[$i]; ?>" />
																								</div>
																								<div class="cs" style="">
																									
																									<div class="thumbnail" style="margin-top: 50%;">
																										<input id="input<?php echo $i+1; ?>" onchange="changImgs(event,<?php echo $i+1; ?>)" type="file" />
																									</div>
																								</div>
																							</div>
																						</div>
																						<div style="display: none;" id="Imgshow<?php echo $i+1; ?>" class="col-md-6">
																							<h4>修改后图片<?php echo $i+1; ?>:</h4>
																							<div class="cent">
																								<div class="thumbnail" style="padding: 0;margin: 0;">
																							    	<img style="height: 190px;" id="img<?php echo $i+1; ?>" alt="暂无图片" id="myImg" src="">
																							    </div>
																							    <div class="cs">
																								    <div class="thumbnail" style="padding: 0;margin: 0;background-color: transparent;border: 0;">
																								    	<a onclick="del_img(<?php echo $i+1; ?>)" style="margin-top: 90px;margin-left: 80px;" class="btn btn-danger">删除</a>
																								    	<a onclick="update_imgs(<?php echo $i+1; ?>,<?php echo $good_id; ?>)" style="margin-left: 70px;margin-top: 30px;" class="btn btn-danger">确认更新</a>
																								    </div>
																							    </div>
																						    </div>
																						</div>
																					</div>
																					<div class="row">
																						<div class="col-md-12" style="height: 2px;width: 100%;background: red;"></div>
																					</div>
																				</div>
																				
																				<?php
																			}
																			?>
																			<div class="row">
																				<div class="col-md-12" style="background: red;background-color: white;width: 100%;margin: 0 auto;">
																					<a href="add_other_img.php?good_id=<?php echo $good_id; ?>" style="line-height: 60px;margin-top: 50px;margin-left: 500px;" class="btn btn-primary btn-lg">添加其他图片</a>
																					<a onclick="see()" style="line-height: 60px;margin-top: 50px;" class="btn btn-danger btn-lg">点击查看大图</a>
																				</div>
																			</div>
																			<!--</form>-->
																	</div>
															</div>	
													</div>
												<?php
											}
											?>
						</div>
					</div>
					
				</div>
				<?php
			}
			?>
	<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>
	
	<script type="text/javascript">
function colse(){
	var ImgBox=document.getElementById("ImgBox");
	ImgBox.style.display='none';
}
function see(){
	var ImgBox=document.getElementById("ImgBox");
	ImgBox.style.display='block'; 
}
function update_img(){
	var update=document.getElementById("update");
	
	if(update.style.display=='none'){
		update.style.display='block';
	}else{
		update.style.display='none';
	}
	
}
function changImg(e){
var h4=document.getElementById("h4");
h4.innerText='修改前图片:';
var showimg=document.getElementById("showimg");
var n1=document.getElementById("n1");
if(n1.value==''){
// 		alert('请选择正确的图片');
	showimg.style.display='none';
	h4.innerText="图片:";
 	}else{
 		
 showimg.style.display='block';
 var myImg = document.getElementById('myImg');
 for (var i = 0; i < e.target.files.length; i++) {
 var file = e.target.files[i];
 console.log(file);
 if (!(/^image\/.*$/i.test(file.type))) {
  continue; //不是图片 就跳出这一次循环
 }
 //实例化FileReader API
 var freader = new FileReader();
 freader.readAsDataURL(file);
 freader.onload = function(e) {
  console.log(e);
  myImg.setAttribute('src', e.target.result);
 }
 }
 	}
 }
 function del_main_img(){
 	var n1=document.getElementById("n1");
 	var h4=document.getElementById("h4");
 	var myImg = document.getElementById('myImg');
 	var showimg=document.getElementById("showimg");
	h4.innerText='封面图片:';
	n1.value='';
	myImg.setAttribute('src','');
	showimg.style.display='none';
 }
 function changImgs(e,q){
 	var Imgshow=document.getElementById("Imgshow"+q);
 	var h=document.getElementById("h"+q);
 	var myImg = document.getElementById('img'+q);
 	var inputs=document.getElementById("input"+q);
 	if(inputs.value==''){
// 		alert('请选择正确的图片');
	Imgshow.style.display='none';
	h.innerText="图片"+q+":";
 	}else{
 	for (var i = 0; i < e.target.files.length; i++) {
   var file = e.target.files[i];
   console.log(file);
   if (!(/^image\/.*$/i.test(file.type))) {
   	alert('请选择正确的图片');
	continue; //不是图片 就跳出这一次循环
   }
   //实例化FileReader API
   var freader = new FileReader();
   freader.readAsDataURL(file);
   freader.onload = function(e) {
	console.log(e);
	myImg.setAttribute('src', e.target.result);
	Imgshow.style.display='block';
	h.innerText="修改前的图片"+q+":";
   }
   }
 	}
 }
 function del_img(i){
 	var inputs=document.getElementById("input"+i);
 	var myImg = document.getElementById('img'+i);
 	var Imgshow=document.getElementById("Imgshow"+i);
 	var h=document.getElementById("h"+i);
 	inputs.value='';
 	myImg.setAttribute('src','');
 	Imgshow.style.display='none';
 	h.innerText='图片'+i+':';
 }
 
 
 
 
 
 function change_img(good_id){
 	var showimg=document.getElementById("showimg");
 	var n1=document.getElementById("n1");
 	var data = new FormData();
        //为FormData对象添加数据
        $.each($('#n1')[0].files, function(i, file) {
            data.append('upload_file'+i, file);
        });
        $.ajax({
        	type:"post",
        	url:"up_main_img.php?good_id="+good_id,
        	data:data,
        	cache:false,
        	contentType: false,        /*不可缺*/
	        processData: false,
//      	async:true
			dataType:"json",
			success:function(response){
				if(response.errno==0){
					alert('修改成功');
					showimg.style.display='none';
					var h4=document.getElementById("h4");
					var han=document.getElementById("han");
					var update=document.getElementById("update");
					var n1=document.getElementById("n1");
					n1.value='';
					update.style.display='none';
					h4.innerText='修改后图片:';
					han.setAttribute('src',response.img);
				}else if(response.errno==1){
					alert('请检查图片格式是否正确');
				}else{
					alert('更新失败，请联系系统维护员');
				}
			}
        });

}

function update_imgs(I,good_id){
	var n1=document.getElementById("input"+I);
	var h=document.getElementById("h"+I);
	var Imgshow=document.getElementById("Imgshow"+I);
	var loveimg=document.getElementById("loveimg"+I);
 	var data = new FormData();
        //为FormData对象添加数据
        $.each($('#input'+I)[0].files, function(i, file) {
            data.append('upload_file'+i, file);
        });
         $.ajax({
        	type:"post",
        	url:"update_other_img.php?good_id="+good_id+"&I="+I,
        	data:data,
        	cache:false,
        	contentType: false,        /*不可缺*/
	        processData: false,
//      	async:true
			dataType:"json",
			success:function(response){
				if(response.errno==0){
					alert('修改成功');
					h.innerText='修改后图片:';
					Imgshow.style.display='none';
					n1.value='';
					loveimg.setAttribute('src',response.img);
					
				}else if(response.errno==1){
					alert('请检查图片格式是否正确');
				}else{
					alert('更新失败，请联系系统维护员');
				}
			}
        });
//	alert(I);
}
	</script>
