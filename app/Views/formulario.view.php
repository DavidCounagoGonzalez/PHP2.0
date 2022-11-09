<div class="row">        
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
                        <input class="form-control" id="username" type="text" name="username" placeholder="Username">                        
                    </div>
                    <div class="mb-3">
                        <label for="email">Enderezo electrónico</label>
                        <input class="form-control" id="email" type="email" name="email" placeholder="name@example.com">                        
                    </div>
                    <div class="mb-3">
                        <label for="matricula">Matrícula:</label>
                        <input class="form-control" id="matricula" type="text" name="matricula" placeholder="1234ABC">                        
                    </div>                    
                    <div class="mb-3">
                        <label for="opciones">Opciones</label>  
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <input class="form-check-input" id="flexCheckDefault" type="checkbox" value="suscribirse" name="opcions[]">
                                        <label class="form-check-label" for="flexCheckDefault">Suscribirse</label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <input class="form-check-input" id="flexCheckChecked" type="checkbox" value="socio" checked" name="opcions[]">
                                        <label class="form-check-label" for="flexCheckChecked">Socio</label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <input class="form-check-input" id="flexCheckDisabled" type="checkbox" value="tarjeta" disabled name="opcions[]">
                                        <label class="form-check-label" for="flexCheckDisabled">Tarjeta</label>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    <div class="mb-3">
                        <label for="mi_src">Mi código fuente:</label>
                        <textarea class="form-control" id="mi_src" name="mi_src" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Enviar" name="enviar" class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>
    </div>                        
</div>
