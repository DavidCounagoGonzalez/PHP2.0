<div class="row">    
    <?php
    if(isset($res)){        
        ?>
    <div class="col-12">
        <div class="alert alert-success">
            <?php
                    var_dump($res);
            ?>
        </div>
    </div>
    <?php
    }    
    ?>
    <div class="col-12">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Notas Alumnos</h6>                                    
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <!--<form action="./?sec=formulario" method="post">                   -->
                <form method="post" action="">  
                    <div class="mb-3">
                        <label for="mi_src">Indica el json con los datos:</label>
                        <textarea class="form-control" id="texto" name="texto" rows="3"<?php echo isset($input['texto']) ? $input['texto'] : ''; ?>></textarea>
                        <p class="text-danger"><?php echo (isset($errores['texto'])) ? implode(" ", $errores['texto']) : ''; ?></p>
                    </div>                
                    <div class="mb-3">
                        <input type="submit" value="Enviar" name="enviar" class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>
    </div>                        
</div>