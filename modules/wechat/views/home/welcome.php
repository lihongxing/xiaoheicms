<?php
	switch($_GET['tzid']){
		case 1:require '../common/header.php';$aaa="账号概况 - 平台相关数据";break;
		case 2:require '../common/header2.php';$aaa="账号概况 - 微站功能概括";break;
		case 3:require '../common/header3.php';$aaa="账号概况 - 会员功能概括";break;
		case 4:require '../common/header4.php';$aaa="账号概况 - 功能参数概括";break;
		case 5:require '../common/header5.php';$aaa="账号概况 - 扩展功能概括";break;
		case 6:require '../common/header6.php';break;
		default :$aaa="";
	}
?>

<ul class="nav nav-tabs">
	<li class="active"><a href="../home/welcome.php">账号概况 - 微站功能概括</a></li>
</ul>
<div class="clearfix welcome-container">
	<div class="page-header">
		<h4><i class="fa fa-plane"></i> 快捷操作</h4>
	</div>
	<div class="shortcut clearfix">
		<a href="../platform/reply.php">
			<i class="fa fa-sitemap"></i>
			<span>自定义接口</span>
		</a>
	</div>
	<?php
		switch($_GET['tzid']){
			case 1:require '../home/welcome-platform.php';break;
			case 2:require '../home/welcome-site.php';break;
			case 3:require '../home/welcome-mc.php';break;
			case 4:require '../home/welcome-setting.php';break;
			case 5:require '../home/welcome-ext.php';break;
			case 6:require '../utility/emulator.php';break;
		}
	?>
</div>
<?php
	require '../common/footer.php';
?>
