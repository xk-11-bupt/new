<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="logstyle.css"/>
</head>
<body>

<?php
	include 'query.php';
	header("Content-type:text/html;charset=utf-8");
	$dbs='视频素材';
	$sql=$_POST['sql'].";";
	$dbc = mysqli_connect('localhost',
	'root',
	'123456',
	$dbs)
	or die('Error connecting to MySQL server');
	//选择数据库：视频素材
	
	//mysqli_select_db($dbc,$dbs)
	//or die('Error selecting database');
	//$query = "select* from 总表";
	//if ($name && $passowrd){
	//$sql = "SELECT * FROM 总表 WHERE users = '$name' and password='$passowrd'";
	$res = mysqli_query($dbc,$sql);
	while($rows=mysqli_fetch_array($res)){
		echo $rows;
	}

			


	 //$result = mysqli_query($dbc,$query)
	 //or die ('Error querying database');
	 //$row = mysqli_fetch_array($result);
	 //echo $row['编号'];
	 mysqli_close($dbc);
	 ?>