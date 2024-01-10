<div class="row">    
    <?php
    if(isset($usuarios)){        
        ?>
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
