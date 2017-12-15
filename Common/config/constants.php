<?php
/**
 * 跃飞科技版权所有 @2017
 * User: 扩展常量
 * Date: 2017/3/14
 * Time: 10:01
 */

defined('WEB_SIZE') OR define('WEB_SIZE', 'http://'.@$_SERVER['SERVER_NAME']);

//后台样式
defined('LIB') OR define('LIB',WEB_SIZE.'/i/admin/lib');
defined('STA') OR define('STA',WEB_SIZE."/i/admin/static");
defined('TEMP') OR define('TEMP',WEB_SIZE."/i/admin/temp");
