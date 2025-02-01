<?php
//This page is using as a router to route to the correct page

$request = $_SERVER['REQUEST_URI']; //Getting the URL and storing this inside the $request variable

if ($request === "/KaziSirProject/") //Comparing the URL with required URL
{
    include("./pages/introPage.html"); //including the page to view it

} else {
    include "404";
}
?>