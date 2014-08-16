<?php
        header("Content-type:text/html;charset=utf-8");
        require_once("vardata.php");
        require_once("authorize.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="logstyle.css"/>
</head>
<body>
<?php


$acol=array("编号","题名","主题","参与人员","拍摄地点","覆盖时间","服装","版本","画面内容","出版单位","格式","语种","声道","字幕","色彩","标","时长","日期","责任方式","储存位置");

	$result="update.php";	
	//下面是关于数据插入的脚本
	if(isset($_POST['update'])&&!isset($_POST['sql'])){
			//拼接sql语句
		$sql="UPDATE `视频素材`.`总表` SET ";
		for($n=1;$n<19;$n++){
			$temp="col".$n;
			if($_POST[$temp]==""){
			$sql=$sql."`$acol[$n]`= NULL, ";
			}
			else{
				$sql=$sql."`$acol[$n]`= '$_POST[$temp]', ";
			}
		}
		$n=19;
		$temp="col".$n;
		if($_POST[$temp]==""){
			$sql=$sql."`$acol[$n]`= NULL ";
			}
			else{
				$sql=$sql."`$acol[$n]`= '$_POST[$temp]' ";
			}
		$sql=$sql."WHERE `总表`.`编号` = ".$_POST['id'].";";
		$updateConfirm=true;
	}
	//询问用户是否插入这个数据
	 if(isset($updateConfirm)){
	 echo '<table id="resTable"><tr>';
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
		?>
		<div id="confirm">
		<p>确认修改为下列数据吗？</p>
			<form method="post"  action="<?php echo  $result; ?>">
			<input type="hidden" value="<?php echo $sql;?> " name="sql">
			<input type="submit" value="确定" name="confirm" />
			<input type="button" value="后退" onclick="history.back();"/>
			</form>
		</div>
	
<?php
	}
	//进行数据库操作
	if(isset($_POST['sql'])&&isset($_POST['confirm'])){
		//连接数据库
		$dbc = mysqli_connect($DB_ADDR,
		$DB_USER,
		$DB_PSW,
		$dbs)
		or die('Error connecting to MySQL server');
		$res = mysqli_query($dbc,$_POST['sql']);
		echo mysqli_affected_rows($dbc);
		//显示修改结果
		if(mysqli_affected_rows($dbc)&&$res){
			echo "<script language=javascript>alert('修改成功');
			</script>";
			header("refresh:0;url=query.php");//跳转页面，注意路径
			exit;
		}
		else {
			echo "<script language=javascript>alert('修改失败');
			history.back();
			</script>";
			exit;
		}
	}
	 mysqli_close($dbc);
	?>

</body>
</html>
