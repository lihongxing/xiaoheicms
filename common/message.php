<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>小黑微信cms - 公众平台自助引擎 -  Powered by WE7.CC</title>
	<meta name="keywords" content="小黑微信cms,微信,微信公众平台,we7.cc" />
	<meta name="description" content="公众平台自助引擎（www.we7.cc），简称小黑微信cms，小黑微信cms是一款免费开源的微信公众平台管理系统，是国内最完善移动网站及移动互联网技术解决方案。" />
	<link rel="shortcut icon" href="http://localhost/WeEngine/attachment/images/global/wechat.jpg" />
	<link href="/resource/css/bootstrap.min.css" rel="stylesheet">
	<link href="/resource/css/font-awesome.min.css" rel="stylesheet">
	<link href="/resource/css/common.css" rel="stylesheet">
	<script>var require = { urlArgs: 'v=2016053119' };</script>
	<script src="/resource/js/lib/jquery-1.11.1.min.js"></script>
	<script src="/resource/js/app/util.js"></script>
	<script src="/resource/js/require.js"></script>
	<script src="/resource/js/app/config.js"></script>
	<!--[if lt IE 9]>
	<script src="/resource/js/html5shiv.min.js"></script>
	<script src="/resource/js/respond.min.js"></script>
	<![endif]-->
	<script type="text/javascript">
		if(navigator.appName == 'Microsoft Internet Explorer'){
			if(navigator.userAgent.indexOf("MSIE 5.0")>0 || navigator.userAgent.indexOf("MSIE 6.0")>0 || navigator.userAgent.indexOf("MSIE 7.0")>0) {
				alert('您使用的 IE 浏览器版本过低, 推荐使用 Chrome 浏览器或 IE8 及以上版本浏览器.');
			}
		}

		window.sysinfo = {
			'uniacid': '1',
			'acid': '1',
			'siteroot': 'http://localhost/WeEngine/',
			'siteurl': 'http://localhost/WeEngine/web/index.php?c=user&a=login&',
			'attachurl': 'http://localhost/WeEngine/attachment/',
			'attachurl_local': 'http://localhost/WeEngine/attachment/',
			'attachurl_remote': '',
			'cookie' : {'pre': '2a0b_'}
		};
	</script>
</head>
<body>
<div class="gw-container">
	<div class="navbar navbar-static-top" role="navigation" style="padding-top:20px;">
		<div class="container-fluid">
			<a class="navbar-brand gw-logo" href="/?refresh" ></a>
			<ul class="nav navbar-nav pull-right" style="padding-top:10px;">
				<a href="/index.php?c=account&a=display&" class="tile img-rounded">
					<i class="fa fa-comments"></i>
					<span>公众号管理</span>
				</a>
				<a href="/index.php?c=system&a=welcome&" class="tile img-rounded">
					<i class="fa fa-sitemap"></i>
					<span>系统</span>
				</a>
			</ul>
		</div>
	</div>

	<div class="container-fluid">
		<div>
			<div class="jumbotron clearfix alert alert-<?= $status ? 'success':'info'?>">
				<div class="row">
					<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
						<i class="fa fa-5x fa-check-circle"></i>
					</div>
					<div class="col-xs-12 col-sm-8 col-md-9 col-lg-10">
						<h2></h2>
						<p><?= $message ?></p>
						<p><a href="<?= $jumpUrl ?>" class="alert-link">如果你的浏览器没有自动跳转，请点击此链接</a></p>
						<script type="text/javascript">
							setTimeout(function () {
								location.href = "<?= $jumpUrl ?>";
							}, <?= $waitSecond?>);
						</script>
					</div>
				</div>
			</div>
			<script>
				var h = document.documentElement.clientHeight;
				$(".gw-container").css('min-height',h);
			</script>			</div>
	</div>
	<script type="text/javascript">
		require(['bootstrap']);

	</script>
	<div class="center-block footer" role="footer">
		<div class="text-center">
			<a href="http://www.lihongxing.top">小黑微信cms</a>&nbsp;&nbsp;<a href="http://bbs.we7.cc">小黑微信cms论坛</a>&nbsp;&nbsp;<a href="#">联系客服</a>			</div>
		<div class="text-center">
			Powered by <a href="http://www.lihongxing.top"><b>小黑微信cms</b></a> v &copy; 2014-2015 <a href="http://www.lihongxing.top">www.lihongxing.top</a>			</div>
	</div>
</div>

</body>
</html>
