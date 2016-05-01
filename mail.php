<?php

$message = "test php mail";

// На случай если какая-то строка письма длиннее 70 символов мы используем wordwrap()

$message = wordwrap($message, 70);

// Отправляем

mail('fktrctq1852@gmail.com', 'My Subject', $message, 'From:administrator@hotel-polessu.ru');

?>

