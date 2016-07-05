<?php
require(\Yii::getAlias("@app")."/modules/wechat/views/common/header-gw.php");
use yii\helpers\Url;
?>
<ol class="breadcrumb">
	<li><a href="../account/display.php"><i class="fa fa-home"></i></a></li>
	<li><a href="../account/display.php">公众号列表</a></li>
	<li class="active">编辑主公众号</li>
</ol>
<style>
	.nav-width{border-bottom:0;}
	.nav-width li.active{width:20%;text-align:center;overflow:hidden;height:40px;}
	.nav-width .normal{background:#EEEEEE;width:26.6%;text-align:center;overflow:hidden;height:40px;}
	.guide em{font-style:normal; color:#d9534f;}
	.guide .list-group .list-group-item a{color:#07d;}
	.guide .list-group .list-group-item{padding-top:20px;}
	.guide .img{margin-bottom:15px; display:inline-block; border:1px solid #cccccc;padding:3px;}
	.guide .con{padding: 10px 30px;}
</style>
<ul class="nav nav-tabs nav-width">
	<li <?php if($step == 1||$step == ''){echo 'class="active"'; }?> class="normal"><a href="javascript:;">1. 一键获取公众号信息</a></li>
	<li <?php if($step == 2){echo 'class="active"'; }?> class="normal"><a href="javascript:;">2. 设置公众号信息</a></li>
	<li <?php if($step == 3){echo 'class="active"'; }?> class="normal"><a href="javascript:;">3. 设置权限</a></li>
	<li <?php if($step == 4){echo 'class="active"'; }?> class="normal"><a href="javascript:;">4. 引导页面</a></li>
</ul>
<div class="clearfix">
	<?php if($step == 1||$step == ''){ ?>
	<form action="" method="post"  class="form-horizontal" role="form" enctype="multipart/form-data" id="form1">
		<input type="hidden" name="uniacid" value="0">
		<input type="hidden" name="step" value="2">
		<div class="panel panel-default">
			<div class="panel-heading">
				一键获取公众号信息
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">公众登录用户</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="wxusername" id="username" class="form-control" value="" autocomplete="off"/>
						<span class="help-block">请输入你的公众平台用户名</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">公众登录密码</label>
					<div class="col-sm-9 col-xs-12">
						<input type="password" name="wxpassword" class="form-control" value="" autocomplete="off"  />
						<span class="help-block">请输入你的公众平台密码</span>
					</div>
				</div>
				<div class="form-group" style="display:none;">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">登录验证码</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="verify" class="txt grid-1 alpha pin form-control" value="" autocomplete="off" />
						<span class="help-inline"><img src="" id="imgverify"> <a href="javascript:;" id="toggle">换一张</a></span>
					</div>
				</div>
				<!--隐藏信息提示
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
						<div class="col-sm-9 col-xs-12">
							<input name="sync" type="submit" value="同步微信公众平台帐号信息" class="btn span4" />
							<div class="help-block">填写公众号帐号密码后，如果发现信息没有同步成功，请点击此选项进行手动同步。</div>
						</div>
					</div>
				-->
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12">
				<input name="getinfo" type="submit" value="一键获取" class="btn btn-primary" />

				<a href="<?= Url::toRoute(['/wechat/account/poststep', 'step' =>2]) ?>" class="btn btn-default" />不获取，直接填写</a>
				<input type="hidden" name="token" value="bdd49c5f" />
			</div>
		</div>
	</form>
	<?php } ?>
	<!--第二个模块内容-->
	<?php if($step == 2){ ?>
	<form action="" method="post"  class="form-horizontal" role="form" enctype="multipart/form-data" id="form1">
		<input type="hidden" name="step" value="2">
		<div class="panel panel-default">
			<div class="panel-heading">
				设置公众号信息
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span> 公众号名称</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="cname" class="form-control" value="" autocomplete="off" />
						<span class="help-block">填写公众号的帐号名称</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">描述</label>
					<div class="col-sm-9 col-xs-12">
						<textarea style="height: 80px;" class="form-control" name="description"></textarea>
						<span class="help-block">用于说明此公众号的功能及用途。</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">公众号帐号</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="account" class="form-control" value="" autocomplete="off" />
						<span class="help-block">填写公众号的帐号，一般为英文帐号</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">原始ID</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="original" class="form-control" value="" autocomplete="off" />
						<span class="help-block">在给粉丝发送客服消息时,原始ID不能为空。建议您完善该选项</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">级别</label>
					<div class="col-sm-9 col-xs-12">
						<label for="status_1" class="radio-inline"><input autocomplete="off" type="radio" name="level" id="status_1" value="1" checked /> 普通订阅号</label>
						<label for="status_2" class="radio-inline"><input autocomplete="off" type="radio" name="level" id="status_2" value="2" /> 普通服务号</label>
						<label for="status_3" class="radio-inline"><input autocomplete="off" type="radio" name="level" id="status_3" value="3" /> 认证订阅号</label>
						<label for="status_4" class="radio-inline"><input autocomplete="off" type="radio" name="level" id="status_4" value="4" /> 认证服务号/认证媒体/政府订阅号</label>
						<span class="help-block">注意：即使公众平台显示为“未认证”, 但只要【公众号设置】/【账号详情】下【认证情况】显示资质审核通过, 即可认定为认证号.</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">AppId</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="key" class="form-control" value="" autocomplete="off"/>
						<div class="help-block">请填写微信公众平台后台的AppId</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">AppSecret</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="secret" class="form-control" value="" autocomplete="off"/>
						<div class="help-block">请填写微信公众平台后台的AppSecret, 只有填写这两项才能管理自定义菜单</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">Oauth 2.0</label>
					<div class="col-sm-9 col-xs-12">
						<p class="form-control-static">在微信公众号请求用户网页授权之前，开发者需要先到公众平台网站的【开发者中心】<b>网页服务</b>中配置授权回调域名。<a href="http://www.we7.cc/manual/dev:v0.6:qa:mobile_redirect_url_error" target="_black">查看详情</a></p>
					</div>
				</div>
				<!--下面为隐藏的信息
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">接口地址</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" class="form-control" value="http://fdkhjfdfd5sf56ds4f65sd4f56.com" readonly="readonly" autocomplete="off"/>
						<div class="help-block">设置“公众平台接口”配置信息中的接口地址</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label" style="color:red">Token</label>
					<div class="col-sm-9 col-xs-12">
						<div class="input-group">
							<input type="text" name="wetoken" class="form-control" value="" readonly="readonly" />
							<span class="input-group-addon" style="cursor:pointer" onclick="tokenGen();">生成新的</span>
						</div>
						<div class="help-block">与公众平台接入设置值一致，必须为英文或者数字，长度为3到32个字符. 请妥善保管, Token 泄露将可能被窃取或篡改平台的操作数据.</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label" style="color:red">EncodingAESKey</label>
					<div class="col-sm-9 col-xs-12">
						<div class="input-group">
							<input type="text" name="encodingaeskey" class="form-control" value="" />
							<span class="input-group-addon" style="cursor:pointer" onclick="EncodingAESKeyGen();">生成新的</span>
						</div>
						<div class="help-block">与公众平台接入设置值一致，必须为英文或者数字，长度为43个字符. 请妥善保管, EncodingAESKey 泄露将可能被窃取或篡改平台的操作数据.</div>
					</div>
				</div>
				-->
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">二维码</label>
					<div class="col-sm-9 col-xs-12">
						<input type="file" name="qrcode" value="">
						<span class="help-block">只支持JPG图片</span>
					</div>
				</div>
				<!--二维码图片显示
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-sm-9 col-xs-12">
						<div class="input-group">
							<img src="" class="img-responsive img-thumbnail" width="150" />
						</div>
					</div>
				</div>
				-->
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">头像</label>
					<div class="col-sm-9 col-xs-12">
						<input type="file" name="headimg" value="">
						<span class="help-block">只支持JPG图片</span>
					</div>
				</div>
				<!--头像图片显示
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-sm-9 col-xs-12">
						<div class="input-group">
							<img src="" class="img-responsive img-thumbnail" width="150" />
						</div>
					</div>
				</div>
				-->
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12">
				<a href="<?= Url::toRoute('/wechat/account/poststep') ?>" class="btn btn-default" />返回上一步</a>
				<input name="submit" type="submit" value="下一步" class="btn btn-primary" />
				<input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>"/>
			</div>
		</div>
	</form>
	<?php } ?>
	<!--第三个模块内容-->
	<?php if($step == 3){ ?>
	<form action="" method="post"  class="form-horizontal" role="form" enctype="multipart/form-data" id="form1">
		<input type="hidden" name="step" value="3">
		<input type="hidden" name="uniacid" value="3">
		<input type="hidden" name="acid" value="0">
		<div class="panel panel-default">
			<div class="panel-heading">公众号权限设置</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">短信剩余条数</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="balance" id="balance" value="" class="form-control" autocomplete="off">
						<span class="help-block">请填写短信剩余条数,必须为整数。</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">短信签名</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="signature" value="" class="form-control" autocomplete="off">
						<span class="help-block">请填写短信签名。</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">公众号管理员（主）</label>
					<div class="col-sm-9 col-xs-12">
						<p class="form-control-static">
							<span id="manager" class="label label-success">
								<input type="hidden" name="uid" value="" />
							</span>&nbsp;
							<a id="btn-add" href="javascript:;">选择用户</a>&nbsp;-&nbsp;
							如果是新用户请先<a onclick="util.ajaxshow('../user/create.php', '添加主管理员', {'width': 800});" href="javascript:;">添加</a>
						</p>
						<div class="help-block">
							一个公众号只可拥有一个主管理员，管理员有管理公众号和添加操作员的权限<br />
							未指定主管理员时将默认属于创始人，则公众号具有所有模块及模板权限
						</div>
					</div>
				</div>
				<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">是否设置帐户/服务过期时间</label>
			<div class="col-sm-9 col-xs-12">
				<label class="radio-inline"><input type="radio" name="is-set-endtime" value="1" id="radio_1" onclick=" util.message('请先选择该公众号所属的主管理员'); return false;" /> 设置</label>
				<label class="radio-inline"><input type="radio" checked name="is-set-endtime" value="0" id="radio_0" onclick="$('.js-set-endtime-panel').hide();" /> 不限</label>
			</div>
		</div>
		<div class="form-group js-set-endtime-panel" style="display:none;">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-sm-9 col-xs-12">
						<p class="form-control-static">
						</p>
						<span class="help-block">用户的使用时间过期时，将来无法登录，公众号权限也暂停使用，不设置为永久可用</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">管理员用户组</label>
					<div class="col-sm-9 col-xs-12">
						<select name="groupid" class="form-control" id="groupid">
							<option value="0" data-package="[]">不设置</option>
							<option value="1" data-package="[1]">体验用户组</option>
							<option value="2" data-package="[1]">白金用户组</option>
							<option value="3" data-package="[1]">黄金用户组</option>
						</select>
						<span class="help-block"></span>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				公众号可使用的权限（以下选中套餐）
			</div>
			<div class="panel-body table-responsive">
				<table class="table table-hover">
					<thead class="navbar-inner">
						<tr>
							<th style="width:50px;"></th>
							<th style="width:120px;">公众服务套餐</th>
							<th style="width:400px;">模块权限</th>
							<th style="width:400px;">模板权限</th>
						</tr>
					</thead>
					<tbody id="account-package">
						<tr>
							<td><input type="checkbox" name="package[]" autocomplete="off" value="-1" /></td>
							<td>所有服务</td>
							<td>
								<span class="label label-danger">系统所有模块</span></li>
							</td>
							<td>
								<span class="label label-danger">系统所有模板</span></li>
							</td>
						</tr>
						<tr>
							<td><input type="checkbox" name="package[]" autocomplete="off" value="1" /></td>
							<td>体验套餐服务</td>
							<td style="line-height:25px; white-space:normal;">
								<span class="label label-success">系统模块</span>
								<span class="label label-info"></span>
							</td>
							<td style="line-height:25px; white-space:normal;">
								<span class="label label-success">微站默认模板</span>
								<span class="label label-info"></span>
							</td>
						</tr>
					</tbody>
					<tr>
						<td colspan="4" class="text-center">
							<a href="javascript:;" class="btn btn-primary" data-toggle="modal" data-target="#modal-account-package-extra">附加权限</a>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12">
				<input name="submit" type="submit" value="下一步" class="btn btn-primary" />
				<input type="hidden" name="token" value="" />
			</div>
		</div>
	</form>
	<div class="modal fade" id="modal-account-package-extra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h3>
						<ul role="tablist" class="nav nav-pills" style="font-size:14px; margin-top:-20px;">
							<li role="presentation" class="active"><a data-toggle="tab" role="tab" aria-controls="content-modules" href="#content-modules">模块</a></li>
							<li role="presentation"><a data-toggle="tab" role="tab" aria-controls="content-templates" href="#content-templates">模板</a></li>
						</ul>
					</h3>
				</div>
				<div class="modal-body">
					<div class="tab-content">
						<div id="content-modules" class="tab-pane active" role="tabpanel">
							<table class="table">
								<thead>
								<tr>
									<th>模块名称</th>
									<th>模块标识</th>
									<th></th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td><span class="label label-success">系统模块</span></td>
									<td></td>
									<td><a class="btn btn-default js-btn-select btn-primary" data-title="" data-name="" onclick="$(this).toggleClass('btn-primary')">选取</a></td>
								</tr>
								</tbody>
							</table>
						</div>
						<div id="content-templates" class="tab-pane" role="tabpanel">
							<table class="table">
								<thead>
								<tr>
									<th>模板名称</th>
									<th>模板标识</th>
									<th></th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td></td>
									<td></td>
									<td><a class="btn btn-default js-btn-select btn-primary" data-title="" data-name="" onclick="$(this).toggleClass('btn-primary')">选取</a></td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary" type="button">确认</button>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<script type="text/javascript">
		$(function(){
			require(['biz', 'underscore'], function(biz, _){
				var seletedUserIds = [];
				$('#btn-add').click(function(){
					var self = this;
					biz.user.browser(seletedUserIds, function(user){
						$.getJSON('./index.php?c=account&a=post-step&do=userinfo&step=3&uid='+user, function(data){
							if (data.message.errno) {
								util.message(data.message.message);
							}
							$('#manager').html('<input type="hidden" name="uid" value="'+data.message.uid+'" />' + data.message.username);
							$('#groupid').val(data.message.group.id);
							$('#account-package-extra').show();
							update_package_list(data.message.package);
							$(self).html('修改');
						});
					},{mode:'invisible', direct : true});
				});
				$('#groupid').change(function(){
					var user = $('input[name="uid"]').val();
					if (!user) {
						$('#groupid').val(0);
						util.message('请先选择管理员');
						return false;
					}
					update_package_list($(this).find('option:selected').data('package'));
				});
				$('#modal-account-package-extra').find('.modal-footer .btn-primary').click(function(){
					var moduleshtml = '',templatehtml = '';
					$('#modal-account-package-extra #content-modules').find('.btn-primary').each(function(){
						moduleshtml += '<span class="label label-info" style="margin-right:3px;">'+$(this).attr('data-title')+'</span><input type="hidden" name="extra[modules][]" value="'+$(this).attr('data-name')+'" />';
					});
					$('#modal-account-package-extra #content-templates').find('.btn-primary').each(function(){
						templatehtml += '<span class="label label-info" style="margin-right:3px;">'+$(this).attr('data-title')+'</span><input type="hidden" name="extra[templates][]" value="'+$(this).attr('data-name')+'" />';
					});
					if (moduleshtml || templatehtml) {
						$('#account-package-extra').show();
					} else {
						$('#account-package-extra').hide();
					}
					$('#account-package-extra .js-extra-modules').html(moduleshtml);
					$('#account-package-extra .js-extra-templates').html(templatehtml);
					$('#modal-account-package-extra').modal('hide');
				});
				function update_package_list(package) {
					$('input[name="package[]"]').prop('checked', false);
					$('input[name="package[]"]').prop('disabled', false);
					for (i in package) {
						$('input[name="package[]"][value="'+package[i]+'"]').prop('checked', true);
						$('input[name="package[]"][value="'+package[i]+'"]').prop('disabled', true);
					}
				}
			});
		});
	</script>
	<!--第四个模块内容-->
	<?php if($step == 4){ ?>
	<div class="panel panel-default guide">
		<div class="panel-heading">
			接入到公众平台
		</div>
		<div class="panel-body">
			<h4 class="alert alert-info">您绑定的微信公众号：<em>ffffff</em>，请按照下列引导完成配置。</h4>
			<div class="list-group">
				<div class="list-group-item">
					<h5 class="page-header">登录 <a href="https://mp.weixin.qq.com/" target="_blank">微信公众平台</a>，点击左侧菜单最后一项，进入 [ <em>开发者中心</em> ]</h5>
					<div class="con">
						<div class="img"><img src="../resource/images/guide-01.png"/></div>
						<p># 如果您未成为开发者，请勾选页面上的同意协议，再点击 [ <em>成为开发者</em> ] 按钮</p>
					</div>
				</div>
				<div class="list-group-item">
					<h5 class="page-header">在开发者中心，找到［<em> 服务器配置</em> ］栏目下URL和Token设置</h5>
					<div class="con">
						<div class="img"><img src="../resource/images/guide-02.png"/></div>
						<p># 将以下链接链接填入对应输入框：</p>
						<form action="" method="post" class="form-horizontal" role="form">
							<div class="form-group clip">
								<label class="col-xs-12 col-sm-2 col-md-1 col-lg-1 control-label">URL:</label>
								<div class="col-sm-9 col-xs-12 input-group ">
									<p class="form-control-static"><a href="javascript:;" title="点击复制Token">http:localhost:80hdfkdjshkj </a></p>
								</div>
							</div>
							<div class="form-group clip">
								<label class="col-xs-12 col-sm-2 col-md-1 col-lg-1 control-label">Token:</label>
								<div class="col-sm-9 col-xs-12 input-group">
									<p class="form-control-static"> <a href="javascript:;" title="点击复制Token">kjjhsd45f7sdf4454fsdfsd5f4</a></p>
								</div>
							</div>
							<div class="form-group clip">
								<label class="col-xs-12 col-sm-2 col-md-1 col-lg-1 control-label">EncodingAESKey:</label>
								<div class="col-sm-10 input-group">
									<p class="form-control-static"> <a href="javascript:;" title="点击复制EncodingAESKey">45f4dsssdfsf5sd4fsdf5</a></p>
								</div>
							</div>
						</form>
						<p># 如果以前已填写过URL和Token，请点击[<em> 修改配置 </em>] ，再填写上述链接</p>
						<p># 请点击 [<em> 启用 </em>] ，以启用服务器配置：</p>
						<div class="img"><img src="../resource/images/guide-03.png" width="524"></div>
					</div>
				</div>
				<div class="list-group-item">
					<h5 class="page-header">
						<em>公众号 ffffff 正在等待接入……请及时按照以上步骤操作接入公众平台</em>
					</h5>
					<div class="con">
						<p># 检查公众平台配置</p>
						<p># 编辑公众号 <a href="../account/post.php">ffffff</a></p>
						<a href="javascript:window.location.reload();" class="btn btn-success" style="color:#FFF">检测是否接入成功</a>&nbsp;&nbsp;&nbsp;<a href="../account/switch.php" class="btn btn-primary" style="color:#FFF">暂不接入，先去查看管理功能</a>
						<a href="" class="btn btn-info" style="color:#FFF">返回公众号列表</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<script type="text/javascript">
	$('.clip p a').each(function(){
		util.clip(this, $(this).text());
	});
	require(['biz', 'filestyle'], function(biz){
		$(function(){
			$('#username').blur(function(){
				if ($('#username').val()) {
					var type = $('input[name="type"]:checked').val() ? $('input[name="type"]:checked').val() : 1;
					$('#imgverify').attr('src', '{php echo url("utility/wxcode")}username=' + $('#username').val()+'&r='+Math.round(new Date().getTime()));
					$('#imgverify').parent().parent().parent().show();
					return false;
				}
			});
			$('#toggle').click(function(){
				if ($('#username').val()) {
					var type = $('input[name="type"]:checked').val() ? $('input[name="type"]:checked').val() : 1;
					$('#imgverify').attr('src', '{php echo url("utility/wxcode")}username=' + $('#username').val()+'&r='+Math.round(new Date().getTime()));
					$('#imgverify').parent().parent().parent().show();
					return false;
				}
			});
			$(".form-group").find(':file').filestyle({buttonText: '上传图片'});
		});
	});
	function tokenGen() {
		var letters = 'abcdefghijklmnopqrstuvwxyz0123456789';
		var token = '';
		for(var i = 0; i < 32; i++) {
			var j = parseInt(Math.random() * (31 + 1));
			token += letters[j];
		}
		$(':text[name="wetoken"]').val(token);
	}
	function EncodingAESKeyGen() {
		var letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		var token = '';
		for(var i = 0; i < 43; i++) {
			var j = parseInt(Math.random() * 61 + 1);
			token += letters[j];
		}
		$(':text[name="encodingaeskey"]').val(token);
	}
</script>
<?php
require(\Yii::getAlias("@app")."/modules/wechat/views/common/footer-gw.php");
?>