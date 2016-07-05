<?php
    require(\Yii::getAlias("@app")."/modules/wechat/views/common/header-gw.php");
    use yii\helpers\Url;
?>
<style>
	.alert{color:#666;padding:10px}
	.text-strong{font-size:14px;font-weight:bold;}
	.popover{max-width: 450px}
	.popover-content{padding-top: 0;line-height: 30px}
	.popover-content h5{padding-bottom: 5px}
</style>
<ol class="breadcrumb">
	<li><a href="<?= Url::toRoute('account/display')?>"><i class="fa fa-home"></i></a></li>
	<li><a href="<?= Url::toRoute('system/welcome')?>">系统</a></li>
	<li class="active">公众号列表</li>
</ol>
<div class="clearfix" style="margin-bottom:5em;">
		<!--<div class="alert alert-warning">
			温馨提示：
			<i class="fa fa-info-circle"></i>
			Hi，<span class="text-strong">admin</span>，
			您所在的会员组 <span class="text-strong">	</span>，
			账号有效期限：<span class="text-strong">1970~01~01 ~~ 无限制</span>，
			可添加 <span class="text-strong">	</span>个公众号，
			已添加<span class="text-strong">	</span>个，
			还可添加 <span class="text-strong">	</span>个公众号。
		</div>-->
	<form action="./index.php" method="get" role="form">
		<input type="hidden" name="c" value="account">
		<input type="hidden" name="a" value="display">
		<div class="form-group">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="请输入微信公众号名称" name="keyword" id="s_keyword" value="">
				<div class="input-group-btn">
					<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
					<ul class="dropdown-menu dropdown-menu-right" role="menu">
						<li><a href="javascript:;" onclick="$('#s_uniacid').addClass('hide').val('');$('#s_keyword').removeClass('hide');">根据公众号名称搜索</a></li>
						<li><a href="javascript:;" onclick="$('#s_uniacid').removeClass('hide');$('#s_keyword').addClass('hide').val('');">根据公众号ID搜索</a></li>
					</ul>
				</div>
			</div>
		</div>
	</form>
	<div class="input-group">
		<a class="btn btn-primary" href="<?= Url::toRoute('/wechat/account/poststep')?>"><i class="fa fa-plus"></i> 添加公众号</a>
		<!--<a style="margin-left:5px;" href=""><img src="https://open.weixin.qq.com/zh_CN/htmledition/res/assets/res-design-download/icon_button3_2.png" /></a>-->
	</div>
	<ul class="list-unstyled account">
		<li>
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row clearfix">
						<div class="col-xs-6">
							<span style="cursor:pointer; color:#999;" class="setmeal-hover" data-uid=""  data-uniacid="" data-groupid="">
								套餐 : 所有服务
							</span>
						</div>
						<div class="col-xs-6 text-right">
							<a href="../home/welcome.php" target="_blank" class="manage"><i class="fa fa-cog"></i>管理公众号</a>
						</div>
					</div>
				</div>
				<ul class="panel-body list-group">
					<li class="row list-group-item" style="line-height:60px;">
						<div class="col-xs-12 col-sm-12 col-md-2 col-lg-1">
							<img src="/resource/images/gw-wx.gif" class="" width="50" height="50"  onerror="this.src='../resource/images/gw-wx.gif'" />
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-5 item" style="font-size:16px;">
							千诺科技
							<span class="label label-success">登录授权</span>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 item text-right">
							<span style="width:80px; text-align:center; display:inline-block;">
								<!--<i class="fa fa-2x fa-check-circle text-success" style="position:absolute; top:15px;" data-toggle="tooltip" data-placement="top" title='接入状态 : 登录授权成功接入'></i>-->
								<i class="fa fa-2x fa-times-circle text-warning" style="position:absolute; top:15px;" data-toggle="tooltip" data-placement="top" title='登录授权失败公众号接入状态显示“未接入”解决方案：进入微信公众平台，依次选择: 开发者中心 -> 修改配置，然后将对应公众号在
							平台的url和token复制到微信公众平台对应的选项，公众平台会自动进行检测'></i>
							</span>
								<!--<div style="display:inline-block; border-left:1px #DDD solid; padding-left:20px; margin-left:20px;">
									<a data-toggle="tooltip" data-placement="top" title='设置为默认后，主公号与此子号绑定，后台一切接口权限将从此子号获取' href="../account/default.php" class="btn btn-sm btn-primary" style="color:#fff;"><i class="fa fa-pencil"></i> 设为默认</a>
								<a href="../account/summary.php" class="btn btn-sm btn-default"><i class="fa fa-bar-chart-o"></i>详情</a>
									<a href="../account/post.php" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i>编辑</a>
									<a href="../account/post.php" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i>编辑</a>
								<a href="../account/delete.php" onclick="return confirm('确认删除吗？');return false;" class="btn btn-sm btn-default"><i class="fa fa-times"></i>删除</a>
								</div>-->
						</div>
					</li>
				</ul>
				<div class="list-group-bottom">
					<div class="col-xs-6 list-group-bottom-left">
						<span>服务有效期 : 未设置</span>
					</div>
					<div class="col-xs-6 text-right list-group-bottom-right">
						<a href="poststep.php"><i class="fa fa-key"></i>设置权限</a>
						<a href="../account/permission.php"><i class="fa fa-user"></i>操作员管理</a>
						<a href="../account/post.php"><i class="fa fa-edit"></i>编辑</a>
						<a href="../account/delete.php" onclick="return confirm('删除主公众号其所属的子公众号及其它数据会全部删除，确认吗？');return false;"><i class="fa fa-times"></i>删除</a>
					</div>
				</div>
			</div>
		</li>
	</ul>
</div>
<script type="text/javascript">
require(['bootstrap'],function($){
	$('[data-toggle="tooltip"]').hover(function(){
		$(this).tooltip('show');
	},function(){
		$(this).tooltip('hide');
	});
	$('.setmeal-hover').hover(function(){
		var uid = $(this).data('uid');
		var groupid = $(this).data('groupid');
		var title = $(this).data('uniacid');
		var obj = $(this);
		if(groupid == -1) {
			obj.popover({
				'html':true,
				'placement':'right',
				'trigger':'manual',
				//'title':title,
				'content':'<h5>可用的服务套餐</h5><div style="margin-top: -15px"><span class="label label-success">所有服务</span></div>'
			});
			obj.popover('show');
		}else {
			$.post("account/display", {uid:uid, groupid:groupid}, function(data){
				var data = $.parseJSON(data);
				var content = '';
				if(data.message.message.groupname.length > 0) {
					content += '<h5>可用的服务套餐</h5>';
					content += '<div style="margin-top: -15px">';
					$.each(data.message.message.groupname, function (i,val) {
							content += '<span class="label label-success">'+val.name+'</span> ';
					});
					content += '</div>';
				}
				if(data.message.message.modules && data.message.message.modules.length > 0) {
					content += '<h5>附加的模块权限</h5>';
					content += '<div style="margin-top: -15px">';
					$.each(data.message.message.modules, function (i,val) {
						content += '<span class="label label-success">'+val.title+'</span> ';
					});
					content += '</div>';
				}
				if(data.message.message.templates && data.message.message.templates.length > 0) {
					content += '<h5>附加的模板权限</h5>';
					content += '<div style="margin-top: -15px">';
					$.each(data.message.message.templates, function (i,val) {
						content += '<span class="label label-success">'+val.title+'</span> ';
					});
					content += '</div>';
				}
				obj.popover({
					'html':true,
					'placement':'right',
					'trigger':'manual',
					//'title':title,
					'content':content
				});
				obj.popover('show');
			});
		}
	}, function(){
		$(this).popover('hide');
	});
});
</script>
<?php
    require(\Yii::getAlias("@app")."/modules/wechat/views/common/footer-gw.php");
?>