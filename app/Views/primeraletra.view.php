<div class="row">    
    <?php
    if(isset($resultado)){        
        ?>
    <div class="col-12">
        <div class="alert alert-success">
            <?php
            foreach($resultado as $letra => $lista){
                echo "Palabras que empiezan por $letra: ";
                $primera = true;
                foreach($lista as $palabra){
                    echo ($primera) ? "\"$palabra\"" : ", \"$palabra\"";
                    $primera = false;
                }
                echo '<br />';
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
                <h6 class="m-0 font-weight-bold text-primary">Primera letra</h6>                                    
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <!--<form action="./?sec=formulario" method="post">                   -->
                <form method="post" action="/letra-palabras">  
                    <div class="mb-3">
                        <label for="mi_src">Texto a analizar:</label>
                        <textarea class="form-control" id="texto" name="texto" rows="3"><?php echo isset($input['texto']) ? $input['texto'] : ''; ?></textarea>
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
