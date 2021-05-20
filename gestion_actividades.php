<?php
$title = "Actividades";

include_once "./layout/header.php";
include_once "./layout/navbar.php";
include_once "./layout/sidebar.php";
?>
<div class="content-wrapper">
<?php include_once "./layout/content-header.php"; ?>

   <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->


        <div id="ajax-table"></div>
        
      </div><!-- /.container-fluid -->
    </section>

</div>
<?php include_once "./layout/footer.php"; ?>

<script>
$(document).ready(getTable());

function getTable(){


    $('#ajax-table').html('<div class="loading" style="text-align: center"><img src="./dist/img/loader.gif"/><br/>Un momento, por favor...</div>');
        $.ajax({
            type: "GET",
            url: './script/response_ajax.php',
            dataType: 'html',
            data: 'action=getTableAllActivity',
            success: function(data){ 
                console.log(data);
                $('#ajax-table').html(data);       	   
            }     
        });

}
</script>
</body>
</html>