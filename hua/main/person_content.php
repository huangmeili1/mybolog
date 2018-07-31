<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>我的评价</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	#rating li{
	margin-top: 80px;
	float: left;
	list-style: none;
	padding: 17px;
	background: url(../img/star.png);
	width: 21px;
	height: 21px;
	}
	
</style>
<?php
	session_start();
	if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
		@$user_id=$_SESSION['user_id'];
//		include("../conn/dataconnection.php");
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
								
	$str=mb_substr($str,0,90,'utf-8');//截取字段
								
	return $str;
	}
	?>
	<div class="container" style="width: 100%;">
		<?php include("top.php"); ?>
		<div class="row" style="width: 90%;margin: 0 auto;">
			<div class="col-md-12" style="padding: 0;margin: 0;background-color: white;">
				<ol class="breadcrumb" style="background-color: white;">
				    <li><a href="index.php">首页</a></li>
				    <li><a href="flower.php">个人中心</a></li>
				    <li class="active">我的评价</li>
				</ol>
			</div>
		</div>
		<div class="row" style="width: 90%;margin: 0 auto;margin-bottom: 100px;">
			<div class="col-md-12">
				<div class="row" >
					<div class="col-md-3" style="height: auto;border: 1px;background: white;margin-bottom: 100px;">
						
						<?php include("personleft.php"); ?>
						
					</div>
					<div class="col-md-9" style="background-color: white;">
						<div class="panel panel-default">
							<div class="panel-heading">
								我的评价
							</div>
							<div class="panel-body">
								<div>
									<a name="select" class="btn btn-danger">按时间正序</a>
									<a name="select" class="btn btn-danger">按时间倒序</a>
								</div>
								<div id="div">
								
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
	
<script type="text/javascript">
	window.onload=function(){
		var sel=document.getElementsByName("select");
		var ul=document.getElementById("div");
//		alert(sel.length);
		for(var i=0;i<sel.length;i++){
			(
				function(i){
				  sel[i].onclick=function(){
						history.pushState({state:i},"","#/"+i);
						ajax(i);
					}
				})(i)
		}
		window.onpopstate=function(){
			ajax(history.state.state);
			
		}
		function parseUrl(){
			var hash=location.hash.slice(-1);
			if(hash==''){
				hash=0;
			}
			return hash;
		}
		ajax(parseUrl())
		function ajax(i){
			var xml=new XMLHttpRequest();
			var url=i+".php";
			xml.open("get",url);
			xml.send();
			xml.onreadystatechange=function(){
				if(xml.readyState==4){
					if(xml.status==200){
						ul.innerHTML=xml.responseText;
					}
				}
			}
		}
	}
		function lop(page){
		$("#div").load(page);
	}
</script>
<script type="text/javascript" src="../js/index.js"></script>