<?php if(!class_exists("View", false)) exit("no direct access allowed");?><?php include $_view_obj->compile('admin/_meta.html'); ?>
    <![endif]-->
    <title>趋势分析</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 全站统计 <span class="c-gray en">&gt;</span> 趋势分析 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

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
<table class="table table-border table-bordered table-bg">
    <thead>
    <tr>
        <th colspan="7" scope="col">全站统计</th><th colspan="4" scope="col">比例统计</th>
    </tr>
    <tr class="text-c">
        <th>统计</th>
        <th>页面访问</th>
        <th>分享来路</th>
        <th>今日分享来路</th>
        <th>分享次数</th>
        <th>完成分享</th>
        <th>下载次数</th>
        <th>分享效率</th>
        <th>分享率</th>
        <th>完成分享率</th>
        <th>下载率</th>

    </tr>
    </thead>
    <tbody>
    <tr class="text-c">
        <td><?php echo htmlspecialchars($today, ENT_QUOTES, "UTF-8"); ?></td>
        <td><?php if(empty($tpl_today['view'])){echo 0;}else{echo $tpl_today['view'];} ?></td>
        <td><?php if(empty($tpl_today['timeline'])){echo 0;}else{echo $tpl_today['timeline'];} ?></td>
        <td><?php if(empty($tpl_today['todayshare'])){echo 0;}else{echo $tpl_today['todayshare'];} ?></td>
        <td><?php if(empty($tpl_today['share'])){echo 0;}else{echo $tpl_today['share'];} ?></td>
        <td><?php if(empty($tpl_today['shareend'])){echo 0;}else{echo $tpl_today['shareend'];} ?></td>
        <td><?php if(empty($tpl_today['download'])){echo 0;}else{echo $tpl_today['download'];} ?></td>
        <td><?php if(empty($tpl_today['sharexl'])){echo 0;}else{echo $tpl_today['sharexl'];} ?></td>
        <td><?php if(empty($tpl_today['sharel'])){echo 0;}else{echo $tpl_today['sharel'];} ?></td>
        <td><?php if(empty($tpl_today['shareendb'])){echo 0;}else{echo $tpl_today['shareendb'];} ?></td>
        <td><?php if(empty($tpl_today['downloadb'])){echo 0;}else{echo $tpl_today['downloadb'];} ?></td>
    </tr>
    <tr class="text-c">
        <td><?php echo htmlspecialchars($pretoday, ENT_QUOTES, "UTF-8"); ?></td>
        <td><?php if(empty($tpl_yesterday['view'])){echo 0;}else{echo $tpl_yesterday['view'];} ?></td>
        <td><?php if(empty($tpl_yesterday['timeline'])){echo 0;}else{echo $tpl_yesterday['todayshare'];} ?></td>
        <td><?php if(empty($tpl_yesterday['todayshare'])){echo 0;}else{echo $tpl_yesterday['todayshare'];} ?></td>
        <td><?php if(empty($tpl_yesterday['share'])){echo 0;}else{echo $tpl_yesterday['share'];} ?></td>
        <td><?php if(empty($tpl_yesterday['shareend'])){echo 0;}else{echo $tpl_yesterday['shareend'];} ?></td>
        <td><?php if(empty($tpl_yesterday['download'])){echo 0;}else{echo $tpl_yesterday['download'];} ?></td>
        <td><?php if(empty($tpl_yesterday['sharexl'])){echo 0;}else{echo $tpl_yesterday['sharexl'];} ?></td>
        <td><?php if(empty($tpl_yesterday['sharel'])){echo 0;}else{echo $tpl_yesterday['sharel'];} ?></td>
        <td><?php if(empty($tpl_yesterday['shareendb'])){echo 0;}else{echo $tpl_yesterday['shareendb'];} ?></td>
        <td><?php if(empty($tpl_yesterday['downloadb'])){echo 0;}else{echo $tpl_yesterday['downloadb'];} ?></td>
    </tr>
    </tbody>
</table>
<div id="container" style="min-width:700px;height:400px"></div>
<div id="webview" style="min-width:700px;height:400px"></div>
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
    var urls="<?php echo htmlspecialchars($urls, ENT_QUOTES, "UTF-8"); ?>";
    $(function () {

         if(urls !=='') {
             var text =urls+"流量趋势"
         }else{
             var text="总流量趋势";
         }

        Highcharts.chart('container', {
            title: {
                text: text,
                x: -20 //center
            },
            subtitle: {
                text: 'Source: xiaojianji.com',
                x: -20
            },
            xAxis: {
                categories: ['0点','1点','2点', '3点', '4点', '5点', '6点','7点', '8点', '9点', '10点', '11点', '12点', '13点', '14点', '15点', '16点', '17点', '18点', '19点', '20点', '21点', '22点', '23点']
            },
            colors:[
                '#FFA500',
                '#87CEFA',
                '#CD3700',
                '#32CD32',
                '#EE82EE',
            ],
            series: [
                    { name: '今日分享来路',<?php echo htmlspecialchars($tpl_content['todayshare'], ENT_QUOTES, "UTF-8"); ?> },
                    { name: '受访页面', <?php echo htmlspecialchars($tpl_content['view'], ENT_QUOTES, "UTF-8"); ?> },
                    { name: '分享次数',  <?php echo htmlspecialchars($tpl_content['share'], ENT_QUOTES, "UTF-8"); ?>  },
                    { name: '分享完毕次数', <?php echo htmlspecialchars($tpl_content['shareend'], ENT_QUOTES, "UTF-8"); ?>   },
                    { name: '下载次数',  <?php echo htmlspecialchars($tpl_content['download'], ENT_QUOTES, "UTF-8"); ?>  }
            ]
        });
        Highcharts.chart('webview', {
            title: {
                text: '分享趋势',
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
                '#CD3700',
                '#32CD32',
                '#EE82EE',
            ],
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [
                    { name: '受访页面', <?php echo htmlspecialchars($tpl_content['view'], ENT_QUOTES, "UTF-8"); ?> },
                    { name: '分享次数',  <?php echo htmlspecialchars($tpl_content['share'], ENT_QUOTES, "UTF-8"); ?>  },
                        ]
        });

        Highcharts.chart('download', {
            title: {
                text: 'APP下载展示趋势',
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
                '#CD3700',
                '#32CD32',
                '#EE82EE',
            ],
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [
                    { name: '受访页面', <?php echo htmlspecialchars($tpl_content['view'], ENT_QUOTES, "UTF-8"); ?> },
                    { name: '下载次数',  <?php echo htmlspecialchars($tpl_content['download'], ENT_QUOTES, "UTF-8"); ?>  },
                        ]
        });


                    $("#tj").click(function(){
                        var t1=$("#logmin").val();
                            var urls=$("#urls").val();
                        window.location.href="/index.php?c=Main&a=Trend&t1=" + t1+"&urls="+urls;

                    })


    });

</script>
</body>
</html>