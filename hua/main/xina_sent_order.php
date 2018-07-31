<?php
include("../conn/dataconnection.php");
  ob_end_clean();
  @$sql=mysql_query("select * from book where state='未发货'");
  @$sql_num=mysql_num_rows($sql);
  $filename=$sql_num."个未发货订单信息";  
  header("Content-type:application/vnd.ms-excel");  
  header("Content-Disposition:filename=".$filename.".xls");
  $strexport="编号\t订单编号\t用户编号\t用户昵称\t订单金额\t收货人姓名\t收货人手机\t收货人地址\t收货人邮编\t付款方式\下单时间\r"; 
	$i=0;
	while($book=mysql_fetch_array($sql)){
		$i++;
		$strexport.=$i."\t";
		$strexport.=$book['book_id']."\t";
		$strexport.=$book['user_id']."\t";
		@$user_id=$book['user_id'];
		@$u=mysql_query("select * from user where user_id='$user_id'");
		@$user=mysql_fetch_array($u);
		$strexport.=$user['realname']."\t";
		$strexport.=$book['sum_price']."\t";
		@$get_id=$book['get_id'];
		@$get=mysql_query("select * from getinfo where get_id='$get_id'");
		@$gg=mysql_fetch_array($get);
		$strexport.=$gg['get_name']."\t";
		$strexport.=$gg['get_tel']."\t";
		$strexport.=$gg['get_add']."\t";
		$strexport.=$gg['get_post']."\t";
		@$m_id=$book['money_id'];
		@$m=mysql_query("select * from getmoney where money_id='$m_id'");
		@$mm=mysql_fetch_array($m);
		$strexport.=$mm['get_type']."\t";
		$strexport.=$book['book_time']."\r";
		@$book_id=$book['book_id'];
		$de=mysql_query("select * from order_detail where book_id='$book_id'");
		$a=0;
		while(@$dee=mysql_fetch_array($de)){
			$a++;
			$strexport.=$book_id."商品详情".$a.":\t";
			$strexport.=$dee['name'].":";
			$strexport.=$dee['num']."\t";
			$strexport.=$dee['price']."元\t";
			$strexport.="小计：".$dee['num']*$dee['price']."元\r";
		}
		
	}
	 $strexport=iconv('UTF-8',"GB2312//IGNORE",$strexport);  
  exit($strexport);  
?>