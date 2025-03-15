<?php
//this file is incomplete need to complete this


include_once("../../static/connection/pdo_connection.php"); //adding pdo connection
require("../../vendor/autoload.php");
use Dompdf\Dompdf;



$subject = htmlspecialchars($_REQUEST["subject"]);
$type = htmlspecialchars($_REQUEST["questionType"]); //Fetching question type, htmlspecialchars() is to filtering the data(to prevent Cross-Site Scripting attack)
$TopicCode = htmlspecialchars($_REQUEST["TopicCode"]); //Getting chapterCode from question type htmlspecialchars() is to filtering the data(to prevent Cross-Site Scripting attack)
$questionType = "qa_" . $type; //concatinatiing "qa_" to making it as ttable name





try {
    $questions = $pdo_conn->prepare("SELECT * FROM `$questionType` WHERE `TopicCode` = :TopicCode"); //preparing query
    $questions->bindValue(":TopicCode", $TopicCode); //bind value
    $questions->execute(); //executing the statement

    ob_start(); //Start output buffering/Starts capturing the output.

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
                        <span class="option"><b>1.</b> <?php echo $question["Op1"] ?></span>
                        <span class="option"><b>2.</b> <?php echo $question["Op2"] ?></span>
                        <span class="option"><b>3.</b> <?php echo $question["Op3"] ?></span>
                        <span class="option"><b>4.</b> <?php echo $question["Op4"] ?></span>
                    </div>
                    <?php
                }

                ?>
            </div>
            <?php
        }
        ?>
    </div>

    <?php

    $question_string = ob_get_clean(); //Retrieves and clears the buffer/Store the entire output in a variable

} catch (PDOException $e) {
    echo $e;
}

















$header = '<div style="text-align:center">
        <h1 class="heading">Kazi Sir Question Bank</h1>
        <h4 class="heading">Subject: ' . $subject . '</h4>
        <hr>
    </div>';

$print_pdf = ($header . $question_string); //$question_string contain all the questions

$dompdf = new Dompdf;
$dompdf->loadHtml($print_pdf);
$dompdf->setPaper("A4", "portrait");
$dompdf->render();
$dompdf->stream("sample.pdf", ["Attachment" => false]);


?>