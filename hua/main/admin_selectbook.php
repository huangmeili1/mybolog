<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>花间杂物铺首页</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	body{
		margin-top: 70px;
	}
	 span{
	    display: inline-block;
       cursor: pointer; padding: 8px; border: 1px solid #999;
       margin-top: 10px;
       }
        span.active{
       background-color: #c14d00;
   }
</style>
<?php
include("../conn/dataconnection.php");
?>
<div class="container" style="width: 100%;">
	<?php include("m_top.php"); ?>
		<div class="row">
			<div class="col-md-12" style="text-align: center;font-size: 24px;">订单查询</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div style="margin-left: 520px;margin-top: 30px;">
					<form method="get" action="admin_selectbook2.php">
					订单产生日期:
					<input required="required" name="book_time1" type="date" />
					-
					<input required="required" name="book_time2" type="date" /><br>
					<div>
						<strong>订单状态：</strong>
						<span><input type="radio" checked name="state" value="全部" />全部</span>
						<span><input type="radio" name="state" value="未发货" />未发货</span>
						<span><input type="radio" name="state" value="待收货" />待收货</span>
						<span><input type="radio" name="state" value="待评价" />待评价</span>
						<span><input type="radio" name="state" value="已评价" />已评价</span>
					</div>
					<button style="margin-left: 80px;margin-top: 20px;" type="submit" class="btn btn-danger">查询</button>
					</form>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div id="show_order" class="col-md-12">
				
			</div>
		</div>
</div>