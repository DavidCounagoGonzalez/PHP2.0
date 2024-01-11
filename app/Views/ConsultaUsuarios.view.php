<div class="row">    
    <?php
    if(isset($usuarios)){        
        ?>
    <div class="col-12">
    <div class="card shadow mb-4">
        <form method="get" action="/proveedores">
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Filtros</h6>                                    
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-4">
                     <label for="selector">Categoría:</label>
                     <select name="selector" id="selector">
                         <option value="administrador">Administrador</option>
                        <option value="dev" selected>Desarrollador</option>
                        <option value="facturas">Facturas</option>
                        <option value="gestor">Gestor</option>
                        <option value="standard">Estandar</option>
                        <option value="ventas">Ventas</option>
                      </select>
                </div>
                <div class="col-12 col-lg-3">
                    <label for="username">Nombre:</label>
                    <input type="text" class="form-control" name="username" id="username" value=""/>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="col-12 text-right">                     
                <a href="/all-usuarios" value="" name="reiniciar" class="btn btn-danger">Reiniciar filtros</a>
                <input type="submit" value="Aplicar filtros" name="enviar" class="btn btn-primary ml-2"/>
            </div>
        </div>
        </form>
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
