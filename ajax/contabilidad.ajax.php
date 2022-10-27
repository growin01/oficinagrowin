<?php 
require_once "../controladores/contabilidad.controlador.php";
require_once "../modelos/contabilidad.modelo.php";
require_once "../controladores/diario.controlador.php";
require_once "../modelos/diario.modelo.php";


class AjaxContabilidad{

	/*==================================================
			GENERAR CODIGO A PARTIR DE ID CATEGORIAS
	====================================================*/
	
	public $RncEmpresa;
	public $grupocuenta;
  	public $categoriacuenta;


public function ajaxCrearCodigogenerica(){

		

		$taRncEmpresa = "Rnc_Empresa_cuentas";
		$valorRncEmpresa = $this->RncEmpresa;

		$tagrupocuenta = "id_grupo";
		$valorgrupocuenta = $this->grupocuenta;

		$tacategoriacuenta = "id_categoria";
		$valorcategoriacuenta = $this->categoriacuenta;
	
	
$respuesta = ControladorContabilidad::ctrCrearCodigogenerica($taRncEmpresa, $valorRncEmpresa, $tagrupocuenta, $valorgrupocuenta, $tacategoriacuenta, $valorcategoriacuenta); 

echo json_encode($respuesta);



}/*CIERRE DE FUNCION DE CREAR CODIGO DE PRODUCTOS*/

/*==================================================
	sub cuenta
====================================================*/
	
	public $RncsubEmpresa;
	public $gruposubcuenta;
  	public $categoriasubcuenta;


public function ajaxsubcuenta(){

		

		$taRncEmpresa = "Rnc_Empresa_cuentas";
		$valorRncEmpresa = $this->RncsubEmpresa;

		$tagrupocuenta = "id_grupo";
		$valorgrupocuenta = $this->gruposubcuenta;

		$tacategoriacuenta = "id_categoria";
		$valorcategoriacuenta = $this->categoriasubcuenta;
	
	
$respuesta = ControladorContabilidad::ctrsubcuenta($taRncEmpresa, $valorRncEmpresa, $tagrupocuenta, $valorgrupocuenta, $tacategoriacuenta, $valorcategoriacuenta); 

echo json_encode($respuesta);



}/*CIERRE DE FUNCION DE CREAR CODIGO DE PRODUCTOS*/

  public $Rncgenerica;
  public $grupogenerica;
  public $categoriasgenerica;
  public $generica;


public function ajaxgenerica(){

		$tabla = "subgenerica_empresas";

		$taRnc_Empresa_Cuentas = "Rnc_Empresa_Cuentas";
		$Rnc_Empresa_Cuentas = $this->Rncgenerica;

		$taid_grupo = "id_grupo";
		$id_grupo = $this->grupogenerica;

		$taid_categoria = "id_categoria";
		$id_categoria = $this->categoriasgenerica;

		
		$taid_generica = "id_generica";
		$id_generica = $this->generica;


		$respuesta = ModeloContabilidad::mdlMostrarsubcuentas($tabla, $Rnc_Empresa_Cuentas, $taRnc_Empresa_Cuentas, $id_grupo, $taid_grupo, $id_categoria, $taid_categoria, $id_generica, $taid_generica);


echo json_encode($respuesta);



}/*CIERRE DE FUNCION DE CREAR CODIGO DE PRODUCTOS*/


/*==================================================
	sub cuenta
====================================================*/
	public $NRncsubEmpresa;	
	public $Ngruposubcuenta;
  	public $Ncategoriasubcuenta;
  	public $Ngenerica;


public function ajaxncuenta(){


		$taRncEmpresa = "Rnc_Empresa_cuentas";
		$valorRncEmpresa = $this->NRncsubEmpresa;

		$tagrupocuenta = "id_grupo";
		$valorgrupocuenta = $this->Ngruposubcuenta;

		$tacategoriacuenta = "id_categoria";
		$valorcategoriacuenta = $this->Ncategoriasubcuenta;


		$taidgenerica = "id_generica";
		$valoridgenerica = $this->Ngenerica;

		
		$respuesta = ControladorContabilidad::ctrcodigosubcuenta($taRncEmpresa, $valorRncEmpresa, $tagrupocuenta, $valorgrupocuenta, $tacategoriacuenta, $valorcategoriacuenta, $taidgenerica, $valoridgenerica); 

		echo json_encode($respuesta);



}/*CIERRE DE FUNCION DE CREAR CODIGO DE PRODUCTOS*/

public $idgenerica;
public $RncEmpresaEG;
public function ajaxeditargenerica(){

		$RncEmpresaEG = "Rnc_Empresa_cuentas";
		$valorRncEmpresaEG = $this->RncEmpresaEG; 

		$idcuenta = "id";
		$valoridcuenta = $this->idgenerica; 

		$respuesta = ControladorContabilidad::ctreditargenerica($RncEmpresaEG, $valorRncEmpresaEG, $idcuenta, $valoridcuenta); 

		echo json_encode($respuesta);


}
public $idcuenta;
public $RncEmpresaEC;
public function ajaxeditarcuenta(){

		$RncEmpresaEC = "Rnc_Empresa_cuentas";
		$valorRncEmpresaEC = $this->RncEmpresaEC; 


		$idcuenta = "id";
		$valoridcuenta = $this->idcuenta; 

		$respuesta = ControladorContabilidad::ctreditarcuenta($RncEmpresaEC, $valorRncEmpresaEC, $idcuenta, $valoridcuenta); 

		echo json_encode($respuesta);


}

  public $idgrupo;
  public $idCategoria;

	public function ajaxeditargrupo(){

	$idgrupo = "id_grupo";
	$valoridgrupo = $this->idgrupo; 

	$idCategoria = "id_categoria";
	$valoridCategoria = $this->idCategoria; 


	$respuesta = ControladorContabilidad::ctreditargrupo($idgrupo, $valoridgrupo, $idCategoria, $valoridCategoria); 

	echo json_encode($respuesta);



}

  public $idgrupoCon;
  public $idCategoriaCon;
  public $idgenericaCon;
  public $RncEmpresaCon;

	public function ajaxconsultagenerica(){

	$RncEmpresaCon = "Rnc_Empresa_cuentas";
	$valorRncEmpresaCon = $this->RncEmpresaCon; 

	$idgrupo = "id_grupo";
	$valoridgrupo = $this->idgrupoCon; 

	$idCategoria = "id_categoria";
	$valoridCategoria = $this->idCategoriaCon; 

	$idgenerica = "id_generica";
	$valoridgenerica = $this->idgenericaCon;

	

	$respuesta = ControladorContabilidad::ctrconsultagenerica($RncEmpresaCon, $valorRncEmpresaCon, $idgrupo, $valoridgrupo, $idCategoria, $valoridCategoria, $idgenerica, $valoridgenerica); 

	echo json_encode($respuesta);



}


	public $RncEmpresaLD;
  	public $FechaDesde;
  	public $FechaHasta;
  	public $idgrupoDetalle;
  	public $idcategoriaDetalle;
  	public $idgenericaDetalle;
  	public $idcuentaDetalle;
  
	public function ajaxestadoresultado(){

	$Rnc_Empresa_LD = $this->RncEmpresaLD;
    $FechaDesde = $this->FechaDesde;
    $FechaHasta = $this->FechaHasta;
    $idgrupoDetalle = $this->idgrupoDetalle;
    $idcategoriaDetalle = $this->idcategoriaDetalle;
    $idgenericaDetalle = $this->idgenericaDetalle;
    $idcuentaDetalle = $this->idcuentaDetalle;
    $Orden = "id_registro";

    $respuesta = ControladorDiario::ctrVerDetalle($Rnc_Empresa_LD, $FechaDesde, $FechaHasta, $idgrupoDetalle, $idcategoriaDetalle, $idgenericaDetalle, $idcuentaDetalle, $Orden);
           
	echo json_encode($respuesta);



}

	public $Rnc_Empresa_LD;
	public $Rnc_Factura;
	public $NCF;
	public $NAsiento;
	
	public function ajaxcontabilidadvercompras(){

	 $Rnc_Empresa_LD = $this->Rnc_Empresa_LD;
	 $Rnc_Factura = $this->Rnc_Factura;
	 $NCF = $this->NCF;
	 $NAsiento = $this->NAsiento;

	
$respuesta = ControladorDiario::ctrVerAsientosCompras($Rnc_Empresa_LD, $Rnc_Factura, $NCF, $NAsiento);
           
	echo json_encode($respuesta);



}

	public $Rnc_Empresa_LD1;
	public $Rnc_Factura1;
	public $NAsiento1;
	
	public function ajaxcontabilidadver(){

	 $Rnc_Empresa_LD = $this->Rnc_Empresa_LD1;
	 $Rnc_Factura = $this->Rnc_Factura1;
	 $NAsiento = $this->NAsiento1;

	
$respuesta = ControladorDiario::ctrVerAsientosNAsientos($Rnc_Empresa_LD, $Rnc_Factura, $NAsiento);
           
	echo json_encode($respuesta);



 }

}/*CIERR8E DE CLASE DE PRODUCTOS*/




/*==================================================
			GENERAR CODIGO A PARTIR DE ID CATEGORIAS
	====================================================*/
if(isset($_POST["RncEmpresa"])){
	$Codigo = new AjaxContabilidad();
	$Codigo -> RncEmpresa = $_POST["RncEmpresa"];
	$Codigo -> grupocuenta = $_POST["grupocuenta"];
	$Codigo -> categoriacuenta = $_POST["categoriacuenta"];
	$Codigo -> ajaxCrearCodigogenerica();


}


/*==================================================
			sub cuenta
	====================================================*/
if(isset($_POST["RncsubEmpresa"])){
	$subcuenta = new AjaxContabilidad();
	$subcuenta -> RncsubEmpresa = $_POST["RncsubEmpresa"];
	$subcuenta -> gruposubcuenta = $_POST["gruposubcuenta"];
	$subcuenta -> categoriasubcuenta = $_POST["categoriasubcuenta"];
	$subcuenta -> ajaxsubcuenta();


}
if(isset($_POST["Rncgenerica"])){
	$genrica = new AjaxContabilidad();
	$genrica -> Rncgenerica = $_POST["Rncgenerica"];
	$genrica -> grupogenerica = $_POST["grupogenerica"];
	$genrica -> categoriasgenerica = $_POST["categoriasgenerica"];
	$genrica -> generica = $_POST["generica"];
	$genrica -> ajaxgenerica();



}
/*==================================================
			Nsub cuenta
	====================================================*/
if(isset($_POST["NRncsubEmpresa"])){
	$Ncuenta = new AjaxContabilidad();
	$Ncuenta -> NRncsubEmpresa = $_POST["NRncsubEmpresa"];
	$Ncuenta -> Ngruposubcuenta = $_POST["Ngruposubcuenta"];
	$Ncuenta -> Ncategoriasubcuenta = $_POST["Ncategoriasubcuenta"];
	$Ncuenta -> Ngenerica = $_POST["Ngenerica"];
	$Ncuenta -> ajaxncuenta();
}

if(isset($_POST["idgenerica"])){
	$editargenerica = new AjaxContabilidad();
	$editargenerica -> idgenerica = $_POST["idgenerica"];
	$editargenerica -> RncEmpresaEG = $_POST["RncEmpresaEG"];
	$editargenerica -> ajaxeditargenerica();

}

 if(isset($_POST["idgrupo"])) {
 	$grupo = new AjaxContabilidad();
 	$grupo -> idgrupo = $_POST["idgrupo"];
 	$grupo -> idCategoria = $_POST["idCategoria"];
 	$grupo -> ajaxeditargrupo();


 }
if(isset($_POST["idgenericaCon"])) {
 	$generica = new AjaxContabilidad();
 	$generica -> idgrupoCon = $_POST["idgrupoCon"];
 	$generica -> idCategoriaCon = $_POST["idCategoriaCon"];
 	$generica -> idgenericaCon = $_POST["idgenericaCon"];
 	$generica -> RncEmpresaCon = $_POST["RncEmpresaCon"];
 	$generica -> ajaxconsultagenerica();


 }


if(isset($_POST["idcuenta"])){
	$editarcuenta = new AjaxContabilidad();
	$editarcuenta -> idcuenta = $_POST["idcuenta"];
	$editarcuenta -> RncEmpresaEC = $_POST["RncEmpresaEC"];
	$editarcuenta -> ajaxeditarcuenta();

}
if(isset($_POST["RncEmpresaLD"])){
	$verdetalle = new AjaxContabilidad();
	$verdetalle -> RncEmpresaLD = $_POST["RncEmpresaLD"];
	$verdetalle -> FechaDesde = $_POST["FechaDesde"];
	$verdetalle -> FechaHasta = $_POST["FechaHasta"];
	$verdetalle -> idgrupoDetalle = $_POST["idgrupoDetalle"];
	$verdetalle -> idcategoriaDetalle = $_POST["idcategoriaDetalle"];
	$verdetalle -> idgenericaDetalle = $_POST["idgenericaDetalle"];
	$verdetalle -> idcuentaDetalle = $_POST["idcuentaDetalle"];
	$verdetalle -> ajaxestadoresultado();

}

if(isset($_POST["Rnc_Empresa_LD"])){
	$verdetallecompras = new AjaxContabilidad();
	$verdetallecompras -> Rnc_Empresa_LD = $_POST["Rnc_Empresa_LD"];
	$verdetallecompras -> Rnc_Factura = $_POST["Rnc_Factura"];
	$verdetallecompras -> NCF = $_POST["NCF"];
	$verdetallecompras -> NAsiento = $_POST["NAsiento"];
	$verdetallecompras -> ajaxcontabilidadvercompras();

}

if(isset($_POST["Rnc_Empresa_LD1"])){
	$verdetalleAsientos = new AjaxContabilidad();
	$verdetalleAsientos -> Rnc_Empresa_LD1 = $_POST["Rnc_Empresa_LD1"];
	$verdetalleAsientos -> Rnc_Factura1 = $_POST["Rnc_Factura1"];
	$verdetalleAsientos -> NAsiento1 = $_POST["NAsiento1"];
	$verdetalleAsientos -> ajaxcontabilidadver();

}

