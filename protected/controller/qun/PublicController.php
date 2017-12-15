<?php
class PublicController extends BaseController {

	function actionIndex(){
		dump($_SERVER);

	}
	


	//css资源
	function actionCss(){
		header('Content-type: text/css');
		$fileName = arg('file');
		$dst_path = 'qun/css/'.$fileName;
	}

	//js资源
	function actionJs(){

		header('Content-Type: application/x-javascript; charset=UTF-8');
		$fileName = arg('file');
		$dst_path = 'qun/js/'.$fileName;

		$this->display($dst_path);
		
	}

	//图片资源
	function actionImg(){

		$fileName = arg('file');
		$dst_path = 'i/qun/images/'.$fileName;
		$dst = imagecreatefromstring(file_get_contents($dst_path));
		$font = 'i/qun/images/zt.ttf';
		$black = imagecolorallocate($dst, 0, 0, 0);
		$text2 = $this->randStr(rand(8,20));
		imagefttext($dst, 1, 0, 1, 1, $black, $font, $text2);
		list($dst_w, $dst_h, $dst_type) = getimagesize($dst_path);
		switch ($dst_type) {
			case 1: //GIF
				header("content-type:image/gif");
				imagegif($dst);
			break;
			case 2: //JPG
				header("content-type:image/jpeg");
				imagejpeg($dst);
			break;
			case 3: //PNG
				header("content-type:image/png");
				imagepng($dst);
			break;
			default:
			break;
		}
		imagedestroy($dst);
	}




}