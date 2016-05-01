<?php
include '../database.php';
  if(isset($_POST['login']) && !empty($_POST['login']))
  {
  	 switch ($_POST['send']) 
  	 {
  	 	case 'Обновить':
  	 		{
  	 			if(UpdateUser($_POST))
  	 				echo "<script>alert('Данные обновлены успешно');</script>";
  	 		}
  	 		break;
  	 	case 'Забронировать':
  	 		{
  	 			if(AddNewBooking($_POST))
  	 				echo "<script>alert('Бронь успешно добавлена, вам перезвонят');</script>";
  	 		}
  	 		break;
  	 }
  	 echo"<script> document.location.href='./'</script>";
  }
?>
