<?php
include("../conn/dataconnection.php");
@$books=$_POST['books'];
$a=0;
for($i=0;$i<count($books);$i++){
	@$book_id=$books[$i];
	@$d=date("Y-m-d h:s:i");
	$sql=mysql_query("update book set state='待收货',send_time='$d' where book_id='$book_id'");
	@$sql_num=mysql_affected_rows();
	if($sql_num>0){
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