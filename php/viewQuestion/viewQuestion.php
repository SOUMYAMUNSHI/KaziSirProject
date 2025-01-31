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
        
            // echo $subject . $chapter . $topic . $question_type;
        
            $stmt = $pdo_conn->prepare("SELECT * FROM `$question_type` WHERE `TopicCode` IN (SELECT `TopicCode` FROM `topic` WHERE `ChCode` IN  (SELECT `ChCode` FROM `chapter` WHERE `SubCode` = :subCode));");
            $stmt->bindParam(':subCode', $subject, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetchAll();

            if ($data) {
                foreach ($data as $raw) {
                    ?>




                    <div class="view-question">

                        <div class="question">
                            <p class="question-id"><?php echo $raw['QuestionCode'] ?></p>
                            <p class="questions"><?php echo $raw['Question'] ?></p>
                            <button class="view-button <?php echo $raw['ID'] ?>">View</button>
                        </div>
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
            } else {
                echo "No data found";
            }
        }
        ?>






































    </div>
</body>

</html>