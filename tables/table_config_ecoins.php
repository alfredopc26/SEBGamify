<div class="row">
            <div class="col-lg-12">
                <div class="card">
                        <div class="card-header">
                            <h3>Configuracion de Actividades</h3>
                        </div>
                        <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Descripcion</th>
                                <th>Asignatura</th>
                                <th>Valor en E-Coins</th>
                                <th>Fecha vencimiento</th>
                                <th>Estado</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($activity as $obj){ ?>
                            <tr>
                                <td><?php echo $obj->id; ?></td>
                                <td><?php echo $obj->asunto; ?></td>
                                <td><?php echo $obj->nombre; ?></td>
                                <td><?php echo $obj->ecoins; ?></td>
                                <td><?php echo $obj->fecha_entrega; ?></td>
                                <td><?php echo $obj->estado; ?></td>
                                <td>                        
                                    <div class="timeline-footer">
                                        <a href="#" class="btn btn-primary btn-xs" data-id='<?php echo $obj->id; ?>' id="approve">Modificar</a>
                                        <a href="#" class="btn btn-danger btn-xs">Cancelar</a>
                                    </div>
                                </td>
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