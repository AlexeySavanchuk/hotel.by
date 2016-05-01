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
<?php include '../header.html' ?>

<div class="container" style="margin-top:80px; ">
<div class="row">
<div class="span12" align="center">
	<form method="post" action="action.php" enctype="multipart/form-data">
		<div class="input-prepend" style="margin-bottom:10px;" rel="tooltip" data-placement="left" title="Имя">
				<span class="add-on" ><i class="icon-user"></i></span>
				<input required name="name" class="span4" size 16 type="text" placeholder="Ваше имя">
		</div><br>

		<div class="input-prepend" style="margin-bottom:10px;" rel="tooltip" data-placement="left" title="email">
				<span class="add-on" ><i class="icon-envelope"></i></span>
				<input required name="email" class="span4" size 16 type="text" placeholder="Электронная почта">
		</div><br>

		<div  class="input-prepend" style="margin-bottom:10px;" rel="tooltip" data-placement="left"                title="Ваш вопрос">
				<span class="add-on" ><i class="icon-pencil"></i></span>
				<textarea required rows="6"  style="resize: none;" class="span4" name="content" size 16 placeholder="Ваш вопрос..."></textarea>
		</div><br>

		<div  class="input-append" style="margin-bottom:10px; background: #F0F0F0;" rel="tooltip" data-placement="left"                title="Изображение">
			<input type = "file" name = "imageNews" style="color:black;" />
			<span class="add-on"><i class="icon-picture"></i></span>
		</div><br>

		<input type = "submit" value = "Загрузить"  class="btn btn-success" />
	</form>
</div>
</div>
</div>
<div class="page-buffer"></div>
</div>
<div class="page-footer">
<?php include '../footer.html' ?>;
</div>
</div>
</body>
</html>