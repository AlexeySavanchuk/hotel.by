<?php
header('Content-Type: text/html; charset=utf-8');
$host = "localhost";
$user = "root";
$password = "2016database";
$db ="Hotel_Web";
$isAutorized = false;
mysql_set_charset('utf8');
if (!mysql_connect($host,$user,$password)) 
{
	echo "<script>alert('Mysql error')</script>";
	exit;
}
mysql_select_db($db);
function ValidityUserPassword($Userlogin, $Userpassword)
{
	$q = mysql_query("SELECT count(*) FROM `Users` WHERE `Login` ='$Userlogin' AND `Password`='$Userpassword'");
	return mysql_result($q, 0,0);
}
function GetNameUser($Userlogin, $Userpassword)
{
	mysql_set_charset('utf8');
	$q = mysql_query ("SELECT `Name` FROM `Users` WHERE `Login` ='$Userlogin' AND `Password`='$Userpassword'");
	return mysql_result($q, 0,0);
}
function GetTypeUser($Userlogin, $Userpassword)
{
	mysql_set_charset('utf8');
	$q = mysql_query ("SELECT `Type` FROM `Users` WHERE `Login` ='$Userlogin' AND `Password`='$Userpassword'");
	return mysql_result($q, 0,0);
}
function AddPersonalInfo($arr)
{
	mysql_set_charset('utf8');
	$querystring="INSERT INTO `Personal info`(`First name`, `Last name`, `Middle name`, `Sex`, `Date of birth`, 
		`Residence`, `Passport`, `Mobile phone`, `email`) 
				VALUES ('".$arr['first_name']."','".$arr['last_name']."','".$arr['middle_name']."','".$arr['sex']."','".$arr['dateOfBirth']."','".$arr['residence']."','".$arr['passport']."','".$arr['mobile']."','".$arr['mail']."');";
	$q= mysql_query($querystring);
	$id =-1;
	if ($q) 
	{
		$id = mysql_insert_id(); 
	}
	else
	{
		 echo "<h1>Error: ".mysql_error()."</h1>";
	}
	return $id;
}
function AddNewUser($login, $passport,$idPersonalInfo)
{
	mysql_set_charset('utf8');
	$query = "INSERT INTO `Users`(`Login`, `Password`, `Type`, `Id personal info`) VALUES ('".$login."','".md5($passport)."','user','".$idPersonalInfo."')";
	$q = mysql_query($query);
	if($q)
		return true;
	else 
		return false;
}
function UpdateUser($arr)
{
	mysql_set_charset('utf8');
	$query ="SELECT `Id personal info` FROM `Users` WHERE `Login` ='".$arr['login']."'";
	$q = mysql_query($query);
	$id = mysql_result($q, 0,0);
	$query ="UPDATE `Personal info` SET `First name`='".$arr['first_name']."',`Last name`='".$arr['last_name']."',`Middle name`='".$arr['middle_name']."', `Date of birth`='".$arr['dateOfBirth']."', `Passport`='".$arr['passport']."',`Mobile phone`='".$arr['mobile']."',`email`='".$arr['mail']."'  WHERE `Id`= ".$id;
	$q= mysql_query($query);
	if ($q) 
		return true;
	else 
		return false;
}
function GetUsersFromDB($login=null)
{
	mysql_set_charset('utf8');
	$query ="SELECT `Users`.`Id`, `First name`,`Last name`, `Login`, `Type` FROM `Users` JOIN `Personal info` ON `Users`.`Id personal info` = `Personal info`.`Id`";
	if($login)
		$query.=" and `Login` LIKE '%$login%'";
	$q = mysql_query($query);
	return $q;

}
function GetUsersInformationFromDB($login)
{
	mysql_set_charset('utf8');
	$query ="SELECT `First name`,`Last name`, `Middle name`, `Date of birth`, `Mobile phone`, `Passport`, `email` FROM `Users` JOIN `Personal info` ON `Users`.`Id personal info` = `Personal info`.`Id` and `Users`.`Login`='".$login."'";
	$q = mysql_query($query);
	return $q;
}
function ExistLoginInBase($login)
{
	mysql_set_charset('utf8');
	$query = "SELECT count( * ) FROM `Users` WHERE `login` = '$login'";
	$q = mysql_query($query);
	if($q)
	{
		$result = mysql_result($q, 0,0);
		if($result>0)
			return true;	
		else
			return false;
	}
	else
	{
		echo "<h1>Error: ".mysql_error()."</h1>";
		return true;
	}
}
function AddNewsInBase($arr, $image)
{
	mysql_set_charset('utf8');
	$now =getdate();
	$query = "INSERT INTO `News`(`Title`, `Content`, `Image`, `Date`) VALUES ('".$arr['title']."','".$arr['content']."', '".$image."','".$now['year']."-".$now['mon']."-".$now['mday']."')";
	$q= mysql_query($query);
	if ($q) 
		return true;
	else 
		return false;
}
function GetAllNewsFromDB()
{
	mysql_set_charset('utf8');
	$query= "SELECT `Id`,`Title`, SUBSTRING(Content, 1, 45) AS Content, `Image`,`Date` FROM `News` ORDER  BY `Date`DESC";
	$result = mysql_query($query) or die("Не удалось : " . mysql_error());
	return $result;
}
function DeleteNewsFromDB($id)
{
	$query ="DELETE FROM `News` WHERE `Id`= ".$id;
	$q= mysql_query($query);
	if ($q) 
		return true;
	else 
		return false;
}
function GetNameImageFromNews($id)
{
	mysql_set_charset('utf8');
	$query ="SELECT `Image` FROM `News` WHERE `Id`= ".$id;
	$q= mysql_query($query);
	return mysql_result($q, 0,0);
}
function ChangeRulesForUser($id, $newRule)
{
	$query ="UPDATE `Users` SET `Type`='".$newRule."' WHERE `Id`= ".$id;
	$q= mysql_query($query);
	if ($q) 
		return true;
	else 
		return false;
}
function DeleteUserFromDB($id)
{
	mysql_set_charset('utf8');
	$query ="SELECT `Id personal info` FROM `Users` WHERE `Id`= ".$id;
	$q= mysql_query($query);
	$personalID = mysql_result($q, 0,0);
	$query ="DELETE FROM `Users` WHERE `Id`= ".$id;
	$q= mysql_query($query);
	if ($q) 
		{
			$query = "DELETE FROM `Personal info` WHERE `Id`= ".$personalID;
			$q2= mysql_query($query);
			if($q2)
				return true;
			else
				return false;
		}
}
function AddFeedbackInBase($arr, $image=null)
{
	mysql_set_charset('utf8');
	$query = "INSERT INTO `Feedback`( ` Name`, `Email`, `Message`, `NameFile`) VALUES ('".$arr['name']."','".$arr['email']."','".$arr['content']."','".$image."')";
	$q= mysql_query($query);
	if ($q) 
		return true;
	else 
		return false;

}
function GetUnwatchedFeedback()
{
	mysql_set_charset('utf8');
	$query= "SELECT * FROM `Feedback` WHERE `Answer` is NULL  ORDER  BY `Date` DESC";
	$result = mysql_query($query) or die("Не удалось : " . mysql_error());
	return $result;
}
function AddAnswerInDB($id, $message)
{
	mysql_set_charset('utf8');
	$query ="UPDATE `Feedback` SET `Answer`='".$message."' WHERE `Id`= ".$id;
	$q= mysql_query($query);
	if ($q) 
		return true;
	else 
		return false;
}
function GetBookingRequestFromDB()
{
	mysql_set_charset('utf8');
	$query= "SELECT * FROM `Booking`";
	$result = mysql_query($query) or die("Не удалось : " . mysql_error());
	return $result;
}
function AddNewBooking($arr)
{
	mysql_set_charset('utf8');	
	$query = "INSERT INTO `Booking`(`Telephone`, `Full Name`, `Passport`, `DateOfBirth`, `Email`) VALUES ('".$arr['mobile']."','".$arr['last_name']." ".$arr['first_name']." ".$arr['middle_name']."','".$arr['passport']."','".$arr['dateOfBirth']."','".$arr['mail']."')";
	$q= mysql_query($query);
	if ($q) 
		return true;
	else 
		return false;
}
function DeleteBookingFromDB($id)
{
	mysql_set_charset('utf8');
	$query ="DELETE FROM `Booking` WHERE `Id`= ".$id;
	$q= mysql_query($query);
	if ($q) 
		return true;
	else
		return false;
}
?>