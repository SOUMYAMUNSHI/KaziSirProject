<?php
//this page login user and redirect to next page

if (isset($_POST["submit"])) {

    include("../static/connection/pdo_connection.php"); //include connection

    $user_name = $_POST["username"]; //fetching username uisng post
    $password = $_POST["password"]; //fetching password uisng post

    try {//As using PDO. It's instructed to use try block

        $stmt = $pdo_conn->prepare("SELECT * FROM `login`"); //preparing statement
        $stmt->execute(); //execute statement

        $login_status = False; //default login status

        while ($row = $stmt->fetch()) //fetch result, and storing every data inside $row
        {
            //first verify the user name
            if (password_verify($user_name, $row["Login_ID"])) {
                //second verify password
                if (password_verify($password, $row["Password"])) {

                    $login_status = True;

                    session_abort(); //destroing previous session if it's (just for precaucion)
                    session_start(); //session start
                    $_SESSION["username"] = $user_name; //creating session veriable

                    date_default_timezone_set("asia/Kolkata"); //setting current time zone
                    $current_time = date("Y-m-d H:i:s"); //getting current time

                    $stmt = $pdo_conn->prepare("UPDATE `login` SET `In_Time`= :time_now"); //prepare query

                    $stmt->bindValue(":time_now", $current_time); //Bind value

                    $stmt->execute(); //execute query

                    header("Location:../pages/user-home.php"); //moving to home page

                    break; //break after the login is completed
                }
            }
        }

        if (!$login_status) {
            //this will run if the username or password is wrong
            ?>


            <body style="margin:0px; padding:0px">
                <div
                    style="display:flex; justify-content:center;width:100%;height:100vh;background-color:rgba(0,0,0,0.5); font-family: 'Gill Sans', sans-serif; ">
                    <div
                        style="display:flex; flex-direction:column;gap:20px;width:300px;height:150px;border-radius:2px;background-color:white;margin-top:10px">
                        <p style="text-align:center;margin-top:30px">Wrong username or password</p>
                        <button onclick="login_page()"
                            style="align-self:center;width:80px;height:30px;background-color:#dc2f2f;border:none;color:white;border-radius:2px;font-family: 'Gill Sans', sans-serif;cursor:pointer">Ok</button>
                    </div>
                </div>

                <script>
                    function login_page() {
                        window.location.href = "http://localhost/KaziSirProject/index.html"; //return to index page
                    }
                </script>
            </body>

            <?php
        }
    } catch (PDOException $e) {//catching exception
        echo "$e";
    }





}
?>