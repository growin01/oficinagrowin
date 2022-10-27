
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
                     
                
                     
                      <button style ="margin-left: 5px" class="btn btn-warning btnimpEstadoResultado" id="impEstadoResultado"><i class="glyphicon glyphicon-search"></i>  </button>

                      <button style ="margin-left: 5px" class="btn btn-info btnPDFEstadoResultado" id="PDFEstadoResultado"><i class="fa fa-print"></i></button>
                      <input type="hidden"  id="RncEmpresa" name="RncEmpresa" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">

                    

                     

                  </div>
              </div>

        </div>
       
        <!--*****************CIERRE DE DIV BOTON DE AGREGAR USUARIO********************************* -->



        <div class="box-body">
          <!--*****************INICIO NIVEL 1******************************** -->
          <table class="table table-bordered table-striped dt-responsive tablaTodos" width="60%">


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
            if(isset($_GET["FechaDesde"]) && isset($_GET["FechaHasta"])){ 

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
                  foreach ($respuesta as $key => $value){
                    
                  if($value["id_grupo"] == $i){
                      $sumaGrupoDebito =  $sumaGrupoDebito + $value["debito"];
                      $sumaGrupoCredito = $sumaGrupoCredito + $value["credito"];
                    }
                  
                  }

                   $MontoGrupo = $sumaGrupoCredito - $sumaGrupoDebito;
                   if($MontoGrupo != 0){ 
                     echo '<tr>
                         
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;">INGRESO</td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td>
                        <td></td>
                          
                        </tr>';
                    
                   
                        $totalResultado = $totalResultado + $MontoGrupo;
                 
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
                  $MontoGenerica = $sumaGenericaCredito - $sumaGenericaDebito;

                   if($MontoGenerica != 0){
                    echo '<tr>
                        <td style="font-weight:bold; border:1px solid #eee;">'.$gene["Nombre_Cuenta"].'</td>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        </td>';


                 
                  
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
                      
                        <td>'.$subgene["Nombre_subCuenta"].'</td>
                        <td>'.number_format($MontoCuenta, 2).'</td>
                   <td></td>
                    <td></td>
                  
                   <td><div class="btn-group">
      <button class="btn btn-default btnVerEstadoResultado" idgrupo="'.$i.'" idcategoria="'.$plan["id_categoria"].'" idgenerica ="'.$gene["id_generica"].'"  idcuenta="'.$subgene["id_subgenerica"].'" idNombre ="'.$subgene["Nombre_subCuenta"].'" FechaDesde ="'.$FechaDesde.'" FechaHasta ="'.$FechaHasta.'" Rnc_Empresa_LD ="'.$Rnc_Empresa_LD.'" data-toggle="modal" data-target="#modalVerEstadoResultado"><i class="glyphicon glyphicon-search"></i></button>
</div></td> 
                      </tr>';
                    }
                  }  
                     echo '<tr>
                     
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;">'."TOTAL ".$gene["Nombre_Cuenta"].'</td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td>
                        <td>'.number_format($MontoGenerica, 2).'</td>
                        <td></td> 
                        <td></td> 
                      
                      
                        
                        </tr>';
                  
                }
                 }
               }

                }/*CIERRO IF DE MONTO DE GENERICA*/ 
                
                }/*CIERRO IF DE MONTO DE CATEGORIA*/
                
                echo '<tr>
                     
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;">TOTAL INGRESO</td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td> 
                      
                        <td>'.number_format($MontoGrupo, 2).'</td>
                        <td></td> 
                      
                        
                        </tr>';

                }
  
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
                   if($MontoGrupo != 0){ 
                     echo '<tr>
                         
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;">COSTO</td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td>
                         <td></td>
                          
                          
                        </tr>';
                    
                   
                        $totalResultado = $totalResultado - $MontoGrupo;
                 
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
                  $MontoGenerica =  $sumaGenericaDebito - $sumaGenericaCredito  ;

                   if($MontoGenerica != 0){
                    echo '<tr>
                        <td style="font-weight:bold; border:1px solid #eee;">'.$gene["Nombre_Cuenta"].'</td>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td></td>  
                        </td>';


                 
                  
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
                      
                        <td>'.$subgene["Nombre_subCuenta"].'</td>
                        <td>'.number_format($MontoCuenta, 2).'</td>
                   <td></td>
                   <td></td>
                  
                  
                   <td><div class="btn-group">
      <button class="btn btn-default btnVerEstadoResultado" idgrupo="'.$i.'" idcategoria="'.$plan["id_categoria"].'" idgenerica ="'.$gene["id_generica"].'"  idcuenta="'.$subgene["id_subgenerica"].'" idNombre ="'.$subgene["Nombre_subCuenta"].'" FechaDesde ="'.$FechaDesde.'" FechaHasta ="'.$FechaHasta.'" Rnc_Empresa_LD ="'.$Rnc_Empresa_LD.'" data-toggle="modal" data-target="#modalVerEstadoResultado"><i class="glyphicon glyphicon-search"></i></button>
</div></td> 
                      </tr>';
                    }
                  }  
                     echo '<tr>
                     
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;">'."TOTAL ".$gene["Nombre_Cuenta"].'</td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td>
                        <td>'.number_format($MontoGenerica, 2).'</td>
                        <td></td>
                        <td></td> 
                      
                        
                        </tr>';
                  
                }
                 }
               }

                }/*CIERRO IF DE MONTO DE GENERICA*/ 
                
                }/*CIERRO IF DE MONTO DE CATEGORIA*/
                
                echo '<tr>
                     
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;">TOTAL COSTO</td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td> 
                      
                        <td>'.number_format($MontoGrupo, 2).'</td>
                        <td></td> 
                      
                        
                        </tr>';

                }
  
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
                   if($MontoGrupo != 0){ 
                     echo '<tr>
                         
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;">GASTOS</td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td>
                        <td></td>
                          
                        </tr>';
                    
                   
                        $totalResultado = $totalResultado - $MontoGrupo;
                 
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
                  $MontoGenerica =  $sumaGenericaDebito - $sumaGenericaCredito  ;

                   if($MontoGenerica != 0){
                      echo '<tr>
                        <td style="font-weight:bold; border:1px solid #eee;">'.$gene["Nombre_Cuenta"].'</td>
                        <td></td> 
                        <td></td> 
                        <td></td>
                        <td></td>    
                        </td>';

                 
                  
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
                      
                        <td>'.$subgene["Nombre_subCuenta"].'</td>
                        <td>'.number_format($MontoCuenta, 2).'</td>
                        <td></td>
                        <td></td>  
                  
                   <td><div class="btn-group">
      <button class="btn btn-default btnVerEstadoResultado" idgrupo="'.$i.'" idcategoria="'.$plan["id_categoria"].'" idgenerica ="'.$gene["id_generica"].'"  idcuenta="'.$subgene["id_subgenerica"].'" idNombre ="'.$subgene["Nombre_subCuenta"].'" FechaDesde ="'.$FechaDesde.'" FechaHasta ="'.$FechaHasta.'" Rnc_Empresa_LD ="'.$Rnc_Empresa_LD.'" data-toggle="modal" data-target="#modalVerEstadoResultado"><i class="glyphicon glyphicon-search"></i></button>
</div></td> 
                      </tr>';
                    }
                  }  
                     echo '<tr>
                     
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;">'."TOTAL ".$gene["Nombre_Cuenta"].'</td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td>
                        <td>'.number_format($MontoGenerica, 2).'</td>
                        <td></td> 
                       <td></td>
                        
                        </tr>';
                  
                }
                 }
               }

                }/*CIERRO IF DE MONTO DE GENERICA*/ 
                
                }/*CIERRO IF DE MONTO DE CATEGORIA*/
                
                echo '<tr>
                     
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;">TOTAL GASTO</td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td>
                         <td style="font-weight:bold; border:1px solid #eee; background: #E4E4E4;"></td>  
                        <td>'.number_format($MontoGrupo, 2).'</td>
                        <td></td> 
                      
                        
                        </tr>';

                }
  
                  break;

             } /*CIERRE SWICHT*/

             } /*CIERRE FOR i*/

        
}/*cierre isset*/


          /********************FIN NIVEL 4**************/

 
           

           ?>
            <!--*****************FIN ******************************** -->

              <!--***************** CIERRE FILA 1  TABLA  USUARIO********************************* -->

                <tr>
                        
                        <td style="font-weight:bold; border:1px solid #eee; background: #ABEBC6;">TOTAL RESULTADO</td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #ABEBC6;"></td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #ABEBC6;"></td> 
                        <td style="font-weight:bold; border:1px solid #eee; background: #ABEBC6;"><?php echo number_format($totalResultado, 2);?></td>
                        
                        <td></td> 
                       
                        </tr>

            </tbody>
           
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
                      
 