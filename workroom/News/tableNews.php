<?php
echo '<div class="row">
		<div class="span12" align="center">
		<table class="table table table-striped table-hover table-bordered newsTable" align="center">
		<thead>
			<th>Заголовок</th>
			<th>Содержание</th>
			<th>Изображение</th>
			<th>Дата добавления</th>
			<th>Действия</th>
		</thead>
		<tbody>';
		$result = GetAllNewsFromDB();
			while (($News = mysql_fetch_row($result)))
			{
				echo "
				<tr>
					<td>$News[1]</td>
					<td>$News[2]...</td>
					<td>$News[3]</td>
					<td>$News[4]</td>
					<td>
					<form method='post' action='DeleteNews.php'>
					<input type='hidden' name='id' value='$News[0]'>
					<input type='submit' class='btn btn-danger' value='Удалить новость'>
					</form>
					</td>
				</tr>";
			}
		echo '
		</tbody>
		</table>
		</div>
		</div>';
?>