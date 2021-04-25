<div class="separador"></div>
<div  id="formularioIncluirAnecdota" class="formulario-incluir container-sm" >

    <div class="container" >
        <form class="cajon" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <legend>AÑADIR ANÉCDOTA COMO <i> <?php echo $_SESSION['nombrePersonajeSelecionado'];?></i></legend>
            <input type="hidden" name="hiddenFecha" value="<?php echo date('Y-m-d H:i:s');?>">
            <div class="form-group">
              <label class="control-label col-sm-12">Contenido   </label>
              <div class="col-sm-10">
                  <textarea class="form-control" name="contenido"> </textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-12" for="campania"> Campaña:</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="campania" name="campania">
              </div>
            </div>
            <input type="submit" name="CrearAnecdota" value="Crear anécdota">
        </form>

    </div>
</div>    