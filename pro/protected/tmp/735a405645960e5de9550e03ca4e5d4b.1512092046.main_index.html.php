<?php if(!class_exists("View", false)) exit("no direct access allowed");?><div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h2>Hello SpeedPHP!</h2>
			<hr>
			<div class="row-fluid">
				<div class="span6">
					<h3>提交表单，通过HTML的form标签<?php echo url(array('m'=>'qun', 'c'=>'public', 'a'=>'js', 'file'=>'zepto.js', 'time'=>'20', ));?></h3>
					<form action="" method="POST">
						<fieldset>
							<legend>表单项</legend>
							<label>填点东西进去？</label><input name="username" type="text"
								placeholder="Type something…" /> <br>
							<button type="submit" class="btn">提交</button>
						</fieldset>
					</form>
					$(".model").model;
					<?php $nowtime = date("Y-m-d H:i:s"); ?>
					<p>当前时间是：<?php echo htmlspecialchars($nowtime, ENT_QUOTES, "UTF-8"); ?></p>
				</div>
				
			</div>
			<hr>
			<div class="row-fluid">
				<div class=span8>
					<h3>数据库学习准备：</h3>
					<p>1. 首先得要配置好数据库链接信息及建表：</p>

					<p>配置中是：（config.php文件）</p>

					<pre>
'mysql' => array(
	'MYSQL_HOST' => '', // 数据库IP地址
	'MYSQL_PORT' => '', // 数据库端口，如3306
	'MYSQL_USER' => '', // 用户名
	'MYSQL_DB'   => '', // 数据库库名
	'MYSQL_PASS' => '', // 数据库密码
	'MYSQL_CHARSET' => 'utf8', // 一般不用修改
),
</pre>
					<p>建表，如我们例子是： test_user</p>
					<pre>
CREATE TABLE `test_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
</pre>
					<p>2. 在model目录建立模型类，基本来说每个表建议建立一个模型类，方便扩展。</p>

					<p>如model/User.php内容如下：</p>
					<pre>
class User extends Model{
	var $table_name = "test_user";
}
</pre>
					<p>使用MySQL数据库的模型类务必要继承与Model类</p>
					<p>完成以上操作后，请参考右边的教程。---->>>>></p>
				</div>

			</div>
		</div>
	</div>
</div>
