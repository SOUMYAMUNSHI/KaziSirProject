<?php

session_start();
if (isset($_SESSION["username"])) //verifying session
{
    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
            integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!--nimation CDN start-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <!--nimation CDN start-->

        <!--CSS style-->
        <link rel="stylesheet" href="../style/user-home.css">
        <link rel="stylesheet" href="../style/user-home_addQustion.css">
        <!--CSS style-->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
            integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!--Lottie animation library to load animation start-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.12.2/lottie.min.js"></script>
        <!--Lottie animation library to load animation start-->

        <title>Home Page</title>
    </head>

    <body>
        <?php
        ?>
        <div>
            <div class="main-container">
                <div class="navigation">
                    <div class="profile">
                        <img class="user-image" src="../static/src/img/dev2.jpg" alt="user-image">
                        <p>Welcome User</p>
                    </div>

                    <div class="options">
                        <table class="optoin-table">
                            <td class="table-data" id="question-bank">Question Bank</td>
                            <!-- <td class="table-data" id="star-question">Star Questions</td> -->
                            <td class="table-data">GATE</td>
                            <td class="table-data" id="search">Search</td>
                            <td class="table-data" id="add_questions">Add Question</td>
                        </table>
                    </div>

                    <div class="settings">
                        <p class="admin-pannel" id="admin-pannel">Admin Pannel</p>
                        <form method="post" action="http://localhost/KaziSirProject/php/logout/logout.php">
                            <button id="log-out" class="log-out" type="submit">Log out</button>
                        </form>
                    </div>
                </div>
                <div class="view">
                    <!--components will load here-->

                    <!--book animation start-->
                    <div id="animation-div" class="animation-div" style="width:500px;">
                        <div id="animation"></div>
                    </div>
                    <!--book animation end-->

                </div>


            </div>
        </div>

        <!--Aadding jquery-->
        <script src="../script/JQuery/jquery-3.7.1.js"></script>
        <!--Adding related functions-->
        <script src="../script/user-home.js"></script>

    </body>

    </html>




    <?php

} else if (!isset($_SESSION["username"])) {
    ?>

        <body style="margin:0px; padding:0px">
            <div
                style="display:flex; justify-content:center;width:100%;height:100vh;background-color:rgba(0,0,0,0.5); font-family: 'Gill Sans', sans-serif; ">
                <div
                    style="display:flex; flex-direction:column;gap:20px;width:300px;height:150px;border-radius:2px;background-color:white;margin-top:10px">
                    <p style="text-align:center;margin-top:30px">Please Login</p>
                    <button onclick="login_page()"
                        style="align-self:center;width:80px;height:30px;background-color:#dc2f2f;border:none;color:white;border-radius:2px;font-family: 'Gill Sans', sans-serif;cursor:pointer">Ok</button>
                </div>
            </div>

            <script>
                function login_page() {
                    window.location.href = "http://localhost/KaziSirProject/index.html"; //return to index page
                }
            </script>
        </body>

    <?php
}

?>