<?php
require_once("vardata.php");
if( !isset($_SERVER['PHP_AUTH_USER']) ||!isset($_SERVER['PHP_AUTH_PW'])  ){ //看看有没有储存的登录信息
	header('WWW-Authenticate: Basic realm="admin"');
    header('HTTP/1.1 401 Unauthorized');
    //如果没有登录信息，就蹦出登录框
    exit('Error!');
	}
    $sql="select* from user where clearance =1 and users = '".$_SERVER['PHP_AUTH_USER']."'and password ='".$_SERVER['PHP_AUTH_PW']."';";
    $dbc = mysqli_connect($DB_ADDR,
	$DB_USER,
	$DB_PSW,
	$dbs)
	or die('Error connecting to MySQL server');
	$res = mysqli_query($dbc,$sql);
    $row = mysqli_fetch_array($res);
if	(@mysqli_num_rows($res)){
}
else{
    exit("<script>alert('wrong')</script>");
	header('WWW-Authenticate: Basic realm="admin"');
    header('HTTP/1.1 401 Unauthorized');
}
?>