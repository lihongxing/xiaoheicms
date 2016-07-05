<?php 
use yii\helpers\Url; 
?>
<? require(\Yii::getAlias("@app")."/views/layouts/header-base.php");?>
<script>
	$('#form1').submit(function(){
		if($.trim($(':text[name="username"]').val()) == '') {
			util.message('没有输入用户名.', '', 'error');
			return false;
		}
		if($('#password').val() == '') {
			util.message('没有输入密码.', '', 'error');
			return false;
		}
		if($('#password').val() != $('#repassword').val()) {
			util.message('两次输入的密码不一致.', '', 'error');
			return false;
		}
 		/*{loop $extendfields $item}
		{if $item['required']}
			if (!$.trim($('[name="{$item['field']}"]').val())) {
				util.message('{$item['title']}为必填项，请返回修改！', '', 'error');
				return false;
			}
		{/if}
		{/loop}*/
 		{if $setting['register']['code']}
		if($.trim($(':text[name="code"]').val()) == '') {
			util.message('没有输入验证码.', '', 'error');
			return false;
		}
		{/if}
	});
	var h = document.documentElement.clientHeight;
	$(".login").css('min-height',h);
</script>
<style>
	@media screen and (max-width:767px){.register .panel.panel-default{width:90%; min-width:300px;}}
	@media screen and (min-width:768px){.register .panel.panel-default{width:70%;}}
	@media screen and (min-width:1200px){.register .panel.panel-default{width:50%;}}
</style>
<div class="register">
	<div class="logo"><a href="./?refresh" {if !empty($_W['setting']['copyright']['flogo'])}style="background:url('{php echo tomedia($_W['setting']['copyright']['flogo']);}') no-repeat;"{/if}></a></div>
	<div class="clearfix" style="margin-bottom:5em;">
		<div class="panel panel-default container">
			<div class="panel-body">
				<form action="" method="post" role="form" id="form1">
					<div class="form-group">
						<label>用户名:<span style="color:red">*</span></label>
						<input name="username" type="text" class="form-control" placeholder="请输入用户名">
					</div>
					<div class="form-group">
						<label>密码:<span style="color:red">*</span></label>
						<input name="password" type="password" id="password" class="form-control" placeholder="请输入密码">
					</div>
					<div class="form-group">
						<label>确认密码:<span style="color:red">*</span></label>
						<input name="password" type="password" id="repassword" class="form-control" placeholder="请再次输入密码">
					</div>
					<!--  
					{if $extendfields}
						{loop $extendfields $item}
							<div class="form-group">
								<label>{$item['title']}：{if $item['required']}<span style="color:red">*</span>{/if}</label>
								{php echo tpl_fans_form($item['field'])}
							</div>
						{/loop}
					{/if}
					{if $setting['register']['code']}
						<div class="form-group">
							<label style="display:block;">验证码:<span style="color:red;">*</span></label>
							<input name="code" type="text" class="form-control" placeholder="请输入验证码" style="width:65%;display:inline;margin-right:17px">
							<img src="{php echo url('utility/code');}" class="img-rounded" style="cursor:pointer;" onclick="this.src='{php echo url('utility/code');}' + Math.random();" />
						</div>
					{/if}-->
					<!--div class="form-group">
						<label>邀请码:<span style="color:red">*</span></label>
						<input name="invitation" type="text" class="form-control" placeholder="请输入邀请码">
					</div-->
					<div class="pull-right">
						<a href="<?= Url::toRoute("/site/login") ?>" class="btn btn-link">登录</a>
						<input type="submit" name="submit" value="注册" class="btn btn-default" />
						<input name="token" value="{$_W['token']}" type="hidden" />
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="center-block footer" role="footer">
    	<div class="text-center">
            <a href="http://www.we7.cc">关于微擎</a>&nbsp;&nbsp;<a href="http://bbs.we7.cc">微擎论坛</a>&nbsp;&nbsp;<a href="http://wpa.b.qq.com/cgi/wpa.php?ln=1&key=XzkzODAwMzEzOV8xNzEwOTZfNDAwMDgyODUwMl8yXw">联系客服</a>
    	</div>
    	<div class="text-center">
    		<a href="http://www.we7.cc"><b>微擎</b></a> 2014-2015 <a href="http://www.we7.cc">www.we7.cc</a>
    	</div>
    </div>
</div>
</body>
</html>