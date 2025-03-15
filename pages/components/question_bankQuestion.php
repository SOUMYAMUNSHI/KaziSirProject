<?php
include_once("../../static/connection/pdo_connection.php"); //Getting database connection


$chapterCode = $_REQUEST["ChCode"]; //getting chapter code from question-card page
$subject = $_REQUEST["subjectName"]; //getting subject name form question-card page

$TopicCode = $pdo_conn->prepare("SELECT `TopicCode` FROM `topic` WHERE `ChCode` IN (SELECT `ChCode` FROM `chapter` WHERE `SubCode` = :subCode);");
$TopicCode->bindValue(":subCode", $chapterCode);
$TopicCode->execute();

while($code = $TopicCode->fetch()){
    ?>
    <input hidden type="text" id="TopicCode" value="<?php echo $code['TopicCode'] ?>"> <!--This input is use to hold the value of TopicCode-->
    <?php
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Bank</title>
    <link rel="stylesheet" href="../../style/question_bankQuestion.css">
</head>

<body style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
    <!--Header-->
    <div class="heading-container">
        <h1 class="heading">Kazi Sir Question Bank</h1>
        <h4 class="heading">Subject: <?php echo $subject ?></h4>
        <hr>

        <div class="question_type">
            <select class="question_option" id="options">
                <option value="NULL">Select</option>
                <option value="MCQ">MCQ</option>
                <option value="SAQ">SAQ</option>
                <option value="LAQ">LAQ</option>
            </select>
            <button class="submit_button" type="submit" id="submit">Submit</button>

            <button class="print_button" id="printQuestion">Print</button>
        </div>
    </div>
    <!--Header-->


    <script src="../../script/JQuery/jquery-3.7.1.js"></script> <!--Including jquery-->
    <script>
        $("#submit").click(function () {

            const questionType = $("#options").val();
            const TopicCode = $("#TopicCode").val();
            if (questionType == "NULL") {
                document.getElementById("question").innerHTML = "<h2 style='text-align:center'>No option is selected</h2>"; //This message will print if no option is selected
            }
            else {
                $("#question").load(`./sub_components/show_question.php?questionType=${questionType}&TopicCode=${TopicCode}`);
            }
        })
    </script>







    <div class="questions" id="question" style="margin:0px">
        <h2 style="text-align:center">No question selected</h2>
    </div>

    <script>
        $("#printQuestion").click(function () {
            const questionType = $("#options").val();
            const TopicCode = $("#TopicCode").val();
            window.open(`../../php/print_pdf/pdf.php?subject=<?php echo $subject ?>&questionType=${questionType}&TopicCode=${TopicCode}`);
        })
    </script>


</body>

</html>