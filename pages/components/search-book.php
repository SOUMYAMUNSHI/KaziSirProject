<?php
session_start();
if (isset($_SESSION["username"])) {
    include_once("../../static/connection/pdo_connection.php"); //include pdo connection

    $subject_stmt = $pdo_conn->prepare("SELECT `SubCode`, `SubName` FROM `subject`"); //preparing ptatement
    $subject_stmt->execute(); //executing statement

    $chapter_stmt = $pdo_conn->prepare("SELECT `ChName` FROM `chapter` WHERE `SubCode` = :SubCode"); //prepare statement for fetch chapter name
    $chapter_stmt->bindValue(":SubCode", "DS1");
    $chapter_stmt->execute(); //execute chapter prepare statement

    $topic_stmt = $pdo_conn->prepare("SELECT `TopicName` FROM `topic`"); //prepare statement for search topic
    $topic_stmt->execute(); //execute prepare statement for topic

    // $questionType_stmt = $pdo_conn->prepare("")



    ?>

    <div class="search">
        <div class="search-component">
            <select id="subject-name" class="select" name="subject-name" id="subject-name">
                <option value="subject1">Select Subject</option>
                <?php

                while ($subjects = $subject_stmt->fetch()) {
                    //to view all subject as option
                    ?>
                    <option value="<?php echo $subjects["SubCode"]; //subject code as value ?>">
                        <?php echo $subjects["SubName"]; //view subject name ?>
                    </option>
                    <?php
                }
}
?>
        </select>
        <select class="select" name="chapter-name" id="chapter-name">
            <option value="subject1">Chapter Name</option>

            <?php
            while ($chapters = $chapter_stmt->fetch()) {
                //to view all chapter as option
                ?>
                <option value="<?php echo $chapters["ChName"]; //chapter name as value ?>">
                    <?php echo $chapters["ChName"]; //view chapter name ?>
                </option>
                <?php
            }
            ?>

        </select>
        <select class="select" name="topic-name" id="topic-name">
            <option value="subject1">Topic Name</option>
            <?php
            while ($topics = $topic_stmt->fetch()) {
                ?>
                <option value="<?php echo $topics["TopicName"]; //topic name as value ?>">
                    <?php echo $topics["TopicName"]; //topic name as value ?>
                </option>
                <?php
            }
            ?>
        </select>
        <select class="select" name="question-type" id="question-type">
            <option value="subject1">Question Type</option>
            <option value="subject1">Subject1</option>
            <option value="subject1">Subject1</option>
            <option value="subject1">Subject1</option>
            <option value="subject1">Subject1</option>
            <option value="subject1">Subject1</option>
        </select>
        <button class="search-button">Search</button>
    </div>

</div>


<script src="../../script/JQuery/jquery-3.7.1.js"></script> <!--Addding Jquery-->
<script>
    $("#subject-name").change(function () { });
</script>