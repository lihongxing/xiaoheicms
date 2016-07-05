<?php
	require '../common/header-gw.php';
?>
<ol class="breadcrumb">
	<li><a href="../account/display.php"><i class="fa fa-home"></i></a></li>
	<li><a href="../system/welcome.php">系统</a></li>
	<li class="active">更新缓存</li>
</ol>
<div class="clearfix">
	<h5 class="page-header">更新缓存</h5>
	<form action="" method="post" class="form-horizontal" role="form">
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">缓存类型</label>
			<div class="col-sm-10">
				<label for="type_data" class="checkbox-inline">
					<input type="checkbox" name="type[]" value="data" id="type_data" checked="checked" /> 数据缓存
				</label>
				<label for="type_template" class="checkbox-inline">
					<input type="checkbox" name="type[]" value="template" id="type_template" checked="checked" /> 模板缓存
				</label>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-md-offset-2 col-lg-offset-1 col-xs-12 col-sm-10 col-md-10 col-lg-11">
				<input name="submit" type="submit" value="提交" class="btn btn-primary span3" />
				<input type="hidden" name="token" value="" />
			</div>
		</div>
	</form>
</div>
<?php
	require '../common/footer-gw.php';
?>