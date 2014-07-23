<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="logstyle.css"/>
</head>
<body>

<?php
	header("Content-type:text/html;charset=utf-8");
	$dbs='视频素材';
	$sql=$_POST['sql'].";";
	
	/*登陆数据库
	 *用户名密码默认为：
	 *root 123456
	 */
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
		echo $sql;
		$res = mysqli_query($dbc,$sql);
		if($res){
		echo "<script language=javascript>alert('插入成功');
		history.back();
		</script>";
		
		}
		else {
			echo "<script language=javascript>alert('插入失败');
			
			</script>";
			}
		header("refresh:0;url=query.php");//跳转页面，注意路径
		exit;
			


	 //$result = mysqli_query($dbc,$query)
	 //or die ('Error querying database');
	 //$row = mysqli_fetch_array($result);
	 //echo $row['编号'];
	 mysqli_close($dbc);
	 ?>