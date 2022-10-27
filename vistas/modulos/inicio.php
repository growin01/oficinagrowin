<?php 
if(isset($_GET["periodoinicio"])){
  $_SESSION["Anologin"] = $_GET["periodoinicio"];


}


 ?>
  <div class="content-wrapper">
    
    <section class="content-header">
      
      <h1 style="font-weight:bold">
        Página De inicio
        
      </h1>
      
      <ol class="breadcrumb">
       
<div class="pull-right">
  <div  class="col-xs-5">
  <h5 style="font-weight:bold">Período</h5>
  </div>
  <div  class="col-xs-7">

<select style="background-color: #81B8DC; font-weight:bold" class="form-control pull-right" name="periodoinicio" id="periodoinicio">
  <?php 
  echo'<option value="'.$_SESSION["Anologin"].'">'.$_SESSION["Anologin"].'</option>';
  foreach ($_SESSION["Perido"] as $key => $value) {
    if($value != "TODO"){
     echo'<option value="'.$value.'">'.$value.'</option>';
    }
    
  }

   ?>
  
</select>
</div>
</div>
       
      </ol>
    
    </section>

    <br>
    <br>

   
  <section class="content">

      <div class="row">

        <?php 

        

        include "inicio/cajas-superiores.php";




         ?>
        

      </div>

     
      <div class="row" >
        

         <?php 

        include "reportes/grafico-ventasvscompras.php";

        ?>
        

      </div>

     

      <div class="col-xs-12">
        

        <br> <br>
        

      </div>

    </section> 
  

  </div>
  