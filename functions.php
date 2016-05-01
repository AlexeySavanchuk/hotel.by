<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
mysql_set_charset('utf8');
function StartSession($rules)
{
	if($_SESSION['rules']=='user')
		echo "<script>document.location.href='../userroom/';</script>\n"; 	
	else
		echo "<script>document.location.href='../workroom/';</script>\n"; 
}
function WriteRow($name, $placeholder, $icon, $value=null)
{
	echo 
	'
	<div class="input-prepend" style="margin-bottom:10px;" rel="tooltip" data-placement="left" title="'.GetTooltipText($name).'">
				<span class="add-on" ><i class="'.$icon.'"></i></span>
				<input required  setCustomValidity(\'\')" name="'.$name.'" class="span4" size 16 type="';
				echo (substr($name, 0,8)=='password')?"password":"text";
				echo '" placeholder="'.$placeholder.'" value="'.$value.'">
	</div><br>
	';
}
function GetTooltipText($name)
{
	switch ($name) 
	{
		case 'first_name' : return 'Введите имя' ; 
		case 'middle_name': return 'Введите отчество, если оно есть' ;
		case 'last_name': return 'Введите Фамилию';
		case 'sex': return 'Введите пол в формате `male/female`';
		case 'dateOfBirth': return  'Введите дату рождения в формате `dd-mm-yyyy`';
		case 'residence': return 'Введите место жительства'; 
		case 'passport': return 'Введите паспорт в формате `AB1234567`';
		case 'mobile': return 'Введите номер телефона с кодом в формате `+375(код)номер`';
		case 'mail': return 'Введите электронную почту в формате pochta@mail.ru';
		case 'login': return 'Введите логин латиницей';
		case 'password': return 'Введите пароль';
		case 'password2': return 'Повторите пароль';
		default: return 'Введите данные';
	}
}
function checkCompliancePassword($pass1, $pass2)
{
	if($pass1==$pass2)
		return true;
	else 
		return false;
}
function ValidationInputDataForRegistration($Arr)
{
   if(  
		ValidateSex($Arr['sex'])&&
		ValidateDateOfBirt($Arr['dateOfBirth'])&&
		ValidatePassport($Arr['passport'])&&
		ValidateMobile($Arr['mobile'])&&
		ValidateMail($Arr['mail'])&&
		ValidateLogin($Arr['login'])&&
   		checkCompliancePassword($Arr['password'],$Arr['password2']))
   	return true;
   else
   	return false;
}
function ValidateSex($sex)
{
	return ($sex =='male' || $sex =='female')? true:false;
}
function ValidateDateOfBirt($date)
{
	if(strlen($date)!=10)//надо вводить dd-mm-yyyy
	   return false;
	if(!is_numeric(substr($date, 0,2)))//если день-это не число
	   return false;
	if(!is_numeric(substr($date, 3,2)))//если месяц-это не число
	   return false;
	if(!is_numeric(substr($date, 6,4)))//если год-это не  число
	   return false;
	if (substr($date, 2,1) != '-' || substr($date, 5,1) != '-') //если разделитель не черточка
	 return false;

	return true;
}
function ValidatePassport($passport)
{
	mb_internal_encoding("UTF-8");
	if(mb_strlen($passport)!=9)//надо вводить dd-mm-yyyy
	   return false;
	if (!preg_match("/^[а-яёА-ЯЁ]+$/", mb_substr($passport, 0,2)))
		return false;
	if (!is_numeric(mb_substr($passport, 2)))
		return false;

	return true;
}
function ValidateMobile($mobile)
{
	if(!preg_match("/^[0-9\-\(\)\+]+$/",$mobile))
		return false;

	return true;
}
function ValidateMail($mail)
{
	if(!preg_match("/.+@.+\..+/i",$mail))
		return false;

	return true;
}
function ValidateLogin($login)
{
	if(!ExistLoginInBase($login))
		return true;
	else
		return false;
}
function RegistrationUserInDB($arr)
{
	$idPersonal = AddPersonalInfo($arr);
	if (AddNewUser($arr['login'], $arr['password'],$idPersonal))
		return true;
	else
		return false;
}
function LoadImage($folder="NewsAvatar")
{
  $blacklist = array(".php", ".phtml", ".php3", ".php4", ".html", ".htm");
  
  foreach ($blacklist as $item)
    if(preg_match("/$item\$/i", $_FILES['imageNews']['name'])) exit;

  $type = $_FILES['imageNews']['type'];
  $size = $_FILES['imageNews']['size'];
  if (($type != "image/jpg") && ($type != "image/jpeg")) exit;
  if ($size > 2500000) exit;
  $uploadfile =  $_SERVER['DOCUMENT_ROOT']."/img/".$folder."/".$_FILES['imageNews']['name'];
  if(is_uploaded_file($_FILES['imageNews']["tmp_name"]))
 	{
 		if(move_uploaded_file($_FILES['imageNews']['tmp_name'], $uploadfile))
			return true;
		else
			return false;
 	}
}
function GetTextByRules($rules)
{
	if($rules=='administrator') return 'Администратор';
	if($rules=='user') return 'Пользователь';
	if($rules=='reception') return 'Ресепшин';
	if($rules=='redactor') return 'Редактор';
}
function EqualsRules($value1, $value2)
{
	if($value1==$value2)
		return ' selected ';
}
function SendMailForClient($name, $email, $message)
{
// На случай если какая-то строка письма длиннее 70 символов мы используем wordwrap()
$message = wordwrap($message, 70);
if(mail($email, 'Поддержка Hotel-polessu', 'Здравствуйте,'.$name.'.\n'.$message, 'From:administrator@hotel-polessu.ru'))
	return true;
else return false;
}
function SendMailAfterRegistration($arr)
{
	$subject = "Вы прошли регистрацию на сайте hotel-polessu.ru";

	$message = "<html>
		    <head>
		    	<meta charset = 'utf-8'>
		        <title>Регистрация на сайте hotel-polessu.ru</title>
		        <style type='text/css'>
				   A:link { 
				    text-decoration: none; color: white;
				   } 
				   A:visited { text-decoration: none; color: white; } 
				   A:active { text-decoration: none; color: white;}
				   A:hover {
				    text-decoration: underline;
				    color: white; 
				   } 
				  </style>
		    </head>
		    <body style='background-color: #516B8A; color:white;' align='center'>
		        <h4>Здавствуйте, ".$arr['first_name']."</h4>
		        <p>Вы успешно зарегистрировались на сайте гостиницы <a href='http://www.polessu.by'> Полесского Государственного Университета</a><br><br>
		           Ваши данные сохранены, теперь вы можете оставлять заявку на бронь одним кликом.<br><br>
		           Если вы захотите изменить свои личные данные - это можно сделать в <span style='color: yellow'>Личном кабинете</span><br><br>
		           Данные для входа на сайт:<br><br>
		           <b>Логин: </b>".$arr['login']."<br>
		           <b>Пароль: </b>".$arr['password']."<br>
		        </p>
		    </body>
</html>";

	$headers  = "Content-type: text/html; charset=utf-8 \r\n";
	$headers .= "From:administrator@hotel-polessu.ru\r\n";

	if(mail($arr['mail'], $subject, $message, $headers))
		 return true;
	else return false; 
}
?>