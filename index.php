<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="./script/JQuery/jquery-3.7.1.js"></script>

    <link rel="stylesheet" href="./style/index-animation.css">

    <!--Icon SDN start-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!--Above is Bootsrap icon CDN-->

    <!--Icon SDN end-->

    <!--Animation Library start-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!--Animation Library end-->

    <title>Home Page</title>
</head>

<body id="body">
    <nav class="nav-bar">
        <a class="button" id="home">Home</a>
        <a class="button" id="about-us">About us</a>
        <a class="button" id="login">Login</a>
    </nav>

    <div class="hero">
        <div class="intro">
            <div class="intro-container">
                <div class="animate__animated animate__fadeInDownBig animation_one">Welcome to the Question Bank!</div>
            </div>

            <div class="animate__animated animate__fadeIn animation_two">Learn Better, Prepare Smarter</div>
            <div class="text animate__animated animate__fadeIn animation_three">A vast collection of subject-specific
                questions.</div>
            <div class="text animate__animated animate__fadeIn animation_three">Previous years' exam papers for better
                practice.</div>
        </div>

        <div class="owner">
            <div class="owner-info">
                <div class="owner-image_div animate__animated animate__fadeInLeftBig"><img class="owner-image"
                        src="./static/src/img/dev2.jpg" alt="owner-img"></div>
                <p class="owner-intro animate__animated animate__fadeInRightBig">Kazi Sir Website owner, a dedicated
                    teacher, managing a comprehensive question bank with various
                    subjects and past year questions for students</p>
            </div>
        </div>

    </div>




    <footer class="footer">
        <div class="developer-div">
            <div class="dev dev-1"><img class="dev-image" src="./static/src/img/Soumya.jpg" alt="dev-image">
                <p>Soumya Munshi</p>
                <p>Designed and developed both front-end and back-end of the website</p>
            </div>
            <div class="dev dev-1"><img class="dev-image" src="./static/src/img/Priyatosh_Sarkar.png" alt="dev-image">
                <p>Priyatosh Sarkar</p>
                <p>Developed the Back-end of the website
            </div>
            <div class="dev dev-1"><img class="dev-image" src="./static/src/img/Sagar_Dey.png" alt="dev-image">
                <p>Sagar Dey</p>
                <p>Designed and developed front-end of the website</p>
            </div>
            <div class="dev dev-1"><img class="dev-image" src="./static/src/img/Dipendu_Das.png" alt="dev-image">
                <p>Dipendu Das</p>
                <p>Designed and developed the back-end of the website</p>
            </div>
        </div>
    </footer>

    <!--Pop-up login-->
    <div id="login_container" class="login hidden">
        <!--login form will load here-->
        <div class="login-container" class="login-container">
            <div id="login_close" class="login_close"><i class="bi bi-x"></i></div>
            <div class="login-div">
                <h2 class="login-intro">Login Here</h2>

                <form class="login-form" action="./php/login.php" method="post">
                    <input class="username" type="text" name="username" placeholder="Username" required>
                    <input class="password" type="password" name="password" placeholder="Password" required>
                    <input class="submit" type="submit" name="submit">
                </form>

            </div>
        </div>

    </div>

    <script>
        document.getElementById("about-us").addEventListener("click", () => {
            const container = document.querySelector(".footer");
            container.scrollIntoView({ behavior: "smooth" }); //scroll to footer
        });
        document.getElementById("home").addEventListener("click", () => {
            const container = document.querySelector(".hero");
            container.scrollIntoView({ behavior: "smooth" }); //scroll to footer
        });

        document.getElementById("login").addEventListener("click", () => {
            document.getElementById("login_container").classList.remove("hidden");
            document.getElementById("body").classList.add("disable-scrollbar");

        });

        document.getElementById("login_close").addEventListener("click", () => {
            document.getElementById("login_container").classList.add("hidden");
            document.getElementById("body").classList.remove("disable-scrollbar");

        });

        document.getElementById("dev-1").addEventListener("mouseover", () => {
            document.getElementById("dev-1").classList.add("dev-1");
        });

        document.getElementById("dev-1").addEventListener("mouseout", () => {
            document.getElementById("dev-1").classList.remove("dev-1");
        });

        document.getElementById("dev-2").addEventListener("mouseover", () => {
            document.getElementById("dev-2").classList.add("dev-2");
        });

        document.getElementById("dev-2").addEventListener("mouseout", () => {
            document.getElementById("dev-2").classList.remove("dev-2");
        });

        document.getElementById("dev-3").addEventListener("mouseover", () => {
            document.getElementById("dev-3").classList.add("dev-3");
        });

        document.getElementById("dev-3").addEventListener("mouseout", () => {
            document.getElementById("dev-3").classList.remove("dev-3");
        });


    </script>

    <!--This scripts for animation-->
    <script src="./script/Animation/three.min.js"></script>
    <script src="./script/Animation/vanta.waves.min.js"></script>
    <script>
        VANTA.WAVES({
            el: ".footer",
            mouseControls: true,
            touchControls: true,
            gyroControls: false,
            minHeight: 200.00,
            minWidth: 200.00,
            scale: 1.00,
            scaleMobile: 1.00
        })
    </script>

</body>

</html>