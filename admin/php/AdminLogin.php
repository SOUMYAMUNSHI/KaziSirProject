<?php
if(isset($_POST["submit"])){

    include("../../static/connection/pdo_connection.php"); //including database connection

    $password = htmlspecialchars($_POST["password"]); //fetching the password

    try{
        $stmt = $pdo_conn->prepare("SELECT * FROM `admin`");
        $stmt->execute();

        while($row = $stmt->fetch()){
            if($password == $row["admin_password"]){
                header("Location: http://localhost/KaziSirProject/admin/pages/admin.php"); //Redirecting to the admin.php page
            }
        }
    }
    catch (PDOException $e){
        echo $e;
    }


}
?>