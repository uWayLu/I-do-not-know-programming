<?php
header ('Content-Type: text/html; charset=utf-8');
/*	讀取word, 生成html文件
	source_url: http://wenku.baidu.com/view/3f60f704a76e58fafab003b7.html?from=share_qq
	需先enable php.ini中的com.allow_dcom	*/

function php_Word($wordname,$htmlname,$content) { 
// 獲取鏈接地址
	/*$url = $_SERVER['HTTP_HOST']; 
	$url = '';
	$url = $url.$_SERVER['PHP_SELF'] ;
	$url = dirname($url)."/";*/ 
	//$url = $_SERVER['DOCUMENT_ROOT']; 
	$url = 'D:/AppServ/www/WORK/20140516/test/2P32/';
	//echo 'url ='. $url;
	//建立一個指向新COM組件的索引
	$word = new COM ("word.application") or die("Unable to instanciate Word"); 
	//顯示目前正在使用的Word的版本號
	echo "Loading Word, v. {$word->Version}"; 
	//把它的可見性設置為0（假），如果要使它在最前端打開，使用1（真） 
	$word->Visible = 1; 
//----------------------------------讀取Word內容操作START------------------------------------------ 
	//打開一個word文檔
	$word->Documents->Open($url.$wordname); 
	//將filename.doc轉換為html格式，並保存為html文件
	$word->Documents[1]->SaveAs(dirname(__FILE__)."/".$htmlname,8); 
	//獲取htm文件內容並輸出到頁面(文本的樣式不會丟失) 
	$content = file_get_contents ($url.$htmlname);
	echo $content; 
	//獲取word文檔內容並輸出到頁面（文本的原樣式已丟失） 
	$content= $word->ActiveDocument->content->Text;
	echo $content;
	//關閉與COM組件之間的連接
	$word->Documents->close(true); 
	$word->Quit(); 
	$word = null; 
	unset($word); 
//----------------------------------新建立Word文檔操作START---------------------------------------- 
	//建立一個空的word文檔
	/*
	$word->Documents->Add(); 
	//寫入內容到新建word 
	$word->Selection->TypeText("$content"); 
	//保存新建的word文檔
	$word->Documents[1]->SaveAs(dirname(__FILE__)."/".$wordname); 
	//關閉與COM組件之間的連接
	$word->Quit();*/ 
	}
	
	php_Word("95initialtest.doc","95initialtest.html","text for test");
	echo "文件路徑為".$url.$wordname;
	echo "</pre>";
?>