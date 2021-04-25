<div class="separador"></div>
<div id="formularioIncluirPersonaje" class="formulario-incluir container " 
     <?php 
     if(isset($_SESSION["comprobarSiHayPersonajes"])){
      echo "style='display:block;'";
     } else{
       echo "style='display:none;'";
     }  ?> >

        
        <form class="cajon" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" method="POST">
        <?php if(isset($_SESSION["comprobarSiHayPersonajes"])){
          echo "<p class='h5 text-center separador'>NO TIENES PERSONAJES</p>";
            } ?> 
        <p class="h4 text-center"> AÑADIR NUEVO PERSONAJE </p>  
          <input type="hidden" name="hiddenFecha" value="<?php echo date('Y-m-d H:i:s');?>">
            <div class="form-group">
              <label class="control-label col-sm-12"> Nombre </label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="nombrePersonaje">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-12"> Imagen </label>
              <div class="col-sm-10">
                  <input type="file" name="uploadedFile" />
              </div>
            </div>              

            <div class="form-group">
              <label class="control-label col-sm-12">Descripción </label>
              <div class="col-sm-10">
                  <textarea class="form-control" name="descripcion"> </textarea>
              </div>
            </div>
            <input type="submit" name="CrearPersonaje" value="Crear personaje">
        </form>

  </div>















<!-- 
    <div class="form-group">
              <label class="control-label col-sm-12" for="campaniaAsociada">Campaña asociada:</label>
              <div class="col-sm-10">
                <select name="campaniaAsociada" id="campaniaAsociada">
                  <option value="volvo">aasd</option>
                  <option value="saab">sad</option>
                  <option value="opel">asd</option>
                  <option value="audi">Audasdi</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-12" for="jugadores">Jugador asociado</label>
              <div class="col-sm-10">          
                <select name="jugadores" id="jugadores">
                  <option value="volvo">Volvo</option>
                  <option value="saab">Saab</option>
                  <option value="opel">Opel</option>
                  <option value="audi">Audi</option>
                </select>
              </div>
    </div> -->