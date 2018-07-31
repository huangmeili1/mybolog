<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>添加商品</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	body{
		margin-top: 70px;
		overflow-x: hidden;
	}
</style>
<?php
	session_start();
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		include_once("../conn/dataconnection.php");
	   ?>
	  
				<?php
					include("m_top.php");
					?>
					<div class="container" style="width: 100%;">
						<div class="row">
							<div class="col-md-12">
								<h4 style="text-align: center;">
									添加商品
								</h4>
								<form class="form-horizontal" onsubmit="return formchk2()" role="form" name="form1" action="" method="post" enctype="multipart/form-data" >
								  <div class="form-group">
								    <label for="firstname" class="col-sm-2 control-label">商品名称</label>
								    <div class="col-sm-10">
								     	<input type="text" required="required" class="form-control" name="name" size="146" value="<?php echo @$_POST['name'] ?>" style="height: 40px;">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="lastname" class="col-sm-2 control-label">市场价格</label>
								    <div class="col-sm-10">
								      <input type="text" required="required" class="form-control" name="price" id="price" size="146" value="<?php echo @$_POST['price'] ?>" style="height: 40px;">
								    </div>
								  </div>
								  <div class="form-group" style="width: 99%;margin: 0 auto;">
								    <label for="lastname" class="col-sm-2 control-label">花语</label>
								     <div class="col-sm-10" style="margin: 0;padding: 0;margin-bottom: 20px;">
								     <textarea id="content" required="required" name="hua" nowrap="content" class="form-control" rows="3"></textarea>
								    </div>
								    
								  </div>
								  <div class="form-group">
								    <label for="lastname" class="col-sm-2 control-label">总量</label>
								    <div class="col-sm-10">
								      <input type="text" required="required" class="form-control" name="sum" id="sum" size="146" value="<?php echo @$_POST['sum'] ?>" style="height: 40px;">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="lastname" class="col-sm-2 control-label">朵数</label>
								    <div class="col-sm-10">
								      <input type="text" required="required" class="form-control" name="flower_num" id="fl_num" size="146" value="<?php echo @$_POST['flower_num'] ?>" style="height: 40px;">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="lastname" class="col-sm-2 control-label">封面图片</label>
								    <div class="col-sm-10">
								    	<img alt="暂无图片" id="myImg" src="" height="100px" width="100px">
								     	<input type="file" required="required" name="img" onchange="changImg(event)">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="lastname" class="col-sm-2 control-label">材料</label>
								    <div class="col-sm-10">
								      <input type="text" required="required" class="form-control" name="material" size="146" value="<?php echo @$_POST['material'] ?>" style="height: 40px;">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="lastname" class="col-sm-2 control-label">原价</label>
								    <div class="col-sm-10">
								      <input type="text" required="required" class="form-control" name="prime_cost" id="p_cost" size="146" value="<?php echo @$_POST['prime_cost'] ?>" style="height: 40px;">
								    </div>
								  </div>
								   <div class="form-group">
								    <label for="lastname" class="col-sm-2 control-label">进口价</label>
								    <div class="col-sm-10">
								      <input type="text" required="required" class="form-control" name="buy_price" size="146" id="b_price" value="<?php echo @$_POST['buy_price'] ?>" style="height: 40px;">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="lastname" class="col-sm-2 control-label">用途</label>
								    <div class="col-sm-10">
								      <input type="text" required="required" class="form-control" name="use" size="146" value="<?php echo @$_POST['use'] ?>" style="height: 40px;">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="lastname" class="col-sm-2 control-label">适合节日</label>
								    <div class="col-sm-10">
								      <input type="text" required="required" class="form-control" name="festival" size="146" value="<?php echo @$_POST['festival'] ?>" style="height: 40px;">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="lastname" class="col-sm-2 control-label">包装</label>
								    <div class="col-sm-10">
								      <input type="text" required="required" class="form-control" name="packing" size="146" value="<?php echo @$_POST['packing'] ?>" style="height: 40px;">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="lastname" class="col-sm-2 control-label">适合对象</label>
								    <div class="col-sm-10">
								      <input type="text" required="required" class="form-control" name="object" size="146" value="<?php echo @$_POST['object'] ?>" style="height: 40px;">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="lastname" class="col-sm-2 control-label">附赠</label>
								    <div class="col-sm-10">
								      <input type="text" required="required" class="form-control" name="send" size="146" required="required" value="<?php echo @$_POST['send'] ?>" style="height: 40px;">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="lastname" class="col-sm-2 control-label">配送</label>
								    <div class="col-sm-10">
								      <input type="text" required="required" class="form-control" name="ad" size="146" required="required" value="<?php echo @$_POST['ad'] ?>" style="height: 40px;">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="lastname" class="col-sm-2 control-label">说明</label>
								    <div class="col-sm-10">
								      <input type="text" required="required" name="say" class="form-control" size="146" required="required" value="<?php echo @$_POST['say'] ?>" style="height: 40px;">
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
	   										?>
	   										<input style="margin-left: 40px;" type="radio" checked="checked" name="kind" value="<?php echo $a['kind_id'] ?>" /><?php echo $a['kind_name'] ?>
	   										<?php
	   									}
	   								}
	   								?>
								    </div>
								  </div>
								  <div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
								      <input class="btn btn-danger btn-lg" type="submit" name="tj" value="提交">&nbsp;&nbsp;<a href="" class="btn btn-danger" onclick="javascript:history.go(-1);">返回上一页</a>&nbsp;&nbsp;<a href="managecenter.php"><input type="button" class="btn btn-danger" value="返回管理中心"></a>
								    </div>
								  </div>
								</form>
							</div>
						</div>
					</div>
	   	</div>
	   <?php
		
		
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>
	<div id="h" style="margin: 0 auto;text-align: center;color: red;">
		<?php
	if(isset($_POST['tj'])){
		$good_name=$_POST['name'];
		$good_price=$_POST['price'];
		$good_hua=$_POST['hua'];
		$good_num=$_POST['sum'];
		$sum=$_POST['sum'];
		$flower_num=$_POST['flower_num'];
		$material=$_POST['material'];
		$prime_cost=$_POST['prime_cost'];
		$buy_price=$_POST['buy_price'];
		$use=$_POST['use'];
		$festival=$_POST['festival'];
		$packing=$_POST['packing'];
		$object=$_POST['object'];
		$kind_id=$_POST['kind'];
		$send=$_POST['send'];
		$ad=$_POST['ad'];
		$say=$_POST['say'];
		$good_time=date("Y-m-d H:s:i");
		$detail=$_FILES["image"]["name"];
		$d=date('Ymdhis').rand(0,999);
                $pp=array();
                $i=-1;
                $flag=1;
				foreach($detail as $a){
					$i=$i+1;
					$aa=explode(".", $a);
					$aaa=$aa[1];
					$d=date("Ymd").rand(2,4000);
					$r1=$d.".".$aaa;
					$pp[$i]=$r1;
					if(($aaa!='jpg'&&$aaa!='jpge'&&$aaa!='png')&&($aaa!='JPG'&&$aaa!='JPGE'&&$aaa!='PNG')){
						echo "细节图片：".$a."格式不正确"."<br>";
						$flag=0;
						break;
					}
				}
				if($flag=='1'){
					$arr=explode(".", $_FILES["img"]["name"]);
                    @$img=$d.'.'.$arr[1];
                    $y=$arr[1];
					if(($y!='jpg'&&$y!='jpge'&&$y!='png')&&($y!='JPG'&&$y!='JPGE'&&$y!='PNG')){
						echo "封面图片：".$_FILES["img"]["name"]."格式不正确"."<br>";
					}else{
					move_uploaded_file($_FILES['img']["tmp_name"],"../rederimg/".$img);
					$man_img="../rederimg/".$img;
					$pn=-1;
					for($n=0;$n<count($detail);$n++){
					$pn=$pn+1;
					move_uploaded_file($_FILES['image']["tmp_name"][$n],"../other/".$pp[$n]);
					$images[$pn]="../other/".$pp[$n];	
					}
					@$stra=implode("*",$images);
					$sql=mysql_query("insert into goods(good_name,good_price,good_hua,good_num,sum,main_img,flower_num,material,prime_cost,buy_price,good_use,festival,packing,object,kind_id,good_time,send,ad,say) values('$good_name','$good_price','$good_hua','$good_num','$sum','$man_img','$flower_num','$material','$prime_cost','$buy_price','$use','$festival','$packing','$object','$kind_id','$good_time','$send','$ad','$say')");
					if(mysql_affected_rows()>0){
						$ss=mysql_query("select * from goods where good_name='$good_name' and good_hua='$good_hua' and main_img='$man_img'");
						$rader=mysql_fetch_array($ss);
						$good_id=$rader['good_id'];
						echo "<script>alert('添加成功！');window.location.href='addotherimg.php?good_id=$good_id';</script>";
				   }else{
					echo "<script>alert('添加失败');histroy.go(-1);</script>";
				}
//			    echo $stra;
                 
				}
					
				}
      }
	
	?>
	</div>

	
	
	

<script  type="text/javascript">
function formchk2(){
	var price=document.getElementById('price').value;
	var sum=document.getElementById('sum').value;
	var flower_num=document.getElementById('fl_num').value;
	var p_cost=document.getElementById('p_cost').value;
	var b_price=document.getElementById('b_price').value;
	var patten=new RegExp(/^[1-9]d*.d*|0.d*[1-9]d*$/);
//	"^[1-9]d*.d*|0.d*[1-9]d*$";
	 
//	var patten1=new RegExp(/^[1-9]d*$/);
//	return false;
	if(!patten.test(price)){
		alert('市场价格错误，请重新输入');
		document.getElementById('price').focus();
		return false;
	}else if(!patten.test(p_cost)){
		alert('原价错误，请重新输入');
		document.getElementById('p_cost').focus();
		return false;
	}else if(!patten.test(b_price)){
		alert('进口价错误，请重新输入');
		document.getElementById('b_price').focus();
		return false;
	}else{
		return true;
	}
	
}
</script>
  
<script>
 function changImg(e){
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
 
 function changImgs(e,num){
 var myImg = document.getElementById('myImg'+num);
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
</script>