<style type="text/css">
	
	body a{text-decoration: none;}
	body a:link{color: blue;}
	body a:visited {color: blue;}
	body a:hover {color: orange;} 
</style>
<div id="pp" style="margin: 0 auto;text-align: center; width: 100%;height: 10%;background-color: black;">
		<div id="aa1" style="float: left;">
	<h2 align="left" style="color: white;margin-top: 10px;"><?php if(@$_SESSION['type']=='管理员'){
		?>
		后台管理
		<?php
	}else{
		echo "个人中心";
	} ?></h2>
	</div>
	<div id="aa2" style="float: right;">
		<h3 align="left" style="color: white;margin-right: 600px;padding-top: 20px;">当前用户:<?php 
			if(@$_SESSION['type']!='') {echo @$_SESSION['admin_name']; }
			if(@$_SESSION['spec']=='普通用户') {echo @$_SESSION['user_name']; }
			?></h3>
	</div>
	
	</div>