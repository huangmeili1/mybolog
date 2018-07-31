<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>增加评价</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	#rating li{
	float: left;
	list-style: none;
	padding: 17px;
	background: url(../img/star.png);
	width: 21px;
	height: 21px;
	}
</style>
<?php
	header('Content-type: text/html; charset=utf-8');
	session_start();
	if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
		include("../conn/dataconnection.php");
		@$good_id=$_GET['good_id'];
		@$book_id=$_GET['book_id'];
?>
<div class="container" style="width: 100%;">
	<?php
		include("top.php");
		?>
		<div class="row" style="width: 90%;margin: 0 auto;">
			<div class="col-md-12" style="padding: 0;margin: 0;background-color: white;">
				<ol class="breadcrumb" style="background-color: white;">
					<li><a href="index.php">首页</a></li>
					<li><a href="flower.php">鲜花</a></li>
					<li class="active">个人中心</li>
				</ol>
			</div>
		</div>
		<div class="row" style="width: 90%;margin: 0 auto;">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-3">
						<?php include("personleft.php"); ?>
					</div>
					<div class="col-md-9">
						<div class="panel panel-default">
						    <div class="panel-heading">
						       增加评价
						     </div>
						    <div class="panel-body">
						        <table class="table table-hover">
						        	<form action="add_content_ok.php" onsubmit="return checkF()" method="post" enctype="multipart/form-data">
						        	<tr>
						        		<?php
						        			$sql=mysql_query("select * from goods where good_id='$good_id'");
						        			@$bo=mysql_num_rows($sql);
						        			if($bo<=0){
						        				echo "<script>alert('对不起，系统出错了，请稍后再来评价');</script>";
						        			}else{
						        				$flower=mysql_fetch_array($sql);
						        				?>
						        				<td width="150">
						        					所购买商品：
						        					
						        					<div class="thumbnail" style="width: 250px;text-align: center;">
						        						<a style="text-decoration: none;background-color: red;" href="see_good.php?good_id=<?php echo $good_id; ?>">
						        						<img style="height: 300px;" src="<?php echo $flower['main_img']; ?>" />
						        						<div class="caption">
						        							<h4><?php echo $flower['good_name']; ?></h4>
						        						</div>
						        						</a>
						        					</div>
						        					
						        				</td>
						        				<td>
						        				<input type="hidden" name="book_id" value="<?php echo $book_id ?>">
						        					请选择你的评价图片：
						        					<input type="hidden" name="good_id" value="<?php echo $good_id; ?>" />
						        					<span style="margin-top: 120px;">
						        						<div class="thumbnail" style="width: 350px;padding: 0;height: 367px;">
						        							<img style="height: 320px;" id="myImg"  />
						        							
							        						<div class="caption" style="text-align: center;">
							        							<input id="content_img" name="content_img" type="file" onchange="changImg(event)"  />
							        						</div>	
						        						</div>
						        					</span>
						        					
						        				</td>
						        				<?php
						        			}
						        			?>
						        			
						        	</tr>
						        	<tr>
						        		<td colspan="3">
						        					<table>
						        						
						        						<tr>
						        							<td width="70">评分:</td>
								        					<td>
								        						<ul id="rating" class="rating">
																	<li  class="rating-item" title="很不好"></li>
																	<li  class="rating-item" title="不好"></li>
																	<li  class="rating-item" title="一般"></li>
																	<li  class="rating-item" title="好"></li>
																	<li  class="rating-item" title="很好"></li>
																</ul>
								        					</td>
								        				</tr>
								        					<tr>
								        						<td colspan="2">
								        							<textarea id="hua" name="say" style="width: 770px;height: 176px;" placeholder="期待你的评价(⊙o⊙)哦"></textarea>
								        						</td>
								        					</tr>
								        						
						        						
						        					</table>
						        				</td>
						        	</tr>
						        	<tr>
						        		<td colspan="3" align="left">
						        		  <input type="hidden" name="num" id="show" value="2" />
						        		<button class="btn btn-danger">评分</button>
						        	    </td>
						        	</tr>
						        	</form>
						        </table>
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
	

<script src="https://cdn.bootcss.com/jquery/2.2.3/jquery.min.js"></script>  
<script>  
var num=2,  
    $rating=$("#rating"),  
    $item=$rating.find(".rating-item");  
//点亮  
var lightOn=function(num){  
    $item.each(function(index){  
        if(index<num){  
            $(this).css('background-position','0px -40px');  
        }else{  
            $(this).css('background-position','0px 0px');  
        }  
    });  
}  
//初始化  
lightOn(num);  
//事件委托，将子元素的事件委托给父元素处理  
$rating.on('mouseover','.rating-item',function(){  
    lightOn($(this).index()+1);  
}).on('click','.rating-item',function(){  
    num=$(this).index()+1;  
    
}).on('mouseout',function(){  
    lightOn(num);  
    $("#test").html(num);
    var show=document.getElementById("show");
	show.value=num;
});  


function changImg(e){
	var myImg = document.getElementById('myImg');
  var content_img=document.getElementById("content_img");
  var img_name=content_img.value;
  if(img_name==''){
  	 myImg.style.display='none';
  	
  }else{
		 for (var i = 0; i < e.target.files.length; i++) {
		 var file = e.target.files[i];
		 console.log(file);
		 if (!(/^image\/.*$/i.test(file.type))) {
		 	alert("请选择正确格式的图片");
		 	content_img.value='';
		 	 myImg.style.display='none';
		  continue; //不是图片 就跳出这一次循环
		 }
		 //实例化FileReader API
		 var freader = new FileReader();
		 freader.readAsDataURL(file);
		 freader.onload = function(e) {
		  myImg.style.display='block';
		  console.log(e);
		  myImg.setAttribute('src', e.target.result);
		 }
		 }
  }

 }

function checkF(){
		var hua=document.getElementById("hua");
	var say=hua.value;
	if(say==''){
		alert('请输入你的评价(⊙o⊙)哦');
		hua.focus();
		return false;
	}
}
</script>