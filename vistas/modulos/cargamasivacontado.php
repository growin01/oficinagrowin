
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <h1 class="col-xs-4" style="font-size: 30px"><i class="fa fa-building-o"></i>
       CARGA MASIVA DE VENTAS DE CONTADO
        
      </h1>
       <a href="reportevc" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Detalles de Venta Contado</a>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">cargamasiva</li>
      </ol>
    </section>
    <br>

    <!-- Main content -->
    <section class="content">

      <div class="row">

        <!--=================================================
          EL FORMULARIO DE CRERAR VENTAS 

        =======================================================-->

        <div class="col-xs-5">
          
          <div class="box box-success">


            <div class="box-header with-border">

              <div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

       <h4 style="text-align: center;"><b>RELACIÓN DE FACTURA POR DEPOSITAR</b></h4>


  </div>   
 
            </div><!--= cierre box del hear===-->
              

             
            
            <div class="box-body">

           

                 <div class="form-group row">
                      
                      <div class="col-xs-6" style="padding-right:0px">

                       <div class="input-group">

                      <?php 
                      if(isset($_GET["Metododepago"])){
                        $Metododepago = $_GET["Metododepago"];
                        switch ($Metododepago) {
                          
                        case '01':
                          echo'<select class="form-control" id="MetodoPago" name="MetodoPago" required>
                          <option value="01">01-EFECTIVO</option>
                          <option value="02">02-CHEQUES/TRANSFERENCIAS/DEPOSITO</option>
                          <option value="03">03-TARJETA CREDITO/DEBITO</option>
                          <option value="05">05-BONOS CERTIFICADOS REGALOS</option>
                          <option value="06">06-PERMUTAS</option>
                          <option value="07">07-OTRAS FORMAS DE VENTA</option>
                          </select>';
                     
                        break;
                          
                        case '02':
                         echo'<select class="form-control" id="MetodoPago" name="MetodoPago" required>
                          <option value="02">02-CHEQUES/TRANSFERENCIAS/DEPOSITO</option>
                          <option value="01">01-EFECTIVO</option>
                          <option value="03">03-TARJETA CREDITO/DEBITO</option>
                          <option value="05">05-BONOS CERTIFICADOS REGALOS</option>
                          <option value="06">06-PERMUTAS</option>
                          <option value="07">07-OTRAS FORMAS DE VENTA</option>
                          </select>';
                           
                        break;
                         case '03':
                         echo'<select class="form-control" id="MetodoPago" name="MetodoPago" required>
                          <option value="03">03-TARJETA CREDITO/DEBITO</option>
                          <option value="01">01-EFECTIVO</option>
                          <option value="02">02-CHEQUES/TRANSFERENCIAS/DEPOSITO</option>
                          <option value="05">05-BONOS CERTIFICADOS REGALOS</option>
                          <option value="06">06-PERMUTAS</option>
                          <option value="07">07-OTRAS FORMAS DE VENTA</option>
                          </select>';
                           
                        break;
                        case '05':
                         echo'<select class="form-control" id="MetodoPago" name="MetodoPago" required>
                          <option value="05">05-BONOS CERTIFICADOS REGALOS</option>
                          <option value="01">01-EFECTIVO</option>
                          <option value="02">02-CHEQUES/TRANSFERENCIAS/DEPOSITO</option>
                          <option value="03">03-TARJETA CREDITO/DEBITO</option>
                          <option value="06">06-PERMUTAS</option>
                          <option value="07">07-OTRAS FORMAS DE VENTA</option>
                          </select>';
                           
                        break;
                        case '06':
                         echo'<select class="form-control" id="MetodoPago" name="MetodoPago" required>
                          <option value="06">06-PERMUTAS</option>
                          <option value="01">01-EFECTIVO</option>
                          <option value="02">02-CHEQUES/TRANSFERENCIAS/DEPOSITO</option>
                          <option value="03">03-TARJETA CREDITO/DEBITO</option>
                          <option value="05">05-BONOS CERTIFICADOS REGALOS</option>
                          <option value="07">07-OTRAS FORMAS DE VENTA</option>
                          </select>';
                           
                        break;
                        case '07':
                         echo'<select class="form-control" id="MetodoPago" name="MetodoPago" required>
                          <option value="07">07-OTRAS FORMAS DE VENTA</option>
                          <option value="01">01-EFECTIVO</option>
                          <option value="02">02-CHEQUES/TRANSFERENCIAS/DEPOSITO</option>
                          <option value="03">03-TARJETA CREDITO/DEBITO</option>
                          <option value="05">05-BONOS CERTIFICADOS REGALOS</option>
                          <option value="06">06-PERMUTAS</option>
                          
                          </select>';
                           
                        break;
                          
                        
                        }


                      }else{
                        echo'
                      <select class="form-control" id="MetodoPago" name="MetodoPago" required>
                        <option value="">Selecione Método  de pago</option>
                        <option value="01">01-EFECTIVO</option>
                        <option value="02">02-CHEQUES/TRANSFERENCIAS/DEPOSITO</option>
                        <option value="03">03-TARJETA CREDITO/DEBITO</option>
                        <option value="05">05-BONOS CERTIFICADOS REGALOS</option>
                        <option value="06">06-PERMUTAS</option>
                        <option value="07">07-OTRAS FORMAS DE VENTA</option>
                        
                      </select>
                     ';


                      }


                       ?>


 
                      </div>

 
                      </div>

                      <a style ="margin-left: 5px" class="btn btn-warning btnMetodoPago btn-group-sm"><i class="glyphicon glyphicon-search"></i>  </a>

                    </div>



                       <table border="0" cellspacing="5" cellpadding="5">
              
              <tbody>
                <tr>
                    <td>Desde &nbsp;</td>
                    <td><input type="text" id="FechaDepoMin" maxlength="6" name="FechaDepoMin"></td>
                    <td><input type="text" class="col-xs-3" maxlength="2" id="FechaDepoMindia" name="FechaDepoMindia" placeholder="Día"></td>
                </tr>

                <tr>
                    <td>Hasta &nbsp;</td>
                    <td><input type="text" maxlength="6" id="FechaDepoMax" name="FechaDepoMax"></td>
                    <td><input type="text" class="col-xs-3"maxlength="2"   id="FechaDepoMaxdia" name="FechaDepoMaxdia" placeholder="Día"></td>
              </tr>
            </tbody>

          </table>
          
    <br>



          <table class="table table-bordered table-striped depositar" width="100%">
             

            <!--*****************CABECERA TABLA  USUARIO********************************* -->
        
                     
            <thead>
              <tr>
                
                
                <th style="width:5px">Cliente</th>
                <th>Rnc</th>
                <th>NCF</th>
                <th>Mes</th>
                <th>Dia</th>
                <th style="width:10px">Total</th>
                <th></th>
                
                
               
              </tr>

            
            </thead>
    
            <tbody>
 <!--*****************FILA 1  TABLA  USUARIO********************************* -->
              <?php 
              if(isset($_GET["Metododepago"])){
              
              $Metododepago = $_GET["Metododepago"];

              $Rnc_Empresa_Venta = $_SESSION["RncEmpresaUsuario"];
              
              $respuesta = ControladorVentas::ctrRangoVentasMetodopago($Rnc_Empresa_Venta, $Metododepago);

             

               foreach ($respuesta as $key => $value){

               if($value["Metodo_Pago"] != "04" && $value["Estatus"] == "POR DEPOSITAR"){
                 
                        echo'<td>'.$value["Nombre_Cliente"].'</td>
                        <td>'.$value["Rnc_Cliente"].'</td> 
                        <td>'.$value["NCF_Factura"].'</td>
                        <td>'.$value["FechaAnoMes"].'</td>
                        <td>'.$value["FechaDia"].'</td>
                        <td>'.number_format($value["Total"], 2).'</td>
                      
    <td><button class="btn btn-primary btn-xs agregarpordepositar recuperardeposito" id = '.$value["id"].'  RncEmpresaVenta = '.$Rnc_Empresa_Venta.' RncCliente ='.$value["Rnc_Cliente"].' NombreCliente = '.$value["Nombre_Cliente"].' NCFFactura = '.$value["NCF_Factura"].' FechaAnoMes = '.$value["FechaAnoMes"].' FechaDia = '.$value["FechaDia"].' TotalFac = '.$value["Total"].' ITBIS = '.$value["Impuesto"].' subtotal = '.$value["Neto"].' idProyecto = '.$value["id_Proyecto"].' CodigoProyecto = '.$value["CodigoProyecto"].'>+</button></td></tr>';

            
               }

             } /*CIERRE FOR*/


            }/*cierre de if*/

               


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

        <div class="col-xs-7">
          

          <div class="box box-warning">
             <?php
                $Rnc_Empresa = $_SESSION["RncEmpresaUsuario"];
                
                $Tipo_NCF = "RPG";

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

            <div class="box-body">
             
            <form role="form" method="post" class="cargamasivaventas">

               <div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

        <h4 style="text-align: center;"><b>RECIBO DE PAGO</b></h4>



  </div>   

       
    <input type="hidden"  id="RncDeposito" name="RncDeposito" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">
    <input type="hidden" class="form-control" id="UsuarioDeposito" name="UsuarioDeposito" value="<?php echo $_SESSION["Nombre"]?>">
    <input type="hidden" class="form-control" id="Metododepago" name="Metododepago" value="<?php if(isset($_GET["Metododepago"])){ echo $Metododepago; }?>">
    <input type="hidden" class="form-control" id="Contabilidad" name="Contabilidad" value="<?php echo $_SESSION["Contabilidad"]?>">
    <input type="hidden" class="form-control" id="Banco" name="Banco" value="<?php echo $_SESSION["Banco"]?>">
    <input type="hidden" class="form-control" id="Proyecto" name="Proyecto" value="<?php echo $_SESSION["Proyecto"]?>">
    <input type="hidden" class="form-control" id="Usuariologueado" name="UsuarioLogueado" value="<?php echo $_SESSION["Nombre"]?>"> 
     
               
            
    <div class="col-xs-12">
               
      <div class="form-group">
          
          <div class="input-group form-control"> 
                           
            <label>BANCO</label><br>

        <label class="col-xs-4">Fecha de Pago</label>
        <label class="col-xs-4">Referencia</label>
        <label class="col-xs-4">Agregar Banco</label>
       
        <input type="text" class="col-xs-2 Fecha_Trans_AnoMes" maxlength="6" id="FechaPagomes" name="FechaPagomes" placeholder="Año/Mes" required>
        <input type="text" class="col-xs-2 Fecha_Trans_Dia" id="FechaPagodia" name="FechaPagodia" placeholder="Día"required><br>
        
        <input type="text" class="col-xs-3"  id="Referencia" name="Referencia" placeholder="Referencia del Pago" maxlength="6" value="" required>
        
        <div class="col-xs-5">
        <select type="text" class="form-control col-xs-12" id="agregarBanco" name="agregarBanco" required>
          <option value="">Seleccionar Banco</option>

          <?php 
      
      $Rnc_Empresa_Banco = $_SESSION["RncEmpresaUsuario"];

      $Banco = ControladorBanco::ctrMostrarBanco($Rnc_Empresa_Banco);

      foreach ($Banco as $key => $value){

       echo '<option value="'.$value["id"].'">'.$value["Nombre_Cuenta"].'</option>';


      }

      ?>
        
    </select>
    </div>
  </div>

                     

                    </div>
                   

                  </div>
   <div class="form-group col-xs-12">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="text" class="form-control input-xs"  maxlength="150" id="Observaciones" name="Observaciones" placeholder=" Obrservaciones del Deposito">

            </div>

          </div>
                  <br>
                    <br>
  <div class="form-group col-xs-12 pull-right" style="background: #D2F1EC;">
      <label class="form-group pull-right" style="text-align: center; padding-right:80px">TOTAL DEP.</label>
      <label class="form-group pull-right" style="text-align: center; padding-right:50px">ISR%</label>
      <label class="form-group pull-right" style="text-align: center; padding-right:30px">ITBIS%</label>
      <label class="form-group pull-right" style="text-align: center; padding-right:70px">TOTAL</label>
      <label class="form-group pull-right" style="text-align: center; padding-right:70px">DIA</label>
      <label class="form-group pull-right" style="text-align: center; padding-right:40px">AÑO/MES</label>
      <label class="form-group pull-right" style="padding-right:80px">NCF</label>
    </div>


        <div class="form-group row cargapordepositar">

              
         </div>

          <div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

        <h4 style="text-align: center;"><b>INFORMACION DE RETENCIONES POR FACTURA</b></h4>
  


      </div>   


            

<div class="pull-left col-xs-12">
  <div class="col-xs-1" style="padding-left:0px">
    <h6><b>ITBIS</b></h6>

  </div>


  <div class="col-xs-2" style="padding-left:0px">
      
  <input type="text" class="form-control" id="totalITBISvi" name="totalITBISvi" placeholder="0.00" required readonly>

  
  </div>
  <div class="col-xs-1" style="padding-left:0px">
    <h6><b>% ITBIS</b></h6>

  </div>


  <div class="col-xs-1" style="padding-left:0px">
      
  <input type="text" class="form-control" id="porretitbis" name="porretitbis" placeholder="0" required readonly>

  
  </div>
  <div class="col-xs-1" style="padding-left:0px">
    <h6><b>Total Ret</b></h6>

  </div>


  <div class="col-xs-2" style="padding-left:0px">
      
  <input type="text" class="form-control" id="totalret" name="totalret" placeholder="0.00" required readonly>

  
  </div>
  <div class="col-xs-1" style="padding-left:0px">
   

  </div>


  <div class="col-xs-2" style="padding-left:0px">
      
  
  
  </div>
</div>
<br>

<div class="pull-left col-xs-12">
  <div class="col-xs-1" style="padding-left:0px">
    <h6><b>Neto</b></h6>

  </div>


  <div class="col-xs-2" style="padding-left:0px">
      
  <input type="text" class="form-control" id="totalNetovi" name="totalNetovi" placeholder="0.00" required readonly>

  
  </div>
  <div class="col-xs-1" style="padding-left:0px">
    <h6><b>% ISR</b></h6>

  </div>


  <div class="col-xs-1" style="padding-left:0px">
      
  <input type="text" class="form-control" id="porretisr" name="porretisr" placeholder="0" required readonly>

  
  </div>
  <div class="col-xs-1" style="padding-left:0px">
    <h6><b>Total Ret</b></h6>

  </div>


  <div class="col-xs-2" style="padding-left:0px">
      
  <input type="text" class="form-control" id="totalretisr" name="totalretisr" placeholder="0.00" required readonly>

  
  </div>
  <div class="col-xs-1" style="padding-left:0px">
    <h6><b>Total Fac.</b></h6>

  </div>


  <div class="col-xs-2" style="padding-left:0px">
      
  <input type="text" class="form-control" id="totalfacvi" name="totalfacvi" placeholder="0.00" required readonly>

  
  </div>
</div>
<div class="col-xs-12"><br></div>


<div class="pull-right col-xs-6" style="background: #D2F1EC;">
  <div class="col-xs-6">
    <label><b>Sub-Total Deposito</b></label>

  </div>


  <div class="col-xs-6">
      
  <input type="text" class="form-control" id="subtotaldepositovi" name="subtotaldepositovi" placeholder="0.00" required readonly>

  <input type="hidden" name="subdeposito" id="subdeposito">
  </div>
</div>
<br>
 <div class="col-xs-12"></div>
<input class="col-lg-12" type="hidden" id="listadeposito" name="listadeposito">
    
  <?php 
   if(isset($_GET["Metododepago"]) && $_GET["Metododepago"] == "03"){
    echo'   <div class="pull-right col-xs-6" style="background: #D2F1EC;">

    <div class="col-xs-2"> 
      <h6>Comisión TD/TC</h6>
     </div>
   
  
        <div class="col-xs-4">
            

                <select class="form-control" id="comisioncobro" name="comisioncobro" required>
                        <option value=""></option>
                        <option value="1">1 %</option>
                        <option value="1.5">1.5 %</option>
                        <option value="2">2 %</option>
                        <option value="2.5">2.5 </option>
                        <option value="3">3 %</option>
                        <option value="3.5">3.5 %</option>
                        <option value="4">4 %</option>
                        <option value="4.5">4.5 %</option>
                        <option value="5">5 %</option>
                        <option value="5.5">5.5 %</option>
                        <option value="6">6 %</option>

                 </select>
           
        
   
  </div>
  
      <div class="col-xs-6">

        <input type="text" class="form-control" id="totalcomisioncobrovi" name="totalcomisioncobro" placeholder="0.00" required readonly>
              
        <input type="hidden" id="totalcomisioncobro" name="totalcomisioncobro">
         
    </div> 

  
  </div>
   <div class="col-xs-12"></div>


   <div class="pull-right col-xs-6" style="background: #D2F1EC;">

    <div class="col-xs-2"> 
      <h6>Otros Impuestos</h6>
     </div>
   
  
        <div class="col-xs-4">
            

                <select class="form-control" id="otrosimpuestos" name="otrosimpuestos" required>
                        <option value=""></option>
                        <option value="1">1 %</option>
                        <option value="1.5">1.5 %</option>
                        <option value="2">2 %</option>
                        <option value="2.5">2.5 </option>
                        <option value="3">3 %</option>
                        <option value="3.5">3.5 %</option>
                        <option value="4">4 %</option>
                        <option value="4.5">4.5 %</option>
                        <option value="5">5 %</option>
                        <option value="5.5">5.5 %</option>
                        <option value="6">6 %</option>

                 </select>
           
       </div>
  
      <div class="col-xs-6">
              
        <input type="text" class="form-control" id="totalotrosimpuestosvi" name="totalotrosimpuestosvi" placeholder="0.00" required readonly>
        <input type="text" class="form-control" id="totalotrosimpuestos" name="totalotrosimpuestos" placeholder="0.00" required readonly>
         
         
    </div> 

   
   
  </div>';


    }
              

   ?>

  <div class="col-xs-12"></div>

  <div class="pull-right col-xs-6" style="background: #D2F1EC;">
  <div class="col-xs-6">
    <label><b>Total Deposito</b></label>

  </div>


  <div class="col-xs-6">
      
  <input type="text" class="form-control" id="totaldepositovi" name="totaldepositovi" placeholder="0.00" required readonly>

  <input type="hidden" name="deposito" id="deposito">
  </div>
</div>
<br>

<div class="col-xs-12"></div>

          
  <div class="box-footer">
      <button type="submit" class="btn btn-primary pull-right">Depositar</button>

  </div>
            
                
                </form>


            <?php 

            $cargamasiva = new  ControladorVentas();
            $cargamasiva -> ctrcargamasivadeposito();




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

                    <input type="text" class="form-control input-NCF" id="Tipo_NCF" name="Tipo_NCF" maxlength="3" Value="RPG" readonly>

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
    