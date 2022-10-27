
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar Diario de Ajuste
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active"></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">

        <!--=================================================
          EL FORMULARIO DE CRERAR VENTAS 
        =======================================================-->

        <div class="col-lg-8">
          
          <div class="box box-success">

            <div class="box-header with-border">

               <?php
                $Rnc_Empresa = $_SESSION["RncEmpresaUsuario"];
                
                $Tipo_NCF = "DDA";

                $respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);


               if($respuesta == false){
                   echo'<button class="btn btn-warning pull-right"  data-toggle="modal" data-target="#modalCorrelativoNoFiscal"><i class="fa fa-pencil"></i></button>
                  ';



                }



               ?>
               
               



      
            </div>

            <form role="form" method="post" class="IngresoCuenta">

            <div class="box-body">
              <?php 
                  $id_registro = $_GET["id_Ajuste"];
                  $Rnc_Empresa_LD = $_SESSION["RncEmpresaUsuario"];
                  $Rnc_Factura = $_GET["Rnc_Factura"];
                  $NCF = $_GET["NCF"];
                  $Extraer = $_GET["Extraer"];

                  $respuesta = ControladorDiario::ctrMostrarGastoDiarioEditar($id_registro, $Rnc_Empresa_LD, $Rnc_Factura, $NCF, $Extraer);

                  foreach ($respuesta as $key => $value) {
                  
                  }


                 
              ?>

             

             
                <div class="box">
                  <input type="hidden"  id="RncEmpresa606" name="RncEmpresa606" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">
                   <input type="hidden" class="form-control" id="Contabilidad" name="Contabilidad" value="<?php echo $_SESSION["Contabilidad"]?>">
                  <input type="hidden" class="form-control" id="Banco" name="Banco" value="<?php echo $_SESSION["Banco"]?>">
                  <input type="hidden" class="form-control" id="Proyecto" name="Proyecto" value="<?php echo $_SESSION["Proyecto"]?>">
                  
                   <input type="hidden" class="form-control" id="Usuariologueado" name="UsuarioLogueado" value="<?php echo $_SESSION["Nombre"]?>">

                
                  

                  <div class="form-group">

                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>

                    <input type="text" class="form-control input-RNC" maxlength="11" id="Rnc_Factura" name="Rnc_Factura" value="<?php echo $Rnc_Factura;?>" required>

                  </div>

                </div>
                
                  <div class="form-group">

                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>

                    <input type="text"  class="form-control" id="Nombre_Empresa" name="Nombre_Empresa" value="<?php echo $value["Nombre_Empresa"];?>" required>
                   

                  </div>

                </div>
                  <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                       <div class="input-group form-control Fecha-607">

                     <label>Año/Mes</label>
                     <input type="text" class="Fechames_607" maxlength="6" id="FechaFacturames_607" name="FechaFacturames_607" value="<?php if (isset($_SESSION['FechaFacturames_607'])){ echo $_SESSION['FechaFacturames_607'];}?>" required autofocus>

                     
                      <label>Dìa</label>
                      <input type="text" class="Fechadia_607" maxlength="2" id="FechaFacturadia_607" name="FechaFacturadia_607" value="<?php if (isset($_SESSION['FechaFacturadia_607'])){ echo $_SESSION['FechaFacturadia_607'];}?>" required>


                    </div>
                   

                  </div>
                  </div>

                  <!--=================================================
                    ENTRADA DEL CODIGO DE LA VENTA======================================================-->
                   <!--=================================================-->



                    
                     <div class="col-xs-9">
                      <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-audio-description"></i></span>

                      
                     
                      <input type="text" class="form-control" id="Descripcion" name="Descripcion" value="<?php echo $value["ObservacionesLD"];?>">

                     </div>
                     

                    </div>
                   

                  </div>
                  <div class="form-group col-xs-6">
                        <br>

                   
                      <label><h3>Distribución Cuentas/Proyectos</h3></label>

                    <div class="input-group">
                    

                      <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                      <?php 

                      $Rnc_Empresa_Diario = $_SESSION["RncEmpresaUsuario"];
                      $tipocod = "DDA";


                      $codigo = ControladorDiario::ctrCodigoAsientoDiario($Rnc_Empresa_Diario, $tipocod);
               
                        if(!$codigo){

                               echo '<script>
                          swal({

                            type: "error",
                            title: "¡DEBE INICIALIZAR EL CODIGO DE ASIENTO DIARIO EN EL LAPIZ COLOR ANARANJADO QUE ESTA EN LA PARTE SUPERIOR DEL FORMULARIO!",
                            showConfirmButton: false,
                            timer: 8000
                            });

                          </script>';   



                      } else{


                       foreach ($codigo as $key => $value) {

                            
                          }

                      $N = $value["NCF_Cons"]+1;
                      $NAsiento = "DDA".$N;

                      

                      echo ' <input type="hidden" class="form-control" id="CodAsiento" name="CodAsiento" value="'.$N.'" readonly>
                       <input type="hidden" class="form-control" id="idAjuste" name="idAjuste" value="'.$N.'" readonly>
                      <input type="text" class="form-control" id="NAsiento" name="NAsiento" value="'.$NAsiento.'" readonly required>';
                      }
                    

                      

                       ?>

                     

                    </div>
                   

                  </div>
          
                   <div class="form-group row nuevaCuenta">

                      <div class="col-xs-12">
                        <label class="pull-right" style="padding-right:140px">PROYECTO</label>
                        <label class="pull-right" style="padding-right:160px">CREDITO</label>
                        <label class="pull-right" style="padding-right:120px">DEBITO</label>
                        <label class="pull-right" style="padding-right:290px">CUENTA CONTABLE</label>
                      </div>

                    <?php 
                 

                  $debito = 0;
                  $credito = 0;
                  $NAsiento = "";
if($_SESSION["Proyecto"] == 1){ 
                  foreach ($respuesta as $key => $value) {
                    $debito = $debito + $value["debito"];
                    $credito = $credito + $value["credito"];

                    $Rnc_Empresa_Proyectos = $_SESSION["RncEmpresaUsuario"];

                        $proyectos = ControladorProyecto::ctrMostrarProyectos($Rnc_Empresa_Proyectos);
                        $NAsiento = $value["NAsiento"];
                  
                        
                     $plancuenta = $value["id_grupo"].'.'.$value["id_categoria"].'.'.$value["id_generica"].'.'.$value["id_cuenta"];
                echo '<div class="row" style="padding:5px 15px">
                        <div class="col-xs-2" style="padding-right:0px">
                          <div class="input-group">
                            <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarcuenta" idcuenta ="'.$plancuenta.'"><i class="fa fa-times"></i></button>
                          </span>
                          <input type="text" class="form-control plancuenta" idcuenta ="'.$plancuenta.'" name="plancuenta" value="'.$plancuenta.'" required readonly> 
                            
                      </div>
                      </div> 
                      <input type="hidden" class="idgrupo" id="idgrupo" name="idgrupo" value="'.$value["id_grupo"].'" readonly required>
                         <input type="hidden" class="idcategoria" name ="idcategoria" value="'.$value["id_categoria"].'" required readonly>
                         <input type="hidden"  class="idgenerica" name="idgenerica" value="'.$value["id_generica"].'" required readonly>
                          <input type="hidden" class="idcuenta" name="idcuenta" value="'.$value["id_cuenta"].'" required readonly> 
                            
                     
                          <div class="col-xs-3" style="padding-left:0px">
                          
                            <div input-group">
                            
                          <input type="text" class="form-control nombrecuenta" name="nombrecuenta" value="'.$value["Nombre_Cuenta"].'" required readonly> 
                            
                          </div>
                          </div>
                        <div class="col-xs-2" style="padding-right:0px">
                      
                      <div input-group">
                        
                        <input type="text" class="form-control debito"  name="debito" value="'.$value["debito"].'" required>
                        
                      </div>
                      </div>
                      <div class="col-xs-2" style="padding-left:0px">
                      
                      <div input-group">
                        
                        <input type="text" class="form-control credito" name="credito" value="'.$value["credito"].'" required>
                        
                      </div>
                      </div>
                      <div class="col-xs-3" style="padding-left:0px">
                      
                      <div input-group">
                        
                         <select type="text" class="form-control proyecto" id="proyecto" name="proyecto" required>
                          <option value="'.$value["id_Proyecto"].'">'.$value["CodigoProyecto"].'</option>';


                         foreach ($proyectos as $key => $pro) {
                          echo '<option value="'.$pro["id"].'">'.$pro["CodigoProyecto"].'</option>';
                         }
                               

                               

                           echo'</select>
                           </div>
                      </div>

                      </div>';


                  }


                  $totalcreditovi = number_format($credito);
                  $totaldebitovi = number_format($debito);

                   } else{
                     foreach ($respuesta as $key => $value) {
                    $debito = $debito + $value["debito"];
                    $credito = $credito + $value["credito"];

                    
                        $NAsiento = $value["NAsiento"];
                  
                        
                     $plancuenta = $value["id_grupo"].'.'.$value["id_categoria"].'.'.$value["id_generica"].'.'.$value["id_cuenta"];
                echo '<div class="row" style="padding:5px 15px">
                        <div class="col-xs-2" style="padding-right:0px">
                          <div class="input-group">
                            <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarcuenta" idcuenta ="'.$plancuenta.'"><i class="fa fa-times"></i></button>
                          </span>
                          <input type="text" class="form-control plancuenta" idcuenta ="'.$plancuenta.'" name="plancuenta" value="'.$plancuenta.'" required readonly> 
                            
                      </div>
                      </div> 
                      <input type="hidden" class="idgrupo" id="idgrupo" name="idgrupo" value="'.$value["id_grupo"].'" readonly required>
                         <input type="hidden" class="idcategoria" name ="idcategoria" value="'.$value["id_categoria"].'" required readonly>
                         <input type="hidden"  class="idgenerica" name="idgenerica" value="'.$value["id_generica"].'" required readonly>
                          <input type="hidden" class="idcuenta" name="idcuenta" value="'.$value["id_cuenta"].'" required readonly> 
                            
                     
                          <div class="col-xs-3" style="padding-left:0px">
                          
                            <div input-group">
                            
                          <input type="text" class="form-control nombrecuenta" name="nombrecuenta" value="'.$value["Nombre_Cuenta"].'" required readonly> 
                            
                          </div>
                          </div>
                        <div class="col-xs-2" style="padding-right:0px">
                      
                      <div input-group">
                        
                        <input type="text" class="form-control debito"  name="debito" value="'.$value["debito"].'" required>
                        
                      </div>
                      </div>
                      <div class="col-xs-2" style="padding-left:0px">
                      
                      <div input-group">
                        
                        <input type="text" class="form-control credito" name="credito" value="'.$value["credito"].'" required>
                        
                      </div>
                      </div>
                      <div class="col-xs-3" style="padding-left:0px">
                      
                      <div input-group">

                         <input type="hidden" class="form-control proyecto" id="proyecto" name="proyecto" value="0" required>
                          
                        
                         
                         
                           </div>
                      </div>

                      </div>';


                  }


                  $totalcreditovi = number_format($credito);
                  $totaldebitovi = number_format($debito);



                   }

                  
                  




                  ?>
                     


                   </div>

                   <input type="hidden" id="listaCuentas" name="listaCuentas">

                      <div class="col-xs-8 pull-right">
                        
                              <div class="input-group">

                        
                            <label>TOTALES</label> 
                        <input class="col-xs-4 pull-right totalcreditovi" type="text" name="totalcreditovi" id="totalcreditovi" value="<?php echo $totalcreditovi;?>"required readonly>
                        
                        <input class="col-xs-4 pull-right totaldebitovi" type="text" name="totaldebitovi" id="totaldebitovi"  value="<?php echo $totaldebitovi;?>"required readonly>
                         
                         <input class="col-xs-4 pull-right totalcredito" type="hidden" name="totalcredito" id="totalcredito"  value="<?php echo $credito;?>" required readonly>
                        
                        <input class="col-xs-4 pull-right totaldebito" type="hidden" name="totaldebito" id="totaldebito"  value="<?php echo $debito;?>" required readonly>


                      </div>
                    

                   </div>

                     

              
                </div>             
              

            </div>
                  

            <div class="box-footer">
              <button type="submit" class="btn btn-primary pull-right">Modificar</button>

                     
            </div>
          
          </div>
           <?php 

          $ajusteDiario = new ControladorDiario();
          $ajusteDiario -> ctrajustediario();


           ?>
          
          </form>
          
       
        </div>

          
     

         <!--=================================================
            LA TABLA  DE PRODUCTO
        =======================================================-->

        <div class="col-lg-4">

          <div class="box box-warning"></div>

          <div class="box-header with-border">

            <div class="box-body">

             
              <table class="display nowrap table table-bordered table-striped tabladiariogasto" width="100%">


            <thead>
              <tr>   
              <th style="width:2px">N° Cuenta</th>
              <th style="width:3px">Nombre</th>
              <th style="width:3px"></th>
              </tr>
            </thead>
            <!--*****************CIERRE CABECERA TABLA  USUARIO********************************* -->
            
            <!--*****************CUERPO  TABLA  USUARIO********************************* -->

            <tbody>
              
              <?php


              $tabla = "grupo_empresa"; 
              
              
              $respuesta = ControladorContabilidad::ctrgrupoempresas($tabla);

             
            for ($i=1; $i <=7; $i++) {
                  
                switch ($i) {
                  case '1':
                    echo '<tr>
                        <td>1</td>
                        <td>ACTIVOS</td>
                         <td></td> 
                        </tr>';
                        break;
                  case '2':
                    echo '<tr>
                        <td>2</td>
                        <td>PASIVO</td>
                         <td></td> 
                        </tr>';
                        break;
                    case '3':
                    echo '<tr>
                        <td>3</td>
                        <td>PATRIMONIO</td>
                         <td></td> 
                        </tr>';
                        break;
                      case '4':
                    echo '<tr>
                        <td>4</td>
                        <td>INGRESOS</td>
                         <td></td> 
                        </tr>';
                        break;
                      case '5':
                    echo '<tr>
                        <td>5</td>
                        <td>COSTOS</td>
                        <td></td> 
                        </tr>';
                        break;
                      case '6':
                    echo '<tr>
                        <td>6</td>
                        <td>GASTOS</td> 
                        <td></td>
                        </tr>';
                        break;

              
                  }/*cierre swich*/


                 
                    foreach ($respuesta as $key => $value) {

                      if($value["id_grupo"] == $i){
                         echo '<tr>
                        <td>'.$i.'.'.$value["id_categoria"].'</td>
                        <td>'.$value["Nombre_Categoria"].'</td>
                        <td></td>
                        </tr>';

                        $Rnc_Empresa_Cuentas = $_SESSION["RncEmpresaUsuario"];
                        $grupo = $i;
                        $categorias = $value["id_categoria"];

                    $generica = ControladorContabilidad::ctrplandecuenta($Rnc_Empresa_Cuentas, $grupo, $categorias);

                      foreach ($generica  as $key => $gene){
                         echo '<tr>
                        <td>'.$i.'.'.$value["id_categoria"].'.'.$gene["id_generica"].'</td>
                        <td>'.$gene["Nombre_Cuenta"].'</td>
                        <td></td>  
                        </tr>';

                      $Rnc_Empresa_Cuentas = $_SESSION["RncEmpresaUsuario"];
                      $id_grupo = $i;
                      $id_categoria = $value["id_categoria"];
                      $id_generica = $gene["id_generica"];
                      $subgenerica = ControladorContabilidad::ctrplandesubcuenta($Rnc_Empresa_Cuentas, $id_grupo, $id_categoria, $id_generica);

                      foreach ($subgenerica  as $key => $subgene){
                         echo '<tr>
                        <td>'.$i.'.'.$value["id_categoria"].'.'.$gene["id_generica"].'.'.$subgene["id_subgenerica"].'</td>
                        <td>'.$subgene["Nombre_subCuenta"].'</td>
                        <td><button class="btn btn-primary btn-xs agregarCuenta recuperarCuenta" idgrupo="'.$i.'" idcategoria="'.$value["id_categoria"].'" idgenerica="'.$gene["id_generica"].'" idcuenta="'.$subgene["id_subgenerica"].'" NombreCuenta="'.$subgene["Nombre_subCuenta"].'" >+</button></td>
                          

                        </tr>';
                         
                         }


                      
                       }/*CIERRE FOR GNERICA*/
                      
                      }/*cierre if*/





                  }/*cierre foreach*/



                    
                  
                  
              }/*cierre for $i*/
              
             
              
               ?>

              

             
              <!--***************** CIERRE FILA 1  TABLA  USUARIO********************************* -->

              

              

            </tbody>
            <!--*****************CIERRE CUERPO  TABLA  USUARIO********************************* -->

            
          </table>
              

              

            </div>
            

          </div>  


        </div>     

      </div>

      
    </section>


   </div>


