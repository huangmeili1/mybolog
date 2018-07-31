<?php
include("../conn/dataconnection.php");
@$book_id=$_POST['book_id'];
@$sql=mysql_query("select * from book where book_id='$book_id' and state='待评价'");
@$sql_num=mysql_num_rows($sql);
if($sql_num>0){
	$response=array(
	"errno"=>0,
	"msg"=>"success",
	"data"=>false
	);
}else{
	@$dta=date("Y-m-d");
	
	@$u=mysql_query("update book set state='待评价',get_time='$dta' where book_id='$book_id'");
	@$u_num=mysql_affected_rows();
//	echo $u_num;
	if($u_num>0){
		@$book=mysql_query("select * from book where book_id='$book_id'");
		@$book_book=mysql_fetch_array($book);
		@$jifen=$book_book['sum_price']*0.1;
		@$jing=$book_book['sum_price']/50;
		@$user_id=$book_book['user_id'];
		@$d=date("Y");//年份
		@$y=date("m");//月分
		@$de=mysql_query("select * from order_detail where book_id='$book_id'");
		@$total_s=0;
		@$a=-1;
		while($g=mysql_fetch_array($de)){
			$a++;
			@$good_id=$g['good_id'];
			@$un=$g['num'];
			@$u_g=mysql_query("update goods set sales=sales+$un where good_id='$good_id'");
			@$s=mysql_query("select * from goods where good_id='$good_id'");
			@$ss=mysql_fetch_array($s);
			@$kind_id=$ss['kind_id'];
			@$good_p=$g['price']*$un;//总价
			@$matile=$ss['buy_price']*$un;//成本
			@$total_s=$total_s+$matile;//成本
			@$real_price=$good_p-$matile;
			@$up_s=mysql_query("select * from summary where acct_yr='$d' and acct_mth='$y' and kind_id='$kind_id'");
			@$up_s_num=mysql_num_rows($up_s);
			if(@$up_s_num>0){
				@$f=mysql_fetch_array($up_s);
				@$id=$f['id'];
				@$uup=mysql_query("update summary set amount=amount+$un,money=money+$real_price,sum_money=sum_money+$good_p where id='$id'");
			}else{
				@$insert=mysql_query("insert into summary(acct_mth,acct_yr,amount,kind_id,money,sum_money) values('$y','$d','$un','$kind_id','$real_price','$good_p')");
			}
			if($a==0){
				@$good_sales=mysql_query("select * from good_sales where good_id='$good_id' and yr='$d' and mh='$y'");
				@$good_sales_num=mysql_num_rows($good_sales);
				@$cheap=$book_book['cheap'];
				if($good_sales_num>0){
					@$sa=mysql_fetch_array($good_sales);
					@$sales_id=$sa['sales_id'];
					@$up_sales=mysql_query("update good_sales set sales_amount=sales_amount+$un,sales_money=sales_money+$good_p,getreal_money=getreal_money+$real_price where sales_id='$sales_id'");
				}else{
					@$insert_sales=mysql_query("insert into good_sales(yr,mh,good_id,sales_amount,yuhui,sales_money,getreal_money) values('$d','$y','$good_id','$un','$cheap','$good_p','$real_price')");
				}
			}else{
				@$good_sales=mysql_query("select * from good_sales where good_id='$good_id' and yr='$d' and mh='$y'");
				@$good_sales_num=mysql_num_rows($good_sales);
				if($good_sales_num>0){
					@$sa=mysql_fetch_array($good_sales);
					@$sales_id=$sa['sales_id'];
					@$up_sales=mysql_query("update good_sales set sales_amount=sales_amount+$un,sales_money=sales_money+$good_p,getreal_money=getreal_money+$real_price where sales_id='$sales_id'");
				}else{
					@$insert_sales=mysql_query("insert into good_sales(yr,mh,good_id,sales_amount,sales_money,getreal_money) values('$d','$y','$good_id','$un','$good_p','$real_price')");
				}
			}
			
		}
		@$all_price=$book_book['sum_price'];
		@$real_money=$all_price-$total_s;
		@$uup=mysql_query("update summary set sum_money=sum_money-$cheap,money=money-$cheap where id='$id'");
		@$user=mysql_query("update user set jifen=jifen+$jifen,jingyan=jingyan+$jing where user_id='$user_id'");
		$response=array(
		"errno"=>1,
		"msg"=>"success",
		"data"=>true
		);
	}else{
		$response=array(
		"errno"=>2,
		"msg"=>"success",
		"data"=>true
		);
	}
}
echo json_encode($response);
?>