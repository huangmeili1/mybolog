<?php
 	header('content-type:text/html charset:utf-8');
 	$good_id=$_GET['good_id'];
 	$I=$_GET['I'];
 	include("../conn/dataconnection.php");
 	$dir_base = "../update/"; 
    $index = 0;        //$_FILES 以文件name为数组下标，不适用foreach($_FILES as $index=>$file)
    foreach($_FILES as $file){
        $upload_file_name = 'upload_file' . $index;
        $d=date("YmdHis").rand(2,4000);     //对应index.html FomData中的文件命名
        $filename = $_FILES[$upload_file_name]['name'];
        $gb_filename = iconv('utf-8','gb2312',$filename);    //名字转换成gb2312处理
        //文件不存在才上传
        if(!file_exists($dir_base.$gb_filename)) {
            $isMoved = false;  //默认上传失败 
            $rEFileTypes = "/^\.(jpg|jpeg|gif|png){1}$/i"; 
            if (preg_match($rEFileTypes, strrchr($gb_filename, '.'))){
            	$a=strrchr($gb_filename, '.');
                $isMoved = @move_uploaded_file( $_FILES[$upload_file_name]['tmp_name'], $dir_base.$d.$a);        //上传文件
            }
        }else{
        	$isMoved = true; 
               //已存在文件设置为上传成功
        }
        $index++;
    }
    
    if($isMoved){
    	$image=$dir_base.$d.$a;
    	$sql=mysql_query("select * from goods where good_id='$good_id'");
    	$flower=mysql_fetch_array($sql);
    	$img=$flower['good_img'];
    	$a=$I-1;
    	$images=explode("*",$img);
    	$images[$a]=$image;
    	$newimg=implode("*",$images);
    	$update=mysql_query("update goods set good_img='$newimg' where good_id='$good_id'");
    	@$unum=mysql_affected_rows();
    	if($unum<=0){
    		$response=array(
				'errno'=>2,
				'errmsg'=>'fail',
				'data'=>false,
				);
    	}else{
    		$response=array(
				'errno'=>0,
				'errmsg'=>'success',
				'img'=>$image,
				'data'=>true,
				);
    	}
	   
    }else{
	    $response=array(
		'errno'=>1,
		'errmsg'=>'fail',
		'data'=>false,
		);
    }
    echo json_encode($response);
//?>