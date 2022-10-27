
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
<h1 class="col-xs-4" style="font-size: 30px"><i class="fa fa-pie-chart"></i>
         ESTADO DE RESULTADO
        
      </h1>
      

       <a href="gastodiario" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Diario de Gasto</a>

  <a href="ingresodiario" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Diario de Ingreso</a>
   <a href="ajustediario" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Diario de Ajuste</a>

   <a href="libromayor" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Libro Mayor</a>
   
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Estado de Resultado</li>
      </ol>
    </section>

    <section class="content">

      
      <div class="box">

          <!--*****************BOTON DE AGREGAR USUARIO********************************* -->

        <div class="box-header with-border">
           <div class="form-group">

                    <div class="input-group">
                      
                       

                     <label>Fecha Desde</label>
                      
                      <input type="text" style ="margin-left: 5px" maxlength="6" id="FechaDesde" name="FechaDesde" value ="<?php if(isset($_GET["FechaDesde"])){echo $_GET["FechaDesde"];} ?>">
                      <br>
                      <label>Fecha Hasta</label>
                      <input type="text" style ="margin-left: 7px" maxlength="6" id="FechaHasta" name="FechaHasta" value ="<?php if(isset($_GET["FechaHasta"])){echo $_GET["FechaHasta"];} ?>">
                      <br>
                      <br>
                       <label>Nivel</label>
                       <br>

                  <?php 
                  if(isset($_GET["Nivel"])){
                    $Nivel = $_GET["Nivel"];

                    switch ($Nivel) {
                      
                      case '1':
                         echo '<input type="radio" style ="margin-left: 5px" name="Nivel" id="Nivel1"  Value="1" checked>Nivel 1
                      <input type="radio" style ="margin-left: 5px" name="Nivel" id="Nivel2"  Value="2">Nivel 2
                       <input type="radio" style ="margin-left: 5px" name="Nivel" id="Nivel3"  Value="3">Nivel 3
                      <input type="radio" style ="margin-left: 5px" name="Nivel" id="Nivel4"  Value="4">Nivel 4';
                        
                        
                      break;
                       case '2':
                         echo '<input type="radio" style ="margin-left: 5px" name="Nivel" id="Nivel1"  Value="1">Nivel 1
                      <input type="radio" style ="margin-left: 5px" name="Nivel" id="Nivel2"  Value="2" checked>Nivel 2
                       <input type="radio" style ="margin-left: 5px" name="Nivel" id="Nivel3"  Value="3">Nivel 3
                      <input type="radio" style ="margin-left: 5px" name="Nivel" id="Nivel4"  Value="4">Nivel 4';
                        
                        
                      break;
                      case '3':
                         echo '<input type="radio" style ="margin-left: 5px" name="Nivel" id="Nivel1"  Value="1" >Nivel 1
                      <input type="radio" style ="margin-left: 5px" name="Nivel" id="Nivel2"  Value="2">Nivel 2
                       <input type="radio" style ="margin-left: 5px" name="Nivel" id="Nivel3"  Value="3" checked>Nivel 3
                      <input type="radio" style ="margin-left: 5px" name="Nivel" id="Nivel4"  Value="4">Nivel 4';
                        
                        
                      break;
                      case '4':
                         echo '<input type="radio" style ="margin-left: 5px" name="Nivel" id="Nivel1"  Value="1" >Nivel 1
                      <input type="radio" style ="margin-left: 5px" name="Nivel" id="Nivel2"  Value="2">Nivel 2
                       <input type="radio" style ="margin-left: 5px" name="Nivel" id="Nivel3"  Value="3">Nivel 3
                      <input type="radio" style ="margin-left: 5px" name="Nivel" id="Nivel4"  Value="4" checked>Nivel 4';
                        
                        
                      break;

                       }/*CIERRE SWICHT*/
                      
                      
                    

                    } else {

                      echo '<input type="radio" style ="margin-left: 5px" name="Nivel" id="Nivel1"  Value="1">Nivel 1
                      <input type="radio" style ="margin-left: 5px" name="Nivel" id="Nivel2"  Value="2" checked>Nivel 2
                       <input type="radio" style ="margin-left: 5px" name="Nivel" id="Nivel3"  Value="3">Nivel 3
                      <input type="radio" style ="margin-left: 5px" name="Nivel" id="Nivel4"  Value="4">Nivel 4';
                     
                      



                    }




                  

                   ?>
                     
                     
                      <button style ="margin-left: 5px" class="btn btn-warning btnEstadoResultado" id="EstadoResultado"><i class="glyphicon glyphicon-search"></i>  </button>

                     

                  </div>
              </div>

        </div>
       
        <!--*****************CIERRE DE DIV BOTON DE AGREGAR USUARIO********************************* -->



        <div class="box-body">
          <!--*****************INICIO NIVEL 1******************************** -->
          <table class="table table-bordered table-striped dt-responsive tablaTodos" width="80%">


            <thead>
              <tr>
                
              <th style="width:3px; align-content: center;">Grupo</th>
              <th style="width:3px; align-content: center;">Categoria</th>
              <th style="width:5px; align-content: center;">Genérica</th>
              <th style="width:5px; align-content: center;">Cuenta</th>
              <th style="align-content: center;">Nombre</th>
              <th style="align-content: center;">Totales</th>
              <th style="align-content: center;">Generica</th>
              <th style="align-content: center;">Cuenta</th>
              <th></th>
              </tr>
            
             
              
            </thead>
             <tbody>
              <?php 
              $totalResultado = 0;

           

              /* *****************************************************************
              NIVEL 1 NIVEL 1 NIVEL 1 NIVEL 1 NIVEL 1 NIVEL 1 NIVEL 1 NIVEL 1 NIVEL 1
              *********************************************************************/
          if(isset($_GET["Nivel"]) AND $_GET["Nivel"] == 1){

            $Rnc_Empresa_LD = $_SESSION["RncEmpresaUsuario"];
            $FechaDesde = $_GET["FechaDesde"];
            $FechaHasta = $_GET["FechaHasta"];
            $Orden = "id_registro";

            $respuesta = ControladorDiario::ctrMostrarEstadoResultado($Rnc_Empresa_LD, $FechaDesde, $FechaHasta, $Orden);
            $totalResultado = 0;

            for ($i=4; $i <=7 ; $i++) {
              switch ($i) {
                case '4':
                $sumaGrupoDebito = 0;
                $sumaGrupoCredito = 0;
                $MontoGrupo = 0;
                  foreach ($respuesta as $key => $value){
                   
                  if($value["id_grupo"] == $i){
                      $sumaGrupoDebito =  $sumaGrupoDebito + $value["debito"];
                      $sumaGrupoCredito = $sumaGrupoCredito + $value["credito"];
                    }
                  
                  }
                   $MontoGrupo = $sumaGrupoCredito - $sumaGrupoDebito;
                    
                    echo '<tr>
                        <td>'.$i.'</td>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td style="font-weight:bold; border:1px solid #eee;">INGRESOS</td>
<td style="font-weight:bold; border:1px solid #eee; background: #D5D8DC;">'.number_format($MontoGrupo, 2).'</td>
                        <td></td>
                        <td></td>
                        <td></td> 
                        </tr>';

                    $totalResultado = $totalResultado + $MontoGrupo;


                  break;
                  case '5':
                  $sumaGrupoDebito = 0;
                    $sumaGrupoCredito = 0;
                    $MontoGrupo = 0;
                  foreach ($respuesta as $key => $value){
                    
                  if($value["id_grupo"] == $i){
                      $sumaGrupoDebito =  $sumaGrupoDebito + $value["debito"];
                      $sumaGrupoCredito = $sumaGrupoCredito + $value["credito"];
                    }
                  
                  }
                   $MontoGrupo = $sumaGrupoDebito - $sumaGrupoCredito;
                    

                    echo '<tr>
                        <td>'.$i.'</td>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td style="font-weight:bold; border:1px solid #eee;">COSTO</td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #D5D8DC;">'.number_format($MontoGrupo, 2).'</td>
                        <td></td>
                        <td></td>
                        <td></td>  
                        </tr>';

                      $totalResultado = $totalResultado - $MontoGrupo;
                        

                  break;
                   case '6':
                   $sumaGrupoDebito = 0;
                    $sumaGrupoCredito = 0;
                    $MontoGrupo = 0;
                  foreach ($respuesta as $key => $value){
                    
                  if($value["id_grupo"] == $i){
                      $sumaGrupoDebito =  $sumaGrupoDebito + $value["debito"];
                      $sumaGrupoCredito = $sumaGrupoCredito + $value["credito"];
                    }
                   
                  }
                   $MontoGrupo = $sumaGrupoDebito - $sumaGrupoCredito;
                    
                    echo '<tr>
                        <td>'.$i.'</td>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td style="font-weight:bold; border:1px solid #eee;">GASTO</td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #D5D8DC;">'.number_format($MontoGrupo, 2).'</td>
                        <td></td>
                        <td></td>
                        <td></td> 
                        </tr>';
                   
                    $totalResultado = $totalResultado - $MontoGrupo;

                        

                  break;
                  
                 

             } /*CIERRE SWICHT*/
             
              

             

             } /*CIERRE FOR i*/
              


          }/*CIERRE IF NIVEL 1*/


             /* *****************************************************************
              NIVEL 2 NIVEL 2 NIVEL 2 NIVEL 2 NIVEL 2 NIVEL 2 NIVEL 2 NIVEL 2
              *********************************************************************/
          if(isset($_GET["Nivel"]) AND $_GET["Nivel"] == 2){

            $Rnc_Empresa_LD = $_SESSION["RncEmpresaUsuario"];
            $FechaDesde = $_GET["FechaDesde"];
            $FechaHasta = $_GET["FechaHasta"];
            $Orden = "id_registro";

            $respuesta = ControladorDiario::ctrMostrarEstadoResultado($Rnc_Empresa_LD, $FechaDesde, $FechaHasta, $Orden);


              $tabla = "grupo_empresa"; 
              
              
              $plancuenta = ControladorContabilidad::ctrgrupoempresas($tabla);

              $totalResultado = 0;

            for ($i=4; $i <=7 ; $i++) {
              switch ($i) {
                case '4':
                $sumaGrupoDebito = 0;
                $sumaGrupoCredito = 0;
                $MontoGrupo = 0;

                /*GRUPO*/
                
                foreach ($respuesta as $key => $value){
                   
                  if($value["id_grupo"] == $i){
                      $sumaGrupoDebito =  $sumaGrupoDebito + $value["debito"];
                      $sumaGrupoCredito = $sumaGrupoCredito + $value["credito"];
                    }
                  
                  }
                   $MontoGrupo = $sumaGrupoCredito - $sumaGrupoDebito;
                    
                    echo '<tr>
                        <td>'.$i.'</td>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td style="font-weight:bold; border:1px solid #eee; background: #D5D8DC;">INGRESOS</td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #D5D8DC;">'.number_format($MontoGrupo, 2).'</td>
                        <td></td>
                        <td></td> 
                        <td></td>  
                        </tr>';
                  /*FIN GRUPO */
                  $totalResultado = $totalResultado + $MontoGrupo;


                 
                foreach ($plancuenta as $key => $plan) {
                  if($plan["id_grupo"] == $i){
                         echo '<tr>
                        <td>'.$i.'</td>
                        <td>'.$plan["id_categoria"].'</td> 
                        <td></td> 
                        <td></td>  
                        <td style="font-weight:bold; border:1px solid #eee;">'.$plan["Nombre_Categoria"].'</td>';
                        
                        
                  $sumaCategoriaDebito = 0;
                  $sumaCategoriaCredito = 0;
                  $MontoCategoria = 0;

                foreach ($respuesta as $key => $value){
                   
                  if($value["id_grupo"] == $i && $value["id_categoria"] == $plan["id_categoria"]){
                      $sumaCategoriaDebito =  $sumaCategoriaDebito + $value["debito"];
                      $sumaCategoriaCredito = $sumaCategoriaCredito + $value["credito"];
                    }
                  
                  }
                  $MontoCategoria = $sumaCategoriaCredito - $sumaCategoriaDebito;
                   echo '<td style="font-weight:bold; border:1px solid #eee;">'.number_format($MontoCategoria, 2).'</td>
                   <td></td>
                    <td></td> </tr>';

                   }
                   
                  }
                  /*FIN CATEGOIRA*/

                  break;
                  case '5':
                  $sumaGrupoDebito = 0;
                    $sumaGrupoCredito = 0;
                    $MontoGrupo = 0;
                  foreach ($respuesta as $key => $value){
                    
                  if($value["id_grupo"] == $i){
                      $sumaGrupoDebito =  $sumaGrupoDebito + $value["debito"];
                      $sumaGrupoCredito = $sumaGrupoCredito + $value["credito"];
                    }
                  
                  }
                   $MontoGrupo = $sumaGrupoDebito - $sumaGrupoCredito;
                    
                    echo '<tr>
                        <td>'.$i.'</td>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td style="font-weight:bold; border:1px solid #eee; background: #D5D8DC;">COSTO</td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #D5D8DC;">'.number_format($MontoGrupo, 2).'</td>
                        <td></td>
                        <td></td>
                        <td></td>  
                        </tr>';

                      $totalResultado = $totalResultado - $MontoGrupo;


                   /*INICIO CATEGORIA*/
                 
                foreach ($plancuenta as $key => $plan) {
                  if($plan["id_grupo"] == $i){
                         echo '<tr>
                        <td>'.$i.'</td>
                        <td>'.$plan["id_categoria"].'</td> 
                        <td></td> 
                        <td></td>  
                        <td style="font-weight:bold; border:1px solid #eee;">'.$plan["Nombre_Categoria"].'</td>';
                        
                         
                  $sumaCategoriaDebito = 0;
                  $sumaCategoriaCredito = 0;
                  $MontoCategoria = 0;

                foreach ($respuesta as $key => $value){
                   
                  if($value["id_grupo"] == $i && $value["id_categoria"] == $plan["id_categoria"]){
                      $sumaCategoriaDebito =  $sumaCategoriaDebito + $value["debito"];
                      $sumaCategoriaCredito = $sumaCategoriaCredito + $value["credito"];
                    }
                  
                  }
                  $MontoCategoria = $sumaCategoriaDebito - $sumaCategoriaCredito;

                   echo '<td style="font-weight:bold; border:1px solid #eee;">'.number_format($MontoCategoria, 2).'</td>
                   <td></td>
                        <td></td> 
                        <td></td> 
                        </tr>';

                   

                   

                   }
                  }
                  /*FIN CATEGOIRA*/
                        

                  break;
                   case '6':
                   $sumaGrupoDebito = 0;
                    $sumaGrupoCredito = 0;
                    $MontoGrupo = 0;
                  foreach ($respuesta as $key => $value){
                    
                  if($value["id_grupo"] == $i){
                      $sumaGrupoDebito =  $sumaGrupoDebito + $value["debito"];
                      $sumaGrupoCredito = $sumaGrupoCredito + $value["credito"];
                    }
                  
                  }
                   $MontoGrupo = $sumaGrupoDebito - $sumaGrupoCredito;
                    
                    echo '<tr>
                        <td>'.$i.'</td>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td style="font-weight:bold; border:1px solid #eee; background: #D5D8DC;">GASTO</td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #D5D8DC;">'.number_format($MontoGrupo, 2).'</td>
                        <td></td>
                        <td></td>
                        <td></td>   
                        </tr>';
                      $totalResultado = $totalResultado - $MontoGrupo;

                   /*INICIO CATEGORIA*/
                 
                foreach ($plancuenta as $key => $plan) {
                  if($plan["id_grupo"] == $i){
                         echo '<tr>
                        <td>'.$i.'</td>
                        <td>'.$plan["id_categoria"].'</td> 
                        <td></td> 
                        <td></td>  
                        <td style="font-weight:bold; border:1px solid #eee;">'.$plan["Nombre_Categoria"].'</td>';
                        
                  $sumaCategoriaDebito = 0;
                  $sumaCategoriaCredito = 0;
                  $MontoCategoria = 0;   

                foreach ($respuesta as $key => $value){
                   
                  if($value["id_grupo"] == $i && $value["id_categoria"] == $plan["id_categoria"]){
                      $sumaCategoriaDebito =  $sumaCategoriaDebito + $value["debito"];
                      $sumaCategoriaCredito = $sumaCategoriaCredito + $value["credito"];
                    }

                  
                  }
                  $MontoCategoria = $sumaCategoriaDebito - $sumaCategoriaCredito;

                   echo '<td style="font-weight:bold; border:1px solid #eee;">'.number_format($MontoCategoria, 2).'</td>
                   <td></td>
                        <td></td> 
                        <td></td> 
                        </tr>';

                   

                   }

                  }

                  /*FIN CATEGOIRA*/
                  
                        

                  break;

                  

             } /*CIERRE SWICHT*/

             

             } /*CIERRE FOR i*/


          }/*CIERRE IF NIVEL 1*/



          /********************FIN NIVEL 2**************/
           /* *****************************************************************
              NIVEL 3 NIVEL 3 NIVEL 3 NIVEL 3 NIVEL 3 NIVEL 3 NIVEL 3 NIVEL 3
              *********************************************************************/
          if(isset($_GET["Nivel"]) AND $_GET["Nivel"] == 3){

            $Rnc_Empresa_LD = $_SESSION["RncEmpresaUsuario"];
            $FechaDesde = $_GET["FechaDesde"];
            $FechaHasta = $_GET["FechaHasta"];
            $Orden = "id_registro";

            $respuesta = ControladorDiario::ctrMostrarEstadoResultado($Rnc_Empresa_LD, $FechaDesde, $FechaHasta, $Orden);


              $tabla = "grupo_empresa"; 
              
              
              $plancuenta = ControladorContabilidad::ctrgrupoempresas($tabla);

               $totalResultado = 0;

            for ($i=4; $i <=7 ; $i++) {
              switch ($i) {
                case '4':
                $sumaGrupoDebito = 0;
                $sumaGrupoCredito = 0;
                $MontoGrupo = 0;

                /*GRUPO*/
                
                foreach ($respuesta as $key => $value){
                   
                  if($value["id_grupo"] == $i){
                      $sumaGrupoDebito =  $sumaGrupoDebito + $value["debito"];
                      $sumaGrupoCredito = $sumaGrupoCredito + $value["credito"];
                    }
                  
                  }
                   $MontoGrupo = $sumaGrupoCredito - $sumaGrupoDebito;
                    
                    echo '<tr>
                        <td>'.$i.'</td>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td style="font-weight:bold; border:1px solid #eee; background: #D5D8DC;">INGRESOS</td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #D5D8DC;">'.number_format($MontoGrupo, 2).'</td>
                        <td></td>
                        <td></td> 
                        <td></td>  
                        </tr>';
                  /*FIN GRUPO */
                  $totalResultado = $totalResultado + $MontoGrupo;


           /*INICIO CATEGORIA*/
                 
                foreach ($plancuenta as $key => $plan) {
                  if($plan["id_grupo"] == $i){
                         echo '<tr>
                        <td>'.$i.'</td>
                        <td>'.$plan["id_categoria"].'</td> 
                        <td></td> 
                        <td></td>  
                        <td style="font-weight:bold; border:1px solid #eee;">'.$plan["Nombre_Categoria"].'</td>';
                        
                  $sumaCategoriaDebito = 0;
                  $sumaCategoriaCredito = 0;
                  $MontoCategoria = 0;   

                foreach ($respuesta as $key => $value){
                   
                  if($value["id_grupo"] == $i && $value["id_categoria"] == $plan["id_categoria"]){
                      $sumaCategoriaDebito =  $sumaCategoriaDebito + $value["debito"];
                      $sumaCategoriaCredito = $sumaCategoriaCredito + $value["credito"];
                    }

                  
                  }
                  $MontoCategoria = $sumaCategoriaDebito - $sumaCategoriaCredito;

                   echo '<td style="font-weight:bold; border:1px solid #eee;">'.number_format($MontoCategoria, 2).'</td>
                   <td></td> 
                    <td></td>
                    </tr>';

                  /*INICIO GENERICA*/
                if($MontoCategoria != 0){

                  $Rnc_Empresa_Cuentas = $_SESSION["RncEmpresaUsuario"];
                  $grupo = $i;
                  $categorias = $plan["id_categoria"];
                  $generica = ControladorContabilidad::ctrplandecuenta($Rnc_Empresa_Cuentas, $grupo, $categorias);


                foreach ($generica  as $key => $gene){
                        
                  $sumaGenericaDebito = 0;
                  $sumaGenericaCredito = 0;
                  $MontoGenerica = 0;



                foreach ($respuesta as $key => $value){
                  

                   
                  if($value["id_grupo"] == $i && $value["id_categoria"] == $plan["id_categoria"] && $value["id_generica"] == $gene["id_generica"]){
                      $sumaGenericaDebito =  $sumaGenericaDebito + $value["debito"];
                      $sumaGenericaCredito = $sumaGenericaCredito + $value["credito"];
                    }
                  
                  }
                  $MontoGenerica =  $sumaGenericaDebito - $sumaGenericaCredito;
                  
                    if($MontoGenerica != 0){
                   echo '<tr>
                        <td>'.$i.'</td>
                        <td>'.$plan["id_categoria"].'</td> 
                        <td>'.$gene["id_generica"].'</td> 
                        <td></td> 
                        <td>'.$gene["Nombre_Cuenta"].'</td>
                        <td></td>
                   <td>'.number_format($MontoGenerica, 2).'</td>
                   <td></td>
                   <td></td> 
                      </tr>';

                    }
 
                  }
                  /*FIN GENERICA*/ 

                   }
                   
                  }
                  /*FIN CATEGOIRA*/

                  }/*CIERRO IF DE MONTO CATEGORIA*/  


                  break;
                  case '5':
                  $sumaGrupoDebito = 0;
                    $sumaGrupoCredito = 0;
                    $MontoGrupo = 0;
                  foreach ($respuesta as $key => $value){
                    
                  if($value["id_grupo"] == $i){
                      $sumaGrupoDebito =  $sumaGrupoDebito + $value["debito"];
                      $sumaGrupoCredito = $sumaGrupoCredito + $value["credito"];
                    }
                  
                  }
                   $MontoGrupo = $sumaGrupoDebito - $sumaGrupoCredito;
                    
                    echo '<tr>
                        <td>'.$i.'</td>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td style="font-weight:bold; border:1px solid #eee; background: #D5D8DC;">COSTO</td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #D5D8DC;">'.number_format($MontoGrupo, 2).'</td>
                        <td></td>
                        <td></td>
                        <td></td>   
                        </tr>';

                        $totalResultado = $totalResultado - $MontoGrupo;



                             /*INICIO CATEGORIA*/
                 
                foreach ($plancuenta as $key => $plan) {
                  if($plan["id_grupo"] == $i){
                         echo '<tr>
                        <td>'.$i.'</td>
                        <td>'.$plan["id_categoria"].'</td> 
                        <td></td> 
                        <td></td>  
                        <td style="font-weight:bold; border:1px solid #eee;">'.$plan["Nombre_Categoria"].'</td>';
                        
                  $sumaCategoriaDebito = 0;
                  $sumaCategoriaCredito = 0;
                  $MontoCategoria = 0;   

                foreach ($respuesta as $key => $value){
                   
                  if($value["id_grupo"] == $i && $value["id_categoria"] == $plan["id_categoria"]){
                      $sumaCategoriaDebito =  $sumaCategoriaDebito + $value["debito"];
                      $sumaCategoriaCredito = $sumaCategoriaCredito + $value["credito"];
                    }

                  
                  }
                  $MontoCategoria = $sumaCategoriaDebito - $sumaCategoriaCredito;

                   echo '<td style="font-weight:bold; border:1px solid #eee;">'.number_format($MontoCategoria, 2).'</td>
                   <td></td> 
                   <td></td>
                   <td></td> 
                   </tr>';

                  /*INICIO GENERICA*/
                if($MontoCategoria != 0){
                  $Rnc_Empresa_Cuentas = $_SESSION["RncEmpresaUsuario"];
                  $grupo = $i;
                  $categorias = $plan["id_categoria"];
                  $generica = ControladorContabilidad::ctrplandecuenta($Rnc_Empresa_Cuentas, $grupo, $categorias);


                foreach ($generica  as $key => $gene){
                        
                  $sumaGenericaDebito = 0;
                  $sumaGenericaCredito = 0;
                  $MontoGenerica = 0;



                foreach ($respuesta as $key => $value){
                  

                   
                  if($value["id_grupo"] == $i && $value["id_categoria"] == $plan["id_categoria"] && $value["id_generica"] == $gene["id_generica"]){
                      $sumaGenericaDebito =  $sumaGenericaDebito + $value["debito"];
                      $sumaGenericaCredito = $sumaGenericaCredito + $value["credito"];
                    }
                  
                  }
                  $MontoGenerica =  $sumaGenericaDebito - $sumaGenericaCredito  ;
                   
                    if($MontoGenerica != 0){
                   echo '<tr>
                        <td>'.$i.'</td>
                        <td>'.$plan["id_categoria"].'</td> 
                        <td>'.$gene["id_generica"].'</td> 
                        <td></td> 
                        <td>'.$gene["Nombre_Cuenta"].'</td>
                        <td></td> 
                   <td>'.number_format($MontoGenerica, 2).'</td> 
                   <td></td>
                   <td></td> 
                   </tr>';
                    }
 
                  }
                  /*FIN GENERICA*/ 

                   }
                   
                  }
                  /*FIN CATEGOIRA*/ 
                  }/*CIERRO IF DE MONTO DE CATEGORIA*/ 

                

                  break;
                   case '6':
                   $sumaGrupoDebito = 0;
                    $sumaGrupoCredito = 0;
                    $MontoGrupo = 0;
                  foreach ($respuesta as $key => $value){
                    
                  if($value["id_grupo"] == $i){
                      $sumaGrupoDebito =  $sumaGrupoDebito + $value["debito"];
                      $sumaGrupoCredito = $sumaGrupoCredito + $value["credito"];
                    }
                  
                  }
                   $MontoGrupo = $sumaGrupoDebito - $sumaGrupoCredito;
                    
                    echo '<tr>
                        <td>'.$i.'</td>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td style="font-weight:bold; border:1px solid #eee; background: #D5D8DC;">GASTO</td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #D5D8DC;">'.number_format($MontoGrupo, 2).'</td>
                        <td></td>
                        <td></td>
                        <td></td>  
                        </tr>';
                         $totalResultado = $totalResultado - $MontoGrupo;
                   /*INICIO CATEGORIA*/
                 
                foreach ($plancuenta as $key => $plan) {
                  if($plan["id_grupo"] == $i){
                         echo '<tr>
                        <td>'.$i.'</td>
                        <td>'.$plan["id_categoria"].'</td> 
                        <td></td> 
                        <td></td>  
                        <td style="font-weight:bold; border:1px solid #eee;">'.$plan["Nombre_Categoria"].'</td>';
                        
                  $sumaCategoriaDebito = 0;
                  $sumaCategoriaCredito = 0;
                  $MontoCategoria = 0;   

                foreach ($respuesta as $key => $value){
                   
                  if($value["id_grupo"] == $i && $value["id_categoria"] == $plan["id_categoria"]){
                      $sumaCategoriaDebito =  $sumaCategoriaDebito + $value["debito"];
                      $sumaCategoriaCredito = $sumaCategoriaCredito + $value["credito"];
                    }

                  
                  }
                  $MontoCategoria = $sumaCategoriaDebito - $sumaCategoriaCredito;

                   echo '<td style="font-weight:bold; border:1px solid #eee;">'.number_format($MontoCategoria, 2).'</td> 
                   <td></td>
                   <td></td>
                   <td></td> 
                   </tr>';

                  /*INICIO GENERICA*/
                  if($MontoCategoria != 0){


                  $Rnc_Empresa_Cuentas = $_SESSION["RncEmpresaUsuario"];
                  $grupo = $i;
                  $categorias = $plan["id_categoria"];
                  $generica = ControladorContabilidad::ctrplandecuenta($Rnc_Empresa_Cuentas, $grupo, $categorias);


                foreach ($generica  as $key => $gene){
                         
                  $sumaGenericaDebito = 0;
                  $sumaGenericaCredito = 0;
                  $MontoGenerica = 0;



                foreach ($respuesta as $key => $value){
                  

                   
                  if($value["id_grupo"] == $i && $value["id_categoria"] == $plan["id_categoria"] && $value["id_generica"] == $gene["id_generica"]){
                      $sumaGenericaDebito =  $sumaGenericaDebito + $value["debito"];
                      $sumaGenericaCredito = $sumaGenericaCredito + $value["credito"];
                    }
                  
                  }
                  $MontoGenerica =  $sumaGenericaDebito - $sumaGenericaCredito;

                  if($MontoGenerica != 0){ 
                  

                  echo '<tr>
                        <td>'.$i.'</td>
                        <td>'.$plan["id_categoria"].'</td> 
                        <td>'.$gene["id_generica"].'</td> 
                        <td></td> 
                        <td>'.$gene["Nombre_Cuenta"].'</td>
                        <td></td>
                        <td>'.number_format($MontoGenerica, 2).'</td>
                        <td></td>
                        <td></td> 
                        </tr>';
                    }
 
                  }
                  /*FIN GENERICA*/ 

                   }
                   
                  }
                  /*FIN CATEGOIRA*/ 
                  }/*CIERRO IF DE MONTO DE CATEGORIA*/ 

                 

                  break;




             } /*CIERRE SWICHT*/

             

             } /*CIERRE FOR i*/


          }/*CIERRE IF NIVEL 1*/



          /********************FIN NIVEL 3**************/


           /* *****************************************************************
              NIVEL 4 NIVEL 4 NIVEL 4 NIVEL 4 NIVEL 4 NIVEL 4 NIVEL 4 NIVEL 4
              *********************************************************************/
          if(isset($_GET["Nivel"]) AND $_GET["Nivel"] == 4){

            $Rnc_Empresa_LD = $_SESSION["RncEmpresaUsuario"];
            $FechaDesde = $_GET["FechaDesde"];
            $FechaHasta = $_GET["FechaHasta"];
            $Orden = "id_registro";

            $respuesta = ControladorDiario::ctrMostrarEstadoResultado($Rnc_Empresa_LD, $FechaDesde, $FechaHasta, $Orden);


              $tabla = "grupo_empresa"; 
              
              
              $plancuenta = ControladorContabilidad::ctrgrupoempresas($tabla);
              $totalResultado = 0;

            for ($i=4; $i <=7 ; $i++) {
              switch ($i) {
                case '4':
                $sumaGrupoDebito = 0;
                $sumaGrupoCredito = 0;
                $MontoGrupo = 0;

                /*GRUPO*/
                
                foreach ($respuesta as $key => $value){
                   
                  if($value["id_grupo"] == $i){
                      $sumaGrupoDebito =  $sumaGrupoDebito + $value["debito"];
                      $sumaGrupoCredito = $sumaGrupoCredito + $value["credito"];
                    }
                  
                  }
                   $MontoGrupo = $sumaGrupoCredito - $sumaGrupoDebito;
                    
                    echo '<tr>
                        <td>'.$i.'</td>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td style="font-weight:bold; border:1px solid #eee; background: #D5D8DC;">INGRESOS</td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #D5D8DC;">'.number_format($MontoGrupo, 2).'</td>
                        <td></td>
                        <td></td>
                        <td></td>  
                        </tr>';

                        $totalResultado = $totalResultado + $MontoGrupo;
  
                  /*FIN GRUPO */

           /*INICIO CATEGORIA*/
                 
                foreach ($plancuenta as $key => $plan) {
                  if($plan["id_grupo"] == $i){
                         echo '<tr>
                        <td>'.$i.'</td>
                        <td>'.$plan["id_categoria"].'</td> 
                        <td></td> 
                        <td></td>  
                        <td style="font-weight:bold; border:1px solid #eee;">'.$plan["Nombre_Categoria"].'</td>';
                        
                  $sumaCategoriaDebito = 0;
                  $sumaCategoriaCredito = 0;
                  $MontoCategoria = 0;   

                foreach ($respuesta as $key => $value){
                   
                  if($value["id_grupo"] == $i && $value["id_categoria"] == $plan["id_categoria"]){
                      $sumaCategoriaDebito =  $sumaCategoriaDebito + $value["debito"];
                      $sumaCategoriaCredito = $sumaCategoriaCredito + $value["credito"];
                    }

                  
                  }
                  $MontoCategoria = $sumaCategoriaCredito - $sumaCategoriaDebito;

                   echo '<td style="font-weight:bold; border:1px solid #eee;">'.number_format($MontoCategoria, 2).'</td>
                   <td></td> 
                    <td></td>
                    <td></td> 
                    </tr>';

                  /*INICIO GENERICA*/
              if($MontoCategoria != 0){
                
                  $Rnc_Empresa_Cuentas = $_SESSION["RncEmpresaUsuario"];
                  $grupo = $i;
                  $categorias = $plan["id_categoria"];
                  $generica = ControladorContabilidad::ctrplandecuenta($Rnc_Empresa_Cuentas, $grupo, $categorias);


                foreach ($generica  as $key => $gene){
                        
                  $sumaGenericaDebito = 0;
                  $sumaGenericaCredito = 0;
                  $MontoGenerica = 0;



                foreach ($respuesta as $key => $value){
                  

                   
                  if($value["id_grupo"] == $i && $value["id_categoria"] == $plan["id_categoria"] && $value["id_generica"] == $gene["id_generica"]){
                      $sumaGenericaDebito =  $sumaGenericaDebito + $value["debito"];
                      $sumaGenericaCredito = $sumaGenericaCredito + $value["credito"];
                    }
                  
                  }
                  $MontoGenerica = $sumaGenericaCredito - $sumaGenericaDebito;

                     if($MontoGenerica != 0){
                

                    echo '<tr>
                        <td>'.$i.'</td>
                        <td>'.$plan["id_categoria"].'</td> 
                        <td>'.$gene["id_generica"].'</td> 
                        <td></td> 
                        <td>'.$gene["Nombre_Cuenta"].'</td>
                        <td></td>
                        <td>'.number_format($MontoGenerica, 2).'</td>
                        <td></td>
                        <td></td> 
                        </tr>';
                  

                      $Rnc_Empresa_Cuentas = $_SESSION["RncEmpresaUsuario"];
                      $id_grupo = $i;
                      $id_categoria = $plan["id_categoria"];
                      $id_generica = $gene["id_generica"];
                      $subgenerica = ControladorContabilidad::ctrplandesubcuenta($Rnc_Empresa_Cuentas, $id_grupo, $id_categoria, $id_generica);

                foreach ($subgenerica  as $key => $subgene){
                        
                  $sumaCuentaDebito = 0;
                  $sumaCuentaCredito = 0;
                  $MontoCuenta = 0;



                foreach ($respuesta as $key => $value){
                  

                   
                  if($value["id_grupo"] == $i && $value["id_categoria"] == $plan["id_categoria"] && $value["id_generica"] == $gene["id_generica"] && $value["id_cuenta"] == $subgene["id_subgenerica"]){
                      $sumaCuentaDebito =  $sumaCuentaDebito + $value["debito"];
                      $sumaCuentaCredito = $sumaCuentaCredito + $value["credito"];
                    }
                  
                  }
                  $MontoCuenta = $sumaCuentaCredito - $sumaCuentaDebito;
                  if($MontoCuenta != 0){
                   
                   echo '<tr>
                        <td>'.$i.'</td>
                        <td>'.$plan["id_categoria"].'</td> 
                        <td>'.$gene["id_generica"].'</td> 
                        <td>'.$subgene["id_subgenerica"].'</td> 
                        <td>'.$subgene["Nombre_subCuenta"].'</td>
                        <td></td>
                   <td></td>
                   <td>'.number_format($MontoCuenta, 2).'</td>
                   <td><div class="btn-group">
      <button class="btn btn-default btnVerEstadoResultado" idgrupo="'.$i.'" idcategoria="'.$plan["id_categoria"].'" idgenerica ="'.$gene["id_generica"].'"  idcuenta="'.$subgene["id_subgenerica"].'" idNombre ="'.$subgene["Nombre_subCuenta"].'" FechaDesde ="'.$FechaDesde.'" FechaHasta ="'.$FechaHasta.'" Rnc_Empresa_LD ="'.$Rnc_Empresa_LD.'" data-toggle="modal" data-target="#modalVerEstadoResultado"><i class="glyphicon glyphicon-search"></i></button>
</div></td> 
                      </tr>';
                    }

                  }  
                }
                 }
               }

               }/*CIERRO IF DE MONTO GENERICA*/

                }/*CIERRO IF DE MONTO DE CATEGORIA*/

      

                  break;
                  case '5':
                  $sumaGrupoDebito = 0;
                    $sumaGrupoCredito = 0;
                    $MontoGrupo = 0;
                  foreach ($respuesta as $key => $value){
                    
                  if($value["id_grupo"] == $i){
                      $sumaGrupoDebito =  $sumaGrupoDebito + $value["debito"];
                      $sumaGrupoCredito = $sumaGrupoCredito + $value["credito"];
                    }
                  
                  }
                   $MontoGrupo = $sumaGrupoDebito - $sumaGrupoCredito;
                    
                    echo '<tr>
                        <td>'.$i.'</td>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td style="font-weight:bold; border:1px solid #eee; background: #D5D8DC;">COSTO</td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #D5D8DC;">'.number_format($MontoGrupo, 2).'</td>
                        <td></td>
                        <td></td>
                        <td></td>   
                        </tr>';
                        $totalResultado = $totalResultado - $MontoGrupo;
  


                        /*INICIO CATEGORIA*/
                 
                foreach ($plancuenta as $key => $plan) {
                  if($plan["id_grupo"] == $i){
                         echo '<tr>
                        <td>'.$i.'</td>
                        <td>'.$plan["id_categoria"].'</td> 
                        <td></td> 
                        <td></td>  
                        <td style="font-weight:bold; border:1px solid #eee;">'.$plan["Nombre_Categoria"].'</td>';
                        
                  $sumaCategoriaDebito = 0;
                  $sumaCategoriaCredito = 0;
                  $MontoCategoria = 0;   

                foreach ($respuesta as $key => $value){
                   
                  if($value["id_grupo"] == $i && $value["id_categoria"] == $plan["id_categoria"]){
                      $sumaCategoriaDebito =  $sumaCategoriaDebito + $value["debito"];
                      $sumaCategoriaCredito = $sumaCategoriaCredito + $value["credito"];
                    }

                  
                  }
                  $MontoCategoria = $sumaCategoriaDebito - $sumaCategoriaCredito;

                   echo '<td style="font-weight:bold; border:1px solid #eee;">'.number_format($MontoCategoria, 2).'</td>
                   <td></td> 
                   <td></td>
                   <td></td> 
                   </tr>';

                  /*INICIO GENERICA*/
                  if($MontoCategoria != 0){


                  $Rnc_Empresa_Cuentas = $_SESSION["RncEmpresaUsuario"];
                  $grupo = $i;
                  $categorias = $plan["id_categoria"];
                  $generica = ControladorContabilidad::ctrplandecuenta($Rnc_Empresa_Cuentas, $grupo, $categorias);


                foreach ($generica  as $key => $gene){
                         
                  $sumaGenericaDebito = 0;
                  $sumaGenericaCredito = 0;
                  $MontoGenerica = 0;



                foreach ($respuesta as $key => $value){
                  

                   
                  if($value["id_grupo"] == $i && $value["id_categoria"] == $plan["id_categoria"] && $value["id_generica"] == $gene["id_generica"]){
                      $sumaGenericaDebito =  $sumaGenericaDebito + $value["debito"];
                      $sumaGenericaCredito = $sumaGenericaCredito + $value["credito"];
                    }
                  
                  }
                  $MontoGenerica =  $sumaGenericaDebito - $sumaGenericaCredito;

                  if($MontoGenerica != 0){

                  echo '<tr>
                        <td>'.$i.'</td>
                        <td>'.$plan["id_categoria"].'</td> 
                        <td>'.$gene["id_generica"].'</td> 
                        <td></td> 
                        <td>'.$gene["Nombre_Cuenta"].'</td>
                        <td></td> 
                        <td>'.number_format($MontoGenerica, 2).'</td> 
                        <td></td>
                        <td></td> 
                        </tr>';

                    
                     $Rnc_Empresa_Cuentas = $_SESSION["RncEmpresaUsuario"];
                      $id_grupo = $i;
                      $id_categoria = $plan["id_categoria"];
                      $id_generica = $gene["id_generica"];
                      $subgenerica = ControladorContabilidad::ctrplandesubcuenta($Rnc_Empresa_Cuentas, $id_grupo, $id_categoria, $id_generica);

                       foreach ($subgenerica  as $key => $subgene){
                        
                  $sumaCuentaDebito = 0;
                  $sumaCuentaCredito = 0;
                  $MontoCuenta = 0;



                foreach ($respuesta as $key => $value){
                  

                   
                  if($value["id_grupo"] == $i && $value["id_categoria"] == $plan["id_categoria"] && $value["id_generica"] == $gene["id_generica"] && $value["id_cuenta"] == $subgene["id_subgenerica"]){
                      $sumaCuentaDebito =  $sumaCuentaDebito + $value["debito"];
                      $sumaCuentaCredito = $sumaCuentaCredito + $value["credito"];
                    }
                  
                  }
                  $MontoCuenta = $sumaCuentaDebito - $sumaCuentaCredito;

                   if($MontoCuenta != 0){
                   
                   echo '<tr>
                        <td>'.$i.'</td>
                        <td>'.$plan["id_categoria"].'</td> 
                        <td>'.$gene["id_generica"].'</td> 
                        <td>'.$subgene["id_subgenerica"].'</td> 
                        <td>'.$subgene["Nombre_subCuenta"].'</td>
                        <td></td>
                   <td></td>
                   <td>'.number_format($MontoCuenta, 2).'</td>
                   <td><div class="btn-group">
      <button class="btn btn-default btnVerEstadoResultado" idgrupo="'.$i.'" idcategoria="'.$plan["id_categoria"].'" idgenerica ="'.$gene["id_generica"].'"  idcuenta="'.$subgene["id_subgenerica"].'" idNombre ="'.$subgene["Nombre_subCuenta"].'" FechaDesde ="'.$FechaDesde.'" FechaHasta ="'.$FechaHasta.'" Rnc_Empresa_LD ="'.$Rnc_Empresa_LD.'" data-toggle="modal" data-target="#modalVerEstadoResultado"><i class="glyphicon glyphicon-search"></i></button>
</div></td> 
                      </tr>';
                    }

                  }  
                }
                 }
               }

                }/*CIERRO IF DE MONTO GENERICA*/
              }/*CIERRO IF DE MONTO CATEGORIA*/


                  break;
                   case '6':
                   $sumaGrupoDebito = 0;
                    $sumaGrupoCredito = 0;
                    $MontoGrupo = 0;
                  foreach ($respuesta as $key => $value){
                    
                  if($value["id_grupo"] == $i){
                      $sumaGrupoDebito =  $sumaGrupoDebito + $value["debito"];
                      $sumaGrupoCredito = $sumaGrupoCredito + $value["credito"];
                    }
                  
                  }
                   $MontoGrupo = $sumaGrupoDebito - $sumaGrupoCredito;
                    
                    echo '<tr>
                        <td>'.$i.'</td>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td style="font-weight:bold; border:1px solid #eee; background: #D5D8DC;">GASTO</td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #D5D8DC;">'.number_format($MontoGrupo, 2).'</td>
                        <td></td>
                        <td></td>
                        <td></td>  
                        </tr>';
                        $totalResultado = $totalResultado - $MontoGrupo;
  
                   /*INICIO CATEGORIA*/
                 
                foreach ($plancuenta as $key => $plan) {
                  if($plan["id_grupo"] == $i){
                         echo '<tr>
                        <td>'.$i.'</td>
                        <td>'.$plan["id_categoria"].'</td> 
                        <td></td> 
                        <td></td>  
                        <td style="font-weight:bold; border:1px solid #eee;">'.$plan["Nombre_Categoria"].'</td>';
                        
                  $sumaCategoriaDebito = 0;
                  $sumaCategoriaCredito = 0;
                  $MontoCategoria = 0;   

                foreach ($respuesta as $key => $value){
                   
                  if($value["id_grupo"] == $i && $value["id_categoria"] == $plan["id_categoria"]){
                      $sumaCategoriaDebito =  $sumaCategoriaDebito + $value["debito"];
                      $sumaCategoriaCredito = $sumaCategoriaCredito + $value["credito"];
                    }

                  
                  }
                  $MontoCategoria = $sumaCategoriaDebito - $sumaCategoriaCredito;

                   echo '<td style="font-weight:bold; border:1px solid #eee;">'.number_format($MontoCategoria, 2).'</td> 
                   <td></td>
                   <td></td>
                   <td></td> 
                   </tr>';

                  /*INICIO GENERICA*/

                  if($MontoCategoria != 0){


                  $Rnc_Empresa_Cuentas = $_SESSION["RncEmpresaUsuario"];
                  $grupo = $i;
                  $categorias = $plan["id_categoria"];
                  $generica = ControladorContabilidad::ctrplandecuenta($Rnc_Empresa_Cuentas, $grupo, $categorias);


                foreach ($generica  as $key => $gene){
                        
                  $sumaGenericaDebito = 0;
                  $sumaGenericaCredito = 0;
                  $MontoGenerica = 0;



                foreach ($respuesta as $key => $value){
                  

                   
                  if($value["id_grupo"] == $i && $value["id_categoria"] == $plan["id_categoria"] && $value["id_generica"] == $gene["id_generica"]){
                      $sumaGenericaDebito =  $sumaGenericaDebito + $value["debito"];
                      $sumaGenericaCredito = $sumaGenericaCredito + $value["credito"];
                    }
                  
                  }
                  $MontoGenerica =  $sumaGenericaDebito - $sumaGenericaCredito  ;

                   if($MontoGenerica != 0){

                    echo '<tr>
                        <td>'.$i.'</td>
                        <td>'.$plan["id_categoria"].'</td> 
                        <td>'.$gene["id_generica"].'</td> 
                        <td></td> 
                        <td>'.$gene["Nombre_Cuenta"].'</td>
                        <td></td>
                        <td>'.number_format($MontoGenerica, 2).'</td>
                        <td></td>
                        <td></td> 
                        </tr>';
                  
                  
                    $Rnc_Empresa_Cuentas = $_SESSION["RncEmpresaUsuario"];
                      $id_grupo = $i;
                      $id_categoria = $plan["id_categoria"];
                      $id_generica = $gene["id_generica"];
                      $subgenerica = ControladorContabilidad::ctrplandesubcuenta($Rnc_Empresa_Cuentas, $id_grupo, $id_categoria, $id_generica);

                       foreach ($subgenerica  as $key => $subgene){
                        
                  $sumaCuentaDebito = 0;
                  $sumaCuentaCredito = 0;
                  $MontoCuenta = 0;



                foreach ($respuesta as $key => $value){
                  

                   
                  if($value["id_grupo"] == $i && $value["id_categoria"] == $plan["id_categoria"] && $value["id_generica"] == $gene["id_generica"] && $value["id_cuenta"] == $subgene["id_subgenerica"]){
                      $sumaCuentaDebito =  $sumaCuentaDebito + $value["debito"];
                      $sumaCuentaCredito = $sumaCuentaCredito + $value["credito"];
                    }
                  
                  }
                  $MontoCuenta = $sumaCuentaDebito - $sumaCuentaCredito;

                    if($MontoCuenta != 0){
                   
                   echo '<tr>
                        <td>'.$i.'</td>
                        <td>'.$plan["id_categoria"].'</td> 
                        <td>'.$gene["id_generica"].'</td> 
                        <td>'.$subgene["id_subgenerica"].'</td> 
                        <td>'.$subgene["Nombre_subCuenta"].'</td>
                        <td></td>
                   <td></td>
                   <td>'.number_format($MontoCuenta, 2).'</td>
                   <td><div class="btn-group">
      <button class="btn btn-default btnVerEstadoResultado" idgrupo="'.$i.'" idcategoria="'.$plan["id_categoria"].'" idgenerica ="'.$gene["id_generica"].'"  idcuenta="'.$subgene["id_subgenerica"].'" idNombre ="'.$subgene["Nombre_subCuenta"].'" FechaDesde ="'.$FechaDesde.'" FechaHasta ="'.$FechaHasta.'" Rnc_Empresa_LD ="'.$Rnc_Empresa_LD.'" data-toggle="modal" data-target="#modalVerEstadoResultado"><i class="glyphicon glyphicon-search"></i></button>
</div></td> 
                      </tr>';
                    }
                  }  
                }
                 }
               }

                }/*CIERRO IF DE MONTO DE GENERICA*/ 
                
                }/*CIERRO IF DE MONTO DE CATEGORIA*/
  
                  break;

             } /*CIERRE SWICHT*/

             } /*CIERRE FOR i*/

          }/*CIERRE IF NIVEL 1*/



          /********************FIN NIVEL 4**************/

 
           

           ?>
            <!--*****************FIN ******************************** -->

              <!--***************** CIERRE FILA 1  TABLA  USUARIO********************************* -->

              

            </tbody>
            <tfoot>
             
              <tr>
                        <td></td>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td style="font-weight:bold; border:1px solid #eee; background: #ABEBC6;">TOTAL RESULTADO</td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #ABEBC6;"><?php echo number_format($totalResultado, 2);?></td>
                        <td></td>
                        <td></td> 
                        <td></td> 
                        </tr>
                  

              
            </tfoot>
            <!--*****************CIERRE CUERPO  TABLA  USUARIO********************************* -->

            
          </table>
        
        



         
       

        </div>        

        
      </div>
      

    </section>
 
  </div>
 <!--************************************************
                      MODAL AGREGAR Categoria
  ******************************************************* -->
  <!-- Modal -->
<div id="modalVerEstadoResultado" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <form role="form" method="post">
                <div class="modal-header" style="background: #3c8dbc; color:white">
        
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
        
                <h4 class="modal-title">Ver Detalle</h4>
      
                 </div>

      <div class="modal-body">

        <div class="box-body">

           <div class="col-xs-8">
              <label>Nombre de la Cuenta:</label>

              <input type="text" class="form-control col-xs-6" id="NombreCuenta" name="NombreCuenta" readonly>
                
          </div>

          <br>
          <br>
<div class="col-xs-12"><br></div>
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            <thead> 
              <tr>
                <th>N° Asiento</th>
                <th>Fecha Año/Mes</th>
                <th>Nombre de Empresa</th>
                <th>NCF</th>
                <th>Debito</th>
                <th>Credito</th>
                <th>Observaciones</th>
                
             </tr>


            </thead>

            <tbody id="VerEstadoResultado">
              

            </tbody>
            



          </table>

          <div class="col-xs-6">
            <label>Total Debito:</label>

            <input type="text" class="form-control col-xs-6" id="debito" name="debito" readonly>
           

          </div>

         <div class="col-xs-6">
          <label>Total Credito:</label>

            <input type="text" class="form-control col-xs-6" id="credito" name="credito" readonly>
             
          
        </div>

        











        </div>
      </div>
      


  


    
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

      </div>
     
        </form><!-- CIERRO EL FORMULARIO *-->

    </div> <!--modal-content-->
  </div> <!--modal-dialog modal-lg-->
</div> <!-- cierre modal -->
                      
 