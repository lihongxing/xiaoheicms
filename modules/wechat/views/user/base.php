<?php
	require(\Yii::getAlias("@app")."/modules/wechat/views/common/header-gw.php");
	use yii\helpers\Url;
?>
<ol class="breadcrumb">
	<li><a href="../account/display.php"><i class="fa fa-home"></i></a></li>
	<li><a href="../system/welcome.php">系统</a></li>
	<li class="active">基本信息</li>
</ol>
<ul class="nav nav-tabs">
	<li ><a href="<?= Url::toRoute("/wechat/user/profile") ?>">账号信息</a></li>
	<li class="active"><a href="<?= Url::toRoute("/wechat/user/base") ?>">基本信息</a></li>
</ul>
<div class="clearfix">
	<form action="" class="form-horizontal form" method="post" enctype="multipart/form-data">
		<h5 class="page-header">基本资料</h5>
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">昵称：<span style="color:red">*</span></label>
			<div class="col-sm-10 col-xs-12">
				<input type="text" name="nc" class="form-control" value="" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">真实姓名：<span style="color:red">*</span></label>
			<div class="col-sm-10 col-xs-12">
				<input type="text" name="nc" class="form-control" value="" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">QQ号：</label>
			<div class="col-sm-10 col-xs-12">
				<input type="text" name="nc" class="form-control" value="" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
			<div class="col-sm-9 col-xs-12">
				<button type="submit" class="btn btn-primary span3" name="submit" value="提交">提交</button>
				<input type="hidden" name="token" value="bdd49c5f" />
			</div>
		</div>
	</form>
</div>
<?php
    require(\Yii::getAlias("@app")."/modules/wechat/views/common/footer-gw.php");
?>