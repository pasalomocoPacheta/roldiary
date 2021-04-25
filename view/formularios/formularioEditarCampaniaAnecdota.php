<div class="separador"></div>
<div  class="formularioEditarBorrar formulario-incluir">
    <div class="container-sm" >

            <form class="cajon form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <legend> EDITAR CAMPAÑA  </legend>
            <input type="hidden" name="IDEditarCampaniaAnecdota" value="<?php echo $_GET['IDEditarCampaniaAnecdota']; ?>">

                <div class="form-group">
                <label class="control-label col-sm-12"> Campaña </label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="campania"> </textarea>
                </div>
                </div>
                <input type="submit" name="editarCampaniaAnecdota" value="Editar anecdota">
            </form>
      </div>    
</div>    
