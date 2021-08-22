<?php
	include '../LIB_mysql.php';

	$table = 'punch_sleep';
	$database = 'localhost_uway_practice';
	date_default_timezone_set('Asia/Taipei');
	
	//echo(date("h:i D F d Y",$t));
	
	switch($_POST['action']){
	
		case 'Go to bed.':
			$data[sleep_time] = time();
			$data[sleep_note] = $_POST[sleep_note];
			$sql = "select * from $table order by sleep_time desc limit 1;";
			$RESULT = exe_sql($database, $sql);
			//print $RESULT[sleep_time]; /* DEBUG LINE */
			
			//if ($RESULT[sleep_time] == NULL){
				insert($database, $table, $data);
				header('Location: ./main.php');
			//}
		break;
		
		case 'Wake up!':
			$data[wake_time] = time();
			$data[wake_note] = $_POST[wake_note];
			$sql = "select * from $table order by sleep_time desc limit 1;";
			$RESULT = exe_sql($database, $sql);
			print_r( $RESULT); /* DEBUG LINE */
			
			if ($RESULT[wake_time] == NULL){
				update($database, $table, $data, 'sleep_time', $RESULT[sleep_time]);
				header('Location: ./main.php');
			}
		break;
		
	}
?>