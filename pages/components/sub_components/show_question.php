<?php

include_once("../../../static/connection/pdo_connection.php"); //including connection

$type = htmlspecialchars($_REQUEST["questionType"]); //Fetching question type, htmlspecialchars() is to filtering the data(to prevent Cross-Site Scripting attack)
$questionType = "qa_" . $type; //concatinatiing "qa_" to making it as ttable name
$chapterCode = htmlspecialchars($_REQUEST["chapterCode"]); //Getting chapterCode from question type htmlspecialchars() is to filtering the data(to prevent Cross-Site Scripting attack)


try {
    $questions = $pdo_conn->prepare("SELECT * FROM `$questionType` WHERE `TopicCode` IN (SELECT `TopicCode` FROM `topic` WHERE `ChCode` = :ChCode);"); //preparing query
    $questions->bindValue(":ChCode", $chapterCode); //bind value
    $questions->execute(); //executing the statement

    ?>
    <div class="mcq_question" id="view_selected-question">
        <?php

        while ($question = $questions->fetch()) {
            ?>
            <div class="question" style="margin-top:5px">
                <label><i><?php echo $question["QuestionCode"] ?>)</i> </label>
                <p style="display:inline; margin-left:5px;"><b><?php echo $question["Question"] ?></b></p>

                <?php
                if ($type == "MCQ") //If the question type is mcq then the option will display 
                {
                    ?>
                    <div style="margin-top:10px; margin-bottom:30px;">
                        <span class="option">1. <?php echo $question["Op1"] ?></span>
                        <span class="option">2. <?php echo $question["Op2"] ?></span>
                        <span class="option">3. <?php echo $question["Op3"] ?></span>
                        <span class="option">4. <?php echo $question["Op4"] ?></span>
                    </div>
                    <?php
                }
                ?>
            </div>

            <?php
        }
} catch (PDOException $e) {
    echo "An error occured" . $e;
}
?>

    <!--MCQ Question-->
</div>
<!--MCQ Question-->



<!--SAQ and LAQ Question-->
<!-- <div class="saq">
    <p>1) Question one?</p>
</div> -->
<!--SAQ and LAQ Question-->