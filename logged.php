<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="logstyle.css"/>
</head>
<body>

<?php
	header("Content-type:text/html;charset=utf-8");
	require_once("vardata.php");
	$name=$_POST['name'];
	$passowrd=$_POST['password'];
	
	/*登陆数据库
	 *用户名密码默认为：
	 *root 123456
	 */

    $dbc = mysqli_connect($DB_ADDR,
	$DB_USER,
	$DB_PSW,
	$dbs)
	or die('Error connecting to MySQL server');
	
	if ($name && $passowrd){
		$sql = "SELECT * FROM user WHERE users = '$name' and password='$passowrd'";
		$res = mysqli_query($dbc,$sql);
		if($rows=mysqli_fetch_array($res)){
			mysqli_close($dbc);
			header("refresh:0;url=query.php");//跳转页面，注意路径
			exit;
		}
		echo "<script language=javascript>alert('用户名密码错误');
		history.back();
		</script>";
		}
		else {
			echo "<script language=javascript>alert('用户名密码不能为空');
			history.back();
			</script>";
			}
			


	 //$result = mysqli_query($dbc,$query)
	 //or die ('Error querying database');
	 //$row = mysqli_fetch_array($result);
	 //echo $row['编号'];
	 mysqli_close($dbc);
	 ?>