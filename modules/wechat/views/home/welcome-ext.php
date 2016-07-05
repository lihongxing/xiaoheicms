<?php
	require '../common/header5.php';
?>
<ul class="nav nav-tabs">
	<li class="active"><a href="../home/welcome.php">账号概况 - 功能参数概括</a></li>
</ul>
	<div class="page-header">
		<h4><i class="fa fa-cubes"></i> 已启用的模块</h4>
		<div class="alert alert-danger">
	温馨提示：如果发现功能模块很少，可以依次点击：左上角‘返回系统’---‘公众号管理’---找到你的公众号的‘服务套餐’---选择‘体验套餐服务’。
		</div>
	</div>
	<div class="panel panel-default row">
		<div class="table-responsive panel-body">
		<table class="table">
			<tr>
				<th style="width:10%"></th>
				<th style="width:15%">模块名称</th>
				<th>描述</th>
			</tr>
			<tr>
				<td>
					<img alt="基本文字回复" src="../resource/images/icon/icon4.jpg" width="48" height="48" class="img-rounded">
				</td>
				<td>
					基本文字回复
				</td>
				<td>
					和您进行简单对话
				</td>
				<td></td>
			</tr>
			<tr>
				<td>
					<img alt="基本混合图文回复" src="../resource/images/icon/icon1.jpg" width="48" height="48" class="img-rounded">
				</td>
				<td>
					基本混合图文回复
				</td>
				<td>
					为你提供生动的图文资讯
				</td>
				<td></td>
			</tr>
			<tr>
				<td>
					<img alt="基本音乐回复" src="../resource/images/icon/icon2.jpg" width="48" height="48" class="img-rounded">
				</td>
				<td>
					基本音乐回复
				</td>
				<td>
					提供语音、音乐等音频类回复
				</td>
				<td></td>
			</tr>
			<tr>
				<td>
					<img alt="自定义接口回复" src="../resource/images/icon/icon3.jpg" width="48" height="48" class="img-rounded">
				</td>
				<td>
					自定义接口回复
				</td>
				<td>
					更方便的第三方接口设置
				</td>
				<td></td>
			</tr>
			<tr>
				<td>
					<img alt="会员中心充值模块" src="../resource/images/nopic-small.jpg" width="48" height="48" class="img-rounded">
				</td>
				<td>
					会员中心充值模块
				</td>
				<td>
					提供会员充值功能
				</td>
				<td></td>
			</tr>
			<tr>
				<td>
					<img alt="发送客服消息" src="../resource/images/icon/icon4.jpg" width="48" height="48" class="img-rounded">
				</td>
				<td>
					发送客服消息
				</td>
				<td>
					公众号可以在粉丝最后发送消息的48小时内无限制发送消息
				</td>
				<td></td>
			</tr>
			<tr>
				<td>
					<img alt="基本语音回复" src="../resource/images/icon/icon2.jpg" width="48" height="48" class="img-rounded">
				</td>
				<td>
					基本语音回复
				</td>
				<td>
					提供语音回复
				</td>
				<td></td>
			</tr>
			<tr>
				<td>
					<img alt="多客服转接" src="../resource/images/icon/icon4.jpg" width="48" height="48" class="img-rounded">
				</td>
				<td>
					多客服转接
				</td>
				<td>
					用来接入腾讯的多客服系统
				</td>
				<td></td>
			</tr>
			<tr>
				<td>
					<img alt="基本图片回复" src="../resource/images/icon/icon2.jpg" width="48" height="48" class="img-rounded">
				</td>
				<td>
					基本图片回复
				</td>
				<td>
					提供图片回复
				</td>
				<td></td>
			</tr>
			<tr>
				<td>
					<img alt="基本视频回复" src="../resource/images/icon/icon2.jpg" width="48" height="48" class="img-rounded">
				</td>
				<td>
					基本视频回复
				</td>
				<td>
					提供视频回复
				</td>
				<td></td>
			</tr>
		</table>
	</div>
	</div>
	<!--下面为隐藏内容
		<div class="page-header">
			<h4><i class="fa fa-plane"></i> 核心功能设置</h4>
		</div>
		<div class="shortcut clearfix">
				<a href="" title="">
					<i class="fa fa-external-link-square"></i>
					<span></span>
				</a>
				<a href="../platform/reply.php">
					<i class="fa fa-comments"></i>
					<span>回复规则列表</span>
				</a>
				<a href="../site/nav.php">
					<i class="fa fa-home"></i>
					<span>微站首页导航</span>
				</a>
				<a href="../site/nav.php">
					<i class="fa fa-user"></i>
					<span>个人中心导航</span>
				</a>
				<a href="../site/nav.php">
					<i class="fa fa-plane"></i>
					<span>快捷菜单</span>
				</a>
				<a href="../profile/module.php">
					<i class="fa fa-cog"></i>
					<span title="参数设置">参数设置</span>
				</a>
		</div>
		<div class="page-header">
			<h4><i class="fa fa-plane"></i> 业务功能菜单</h4>
		</div>
		<div class="shortcut clearfix">
			<a href="" title="">
				<i class=""></i>
				<span></span>
			</a>
		</div>
		<div class="page-header">
			<h4><i class="fa fa-plane"></i> 自定义菜单</h4>
		</div>
		<div class="shortcut clearfix">
			<a href="" title="">
				<i class=""></i>
				<span></span>
			</a>
		</div>
	-->
	<script type="text/javascript">
	<!--
		function checkupgradeModule() {
			require(['util'], function(util) {
				if (util.cookie.get('checkupgrade_{$m}')) {
					return;
				}
				$.getJSON("{url 'utility/checkupgrade/module' array('m' => $m)}", function(ret){
					if (ret && ret.message && ret.message.upgrade == '1') {
						$('body').prepend('<div id="upgrade-tips-module" class="upgrade-tips"><a class="module" href="./index.php?c=cloud&a=upgrade&">【'+ret.message.name+'】检测到新版本'+ret.message.version+'，请尽快更新！</a><span class="tips-close" onclick="checkupgradeModule_hide()"><i class="fa fa-times-circle"></i></span></div>');
						if ($('#upgrade-tips').size()) {
							$('#upgrade-tips-module').css('top', '25px');
						}
					}
				});
			});
		}
		function checkupgradeModule_hide() {
			require(['util'], function(util) {
				util.cookie.set('checkupgrade_{$m}', 1, 3600);
				$('#upgrade-tips-module').hide();
			});
		}
		$(function(){
			checkupgradeModule();
		});
	//-->
	</script>
</div>
<?php
	require '../common/footer.php';
?>