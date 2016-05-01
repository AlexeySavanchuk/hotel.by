<?php
header('Content-Type: text/html; charset=utf-8');
include '../../functions.php';
include '../../database.php';
session_start();
//если права не позволяют войти, перенаправить на авторизацию
if(!($_SESSION['rules']=='administrator'))
	{ 
		echo "<script type='text/javascript'> document.location.href='../../autorization/' </script>";
	}
if (isset($_POST['send']) && !empty($_POST['send']))
   {//если существуют и не пустые
   		if($_POST['send']=='Удалить')
   		{
   			if(DeleteUserFromDB($_POST['id_user']))
   				echo "<script type='text/javascript'> alert('Удалено успешно'); </script>";			
   		}
   		if($_POST['send']=='Назначить')
   		{
   			if(ChangeRulesForUser($_POST['id_user'], $_POST['rules']))
   				echo "<script type='text/javascript'> alert('Удалено успешно'); </script>";			
   		}
   		echo "<script type='text/javascript'> document.location.href='./index.php' </script>";
   }
?>