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
	<title>域名管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 域名管理 <span class="c-gray en">&gt;</span> 域名列表 </nav>

<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" data-title="添加域名" data-href="article-add.html" onclick="Hui_admin_tab(this)" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加域名</a>
</span>
	<a class="btn btn-success radius r" href="javascript:;" title="刷新" onclick="shua()" style="line-height:1.6em;margin-top:3px" ><i class="Hui-iconfont">&#xe68f;</i></a>
</div>

<div class="mt-20">
	<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive" id="example">
		<thead>
		<tr class="text-c">
			<th width="66"><input type="checkbox" name="" value=""></th>
			<th width="66">ID</th>
			<th width="266">域名</th>
			<th width="100">流量模式</th>
			<th width="100">分组</th>
			<th width="100">状态</th>
			<th width="180">检查时间</th>
			<th width="180">备案信息</th>
			<th>操作</th>
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
	/*Javascript代码片段*/
	$(function(){
		$.post('ApiDomainList',{},function(data){

			console.log(data)
		});
	})

	var t = $('#example').DataTable({
		ajax: {
			//指定数据源
			url: "ApiDomainList"
		},
		//每页显示三条数据
		pageLength: 100,
		autoWidth:true,
		bPaginage:true,
		bLengthChange:false,
		columns: [{"data": null},{"data": "id"},{"data": "domain"},{"data": "jump"},{"data": "group"},{"data": "type"},{"data": "updateTime"},{"data": "ICPSerial"}],
		"columnDefs": [
			{
				"render": function(data, type, row, meta) {
					return '<td class="f-14 td-manage"><a style="text-decoration:none" class="ml-5" onClick="article_edit(\'域名编辑\',\'article-add.html\',\'10001\')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="article_del(this,\'10001\')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>'
				},
				//指定是第三列
				"targets": 8
			},
			{
				"render": function(data, type, row, meta) {
					if (data == '1'){
						return '<span class="label label-success radius">正常</span>';
					} else {
						return '<span class="label label-danger radius">已封</span>';
					}
				},
				//指定是第三列
				"targets":5
			},
			{
				"render": function(data, type, row, meta) {
					return getLocalTime(data);
				},
				//指定是第三列
				"targets":6
			},
			{
				"render": function(data, type, row, meta) {
					if (data == '0'){
						return '<span class="label label-secondary radius">流量共享</span>';
					} else {
						return '<span class="label label-warning radius">流量独立</span>';
					}
				},
				//指定是第三列
				"targets":3
			},
			{
				"render": function(data, type, row, meta) {
					return '<span class="label label-warning radius">'+data+'组</span>';
				},
				//指定是第三列
				"targets":4
			}]

	});
	//前台添加序号
	t.on('order.dt search.dt',
			function() {
				t.column(0, {
					"search": 'applied',
					"order": 'applied'
				}).nodes().each(function(cell, i) {
					cell.innerHTML = i + 1;
				});
			}).draw();
	function getLocalTime(nS) {
		return new Date(parseInt(nS) * 1000).toLocaleString().replace(/:\d{1,2}$/,' ');
	};
	function shua() {
		t.ajax.url("apiDomainList").load();
		$.Huimodalalert('刷新成功',888);
	}



</script>
</body>
</html>