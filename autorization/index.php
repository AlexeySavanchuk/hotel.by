<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<meta charset="utf-8"/>	
	<title>Авторизация</title>
	<script type="text/javascript" src="/js/jquery-1.12.2.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/main.js"></script>
</head>
<body>
<div class="page-wrapper">
<?php
     include '../header.html';
     session_start();	
	include '../functions.php';
	include '../database.php';
	if (isset($_SESSION['rules'])||!empty($_SESSION['rules']) )
 	{ //если сессия не начата
		StartSession($_SESSION['rules']);
 	}
 	else
 	{
	   if (isset($_POST['login']) && isset($_POST['password']))
	   {//если существуют
		 	if (!(empty($_POST['login']) || empty($_POST['password'])))
		 	{ //если не пустые
		 		if(ValidityUserPassword($_POST['login'], md5($_POST['password']) ))
					{//если существует такой пользователь с таким паролем
						$_SESSION['rules']=GetTypeUser($_POST['login'],md5($_POST['password']));
						if($_SESSION['rules']=='user')
							$_SESSION['login']=$_POST['login'];
						StartSession($_SESSION['rules']);
					}
					else 
					 {
						 echo "<script> WriteAlert('Неверный логин или пароль')</script>";
					 }
			}
			 else
			 {
			 	echo "<script> WriteAlert('Не все поля заполнены.')</script>";
			 }
  		}
 	}
?>

<div class="container" id="LogInContainer">
<div id="MessageRow"  align="center" class="row"><div class="span4"></div></div>
	<div align="center" class="row">
		<div class="span12">
			<form   method="POST">
				<div class="input-append">
				<input name="login" class="span3" size 16 type="text" placeholder="Логин"><span class="add-on"><i class="icon-user"></i></span>
				</div>
				<br>
				<div class="input-append">
				<input name="password" class="span3" size 16 type="password" placeholder="Пароль"><span class="add-on"><i class="icon-tags"></i></span>
				</div>
				<br>
				<input  type="submit" class="btn btn-large btn-success" value="Вход">
			</form>
			<br>
			<div>
			<h4>
			 У вас ещё нет аккаунта? <a class="YellowLink" href="../registration/">Зарегистрироваться</a>	
			 </h4>
			</div>
			
		</div>	
	</div>
</div>

<div class="page-buffer"></div>
</div>
<div class="page-footer">
<?php include '../footer.html' ?>;
</div>
</div>
</body>
</html>