<?php
	require(\Yii::getAlias("@app")."/modules/wechat/views/common/header-gw.php");
	use yii\helpers\Url;
?>
<ol class="breadcrumb">
	<li><a href="../account/display.php"><i class="fa fa-home"></i></a></li>
	<li><a href="../system/welcome.php">系统</a></li>
	<li class="active">账号信息</li>
</ol>
<ul class="nav nav-tabs">
	<li class="active"><a href="<?= Url::toRoute("/wechat/user/profile") ?>">账号信息</a></li>
	<li><a href="<?= Url::toRoute("/wechat/user/base") ?>">基本信息</a></li>
</ul>
<!--下面是账号信息里面的内容-->
	<div class="clearfix">
		<form action="" method="post" class="form-horizontal form" onsubmit="return formcheck(this)">
			<h5 class="page-header">管理员信息修改</h5>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">管理员帐号</label>
				<div class="col-sm-9 col-xs-12">
						<input type="text" name="name" class="form-control" value="admin" readonly />
						<div class="help-block">只能用'0-9'、'a-z'、'A-Z'、'.'、'@'、'_'、'-'、'!'以内范围的字符</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">管理员密码</label>
				<div class="col-sm-9 col-xs-12">
						<input type="password" name="pw" class="form-control" value="" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label" style="color:red">新密码</label>
				<div class="col-sm-9 col-xs-12">
						<input type="password" name="pw2" class="form-control" value="" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label" style="color:red">确认密码</label>
				<div class="col-sm-9 col-xs-12">
					<input type="password" name="pw3" class="form-control" value="" />
				</div>
			</div>
			<!--下面是会员组里面的内容
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">所属会员组</label>
					<div class="col-sm-9 col-xs-12">
						<p class="form-control-static"></p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label text-danger">服务有效期</label>
					<div class="col-sm-9 col-xs-12">
						<p class="form-control-static text-danger">
							<strong>
							1970-01-01 ~~ 永久有效
							</strong>
						</p>
					</div>
				</div>
			-->
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
				<div class="col-sm-9 col-xs-12">
						<input name="submit" type="submit" value="提交" class="btn btn-primary" />
						<input type="hidden" name="token" value="bdd49c5f" />
				</div>
			</div>
		</form>
	</div>
	<script type="text/javascript">
	function formcheck(form) {
		if (!form['name'].value) {
			alert('请填写管理员帐号！');
			form['name'].focus();
			return false;
		}
		if (!form['pw'].value) {
			alert('请填写管理员密码！');
			form['pw'].focus();
			return false;
		}
		if (!form['pw2'].value) {
			alert('请填写新密码！');
			form['pw2'].focus();
			return false;
		}
		if (form['pw'].value == form['pw2'].value) {
			alert('新密码与原密码一致，请检查！');
			form['pw'].focus();
			return false;
		}
		if (form['pw2'].value.length < 6 ) {
			alert('管理员密码不得小于6个字符！');
			form['pw2'].focus();
			return false;
		}
		if (form['pw2'].value != form['pw3'].value) {
			alert('两次输入的新密码不一致，请重新输入！');
			form['pw2'].focus();
			return false;
		}
	}
	</script>
<?php
    require(\Yii::getAlias("@app")."/modules/wechat/views/common/footer-gw.php");
?>