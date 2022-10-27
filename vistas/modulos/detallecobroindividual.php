
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        
         
      <h1 class="col-xs-3" style="font-size: 30px"><i class="fa fa-server"></i>
        Detalle de Cobros
        
      </h1>
  <a href="crear-ventas" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Factura</a>
  <a href="crear-ventas-pro" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Factura Profomar</a>

   <a href="ventas" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Detalle de Ventas</a>
  
   
    <a href="reportecxc" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Cuentas Por Cobrar</a>

    <a href="detallerecibodecobro" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Recibo de Cobro</a>
   
      
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Cuentas por Cobrar</li>
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
                <th style="width: 10px">RNC Cliente</th>
                <th style="width: 10px">Nombre Cliente</th>
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
             
                  
        $Rnc_Empresa_CXC =  $_SESSION["RncEmpresaUsuario"];

      $respuesta = ControladorCXC::ctrMostarDetallecobro($Rnc_Empresa_CXC);


foreach ($respuesta as $key => $value) {

          
      
                  echo '<tr>
                            <td style="width: 5px">'.($key+1).'</td>
                            <td style="width: 15px">'.$value["Rnc_Cliente"].'</td>
                            <td style="width: 15px">'.$value["Nombre_Cliente"].'</td>
                            <td style="width: 15px">'.$value["NCF_cxc"].'</td>
                            <td style="width: 15px">'.$value["NAsiento"].'</td>
                            <td style="width: 15px">'.$value["FechaAnoMes"].'</td>
                            <td style="width: 15px">'.$value["FechaDia"].'</td>
                            <td style="width: 15px">'.number_format($value["Monto"], 2).'</td>
                            <td style="width: 15px">'.$value["Referencia"].'</td>';

              if($_SESSION["Banco"] == 1){
                  $id = "id";
                  $valorid = $value["EntidadBancaria"];
                  $banco = ControladorBanco::ctrModalEditarBanco($id, $valorid);
                    echo '<td style="width: 15px">'.$banco["Nombre_Cuenta"].'</td>';



                }else{
                    echo '<td style="width: 15px">'.$value["EntidadBancaria"].'</td>';



                }

                           
                        
                          echo '<td style="width: 15px">'.$value["Descripcion"].'</td>';

                          if($value["Tipo"] == "FACTURA"){
                            echo '<td><div class="btn-group">
                          <button class="btn btn-success btn-xs">FACTURAS</button> </div></td>';



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

 