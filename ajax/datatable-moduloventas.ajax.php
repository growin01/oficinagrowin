<?php

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

require_once "../controladores/607.controlador.php";
require_once "../modelos/607.modelo.php";

class TablaVentas{

 	/*=============================================
 	 MOSTRAR LA TABLA DE PRODUCTOS
  	=============================================*/ 
  	

	public function mostrarTablaVentas(){

		
		$Rnc_Empresa_Venta = $_GET["RncEmpresaVentas"];
        $fechaInicial = null;
        $fechaFinal = null;

                
              
 $respuesta = ControladorVentas::ctrRangoFechasVentas($Rnc_Empresa_Venta, $fechaInicial, $fechaFinal);

   $datosJson = '{
		  "data": [';    
    
 
    foreach ($respuesta as $key => $value) {
 $botones = "";
 $retener = "";
 $email = "";
 $Estado = "";


       

	if($value["EXTRAER_NCF"] <> "FP1"){
            $botones = "<div class='btn-group'><button class='btn btn-info btn-xs btnImprimirFactura' idVenta='".$value['id']."' codigoVenta='".$value['Codigo']."'><i class='fa fa-print'></i></button>"; 
        if($value["Correo_Cliente"] != ""){
        	$email="<button class='btn btn-success btn-xs btnCorreoFactura' idVenta='".$value["id"]."' codigoVenta='".$value["Codigo"]."' correocliente='".$value["Correo_Cliente"]."'  nombreCliente='".$value["Nombre_Cliente"]."' data-toggle='modal' data-target='#modalFactura'><i class='fa fa-envelope-o'></i></button>";

        }

    if($value["Estado"] == 1){
                
        $Estado="<button class='btn btn-warning btn-xs btnEditarVenta' idVenta='".$value["id"]."' codigoVenta='".$value["Codigo"]."'  Rnc_Empresa_Venta='".$value["Rnc_Empresa_Venta"]."' ExtraerAsiento='DFF'><i class='fa fa-pencil'></i></button><button class='btn btn-warning btn-xs btnRetenerVentas' id_607='".$id_registro607."' Rnc_Empresa_607='".$Rnc_Empresa_607."' data-toggle='modal' data-target='#modalRetener607'><i class='fa fa-university'></i></button><button class='btn btn-danger btn-xs btnEliminarVenta' idVenta='".$value["id"]."' codigoVenta='".$value["Codigo"]."' Rnc_Empresa_Venta='".$value["Rnc_Empresa_Venta"]."' id_registro607='".$id_registro607."' RNC_Factura='".$RNC_Factura."' NCF_607='".$NCF_607."' ExtrarNCF='DFF'><i class='fa fa-times'></i></button></div>";


       }else{
        $retener="<button class='btn btn-warning btn-xs btnRetenerVentas' id_607='".$id_registro607."' Rnc_Empresa_607='".$Rnc_Empresa_607."' data-toggle='modal' data-target='#modalRetener607'><i class='fa fa-university'></i></button></div>";



         }

    
 }else{
 	 $botones = "<div class='btn-group'><button class='btn btn-default btn-xs btnImprimirFacturaNo' idVenta='".$value["id"]."' codigoVenta='".$value["Codigo"]."' Rnc_Empresa_Venta='".$value["Rnc_Empresa_Venta"]."'><i class='fa fa-print'></i></button></div>";



 	 if($value["Correo_Cliente"] != ""){
         $email="<button class='btn btn-success btn-xs btnCorreoFacturaNo' idVenta='".$value["id"]."' codigoVenta='".$value["Codigo"]."' correocliente='".$value["Correo_Cliente"]."'  nombreCliente= '".$value["Nombre_Cliente"]."' data-toggle='modal' data-target='#modalFacturaNo'><i class='fa fa-envelope-o'></i></button>";
                }
       if($value["Estado"] == 1){

         $Estado="<button class='btn btn-warning btn-xs btnEditarVenta' idVenta='".$value["id"]."' codigoVenta='".$value["Codigo"]."' Rnc_Empresa_Venta='".$value["Rnc_Empresa_Venta"]."'  ExtraerAsiento='DFP'><i class='fa fa-pencil'></i></button>
			<button class='btn btn-danger btn-xs btnEliminarVenta' idVenta='".$value["id"]."'  codigoVenta='".$value["Codigo"]."' Rnc_Empresa_Venta='".$value["Rnc_Empresa_Venta"]."' id_registro607='".$id_registro607."' RNC_Factura='".$RNC_Factura."' NCF_607='".$NCF_607."' ExtrarNCF='DFP'><i class='fa fa-times'></i></button></div>";
                  }
 }





		  	$datosJson .='[
			      "'.($key+1).'",
			      "'.$value["Nombre_Cliente"].'",
			      "'.$value["Codigo"].'", 
            "'.$value["NCF_Factura"].'",
            "'.$value["FechaAnoMes"].'",
            "'.$value["FechaDia"].'",
            "'.$Nombre_Vendedor.'",
            "'.$value["Metodo_Pago"].'",
            "'.$value["Referencia"].'",
            "'.number_format($value["Neto"],2).'",
            "'.number_format($value["Descuento"],2).'",
            "'.number_format($value["Impuesto"],2).'",
            "'.number_format($value["Total"],2).'",
            "'.number_format($respuesta607["ITBIS_Retenido_Tercero_607"],2).'",
            "'.number_format($respuesta607["Retencion_Renta_por_Terceros_607"],2).'",
            "'.$value["Observaciones"].'",
            "'.$botones.$email.$Estado.$retener.'"
			    ],';

		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   '] 

		 }';
		
		echo $datosJson;


	}


}

/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/  
$tablaventas = new TablaVentas();
$tablaventas -> mostrarTablaVentas();


