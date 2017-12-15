<?php if(!class_exists("View", false)) exit("no direct access allowed");?>﻿<?php include $_view_obj->compile('admin/_meta.html'); ?>
	<![endif]-->
	<style type="text/css">
		.table>tbody>tr>td{
			text-align:center;
		}
		.table>thead:first-child>tr:first-child>th{
			text-align:center;
		}
	</style>
	<title>网站列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 独立统计 <span class="c-gray en">&gt;</span> 网站列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l">
<!--<a href="javascript:;" onclick="shua()" class="btn btn-secondary-outline radius" data-title="刷新数据"><i class="Hui-iconfont">&#xe68f;</i>刷新数据</a>-->

	<div class="text-c">
		<!--<button onclick="removeIframe()" class="btn btn-primary radius">关闭选项卡</button>-->
	 <span class="select-box inline"></span> 日期：
		<input type="text" onfocus="WdatePicker({ maxDate:'%y-%M-%d' })" id="logmin" class="input-text Wdate" style="width:120px;">
		<button name="" id="tj" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
	</div>


</div>

<div class="mt-20">
	<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive" id="example">
		<thead>
		<tr class="text-c">
			<th width="25"><input type="checkbox" name="" value=""></th>
			<th width="50">分组</th>
			<th width="60">状态</th>
			<th width="200">域名</th>
			<th>访问量</th>
			<th>分享来路</th>
			<th>当日分享来路</th>
			<th>分享次数</th>
			<th>完成分享数</th>
			<th>下载次数</th>
			<th>分享效率</th>
			<th>当日分享来路比例</th>
			<th>分享百分率</th>
			<th>完成分享百分率</th>
			<th>完成下载百分率</th>

		</tr>
		</thead>
	</table>
</div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="<?=LIB?>/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="<?=LIB?>/layer/2.4/layer.js"></script>
<script type="text/javascript" src="<?=STA?>/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="<?=STA?>/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="<?=LIB?>/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="<?=LIB?>/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?=LIB?>/laypage/1.2/laypage.js"></script>
<script type="text/javascript">



	var today = GetDateStr(0);

	var t = $('#example').DataTable({
		ajax: {
			//指定数据源
			url: "TodayApiWebList",
		},
		pageLength: 100,
		order: [[4, "desc"]],
		bPaginage: true,
		bLengthChange: false,
		autoWidth: true,
		columns: [{"data": null}, {"data": "group"}, {"data": "jump"}, {"data": "domain"}, {"data": "view"},{"data": "timeline"}, {"data": "sharelu"}, {"data": "share"}, {"data": "shareend"}, {"data": "download"},{"data":"sharexl"}, {"data": "sharebl"}, {"data": "shareb"}, {"data": "shareendb"}, {"data": "downb"}],
		"columnDefs": [
//			{
//				"render": function (data, type, row, meta) {
//					return '<td class="f-14 td-manage"><a style="text-decoration:none" class="ml-5" onClick="article_edit(\'域名编辑\',\'article-add.html\',\'10001\')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="article_del(this,\'10001\')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>'
//				}, "targets": 15
//			},
			{
				"render": function (data, type, row, meta) {

						return '<span class="btn btn-primary radius">' + data + '组</span>';

				}, "targets": 1
			},
			{
				"render": function (data, type, row, meta) {
					if (data == '3') {
						return '<span class="label label-secondary radius">智能共享</span>';
					}
					if (data == '1') {
						return '<span class="label label-secondary radius">流量独立</span>';
					} else {
						return '<span class="label label-secondary radius">流量共享</span>';
					}
				},
				//指定是第三列
				"targets": 2
			}],
		"initComplete": function () {
			$("#example_length").hide();

		}

	});
	//前台添加序号
	t.on('order.dt search.dt',
			function () {
				t.column(0, {
					"search": 'applied',
					"order": 'applied'
				}).nodes().each(function (cell, i) {
					cell.innerHTML = i + 1;
				});
			}).draw();


	function getLocalTime(nS) {
		return new Date(parseInt(nS) * 1000).toLocaleString().replace(/:\d{1,2}$/,' ');
	};
	function showToday() {
		today = GetDateStr(-0);
		t.ajax.url("ApiWebList&today=" + GetDateStr(0)).load();
		$.Huimodalalert('载入完毕',888);
	}

	function showYesterday() {
		today = GetDateStr(-1);
		t.ajax.url("ApiWebList&today=" + GetDateStr(-1)).load();
		$.Huimodalalert('载入完毕',888);
	}

	function shua() {
		//t.ajax.url("index.php?m=admin&c=main&a=ApiWebList&today=" + today).load();
		//$.Huimodalalert('刷新成功',888);
		$.post('ApiWebList',{},function(data){
			console.log(data);
		})
	}

	$("#tj").click(function(){
		var t1=$("#logmin").val();
		t.ajax.url("/index.php?c=Main&a=TodayApiWebList&t1=" + t1).load();

	})

	//取日期
	function GetDateStr(AddDayCount) {
		var dd = new Date();
		dd.setDate(dd.getDate()+AddDayCount);
		var y = dd.getFullYear();
		var m = dd.getMonth()+1;
		var d = dd.getDate();
		if(parseInt(d)<10){
			d = '0' + d;
		}
		return y+"-"+m+"-"+d;
	}
</script>
</body>
</html>