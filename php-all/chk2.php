<?
$link = mysql_connect("localhost","root","root");
//�s�u
mysql_query("use ntue");
//��ܸ�Ʈw
$sqlstr="select * from math where id='".$_POST['user_id']."' and passwd='".$_POST['user_passwd']."'";
$result = mysql_query($sqlstr,$link);
if (mysql_num_rows($result)==1)
{
  header('location:read-table.php');
}
else
{
  echo "<h1 align='center'>�n�J����</h1><br>";
  echo "<center><a href='login2.php'>�Э��s�n�J</a></center>";	
}
mysql_free_result($result);
mysql_close($link);
?>