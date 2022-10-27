
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
<h1 class="col-xs-4" style="font-size: 30px"><i class="glyphicon glyphicon-list-alt"></i>
       Administrar Anticipos
  </h1>
 



   <button class="btn btn-success" data-toggle="modal" data-target="#modalOtorgarAnticipos"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Otorgar Anticipos</button>
<?php
  
  $Rnc_Empresa = $_SESSION["RncEmpresaUsuario"];
                
  $Tipo_NCF = "DOA";

  $respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);


    if($respuesta == false){
      echo'<button class="btn btn-warning"  data-toggle="modal" data-target="#modalCorrelativoNoFiscal"><i class="fa fa-pencil"></i></button>';

    }

$Rnc_Empresa = $_SESSION["RncEmpresaUsuario"];
$Rnc_Empresa_Master = null;
$Orden = "id";

$Empresa = ControladorEmpresas::ctrEmpresas($Rnc_Empresa, $Rnc_Empresa_Master, $Orden);

?>
               

         
    
     

    
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Administrar Anticipos</li>
      </ol>
    </section>

    <section class="content">

      
      <div class="box">

          <!--*****************BOTON DE AGREGAR USUARIO********************************* -->

        <div class="box-header with-border">

          
        </div>
        <!--*****************CIERRE DE DIV BOTON DE AGREGAR USUARIO********************************* -->


        <div class="box-body">
          <!--*****************TABLA  USUARIO********************************* -->


          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

            <!--*****************CABECERA TABLA  USUARIO********************************* -->         
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre Contable del Anticipo</th>
                <th>Numero de Anticipo</th>
                <th>Nombre De Anticipo</th>
                <th>Otorgado</th>
                <th>Ejecutado</th>
                <th>Por Ejecutado</th>
                <th>Estado</th>
               
               
                
              </tr>
              

            </thead>
            <!--*****************CIERRE CABECERA TABLA  USUARIO********************************* -->
            
            <!--*****************CUERPO  TABLA  USUARIO********************************* -->

            <tbody>

              <?php
              $Rnc_Empresa_Anticipo = $_SESSION["RncEmpresaUsuario"];
              $id_grupo = "1";
              $id_categoria = "2";
              $id_generica = "07";
              $TipoCuenta = "ANTICIPOPARAGASTO";

        $datos = array('Rnc_Empresa_Banco' => $Rnc_Empresa_Anticipo, 
                      'id_grupo' => $id_grupo,
                      'id_categoria' => $id_categoria,
                      'id_generica' => $id_generica,
                      'TipoCuenta' => $TipoCuenta);
        $Anticipo = ControladorAnticipo::ctrMostrarAnticipo($datos);
       foreach ($Anticipo as $key => $value) {
        $tabla = "librodiario_empresas";
    
        $datos = array('Rnc_Empresa_LD' => $Rnc_Empresa_Anticipo, 
                      'id_grupo' => $id_grupo,
                      'id_categoria' => $id_categoria,
                      'id_generica' => $id_generica,
                      'id_cuenta' => $value["id_cuenta"]);

          $respuesta = ModeloAnticipo::mdlDetalleAnticipo($tabla, $datos);
         
           
                    $sumaDebito = 0;
                    $sumaCredito = 0;
                    $Monto = 0;
            foreach ($respuesta as $i => $suma){
                 
                      $sumaDebito =  $sumaDebito + $suma["debito"];
                      $sumaCredito = $sumaCredito + $suma["credito"];
                   
                  
              }
               $Monto = $sumaDebito - $sumaCredito;


            
                  echo '<tr>
                    
                    <td class="text-uppercase">'.($key+1).'</td>
                    <td>'.$value["Nombre_CuentaContable"].'</td>
                    <td>'.$value["NumeroCuenta"].'</td>
                    <td>'.$value["Nombre_Cuenta"].'</td>
                    <td>'.number_format($sumaDebito, 2).'</td>
                    <td>'.number_format($sumaCredito, 2).'</td>
                    <td>'.number_format($Monto, 2).'</td>';

                if($value["Estado"] == 1){

                  echo' <td><button class="btn btn-success btn-xs btnActivarFondo" idFondo="'.$value["id"].'" estadoFondo="0">Activado</button></td>';
                } 
                else {

                  echo' <td><button class="btn btn-danger btn-xs btnActivarFondo" idFondo="'.$value["id"].'" estadoFondo="1">Desactivado</button></td>';

                }
                    
                    



            }
             

               



    ?>

             
              

            </tbody>
            <!--*****************CIERRE CUERPO  TABLA  USUARIO********************************* -->

            
          </table>
        
        <!--*****************CIERRE DE TABLA USUARIO********************************* -->

        </div>        

        
      </div>
      

    </section>
 
  </div>

  <!--************************************************
                      MODAL AGREGAR Categoria
  ******************************************************* -->

    
  <!-- Modal -->
<div id="modalOtorgarAnticipos" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Otorgar Anticipos</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <div class="input-group">
            <input type="hidden" class="form-control input-lg" id="RncEmpresanticipo" name="RncEmpresanticipo" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
            <input type="hidden" class="form-control input-lg" id="UsuarioLogueado" name="UsuarioLogueado" value="<?php echo $_SESSION["Usuario"];?>" readonly>
            <input type="hidden" class="form-control" id="Contabilidad" name="Contabilidad" value="<?php echo $_SESSION["Contabilidad"]?>">
            <input type="hidden" class="form-control" id="Banco" name="Banco" value="<?php echo $_SESSION["Banco"]?>">
            <input type="hidden" class="form-control" id="Proyecto" name="Proyecto" value="<?php echo $_SESSION["Proyecto"]?>">
            <input type="hidden" class="form-control input-lg" id="ModuloSuplidor" name="ModuloSuplidor" value="usuarios" readonly>

          </div>

    <div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

      <h4 style="text-align: center;"><b>Datos del Fondo a Otorgar</b></h4>

    </div>

    <div class="form-group">

      <div class="input-group">
          
          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

            <div class="input-group form-control FechaInicio">

              <label>Año/Mes</label>
                    
                <input type="text" maxlength="6" id="FechamesAnticipo" name="FechamesAnticipo" required>

              <label>Dìa</label>
                      
                <input type="text" maxlength="2" id="FechadiaAnticipo" name="FechadiaAnticipo" required>


              </div>
          
        </div>

      </div>

             
      <div class="form-group col-xs-4">

        <div class="input-group">
            
          <select class="form-control" id="plancuentabanco" name="plancuentabanco" required>
            
            <option value="">Selecionar Fondo de Anticipo</option>


           <?php  
              $Rnc_Empresa_Anticipo = $_SESSION["RncEmpresaUsuario"];
              $id_grupo = "1";
              $id_categoria = "2";
              $id_generica = "07";
              $TipoCuenta = "ANTICIPOPARAGASTO";

        $datos = array('Rnc_Empresa_Banco' => $Rnc_Empresa_Anticipo, 
                      'id_grupo' => $id_grupo,
                      'id_categoria' => $id_categoria,
                      'id_generica' => $id_generica,
                      'TipoCuenta' => $TipoCuenta);

        $Anticipo = ControladorAnticipo::ctrMostrarAnticipo($datos);

          foreach ($Anticipo as $key => $value) {

    
            echo '<option value="'.$value["id"].'">'.$value["Nombre_Cuenta"].'</option>';
                     }

          ?>

             </select>     
                      
            </div>
        </div>

        <div class="form-group col-xs-4">

        <div class="input-group">
          
          <input type="text" class="form-control" name="MontoAnticipo" placeholder="Mondo del Fondo" required>
            
         
            </div>
        </div>

        <div class="form-group col-xs-4">

        <div class="input-group">
          
          <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                      <?php 

                      $Rnc_Empresa_Diario = $_SESSION["RncEmpresaUsuario"];
                      $tipocod = "DOA";


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
                      $NAsiento = "DOA".$N;

                      

                      echo ' <input type="hidden" class="form-control" id="CodAsiento" name="CodAsiento" value="'.$N.'" readonly>
                       <input type="hidden" class="form-control" id="idOtorgarAnticipa" name="idOtorgarAnticipa" value="'.$N.'" readonly>
                      <input type="text" class="form-control" id="NAsiento" name="NAsiento" value="'.$NAsiento.'" readonly>';
                      }
                    ?>
         
            </div>
        </div>



    <div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

        <h4 style="text-align: center;"><b>Responsable</b></h4>

    </div>

      <div class="form-group col-xs-6">

            <div class="input-group">
              
                    <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                     <div class="input-group form-control TipoSuplidor">

                   
                        <input type="radio" Class="Juridico" name="Tipo_Suplidor" id="juridico" value="1" required> Jurídico

                    
                    
                        <input type="radio" Class="Fisico" name="Tipo_Suplidor" id="fisico" value="2" required> Fisico

                   
                    </div>
                    
            </div>

          </div>


            <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>
              <input type="text" class="form-control input-RNC" maxlength="11" id="RncAnticipo" name="RncAnticipo" placeholder="Ingresar RNC o Cedula del Suplicor" required>

            </div>

          </div>


          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control" id="Nombre_Cuenta" name="Nombre_Cuenta" placeholder="Ingresar Nombre Completo del Suplidor" required>

            </div>

          </div>

    <div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

        <h4 style="text-align: center;"><b>Datos Bancarios</b></h4>

    </div>
  <div class="col-xs-12">
                     
      <div class="form-group col-xs-6">
        
      
        
        <input type="text" class="form-control col-xs-6" maxlength="6" id="Referencia" name="Referencia" placeholder="Referencia del Pago" required>

        </div>
        
      <div class="col-xs-5">
        <select type="text" class="form-control" id="agregarBanco" name="agregarBanco" required>
          <option value="">Selecionar Banco</option>
          <?php 
        
        $Rnc_Empresa_Banco = $_SESSION["RncEmpresaUsuario"];

        $Banco = ControladorBanco::ctrMostrarBanco($Rnc_Empresa_Banco);

          
        foreach ($Banco as $key => $value){
          if($value["TipoCuenta"] != "ANTICIPOPARAGASTO")

           echo '<option value="'.$value["id"].'">'.$value["Nombre_Cuenta"].'</option>';


            }
        
       

       ?>


          
          </select>
         </div>
        
                            
      </div>

 <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-audio-description"></i></span>
              <input type="text" class="form-control" id="Descripcion" name="Descripcion" placeholder="Descripcion" required>

            </div>

          </div>




       </div> 
      </div>
      
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar</button>

      </div>
      <?php 
      

      $OtorgarAnticipo = new ControladorAnticipo();
      $OtorgarAnticipo -> ctrOtorgarAnticipo();
      

       ?>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>



<!--************************************************
                    CIERRE DE  MODAL AGREGAR categoria
  ******************************************************* -->
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

                    <input type="text" class="form-control input-NCF" id="Tipo_NCF" name="Tipo_NCF" maxlength="3" Value="DOA" readonly>

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