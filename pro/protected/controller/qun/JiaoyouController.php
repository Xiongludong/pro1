<?php
class JiaoyouController extends BaseController {

	function actionIndex(){
		dump($_SERVER);

	}
	


	//css资源
	function actionJump(){
		
		if (arg('debug')!=='1'){
            if (strstr($_SERVER["HTTP_USER_AGENT"],'Trident')||strstr($_SERVER["HTTP_USER_AGENT"],'Windows NT')||strstr($_SERVER["HTTP_ACCEPT"],'html')==false){
                $jumpUrl = 'http://www.'.$this->randStr(rand(12,18)).".com";
            	header("Location: $jumpUrl");
            	die();
            }
            if (!strstr($_SERVER["HTTP_USER_AGENT"],'QQ/7')&&!strstr($_SERVER["HTTP_USER_AGENT"],'QQ/6')){
                $jumpUrl = 'http://www.'.$this->randStr(rand(12,18)).".com";
            	header("Location: $jumpUrl");
            	die();
            }
        }

		
	}

	//js资源
	function actionJs(){

		header('Content-Type: application/x-javascript; charset=UTF-8');
		$fileName = arg('file');
		$dst_path = 'qun/js/'.$fileName;

		$this->display($dst_path);
		
	}




}