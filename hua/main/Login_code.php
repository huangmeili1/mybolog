<?php
session_start();
$ph=$_POST['phone'];
function getRandomString($len, $chars=null)  
{  
    if (is_null($chars)){  
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";  
    }  
    mt_srand(10000000*(double)microtime());  
    for ($i = 0, $str = '', $lc = strlen($chars)-1; $i < $len; $i++) {  
        $str .= $chars[mt_rand(0, $lc)];  
    }  
    return $str;  
}  
	$_SESSION['Login_code']=getRandomString(4);
	$code=$_SESSION['Login_code'];
   	$host = "https://fesms.market.alicloudapi.com";//api访问链接
    $path = "/sms/";//API访问后缀
    $method = "GET";
    $appcode = "c0ed7518a5e3456a8809182a9b170810";//替换成自己的阿里云appcode
    $headers = array();
    array_push($headers, "Authorization:APPCODE " . $appcode);
    $querys="code=$code&phone=$ph&skin=17";  //参数写在这里
    $bodys = "";
    $url = $host . $path . "?" . $querys;//url拼接
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_FAILONERROR, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    if (1 == strpos("$".$host, "https://"))
    {
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    }
    echo(curl_exec($curl));
?>