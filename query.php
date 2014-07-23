
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="logstyle.css"/>
</head>
<body>
<?php
	$acol=array("编号","题名","主题","参与人员","拍摄地点","覆盖时间","服装","版本","画面内容","出版单位","格式","语种","声道","字幕","色彩","标","时长","日期","责任方式","储存位置");
	$result="result.php";
	$insert="queryres.php";
	//下面开始是查询脚本
	if(isset($_POST['submit'])){		
		$output_form = true;
		$condition=true;
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
	}
	//这一句为了能够正常显示表单
	else{
		$output_form = true;
	}	
	//
	if(isset($_POST['submit'])&&empty($_POST['sql'])){
		echo "<script> alert('请输入查询内容');</script>";
	}
	//
	if(!empty($_POST['sql'])){
		//echo $_POST['sql'];
		//header("refresh:0;url=result.php");//跳转页面，注意路径
		?>
		<form method="post" action="<?php echo htmlspecialchars($result);?>">
		<input type="hidden" name="sql" value="<?php echo htmlspecialchars($_POST['sql']);?>"/>
		<?php
	}
	//查询脚本到此为止
	//
	//
	//
	//下面是关于数据插入的脚本
	if(isset($_POST['insert'])){
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
			$sql=$sql.",'$_POST[$col]";
			}
		}
		$sql=$sql.")";
			?>
		<form method="post" action="<?php echo htmlspecialchars($insert);?>">
		<input type="hidden" name="sql" value="<?php echo htmlspecialchars($sql);?>"/>
		<?php
	}
	
	
	if($output_form){
	?>
<div id="query">
<h3>输入查询内容</h3>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<label for="编号">编号：</label>
<input type="text" id="编号" name="col0" /></br>
<label for="题名">题名：</label>
<input type="text" id="题名" name="col1"/></br>
<label for="主题">主题：</label>
<input type="text" id="主题" name="col2"/></br>
<label for="参与人员">参与人员：</label>
<input type="text" id="参与人员" name="col3"/></br>
<label for="拍摄地点">拍摄地点：</label>
<input type="text" id="拍摄地点" name="col4"/></br>
<label for="覆盖时间">覆盖时间：</label>
<input type="text" id="题名" name="col5"/></br>
<label for="题名">服装：</label>
<input type="text" id="题名" name="col6"/></br>
<label for="题名">版本：</label>
<input type="text" id="题名" name="col7"/></br>
<label for="题名">画面内容：</label>
<input type="text" id="题名" name="col8"/></br>
<label for="题名">出版单位：</label>
<input type="text" id="题名" name="col9"/></br>
<label for="题名">格式：</label>
<input type="text" id="题名" name="col10"/></br>
<label for="题名">语种：</label>
<input type="text" id="题名" name="col11"/></br>
<label for="题名">声道：</label>
<input type="text" id="题名" name="col12"/></br>
<label for="题名">字幕：</label>
<input type="text" id="题名" name="col13"/></br>
<label for="题名">色彩：</label>
<input type="text" id="题名" name="col14"/></br>
<label for="题名">台标：</label>
<input type="text" id="题名" name="col15"/></br>
<label for="题名">时长：</label>
<input type="text" id="题名" name="col16"/></br>
<label for="题名">日期：</label>
<input type="text" id="题名" name="col17"/></br>
<label for="题名">责任方式：</label>
<input type="text" id="题名" name="col18"/></br>
<label for="题名">储存位置：</label>
<input type="text" id="题名" name="col19"/></br>
<input type="submit" value="确定" name="submit"/>
<input type="submit" value="插入新数据" name="insert"/>
</form>

</div>

<?php
	}
	?>

</body>
</html>
