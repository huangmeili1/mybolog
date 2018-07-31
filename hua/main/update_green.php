<?php
@$mess=$_POST['mess'];
include("../conn/dataconnection.php");
if($mess==1){
	$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='绿色植物') order by sales desc");
}else if($mess==2){
	$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='绿色植物') order by good_price asc");
}else if($mess==3){
	$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='绿色植物') order by good_time desc");
}
?>
<?php
	@$sql_num=mysql_num_rows($sql);
	if($sql_num<=0){
		?>
		<div class="row">
			<div class="col-md-12">
				暂时无法查看
			</div>
		</div>
		<?php
	}else{
		
		?>
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12">
						<?php
						if($mess==1){
							?>
							<span>按销量降序</span>
							<?php
						}else if($mess==2){
							?>
							<span>按价格升序</span>
							<?php
						}else if($mess==3){
							?>
							<span>按日期降序</span>
							<?php
						}
						?>
					</div>
				</div>
				<div class="row">
			<?php 
				while($fe=mysql_fetch_array($sql)){
					?>
					<div class="col-md-4" style="margin-top: 30px;">
					<div onmouseleave="change_type2(<?php echo $fe['good_id']; ?>)" onmouseover="change_type(<?php echo $fe['good_id']; ?>)" id="div<?php echo $fe['good_id']; ?>" class="thumbnail" style="width: 95%;padding: 0;height: 480px;border: 0;">
						<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $fe['good_id'] ?>">
						<div class="thumbnail" style="width: 100%;height: 400px;border: 0;padding: 0;">
							<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $fe['good_id'] ?>">
									<img style="height: 400px;width: 100%;" src="<?php echo $fe['main_img']; ?>" />
									<div class="caption" style="text-align: center;">
										<p style="font-size: 20px;">
											<?php
											echo $fe['good_name'];
											?>
										</p>
											<p style="font-size: 18px;"><b>￥<?php echo $fe['good_price']; ?></b></p>
									</div>
								</a>
						</div>
						</a>
					</div>
					</div>
					<?php
				}
				 ?>
				</div>
		</div>
	</div>
		<?php
	}
	?>
	