<?
$link = mysql_connect("localhost","root","root");
//連線
mysql_query("use ntue");
//選擇資料庫
//檢核資料
if($_POST['id']=='' or $_POST['passwd']=='')
{
  echo "<center>欄位不可空白</center>";
  echo "<a href=add.php>請重新註冊</a>";
}
else
{
$sqlstr="insert into math values('', '".$_POST['id']."', '".$_POST['passwd']."')";
//組合 sql
$result=mysql_query($sqlstr,$link);
//執行 sql
  echo "<center>新增成功</center>";
  echo "<a href=login2.php>返回首頁測試</a>";
}
//mysql_free_result($result);
mysql_close($link);
?>
