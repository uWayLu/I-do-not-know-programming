<?php
header ('Content-Type: text/html; charset=utf-8');
	$word = new COM ("word.application") or die("Unable to instanciate Word");
	echo "Loading Word, v. {$word->Version}"; 
	$word->Visible = 1; 
	# $word->Documents->Open('D:/MyServ/www/WORK/20140516/test/2P32/95initialtest.doc'); 
	$word->Documents->Open('D:\MyServ\www\WORK\20140516\test\2P32\123.doc'); 
	//�Nfilename.doc�ഫ��html�榡�A�ëO�s��html���
	$word->Documents[1]->SaveAs('D:\MyServ\www\WORK\20140516\test\2P32\123.html',8); 
	//���htm��󤺮e�ÿ�X�쭶��(�奻���˦����|�ᥢ) 
	$content = file_get_contents ('D:\MyServ\www\WORK\20140516\test\2P32\123.html');
	echo $content; 
	//���word���ɤ��e�ÿ�X�쭶���]�奻����˦��w�ᥢ�^ 
	$content= $word->ActiveDocument->content->Text;
	echo $content;
	//�����PCOM�ե󤧶����s��
	$word->Documents->close(true); 
	$word->Quit(); 
	$word = null; 
	unset($word); 
?>