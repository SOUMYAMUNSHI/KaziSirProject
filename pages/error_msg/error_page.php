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
            window.location.href = "http://localhost/KaziSirProject/index.php"; //return to previous page
        }
    </script>
</body>