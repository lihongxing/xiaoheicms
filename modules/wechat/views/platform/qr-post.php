<?php
	require '../common/header.php';
?>
	<ul class="nav nav-tabs">
		<li><a href="../platform/qr-list.php">管理二维码</a></li>
		<li class="active"><a href="../platform/qr-post.php">生成二维码</a></li>
		<li><a href="../platform/qr-display.php">扫描统计</a></li>
	</ul>
	<div class="clearfix">
		<form class="form-horizontal form" action="" method="post" id="form1">
			<input type="hidden" name="id" value="" />
			<input type="hidden" name="acid" value="" />
			<div class="panel panel-default">
				<div class="panel-heading">
					生成二维码
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">场景名称</label>
						<div class="col-sm-9 col-xs-12">
							<input type="text" id="scene-name" class="form-control" placeholder="" name="scene-name" value="" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">关联关键字</label>
						<div class="col-sm-9 col-xs-12">
							<input type="text" id="keyword" class="form-control" name="keyword" value="" /><span class="help-block">二维码对应关键字, 用户扫描后系统将通过场景ID返回关键字到平台处理.</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">二维码类型</label>
						<div class="col-sm-9 col-xs-12">
							<label for="radio_1" class="radio-inline"><input type="radio" name="qrc-model" id="radio_1" onclick="$('#model2').hide();$('#model1').show();" value="1" checked="checked" /> 临时</label>
							<label for="radio_0" class="radio-inline"><input type="radio" name="qrc-model" id="radio_0" onclick="$('#model1').hide();$('#model2').show();" value="2" /> 永久</label>
							<span class="help-block">目前有2种类型的二维码, 分别是临时二维码和永久二维码, 前者有过期时间, 最大为7天（604800秒）, 但能够生成较多数量, 后者无过期时间, 数量较少(目前参数只支持1--100000).</span>
						</div>
					</div>
					<div class="form-group" id="model1" >
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">过期时间</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" id="expire-seconds" class="form-control" placeholder="" name="expire-seconds" value="604800" />
						<span class="help-block">临时二维码过期时间, 最大为7天（604800秒）.</span>
					</div>
				</div>
				<div class="form-group" id="model2" style="display:none;">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">场景值</label>
				<div class="col-sm-9 col-xs-12">
					<input type="text" class="form-control" placeholder="场景值" id="scene_str" name="scene_str" value="" />
					<span class="help-block">场景值不能重复，只能是字符串或汉字，不能是数字，仅永久二维码支持。<strong class="text-danger">此处可为空</strong></span>
				</div>
			</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-12">
						<button type="submit" class="btn btn-primary col-lg-1" name="submit" value="提交">提交</button>
						<input type="hidden" name="token" value="" />
				</div>
			</div>
		</form>
	</div>
<script type="text/javascript">
		if($("#radio_2").attr("checked") == "checked") {
			$('#model1').hide();
			$('#model2').show();
		}
		$("#form1").submit(function(){
			if($(":text[name='scene-name']").val() == '') {
				util.message('抱歉，场景名称为必填项，请返回修改！', '', 'error');
				return false;
			}
			if($(":text[name='keyword']").val() == '') {
				util.message('抱歉，场景管理关键字为必填项，请返回修改！', '', 'error');
				return false;
			}
			var model = $(':radio[name="qrc-model"]:checked').val();
			if(model == 1) {
				if ($(":text[name='expire-seconds']").val() == '') {
					util.message('抱歉，临时二维码过期时间为必填项，请返回修改！', '', 'error');
					return false;
				}
				var r2 = /^\+?[1-9][0-9]*$/;
				if(!r2.test($(":text[name='expire-seconds']").val())){
					util.message('抱歉，临时二维码过期时间必须为正整数，请返回修改！', '', 'error');
					return false;
				}
				if(parseInt($(":text[name='expire-seconds']").val())<30 || parseInt($(":text[name='expire-seconds']").val())>604800) {
					util.message('抱歉，临时二维码过期时间必须在30-604800秒之间，请返回修改！', '', 'error');
					return false;
				}
			}
			if(model == 2) {
				var scene_str = $.trim($('#scene_str').val());
				if(scene_str) {
					var reg =  /^\d+$/g;
					if(reg.test(scene_str)){
						util.message('场景值不能是数字！', '', 'error');
						return false;
					}
					$.post("{php echo url('platform/qr/check_scene_str')}", {'scene_str':scene_str}, function(data){
						if(data == 'repeat') {
							util.message('场景值和现有二维码场景值重复，请修改场景值', '', 'error');
							return false;
						}
					});
				}
			}
			return true;
		});
</script>
<?php
	require '../common/footer.php';
?>