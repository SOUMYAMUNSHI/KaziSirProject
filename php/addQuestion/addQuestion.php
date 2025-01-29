<?php
include("../../static/connection/pdo_connection.php"); //include connection

if (isset($_POST['submit'])) //fetching data from the enter question from
{
    $subject = $_POST['subject'];
    $chapter = $_POST['chapter'];
    $topic = $_POST['topic'];
    $question_type = $_POST['question_type'];

    try {
        //to fetch related data from foregin table
        $fetchSub_data = $pdo_conn->prepare("SELECT `TopicCode` FROM `topic` WHERE `TopicName` = :tName"); //preparing the statement
        $fetchSub_data->bindValue(':tName', $topic, PDO::PARAM_STR); //bunding the value
        $fetchSub_data->execute(); //exacute the query
        $sub_data = $fetchSub_data->fetchAll(); //fetching the data

        foreach ($sub_data as $row) {

            if ($question_type == "mcq") {

                $question = $_POST['type_mcq-question'];
                $option_One = $_POST['type_mcq-answer1'];
                $option_Two = $_POST['type_mcq-answer2'];
                $option_Three = $_POST['type_mcq-answer3'];
                $option_Four = $_POST['type_mcq-answer4'];
                $answer = $_POST['correct-answer'];


                //to fetch last ID of mcq question for generation of MCQ id
                $fetchLast_id = $pdo_conn->prepare("SELECT `ID` FROM `qa_mcq` ORDER BY `ID` DESC LIMIT 1"); //preparing the statement
                $fetchLast_id->execute(); //exacute the query
                $last_id = $fetchLast_id->fetchAll();

                if ($last_id) {


                    foreach ($last_id as $id) {
                        $mcq_id = "MCQ" . ($id['ID'] + 1); //Generating MCQ id 

                        $stmt = $pdo_conn->prepare("INSERT INTO `qa_mcq` (`QuestionCode`, `TopicCode`, `Question`, `ImageLink`, `Op1`, `Op2`, `Op3`, `Op4`, `Answer`) VALUES (:qCode, :tCode, :Qus, :iLink, :op1, :op2, :op3, :op4, :ans)"); //Prepare the statement

                        $stmt->bindValue(':qCode', $mcq_id, PDO::PARAM_STR);
                        $stmt->bindValue(':tCode', $row["TopicCode"], PDO::PARAM_STR);
                        $stmt->bindValue(':Qus', $question, PDO::PARAM_STR);
                        $stmt->bindValue(':iLink', 'NULL', PDO::PARAM_STR);
                        $stmt->bindValue(':op1', $option_One, PDO::PARAM_STR);
                        $stmt->bindValue(':op2', $option_Two, PDO::PARAM_STR);
                        $stmt->bindValue(':op3', $option_Three, PDO::PARAM_STR);
                        $stmt->bindValue(':op4', $option_Four, PDO::PARAM_STR);
                        $stmt->bindValue(':ans', $answer, PDO::PARAM_STR);
                        //Bind all value

                        if ($stmt->execute()) //if true than this will execute
                        {
                            include("../../pages/success_msg/succcess_message.php"); //To view success message
                        }
                    }
                } else {
                    $mcq_id = "MCQ0"; //Generating MCQ id 

                    $stmt = $pdo_conn->prepare("INSERT INTO `qa_mcq` (`QuestionCode`, `TopicCode`, `Question`, `ImageLink`, `Op1`, `Op2`, `Op3`, `Op4`, `Answer`) VALUES (:qCode, :tCode, :Qus, :iLink, :op1, :op2, :op3, :op4, :ans)"); //Prepare the statement

                    $stmt->bindValue(':qCode', $mcq_id, PDO::PARAM_STR);
                    $stmt->bindValue(':tCode', $row["TopicCode"], PDO::PARAM_STR);
                    $stmt->bindValue(':Qus', $question, PDO::PARAM_STR);
                    $stmt->bindValue(':iLink', 'NULL', PDO::PARAM_STR);
                    $stmt->bindValue(':op1', $option_One, PDO::PARAM_STR);
                    $stmt->bindValue(':op2', $option_Two, PDO::PARAM_STR);
                    $stmt->bindValue(':op3', $option_Three, PDO::PARAM_STR);
                    $stmt->bindValue(':op4', $option_Four, PDO::PARAM_STR);
                    $stmt->bindValue(':ans', $answer, PDO::PARAM_STR);
                    //Bind all value

                    if ($stmt->execute()) //if true than this will execute
                    {
                        include("../../pages/success_msg/succcess_message.php"); //To view success message
                    }
                }
            } else if ($question_type == "saq") {
                $question = $_POST['type_mcq-question'];
                $answer = $_POST['correct-answer'];



                //to fetch last ID of mcq question for generation of MCQ id
                $fetchLast_id = $pdo_conn->prepare("SELECT `ID` FROM `qa_saq` ORDER BY `ID` DESC LIMIT 1"); //preparing the statement
                $fetchLast_id->execute(); //exacute the query
                $last_id = $fetchLast_id->fetchAll();
                if ($last_id) {
                    foreach ($last_id as $id) {
                        $saq_id = "SAQ" . ($id['ID'] + 1); //Generating SAQ id

                        $stmt = $pdo_conn->prepare("INSERT INTO `qa_saq` (`QuestionCode`, `TopicCode`, `Question`, `ImageLink`,`Answer`) VALUES (:qCode, :tCode, :Qus, :iLink, :ans)");

                        $stmt->bindValue(':qCode', $saq_id, PDO::PARAM_STR);
                        $stmt->bindValue(':tCode', $row["TopicCode"], PDO::PARAM_STR);
                        $stmt->bindValue(':Qus', $question, PDO::PARAM_STR);
                        $stmt->bindValue(':iLink', 'NULL', PDO::PARAM_STR);
                        $stmt->bindValue(':ans', $answer, PDO::PARAM_STR);

                        if ($stmt->execute()) { {
                                include("../../pages/success_msg/succcess_message.php"); //To view success message
                            }
                        }
                    }
                } else {
                    $saq_id = "SAQ0"; //Generating SAQ id

                    $stmt = $pdo_conn->prepare("INSERT INTO `qa_saq` (`QuestionCode`, `TopicCode`, `Question`, `ImageLink`,`Answer`) VALUES (:qCode, :tCode, :Qus, :iLink, :ans)");

                    $stmt->bindValue(':qCode', $saq_id, PDO::PARAM_STR);
                    $stmt->bindValue(':tCode', $row["TopicCode"], PDO::PARAM_STR);
                    $stmt->bindValue(':Qus', $question, PDO::PARAM_STR);
                    $stmt->bindValue(':iLink', 'NULL', PDO::PARAM_STR);
                    $stmt->bindValue(':ans', $answer, PDO::PARAM_STR);

                    if ($stmt->execute()) { {
                            include("../../pages/success_msg/succcess_message.php"); //To view success message
                        }
                    }
                }



            } else if ($question_type == "laq") {
                $question = $_POST['type_mcq-question'];
                $answer = $_POST['correct-answer'];



                //to fetch last ID of mcq question for generation of MCQ id
                $fetchLast_id = $pdo_conn->prepare("SELECT `ID` FROM `qa_laq` ORDER BY `ID` DESC LIMIT 1"); //preparing the statement
                $fetchLast_id->execute(); //exacute the query
                $last_id = $fetchLast_id->fetchAll();
                if ($last_id) {
                    foreach ($last_id as $id) {
                        $laq_id = "SAQ" . ($id['ID'] + 1); //Generating SAQ id

                        $stmt = $pdo_conn->prepare("INSERT INTO `qa_laq` (`QuestionCode`, `TopicCode`, `Question`, `ImageLink`,`Answer`) VALUES (:qCode, :tCode, :Qus, :iLink, :ans)");

                        $stmt->bindValue(':qCode', $laq_id, PDO::PARAM_STR);
                        $stmt->bindValue(':tCode', $row["TopicCode"], PDO::PARAM_STR);
                        $stmt->bindValue(':Qus', $question, PDO::PARAM_STR);
                        $stmt->bindValue(':iLink', 'NULL', PDO::PARAM_STR);
                        $stmt->bindValue(':ans', $answer, PDO::PARAM_STR);

                        if ($stmt->execute()) { {
                                include("../../pages/success_msg/succcess_message.php"); //To view success message
                            }
                        }
                    }
                } else {
                    $laq_id = "LAQ0"; //Generating SAQ id

                    $stmt = $pdo_conn->prepare("INSERT INTO `qa_laq` (`QuestionCode`, `TopicCode`, `Question`, `ImageLink`,`Answer`) VALUES (:qCode, :tCode, :Qus, :iLink, :ans)");

                    $stmt->bindValue(':qCode', $laq_id, PDO::PARAM_STR);
                    $stmt->bindValue(':tCode', $row["TopicCode"], PDO::PARAM_STR);
                    $stmt->bindValue(':Qus', $question, PDO::PARAM_STR);
                    $stmt->bindValue(':iLink', 'NULL', PDO::PARAM_STR);
                    $stmt->bindValue(':ans', $answer, PDO::PARAM_STR);

                    if ($stmt->execute()) { {
                            include("../../pages/success_msg/succcess_message.php"); //To view success message
                        }
                    }
                }
            }

        }





    } catch (PDOException $e) {
        ?>

        <body style="margin:0px; padding:0px">
            <div
                style="display:flex; justify-content:center;width:100%;height:100vh;background-color:rgba(0,0,0,0.5); font-family: 'Gill Sans', sans-serif; ">
                <div
                    style="display:flex; flex-direction:column;gap:20px;width:300px;height:150px;border-radius:2px;background-color:white;margin-top:10px">
                    <p style="text-align:center;margin-top:30px">Some Internal Error Occurred! Please Try Again</p>
                    <button onclick="login_page()"
                        style="align-self:center;width:80px;height:30px;background-color:#dc2f2f;border:none;color:white;border-radius:2px;font-family: 'Gill Sans', sans-serif;cursor:pointer">Ok</button>
                </div>
            </div>

            <script>
                function login_page() {
                    window.location.href = "http://localhost/KaziSirProject/pages/components/addquestion/mcq_question.php?subject=<?php echo urlencode($subject) ?>&chapter=<?php echo urlencode($chapter) ?>&topic=<?php echo urlencode($topic) ?>&question_type=<?php echo $question_type ?>"; //return to previous page
                }
            </script>
        </body>
        <?php
    }

}
?>