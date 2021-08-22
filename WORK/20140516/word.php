<?php
header ('Content-Type: text/html; charset=utf-8');
	$word = new COM ("word.application") or die("Unable to instanciate Word");
	echo "Loading Word, v. {$word->Version}"; 
	$word->Visible = 1; 
	# $word->Documents->Open('D:/MyServ/www/WORK/20140516/test/2P32/95initialtest.doc'); 
	$word->Documents->Open('D:\MyServ\www\WORK\20140516\test\2P32\123.doc'); 
	//將filename.doc轉換為html格式，並保存為html文件
	$word->Documents[1]->SaveAs('D:\MyServ\www\WORK\20140516\test\2P32\123.html',8); 
	//獲取htm文件內容並輸出到頁面(文本的樣式不會丟失) 
	$content = file_get_contents ('D:\MyServ\www\WORK\20140516\test\2P32\123.html');
	echo $content; 
	//獲取word文檔內容並輸出到頁面（文本的原樣式已丟失） 
	$content= $word->ActiveDocument->content->Text;
	echo $content;
	//關閉與COM組件之間的連接
	$word->Documents->close(true); 
	$word->Quit(); 
	$word = null; 
	unset($word); 
?>