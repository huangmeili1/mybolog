<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">
					添加其他图片
				</h4>
			</div>
			<div class="modal-body">
				<div style="margin-left: 50px;">
				<label>你要添加几张图片：</label><form><input type="text"/><button name="tj">确定</button></form>
				<?php
					if(isset($_POST['tj'])){
						?>
						<form style="display: none;margin-left: 30px;" id="form" method="post" action="add_other_img.php" enctype="multipart/form-data">
					4543543
						</form>
						<?php
					}
					?>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">关闭
				</button>
				<button type="button" class="btn btn-primary">
					提交更改
				</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal -->
</div>