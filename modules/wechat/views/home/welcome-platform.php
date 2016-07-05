<?php
	require '../common/header.php';
?>
<ul class="nav nav-tabs">
	<li class="active"><a href="../home/welcome.php">账号概况 - 平台相关数据</a></li>
</ul>
<div class="clearfix welcome-container">
	<div class="page-header">
		<h4><i class="fa fa-plane"></i> 快捷操作</h4>
	</div>
	<div class="shortcut clearfix">
		<a href="../platform/reply.php">
			<i class="fa fa-sitemap"></i>
			<span>自定义接口</span>
		</a>
	</div>
	<div class="page-header">
		<h4><i class="fa fa-comments"></i> 公众号信息</h4>
	</div>
	<div class="account">
		<div class="panel panel-default row">
			<div class="panel-body">
				<div class="clearfix">
					<div class="col-sm-7">
						<p>
							<strong>千诺科技</strong>
							<span class="label label-success" style="display:inline-block; margin-right:10px;">
							认证服务号/认证媒体/政府订阅号
							</span>
							<span class="text-warning"><i class="fa fa-times-circle"></i> 未接入</span>
						</p>
						<p><strong>接口地址： </strong> <a href="javascript:;" style="color:#66667C;">http://www.demaxiya.com</a></p>
						<p><strong>　Token： </strong> <a href="javascript:;" title="点击复制Token" style="color:#66667C;">sd45f4s8fdf4dfdsffdf45d5f4d5</a></p>
					</div>
					<div class="col-sm-5 text-right">
						<img src="../resource/images/gw-wx.gif" class="img-responsive img-thumbnail" width="150" onerror="this.src='../resource/images/gw-wx.gif'" />
						<img src="../resource/images/gw-wx.gif" class="img-responsive img-thumbnail" width="150" onerror="this.src='../resource/images/gw-wx.gif'"/>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		$('.account p a').each(function(){
			util.clip(this, $(this).text());
		});
	</script>
	<div class="panel panel-default">
		<div class="panel-heading">
			关键指标详解
			<a class="text-danger" href="../account/summary.php" target="_blank">查看更多</a>
		</div>
		<div class="panel-body" id="scroll">
			<div class="account-stat">
				<div class="account-stat-btn">
					<div>今日新关注人数<span>3</span></div>
					<div>今日取消关注人数<span>2</span></div>
					<div>今日净增关注人数<span>1</span></div>
					<div>累积关注人数<span>0</span></div>
				</div>
			</div>
			<div class="pull-right">
				<div class="checkbox">
					<label style="color:#57B9E6;"><input checked type="checkbox"> 新关注人数</label>&nbsp;
					<label style="color:rgba(203,48,48,1)"><input checked type="checkbox"> 取消关注人数</label>&nbsp;
					<label style="color:rgba(149,192,0,1);;"><input checked type="checkbox"> 净增人数</label>&nbsp;
					<label style="color:#e7a017;"><input type="checkbox"> 累积关注人数</label>
				</div>
			</div>
			<div style="margin-top:20px">
				<canvas id="myChart1" width="1200" height="300"></canvas>
			</div>
		</div>
	</div>
	<script>
		require(['chart', 'daterangepicker'], function(c) {
			var chart = null;
			var chartDatasets = null;
			var templates = {
				flow1: {
					label: '新关注人数',
					fillColor : "rgba(36,165,222,0.1)",
					strokeColor : "rgba(36,165,222,1)",
					pointColor : "rgba(36,165,222,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(36,165,222,1)",
				},
				flow2: {
					label: '取消关注人数',
					fillColor : "rgba(203,48,48,0.1)",
					strokeColor : "rgba(203,48,48,1)",
					pointColor : "rgba(203,48,48,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(203,48,48,1)",
				},
				flow3: {
					label: '净增人数',
					fillColor : "rgba(149,192,0,0.1)",
					strokeColor : "rgba(149,192,0,1)",
					pointColor : "rgba(149,192,0,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(149,192,0,1)",
				},
				flow4: {
					label: '累计人数',
					fillColor : "rgba(231,160,23,0.1)",
					strokeColor : "rgba(231,160,23,1)",
					pointColor : "rgba(231,160,23,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(231,160,23,1)"
				}
			};

			function refreshData() {
				if(!chart || !chartDatasets) {
					return;
				}
				var visables = [];
				var i = 0;
				$('.checkbox input[type="checkbox"]').each(function(){
					if($(this).attr('checked')) {
						visables.push(i);
					}
					i++;
				});
				var ds = [];
				$.each(visables, function(){
					var o = chartDatasets[this];
					ds.push(o);
				});
				chart.datasets = ds;
				chart.update();
			}
			var url = './index.php?c=account&a=summary&acid=2&uniacid=2&#aaaa';
			$.post(url, function(data){
				var data = $.parseJSON(data)
				var datasets = data.datasets;
				if(!chart) {
					var label = data.label;
					var ds = $.extend(true, {}, templates);
					ds.flow1.data = datasets.flow1;
					ds.flow2.data = datasets.flow2;
					ds.flow3.data = datasets.flow3;
					ds.flow4.data = datasets.flow4;
					var lineChartData = {
						labels : label,
						datasets : [ds.flow1, ds.flow2, ds.flow3, ds.flow4]
					};

					var ctx = document.getElementById("myChart1").getContext("2d");
					chart = new Chart(ctx).Line(lineChartData, {
						responsive: true
					});
					chartDatasets = $.extend(true, {}, chart.datasets);
				}
				refreshData();
			});

			$('.checkbox input[type="checkbox"]').on('click', function(){
				$(this).attr('checked', !$(this).attr('checked'))
				refreshData();
			});
		});
	</script>
	<style>
		.account-stat{overflow:hidden; color:#666;}
		.account-stat .account-stat-btn{width:100%; overflow:hidden;}
		.account-stat .account-stat-btn > div{text-align:center; margin-bottom:5px;margin-right:2%; float:left;width:23%; height:80px; padding-top:10px;font-size:16px; border-left:1px #DDD solid;}
		.account-stat .account-stat-btn > div:first-child{border-left:0;}
		.account-stat .account-stat-btn > div span{display:block; font-size:30px; font-weight:bold}
	</style>
	<div class="page-header">
		<h4><i class="fa fa-android"></i> 基本回复统计情况</h4>
	</div>
	<div class="panel panel-default" style="padding:1em;">
		<nav role="navigation" class="navbar navbar-default navbar-static-top" id="clear" style="margin: -1em -1em 1em -1em;">
			<div class="container-fluid">
				<div class="navbar-header">
					<a href="javascript:;" class="navbar-brand">模块命中次数趋势图</a>
				</div>
				<ul class="nav navbar-nav nav-btns">
					<li class="active" id="basic"><a href="javascript:;">文字回复</a></li>
					<li id="news"><a href="javascript:;">图文回复</a></li>
					<li id="music"><a href="javascript:;">音乐回复</a></li>
					<li id="images"><a href="javascript:;">图片回复</a></li>
					<li id="voice"><a href="javascript:;">语音回复</a></li>
					<li id="video"><a href="javascript:;">视频回复</a></li>
					<li id="userapi"><a href="javascript:;">自定义接口回复</a></li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">其他模块 <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li id=""><a href="javascript:;"></a></li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
		
		<div class="account-stat">
			<div class="account-stat-btn">
				<div>总回复规则数<span id="rule"></span></div>
				<div>今日命中次数<span id="today"></span></div>
				<div>本月命中次数<span id="month"></span></div>
				<div>
					<a href="" id="show"  style="display:block; margin:5px 0;"><i class="fa fa-search"></i> 查看回复规则</a>
					<a href="" id="add" style="display:block;"><i class="fa fa-plus"></i> 新增回复规则</a>
				</div>
			</div>
		</div>

		<div style="margin-top:20px;">
			<canvas id="myChart" height="80"></canvas>
		</div>
	</div>

	<script>
		require(['chart'], function(c) {
			$('.dropdown').click(function(){
				$('.nav.nav-btns>li').removeClass('active');
				$(this).toggleClass('active');
			});
			
			var myLine = new Chart(document.getElementById("myChart").getContext("2d"));
			var datasets = '';
			var label = '';
			var lineChartData = null;
			var obj = null;
			var day_num = "{php echo $day_num;}";
			var show_url = "{php echo url('platform/reply/display')}m=";
			var add_url = "{php echo url('platform/reply/post')}m=";
			var data = null;
			
			$.post(location.href, {'m_name' : 'basic'}, function(data){
				data = $.parseJSON(data);
				
				$("#rule").html(data.stat.rule);
				$("#today").html(data.stat.today);
				$("#month").html(data.stat.month);
				$('#show').attr('href', show_url + data.stat.m_name);
				$('#add').attr('href', add_url + data.stat.m_name);

				lineChartData = {
					labels : data.key,
					datasets : [
						{
							fillColor : "rgba(36,165,222,0.1)",
							strokeColor : "rgba(36,165,222,1)",
							pointColor : "rgba(36,165,222,1)",
							pointStrokeColor : "#fff",
							pointHighlightFill : "#fff",
							pointHighlightStroke : "rgba(36,165,222,1)",
							data : data.value
						}
					]
				}
				 obj = myLine.Line(lineChartData, {responsive: true});
			});
			
			$('.nav.nav-btns li[class!="dropdown"]').on('click', function(){
				$('.nav.nav-btns li').removeClass('active');
				$(this).toggleClass('active');
				var m_name = $(this).attr('id');
				
				$.post(location.href, {'m_name' : m_name}, function(data){
					data = $.parseJSON(data);
					
					$("#rule").html(data.stat.rule);
					$("#today").html(data.stat.today);
					$("#month").html(data.stat.month);
					
					$('#show').attr('href', show_url + data.stat.m_name);
					$('#add').attr('href', add_url + data.stat.m_name);

					 for(var i = 0; i <= day_num; i++) {
						obj.datasets[0].points[i].value = data.value[i];
					 }
					obj.update();
				});
			});
		});
	</script>
	<div class="page-header">
		<h4><i class="fa fa-cogs"></i> 高级功能统计情况</h4>
	</div>
	<div class="panel panel-default">
		<div class="panel-body table-responsive">
		<table class="table">
			<thead>
			<tr>
				<th style="width:200px;">功能类别</th>
				<th>概况</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>常用服务</td>
				<td>
					<p>已启用：
						<span class="label label-info">城市天气</span>
					</p>
					<p>未启用：
						<span class="label label-warning">城市天气</span>
					</p>
				</td>
			</tr>
			<tr>
				<td>自定义菜单</td>
				<td>
					<p>已启用：
						<span class="label label-info">千诺科技</span>&nbsp;
					</p>
					<p>未启用：
						<span class="label label-warning">千诺科技&nbsp;(权限不足)</span>&nbsp;
					</p>
				</td>
			</tr>
			<tr>
				<td>特殊回复</td>
				<td>
					<p>
						图片消息：
						<span class="label label-info">
								木有
						</span>&nbsp;
					</p>
				</td>
			</tr>
			<tr>
				<td>二维码</td>
				<td>
					<p>千诺科技：
						<span class="label label-info">临时（0个）</span>&nbsp;
						<span class="label label-info">永久（0个）</span>
					</p>
					<p>总计：
						<span class="label label-info">临时（0个）</span>&nbsp;
						<span class="label label-info">永久（0个）</span>
					</p>
				</td>
			</tr>
			</tbody>
		</table>
		</div>
	</div>
</div>
<?php
	require '../common/footer.php';
?>