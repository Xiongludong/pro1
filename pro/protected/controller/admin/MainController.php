<?php
class MainController extends BaseController{

//首页
	function actionIndex(){

		$this->display('admin/index.html');
	}

	//全站统计-数据概括
	function actionTotal(){
		$MCount = new Count();
		$content = $MCount->getWelcome();
		//取数据
		$this->tpl_today = $content['today'];

		$this->tpl_yesterday = $content['yesterday'];
		//全站今日趋势
		$today = urldecode(arg('today',date("Y-m-d")));
		$this->tpl_content = $MCount->getTrend($today);
		//dump($MCount->getTrend($today));
		$this->display('admin/total.html');
	}

	//全站统计-趋势分析
	function actionTrend(){
		$MCount = new Count();
		$today = urldecode(arg('today',date("Y-m-d")));
		$domain=$_GET['urls'] ? $_GET['urls'] : '';
		dump($domain.'111');exit;
		$this->tpl_content = $MCount->getTrend($today,$domain);
		$this->display('admin/trend.html');
	}

	//全站统计-数据对比
	function actionContrast() {
		$MCount = new Count();
		$today = urldecode(arg('today',date("Y-m-d")));
		$yesterday = urldecode(arg('yesterday',date("Y-m-d",strtotime("-1 day"))));
		//取今日数据
		$this->tpl_today = $MCount->getContrast($today);
		//取明日数据
		$this->tpl_yesterday = $MCount->getContrast($yesterday);
		$this->display('admin/contrast.html');
	}

	//域名列表
	function actionList(){

		$this->display('admin/list.html');
	}

	//取域名列表
	function actionApiDomainList() {
		$Domain = new Domain();
		$content['data'] = $Domain->findAll();

		$this->ajaxReturn($content);
		//echo json_encode($content,JSON_UNESCAPED_UNICODE);exit;
	}

	//网站列表
	function actionWebList(){

		$this->display('admin/weblist.html');
	}

	//取网站列表
	function actionApiWebList() {
		//网站独立统计
		$t1=$_GET['t1'];
		$t2=$_GET['t2'];

		$MCount = new Count();
		$MAnquan = new Domain();
		$allDomain = $MAnquan->findAll();
		$yesterday = $t2 ? $t2 : date("Y-m-d",strtotime("-1 day"));
		$today = $t1 ? $t1 : date("Y-m-d");
		//echo $today.'<br/>'.$yesterday;exit;
		foreach ($allDomain as $key => $value) {
			$todayContent = $MCount->getDomainOnceCount($value['domain'],$today);
			$todayContent['domain'] = $value['domain'];
			$todayContent['group'] = $value['group'];
			$yesterdayContent = $MCount->getDomainOnceCount($value['domain'],$yesterday);
			$todayContent['view'] = intval($todayContent['view'])."/".intval($yesterdayContent['view']);
			$todayContent['sharelu'] = intval($todayContent['todayshare'])."/".intval($yesterdayContent['todayshare']);
			$todayContent['share'] = intval($todayContent['share'])."/".intval($yesterdayContent['share']);
			$todayContent['shareend'] = intval($todayContent['shareend'])."/".intval($yesterdayContent['shareend']);
			$todayContent['download'] = intval($todayContent['download'])."/".intval($yesterdayContent['download']);
			$todayContent['timeline'] = intval($todayContent['timeline'])."/".intval($yesterdayContent['timeline']);

			//dump($todayContent);exit;

			if ((int)$todayContent['sharebl']>(int)$yesterdayContent['sharebl']){
				$todayContent['sharebl'] = '<span class="label label-success radius">'.$todayContent['sharebl'] = $todayContent['sharebl'].'</span><span class="label label-danger radius">'.$yesterdayContent['sharebl'].'</span>';
			} else {
				$todayContent['sharebl'] = '<span class="label label-danger radius">'.$todayContent['sharebl'] = $todayContent['sharebl'].'</span><span class="label label-success radius">'.$yesterdayContent['sharebl'].'</span>';
			}


			if ((int)$todayContent['shareb']>(int)$yesterdayContent['shareb']){
				$todayContent['shareb'] = '<span class="label label-success radius">'.$todayContent['shareb'] = $todayContent['shareb'].'</span><span class="label label-danger radius">'.$yesterdayContent['shareb'].'</span>';
			} else {
				$todayContent['shareb'] = '<span class="label label-danger radius">'.$todayContent['shareb'] = $todayContent['shareb'].'</span><span class="label label-success radius">'.$yesterdayContent['shareb'].'</span>';
			}

			if ((int)$todayContent['downb']>(int)$yesterdayContent['downb']){
				$todayContent['downb'] = '<span class="label label-success radius">'.$todayContent['downb'] = $todayContent['downb'].'</span><span class="label label-danger radius">'.$yesterdayContent['downb'].'</span>';
			} else {
				$todayContent['downb'] = '<span class="label label-danger radius">'.$todayContent['downb'] = $todayContent['downb'].'</span><span class="label label-success radius">'.$yesterdayContent['downb'].'</span>';
			}

			if ((int)$todayContent['viewb']>(int)$yesterdayContent['viewb']){
				$todayContent['viewb'] = '<span class="label label-success radius">'.$todayContent['viewb'] = $todayContent['viewb'].'</span><span class="label label-danger radius">'.$yesterdayContent['viewb'].'</span>';
			} else {
				$todayContent['viewb'] = '<span class="label label-danger radius">'.$todayContent['viewb'] = $todayContent['viewb'].'</span><span class="label label-success radius">'.$yesterdayContent['viewb'].'</span>';
			}

			if ((int)$todayContent['shareendb']>(int)$yesterdayContent['shareendb']){
				$todayContent['shareendb'] = '<span class="label label-success radius">'.$todayContent['shareendb'] = $todayContent['shareendb'].'</span><span class="label label-danger radius">'.$yesterdayContent['shareendb'].'</span>';
			} else {
				$todayContent['shareendb'] = '<span class="label label-danger radius">'.$todayContent['shareendb'] = $todayContent['shareendb'].'</span><span class="label label-success radius">'.$yesterdayContent['shareendb'].'</span>';
			}

			$rContent[$key] = $todayContent;
		}
		$content['data'] = $rContent;
		echo json_encode($content,JSON_UNESCAPED_UNICODE);
		die();
		$xContent = array_multisort(array_column($rContent,'view'),SORT_DESC,$rContent);
		$content['data'] = $xContent;
		echo json_encode($content,JSON_UNESCAPED_UNICODE);exit;


	}


	function actionTest(){
		echo "hello admin test";
	}


	//当日网站列表
	function actionTodayWebList(){

		$this->display('admin/todayweblist.html');
	}

	//取当日网站列表
	function actionTodayApiWebList() {
		//网站独立统计
		$t1=$_GET['t1'];
		$MCount = new Count();
		$MAnquan = new Domain();
		$allDomain = $MAnquan->findAll();
		$today = $t1 ? $t1 : date("Y-m-d");
		//echo $today.'<br/>'.$yesterday;exit;
		foreach ($allDomain as $key => $value) {
			$todayContent = $MCount->getDomainOnceCount($value['domain'],$today);
			$todayContent['domain'] = '<a href="Trend&urls='.$value['domain'].'">'.$value['domain'].'</a>';
			$todayContent['group'] = $value['group'];
			$todayContent['view'] = intval($todayContent['view']);
			$todayContent['sharelu'] = intval($todayContent['todayshare']);
			$todayContent['share'] = intval($todayContent['share']);
			$todayContent['shareend'] = intval($todayContent['shareend']);
			$todayContent['download'] = intval($todayContent['download']);
			$todayContent['timeline'] = intval($todayContent['timeline']);

			$todayContent['sharexl'] =floor(((int)$todayContent['sharelu'] / (int)$todayContent['shareend']) * 10000) / 10000 * 100;//分享效率

			$todayContent['sharexl'] = '<span class="label label-success radius">'.$todayContent['sharexl'].'</span>';


			$todayContent['sharebl'] = '<span class="label label-success radius">'.$todayContent['sharebl'] = $todayContent['sharebl'].'</span>';

			$todayContent['shareb'] = '<span class="label label-success radius">'.$todayContent['shareb'] = $todayContent['shareb'].'</span>';

			$todayContent['downb'] = '<span class="label label-success radius">'.$todayContent['downb'] = $todayContent['downb'].'</span>';

			$todayContent['viewb'] = '<span class="label label-success radius">'.$todayContent['viewb'] = $todayContent['viewb'].'</span>';

			$todayContent['shareendb'] = '<span class="label label-success radius">'.$todayContent['shareendb'] = $todayContent['shareendb'].'</span>';

			$rContent[$key] = $todayContent;
		}
		$content['data'] = $rContent;
		echo json_encode($content,JSON_UNESCAPED_UNICODE);
		die();
		$xContent = array_multisort(array_column($rContent,'view'),SORT_DESC,$rContent);
		$content['data'] = $xContent;
		echo json_encode($content,JSON_UNESCAPED_UNICODE);exit;


	}



}


