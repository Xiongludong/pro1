<?php

class Count extends Model
{
    public $table_name = "ts_count";

    //添加统计数
    public function addCount($domain,$type){
        //取日期
        $today = date('Y-m-d',time());
        //取小时
        $hour = date("H",time());
        //取今日统计数据
        $content = $this->find(array('day'=>$today,'domain'=>$domain,'hour'=>$hour));
        //今日已有数据
        if ($content){
            $this->incr(array('id'=>$content['id']), $type);
        } else {
            $this->create(array('day'=>$today,'domain'=>$domain,'hour'=>$hour,'view'=>'1'));
        }
    }



    //取总数据趋势
    public function getContrast($today,$url='')
    {
        $MCount = new Count();
        if (!$today) {
            $today = date("Y-m-d");
        }
        //设置小时
        $timeline = array();
        $view = array();
        $share = array();
        $shareend = array();
        $download = array();
        //今日数据
        $where=array('day'=>$today);
        if(!empty($url)){
            $where['domain']=$url;
        }
        $todayContent = $MCount->findAll($where);
        for ($i = 0; $i < 24; $i++) {
            $timeline[(int)$i] = 0;
            $view[(int)$i] = 0;
            $share[(int)$i] = 0;
            $shareend[(int)$i] = 0;
            $download[(int)$i] = 0;
            # code...
        }
        //合并数据
        foreach ($todayContent as $key => $value) {
            $timeline[(int)$value['hour']] = (int)$timeline[(int)$value['hour']] + $value['timeline'];
            $view[(int)$value['hour']] = (int)$view[(int)$value['hour']] + $value['view'];
            $share[(int)$value['hour']] = (int)$share[(int)$value['hour']] + $value['share'];
            $download[(int)$value['hour']] = (int)$download[(int)$value['hour']] + $value['downLoad'];
            $shareend[(int)$value['hour']] = (int)$shareend[(int)$value['hour']] + $value['shareEnd'];
        }
        $timeText = array('view' => 'data:[', 'timeline' => 'data:[','share' => 'data:[', 'shareend' => 'data:[', 'download' => 'data:[');
        for ($i = 0; $i < 24; $i++) {
            if ($i < 23) {
                $wei = ',';
            } else {
                $wei = ']';
            }
            $timeText['view'] = $timeText['view'] . $view[(int)$i] . $wei;
            $timeText['timeline'] = $timeText['timeline'] . $timeline[(int)$i] . $wei;
            $timeText['share'] = $timeText['share'] . $share[(int)$i] . $wei;
            $timeText['shareend'] = $timeText['shareend'] . $shareend[(int)$i] . $wei;
            $timeText['download'] = $timeText['download'] . $download[(int)$i] . $wei;

        }
        return $timeText;

    }

    //取24小时流量趋势
    public function getTrend($today,$domain='')
    {

        if (!$today) {
            $today = date("Y-m-d");
        }
        $MCount = new Count();
        $where=array('day'=>$today);
        if(!empty($domain)){
            $where['domain']=$domain;
        }
        $allContent = $MCount->findAll($where);
        //设置小时

        $view = array();
        $share = array();
        $shareend = array();
        $todayshare = array();
        $download = array();
        for ($i = 0; $i < 24; $i++) {
            $todayshare[(int)$i] = 0;
            $view[(int)$i] = 0;
            $share[(int)$i] = 0;
            $shareend[(int)$i] = 0;
            $download[(int)$i] = 0;
        }
        //合并数据
        foreach ($allContent as $key => $value) {
            $todayshare[(int)$value['hour']] = (int)$todayshare[(int)$value['hour']] + $value['todayShare'];
            $view[(int)$value['hour']] = (int)$view[(int)$value['hour']] + $value['view'];
            $share[(int)$value['hour']] = (int)$share[(int)$value['hour']] + $value['share'];
            $shareend[(int)$value['hour']] = (int)$shareend[(int)$value['hour']] + $value['shareEnd'];
            $download[(int)$value['hour']] = (int)$download[(int)$value['hour']] + $value['downLoad'];
        }

        $timeText = array('view' => 'data:[', 'todayshare' => 'data:[', 'share' => 'data:[', 'shareend' => 'data:[', 'download' => 'data:[');
        for ($i = 0; $i < 24; $i++) {
            if ($i < 23) {
                $wei = ',';
            } else {
                $wei = ']';
            }
            $timeText['view'] = $timeText['view'] . $view[(int)$i] . $wei;
            $timeText['share'] = $timeText['share'] . $share[(int)$i] . $wei;
            $timeText['shareend'] = $timeText['shareend'] . $shareend[(int)$i] . $wei;
            $timeText['todayshare'] = $timeText['todayshare'] . $todayshare[(int)$i] . $wei;
            $timeText['download'] = $timeText['download'] . $download[(int)$i] . $wei;
        }
        return $timeText;
    }

    //首页数据概括
    public function getWelcome($t1='',$url="")
    {
        $MCount = new Count();
        $time = time();
        $today = $t1;
        $yesterday = date("Y-m-d",(strtotime($t1) - 3600*24));
        if(empty($url)) {
            $todayContent = $MCount->findAll(array('day' => $today));
            $yesterdayContent = $MCount->findAll(array('day' => $yesterday));
        }else{

            //$yesterday = date($t1, strtotime("-1 day"));

            $todayContent = $MCount->findAll(array('day' => $today,'domain'=>$url));
            $yesterdayContent = $MCount->findAll(array('day' => $yesterday,'domain'=>$url));
        }
        $todayNumber =array();// array('view' => '1', 'timeline' => '1', 'downview' => '1', 'download' => '1');
        foreach ($todayContent as $key => $value) {
            $todayNumber['view'] +=  (int)$value['view'];
            $todayNumber['todayshare'] +=  (int)$value['todayShare'];
            $todayNumber['timeline'] +=  (int)$value['timeline'];
            $todayNumber['share'] +=  (int)$value['share'];
            $todayNumber['shareend'] += (int)$value['shareEnd'];
            $todayNumber['download'] +=  (int)$value['downLoad'];
        }
        if(empty($todayNumber['shareend'])){
            $todayNumber['shareend']=1;
        }
        if(empty($todayNumber['view'])){
            $todayNumber['view']=1;
        }

        $sharexl = floor(((int)$todayNumber['timeline'] / (int)$todayNumber['shareend']) * 10000) / 10000 * 100;
        $todayNumber['sharexl'] = round($sharexl, 2);//分享效率

        $sharel = floor(((int)$todayNumber['share'] / (int)$todayNumber['view']) * 10000) / 10000 * 100;
        $todayNumber['sharel'] = round($sharel, 2);//分享率

        $shareendb = floor(((int)$todayNumber['shareend'] / (int)$todayNumber['view']) * 10000) / 10000 * 100;
        $todayNumber['shareendb'] = round($shareendb, 2);//完成分享率

        $downLoadb = floor(((int)$todayNumber['download'] / (int)$todayNumber['view']) * 10000) / 10000 * 100;
        $todayNumber['downloadb'] = round($downLoadb, 2);//下载率



        $yesterdayNumber = array();//array('view' => '1', 'timeline' => '1', 'downview' => '1', 'download' => '1');
        foreach ($yesterdayContent as $key => $value) {
            $yesterdayNumber['view'] +=  (int)$value['view'];
            $yesterdayNumber['timeline'] +=  (int)$value['timeline'];
            $yesterdayNumber['todayshare'] +=  (int)$value['todayShare'];
            $yesterdayNumber['share'] +=  (int)$value['share'];
            $yesterdayNumber['shareend'] += (int)$value['shareEnd'];
            $yesterdayNumber['download'] +=  (int)$value['downLoad'];
        }

        if(empty($yesterdayNumber['shareend'])){
            $yesterdayNumber['shareend']=1;
        }
        if(empty($yesterdayNumber['view'])){
            $yesterdayNumber['view']=1;
        }


        $sharexl = floor(((int)$yesterdayNumber['timeline'] / (int)$yesterdayNumber['shareend']) * 10000) / 10000 * 100;
        $yesterdayNumber['sharexl'] = round($sharexl, 2);//分享效率

        $sharel = floor(((int)$yesterdayNumber['share'] / (int)$yesterdayNumber['view']) * 10000) / 10000 * 100;
        $yesterdayNumber['sharel'] = round($sharel, 2);//分享率

        $shareendb = floor(((int)$yesterdayNumber['shareend'] / (int)$yesterdayNumber['view']) * 10000) / 10000 * 100;
        $yesterdayNumber['shareendb'] = round($shareendb, 2);//完成分享率

        $downLoadb = floor(((int)$yesterdayNumber['download'] / (int)$yesterdayNumber['view']) * 10000) / 10000 * 100;
        $yesterdayNumber['downloadb'] = round($downLoadb, 2);//下载率


//        $shareb = floor(((int)$yesterdayNumber['share'] / (int)$yesterdayNumber['view']) * 10000) / 10000 * 100;
//        $yesterdayNumber['shareb'] = round($shareb, 2);
//
//        $downb = floor(((int)$yesterdayNumber['download'] / (int)$yesterdayNumber['downview']) * 10000) / 10000 * 100;
//        $yesterdayNumber['downb'] = round($downb, 2);
//
//        $viewb = floor(((int)$yesterdayNumber['download'] / (int)$yesterdayNumber['view']) * 10000) / 10000 * 100;
//        $yesterdayNumber['viewb'] = round($viewb, 2);
        $content['today'] = $todayNumber;
        $content['yesterday'] = $yesterdayNumber;
        return $content;

    }

    //取域名统计列表
    public function getDomainListCount($today)
    {
        $MAnquan = new Domain();
        $domainList = $MAnquan->findAll();
        $allCount = array();
        $xDownview = 0;
        $xDownload = 0;
        $xView = 0;
        $xViewb = 0;
        $groupList = array();
        $groupLv = array();
        $domainJump = array();
        $domainGroup = array();
        foreach ($domainList as $key => $value) {
            $onceDomain = $this->getDomainOnceCount($value['domain'], $today);
            if (!$groupList[$value['group']]) {
                $groupList[$value['group']] = $value['group'];
            }
            $domainJump[$value['domain']] = $value['jump'];
            $domainGroup[$value['domain']] = $value['group'];
            $allCount[] = $onceDomain;
        }
        $MCount = new Count();
        foreach ($groupList as $key => $value) {
            $xDownview = 0;
            $xDownload = 0;
            $xView = 0;
            $count = $MCount->findAll(array('group' => $value['group'], 'today' => $today));
            foreach ($count as $key => $value) {
                $xDownview = $xDownview + (int)$value['downview'];
                $xDownload = $xDownload + (int)$value['download'];
                $xView = $xView + (int)$value['view'];
            }
            //计算全局
            $xShareb = floor(((int)$xDownview / (int)$xView) * 10000) / 10000 * 100;
            $xDownb = floor(((int)$xDownload / (int)$xDownview) * 10000) / 10000 * 100;
            $xViewb = floor(((int)$xDownload / (int)$xView) * 10000) / 10000 * 100;
            //全局比例计算
            $groupLv[$value['group']]['xShareb'] = round($xShareb, 2);
            $groupLv[$value['group']]['xDownb'] = round($xDownb, 2);
            $groupLv[$value['group']]['xViewb'] = round($xViewb, 2);
            # code...
        }


        foreach ($allCount as $key => $value) {
            //比率设置
            $allCount[$key]['shareb'] = round($value['shareb'], 2);
            $allCount[$key]['downb'] = round($value['downb'], 2);
            $allCount[$key]['viewb'] = round($value['viewb'], 2);
            $allCount[$key]['todayb'] = round($value['todayb'], 2);
            //全站比例
            $allCount[$key]['xshareb'] = $groupLv[$value['group']]['xShareb'];
            $allCount[$key]['xdownb'] = $groupLv[$value['group']]['xDownb'];
            $allCount[$key]['xviewb'] = $groupLv[$value['group']]['xViewb'];

            if ($domainGroup[$value['domain']]) {
                $allCount[$key]['group'] = $domainGroup[$value['domain']];
            } else {
                $allCount[$key]['group'] = '0';
            }

            if ($domainJump[$value['domain']] !== false) {
                $allCount[$key]['jump'] = $domainJump[$value['domain']];
            }

        }
        array_multisort(array_column($allCount, 'view'), SORT_DESC, $allCount);
        $content['data'] = $allCount;
        return $allCount;

    }

    //取独立域名统计
    public function getDomainOnceCount($domain, $today)
    {
        $MCount = new Count();
        //echo "SELECT sum(`view`) AS v FROM ".$this->table_name." where `domain`='".$domain."'";exit;
        $num = $this->query("SELECT sum(`view`) AS v FROM " . $this->table_name . " where `domain`='" . $domain . "' AND day='".$today."'");

        $timeLineNum = $this->query("SELECT sum(`timeline`) AS v FROM " . $this->table_name . " where `domain`='" . $domain . "' AND day='".$today."'");

        if(empty($num[0]['v'])){
            $num[0]['v']=1;
        }

        if(empty($timeLineNum[0]['v'])){
            $timeLineNum[0]['v']=1;
        }
        //dump($num);exit;


        $count = $MCount->findAll(array('domain' => $domain, 'day' => $today));
        $newCount = array();
        foreach ($count as $key => $value) {
            $newCount['view'] += $value['view'];
            $newCount['share'] += $value['share'];
            $newCount['shareend'] += $value['shareEnd'];
            $newCount['download'] += $value['downLoad'];
            $newCount['todayshare'] += $value['todayShare'];
            $newCount['timeline'] += $value['timeline'];
        }

        $sharebl = floor(((int)$newCount['todayshare'] / (int)$timeLineNum[0]['v']) * 10000) / 10000 * 100;
        $newCount['sharebl'] = $sharebl;//当日分享来路/分享来路

        $shareb = floor(((int)$newCount['share'] / (int)$num[0]['v']) * 10000) / 10000 * 100;
        $newCount['shareb'] = $shareb;

        $shareendb = floor(((int)$newCount['shareend'] / (int)$num[0]['v']) * 10000) / 10000 * 100;
        $newCount['shareendb'] = $shareendb;

        $downb = floor(((int)$newCount['download'] / (int)$num[0]['v']) * 10000) / 10000 * 100;
        $newCount['downb'] = $downb;

        //$viewb = floor(((int)$newCount['download'] / (int)$newCount['view'])*10000)/10000*100;
        //$newCount['viewb'] = $viewb;

        //$todayb = floor(((int)$newCount['todayshare'] / (int)$newCount['timeline'])*10000)/10000*100;
        //$newCount['todayb'] = $todayb;

        return $newCount;
    }


    public function getNewDomainList()
    {
        $MAnquan = new Domain();
        $allDomain = $MAnquan->findAll();
        $today = date("Y-m-d");
        $yesterday = date("Y-m-d", strtotime("-1 day"));
        foreach ($allDomain as $key => $value) {
            $todayContent = $this->getDomainOnceCount($value['domain'], $today);
            $todayContent['domain'] = $value['domain'];
            $todayContent['group'] = $value['group'];
            $yesterdayContent = $this->getDomainOnceCount($value['domain'], $yesterday);
            $todayContent['timeline'] = $todayContent['timeline'] . "/" . $yesterdayContent['timeline'];
            $todayContent['share'] = $todayContent['share'] . "/" . $yesterdayContent['share'];
            $todayContent['downview'] = $todayContent['downview'] . "/" . $yesterdayContent['downview'];
            $todayContent['download'] = $todayContent['download'] . "/" . $yesterdayContent['download'];

            $rContent[$key] = $todayContent;
        }
        $xContent = array_multisort(array_column($rContent, 'view'), SORT_DESC, $rContent);
        return $xContent;
    }

}