<?
$link = mysql_connect("localhost","root","root");
//�s�u
mysql_query("use ntue");
//��ܸ�Ʈw
$result = mysql_query("select * from math",$link);
//�U SQL ���O
/* �H HTML Table �覡�ѪR�Ǧ^��� */
echo "<table border=1>\n";
echo "<tr>\n";
/* �L�X���Y */
while ($field = mysql_fetch_field($result)) {
	echo "<td>".$field->name."</td>\n";
}
echo "</tr>\n";
/* �L�X�� */
while ($row = mysql_fetch_row($result)) {
	echo "<tr>\n";
	
	for($i=0;$i<count($row);$i++){
		echo "<td>".$row[$i]."</td>";
	}
	echo "</tr>\n";
}
echo "</table>\n";
echo "<br>";
echo "<h1 align='center'><a href='login2.php'>��^����</a></h1>";
/* ���� result */
mysql_free_result($result);
/* �����s�� */
mysql_close($link);
?>
