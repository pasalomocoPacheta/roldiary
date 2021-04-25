<?php
// Handle AJAX request (start) https://makitweb.com/how-to-handle-ajax-request-on-the-same-page-php/
// https://stackoverflow.com/questions/21825777/how-to-get-button-value-by-ajax

// https://makitweb.com/how-to-handle-ajax-request-on-the-same-page-php/
// https://stackoverflow.com/questions/21825777/how-to-get-button-value-by-ajax

if( isset($_GET['ajax'])  ){
 echo $_GET['ajax'];
 exit;
}
// Handle AJAX request (end)
?>

<!doctype html>
<html>
 
 <body >

 <!-- <button type="button" value="today" >Today</button>
<button type="button" value="week"  >Week</button>
<button type="button" value="month" >Today</button>
<button type="button" value="year"  >Week</button> -->


 <!-- <div class=' nav-link bg-dark card card-body efectoHover entrar' id='crearPersonajeIndex'>            
        <form method='get' action>

        <input type='submit' value='Crear personaje' name='name'  id='name'><br>
        <div id='response'></div>
        </form>
  </div>
  <div id='response'></div> -->
  <br><br><br><br><br><br><br><br><br>   
  <form method='get' action>

   <input type='text' name='name' placeholder='Enter your name' id='name'>
   <input type='submit' value='submit' name='submit'><br>
   <div id='response'></div>
  </form>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>


      $(document).ready(function(){
    
    $('#name').keyup(function(){
     var name = $('#name').val();

     $.ajax({
      type: 'get',
      data: {ajax: name: name},
      success: function(response){
       $('#response').text('name : ' + response);
      }
     });
    });
  });



  </script>
 </body>
</html>