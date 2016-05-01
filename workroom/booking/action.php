<?php
include '../../database.php';
if (isset($_POST['Id']) && !empty($_POST['Id']))
{
	if(DeleteBookingFromDB($_POST['Id']))
		echo "<script type='text/javascript'> alert('Удалено успешно'); </script>";	
	else
		echo "<script type='text/javascript'> alert('Удалить не удалось'); </script>";	
	echo "<script type='text/javascript'> document.location.href='./' </script>";
}
?>