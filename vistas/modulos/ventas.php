

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       
       <h1 class="col-xs-3" style="font-size: 30px"><i class="fa fa-server"></i>
        DETALLES VENTAS
        
      </h1>
  <a href="crear-ventas" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Factura</a>
  <a href="crear-ventas-pro" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Factura Proforma</a>
  
  <a href="crear-cotizacion" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Cotización</a>
  <a href="cotizaciones" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Detalle de Cotizaciones</a>

   <a href="reportecxc" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Detalle  Cuentas Por Cobrar</a>
   <a href="reporte" class="btn btn-success"><i class="fa fa-pie-chart
" style="padding-right:5px"></i>Informe de Ventas</a>
      

      
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Detalle Ventas</li>
      </ol>
    </section>

    <section class="content">

      
      <div class="box">

     

        <div class="box-body">
<input type="hidden"  id="RncEmpresaVentas" name="RncEmpresaVentas" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">

<input type="hidden" class="form-control" id="Contabilidad" name="Contabilidad" value="<?php echo $_SESSION["Contabilidad"]?>">
   <table border="0" cellspacing="4" cellpadding="4">
              
              <tbody>
                <tr>
                       <td>Período &nbsp;</td>
                    <td><select class="form-control pull-left col-xs-3" name="periodoventas" id="periodoventas">
  <?php 
if(isset($_GET["periodoventas"])){
echo'<option value="'.$_GET["periodoventas"].'">'.$_GET["periodoventas"].'</option>';
  foreach ($_SESSION["Perido"] as $key => $value) {
    if($_GET["periodoventas"] != $value) { 
     echo'<option value="'.$value.'">'.$value.'</option>';
     }
    
  
}/*cierre foreach*/
}else{
 echo'<option value="'.$_SESSION["Anologin"].'">'.$_SESSION["Anologin"].'</option>';
  foreach ($_SESSION["Perido"] as $key => $value) {
    if($_SESSION["Anologin"] != $value) { 
     echo'<option value="'.$value.'">'.$value.'</option>';
     }
    
    

}

 
  }

   ?>
   </select></td> </tr>
                <tr>
                    <td>Desde &nbsp;</td>
                    <td><input type="text" maxlength="6" id="minventas" name="minventas" placeholder="AñoMes"></td>
                   
                    <td><input type="text" class="col-xs-3" maxlength="2" id="mindiaventas" name="mindiaventas" placeholder="Día"></td>
                </tr>

                <tr>
                    <td>Hasta &nbsp;</td>
                    <td><input type="text" maxlength="6" id="maxventas" name="maxventas" placeholder="AñoMes"></td>
                   
                    <td><input type="text" class="col-xs-3" maxlength="2" id="maxdiaventas" name="maxdiaventas" placeholder="Día"></td>
              </tr>


              
            </tbody>
            

          </table>
    <br>


          <table class="table table-bordered table-striped dt-responsive ventas"  width="100%">

            <!--*****************CABECERA TABLA  USUARIO********************************* -->         
            <thead>
              <tr>
                <th style="width:5px">#</th>
                <th style="width: 5px">Cliente</th>
                <th>N°</th>
                <th>NCF</th>
                <th>Año/Mes</th>
                <th>Día</th>
                <th>Vend.</th>
                <th>Forma</th>
                <th>Ref.</th>
                <th>M.n</th>
                <th>Tasa</th> 
                <th>Neto</th> 
                <th>Desc.</th> 
                <th>Impuesto</th>           
                <th>Total</th>
                <th>RET ITBIS</th>
                <th>RET ISR</th>
                <th style="width: 5px">Obser.</th>
               
                <th></th>            

              </tr>
              

            </thead>

            

            <tbody>

              <?php 
              $PerfilUsuario = $_SESSION["Perfil"];
              if(isset($_GET["periodoventas"])){
                  $periodoventas = $_GET["periodoventas"];
                }else{
                  $periodoventas = $_SESSION["Anologin"];
              }

                $Rnc_Empresa_Venta = $_SESSION["RncEmpresaUsuario"];
                 
              
              $respuesta = ControladorVentas::ctrMostarVentas($Rnc_Empresa_Venta, $periodoventas);

              
              foreach ($respuesta as $key => $value) {
                 


                echo ' <tr>
                <td>'.($key+1).'</td>
                <td>'.$value["Nombre_Cliente"].'</td>
                <td>'.$value["Codigo"].'</td> 
                <td>'.$value["NCF_Factura"].'</td>
                <td>'.$value["FechaAnoMes"].'</td>
                <td>'.$value["FechaDia"].'</td>
                <td>'.$value["Nombre_Vendedor"].'</td>
                <td>'.$value["Metodo_Pago"].'</td>
                <td>'.$value["Referencia"].'</td>
                <td>'.$value["Moneda"].'</td>
                <td>'.$value["Tasa"].'</td>
                <td>'.number_format($value["Neto"],2).'</td>
                <td>'.number_format($value["Descuento"],2).'</td>
                <td>'.number_format($value["Impuesto"],2).'</td>
                <td>'.number_format($value["Total"],2).'</td>
                <td>'.number_format($value["ITBIS_Retenido_Tercero"],2).'</td>
                <td>'.number_format($value["RetencionRenta_por_Terceros"],2).'</td>
                <td>'.$value["Observaciones"].'</td>
               
                
                <td>';
                if($value["EXTRAER_NCF"] <> "FP1"){
                  echo '
                  <button Title="Ver Ventas" class="btn btn-default btn-xs btnVerVentas" idVenta="'.$value["id"].'" codigoVenta="'.$value["Codigo"].'" Rnc_Empresa_Venta="'.$value["Rnc_Empresa_Venta"].'" id_registro607="'.$value["id_607"].'" RNC_Factura="'.$value["Rnc_Cliente"].'" NCF_607="'.$value["NCF_Factura"].'" NAsiento="'.$value["NAsiento"].'" NAsientoRET="'.$value["NAsientoRET"].'" data-toggle="modal" data-target="#modalVerVentas"><i class="fa fa-eye"></i></button>

                    <button Title="Imprimir Factura" class="btn btn-info btn-xs btnImprimirFactura" idVenta="'.$value["id"].'"  codigoVenta="'.$value["Codigo"].'" ModeloFactura="'.$_SESSION["Modelo_Factura"].'" observaciones="'.$value["Observaciones"].'"><i class="fa fa-print"></i></button>';
                    if($value["Correo_Cliente"] != ""){
                      echo '<button Title="Enviar Factura Por Correo" class="btn btn-default btn-xs btnCorreoFactura" idVenta="'.$value["id"].'" codigoVenta="'.$value["Codigo"].'" correocliente="'.$value["Correo_Cliente"].'" nombreCliente= "'.$value["Nombre_Cliente"].'"data-toggle="modal" data-target="#modalFactura"><i class="fa fa-envelope-o"></i></button>';


                    }
                    if($value["Estado"] == 1){
                      if($PerfilUsuario != "Vendedor"){ 
                      echo'
                      

<button Title="Editar Factura" class="btn btn-warning btn-xs btnEditarVenta" idVenta="'.$value["id"].'" codigoVenta="'.$value["Codigo"].'" Rnc_Empresa_Venta="'.$value["Rnc_Empresa_Venta"].'" ExtraerAsiento="DFF"><i class="fa fa-pencil"></i></button>

<button Title="Copiar Factura" class="btn btn-primary btn-xs btnCopiarVenta" idVenta="'.$value["id"].'" codigoVenta="'.$value["Codigo"].'" Rnc_Empresa_Venta="'.$value["Rnc_Empresa_Venta"].'" ExtraerAsiento="DFF"><i class="fa fa-copy"></i></button>
                   

<button Title="Eliminar Factura" class="btn btn-danger btn-xs btnEliminarVenta" idVenta="'.$value["id"].'" codigoVenta="'.$value["Codigo"].'" Rnc_Empresa_Venta="'.$value["Rnc_Empresa_Venta"].'" id_registro607="'.$value["id_607"].'" RNC_Factura="'.$value["Rnc_Cliente"].'" NCF_607="'.$value["NCF_Factura"].'" ExtrarNCF="DFF"><i class="fa fa-times"></i></button>

<button Title="Factura Electronica DGII" class="btn btn-success btn-xs btnDGIIVenta" idVenta="'.$value["id"].'" codigoVenta="'.$value["Codigo"].'" Rnc_Empresa_Venta="'.$value["Rnc_Empresa_Venta"].'" id_registro607="'.$value["id_607"].'" RNC_Factura="'.$value["Rnc_Cliente"].'" NCF_607="'.$value["NCF_Factura"].'" ExtrarNCF="DFF"><i class="fa fa-upload"></i>DGII</button>';
                       
                      }else{

                        echo' <button Title="Copiar Factura" class="btn btn-primary btn-xs btnCopiarVenta" idVenta="'.$value["id"].'" codigoVenta="'.$value["Codigo"].'" Rnc_Empresa_Venta="'.$value["Rnc_Empresa_Venta"].'" ExtraerAsiento="DFF"><i class="fa fa-copy"></i></button>';


                      }
                      
                   

                    }else{
                      echo'
                      
                      <button Title="Copiar Factura" class="btn btn-primary btn-xs btnCopiarVenta" idVenta="'.$value["id"].'" codigoVenta="'.$value["Codigo"].'" Rnc_Empresa_Venta="'.$value["Rnc_Empresa_Venta"].'" ExtraerAsiento="DFF"><i class="fa fa-copy"></i></button>
                   
                 ';

                    }
                   
                  }else{
                    echo '
                    <button Title="Ver Ventas" class="btn btn-default btn-xs btnVerVentas" idVenta="'.$value["id"].'" codigoVenta="'.$value["Codigo"].'" Rnc_Empresa_Venta="'.$value["Rnc_Empresa_Venta"].'" id_registro607="'.$value["id_607"].'" RNC_Factura="'.$value["Rnc_Cliente"].'" NCF_607="'.$value["NCF_Factura"].'" NAsiento="'.$value["NAsiento"].'" NAsientoRET="'.$value["NAsientoRET"].'"data-toggle="modal" data-target="#modalVerVentas"><i class="fa fa-eye"></i></button>

                    <button Title="Imprimir Factura" class="btn btn-default btn-xs btnImprimirFacturaNo" idVenta="'.$value["id"].'" codigoVenta="'.$value["Codigo"].'" Rnc_Empresa_Venta="'.$value["Rnc_Empresa_Venta"].'" ModeloFactura="'.$_SESSION["Modelo_Factura"].'" observaciones="'.$value["Observaciones"].'"><i class="fa fa-print"></i></button>';
                    
                if($value["Correo_Cliente"] != ""){
                     echo'<button Title="Enviar Factura Por Correo" class="btn btn-default btn-xs btnCorreoFacturaNo" idVenta="'.$value["id"].'"  codigoVenta="'.$value["Codigo"].'" correocliente="'.$value["Correo_Cliente"].'" nombreCliente= "'.$value["Nombre_Cliente"].'"data-toggle="modal" data-target="#modalFacturaNo"><i class="fa fa-envelope-o"></i>
                    
                    </button>';
                }
                if($value["Estado"] == 1){
                  if($PerfilUsuario != "Vendedor"){ 
                     echo'
                <button Title="Editar Factura" class="btn btn-warning btn-xs btnEditarVenta" idVenta="'.$value["id"].'" codigoVenta="'.$value["Codigo"].'" Rnc_Empresa_Venta="'.$value["Rnc_Empresa_Venta"].'" ExtraerAsiento="DFP"><i class="fa fa-pencil"></i></button>
                
                <button Title="Copiar Factura" class="btn btn-primary btn-xs btnCopiarVentaNo" idVenta="'.$value["id"].'" codigoVenta="'.$value["Codigo"].'" Rnc_Empresa_Venta="'.$value["Rnc_Empresa_Venta"].'" ExtraerAsiento="DFP"><i class="fa fa-copy"></i></button>
                
                <button Title="Cambio a Factura Fiscal"class="btn btn-success btn-xs btnReciclarVenta" idVenta="'.$value["id"].'" codigoVenta="'.$value["Codigo"].'" Rnc_Empresa_Venta="'.$value["Rnc_Empresa_Venta"].'" ExtraerAsiento="DFP"><i class="fa fa-recycle"></i></button>

                <button Title="Eliminar Factura" class="btn btn-danger btn-xs btnEliminarVenta" idVenta="'.$value["id"].'" codigoVenta="'.$value["Codigo"].'" Rnc_Empresa_Venta="'.$value["Rnc_Empresa_Venta"].'" id_registro607="'.$value["id_607"].'" RNC_Factura="'.$value["Rnc_Cliente"].'" NCF_607="'.$value["NCF_Factura"].'" ExtrarNCF="DFP"><i class="fa fa-times"></i></button>';
                                       

                  }else{
                    echo ' <button Title="Copiar Factura" class="btn btn-primary btn-xs btnCopiarVentaNo" idVenta="'.$value["id"].'" codigoVenta="'.$value["Codigo"].'" Rnc_Empresa_Venta="'.$value["Rnc_Empresa_Venta"].'" ExtraerAsiento="DFP"><i class="fa fa-copy"></i></button>
                
                <button Title="Cambio a Factura Fiscal"class="btn btn-success btn-xs btnReciclarVenta" idVenta="'.$value["id"].'" codigoVenta="'.$value["Codigo"].'" Rnc_Empresa_Venta="'.$value["Rnc_Empresa_Venta"].'" ExtraerAsiento="DFP"><i class="fa fa-recycle"></i></button>';


                  }

                   

                 
                  } else{

                    echo'
                     <button Title="Copiar Factura" class="btn btn-primary btn-xs btnCopiarVentaNo" idVenta="'.$value["id"].'" codigoVenta="'.$value["Codigo"].'" Rnc_Empresa_Venta="'.$value["Rnc_Empresa_Venta"].'" ExtraerAsiento="DFF"><i class="fa fa-copy"></i></button>


                 ';


                  }


                  }


                echo'</td>             

              </tr>';
                

              }         


               ?>



            </tbody>

            <tfoot>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                
<td style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";>TOTAL</td> 
<td style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";></td> 
                                   
<td style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";></td>
<td style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";></td> 
<td style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";></td>
<td style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";></td>
<td style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";></td>
<td></td>
<td></td>
                 
              </tr>


      </tfoot>     
           
            
          </table>
        
        

         <?php 
  
        $eliminarVenta = new ControladorVentas();
        $eliminarVenta -> ctrEliminarVenta();


        $DGIIventa = ControladorVentas::ctrdercargarXMLVenta();



        ?>

        </div>        

        
      </div>
      

    </section>
 
  </div>

 <!--************************************************
                      MODAL AGREGAR CLIENTE
  ******************************************************* -->
  <!-- Modal -->
<div id="modalFactura" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">

    
    <div class="modal-content">

      
    <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Correo Factura</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de la CATEGORIA********************** -->

      <input type="hidden" class="form-control input-lg" id="RncEmpresaComentario" name="RncEmpresaComentario" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
      <input type="hidden" class="form-control input-lg" id="NombreEmpresa" name="NombreEmpresa" value="<?php echo $_SESSION["NombreEmpresa"];?>" readonly>
      <input type="hidden" class="form-control input-lg" id="CorreoEmpresa" name="CorreoEmpresa" value="<?php echo $_SESSION["CorreoEmpresa"];?>" readonly>
      <input type="hidden" class="form-control input-lg" id="codigoVenta" name="codigoVenta" readonly>
          
    
  <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-hdd-o"></i>&nbsp;De:</span>
               <input type="text" class="form-control" id="CorreoEmpresa" name="CorreoEmpresa" value="<?php echo  $_SESSION["CorreoEmpresa"];?>" readonly required>

            </div>

    </div>
    <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
               <input type="text" class="form-control" id="nombreCliente" name="nombreCliente" readonly required>

            </div>

    </div>
    <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-hdd-o"></i>&nbsp;Para:</span>
               <input type="text" class="form-control" id="CorreoEmpresaDirigida" name="CorreoEmpresaDirigida" readonly required>

            </div>

    </div>
    <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-audio-description"></i></span>
              <input type="text" class="form-control input-lg" name="Asunto" maxlength="100" placeholder="Asunto" required>

            </div>

          </div>
          
           <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-audio-description"></i></span>
              <textarea rows="8" cols="100" maxlength="1500" id = "Comentario" name="Comentario" onkeyup="check(event);">Escribe aquí tus comentarios </textarea>
            </div>

          </div>
          
            
        </div>
      
      </div>

      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Enviar Correo</button>

      </div>
      <?php 
        $CorreoFactura = new ControladorCorreos();
        $CorreoFactura -> ctrCorreoFactura();

      ?>
         
    </form>
    

    </div>

  </div>

</div>
<!--************************************************
                      MODAL AGREGAR CLIENTE
  ******************************************************* -->
  <!-- Modal -->
<div id="modalFacturaNo" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">

    
    <div class="modal-content">

      
    <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Correo Factura</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de la CATEGORIA********************** -->

      <input type="hidden" class="form-control input-lg" id="RncEmpresaComentario" name="RncEmpresaComentario" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
      <input type="hidden" class="form-control input-lg" id="NombreEmpresaNo" name="NombreEmpresaNo" value="<?php echo $_SESSION["NombreEmpresa"];?>" readonly>
      <input type="hidden" class="form-control input-lg" id="CorreoEmpresaNo" name="CorreoEmpresaNo" value="<?php echo $_SESSION["CorreoEmpresa"];?>" readonly>
      <input type="hidden" class="form-control input-lg" id="codigoVentaNo" name="codigoVentaNo" readonly>
          
    
  <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope-o"></i>&nbsp;De:</span>
               <input type="text" class="form-control" id="CorreoEmpresaNo" name="CorreoEmpresaNo" value="<?php echo  $_SESSION["CorreoEmpresa"];?>" readonly required>

            </div>

    </div>
    <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
               <input type="text" class="form-control" id="nombreClienteNo" name="nombreClienteNo" readonly required>

            </div>

    </div>
    <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope-o"></i>&nbsp;Para:</span>
               <input type="text" class="form-control" id="CorreoEmpresaDirigidaNo" name="CorreoEmpresaDirigidaNo" readonly required>

            </div>

    </div>

    <div class="form-group">
       <div class="input-group">
        
      <span class="input-group-addon">¿Desea que la Factura Proforma Tenga Su informacion Fiscal?</span>
     
            <div class="input-group form-control">
                <input type="radio" name="tipo_FacturaNo" value="1" required> Si
                <input type="radio" name="tipo_FacturaNo" value="2" required> No
                   
            </div>
          </div>
    </div>
    <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-audio-description"></i></span>
              <input type="text" class="form-control input-lg" name="Asunto" maxlength="100" placeholder="Asunto" required>

            </div>

    </div>
          
           <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-audio-description"></i></span>
              <textarea rows="8" cols="100" maxlength="1500" id = "Comentario" name="Comentario" onkeyup="check(event);">Escribe aquí tus comentarios </textarea>
            </div>

          </div>
          
         



          
        </div>

      
        
      </div>

      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Enviar Correo</button>

      </div>
      <?php 
        $CorreoFactura = new ControladorCorreos();
        $CorreoFactura -> ctrCorreoFacturaNo();

      ?>
         
    </form>
    

    </div>

  </div>

</div>

<div id="modalRetener607" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Retener 607</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de la CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              <input type="hidden" class="form-control input-lg" id="RncEmpresaRetener" name="RncEmpresaRetener" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="Usuariologueado" name="Usuariologueado" value="<?php echo $_SESSION["Usuario"];?>" readonly>
<input type="hidden" class="form-control input-lg" id="Modulo" name="Modulo" value="ventas" readonly>
<input type="hidden" class="form-control" id="Contabilidad" name="Contabilidad" value="<?php echo $_SESSION["Contabilidad"]?>">




            </div>



            </div>



          
          <div class="form-group">

                   
                  <div class="input-group">

                   

<input type="hidden" class="form-control" maxlength="11" id="id_607_Retener" name="id_607_Retener"required readonly>
<input type="hidden" class="form-control" maxlength="11" id="Codigo_Factura" name="Codigo_Factura"required readonly>
<input type="hidden" class="form-control" maxlength="11" id="Forma_De_Pago" name="Forma_De_Pago"required readonly>
<input type="hidden" class="form-control" maxlength="11" id="Modulo" name="Modulo" value = "ventas" required readonly>



          </div>

      </div>
         
          
          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>
              <input type="text"   class="form-control input-RNC" maxlength="11" id="Rnc_Retener_607" name="Rnc_Retener_607" value = "" required readonly>

            </div>

          </div>
          <!--*****************cierra input de Ncedula o pasaporte************************* -->
            

           <div class="form-group">

                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <input type="text" class="form-control input-NCF" maxlength="11" id="NCF_607_Retener" name="NCF_607_Retener" required readonly>

                  </div>

                </div>

                 <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                       <div class="input-group form-control Fecha">

                     <label>Año/Mes</label>
                      <input type="text" class="Fechames" maxlength="6" id="FechaFacturames_607_Retener" name="FechaFacturames_607" required readonly>

                     
                      <label>Dìa</label><input type="text" class="Fechadia" maxlength="2" id="FechaFacturadia_606_Retener" name="FechaFacturadia_607_Retener" required readonly>


                    </div>
                   

                  </div>
                  </div>

                   <div class="form-group">

                    
                    <div class="col-xs-6 right" style="padding-right:0px">

                      
                        <label>MONTO FACTURADO SIN ITBIS</label>
                        <br>

                        <input type="number"  min=0 step="any" id="MontoFacturadoRetener_607" name="MontoFacturadoRetener_607" required readonly>


                      </div>
                      
                  

                     <div class="col-xs-6 left" style="padding-right:0px">

                      
                        <label>MONTO ITBIS</label>
                        <br>

                        <input type="number"  min=0 step="any" id="MontoITBIS_Retener_607" name="MontoITBIS_Retener_607" required readonly>


                      </div>
                      

                    </div>

                    <label> Fecha de Retencion</label>
                    <br>




                    <div class="form-group">


                    <div class="input-group col-xs-12">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                       <div class="input-group form-control FechaRetencion">

                     <label>Año/Mes</label>
                      <input type="text" class="Fechames" maxlength="6" id="FechaRetenecionmes_607" name="FechaRetenecionmes_607" required>

                     
                      <label>Dìa</label><input type="text" class="Fechadia" maxlength="2" id="FechaReteneciondia_607" name="FechaReteneciondia_607" required>


                    </div>
                   

                  </div>
                  </div>

                  <div class="col-xs-6 left">

              <div class="form-group">

                    <div class="input-group form-control">

                      <label>% ITBIS RETENIDO</label><br>

                     

                   
                        <input type="radio" name="ITBIS_Retenido_607" id="ITBIS30_607" value="30">30 %
                        <br>
                        <input type="radio" name="ITBIS_Retenido_607" id="ITBIS75_607" value="75">75 %<br>
                        <input type="radio" name="ITBIS_Retenido_607" id="ITBIS100_607" value="100">100 %<br>
                        <input type="text" name="Monto_ITBIS_Retenido_607" id="Monto_ITBIS_Retenido_607">
                        
                    </div>

                  

                  </div>
                  </div>

                  <div class="col-xs-6  right">

              <div class="form-group">

                    <div class="input-group form-control">

                      <label>% ISR RETENIDO</label><br>

                     

                   
                        <input type="radio" name="ISR_RETENIDO_607" id="ISR2_607" value="2">2 %
                        <br>
                        <input type="radio" name="ISR_RETENIDO_607" id="ISR10_607" value="10">10 %<br>
                        
                        <input type="text" name="Monto_ISR_Retenido_607" id="Monto_ISR_Retenido_607">
                        <br>
                         


                        
                    </div>

                  

                  </div>
                  </div>
              

          
        </div>
 
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Retener</button>

      </div>

     <?php 

        $crearRetencionVentas = new ControladorVentas();
        $crearRetencionVentas -> ctrAgregarretencionVentas();

       ?>
     
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>
<div id="modalVerVentas" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h6 class="modal-title">Facturación</h6>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">
          <input type="hidden" class="form-control" id="Proyecto" name="Proyecto" value="<?php echo $_SESSION["Proyecto"]?>">
  <div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">

      <h6 style="text-align: center; color: #FFFFFF"><b>INFORMACIÓN DEL VENDEDOR</b></h6>
                 
  </div>
   <div class="form-group col-xs-6">
  
  <div class="input-group">

        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>

        <input type="text" class="form-control" id="Nombre_Vendedor" readonly>
                   
  </div>          
</div>
<div class="form-group col-xs-6">
  
         
</div>


      <div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">

          <h6 style="text-align: center; color: #FFFFFF"><b>INFORMACIÓN DEL CLIENTE</b></h6>
                 
       </div>
 
 <div class="form-group col-xs-4">
  
  <div class="input-group">

        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>

        <input type="text" class="form-control" id="Tipo_Cliente" readonly>
                   
  </div>          
</div>

      
<div class="form-group col-xs-4">
    <div class="input-group">

        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>

        <input type="text" class="form-control" id="Rnc_Cliente" readonly>
                   
    </div>            

</div>

<div class="form-group col-xs-4">
  <div class="input-group">

      <span class="input-group-addon"><i class="fa fa-key"></i></span>

      <input type="text" class="form-control" id="Nombre_Cliente" readonly>
                
  </div>
</div>

   
      

<div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">
      <h6 style="text-align: center; color: #FFFFFF"><b>INFORMACIÓN DE LA FACTURACIÓN</b></h6>
</div>

                   

       <div style="padding-right: 0px"  class="form-group col-xs-4">
   

  <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

   
       <input type="text" class="form-control" maxlength="6" id="FechaAnoMes" name="FechaAnoMes" readonly>
        

   </div>  
  
  
</div>

<div style="padding-left: 0px" class="form-group col-xs-4">
   

  <div class="input-group">
 <input type="text" class="form-control" maxlength="2" id="FechaDia" name="FechaDia" readonly>
 </div>  
  
  
</div>
<div class="col-xs-12"></div>
<div class="form-group col-xs-4">

          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-key">&nbsp;Código</i></span>
              <input type="text" class="form-control" id="Codigo" readonly>

          </div>
            

    </div>

<div class="form-group col-xs-4">

    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-key">&nbsp;NCF</i></span>
        <input type="text" class="form-control" id="NCF_Factura" readonly>

    </div>

  </div> 

  <div class="form-group col-xs-4">

    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-key">&nbsp;Proyecto</i></span>
        <input type="text" class="form-control" id="CodigoProyecto" readonly>

    </div>

  </div>   
 <div class="col-xs-12 left">
                 <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-audio-description"></i></span>

                      <input type="text" class="form-control" id="Observaciones" name="Observaciones" readonly>

                    </div>
                   
                  
                 </div>
               
              </div>
<?php 





 ?>

<div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">

            <h6 style="text-align: center; color: #FFFFFF"><b>DETALLE DE PRODUCTOS FACTURADOS</b></h6>

                 
</div>
 
<div class="form-group col-xs-4">

          
             <div class="input-group">

              <span class="input-group-addon">Pago</span>

                <input type="text" class="form-control" id="Forma_Pago_607" readonly>
                

            </div>

    </div>
    <div class="form-group col-xs-4">

          
             <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-money"></i></span>

                <input type="text" class="form-control" id="Moneda" readonly>
                

            </div>

    </div>  
     <div class="form-group col-xs-4">
                   
            <div class="input-group TASA">
            </div>
      
     </div>

     
   <div class="col-xs-12"></div>

             
             
   
         <div class="form-group col-xs-8">
                   
                   
    </div>   

    <div class="form-group productos col-xs-12">
    
    </div>
    
    <div class="form-group col-xs-7 pull-right" style="background-color: #2B6370">
      <h6 style="text-align: center; color: #FFFFFF"><b>TOTAL FACTURA</b></h6>
    </div>
     <div class = "col-xs-12"></div>
   
        
  <div class="col-xs-7 pull-right">
   
   <div class="col-xs-5">
        <label class="pull-right">Sub Total +</label>

    </div>

    <div class="form-group col-xs-7">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control" id="nuevoPrecioNetovi" readonly>

              </div>
      </div>
           <div class="col-xs-5">
       
          <label class="pull-right">DESC. -</label>
          
      
      </div>
     
        <div class="form-group col-xs-3" style="padding-right: 0px">
          <div class="input-group">
          
          <input  class="form-control" type="number" min="0" id="Pordescuento"  readonly>
         </div>
      </div>

       <div class="form-group col-xs-4" style="padding-left: 0px">

            <div class="input-group">
              
                <input type="text" class="form-control" id="Descuento"  readonly>

              

                        
              </div>
        </div>
       <div class="col-xs-5">
       
          <label class="pull-right">ITBIS +</label>
          
      
      </div>
     
        <div class="form-group col-xs-3" style="padding-right: 0px">
          <div class="input-group">
          
          <input  class="form-control" type="number" min="0" id="Porimpuesto"  readonly>
         </div>
      </div>

       <div class="form-group col-xs-4" style="padding-left: 0px">

            <div class="input-group">
              
                <input type="text" class="form-control" id="Impuesto"  readonly>

              

                        
              </div>
        </div> 
     <div class="col-xs-5">
            <label class="pull-right">Total =</label>

        </div>

    <div class="form-group col-xs-7">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control" id="Total" name="Total" placeholder="0000" value=""required readonly>

               
                        
              </div>
      </div>    
    
 </div>


  
                  

   

     <div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">

                   

              <h6 style="text-align: center; color: #FFFFFF"><b>RETENCIONES APLICADAS</b></h6>

                 
      </div>

  <div class="form-group col-xs-6">

                    
    <div class="col-xs-12">
      <div class="form-group col-xs-12" style="background-color: #D1D2D5">

                   

              <h6 style="text-align: center;"><b>RETENCIÓN ITBIS</b></h6>

                 
      </div>
       

                      
        <div class="input-group">
         
            <span class="input-group-addon">MONTO</span>
              <input type="text" class="form-control" id="ITBIS_Retenido_607" readonly>
              <span class="input-group-addon">%</span>
              <input type="text" class="form-control" id="Porc_ITBIS_Retenido_607" readonly>

          </div>


   </div>
                      
                  

   

  </div>
  <br>


<div class="form-group col-xs-6">

                    
    <div class="col-xs-12">
      <div class="form-group col-xs-12" style="background-color: #D1D2D5">

                   

              <h6 style="text-align: center;"><b>RETENCIÓN ISR</b></h6>

                 
      </div>
       

                      
        <div class="input-group">
         
            <span class="input-group-addon">MONTO</span>
              <input type="text" class="form-control" id="Monto_Retencion_Renta_607" readonly>
              <span class="input-group-addon">%</span>
              <input type="text" class="form-control" id="Porc_ISR_Retenido_607" readonly>
              

          </div>


        <div class="input-group">

          <span class="input-group-addon">TIPO</span>
              <input type="text" class="form-control" id="Tipo_Retencion_ISR_607" readonly>

        </div>
             


   </div>
                      
                  

   

  </div>


 
  <div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">
      <h6 style="text-align: center; color: #FFFFFF"><b>INFORMACIÓN CONTABLE</b></h6>

</div>

<div class="form-group col-xs-6">
               
    <div class="col-xs-12">
                      
        <div class="input-group">   
            <span class="input-group-addon">N° Asiento</span>
              <input type="text" class="form-control" id="NAsiento" readonly>
                            
          </div>

   </div>
</div>

 <div class="form-group col-xs-6">
               
    <div class="col-xs-12">
                      
        <div class="input-group">   
            <span class="input-group-addon">N° Asiento RET</span>
              <input type="text" class="form-control" id="NAsientoRET" readonly>
                            
          </div>

   </div>
</div>              
<div class="form-group ContabilidadVentas col-xs-12">
    
</div>
         
 
          
  </div>
 
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

       

      </div>

    
     
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>

 </div>