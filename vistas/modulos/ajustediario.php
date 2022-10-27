
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="col-xs-4" style="font-size: 30px"><i class="glyphicon glyphicon-book"></i>
           DIARIO DE AJUSTE
        
      </h1>


  <a href="ajustediario" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Crear Nuevo</a>

  <a href="gastodiario" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Diario de Gasto</a>
  <a href="ingresodiario" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Diario de Ingreso</a>
  <a href="libromayor" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Libro Mayor</a>


    
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">ajustediario</li>
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

             
                <div class="box">
                   <input type="hidden"  id="RncEmpresa606" name="RncEmpresa606" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">
                   <input type="hidden" class="form-control" id="Contabilidad" name="Contabilidad" value="<?php echo $_SESSION["Contabilidad"]?>">
                  <input type="hidden" class="form-control" id="Banco" name="Banco" value="<?php echo $_SESSION["Banco"]?>">
                  <input type="hidden" class="form-control" id="Proyecto" name="Proyecto" value="<?php echo $_SESSION["Proyecto"]?>">
                  
                   <input type="hidden" class="form-control" id="Usuariologueado" name="UsuarioLogueado" value="<?php echo $_SESSION["Nombre"]?>">


                  <div class="form-group">

                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>

                    <input type="text" class="form-control input-RNC" maxlength="11" id="Rnc_Factura" name="Rnc_Factura" placeholder="Ingresar RNC o Cédula" value="<?php if (isset($_SESSION['Rnc_Factura'])){ echo $_SESSION['Rnc_Factura'];}?>" required>

                  </div>

                </div>
                

                  <div class="form-group">

                   <div class="input-group">
                

                    <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>

                    <input type="text"  class="form-control" id="Nombre_Empresa" name="Nombre_Empresa" placeholder="Nombre del Cliente" value="<?php if (isset($_SESSION['Nombre_Empresa'])){ echo $_SESSION['Nombre_Empresa'];}?>" required>
                    
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
                  CIERRE ENTRADA DEL VENDEDOR 
                  =======================================================-->
                   <!--=================================================
                  ENTRADA DEL CODIGO DE LA VENTA 
                  =======================================================-->

                     <div class="col-xs-12">
                      <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-audio-description"></i></span>
                      
                      <input type="text" class="form-control" id="Descripcion" name="Descripcion" placeholder="Descripcion" value="<?php if (isset($_SESSION["Descripcion"])){ echo $_SESSION["Descripcion"]; }?>" required>


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
                     

                    </div>
                   

                  </div>
                  <br>

                
         
          
                   <div class="form-group row nuevaCuenta">
                    <?php
                    if($_SESSION["Proyecto"] == 2){ 

                      echo '<div class="col-xs-12">  
                       
                        <label class="pull-right" style="padding-right:200px">CREDITO</label>
                        <label class="pull-right" style="padding-right:90px">DEBITO</label>
                        <label class="pull-right" style="padding-right:290px">CUENTA CONTABLE</label>

                      </div>';

                    }else {
                      echo '<div class="col-xs-12">  
                        <label class="pull-right" style="padding-right:80px">PROYECTO</label>
                        <label class="pull-right" style="padding-right:120px">CREDITO</label>
                        <label class="pull-right" style="padding-right:90px">DEBITO</label>
                        <label class="pull-right" style="padding-right:220px">CUENTA CONTABLE</label>

                      </div>';



                    }


                       ?>

                       


                    <?php 

                      if (isset($_SESSION["listaCuentas"])){

                        $listaCuentas = json_decode($_SESSION["listaCuentas"], true);

                        $Rnc_Empresa_Proyectos = $_SESSION["RncEmpresaUsuario"];

                        $respuesta = ControladorProyecto::ctrMostrarProyectos($Rnc_Empresa_Proyectos);

                        if($_SESSION["Proyecto"] == 1){ 
                        
                        foreach ($listaCuentas as $key => $value){

                          $plancuenta = $value["idgrupo"].'.'.$value["idcategoria"].'.'.$value["idgenerica"].'.'.$value["idcuenta"];
                echo '<div class="row" style="padding:5px 15px">
                        <div class="col-xs-2" style="padding-right:0px">
                          <div class="input-group">
                            <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarcuenta" idcuenta ="'.$plancuenta.'"><i class="fa fa-times"></i></button>
                          </span>
                          <input type="text" class="form-control plancuenta" idcuenta ="'.$plancuenta.'" name="plancuenta" value="'.$plancuenta.'" required readonly> 
                            
                      </div>
                      </div> 
                      <input type="hidden" class="idgrupo" id="idgrupo" name="idgrupo" value="'.$value["idgrupo"].'" readonly required>
                         <input type="hidden" class="idcategoria" name ="idcategoria" value="'.$value["idcategoria"].'" required readonly>
                         <input type="hidden"  class="idgenerica" name="idgenerica" value="'.$value["idgenerica"].'" required readonly>
                          <input type="hidden" class="idcuenta" name="idcuenta" value="'.$value["idcuenta"].'" required readonly> 
                            
                     
                          <div class="col-xs-3" style="padding-left:0px">
                          
                            <div input-group">
                            
                          <input type="text" class="form-control nombrecuenta" name="nombrecuenta" value="'.$value["nombrecuenta"].'" required readonly> 
                            
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
                          <option value="">Proyecto</option>';


                         foreach ($respuesta as $key => $value) {
                          echo '<option value="'.$value["id"].'">'.$value["CodigoProyecto"].'</option>';
                         }
                               

                               

                           echo'</select>
                           </div>
                      </div>

                      </div>';
                          
                        }
                        }/*IF DE PROYECTO*/
                        else{
                          foreach ($listaCuentas as $key => $value){

                          $plancuenta = $value["idgrupo"].'.'.$value["idcategoria"].'.'.$value["idgenerica"].'.'.$value["idcuenta"];
                echo '<div class="row" style="padding:5px 15px">
                        <div class="col-xs-2" style="padding-right:0px">
                          <div class="input-group">
                            <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarcuenta" idcuenta ="'.$plancuenta.'"><i class="fa fa-times"></i></button>
                          </span>
                          <input type="text" class="form-control plancuenta" idcuenta ="'.$plancuenta.'" name="plancuenta" value="'.$plancuenta.'" required readonly> 
                            
                      </div>
                      </div> 
                      <input type="hidden" class="idgrupo" id="idgrupo" name="idgrupo" value="'.$value["idgrupo"].'" readonly required>
                         <input type="hidden" class="idcategoria" name ="idcategoria" value="'.$value["idcategoria"].'" required readonly>
                         <input type="hidden"  class="idgenerica" name="idgenerica" value="'.$value["idgenerica"].'" required readonly>
                          <input type="hidden" class="idcuenta" name="idcuenta" value="'.$value["idcuenta"].'" required readonly> 
                            
                     
                          <div class="col-xs-3" style="padding-left:0px">
                          
                            <div input-group">
                            
                          <input type="text" class="form-control nombrecuenta" name="nombrecuenta" value="'.$value["nombrecuenta"].'" required readonly> 
                            
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


                        }


                      }/*CIERRE IF ISSET*/ else {}
                     ?>


                   

                   </div>

                   <input class = "col-xs-12" type="hidden" id="listaCuentas" name="listaCuentas">

                  

                      <div class="col-xs-8 pull-right">
                        
                              <div class="input-group">

                        
                          <label>TOTALES</label> 
                        <input class="col-xs-4 pull-right totalcreditovi" type="text" name="totalcreditovi" id="totalcreditovi" placeholder="Credito" required readonly>
                        <input class="col-xs-4 pull-right totaldebitovi" type="text" name="totaldebitovi" id="totaldebitovi" placeholder="Debito" required readonly>
                         <input class="col-xs-4 pull-right totalcredito" type="hidden" name="totalcredito" id="totalcredito" placeholder="Credito" required readonly>
                        <input class="col-xs-4 pull-right totaldebito" type="hidden" name="totaldebito" id="totaldebito" placeholder="Debito" required readonly>


                      </div>
                    
                  </div>
                  <br>  
          
            <div class="box-footer">
              <button type="submit" class="btn btn-primary pull-right">Registrar</button>
            <?php  
              if(isset($_SESSION["FechaFacturadia_607"])){ 
                  unset($_SESSION["FechaFacturadia_607"]); 
                  unset($_SESSION["Rnc_Factura"]); 
                  unset($_SESSION["Nombre_Empresa"]);
                  unset($_SESSION["Descripcion"]);
                  unset($_SESSION["listaCuentas"]);
                }
            ?>

                     
            </div>
          
          </div>
          <?php 

          $ajusteDiario = new ControladorDiario();
          $ajusteDiario -> ctrajustediario();


           ?>

          
          </form>
          
       
        </div>

          
      </div>
    
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
   <!--************************************************
                      MODAL Editat USUARIO
  ******************************************************* -->
  <!-- Modal -->
<div id="modalCorrelativoNoFiscal" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post" enctype="multipart/form-data">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Editar Correlativos</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de EMPRESA USUARIO********************** -->

          <div class="form-group">

            <div class="input-group">
              
              <input type="hidden" class="form-control input-lg" id="RncEmpresaCorrelativosNo" name="RncEmpresaCorrelativosNo" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="UsuarioLoguedo" name="UsuarioLoguedo" value="<?php echo $_SESSION["Nombre"];?>" readonly>

            </div>


          </div>
          <!--*****************cierra input de RNC de EMPRESA USUARIO************************* -->
           <!--*****************id correlativo********************** -->

         

             <div class="form-group col-xs-6">
               <label>Tipo de NCF</label>


                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <input type="text" class="form-control input-NCF" id="Tipo_NCF" name="Tipo_NCF" maxlength="3" Value="DDA" readonly>

                  </div>

                </div>


          
          <!--*****************cierra input de RNC de EMPRESA USUARIO************************* -->
           <div class="form-group col-xs-6">
               <label>Correlativo de Factura No Fiscal</label>


                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <input type="text" class="form-control input-NCF" id="NCF_Cons" name="NCF_Cons" maxlength="10">

                  </div>

                </div>

             
              
          
        </div>

      
        
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Modificar Correlativos</button>

      </div>

      <?php 
      $editarCorrelativos = new ControladorCorrelativos();
      $editarCorrelativos -> ctreditarCorrelativosNoFiscal();
      


       ?>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>


  <!--************************************************
                      MODAL AGREGAR CLIENTE
  ******************************************************* -->
  <!-- Modal -->
<div id="modalAgregarcliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
    <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Agregar Cliente</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de la CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>
              <input type="text" class="form-control input-lg" id="RncEmpresaCliente" name="RncEmpresaCliente" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>

            </div>


          </div>
          <!--*****************cierra input RNC de la CATEGORIA************************** -->
            

         <!--*****************input de Nombre de CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control input-lg" id="nuevoCliente"  name="nuevoCliente" placeholder="Ingresar Nombre Completo" required>

            </div>

          </div>
          <!--*****************cierra input de Nombre de Usuario************************* -->

          <!--*****************input de cedula o pasaporte********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="number" min="0" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Ingresar Documento" required>

            </div>

          </div>
          <!--*****************cierra input de Ncedula o pasaporte************************* -->

           <!--*****************input de EMAIL********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" required>

            </div>

          </div>
          <!--*****************cierra input de EMAIL************************* -->
           <!--*****************input de Telefocno********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-phone"></i></span>
              <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar Teléfono" data-inputmask="'mask': '(999) 999-9999'" data-mask required>

            </div>

          </div>
          <!--*****************cierra input de EMAIL************************* -->

            <!--*****************input de Direccion********************* -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
              <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar Dirección" required>

            </div>

          </div>
          <!--*****************cierra input de Direccion************************* -->

          <!--*****************input de FECHA DE NACIMIENTO********************* -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              <input type="text" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Ingresar Fecha de Nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

            </div>

          </div>
          <!--*****************cierra input de Direccion************************* -->
                     
          
        </div>

      
        
      </div>

      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar Cliente</button>

      </div>
      <?php 
        $crearCliente = new ControladorClientes();
        $crearCliente -> ctrCrearCliente();



       ?>
         
    </form>
    

    </div>

  </div>

</div>

