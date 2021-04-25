<?php         
            
             include "controller/controladorInicioSesion.php";
             $controladorInicio = new controladorInicioSesion();
             $controladorInicio->formularioLoguin(); 
?>

    <form class="bg-dark cajon fixed-top marginTop" id="loguin-index" style="display:none;" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <p class="h2 text-right"><i style="cursor:pointer;" class="fas fa-window-close cerrarFormulariosyEfectoBlur"></i></p>
        <input type="hidden" name="iniciarView" id="iniciarView" value="">


            <p class="h4 text-center"> INICAR SESIÓN: </p>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="usuario">Usuario:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="usuario">
                        </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="pass">Contraseña:</label>
                    <div class="col-sm-10">          
                        <input type="password" class="form-control" name="pass">
                    </div>
                </div>
                            <!-- <div class="form-group">        
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                <label><input type="checkbox" name="remember"> Recuérdame </label>
                                </div>
                            </div>
                            </div> -->
                <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-10">
                        <input id="buttom-submit class="btn btn-default" type="submit" name="submitLoguin" value="Entrar" > 
                    </div>
                </div>
                <p class='registrar text-center' style="cursor:pointer;">Registrarse</p>
    </form>

