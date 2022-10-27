
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h1 class="col-xs-4" style="font-size: 30px"><i class="fa fa-pie-chart"></i>
         Resumen por Proyecto
      </h1>

       <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarProyecto"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Crear Proyecto</button>
    <a href="proyectos" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Administrar Proyectos</a>
     <a href="proyectosuplidor" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Proyectos por Suplidor</a>
      
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">PROYECTOS RESUMEN</li>
      </ol>
    </section>

    <section class="content">

      
      <div class="box">

          <!--*****************BOTON DE AGREGAR USUARIO********************************* -->

        <div class="box-header with-border">
           <div class="form-group col-xs-6 pull-left">

                    <div class="input-group">
                      
                       

                     <label>Fecha Desde</label>
                      
                      <input type="text" style ="margin-left: 5px" maxlength="6" id="FechaDesde" name="FechaDesde" value ="<?php if(isset($_GET["FechaDesde"])){echo $_GET["FechaDesde"];} ?>">
                      <br>
                      <label>Fecha Hasta</label>
                      <input type="text" style ="margin-left: 7px" maxlength="6" id="FechaHasta" name="FechaHasta" value ="<?php if(isset($_GET["FechaHasta"])){echo $_GET["FechaHasta"];} ?>">
                      <br>
                      <br>

                      <label>Proyectos</label>
                       
                       <select type="text" class="form-control col-xs-4" id="Codproyecto" name="Codproyecto" required>
                          <option value="">Seleccionar Proyecto</option>


                    <?php  

                    $Rnc_Empresa_Proyectos = $_SESSION["RncEmpresaUsuario"];
                    
                    $proyectos = ControladorProyecto::ctrMostrarProyectos($Rnc_Empresa_Proyectos);
                     
                     foreach ($proyectos as $key => $pro) {
                          echo '<option value="'.$pro["id"].'">'.$pro["CodigoProyecto"].'</option>';
                         

                        }
                            


                      ?>


                           

                               

                          </select>
                          <br>


                       <label>Nivel</label>
                       <br>

                  <?php 
                  $TotalIngreso = 0;
                  $TotalCosto = 0;
                  $TotalGasto = 0;
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
                   
                    
                     
                     
                      <button style ="margin-left: 5px" class="btn btn-warning btnProyectoResumen" id="ProyectosResumen"><i class="glyphicon glyphicon-search"></i>  </button>
                      
                       <button style ="margin-left: 5px" class="btn btn-info btnPDFProyectoResumen" id="PDFProyectoResumen"><i class="fa fa-print"></i></button>
                       <input type="hidden"  id="RncEmpresa" name="RncEmpresa" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">

                     

                  </div>
                  

              </div>
          <div class="chart-responsive col-xs-6 pull-right">
            
              <div class="box box-solid bg-teal-gradient">

                  <div class="box-header">

                    <i class="fa fa-bar-chart"></i>

                    <h3 class="box-title">Resultados Por Proyectos</h3>     


                  </div>

  
              </div>   

      
              <div class="chart" id="bar-chartproyectoresumen" style="height: 220px;"> </div>
            
          </div>

    </div><!--***************** Inicio ********************** -->




        </div>
       
        <!--*****************CIERRE DE DIV BOTON DE AGREGAR USUARIO********************************* -->



        <div class="box-body">
         


          <?php 
          if (isset($_GET["Proyecto"])){
             foreach ($proyectos as $key => $pro) {

                if($_GET["Proyecto"] == $pro["id"]){ 
                  echo ' <h2 align="center">'.$pro["NombreProyecto"].' '.$pro["CodigoProyecto"].'</h2>';
                


                }
                         
                         

               }
                            


            
          } 

           ?>


          

          <!--*****************INICIO NIVEL 1******************************** -->
          <table class="table table-bordered table-striped dt-responsive tablaTodos" width="80%">


            <thead>
              <tr>
                
              <th style="width:3px">Grupo</th>
              <th style="width:3px">Categoria</th>
              <th style="width:5px">Genérica</th>
              <th style="width:5px">Cuenta</th>
              <th>Nombre</th>
              <th>Totales</th>
              <th>Generica</th>
              <th>Cuenta</th>
              <th>Detalle</th>

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
            $Proyecto = $_GET["Proyecto"];
            $Orden = "id_registro";

            $respuesta = ControladorDiario::ctrMostrarResumenProyectos($Rnc_Empresa_LD, $FechaDesde, $FechaHasta, $Proyecto, $Orden);
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
                    $TotalIngreso = $MontoGrupo;
       

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

                      $TotalCosto = $MontoGrupo;
       
       
                        

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

                    $TotalGasto =  $MontoGrupo;


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
            $Proyecto = $_GET["Proyecto"];
            $Orden = "id_registro";

            $respuesta = ControladorDiario::ctrMostrarResumenProyectos($Rnc_Empresa_LD, $FechaDesde, $FechaHasta, $Proyecto, $Orden);

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
                  $TotalIngreso = $MontoGrupo;


                 
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
                      $TotalCosto =  $MontoGrupo;


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
                        <td></td> </tr>';
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
                      $TotalGasto =  $MontoGrupo; 

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
            $Proyecto = $_GET["Proyecto"];
            $Orden = "id_registro";

            $respuesta = ControladorDiario::ctrMostrarResumenProyectos($Rnc_Empresa_LD, $FechaDesde, $FechaHasta, $Proyecto, $Orden);


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
                  $TotalIngreso = $MontoGrupo;
       




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
                        $TotalCosto =  $MontoGrupo;
       
 



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
                         $TotalGasto =  $MontoGrupo;  
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
            $Proyecto = $_GET["Proyecto"];
            $Orden = "id_registro";

            $respuesta = ControladorDiario::ctrMostrarResumenProyectos($Rnc_Empresa_LD, $FechaDesde, $FechaHasta, $Proyecto, $Orden);



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
                        $TotalIngreso = $MontoGrupo;
       


  
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
      <button class="btn btn-default btnVerdetalle" idgrupo="'.$i.'" idcategoria="'.$plan["id_categoria"].'" idgenerica ="'.$gene["id_generica"].'"  idcuenta="'.$subgene["id_subgenerica"].'" idNombre ="'.$subgene["Nombre_subCuenta"].'" FechaDesde ="'.$FechaDesde.'" FechaHasta ="'.$FechaHasta.'" idProyecto ="'.$_GET["Proyecto"].'" Rnc_Empresa_LD ="'.$Rnc_Empresa_LD.'" data-toggle="modal" data-target="#modalVerDetalle"><i class="glyphicon glyphicon-search"></i></button>
</div>
</td> 
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
                        $TotalCosto =  $MontoGrupo;
       



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
      <button class="btn btn-default btnVerdetalle" idgrupo="'.$i.'" idcategoria="'.$plan["id_categoria"].'" idgenerica ="'.$gene["id_generica"].'"  idcuenta="'.$subgene["id_subgenerica"].'" idNombre ="'.$subgene["Nombre_subCuenta"].'" FechaDesde ="'.$FechaDesde.'" FechaHasta ="'.$FechaHasta.'" idProyecto ="'.$_GET["Proyecto"].'" Rnc_Empresa_LD ="'.$Rnc_Empresa_LD.'" data-toggle="modal" data-target="#modalVerDetalle"><i class="glyphicon glyphicon-search"></i></button>
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
                        $TotalGasto =  $MontoGrupo;   
  
  
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
                      $FechaDesde = $FechaDesde;
                   
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
      <button class="btn btn-outline-primary btn-sm btnVerdetalle" idgrupo="'.$i.'" idcategoria="'.$plan["id_categoria"].'" idgenerica ="'.$gene["id_generica"].'"  idcuenta="'.$subgene["id_subgenerica"].'" idNombre ="'.$subgene["Nombre_subCuenta"].'" FechaDesde ="'.$FechaDesde.'" FechaHasta ="'.$FechaHasta.'" idProyecto ="'.$_GET["Proyecto"].'" Rnc_Empresa_LD ="'.$Rnc_Empresa_LD.'" data-toggle="modal" data-target="#modalVerDetalle"><i class="glyphicon glyphicon-search"></i></button>
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
<div id="modalVerDetalle" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Ver Detalle</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <table class="table table-bordered table-striped dt-responsive tablaTodos" width="100%">
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

          <tbody id="detalle">
              

          </tbody>
            



          </table>

        
        
                     
          
        </div>

      
        
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        

      </div>
      <?php 
      

      //$EditarCategoria = new ControladorCategorias();
      //$EditarCategoria -> ctrEditarCategoria();
      

       ?>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>
                      
 <!--************************************************
                      MODAL AGREGAR Categoria
  ******************************************************* -->
  <!-- Modal -->
<div id="modalAgregarProyecto" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Agregar Proyecto</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de la CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              
              <input type="hidden" class="form-control input-lg" id="RncEmpresaProyecto" name="RncEmpresaProyecto" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="UsuarioProyecto" name="UsuarioProyecto" value="<?php echo $_SESSION["Usuario"];?>" readonly>


            </div>


          </div>
          <!--*****************cierra input RNC de la CATEGORIA************************** -->
           <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="text" class="form-control input" maxlength="15" id="CodigoProyecto" name="CodigoProyecto" placeholder="Ingresar Código del Proyecto" required>

            </div>

          </div>
           <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="text" class="form-control input" maxlength="15" id="NcotizacionProyecto" name="NcotizacionProyecto" placeholder="Ingresar Número de Cotización">

            </div>

          </div>

          
         <!--*****************input de Nombre de CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-text-width"></i></span>
              <input type="text" class="form-control input" maxlength="35" id="nuevoProyecto" name="nuevoProyecto" placeholder="Ingresar Nombre de Proyecto" required>

            </div>

          </div>

           <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-align-right"></i></span>
              <input type="text" class="form-control input" maxlength="35" id="descripcionProyecto" name="descripcionProyecto" placeholder="Ingresar Descripción de Proyecto" required>

            </div>

          </div>
          <!--*****************cierra input de Nombre de Usuario************************* -->
          
        </div>
         <label>FECHA DE INICIO DEL PROYECTO</label>

         <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                       <div class="input-group form-control FechaInicio">

                     <label>Año/Mes</label>
                      <input type="text" maxlength="6" id="FechamesProyectoInicio" name="FechamesProyectoInicio" required>

                     
                      <label>Dìa</label>
                      <input type="text" maxlength="2" id="FechadiaProyectoInicio" name="FechadiaProyectoInicio" required>


                    </div>
                   

                  </div>
          </div>

          <label>FECHA DE FIN DEL PROYECTO</label>
          <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                       <div class="input-group- form-control FechaFin">

                     <label>Año/Mes</label>
                      <input type="text" maxlength="6" id="FechamesProyectoFin" name="FechamesProyectoFin" required>

                     
                      <label>Dìa</label>
                      <input type="text" maxlength="2" id="FechadiaProyectoFin" name="FechadiaProyectoFin" required>


                    </div>
                   

                  </div>
          </div>
           <div class="form-group col-lg-8">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
              <input type="text" class="form-control input" id="SaldoInicialProyecto" name="SaldoInicialProyecto" placeholder="Ingresar el saldo Presupuestado" required>

            </div>

          </div>
          <br>
            
      
        
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar Proyecto</button>

      </div>
      <?php 
      

      $crearProyecto = new ControladorProyecto();
      $crearProyecto -> ctrCrearProyecto();
      

       ?>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>


<script>
  
     var bar = new Morris.Bar({
      element: 'bar-chartproyectoresumen',
      resize: true,
      data: [
      
      <?php 
       

     
       
          echo "{y: 'TOTAL INGRESOS', a: '".$TotalIngreso."'},";
          echo "{y: 'TOTAL COSTOS', a: '".$TotalCosto."'},";
          echo "{y: 'TOTAL GASTOS', a: '".$TotalGasto."'},";
          echo "{y: 'TOTAL RESULTADO', a: '".$totalResultado."'},";
        
        

      ?>
        
      ],
      
      xkey: 'y',
      ykeys: ['a'],
      labels: ['TOTAL'],
      preUnits: '$',
      hideHover: 'auto',
      barColors: function(row, series, type) {
    if (type != 'bar') {
      return;
    }
    switch (row.x) {
      case 0: return '#65D87D';
      case 1: return '#65D87D';
      case 2: return '#65D87D';
      case 3: return '#65D87D';


     
    }
  }
});

   

</script>
  





<!--************************************************
                    CIERRE DE  MODAL AGREGAR categoria
  ******************************************************* -->