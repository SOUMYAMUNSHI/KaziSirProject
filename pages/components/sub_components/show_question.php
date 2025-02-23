<?php

include_once("../../../static/connection/pdo_connection.php"); //including connection

$questionType = "qa_" . $_REQUEST["questionType"]; //concatinatiing "qa_" to making it as ttable name
$chapterCode = $_REQUEST["chapterCode"];


try {
    $questions = $pdo_conn->prepare("SELECT * FROM `$questionType` WHERE `TopicCode` IN (SELECT `TopicCode` FROM `topic` WHERE `ChCode` = :ChCode);"); //preparing query
    $questions->bindValue(":ChCode", $chapterCode); //bind value
    $questions->execute(); //executing the statement

    ?>
    <div class="mcq_question">
        <?php

        while ($question = $questions->fetch()) {
            ?>
            <div class="question">
                <label><?php echo $question["QuestionCode"] ?>)</label>
                <p style="display:inline; margin-left:10px;"><?php echo $question["Question"] ?></p>

                <?php
                if ($question["Op1"]) {
                    ?>
                    <div style="margin-top:10px">
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