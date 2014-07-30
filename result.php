<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="logstyle.css"/>
</head>
<body>

<?php
	header("Content-type:text/html;charset=utf-8");
	require_once("vardata.php");
	$acol=array("编号","题名","主题","参与人员","拍摄地点","覆盖时间","服装","版本","画面内容","出版单位","格式","语种","声道","字幕","色彩","标","时长","日期","责任方式","储存位置");
	$dbs='视频素材';
	//下面开始是查询脚本
	if(isset($_POST['submit'])){		
		$insert=false;
		$query=true;
		$condition=true;//see if it is  the first time
		//$test="col"."0";
		//echo $_POST[$test];
		//judge if any material entered
		for($n=0;$n<20;$n++){
			$col="col".$n;
			if(!empty($_POST[$col])&&$condition){
				$condition=false;
				$_POST['sql']="select* from 总表 where $acol[$n] like '%$_POST[$col]%'";
			}
			else if (!empty($_POST[$col])){
				$_POST['sql']=$_POST['sql']."and where $acol[$n] like '%$_POST[$col]%'";
			}
		}
		$sql=$_POST['sql'].";";
	}
	if(isset($_POST['submit'])&&$condition){
		echo "<script language=javascript>alert('请输入查询内容');
		history.back();
		</script>";
	}
	//查询脚本到此为止


	//下面是关于数据插入的脚本
	if(isset($_POST['insert'])){
		//用JS向用户确认是否需要插入
		
			//拼接sql语句
		$sql="INSERT INTO `总表` (`题名`";
		for($n=2;$n<20;$n++){
			$sql=$sql.",`$acol[$n]`";	
		}
		$sql=$sql.") VALUES('$_POST[col1]'";
		for($n=2;$n<20;$n++){
			$col="col".$n;
			if(empty($_POST[$col])){
			$sql=$sql.",NULL";
			}
			else{
			$sql=$sql.",'$_POST[$col]'";
			}
		}
		$sql=$sql.")";
		$insert=false;
		$query=false;
	}
	//询问用户是否插入这个数据
	 if(!$query&&!$insert){
	 echo '<table id="customers"><tr>';
		foreach($acol as $column){
		echo "<th>$column</th>";
		}	
		echo "</tr>";
		$insArr[0]="";
		for ($n=1;$n<20;$n++){
			$temp="col".$n;
			$insArr[$n]=$_POST[$temp];
		}
		echo "<tr>";
		foreach($insArr as $coll){
			echo "<td>".$coll."</td>";
		}
		echo "</tr></tabble>";
		echo 
			'</br><p>确认插入上述数据吗？</p></br>
			<form action="result.php" method="post">
			<input type="submit" value="确定" name="sql">
			<input type="button" value="后退" onclick="history.back();">';
	 }
	if(isset($_POST['sql'])){
		$sql=$_POST['sql'];
		$insert=true;
		$query=false;
	}
	//插入脚本到此为止
	
	//连接数据库	
	if($query||$insert){
	$dbc = mysqli_connect($DB_ADDR,
	$DB_USER,
	$DB_PSW,
	$dbs)
	or die('Error connecting to MySQL server');
	$res = mysqli_query($dbc,$sql);

	//mysqlquery($sql);
	//显示查询结果
	if($query&&mysqli_num_rows($res)) {
<<<<<<< HEAD

	echo '<table id="resTable"><tr>';
=======
	echo '<table id="customers"><tr>';
>>>>>>> parent of 6176b4b... test1.3
	foreach($acol as $column){
	echo "<th>$column</th>";
	}
	echo "</tr>";
	$odd=true;

		while($rows=mysqli_fetch_array($res,MYSQL_ASSOC)){
			foreach($rows as $value){
				echo $value."<br/>";
			}
		}
	}
	//查询结果为空
	if($query&&!mysqli_num_rows($res)){
		mysqli_close($dbc);
		echo "<script> alert('查询无结果'); history.back();</script> ";}
		exit;
	//显示插入结果
	if($res&&$insert){
		echo "<script language=javascript>alert('插入成功');
		</script>";
		mysqli_close($dbc);
		header("refresh:0;url=query.php");//跳转页面，注意路径
		exit;
		}
		
	if(!$res&&$insert) {
		mysqli_close($dbc);
		echo "<script language=javascript>alert('插入失败');
		history.back();
		</script>";
		exit;
	}
	 mysqli_close($dbc);
	 }
	 ?>