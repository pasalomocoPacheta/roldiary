<div class="container separador"></div>
<div class="container">
       
    <div class="row">
                <div class="col-2">
                </div>

                <div class="col-3">
                    <div id="botonIncluirAnecdota" 
                         class='boton-incluir nav-link bg-dark card card-body efectoHover entrar'>           
                         Añadir anécdota 
                    </div>
                </div>

                <div class="col-3">
                    <div id="botonMostrarAnecdotasJugadorSesion" 
                         class='boton-incluir nav-link bg-dark card card-body efectoHover entrar'>           
                         Mostrar anécdotas de <?php if(isset($_SESSION["id_jugadores"])){ echo $_SESSION['sess_user'];}?>  
                    </div>
                </div>

                <div class="col-3">
                    <div id="botonMostrarAnecdotasTodosJugadores" 
                         class='boton-incluir nav-link bg-dark card card-body efectoHover entrar'>           
                         Mostrar todas las anécdotas
                    </div>
                </div>

               
          </div>
       
</div>