<?php
session_start(); //Starting the session
if (isset($_SESSION['username'])) //To check session is set
{
    ?>




    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View Answer</title>
        <link rel="stylesheet" href="../../style/view-question.css">
        <script src="../../script/JQuery/jquery-3.7.1.js"></script> <!--Adding Jquery-->
    </head>

    <body>
        <nav class="header">
            <p>View Question</p>
        </nav>

        <div class="question-container">










            <?php
            if (isset($_POST['submit'])) {

                include_once("../../static/connection/pdo_connection.php");

                $subject = urldecode($_POST['subject-name']); //url decode is used to convert it form encoded text
                $chapter = urldecode($_POST['chapter-name']); //url decode is used to convert it form encoded text
                $topic = urldecode($_POST['topic-name']); //url decode is used to convert it form encoded text
                $question_type = "qa_" . $_POST['question-type']; //reparing the variable suitable for database
        








                $stmt = $pdo_conn->prepare("SELECT * FROM `$question_type` WHERE `TopicCode` IN (SELECT `TopicCode` FROM `topic` WHERE `ChCode` IN  (SELECT `ChCode` FROM `chapter` WHERE `SubCode` = :subCode));"); //Preparing the query
                $stmt->bindParam(':subCode', $subject, PDO::PARAM_STR); //Bind the value
                $stmt->execute(); //Executing the query
                $data = $stmt->fetchAll(); //Fetching the value from the database
        









                if ($data) //Checking Data is present or not.
                {
                    //If data is aveliable
        
                    foreach ($data as $raw) {
                        ?>




                        <div class="view-question">

                            <div class="question">
                                <p class="question-id"><?php echo $raw['QuestionCode'] ?></p>
                                <p class="questions"><?php echo $raw['Question'] ?></p>
                                <button class="view-button <?php echo $raw['ID'] ?>">View</button>
                            </div>



                            <?php
                            if ($raw['ImageLink'] !== 'NULL') {
                                ?>
                                <img src="../../static/src/img/question.png" alt="question-img" style="width:350px; margin-left:10px">
                                <?php
                            }
                            ?>




                            <?php




                            if (isset($raw['Op1'])) { ?>

                                <div class="option">
                                    <p>1. <?php echo $raw['Op1'] ?></p>
                                    <p>2. <?php echo $raw['Op2'] ?></p>
                                    <p>3. <?php echo $raw['Op3'] ?></p>
                                    <p>4. <?php echo $raw['Op1'] ?></p>
                                </div>

                                <?php
                            }
                            ?>



                            <div class="answer" id="<?php echo $raw['ID'] ?>" hidden>
                                <p>Answer: <?php echo $raw['Answer'] ?></p>
                            </div>
                        </div>


                        <script>
                            $(".<?php echo $raw['ID'] ?>").click(function () {
                                $("#<?php echo $raw['ID'] ?>").animate({
                                    height: 'toggle'
                                });
                            })
                        </script>


                        <?php
                    }
                } else //Else will execute if no data is present
                {
                    ?>
                    <div class="data_not-found"><p>No Data Is Avaliable</p></div>
                    <?php
                }
            }
            ?>






        </div>
    </body>

    </html>

    <?php
} else //else will run if the session is not set
{
    include_once("../../pages/error_msg/error_page.php"); //Includeing error page to redirect to index page if page is not logged in
}
?>