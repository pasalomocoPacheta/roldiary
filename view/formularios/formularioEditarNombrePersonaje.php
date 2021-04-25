<div class="separador"></div>
<div  class="formularioEditarBorrar formulario-incluir ">
    <div class="container-sm" >

                <form class="cajon" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <legend>EDITAR NOMBRE PERSONAJE  <i> <?php echo $_GET['NombrePersonaje']; ?> </i> </legend>
                    <input type="hidden" name="idNombrePersonaje" value="<?php echo $_GET['IDEditarNombrePersonaje']; ?>">
                    <div class="form-group">
                    <label class="control-label col-sm-12"> Nombre </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nombrePersonaje">
                    </div>
                    </div>

                    <input type="submit" name="EditarNombrePersonaje" value="Editar personaje">
                </form>
        
    </div>    
</div>
