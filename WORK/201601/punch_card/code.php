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
 
<!-- �m�{���y���оǻx�n���d�ҵ{��
    http://pydoing.blogspot.com/
    �ɦW�Gencryptor01.php
    �\��G�ܽd PHP �{�� 
    �@�̡G�i�ͼy
    �ɶ��G�褸 2012 �~ 11 �� -->
