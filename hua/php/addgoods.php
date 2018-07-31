<meta charset="utf-8" />
<?php
	session_start();
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		include_once("../conn/dataconnection.php");
	   ?>
	   <div style="margin: 0 auto;text-align: center;width: 100%;">
	   	<?php
	   		include("top1.php");
	   		?>
	   		<div style="margin: 0 auto;text-align: center;width: 100%;padding-top: 0;">
	   			<h2>添加商品</h2>
	   			<form name="form1" action="" method="post" enctype="multipart/form-data" onsubmit="return formchk2()">
	   				<table style="margin-left: 200px;">
	   					<tr>
	   						<td>商品名称：</td>
	   						<td><input type="text" name="name" size="146" value="<?php echo @$_POST['name'] ?>" style="height: 40px;"></td>
	   					</tr>
	   					<tr>
	   						<td>市场价格：</td>
	   						<td><input type="text" name="price" size="146" value="<?php echo @$_POST['price'] ?>" style="height: 40px;"></td>
	   					</tr>
	   					<tr>
	   						<td>花语：</td>
	   						<td><input type="text" name="hua" size="146" value="<?php echo @$_POST['hua'] ?>" style="height: 40px;"></td>
	   					</tr>
	   					<tr>
	   						<td>总量：</td>
	   						<td><input type="text" name="sum" size="146" value="<?php echo @$_POST['sum'] ?>" style="height: 40px;"></td>
	   					</tr>
	   					<tr>
	   						<td>朵数：</td>
	   						<td><input type="text" name="flower_num" size="146" value="<?php echo @$_POST['flower_num'] ?>" style="height: 40px;"></td>
	   					</tr>
	   					<tr>
	   						<td>封面图片：</td>
	   						<td><input type="file" name="img"></td>
	   					</tr>
	   					<tr>
	   						<td>细节图片：</td>
	   						<td>
	   							<input type="file" name="image[]">
	   							<input type="file" name="image[]">
	   							<input type="file" name="image[]">
	   						</td>
	   					</tr>
	   					<tr>
	   						<td>材料：</td>
	   						<td><input type="text" name="material" size="146" value="<?php echo @$_POST['material'] ?>" style="height: 40px;"></td>
	   					</tr>
	   					<tr>
	   						<td>原价：</td>
	   						<td><input type="text" name="prime_cost" size="146" value="<?php echo @$_POST['prime_cost'] ?>" style="height: 40px;"></td>
	   					</tr>
	   					<tr>
	   						<td>进口价：</td>
	   						<td><input type="text" name="buy_price" size="146" value="<?php echo @$_POST['buy_price'] ?>" style="height: 40px;"></td>
	   					</tr>
	   					<tr>
	   						<td>用途：</td>
	   						<td><input type="text" name="use" size="146" value="<?php echo @$_POST['use'] ?>" style="height: 40px;"></td>
	   					</tr>
	   					<tr>
	   						<td>适合节日：</td>
	   						<td><input type="text" name="festival" size="146" value="<?php echo @$_POST['festival'] ?>" style="height: 40px;"></td>
	   					</tr>
	   					<tr>
	   						<td>包装：</td>
	   						<td><input type="text" name="packing" size="146" value="<?php echo @$_POST['packing'] ?>" style="height: 40px;"></td>
	   					</tr>
	   					<!--<tr>
	   						<td>类别：</td>
	   						<td><input type="text" name="type_id" size="146" value="<?php echo @$_POST['type_id'] ?>" style="height: 40px;"></td>
	   					</tr>-->
	   					<tr>
	   						<td>适合对象：</td>
	   						<td><input type="text" name="object" size="146" value="<?php echo @$_POST['object'] ?>" style="height: 40px;"></td>
	   					</tr>
	   					<tr>
	   						<td>品种：</td>
	   						<td>
	   							<?php
	   								include_once("../conn/dataconnection.php");
	   								$sql=mysql_query("select * from kind");
	   								@$num=mysql_num_rows($sql);
	   								if($num<=0){
	   									echo "暂无品种";
	   								}else{
	   									while($a=mysql_fetch_array($sql)){
	   										?>
	   										<input type="radio" checked="checked" name="kind" value="<?php echo $a['kind_id'] ?>" /><?php echo $a['kind_name'] ?>
	   										<?php
	   									}
	   								}
	   								?>
	   						</td>
	   					</tr>
						<tr>
							<td colspan="2" align="center"><input style="width: 80px;height: 35px;font-size: 20px;border: 0;background-color: #317EB4;" type="submit" name="tj" value="提交">&nbsp;&nbsp;<a href="" onclick="javascript:history.go(-1);"><input type="button" style="width: 120px;height: 35px;font-size: 20px;border: 0;background-color: #317EB4;" value="返回上一页"></a>&nbsp;&nbsp;<a href="managecenter.php"><input type="button" style="width: 130px;height: 35px;font-size: 20px;border: 0;background-color: #317EB4;" value="返回管理中心"></a></td>
						</tr> 
	   				</table>
	   			</form>
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
		$good_time=date("Y-m-d");
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
					$sql=mysql_query("insert into goods(good_name,good_price,good_hua,good_num,sum,main_img,flower_num,material,prime_cost,buy_price,good_use,festival,packing,object,kind_id,good_time,details_img) values('$good_name','$good_price','$good_hua','$good_num','$sum','$man_img','$flower_num','$material','$prime_cost','$buy_price','$use','$festival','$packing','$object','$kind_id','$good_time','$stra')");
					if(mysql_affected_rows()>0){
						$ss=mysql_query("select * from goods where good_name='$good_name' and good_hua='$good_hua' and details_img='$stra'");
						$rader=mysql_fetch_array($ss);
						$good_id=$rader['good_id'];
						echo "<script>alert('添加成功！');window.location.href='addotherimg.php?good_id=$good_id';</script>";
				   }else{
					echo "<script>alert('添加失败');histroy.go(-1);</script>";
					}
//			    echo $stra;
//                  
				}
					
				}
      }
	
	?>
	</div>

	
	
	

<script  type="text/javascript" language="javascript">
function formchk2(){
    var inputs=form1.getElementsByTagName('input');
    for(i=0;i<inputs.length;i++){
        if(inputs[i].value==''){
            inputs[i].focus();
            return false;
        }
    }
 
    return true;
}
</script>
   