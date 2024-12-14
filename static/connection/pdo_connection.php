<?php
$host = "localhost";
$user = "root";
$db = "question_bank";
$password = "";

$dsn = "mysql:host=$host;dbname=$db"; //data source name

$option = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {
    $pdo_conn = new PDO($dsn, $user, $password, $option);

} catch (PDOException $e) {
    echo "Error $e";
}
?>