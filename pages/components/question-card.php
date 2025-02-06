<?php
session_start();

if (isset($_SESSION["username"])) {

    include("../../static/connection/pdo_connection.php"); //database connection

    $stmt = $pdo_conn->prepare("SELECT * FROM `subject`"); //prepare pdo statement

    $stmt->execute(); //execute the pdo stattement

    while ($subject = $stmt->fetch()) {
        //whiile loop will wun for every subject

        ?>
        <div class="subject">
            <div class="card-body">


                <div class="card-header">
                    <p class="book-icon"><i class="fa-solid fa-book"></i></p>
                </div>
                <div class="details">



                    <h1 class="subject-name"><?php echo $subject["SubName"]; //viewing subject name ?></h1>

                    <?php

                    $subcode = $subject["SubCode"]; //storing SubCode to use it
            
                    $chapterCountStmt = $pdo_conn->prepare("SELECT SubCode, ChCode, COUNT(ChName) AS ChapterCount FROM chapter WHERE SubCode = '$subcode' GROUP BY SubCode;"); //preparing the statement
                    $chapterCountStmt->execute(); //Executing the statement
            
                    while ($count = $chapterCountStmt->fetch()) {


                        ?>
                        <p class="chapter">Total Chapter:<?php echo $count["ChapterCount"] ?></p> <!--Viewing Total Chapter-->
                        <?php

                        $chapterCode = $count["ChCode"];

                        $countQuestionStmt = $pdo_conn->prepare("SELECT `TopicCode`, COUNT(Question) AS `Count` FROM `qa_saq` WHERE `TopicCode` IN (SELECT `TopicCode` FROM `topic` WHERE `ChCode` = '$chapterCode') GROUP BY `TopicCode`;"); //Preparing statement
                        $countQuestionStmt->execute(); //Executing the statement
            
                        while ($countQuestion = $countQuestionStmt->fetch()) {
                            ?>
                            <p class="question">Total Question: <?php echo $countQuestion["Count"] ?></p> <!--Viewing Total Question-->
                            <?php
                        }
                    }

                    ?>

                    <button onclick="view_queston()" id="view-question" class="button" type="submit">View</button>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    ?>

    <!--Error Message if session is not set start-->

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
    <!--Error Message if session is not set end-->

    <?php
}

?>