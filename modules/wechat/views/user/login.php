<?php
    require(\Yii::getAlias("@app")."/modules/wechat/views/common/header-base.php");
    use yii\bootstrap\ActiveForm;
?>
<style>
	@media screen and (max-width:767px){.login .panel.panel-default{width:90%; min-width:300px;}}
	@media screen and (min-width:768px){.login .panel.panel-default{width:70%;}}
	@media screen and (min-width:1200px){.login .panel.panel-default{width:50%;}}
</style>

<div class="login">
	<div class="logo">
		<a href="../account/display.php"></a>
	</div>
	<div class="clearfix" style="margin-bottom:5em;">
		<div class="panel panel-default container">
			<div class="panel-body" >
			    <?php $form = ActiveForm::begin(['id'=>'loginForm']); ?>
					<div class="form-group input-group">
						<div class="input-group-addon"><i class="fa fa-user"></i></div>
						<input name="WechatForm[username]" type="text" class="form-control input-lg" placeholder="请输入用户名登录">
						</div>
				    <div class="form-group input-group">
						<div class="input-group-addon"><i class="fa fa-unlock-alt"></i></div>
						<input name="WechatForm[password]" type="password" class="form-control input-lg" placeholder="请输入登录密码">
					</div>
					<div class="form-group">
						<label class="checkbox-inline input-lg">
							<input type="checkbox" value="true" name="WechatForm[rememberMe]"> 记住用户名 <font color="red"></font>
						</label>
						<div class="pull-right">
							<a href="<?=\yii\helpers\Url::toRoute("/wechat/user/register")?>" class="btn btn-link btn-lg">注册</a>
							<input type="submit" name="submit" value="登录" class="btn btn-primary btn-lg" />
						</div>
					</div>
				<?php ActiveForm::end(); ?>
			</div>
		</div>
	</div>
	<div class="center-block footer" role="footer">
    </div>
</div>
<script>
var h = document.documentElement.clientHeight;
$(".login").css('min-height',h);
//require(['jquery','dialog', 'validation'],function($){
//	$("#loginForm").validate({
//		rules: {
//			'WechatForm[username]' : "required",
//			'WechatForm[password]' : {
//				required: true,
//			}
//		},
//		messages: {
//			'WechatForm[username]' : "请输入您的账号！",
//			'WechatForm[password]' : {
//				required: "请输入您的密码！",
//			}
//		},
//		/* 重写错误显示消息方法,以alert方式弹出错误消息 */
//		showErrors : function(errorMap, errorList) {
//			var msg = "";
//			$.each(errorList, function(i, v) {
//				msg += (v.message + "\r\n");
//			});
//			if (msg != ""){
//				var d = dialog({
//					title: '小黑微信cms提示您！',
//					content: msg,
//					ok: function () {},
//					statusbar: '<label><input type="checkbox">不再提醒</label>'
//				});
//				d.showModal();
//			}
//		},
//		/* 失去焦点时不验证 */
//		onfocusout : false,
//		onkeydown :false
//})
//});
</script>
</body>
</html>
