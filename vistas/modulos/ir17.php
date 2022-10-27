
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
       <h1 class="col-xs-3" style="font-size: 30px"><i class="fa fa-pie-chart"></i>
        IR-17
      </h1>
       <a href="reporte-606" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Reporte 606</a>
        <a href="reporte-607" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Reporte 607</a>

       <button class="btn btn-success" data-toggle="modal" data-target="#modalDescarga606"><i class="fa fa-file-text-o" style="padding-right:5px"></i>Descarga de TXT 606</button>

        <button class="btn btn-success" data-toggle="modal" data-target="#modalDescarga607"><i class="fa fa-file-text-o" style="padding-right:5px"></i>Descarga de TXT 607</button>
     
    </section>


    <!-- Main content -->
    <section class="content">



      <div class="row">
  <div class="col-xs-12">

          <div class="box box-success">

            <div class="box-header with-border">
                <select class="btn btn-default pull-left"  id="FechaDeclaracionIR17" name="FechaDeclaracionIR17">
                
                <?php  
                 if(isset($_GET["FechaDeclaracionIR17"])){ 
                 echo '<option value="'.$_GET["FechaDeclaracionIR17"].'">'.$_GET["FechaDeclaracionIR17"].'</option>';      

                        $Rnc_Empresa_606 = $_SESSION["RncEmpresaUsuario"];

                         $Periodo606 = Controlador606::ctrMostrarPeriodo606($Rnc_Empresa_606);

                       
                         foreach ($Periodo606 as $key => $value){

                          echo '<option value="'.$value["Fecha_AnoMes_606"].'">'.$value["Fecha_AnoMes_606"].'</option>';
                           }



                } else{

                  echo '<option value="">Periodo</option>';      

                        $Rnc_Empresa_606 = $_SESSION["RncEmpresaUsuario"];

                         $Periodo606 = Controlador606::ctrMostrarPeriodo606($Rnc_Empresa_606);

                       
                         foreach ($Periodo606 as $key => $value){

                          echo '<option value="'.$value["Fecha_AnoMes_606"].'">'.$value["Fecha_AnoMes_606"].'</option>';


                             }


                }
                    

                ?>

            

          
              </select>
              

              
            </div>

 
          

            <div class="box-body">

             
                <div class="box">
                  <input type="hidden"  id="RncEmpresa606" name="RncEmpresa606" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">
                   <input type="hidden" class="form-control" id="Usuariologueado" name="UsuarioLogueado" value="<?php echo $_SESSION["Nombre"]?>">
                   <?php 
if(isset($_GET["FechaDeclaracionIR17"])){
  $FechaDeclaracionIR17 = $_GET["FechaDeclaracionIR17"];

    $Rnc_Empresa= $_SESSION["RncEmpresaUsuario"];
    $Periodo_Empresa = $_GET["FechaDeclaracionIR17"];

$retenciones606 = ControladorEmpresas::ctrCuadreRetenciones($Periodo_Empresa, $Rnc_Empresa);

$ir17_1A = 0;
$ir17_1B = 0;

$ir17_2A = 0;
$ir17_2B = 0;

$ir17_3A = 0;
$ir17_3B = 0;

$ir17_4A = 0;
$ir17_4B = 0;

$ir17_5A = 0;
$ir17_5B = 0;

$ir17_6A = 0;
$ir17_6B = 0;

$ir17_7A = 0;
$ir17_7B = 0;

$ir17_8A = 0;
$ir17_8B = 0;

$ir17_9A = 0;
$ir17_9B = 0;

$ir17_10A = 0;
$ir17_10B = 0;

$ir17_11A = 0;
$ir17_11B = 0;

$ir17_12A = 0;
$ir17_12B = 0;

$ir17_13A = 0;
$ir17_13B = 0;

$ir17_14A = 0;
$ir17_14B = 0;

$ir17_15A = 0;
$ir17_15B = 0;

$ir17_16A = 0;
$ir17_16B = 0;

$ir17_17A = 0;
$ir17_17B = 0;


if(isset($_GET["ir17_18A"])){
  $ir17_18A = $_GET["ir17_18A"];

} else{
  $ir17_18A = 0;

}

$ir17_18B = 0;

$ir17_19A = 0;
$ir17_19B = 0;

$ir17_20A = 0;
$ir17_20B = 0;

$ir17_21A = 0;
$ir17_21B = 0;


if(isset($_GET["ir17_22A"])){
  $ir17_22A = $_GET["ir17_22A"];

} else{
  $ir17_22A = 0;

}


$ir17_22B = 0;

$ir17_23 = 0;
$ir17_24 = 0;

if(isset($_GET["ir17_25"])){
  $ir17_25 = $_GET["ir17_25"];

} else{
  $ir17_25 = 0;

}

$ir17_26 = 0;
$ir17_27 = 0;
$ir17_28 = 0;

if(isset($_GET["ir17_29"])){
  $ir17_29 = $_GET["ir17_29"];

} else{
  $ir17_29 = 0;

}

if(isset($_GET["ir17_30"])){
  $ir17_30 = $_GET["ir17_30"];

} else{
  $ir17_30 = 0;

}

foreach ($retenciones606  as $key => $value) {

  if($value["Extrar_Tipo_Retencion_606"] == "01" && $value["Extraer_NCF_606"] != "CP1"){

    $ir17_1A = $ir17_1A + $value["Total_Monto_Factura_606"];

  } elseif ($value["Extrar_Tipo_Retencion_606"] == "02" && $value["Extraer_NCF_606"] != "CP1") {

    $ir17_2A = $ir17_2A + $value["Total_Monto_Factura_606"];


  }  

  elseif ($value["Extrar_Tipo_Retencion_606"] == "03" && $value["Extraer_NCF_606"] != "CP1") {

    $ir17_17A = $ir17_17A + $value["Total_Monto_Factura_606"];


  }  

}

$ir17_1B = $ir17_1A * 0.10;
$ir17_2B = $ir17_2A * 0.10;

$ir17_17B = $ir17_17A * 0.02;
$ir17_18B = $ir17_18A * 0.02;


$ir17_21B = $ir17_1B +
            $ir17_2B + 
            $ir17_3B + 
            $ir17_4B +
            $ir17_5B +
            $ir17_6B + 
            $ir17_7B +
            $ir17_8B +
            $ir17_9B +
            $ir17_10B +
            $ir17_11B +
            $ir17_12B +
            $ir17_13B +
            $ir17_14B +
            $ir17_15B +
            $ir17_16B +
            $ir17_17B +
            $ir17_18B +
            $ir17_19B +
            $ir17_20B;


$ir17_22B = $ir17_22A * 0.27;



$ir17_23 = $ir17_21B + $ir17_22B;

$ir17_27 = $ir17_23 - $ir17_24 - $ir17_25 - $ir17_26; 

if($ir17_27 > 0){

  $ir17_27 = $ir17_23 - $ir17_24 - $ir17_25 - $ir17_26; 
  $ir17_28 = 0;

} else {

  $ir17_27 = 0; 
  $ir17_28 = $ir17_23 - $ir17_24 - $ir17_25 - $ir17_26;
  $ir17_28 = $ir17_28 * -1;


}

 $ir17_31 = $ir17_27 + $ir17_29 + $ir17_30;
}//if fechadeclaracionIT1

?>

 <div class="form-group col-xs-12" style="background-color: #EBECED">

                   

                <h3 style="text-align: center;"><b>DECLARACION Y/O PAGO DE OTRAS RETENCIONES Y RETRIBUCIONES COMPLEMENTARIAS </b></h3>

                 <h2 style="text-align: center;"><b> IR-17</b></h2>

                 
                </div>

<table class="table table-bordered table-striped dt-responsive"  width="100%">      
  <thead>
      <tr>
        <th style="width: 15px; background: #96be25;">I.</th>
        <th style="width: 1300px; background: #96be25;">DATOS GENERALES</th>     
      </tr>
  </thead>
</table>                    <div class="form-group">

                    
                      <div class="col-xs-2" style="padding-top: 15px">

                      <label>Nombre de la Empresa</label>

                      
                      </div>

                    </div>

                    <div class="form-group">

                      <div class="col-xs-2">
                        <input type="text" class="form-control" value="<?php echo $_SESSION["NombreEmpresa"];?>">
                  <br>
                      </div>
                   

                    </div>

                    <div class="form-group">

                    
                      <div class="col-xs-2">

                      <label>RNC</label>
                      
                      </div>

                    </div>
                     
                    <div class="form-group">

                    
                    <div class="col-xs-2">
                      <input type="text" class="form-control"  value="<?php echo $_SESSION["RncEmpresaUsuario"] ;?>">
                    
                        
                    </div>
                   

                  </div>
                    
                    

                  <div class="form-group">
    
                    <div class="col-xs-2" style="padding-top: 15px">

                    <label>Periodo</label>
                    
                    </div>

                 </div>
                     
                <div class="form-group">

                    
                    <div class="col-xs-2" style="padding-right:0px">
                      <input type="text" class="form-control" id="FechaDeclaracionIR17" name="FechaDeclaracionIR17" value="<?php echo $FechaDeclaracionIR17;?>">
                    
                        
                    </div>
                   

                    </div>

<!--======= PARTE II==============================================================-->

<div class="form-group">

     
<table class="table table-bordered table-striped dt-responsive"  width="100%">      
  <thead>
    <tr>
      <th style="width: 1300px; background: #96be25; font-weight: bold;">II. OTRAS RETENCIONES</th>
      <th style="width: 10px; background: #96be25; font-weight: bold;"></th>
      <th style="width: 350px;background: #96be25; font-weight: bold;">MONTO IMPONIBLE </th>
      <th style="width: 20px;background: #96be25;">TASA</th>
      <th style="width: 350px; background: #96be25; font-weight: bold;">IMPUESTO</th>    
    </tr>
  </thead>

  <tbody>
      <tr>
        <td>1. Alquileres</td>
        <td>+</td>
        <td><?php echo number_format($ir17_1A, 2)?></td>
        <td>10%</td>
        <td><?php echo number_format($ir17_1B, 2)?></td>

      </tr>
      <tr>
        <td>2. Honorarios por Servicios Independientes</td>
        <td>+</td>
        <td><?php echo number_format($ir17_2A, 2)?></td>
        <td>10%</td>
        <td><?php echo number_format($ir17_2B, 2)?></td>

      </tr>
      <tr>
        <td>3. Premios (Ley 253-12) </td>
        <td>+</td>
        <td></td>
        <td>25%</td>
        <td></td>

      </tr>
      <tr>
        <td>4. Transferencias de Titulos y Propiedades</td>
        <td>+</td>
        <td></td>
        <td>2%</td>
        <td></td>

      </tr>
      <tr>
        <td>5. Dividendos (Ley 253-12)</td>
        <td>+</td>
        <td></td>
        <td>10%</td>
        <td></td>

      </tr>
      <tr>
        <td>6. Intereses a Personas Jurídicas o Entidades No Residentes (Ley 253-12)</td>
        <td>+</td>
        <td></td>
        <td>10%</td>
        <td></td>

      </tr>
      <tr>
        <td>7. Intereses a Personas Jurídicas o Entidades No Residentes (Ley 57-2007)</td>
        <td>+</td>
        <td></td>
        <td>5%</td>
        <td></td>

      </tr>
      <tr>
        <td>8. Intereses a Personas Físicas No Residentes (Ley 253-12)</td>
        <td>+</td>
        <td></td>
        <td>10%</td>
        <td></td>

      </tr>
      <tr>
        <td>9. Intereses a Personas Físicas No Residentes (Ley 57-2007 y 253-12)</td>
        <td>+</td>
        <td></td>
        <td>5%</td>
        <td></td>

      </tr>
      <tr>
        <td>10. Remesas al Exterior (Ley 253-12) </td>
        <td>+</td>
        <td></td>
        <td>27%</td>
        <td></td>

      </tr>
      <tr>
        <td>11. Remesas Acuerdos Especiales </td>
        <td>+</td>
        <td></td>
        <td>5%</td>
        <td></td>

      </tr>
      
<tr>
        <td>12. Pagos a Proveedores del Estado (Ley 253-12)</td>
        <td>+</td>
        <td></td>
        <td>5%</td>
        <td></td>

      </tr>
      <tr>
        <td>13. Juegos Telefónicos (Norma 08-2011)</td>
        <td>+</td>
        <td></td>
        <td>5%</td>
        <td></td>

      </tr>
      <tr>
        <td>14. Ganacia de Capital (Norma 07-2011)</td>
        <td>+</td>
        <td></td>
        <td>1%</td>
        <td></td>

      </tr>
      <tr>
        <td>15. Juegos vía Internet (Ley 139-11, Art. 7) </td>
        <td>+</td>
        <td></td>
        <td>10%</td>
        <td></td>

      </tr>
      <tr>
        <td>16. Otras Rentas (Ley 11-92, Art. 309 Lit. b)</td>
        <td>+</td>
        <td></td>
        <td>10%</td>
        <td></td>

      </tr>
       <tr>
        <td>17. Otras Rentas (Decreto 139-98, Art. 70 Lit. a y b) </td>
        <td>+</td>
        <td><?php echo number_format($ir17_17A, 2)?></td>
        <td>2%</td>
        <td><?php echo number_format($ir17_17B, 2)?></td>

      </tr>
      <tr>
        <td>18. Otras Retenciones (Norma 07-2007) </td>
        <td>+</td>
        <td><div class="col-xs-10">
          <input type="text" class="form-control" id="ir17_18A" name="ir17_18A" value="<?php echo $ir17_18A;?>" required>
          </div>
          <div class="col-xs-2">
          <button class="pull-right btn btn-primary btn-xs btnir17_18A">+</button>
          </div>

        </td>
        <td>2%</td>
        <td><?php echo number_format($ir17_18B, 2)?></td>

      </tr>
      <tr>
        <td>19. Intereses Pagados por Entidades Financieras a Personas Jurídicas Residentes (Norma 07-2019)</td>
        <td>+</td>
        <td></td>
        <td>1%</td>
        <td></td>

      </tr>
      <tr>
        <td>20. Intereses Pagados por Entidades Financieras a Personas Físicas Residentes (Ley 253-12)</td>
        <td>+</td>
        <td></td>
        <td>10%</td>
        <td></td>

      </tr>
      <tr>
        <td>21. Total Otras Retenciones (sumar casillas 1+2+3+4+5+6+7+8+9+10+11+12+13+14+15+16+17+18+19+20)</td>
        <td>=</td>
        <td></td>
        <td>=</td>
        <td><?php echo number_format($ir17_21B, 2)?></td>

      </tr>
    
      
      
  </tbody>
  </table>
        
</div>

 <!--======= FIN PARTE II==============================================================-->
  <div class="form-group">

     
<table class="table table-bordered table-striped dt-responsive"  width="100%">      
  <thead>
    <tr>
      <th style="width: 1300px; background: #96be25; font-weight: bold;">III. 22. RETRIBUCIONES COMPLEMENTARIAS </th>
      <th style="width: 10px; background: #96be25; font-weight: bold;">=</th>
      <th style="width: 350px;background: #96be25; font-weight: bold;">
        <div class="col-xs-10">
          <input type="text" class="form-control" id="ir17_22A" name="ir17_22A" value="<?php echo $ir17_22A;?>" required>
          </div>
          <div class="col-xs-2">
          <button class="pull-right btn btn-primary btn-xs btnir17_22A">+</button>
          </div>


      </th>
      <th style="width: 20px;background: #96be25;">27%</th>
      <th style="width: 350px; background: #96be25; font-weight: bold;"><?php echo number_format($ir17_22B, 2)?></th>    
    </tr>
  </thead>

  <tbody> 
  </tbody>
</table>
        
</div>                  
 
                                         
 <div class="form-group">

     
<table class="table table-bordered table-striped dt-responsive"  width="100%">      
  <thead>
    <tr>
      <th style="width: 1660px; background: #96be25; font-weight: bold;">IV. LIQUIDACION</th>
      <th style="width: 20px;background: #96be25;"></th>
      <th style="width: 350px; background: #96be25; font-weight: bold;"></th>    
    </tr>
  </thead>

  <tbody> 
    <tr>
        <td>23. Impuesto a Pagar (Sumar casillas 21+22) </td>
        <td>=</td>
        <td><?php echo number_format($ir17_23, 2)?></td>
      </tr>
      <tr>
        <td>24. Saldos Compensables Autorizados (Otros Impuestos) </td>
        <td>=</td>
        <td></td>
      </tr>
      <tr>
        <td>25. Pagos Computables a Cuenta</td>
        <td>=</td>
        <td>
          <div class="col-xs-10">
          <input type="text" class="form-control" id="ir17_25" name="ir17_25" value="<?php echo $ir17_25;?>" required>
          </div>
          <div class="col-xs-2">
          <button class="pull-right btn btn-primary btn-xs btnir17_25">+</button>
          </div>

        </td>
      </tr>
      <tr>
        <td>26. Saldo a Favor Anterior </td>
        <td>=</td>
        <td></td>
      </tr>
      <tr>
        <td>27. Diferencia a Pagar (si el valor de casilla 23-24-25-26 es positivo)</td>
        <td>=</td>
        <td><?php echo number_format($ir17_27, 2)?></td>
      </tr>
      <tr>
        <td>28. Nuevo Saldo a Favor (si el valor de casilla 23-24-25-26 es negativo)</td>
        <td>=</td>
        <td><?php echo number_format($ir17_28, 2)?></td>
      </tr>



  </tbody>
</table>
        
</div>         


 <div class="form-group">

     
<table class="table table-bordered table-striped dt-responsive"  width="100%">      
  <thead>
    <tr>
      <th style="width: 1660px; background: #96be25; font-weight: bold;">V. PENALIDADES</th>
      <th style="width: 20px;background: #96be25;"></th>
      <th style="width: 350px; background: #96be25; font-weight: bold;"></th>    
    </tr>
  </thead>

  <tbody> 
    <tr>
        <td>29. Recargos</td>
        <td>=</td>
        <td>
          <div class="col-xs-10">
          <input type="text" class="form-control" id="ir17_29" name="ir17_29" value="<?php echo $ir17_29;?>" required>
          </div>
          <div class="col-xs-2">
          <button class="pull-right btn btn-primary btn-xs btnir17_29">+</button>
          </div>
        </td>
      </tr>
      <tr>
        <td>30. Interes Indemnizatorio </td>
        <td>=</td>
        <td>
          <div class="col-xs-10">
          <input type="text" class="form-control" id="ir17_30" name="ir17_30" value="<?php echo $ir17_30;?>" required>
          </div>
          <div class="col-xs-2">
          <button class="pull-right btn btn-primary btn-xs btnir17_30">+</button>
          </div>
        </td>
      </tr>
      


  </tbody>
</table>
        
</div> 

<div class="form-group">

     
<table class="table table-bordered table-striped dt-responsive"  width="100%">      
  <thead>
    <tr>
      <th style="width: 1660px; background: #96be25; font-weight: bold;">VI. MONTO A PAGAR</th>
      <th style="width: 20px;background: #96be25;"></th>
      <th style="width: 350px; background: #96be25; font-weight: bold;"></th>    
    </tr>
  </thead>

  <tbody> 
    <tr>
        <td>31. Total a Pagar (sumas casillas 27+29+30)</td>
        <td>=</td>
        <td><?php echo number_format($ir17_31, 2)?></td>
      </tr>
      

  </tbody>
</table>
        
</div> 







                    </div>
             
          
          </div>
          
          
       
        </div>

          
      </div>
    
    </div>
   


       
      </div>

      
    </section>


   </div>
   <!--************************************************
                      MODAL AGREGAR Categoria
  ******************************************************* -->
  <!-- Modal -->
<div id="modalDescarga606" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">DESCARGA TXT </h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de la CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              
              <input type="text" class="form-control input-lg" id="RncEmpresa606Rango" name="RncEmpresa606Rango" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              
            </div>


          </div>
          <!--*****************cierra input RNC de la CATEGORIA************************** -->
            

         <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                      <select type="text" class="form-control" id="Periodoreporte606" name="Periodoreporte606" required>
                        <option value="">Seleccionar Periodo</option>

                        <?php  
                         

                        $Rnc_Empresa_606 = $_SESSION["RncEmpresaUsuario"];

                         $Periodo606 = Controlador606::ctrMostrarPeriodo606($Rnc_Empresa_606);

                       
                         foreach ($Periodo606 as $key => $value){

                          echo '<option value="'.$value["Fecha_AnoMes_606"].'">'.$value["Fecha_AnoMes_606"].'</option>';



                         }
                    

                         ?>

                      </select>   

                    </div>
                   

                  </div>

          
                     
          
        </div>

      
        
      </div>
      
      <div class="modal-footer">
       

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

      
        <a class="btn btn-primary pull-right" role="button" id="descargartxt606">Descargar TXT 606</a>
        <a class="btn btn-warning pull-left" role="button" id="numeraciontxt606">Numeracion TXT 606</a>


        
        
       
      </div>





      
      
      
      
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>

</div>
<!--************************************************
                      MODAL AGREGAR Categoria
  ******************************************************* -->
  <!-- Modal -->
<div id="modalDescarga607" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">DESCARGA TXT </h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de la CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              
              <input type="text" class="form-control input-lg" id="RncEmpresa607Rango" name="RncEmpresa607Rango" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              
            </div>


          </div>
          <!--*****************cierra input RNC de la CATEGORIA************************** -->
            

         <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                      <select type="text" class="form-control" id="Periodoreporte607" name="Periodoreporte607" required>
                        <option value="">Seleccionar Periodo</option>

                        <?php  
                         

                        $Rnc_Empresa_607 = $_SESSION["RncEmpresaUsuario"];

                         $Periodo607 = Controlador607::ctrMostrarPeriodo607($Rnc_Empresa_607);

                       
                         foreach ($Periodo607 as $key => $value){

                          echo '<option value="'.$value["Fecha_comprobante_AnoMes_607"].'">'.$value["Fecha_comprobante_AnoMes_607"].'</option>';



                         }
                    

                         ?>

                      </select>   

                    </div>
                   

                  </div>

          
                     
          
        </div>

      
        
      </div>
      
      <div class="modal-footer">
       

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

       
        
       <a class="btn btn-primary pull-right" role="button" id="descargartxt607">Descargar TXT 607</a>
       <a class="btn btn-warning pull-left" role="button" id="numeraciontxt607">Numeracion TXT 607</a>


        
       
      </div>





      
      
      
      
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>

</div>
 