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
            echo $raw['Answer'];
        }
    } else {
        echo "No data found";
    }
}
?>