<div class="row">    
    <?php
    if (isset($usuarios)) {
        ?>
        <div class="col-12">
            <div class="card shadow mb-4">
                <form method="get" action="con-filtros">
                    <input type="hidden" class="form-control" name="campo" id="campo" value="<?php echo $campo?>"/>
                    <input type="hidden" class="form-control" name="sentido" id="sentido" value="<?php echo $sentido?>"/>
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
                                        <th><a href="/con-filtros?campo=1&sentido=<?php echo ($campo == 1 && $sentido == 'asc') ? 'desc' : 'asc' ?>&<?php echo $parametros ?>">Usuarios</a><?php echo ($campo == 1) ? '<i class="fas fa-sort-amount-'.($sentido == 'asc' ? 'down' : 'up' ).'-alt">' : '' ?></th>
                                        <th><a href="/con-filtros?campo=2&sentido=<?php echo ($campo == 2 && $sentido == 'asc') ? 'desc' : 'asc' ?>&<?php echo $parametros ?>">Rol</a><?php echo ($campo == 2) ? '<i class="fas fa-sort-amount-'.($sentido == 'asc' ? 'down' : 'up' ).'-alt">' : '' ?></th>
                                        <th><a href="/con-filtros?campo=3&sentido=<?php echo ($campo == 3 && $sentido == 'asc') ? 'desc' : 'asc' ?>&<?php echo $parametros ?>">salarioBruto</a><?php echo ($campo == 3) ? '<i class="fas fa-sort-amount-'.($sentido == 'asc' ? 'down' : 'up' ).'-alt">' : '' ?></th>
                                        <th><a href="/con-filtros?campo=4&sentido=<?php echo ($campo == 4 && $sentido == 'asc') ? 'desc' : 'asc' ?>&<?php echo $parametros ?>">retencionIRPF</a><?php echo ($campo == 4) ? '<i class="fas fa-sort-amount-'.($sentido == 'asc' ? 'down' : 'up' ).'-alt">' : '' ?></th>
                                        <th><a href="/con-filtros?campo=5&sentido=<?php echo ($campo == 5 && $sentido == 'asc') ? 'desc' : 'asc' ?>&<?php echo $parametros ?>">Región</a><?php echo ($campo == 5) ? '<i class="fas fa-sort-amount-'.($sentido == 'asc' ? 'down' : 'up' ).'-alt">' : '' ?></th>
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
                        <p id="numRegistros">Resultados encontrados: <?php echo $numRegistros ?></p>
            </div>
                <div class="card-footer">
                    <nav aria-label="Navegación por paginas">
                        <ul class="pagination justify-content-center">
                            <?php 
                            if($page>1){
                            ?>
                            <li class="page-item">
                                <a class="page-link" href="/con-filtros?page=<?php echo 1 ?>&<?php echo $parametrosPag ?>" aria-label="First">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">First</span>
                                </a> 
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="/con-filtros?page=<?php echo $page-1 ?>&<?php echo $parametrosPag ?>"" aria-label="First">
                                    <span aria-hidden="true">&lt;</span>
                                    <span class="sr-only">Previous</span>
                                </a> 
                            </li>
                            <?php } ?>
                            <li class="page-item active"><a class="page-link" href="/con-filtros?page=<?php echo $page?>&<?php echo $parametrosPag ?>"><?php echo $page ;?></a></li>
                            <?php  
                            if($page < $totalPaginas){
                            ?>
                            <li class="page-item">
                                <a class="page-link" href="/con-filtros?page=<?php echo $page+1 ?>&<?php echo $parametrosPag ?>" aria-label="First">
                                    <span aria-hidden="true">&gt;</span>
                                    <span class="sr-only">Next</span>
                                </a> 
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="/con-filtros?page=<?php echo $totalPaginas ?>&<?php echo $parametrosPag ?>" aria-label="First">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Last</span>
                                </a> 
                            </li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
        </div>
    </div>

