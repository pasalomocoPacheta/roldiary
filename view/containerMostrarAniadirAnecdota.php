<div class="container">
       
          <div class="row">

            <div class="col-sm">
              <p class="h2 text-left">  ANÉCDOTAS: </p> 
            </div>

            <div class="col-sm">
                  <!-- TODOS TIENEN ACCESO A ESTA FUNCIONALIDAD.   -->
              <button id="botonIncluirAnecdota" class="boton-incluir text-left"> 
               Añadir anécdota 
              </button>
            </div>

            <div class="col-sm">
              <!-- TODOS PUEDEN VER LAS ANÉCDOTAS CREADAS. PUEDES BORRAR TU ANÉCDOTA AÑADIDA  EN FUNCIÓN DE QUIÉN HAYA INICIADO SESIÓN-->
              <button id="botonMostrarAnecdotasJugadorSesion" class="boton-mostrar text-left"> 
                 Mostrar anécdotas de <?php if(isset($_SESSION["id_jugadores"])){ echo $_SESSION['sess_user'];}?>  
              </button>
            </div>

            <div class="col-sm">
                  <!-- TODOS TIENEN ACCESO A ESTA FUNCIONALIDAD.   -->
              <button id="botonMostrarAnecdotasTodosJugadores" class="boton-incluir text-left"> 
                  Mostrar todas las anécdotas
              </button>
            </div>
            
          </div>
       
</div>