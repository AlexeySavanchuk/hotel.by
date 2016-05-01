<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<meta charset="utf-8"/>	
	<title>Рабочая комната</title>
	<script type="text/javascript" src="/js/jquery-1.12.2.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/tooltip.js"></script>
	<script type="text/javascript" src="/js/main.js"></script>
</head>
<body>
<div class="page-wrapper">
<?php include '../../header.html' ?>
<?php include '../../functions.php' ?>
<?php include '../../database.php' ?>
<?php 
session_start();
//если права не позволяют войти, перенаправить на авторизацию
if(!($_SESSION['rules']=='administrator' || $_SESSION['rules']=='redactor'))
	{ 
		echo "<script type='text/javascript'> document.location.href='../../autorization/out.php' </script>";
	}
?>

<div class="container" style="margin-top:20px; ">

<div class="row">
<div class="span12" align="center">
	<form method="post" enctype="multipart/form-data">
		<div class="input-prepend" style="margin-bottom:10px;" rel="tooltip" data-placement="left" title="Заголовок">
				<span class="add-on" ><i class="icon-font"></i></span>
				<input name="title" class="span4" size 16 type="text" placeholder="Заголовок">
		</div><br>

		<div  class="input-prepend" style="margin-bottom:10px;" rel="tooltip" data-placement="left"                title="Текст новости">
				<span class="add-on" ><i class="icon-pencil"></i></span>
				<textarea rows="6"  style="resize: none;" class="span4" name="content" size 16 placeholder="Текст новости"></textarea>
		</div><br>

		<div  class="input-append" style="margin-bottom:10px; background: #F0F0F0;" rel="tooltip" data-placement="left"                title="Изображение">
			<input type = "file" name = "imageNews" style="color:black;" />
			<span class="add-on"><i class="icon-picture"></i></span>
		</div><br>

		<input type = "submit" value = "Загрузить"  class="btn btn-success" />
	</form>
</div>
</div>

<?php 
 if (isset($_POST['title']))
   {//если была отправка формы
   	if (!(empty($_POST['title']) || empty($_POST['content']) || empty($_FILES['imageNews'])))
   	{
   		$image = $_FILES['imageNews']['name'];
   		if (LoadImage())//если изображение загружено
   		{
   			if(AddNewsInBase($_POST, $image))
   				echo "<script>alert('Добавлено');</script>";
   			else
   				echo "<script>alert('Не добавлено');</script>";
   			echo "<script>window.location.href='index.php'</script>";
   		}	
   	}
   }
?>
<?php include 'tableNews.php' ?>;
</div>
<div class="page-buffer"></div>
</div>
<div class="page-footer">
<?php include '../../footer.html' ?>;
</div>
</div>
</body>
</html>