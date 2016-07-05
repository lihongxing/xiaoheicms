<?php
	require '../common/header-base.php';
?>
	<div class="navbar navbar-inverse navbar-static-top" role="navigation" style="position:static;">
		<div class="container-fluid">
			<ul class="nav navbar-nav">
				<li><a href="../account/display.php"><i class="fa fa-reply-all"></i>返回系统</a></li>
				<li>
					<a href="../home/welcome-platform.php"><i class="fa fa-cog"></i>基础设置</a>
				</li>
				<li>
					<a href="../home/welcome-site.php"><i class="fa fa-life-bouy"></i>微站功能</a>
				</li>
				<li>
					<a href="../home/welcome-mc.php"><i class="fa fa-gift"></i>粉丝营销</a>
				</li>
				<li>
					<a href="../home/welcome-setting.php"><i class="fa fa-umbrella"></i>功能选项</a>
				</li>
				<li>
					<a href="../home/welcome-ext.php"><i class="fa fa-cubes"></i>扩展功能</a>
				</li>
				<li class="active">
					<a href="../utility/emulator.php" target="_blank"><i class="fa fa-mobile"></i> 模拟</a>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown topbar-notice">
					<a type="button" data-toggle="dropdown">
						<i class="fa fa-bell"></i>
						<span class="badge" id="notice-total">0</span>
					</a>
					<div class="dropdown-menu" aria-labelledby="dLabel">
						<div class="topbar-notice-panel">
							<div class="topbar-notice-arrow"></div>
							<div class="topbar-notice-head">系统公告</div>
							<div class="topbar-notice-body">
								<ul id="notice-container"></ul>
							</div>
						</div>
					</div>
				</li>
				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" style="display:block; max-width:200px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; "><i class="fa fa-group"></i>千诺科技 <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="../account/post.php" target="_blank"><i class="fa fa-weixin fa-fw"></i> 编辑当前账号资料</a></li>
						<li><a href="../account/display.php" target="_blank"><i class="fa fa-cogs fa-fw"></i> 管理其它公众号</a></li>
						<li><a href="../utility/emulator.php" target="_blank"><i class="fa fa-mobile fa-fw"></i> 模拟测试</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" style="display:block; max-width:185px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; "><i class="fa fa-user"></i>admin (系统管理员) <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="../user/profile/profile.php" target="_blank"><i class="fa fa-weixin fa-fw"></i> 我的账号</a></li>
						<li class="divider"></li>
						<li><a href="../system/welcome.php" target="_blank"><i class="fa fa-sitemap fa-fw"></i> 系统选项</a></li>
						<li><a href="../system/welcome.php" target="_blank"><i class="fa fa-cloud-download fa-fw"></i> 自动更新</a></li>
						<li><a href="../system/updatecache.php" target="_blank"><i class="fa fa-refresh fa-fw"></i> 更新缓存</a></li>
						<li class="divider"></li>
						<li><a href="../user/logout.php"><i class="fa fa-sign-out fa-fw"></i> 退出系统</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
		<!--<div class="upgrade-tips" id="setmeal-tips">
			<a href="../user/edit.php" target="_blank">
				您的服务有效期限：2013 ~ 2015.
				
				目前已到期，请联系管理员续费
				
				将在xx天后到期，请及时付费
				
			</a><span class="tips-close" style="background:#d03e14;" onclick="check_setmeal_hide();"><i class="fa fa-times-circle"></i></span>
		</div>-->			<!--一个到期续费通知，我把它给注释了，要用放开-->
		<script>
			function check_setmeal_hide() {
				util.cookie.set('check_setmeal', 1, 1800);
				$('#setmeal-tips').hide();
				return false;
			}
		</script>
	<div class="container-fluid">
		<div class="row">
			
				
				<div class="col-xs-12 col-sm-9 col-lg-10">
						<!--<ol class="breadcrumb" style="padding:5px 0;">
							<li><a href="../home/welcome-ext.php"><i class="fa fa-cogs"></i> &nbsp; 扩展功能</a></li>
							<li><a href="../home/welcome-ext.php">模块 - </a></li>
							<li class="active"></li>
						</ol>--><!--属于扩展功能-->