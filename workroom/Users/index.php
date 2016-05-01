<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<meta charset="utf-8"/>	
	<title>Пользователи</title>
	<script type="text/javascript" src="/js/jquery-1.12.2.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/main.js"></script>
	<script type="text/javascript">
	    $(document).ready(function(){
  $(".dropdown-toggle-js").dropdown();
});  
</script>
</head>
<body>
<div class="page-wrapper">
<?php include '../../header.html' ?>
<?php include '../../functions.php' ?>
<?php 
session_start();
//если права не позволяют войти, перенаправить на авторизацию
if(!($_SESSION['rules']=='administrator'))
	{ 
		echo "<script type='text/javascript'> document.location.href='../../autorization/out.php' </script>";
	}
?>

<div class="container" style="margin-top:20px; ">
	<div class="row" align="center" style="margin-top:10px">
			<form method="POST">
			<div class="input-prepend">
				<span class="add-on"><i class="icon-search"></i></span>
				<input type="text" name="search_log" placeholder="Поиск по логину">
				</div>
				<input type="submit" class="btn" style="margin-bottom: 10px;" value="Поиск">
				</form>
	</div>
	<div class="row">
		<div class="span12" align="center">
			<?php 
					include 'tableUsers.php'; 
					PrintTableUsers($_POST['search_log']);
			?>;
		</div>
	</div>
</div>


<div class="page-buffer"></div>
</div>
<div class="page-footer">
<?php include '../../footer.html' ?>;
</div>
</div>
</body>
</html>