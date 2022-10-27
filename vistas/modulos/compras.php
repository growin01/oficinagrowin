
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       
       <h1 class="col-xs-3" style="font-size: 30px"><i class="fa fa-server"></i>
        DETALLES COMPRAS
        
      </h1>
  <a href="crear-compra-inventario" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Inventario de Mercancia</a>
  <a href="crear-compra-gastosgenerales" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Compras Generales</a>
  
 
   <a href="reportecxp" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Detalle Cuentas Por Pagar</a>
   

      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Detalle Compras</li>
      </ol>
    </section>

    <section class="content">

      
      <div class="box">
        
        
        <div class="box-body">
          <!--*****************TABLA  USUARIO********************************* -->
           <input type="hidden" class="form-control" id="Contabilidad" name="Contabilidad" value="<?php echo $_SESSION["Contabilidad"]?>">
           <input type="hidden" class="form-control" id="Proyecto" name="Proyecto" value="<?php echo $_SESSION["Proyecto"]?>">
           <table border="0" cellspacing="4" cellpadding="4">
              
              <tbody>
                <tr>
                    <td>Período &nbsp;</td>
                    <td><select class="form-control pull-left col-xs-3" name="periodocompras" id="periodocompras">
  <?php 
if(isset($_GET["periodocompras"])){
echo'<option value="'.$_GET["periodocompras"].'">'.$_GET["periodocompras"].'</option>';
  foreach ($_SESSION["Perido"] as $key => $value) {
    if($_GET["periodocompras"] != $value) { 
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
   </select></td>
                    
                </tr>

                <tr>
                    <td>Desde &nbsp;</td>
                    <td><input type="text" maxlength="6" id="mincompras" name="mincompras" placeholder="AñoMes"></td>
                   
                    <td><input type="text" class="col-xs-3" maxlength="2" id="mindiacompras" name="mindiacompras" placeholder="Día"></td>
                </tr>

                <tr>
                    <td>Hasta &nbsp;</td>
                    <td><input type="text" maxlength="6" id="maxcompras" name="maxcompras" placeholder="AñoMes"></td>
                   
                    <td><input type="text" class="col-xs-3" maxlength="2" id="maxdiacompras" name="maxdiacompras" placeholder="Día"></td>
              </tr>


              
            </tbody>
            

          </table>
    <br>


          <table class="table table-bordered table-striped dt-responsive compras" width="100%">

            <!--*****************CABECERA TABLA  USUARIO********************************* -->         
            <thead>
              <tr>
               
                <th>N° Asiento</th>
                <th style="width: 5px">Suplidor</th>
                <th style="width: 5px">RNC</th>
                <th>NCF</th>
                <th>Año/Mes</th>
                <th>Día</th>
                <th>Ref.</th>
                <th>Moneda</th> 
                <th>Tasa</th> 
                <th>Neto</th> 
                <th>Impuesto</th>           
                <th>Total</th>
                <th>RET ITBIS</th>
                <th>RET ISR</th>
                <th>Modulo</th>
                <th></th>
               
               
              </tr>
              

            </thead>
            <!--*****************CIERRE CABECERA TABLA  USUARIO********************************* -->
            
            <!--*****************CUERPO  TABLA  USUARIO********************************* -->

            <tbody>

              <?php 
              
          if(isset($_GET["periodocompras"])){
               $periodocompras = $_GET["periodocompras"];
              }else{
               $periodocompras = $_SESSION["Anologin"];
 }
                $Rnc_Empresa_Compras = $_SESSION["RncEmpresaUsuario"];
                  
              
              $respuesta = ControladorCompras::ctrMostarCompras($Rnc_Empresa_Compras, $periodocompras);

              
              foreach ($respuesta as $key => $value) {
              $Rnc_Empresa_Suplidor = $_SESSION["RncEmpresaUsuario"];

              $id_Suplidor = "id";


              $NombreSuplidor = $value["Nombre_Suplidor"];

             


                echo ' <tr>
                
                <td>'.$value["NAsiento"].'</td>
                <td>'.$NombreSuplidor.'</td>
                <td>'.$value["Rnc_Suplidor"].'</td>
                <td>'.$value["NCF_Factura"].'</td>
                <td>'.$value["FechaAnoMes"].'</td>
                <td>'.$value["FechaDia"].'</td>
                <td>'.$value["Referencia"].'</td>
                <td>'.$value["Moneda"].'</td>
                <td>'.$value["Tasa"].'</td>
                <td>'.number_format($value["Neto"],2).'</td>
                <td>'.number_format($value["Impuesto"],2).'</td>
                <td>'.number_format($value["Total"],2).'</td>';

                
echo'<td>'.number_format($value["ITBIS_Retenido_606"], 2).'</td>
<td>'.number_format($value["Monto_Retencion_Renta_606"], 2).'</td>';

 if($value["Modulo"] == "COMPRAINVENTARIO"){

echo'<td><button class="btn btn-success btn-xs">COMPRA DE INVENTARIO</button></td>';
 } else{
   echo'<td><button class="btn btn-primary btn-xs">COMPRA GENERALES</button></td>';

}
                         
/*COMPRA INVENTARIO*/

if($value["Modulo"] == "COMPRAINVENTARIO" && $value["Estado"] == 1){ 

  if($value["EXTRAER_NCF"] != "CP1"){
    echo '<td>
    <button class="btn btn-default btn-xs btnVerCompraInventario" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$value["Rnc_Empresa_Compras"].'" Codigo="'.$value["CodigoCompra"].'" RncFactura606="'.$value["Rnc_Suplidor"].'" NCF_606="'.$value["NCF_Factura"].'" NAsiento = "'.$value["NAsiento"].'" data-toggle="modal" data-target="#modalCompraInventario"><i class="fa fa-eye"></i></button>
   
    <button class="btn btn-warning btn-xs editarcomprainventario" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$value["Rnc_Empresa_Compras"].'"   Codigo="'.$value["CodigoCompra"].'" RncFactura606="'.$value["Rnc_Suplidor"].'" NCF_606="'.$value["NCF_Factura"].'"><i class="fa fa-pencil"></i></button>

    <button class="btn btn-primary btn-xs copiarcomprainventario" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$value["Rnc_Empresa_Compras"].'" Codigo="'.$value["CodigoCompra"].'" RncFactura606="'.$value["Rnc_Suplidor"].'" NCF_606="'.$value["NCF_Factura"].'"><i class="fa fa-copy"></i></button>

    <button class="btn btn-danger btn-xs eliminarcomprainventario" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$value["Rnc_Empresa_Compras"].'" Codigo="'.$value["CodigoCompra"].'" RncFactura606="'.$value["Rnc_Suplidor"].'" NCF_606="'.$value["NCF_Factura"].'" ExtrarNCF="DCI" Modulo="COMPRAINVENTARIO"><i class="fa fa-times"></i></button>
    
   
  </td>';
  }else{
  echo '<td>
  
    <button class="btn btn-default btn-xs btnVerCompraInventario" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$value["Rnc_Empresa_Compras"].'" Codigo="'.$value["CodigoCompra"].'" RncFactura606="'.$value["Rnc_Suplidor"].'" NCF_606="'.$value["NCF_Factura"].'" NAsiento = "'.$value["NAsiento"].'" data-toggle="modal" data-target="#modalCompraInventario"><i class="fa fa-eye"></i></button>

  <button class="btn btn-warning btn-xs editarcomprainventarioNo" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$value["Rnc_Empresa_Compras"].'"   Codigo="'.$value["CodigoCompra"].'" RncFactura606="'.$value["Rnc_Suplidor"].'" NCF_606="'.$value["NCF_Factura"].'"><i class="fa fa-pencil"></i></button>

  <button class="btn btn-primary btn-xs copiarcomprainventarioNo" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$value["Rnc_Empresa_Compras"].'" Codigo="'.$value["CodigoCompra"].'" RncFactura606="'.$value["Rnc_Suplidor"].'" NCF_606="'.$value["NCF_Factura"].'"><i class="fa fa-copy"></i></button>

  <button class="btn btn-danger btn-xs eliminarcomprainventario" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$value["Rnc_Empresa_Compras"].'" Codigo="'.$value["CodigoCompra"].'" RncFactura606="'.$value["Rnc_Suplidor"].'" NCF_606="'.$value["NCF_Factura"].'" ExtrarNCF="DCI" Modulo="COMPRAINVENTARIO"><i class="fa fa-times"></i></button>
                                       
  
  </td>';


  }/*No fiscal*/
                    
}/*CIERRE IF COMPRAINVENTARIO */

/*COMPRA GENERALES*/

if($value["Modulo"] == "COMPRAGENERALES" && $value["Estado"] == 1){ 

  if($value["EXTRAER_NCF"] != "CP1"){ 
echo '<td>
  <button class="btn btn-default btn-xs btnVerCompraGeneral" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$value["Rnc_Empresa_Compras"].'" Codigo="'.$value["CodigoCompra"].'" RncFactura606="'.$value["Rnc_Suplidor"].'" NCF_606="'.$value["NCF_Factura"].'" NAsiento = "'.$value["NAsiento"].'" data-toggle="modal" data-target="#modalCompraGeneral"><i class="fa fa-eye"></i></button>

<button class="btn btn-warning btn-xs editarcompragenerales" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$value["Rnc_Empresa_Compras"].'" Codigo="'.$value["CodigoCompra"].'" RncFactura606="'.$value["Rnc_Suplidor"].'" NCF_606="'.$value["NCF_Factura"].'"><i class="fa fa-pencil"></i></button>

<button class="btn btn-primary btn-xs copiarcompragenerales" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$value["Rnc_Empresa_Compras"].'" Codigo="'.$value["CodigoCompra"].'" RncFactura606="'.$value["Rnc_Suplidor"].'" NCF_606="'.$value["NCF_Factura"].'"><i class="fa fa-copy"></i></button>

<button class="btn btn-danger btn-xs eliminarcomprageneral" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$value["Rnc_Empresa_Compras"].'" Codigo="'.$value["CodigoCompra"].'" RncFactura606="'.$value["Rnc_Suplidor"].'" NCF_606="'.$value["NCF_Factura"].'" ExtrarNCF="DCG" Modulo="COMPRAGENERAL"><i class="fa fa-times"></i></button>';

  if($value["Retenciones"] == "1"){
    echo'
      <button class="btn btn-info btn-xs CartaRetenciones" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$value["Rnc_Empresa_Compras"].'" Suplidor="'.$value["id_Suplidor"].'" RncFactura606="'.$value["Rnc_Suplidor"].'" NCF_606="'.$value["NCF_Factura"].'"><i class="fa fa-print"></i></button>';

    }
    echo'
    </td>'; 
}else{
  echo '<td>
 <button class="btn btn-default btn-xs btnVerCompraGeneral" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$value["Rnc_Empresa_Compras"].'" Codigo="'.$value["CodigoCompra"].'" RncFactura606="'.$value["Rnc_Suplidor"].'" NCF_606="'.$value["NCF_Factura"].'" NAsiento = "'.$value["NAsiento"].'" data-toggle="modal" data-target="#modalCompraGeneral"><i class="fa fa-eye"></i></button>
                   
<button class="btn btn-warning btn-xs editarcomprageneralesNo" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$value["Rnc_Empresa_Compras"].'" Codigo="'.$value["CodigoCompra"].'" RncFactura606="'.$value["Rnc_Suplidor"].'" NCF_606="'.$value["NCF_Factura"].'"><i class="fa fa-pencil"></i></button>

<button class="btn btn-primary btn-xs copiarcomprageneralesNo" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$value["Rnc_Empresa_Compras"].'" Codigo="'.$value["CodigoCompra"].'" RncFactura606="'.$value["Rnc_Suplidor"].'" NCF_606="'.$value["NCF_Factura"].'"><i class="fa fa-copy"></i></button>

<button class="btn btn-danger btn-xs eliminarcomprageneral" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$value["Rnc_Empresa_Compras"].'" Codigo="'.$value["CodigoCompra"].'" RncFactura606="'.$value["Rnc_Suplidor"].'" NCF_606="'.$value["NCF_Factura"].'" ExtrarNCF="DCG" Modulo="COMPRAGENERAL"><i class="fa fa-times"></i></button>';
  if($value["Retenciones"] == "1"){
      echo'
  <button class="btn btn-info btn-xs CartaRetenciones" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$value["Rnc_Empresa_Compras"].'" Suplidor="'.$value["id_Suplidor"].'" RncFactura606="'.$value["Rnc_Suplidor"].'" NCF_606="'.$value["NCF_Factura"].'"><i class="fa fa-print"></i></button>';

  }
  echo'
                    </td>'; 

                  }

 }/*CIERRE IF COMPRAS GENERALES*/

 if($value["Modulo"] == "COMPRAGENERALES" && $value["Estado"] == 2){

  if($value["EXTRAER_NCF"] != "CP1"){
    echo '<td>
     <button class="btn btn-default btn-xs btnVerCompraGeneral" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$value["Rnc_Empresa_Compras"].'" Codigo="'.$value["CodigoCompra"].'" RncFactura606="'.$value["Rnc_Suplidor"].'" NCF_606="'.$value["NCF_Factura"].'" NAsiento = "'.$value["NAsiento"].'" data-toggle="modal" data-target="#modalCompraGeneral"><i class="fa fa-eye"></i></button>

    <button class="btn btn-primary btn-xs copiarcompragenerales" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$value["Rnc_Empresa_Compras"].'" Codigo="'.$value["CodigoCompra"].'" RncFactura606="'.$value["Rnc_Suplidor"].'" NCF_606="'.$value["NCF_Factura"].'"><i class="fa fa-copy"></i></button>';


  }else{
     echo '<td>
 <button class="btn btn-default btn-xs btnVerCompraGeneral" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$value["Rnc_Empresa_Compras"].'" Codigo="'.$value["CodigoCompra"].'" RncFactura606="'.$value["Rnc_Suplidor"].'" NCF_606="'.$value["NCF_Factura"].'" NAsiento = "'.$value["NAsiento"].'" data-toggle="modal" data-target="#modalCompraGeneral"><i class="fa fa-eye"></i></button>

<button class="btn btn-primary btn-xs copiarcomprageneralesNo" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$value["Rnc_Empresa_Compras"].'" Codigo="'.$value["CodigoCompra"].'" RncFactura606="'.$value["Rnc_Suplidor"].'" NCF_606="'.$value["NCF_Factura"].'"><i class="fa fa-copy"></i></button>';




  }
    
    echo'<button class="btn btn-info btn-xs CartaRetenciones" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$value["Rnc_Empresa_Compras"].'" Suplidor="'.$value["id_Suplidor"].'" RncFactura606="'.$value["Rnc_Suplidor"].'" NCF_606="'.$value["NCF_Factura"].'"><i class="fa fa-print"></i></button></td>';

 }               

if($value["Modulo"] == "COMPRAINVENTARIO" && $value["Estado"] == 2){

  if($value["EXTRAER_NCF"] != "CP1"){

   echo '<td>
   <button class="btn btn-default btn-xs btnVerCompraInventario" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$value["Rnc_Empresa_Compras"].'" Codigo="'.$value["CodigoCompra"].'" RncFactura606="'.$value["Rnc_Suplidor"].'" NCF_606="'.$value["NCF_Factura"].'" NAsiento = "'.$value["NAsiento"].'" data-toggle="modal" data-target="#modalCompraInventario"><i class="fa fa-eye"></i></button>

    <button class="btn btn-primary btn-xs copiarcomprainventario" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$value["Rnc_Empresa_Compras"].'" Codigo="'.$value["CodigoCompra"].'" RncFactura606="'.$value["Rnc_Suplidor"].'" NCF_606="'.$value["NCF_Factura"].'"><i class="fa fa-copy"></i></button>


    <button class="btn btn-info btn-xs CartaRetenciones" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$value["Rnc_Empresa_Compras"].'" Suplidor="'.$value["id_Suplidor"].'" RncFactura606="'.$value["Rnc_Suplidor"].'" NCF_606="'.$value["NCF_Factura"].'"><i class="fa fa-print"></i></button>

    </td>';

 }else{

 echo '<td>
   <button class="btn btn-default btn-xs btnVerCompraInventario" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$value["Rnc_Empresa_Compras"].'" Codigo="'.$value["CodigoCompra"].'" RncFactura606="'.$value["Rnc_Suplidor"].'" NCF_606="'.$value["NCF_Factura"].'" NAsiento = "'.$value["NAsiento"].'" data-toggle="modal" data-target="#modalCompraInventario"><i class="fa fa-eye"></i></button>

    <button class="btn btn-primary btn-xs copiarcomprainventarioNo" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$value["Rnc_Empresa_Compras"].'" Codigo="'.$value["CodigoCompra"].'" RncFactura606="'.$value["Rnc_Suplidor"].'" NCF_606="'.$value["NCF_Factura"].'"><i class="fa fa-copy"></i></button>


    <button class="btn btn-info btn-xs CartaRetenciones" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$value["Rnc_Empresa_Compras"].'" Suplidor="'.$value["id_Suplidor"].'" RncFactura606="'.$value["Rnc_Suplidor"].'" NCF_606="'.$value["NCF_Factura"].'"><i class="fa fa-print"></i></button>

    </td>';
 }  
}
  echo'</tr>';
            
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
                <td style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";>Total</td> 
                <td style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";></td> 
                <td style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";></td>           
                <td style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";></td>
                <td style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";></td>
                <td style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";></td>
                <td ></td>
                <td></td>
               
               
              </tr>
              

            </tfoot>
           
          </table>
        
       

        

        </div>        

        
      </div>
      

    </section>
 
  </div>
  <div id="modalCompraGeneral" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h6 class="modal-title">Compras Generales</h6>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">
          <input type="hidden" class="form-control" id="Proyecto" name="Proyecto" value="<?php echo $_SESSION["Proyecto"]?>">

           <div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">

                   

                      <h6 style="text-align: center; color: #FFFFFF"><b>INFORMACIÓN DEL SUPLIDOR</b></h6>

                 
          </div>
 <div class="form-group col-xs-4">
  
  <div class="input-group">

        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>

        <input type="text" class="form-control" id="Tipo_Id_Factura_606" readonly>
                   
  </div>          
</div>

      
<div class="form-group col-xs-4">
    <div class="input-group">

        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>

        <input type="text" class="form-control" id="Nombre_Suplidor" readonly>
                   
    </div>            

</div>

<div class="form-group col-xs-4">
  <div class="input-group">

      <span class="input-group-addon"><i class="fa fa-key"></i></span>

      <input type="text" class="form-control" id="Rnc_Suplidor" readonly>
                
  </div>
</div>

   
      

<div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">
      <h6 style="text-align: center; color: #FFFFFF"><b>INFORMACIÓN FISCAL DE LA COMPRA</b></h6>
</div>

                   

       <div style="padding-right: 0px"  class="form-group col-xs-4">
   

  <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

   
       <input type="text" class="form-control" maxlength="6" id="FechaFacturames_606" name="FechaFacturames_606" readonly>
        

   </div>  
  
  
</div>

<div style="padding-left: 0px" class="form-group col-xs-4">
   

  <div class="input-group">
 <input type="text" class="form-control" maxlength="2" id="FechaFacturadia_606" name="FechaFacturadia_606" readonly>
 </div>  
  
  
</div>

<div class="form-group col-xs-4"></div>
<div class="col-xs-12"></div>


<div class="form-group col-xs-4">

          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-key">&nbsp;Código</i></span>
              <input type="text" class="form-control" id="CodigoCompra" readonly>

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
        <span class="input-group-addon"><i class="fa fa-key">&nbsp;NAsiento</i></span>
        <input type="text" class="form-control" id="NAsiento" readonly>

    </div>
             
</div>
 <div class="form-group col-xs-4">

          
             <div class="input-group">

              <span class="input-group-addon">C/S</span>

                <input type="text" class="form-control" id="tipo_de_monto" readonly>
                

            </div>

    </div>
    
  
     
     
    <div class="form-group col-xs-4">

          
             <div class="input-group">

              <span class="input-group-addon">Gasto</span>

                <input type="text" class="form-control" id="Tipo_Gasto_606" readonly>
                

            </div>

    </div>
    <div class="form-group col-xs-4">
    
          
             <div class="input-group">

             <input type="checkbox"  id="ITBIS_alcosto_606">&nbsp;ITBIS LLEVADO A COSTO
  

            </div>

     
      
             <div class="input-group">

             <input type="checkbox"  id="ITBIS_Sujeto_a_Propocionalidad">&nbsp;ITBIS A PROPORCIONALIDAD 
            </div>

    
 

</div>   
 <div class="col-xs-12 left">
                 <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-audio-description"></i></span>

                      <input type="text" class="form-control" id="Descripcion" name="Descripcion" readonly>

                    </div>
                   
                  
                 </div>
               
              </div>

<div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">

            <h6 style="text-align: center; color: #FFFFFF"><b>DETALLE DE LA COMPRA</b></h6>

                 
</div>
 <div class="form-group col-xs-4">

          
             <div class="input-group">

              <span class="input-group-addon">Pago</span>

                <input type="text" class="form-control" id="Forma_Pago_606" readonly>
                

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

         <div class="form-group col-xs-4">
                   
                    <div class="input-group BANCO">
      </div>
    </div>      
             
   
         <div class="form-group col-xs-8">
                   
                   
    </div>   

    <div class="form-group nuevoGasto col-xs-12">
    
    </div>
    <div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">
      <h6 style="text-align: center; color: #FFFFFF"><b>TOTAL FACTURA</b></h6>
    </div>
        
  <div class="col-xs-6 pull-left">
   
   <div class="col-xs-6">
        <label class="pull-right">Sub Total +</label>

    </div>

    <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control" id="NetoTotalGasto" readonly>

              </div>
      </div>
      <div class="col-xs-6">
        <label class="pull-right">Propina Legal +</label>

    </div>

    <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control" id="propinalegal" readonly>

              </div>
      </div>
       <div class="col-xs-6">
       
          <label class="pull-right">ITBIS +</label>
          
      
      </div>
     
        <div class="form-group col-xs-2" style="padding-right: 0px">
          <div class="input-group">
          
          <input  class="form-control" type="number" min="0" id="PORITBIS"  readonly>
         </div>
      </div>

       <div class="form-group col-xs-4" style="padding-left: 0px">

            <div class="input-group">
              
                <input type="text" class="form-control" id="TotalITBISvi"  readonly>

              

                        
              </div>
        </div> 

 </div>
 <div class="col-xs-6 pull-right">
  
      <div class="col-xs-6">
        
          <label class="pull-right">Otros Imp. +</label>
          
      
      </div>
       <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control" id="TotalOtrosImpvi" readonly>

            
                        
              </div>
      </div>
        
        <div class="col-xs-6">
            <label class="pull-right">Retenciones -</label>

        </div>
       

    <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control" id="TotalRetvi"  readonly>

                
              </div>
      </div>
       <div class="col-xs-6">
            <label class="pull-right">Total =</label>

        </div>

    <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control" id="TotalGastovi" name="TotalGastovi" placeholder="0000" value=""required readonly>

               
                        
              </div>
      </div>
  </div><!--========col-xs-6 pullright=========-->  
  <div class = "col-xs-12"></div>
   
                      

  
                  

   

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
              <input type="text" class="form-control" id="ITBIS_Retenido_606" readonly>
              <span class="input-group-addon">%</span>
              <input type="text" class="form-control" id="Porc_ITBIS_Retenido_606" readonly>

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
              <input type="text" class="form-control" id="Monto_Retencion_Renta_606" readonly>
              <span class="input-group-addon">%</span>
              <input type="text" class="form-control" id="Porc_ISR_Retenido_606" readonly>
              

          </div>


        <div class="input-group">

          <span class="input-group-addon">TIPO</span>
              <input type="text" class="form-control" id="Tipo_Retencion_ISR_606" readonly>

        </div>
             


   </div>
                      
                  

   

  </div>
  <div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">
    <h6 style="text-align: center; color: #FFFFFF"><b>DETALLE DE PAGOS RECIBIDOS</b></h6>

</div>
<div class="col-xs-12"></div>
  <table class="table table-bordered table-striped dt-responsive tablaTodos" width="100%">
            <thead>
              <tr>
                
                
                <th>N° Recibo</th>
                <th>Año/Mes</th>
                <th>Día</th>
                <th>Pago</th>
                <th>Monto</th>
                <th>Ref.</th>
                <th>Banco</th>
              
               
               
              </tr>


            </thead>
             <tbody id="detallePagosCompras">


          </tbody>
            



          </table>



  <div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">
      <h6 style="text-align: center; color: #FFFFFF"><b>INFORMACIÓN CONTABLE</b></h6>

</div>
               
<div class="form-group ContabilidadCompras col-xs-12">
    
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

<div id="modalCompraInventario" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h6 class="modal-title">Compras Generales</h6>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">
          <input type="hidden" class="form-control" id="Proyecto" name="Proyecto" value="<?php echo $_SESSION["Proyecto"]?>">

           <div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">

                   

                      <h6 style="text-align: center; color: #FFFFFF"><b>INFORMACIÓN DEL SUPLIDOR</b></h6>

                 
          </div>
 <div class="form-group col-xs-4">
  
  <div class="input-group">

        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>

        <input type="text" class="form-control" id="Tipo_Id_Factura_606Inventario" readonly>
                   
  </div>          
</div>

      
<div class="form-group col-xs-4">
    <div class="input-group">

        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>

        <input type="text" class="form-control" id="Nombre_SuplidorInventario" readonly>
                   
    </div>            

</div>

<div class="form-group col-xs-4">
  <div class="input-group">

      <span class="input-group-addon"><i class="fa fa-key"></i></span>

      <input type="text" class="form-control" id="Rnc_SuplidorInventario" readonly>
                
  </div>
</div>

   
      

<div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">
      <h6 style="text-align: center; color: #FFFFFF"><b>INFORMACIÓN FISCAL DE LA COMPRA</b></h6>
</div>

                   

       <div style="padding-right: 0px"  class="form-group col-xs-4">
   

  <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

   
       <input type="text" class="form-control" maxlength="6" id="FechaFacturames_606Inventario" name="FechaFacturames_606Inventario" readonly>
        

   </div>  
  
  
</div>

<div style="padding-left: 0px" class="form-group col-xs-4">
   

  <div class="input-group">
 <input type="text" class="form-control" maxlength="2" id="FechaFacturadia_606Inventario" name="FechaFacturadia_606Inventario" readonly>
 </div>  
  
  
</div>

<div class="form-group col-xs-4"></div>
<div class="col-xs-12"></div>

<div class="form-group col-xs-4">

          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-key">&nbsp;Código</i></span>
              <input type="text" class="form-control" id="CodigoCompraInventario" readonly>

          </div>
            

    </div>

<div class="form-group col-xs-4">

    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-key">&nbsp;NCF</i></span>
        <input type="text" class="form-control" id="NCF_FacturaInventario" readonly>

    </div>
             <div class="form-group col-xs-4">

    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-key">&nbsp;NAsiento</i></span>
        <input type="text" class="form-control" id="NAsientoInventario" readonly>

    </div>
             
</div>
</div>

 <div class="form-group col-xs-4">

          
             <div class="input-group">

              <span class="input-group-addon">C/S</span>

                <input type="text" class="form-control" id="tipo_de_montoInventario" readonly>
                

            </div>

    </div>
    
  
     
     
    <div class="form-group col-xs-4">

          
             <div class="input-group">

              <span class="input-group-addon">Gasto</span>

                <input type="text" class="form-control" id="Tipo_Gasto_606Inventario" readonly>
                

            </div>

    </div>
    <div class="form-group col-xs-4">
    
          
             <div class="input-group">

             <input type="checkbox"  id="ITBIS_alcosto_606Inventario">&nbsp;ITBIS LLEVADO A COSTO
  

            </div>

     
      
             <div class="input-group">

             <input type="checkbox"  id="ITBIS_Sujeto_a_PropocionalidadInventario">&nbsp;ITBIS A PROPORCIONALIDAD 
            </div>

    
 

</div>   
 <div class="col-xs-12 left">
                 <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-audio-description"></i></span>

                      <input type="text" class="form-control" id="DescripcionInventario" name="DescripcionInventario" readonly>

                    </div>
                   
                  
                 </div>
               
              </div>

<div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">

            <h6 style="text-align: center; color: #FFFFFF"><b>DETALLE DE LA COMPRA</b></h6>

                 
</div>
 <div class="form-group col-xs-4">

          
             <div class="input-group">

              <span class="input-group-addon">Pago</span>

                <input type="text" class="form-control" id="Forma_Pago_606Inventario" readonly>
                

            </div>

    </div>

    <div class="form-group col-xs-4">

          
             <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-money"></i></span>

                <input type="text" class="form-control" id="MonedaInventario" readonly>
                

            </div>

    </div>  
     <div class="form-group col-xs-4">
                   
      <div class="input-group TASAInventario">
      </div>
      
       </div>

     
   <div class="col-xs-12"></div>

         <div class="form-group col-xs-4">
                   
                    <div class="input-group BANCOInventario">
      </div>
    </div>      
             
   
         <div class="form-group col-xs-8">
                   
                   
    </div>   

    <div class="form-group Productos col-xs-12">
    
    </div>
    <div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">
      <h6 style="text-align: center; color: #FFFFFF"><b>TOTAL FACTURA</b></h6>
    </div>
        
  <div class="col-xs-6 pull-left">
   
   <div class="col-xs-6">
        <label class="pull-right">Sub Total +</label>

    </div>

    <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control" id="NetoTotalGastoInventario" readonly>

              </div>
      </div>
      <div class="col-xs-6">
        <label class="pull-right">Propina Legal +</label>

    </div>

    <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control" id="propinalegalInventario" readonly>

              </div>
      </div>
       <div class="col-xs-6">
       
          <label class="pull-right">ITBIS +</label>
          
      
      </div>
     
        <div class="form-group col-xs-2" style="padding-right: 0px">
          <div class="input-group">
          
          <input  class="form-control" type="number" min="0" id="PORITBISInventario"  readonly>
         </div>
      </div>

       <div class="form-group col-xs-4" style="padding-left: 0px">

            <div class="input-group">
              
                <input type="text" class="form-control" id="TotalITBISviInventario"  readonly>

              

                        
              </div>
        </div> 

 </div>
 <div class="col-xs-6 pull-right">
  
      <div class="col-xs-6">
        
          <label class="pull-right">Otros Imp. +</label>
          
      
      </div>
       <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control" id="TotalOtrosImpviInventario" readonly>

            
                        
              </div>
      </div>
        
        <div class="col-xs-6">
            <label class="pull-right">Retenciones -</label>

        </div>
       

    <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control" id="TotalRetviInventario"  readonly>

                
              </div>
      </div>
       <div class="col-xs-6">
            <label class="pull-right">Total =</label>

        </div>

    <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control" id="TotalGastoviInventario" name="TotalGastovi" placeholder="0000" value=""required readonly>

               
                        
              </div>
      </div>
  </div><!--========col-xs-6 pullright=========-->  
  <div class = "col-xs-12"></div>
   
                      

  
                  

   

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
              <input type="text" class="form-control" id="ITBIS_Retenido_606Inventario" readonly>
              <span class="input-group-addon">%</span>
              <input type="text" class="form-control" id="Porc_ITBIS_Retenido_606Inventario" readonly>

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
              <input type="text" class="form-control" id="Monto_Retencion_Renta_606Inventario" readonly>
              <span class="input-group-addon">%</span>
              <input type="text" class="form-control" id="Porc_ISR_Retenido_606Inventario" readonly>
              

          </div>


        <div class="input-group">

          <span class="input-group-addon">TIPO</span>
              <input type="text" class="form-control" id="Tipo_Retencion_ISR_606Inventario" readonly>

        </div>
             


   </div>
                      
                  

   

  </div>

<div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">
    <h6 style="text-align: center; color: #FFFFFF"><b>DETALLE DE PAGOS RECIBIDOS</b></h6>

</div>
<div class="col-xs-12"></div>
 <table class="table table-bordered table-striped dt-responsive tablaTodos" width="100%">
            <thead>
              <tr>
                
                
                <th>N° Recibo</th>
                <th>Año/Mes</th>
                <th>Día</th>
                <th>Pago</th>
                <th>Monto</th>
                <th>Ref.</th>
                <th>Banco</th>
              
               
               
              </tr>


            </thead>
             <tbody id="detallePagosInventario">


          </tbody>
            



          </table>

        
  <div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">
      <h6 style="text-align: center; color: #FFFFFF"><b>INFORMACIÓN CONTABLE</b></h6>

</div>
               
<div class="form-group ContabilidadCompras col-xs-12">
    
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

 <?php 
  
        $eliminarCompra = new ControladorCompras();
        $eliminarCompra -> ctrEliminarCompra();



        ?>