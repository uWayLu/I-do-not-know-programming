<?
$link = mysql_connect("localhost","root","root");
//�s�u
mysql_query("use ntue");
//��ܸ�Ʈw
//�ˮָ��
if($_POST['id']=='' or $_POST['passwd']=='')
{
  echo "<center>��줣�i�ť�</center>";
  echo "<a href=add.php>�Э��s���U</a>";
}
else
{
$sqlstr="insert into math values('', '".$_POST['id']."', '".$_POST['passwd']."')";
//�զX sql
$result=mysql_query($sqlstr,$link);
//���� sql
  echo "<center>�s�W���\</center>";
  echo "<a href=login2.php>��^��������</a>";
}
//mysql_free_result($result);
mysql_close($link);
?>
