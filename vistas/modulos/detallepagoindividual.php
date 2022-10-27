
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        
         
      <h1 class="col-xs-3" style="font-size: 30px"><i class="fa fa-server"></i>
        Detalle de Pagos
        
      </h1>
  <a href="crear-compra-inventario" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Inventario de Mercancia</a>
  <a href="crear-compra-gastosgenerales" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Compras Generales</a>

   <a href="compras" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Detalle de Compras</a>
  
   
    <a href="reportecxp" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Cuentas Por Pagar</a>

    <a href="detallerecibodepago" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Detalle de Pagos</a>
   
      
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Cuentas por Pagar</li>
      </ol>
    </section>

    <section class="content">

      
      <div class="box">

          <!--*****************BOTON DE VENTAS********************************* -->
      
       
        <!--*****************CIERRE DE DIV BOTON DE AGREGAR VENTAS********************************* -->


        <div class="box-body">

  
         

           
          <table border="0" cellspacing="4" cellpadding="4">
              
              <tbody>
                <tr>
                    <td>Fecha Desde:</td>
                    <td><input type="text" id="min" name="min"></td>
                </tr>

                <tr>
                    <td>Fecha Hasta:</td>
                    <td><input type="text" id="max" name="max"></td>
              </tr>
            </tbody>

          </table>
    <br>
          <!--*****************TABLA  USUARIO********************************* -->


          <table class="table table-bordered table-striped dt-responsive ReporteCXP" width="100%">

            <!--*****************CABECERA TABLA  USUARIO********************************* -->         
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th style="width: 10px">RNC Suplidor</th>
                <th style="width: 10px">Nombre Suplidor</th>
                <th style="width: 10px">NCF</th>
                <th style="width: 10px">N° de Recibo</th>
                <th style="width: 10px">Año/Mes</th>
                <th style="width: 10px">Día</th>
                <th style="width: 10px">Monto</th>
                <th style="width: 10px">Referencia</th>
                <th style="width: 10px">Banco</th>
                <th style="width: 10px">Descrip.</th>
                <th style="width: 10px">Modulo</th>
                
               
               
               
               
                
                
                
              </tr>
             
            </thead>
            <tbody>
              <?php 
             
                  
                  $Rnc_Empresa_CXP =  $_SESSION["RncEmpresaUsuario"];

                  $respuesta = ControladorCXP::ctrMostarDetallepago($Rnc_Empresa_CXP);


foreach ($respuesta as $key => $value) {

          
      
                  echo '<tr>
                            <td style="width: 5px">'.($key+1).'</td>
                            <td style="width: 15px">'.$value["Rnc_Suplidor"].'</td>
                            <td style="width: 15px">'.$value["Nombre_Suplidor"].'</td>
                            <td style="width: 15px">'.$value["NCF_cxp"].'</td>
                            <td style="width: 15px">'.$value["NAsiento"].'</td>
                            <td style="width: 15px">'.$value["FechaAnoMes"].'</td>
                            <td style="width: 15px">'.$value["FechaDia"].'</td>
                            <td style="width: 15px">'.number_format($value["Monto"], 2).'</td>
                            <td style="width: 15px">'.$value["Referencia"].'</td>';

                            $id = "id";
                            $valorid = $value["EntidadBancaria"];


                        $banco = ControladorBanco::ctrModalEditarBanco($id, $valorid);
                          echo '<td style="width: 15px">'.$banco["Nombre_Cuenta"].'</td>
                          <td style="width: 15px">'.$value["Descripcion"].'</td>';

                          if($value["Tipo"] == "FACTURA"){
                            echo '<td><div class="btn-group">
                          <button class="btn btn-success btn-xs">FACTURAS</button> </div></td>';



                          }else if($value["Tipo"] == "ITBIS"){
                            echo '<td><div class="btn-group">
                          <button class="btn btn-warning btn-xs">ITBIS</button></div></td>';


                          } else{
                            echo '<td><div class="btn-group">
                          <button class="btn btn-warning btn-xs">ISR</button></div></td>';



                          }
                          


}/*cierre for respuesta*/














               ?>

            </tbody>
            <!--*****************CIERRE CABECERA TABLA  USUARIO********************************* -->
            
            <!--*****************CUERPO  TABLA  USUARIO********************************* -->

           
            
          </table>
        
       

         <?php 
  
        #$eliminarVenta = new ControladorVentas();
        #$eliminarVenta -> ctrEliminarVenta();



        ?>

        </div>        

        
      </div>
      

    </section>
 
  </div>

 