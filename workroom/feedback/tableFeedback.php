<?php
echo '
	<div class="container" style="margin-top:20px; ">
		<div class="row">
		<div class="span12" align="center">
		<table class="table table table-striped table-hover table-bordered newsTable" align="center">
		<thead>
			<th style="width:10%">Дата</th>
			<th>Сообщение</th>
			<th  style="width:7%">Прикрепленный файл</th>
			<th style="width:10%">Действие</th>
		</thead>
		<tbody>';
		$result = GetUnwatchedFeedback();
			while (($feedback = mysql_fetch_row($result)))
			{
				echo "
				<div class='modal hide fade' id='myModal$feedback[0]' tabindex='-1' role='dialog'>
				<div class='modal-header'><button class='close' type='button' data-dismiss='modal'>X</button></p>
				<h3 id='myModalLabel'>Ответ пользователю</h3>
				</div>

				<div class='modal-body' align='center'>
					<p>$feedback[3]</p>
					<p>
					<form action='answer.php' method='post'>

					<input type='hidden' name='Id' value='$feedback[0]'>
					<input type='hidden' name='Name' value='$feedback[1]'>
					<input type='hidden' name='Email' value='$feedback[2]'>
					
					<p><br></p>
						<p>Здравствуйте, $feedback[1]</p>
							<textarea rows='6' style='resize: none;' class='span6' name='message' size 16 placeholder='Ответ'></textarea>
						</p>
				</div>
				
				<div class='modal-footer'>
					<button class='btn' data-dismiss='modal'>Закрыть</button><br />
					<input type='submit' class='btn btn-primary' value='Ответить'></div>
				</form>
				</div>
				
				<tr>
					<td style='width:10%'>$feedback[5]</td>
					<td>$feedback[3]</td>
					<td style='width:7%'>";
					if(!is_null($feedback[4]))
					echo "<a target='_blank' href='../../img/feedback/$feedback[4]'><i class='icon-bookmark'></i>Файл</a>";
					echo "
					</td>
					<td style='width:10%'>
					<div  style='padding-bottom: 24px;'><a class='btn btn-primary' href='#myModal$feedback[0]' data-toggle='modal'>Ответить</a></div>
					</td>
				</tr>";
			}

		echo '
		</tbody>
		</table>
		</div>
		</div>
		</div>';
?>