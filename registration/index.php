<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<meta charset="utf-8"/>	
	<title>Регистрация</title>
	<script type="text/javascript" src="/js/jquery-1.12.2.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/tooltip.js"></script>
	<script type="text/javascript" src="/js/main.js"></script>
</head>
<body>
<div class="page-wrapper">
<?php include '../header.html'; ?>
<?php include '../functions.php'; ?>
<?php include '../database.php';?>
<?php 
session_start();
if (isset($_SESSION['rules']))
 	StartSession($_SESSION['rules']);
 ?>
<div class="container" style="margin-top:20px; ">
<div class="row" align="center" style="margin-bottom:20px">
	<div class="span12" align="center">
		<span class="testingis">Регистрация</span>
	</div>
</div>

<div id="MessageRow"  align="center" class="row"><div class="span4"></div></div>
	<div class="row"  align="center">
		<div clas="span12">	
			<form method="POST">
				<?php
				//Имя
				WriteRow('first_name','Имя','icon-user');
				//Отчество
				WriteRow('middle_name','Отчество','icon-user');
				//Фамилия
				WriteRow('last_name','Фамилия','icon-user');
				//Пол
				WriteRow('sex','Пол','icon-user');
				//Дата рождения
				WriteRow('dateOfBirth','Дата рождения','icon-calendar');
				//Место жительства
				WriteRow('residence','Место жительства','icon-home');
				//Паспорт
				WriteRow('passport','Паспорт','icon-book');
				//Мобильный телефон
				WriteRow('mobile','Мобильный телефон','icon-hdd');
				//Электронная почта
				WriteRow('mail','Электронная почта','icon-envelope');
				//Логин
				WriteRow('login','Логин','icon-edit');
				//Пароль
				WriteRow('password','Пароль','icon-asterisk');
				//Пароль2
				WriteRow('password2','Пароль ещё раз','icon-asterisk');
				?>
				<input  type="submit" class="btn btn-large btn-success" value="Зарегистрироваться">
			</form>
		</div>
	</div>
</div>

<?php 
   if (isset($_POST['password']))
   {//если была отправка формы
 	if (!(empty($_POST['login']) || empty($_POST['password']) || empty($_POST['password2']) || empty($_POST['first_name']) || empty($_POST['middle_name']) || empty($_POST['last_name']) || empty($_POST['dateOfBirth']) || empty($_POST['sex']) || empty($_POST['residence']) || empty($_POST['passport']) || empty($_POST['mobile']) || empty($_POST['mail'])))
 		{ //если все поля введены
 			if (ValidationInputDataForRegistration($_POST))
 			{//введенные данные валидны
 				if (RegistrationUserInDB($_POST))
 					{
 						if (SendMailAfterRegistration($_POST)) 
 							echo "<script> WriteSuccess('Поздравляю регистрация прошла успешно')</script>";
 						else
 							echo "<script> WriteSuccess('Поздравляю регистрация прошла успешно, но не удалось отправить письмо')</script>";
 						echo "<script> GoOnPageAutorization() </script>";
 					}
 				else
 					echo "<script> WriteAlert('Не удалось добавить')</script>";
 			}
 			else
 			{
 				echo "<script> WriteAlert('Данные введены не правильно')</script>";
 				$isLimited.="p";
 				echo "<script> WriteSuccess('".$isLimited."')</script>";
 			}
	 	}
 		else
 		{
 			echo "<script> WriteAlert('Не все поля заполнены.')</script>";
 		}
  }
?>
<div class="page-buffer"></div>
</div>
<div class="page-footer">
<?php include '../footer.html' ?>;
</div>
</div>
</body>
</html>