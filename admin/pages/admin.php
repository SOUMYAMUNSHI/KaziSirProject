<?php
include_once("./header.php"); //Include the header page
?>

<body>


  <nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="#">Admin Page</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto gap-3">
          <li class="nav-item">
            <p class="nav-link active text-white m-0" style="cursor:pointer" id="admin">Admin</p>
          </li>
          <li class="nav-item">
            <p class="nav-link text-white m-0" style="cursor:pointer" id="monitor">Monitor</p>
          </li>
          <li class="nav-item me-4">
            <p class="nav-link text-white m-0" style="cursor:pointer" id="others">Others</p>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container bg-light rounded-2 mt-2 h-auto d-flex flex-column gap-3 align-items-center p-4" id="container">

  </div>




  <script src="../javascript/Jquery/jquery-3.7.1.js"></script> <!--Adding jquery-->
  <script>
    $(document).ready(()=>{
      $("#container").load("../components/adminComponent.php");
    });

    $("#monitor").click(()=>{
      $("#container").load("../components/adminMonitor.php");
      $("#monitor").addClass("active");
      $("#admin").removeClass("active");
      $("#others").removeClass("active");
    });

    $("#admin").click(()=>{
      $("#container").load("../components/adminComponent.php");
      $("#admin").addClass("active");
      $("#monitor").removeClass("active");
      $("#others").removeClass("active");
    });

    $("#others").click(()=>{
      $("#container").load("../components/adminOthers.php");
      $("#others").addClass("active");
      $("#monitor").removeClass("active");
      $("#admin").removeClass("active");
    });
  </script>


</body>

<?php
include_once("./footer.php"); //Including the footer page
?>