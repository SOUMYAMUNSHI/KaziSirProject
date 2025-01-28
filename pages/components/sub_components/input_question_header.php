<?php
$subject = $_REQUEST["subject"];
$chapter = $_REQUEST["chapter"];
$topic = $_REQUEST["topic"];
?>
<div class="final-add_question">
    <div class="add-question_heading">
        <p>Adding question to : <b><?php echo $subject; ?></b></p>
        <input id="selected-subject" hidden type="text" value="<?php echo $subject; ?>">
        <!--Trick to get the value smoothly-->

        <p>Adding question to : <b><?php echo $chapter; ?></b></p>
        <input id="selected-chapter" hidden type="text"
            value="<?php echo $chapter; ?>"><!--Trick to get the value smoothly-->

        <p>Adding question to : <b><?php echo $topic; ?></b></p>
        <input id="selected-topic" hidden type="text"
            value="<?php echo $topic; ?>"><!--Trick to get the value smoothly-->

        <select class="question-type" name="question-type" id="question-type">
            <option value="mcq">MCQ</option>
            <option value="saq">SAQ</option>
            <option value="lat">LAT</option>
        </select>
        <button id="select-type" class="select-question">Select</button>
    </div>
</div>

<!--Aadding jquery-->
<script src="../script/JQuery/jquery-3.7.1.js"></script>

<script>
    $("#select-type").click(function () {
        let subject = $("#selected-subject").val();
        let chapter = $("#selected-chapter").val();
        let topic = $("#selected-topic").val();
        let question_type = $("#question-type").val();

    })
</script>