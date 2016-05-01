<?php
session_start();
unset($_SESSION['rules']);
echo "<script>document.location.href='./';</script>\n";
?>