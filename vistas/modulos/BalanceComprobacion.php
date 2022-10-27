
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
   

       <h1 class="col-xs-4" style="font-size: 30px"><i class="fa fa-pie-chart"></i>
         ESTADO DE COMPROBACIÓN
        
      </h1>
      

  <a href="gastodiario" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Diario de Gasto</a>

  <a href="ingresodiario" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Diario de Ingreso</a>
   <a href="ajustediario" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Diario de Ajuste</a>

   <a href="libromayor" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Libro Mayor</a>

      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Estado de Comptrabacion</li>
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

                      <input type="radio" style ="margin-left: 5px" name="Nivel" id="Nivel4"  Value="4" checked>Nivel 4

                     
                      <button style ="margin-left: 5px" class="btn btn-warning btnBalanceComprobacion" id="BalanceComprobacion"><i class="glyphicon glyphicon-search"></i>  </button>

                     

                  </div>
              </div>

        </div>
       
        <!--*****************CIERRE DE DIV BOTON DE AGREGAR USUARIO********************************* -->



        <div class="box-body">
          <!--*****************INICIO NIVEL 1******************************** -->
          <table class="table table-bordered table-striped dt-responsive tablaTodos" width="80%">


            <thead>
              <tr>
                
              <th style="width:3px">Grupo</th>
              <th style="width:3px">Categoria</th>
              <th style="width:5px">Generica</th>
              <th style="width:5px">Cuenta</th>
              <th>Nombre</th>
              <th>Total Debito</th>
              <th>Total Credito</th>
              </tr>
            
             
              
            </thead>
             <tbody>
              <?php 
               $MontoDebito = 0;
               $MontoCredito = 0;
               $TotalDebito = 0;
               $TotalCredito = 0;
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
             

            for ($i=1; $i <=7 ; $i++) {
              switch ($i) {
                case '1':
                $sumaGrupoDebito = 0;
                $sumaGrupoCredito = 0;
               
                /*GRUPO*/
                
                foreach ($respuesta as $key => $value){
                   
                  if($value["id_grupo"] == $i){
                      $sumaGrupoDebito =  $sumaGrupoDebito + $value["debito"];
                      $sumaGrupoCredito = $sumaGrupoCredito + $value["credito"];
                    }
                  
                  }
                   
                    
                    echo '<tr>
                        <td>'.$i.'</td>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td style="font-weight:bold; border:1px solid #eee; background: #D5D8DC;">ACTIVO</td>
                        <td></td>
                        <td></td>  
                        </tr>';

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

                   echo '
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
                        <td>'.number_format($sumaCuentaDebito, 2).'</td>
                        <td>'.number_format($sumaCuentaCredito, 2).'</td>
                   
                      </tr>';
                  $TotalDebito = $TotalDebito + $sumaCuentaDebito;
                  $TotalCredito = $TotalCredito + $sumaCuentaCredito;
                    }

                  }  
                }
                 }
               }
               
               }/*CIERRO IF DE MONTO GENERICA*/

                }/*CIERRO IF DE MONTO DE CATEGORIA*/
              
                  break;
                  case '2':
                $sumaGrupoDebito = 0;
                $sumaGrupoCredito = 0;
               
                /*GRUPO*/
                
                foreach ($respuesta as $key => $value){
                   
                  if($value["id_grupo"] == $i){
                      $sumaGrupoDebito =  $sumaGrupoDebito + $value["debito"];
                      $sumaGrupoCredito = $sumaGrupoCredito + $value["credito"];
                    }
                  
                  }
                   
                    
                    echo '<tr>
                        <td>'.$i.'</td>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td style="font-weight:bold; border:1px solid #eee; background: #D5D8DC;">PASIVO</td>
                        <td></td>
                        <td></td>  
                        </tr>';

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

                   echo '
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
                        <td>'.number_format($sumaCuentaDebito, 2).'</td>
                        <td>'.number_format($sumaCuentaCredito, 2).'</td>
                   
                      </tr>';
                  $TotalDebito = $TotalDebito + $sumaCuentaDebito;
                  $TotalCredito = $TotalCredito + $sumaCuentaCredito;
                    }

                  }  
                }
                 }
               }
               
               }/*CIERRO IF DE MONTO GENERICA*/

                }/*CIERRO IF DE MONTO DE CATEGORIA*/
              
                  break;
                     case '3':
                $sumaGrupoDebito = 0;
                $sumaGrupoCredito = 0;
               
                /*GRUPO*/
                
                foreach ($respuesta as $key => $value){
                   
                  if($value["id_grupo"] == $i){
                      $sumaGrupoDebito =  $sumaGrupoDebito + $value["debito"];
                      $sumaGrupoCredito = $sumaGrupoCredito + $value["credito"];
                    }
                  
                  }
                   
                    
                    echo '<tr>
                        <td>'.$i.'</td>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td style="font-weight:bold; border:1px solid #eee; background: #D5D8DC;">PATRIMONIO</td>
                        <td></td>
                        <td></td>  
                        </tr>';

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

                   echo '
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
                        <td>'.number_format($sumaCuentaDebito, 2).'</td>
                        <td>'.number_format($sumaCuentaCredito, 2).'</td>
                   
                      </tr>';
                  $TotalDebito = $TotalDebito + $sumaCuentaDebito;
                  $TotalCredito = $TotalCredito + $sumaCuentaCredito;
                    }

                  }  
                }
                 }
               }
               
               }/*CIERRO IF DE MONTO GENERICA*/

                }/*CIERRO IF DE MONTO DE CATEGORIA*/
              
                  break;
                  case '4':
                $sumaGrupoDebito = 0;
                $sumaGrupoCredito = 0;
               
                /*GRUPO*/
                
                foreach ($respuesta as $key => $value){
                   
                  if($value["id_grupo"] == $i){
                      $sumaGrupoDebito =  $sumaGrupoDebito + $value["debito"];
                      $sumaGrupoCredito = $sumaGrupoCredito + $value["credito"];
                    }
                  
                  }
                   
                    
                    echo '<tr>
                        <td>'.$i.'</td>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td style="font-weight:bold; border:1px solid #eee; background: #D5D8DC;">INGRESO</td>
                        <td></td>
                        <td></td>  
                        </tr>';

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

                   echo '
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
                        <td>'.number_format($sumaCuentaDebito, 2).'</td>
                        <td>'.number_format($sumaCuentaCredito, 2).'</td>
                   
                      </tr>';
                  $TotalDebito = $TotalDebito + $sumaCuentaDebito;
                  $TotalCredito = $TotalCredito + $sumaCuentaCredito;
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
               
                /*GRUPO*/
                
                foreach ($respuesta as $key => $value){
                   
                  if($value["id_grupo"] == $i){
                      $sumaGrupoDebito =  $sumaGrupoDebito + $value["debito"];
                      $sumaGrupoCredito = $sumaGrupoCredito + $value["credito"];
                    }
                  
                  }
                   
                    
                    echo '<tr>
                        <td>'.$i.'</td>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td style="font-weight:bold; border:1px solid #eee; background: #D5D8DC;">COSTO</td>
                        <td></td>
                        <td></td>  
                        </tr>';

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

                   echo '
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
                        <td>'.number_format($sumaCuentaDebito, 2).'</td>
                        <td>'.number_format($sumaCuentaCredito, 2).'</td>
                   
                      </tr>';
                  $TotalDebito = $TotalDebito + $sumaCuentaDebito;
                  $TotalCredito = $TotalCredito + $sumaCuentaCredito;
                    }

                  }  
                }
                 }
               }
               
               }/*CIERRO IF DE MONTO GENERICA*/

                }/*CIERRO IF DE MONTO DE CATEGORIA*/
              
                  break;
                  case '6':
                $sumaGrupoDebito = 0;
                $sumaGrupoCredito = 0;
               
                /*GRUPO*/
                
                foreach ($respuesta as $key => $value){
                   
                  if($value["id_grupo"] == $i){
                      $sumaGrupoDebito =  $sumaGrupoDebito + $value["debito"];
                      $sumaGrupoCredito = $sumaGrupoCredito + $value["credito"];
                    }
                  
                  }
                   
                    
                    echo '<tr>
                        <td>'.$i.'</td>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td style="font-weight:bold; border:1px solid #eee; background: #D5D8DC;">GASTO</td>
                        <td></td>
                        <td></td>  
                        </tr>';

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

                   echo '
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
                        <td>'.number_format($sumaCuentaDebito, 2).'</td>
                        <td>'.number_format($sumaCuentaCredito, 2).'</td>
                   
                      </tr>';
                  $TotalDebito = $TotalDebito + $sumaCuentaDebito;
                  $TotalCredito = $TotalCredito + $sumaCuentaCredito;
                    }

                  }  
                }
                 }
               }
               
               }/*CIERRO IF DE MONTO GENERICA*/

                }/*CIERRO IF DE MONTO DE CATEGORIA*/
              
                  break;
            

             } /*CIERRE SWICHT*/

             } /*CIERRE FOR i*/

          }/*CIERRE IF NIVEL 1*/

           ?>
              

            </tbody>
            <tfoot>
             
              <tr>
                        <td></td>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td></td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #ABEBC6;"><?php echo number_format($TotalDebito, 2);?></td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #ABEBC6;"><?php echo number_format($TotalCredito, 2);?></td>
                        </tr>
            </tfoot>
            <!--*****************CIERRE CUERPO  TABLA  USUARIO********************************* -->

            
          </table>
        
        



         
       

        </div>        

        
      </div>
      

    </section>
 
  </div>
 