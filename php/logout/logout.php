<?php
session_start();
session_abort();
session_destroy();

header("Location:http://localhost/KaziSirProject/index.html");
?>