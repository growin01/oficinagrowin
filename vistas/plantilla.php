<?php 

session_start();
          

?>


<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
 
<meta http-equiv="X-UA-Compatible" content="IE=edge">
  
<title>GROWIN Oficina Virtual</title>
  
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<!-- ====================================
  FAVICON
========================================-->

  <link rel="icon" href="vistas/img/plantilla/icono-pestana.jpg">
  
<!-- ====================================
  PLUGINS CCS
========================================-->
  
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
  
  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
  
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">

  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

   <!-- DataTables -->

  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
  <!-- Botones -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/buttons.dataTables.min.css">



  
   <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="vistas/plugins/iCheck/all.css">

  <!--***************** Daterangepicker**************-->

<link rel="stylesheet" href="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.css">

   <!--***************** morris js chats**************-->

  <link rel="stylesheet" href="vistas/bower_components/morris.js/morris.css">
  
<!-- ====================================
  PLUGINS DE JAVASCRIPT
========================================-->

<!-- jQuery 3 -->
<script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- FastClick -->
<script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>

<!-- AdminLTE App -->
<script src="vistas/dist/js/adminlte.min.js"></script>

<!-- DataTables -->
<script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- BOTONES -->
<script src="vistas/bower_components/datatables.net-bs/js/dataTables.buttons.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/buttons.flash.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/jszip.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/pdfmake.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/vfs_fonts.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/buttons.html5.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/buttons.print.min.js"></script>
<script  src =" https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.min.js "> </script > 
<script  src = " https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.templates.min.js "> </script >


<!-- sweetalert2.all.js -->

<script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<!-- iCheck 1.0.1 -->
<script src="vistas/plugins/iCheck/icheck.min.js"></script>

<!-- InputMask -->
<script src="vistas/plugins/input-mask/jquery.inputmask.js"></script>
<script src="vistas/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="vistas/plugins/input-mask/jquery.inputmask.extensions.js"></script>

<!-- jQuery Number -->
<script src="vistas/plugins/jqueryNumber/jquerynumber.min.js"></script>





<!---- daterangepicker ------->

<script src="vistas/bower_components/moment/min/moment.min.js"></script>
<script src="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<!---- MORRIS JS charts ------->

<script src="vistas/bower_components/raphael/raphael.min.js"></script>
<script src="vistas/bower_components/morris.js/morris.min.js"></script>

<!---- CHART JS charts ------->

<script src="vistas/bower_components/chart.js/Chart.js"></script>

<!---- Impresoratermica ------->

</head>

<!-- ====================================
  CUERPO DEL DOCUMENTO
========================================-->

<body class="hold-transition skin-blue sidebar-mini login-page">

<!-- Site wrapper -->

<?php 

if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok")
{

  echo '<div class="wrapper">';

  /****************************
      CABEZOTE
  *******************************/
  include "modulos/cabezote.php";

  /****************************
      MENU
  *******************************/

  include "modulos/menu.php";

/****************************
      CONTENIDO
*******************************/
  if(isset($_GET["ruta"])){
    if($_GET["ruta"] == "inicio" ||
      $_GET["ruta"] == "usuarios" ||
      $_GET["ruta"] == "categorias" ||
      $_GET["ruta"] == "CategoriasActivoRotativos" ||
      $_GET["ruta"] == "CategoriasActivoFijo" ||
      $_GET["ruta"] == "productos" ||
      $_GET["ruta"] == "ProductosActivoRotativos" ||
      $_GET["ruta"] == "crear-producto-activofijo" ||
      $_GET["ruta"] == "productosresumen" ||
      $_GET["ruta"] == "librodeinventario" ||
      $_GET["ruta"] == "clientes" ||
      $_GET["ruta"] == "ventas" ||
      $_GET["ruta"] == "crear-ventas" ||
      $_GET["ruta"] == "crear-ventas-pro" ||
      $_GET["ruta"] == "crear-pos" ||
      $_GET["ruta"] == "crear-pos-pro" ||
      $_GET["ruta"] == "editar-ventas" ||
      $_GET["ruta"] == "Copiar-ventas" ||
      $_GET["ruta"] == "Copiar-ventasNo" ||
      $_GET["ruta"] == "Reciclar-ventas" ||
      $_GET["ruta"] == "crear-ventasrecurrentes" ||
      $_GET["ruta"] == "cotizaciones" ||
      $_GET["ruta"] == "ventasrecurrentes" ||
      $_GET["ruta"] == "editar-ventasrecurrentes" ||
      $_GET["ruta"] == "crear-cotizacion" ||
      $_GET["ruta"] == "editar-cotizacion" ||
      $_GET["ruta"] == "Copiar-cotizacion" ||
      $_GET["ruta"] == "crear-ventas-cotizacion" ||
      $_GET["ruta"] == "crear-ventas-pro-cotizacion" ||
      $_GET["ruta"] == "reportecxc" ||
      $_GET["ruta"] == "detallerecibodecobro" ||
      $_GET["ruta"] == "detallecobroindividual" ||
      $_GET["ruta"] == "clientesvscobro" ||
      $_GET["ruta"] == "cobroperiodo" ||
      $_GET["ruta"] == "reportevc" ||
      $_GET["ruta"] == "detallerecibodedeposito" ||
      $_GET["ruta"] == "cargamasivacontado" ||
      $_GET["ruta"] == "Editar-cargamasivacontado" |
      $_GET["ruta"] == "compras" ||
      $_GET["ruta"] == "crear-compra-inventario" ||
      $_GET["ruta"] == "crear-compra-inventarioNo" ||
      $_GET["ruta"] == "Editar-compra-inventario" ||
      $_GET["ruta"] == "Editar-compra-inventarioNo" ||
      $_GET["ruta"] == "Copiar-compra-inventario" ||
      $_GET["ruta"] == "Copiar-compra-inventarioNo" ||
      $_GET["ruta"] == "crear-compra-gastosgenerales" ||
      $_GET["ruta"] == "crear-compra-gastosgeneralesNo" ||
      $_GET["ruta"] == "Editar-compra-gastosgenerales" ||
      $_GET["ruta"] == "Editar-compra-gastosgeneralesNo" ||
      $_GET["ruta"] == "Copiar-compra-gastosgenerales" ||
      $_GET["ruta"] == "Copiar-compra-gastosgeneralesNo" ||
      $_GET["ruta"] == "reportecxp" ||
      $_GET["ruta"] == "reportepago" ||
      $_GET["ruta"] == "pagoperiodo" ||
      $_GET["ruta"] == "detallerecibodepago" ||
      $_GET["ruta"] == "detallepagoindividual" ||
      $_GET["ruta"] == "recibodecobro" || 
      $_GET["ruta"] == "recibodepago" ||
      $_GET["ruta"] == "Editar-recibodecobro" ||
      $_GET["ruta"] == "Editar-recibodepago" ||
      $_GET["ruta"] == "reporte" ||
      $_GET["ruta"] == "suplidores" || 
      $_GET["ruta"] == "reporte-606" ||
      $_GET["ruta"] == "reportegastos" ||
      $_GET["ruta"] == "auxiliarsuplidor" ||  
      $_GET["ruta"] == "registro-606" ||
      $_GET["ruta"] == "reporte-607" ||
      $_GET["ruta"] == "reporteingresos" || 
      $_GET["ruta"] == "registro-607" ||
      $_GET["ruta"] == "reporte-608" ||
      $_GET["ruta"] == "registro-608" ||
      $_GET["ruta"] == "bcf" ||      
      $_GET["ruta"] == "Editar-registro-606" ||
      $_GET["ruta"] == "Copiar-registro-606" ||
      $_GET["ruta"] == "Editar-registro-607" ||
      $_GET["ruta"] == "Copiar-registro-607" ||
      $_GET["ruta"] == "Editar-registro-608" ||
      $_GET["ruta"] == "Copiar-registro-608" ||
      $_GET["ruta"] == "logueos" ||
      $_GET["ruta"] == "auditor-606" ||
      $_GET["ruta"] == "auditor-607" ||
      $_GET["ruta"] == "auditor-608" ||
      $_GET["ruta"] == "configuracionFiscal" ||
      $_GET["ruta"] == "configuracionSocial" ||
      $_GET["ruta"] == "configuraciontikect" ||
      $_GET["ruta"] == "correlativos" ||
      $_GET["ruta"] == "historicocorrelativos" ||
      $_GET["ruta"] == "agregarempresa" ||
      $_GET["ruta"] == "agregarfirmas" ||
      $_GET["ruta"] == "listado-empresas" ||
      $_GET["ruta"] == "control-procesos" ||
      $_GET["ruta"] == "control-TSS" ||
      $_GET["ruta"] == "control-impuestos" || //control por empresa 
      $_GET["ruta"] == "Control-TSS-Empresa" || //control por empresa Control-TSS-Empresa
      $_GET["ruta"] == "control-FondoAnticipo" ||
      $_GET["ruta"] == "cuadre-itbis" ||
      $_GET["ruta"] == "cuadre-it1" || //control por empresa Control-TSS-Empresa
      $_GET["ruta"] == "anexoA" || //control por empresa Control-TSS-Empresa
      $_GET["ruta"] == "ir17" || //control por empresa Control-TSS-Empresa
      $_GET["ruta"] == "catalogocuentas" || //control por empresa Control-TSS-Empresa
      $_GET["ruta"] == "gastodiario" || //librodiario
      $_GET["ruta"] == "Copiar-gastodiario" || //librodiario
      $_GET["ruta"] == "Editar-gastodiario" || //librodiario
      $_GET["ruta"] == "Asignar-gastodiario" || //librodiario
      $_GET["ruta"] == "ingresodiario" || //librodiario
      $_GET["ruta"] == "Editar-ingresodiario" || //librodiario
      $_GET["ruta"] == "Copiar-ingresodiario" ||
      $_GET["ruta"] == "Asignar-ingresodiario" || //librodiario
      $_GET["ruta"] == "ajustediario" || //librodiario
      $_GET["ruta"] == "Editar-ajustediario" ||
      $_GET["ruta"] == "Copiar-ajustediario" || //librodiario
      $_GET["ruta"] == "libromayor" || //librodiario
      $_GET["ruta"] == "libromayorpro" || //librodiariopro
      $_GET["ruta"] == "banco" || //librodiario
      $_GET["ruta"] == "librobanco" || //librodiario
      $_GET["ruta"] == "conciliacion" || //librodiario
      $_GET["ruta"] == "estadocuenta" || //librodiario
      $_GET["ruta"] == "disponibilidad" || //librodiario
      $_GET["ruta"] == "anticipos" || //anticipos
      $_GET["ruta"] == "reporteanticipos" || //anticipos
      $_GET["ruta"] == "rendiranticipos" || //anticipos
      $_GET["ruta"] == "Editarrendiranticipos" || //anticipos
      $_GET["ruta"] == "reporteranticiposrendidos" || //anticipos
      $_GET["ruta"] == "proyectos" ||
      $_GET["ruta"] == "resumenproyectos" || //librodiario
      $_GET["ruta"] == "proyectosuplidor" || 
      $_GET["ruta"] == "EstadoResultado" ||
      $_GET["ruta"] == "impEstadoResultado" ||
      $_GET["ruta"] == "EstadoSituacion" ||
      $_GET["ruta"] == "impEstadoSituacion" ||
      $_GET["ruta"] == "BalanceComprobacion" ||
      $_GET["ruta"] == "comentarios" ||
      $_GET["ruta"] == "bandejaentrada" ||
      $_GET["ruta"] == "enviados" ||
      $_GET["ruta"] == "empleados" ||
      $_GET["ruta"] == "pruebadatatable" ||
      $_GET["ruta"] == "pruebadatatable" ||
      $_GET["ruta"] == "catalogocuentasmasivaempresas" ||
      $_GET["ruta"] == "agregarsuplidorgrowindgii" ||
      $_GET["ruta"] == "salir"){



    include "modulos/".$_GET["ruta"].".php";



  } /*CIERRA DE RUTAS AMIGABLES*/ 
    else 
    {

    include "modulos/404.php";

    } /*EL SINO DE LA RUTAS AMIGABLES*/



} /*CIERRE DE ISSET DE LAS RUTAS*/
else{

    include "modulos/inicio.php";

  } /*EL SINO DE ISSET DE LAS RUTAS*/

  /****************************
      CONTENIDO
  *******************************/

  include "modulos/footer.php";

  echo '</div>';

} /*CERRAR CONDICION DE SECCION*/

  else{
    
    include "modulos/login.php";


  }/*EL SINO DE CONDICION DE SECCION*/


 ?>

 
  
<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/categorias.js"></script>
<script src="vistas/js/productos.js"></script>
<script src="vistas/js/clientes.js"></script>
<script src="vistas/js/ventas.js"></script>
<script src="vistas/js/reportes.js"></script>
<script src="vistas/js/funciones.js"></script>
<script src="vistas/js/suplidores.js"></script>
<script src="vistas/js/606.js"></script>
<script src="vistas/js/607.js"></script>
<script src="vistas/js/608.js"></script>
<script src="vistas/js/empresas.js"></script>
<script src="vistas/js/cuadreitbis.js"></script>
<script src="vistas/js/configuracion.js"></script>
<script src="vistas/js/correlativos.js"></script>
<script src="vistas/js/cxc.js"></script>
<script src="vistas/js/ventacontado.js"></script>
<script src="vistas/js/cxp.js"></script>
<script src="vistas/js/cotizaciones.js"></script>
<script src="vistas/js/contabilidad.js"></script>
<script src="vistas/js/banco.js"></script>
<script src="vistas/js/proyecto.js"></script>
<script src="vistas/js/diario.js"></script>
<script src="vistas/js/compras.js"></script>
<script src="vistas/js/anticipo.js"></script>
<script src="vistas/js/comentarios.js"></script>
<script src="vistas/js/activor.js"></script>
<script src="vistas/js/activof.js"></script>
<script src="vistas/js/programador.js"></script>
<script src="vistas/js/Impresora.js"></script>


</body>
</html>
