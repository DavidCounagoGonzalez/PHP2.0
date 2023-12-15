<div class="row">    
    <?php
    if(isset($resultado)){        
        ?>
    <div class="col-12">
        <div class="alert alert-success">
            <?php
            echo "Contar repetición de letras en una cadena: ";
            foreach($resultado as $letra => $lista){
                 echo "<br /> La letra '" . $letra . "' se repite : " . $lista . " veces";
            }
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
                <h6 class="m-0 font-weight-bold text-primary">Contar letras</h6>                                    
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <!--<form action="./?sec=formulario" method="post">                   -->
                <form method="post" action="/contar-letras">  
                    <div class="mb-3">
                        <label for="mi_src">Texto a analizar:</label>
                        <input type="text" class="form-control" id="texto" name="texto" rows="3"<?php echo isset($input['texto']) ? $input['texto'] : ''; ?>>
                        <p class="text-danger"><?php echo (isset($errores['texto'])) ? $errores['texto'] : ''; ?></p>
                    </div>                
                    <div class="mb-3">
                        <input type="submit" value="Enviar" name="enviar" class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>
    </div>                        
</div>