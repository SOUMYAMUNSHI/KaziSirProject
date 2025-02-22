<?php
session_start();
session_destroy();

header("Location:http://localhost/KaziSirProject/index.php");
exit;
?>