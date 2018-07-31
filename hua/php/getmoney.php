<meta charset="utf-8" />
<?php
include_once("../conn/dataconnection.php");
//$type=$_POST['type'];
$sql=mysql_query("select * from getmoney");
@$num=mysql_num_rows($sql);
echo $num;
while($t=mysql_fetch_array($sql)){
   ?>
   <div id="aa">
   	<table align="center">
   		<tr>
   			<td>
   				<input type="checkbox" value="<?php echo $t['money_id'] ?>">
   				<img src="<?php echo $t['get_img'] ?>">
   			</td>
   		</tr>
   	</table>
   </div>
   <?php
// 	echo $type;
}

//echo json_encode($response);

?>