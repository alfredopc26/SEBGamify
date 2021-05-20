<?php
$title = "Dashboard";

include_once "./layout/header.php";
include_once "./layout/navbar.php";
include_once "./layout/sidebar.php";
?>
<div class="content-wrapper">
<?php include_once "./layout/content-header.php"; ?>

   <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>0</h3>

                <p>Asignaturas Activas</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>0<sup style="font-size: 20px">%</sup></h3>

                <p>Actividades Realizadas</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <h3>0<sup style="font-size: 20px">%</sup></h3>

                <p>Actividades Pendientes</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>0<sup style="font-size: 20px">%</sup></h3>

                <p>Actividades Vencidas</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

        <div id="ajax-table"></div>
        
      </div><!-- /.container-fluid -->
    </section>

</div>
<?php include_once "./layout/footer.php"; ?>

<script>
$(document).ready(getTable());

function getTable(){

    var table = "<?php echo $mod['table_main']; ?>";
    var uid = "<?php echo $user->uid; ?>";

    $('#ajax-table').html('<div class="loading" style="text-align: center"><img src="./dist/img/loader.gif"/><br/>Un momento, por favor...</div>');
        $.ajax({
            type: "GET",
            url: './script/response_ajax.php',
            dataType: 'html',
            data: 'action='+table+'&uid='+uid,
            success: function(data){ 
                console.log(data);
                $('#ajax-table').html(data);       	   
            }     
        });

}
</script>
</body>
</html>