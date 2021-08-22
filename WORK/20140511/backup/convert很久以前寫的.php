<?php
//create variable names
$txtpath = $_POST['txtpath'];
$txt = fopen($txtpath, 'r');
#$xlspath = $_POST['xlspath'];
#$xls = fopen($xlspath, 'ab');

/*follow rules of context arranged and php
 rules: ()題號.'Question'(A)'choiceA'(B)'choiceB'(C)'choiceC'(D)'choiceD'*/
#remove all space

#$temp = str_replace('&nbsp;', '', $txt);
for ($i=1; $i<=50; $i++)
	{
	$fraction = return_between($txt, ' "$i".', ' "$i+1".');
	$fraction = str_replace('&nbsp;', '', $fraction);
	$question = return_between($fraction, ' "$i".', '(A)', EXCL);
	$choiceA = return_between($fraction, '(A)', '(B)', EXCL);
	$choiceB = return_between($fraction, '(B)', '(C)', EXCL);
	$choiceC = return_between($fraction, '(C)', '(D)', EXCL);
	$choiceD = return_between($fraction, '(D)', '()', EXCL);
	echo "$fraction\n"."$question\n"."$choiceA\n"."$choiceB\n"."$choiceC\n"."$choiceD\n";
	}
?>
