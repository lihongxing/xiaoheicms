<?php
	require '../common/header2.php';
?>
<!--页面中另一个模块的内容
<ul class="nav nav-tabs">
	<li><a href="../site/multi.php">微站管理</a></li>
	<li class="active"><a href="../multi/post.php">添加微站</a></li>
</ul>

<style>
	.template .item{position:relative;display:block;float:left;border:1px #ddd solid;border-radius:5px;background-color:#fff;padding:5px;width:190px;margin:0 20px 20px 0; overflow:hidden;}
	.template .title{margin:5px auto;line-height:2em;}
	.template .title a{text-decoration:none;}
	.template .item img{width:178px;height:270px; cursor:pointer;}
	.template .active.item-style img, .template .item-style:hover img{width:178px;height:270px;border:3px #009cd6 solid;padding:1px; }
	.template .title .fa{display:none}
	.template .active .fa.fa-check{display:inline-block;position:absolute;bottom:33px;right:6px;color:#FFF;background:#009CD6;padding:5px;font-size:14px;border-radius:0 0 6px 0;}
	.template .fa.fa-times{cursor:pointer;display:inline-block;position:absolute;top:10px;right:6px;color:#D9534F;background:#ffffff;padding:5px;font-size:14px;text-decoration:none;}
	.template .fa.fa-times:hover{color:red;}
	.template .item-bg{width:100%; height:342px; background:#000; position:absolute; z-index:1; opacity:0.5; margin:-5px 0 0 -5px;}
	.template .item-build-div1{position:absolute; z-index:2; margin:-5px 10px 0 5px; width:168px;}
	.template .item-build-div2{text-align:center; line-height:30px; padding-top:150px;}
	/*@media screen and (min-width:992px){#ListStyle{width:890px; margin:100px auto;}}*/
</style>

<form class="form-horizontal form" action="" method="post">
	<div class="clearfix">
		<div class="panel panel-default">
			<div class="panel-heading">
				站点信息
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">微站名称</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="title" class="form-control" value="" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">是否启用</label>
					<div class="col-sm-9 col-xs-12">
						<label class="radio-inline"><input type="radio" name="status" value="1" checked />是</label>
						<label class="radio-inline"><input type="radio" name="status" value="0" >否</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">选择微站风格</label>
					<div class="col-sm-8 col-xs-12">
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#ListStyle">选择风格</button>
						<input type="hidden" name="styleid" id="styleid" value="" />
					</div>
				</div>
				<div class="form-group" id="preview-style" style="display:none;">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">当前微站风格</label>
					<div class="col-sm-8 col-xs-12">
						<div class="template">
							<div class="item item-style">
								<div class="title">
									<div style="overflow:hidden; height:28px;" id="current-title"></div>
									<a href="javascript:;">
										<img src="../resource/images/preview.jpg" id="current-preview" class="img-rounded">
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal fade bs-example-modal-lg" id="ListStyle" aria-hidden="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
								<h4 class="modal-title">微站模板风格列表</h4>
							</div>
							<div class="modal-body template clearfix">
								<div class="item item-style active ">
									<div class="title">
										<div class="title-" style="overflow:hidden; height:28px;"></div>
										<a href="javascript:;" class="change-style" data-styleid="{$style['id']}">
											<img src="../resource/images/preview.jpg" class="img-rounded preview-">
										</a>
										<span class="fa fa-check"></span>
									</div>
									<div class="btn-group  btn-group-justified">
										<a href="javascript:;" class="btn btn-default btn-xs change-style" data-styleid="">选择风格</a>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">触发关键字</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="keyword" class="form-control" value="" />
						<div class="help-block">用户触发关键字，系统回复此页面的图文链接</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">封面</label>
					<div class="col-sm-9 col-xs-12">
						<img src="../resource/images/nopic.jpg" onerror="this.src='./resource/images/nopic.jpg'; this.title='图片未找到.'" class="img-responsive img-thumbnail"  width="150" />
						<div class="help-block">用于用户触发关键字后，系统回复时的封面图片</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">页面描述</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="description" class="form-control" value="" />
						<div class="help-block">用户通过微信分享给朋友时,会自动显示页面描述</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">绑定域名</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="bindhost" class="form-control" value="" />
						<span class="help-block">绑定时请先将域名解析指向到本服务器，请只填写host部分，例如：www.baidu.com</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">底部自定义</label>
					<div class="col-sm-9 col-xs-12">
						<textarea style="height:150px;" class="form-control" cols="70" name="footer" autocomplete="off"></textarea>
						<span class="help-block">自定义底部信息，支持HTML</span>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12">
				<input name="submit" type="submit" value="提交" class="btn btn-primary col-lg-1" />
				<input type="hidden" name="token" value="" />
			</div>
		</div>
	</div>
</form>

<script type="text/javascript">
	$('.change-style').click(function() {
		var styleId = parseInt($(this).data('styleid'));
		var title = $('.title-' + styleId).text();
		var preview = $('.preview-' + styleId).attr('src');
		$('.item-style').removeClass('active');
		$('#styleid').val(styleId);
		$('#current-title').text(title);
		$('#current-preview').attr('src', preview);
		$(this).parent().parent().addClass('active');
		$('#preview-style').show();
		$('#ListStyle').modal('hide');
	});
</script>
-->
<ul class="nav nav-tabs">
	<li class="active"><a href="../site/multi.php">微站管理</a></li>
	<li><a href="../site/multi.php">添加微站</a></li>
</ul>
<div class="clearfix template">
	<div class="panel panel-default">
		<div class="panel-heading">
			可用的微站
		</div>
		<div class="table-responsive panel-body">
			<table class="table table-hover">
				<thead class="navbar-inner">
					<tr>
						<th>微站名称</th>
						<th style="width:100px;">关键字</th>
						<th style="width:200px;">风格</th>
						<th style="width:200px;">模板</th>
						<th class="manage-menu" style="width:420px">操作</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="vertical-align:middle;"><span class="label label-success">默认微站</span></td>
						<td></td>
						<td style="vertical-align:middle;">
							<span class="label label-danger">未设置</span>
						</td>
						<td>app/themes/default</td>
						<td class="manage-menu" style="position:relative;">
							<a href="../site/multi.php">编辑</a>
							<a href="../site/slide.php">幻灯片</a>
							<a href="../site/nav.php">导航菜单</a>
							<a href="../site/editor.php">快捷菜单</a>
							<span><a class="js-clip" href="javascript:;" data-url="http://localhost/app/index.php?i=5&c=home&">复制链接</a></span>
							<a href="../site/multi.php">复制站点</a>
							<a href="javascript:;" onclick="preview('', '');return false;">预览</a>
							<a href="../site/multi.php" onclick="if(!confirm('删除后将不可恢复,确定删除吗?')) return false;">删除</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<style>
	.template .dropdown{display:inline-block; cursor:pointer;}
	.template i{display:inline-block; width:15px; height:15px; font-size:15px; }
	.template .js-dropdown-menu span{display:inline-block; height:34px; line-height:34px; width:60px; text-align:center;}
	.template .dropdown-menu{margin:0;}
	.template .dropdown-menu i{width:20px; margin-right:10px; text-align:center;}
</style>
<script type="text/javascript">
	$(function(){
		$('.js-dropdown-menu').unbind('click');
		$('.js-dropdown-menu span').hover(function(){
			$(this).parent().addClass('open').find('.dropdown-menu').show();
			$(this).parent().find('.dropdown-menu').hover(function(){$(this).show();$(this).parent().addClass('open')},function(){$(this).hide();$(this).parent().removeClass('open');});
		},function(){
			$(this).parent().removeClass('open').find('.dropdown-menu').hide();
		});
	});
	function preview(styleid, $multiid) {
		var content = '<iframe width="320" scrolling="yes" height="480" frameborder="0" src="about:blank"></iframe>';
		var footer =
				'<a href="{url 'site/style/designer'}styleid=' + styleid + '" class="btn btn-primary">设计风格</a>' +
				'<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>';
		var dialog = util.dialog('预览模板', content, footer);
		dialog.find('iframe').on('load', function(){
			$('a', this.contentWindow.document.body).each(function(){
				var href = $(this).attr('href');
				if(href && href[0] != '#') {
					var arr = href.split(/#/g);
					var url = arr[0];
					if (url.substr(0, 3) == 'www') {
						url = 'http://' + url;
					}
					if(arr[1]) {
						url += ('#' + arr[1]);
					}
					if (url.substr(0, 10) == 'javascript') {
						url = url.substr(0, url.lastIndexOf('&'));
					}
					$(this).attr('href', url);
				}
			});
		});
		var url = '../app/{php echo murl('home')}&s=' + styleid + '&t=' + $multiid;
		dialog.find('iframe').attr('src', url);
		dialog.find('.modal-dialog').css({'width': '322px'});
		dialog.find('.modal-body').css({'padding': '0', 'height': '480px'});
		dialog.modal('show');
	}
</script>
<?php
	require '../common/footer.php';
?>