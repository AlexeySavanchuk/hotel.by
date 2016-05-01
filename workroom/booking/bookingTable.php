<?php
header('Content-Type: text/html; charset=utf-8');
echo '
		<table class="table table table-striped table-hover table-bordered newsTable" align="center">
		<thead>
			<th style="width:10%">Время</th>
			<th style="width:14%">Телефон</th>
			<th >Данные</th>
			<th style="width:10%">Действие</th>
		</thead>
		<tbody>';
		$result = GetBookingRequestFromDB();
			while (($reservation = mysql_fetch_row($result)))
			{
				echo "
				<div class='modal hide fade' id='myModal$reservation[0]' tabindex='-1' role='dialog'>
				<div class='modal-header'><button class='close' type='button' data-dismiss='modal'>X</button></p>
				<h3 id='myModalLabel'>Данные пользователя</h3>
				</div>

				<div class='modal-body' align='center'>
				<p><strong>Имя:</strong>$reservation[3]</p>
				<p><strong>Телефон:</strong>$reservation[2]</p>
				<p><strong>Пасспорт:</strong>$reservation[4]</p>
				<p><strong>Дата рождения:</strong>$reservation[5]</p>
				<p><strong>E-mail:</strong>$reservation[6]</p>
				</div>
				
				<div class='modal-footer'>
					<button class='btn' data-dismiss='modal'>Закрыть</button>
				</div>
				<div>
				<tr>
					<td style='width:10%'>$reservation[1]</td>
					<td>$reservation[2]</td>
					<td style='width:7%'>
					<div  style='padding-bottom: 24px;'><a class='btn btn-primary' href='#myModal$reservation[0]' data-toggle='modal'>Личные данные</a></div>
					</td>
					<td style='width:10%'>
					<form action='action.php' method='post'>
					<input type='hidden' name='Id' value='$reservation[0]'>
					<input type='submit' OnClick=\"return confirm('Вы поработали с клиентом $reservation[3] ?')\"  class='btn btn-danger' value='Закончить работу'>
					</form>
					</td>
				</tr>";
			}

		echo '
		</tbody>
		</table>';
?>