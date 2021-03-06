<?php if(!class_exists("View", false)) exit("no direct access allowed");?><?php include $_view_obj->compile('admin/_meta.html'); ?>
    <![endif]-->
    <title>对比分析</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 全站统计 <span class="c-gray en">&gt;</span> 对比分析 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l">
<!--<a href="javascript:;" onclick="shua()" class="btn btn-secondary-outline radius" data-title="刷新数据"><i class="Hui-iconfont">&#xe68f;</i>刷新数据</a>-->

	<div class="text-c">
        <!--<button onclick="removeIframe()" class="btn btn-primary radius">关闭选项卡</button>-->
        <span class="select-box inline"></span> 日期：
        <input type="text" value="<?php echo htmlspecialchars($today, ENT_QUOTES, "UTF-8"); ?>" onfocus="WdatePicker({ maxDate:'%y-%M-%d' })" id="logmin" class="input-text Wdate" style="width:120px;">
        <input type="hidden"  id="urls" value="<?php echo htmlspecialchars($urls, ENT_QUOTES, "UTF-8"); ?>">

        <button name="" id="tj" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
    </div>





</div>

<div id="webview" style="min-width:700px;height:400px"></div>
<div id="timeline" style="min-width:700px;height:400px"></div>
<div id="share" style="min-width:700px;height:400px"></div>
<div id="shareend" style="min-width:700px;height:400px"></div>
<div id="download" style="min-width:700px;height:400px"></div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="<?=LIB?>/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="<?=LIB?>/layer/2.4/layer.js"></script>
<script type="text/javascript" src="<?=STA?>/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="<?=STA?>/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="<?=LIB?>/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="<?=LIB?>/hcharts/Highcharts/5.0.6/js/highcharts.js"></script>
<script type="text/javascript" src="<?=LIB?>/hcharts/Highcharts/5.0.6/js/modules/exporting.js"></script>
<script type="text/javascript">
    $(function () {
        var urls="<?php echo htmlspecialchars($urls, ENT_QUOTES, "UTF-8"); ?>";
        $("#tj").click(function(){
            var t1=$("#logmin").val();
            var urls=$("#urls").val();
            window.location.href="/index.php?c=Main&a=Contrast&t1=" + t1+"&urls="+urls;

        })

        Highcharts.chart('webview', {
            title: {
                text: urls+'访问对比',
                x: -20 //center
            },
            subtitle: {
                text: 'Source: xiaojianji.com',
                x: -20
            },
            xAxis: {
                categories: ['0','1','2', '3', '4', '5', '6','7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23']
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            colors:[
                '#FFA500',
                '#87CEFA',
            ],
            series: [{
                name: '今日',
                <?php echo htmlspecialchars($tpl_today['view'], ENT_QUOTES, "UTF-8"); ?>
            },{
                name: '昨日',
                    <?php echo htmlspecialchars($tpl_yesterday['view'], ENT_QUOTES, "UTF-8"); ?>      }]
        });
        Highcharts.chart('timeline', {
            title: {
                text: urls+'分享来路对比',
                x: -20 //center
            },
            subtitle: {
                text: 'Source: xiaojianji.com',
                x: -20
            },
            xAxis: {
                categories: ['0','1','2', '3', '4', '5', '6','7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23']
            },
            colors:[
                '#FFA500',
                '#87CEFA',
            ],
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: '今日',
                    <?php echo htmlspecialchars($tpl_today['timeline'], ENT_QUOTES, "UTF-8"); ?>     },{
                name: '昨日',
                    <?php echo htmlspecialchars($tpl_yesterday['timeline'], ENT_QUOTES, "UTF-8"); ?>        }]
        });

        Highcharts.chart('share', {
            title: {
                text: urls+'分享对比',
                x: -20 //center
            },
            subtitle: {
                text: 'Source: xiaojianji.com',
                x: -20
            },
            xAxis: {
                categories: ['0','1','2', '3', '4', '5', '6','7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23']
            },
            colors:[
                '#FFA500',
                '#87CEFA',
            ],
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: '今日',
                    <?php echo htmlspecialchars($tpl_today['share'], ENT_QUOTES, "UTF-8"); ?>       },{
                name: '昨日',
                    <?php echo htmlspecialchars($tpl_yesterday['share'], ENT_QUOTES, "UTF-8"); ?>       }]
        });

        Highcharts.chart('shareend', {
            title: {
                text: urls+'分享完成对比',
                x: -20 //center
            },
            subtitle: {
                text: 'Source: xiaojianji.com',
                x: -20
            },
            xAxis: {
                categories: ['0','1','2', '3', '4', '5', '6','7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23']
            },
            colors:[
                '#FFA500',
                '#87CEFA',
            ],
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: '今日',
                    <?php echo htmlspecialchars($tpl_today['shareend'], ENT_QUOTES, "UTF-8"); ?>        },{
                name: '昨日',
                    <?php echo htmlspecialchars($tpl_yesterday['shareend'], ENT_QUOTES, "UTF-8"); ?>        }]
        });



    Highcharts.chart('download', {
                title: {
                    text:urls+ '下载对比',
                    x: -20 //center
                },
                subtitle: {
                    text: 'Source: xiaojianji.com',
                    x: -20
                },
                xAxis: {
                    categories: ['0','1','2', '3', '4', '5', '6','7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23']
                },
                colors:[
                    '#FFA500',
                    '#87CEFA',
                ],
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                    borderWidth: 0
                },
                series: [{
                    name: '今日',
                <?php echo htmlspecialchars($tpl_today['download'], ENT_QUOTES, "UTF-8"); ?>        },{
        name: '昨日',
                <?php echo htmlspecialchars($tpl_yesterday['download'], ENT_QUOTES, "UTF-8"); ?>        }]
    });

    });

</script>
</body>
</html>