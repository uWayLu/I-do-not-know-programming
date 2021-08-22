<?
$link = mysql_connect("localhost","root","root");
//連線
mysql_query("use ntue");
//選擇資料庫
$result = mysql_query("select * from math",$link);
//下 SQL 指令
/* 以 HTML Table 方式解析傳回資料 */
echo "<table border=1>\n";
echo "<tr>\n";
/* 印出表頭 */
while ($field = mysql_fetch_field($result)) {
	echo "<td>".$field->name."</td>\n";
}
echo "</tr>\n";
/* 印出表身 */
while ($row = mysql_fetch_row($result)) {
	echo "<tr>\n";
	
	for($i=0;$i<count($row);$i++){
		echo "<td>".$row[$i]."</td>";
	}
	echo "</tr>\n";
}
echo "</table>\n";
echo "<br>";
echo "<h1 align='center'><a href='login2.php'>返回首頁</a></h1>";
/* 釋放 result */
mysql_free_result($result);
/* 關閉連結 */
mysql_close($link);
?>
