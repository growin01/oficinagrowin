
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
      <h1 class="col-xs-3" style="font-size: 30px"><i class="fa fa-pie-chart"></i>
         ESTADO DE SITUACIÓN
        
      </h1>
      

  <a href="gastodiario" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Diario de Gasto</a>

  <a href="ingresodiario" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Diario de Ingreso</a>
   <a href="ajustediario" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Diario de Ajuste</a>

   <a href="libromayor" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Libro Mayor</a>
   
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Estado de Situación</li>
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
                     
                     
                      <button style ="margin-left: 5px" class="btn btn-warning btnimpEstadoSituacion" id="EstadoSituacion"><i class="glyphicon glyphicon-search"></i>  </button>

                      <button style ="margin-left: 5px" class="btn btn-info btnPDFEstadoSituacion" id="PDFEstadoSituacion"><i class="fa fa-print"></i></button>
                      
                      <input type="hidden"  id="RncEmpresa" name="RncEmpresa" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">


                     

                  </div>
              </div>

        </div>
       
        <!--*****************CIERRE DE DIV BOTON DE AGREGAR USUARIO********************************* -->



        <div class="box-body">
          <!--*****************INICIO NIVEL 1******************************** -->
          <table class="table table-bordered table-striped dt-responsive tablaTodos" width="80%">


            <thead>
              <tr>
                
              
              <th style="align-content: center;"></th>
              <th style="align-content: center;"></th>
              <th style="align-content: center;"></th>
              <th style="align-content: center;"></th>
              <th style="align-content: center;"></th>
              </tr>
            
             
              
            </thead>
             <tbody>
              <?php 
             $totalResultado = 0;
             $totalPASPATRI = 0;
            if(isset($_GET["FechaDesde"]) && isset($_GET["FechaHasta"])){ 

            $Rnc_Empresa_LD = $_SESSION["RncEmpresaUsuario"];
            $FechaDesde = $_GET["FechaDesde"];
            $FechaHasta = $_GET["FechaHasta"];
            $Orden = "id_registro";


            $totalResultado = 0;
            $EstadoResul = ControladorDiario::ctrMostrarEstadoResultado($Rnc_Empresa_LD, $FechaDesde, $FechaHasta, $Orden);
            $totalEstado = 0;

            for ($i=4; $i <=7 ; $i++) {
              switch ($i) {
                case '4':
                $SumaGrupoDebitoEstado = 0;
                $sumaGrupoCreditoEstado = 0;
                $MontoGrupoEstado = 0;
                  foreach ($EstadoResul as $key => $value){
                   
                  if($value["id_grupo"] == $i){
                      $SumaGrupoDebitoEstado =  $SumaGrupoDebitoEstado + $value["debito"];
                      $sumaGrupoCreditoEstado = $sumaGrupoCreditoEstado + $value["credito"];
                    }
                  
                  }
                   $MontoGrupoEstado = $sumaGrupoCreditoEstado - $SumaGrupoDebitoEstado;
                   $totalEstado = $totalEstado + $MontoGrupoEstado;


                  break;
                  case '5':
                    $SumaGrupoDebitoEstado = 0;
                    $sumaGrupoCreditoEstado = 0;
                    $MontoGrupoEstado = 0;
                foreach ($EstadoResul as $key => $value){
                    
                  if($value["id_grupo"] == $i){
                      $SumaGrupoDebitoEstado =  $SumaGrupoDebitoEstado + $value["debito"];
                      $sumaGrupoCreditoEstado = $sumaGrupoCreditoEstado + $value["credito"];
                    }
                  
                  }
                   $MontoGrupoEstado = $SumaGrupoDebitoEstado - $sumaGrupoCreditoEstado;
                   $totalEstado = $totalEstado - $MontoGrupoEstado;
                  break;
                   case '6':
                   $SumaGrupoDebitoEstado = 0;
                    $sumaGrupoCreditoEstado = 0;
                    $MontoGrupoEstado = 0;
                  foreach ($EstadoResul as $key => $value){
                    
                  if($value["id_grupo"] == $i){
                      $SumaGrupoDebitoEstado =  $SumaGrupoDebitoEstado + $value["debito"];
                      $sumaGrupoCreditoEstado = $sumaGrupoCreditoEstado + $value["credito"];
                    }
                   
                  }
                   $MontoGrupoEstado = $SumaGrupoDebitoEstado - $sumaGrupoCreditoEstado;
                   $totalEstado = $totalEstado - $MontoGrupoEstado;
                  break;
                }
              }
            }
              $totalResultado = 0;
              $totalActivo = 0;
              $totalPasivo = 0;
              $totalPatrimonio = 0;
              $Comparacion = 0;
              
             

           /* *****************************************************************
              NIVEL 4 NIVEL 4 NIVEL 4 NIVEL 4 NIVEL 4 NIVEL 4 NIVEL 4 NIVEL 4
              *********************************************************************/
            if(isset($_GET["FechaDesde"]) && isset($_GET["FechaHasta"])){ 

            $Rnc_Empresa_LD = $_SESSION["RncEmpresaUsuario"];
            $FechaDesde = $_GET["FechaDesde"];
            $FechaHasta = $_GET["FechaHasta"];
            $Orden = "id_registro";

            $respuesta = ControladorDiario::ctrMostrarEstadoResultado($Rnc_Empresa_LD, $FechaDesde, $FechaHasta, $Orden);


              $tabla = "grupo_empresa"; 
              
              
              $plancuenta = ControladorContabilidad::ctrgrupoempresas($tabla);
              $totalResultado = 0;

            for ($i=1; $i <=3; $i++) {
              switch ($i) {
                case '1':
                $sumaGrupoDebito = 0;
                $sumaGrupoCredito = 0;
                $MontoGrupo = 0;

                /*GRUPO*/
                foreach ($respuesta as $key => $value){
                  if($value["id_grupo"] == $i){
                      $sumaGrupoDebito =  $sumaGrupoDebito + $value["debito"];
                      $sumaGrupoCredito = $sumaGrupoCredito + $value["credito"];
                    }
                  
                }/*CIERRE RESPUESTA*/

              $MontoGrupo = $sumaGrupoDebito - $sumaGrupoCredito;
              $totalActivo = $MontoGrupo;
               
              if($MontoGrupo != 0){ 
               echo '<tr>
                         
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;">ACTIVOS</td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td>
                        <td></td>
                          
                        </tr>';

                  /*FIN GRUPO */
                  /*INICIO CATEGORIA*/
            foreach ($plancuenta as $key => $plan) {
                if($plan["id_grupo"] == $i){
                        
                        
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
                  $MontoGenerica = $sumaGenericaDebito - $sumaGenericaCredito;

                     if($MontoGenerica != 0){

                      $Rnc_Empresa_Cuentas = $_SESSION["RncEmpresaUsuario"];
                      $id_grupo = $i;
                      $id_categoria = $plan["id_categoria"];
                      $id_generica = $gene["id_generica"];
                      $subgenerica = ControladorContabilidad::ctrplandesubcuenta($Rnc_Empresa_Cuentas, $id_grupo, $id_categoria, $id_generica);

                

                    echo '<tr>
                        <td style="font-weight:bold; border:1px solid #eee;">'.$gene["Nombre_Cuenta"].'</td>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        </td>';


                    
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
                        
                        <td>'.$subgene["Nombre_subCuenta"].'</td>
                       
                   <td>'.number_format($MontoCuenta, 2).'</td>
                   <td></td>
                  <td></td>
                   <td><div class="btn-group">
      <button class="btn btn-default btnVerEstadoSituacion" idgrupo="'.$i.'" idcategoria="'.$plan["id_categoria"].'" idgenerica ="'.$gene["id_generica"].'"  idcuenta="'.$subgene["id_subgenerica"].'" idNombre ="'.$subgene["Nombre_subCuenta"].'" FechaDesde ="'.$FechaDesde.'" FechaHasta ="'.$FechaHasta.'" Rnc_Empresa_LD ="'.$Rnc_Empresa_LD.'" data-toggle="modal" data-target="#modalVerEstadoSituacion"><i class="glyphicon glyphicon-search"></i></button>
</div></td>
 
                      </tr>';
                    }




                     }/*foreach $subgenerica*/
                      echo '<tr>
                     
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;">'."TOTAL ".$gene["Nombre_Cuenta"].'</td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td>
                        <td>'.number_format($MontoGenerica, 2).'</td>
                        <td></td> 
                        <td></td> 
                      
                      
                        
                        </tr>';
                  

                   }/*CIERRE IF $MontoGenerica*/

                  }/*CIERRE FOR $generica*/

                   }/*CIERRE IF ID GRUPO*/
                  
                  }/*CIERRE FOR PLAN CUENTA*/

                }/*CIERRE IF MONTO GRUPO*/ 
                 echo '<tr>
                     
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;">TOTAL ACTIVOS</td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td> 
                      
                        <td>'.number_format($MontoGrupo, 2).'</td>
                        <td></td> 
                      
                        
                        </tr>';
                


              }/*CIERRE IF MONTO GRUPO*/ 
                
                break;
             case '2':
                $sumaGrupoDebito = 0;
                $sumaGrupoCredito = 0;
                $MontoGrupo = 0;

                /*GRUPO*/
                foreach ($respuesta as $key => $value){
                  if($value["id_grupo"] == $i){
                      $sumaGrupoDebito =  $sumaGrupoDebito + $value["debito"];
                      $sumaGrupoCredito = $sumaGrupoCredito + $value["credito"];
                    }
                  
                }/*CIERRE RESPUESTA*/

             $MontoGrupo = $sumaGrupoCredito - $sumaGrupoDebito;
              $totalPasivo = $MontoGrupo;
                    
                    
               
              if($MontoGrupo != 0){ 
               echo '<tr>
                         
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;">PASIVOS</td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td>
                        <td></td>
                          
                        </tr>';

                  /*FIN GRUPO */
                  /*INICIO CATEGORIA*/
            foreach ($plancuenta as $key => $plan) {
                if($plan["id_grupo"] == $i){
                        
                        
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
                  $MontoGenerica = $sumaGenericaDebito - $sumaGenericaCredito;

                     if($MontoGenerica != 0){

                      $Rnc_Empresa_Cuentas = $_SESSION["RncEmpresaUsuario"];
                      $id_grupo = $i;
                      $id_categoria = $plan["id_categoria"];
                      $id_generica = $gene["id_generica"];
                      $subgenerica = ControladorContabilidad::ctrplandesubcuenta($Rnc_Empresa_Cuentas, $id_grupo, $id_categoria, $id_generica);

                

                    echo '<tr>
                        <td style="font-weight:bold; border:1px solid #eee;">'.$gene["Nombre_Cuenta"].'</td>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        </td>';


                    
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
                        
                        <td>'.$subgene["Nombre_subCuenta"].'</td>
                       
                   <td>'.number_format($MontoCuenta, 2).'</td>
                   <td></td>
                  <td></td>
                   <td><div class="btn-group">
      <button class="btn btn-default btnVerEstadoSituacion" idgrupo="'.$i.'" idcategoria="'.$plan["id_categoria"].'" idgenerica ="'.$gene["id_generica"].'"  idcuenta="'.$subgene["id_subgenerica"].'" idNombre ="'.$subgene["Nombre_subCuenta"].'" FechaDesde ="'.$FechaDesde.'" FechaHasta ="'.$FechaHasta.'" Rnc_Empresa_LD ="'.$Rnc_Empresa_LD.'" data-toggle="modal" data-target="#modalVerEstadoSituacion"><i class="glyphicon glyphicon-search"></i></button>
</div></td>
 
                      </tr>';
                    }




                     }/*foreach $subgenerica*/
                      echo '<tr>
                     
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;">'."TOTAL ".$gene["Nombre_Cuenta"].'</td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td>
                        <td>'.number_format($MontoGenerica, 2).'</td>
                        <td></td> 
                        <td></td> 
                      
                      
                        
                        </tr>';
                  

                   }/*CIERRE IF $MontoGenerica*/

                  }/*CIERRE FOR $generica*/

                   }/*CIERRE IF ID GRUPO*/
                  
                  }/*CIERRE FOR PLAN CUENTA*/

                }/*CIERRE IF MONTO GRUPO*/ 
                 echo '<tr>
                     
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;">TOTAL PASIVOS</td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td> 
                      
                        <td>'.number_format($MontoGrupo, 2).'</td>
                        <td></td> 
                      
                        
                        </tr>';
                


              }/*CIERRE IF MONTO GRUPO*/ 
                
                break;
               case '3':
                $sumaGrupoDebito = 0;
                $sumaGrupoCredito = 0;
                $MontoGrupo = 0;

                /*GRUPO*/
                foreach ($respuesta as $key => $value){
                  if($value["id_grupo"] == $i){
                      $sumaGrupoDebito =  $sumaGrupoDebito + $value["debito"];
                      $sumaGrupoCredito = $sumaGrupoCredito + $value["credito"];
                    }
                  
                }/*CIERRE RESPUESTA*/

              $MontoGrupo = $sumaGrupoCredito - $sumaGrupoDebito + $totalEstado;
              $totalPatrimonio = $MontoGrupo; 
                           
               
              if($MontoGrupo != 0){ 
               echo '<tr>
                         
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;">PATRIMONIO</td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td>
                        <td></td>
                          
                        </tr>';

                  /*FIN GRUPO */
                  /*INICIO CATEGORIA*/
            foreach ($plancuenta as $key => $plan) {
                if($plan["id_grupo"] == $i){
                        
                        
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
                     if($plan["id_grupo"] == 3 && $plan["id_categoria"] == 6){
                      $MontoCategoria = $MontoCategoria + $totalEstado;
                    }

                  
                          
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
                  $MontoGenerica = $sumaGenericaDebito - $sumaGenericaCredito;
                  if($plan["id_grupo"] == 3 && $plan["id_categoria"] == 6 && $gene["id_generica"] == "01"){
                      $MontoGenerica = $MontoGenerica + $totalEstado;
                    }

                     if($MontoGenerica != 0){

                      $Rnc_Empresa_Cuentas = $_SESSION["RncEmpresaUsuario"];
                      $id_grupo = $i;
                      $id_categoria = $plan["id_categoria"];
                      $id_generica = $gene["id_generica"];
                      $subgenerica = ControladorContabilidad::ctrplandesubcuenta($Rnc_Empresa_Cuentas, $id_grupo, $id_categoria, $id_generica);

                

                    echo '<tr>
                        <td style="font-weight:bold; border:1px solid #eee;">'.$gene["Nombre_Cuenta"].'</td>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        </td>';


                    
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
                   if($plan["id_grupo"] == 3 && $plan["id_categoria"] == 6 && $gene["id_generica"] == "01" && $subgene["id_subgenerica"] == "001"){
                      $MontoCuenta = $MontoCuenta + $totalEstado;
                    }

                  if($MontoCuenta != 0){
                   
                   echo '<tr>
                        
                        <td>'.$subgene["Nombre_subCuenta"].'</td>
                       
                   <td>'.number_format($MontoCuenta, 2).'</td>
                  
 <td></td>
<td></td>
 <td><div class="btn-group">
      <button class="btn btn-default btnVerEstadoSituacion" idgrupo="'.$i.'" idcategoria="'.$plan["id_categoria"].'" idgenerica ="'.$gene["id_generica"].'"  idcuenta="'.$subgene["id_subgenerica"].'" idNombre ="'.$subgene["Nombre_subCuenta"].'" FechaDesde ="'.$FechaDesde.'" FechaHasta ="'.$FechaHasta.'" Rnc_Empresa_LD ="'.$Rnc_Empresa_LD.'" data-toggle="modal" data-target="#modalVerEstadoSituacion"><i class="glyphicon glyphicon-search"></i></button>
</div></td>
                      </tr>';
                    }




                     }/*foreach $subgenerica*/
                      echo '<tr>
                     
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;">'."TOTAL ".$gene["Nombre_Cuenta"].'</td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td>
                        <td>'.number_format($MontoGenerica, 2).'</td>
                        <td></td> 
                        <td></td> 
                      
                      
                        
                        </tr>';
                  

                   }/*CIERRE IF $MontoGenerica*/

                  }/*CIERRE FOR $generica*/

                   }/*CIERRE IF ID GRUPO*/
                  
                  }/*CIERRE FOR PLAN CUENTA*/

                }/*CIERRE IF MONTO GRUPO*/ 
                 echo '<tr>
                     
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;">TOTAL PATRIMONIO</td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td> 
                      
                        <td>'.number_format($MontoGrupo, 2).'</td>
                        <td></td> 
                      
                        
                        </tr>';
                


              }/*CIERRE IF MONTO GRUPO*/ 
                
                break;
                  
             } /*CIERRE SWICHT*/

             } /*CIERRE FOR i*/

             $Comparacion = $totalActivo - $totalPasivo - $totalPatrimonio;
            $totalPASPATRI = $totalPasivo + $totalPatrimonio;

          }/*CIERRE IF NIVEL 1*/



          /********************FIN NIVEL 4**************/

 
           

           ?>
            <!--*****************FIN ******************************** -->

              <!--***************** CIERRE FILA 1  TABLA  USUARIO********************************* -->

              

            </tbody>
            <tfoot>
              <tr>
                       
                  <td style="font-weight:bold; border:1px solid #eee; background: #ABEBC6;">TOTAL PASIVOS PATRIMONIO </td>
                  <td style="font-weight:bold; border:1px solid #eee; background: #ABEBC6;"></td>
                  <td style="font-weight:bold; border:1px solid #eee; background: #ABEBC6;"></td> 
                  <td style="font-weight:bold; border:1px solid #eee; background: #ABEBC6;"><?php echo number_format($totalPASPATRI, 2);?></td>
                  <td></td> 
              </tr>
             
              <tr>
                       
                  <td style="font-weight:bold; border:1px solid #eee; background: #ABEBC6;">DIFERENCIA DE COMPROBACION</td>
                  <td style="font-weight:bold; border:1px solid #eee; background: #ABEBC6;"></td>
                  <td style="font-weight:bold; border:1px solid #eee; background: #ABEBC6;"></td> 
                  <td style="font-weight:bold; border:1px solid #eee; background: #ABEBC6;"><?php echo number_format($Comparacion, 2);?></td>
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
<div id="modalVerEstadoSituacion" class="modal fade" role="dialog">
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

              <input type="text" class="form-control col-xs-6" id="NombreSituacion" name="NombreSituacion" readonly>
                
          </div>

          <table class="table table-bordered table-striped dt-responsive" width="100%">
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

            <tbody id="VerEstadoSituacion">
              

            </tbody>
            

          </table>

          <div class="col-xs-6">
            <label>Total Debito:</label>

            <input type="text" class="form-control col-xs-6" id="debitoSituacion" name="debitoSituacion" readonly>
           

          </div>

         <div class="col-xs-6">
          <label>Total Credito:</label>

            <input type="text" class="form-control col-xs-6" id="creditoSituacion" name="creditoSituacion" readonly>
             
          
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
                      
 
 