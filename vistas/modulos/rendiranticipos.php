
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      REDICIÓN DE ANTICIPOS  
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Redirfondosdeanticipos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">

        <!--=================================================
          EL FORMULARIO DE CRERAR VENTAS 

        =======================================================-->

        <div class="col-xs-6">
          
          <div class="box box-success">

            <div class="box-header with-border">
               <div class="form-group">
                       <div class="input-group">   
                      <label>Fondo de Anticipos</label>
                       <select type="text" class="form-control col-xs-2" id="rendiranticipos" name="rendiranticipos" required>
                
                    <?php 
                      if(isset($_GET["Banco"])){

                            $id = "id";
                            $valorid = $_GET["Banco"];
                            $Banco = ControladorBanco::ctrModalEditarBanco($id, $valorid); 
                            echo '<option value="'.$Banco["id"].'">'.$Banco["Nombre_Cuenta"].'</option>';
 
                          }else{
                            echo '<option value="">Seleccionar Banco</option>';

                          }

                                $Rnc_Empresa_Banco = $_SESSION["RncEmpresaUsuario"];

                                $Banco = ControladorBanco::ctrMostrarBanco($Rnc_Empresa_Banco);

                                 foreach ($Banco as $key => $value){
                                   if($value["TipoCuenta"] == "ANTICIPOPARAGASTO"){ 


                                  echo '<option value="'.$value["id"].'">'.$value["Nombre_Cuenta"].'</option>';
                                   }


                            }
                            


                      ?>   

                        </select>
                          
                     
                  </div>
                
                </div>



            </div><!--= cierre box del hear===-->

             <div class="box-body">
              <table border="0" cellspacing="5" cellpadding="5">
              
              <tbody>
                <tr>
                    <td>Fecha Desde:</td>
                    <td><input type="text" id="FechaConMin" name="FechaConMin"></td>
                </tr>

                <tr>
                    <td>Fecha Hasta:</td>
                    <td><input type="text" id="FechaConMax" name="FechaConMax"></td>
              </tr>
            </tbody>

          </table>
          
    <br>



          <table class="table table-bordered table-striped conciliar" width="100%">
             

            <!--*****************CABECERA TABLA  USUARIO********************************* -->
        

              
                     
            <thead>
              <tr>
                
                <th style="width:5px">N</th>
                <th style="width:5px">Ref.</th>
                <th>Debito</th>
                <th>Credito</th>
                <th>Mes</th>
                <th>Dia</th>
                <th style="width:10px">Empresa</th>
                <th style="width:10px">NCF</th>
                <th></th>
                
                
               
              </tr>

            
            </thead>
    
            <tbody>
 <!--*****************FILA 1  TABLA  USUARIO********************************* -->
              <?php 
                $debito = 0;
                $credito = 0;
                $totalSaldo = 0;

              if(isset($_GET["Banco"])){

              $id = "id";
              $valorid = $_GET["Banco"];
              $Banco = ControladorBanco::ctrModalEditarBanco($id, $valorid);
              
              $Rnc_Empresa_LD = $_SESSION["RncEmpresaUsuario"];
              $valorid_grupo = $Banco["id_grupo"];
              $valorid_categoria = $Banco["id_categoria"];
              $valorid_generica = $Banco["id_generica"];
              $valorid_cuenta = $Banco["id_cuenta"];
              $valorid_banco = $_GET["Banco"];
              $Ordenmes = "Fecha_AnoMes_Trans";
              $Ordendia = "Fecha_dia_Trans";

              
              $librobanco = ControladorBanco::ctrMostrarLibroBanco($Rnc_Empresa_LD, $valorid_banco, $valorid_grupo, $valorid_categoria, $valorid_generica, $valorid_cuenta, $Ordenmes, $Ordendia);

              
              

  foreach ($librobanco as $key => $value){
               
    if($value["Estado_Banco"] == 2 && $value["Extraer_NAsiento"] != "REC"){
       $retencion = 0;
       
      $id_registro = $value["id_registro"];
              $Rnc_Empresa_LD = $value["Rnc_Empresa_LD"];
              $Rnc_Factura = $value["Rnc_Factura"];
              $NCF = $value["NCF"];
              $Extraer = "REC";

      $diario = ControladorDiario::ctrMostrarGastoDiarioEditar($id_registro, $Rnc_Empresa_LD, $Rnc_Factura, $NCF, $Extraer);

       
       if($diario != false){
        
        
        foreach ($diario as $key1 => $RET) {
        if($Rnc_Empresa_LD = $RET["Rnc_Empresa_LD"] && $valorid_grupo = $RET["id_grupo"] && $valorid_categoria = $RET["id_categoria"] && $valorid_generica = $RET["id_generica"] && $valorid_cuenta = $RET["id_cuenta"]){

            $retencion =  $retencion + $RET["debito"];


          }




          

        }


       

        }
        $total = $value["credito"] - $retencion;

              
                   


            echo'<td>'.$value["NAsiento"].'</td>
            <td>'.$value["referencia"].'</td>
            <td>'.number_format($value["debito"], 2).'</td> 
                        <td>'.number_format($value["credito"], 2).'</td>
                        <td>'.$value["Fecha_AnoMes_Trans"].'</td>
                        <td>'.$value["Fecha_dia_Trans"].'</td>
                        <td>'.$value["Nombre_Empresa"].'</td>
                        <td>'.$value["NCF"].'</td>
                        
                        
                        <td><button class="btn btn-primary btn-xs rendicionfondos recuperarCuenta" id="'.$value["id"].'" nombre="'.$value["Nombre_Empresa"].'" ncf ="'.$value["NCF"].'" referencia="'.$value["referencia"].'" fechames="'.$value["Fecha_AnoMes_Trans"].'" fechadia="'.$value["Fecha_dia_Trans"].'" debito="'.$value["debito"].'" credito="'.$value["credito"].'" observacionesLD = "'.$value["ObservacionesLD"].'">+</button></td></tr>';

                       
                     

               }else {
                 $debito = $debito + $value["debito"];
                    $credito = $credito + $value["credito"];


               }

             } /*CIERRE FOR*/
             $totalSaldo = $debito - $credito;


             }/*CIERRE DE IF ISSET*/

               


               ?>


              
            

              

            </tbody>
            <!--*****************CIERRE CUERPO  TABLA  USUARIO********************************* -->
            
            
          </table>
              

            </div><!--= cierre box del cuerpo ===-->

            
          
        </div><!--= cierre box box da la raya  ===-->
        </div><!--= cierre div el que separa con la tabla ===-->
           

         <!--=================================================
            LA TABLA  DE PRODUCTO

        =======================================================-->

        <div class="col-xs-6">
          


          <div class="box box-warning"> 

          <div class="box-header with-border"> 
             <h3>Redición de Fondos</h3>
              <?php
                $Rnc_Empresa = $_SESSION["RncEmpresaUsuario"];
                
                $Tipo_NCF = "RDF";

                $respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);


               if($respuesta == false){
                   echo'<button class="btn btn-warning pull-right"  data-toggle="modal" data-target="#modalCorrelativoNoFiscal"><i class="fa fa-pencil"></i></button>
                  ';



                }

          $Rnc_Empresa = $_SESSION["RncEmpresaUsuario"];
          $Rnc_Empresa_Master = null;
          $Orden = "id";

          $Empresa = ControladorEmpresas::ctrEmpresas($Rnc_Empresa, $Rnc_Empresa_Master, $Orden);



               ?>

            


          </div>


            <div class="box-body">

               <form role="form" method="post" class="formulariorendirfondos">

                 <div class="box col-xs-7">
                 
             
               
                  <div class="form-group">
                    <div class="input-group">

                  <input type="hidden"  id="RncRendirFondos" name="RncRendirFondos" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">
                  <input type="hidden" class="form-control" id="UsuarioConciliacion" name="UsuarioConciliacion" value="<?php echo $_SESSION["Nombre"]?>">

                   <input type="hidden"  maxlength="6" id="idbanco" name="idbanco" value="<?php if (isset($_GET["Banco"])){ 
                    echo $_GET["Banco"];}?>">
                 
                   
                   </div>
                  </div>
                

                 
                  <div class="form-group col-xs-4">
                     
                    <div class="input-group">
                   

                      <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                      <?php 

                      $Rnc_Empresa_Diario = $_SESSION["RncEmpresaUsuario"];
                      $tipocod = "RDF";


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
                      $NAsiento = "RDF".$N;

                      

                      echo ' <input type="hidden" class="form-control" id="CodAsiento" name="CodAsiento" value="'.$N.'" readonly>
                      <input type="text" class="form-control" id="NAsiento" name="NAsiento" value="'.$NAsiento.'" readonly>';
                      }
                    ?>

                    </div>
                   

                  </div>
                     

                
                   <div class="form-group col-xs-12">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                       <div class="input-group form-control Fecha">

                     <label>Año/Mes</label>
                      <input type="text" class="Fechames" maxlength="6" id="FechaFacturames" name="FechaFacturames" required autofocus>

                     
                      <label>Dìa</label>
                      <input type="text" class="Fechadia" maxlength="2" id="FechaFacturadia" name="FechaFacturadia"  required>


                    </div>
                   

                  </div>
                  </div>
                    <div class="form-group col-xs-12">
                     

                   <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-audio-description"></i></span>

                      
                     
                    <input type="text" class="form-control" maxlength="100" id="Descripcion" name="Descripcion" placeholder="Descripcion" required>

                     </div>
                    </div>

          
     <div class="form-group col-xs-4">

          <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                  <div class="input-group form-control">

          <input type="radio" name="EstadoFondo" value="1" required> Abierto
          <input type="radio" name="EstadoFondo" value="2" required> Cerrado

                    
                </div>

            </div>

      </div>               
            
          <div class="col-xs-12"> </div> 
                  
                  
 <div class="form-group col-xs-4 pull-right">
                    <div class="input-group">

                  
                    <input type="text" class="form-control" id="SaldoInicial" name="SaldoInicial" value="<?php echo $totalSaldo?>" required>
                  </div>
                  </div>
                    
                  <div class="form-group pull-right">
                    <div class="input-group">

                  <h5>Saldo Anterior +</h5>
                  </div>
                  </div>
                    

            <div class="form-group row rendirfondos">

              <div class="col-xs-12" style="background: #D2F1EC">
                <label class="pull-right" style="padding-right:30px">SALDO</label>
                <label class="pull-right" style="padding-right:60px">CREDITO</label>
                <label class="pull-right" style="padding-right:60px">DEBITO</label>
  
                <label class="pull-right" style="padding-right:90px">REF.</label>
                <label class="pull-right" style="padding-right:100px">EMPRESA</label>
              </div>

              <br>
                
 

                   
            

            </div>
            <input type="hidden" id="Rendir" name="Rendir" value="0">

  

            <input class="col-lg-11" type="hidden" id="listaRedicion" name="listaRedicion">

                
               
            </div>             
              

            </div>


            <div class="box-footer">
              <button type="submit" class="btn btn-primary pull-right">Conciliar</button>

              
            </div>
              </div>

          </form>
          <?php 

            $rendirfondos = new ControladorBanco();
            $rendirfondos -> ctrRendirFondos();




           ?>

              
            </div>
             

          


        </div><!--= cierre box box da la raya  ===-->
        

      </div><!--= cierre div el que separa con la tabla ===-->
           

      
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

                    <input type="text" class="form-control input-NCF" id="Tipo_NCF" name="Tipo_NCF" maxlength="3" Value="RDF" readonly>

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