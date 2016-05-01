 <script type='text/javascript'>
    $(document).ready(function(){
      $('.dropdown-toggle-js').dropdown();
    });  
    </script>     
<?php
include '../../database.php';
function PrintTableUsers($login)
{
echo '<div class="row">
		<div class="span12" align="center">
		<table class="table table table-striped table-hover table-bordered newsTable" align="center">
		<thead>
			<th width="10%">Id</th>
			<th>Логин</th>
			<th>Имя</th>
			<th width="20%">Права</th>
		</thead>
		<tbody>';
			$result = GetUsersFromDB($login);
			while (($User = mysql_fetch_row($result)))
			{
				echo 
				"
				<tr>
					<td>$User[0]</td>
					<td>$User[3]</td>
					<td>";
					$UserData  = GetUsersInformationFromDB($User[3]);
					$row = mysql_fetch_row($UserData);
					echo "
								<div class='modal hide fade' id='myModal$User[0]' tabindex='-1' role='dialog'>
								<div class='modal-header'><button class='close' type='button' data-dismiss='modal'>X</button></p>
								<h3 id='myModalLabel'>Данные пользователя</h3>
								</div>

								<div class='modal-body' align='center'>
								<p><strong>Имя:</strong>$row[0] $row[1] $row[2]</p>
								<p><strong>Телефон:</strong>$row[4]</p>
								<p><strong>Пасспорт:</strong>$row[5]</p>
								<p><strong>Дата рождения:</strong>$row[3]</p>
								<p><strong>E-mail:</strong>$row[6]</p>
								</div>
								
								<div class='modal-footer'>
									<button class='btn' data-dismiss='modal'>Закрыть</button>
								</div>
								</div>
					<div  style='padding-bottom: 24px;'><a href='#myModal$User[0]' data-toggle='modal'>$User[2] $User[1]</a></div>					
					</td>
					
					<td>
					<form method='POST'  action='action.php'>
						 
						<select name='rules' class='form-control' >
    					   <option".EqualsRules($User[4],'administrator')." value='administrator'>Администратор</option>
    					   <option".EqualsRules($User[4],'user')." value='user'>Пользователь</option>
    					   <option".EqualsRules($User[4],'reception')." value='reception'>Ресепшин</option>
    					   <option".EqualsRules($User[4],'redactor')." value='redactor'>Редактор</option>
    					</select>

						<input type='hidden' name='id_user' value='$User[0]'>
    					<input type='submit' name='send' OnClick=\"return confirm('Изменить права $User[2] $User[1]?')\" class='btn btn-success' value='Назначить'>
    					<input type='submit' name='send' OnClick=\"return confirm('Удалить $User[2] $User[1] ?')\"  class='btn btn-danger' value='Удалить'>
    				</form>
					</td>
				";
			}
		echo '
		</tbody>
		</table>
		</div>
		</div>';
	}
?>