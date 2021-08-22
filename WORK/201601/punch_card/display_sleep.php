<!DOCTYPE HTML>
<html><body><p>
<?php
	//include '../LIB_mysql.php';

	$table = 'punch_sleep';
	$database = 'localhost_uway_practice';
	date_default_timezone_set('Asia/Taipei');
	
	//echo(date("h:i D F d Y",$t));
	$sql = "SELECT * FROM $table";
	//$RESULT = exe_sql($database, $sql);
	
	$link=mysqli_connect('localhost', 'root', 'unreal9527') or die('無法開啟Mysql資料庫連結'); //建立mysql資料庫連結
	mysqli_select_db($link, $database); //選擇資料庫abc
	$sql = "SELECT * FROM $table"; //在test資料表中選擇所有欄位
	mysqli_query($link, 'SET CHARACTER SET utf8');	// 送出Big5編碼的MySQL指令
	mysqli_query($link,  "SET collation_connection = 'utf8_general_ci'");
	$result = mysqli_query($link,$sql); // 執行SQL查詢
	//$row = mysqli_fetch_assoc($result); //將陣列以欄位名索引
	//$row = mysqli_fetch_row($result); //將陣列以數字排列索引
	$total_fields=mysqli_num_fields($result); // 取得欄位數
	$total_records=mysqli_num_rows($result);  // 取得記錄數
	
	//print_r($result);
?>
</p>
<table border="2"><tr><td>Sleep Time</td><td>Sleep Note</td><td>Wake Time</td><td>Wake Note</td></tr>

<?php for ($i=0;$i<$total_records;$i++) {$row = mysqli_fetch_assoc($result); //將陣列以欄位名索引   ?>

<tr>

<td><?php echo date("h:i D F d Y",$row[sleep_time]);   ?></td>        <!–印出id欄位的值–>

<td><?php echo $row[sleep_note];   ?></td> <!–印出name欄位的值–>

<td><?php echo date("h:i D F d Y",$row[wake_time]); ?></td>       <!–印出age欄位的值–>

<td><?php echo $row[wake_note]; ?></td>       <!–印出age欄位的值–>
</tr>

<?php    }   ?>

</table>

</body>
</html>
<!- [PHP]讀取mysql資料顯示於網頁上 https://muta1021.wordpress.com/2011/03/12/php%E8%AE%80%E5%8F%96mysql%E8%B3%87%E6%96%99%E9%A1%AF%E7%A4%BA%E6%96%BC%E7%B6%B2%E9%A0%81%E4%B8%8A/ ->