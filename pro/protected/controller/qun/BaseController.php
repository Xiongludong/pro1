<?php
class BaseController extends Controller{

	function init(){

	}


    function jump($url, $delay = 0){
        echo "<html><head><meta http-equiv='refresh' content='{$delay};url={$url}'></head><body></body></html>";
        exit;
    }

    //取随机数
    function randStr($len = 30) {
        $chars = 'ABDEFGHJKLMNPQRSTVWXYabdefghijkmnpqrstvwxy23456789'; // characters to build the password from
        mt_srand((double)microtime() * 1000000 * getmypid()); // seed the random number generater (must be done)
        $password = '';
        while (strlen($password) < $len) $password.= substr($chars, (mt_rand() % strlen($chars)) , 1);
        return $password;
    }

    //取中间字符串
	function getSubstr($str, $leftStr, $rightStr){
        $left = strpos($str, $leftStr);
        $right = strpos($str, $rightStr,$left);
        if($left < 0 or $right < $left) return '';
        return substr($str, $left + strlen($leftStr), $right-$left-strlen($leftStr));
    }

    //http请求
    function httpGet($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 3);
        curl_setopt($curl, CURLOPT_URL, $url);
        $res = curl_exec($curl);
        curl_close($curl);
        return $res;
    }


    //取ip
    function getIP(){
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



    //生成时间密匙
    function setTimeKey($str,$time = 0){
    	$text = json_encode($str);
        $key = 'xieyulongzhuandaqian';
        for ($i=0; $i <90 ; $i++) {
            $result = $this->authcode($text,'ENCODE',$key,$time);
            if (strstr($result,'%')==false&&$this->testTimeKey($result)==true){
                return $result;
            }
        }
    }
    //检查密匙
    function testTimeKey($str){
        $key = 'xieyulongzhuandaqian'; 
        $result = $this->authcode($str,'DECODE',$key,0);
        if (strlen($result)>2){
            return true;
        } else {
            return false;
        }
    }

    //检查密匙
    function getTimeKey($str){
        $key = 'xieyulongzhuandaqian'; 
        $result = $this->authcode($str,'DECODE',$key,0);
        if (strlen($result)>2){
        	return json_decode($result,true);
        } else {
            return false;
        }
    }


    function authcode($string, $operation = 'DECODE', $key = '', $expiry = 0) {
        $string = urldecode($string);
        $ckey_length = 4;  
        $key = md5($key ? $key : $GLOBALS['discuz_auth_key']);  
        $keya = md5(substr($key, 0, 16));  
        $keyb = md5(substr($key, 16, 16));  
        $keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length): 
        substr(md5(microtime()), -$ckey_length)) : '';  
        $cryptkey = $keya.md5($keya.$keyc);  
        $key_length = strlen($cryptkey);  
        $string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : 
        sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;  
        $string_length = strlen($string);  
        $result = '';  
        $box = range(0, 255);  
        $rndkey = array();  
        for($i = 0; $i <= 255; $i++) {  
            $rndkey[$i] = ord($cryptkey[$i % $key_length]);  
        }  
        for($j = $i = 0; $i < 256; $i++) {  
            $j = ($j + $box[$i] + $rndkey[$i]) % 256;  
            $tmp = $box[$i];  
            $box[$i] = $box[$j];  
            $box[$j] = $tmp;  
        }
        for($a = $j = $i = 0; $i < $string_length; $i++) {  
            $a = ($a + 1) % 256;  
            $j = ($j + $box[$a]) % 256;  
            $tmp = $box[$a];  
            $box[$a] = $box[$j];  
            $box[$j] = $tmp;  
            $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));  
        }  
        if($operation == 'DECODE') { 
            if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && 
                substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {  
                return substr($result, 26);  
            } else {  
                return '';  
            }  
        } else {  
            return urlencode($keyc.str_replace('=', '', base64_encode($result)));
        }  
    }

    //html加密
    function xHtml($html,$return = false){
        $tp = $this->xescape($html);
        if ($return == false){
            $t = str_replace('{function}', $this->getRandCharCss(rand(1, 20)), "<script>function {function}({function}){document.write(unescape({function}));};{function}(\"$tp\".replace(/ /g,'%'));</script>");
        } else {
            $t = str_replace('{function}', $this->getRandCharCss(rand(1, 20)), "function {function}({function}){document.write(unescape({function}));};{function}(\"$tp\".replace(/ /g,'%'));");
        }
        
        return $t;
    }

    function xescape($string, $in_encoding = 'UTF-8',$out_encoding = 'UCS-2') { 
        $return = ''; 
        if (function_exists('mb_get_info')) { 
            for($x = 0; $x < mb_strlen ( $string, $in_encoding ); $x ++) { 
                $str = mb_substr ( $string, $x, 1, $in_encoding ); 
                if (strlen ( $str ) > 1) { // 多字节字符 
                    $return .= ' u' . strtoupper ( bin2hex ( mb_convert_encoding ( $str, $out_encoding, $in_encoding ) ) ); 
                } else { 
                    $return .= ' ' . strtoupper ( bin2hex ( $str ) ); 
                } 
            } 
        } 
        return $return; 
    } 

    function getRandCharCss($length){
        $str = null;
        $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $max = strlen($strPol)-1;

        for($i=0;$i<$length;$i++){
            $str.=$strPol[rand(0,$max)];
        }

        return $str;
    }

	
	//public static function err404($module, $controller, $action, $msg){
	//	header("HTTP/1.0 404 Not Found");
	//	exit;
	//}
} 