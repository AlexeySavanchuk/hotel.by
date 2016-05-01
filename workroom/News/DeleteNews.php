<?php
	include '../../database.php';
	mb_internal_encoding("UTF-8");
	 if (isset($_POST['id']) && !empty($_POST['id']))
	{
		$path="../../img/NewsAvatar/".mb_substr(GetNameImageFromNews($_POST['id']),0);
		chmod("/$path", 0750);
		if(DeleteNewsFromDB($_POST['id']) && unlink($path))
			echo"<script>alert('Удалено');</script>";
		else
			echo"<script>alert('Не удалось удалить');</script>";
	}
	echo "<script>document.location.href='index.php';</script>\n";
?>