<meta charset="utf-8" />
<?php 
@session_start();
if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
	include("../conn/dataconnection.php");
	$user_id=$_SESSION['user_id'];
	$good_id=$_POST['good_id'];
	$num=$_POST['num'];
	$say=$_POST['say'];
	$d=date("Y-m-d H:s:i");
	$content_img=$_FILES["content_img"]["name"];
	$book_id=$_POST['book_id'];
	@$chek=mysql_query("select * from comments where good_id='$good_id' and book_id='$book_id' and user_id='$user_id'");
	@$chek_num=mysql_num_rows($chek);
	if(@$chek_num>0){
		echo "<script>alert('你已经评价过订单的此商品');history.go(-2);</script>";
	}else{
		if($content_img==''){
		$sql=mysql_query("insert into comments(user_id,good_id,content,comment_time,xinxin,book_id) values('$user_id','$good_id','$say','$d','$num','$book_id')");
	}else{
		$img=strrchr($content_img, '.');
		$image=date("Ymdhis").rand(2,4000).$img;
		move_uploaded_file($_FILES["content_img"]["tmp_name"],"../content/".$image);
		$img_name="../content/".$image;
		$sql=mysql_query("insert into comments(user_id,good_id,content,comment_time,xinxin,content_img,book_id) values('$user_id','$good_id','$say','$d','$num','$img_name','$book_id')");
	}
	@$num=mysql_affected_rows();
	if(@$num>=0){
		@$f=mysql_query("select * from order_detail where book_id='$book_id'");
		@$f_num=mysql_num_rows($f);
		@$d=mysql_query("select * from comments where book_id='$book_id'");
		@$d_num=mysql_num_rows($d);
		if($f_num==$d_num){
			$s=mysql_query("update book set state='已评价' where book_id='$book_id'");
			@$user=mysql_query("update user set jifen=jifen+30 where user_id='$user_id'");
		}
		echo "<script>alert('评价成功');window.location.href='person_content.php';</script>";
	}else{
		echo "<script>alert('评价失败，请稍后再试');history.go(-1);</script>";
	}
	}
	
	
	}else{
	echo "<script>alert('请登录');window.location.href='login.php';</script>";}


		?>