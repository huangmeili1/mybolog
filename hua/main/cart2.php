<?php
session_start();
if(!isset($_POST['good_id'])||!isset($_POST['num'])||$_POST['good_id']==''||$_POST['num']==''){
	echo "参数错误";
}else{
	@$good_id=$_POST['good_id'];
	@$num=$_POST['num'];
	if(!isset($_SESSION['cart'])||!isset($_SESSION['num'])||($_SESSION['cart']==''&&$_SESSION['num']=='')){
		@$_SESSION['cart']=$good_id;
		@$_SESSION['num']=$num;
		echo "添加购物车成功";
	}else{
		@$good=explode("$",$_SESSION['cart']);
		@$nums=explode("*",$_SESSION['num']);
		if(in_array($good_id,$good)){
			for($i=0;$i<count($nums);$i++){
			$old_good=$good[$i];
			$old_num=$nums[$i];
			if($good_id==$old_good){
				$nums[$i]=$old_num+1;
			}
		}
		@$n=implode("*",$nums);
		@$_SESSION['num']=$n;
		if(isset($_SESSION['cart'])&&isset($_SESSION['num'])&&$_SESSION['cart']!=''&&$_SESSION['num']!=''){
		echo "购物车中已有此商品，已经为其数量加一";
	}
		}else{
      @$_SESSION['cart']=$_SESSION['cart']."$".$good_id;
	  @$_SESSION['num']=$_SESSION['num']."*".$num;
	  if(isset($_SESSION['cart'])&&isset($_SESSION['num'])&&$_SESSION['cart']!=''&&$_SESSION['num']!=''){
		echo "添加购物车成功";
	}
		}
	}
}


?>
