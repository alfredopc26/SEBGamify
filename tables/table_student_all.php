<div class="row">
            <div class="col-lg-12">
                <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Todos los estudiantes</h3>

                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" title="Recargar">
                                <i class="fas fa-sync"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            </div>
                        </div>
                        <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Correo</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Semestre actual</th>
                                <th>Asignaturas</th>
                                <th>Estado</th>
                                <th>E-coins</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($students as $obj){ ?>
                            <tr>
                                <td><?php echo $obj->email; ?></td>
                                <td><?php echo $obj->nombre; ?></td>
                                <td><?php echo $obj->apellido; ?></td>
                                <td><?php echo $obj->semestre; ?></td>
                                <td><?php echo $obj->asignatura; ?></td>
                                <td><?php echo $obj->estado; ?></td>
                                <td><?php echo $obj->ecoins; ?></td>
                            </tr>
                            <?php  } ?>
                        </tbody>
                        </table> 

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