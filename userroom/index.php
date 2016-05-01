<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<meta charset="utf-8"/>	
	<title>Личный кобинет</title>
	<script type="text/javascript" src="/js/jquery-1.12.2.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/tooltip.js"></script>
	<script type="text/javascript" src="/js/main.js"></script>
</head>
<body>
<?php 
      session_start();
      if ($_SESSION['rules']!='user')
		{
			echo"<script> document.location.href='../autorization/'</script>";
		}
		 include '../header.html';
?>
<div class="container" style="margin-top:20px;">
	<div class="span12" align="right">
<button class="btn btn-large" onclick="document.location.href='../autorization/out.php'">Выход</button>
</div>
<div class="page-wrapper">
<?php 	
	  include '../functions.php';
	  include '../database.php';

echo '<div class="container" style="margin-top:60px; ">
		<div class="row" align=center>
		<form method="post" action="action.php">
		<input type="hidden" name="login" value="'.$_SESSION['login'].'">';
		$result =GetUsersInformationFromDB($_SESSION['login']);
		$PersonalInfo = mysql_fetch_row($result);
				//Имя
				WriteRow('first_name','Имя','icon-user', $PersonalInfo[0]);
				//Отчество
				WriteRow('middle_name','Отчество','icon-user', $PersonalInfo[2]);
				//Фамилия
				WriteRow('last_name','Фамилия','icon-user', $PersonalInfo[1]);
				//Дата рождения
				WriteRow('dateOfBirth','Дата рождения','icon-calendar', $PersonalInfo[3]);
				//Паспорт
				WriteRow('passport','Паспорт','icon-book', $PersonalInfo[5]);
				//Мобильный телефон
				WriteRow('mobile','Мобильный телефон','icon-hdd', $PersonalInfo[4]);
				//Электронная почта
				WriteRow('mail','Электронная почта','icon-envelope', $PersonalInfo[6]);
		echo "
				<input type='submit' name='send' OnClick=\"return confirm('Обновить данные?')\" class='btn btn-success' value='Обновить'>
    					<input type='submit' name='send' OnClick=\"return confirm('Оставить заявку на бронирование?')\"  class='btn btn-success' value='Забронировать'>
		</form>
		</div>
		</div>";	
?>

<div class="page-buffer"></div>
</div>
<div class="page-footer">
<?php include '../footer.html' ?>;
</div>
</div>
</body>
</html>