<?php
class Domain extends Model{
	public $table_name = "ts_domain";

    //取域名信息
    public function getDomain($domain) {
        $result = $this->find(array('domain'=>$domain));
        return $result;
    }

	
	//为用户分配域名
    public function getUserDomain($model = '1',$group = '1') {
    	$userIp = $this->getIP();
        $domainList = $this->getOkDomainList($model,$group);
        $ipNumber = $userIp + date("d");
        $yushu = $ipNumber%count($domainList);
        return $domainList[$yushu]['domain'];
    }

    //取未封域名列表
    public function getOkDomainList($model = '1',$group = '1'){
    	$result = $this->findAll(
            array(
                'model'=>$model,
                'type'=>'1',
                'group'=>$group
            ), "id DESC", "domain");

    	return $result;
    }

    //批量检查域名
    public function checkDomain() {
        $nowTime = time()-180;
        //180秒以前
        $condition = array("updateTime < :nowTime AND ( type = :C1 OR type = :C2 )", 
            ":nowTime" => $nowTime,
            ":C1"    => "1",
            ":C2"    => "3",
        );
        $checkDomainList = $this->findAll($condition,"updateTime ASC");
        //生成请求列表
        $domain_arr = array();
        foreach ($checkDomainList as $key => $value) {
            $domain_arr[$value['domain']] = $value;
        }

        //生成检测请求列表
        $url_arr = array();
        $number = 0;
        foreach ($checkDomainList as $key => $value) {
            if ($number<10){
                $number = $number + 1;
                $url_arr[$value['domain']] = "http://cgi.urlsec.qq.com/index.php?m=check&a=check&callback=json&url=".$value['domain']."&_=".time();
            }  
        }
        //取出检测结果列表
        $checkDataList = $this->getCheckDomain($url_arr,$domain_arr);
        return $checkDataList;

    }



    //同步请求监测域名
    private function getCheckDomain($urlarr = array(),$domain_arr = array()) {
        $result = $res = $ch = array();
        $nch = 0;
        $mh = curl_multi_init();
        foreach ($urlarr as $nk => $url) {
            $ch[$nch] = curl_init();
                curl_setopt_array($ch[$nch], array(
                CURLOPT_URL => $url,
                CURLOPT_HEADER => false,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 3,
                CURLOPT_CONNECTTIMEOUT => 2,
            ));
            curl_multi_add_handle($mh, $ch[$nch]);
            ++$nch;
        }
        do {
            $mrc = curl_multi_exec($mh, $running);
        } while (CURLM_CALL_MULTI_PERFORM == $mrc);
        while ($running && $mrc == CURLM_OK) {
            // wait for network
            if (curl_multi_select($mh, 0.5) > - 1) {
                do {
                    $mrc = curl_multi_exec($mh, $running);
                } while (CURLM_CALL_MULTI_PERFORM == $mrc);
            }
        }
        if ($mrc != CURLM_OK) {
            error_log("CURL Data Error");
        }
        $nch = 0;
        foreach ($urlarr as $moudle => $node) {
            if (($err = curl_error($ch[$nch])) == '') {
                $res[$nch] = curl_multi_getcontent($ch[$nch]);
                $result[$moudle] = $res[$nch];
                $this->updateDomain($domain_arr,$moudle,$res[$nch]);
            } else {
                error_log("curl error");
            }
            curl_multi_remove_handle($mh, $ch[$nch]);
            curl_close($ch[$nch]);
            ++$nch;
        }
        curl_multi_close($mh);
        return $result;
    }


    //更新域名信息
    private function updateDomain($domain_arr,$domain,$domainBack){
        $resJson = $this->GetZhongText($domainBack,'json(',')');
        $res = json_decode($resJson, true);
        if (!$res){
            return;
        }
        $time = time();
        //构建提交数据
        $postArr = array();
        //判断是否有备案号
        if ($domain_arr[$domain]['ICPSerial']=='0'){
            $postArr['ICPSerial'] = $res['data']['results']['ICPSerial'];
        }
        //判断是否有备案名字
        if ($domain_arr[$domain]['Orgnization']=='0'){
            $postArr['Orgnization'] = $res['data']['results']['Orgnization'];
        }
        $postArr['updateTime'] = $time;

        if ($res['data']['results']['whitetype']=='1'){
            //域名未封,更新检测时间
            $this->update(array('domain'=>$domain),$postArr);
        } elseif($res['data']['results']['whitetype']=='2') {
            //如果被封则保存被封状态和被封时间
            $postArr['type'] = '2';
            $postArr['detectTime'] = date("Y-m-d H:i:s",$res['data']['results']['detect_time']);
            $postArr['WordingTitle'] = $res['data']['results']['WordingTitle'];

            $this->update(array('domain'=>$domain),$postArr);

            $this->sendMessage($domain.'分组:'.$domain_arr[$domain]['group']);

        } else {
            $this->update(array('domain'=>$domain),$postArr);

        }

    }

    //取出中间文本
    private function GetZhongText($content, $start, $end) {
        $r = explode($start, $content);
        if (isset($r[1])) {
            $r = explode($end, $r[1]);
            return $r[0];
        }
        return '';
    }

    //发送短信
    private function sendMessage($domain) {
        $time = date("Y-m-d h:i:sa", time());
        $apiUrl = 'https://sms.yunpian.com/v2/sms/single_send.json';
        $postData=array('text'=>'【上海赐云科技】你的域名'.$domain.'出现异常，异常时间为'.$time,'apikey'=>'3dfbd38fc1babec739e138bbf6df7cf7','mobile'=>'15989406195');
        return $this->httpPost($apiUrl,$postData);
    }

    //http请求
    private function httpGet($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 3);
        curl_setopt($curl, CURLOPT_URL, $url);
        $res = curl_exec($curl);
        curl_close($curl);
        return $res;
    }

    private function httpPost($url,$data){
        $curl = curl_init();
        curl_setopt ($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
        $res = curl_exec($curl);  
        curl_close($curl);  
        return $res;  
    }



    //取用户ip
    private function getIP(){
        global $ip;
        if (getenv("HTTP_X_FORWARDED_FOR"))
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        else if(getenv("HTTP_X_CONNECTING_IP"))
            $ip = getenv("HTTP_X_CONNECTING_IP");
        else if(getenv("HTTP_X_REAL_FORWARDED_FOR"))
            $ip = getenv("HTTP_X_REAL_FORWARDED_FOR");
        else if(getenv("REMOTE_ADDR"))
            $ip = getenv("REMOTE_ADDR");
        else if(getenv("HTTP_CLIENT_IP"))
            $ip = getenv("HTTP_CLIENT_IP");
        else $ip = "116.226.229.13";
        $ip = str_replace(',', '', $ip);
        $ip = str_replace('.', '', $ip);
        return trim($ip);
    }





}