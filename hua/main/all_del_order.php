<?php
include("../conn/dataconnection.php");
@$books=$_POST['books'];
$a=0;
for($i=0;$i<count($books);$i++){
	
	$book_id=$books[$i];
	$sql=mysql_query("delete from order_detail where book_id='$book_id'");
	$sqll=mysql_query("delete from book where book_id='$book_id'");
	@$sqll_num=mysql_affected_rows();
	if($sqll_num>0){
		$a++;
	}
}
if($a==count($books)){
	$response=array(
	"errno"=>0,
	"msg"=>"success",
	"a"=>$a,
	"data"=>true
	);
}else{
	$response=array(
	"errno"=>1,
	"msg"=>"fail",
	"a"=>$a,
	"data"=>false
	);
}
echo json_encode($response);
?>