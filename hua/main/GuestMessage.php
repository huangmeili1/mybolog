<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>个人中心</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../utf8-php/ueditor.config.js"></script>
<script type="text/javascript" src="../utf8-php/ueditor.all.min.js"></script>
<script type="text/javascript" src="../utf8-php/lang/zh-cn/zh-cn.js"></script>
<?php
	session_start();
	if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
		include("../conn/dataconnection.php");
		$user_id=$_SESSION['user_id'];
		$user=mysql_query("select * from user where user_id='$user_id'");
		$u=mysql_fetch_array($user);
?>
<?php
						function trimall($str)//删除空格
								{
								
								    $qian=array(" ","　","\t","\n","\r");$hou=array("","","","","");
								
								    return str_replace($qian,$hou,$str);    
								}
							function getWord($content){
								$str=strip_tags($content);//将html格式去掉
								
								$str=trimall($str);//删除空格
								
								$str=mb_substr($str,0,20,'utf-8')."......";//截取字段
								
								return $str;
								}
					?>
<div class="container" style="width: 100%;">
	<?php
		include("top.php");
		
		?>
	<div class="row" style="width: 90%;margin: 0 auto;">
		<div class="col-md-12" style="padding: 0;margin: 0;background-color: white;">
			<ol class="breadcrumb" style="background-color: white;">
			    <li><a href="index.php">首页</a></li>
			    <li><a href="flower.php">个人中心</a></li>
			    <li class="active">客服留言</li>
			</ol>
		</div>
	</div>
	<div class="row" style="width: 90%;margin: 0 auto;margin-bottom: 100px;">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3" style="height: auto;border: 1px;background: white;margin-bottom: 100px;">
					
					<?php include("personleft.php"); ?>
					
				</div>
				<div class="col-md-9" style="background-color: white;">
					<div class="panel panel-default">
					    <div class="panel-heading">
					       <b>客服留言</b> 
					    </div>
					    <div class="panel-body">
					    	<form onsubmit="check()" action="add_ly.php" method="post">
					        <table border="1" style="width: 100%;background-color: gainsboro;">
					        	<tr>
					        		<td>你的姓名：</td>
					        		<td><input id="realname" required="required" name="realname" style="height: 50px;width: 100%;" placeholder="请输入我的姓名" value="<?php echo $u['realname']; ?>" type="text"></td>
					        		<td>你的手机号码:</td>
					        		<td><input id="tel" required="required" style="height: 50px;width: 100%;" name="tel" placeholder="请输入你的手机号码" value="<?php echo $u['user_tel'] ?>" type="text"></td>
					        	</tr>
					        	<tr>
					        		<td>留言标题:</td>
					        		<td colspan="3">
					        			<input type="text" required="required" style="width: 100%;height: 50px;" id="title" name="title" placeholder="请输入你的留言标题" />
					        		</td>
					        	</tr>
					        	<tr>
					        		<td>
					        			留言内容:
					        		</td>
					        		<input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
					        		<td colspan="3" style="height: 200px;width: 800px;">
									  <div class="form-group">
									    <div class="col-sm-10" style="margin: 0 auto;padding: 0;">
									    	<textarea nowrap="content" id="content" name="content" required="required" placeholder="请填写公告内容"></textarea>
									    </div>
									  </div>
					        		</td>
					        	</tr>
					        	<tr>
					        		<td colspan="4" style="text-align: center;">
					        			<input class="btn btn-default btn-lg" type="submit" value="提交" name="tj" />
					        		</td>
					        	</tr>
					        </table>
					        </form>
								<div class="row" style="margin-top: 20px;">
									<div class="col-md-12" style="text-align: center;">
										<button onclick="open_show_ly()" class="btn btn-danger">查看回复以及留言</button>
									</div>
								</div>
								
								<div class="row" style="display: none;" id="show_ly">
									<div class="col-md-12">
										<?php
											@$sql=mysql_query("select * from ly where user_id='$user_id' order by ly_time desc");
											@$sql_num=mysql_num_rows($sql);
											if($sql_num<=0){
												?>
												<div class="row" style="margin-top: 30px;">
													<div class="col-md-12" style="text-align: center;">
														暂无留言
													</div>
												</div>
												<?php
											}else{
												?>
												<table class="table table-hover">
													<thead>
														<th>编号</th>
														<th>留言标题</th>
														<th>留言摘要</th>
														<th>留言时间</th>
														<th>操作</th>
													</thead>
												<?php
													$i=0;
												while($ll=mysql_fetch_array($sql)){
													$i++;
													?>
													<tr>
														<td><?php echo $i; ?></td>
														<td><a style="text-decoration: none;" href="person_see_ly.php?ly_id=<?php echo $ll['ly_id'] ?>"><?php echo $ll['title']; ?></a></td>
														<td><?php echo getWord($ll['content']) ?></td>
														<td><?php echo $ll['ly_time']; ?></td>
														<td>
															<a href="person_see_ly.php?ly_id=<?php echo $ll['ly_id'] ?>">查看</a>
															<a href="del_ly.php?ly_id=<?php echo $ll['ly_id']; ?>">删除</a>
														</td>
													</tr>
													<?php
												}
												?>
												</table>
												<?php
											}
											?>
									</div>
								</div>
					    </div>
					</div>
					
				</div>
			</div>
			
		</div>
	</div>
</div>
<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='login.php';</script>";}  ?>
	<script type="text/javascript" src="../js/index.js"></script>
	
	<script type="text/javascript">
	UE.getEditor('content',{initialFrameWidth:850,initialFrameHeight:200})
	function open_show_ly(){
		var show_ly=document.getElementById("show_ly");
		if(show_ly.style.display=='none'){
			show_ly.style.display='block';
		}else{
			show_ly.style.display='none';
		}
	}
	function check(){
		var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
        var tel=document.getElementById("tel").value;
        if(!myreg.test(tel)){
				alert("请正确填写你的手机号码");
				document.getElementById("tel").focus();
				return false;
			}else{
				return true;
			}
	}
//		function add_ly(user_id){
//			var realname=document.getElementById("realname").value;
//			var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
//			var tel=document.getElementById("tel").value;
//			var hua=document.getElementById("content").value;
//			var title=document.getElementById("title").value;
//			if(realname==''){
//				alert("请填写你的姓名");
//				document.getElementById("realname").focus();
//			}else if(title==''){
//				alert("请输入你的留言标题");
//				document.getElementById("title").focus();
//			}else if(!myreg.test(tel)){
//				alert("请正确填写你的手机号码");
//				document.getElementById("tel").focus();
//			}else if(hua==''){
//				alert("请填写你的留言内容");
//				document.getElementById("content").focus();
//			}else{
//				var url="add_ly.php";
//				var data={"realname":realname,"tel":tel,"hua":hua,"title":title,"user_id":user_id};
//				var success=function(response){
//					if(response.errno==1){
//						alert("添加留言成功");
//						var show_ly=document.getElementById("show_ly");
//						show_ly.style.display='block';
//					}else{
//						alert("添加失败，请稍后再试");
//					}
//				}
//				$.post(url,data,success,"json");
//			}
//		}
	</script>
