<?php
	require '../common/header2.php';
?>
<ul class="nav nav-tabs">
	<li ><a href="../site/article.php">添加文章</a></li>
	<li class="active"><a href="../site/article.php">文章列表</a></li>
</ul>
<style>
.table td span{display:inline-block;margin-top:4px;}
.table td input{margin-bottom:0;}
</style>
<div class="panel panel-info">
	<div class="panel-heading">筛选</div>
	<div class="panel-body">
		<form action="./index.php" method="get" class="form-horizontal" role="form">
			<input type="hidden" name="a" value="article" />
			<input type="hidden" name="c" value="site" />
			<input type="hidden" name="do" value="display" />
			
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 control-label">关键字</label>
				<div class="col-sm-8 col-md-8 col-lg-8 col-xs-12">
					<input class="form-control" name="keyword" id="" type="text" value="">
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 control-label">文章分类</label>
				<div class="col-sm-8 col-md-8 col-lg-8 col-xs-12">
					{php echo tpl_form_field_category_2level('category', 'Array', 'Array', '', '');}
				</div>
				<div class="pull-right col-xs-12 col-sm-2 col-md-2 col-lg-2">
					<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="panel panel-default">
	<div class="table-responsive panel-body">
		<table class="table">
			<thead>
				<tr>
					<th style="width:50px">排序</th>
					<th>标题</th>
					<th style="width:180px;">属性</th>
					<th style="width:200px; text-align:right;">操作</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><span></span></td>
					<td>
						<span class="text-error"></span>
						<a href="../site/article.php" style="color:#333;"></a>
					</td>
					<td>
						<span class="label label-success"></span>
					</td>
					<td style="text-align:right; position:relative;">
						<a href="javascript:;" data-url="{php echo murl('site/site.php')}" class="js-clip" title="复制链接">复制链接</a>&nbsp;-&nbsp;
						<a href="site/article.php" title="编辑">编辑</a>&nbsp;-&nbsp;
						<a onclick="return confirm('此操作不可恢复，确认吗？'); return false;" href="../site/article.php" title="删除">删除</a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
	var category = {php echo json_encode('Array')};
</script>
<!--隐藏部分 另一个标题下的内容
<div class="clearfix">
<form class="form-horizontal form" action="" method="post" enctype="multipart/form-data">
	<div class="panel panel-default">
		<div class="panel-heading">文章管理</div>
		<div class="panel-body">
			<input type="hidden" name="id" value="">
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">访问地址</label>
					<div class="col-sm-8 col-xs-12">
						<p class="form-control-static"><a href="http://localhost//app/index.php?c=site&a=site&do=detail&id=&i=5" target="_blank">http://localhost//app/index.php?c=site&a=site&do=detail&id=&i=5</a></p>
						<div class="help-block">您可以根据此地址，添加回复规则，设置访问。</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">排序</label>
					<div class="col-sm-8 col-xs-12">
						<input type="text" class="form-control" placeholder="" name="displayorder" value="">
						<span class="help-block">文章的显示顺序，越大则越靠前</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">标题</label>
					<div class="col-sm-8 col-xs-12">
						<input type="text" class="form-control" placeholder="" name="title" value="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">文章触发关键字</label>
					<div class="col-sm-8 col-xs-12">
						<input type="text" class="form-control" placeholder="" name="keyword" value="">
						<div class="help-block">添加关键字以后,系统将生成一条图文规则,用户可以通过输入关键字来阅读文章。多个关键字请用英文“,”隔开</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">自定义属性</label>
					<div class="col-sm-8 col-xs-12">
						<label class="checkbox-inline"><input type="checkbox" name="option[hot]" value="1" > 头条[h]</label>
						<label class="checkbox-inline"><input type="checkbox" name="option[commend]" value="1" > 推荐[c]</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">文章来源</label>
					<div class="col-sm-8 col-xs-12">
						<input type="text" class="form-control" placeholder="" name="source" value="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">文章作者</label>
					<div class="col-sm-8 col-xs-12">
						<input type="text" class="form-control" id="writer" name="author" value="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">缩略图s</label>
					<div class="col-sm-8 col-xs-12">
						{php echo tpl_form_field_image('thumb', '')}
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-sm-9 col-xs-12">
						<label>
						封面（大图片建议尺寸：360像素 * 200像素）
						</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-sm-9 col-xs-12">
						<label class="checkbox-inline">
							<input type="checkbox" name="incontent" value="1" /> 封面图片显示在正文中
						</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">文章类别</label>
					<div class="col-sm-8 col-xs-12">
						{php echo tpl_form_field_category_2level('category', '', '', '', '')}
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">选择内容模板</label>
					<div class="col-sm-8 col-xs-12">
						<select name="template" class="form-control">
							<option value="">使用默认设置</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">简介</label>
					<div class="col-sm-8 col-xs-12">
						<textarea class="form-control" name="description" rows="5"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label"></label>
					<div class="col-sm-8">
						<div class="help-block"><label class="checkbox-inline"><input type="checkbox" name="autolitpic" value="1" checked="true">提取内容的第一个图片为缩略图</label></div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">内容</label>
					<div class="col-sm-8 col-xs-12">
						{php echo tpl_ueditor('content', '');}
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">直接链接</label>
					<div class="col-sm-8 col-xs-12">
						{php echo tpl_form_field_link('linkurl', '');}
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">阅读次数</label>
					<div class="col-sm-8 col-xs-12">
						<input type="text" name="click" value="" class="form-control"/>
						<div class="help-block">默认为0。您可以设置一个初始值,阅读次数会在该初始值上增加。</div>
					</div>
				</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">积分设置</div>
		<div class="panel-body">
			<div class="form-group">
				<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">是否赠送积分</label>
				<div class="col-sm-8 col-xs-12">
					<label class="radio-inline"><input type="radio" name="credit[status]" value="1" id="credit1"> 赠送</label>
					<label class="radio-inline"><input type="radio" name="credit[status]" value="0" checked id=""> 不赠送</label>
					<span class="help-block">设置赠送积分后,粉丝在分享时赠送积分.粉丝的好友在点击阅读时,也会赠送积分</span>
				</div>
			</div>
			<div id="credit-status1" style="display:block">
			<div class="form-group">
				<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">赠送积分上限</label>
				<div class="col-sm-8 col-xs-12">
					<input type="text" class="form-control" name="credit[limit]" value="">
					<span class="help-block">设置赠送积分的上限,到达上限后将不再赠送积分</span>
						<span class="help-block">已经赠送了<strong class="text-danger">  </strong>积分,还可以赠送<strong class="text-danger"></strong>积分</span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">转发赠送积分</label>
				<div class="col-sm-8 col-xs-12">
					<input type="text" class="form-control"  name="credit[share]" value="">
					<span class="help-block">设置转发时赠送积分</span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">阅读赠送积分</label>
				<div class="col-sm-8 col-xs-12">
					<input type="text" class="form-control" name="credit[click]" value="">
					<span class="help-block">设置阅读时赠送给分享人的积分</span>
				</div>
			</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-12">
			<input name="submit" type="submit" value="提交" class="btn btn-primary col-lg-1">
			<input type="hidden" name="token" value="{$_W['token']}" />
		</div>
	</div>
</form>
</div>
<script type="text/javascript">
	var category = {php echo json_encode($children)};
	$('#credit1').click(function(){
		$('#credit-status1').show();
	});
	$('#credit0').click(function(){
		$('#credit-status1').hide();
	});
</script>
-->
<?php
	require '../common/footer.php';
?>