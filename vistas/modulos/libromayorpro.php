
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
 <section class="content-header">
  <h1 class="col-xs-3" style="font-size: 30px"><i class="fa fa-server"></i>
           LIBRO MAYOR
  </h1>

 

 <a href="ingresodiario" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Diario de Ingreso</a>
 <a href="gastodiario" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Diario de Gasto</a>
 
 <a href="ajustediario" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Diario de Ajuste</a>

<button class="btn btn-warning" data-toggle="modal" data-target="#modalleyendacorrelativos"><i class="fa fa-list" style="padding-right:5px"></i>Leyenda de Correlativos
 
  </button>


      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Reporte 606</li>
      </ol>
    </section>

    <section class="content">

      
      <div class="box">

          <!--*****************BOTON DE VENTAS********************************* -->
      
        <div class="box-header with-border">

          
      
          
          
          
        </div>

       
        <!--*****************CIERRE DE DIV BOTON DE AGREGAR VENTAS********************************* -->

        <div class="box-body"> 
        
         <table border="0" cellspacing="4" cellpadding="4">
              
              <tbody>
                <tr>
                       <td>Período &nbsp;</td>
                    <td><select class="form-control pull-left col-xs-3" name="periodolibromayorpro" id="periodolibromayorpro">
  <?php 
if(isset($_GET["periodolibromayor"])){
echo'<option value="'.$_GET["periodolibromayor"].'">'.$_GET["periodolibromayor"].'</option>';
  foreach ($_SESSION["Perido"] as $key => $value) {
    if($_GET["periodolibromayor"] != $value) { 
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
                    <td><input type="text" maxlength="6" id="minlibromayorpro" name="minlibromayorpro" placeholder="AñoMes"></td>
                   
                    <td><input type="text" class="col-xs-3" maxlength="2" id="mindialibromayorpro" name="mindialibromayorpro" placeholder="Día"></td>
                </tr>

                <tr>
                    <td>Hasta &nbsp;</td>
                    <td><input type="text" maxlength="6" id="maxlibromayorpro" name="maxlibromayorpro" placeholder="AñoMes"></td>
                   
                    <td><input type="text" class="col-xs-3" maxlength="2" id="maxdialibromayorpro" name="maxdialibromayorpro" placeholder="Día"></td>
              </tr>


              
            </tbody>
            

          </table>
    <br>

 <input type="hidden" class="form-control" id="Proyecto" name="Proyecto" value="<?php echo $_SESSION["Proyecto"]?>">

          <table class="table table-bordered table-striped libromayorpro"  width="100%">
             

            <!--*****************CABECERA TABLA  USUARIO********************************* -->
        

              
                     
            <thead>
              <tr>
                <th>Nombre</th>
                <th>N°</th>
                <th>Cuenta</th>
                <th>Nombre Cuenta</th>
                <th>Año/Mes</th>
                <th>Dia</th> 
                <th>Documento</th>
                <th>Descripción</th>
                <th>Proyecto</th>
                <th>Debe</th>
                <th>Haber</th>
                <th>Fecha Registro</th>
                <th></th>
               
              </tr>
               <tr>
                <th>Nombre</th>
                <th>N°</th>
                <th>Cuenta</th>
                <th>Nombre Cuenta</th>
                <th>Año/Mes</th>
                <th>Dia</th> 
                <th>Documento</th>
                <th>Descripción</th>
                <th>Proyecto</th>
                <th>Debe</th>
                <th>Haber</th>
                <th>Fecha Registro</th>
                <th></th>
               
              </tr>

            
            </thead>
    
            <tbody>
 <!--*****************FILA 1  TABLA  USUARIO********************************* -->
              <?php
            if(isset($_GET["periodolibromayor"])){
               $periodolibromayor = $_GET["periodolibromayor"];
              }else{
               $periodolibromayor = $_SESSION["Anologin"];
                }
              $Rnc_Empresa_LD = $_SESSION["RncEmpresaUsuario"];
              $Orden = "id";

              $libromayor = ControladorDiario::ctrMostrarLibroMayor($Rnc_Empresa_LD, $Orden, $periodolibromayor);

               
               foreach ($libromayor as $key => $value){
                $fechaano = substr($value["Fecha_AnoMes_LD"], 0, 4);
                $fechames = substr($value["Fecha_AnoMes_LD"], -2);
                $fechadia = $value["Fecha_dia_LD"];
                $fechaCompleta = $fechadia."/".$fechames."/".$fechaano;
                 
                 
                           
                echo '<tr>
                        <td>'.$value["Nombre_Empresa"].'</td>
                        <td>'.$value["NAsiento"].'</td>
                        <td>'.$value["id_grupo"].'.'.$value["id_categoria"].'.'.$value["id_generica"].'.'.$value["id_cuenta"].'</td>
                            
                            <td>'.$value["Nombre_Cuenta"].'</td>
                            <td>'.$value["Fecha_AnoMes_LD"].'</td>
                            <td>'.$value["Fecha_dia_LD"].'</td>
                            <td>'.$value["NCF"].'</td>
                            <td>'.$value["ObservacionesLD"].'</td> 
                            <td>'.$value["CodigoProyecto"].'</td>  
                            <td>'.$value["debito"].'</td> 
                            <td>'.$value["credito"].'</td>
                            <td>'.$fechaCompleta.'</td>
                            <td>';

  $Extraer = $value["Extraer_NAsiento"];


  switch ($Extraer) {
    case 'DDG':
      echo'<div class="btn-group">
  <button Title="Ver detalles de Asientos" class="btn btn-default btn-xs btnVerdetalleDiario"  NAsiento="'.$value["NAsiento"].'" Rnc_Empresa_LD="'.$value["Rnc_Empresa_LD"].'" Rnc_Factura="'.$value["Rnc_Factura"].'" Nombre="'.$value["Nombre_Empresa"].'"  NCF="'.$value["NCF"].'" fechaañomes = "'.$value["Fecha_AnoMes_LD"].'" fechadia = "'.$value["Fecha_dia_LD"].'" observaciones = "'.$value["ObservacionesLD"].'"data-toggle="modal" data-target="#modalVerDetalleDiario"><i class="fa fa-eye"></i></button>

  <button class="btn btn-warning btn-xs btnEditarGastoDiario" id_606="'.$value["id_registro"].'" Extraer="'.$value["Extraer_NAsiento"].'"><i class="fa fa-pencil"></i></button>
  

    <button class="btn btn-primary btn-xs btnCopiarGastoDiario" id_606="'.$value["id_registro"].'" Extraer="'.$value["Extraer_NAsiento"].'"><i class="fa fa-copy"></i></button>

  
  
  <button class="btn btn-danger btn-xs btnEliminarGastosLD" id_606="'.$value["id_registro"].'" Rnc_Empresa_LD="'.$value["Rnc_Empresa_LD"].'" Extraer = "'.$value["Extraer_NAsiento"].'" Rnc_Factura_606="'.$value["Rnc_Factura"].'" NCF_606="'.$value["NCF"].'"><i class="fa fa-times"></i></button>';
                                
  break;
  case 'DDI':
  echo'<div class="btn-group">
  <button Title="Ver detalles de Asientos" class="btn btn-default btn-xs btnVerdetalleDiario"  NAsiento="'.$value["NAsiento"].'" Rnc_Empresa_LD="'.$value["Rnc_Empresa_LD"].'" Rnc_Factura="'.$value["Rnc_Factura"].'" Nombre="'.$value["Nombre_Empresa"].'" fechaañomes = "'.$value["Fecha_AnoMes_LD"].'" fechadia = "'.$value["Fecha_dia_LD"].'" observaciones = "'.$value["ObservacionesLD"].'"data-toggle="modal" data-target="#modalVerDetalleDiario"><i class="fa fa-eye"></i></button>

  <button class="btn btn-warning btn-xs btnEditarIngresoDiario" id_607="'.$value["id_registro"].'" Extraer = "'.$value["Extraer_NAsiento"].'"><i class="fa fa-pencil"></i></button>

  <button class="btn btn-primary btn-xs btnCopiarIngresoDiario" id_607="'.$value["id_registro"].'" Extraer = "'.$value["Extraer_NAsiento"].'"><i class="fa fa-copy"></i></button>
  
  
  
  <button class="btn btn-danger btn-xs btnEliminarIngresoLD" id_607="'.$value["id_registro"].'" Rnc_Empresa_LD="'.$value["Rnc_Empresa_LD"].'" Extraer = "'.$value["Extraer_NAsiento"].'" Rnc_Factura_607="'.$value["Rnc_Factura"].'" NCF_607="'.$value["NCF"].'"><i class="fa fa-times"></i></button>';
                                
  break;
  case 'DDA':
  echo'<div class="btn-group">
  <button Title="Ver detalles de Asientos" class="btn btn-default btn-xs btnVerdetalleDiario"  NAsiento="'.$value["NAsiento"].'" Rnc_Empresa_LD="'.$value["Rnc_Empresa_LD"].'" Rnc_Factura="'.$value["Rnc_Factura"].'" Nombre="'.$value["Nombre_Empresa"].'" fechaañomes = "'.$value["Fecha_AnoMes_LD"].'" fechadia = "'.$value["Fecha_dia_LD"].'" observaciones = "'.$value["ObservacionesLD"].'"data-toggle="modal" data-target="#modalVerDetalleDiario"><i class="fa fa-eye"></i></button>

  <button class="btn btn-warning btn-xs btnEditarAjusteDiario" id_Ajuste="'.$value["id_registro"].'" Extraer = "'.$value["Extraer_NAsiento"].'" Rnc_Factura ="'.$value["Rnc_Factura"].'" NCF="'.$value["NCF"].'"><i class="fa fa-pencil"></i></button>

   <button class="btn btn-primary btn-xs btnCopiarAjusteDiario" id_Ajuste="'.$value["id_registro"].'" Extraer = "'.$value["Extraer_NAsiento"].'" Rnc_Factura ="'.$value["Rnc_Factura"].'" NCF="'.$value["NCF"].'"><i class="fa fa-copy"></i></button>


                               
<button class="btn btn-danger btn-xs btnEliminarAjusteLD" id_Ajuste="'.$value["id_registro"].'" Rnc_Empresa_LD="'.$value["Rnc_Empresa_LD"].'" Extraer = "'.$value["Extraer_NAsiento"].'" Rnc_Factura_Ajuste="'.$value["Rnc_Factura"].'" NCF_Ajuste="'.$value["NCF"].'"><i class="fa fa-times"></i></button>';
                                
                                break;
   default:
        echo ' <div class="btn-group">
        <button Title="Ver detalles de Asientos" class="btn btn-default btn-xs btnVerdetalleDiarioModulos"  NAsiento="'.$value["NAsiento"].'" Rnc_Empresa_LD="'.$value["Rnc_Empresa_LD"].'" Rnc_Factura="'.$value["Rnc_Factura"].'" Nombre="'.$value["Nombre_Empresa"].'"  NCF="'.$value["NCF"].'" fechaañomes = "'.$value["Fecha_AnoMes_LD"].'" fechadia = "'.$value["Fecha_dia_LD"].'" observaciones = "'.$value["ObservacionesLD"].'"data-toggle="modal" data-target="#modalVerDetalleDiario"><i class="fa fa-eye"></i></button>';
            break;  
                              
                            }
 
                                                   
                              echo'</div>
                              

                            </td> 
                        </tr>';



               }

               


               ?>


            </tbody>   
              <!--***************** CIERRE FILA 1  TABLA  USUARIO********************************* -->

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
                <td style="font-weight:bold; border:1px solid #eee;">TOTALES:</td> 
                <td style="font-weight:bold; border:1px solid #eee; background: #EC9538";></td> 
                <td style="font-weight:bold; border:1px solid #eee; background: #EC9538";></td>
                <td style="font-weight:bold; border:1px solid #eee; background: #EC9538";></td> 
                <td></td>
                </tr>
                           
               
            <!--*****************CIERRE CUERPO  TABLA  USUARIO********************************* -->
            
            
          </table>

        
        <!--*****************CIERRE DE TABLA USUARIO********************************* -->

        </div>        

        
      </div>
      

    </section>
 
  </div>

<?php 
$BorrarGastoLD = new ControladorDiario();
$BorrarGastoLD -> ctrBorrarGastosLD();


$BorrarIngresoLD = new ControladorDiario();
$BorrarIngresoLD -> ctrBorrarIngresosLD();

$BorrarAjusteLD = new ControladorDiario();
$BorrarAjusteLD -> ctrBorrarAjusteLD();





?>
  <!-- Modal -->
<div id="modalleyendacorrelativos" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">

    
    <div class="modal-content">

     <div class="modal-header" style="background: #3c8dbc; color:white">
       
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Leyenda de Correlativos</h4>
      
      </div>
        <div class="modal-body">

        <div class="box-body">

          <table class="table table-bordered table-striped dt-responsive tablaTodos" width="100%">

            <!--*****************CABECERA TABLA  USUARIO********************************* -->         
            <thead>
              <tr>
                <th style="width:5px">Correlativo</th>
                <th style="width:5px">Modulo</th>
                <th style="width:5px">Ruta</th>
                  

              </tr>
              

            </thead>
            
            <tbody>
               <tr> 
                <td>COT</td>
                <td>COTIZACIÓN</td>
                <td>Menu Facturación / Cotización </td>
              </tr>
              <tr> 
                <td>FP1</td>
                <td>FACTURA PROFORMA</td>
                <td>Menu Facturación / Factura Proforma </td>
              </tr>
              <tr> 
                <td>DFF</td>
                <td>FACTURA</td>
                <td>Menu Facturación / Factura </td>
              </tr>
              <tr> 
                <td>DFP</td>
                <td>FACTURA PROFORMA</td>
                <td>Menu Facturación / Factura Proforma </td>
              </tr>
              <tr> 
                <td>BCF</td>
                <td>CONSUMIDOR FINAL MASIVO</td>
                <td>Menu Impuestos / reporte-607 / Boton Cargar Masiva Consumidor Final</td>
              </tr>
              <tr> 
                <td>RPC</td>
                <td>Reporte CXC</td>
                <td>Menu Facturación / Reporte CXC</td>
              </tr>
              <tr> 
                <td>DCG</td>
                <td>Compra General</td>
                <td>Menu Compras / Sub Menu Compras / Compra General</td>
              </tr>
               <tr> 
                <td>DCI</td>
                <td>Inventario de Mercancia</td>
                <td>Menu Compras / Sub Menu Compras / Inventario de Mercancia</td>
              </tr>
               <tr> 
                <td>CP1</td>
                <td>Compra Proforma</td>
                <td>Menu Compras Proforma / Sub Menu Compras Profroma / Compra General Proforma Ó Inventario de Mercancia Pro</td>
              </tr>
              
               <tr> 
                <td>EPC</td>
                <td>Orden de Pago Facturas ó Orden de Pago DGII</td>
                <td>Menu Compras / Sub Cuentas Por Pagar / Orden de Pago Facturas ó Orden de Pago DGII</td>
              </tr>
               <tr> 
                <td>DOA</td>
                <td>Otorgar Anticipos</td>
                <td>Menu Banco /Fondo de Anticipos/ Reporte de Anticipos Rendidos/ Boton Otorgar Anticipos </td>
              </tr>
               <tr> 
                <td>RDF</td>
                <td>Rendir Anticipos</td>
                <td>Menu Banco /Fondo de Anticipos/ Reporte de Anticipos Rendidos/ Boton Rendir Anticipos</td>
              </tr>
              <tr> 
                <td>DDI</td>
                <td>Diario de Ingreso</td>
                <td>Menu Contabilidad / Diario de Ingreso</td>
              </tr>
              <tr> 
                <td>DDG</td>
                <td>Diario de Gasto</td>
                <td>Menu Contabilidad / Diario de Gasto</td>
              </tr>
              <tr> 
                <td>DDA</td>
                <td>Diario de Ajuste</td>
                <td>Menu Contabilidad / Diario de Ajuste</td>
              </tr>
             
            </tbody>
          
          </table>
           </div>

  </div>

    </div>

  </div>
</div>


  
  <div id="modalVerDetalleDiario" class="modal fade" role="dialog" >
  
  <div class="modal-dialog modal-lg" style="width: 1150px;">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Ver Detalle </h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">


<div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">
      <h5 style="text-align: center; color: #FFFFFF"><b>Beneficiario</b></h5>

</div>
   
      
<div class="form-group col-xs-4">
    <div class="input-group">

        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>

        <input type="text" class="form-control" id="Nombre_Empresa" readonly>
                   
    </div>            

</div>

<div class="form-group col-xs-4">
  <div class="input-group">

      <span class="input-group-addon"><i class="fa fa-key"></i></span>

      <input type="text" class="form-control" id="Rnc_Factura" readonly>
                
  </div>
</div>

<div class="form-group col-xs-4">

    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-key">&nbsp;NAsiento</i></span>
        <input type="text" class="form-control" id="NAsiento" readonly>

    </div>
             
</div>      

       <div style="padding-right: 0px"  class="form-group col-xs-4">
   

  <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

   
       <input type="text" class="form-control" maxlength="6" id="FechaAnoMes"  readonly>
        

   </div>  
  
  
</div>

<div style="padding-left: 0px" class="form-group col-xs-4">
   

  <div class="input-group">
 <input type="text" class="form-control" maxlength="2" id="FechaDia" readonly>
 </div>  
  
  
</div>



<div class="col-xs-4"></div>

<div class="col-xs-12"></div>

 





<div class="col-xs-12 left">
                 <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-audio-description"></i></span>

                      <input type="text" class="form-control" id="Descripcion"  readonly>

                    </div>
                   
                  
                 </div>
               
              </div> 
                   
  
               

   

<div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">
      <h6 style="text-align: center; color: #FFFFFF"><b>INFORMACIÓN CONTABLE</b></h6>

</div>
               
<div class="form-group Contabilidadrecibopago col-xs-12">
    
</div>      
     
 </div> 
 </div>      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        

      </div>
      <?php 
      

      //$EditarCategoria = new ControladorCategorias();
      //$EditarCategoria -> ctrEditarCategoria();
      

       ?>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
  </div>