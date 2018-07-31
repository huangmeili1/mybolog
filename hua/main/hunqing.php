<meta charset="utf-8" />
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
include("top.php");
include("../conn/dataconnection.php");
?>
<div class="container" style="width: 100%;margin: 0;padding: 0;">
	
	<div class="row" style="width: 90%;margin: 0 auto;">
		<div class="col-xs-6 col-md-12" style="padding: 0;margin: ;">
			<div class="thumbnail" style="padding: 0;margin: 0;">
				<img style="width: 100%;height: 400px;" src="../img/qing.jpg" />
			</div>
		</div>
	</div>
	<div class="row" style="width: 90%;margin: 0 auto;padding: 0;margin-top: 20px;">
		<div class="col-xs-6 col-md-12" style="width: 100%;margin:0 auto;padding: 0;">
					<table style="line-height: 40px;font-size: 20px;">
							<tr>
								<?php
									
									?>
								<td width="70"><a href="hunqing.php" style="color: orangered;"><span id="zz">综合</span></a></td>
								<td width="70"><a href="javascript:lou('hunqing2.php?type=销量&ad=hunqing2','销量')"><span id="z1">销量<span class="caret"></span></span></a></td>
								<td width="70"><a href="javascript:lou('hunqing2.php?type=价格&ad=hunqing2','价格')"><span id="z2">价格</span></a></td>
								<td width="70"><a href="javascript:lou('hunqing2.php?type=最新&ad=hunqing2','最新')"><span id="z3">最新<span class="caret"></span></span></a></td>
							</tr>
					</table>
		</div>
	</div>
	
	<div class="row" id="main" style="width: 90%;margin: 0 auto;margin-top: 20px;">
		<?php include("hunqing1.php"); ?>
	</div>
	
	
</div>
<div class="row" style="width: 100%;margin: 0;padding: 0;margin-top: 100px;">
		<div class="col-xs-6 col-md-12">
			<?php include("footer.php"); ?>
		</div>
	</div>

<script type="text/javascript" src="../js/index.js"></script>
<script type="text/javascript" src="../js/check.js"></script>