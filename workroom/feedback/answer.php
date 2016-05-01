<?php
header('Content-Type: text/html; charset=utf-8');
include '../../functions.php';
include '../../database.php';
  if (isset($_POST['Name']) && !empty($_POST['Name']))
	{
		if(SendMailForClient($_POST['Name'], $_POST['Email'], $_POST['message']))
			{
				if(AddAnswerInDB($_POST['Id'], $_POST['message']))
					echo "<script>alert('Успешно');</script>";
				else
					echo "<script>alert('Неудача');</script>";
			}
			else
					echo "<script>alert('Неудача');</script>";
	}
echo "<script>document.location.href='./';</script>\n";
?>