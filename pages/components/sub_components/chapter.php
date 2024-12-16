<option>Select Chapter</option> <!--This is a trick to act the dropdown properly-->
<?php
session_start();
if (isset($_SESSION["username"])) {

    $subjectCode = $_REQUEST["subCode"];

    include_once("../../../static/connection/pdo_connection.php"); //include the pdo connection



    $chapter_stmt = $pdo_conn->prepare("SELECT `ChCode`,`ChName` FROM `chapter` WHERE `SubCode` = :subjectCode"); //prepare statement for fetch chapter name
    $chapter_stmt->bindValue(":subjectCode", $subjectCode); //bind the value
    $chapter_stmt->execute(); //execute chapter prepare statement

    while ($chapters = $chapter_stmt->fetch()) {
        //to view all chapter as option
?>
        <option value="<?php echo $chapters["ChCode"]; //chapter code as value 
                        ?>">
            <?php echo $chapters["ChName"]; //view chapter name 
            ?>
        </option>
    <?php

    }
} else {


    //else part will execute if somehow any one get access this page without login/session


    ?>

    <body style="margin:0px; padding:0px">
        <div
            style="display:flex; justify-content:center;width:100%;height:100vh;background-color:rgba(0,0,0,0.5); font-family: 'Gill Sans', sans-serif; ">
            <div
                style="display:flex; flex-direction:column;gap:20px;width:300px;height:150px;border-radius:2px;background-color:white;margin-top:10px">
                <p style="text-align:center;margin-top:30px">Please Login</p>
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
?>