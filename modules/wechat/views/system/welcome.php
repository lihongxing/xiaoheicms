<?php
	require(\Yii::getAlias("@app")."/modules/wechat/views/common/header-gw.php");
?>
<ol class="breadcrumb">
	<li><a href="../account/display.php"><i class="fa fa-home"></i></a></li>
	<li class="active">系统</li>
</ol>	
<div class="clearfix" style="margin-bottom:5em;">
	<h5 class="page-header">扩展</h5>
	<div class="clearfix">
		<a href="../extension/module.php" class="tile img-rounded">
			<i class="fa fa-cubes"></i>
			<span>模块</span>
		</a>
		<a href="../extension/subscribe.php" class="tile img-rounded">
			<i class="fa fa-volume-up"></i>
			<span>订阅管理</span>
		</a>
		<a href="../extension/service.php" class="tile img-rounded">
			<i class="fa fa-glass"></i>
			<span>常用服务</span>
		</a>
		<a href="../extension/theme.php" class="tile img-rounded">
			<i class="fa fa-life-bouy"></i>
			<span>微站风格</span>
		</a>
		<a href="../extension/theme.php" class="tile img-rounded">
			<i class="fa fa-puzzle-piece"></i>
			<span>后台皮肤</span>
		</a>
		<a href="../extension/menu.php" class="tile img-rounded">
			<i class="fa fa-list"></i>
			<span>系统菜单</span>
		</a>
		<a href="../extension/platform.php" class="tile img-rounded">
			<i class="fa fa fa-cubes"></i>
			<span>微信开放平台</span>
		</a>
	</div>
	<h5 class="page-header">文章/公告</h5>
	<div class="clearfix">
		<a href="../article/news.php" class="tile img-rounded">
			<i class="fa fa-comments"></i>
			<span>文章管理</span>
		</a>
		<a href="../article/notice.php" class="tile tile-2x img-rounded">
			<i class="fa fa-comments-o"></i>
			<span>公告管理</span>
		</a>
	</div>
	<h5 class="page-header">公众号</h5>
	<div class="clearfix">
		<a href="../account/display.php" class="tile img-rounded">
			<i class="fa fa-comments"></i>
			<span>公众号列表</span>
		</a>
		<a href="../account/batch.php" class="tile tile-2x img-rounded">
			<i class="fa fa-comments"></i>
			<span>批量操作公众号</span>
		</a>
		<a href="../account/groups.php" class="tile tile-2x img-rounded">
			<i class="fa fa-comments-o"></i>
			<span>公众号服务套餐</span>
		</a>
	</div>
	<h5 class="page-header">用户管理</h5>
	<div class="clearfix">
		<a href="../user/profile.php" class="tile img-rounded">
			<i class="fa fa-briefcase"></i>
			<span>我的账户</span>
		</a>
		<a href="../user/display.php" class="tile img-rounded">
			<i class="fa fa-user"></i>
			<span>用户管理</span>
		</a>
		<a href="../user/group.php" class="tile img-rounded">
			<i class="fa fa-users"></i>
			<span>用户组管理</span>
		</a>
		<a href="../user/registerset.php" class="tile img-rounded">
			<i class="fa fa-user-md"></i>
			<span>用户设置</span>
		</a>
	</div>
	<h5 class="page-header">系统管理</h5>
	<div class="clearfix">
		<a href="../system/updatecache.php" class="tile img-rounded">
			<i class="fa fa-refresh"></i>
			<span>更新缓存</span>
		</a>
		<a href="../system/site.php" class="tile img-rounded">
			<i class="fa fa-inbox"></i>
			<span>站点设置</span>
		</a>
		<a href="../system/attachment.php" class="tile img-rounded">
			<i class="fa fa-folder-open"></i>
			<span>附件设置</span>
		</a>
		<a href="../system/common.php" class="tile img-rounded">
			<i class="fa fa-gear"></i>
			<span>其他设置</span>
		</a>
		<a href="../system/database.php" class="tile img-rounded">
			<i class="fa fa-database"></i>
			<span>数据库</span>
		</a>
		<a href="../system/tools.php" class="tile img-rounded">
			<i class="fa fa-legal"></i>
			<span>工具</span>
		</a>
		<a href="../system/sysinfo.php" class="tile img-rounded">
			<i class="fa fa-exclamation"></i>
			<span>系统信息</span>
		</a>
		<a href="../system/logs.php" class="tile img-rounded">
			<i class="fa fa-book"></i>
			<span>查看日志</span>
		</a>
		<a href="../system/optimize.php" class="tile img-rounded">
			<i class="fa fa-rocket"></i>
			<span>性能优化</span>
		</a>
	</div>
</div>
<?php
require(\Yii::getAlias("@app")."/modules/wechat/views/common/footer-gw.php");
?>