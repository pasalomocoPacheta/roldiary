<?php      
             include "controller/controladorRegistro.php";
             $controladorRegistro = new ControladorRegistro();
             $controladorRegistro->formularioRegistro(); 
?>

    <form class="bg-dark cajon fixed-top marginTop" id="registrer-index" style="display:none;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        
        <p class="h2 text-right "><i class="fas fa-window-close cerrarFormulariosyEfectoBlur" style="cursor:pointer;"></i></p>    
        <input type="hidden" name="viewPersonajes" value="registrer">
                    <p class="h4 text-center"> REGISTRO: </p>
                            
                                <div class="form-group">
                                <label class="control-label col-sm-2" for="usuario">Usuario:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php if(isset($usuario)) echo $usuario;?>" name="usuario">
                                </div>
                                </div>
                                <div class="form-group">
                                <label class="control-label col-sm-2" for="correo">Correo:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="correo">
                                </div>
                                </div>
                                <div class="form-group">
                                <label class="control-label col-sm-2" for="pass">Contraseña:</label>
                                <div class="col-sm-10">          
                                    <input type="password" class="form-control"  name="pass">
                                </div>
                                </div>
                                <div class="form-group">        
                                <!-- <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                    <label><input type="checkbox" name="narrador" value="1"> Registrarse como Narrador </label>
                                    </div>
                                </div> -->
                                </div>
                    <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <input id="buttom-submit-registro class="btn btn-default" type="submit" name="submitRegistro" value="Registrarse" > 
                        </div>
                    </div>
            <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s');?>">
    </form>

   
