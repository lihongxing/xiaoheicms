<?php
	require '../common/header2.php';
?>
<ul class="nav nav-tabs">
	<li class="active"><a href="../site/category.php">管理</a></li>
	<li ><a href="../site/category.php">添加</a></li>
</ul>
<!--下面为隐藏部分 标题为"添加"里面的内容
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
</style>
<div class="main">
	<form action="" method="post" class="form-horizontal form" id="form1">
	<input type="hidden" name="parentid" value="" />
		<div class="panel panel-default">
			<div class="panel-heading">分类详细设置</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">访问地址</label>
					<div class="col-sm-8 col-xs-12">
						<div class="form-control-static"><a href="" target="_blank">/app/index.php?c=site&a=site&cid=&i=5</a></div>
						<span class="help-block">您可以根据此地址，添加回复规则，设置访问。</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">上级分类</label>
					<div class="col-sm-8 col-xs-12">
						<div class="form-control-static"></div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">排序</label>
					<div class="col-sm-8 col-xs-12">
						<input type="text" name="displayorder" class="form-control" value="" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">分类名称</label>
					<div class="col-sm-8 col-xs-12">
						<input type="text" name="cname" class="form-control" value="" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">分类描述</label>
					<div class="col-sm-8 col-xs-12">
						<textarea name="description" class="form-control" cols="70"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">是否添加微站首页导航</label>
					<div class="col-sm-8 col-xs-12">
						<label for="isnav_1" class="radio-inline"><input type="radio" name="isnav" id="isnav_1" value="1" autocomplete="off" /> 是</label>
						<label for="isnav_2" class="radio-inline"><input type="radio" name="isnav" id="isnav_2" value="0" autocomplete="off" checked /> 否</label>
						<div class="help-block">开启此选项后,系统在微站首页导航自动生成以分类名称为导航名称的记录.关闭此选项后,系统将删除对应的导航记录</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">是否作为首页使用</label>
					<div class="col-sm-8 col-xs-12">
						<label for="radio_1" class="radio-inline"><input type="radio" name="ishomepage" id="radio_1" value="1" autocomplete="off" /> 是</label>
						<label for="radio_2" class="radio-inline"><input type="radio" name="ishomepage" id="radio_2" value="0" autocomplete="off" checked /> 否</label>
						<div class="help-block">注意：该选项仅对父级分类有效。开启此选项后，分类模板将直接引用首页模板（home.html[注:该文件在home文件夹下面]]），分类的二级分类将作为导航显示</div>
						<div class="help-block" style="color:red">当前默认微站对应的模板有导航位置限制。如果您希望将该导航链接作为"首页使用"使用,请选择其他分类风格</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">当前分类风格</label>
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
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">选择分类风格</label>
					<div class="col-sm-8 col-xs-12">
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#ListStyle">选择风格</button>
						<input type="hidden" name="styleid" id="styleid" value="" />
						<span class="help-block">
							新建分类风格时，请在您选择的风格对应的模板目录下新建“site”文件夹，默认的列表页面为list.html，默认的内容页面为detail.html。
						</span>
					</div>
				</div>
				<div class="modal fade" id="ListStyle" aria-hidden="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
								<h4 class="modal-title">微站模板风格列表</h4>
							</div>
							<div class="modal-body template clearfix">
								<div class="item item-style ">
									<div class="title">
										<div class="title-" style="overflow:hidden; height:28px;"></div>
										<a href="javascript:;" class="change-style" data-styleid="">
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
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">直接链接</label>
					<div class="col-sm-8 col-xs-12">
						<input type="text" class="form-control" placeholder="" name="linkurl" value="">
						<span class="help-block">链接必须是以http://或是https://开头。没有直接链接，请留空</span>
					</div>
				</div>
			</div>
		</div>

		<div class="panel panel-default" id="style">
			<div class="panel-heading">导航样式</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">图标类型</label>
					<div class="col-sm-8 col-xs-12">
						<label for="icontype1" class="radio-inline"><input type="radio" checked value="1" name="icontype" id="icontype1" onclick="$('#iconsys').show();$('#iconuser').hide();colorpicker();" autocomplete="off"> 系统内置</label>&nbsp;&nbsp;&nbsp;
						<label for="icontype2" class="radio-inline"><input type="radio" value="2" name="icontype" id="icontype2" onclick="$('#iconsys').hide();$('#iconuser').show();" autocomplete="off"> 自定义上传</label>
					</div>
				</div>
				<div class="" id="iconsys" >
					<div class="form-group">
						<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">系统图标</label>
						<div class="col-sm-8 col-xs-12">
							<div class="input-group"">
								{php echo tpl_form_field_icon('icon[icon]', $category['css']['icon']['icon']);}
							</div>
							<span class="help-block">导航的背景图标，系统提供了丰富的图标ICON。</span></div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">图标颜色</label>
						<div class="col-sm-8 col-xs-12">
							{php echo tpl_form_field_color('icon[color]', $category[css]['icon']['color']);}
							<span class="help-block">图标颜色，上传图标时此设置项无效</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">图标大小</label>
						<div class="col-sm-8 col-xs-12">
							<div class="input-group">
								<input class="form-control" type="text" name="icon[size]" id="icon" value="">
								<span class="input-group-addon">PX</span>
							</div>
							<span class="help-block">图标的尺寸大小，单位为像素，上传图标时此设置项无效</span>
						</div>
					</div>
				</div>
				<div class="" id="iconuser" style="display:none;">
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">上传图标</label>
						<div class="col-sm-9 col-xs-12">
							{php echo tpl_form_field_image('iconfile', $category['icon']);}
							<span class="help-block">自定义上传图标图片，“系统图标”优先于此项</span>
						</div>
					</div>
				</div>
			</div>
		</div>

	<div class="form-group">
		<div class="col-sm-12">
			<input name="submit" type="submit" value="提交" class="btn btn-primary col-lg-1">
			<input type="hidden" name="token" value="" />
		</div>
	</div>
	</form>
</div>
<script type="text/javascript">
	$("#form1").submit(function(){
		if($("input[name='cname']").val() == '') {
			util.message('请输入分类名称', '', 'error');
			return false;
		}
	});

	$('.change-style').click(function() {
		var styleId = parseInt($(this).data('styleid'));
		var title = $('.title-' + styleId).text();
		var preview = $('.preview-' + styleId).attr('src');
		$('.item-style').removeClass('active');
		$('#styleid').val(styleId);
		$('#current-title').text(title);
		$('#current-preview').attr('src', preview);
		$(this).parent().parent().addClass('active');
		$('#ListStyle').modal('hide');
	});
</script>
-->
<div class="main">
	<div class="category">
		<form action="" method="post" onsubmit="return formcheck(this)">
		<div class="panel panel-default">
		<div class="panel-body table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th style="width:5%; text-align:center;">显示顺序</th>
					<th style="width:25%;">分类名称</th>
					<th style="width:5%; text-align:center;">设为栏目</th>
					<th style="width:15%; text-align:center">操作</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="text-center"><input type="text" class="form-control" name="displayorder[]" value=""></td>
					<td class="text-left"><div style="height:30px;line-height:30px">&nbsp;&nbsp;<a href="../site/category.php" title="添加子分类"><i class="fa fa-plus"></i> 添加子分类</a></div></td>
					<td class="text-center">否</td>
					<td class="text-right" style="position:relative;">
						<a href="javascript:;" data-url="{php echo murl('../site/site.php')" class="js-clip" title="复制链接">复制链接</a>&nbsp;-&nbsp;
						<a href="{php echo url('../site/article.php')" title="添加文章">添加文章</a>&nbsp;-&nbsp;
						<a href="{php echo url('../site/category.php')" title="编辑">编辑</a>&nbsp;-&nbsp;
						<a href="{php echo url('../site/category.php')" onclick="return confirm('确认删除此分类吗？');return false;" title="删除">删除</a>
					</td>
				</tr>
				<tr>
					<td class="text-center"><input type="text" class="form-control" name="displayorder[]" value=""></td>
					<td class="text-left"><div style="height:30px;line-height:30px">&nbsp;&nbsp;<a href="../site/category.php" title="添加子分类"><i class="fa fa-plus"></i> 添加子分类</a></div></td>
					<td class="text-center">否</td>
					<td class="text-right" style="position:relative;">
						<a href="javascript:;" data-url="{php echo murl('../site/site.php')" class="js-clip" title="复制链接">复制链接</a>&nbsp;-&nbsp;
						<a href="{php echo url('../site/article.php')" title="添加文章">添加文章</a>&nbsp;-&nbsp;
						<a href="{php echo url('../site/category.php')" title="编辑">编辑</a>&nbsp;-&nbsp;
						<a href="{php echo url('../site/category.php')" onclick="return confirm('确认删除此分类吗？');return false;" title="删除">删除</a>
					</td>
				</tr>
				<tr>
					<td class="text-center"><input type="text" class="form-control" name="displayorder[]" value=""></td>
					<td class="text-left"><div style="height:30px;line-height:30px">&nbsp;&nbsp;<a href="../site/category.php" title="添加子分类"><i class="fa fa-plus"></i> 添加子分类</a></div></td>
					<td class="text-center">否</td>
					<td class="text-right" style="position:relative;">
						<a href="javascript:;" data-url="{php echo murl('../site/site.php')" class="js-clip" title="复制链接">复制链接</a>&nbsp;-&nbsp;
						<a href="{php echo url('../site/article.php')" title="添加文章">添加文章</a>&nbsp;-&nbsp;
						<a href="{php echo url('../site/category.php')" title="编辑">编辑</a>&nbsp;-&nbsp;
						<a href="{php echo url('../site/category.php')" onclick="return confirm('确认删除此分类吗？');return false;" title="删除">删除</a>
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<a href="../site/category.php"><i class="fa fa-plus-circle" title="添加新分类"></i> 添加新分类</a>
					</td>
				</tr>
			</tbody>
		</table>
		</div>
		</div>
			<div class="form-group col-sm-12">
				<input name="submit" type="submit" class="btn btn-primary col-lg-1" value="提交">
				<input type="hidden" name="token" value="" />
			</div>
		</form>
	</div>
</div>
<?php
	require '../common/footer.php';
?>