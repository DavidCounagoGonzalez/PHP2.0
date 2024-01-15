<div class="row">    
    <?php
    if (isset($usuarios)) {
        ?>
        <div class="col-12">
            <div class="card shadow mb-4">
                <form method="get" action="con-filtros">
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Filtros</h6>                                    
                    </div>
                    <div class="card-body">
                        <div class="row">  
                            <div class="col-12 col-lg-4">
                                <div class="mb-3">
                                    <label for="username">Nombre completo:</label>
                                    <input type="text" class="form-control" name="username" id="username" value="<?php echo (isset($input['username'])) ? $input['username'] : "" ?>" />
                                </div>
                            </div> 
                            <div class="col-12 col-lg-4">
                                <div class="mb-3">
                                    <label for="id_rol">Rol:</label>
                                    <select name="id_rol" id="id_rol" class="form-control select2" data-placeholder="Tipo proveedor">
                                        <option value="">-</option>
                                        <?php
                                        foreach ($roles as $rol) {
                                            ?> <option value="<?php echo $rol['id_rol'] ?>" <?php echo (isset($_GET['id_rol']) && $rol['id_rol'] == $_GET['id_rol']) ? 'selected' : ''; ?> ><?php echo ucfirst($rol['nombre_rol']) ?> </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>                        
                            <div class="col-12 col-lg-4">
                                <div class="mb-3">
                                    <label for="anho_fundacion">Salario:</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="min_salar" id="min_salar" value="" placeholder="Mí­nimo" />
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="max_salar" id="max_salar" value="" placeholder="Máximo" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-12 text-right">                     
                            <a href="/con-filtros" value="" name="reiniciar" class="btn btn-danger">Reiniciar filtros</a>
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
                                foreach ($usuarios as $row) {

                                    if ($row['activo'] == 0) {
                                        ?> <tr class = "table-danger">
                                            <?php
                                        } else {
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

