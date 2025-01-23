<?php
$subject = $_REQUEST["subject"];
$chapter = $_REQUEST["chapter"];
$topic = $_REQUEST["topic"];
?>
<div class="final-add_question">
    <div class="add-question_heading">
        <p>Adding question to : <b><?php echo $subject; ?></b></p>
        <p>Adding question to : <b><?php echo $chapter; ?></b></p>
        <p>Adding question to : <b><?php echo $topic; ?></b></p>

        <select class="question-type" name="question-type" id="question-type">
            <option value="mcq">Select Question Type</option>
            <option value="mcq">MCQ</option>
            <option value="mcq">SAQ</option>
            <option value="mcq">LAT</option>
        </select>
    </div>
</div>