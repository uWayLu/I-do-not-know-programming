<?php
$uploads_dir = 'data';//存放上傳檔案資料夾
unset($test);
foreach ($_FILES["ff"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["ff"]["tmp_name"][$key];
        // $name = $_FILES["ff"]["name"][$key];
        $name = iconv( "UTF-8" , "big5" , $_FILES["ff"]["name"][$key]); //中文檔名

       	/* 由id決定路徑；智慧生成路徑；判斷路徑下的檔案檔名；重複檔名自動編號；*/

        move_uploaded_file($tmp_name, "$uploads_dir/$name");

        /* xml格式回傳訊息 */
        /* 其實可以回傳每張圖片url, 然後用innerHTML的方式顯示出來 */
        $test .= $name.'<br />';
    }
}

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<xmllist>\n";
echo "<student>\n";
echo "<id>$test</id>\n";
echo "</student>\n</xmllist>";

?>