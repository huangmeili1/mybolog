<?php
 	header('content-type:text/html charset:utf-8');
 	$hua_id=$_GET['hua_id'];
 	include("../conn/dataconnection.php");
 	$dir_base = "../know1/"; 
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
        	$sql=mysql_query("update know set img='$image' where hua_id='$hua_id'");
        	@$num=mysql_affected_rows();
        	if(@$num<=0){
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