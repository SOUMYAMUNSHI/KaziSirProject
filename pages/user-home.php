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
        <link rel="stylesheet" href="../style/user-home.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
            integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <title>Home Page</title>
    </head>

    <body>
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
                            <td class="table-data" id="star-question">Star Questions</td>
                            <td class="table-data">GATE</td>
                            <td class="table-data" id="search">Search</td>
                            <td class="table-data" id="search">Add Question</td>
                        </table>
                    </div>

                    <div class="settings">
                        <p class="admin-pannel" id="admin-pannel">Admin Pannel</p>
                        <p class="log-out">Log out</p>
                    </div>
                </div>
                <div class="view">
                    <!--components will load here-->
                </div>

            </div>
        </div>


        <script src="../script/JQuery/jquery-3.7.1.js"></script>
        <script>

            function view_queston() { window.open("./view-question.html", "_blank") }; //load the view-question page

            $("#question-bank").click(function () { $(".view").load("./components/question-card.html") }); //view question-card

            $("#search").click(function () { $(".view").load("./components/search-book.html") }); //view search-book

            $("#star-question").click(function () { $(".view").load("./components/star-question.html") });

            $("#admin-pannel").click(function () { $(".view").load("./components/admin-login.html") });

        </script>

    </body>

    </html>




    <?php

} else {
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