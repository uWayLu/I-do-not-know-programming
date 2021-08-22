<!DOCTYPE HTML>
<html>
	<head>
		<title>Punch Card</title>
		<link rel="stylesheet" href="punchcard.css"> 
	</head>	
	<body>
	<div class="menu">
	Sleep - 
	Eat - 
	Other - 
	</div>
	<div class="main">
	Function Area <br>
		<form action="./action_sleep.php" method="POST">
			<input type="submit" value="Go to bed." name="action" />
			<input type="submit" value="Wake up!" name="action" />
		</form>
	</div>
	<div class="display">
	Display Area <br>
	<a href="#" onclick="javascript:window.location.reload()">重新整理</a>
	<?php include 'display_sleep.php' ?>
		<div id="display_sleep">
			<ul>
				<li><div>Sleep Time</div></li>
				<li><div>Sleep Note</div></li>
				<li><div>Wake Time</div></li>
				<li><div>Wake Note</div></li><br>
			</ul>
		</div>
	</div>
	</body>	
</html>