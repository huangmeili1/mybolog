<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>公告列表</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	body{
		margin-top: 40px;
	}
</style>
<?php
						function trimall($str)//删除空格
								{
								
								    $qian=array(" ","　","\t","\n","\r");$hou=array("","","","","");
								
								    return str_replace($qian,$hou,$str);    
								}
							function getWord($content){
								$str=strip_tags($content);//将html格式去掉
								
								$str=trimall($str);//删除空格
								
								$str=mb_substr($str,0,40,'utf-8')."......";//截取字段
								
								return $str;
								}
					?>
<?php
	session_start();
	include("../conn/dataconnection.php");
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		?>
<div class="container" style="width: 100%;">
	<?php
		include("m_top.php");
		?>
	<div class="row" style="width: 80%;margin:0 auto;margin-top: 10px;">
		
		<div class="col-md-12">
			<div class="form-group" style="margin-left: 300px;">
					<h4>请输入查询的公告标题或发表时间：</h4>
						<div class="input-group" style="width: 550px;">
				            <input name="hua_title" id="hua_title" style="height: 40px;" type="text" class="form-control">
				            <a onclick="Search()" style="width: 100px;height: 30px;" class="input-group-addon"><span class="glyphicon glyphicon-search"></span></a>
				        </div>
			</div>
		</div>
	</div>
	<?php
		$sql=mysql_query("select * from know");
		@$num=mysql_num_rows($sql);
		if($num<=0){
			?>
			<div class="row">
				<div class="col-md-12" style="margin-top: 20px;">
					<span style="margin-left: 600px;">既无公告<a href="add_know_type.php" class="btn btn-danger btn-lg">添加公告</a></span>
				</div>
			</div>
			<?php
		}else{
			$pagesize=15;
			if(isset($_GET['page'])){
			$page=$_GET['page'];
			}else{
			$page=1;
			}
			$number=ceil($num/$pagesize);
		    $ps=($page-1)*$pagesize;
			$SQL=mysql_query("select * from know limit $ps,$pagesize");
			?>
			<div class="row" id="show_know">
				<div class="col-md-12">
					<table id="store" class="table table-hover">
						<caption align="center" style="margin-left: 700px;font-size: 24px;text-shadow:5px 5px 5px gray;">公告列表</caption>
						<thead>
							<tr>
								<th>封面图片</th>
								<th>公告标题</th>
								<th>公告内容</th>
								<th>公告类型</th>
								<th>发表时间</th>
								<th>是否推荐</th>
								<th>浏览量</th>
								<th>发表人</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
							<?php
								while($know=mysql_fetch_array($SQL)){
									?>
									<tr>
										<td>
											<div class="thumbnail" onmouseleave="hide_u(<?php echo $know['hua_id']; ?>)" onmousemove="show_u(<?php echo $know['hua_id']; ?>)" style="width: 150px;">
												<a href="article.php?hua_id=<?php echo $know['hua_id'] ?>">
													<img id="image<?php echo $know['hua_id']; ?>" style="display: block;" style="height: 150px;" src="<?php echo $know['img']; ?>" />
													<img style="display: block;" id="img<?php echo $know['hua_id']; ?>" style="height: 150px;" />
													<input onchange="changImg(event,<?php echo $know['hua_id']; ?>)" id="input<?php echo $know['hua_id']; ?>" style="display: none;" type="file" style="border: 0px;" name="imgs" />
													<div id="caption<?php echo $know['hua_id']; ?>" style="display: none;" class="caption">
														<a onclick="update_img(<?php echo $know['hua_id']; ?>)" style="margin-left: 30px;" class="btn btn-danger">修改</a>
													</div>
												</a>
											</div>
										</td>
										<td width="150" >
											<span>
												<a href="article.php?hua_id=<?php echo $know['hua_id'] ?>"><?php echo $know['hua_title']; ?>
												</a>
												</span>
										</td>
										<td width="150">
											<?php
												$content=$know['hua_content'];
												echo getWord($content);
												?>
										</td>
										<td style="line-height: 150px;">
											<?php
												$kown_id=$know['kown_id'];
												$type=mysql_query("select * from know_type where know_id='$kown_id'");
												$ty=mysql_fetch_array($type);
												$b=$ty['know_name'];
												?>
												<a href="article_cat.php?type=<?php echo $b; ?>"><?php echo $b; ?></a>
										</td>
										<td style="line-height: 150px;">
											<?php echo $know['hua_time']; ?>
										</td>
										<td style="line-height: 150px;">
											<?php
												echo $know['if_letknow'];
												?>
										</td>
										<td style="line-height: 150px;">
											<?php echo $know['see_num']; ?>
										</td>
										<td style="line-height: 150px;">
											<?php  
												$admin_id=$know['admin_id'];
												$ad=mysql_query("select * from admin where admin_id='$admin_id'");
												@$admin_name=mysql_fetch_array($ad);
												echo $admin_name['admin_name'];
												?>
										</td>
										<td style="line-height: 150px;">
											<a class="btn btn-default" href="article.php?hua_id=<?php echo $know['hua_id'] ?>">查看</a>｜
											<?php
												$admin_id=$admin_name['admin_id'];
												if(@$_SESSION['admin_id']==$admin_id){
													?>
													<a class="btn btn-default" href="update_know.php?hua_id=<?php echo $know['hua_id'] ?>">修改</a>
													<?php
												}else{
													?>
													<span>修改</span>
													<?php
												}
												?>
											
											|<a class="btn btn-default" onclick="return confirm('你确认要删除？')" href="del_know.php?hua_id=<?php echo $know['hua_id'] ?>">删除</a>
										</td>
									</tr>
									<?php
								}
								?>
								<tr>
											<td colspan="9" style="text-align: center;">
									   				<span style="line-height: 80px;font-size: 20px;"><?php echo $page; ?>-<?php echo $number; ?>页/共<?php echo $num; ?>条公告</span>
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
																				<li><a href="List_know.php?page=<?php echo $pr; ?>">&laquo;上一页</a></li>
																				<?php
																			}
																				?>
																				
																				<li><a href="List_know.php?page=1">1</a></li>
																				<li><a href="List_know.php?page=2">2</a></li>
																				<li><a href="List_know.php?page=3">3</a></li>
																				<li><a href="List_know.php?page=4">4</a></li>
																				<li><a href="List_know.php?page=5">5</a></li>
																				<li><a href="List_know.php?page=6">6</a></li>
																				<li class="disabled"><span>.....</span></li>
																				<li><a href="List_know.php?page=<?php echo $number; ?>"><?php echo $number; ?></a></li>
																				<?php
																		if($page>=$number){
																		?>
																		<li class="disabled"><span style="color: darkgray;">下一页&raquo;</span></li>
																		<?php
																		}else{
																			?>
																			<li><a href="List_know.php?page=<?php echo $pn; ?>">下一页&raquo;</a></li>
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
																				<li><a href="List_know.php?page=<?php echo $pr; ?>">&laquo;上一页</a></li>
																				<?php
																			}
																				?>
																				<?php
																					for($i=1;$i<=$number;$i++){
																						?>
																						<li><a href="List_know.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
																			<li><a href="List_know.php?page=<?php echo $pn; ?>">下一页&raquo;</a></li>
																			<?php
																		}
																			?>
																				
																		</ul>
																<?php
															}
															?>
											
										
										
														
													</tr>
						</tbody>
					</table>
				</div>
			</div>
			<?php
		}
		?>
	
	
	<div class="row" id="hidden_book" onclick="colse()" style="display: none;">
			<div class="col-md-12" style="width: 100%;height: 100%;background: rgba(0,0,0,0.5);position: fixed;left: 0;top: 0;z-index: 2;">
				
			</div>
		</div>
		<div id="see_book" class="row" style="display: none;width: 70%;margin: 0 auto;height:600px;background-color: white;position: fixed;top: 10%;left:15%;z-index: 3;overflow: scroll;">
				<div class="col-md-12" style="margin: 0 auto;padding: 0;">
					<div class="panel panel-default" style="border-radius: 0;">
					    <div class="panel-heading" style="border-radius: 0;">
					        修改公告<span onclick="colse()" style="display: inherit;float: right;font-size:24px;text-align: center;" class="glyphicon glyphicon-remove"></span>
					    </div>
					    <div class="panel-body" id="show_order">
					    </div>
					    <button onclick="colse()" style="float: right;margin-top: 30px;margin-bottom: 20px;margin-right: 50px;" class="btn btn-default">关闭</button>
					</div>	
				</div>
		</div>
	
</div>
<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>
<script type="text/javascript">
function open_update(hua_id){
	var hidden_book=document.getElementById("hidden_book");
	var see_book=document.getElementById("see_book");
	see_book.style.display='block';
	hidden_book.style.display='block';
	var url="update_know.php";
	var data={"hua_id":hua_id};
	var success=function(response){
		$("#see_book").html(response);
	}
	$.get(url,data,success,"html");
}
function colse(){
	var hidden_book=document.getElementById("hidden_book");
	var see_book=document.getElementById("see_book");
	hidden_book.style.display='none';
	see_book.style.display='none';
}

function Search(){
	var hua_title=document.getElementById("hua_title");
	var n=hua_title.value;
	
	if(n==''){
		$("#hua_title").focus();
	}else{
	var store=document.getElementById("store");
	var show_know=document.getElementById("show_know");//表格所在div
	var url="select_know.php";
	var data={'key':n};
	var sccess=function(da){
		$("#show_know").html(da);
	}
	 $.post(url,data,sccess,"html");
	}
}

function show_u(hua_id){
	var caption=document.getElementById("caption"+hua_id);
	caption.style.display='block';
}
function hide_u(hua_id){
	var caption=document.getElementById("caption"+hua_id);
	caption.style.display='none';
}
function update_img(hua_id){
	var images=document.getElementById("image"+hua_id);
	images.style.display='none';
	var inputs=document.getElementById("input"+hua_id);
	inputs.style.display='block';
	
}
function changImg(e,hua_id){
	var inputs=document.getElementById("input"+hua_id);
	var myImg = document.getElementById("img"+hua_id);
	var images=document.getElementById("image"+hua_id);
	var num=inputs.value;
	if(num==''){
		images.style.display='block';
		myImg.style.display='none';
	}else{
	myImg.style.display='block';
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
	var caption=document.getElementById("caption"+hua_id);
	caption.innerHTML="<a onclick='update_finally("+hua_id+")' style='margin-left: 30px;' class='btn btn-danger'>确认修改</a>";
   }
   }
	}
//	alert(e);
}
function update_finally(hua_id){
 	var n1=document.getElementById("input"+hua_id);
 	var data = new FormData();
        //为FormData对象添加数据
        $.each($('#input'+hua_id)[0].files, function(i, file) {
            data.append('upload_file'+i, file);
        });
        $.ajax({
        	type:"post",
        	url:"up_know_img.php?hua_id="+hua_id,
        	data:data,
        	cache:false,
        	contentType: false,        /*不可缺*/
	        processData: false,
//      	async:true
			dataType:"json",
			success:function(response){
				if(response.errno==0){
					alert('修改成功');
					var images=document.getElementById("image"+hua_id);
					images.setAttribute('src',response.img);
					n1.style.display='none';
					var caption=document.getElementById("caption"+hua_id);
					caption.innerHTML="<a onclick='update_img("+hua_id+")' style='margin-left: 30px;' class='btn btn-danger'>修改</a>";
					caption.style.display='none';
				}else if(response.errno==1){
					alert('请检查图片格式是否正确');
				}else{
					alert('更新失败，请联系系统维护员');
				}
			}
        });
}
</script>
