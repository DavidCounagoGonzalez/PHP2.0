<div class="row">    
    <?php
    if(isset($isOk)){        
        ?>
    <div class="col-12">
        <div class="alert alert-<?php echo $isOk ? 'success' : 'danger'; ?>">
            <?php echo $isOk ? 'Son anagramas' : 'No son anagramas'; ?>
        </div>
    </div>
    <?php
    }    
    ?>
    <div class="col-12">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Comprobar anagrama</h6>                                    
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <!--<form action="./?sec=formulario" method="post">                   -->
                <form method="post" action="/anagrama">  
                    <div class="mb-3">
                        <label for="palabra1">Palabra 1:</label>
                        <input class="form-control" id="palabra1" type="text" name="palabra1" placeholder="Palabra a comprobar 1" value="<?php echo isset($input['palabra1']) ? $input['palabra1'] : ''; ?>">                        
                        <p class="text-danger"><?php echo isset($errores['palabra1']) ? $errores['palabra1'] : ''; ?></p>
                    </div>
                    <div class="mb-3">
                        <label for="email">Palabra 2:</label>
                        <input class="form-control" id="palabra2" type="text" name="palabra2" placeholder="Palabra a comprobar 2" value="<?php echo isset($input['palabra2']) ? $input['palabra2'] : ''; ?>">                        
                        <p class="text-danger"><?php echo isset($errores['palabra2']) ? $errores['palabra2'] : ''; ?></p>
                    </div>                    
                    <div class="mb-3">
                        <input type="submit" value="Enviar" name="enviar" class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>
    </div>                        
</div>
