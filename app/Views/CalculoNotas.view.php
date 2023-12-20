<head>
    <style>
        table{
            text-align: center;
            border: 2px solid black;
        }
        th, td{
            border: 1px solid black;
            padding: 10px;
        }
    </style>
</head>
<body>
<div class="row">    
    <?php
    if(isset($res)){        
        ?>
    <div class="col-12">
        <div class="alert alert-success">
            <table>
                <tr>
                    <td></td>
                    <th>Media</th>
                    <th>Aprobados</th>
                    <th>Suspensos</th>
                    <th>Max</th>
                    <th>Min</th>
                </tr>
            <?php
                    foreach ($res as $nombreAsignatura => $datosAsignatura) {
                        ?>
                <tr>
                    <th><?php echo $nombreAsignatura ?></th>
                    <td><?php echo $datosAsignatura['media'] ?></td>
                    <td><?php echo $datosAsignatura['aprobados'] ?></td>
                    <td><?php echo $datosAsignatura['suspensos'] ?></td>
                    <td><?php echo $datosAsignatura['max']['alumno'] . ": " . $datosAsignatura['max']['nota'] ?></td>
                    <td><?php echo $datosAsignatura['min']['alumno'] . ": " . $datosAsignatura['min']['nota'] ?></td> 
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
    <div class="col-12">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Cálculo Notas</h6>                                    
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
</body>