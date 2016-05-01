<?php 
include '../functions.php';
include '../database.php';
 if (isset($_POST['name']))
   {//если была отправка формы
         $imageStatus =false;
   		$image = $_FILES['imageNews']['name'];
         if(!empty($image))
            {
               if (LoadImage('feedback'))
                  $imageStatus= true;
            }
         else 
            $imageStatus= true;
   		if($imageStatus)
         {
   			if(AddFeedbackInBase($_POST, $image))
   				echo "<script>alert('Добавлено');</script>";
   			else
   				echo "<script>alert('Не добавлено');</script>";
         }
         else
               echo "<script>alert('Не добавлено');</script>";
   }
   else
     echo "<script>alert('Не добавлено');</script>";
  echo "<script>window.location.href='./'</script>";
?>