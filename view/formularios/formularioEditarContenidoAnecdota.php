<div class="separador"></div>
<div  class="formularioEditarBorrar formulario-incluir">
    <div class="container-sm" >

            <form class="cajon" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <legend> EDITAR CONTENIDO  </legend>
            <input type="hidden" name="IDEditarContenidoAnecdota" value="<?php echo $_GET['IDEditarContenidoAnecdota']; ?>">

                <div class="form-group">
                <label class="control-label col-sm-12">Contenido </label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="contenidoAnecdota"> </textarea>
                </div>
                </div>
                <input type="submit" name="editarContenidoAnecdota" value="Editar anecdota">
            </form>
      </div>    
</div>    
