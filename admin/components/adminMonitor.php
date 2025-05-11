<div class="d-flex gap-5 p-2">
<div class="d-flex flex-column gap-2">
    <label for="date">Enter date to search:</label>
    <input class="form-control-sm" id="date" type="date" required>
</div>
<button class="btn btn-success align-self-center" id="search">Search</button>
</div>

<div class="d-flex flex-column gap-2 p-2" id="loadMonitor">
</div>

<script src="../javascript/Jquery/jquery-3.7.1.js"></script> <!--Adding jquery library-->
<script>
    $("#search").click(()=>{
        $("#loadMonitor").load("../components/monitorDeatils.php"); //addding monitor details
    })
</script>