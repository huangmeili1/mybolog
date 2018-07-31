<meta charset="utf-8" />
<?php
include("../conn/dataconnection.php");
@$good_id=$_GET['good_id'];
@$de=mysql_query("select * from order_detail where good_id='$good_id'");
@$de_num=mysql_num_rows($de);
$a=0;
$books=array();
if($de_num>0){
	while($book=mysql_fetch_array($de)){
		@$book_id=$book['book_id'];
		@$b=mysql_query("select * from book where state='未发货' and book_id='$book_id'");
		@$b_num=mysql_num_rows($b);
		if($b_num>0){
			$books[$a]=$book_id;
			$a++;
		}
		
	}
	if($a!=0){
		echo "<script>alert('此商品还有订单未发货，不能删除');</script>";
		?>
		<p style="text-align: center;">
			<h4 style="text-align: center;">
				以下订单未发货:
				<?php
					for($i=0;$i<count($books);$i++){
						echo $books[$i]."<br>";
					}
					?>
			</h4>
		</p>
		<?php
	}else{
@$sql=mysql_query("delete from cart where good_id='$good_id'");
@$sql=mysql_query("delete from comments where good_id='$good_id'");
@$sql=mysql_query("delete from order_detail where good_id='$good_id'");
@$sql=mysql_query("delete from storegood where good_id='$good_id'");
@$sql=mysql_query("delete from goods where good_id='$good_id'");
echo "<script>alert('删除成功');history.go(-1);</script>";
	}
}else{
@$sql=mysql_query("delete from cart where good_id='$good_id'");
@$sql=mysql_query("delete from comments where good_id='$good_id'");
@$sql=mysql_query("delete from order_detail where good_id='$good_id'");
@$sql=mysql_query("delete from storegood where good_id='$good_id'");
@$sql=mysql_query("delete from goods where good_id='$good_id'");
echo "<script>alert('删除成功');history.go(-1);</script>";
}

?>