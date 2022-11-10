<div class="row">    
    <?php
    if(isset($isOk) && $isOk){
        ?>
    <div class="col-12">
        <div class="alert alert-success">
            ¡Registro guardado correctamente!
        </div>
    </div>
    <?php
    }
    ?>
    <div class="col-12">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Formulario examen</h6>                                    
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <!--<form action="./?sec=formulario" method="post">                   -->
                <form method="post" action="/formulario">  
                    <div class="mb-3">
                        <label for="username">Nombre de usuario:</label>
                        <input class="form-control" id="username" type="text" name="username" placeholder="Username" value="<?php echo isset($input['username']) ? $input['username'] : ''; ?>">                        
                        <p class="text-danger"><?php echo isset($errores['username']) ? $errores['username'] : ''; ?></p>
                    </div>
                    <div class="mb-3">
                        <label for="email">Enderezo electrónico</label>
                        <input class="form-control" id="email" type="email" name="email" placeholder="name@example.com" value="<?php echo isset($input['email']) ? $input['email'] : ''; ?>">                        
                        <p class="text-danger"><?php echo isset($errores['email']) ? $errores['email'] : ''; ?></p>
                    </div>
                    <div class="mb-3">
                        <label for="matricula">Matrícula:</label>
                        <input class="form-control" id="matricula" type="text" name="matricula" placeholder="1234ABC" value="<?php echo isset($input['matricula']) ? $input['matricula'] : ''; ?>">                        
                        <p class="text-danger"><?php echo isset($errores['matricula']) ? $errores['matricula'] : ''; ?></p>
                    </div>                    
                    <div class="mb-3">
                        <label for="opciones">Opciones</label>  
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <input class="form-check-input" id="suscribirse" type="checkbox" value="suscribirse" name="opcions[]" <?php echo isset($_POST['opcions']) && in_array('suscribirse', $_POST['opcions']) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="suscribirse">Suscribirse</label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <input class="form-check-input" id="socio" type="checkbox" value="socio" checked" name="opcions[]" <?php echo isset($_POST['opcions']) && in_array('socio', $_POST['opcions']) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="socio">Socio</label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <input class="form-check-input" id="tarjeta" type="checkbox" value="tarjeta" name="opcions[]" <?php echo isset($_POST['opcions']) && in_array('tarjeta', $_POST['opcions']) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="tarjeta">Tarjeta</label>
                                    </div>
                                </div>                                
                                <p class="text-danger"><?php echo isset($errores['opcions']) ? $errores['opcions'] : ''; ?></p>
                            </div>
                        </div>
                    <div class="mb-3">
                        <label for="mi_src">Mi código fuente:</label>
                        <textarea class="form-control" id="mi_src" name="mi_src" rows="3"><?php echo isset($input['mi_src']) ? $input['mi_src'] : ''; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Enviar" name="enviar" class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>
    </div>                        
</div>
