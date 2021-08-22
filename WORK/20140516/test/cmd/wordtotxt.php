<?php
# build 20140523
header ('Content-Type: text/html; charset=utf-8');
/*	convert word to txt
	source_url: http://snipplr.com/view/8364/
	--enable php.ini: com.allow_dcom	*/
$wordname = $_SERVER['argv'][1];
$txtname = $_SERVER['argv'][2];
$content = '';

function php_wordtotxt($wordname, $txtname, $content) { 
$path = 'D:/AppServ/www/WORK/20140516/test/2L75/'; // set the path

$word = new COM("word.application") or die("Unable to instantiate Word object");
echo "Loading Word, v. {$word->Version}"; 
$word->Visible = 1; 

$word->Documents->Open($path.$wordname);
// the '2' parameter specifies saving in txt format
$word->Documents[1]->SaveAs($path.$txtname,2); 

$word->Documents[1]->Close(false);
$word->Quit();
$word->Release();
$word = NULL;
unset($word);
 
$content = file_get_contents($path.$txtname);
echo $content;
}

php_wordtotxt($wordname, $txtname, $content);
?>