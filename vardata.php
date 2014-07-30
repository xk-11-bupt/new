<?php
	header("Content-type:text/html;charset=utf-8");
	$DB_ADDR='localhost';//alter as need
	$DB_USER='root';
	$DB_PSW='123456';
	$dbs='视频素材';
	/*下面函数用语连接数据库并执行插入语句，
	 *$dbc 用于连接 
	 *$res 用于查询结果
	 *$sql 为执行的插入语句
	 *不要忘记关闭
	 *mysqli_close($dbc);
	 
	 not for use for now;
	 */
	function mysqlquery($sql){
		global $DB_ADDR,$DB_USER,$DB_PSW,$dbs;
		$dbc = mysqli_connect($DB_ADDR,
		$DB_USER,
		$DB_PSW,
		$dbs)
		or die('Error connecting to MySQL server');
		$res = mysqli_query($dbc,$sql);
		return $dbc;
	}
?>