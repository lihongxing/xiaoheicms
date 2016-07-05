<?php
	require(\Yii::getAlias("@app")."/modules/wechat/views/common/header-gw.php");
?>
<ol class="breadcrumb">
	<li><a href="../account/display.php"><i class="fa fa-home"></i></a></li>
	<li class="active">系统</li>
</ol>	
<div class="clearfix" style="margin-bottom:5em;">
	<h5 class="page-header">公众号</h5>
	<div class="clearfix">
		<a href="../account/display.php" class="tile img-rounded">
			<i class="fa fa-comments"></i>
			<span>公众号列表</span>
		</a>
	</div>
	<h5 class="page-header">用户管理</h5>
	<div class="clearfix">
		<a href="../user/profile.php" class="tile img-rounded">
			<i class="fa fa-briefcase"></i>
			<span>我的账户</span>
		</a>
	</div>
</div>
<?php
	require(\Yii::getAlias("@app")."/modules/wechat/views/common/footer-gw.php");
?>