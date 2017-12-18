<?php if(!class_exists("View", false)) exit("no direct access allowed");?><?php include $_view_obj->compile('admin/_meta.html'); ?>
    <![endif]-->
    <title>数据概括</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 全站统计 <span class="c-gray en">&gt;</span> 数据概括 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <p class="f-20 text-success">欢迎使用后台</p>

    <!--<button class="btn">Copy_target</button>-->
    <!--<div id="copys">hello</div>-->

    <!--<script>-->
        <!--var clipboard = new Clipboard('.btn', {-->
            <!--// 通过target指定要复印的节点-->
            <!--target: function() {-->
                <!--return document.querySelector('#copys');-->
            <!--}-->
        <!--});-->

        <!--clipboard.on('success', function(e) {-->
            <!--console.log(e);-->
        <!--});-->

        <!--clipboard.on('error', function(e) {-->
            <!--console.log(e);-->
        <!--});-->
    <!--</script>-->


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
            <td>今日</td>
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
            <td id="name">昨日</td>
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

</div>
<footer class="footer mt-20">
    <div id="container" style="min-width:700px;height:400px"></div>
</footer>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="<?=LIB?>/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="<?=LIB?>/layer/2.4/layer.js"></script>
<script type="text/javascript" src="<?=STA?>/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="<?=STA?>/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="<?=LIB?>/hcharts/Highcharts/5.0.6/js/highcharts.js"></script>
<script type="text/javascript" src="<?=LIB?>/hcharts/Highcharts/5.0.6/js/modules/exporting.js"></script>
<script type="text/javascript">

    $(function () {




        Highcharts.chart('container', {
            title: {
                text: '今日全站流量趋势',
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

    });
</script>
</body>
</html>