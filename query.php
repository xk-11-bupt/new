
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="logstyle.css"/>
</head>
<body>

<?php
	//本页面脚本内容大部分将在result中实现，最后调试阶段可改写为html文件。
	$acol=array("编号","题名","主题","参与人员","拍摄地点","覆盖时间","服装","版本","画面内容","出版单位","格式","语种","声道","字幕","色彩","标","时长","日期","责任方式","储存位置");
	//print $acol;
	$result="result.php";
	$output_form = true;	
	if($output_form){
	?>
<div id="query">
<h3>输入查询内容</h3>
<form method="post" action="<?php echo htmlspecialchars($result);?>">
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
