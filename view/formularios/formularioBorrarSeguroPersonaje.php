<div class="separador"></div>
<div class="formularioEditarBorrar">
        <div class="alturaBorrarSeguro">

            <div class='container justify-content-center'> 
             <br>
                    <a style='color:black' href='personajes.php?BorrarDefinitivamentePersonaje=<?php if(isset($_GET["IDBorrarPersonaje"])){echo$_GET["IDBorrarPersonaje"];} ?>'> 
                       <i class='fas fa-trash-alt papeleraBorrarSeguro'></i>
                      <br> <br><p>¿BORRAR DEFINITIVAMENTE A <?php if(isset($_GET["NombrePersonaje"])){echo$_GET["NombrePersonaje"];} ?>?</p>
                    </a>
         

        </div>

    </div>

</div>


