<?php
	require '../common/header4.php';
?>
<div class="main">
	<form id="form1"  action="../profile/jsauth.php" method="post" class="form-horizontal form">
		<div class="panel panel-default">
			<div class="panel-heading">
				借用 JS 分享设置
			</div>
			<input type="hidden" name="oauth[status]" value="1">
			<div class="panel-body">
				<div class="form-group" id="account">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">选择公众号</label>
					<div class="col-sm-9 col-xs-12">
						<select name="jsauth_acid" class="form-control">
							<option value="0">不借用任何权限</option>
						</select>
						<span class="help-block">在系统中使用微信分享接口前，开发者需要先到公众平台网站的【公众号设置】 / 【功能设置】中配置 【JS 接口安全域名】。<a href="http://www.012wz.com/wiki/" target="_black">查看详情</a></span>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group col-sm-12">
			<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1 col-sm-2 col-md-2 col-xs-3" />
			<input type="hidden" name="token" value="" />
		</div>
	</form>
</div>
<?php
	require '../common/footer.php';
?>