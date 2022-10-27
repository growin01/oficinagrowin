
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
       <h1 class="col-xs-3" style="font-size: 30px"><i class="fa fa-pie-chart"></i>
        IT-1
      </h1>
       <a href="reporte-606" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Reporte 606</a>
        <a href="reporte-607" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Reporte 607</a>

       <button class="btn btn-success" data-toggle="modal" data-target="#modalDescarga606"><i class="fa fa-file-text-o" style="padding-right:5px"></i>Descarga de TXT 606</button>

        <button class="btn btn-success" data-toggle="modal" data-target="#modalDescarga607"><i class="fa fa-file-text-o" style="padding-right:5px"></i>Descarga de TXT 607</button>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Cuadre Itbis</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">



      <div class="row">
  <div class="col-xs-12">

          <div class="box box-success">

            <div class="box-header with-border">
                <select class="btn btn-default pull-left"  id="FechaDeclaracionIT1" name="FechaDeclaracionIT1">
                
                <?php  
                 if(isset($_GET["FechaDeclaracionIT1"])){ 
                 echo '<option value="'.$_GET["FechaDeclaracionIT1"].'">'.$_GET["FechaDeclaracionIT1"].'</option>';      

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
if(isset($_GET["FechaDeclaracionIT1"])){
  $FechaDeclaracionIT1 = $_GET["FechaDeclaracionIT1"];

    $Rnc_Empresa= $_SESSION["RncEmpresaUsuario"];
    $Periodo_Empresa = $_GET["FechaDeclaracionIT1"];

    $anexo607 = ControladorEmpresas::ctrCuadreVentas($Periodo_Empresa, $Rnc_Empresa);
    $anexo606 = ControladorEmpresas::ctrCuadreCompras($Periodo_Empresa, $Rnc_Empresa);

    $retenciones607 = ControladorEmpresas::ctrCuadreRetenciones607($Periodo_Empresa, $Rnc_Empresa);

    $retenciones606 = ControladorEmpresas::ctrCuadreRetenciones($Periodo_Empresa, $Rnc_Empresa);

    $premisas = ControladorEmpresas::ctrControlPremisas($Rnc_Empresa, $Periodo_Empresa);

$anexoACant1 = 0; 
$anexoA1 = 0;

$anexoACant2 = 0; 
$anexoA2 = 0;

$anexoACant3 = 0; 
$anexoA3 = 0;

$anexoACant4 = 0; 
$anexoA4 = 0;

$anexoACant5 = 0; 
$anexoA5 = 0;

$anexoACant6 = 0; 
$anexoA6 = 0;

$anexoACant7 = 0; 
$anexoA7 = 0;

$anexoACant8 = 0; 
$anexoA8 = 0;

$anexoACant11 = 0;
$anexoA11 = 0;


$anexoA12 = 0;

$anexoA13 = 0;

$anexoA14 = 0;

$anexoA15 = 0;

$anexoA16 = 0;

$anexoA17 = 0;

$anexoA18 = 0;

$anexoA19 = 0;

$anexoA20 = 0;




if(isset($_GET["anexoA21"])){
  $anexoA21 = $_GET["anexoA21"];

} else{
  $anexoA21 = 0;

}
if(isset($_GET["anexoA22"])){
  $anexoA22 = $_GET["anexoA22"];

} else{
  $anexoA22 = 0;

}
if(isset($_GET["anexoA23"])){
  $anexoA23 = $_GET["anexoA23"];

} else{
  $anexoA23 = 0;

}
if(isset($_GET["anexoA24"])){
  $anexoA24 = $_GET["anexoA24"];

} else{
  $anexoA24 = 0;

}

if(isset($_GET["anexoA25"])){
  $anexoA25 = $_GET["anexoA25"];

} else{
  $anexoA25 = 0;

}

$anexoA26 = 0;




if(isset($_GET["anexoA27"])){
  $anexoA27 = $_GET["anexoA27"];

} else{
  $anexoA27 = 0;

}

$anexoA28 = 0;

$anexoA29 = 0;

$anexoA30 = 0;

$anexoA31 = 0;

$anexoA32 = 0;

$anexoA33 = 0;

$anexoA45A = 0;
$anexoA45B = 0;
if(isset($_GET["anexoA45C"])){
  $anexoA45C = $_GET["anexoA45C"];

} else{
  $anexoA45C = 0;

}

$anexoA45D = 0;


$anexoA46A = 0;
$anexoA46B = 0;
if(isset($_GET["anexoA46C"])){
  $anexoA46C = $_GET["anexoA46C"];

} else{
  $anexoA46C = 0;

}
$anexoA46D = 0;

$anexoA47A = 0;
$anexoA47B = 0;
if(isset($_GET["anexoA47C"])){
  $anexoA47C = $_GET["anexoA47C"];

} else{
  $anexoA47C = 0;

}
$anexoA47D = 0;

$anexoA48A = 0;
$anexoA48B = 0;
if(isset($_GET["anexoA48C"])){
  $anexoA48C = $_GET["anexoA48C"];

} else{
  $anexoA48C = 0;

}
$anexoA48D = 0;

$anexoA49A = 0;
$anexoA49B = 0;
if(isset($_GET["anexoA49C"])){
  $anexoA49C = $_GET["anexoA49C"];

} else{
  $anexoA49C = 0;

}
$anexoA49D = 0;

$anexoA50A = 0;
$anexoA50B = 0;
if(isset($_GET["anexoA50C"])){
  $anexoA50C = $_GET["anexoA50C"];

} else{
  $anexoA50C = 0;

}
$anexoA50D = 0;

$anexoA51A = 0;
$anexoA51B = 0;
if(isset($_GET["anexoA51C"])){
  $anexoA51C = $_GET["anexoA51C"];

} else{
  $anexoA51C = 0;

}
$anexoA51D = 0; 





$anexoA53A = 0;
$anexoA53B = 0;
if(isset($_GET["anexoA53C"])){
  $anexoA53C = $_GET["anexoA53C"];

} else{
  $anexoA53C = 0;

}
$anexoA53D = 0; 

$anexoA54A = 0;
$anexoA54B = 0;
$anexoA54C = 0;
$anexoA54D = 0; 


$anexoA55A = 0;
$anexoA55B = 0;
$anexoA55C = 0;
$anexoA55D = 0; 

$anexoA56A = 0;
$anexoA56B = 0;
$anexoA56C = 0;
$anexoA56D = 0; 
//******************** IT-1******IT-1************IT-1**********IT-1****************1
$it1_1 = 0;
$it1_2 = 0;
$it1_3 = 0;
$it1_4 = 0;
$it1_5 = 0;
$it1_6 = 0;
$it1_7 = 0;
$it1_8 = 0;
$it1_9 = 0;
$it1_10 = 0;
$it1_11 = 0;

if(isset($_GET["it1_12"])){
  $it1_12 = $_GET["it1_12"];

} else{
  $it1_12 = 0;

}

if(isset($_GET["it1_13"])){
  $it1_13 = $_GET["it1_13"];

} else{
  $it1_13 = 0;

}
if(isset($_GET["it1_14"])){
  $it1_14 = $_GET["it1_14"];

} else{
  $it1_14 = 0;

}

$it1_16 = 0;
$it1_17 = 0;
$it1_18 = 0;
$it1_19 = 0;
$it1_20 = 0;
$it1_21 = 0;
$it1_22 = 0;
$it1_23 = 0;
$it1_24 = 0;
$it1_25 = 0;
$it1_26 = 0;
$it1_27 = 0;
$it1_28 = 0;


if(isset($_GET["it1_29"])){
  $it1_29 = $_GET["it1_29"];

} else{
  $it1_29 = 0;

}


$it1_30 = 0;

if(isset($_GET["it1_31"])){
  $it1_31 = $_GET["it1_31"];

} else{
  $it1_31 = 0;

}
 
$it1_32 = 0; 
$it1_33 = 0; 
$it1_34 = 0; 
if(isset($_GET["it1_35"])){
  $it1_35 = $_GET["it1_35"];

} else{
  $it1_35 = 0;

}   
if(isset($_GET["it1_36"])){
  $it1_36 = $_GET["it1_36"];

} else{
  $it1_36 = 0;

}   
if(isset($_GET["it1_37"])){
  $it1_37 = $_GET["it1_37"];

} else{
  $it1_37 = 0;

}   
$it1_38 = 0;   
$it1_39 = 0;   

if(isset($_GET["it1_40"])){
  $it1_40 = $_GET["it1_40"];

} else{
  $it1_40 = 0;

} 
$it1_41 = 0; 
$it1_43 = 0;
$it1_44 = 0;
$it1_45 = 0;
$it1_46 = 0;
$it1_47 = 0;
$it1_48 = 0;
$it1_49 = 0;

$it1_50 = 0; 
$it1_51 = 0; 
$it1_52 = 0; 
$it1_53 = 0; 
$it1_54 = 0; 
$it1_55 = 0; 
$it1_55 = 0; 
$it1_57 = 0;  
$it1_58 = 0; 
$it1_59 = 0; 
$it1_60 = 0; 

if(isset($_GET["it1_61"])){
  $it1_61 = $_GET["it1_61"];

} else{
  $it1_61 = 0;

}
$it1_62 = 0;

$it1_63 = 0;

if(isset($_GET["it1_64"])){
  $it1_64 = $_GET["it1_64"];

} else{
  $it1_64 = 0;

}

if(isset($_GET["it1_65"])){
  $it1_65 = $_GET["it1_65"];

} else{
  $it1_65 = 0;

} 
if(isset($_GET["it1_66"])){
  $it1_66 = $_GET["it1_66"];

} else{
  $it1_66 = 0;

}  
$it1_67 = 0;
foreach ($anexo607 as $key => $value){
    $diferencia = 0;
//***************************************ANEXO II*************************************//
  if($value["EXTRAER_NCF_607"] == "B01" || $value["EXTRAER_NCF_607"] == "E31"){

      $anexoACant1 = $anexoACant1 + 1; 
      $anexoA1 = $anexoA1 + $value["Monto_Facturado_607"];
      /*******calculo del itbis real con el guardado IT-4******/
      
      $ITBIS = $value["Monto_Facturado_607"] * 0.18;
      $diferencia = ($ITBIS-$value["ITBIS_Facturado_607"]);
      if($diferencia > 0.5){
        
        $it1_4 = $it1_4 + ($diferencia/0.18);

      }

                                                   
  }elseif ($value["EXTRAER_NCF_607"] == "B02" || $value["EXTRAER_NCF_607"] == "E32"){

      $anexoACant2 = $anexoACant2 + 1; 
      $anexoA2 = $anexoA2 + $value["Monto_Facturado_607"];

      /*******calculo del itbis real con el guardado IT-4******/
      
      $ITBIS = $value["Monto_Facturado_607"] * 0.18;
      $diferencia = ($ITBIS-$value["ITBIS_Facturado_607"]);
      if($diferencia > 0.5){
        $it1_4 = $it1_4 + ($diferencia/0.18);

      }
    
  } 
  elseif ($value["EXTRAER_NCF_607"] == "B03" || $value["EXTRAER_NCF_607"] == "E33"){

      $anexoACant3 = $anexoACant3 + 1; 
      $anexoA3 = $anexoA3 + $value["Monto_Facturado_607"];

      /*******calculo del itbis real con el guardado IT-4******/
      
      $ITBIS = $value["Monto_Facturado_607"] * 0.18;
      $diferencia = ($ITBIS-$value["ITBIS_Facturado_607"]);
      if($diferencia > 0.5){
        $it1_4 = $it1_4 + ($diferencia/0.18);

      }
    
  } 
  elseif ($value["EXTRAER_NCF_607"] == "B04" || $value["EXTRAER_NCF_607"] == "E34"){

      $anexoACant4 = $anexoACant4 + 1; 
      $anexoA4 = $anexoA4 + $value["Monto_Facturado_607"];

      /*******calculo del itbis real con el guardado IT-4******/
      $ITBIS = $value["Monto_Facturado_607"] * 0.18;
      $diferencia = ($ITBIS-$value["ITBIS_Facturado_607"]);
      if($diferencia > 0.5){
        $it1_4 = $it1_4 - ($diferencia/0.18);

      }

    
  } 
  elseif ($value["EXTRAER_NCF_607"] == "B12"){

      $anexoACant5 = $anexoACant5 + 1; 
      $anexoA5 = $anexoA5 + $value["Monto_Facturado_607"];

      /*******calculo del itbis real con el guardado IT-4******/
      
      $ITBIS = $value["Monto_Facturado_607"] * 0.18;
      $diferencia = ($ITBIS-$value["ITBIS_Facturado_607"]);
      if($diferencia > 0.5){
        $it1_4 = $it1_4 + ($diferencia/0.18);

      }
    
  } 
  elseif ($value["EXTRAER_NCF_607"] == "B14" || $value["EXTRAER_NCF_607"] == "E44"){

      $anexoACant6 = $anexoACant6 + 1; 
      $anexoA6 = $anexoA6 + $value["Monto_Facturado_607"];
    
  } 
  elseif ($value["EXTRAER_NCF_607"] == "B15" || $value["EXTRAER_NCF_607"] == "E45"){

      $anexoACant7 = $anexoACant7 + 1; 
      $anexoA7 = $anexoA7 + $value["Monto_Facturado_607"];

      /*******calculo del itbis real con el guardado IT-4******/
      
      $ITBIS = $value["Monto_Facturado_607"] * 0.18;
      $diferencia = ($ITBIS-$value["ITBIS_Facturado_607"]);
      if($diferencia > 0.5){
        $it1_4 = $it1_4 + ($diferencia/0.18);

      }
    
    }    
  elseif ($value["EXTRAER_NCF_607"] == "B16" || $value["EXTRAER_NCF_607"] == "E46"){

      $anexoACant8 = $anexoACant8 + 1; 
      $anexoA8 = $anexoA8 + $value["Monto_Facturado_607"];

      /*******calculo del itbis real con el guardado IT-4******/
      
      $ITBIS = $value["Monto_Facturado_607"] * 0.18;
      $diferencia = ($ITBIS-$value["ITBIS_Facturado_607"]);
      if($diferencia > 0.5){
        $it1_4 = $it1_4 + ($diferencia/0.18);

      }
    
  }  

//***************************************ANEXO III.*************************************//
 
  if($value["extraer_forma_de_pago_607"] == "01" && $value["EXTRAER_NCF_607"] != "FP1"){
      
      $total = $value["Monto_Facturado_607"] + 
                $value["ITBIS_Facturado_607"] + 
                $value["Monto_Propina_Legal_607"] + 
                $value["Impuesto_Selectivo_al_Consumo_607"] + 
                $value["Otros_Impuestos_607"];

      $anexoA12 = $anexoA12 + $total;
                                                     
  }elseif ($value["extraer_forma_de_pago_607"] == "02" && $value["EXTRAER_NCF_607"] != "FP1"){
      
      $total = $value["Monto_Facturado_607"] + 
                $value["ITBIS_Facturado_607"] + 
                $value["Monto_Propina_Legal_607"] + 
                $value["Impuesto_Selectivo_al_Consumo_607"] + 
                $value["Otros_Impuestos_607"];
                
     
      $anexoA13 = $anexoA13 + $total;
    
  } 
  elseif ($value["extraer_forma_de_pago_607"] == "03" && $value["EXTRAER_NCF_607"] != "FP1"){
      
      $total = $value["Monto_Facturado_607"] + 
                $value["ITBIS_Facturado_607"] + 
                $value["Monto_Propina_Legal_607"] + 
                $value["Impuesto_Selectivo_al_Consumo_607"] + 
                $value["Otros_Impuestos_607"];
                
      
      $anexoA14 = $anexoA14 + $total;
  } 
  elseif ($value["extraer_forma_de_pago_607"] == "04" && $value["EXTRAER_NCF_607"] != "FP1"){
      
      $total = $value["Monto_Facturado_607"] + 
                $value["ITBIS_Facturado_607"] + 
                $value["Monto_Propina_Legal_607"] + 
                $value["Impuesto_Selectivo_al_Consumo_607"] + 
                $value["Otros_Impuestos_607"];
                
      
      $anexoA15 = $anexoA15 + $total;
    
    } 
  elseif ($value["extraer_forma_de_pago_607"] == "05" && $value["EXTRAER_NCF_607"] != "FP1"){
      
      $total = $value["Monto_Facturado_607"] + 
                $value["ITBIS_Facturado_607"] + 
                $value["Monto_Propina_Legal_607"] + 
                $value["Impuesto_Selectivo_al_Consumo_607"] + 
                $value["Otros_Impuestos_607"];
                
      
      $anexoA16 = $anexoA16 + $total;
    
    } 
  elseif ($value["extraer_forma_de_pago_607"] == "06" && $value["EXTRAER_NCF_607"] != "FP1"){
      
      $total = $value["Monto_Facturado_607"] + 
                $value["ITBIS_Facturado_607"] + 
                $value["Monto_Propina_Legal_607"] + 
                $value["Impuesto_Selectivo_al_Consumo_607"] + 
                $value["Otros_Impuestos_607"];
                
      
      $anexoA17 = $anexoA17 + $total;
    
    } 
  elseif ($value["extraer_forma_de_pago_607"] == "07" && $value["EXTRAER_NCF_607"] != "FP1"){
      
      
  } 

//***************************************ANEXO IV.*************************************//   
     
 if($value["Tipo_de_Ingreso_607"] == "1" && $value["EXTRAER_NCF_607"] != "FP1" && $value["EXTRAER_NCF_607"] != "B04" && $value["EXTRAER_NCF_607"] != "E34"){

      $anexoA20 = $anexoA20 + $value["Monto_Facturado_607"];
                                                     
  }
  elseif ($value["Tipo_de_Ingreso_607"] == "2" && $value["EXTRAER_NCF_607"] != "FP1" && $value["EXTRAER_NCF_607"] != "B04" && $value["EXTRAER_NCF_607"] != "E34"){
      
      $anexoA21 = $anexoA21 + $value["Monto_Facturado_607"];
    
  } 
  elseif ($value["Tipo_de_Ingreso_607"] == "3"  && $value["EXTRAER_NCF_607"] != "FP1" && $value["EXTRAER_NCF_607"] != "B04" && $value["EXTRAER_NCF_607"] != "E34"){
      
     $anexoA22 = $anexoA22 + $value["Monto_Facturado_607"];
  } 
  elseif ($value["Tipo_de_Ingreso_607"] == "4" && $value["EXTRAER_NCF_607"] != "FP1" && $value["EXTRAER_NCF_607"] != "B04" && $value["EXTRAER_NCF_607"] != "E34"){
      
      $anexoA23 = $anexoA23 + $value["Monto_Facturado_607"];
    
    } 
  elseif ($value["Tipo_de_Ingreso_607"] == "5" && $value["EXTRAER_NCF_607"] != "FP1" && $value["EXTRAER_NCF_607"] != "B04" && $value["EXTRAER_NCF_607"] != "E34"){
      
      $anexoA24 = $anexoA24 + $value["Monto_Facturado_607"];
    
    } 
  elseif ($value["Tipo_de_Ingreso_607"] == "6" && $value["EXTRAER_NCF_607"] != "FP1" && $value["EXTRAER_NCF_607"] != "B04" && $value["EXTRAER_NCF_607"] != "E34"){
      
      $anexoA25 = $anexoA25 + $value["Monto_Facturado_607"];
    
    } 
  
                      
                      
}//cierre for anexo607

//*************************ANEXO V. PAGOS COMPUTABLES POR RETENCIONES/PERCEPCIÓN)************//
foreach ($retenciones607  as $key => $value) {
  if($value["EXTRAER_NCF_607"] != "FP1"){ 
          $anexoA29 = $anexoA29 + $value["ITBIS_Retenido_Tercero_607"]; 
  }
                   

}

foreach ($anexo606 as $key => $value){
//*************************ANEXO IX. A) NO DEDUCIBLE (Llevado al Costo/Gasto)************//
if($value["ITBIS_alcosto_606"] > 0.00 && $value["Extraer_NCF_606"] != "CP1"){

     
      $anexoA47A = $anexoA47A + $value["ITBIS_Compras_606"];
      $anexoA47B = $anexoA47B + $value["ITBIS_Servicios_606"];
                                                     
  }





//*************************ANEXO IX. B) DEDUCIBLE*************************************//
  if($value["Extraer_Tipo_Gasto_606"] == "09" && $value["ITBIS_alcosto_606"] == 0.00 && $value["Extraer_NCF_606"] != "CP1"){

     
      $anexoA50A = $anexoA50A + $value["ITBIS_Compras_606"];
      $anexoA50B = $anexoA50B + $value["ITBIS_Servicios_606"];
                                                     
  }elseif ($value["Extraer_Tipo_Gasto_606"] != "09" && $value["ITBIS_alcosto_606"] == 0.00 && $value["Extraer_NCF_606"] != "CP1"){

      

      $anexoA51A = $anexoA51A + $value["ITBIS_Compras_606"];
      $anexoA51B = $anexoA51B + $value["ITBIS_Servicios_606"];


 }

 //*********************ANEXO IX. C) ITBIS SUJETO A PROPORCIONALIDAD (Art. 349 de Código Tributario)************//
if($value["ITBIS_Proporcional_606"] > 0.00 && $value["Extraer_NCF_606"] != "CP1"){

     
      $anexoA53A = $anexoA53A + $value["ITBIS_Compras_606"];
      $anexoA53B = $anexoA53B + $value["ITBIS_Servicios_606"];
                                                     
  }


}//cierre for anexo606

//*********************IT-1 A. ITBIS RETENIDO / ITBIS PERCIBIDO************//

foreach ($retenciones606  as $key => $value) {

  if($value["Tipo_Id_Factura_606"] == "2" && $value["ITBIS_Factura_606"] > 0 && $value["Extraer_NCF_606"] != "CP1"){

    $it1_39 = $it1_39 + $value["Total_Monto_Factura_606"];

  }  

  if($value["Tipo_Id_Factura_606"] == "1" && $value["Porc_ITBIS_Retenido_606"] == 30 && $value["Extraer_NCF_606"] != "CP1"){

    $it1_43 = $it1_43 + $value["Total_Monto_Factura_606"];
    $it1_52 = $it1_52 + $value["ITBIS_Factura_606"];


  }  elseif ($value["Tipo_Id_Factura_606"] == "1" && $value["Porc_ITBIS_Retenido_606"] == 100 && $value["Extraer_NCF_606"] != "CP1") {

    $it1_44 = $it1_44 + $value["Total_Monto_Factura_606"];


  }  

}
$anexoACant11 = $anexoACant1 + 
                $anexoACant2 + 
                $anexoACant3 + 
                $anexoACant4 + 
                $anexoACant5 + 
                $anexoACant6 + 
                $anexoACant7 + 
                $anexoACant8; 

$anexoA11 = $anexoA1 + 
            $anexoA2 +
            $anexoA3 - 
            $anexoA4 +
            $anexoA5 + 
            $anexoA6 +
            $anexoA7 + 
            $anexoA8;



$anexoA19 = $anexoA12 + 
            $anexoA13 +
            $anexoA14 + 
            $anexoA15 +
            $anexoA16 + 
            $anexoA17 +
            $anexoA18; 

$anexoA20 = $anexoA20 - 
            $anexoA21 -
            $anexoA22 - 
            $anexoA23 -
            $anexoA24 - 
            $anexoA25; 

$anexoA26 = $anexoA20 + 
            $anexoA21 +
            $anexoA22 + 
            $anexoA23 +
            $anexoA24 + 
            $anexoA25; 

$anexoA33 = $anexoA27+ 
            $anexoA28 + 
            $anexoA29 + 
            $anexoA30 + 
            $anexoA31 + 
            $anexoA32; 

$anexoA45D = $anexoA45A + 
            $anexoA45B +
            $anexoA45C;                                 
$anexoA46D = $anexoA46A + 
            $anexoA46B +
            $anexoA46C; 
$anexoA47D = $anexoA47A + 
            $anexoA47B +
            $anexoA47C;  

$anexoA48A = $anexoA45A + 
            $anexoA46A +
            $anexoA47A; 

$anexoA48B = $anexoA45B + 
            $anexoA46B +
            $anexoA47B; 
$anexoA48C = $anexoA45C + 
            $anexoA46C +
            $anexoA47C; 

$anexoA52A = $anexoA49A + 
            $anexoA50A +
            $anexoA51A;

$anexoA52B = $anexoA49B + 
            $anexoA50B +
            $anexoA51B; 
$anexoA52C = $anexoA49C + 
            $anexoA50C +
            $anexoA51C;  


$anexoA48D = $anexoA48A + 
            $anexoA48B +
            $anexoA48C;   

$anexoA50D = $anexoA50A + 
            $anexoA50B +
            $anexoA50C;  

$anexoA51D = $anexoA51A + 
            $anexoA51B +
            $anexoA51C; 

$anexoA52D = $anexoA52A + 
            $anexoA52B +
            $anexoA52C;  

$anexoA55A = $anexoA53A * $anexoA54A;

$anexoA55B = $anexoA53B * $anexoA54B;

$anexoA55C = $anexoA53C * $anexoA54C;

$anexoA55D = $anexoA55A + 
            $anexoA55B +
            $anexoA55C;  


$anexoA56D = $anexoA56A + 
            $anexoA56B +
            $anexoA56C;            

$anexoA56A = $anexoA52A + $anexoA55A;

$anexoA56B = $anexoA52B + $anexoA55B;

$anexoA56C = $anexoA52C + $anexoA55C;


$anexoA56D = $anexoA56A + 
            $anexoA56B +
            $anexoA56C;
//****************** IT1  IT1  IT1  IT1  IT1 * ************//  

$it1_1 = $anexoA11;
$it1_5 =$anexoA6;

$it1_9 = $it1_2 +
         $it1_3 +
         $it1_4 +
         $it1_5 +
         $it1_6 +
         $it1_7 +
         $it1_8;

$it1_10 = $it1_1 - $it1_9;

$it1_15 = $anexoA24;

$it1_11 = $it1_10 - 
          $it1_11 -
          $it1_12 -
          $it1_13 -
          $it1_14 -
          $it1_15;

$it1_16 = $it1_11 * 0.18;
$it1_17 = $it1_12 * 0.16;
$it1_18 = $it1_13 * 0.09;
$it1_19 = $it1_14 * 0.08;

$it1_20 = $it1_15 * 0.18;

$it1_21 = $it1_16 +
         $it1_17 +
         $it1_18 +
         $it1_19 +
         $it1_20;


$it1_22 = $anexoA56A;
$it1_23 = $anexoA56B;
$it1_24 = $anexoA56C;

$it1_25 = $it1_22 +
         $it1_23 +
         $it1_24;

$it1_26 = $it1_21 - $it1_25;

if($it1_26 > 0){
  $it1_26 = $it1_21 - $it1_25;
  $it1_27 = 0;

}else{
  $it1_26 = 0;
  $it1_27 = $it1_21 - $it1_25;
}

$it1_30 = $anexoA33;

$it1_33 = $it1_26 -
         $it1_28 -
         $it1_29 -
         $it1_30 -
         $it1_31 -
         $it1_32;

if($it1_33 > 0){
  $it1_33 = $it1_26 -
         $it1_28 -
         $it1_29 -
         $it1_30 -
         $it1_31 -
         $it1_32;
  $it1_34 = 0;

}else{
  $it1_33 = 0;
  if($it1_26 > 0){

    $it1_34 = $it1_26 -
         $it1_28 -
         $it1_29 -
         $it1_30 -
         $it1_31 -
         $it1_32;
    $it1_34 = $it1_34 * -1;
 }else{
  $it1_34 = $it1_27 +
         $it1_28 +
         $it1_29 +
         $it1_30 +
         $it1_31 +
         $it1_32;

 }
  
}

$it1_38 = $it1_33 + $it1_35 + $it1_36 + $it1_37;

$it1_41 = $it1_39 + $it1_40;

$it1_50 = $it1_41 * 0.18;

$it1_52 = $it1_52 * 0.30;

$it1_53 = $it1_44 * 0.18;


$it1_55 = $it1_53 + $it1_54;

$it1_60 = $it1_50 + $it1_51 + $it1_52 + $it1_55 + $it1_58 + $it1_59;



$it1_62 =$it1_60 - $it1_61;

if($it1_62 > 0){

    $it1_62 = $it1_60 - $it1_61;
         
    $it1_62 = $it1_62;
    $it1_63 = 0;
 }else{
  $it1_63 = $it1_60 - $it1_61;
         
    $it1_63 = $it1_62 * -1;
    $it1_62 = 0;

 }

$it1_67 = $it1_62 + $it1_64 + $it1_65 + $it1_66;

$it1_68 = $it1_38 + $it1_67;

}//if fechadeclaracionIT1

?>

 <div class="form-group col-xs-12" style="background-color: #EBECED">

                   

                <h3 style="text-align: center;"><b>DECLARACIÓN JURADA Y/O PAGO DEL IMPUESTO SOBRE LAS TRANSFERENCIAS DE BIENES INDUSTRIALIZADOS Y SERVICIOS (ITBIS)</b></h3>

                 <h2 style="text-align: center;"><b> Anexo A</b></h2>

                 
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
                      <input type="text" class="form-control" id="FechaDeclaracionIT1" name="FechaDeclaracionIT1" value="<?php echo $FechaDeclaracionIT1;?>">
                    
                        
                    </div>
                   

                    </div>

<!--======= PARTE II==============================================================-->

<div class="form-group">

     
<table class="table table-bordered table-striped dt-responsive"  width="100%">      
  <thead>
      <tr>
        <th style="width: 15px; background: #96be25; font-weight: bold;">II.</th>
        <th style="width: 1300px; background: #96be25; font-weight: bold;">OPERACIONES REPORTADAS EN EL 607, LIBRO DE VENTAS Y FACTURA ELECTRONICA (E-NCF) POR TIPO DE NCF</th>
        <th style="width: 350px;background: #96be25; font-weight: bold;">CANTIDAD</th>
        <th style="width: 10px;background: #96be25;"></th>
        <th style="width: 350px; background: #96be25; font-weight: bold;">MONTO</th>
               
      </tr>
  </thead>

  <tbody>
      <tr>
        <td>1</td>
        <td>COMPROBANTES VÁLIDO PARA CRÉDITO FISCAL (01 y 31)</td>
        <td><?php echo number_format($anexoACant1)?></td>
        <td>+</td>
        <td><?php echo number_format($anexoA1, 2)?></td>

      </tr>
      <tr>
        <td>2</td>
        <td>COMPROBANTES CONSUMO (02 y 32)</td>
        <td><?php echo number_format($anexoACant2)?></td>
        <td>+</td>
        <td><?php echo number_format($anexoA2, 2)?></td>


      </tr>
      <tr>
        <td>3</td>
        <td>COMPROBANTES NOTA DE DÉBITO (03 y 33)</td>
        <td><?php echo number_format($anexoACant3)?></td>
        <td>+</td>
        <td><?php echo number_format($anexoA3, 2)?></td>

      </tr>
      <tr>
        <td>4</td>
        <td>COMPROBANTES NOTA DE CRÉDITO (04 y 34)</td>
        <td><?php echo number_format($anexoACant4)?></td>
        <td>-</td>
        <td><?php echo number_format($anexoA4, 2)?></td>


      </tr>
      <tr>
        <td>5</td>
        <td>COMPROBANTES REGISTRO ÚNICO DE INGRESOS (12)</td>
        <td><?php echo number_format($anexoACant5)?></td>
        <td>+</td>
        <td><?php echo number_format($anexoA5, 2)?></td>


      </tr>
      <tr>
        <td>6</td>
        <td>COMPROBANTES REGISTRO REGIMENES ESPECIALES (14 y 44)</td>
        <td><?php echo number_format($anexoACant6)?></td>
        <td>+</td>
        <td><?php echo number_format($anexoA6, 2)?></td>

      </tr>
      <tr>
        <td>7</td>
        <td>COMPROBANTES GUBERNAMENTALES (15 y 45)</td>
        <td><?php echo number_format($anexoACant7)?></td>
        <td>+</td>
        <td><?php echo number_format($anexoA7, 2)?></td>

      </tr>
      <tr>
        <td>8</td>
        <td>COMPROBANTES PARA EXPORTACIONES (16 y 46)</td>
        <td><?php echo number_format($anexoACant8)?></td>
        <td>+</td>
        <td><?php echo number_format($anexoA8, 2)?></td>
      </tr>
      <tr>
        <td>9</td>
        <td>OTRAS OPERACIONES (POSITIVAS)</td>
        <td></td>
        <td>+</td>
        <td></td>

      </tr>
      <tr>
        <td>10</td>
        <td>OTRAS OPERACIONES (NEGATIVAS)</td>
        <td></td>
        <td>-</td>
        <td></td>

      </tr>
      <tr>
        <td style="font-weight: bold;">11</td>
        <td style="font-weight: bold;">TOTAL OPERACIONES (Sumar casillas 1+2+3-4+5+6+7+8+9-10)</td>
        <td style="font-weight: bold;"><?php echo number_format($anexoACant11)?></td>
        <td style="font-weight: bold;">=</td>
        <td style="font-weight: bold;"><?php echo number_format($anexoA11, 2)?></td>

      </tr>
  </tbody>
  </table>
        
</div>

 <!--======= FIN PARTE II==============================================================-->
                     
 
<!--======= PARTE III===================================================================-->

<div class="form-group">

     
<table class="table table-bordered table-striped dt-responsive"  width="100%">      
  <thead>
      <tr>
        <th style="width: 15px; background: #96be25;">III.</th>
        <th style="width: 1650px; background: #96be25;">OPERACIONES REPORTADAS EN EL 607/LIBRO DE VENTAS Y FACTURA ELECTRONICA (E-NCF) POR TIPO DE VENTA (MONTO TOTAL INCLUYENDO IMPUESTOS)</th>
        <th style="width: 10px;background: #96be25;"></th>
        <th style="width: 350px; background: #96be25;">MONTO BRUTO</th>
               
      </tr>
  </thead>

  <tbody>
      <tr>
        <td>12</td>
        <td>EFECTIVO</td>
        <td>+</td>
        <td><?php echo number_format($anexoA12, 2)?></td>

      </tr>
      <tr>
        <td>13</td>
        <td>CHEQUE / TRANSFERENCIA</td>
        <td>+</td>
        <td><?php echo number_format($anexoA13, 2)?></td>
      </tr>
      <tr>
        <td>14</td>
        <td>TARJETA DÉBITO / CRÉDITO</td>
        <td>+</td>
        <td><?php echo number_format($anexoA14, 2)?></td>
      </tr>
      <tr>
        <td>15</td>
        <td>A CRÉDITO</td>
        <td>+</td>
       <td><?php echo number_format($anexoA15, 2)?></td>

      </tr>
      <tr>
        <td>16</td>
        <td>BONOS O CERTIFICADO DE REGALO</td>
        <td>+</td>
        <td><?php echo number_format($anexoA16, 2)?></td>

      </tr>
      <tr>
        <td>17</td>
        <td>PERMUTAS</td>
        <td>+</td>
        <td><?php echo number_format($anexoA17, 2)?></td>

      </tr>
      <tr>
        <td>18</td>
        <td>OTRAS FORMAS DE VENTA</td>
        <td>+</td>
        <td><?php echo number_format($anexoA18, 2)?></td>

      </tr>
      <tr>
        <td style="font-weight: bold;">19</td>
        <td style="font-weight: bold;">TOTAL OPERACIONES POR TIPO DE VENTA (Sumar casillas 12+13+14+15+16+17+18)</td>
        <td style="font-weight: bold;">=</td>
        <td style="font-weight: bold;"><?php echo number_format($anexoA19, 2)?></td>

      </tr>
      
     
     
  </tbody>
  </table>
        
</div>

 <!--======= FIN PARTE III==========================================================-->
                     
 <!--======= PARTE IV===================================================================-->

<div class="form-group">

     
<table class="table table-bordered table-striped dt-responsive"  width="100%">      
  <thead>
      <tr>
        <th style="width: 15px; background: #96be25;">IV.</th>
        <th style="width: 1650px; background: #96be25;">OPERACIONES REPORTADAS EN EL 607/LIBRO DE VENTAS Y FACTURA ELECTRONICA (E-NCF) POR TIPO DE INGRESO</th>
        <th style="width: 10px;background: #96be25;"></th>
        <th style="width: 350px; background: #96be25;">MONTO</th>
               
      </tr>
  </thead>

  <tbody>
      <tr>
        <td>20</td>
        <td>INGRESOS POR OPERACIONES (NO FINANCIEROS)</td>
        <td>+</td>
        <td><?php echo number_format($anexoA20, 2)?></td>

      </tr>
      <tr>
        <td>21</td>
        <td>INGRESOS FINANCIEROS</td>
        <td>+</td>
        <td>
          <div class="col-xs-10">
            <input type="text" class=" form-control" id="anexoA21" name="anexoA21" value="<?php echo $anexoA21;?>" required>
          </div>
          <div class="col-xs-2">
            <button class="pull-right btn btn-primary btn-xs btnanexoA21">+</button>
          </div>
        </td>

      </tr>
      <tr>
        <td>22</td>
        <td>INGRESOS EXTRAORDINARIOS</td>
        <td>+</td>
        <td>
          <div class="col-xs-10">
          <input type="text" class="form-control" id="anexoA22" name="anexoA22" value="<?php echo $anexoA22;?>" required>
          </div>
          <div class="col-xs-2">
          <button class="pull-right btn btn-primary btn-xs btnanexoA22">+</button>
          </div>
        </td>
      </tr>
      <tr>
        <td>23</td>
        <td>INGRESOS POR ARRENDAMIENTOS</td>
        <td>+</td>
        <td>
          <div class="col-xs-10">
          <input type="text" class="form-control" id="anexoA23" name="anexoA23" value="<?php echo $anexoA23;?>" required>
          </div>
          <div class="col-xs-2">
          <button class="pull-right btn btn-primary btn-xs btnanexoA23">+</button>
        </div>
        </td>
      </tr>
      <tr>
        <td>24</td>
        <td>INGRESOS POR VENTAS DE ACTIVOS DEPRECIABLES</td>
        <td>+</td>
        <td>
          <div class="col-xs-10">
          <input type="text" class="form-control" id="anexoA24" name="anexoA24" value="<?php echo $anexoA24;?>" required>
          </div>
          <div class="col-xs-2">
          <button class="pull-right btn btn-primary btn-xs btnanexoA24">+</button>
          </div>
        </td>
      </tr>
      <tr>
        <td>25</td>
        <td>OTROS INGRESOS</td>
        <td>+</td>
        <td>
          <div class="col-xs-10">
          <input type="text" class="form-control" id="anexoA25" name="anexoA25" value="<?php echo $anexoA25;?>" required>
          </div>
          <div class="col-xs-2">
          <button class="pull-right btn btn-primary btn-xs btnanexoA25">+</button>
          </div>
        </td>
      </tr>
      <tr>
        <td style="font-weight: bold;">26</td>
        <td style="font-weight: bold;">TOTAL POR TIPO DE INGRESO (Sumar casillas 20+21+22+23+24+25)</td>
        <td style="font-weight: bold;">=</td>
        <td style="font-weight: bold;"><?php echo number_format($anexoA26, 2)?></td>

      </tr>
     
     
     
  </tbody>
  </table>
        
</div>

 <!--======= FIN PARTE IV==========================================================-->
 <!--======= PARTE V==============================================================-->
<div class="form-group">

     
<table class="table table-bordered table-striped dt-responsive"  width="100%">      
  <thead>
      <tr>
        <th style="width: 15px; background: #96be25;">V.</th>
        <th style="width: 1650px; background: #96be25;">PAGOS COMPUTABLES POR RETENCIONES/PERCEPCIÓN </th>
        <th style="width: 10px;background: #96be25;"></th>
        <th style="width: 350px; background: #96be25;">MONTO</th>
               
      </tr>
  </thead>

  <tbody>
      <tr>
        <td>27</td>
        <td>PAGOS COMPUTABLES POR RETENCIONES (Norma No. 08-04)</td>
        <td>+</td>
        <td>
          <div class="col-xs-10">
          <input type="text" class="form-control" id="anexoA27" name="anexoA27" value="<?php echo $anexoA27;?>" required>
          </div>
          <div class="col-xs-2">
          <button class="pull-right btn btn-primary btn-xs btnanexoA27">+</button>
          </div>
        </td>

      </tr>
      <tr>
        <td>28</td>
        <td>PAGOS COMPUTABLES POR VENTAS DE PASAJES DE TRANSPORTE AÉREO (Norma No. 02-05) (BSP-IATA)</td>
        <td>+</td>
        <td></td>

      </tr>
      <tr>
        <td>29</td>
        <td>PAGOS COMPUTABLES POR OTRAS RETENCIONES (Norma No. 02-05)</td>
        <td>+</td>
        <td><?php echo number_format($anexoA29, 2)?></td>

      </tr>
      <tr>
        <td>30</td>
        <td>PAGOS COMPUTABLES POR VENTAS DE PAQUETES DE ALOJAMIENTO Y OCUPACIÓN</td>
        <td>+</td>
        <td></td>

      </tr>
      <tr>
        <td>31</td>
        <td>CRÉDITO POR RETENCIÓN REALIZADA POR ENTIDADES DEL ESTADO</td>
        <td>+</td>
        <td></td>

      </tr>
      <tr>
        <td>32</td>
        <td>PAGOS COMPUTABLES POR ITBIS PERCIBIDO</td>
        <td>+</td>
        <td></td>

      </tr>
      <tr>
        <td style="font-weight: bold;">33</td>
        <td style="font-weight: bold;">TOTAL PAGOS COMPUTABLES POR RETENCIONES/PERCEPCIÓN (Sumar casillas 27+28+29+30+31+32)</td>
        <td style="font-weight: bold;">=</td>
         <td style="font-weight: bold;"><?php echo number_format($anexoA33, 2)?></td>


      </tr>
     
     
     
  </tbody>
  </table>
        
</div>

 <!--======= FIN PARTE V==============================================================-->
                                         
<!--======= PARTE VI==============================================================-->

<div class="form-group">

     
<table class="table table-bordered table-striped dt-responsive"  width="100%">      
  <thead>
      <tr>
        <th style="width: 15px; background: #96be25;">VI.</th>
        <th style="width: 1300px; background: #96be25;">OPERACIONES DE CONSTRUCTORAS</th>
        <th style="width: 10px;background: #96be25;"></th>
        <th style="width: 350px;background: #96be25;">TOTAL FACTURADO</th>
        <th style="width: 10px;background: #96be25;"></th>
        <th style="width: 350px; background: #96be25;">MONTO</th>
               
      </tr>
  </thead>

  <tbody>
      <tr>
        <td>34</td>
        <td>DIRECCIÓN TÉCNICA (Art. 4 Norma 07-07)</td>
        <td>+</td>
        <td></td>
        <td>+</td>
        <td></td>

      </tr>
      
      <tr>
        <td>35</td>
        <td>CONTRATO DE ADMINISTRACIÓN (Art. 4 Párrafo I, Norma 07-07)</td>
        <td>+</td>
        <td></td>
        <td>+</td>
        <td></td>

      </tr>
      <tr>
        <td>36</td>
        <td>ASESORIAS / HONORARIOS</td>
        <td></td>
        <td></td>
        <td>+</td>
        <td></td>

      </tr>
      <tr>
        <td style="font-weight: bold;">37</td>
        <td style="font-weight: bold;">TOTAL OPERACIONES CONSTRUCTORAS (Total Facturado: Sumar casillas 34+35, Monto: Sumar casillas 34+35+36)</td>
        <td style="font-weight: bold;">=</td>
        <td style="font-weight: bold;"></td>
        <td style="font-weight: bold;">=</td>
        <td style="font-weight: bold;"></td>

      </tr>
      <tr>
        <td style="font-weight: bold;">38</td>
        <td style="font-weight: bold;">OPERACIONES NO SUJETAS A ITBIS POR SERVICIOS DE CONSTRUCCIÓN (Restar Casilla 37 Total Facturado - Monto Sujeto a ITBIS</td>
        <td style="font-weight: bold;"></td>
        <td style="font-weight: bold;"></td>
        <td style="font-weight: bold;">=</td>
        <td style="font-weight: bold;"></td>

      </tr>
  </tbody>
  </table>
        
</div>

 <!--======= FIN PARTE VI==============================================================-->
                     
                                          
<!--======= PARTE VII==============================================================-->

<div class="form-group">

     
<table class="table table-bordered table-striped dt-responsive"  width="100%">      
  <thead>
      <tr>
        <th style="width: 15px; background: #96be25;">VII.</th>
        <th style="width: 1300px; background: #96be25;">OPERACIONES DE COMISIONISTAS</th>
        <th style="width: 10px;background: #96be25;"></th>
        <th style="width: 350px;background: #96be25;">TOTAL FACTURADO</th>
        <th style="width: 10px;background: #96be25;"></th>
        <th style="width: 350px; background: #96be25;">MONTO</th>
               
      </tr>
  </thead>

  <tbody>
      <tr>
        <td>39</td>
        <td>VENTAS DE BIENES POR COMISIÓN</td>
        <td>+</td>
        <td></td>
        <td>+</td>
        <td></td>

      </tr>
      <tr>
        <td>40</td>
        <td>VENTAS DE SERVICIOS EN NOMBRE DE TERCEROS</td>
        <td>+</td>
        <td></td>
        <td>+</td>
        <td></td>

      </tr>
      
      <tr>
        <td style="font-weight: bold;">41</td>
        <td style="font-weight: bold;">TOTAL OPERACIONES COMISIONISTAS (Sumar casillas 39+40)</td>
        <td style="font-weight: bold;">=</td>
        <td style="font-weight: bold;"></td>
        <td style="font-weight: bold;">=</td>
        <td style="font-weight: bold;"></td>

      </tr>
      
      
      <tr>
        <td style="font-weight: bold;">42</td>
        <td style="font-weight: bold;">OPERACIONES NO SUJETAS A ITBIS POR COMISIONES (Restar Casilla 41 Total Facturado - Monto Sujeto a ITBIS)</td>
        <td style="font-weight: bold;"></td>
        <td style="font-weight: bold;"></td>
        <td style="font-weight: bold;">=</td>
        <td style="font-weight: bold;"></td>

      </tr>
  </tbody>
  </table>
        
</div>

 <!--======= FIN PARTE VII==============================================================-->
                     
                                                               
 <!--======= PARTE VIII==============================================================-->

<div class="form-group">

     
<table class="table table-bordered table-striped dt-responsive"  width="100%">      
  <thead>
      <tr>
        <th style="width: 15px; background: #96be25;">VIII.</th>
        <th style="width: 1650px; background: #96be25;">DATOS INFORMATIVOS</th>
        <th style="width: 10px;background: #96be25;"></th>
        <th style="width: 350px; background: #96be25;">MONTO</th>
               
      </tr>
  </thead>

  <tbody>
      <tr>
        <td>43</td>
        <td>TOTAL NOTAS DE CRÉDITO EMITIDAS CON MÁS DE TREINTA (30) DÍAS DESDE LA FACTURACIÓN (Art. 338 CT)</td>
        <td>=</td>
        <td></td>

      </tr>
      <tr>
        <td>44</td>
        <td>TOTAL FACTURAS EN COMPROBANTES FISCALES PARA REGIMENES ESPECIALES (Proviene del Formato 606)</td>
        <td>=</td>
        <td></td>

      </tr>
     
  </tbody>
  </table>
        
</div>

 <!--======= FIN PARTE VIII==============================================================-->
                       
<!--======= PARTE IX==============================================================-->

<div class="form-group">

     
<table class="table table-bordered table-striped dt-responsive"  width="100%">      
  <thead>
      <tr>
        <th style="width: 15px; background: #96be25;">IX.</th>
        <th style="width: 700px; background: #96be25;">ITBIS PAGADO</th>
        <th style="width: 325px;background: #96be25;">A.</th>
        <th style="width: 325px;background: #96be25;">B.</th>
        <th style="width: 325px; background: #96be25;">C.</th>
        <th style="width: 325px; background: #96be25;">D.</th>
               
      </tr>
  </thead>

  <tbody>

    <tr>
        <td style="width: 15px; background: #96be25;">A)</td>
        <td style="width: 700px; background: #96be25;">NO DEDUCIBLE (Llevado al Costo/Gasto)</td>
        <td style="width: 325px;background: #96be25;">COMPRAS LOCALES *</td>
        <td style="width: 325px;background: #96be25;">SERVICIOS *</td>
        <td style="width: 325px; background: #96be25;">IMPORTACIONES</td>
        <td style="width: 325px; background: #96be25;">TOTAL</td>
               
      </tr>

      <tr>
        <td>45</td>
        <td>EN OPERACIONES DE PRODUCTORES DE BIENES O SERVICIOS EXENTOS</td>
        <td><?php echo number_format($anexoA45A, 2)?></td>
        <td><?php echo number_format($anexoA45B, 2)?></td>
        <td>
          <div class="col-xs-10"> 
          <input type="text" class="form-control" id="anexoA45C" name="anexoA45C" value="<?php echo $anexoA45C;?>" required>
          </div>
          <div class="col-xs-2"> 
          <button class="pull-right btn btn-primary btn-xs btnanexoA45C">+</button>
          </div>
        </td>
        <td><?php echo number_format($anexoA45D, 2)?></td>
               
      </tr>
      <tr>
        <td>46</td>
        <td>A INCLUIR EN ACTIVOS (CATEGORÍA I)</td>
        <td><?php echo number_format($anexoA46A, 2)?></td>
        <td><?php echo number_format($anexoA46B, 2)?></td>
        <td>
          <div class="col-xs-10"> 
          <input type="text" class="form-control" id="anexoA46C" name="anexoA46C" value="<?php echo $anexoA46C;?>" required>
          </div>
          <div class="col-xs-2">
          <button class="pull-right btn btn-primary btn-xs btnanexoA46C">+</button>
          </div>        
        </td>
        <td><?php echo number_format($anexoA46D, 2)?></td>
               
      </tr>
     <tr>
        <td>47</td>
        <td>OTROS ITBIS PAGADOS NO DEDUCIBLES</td>
        <td><?php echo number_format($anexoA47A, 2)?></td>
        <td><?php echo number_format($anexoA47B, 2)?></td>
        <td>
          <div class="col-xs-10">

          <input type="text" class="form-control" id="anexoA47C" name="anexoA47C" value="<?php echo $anexoA47C;?>" required>
          </div>
            <div class="col-xs-2">
          <button class="pull-right btn btn-primary btn-xs btnanexoA47C">+</button>
          </div>
        </td>
        <td><?php echo number_format($anexoA47D, 2)?></td>
               
      </tr>
      <tr>
        <td style="font-weight: bold;">48</td>
        <td style="font-weight: bold;">TOTAL ITBIS NO DEDUCIBLE (45+46+47)</td>
        <td style="font-weight: bold;"><?php echo number_format($anexoA48A, 2)?></td>
        <td style="font-weight: bold;"><?php echo number_format($anexoA48B, 2)?></td>
        <td style="font-weight: bold;">
           <div class="col-xs-10"> 
            <input type="text" class="form-control" id="anexoA48C" name="anexoA48C" value="<?php echo $anexoA48C;?>" required>
          </div>
          <div class="col-xs-2">
          <button class="pull-right btn btn-primary btn-xs btnanexoA48C">+</button>
          </div>
        </td>
        <td style="font-weight: bold;"> <?php echo number_format($anexoA48D, 2)?></td>
               
      </tr>

      <tr>
        <td style="width: 15px; background: #96be25;">B)</td>
        <td style="width: 700px; background: #96be25;">DEDUCIBLE</td>
        <td style="width: 325px;background: #96be25;"></td>
        <td style="width: 325px;background: #96be25;"></td>
        <td style="width: 325px; background: #96be25;"></td>
        <td style="width: 325px; background: #96be25;"></td>
               
      </tr>
      <tr>
        <td>49</td>
        <td>EN LA PRODUCCIÓN Y/O VENTA DE BIENES EXPORTADOS</td>
        <td><?php echo number_format($anexoA49A, 2)?></td>
        <td><?php echo number_format($anexoA49B, 2)?></td>
        <td>
          <div class="col-xs-10">
          <input type="text" class="form-control" id="anexoA49C" name="anexoA49C" value="<?php echo $anexoA49C;?>" required>
          </div>
          <div class="col-xs-2">
          <button class="pull-right btn btn-primary btn-xs btnanexoA49C">+</button>
          </div>
        </td>
        <td><?php echo number_format($anexoA49D, 2)?></td>
               
      </tr>
      <tr>
        <td>50</td>
        <td>EN LA PRODUCCIÓN Y/O VENTA DE BIENES GRAVADOS</td>
        <td><?php echo number_format($anexoA50A, 2)?></td>
        <td><?php echo number_format($anexoA50B, 2)?></td>
        <td>
        <div class="col-xs-10">
          <input type="text" class="form-control" id="anexoA50C" name="anexoA50C" value="<?php echo $anexoA50C;?>" required>
         </div>
         <div class="col-xs-2">
          <button class="pull-right btn btn-primary btn-xs btnanexoA50C">+</button>
          </div>
        </td>
        <td><?php echo number_format($anexoA50D, 2)?></td>
               
      </tr>
      <tr>
        <td>51</td>
        <td>EN LA PRESTACIÓN DE SERVICIOS GRAVADOS</td>
        <td><?php echo number_format($anexoA51A, 2)?></td>
        <td><?php echo number_format($anexoA51B, 2)?></td>
        <td>
           <div class="col-xs-10"> 
          <input type="text" class="form-control" id="anexoA51C" name="anexoA51C" value="<?php echo $anexoA51C;?>" required>
          </div>

          <div class="col-xs-2">
          <button class="pull-right btn btn-primary btn-xs btnanexoA51C">+</button>
          </div>
        </td>
        <td><?php echo number_format($anexoA51D, 2)?></td>
               
      </tr>
      <tr>
        <td style="font-weight: bold;">52</td>
        <td style="font-weight: bold;">TOTAL ITBIS DEDUCIBLE NO SUJETO A PROPORCIONALIDAD (49+50+51)</td>
        <td style="font-weight: bold;"><?php echo number_format($anexoA52A, 2)?></td>
        <td style="font-weight: bold;"><?php echo number_format($anexoA52B, 2)?></td>
        <td style="font-weight: bold;"><?php echo number_format($anexoA52C, 2)?></td>
        <td style="font-weight: bold;"><?php echo number_format($anexoA52D, 2)?></td>
               
      </tr>
      <tr>
        <td style="width: 15px; background: #96be25;">C)</td>
        <td style="width: 2000px; background: #96be25;">ITBIS SUJETO A PROPORCIONALIDAD (Art. 349 de Código Tributario)</td>
        <td style="width: 325px;background: #96be25;"></td>
        <td style="width: 325px;background: #96be25;"></td>
        <td style="width: 325px; background: #96be25;"></td>
        <td style="width: 325px; background: #96be25;"></td>
               
      </tr>
       <tr>
        <td>53</td>
        <td>TBIS SUJETO A PROPORCIONALIDAD</td>
        <td><?php echo number_format($anexoA53A, 2)?></td>
        <td><?php echo number_format($anexoA53B, 2)?></td>
        <td>
            <div class="col-xs-10">
          <input type="text" class="form-control" id="anexoA53C" name="anexoA53C" value="<?php echo $anexoA53C;?>" required>
          </div>
          <div class="col-xs-2">
          <button class="pull-right btn btn-primary btn-xs btnanexoA53C">+</button>
          </div>
        </td>
        <td><?php echo number_format($anexoA53D, 2)?></td>
               
      </tr>
     <tr>
        <td style="font-weight: bold;">54</td>
        <td style="font-weight: bold;">COEFICIENTE DE PROPORCIONALIDAD ((((Casillas 2 + 5 + 10 del IT1) / Casilla 1 del IT1)) * 100) Si aplica.</td>
        <td style="font-weight: bold;"><?php echo number_format($anexoA54A, 2)?></td>
        <td style="font-weight: bold;"><?php echo number_format($anexoA54B, 2)?></td>
        <td style="font-weight: bold;"><?php echo number_format($anexoA54B, 2)?></td>
        <td style="font-weight: bold;"><?php echo number_format($anexoA54D, 2)?></td>
               
      </tr>
      <tr>
        <td style="font-weight: bold;">55</td>
        <td style="font-weight: bold;">ITBIS ADMITIDO POR APLICACIÓN DE PROPORCIONALIDAD (Casillas 53 * 54)</td>
        <td style="font-weight: bold;"><?php echo number_format($anexoA55A, 2)?></td>
        <td style="font-weight: bold;"><?php echo number_format($anexoA55B, 2)?></td>
        <td style="font-weight: bold;"><?php echo number_format($anexoA55B, 2)?></td>
        <td style="font-weight: bold;"><?php echo number_format($anexoA55D, 2)?></td>
               
               
      </tr>
     
     <tr>
        <td style="font-weight: bold;">56</td>
        <td style="font-weight: bold;">TOTAL ITBIS DEDUCIBLE (52+55)</td>
        <td style="font-weight: bold;"><?php echo number_format($anexoA56A, 2)?></td>
        <td style="font-weight: bold;"><?php echo number_format($anexoA56B, 2)?></td>
        <td style="font-weight: bold;"><?php echo number_format($anexoA56B, 2)?></td>
        <td style="font-weight: bold;"><?php echo number_format($anexoA56D, 2)?></td>
               
               
      </tr>
     
  </tbody>
  </table>
        
</div>

 <!--======= FIN PARTE IX==============================================================-->
 


<!--======= IT-1==============================================================-->

<!--======= IT1==============================================================-->

 <div class="form-group col-xs-12" style="background-color: #EBECED">

                   

                <h3 style="text-align: center;"><b>DECLARACIÓN JURADA Y/O PAGO DEL IMPUESTO SOBRE LAS TRANSFERENCIAS DE BIENES INDUSTRIALIZADOS Y SERVICIOS (ITBIS)</b></h3>

                 <h2 style="text-align: center;"><b> IT-1</b></h2>

                 
                </div>

 <!--======= PARTE II===================================================================-->

<div class="form-group">

     
<table class="table table-bordered table-striped dt-responsive"  width="100%">      
  <thead>
      <tr>
        <th style="width: 15px; background: #96be25;">II.</th>
        <th style="width: 1650px; background: #96be25;">INGRESOS POR OPERACIONES</th>
        <th style="width: 10px;background: #96be25;"></th>
        <th style="width: 350px; background: #96be25;">MONTO</th>
               
      </tr>
  </thead>

  <tbody>
      <tr>
        <td>1</td>
        <td>TOTAL DE OPERACIONES DEL PERIODO (Proviene de la casilla 11 del Anexo A)</td>
        <td>+</td>
        <td><?php echo number_format($it1_1, 2)?></td>
      </tr>
      
  </tbody>
  </table>
        
</div>

 <!--======= FIN PARTE II==========================================================-->
 <!--======= PARTE II.A===================================================================-->

<div class="form-group">

     
<table class="table table-bordered table-striped dt-responsive"  width="100%">      
  <thead>
      <tr>
        <th style="width: 15px; background: #96be25;">II.A</th>
        <th style="width: 1650px; background: #96be25;">NO GRAVADAS</th>
        <th style="width: 10px;background: #96be25;"></th>
        <th style="width: 350px; background: #96be25;">MONTO</th>
               
      </tr>
  </thead>

  <tbody>
      <tr>
        <td>2</td>
        <td>INGRESOS POR EXPORTACIONES DE BIENES SEGÚN Art. 342 CT</td>
        <td>+</td>
        <td><?php echo number_format($it1_2, 2)?></td>

      </tr>
      <tr>
        <td>3</td>
        <td>INGRESOS POR EXPORTACIONES DE SERVICIOS SEGÚN Art. 344 CT y Art. 14 Literal j), Reglamento 293-11</td>
        <td>+</td>
       <td><?php echo number_format($it1_3, 2)?></td>

      </tr>
      <tr>
        <td>4</td>
        <td>INGRESOS POR VENTAS LOCALES DE BIENES O SERVICIOS EXENTOS Art. 343 y Art. 344 CT</td>
        <td>+</td>
        <td><?php echo number_format($it1_4, 2)?></td>

      </tr>
      <tr>
        <td>5</td>
        <td>INGRESOS POR VENTAS DE BIENES O SERVICIOS EXENTOS POR DESTINO</td>
        <td>+</td>
        <td><?php echo number_format($it1_5, 2)?></td>

      </tr>
      <tr>
        <td>6</td>
        <td>NO SUJETAS A ITBIS POR SERVICIOS DE CONSTRUCCIÓN (Proviene de la casilla 38 del Anexo A)</td>
        <td>+</td>
        <td><?php echo number_format($it1_6, 2)?></td>

      </tr>
      <tr>
        <td>7</td>
        <td>NO SUJETAS A ITBIS POR COMISIONES (Proviene de la casilla 42 del Anexo A)</td>
        <td>+</td>
        <td><?php echo number_format($it1_7, 2)?></td>

      </tr>
      <tr>
        <td>8</td>
        <td>INGRESOS POR VENTAS LOCALES DE BIENES EXENTOS SEGÚN Párrafos III y IV, Art. 343 CT</td>
        <td>+</td>
        <td><?php echo number_format($it1_8, 2)?></td>

      </tr>
      <tr>
        <td>9</td>
        <td>TOTAL INGRESOS POR OPERACIONES NO GRAVADAS (Sumar casillas 2+3+4+5+6+7+8)</td>
        <td>=</td>
        <td><?php echo number_format($it1_9, 2)?></td>

      </tr>
      
      
  </tbody>
  </table>
        
</div>

 <!--======= FIN PARTE II.A==========================================================-->
                                         
  <!--======= PARTE II.B===================================================================-->

<div class="form-group">

     
<table class="table table-bordered table-striped dt-responsive"  width="100%">      
  <thead>
      <tr>
        <th style="width: 15px; background: #96be25;">II.B</th>
        <th style="width: 1650px; background: #96be25;">GRAVADAS</th>
        <th style="width: 10px;background: #96be25;"></th>
        <th style="width: 350px; background: #96be25;">MONTO</th>
               
      </tr>
  </thead>

  <tbody>
      <tr>
        <td>10</td>
        <td>TOTAL INGRESOS POR OPERACIONES GRAVADAS (Restar casillas 1-9)</td>
        <td>=</td>
        <td><?php echo number_format($it1_10, 2)?></td>
      </tr>
      <tr>
        <td>11</td>
        <td>OPERACIONES GRAVADAS AL 18%</td>
        <td>=</td>
        <td><?php echo number_format($it1_11, 2)?></td>

      </tr>
      <tr>
        <td>12</td>
        <td>OPERACIONES GRAVADAS AL 16%</td>
        <td>=</td>
        <td>
          <div class="col-xs-10">
          <input type="text" class="form-control" id="it1_12" name="it1_12" value="<?php echo $it1_12;?>" required>
          </div>
          <div class="col-xs-2">
          <button class="pull-right btn btn-primary btn-xs btnit1_12">+</button>
          </div>
        </td>
      </tr>
      <tr>
        <td>13</td>
        <td>OPERACIONES GRAVADAS AL 9% (Ley No. 690-16)</td>
        <td>=</td>
        <td>
          <div class="col-xs-10">
          <input type="text" class="form-control" id="it1_13" name="it1_13" value="<?php echo $it1_13;?>" required>
          </div>
          <div class="col-xs-2">
          <button class="pull-right btn btn-primary btn-xs btnit1_13">+</button>
          </div>
        </td>

      </tr>
      <tr>
        <td>14</td>
        <td>OPERACIONES GRAVADAS AL 8% (Ley No. 690-16)</td>
        <td>=</td>
        <td>
        <div class="col-xs-10">
          <input type="text" class="form-control" id="it1_14" name="it1_14" value="<?php echo $it1_14;?>" required>
          </div>
          <div class="col-xs-2">
          <button class=" pull-right btn btn-primary btn-xs btnit1_14">+</button>
          </div>
        </td>

      </tr>
      <tr>
        <td>15</td>
        <td>OPERACIONES GRAVADAS POR VENTAS DE ACTIVOS DEPRECIABLES (Categoría 2 y 3)</td>
        <td>=</td>
        <td><?php echo number_format($it1_15, 2)?></td>
      </tr>
      
      
      
  </tbody>
  </table>
        
</div>

 <!--======= FIN PARTE II.B==========================================================-->
                                         
  <!--======= PARTE III===================================================================-->

<div class="form-group">

     
<table class="table table-bordered table-striped dt-responsive"  width="100%">      
  <thead>
      <tr>
        <th style="width: 15px; background: #96be25;">III</th>
        <th style="width: 1650px; background: #96be25;">LIQUIDACIÓN</th>
        <th style="width: 10px;background: #96be25;"></th>
        <th style="width: 350px; background: #96be25;">MONTO</th>
               
      </tr>
  </thead>

  <tbody>
      <tr>
        <td>16</td>
        <td>ITBIS COBRADO (18% de la casilla 11)</td>
        <td>+</td>
        <td><?php echo number_format($it1_16, 2)?></td>

      </tr>
      <tr>
        <td>17</td>
        <td>ITBIS COBRADO (16% de la casilla 12)</td>
        <td>+</td>
        <td><?php echo number_format($it1_17, 2)?></td>

      </tr>
      <tr>
        <td>18</td>
        <td>ITBIS COBRADO (9% de la casilla 13) (Ley No. 690-16)</td>
        <td>+</td>
        <td><?php echo number_format($it1_18, 2)?></td>

      </tr>
      <tr>
        <td>19</td>
        <td>ITBIS COBRADO (8% de la casilla 14) (Ley No. 690-16)</td>
        <td>+</td>
        <td><?php echo number_format($it1_19, 2)?></td>

      </tr>
      <tr>
        <td>20</td>
        <td>ITBIS COBRADO POR VENTAS DE ACTIVOS DEPRECIABLES (Categoría 2 y 3) (18% de la casilla 15)</td>
        <td>+</td>
        <td><?php echo number_format($it1_20, 2)?></td>

      </tr>
      <tr>
        <td style="font-weight: bold;">21</td>
        <td style="font-weight: bold;">TOTAL ITBIS COBRADO (Sumar casillas 16+17+18+19+20)</td>
        <td style="font-weight: bold;">=</td>
        <td style="font-weight: bold;"><?php echo number_format($it1_21, 2)?></td>

      </tr>

      <tr>
        <td>22</td>
        <td>ITBIS PAGADO EN COMPRAS LOCALES (Proviene de la casilla 56 del Anexo A)</td>
        <td>+</td>
        <td><?php echo number_format($it1_22, 2)?></td>

      </tr>
      <tr>
        <td>23</td>
        <td>ITBIS PAGADO POR SERVICIOS DEDUCIBLES (Proviene de la casilla 56 del Anexo A)</td>
        <td>+</td>
        <td><?php echo number_format($it1_23, 2)?></td>

      </tr>
       <tr>
        <td>24</td>
        <td>ITBIS PAGADO EN IMPORTACIONES (Proviene de la casilla 56 del Anexo A)</td>
        <td>+</td>
        <td><?php echo number_format($it1_24, 2)?></td>

      </tr>
      <tr>
        <td style="font-weight: bold;">25</td>
        <td style="font-weight: bold;">TOTAL ITBIS DEDUCIBLE (Sumar casillas 22+23+24)</td>
        <td style="font-weight: bold;">=</td>
        <td style="font-weight: bold;"><?php echo number_format($it1_25, 2)?></td>

      </tr>
      
      <tr>
        <td style="font-weight: bold;">26</td>
        <td style="font-weight: bold;">IMPUESTO A PAGAR (Si el valor de las casillas 21-25 es Positivo)</td>
        <td style="font-weight: bold;">=</td>
        <td style="font-weight: bold;"><?php echo number_format($it1_26, 2)?></td>

      </tr>
      <tr>
        <td style="font-weight: bold;">27</td>
        <td style="font-weight: bold;">SALDO A FAVOR (Si el valor de las casillas 21-25 es Negativo)</td>
        <td style="font-weight: bold;">=</td>
        <td style="font-weight: bold;"><?php echo number_format($it1_27, 2)?></td>

      </tr>
       <tr>
        <td style="font-weight: bold;">28</td>
        <td style="font-weight: bold;">SALDOS COMPENSABLES AUTORIZADOS (Otros Impuestos) Y/O REEMBOLSOS</td>
        <td style="font-weight: bold;">+-</td>
        <td style="font-weight: bold;"></td>

      </tr>
      <tr>
        <td>29</td>
        <td>SALDO A FAVOR ANTERIOR</td>
        <td>-</td>
        <td>
          <div class="col-xs-10">  
          <input type="text" class="form-control" id="it1_29" name="it1_29" value="<?php echo $it1_29;?>" required>
        </div>

          <div class="col-xs-2">
          <button class="pull-right btn btn-primary btn-xs btnit1_29">+</button>
          </div>

        </td>

      </tr>
      <tr>
        <td>30</td>
        <td>TOTAL PAGOS COMPUTABLES POR RETENCIONES (Proviene de la casilla 33 del Anexo A)</td>
        <td>-</td>
        <td><?php echo number_format($it1_30, 2)?></td>

      </tr>
      <tr>
        <td>31</td>
        <td>OTROS PAGOS COMPUTABLES A CUENTA</td>
        <td>-</td>
        <td>
        <div class="col-xs-10"> 
          <input type="text" class="form-control" id="it1_31" name="it1_31" value="<?php echo $it1_31;?>" required>
          </div>
          <div class="col-xs-2"> 
          <button class="pull-right btn btn-primary btn-xs btnit1_31">+</button>
          </div>

        </td>

      </tr>
      <tr>
        <td>32</td>
        <td>COMPENSACIONES Y/O REEMBOLSOS AUTORIZADOS</td>
        <td>+</td>
        <td></td>

      </tr>
      <tr>
        <td style="font-weight: bold;">33</td>
        <td style="font-weight: bold;">DIFERENCIA A PAGAR (Si el valor de las casillas 26-28-29-30-31-32 es Positivo)</td>
        <td style="font-weight: bold;">=</td>
        <td style="font-weight: bold;"><?php echo number_format($it1_33, 2)?></td>

      </tr>
      <tr>
        <td style="font-weight: bold;">34</td>
        <td style="font-weight: bold;">NUEVO SALDO A FAVOR (Si el valor de las casillas (26-28-29-30-31-32 es Negativo) ó (27+28+29+30+31+32))</td>
        <td style="font-weight: bold;">=</td>
        <td style="font-weight: bold;"><?php echo number_format($it1_34, 2)?></td>

      </tr>
  </tbody>
  </table>
        
</div>

 <!--======= FIN PARTE III==========================================================-->
 <!--======= PARTE IV.==============================================================-->

<div class="form-group">

     
<table class="table table-bordered table-striped dt-responsive"  width="100%">      
  <thead>
      <tr>
        <th style="width: 15px; background: #96be25;">IV.</th>
        <th style="width: 1300px; background: #96be25;"> PENALIDADES</th>
        <th style="width: 350px;background: #96be25;">%</th>
        <th style="width: 10px;background: #96be25;"></th>
        <th style="width: 350px; background: #96be25;">MONTO</th>
               
      </tr>
  </thead>

  <tbody>
      <tr>
        <td>35</td>
        <td>RECARGOS</td>
        <td></td>
        <td>+</td>
        <td>
        <div class="col-xs-10">
          <input type="text" class="form-control" id="it1_35" name="it1_35" value="<?php echo $it1_35;?>" required>
          </div>
          <div class="col-xs-2">
          <button class="pull-right btn btn-primary btn-xs btnit1_35">+</button>
          </div>

        </td>

      </tr>
      <tr>
        <td>36</td>
        <td>INTERÉS INDEMNIZATORIO</td>
        <td></td>
        <td>+</td>
        <td>
          <div class="col-xs-10">
          <input type="text" class="form-control" id="it1_36" name="it1_36" value="<?php echo $it1_36;?>" required>
          </div>
          <div class="col-xs-2">
          <button class="pull-right btn btn-primary btn-xs btnit1_36">+</button>
          </div>

        </td>

      </tr>
      <tr>
        <td>37</td>
        <td>SANCIONES</td>
        <td></td>
        <td>+</td>
        <td>
          <div class="col-xs-10">
          <input type="text" class="form-control" id="it1_37" name="it1_37" value="<?php echo $it1_37;?>" required>
          </div>

          <div class="col-xs-2">
          <button class="pull-right btn btn-primary btn-xs btnit1_37">+</button>
          </div>

        </td>

      </tr>
 
  </tbody>
  </table>
        
</div>

 <!--======= FIN PARTE IV==============================================================-->
                                           
 <!--======= PARTE V==============================================================-->

<div class="form-group">

     
<table class="table table-bordered table-striped dt-responsive"  width="100%">      
  <thead>
      <tr>
        <th style="width: 15px; background: #96be25;">V.</th>
        <th style="width: 1650px; background: #96be25;">MONTO A PAGAR </th>
        <th style="width: 10px;background: #96be25;"></th>
        <th style="width: 350px; background: #96be25;">MONTO</th>
               
      </tr>
  </thead>

  <tbody>
      <tr>
        <td style="font-weight: bold;">38</td>
        <td style="font-weight: bold;">TOTAL A PAGAR (Sumar casillas 33+35+36+37)</td>
        <td style="font-weight: bold;">=</td>
        <td style="font-weight: bold;"><?php echo number_format($it1_38, 2)?></td>

      </tr>
      
 
  </tbody>
  </table>
        
</div>

 <!--======= FIN PARTE V==============================================================-->
                                         
<!--======= PARTE A.==============================================================-->

<div class="form-group">

     
<table class="table table-bordered table-striped dt-responsive"  width="100%">      
  <thead>
      <tr>
        <th style="width: 15px; background: #96be25;">A.</th>
        <th style="width: 1650px; background: #96be25;">ITBIS RETENIDO / ITBIS PERCIBIDO</th>
        <th style="width: 10px;background: #96be25;"></th>
        <th style="width: 350px; background: #96be25;">MONTO</th>
               
      </tr>
  </thead>

  <tbody>
      <tr>
        <td>39</td>
        <td>SERVICIOS SUJETOS A RETENCIÓN PERSONAS FÍSICAS </td>
        <td>+</td>
        <td><?php echo number_format($it1_39, 2)?></td>

      </tr>
       <tr>
        <td>40</td>
        <td>SERVICIOS SUJETOS A RETENCIÓN ENTIDADES NO LUCRATIVAS (Norma No. 01-11)</td>
        <td>+</td>
        <td>
          <div class="col-xs-10">

          <input type="text" class="form-control" id="it1_40" name="it1_40" value="<?php echo $it1_40;?>" required>
          </div>

          <div class="col-xs-2">
          <button class="pull-right btn btn-primary btn-xs btnit1_40">+</button>
          </div>
        </td>
      </tr>
       <tr>
        <td style="font-weight: bold;">41</td>
        <td style="font-weight: bold;">TOTAL SERVICIOS SUJETOS A RETENCIÓN A PERSONAS FÍSICAS Y ENTIDADES NO LUCRATIVAS</td>
        <td style="font-weight: bold;">=</td>
        <td style="font-weight: bold;"><?php echo number_format($it1_41, 2)?></td>

      </tr>
       <tr>
        <td>42</td>
        <td>SERVICIOS SUJETOS A RETENCIÓN SOCIEDADES (Norma No. 07-09)</td>
        <td>=</td>
        <td></td>

      </tr>
       <tr>
        <td>43</td>
        <td>SERVICIOS SUJETOS A RETENCIÓN SOCIEDADES (Norma No. 02-05 y 07-07)</td>
        <td>=</td>
        <td><?php echo number_format($it1_43, 2)?></td>

      </tr>
       <tr>
        <td>44</td>
        <td>BIENES O SERVICIOS SUJETOS A RETENCIÓN A CONTRIBUYENTES ACOGIDOS AL RST (Operaciones Gravadas al 18%)</td>
        <td>+</td>
        <td><?php echo number_format($it1_44, 2)?></td>

      </tr>
      
      <tr>
        <td>45</td>
        <td>BIENES O SERVICIOS SUJETOS A RETENCIÓN A CONTRIBUYENTES ACOGIDOS AL RST (Operaciones Gravadas al 16%)</td>
        <td>+</td>
        <td></td>

      </tr>
      <tr>
        <td style="font-weight: bold;">46</td>
        <td style="font-weight: bold;">TOTAL BIENES O SERVICIOS SUJETOS A RETENCIÓN A CONTRIBUYENTES ACOGIDOS AL RST (Sumar casillas 44+45)</td>
        <td style="font-weight: bold;">=</td>
        <td style="font-weight: bold;"></td>

      </tr>
       <tr>
        <td>47</td>
        <td>BIENES SUJETOS A RETENCIÓN DE COMPROBANTE DE COMPRAS (Operaciones Gravadas al 18%) (Norma No. 08-10 y 05-19)</td>
        <td>+</td>
        <td></td>

      </tr>
       <tr>
        <td>48</td>
        <td>BIENES SUJETOS A RETENCIÓN DE COMPROBANTE DE COMPRAS (Operaciones Gravadas al 16%) (Norma No. 08-10 y 05-19)</td>
        <td>+</td>
        <td></td>

      </tr>
       <tr>
        <td style="font-weight: bold;">49</td>
        <td style="font-weight: bold;">TOTAL BIENES SUJETOS A RETENCIÓN COMPROBANTES DE COMPRAS (Sumar casillas 47+48</td>
        <td style="font-weight: bold;">=</td>
        <td style="font-weight: bold;"></td>

      </tr>
       <tr>
        <td>50</td>
        <td>ITBIS POR SERVICIOS SUJETOS A RETENCIÓN PERSONAS FÍSICAS Y ENTIDADES NO LUCRATIVAS (18% de la casilla 41)</td>
        <td>+</td>
        <td><?php echo number_format($it1_50, 2)?></td>

      </tr>
      
      <tr>
        <td>51</td>
        <td>ITBIS POR SERVICIOS SUJETOS A RETENCIÓN SOCIEDADES (18% de la casilla 42) (Norma No. 07-09)</td>
        <td>+</td>
        <td></td>

      </tr>
      <tr>
        <td>52</td>
        <td>ITBIS POR SERVICIOS SUJETOS A RETENCIÓN SOCIEDADES (18% de la casilla 43 por 0.30) (Norma No. 02-05 y 07-07)</td>
        <td>+</td>
        <td><?php echo number_format($it1_52, 2)?></td>

      </tr>
       <tr>
        <td>53</td>
        <td>ITBIS RETENIDO A CONTRIBUYENTES ACOGIDOS AL RST (18% de la casilla 44)</td>
        <td>+</td>
        <td><?php echo number_format($it1_53, 2)?></td>

      </tr>
       <tr>
        <td>54</td>
        <td>ITBIS RETENIDO A CONTRIBUYENTES ACOGIDOS AL RST (16% de la casilla 45)</td>
        <td>+</td>
        <td><?php echo number_format($it1_54, 2)?></td>

      </tr>
       <tr>
        <td style="font-weight: bold;">55</td>
        <td style="font-weight: bold;">TOTAL ITBIS RETENIDO A CONTRIBUYENTES ACOGIDOS AL RST (Sumar casillas 53+54)</td>
        <td style="font-weight: bold;">=</td>
        <td style="font-weight: bold;"><?php echo number_format($it1_55, 2)?></td>

      </tr>
       <tr>
        <td>56</td>
        <td>ITBIS POR BIENES SUJETOS A RETENCIÓN DE COMPROBANTE DE COMPRAS (18% de la casilla 47) (Norma No. 08-10 y 05-19)</td>
        <td>+</td>
        <td></td>

      </tr>
      
      <tr>
        <td>57</td>
        <td>ITBIS POR BIENES SUJETOS A RETENCIÓN DE COMPROBANTE DE COMPRAS (16% de la casilla 48) (Norma No. 08-10 y 05-19)</td>
        <td>+</td>
        <td></td>

      </tr>
      <tr>
        <td style="font-weight: bold;">58</td>
        <td style="font-weight: bold;">TOTAL POR BIENES SUJETOS A RETENCIÓN COMPROBANTE DE COMPRAS (Sumar casillas 56+57)</td>
        <td style="font-weight: bold;">=</td>
        <td style="font-weight: bold;"></td>

      </tr>
       <tr>
        <td style="font-weight: bold;">59</td>
        <td style="font-weight: bold;">TOTAL ITBIS PERCIBIDO EN VENTA</td>
        <td style="font-weight: bold;">=</td>
        <td style="font-weight: bold;"></td>

      </tr>
       <tr>
        <td style="font-weight: bold;">60</td>
        <td style="font-weight: bold;">IMPUESTO A PAGAR (Sumar casillas 50+51+52+55+58+59)</td>
        <td style="font-weight: bold;">=</td>
        <td style="font-weight: bold;"><?php echo number_format($it1_60, 2)?></td>

      </tr>
       <tr>
        <td>61</td>
        <td>PAGOS COMPUTABLES A CUENTA</td>
        <td>-</td>
        <td>
          <div class="col-xs-10">

          <input type="text" class="form-control" id="it1_61" name="it1_61" value="<?php echo $it1_61;?>" required>
          </div>

          <div class="col-xs-2">
          <button class="pull-right btn btn-primary btn-xs btnit1_61">+</button>
          </div>
        </td>
      </tr>
       <tr>
        <td style="font-weight: bold;">62</td>
        <td style="font-weight: bold;">DIFERENCIA A PAGAR (Si el valor de las casillas 60-61 es Positivo)</td>
        <td style="font-weight: bold;">=</td>
        <td style="font-weight: bold;"><?php echo number_format($it1_62, 2)?></td>

      </tr>
      
      <tr>
        <td style="font-weight: bold;">63</td>
        <td style="font-weight: bold;">NUEVO SALDO A FAVOR (Si el valor de las casillas 60-61 es Negativo)</td>
        <td style="font-weight: bold;">=</td>
        <td style="font-weight: bold;"><?php echo number_format($it1_63, 2)?></td>

      </tr>

<!--======= PARTE B.==============================================================-->

<div class="form-group">

     
<table class="table table-bordered table-striped dt-responsive"  width="100%">      
  <thead>
      <tr>
        <th style="width: 15px; background: #96be25;">B.</th>
        <th style="width: 1300px; background: #96be25;"> PENALIDADES</th>
        <th style="width: 350px;background: #96be25;">%</th>
        <th style="width: 10px;background: #96be25;"></th>
        <th style="width: 350px; background: #96be25;">MONTO</th>
               
      </tr>
  </thead>

  <tbody>
      <tr>
        <td>64</td>
        <td>RECARGOS</td>
        <td></td>
        <td>+</td>
        <td>
          <div class="col-xs-10">
          <input type="text" class="form-control" id="it1_64" name="it1_64" value="<?php echo $it1_64;?>" required>
          </div>
          <div class="col-xs-2">
          <button class="pull-right btn btn-primary btn-xs btnit1_64">+</button>
          </div>
        </td>

      </tr>
      <tr>
        <td>65</td>
        <td>INTERÉS INDEMNIZATORIO</td>
        <td></td>
        <td>+</td>
        <td>
        <div class="col-xs-10">
          <input type="text" class="form-control" id="it1_65" name="it1_65" value="<?php echo $it1_65;?>" required>
          </div>
          <div class="col-xs-2">
          <button class="pull-right btn btn-primary btn-xs btnit1_65">+</button>
          </div>
        </td>

      </tr>
      <tr>
        <td>66</td>
        <td>SANCIONES</td>
        <td></td>
        <td>+</td>
        <td>
        <div class="col-xs-10">
          <input type="text" class="form-control" id="it1_66" name="it1_66" value="<?php echo $it1_66;?>" required>
          </div>
          <div class="col-xs-2">
          <button class="pull-right btn btn-primary btn-xs btnit1_66">+</button>
          </div>
        </td>

      </tr>
 
  </tbody>
  </table>
        
</div>

 <!--======= FIN PARTE B.==============================================================-->
  <!--======= PARTE C.==============================================================-->

<div class="form-group">

     
<table class="table table-bordered table-striped dt-responsive"  width="100%">      
  <thead>
      <tr>
        <th style="width: 15px; background: #96be25;">C.</th>
        <th style="width: 1650px; background: #96be25;">MONTO A PAGAR  </th>
        <th style="width: 10px;background: #96be25;"></th>
        <th style="width: 350px; background: #96be25;">MONTO</th>
               
      </tr>
  </thead>
<tbody>
  <tr>
        <td style="font-weight: bold;">67</td>
        <td style="font-weight: bold;">TOTAL A PAGAR (Sumar casillas 62+64+65+66)</td>
        <td style="font-weight: bold;">=</td>
        <td style="font-weight: bold;"><?php echo number_format($it1_67, 2)?></td>
       

      </tr>
  
  </tbody>
</table>
        
</div>

 <!--======= FIN PARTE C.==============================================================-->  <!--======= 68.==============================================================-->


<div class="form-group">

     
<table class="table table-bordered table-striped dt-responsive"  width="100%">      
  <thead>
      <tr>
        <th style="width: 15px; background: #96be25;">68</th>
        <th style="width: 1650px; background: #96be25;">TOTAL GENERAL (Sumar casillas 38+67)
</th>
        <th style="width: 10px;background: #96be25;">=</th>
        <th style="width: 350px; background: #96be25;"><?php echo number_format($it1_68, 2)?></th>
               
      </tr>
  </thead>
<tbody>
  
  
  </tbody>
</table>
        
</div>

 <!--======= FIN PARTE 68==============================================================-->      
 
                                         

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
 