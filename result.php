<?php
    require_once("vardata.php");
    header("Content-type:text/html;charset=utf-8");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="logstyle.css"/>
</head>
<body>
<?php

	$insertConfirm=false;
	$insert=false;
	$query=false;
	$acol=array("编号","题名","主题","参与人员","拍摄地点","覆盖时间","服装","版本","画面内容","出版单位","格式","语种","声道","字幕","色彩","标","时长","日期","责任方式","储存位置");
	//下面开始是查询脚本
	if(isset($_POST['submit'])){
		$insert=false;
		$query=true;
		$condition=true;
		/*
		$condition is flag mark 
		if it is true the program never 
		judge if any material entered
		*/
		for($n=0;$n<20;$n++){
			$col="col".$n;
			if(!empty($_POST[$col])&&$condition){
				$condition=false;
				$sql="select* from 总表 where $acol[$n] like '%$_POST[$col]%'";
			}
			else if (!empty($_POST[$col])){
				$sql=$sql."and where $acol[$n] like '%$_POST[$col]%'";
			}
		}
		//检查是否没有成功赋值过，是则返回上一页
		//！！修正，如果没有成功赋值过则显示全部结果。
		if(isset($_POST['submit'])&&$condition){
			//echo "<script language=javascript>alert('请输入查询内容');
			//history.back();
			//</script>";
			//exit;
			$sql='select* from 总表;';
		}
		else{$sql=$sql.";";}
		//echo $sql;
	}
	//查询脚本到此为止
	//下面是关于数据插入的脚本
	if(isset($_POST['insert'])){
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
		$insertConfirm=true;
	}
	//询问用户是否插入这个数据
	 if($insertConfirm){
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
		<p>确认插入下列数据吗？</p>
			<form method="post"  action="result.php">
			<input type="hidden" value="<?php echo $sql?> " name="sql">
			<input type="submit" value="确定" />
			<input type="button" value="后退" onclick="history.back();"/>
			</form>
		</div>
			
		<?php
	 }
	 //本页面提交的插入命令
	if(isset($_POST['sql'])){
		$sql=$_POST['sql'];
		$insert=true;
		$query=false;
	}
	//插入脚本到此为止
	//连接数据库
	if($query||$insert){
	//echo '查询数据库';
	$dbc = mysqli_connect($DB_ADDR,
	$DB_USER,
	$DB_PSW,
	$dbs)
	or die('Error connecting to MySQL server');
	$res = mysqli_query($dbc,$sql);
	//显示查询结果
	if($query&&@mysqli_num_rows($res)) {
	//绘制表头
	echo '<table id="resTable"><tr>';
	foreach($acol as $column){
	echo "<th>$column</th>";
	}
	echo "<th>操作</th>";
	echo "</tr>";
	//开始显示数据
	$odd=true;
		while($rows=mysqli_fetch_array($res,MYSQL_ASSOC)){
			if($odd==true){
				echo '<tr>';
				$odd=false;
			}
			else{
				echo '<tr class="alt">';
				$odd=true;
			}
			foreach($rows as $value){
				echo "<td>".$value."</td>";
			}
			echo '<td><a href="modify.php?id='.$rows['编号'].'">修改<a>';
		echo '</tr></br>';
		}
	echo '</table>';
	echo '<input type="button" value="返回" onclick="history.back()"/>';
	}
	//查询结果为空
	if($query&&!@mysqli_num_rows($res)){
		//mysqli_close($dbc); 
		echo "<script> alert('查询无结果'); history.back();</script> ";
		exit;}
	//显示插入结果
	if($res&&$insert){
		echo "<script language=javascript>alert('插入成功');
		</script>";
		header("refresh:0;url=query.php");//跳转页面，注意路径
		exit;
	}
	if(!$res&&$insert) {
		echo "<script language=javascript>alert('插入失败');
		history.back();
		</script>";
		exit;
	}
	 mysqli_close($dbc);
	 }
	 ?>