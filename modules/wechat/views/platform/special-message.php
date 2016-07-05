<?php
	require '../common/header.php';
?>
<ul class="nav nav-tabs">
	<li class="active"><a href="../platform/special-message.php">特殊消息类型处理</a></li>
</ul>

<div class="clearfix">
	<form action="" method="post" class="form-horizontal" role="form">
		<div class="panel panel-default">
			<div class="panel-heading">
				特殊类型消息
			</div>
			<div class="panel-body">
				<input type="hidden" name="id" value="">
				<div class="form-group">
					<label for="" class="col-xs-12 col-sm-3 col-md-2 control-label">说明信息</label>
					<div class="col-xs-12 col-sm-9 col-md-10 col-lg-21">
						<div class="alert alert-info" style="width:auto;">
							<p><b>文本以外的消息类型, 计算机很难自行理解. 因此除文本外的其他消息类型, 如果没有文本对话来确定对话语境, 将会将其分配至默认模块</b></p>
							<p>文本以外的消息类型, 没有语境很难确定其行为方式. 比如: 没有任何对话, 直接发送过来一张图片或者音频, 我们很难根据图片或者音频来判断对方的目的. 针对这种情况, 微赞将这里的扩展操作交给第三方模块来实现. 例如: 对方发送过来一张图片, 并且不再任何对话上下文中, 我们会把这张图片的消息交给能够处理图片消息的默认模块中.</p>
							<p>注意: 这里的操作不会影响对话中的图片或者其他消息. (比如: 我们要求对方发送一张图片来作为头像之后, 对方发送了一张图片, 这样使用对话上下文处理时是不影响的. 这里的处理仅针对没有语境, 没有对话上下文的直接图片或其他类型消息.)</p>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">图片消息</label>
					<div class="col-xs-12 col-sm-9 col-md-10">
						<select name="image" class="form-control">
							<option value="" selected>不处理(使用系统默认回复)</option>
							<option value="custom" >多客服转接</option>
						</select>
						<div class="help-block">如果【图片消息】到达时, 并且此时并不在对话上下文中, 将会采用选中的模块来处理. 如果选择"不处理", 那么这个消息将会使用系统默认回复来回复</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">语音消息</label>
					<div class="col-xs-12 col-sm-9 col-md-10">
						<select name="voice" class="form-control">
							<option value="" selected>不处理(使用系统默认回复)</option>
							<option value="custom" >多客服转接</option>
						</select>
						<div class="help-block">如果【语音消息】到达时, 并且此时并不在对话上下文中, 将会采用选中的模块来处理. 如果选择"不处理", 那么这个消息将会使用系统默认回复来回复</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">视频消息</label>
					<div class="col-xs-12 col-sm-9 col-md-10">
						<select name="video" class="form-control">
							<option value="" selected>不处理(使用系统默认回复)</option>
							<option value="custom" >多客服转接</option>
						</select>
						<div class="help-block">如果【视频消息】到达时, 并且此时并不在对话上下文中, 将会采用选中的模块来处理. 如果选择"不处理", 那么这个消息将会使用系统默认回复来回复</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">小视频消息</label>
					<div class="col-xs-12 col-sm-9 col-md-10">
						<select name="shortvideo" class="form-control">
							<option value="" selected>不处理(使用系统默认回复)</option>
						</select>
						<div class="help-block">如果【小视频消息】到达时, 并且此时并不在对话上下文中, 将会采用选中的模块来处理. 如果选择"不处理", 那么这个消息将会使用系统默认回复来回复</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">位置消息</label>
					<div class="col-xs-12 col-sm-9 col-md-10">
						<select name="location" class="form-control">
							<option value="" selected>不处理(使用系统默认回复)</option>
							<option value="custom" >多客服转接</option>
						</select>
						<div class="help-block">如果【位置消息】到达时, 并且此时并不在对话上下文中, 将会采用选中的模块来处理. 如果选择"不处理", 那么这个消息将会使用系统默认回复来回复</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">上报地理位置</label>
					<div class="col-xs-12 col-sm-9 col-md-10">
						<select name="trace" class="form-control">
							<option value="" selected>不处理(使用系统默认回复)</option>
						</select>
						<div class="help-block">如果【上报地理位置】到达时, 并且此时并不在对话上下文中, 将会采用选中的模块来处理. 如果选择"不处理", 那么这个消息将会使用系统默认回复来回复</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">链接消息</label>
					<div class="col-xs-12 col-sm-9 col-md-10">
						<select name="link" class="form-control">
							<option value="" selected>不处理(使用系统默认回复)</option>
							<option value="custom" >多客服转接</option>
						</select>
						<div class="help-block">如果【链接消息】到达时, 并且此时并不在对话上下文中, 将会采用选中的模块来处理. 如果选择"不处理", 那么这个消息将会使用系统默认回复来回复</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">微小店消息</label>
					<div class="col-xs-12 col-sm-9 col-md-10">
						<select name="merchant_order" class="form-control">
							<option value="" selected>不处理(使用系统默认回复)</option>
						</select>
						<div class="help-block">如果【微小店消息】到达时, 并且此时并不在对话上下文中, 将会采用选中的模块来处理. 如果选择"不处理", 那么这个消息将会使用系统默认回复来回复</div>
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
	</form>
</div>
<?php
	require '../common/footer.php';
?>