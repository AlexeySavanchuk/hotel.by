<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<meta charset="utf-8"/>	
	<title>Бронирование</title>
	<script type="text/javascript" src="/js/jquery-1.12.2.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/main.js"></script>
</head>
<body>
<div class="page-wrapper">
<?php
     include '../../header.html';
	include '../../functions.php';
	include '../../database.php';
?>
<div class="container"  >
	<div class="row" align="center">
		<a href="./"><button class="btn btn-large span12" >Обновить</button></a>
	</div>
	<div class="row" align="center">
		<div class="span12" align="center">
		<?php include "./bookingTable.php";?> 
		</div>
	</div>
</div>
<div class="page-buffer"></div>
<div class="page-footer">
<?php include '../../footer.html' ?>;
</div>
</div>
</body>
</html>