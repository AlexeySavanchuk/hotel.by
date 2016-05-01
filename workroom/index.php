<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<meta charset="utf-8"/>	
	<title>Рабочая комната</title>
	<script type="text/javascript" src="/js/jquery-1.12.2.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
</head>
<body>
<div class="page-wrapper">
<?php include '../header.html' ?>;

<div class="container" style="margin-top:20px;">
	<div class="span12" align="right">
<button class="btn btn-large" onclick="document.location.href='../autorization/out.php'">Выход</button>
</div>
<?php 
session_start();
if($_SESSION['rules']=='administrator' ||$_SESSION['rules']=='redactor' || $_SESSION['rules']=='reception' )
{//если сессия администратора, то разрешить вход
if($_SESSION['rules']=='administrator' || $_SESSION['rules']=='reception')
echo '
<div class="row" >
	<a href="./booking/">
	<div class="span4" align="right">
		<img src="../img/icons/registration.png" id="kudah">
	</div>
	<div class="span8" style="padding-top:45px">
	<span class="testingis">Бронирование</span>
	</div>
	</a>
</div>;
<hr style="border-color: #ABACAA" >';
if($_SESSION['rules']=='administrator'|| $_SESSION['rules']=='redactor')
echo '
<div class="row" >
	<a href="./feedback/">
	<div class="span4" align="right">
		<img src="../img/icons/mail.png" id="kudah">
	</div>
	<div class="span8" style="padding-top:45px">
	<span class="testingis">Почта</span>
	</div>
	</a>
</div>
<hr style="border-color: #ABACAA" >';
if($_SESSION['rules']=='administrator' )
echo '
<div class="row" >
	<a href="./Users/">
	<div class="span4" align="right">
		<img src="../img/icons/users.png" id="kudah">
	</div>
	<div class="span8" style="padding-top:45px">
	<span class="testingis">Пользователи</span>
	</div>
	</a>
</div>
<hr style="border-color: #ABACAA" >';
if($_SESSION['rules']=='administrator'||$_SESSION['rules']=='redactor' )
echo '
<div class="row" >
	<a href="./News/">
	<div class="span4" align="right">
		<img src="../img/icons/news.png" id="kudah">
	</div>
	<div class="span8" style="padding-top:45px;">
	<span class="testingis">Новости</span>
	</div>
	</a>
</div>
<hr style="border-color: #ABACAA" >';
}
else
{
	echo"<script> document.location.href='../autorization/out.php'</script>";
}
?>
</div>
<div class="page-buffer"></div>
</div>
<div class="page-footer">
<?php include '../footer.html' ?>;
</div>
</div>
</body>
</html>