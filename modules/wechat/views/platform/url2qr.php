<?php
	require '../common/header.php';
?>
<ul class="nav nav-tabs">
	<li class="active"><a href="../platform/url2qr.php">长链接转二维码</a></li>
</ul>
<div class="alert alert-danger">
	注意：使用长连接转短连接功能,您的公众号应该是"服务号"。如果您的公众号是普通订阅号,不能使用该功能
</div>
<div class="clearfix">
	<form class="form form-horizontal" action="" method="post">
		<input type="hidden" name="id" value="">
		<div class="panel panel-default">
			<div class="panel-heading">
				长链接转二维码
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">请输入长链接:</label>
					<div class="col-sm-9 col-xs-12">
						<div class="input-group">
							<input type="text" name="longurl" class="form-control" id="longurl" value="" placeholder="请输入长链接" autocomplete="off" />
							<div class="input-group-btn">
								<span class="btn btn-primary" id="longurl_but"><i class="fa fa-external-link"></i> 选择系统链接</span>
							</div>
						</div>
						<div class="help-block">请输入您要转换的长链接，支持http://、https://、weixin://wxpay 格式的url</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-sm-9 col-xs-12">
						<div class="input-group">
							<span id="change" class="btn btn-primary">立即转换</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">生成的短连接 </label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="shorturl" id="shorturl" value="" class="form-control" readonly>
					</div>
				</div>
				<div class="form-group hide">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">二维码地址 </label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="qr" value="" class="form-control" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">生成的二维码</label>
					<div class="col-sm-9 col-xs-12">
						<img src="http://localhost/" id="qrsrc" style="border:2px solid #CCC;padding:0px;border-radius:4px;">
						<div class="help-block">默认显示"http://localhost/"的二维码</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<script>
	//点击选择【系统连接】事件
	$('#longurl_but').click(function(){
		var but = $(this);
		require(['util'], function(util){
			var ipt = but.parent().prev();
			util.linkBrowser(function(href){
				var site_url = "{$_W['siteroot']}";
				if(href.substring(0, 4) == 'tel:') {
					util.message('长链接不能设置为一键拨号');
					return;
				} else if(href.indexOf("http://") == -1 && href.indexOf("https://") == -1) {
					href = href.replace('./index.php?', '/index.php?');
					href = site_url + 'app' + href;
				}
				ipt.val(href);
			});
		});
	});
	require(['util'], function(util){
		$('#change').click(function(){
			var longurl = $('#longurl').val().trim();
			if(longurl == '') {
				util.message('请输入长链接');
				return;
			} else if(longurl.indexOf("http://") == -1 && longurl.indexOf("https://") == -1 && longurl.indexOf("weixin://") == -1) {
				util.message('请输入有效的长链接');
				return;
			}
			var change = $(this);
			var img_url = "{php echo  url('platform/url2qr/qr')}";
			change.html('<i class="fa fa-spinner"></i> 转换中');
			$.post("{php echo url('platform/url2qr/change')}", {'longurl' : longurl}, function(data){
				if(data != 'err') {
					data = $.parseJSON(data);
				}
				if(data.errcode == '-1') {
					util.message(data.errmsg);
					change.html('转换失败');
					return;
				} else {
					$('#shorturl').val(data.short_url);
					$('#qrsrc').attr('src', img_url + 'url=' + data.short_url);
					change.html('立即转换');
				}
			});
		});
	});
</script>
<?php
	require '../common/footer.php';
?>