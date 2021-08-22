<?php
header ('Content-Type: text/html; charset=utf-8');

$librariespath = 'php_libraries/';
include $librariespath.'Schrenk/LIB_parse.php';
include $librariespath.'Schrenk/LIB_mysql.php';

//create variable names
$uploaddir = 'uploads/';
$uploadfile = $uploaddir.basename($_FILES['file']['name']);

//print_r($_FILES);
echo "<pre>";
if (move_uploaded_file($_FILES['file']['tmp_name'], iconv("utf-8", "big5", $uploadfile)))
	{
    echo "Upload OK \n";
	$content = file_get_contents($uploadfile);
	// 在DB中新增table
	$tablename = split_string($_FILES['file']['name'], '.', BEFORE, EXCL); // 先依照檔名建立table; *中文會出錯; 目前設定欄位而已
	$sql = "CREATE TABLE $tablename
			(
			CapSeq int,
			CataCode char(12),
			SubjCode char(1),
			PageNo char(2),
			ChapNo char(2),
			CapType char(1),
			CapSrc1 char(50),
			CapSrc2 char(50),
			CapCode char(12),
			Diffcult char(1),
			CapGrp char(12),
			GrpSubj text,
			CapSubj text,
			Answer char(1),
			AnsA text,
			AnsB text,
			AnsC text,
			AnsD text,
			AnsE text,
			AnsF text,
			Analysis text,
			DocType char(1),
			CellType char(1),
			Export char(1),
			ExportDate int,
			AddDate int,
			AddUser char(12),
			ModDate int,
			ModUser char(12),
			DocName char(100)
			)DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";
	exe_sql(DATABASE, $sql);
	exe_sql(DATABASE, "ALTER TABLE  $tablename ADD INDEX (  `CapSeq` )");	
	
	
	/*follow rules of context arranged and php
	rules: ()題號.'Question'(A)'choiceA'(B)'choiceB'(C)'choiceC'(D)'choiceD'*/
	$str_reason = '▲▲【解析】';
	
	for ($i=1; $i<=49; $i++)
		{
		$data_array['Analysis'] = '';
		$fraction = return_between($content,  $i.'.', $i+1 .'.', INCL);
		$data_array['CapSubj'] = return_between($fraction, $i.'.', '(A)', EXCL);
		$data_array['AnsA'] = return_between($fraction, '(A)', '(B)', EXCL);
		$data_array['AnsB'] = return_between($fraction, '(B)', '(C)', EXCL);
		$data_array['AnsC'] = return_between($fraction, '(C)', '(D)', EXCL);
		
		if (false !== strpos($fraction, $str_reason))
			{
			$data_array['AnsD'] = return_between($fraction, '(D)', '▲▲【解析】', EXCL);
			$data_array['Analysis'] = return_between($fraction, '▲▲【解析】', '(', EXCL);
			}
		else $data_array['AnsD'] = return_between($fraction, '(D)', '(', EXCL);
		insert(DATABASE, $tablename, $data_array); //插入資料庫
		
		}
	// 最後一題	
		$data_array['Analysis'] = '';
		$fraction = split_string($content, $i.'.', AFTER, INCL);
		$data_array['CapSubj'] = return_between($fraction, $i.'.', '(A)', EXCL);
		$data_array['AnsA'] = return_between($fraction, '(A)', '(B)', EXCL);
		$data_array['AnsB'] = return_between($fraction, '(B)', '(C)', EXCL);
		$data_array['AnsC'] = return_between($fraction, '(C)', '(D)', EXCL);
		
		if (false !== strpos($fraction, $str_reason))
			{
			$data_array['AnsD'] = return_between($fraction, '(D)', '▲▲【解析】', EXCL);
			$data_array['Analysis'] = split_string($fraction, '▲▲【解析】', AFTER, EXCL);
			}
		else $data_array['AnsD'] = split_string($fraction, '(D)', AFTER, EXCL);
		echo $i.'.';
		insert(DATABASE, $tablename, $data_array); //插入資料庫
		//從資料庫讀取出插入的資料
		$result = exe_sql(DATABASE,"SELECT * FROM $tablename");
		print_r($result);
				
	echo "--------------------------------------------------------------- \n";
	// 處理後刪除檔案
	unlink($uploadfile);
	}
else 
	{
    echo "Upload failed \n";
	}
print_r($_FILES);
echo "</pre>";
?>