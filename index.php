<?php 

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/categoriasactivor.controlador.php";
require_once "controladores/categoriasactivof.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/productosactivor.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/ventas.controlador.php";
require_once "controladores/suplidores.controlador.php";
require_once "controladores/606.controlador.php";
require_once "controladores/607.controlador.php";
require_once "controladores/608.controlador.php";
require_once "controladores/empresas.controlador.php";
require_once "controladores/correlativos.controlador.php";
require_once "controladores/cxc.controlador.php";
require_once "controladores/cotizaciones.controlador.php";
require_once "controladores/contabilidad.controlador.php";
require_once "controladores/banco.controlador.php";
require_once "controladores/proyecto.controlador.php";
require_once "controladores/diario.controlador.php";
require_once "controladores/compras.controlador.php";
require_once "controladores/cxp.controlador.php";
require_once "controladores/anticipo.controlador.php";
require_once "controladores/comentarios.controlador.php";
require_once "controladores/correos.controlador.php";
require_once "controladores/programador.controlador.php";





require_once "modelos/usuarios.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/categoriasactivor.modelo.php";
require_once "modelos/categoriasactivof.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/productosactivor.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/ventas.modelo.php";
require_once "modelos/suplidores.modelo.php";
require_once "modelos/606.modelo.php";
require_once "modelos/607.modelo.php";
require_once "modelos/608.modelo.php";
require_once "modelos/empresas.modelo.php";
require_once "modelos/correlativos.modelo.php";
require_once "modelos/cxc.modelo.php";
require_once "modelos/cotizaciones.modelo.php";
require_once "modelos/contabilidad.modelo.php";
require_once "modelos/banco.modelo.php";
require_once "modelos/proyecto.modelo.php";
require_once "modelos/diario.modelo.php";
require_once "modelos/compras.modelo.php";
require_once "modelos/cxp.modelo.php";
require_once "modelos/anticipo.modelo.php";
require_once "modelos/comentarios.modelo.php";
require_once "modelos/programador.modelo.php";
require_once "extensiones/vendor/autoload.php";




$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();




