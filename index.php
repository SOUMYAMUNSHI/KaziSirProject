<?php
$request = $_SERVER['REQUEST_URI'];

if ($request === "/KaziSirProject/") {
    include("./pages/introPage.html");
} else {
    include "404";
}
?>