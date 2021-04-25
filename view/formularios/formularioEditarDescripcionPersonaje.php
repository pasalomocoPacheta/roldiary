<div class="separador"></div>
<div  class="formularioEditarBorrar formulario-incluir">
    <div class="container-sm" >

            <form class="cajon" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <legend>EDITAR DESCRIPCIÓN PERSONAJE  <i> <?php echo $_GET['NombrePersonaje']; ?> </i> </legend>
                <input type="hidden" name="idDescripcionPersonaje" value="<?php echo $_GET['IDEditarDescripcionPersonaje']; ?>">

                <div class="form-group">
                <label class="control-label col-sm-12">Descripción </label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="descripcion"> </textarea>
                </div>
                </div>
                <input type="submit" name="EditarDescripcionPersonaje" value="Editar personaje">
            </form>
      </div>    
</div>    
