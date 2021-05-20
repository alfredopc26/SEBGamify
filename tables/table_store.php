<div class="row">
            <div class="col-lg-12">
                <div class="card">
                        <div class="card-header">
                            <h3>Listado de regalos por E-coins ganado</h3>
                        </div>
                        <div class="card-body">
                        <div class="row">
                            <?php foreach($asign as $a){ ?>

                            <div class="col-12 col-sm-6 col-md-5">
                                <div class="info-box" style="cursor: pointer;">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-arrow-up"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text"><?php echo $a->descripcion; ?></span>
                                    <span class="info-box-number">
                                    <?php echo $a->valor; ?>
                                    <i class="fas fa-coins"></i>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            <?php } ?>
                        <!-- /.col -->
                        </div>

                        </div>
                    </div>
                </div> 
        </div>

<script>
    $(document).on('click', '#approve', function(){

    var uid= $(this).data('uid');

        $('#ajax-table').html('<div class="loading" style="text-align: center"><img src="./dist/img/loader.gif"/><br/>Un momento, por favor...</div>');
        $.ajax({
            type: "GET",
            url: './script/response_ajax.php',
            dataType: 'html',
            data: 'uid='+uid+'&action=approvaluid',
            success: function(data){ 

                $('#ajax-table').html(data);       
            }     
        });

    });

</script>