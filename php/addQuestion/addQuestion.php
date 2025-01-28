<?php
include("../../static/connection/pdo_connection.php"); //include connection

if (isset($_POST['submit'])) {
    $subject = $_POST['subject'];
    $chapter = $_POST['chapter'];
    $topic = $_POST['topic'];
    $question_type = $_POST['question_type'];

    if ($question_type == "mcq") {
        $question = $_POST['type_mcq-question'];
        $option_One = $_POST['type_mcq-answer1'];
        $option_Two = $_POST['type_mcq-answer2'];
        $option_Three = $_POST['type_mcq-answer3'];
        $option_Four = $_POST['type_mcq-answer4'];
        $answer = $_POST['correct-answer'];

        $stmt = $pdo_conn->prepare("INSERT INTO `qa_mcq` (`QuestionCode`, `TopicCode`, `Question`, `ImageLink`, `Op1`, `Op2`, `Op3`, `Op4`, `Answer`) VALUES (:qCode, :tCode, :Qus, :iLink, :op1, :op2, :op3, :op4, :ans)"); //Prepare the statement
        $stmt->execute([
            ':qCode' => 'Q001',
            ':tCode' => 'T1',
            ':Qus' => $question,
            ':iLink' => 'NULL',
            ':op1' => $option_One,
            ':op2' => $option_Two,
            ':op3' => $option_Three,
            ':op4' => $option_Four,
            ':ans' => $answer
        ]); //bind and execute atonce using an array
    }
}
?>