<?
$link = mysql_connect("localhost","root","root");
//連線
mysql_query("use ntue");
//選擇資料庫
$sqlstr="select * from math where id='".$_POST['user_id']."' and passwd='".$_POST['user_passwd']."'";
$result = mysql_query($sqlstr,$link);
if (mysql_num_rows($result)==1)
{
  header('location:read-table.php');
}
else
{
  echo "<h1 align='center'>登入失敗</h1><br>";
  echo "<center><a href='login2.php'>請重新登入</a></center>";	
}
mysql_free_result($result);
mysql_close($link);
?>