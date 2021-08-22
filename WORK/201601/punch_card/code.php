<html>
<html>
<head>
<title>Encode Software</title>
<link rel="stylesheet" href="punchcard.css"> 
</head>
<body>
<div class="menu">
<a href="<?php echo $_SERVER['PHP_SELF']; ?>">Home</a> - 
<a href="<?php echo $_SERVER['PHP_SELF'].'?op=record'; ?>">Record</a> -
<a href="<?php echo $_SERVER['PHP_SELF'].'?op=about'; ?>"About</a>
</div>
<div class="main">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<input type="text" name="input" size="67"><br / >
<input type="submit" value="New" name="op">
<input type="submit" value="Load" name="op">
<input type="submit" value="Encode" name="op">
<input type="submit" value="Decode" name="op">
<input type="submit" value="Clean" name="op">
</form>
</div>
<div class="display">
<?php
include "encryptdemo5.php";
?>
</div>
</body>
</html>
 
<!-- 《程式語言教學誌》的範例程式
    http://pydoing.blogspot.com/
    檔名：encryptor01.php
    功能：示範 PHP 程式 
    作者：張凱慶
    時間：西元 2012 年 11 月 -->
