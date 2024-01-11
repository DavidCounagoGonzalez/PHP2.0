<div class="row">    
    <?php
    if(isset($usuarios)){        
        ?>
    <div class="col-12">
        <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Listado de Usuarios</h6>                                    
                </div>
                <!-- Card Body -->
                <div class="card-body">
    <div class="col-12">
        <div>
            <table class="table table-striped">
                <tr>
                    <th>Usuarios</th>
                    <th>Rol</th>
                    <th>salarioBruto</th>
                    <th>retencionIRPF</th>
                </tr>
            <?php
                    foreach ($usuarios as  $row){
                        
                        if($row['activo'] == 0){
                            ?> <tr class = "table-danger">
                            <?php
                        }else{
                            ?> <tr> 
                            <?php
                        }
                        ?>
                    <td><?php echo $row['username'] ?></td>
                    <td><?php echo $row['rol'] ?></td>
                    <td><?php echo $row['salarioBruto'] ?></td>
                    <td><?php echo $row['retencionIRPF'] ?></td>
                </tr>
                        <?php
                    }
            ?>
            </table>
        </div>
    </div>
    <?php
    }
    ?>
        </div>
    </div>
    </div>
