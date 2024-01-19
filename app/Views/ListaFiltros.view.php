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
                                    <select name="id_rol" id="id_rol" class="form-control select2" data-placeholder="Rol">
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
                                            <input type="text" class="form-control" name="min_salar" id="min_salar" value="<?php echo (isset($input['min_salar'])) ? $input['min_salar'] : "" ?>" placeholder="Mí­nimo" />
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="max_salar" id="max_salar" value="<?php echo (isset($input['max_salar'])) ? $input['max_salar'] : "" ?>" placeholder="Máximo" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="mb-3">
                                    <label for="anho_fundacion">Retención:</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="min_retencion" id="min_retencion" value="<?php echo (isset($input['min_retencion'])) ? $input['min_retencion'] : "" ?>" placeholder="Mí­nimo" />
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="max_retencion" id="max_retencion" value="<?php echo (isset($input['max_retencion'])) ? $input['max_retencion'] : "" ?>" placeholder="Máximo" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="mb-3">
                                    <label for="id_pais">Paises:</label>
                                    <select name="id_pais[]" id="id_pais" class="form-control select2" data-placeholder="Pais" multiple>
                                        <option value="">-</option>
                                        <?php foreach ($paises as $pais) {?>
                                            <option value="<?php echo $pais['id']; ?>" <?php echo (isset($input['id_pais']) && in_array($pais['id'], $input['id_pais'])) ? 'selected' : ''; ?>><?php echo $pais['country_name']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
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
                        <?php
                        if (count($usuarios) > 0) {
                            ?>
                            <div>
                                <table class="table table-striped">
                                    <tr>
                                        
                                        <th><a href="/con-filtros?campo=username">Usuarios</a></th>
                                        <th><a href="/con-filtros?campo=id_rol">Rol</a></th>
                                        <th><a href="/con-filtros?campo=salarioBruto">salarioBruto</a></th>
                                        <th><a href="/con-filtros?campo=retencionIRPF">retencionIRPF</a></th>
                                        <th><a href="/con-filtros?campo=country_name">Región</a></th>
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
                                            <td><?php echo $row['country'] ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="alert alert-warning">No se han encontrado usuarios que cumplan los requisitos</div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>

