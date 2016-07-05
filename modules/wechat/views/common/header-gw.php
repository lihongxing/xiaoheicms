<?
    require(\Yii::getAlias("@app")."/modules/wechat/views/common/header-base.php");
    use yii\helpers\Url;
?>
<div class="gw-container">
	<div class="navbar navbar-inverse navbar-static-top" role="navigation" style="z-index:1001; margin-bottom:0;">
		<div class="container-fluid">
			<ul class="nav navbar-nav">
				<li class="active"><a href="<?= Url::toRoute('/wechat/account/display')?>"><i class="fa fa-cogs"></i>系统管理</a></li>
				<li><a href="<?= Url::toRoute('/wechat/home/welcome-platform')?>" target="_blank"><i class="fa fa-share"></i>继续管理公众号（千诺科技）</a></li>
				
				<!--<li><a href="https://mp.weixin.qq.com/" target="_blank"><i class="fa fa-comment"></i>微信公众平台</a></li>-->
				
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
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"  style="display:block; max-width:150px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; "><i class="fa fa-group"></i>千诺科技 <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?= Url::toRoute('/wechat/account/post')?>" target="_blank"><i class="fa fa-weixin fa-fw"></i> 编辑当前账号资料</a></li>
						<li><a href="<?= Url::toRoute('/wechat/account/display')?>" target="_blank"><i class="fa fa-cogs fa-fw"></i> 管理其它公众号</a></li>
						<li><a href="<?= Url::toRoute('/wechat/utility/emulator')?>?tzid=6" target="_blank"><i class="fa fa-mobile fa-fw"></i> 模拟测试</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" style="display:block; max-width:185px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; "><i class="fa fa-user"></i>admin (系统管理员) <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?= Url::toRoute('/wechat/user/profile/profile')?>" target="_blank"><i class="fa fa-weixin fa-fw"></i> 我的账号</a></li>
						<li class="divider"></li>
						<li><a href="<?= Url::toRoute('/wechat/system/welcome')?>" target="_blank"><i class="fa fa-sitemap fa-fw"></i> 系统选项</a></li>
						<li><a href="<?= Url::toRoute('/wechat/system/welcome')?>" target="_blank"><i class="fa fa-cloud-download fa-fw"></i> 自动更新</a></li>
						<li><a href="<?= Url::toRoute('/wechat/system/updatecache')?>" target="_blank"><i class="fa fa-refresh fa-fw"></i> 更新缓存</a></li>
						<li class="divider"></li>
						<li><a href="<?= Url::toRoute('/wechat/user/login')?>"><i class="fa fa-sign-out fa-fw"></i> 退出系统</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>

	<div class="navbar navbar-static-top" role="navigation" style="padding-top:20px;">
		<div class="container-fluid">
			<a class="navbar-brand gw-logo" href="<?= Url::toRoute('/wechat/account/display')?>" style=" no-repeat;"></a>
			<ul class="nav navbar-nav pull-right" style="padding-top:10px;">
				<a href="<?= Url::toRoute('/wechat/user/profile')?>" class="tile img-rounded">
					<i class="fa fa-comments"></i>
					<span>我的账户</span>
				</a>
				<a href="<?= Url::toRoute('/wechat/account/display')?>" class="tile img-rounded active">
					<i class="fa fa-comments"></i>
					<span>公众号管理</span>
				</a>
				<a href="<?= Url::toRoute('/wechat/system/welcome')?>" class="tile img-rounded">
					<i class="fa fa-sitemap"></i>
					<span>系统</span>
				</a>
				<a href="<?= Url::toRoute('/wechat/account/welcome')?>" class="tile img-rounded">
					<i class="fa fa-sign-out"></i>
					<span>退出</span>
				</a>
			</ul>
		</div>
	</div>
	
	<div class="container-fluid">
		<div>
			<!--<div class="jumbotron clearfix alert alert">
				<div class="row">
					<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
						<i class="fa fa-5x fa-check- circle times-circle info-circle exclamation-triangle"></i>
					</div>
					<div class="col-xs-12 col-sm-8 col-md-9 col-lg-10">
						
							<h2>MYSQL 错误：</h2>
							<p></p>
							<p><b>：</b></p>
						
						<h2></h2>
						<p></p>
						
						
						<p><a href="<?= Url::toRoute('/wechat/account/display')?>" class="alert-link">如果你的浏览器没有自动跳转，请点击此链接</a></p>
						<script type="text/javascript">
							/*setTimeout(function () {
								location.href = "<?= Url::toRoute('/wechat/account/display')?>";
							}, 3000);*/
						</script>
						
							<p>[<a href="javascript:history.go(-1);" class="alert-link">点击这里返回上一页</a>] &nbsp; [<a href="<?= Url::toRoute('/wechat/account/display')?>" class="alert-link">首页</a>]</p>
						
					</div>
				</div>
			</div>-->			<!--一个报错信息，我给注释了，要用放开-->
		<div class="well">
<script>
	var h = document.documentElement.clientHeight;
	$(".gw-container").css('min-height',h);
</script>