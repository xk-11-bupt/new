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
	//拼接sql语句
	$sql="select * from 总表 where 编号 = ".$_GET['id'].';';
	//连接数据库
	$dbc = mysqli_connect($DB_ADDR,
	$DB_USER,
	$DB_PSW,
	$dbs)
	or die('Error connecting to MySQL server');
	$res = mysqli_query($dbc,$sql);
    $row = mysqli_fetch_array($res);
	$result="update.php";
	$output_form = true;	
	if($output_form){
	?>
<div id="query">
<h3 >输入修改结果</h3>
<form method="post" action="<?php echo  $result; ?>">
<input type="hidden" value="<?php echo $_GET['id']; ?> " name="id">
<label for="题名">题名：</label>
<input type="text" name="col1"  value="<?php echo $row['题名'];?>" /></br>
<label for="主题">主题：</label>
<textarea rows="3"   maxlength="60" name="col2" overflow="hidden"><?php echo $row['主题'];?></textarea></br>
<label for="参与人员">参与人员：</label>
<input type="text"  name="col3"  value="<?php echo $row['参与人员'];?>"/></br>
<label for="拍摄地点">拍摄地点：</label>
<input type="text"  name="col4"  value="<?php echo $row['拍摄地点'];?>"/></br>
<label for="覆盖时间">覆盖时间：</label>
<input type="text" name="col5"  value="<?php echo $row['覆盖时间'];?>"/></br>
<label for="题名">服装：</label>
<input type="text" name="col6"  value="<?php echo $row['服装'];?>"/></br>
<label for="题名">版本：</label>
<input type="text" name="col7"  value="<?php echo $row['版本'];?>"/></br>
<label for="题名">画面内容：</label>
<input type="text" name="col8" value="<?php echo $row['画面内容'];?>"/></br>
<label for="题名">出版单位：</label>
<input type="text" name="col9" value="<?php echo $row['出版单位'];?>"/></br>
<label for="题名">格式：</label>
<select name="col10" >
<option  value="<?php echo $row['格式'];?>" selected="selected"><?php echo $row['格式'];?></option>
<option  value="mov">mov</option>
<option  value="mp4">mp4</option>
<option  value="DVCpro">DVCpro</option>
<option  value="H.264">H.264</option>
<option  value="ProRes422HQ">ProRes422HQ</option>
<option  value="MTS">MTS</option>
<option  value="AVI">AVI</option>
<option  value="mpeg">mpeg</option>
<option  value="mpeg2">mpeg2</option>
<option  value="M_jpeg">M_jpeg</option>
<option  value="DV">DV</option>
</select></br>
<label for="题名">语种：</label>
<input type="text" name="col11" value="<?php echo $row['语种'];?>"/></br>
<label for="题名">声道：</label>
<input type="text" name="col12" value="<?php echo $row['声道'];?>"/></br>
<label for="题名">字幕：</label>
<input type="text" name="col13" value="<?php echo $row['字幕'];?>"/></br>
<label for="题名">色彩：</label>
<input type="text" name="col14" value="<?php echo $row['色彩'];?>"/></br>
<label for="题名">台标：</label>
<input type="text" name="col15" value="<?php echo $row['标'];?>"/></br>
<label for="题名">时长：</label>
<input type="text" name="col16" value="<?php echo $row['时长'];?>"/></br>
<label for="题名">日期：</label>
<input type="text" name="col17" value="<?php echo $row['日期'];?>"/></br>
<label for="题名">责任方式：</label>
<input type="text" name="col18" value="<?php echo $row['责任方式'];?>"/></br>
<label for="题名">储存位置：</label>
<input type="text" name="col19" value="<?php echo $row['储存位置'];?>"/></br>
<input class="noresize" type="submit"  value="修改" name="update"/>
<input class="noresize" type="button"  value="返回" onclick="history.back()"/>
</form>

</div>

<?php
	}
	?>

</body>
</html>
