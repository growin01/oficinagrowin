
<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class ControladorComentarios{

static public function ctrMostrarComentarios($Rnc_Empresa_Comentario, $Orden, $NReporte){

			$tabla = "recibocomentarios_empresas";
			$taRncEmpresaComentario = "Rnc_Empresa_Comentario";
			$taNReporte = "NReporte";


		$respuesta = ModeloComentarios::mdlMostrarComentarios($tabla, $taRncEmpresaComentario, $Rnc_Empresa_Comentario, $Orden, $NReporte, $taNReporte);

		return $respuesta;



	}
	static public function ctrmensajes($Rnc_Empresa_Comentario, $Orden, $idUsuario, $NombreUsuario, $taidUsuario, $taNombreUsuario){

			$tabla = "comentarios_empresas";
			$taRncEmpresaComentario = "Rnc_Empresa_Comentario";


		$respuesta = ModeloComentarios::mdlmensajes($tabla, $taRncEmpresaComentario, $Rnc_Empresa_Comentario, $Orden, $idUsuario, $NombreUsuario, $taidUsuario, $taNombreUsuario);

		return $respuesta;



	}
	static public function ctrmensajesNuevo($Rnc_Empresa_Comentario, $Orden, $idUsuario, $NombreUsuario, $taidUsuario, $taNombreUsuario, $taEstado, $Estado){

			$tabla = "comentarios_empresas";
			$taRncEmpresaComentario = "Rnc_Empresa_Comentario";


		$respuesta = ModeloComentarios::mdlmensajesNuevo($tabla, $taRncEmpresaComentario, $Rnc_Empresa_Comentario, $Orden, $idUsuario, $NombreUsuario, $taidUsuario, $taNombreUsuario, $taEstado, $Estado);

		return $respuesta;



	}

static public function ctrCrearComentario(){
	if(isset($_POST["RncEmpresaComentario"])){


		$tabla = "recibocomentarios_empresas";
				$taRnc_Empresa = "Rnc_Empresa_Comentario";
				$Rnc_Empresa= $_POST["RncEmpresaComentario"];
				$taNReporte = "NReporte";
				$NReporte = $_POST["NAsiento"];
			

			$AsientoRepetido = ModeloComentarios::MdlNComentarioRepetido($tabla, $taRnc_Empresa, $Rnc_Empresa, $taNReporte, $NReporte);

		foreach ($AsientoRepetido  as $key => $value) {
		
				if($value["Rnc_Empresa_Comentario"] == $Rnc_Empresa &&  $value["NReporte"] == $NReporte){

						echo '<script>
										swal({

											type: "error",
											title: "Este Código de Mensaje ya esta registrado!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "comentarios";
													}

													});

										</script>';
								exit;

				}
		}
		/***********FIN VALIDACION DE PREMACHT DE INPUT***********************/
	/***********INICIO VALIDACION FECHA AÑOS MES**************************/

	$fechaano = substr($_POST["FechaComentariomes"], 0, 4);
	$fechames = substr($_POST["FechaComentariomes"], -2);

	if(strlen($_POST["FechaComentariomes"]) != 6){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año Mes debe tener un Numero de Cantidad de Caracteres Igual a 6!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "comentarios";
													
													});
												
								</script>';	
					exit;
	}
	if($fechaano < 2018){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año debe ser mayor a 2018!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "comentarios";
													
													});
												
								</script>';	
					exit;
	}
	if($fechaano > 2026){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año debe ser menor a 2022!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "comentarios";
													
													});
												
								</script>';	
					exit;

	} 				
	if($fechames < 0){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Mes debe ser un mes valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "comentarios";
													
													});
												
								</script>';	
					exit;

	}
	if($fechames > 12){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Mes debe ser un mes valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "comentarios";
													
													});
												
								</script>';	
					exit;
	}



	/***********FIN VALIDACION FECHA AÑOS MES**************************/

	/**********INCIO VALIDACION FECHA DIA ******************************/
	if(strlen($_POST["FechaComentariodia"]) != 2){
		echo '<script>
					swal({

						type: "error",
						title: "¡Fecha Día debe tener un Número de Cantidad de Caracteres Igual a 2!",
						showConfirmButton: false,
						timer: 6000
						}).then(()=>{
						window.location = "comentarios";
													
							});
												
			</script>';	
					exit;
	}
	if($_POST["FechaComentariodia"] < 0){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "comentarios";
													
													});
												
								</script>';	
					exit;
	}
	if($_POST["FechaComentariodia"] > 31){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "comentarios";
													
													});
												
								</script>';	
					exit;
	}

/**********FIN VALIDACION FECHA DIA ******************************/
	$tabla = "usuarios_empresas";
	$id = "id";
	$idUsuario = $_POST["UsuarioDirigido"];

	$UsuarioDirigido = ModeloUsuarios::MdlModalEditarUsuario($tabla, $id, $idUsuario);
	$id_Usuario_Dirigido = $UsuarioDirigido["id"];
	$Nombre_Usuario_Dirigito = $UsuarioDirigido["Nombre"];
	$Correodirigido = $UsuarioDirigido["emailusuario"];

	$tabla = "comentarios_empresas";
	$Estado = 1;
	$Accion = "EMITIDO";
	$datos = array("Rnc_Empresa_Comentario" => $_POST["RncEmpresaComentario"],
				"NReporte" => $_POST["NAsiento"],
				"id_Usuario" => $_POST["idusuariocreador"],
				"Nombre_Usuario" => $_POST["NombreCreador"],
				"id_Usuario_Dirigido" => $id_Usuario_Dirigido,
				"Nombre_Usuario_Dirigito" => $Nombre_Usuario_Dirigito,
				"TipoComentario" => $_POST["TipoComentario"],
				"Asunto" => $_POST["Asunto"],
				"Comentario" => $_POST["Comentario"],
				"Estado" => $Estado,
				"FechaAnoMes" => $_POST["FechaComentariomes"],
				"Fechadia" => $_POST["FechaComentariodia"],
				"Accion" => $Accion);


	$respuesta = ModeloComentarios::MdlCrearComentario($tabla, $datos);
	$tabla = "recibocomentarios_empresas";
	$Estado = 1;

	$datos = array("Rnc_Empresa_Comentario" => $_POST["RncEmpresaComentario"],
				"NReporte" => $_POST["NAsiento"],
				"Nombre_Usuario" => $_POST["NombreCreador"],
				"Nombre_Usuario_Dirigito" => $Nombre_Usuario_Dirigito,
				"TipoComentario" => $_POST["TipoComentario"],
				"Asunto" => $_POST["Asunto"],
				"FechaAnoMes" => $_POST["FechaComentariomes"],
				"Fechadia" => $_POST["FechaComentariodia"],
				"Estado" => $Estado);


	$respuesta = ModeloComentarios::MdlCrearrecibocomentarios($tabla, $datos);

	$tabla = "correlativos_no_fiscal";

	$Tipo_NCF = "SMS";
			
			
	$datos = array("Rnc_Empresa" => $_POST["RncEmpresaComentario"],
					"Tipo_NCF" => $Tipo_NCF,
					"NCF_Cons" => $_POST["CodAsiento"]);

$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);


if($Correodirigido == ""){
	 echo '<script>
								swal({

									type: "warning",
									title: "¡ATENCION EL USUARIO NO TIENE CORREO ASIGNADO PARA ENVIAR, EL AVISO QUE TIENE UN MENSAJE NUEVO EN EL SISTEMA GROWIN!", 
									text: "El mensaje se envio por el sistema Growinrd Correctamente",
									showConfirmButton: false,
									timer: 8000
									}).then(()=>{
									window.location = "comentarios";
													
													});
												
								</script>';	


}else{ 
require_once "extensiones/PHPMailer/Exception.php";
require_once "extensiones/PHPMailer/PHPMailer.php";
require_once "extensiones/PHPMailer/SMTP.php";



// La instanciación y el paso de `true` habilita excepciones 
$mail = new PHPMailer(true);
$mail->CharSet = "UTF-8";

try {

$mail->IsSMTP(); // Using SMTP.
$mail->SMTPDebug = 1;
$mail->SMTPAuth = false; // Enables SMTP authentication.
$mail->Host = "localhost"; // GoDaddy support said to use localhost
$mail->Port = 25;
$mail->SMTPSecure = 'none';

//havent read yet, but this made it work just fine
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->addReplyTo($_POST["CorreoCreador"], $_POST["NombreCreador"]);
$mail->setFrom('noreply@growinrd.com', 'Correo GrowinRD');
$mail->addAddress($Correodirigido, $Nombre_Usuario_Dirigito);
$mail->addCC($_POST["CorreoCreador"], $_POST["NombreCreador"]);// Agregar un destinatario 

//$mail -> addAttachment ( 'vistas/img/plantilla/logocorreo.jpg' , 'logocorreo.jpg' );    // Nombre opcional

$mail->AddEmbeddedImage("vistas/img/plantilla/logocorreo.jpg", "my-attach", "logocorreo.jpg");
$mail->isHTML(true);  // Establecer el formato de correo electrónico en HTML 
$mail->Subject = 'Correo Growinrd de Empresa:_'.$_POST["NombreEmpresa"];
 $Body ='
    <table width="100%" border="0" cellspacing="10" cellpadding="0">
        <tr>
            <td>Estimado usuario le han enviado un mensaje desde sistema Growinrd.</td>
        </tr>
        <tr>
            <td style="font-weight: bold">El Usuario: '.$_POST["NombreCreador"].'.</td>
        </tr>
        <tr>
            <td style="font-weight: bold">Tipo de Comentario: '.$_POST["TipoComentario"].'.</td>
        </tr>
        <tr>
            <td style="font-weight: bold">Empresa: '.$_POST["NombreEmpresa"].'.</td>
        </tr>
        <tr>
            <td style="font-weight: bold">RNC: '.$_POST["RncEmpresaComentario"].'.</td>
        </tr>
        <tr>
            <td>
                <p style="color:black">Recuerde que el siguiente correo electrónico es totalmente confidencial, No responda a este correo electrónico.</p>
                <p style="color:black; font-weight: bold">Atentamente.</p>
                <p style="color:black; font-weight: bold">Plataforma automatizada del portal www.growinrd.com</p>
                <p style="color:black; font-weight: bold">Por Favor ingrese a www.growinrd.com</p>
            </td>
        </tr>
    </table>';
    
     $Body.= '<img alt="PHPMailer" src="cid:my-attach">';
    
     $mail->Body = $Body;     
   
   
    $mail->send();
   echo '<script>
						swal({			
							type: "success",
							title: "¡El Comentario Se Guardo Correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result)=>{
						if(result.value){
							window.location = "comentarios";
							}
							});
						</script>';
} catch(Exception $e) {
    echo '<script>
								swal({

									type: "error",
									title: "¡No se Puedo enviar el Correo al Usuario!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "comentarios";
													
													});
												
								</script>';	
}
}

	}/*cierre isset*/

}/*cierre funcion*/

static public function ctrContestarComentario(){
	if(isset($_POST["RncEmpresaComentarioCon"])){


	
		/***********FIN VALIDACION DE PREMACHT DE INPUT***********************/
	/***********INICIO VALIDACION FECHA AÑOS MES**************************/

	$fechaano = substr($_POST["FechaAnoMesCon"], 0, 4);
	$fechames = substr($_POST["FechaAnoMesCon"], -2);

	if(strlen($_POST["FechaAnoMesCon"]) != 6){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año Mes debe tener un Numero de Cantidad de Caracteres Igual a 6!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "bandejaentrada";
													
													});
												
								</script>';	
					exit;
	}
	if($fechaano < 2018){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año debe ser mayor a 2018!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "bandejaentrada";
													
													});
												
								</script>';	
					exit;
	}
	if($fechaano > 2026){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año debe ser menor a 2022!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "bandejaentrada";
													
													});
												
								</script>';	
					exit;

	} 				
	if($fechames < 0){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Mes debe ser un mes valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "bandejaentrada";
													
													});
												
								</script>';	
					exit;

	}
	if($fechames > 12){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Mes debe ser un mes valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "bandejaentrada";
													
													});
												
								</script>';	
					exit;
	}



	/***********FIN VALIDACION FECHA AÑOS MES**************************/

	/**********INCIO VALIDACION FECHA DIA ******************************/
	if(strlen($_POST["FechadiaCon"]) != 2){
		echo '<script>
					swal({

						type: "error",
						title: "¡Fecha Día debe tener un Número de Cantidad de Caracteres Igual a 2!",
						showConfirmButton: false,
						timer: 6000
						}).then(()=>{
						window.location = "bandejaentrada";
													
							});
												
			</script>';	
					exit;
	}
	if($_POST["FechadiaCon"] < 0){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "bandejaentrada";
													
													});
												
								</script>';	
					exit;
	}
	if($_POST["FechadiaCon"] > 31){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "bandejaentrada";
													
													});
												
								</script>';	
					exit;
	}

/**********FIN VALIDACION FECHA DIA ******************************/
	$tabla = "usuarios_empresas";
	$id = "id";
	$idUsuario = $_POST["UsuarioDirigidoCon"];

	$UsuarioDirigido = ModeloUsuarios::MdlModalEditarUsuario($tabla, $id, $idUsuario);
	$id_Usuario_Dirigido = $UsuarioDirigido["id"];
	$Nombre_Usuario_Dirigito = $UsuarioDirigido["Nombre"];
	$Correodirigido = $UsuarioDirigido["emailusuario"];

	$tabla = "comentarios_empresas";
	$Estado = 1;
	$Accion = "CONTESTADO";
	$datos = array("Rnc_Empresa_Comentario" => $_POST["RncEmpresaComentarioCon"],
				"NReporte" => $_POST["NReporteCon"],
				"id_Usuario" => $_POST["idusuariocreadorCon"],
				"Nombre_Usuario" => $_POST["NombreCreadorCon"],
				"id_Usuario_Dirigido" => $id_Usuario_Dirigido,
				"Nombre_Usuario_Dirigito" => $Nombre_Usuario_Dirigito,
				"TipoComentario" => $_POST["tipoCon"],
				"Asunto" => $_POST["AsuntoContestar"],
				"Comentario" => $_POST["ComentarioCon"],
				"Estado" => $Estado,
				"FechaAnoMes" => $_POST["FechaAnoMesCon"],
				"Fechadia" => $_POST["FechadiaCon"],
				"Accion" => $Accion);


	$respuesta = ModeloComentarios::MdlCrearComentario($tabla, $datos);
	

	$tabla = "recibocomentarios_empresas";

	$taRnc_Empresa_Comentario = "Rnc_Empresa_Comentario";
	$Rnc_Empresa_Comentario = $_POST["RncEmpresaComentarioCon"];
	
	$taNReporte = "NReporte";

	$taEstado = "Estado";
	
	$NReporte = $_POST["NReporteCon"];
	$Estado = $_POST["Seguimiento"];


	$respuesta = ModeloComentarios::MdlEstadoComentario($tabla, $taRnc_Empresa_Comentario, $Rnc_Empresa_Comentario, $taNReporte, $taEstado, $NReporte, $Estado);



if($Correodirigido == ""){
	 echo '<script>
								swal({

									type: "warning",
									title: "¡ATENCION EL USUARIO NO TIENE CORREO ASIGNADO PARA ENVIAR, EL AVISO QUE TIENE UN MENSAJE NUEVO EN EL SISTEMA GROWIN!", 
									text: "El mensaje se envio por el sistema Growinrd Correctamente",
									showConfirmButton: false,
									timer: 8000
									}).then(()=>{
									window.location = "bandejaentrada";
													
													});
												
								</script>';	


}else{ 
require_once "extensiones/PHPMailer/Exception.php";
require_once "extensiones/PHPMailer/PHPMailer.php";
require_once "extensiones/PHPMailer/SMTP.php";



// La instanciación y el paso de `true` habilita excepciones 
$mail = new PHPMailer(true);
$mail->CharSet = "UTF-8";


try {
     // Configuración del servidor 
$mail->IsSMTP(); // Using SMTP.
$mail->SMTPDebug = 1;
$mail->SMTPAuth = false; // Enables SMTP authentication.
$mail->Host = "localhost"; // GoDaddy support said to use localhost
$mail->Port = 25;
$mail->SMTPSecure = 'none';

//havent read yet, but this made it work just fine
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
   
	$mail->addReplyTo($_POST["CorreoCreadorCon"], $_POST["NombreCreadorCon"]);
    $mail->setFrom('noreplygrowin@gmail.com', 'Correo');
    $mail->addAddress($Correodirigido, $Nombre_Usuario_Dirigito);
    $mail->addCC($_POST["CorreoCreadorCon"], $_POST["NombreCreadorCon"]);// Agregar un destinatario 

//$mail -> addAttachment ( 'vistas/img/plantilla/logocorreo.jpg' , 'logocorreo.jpg' );    // Nombre opcional

    $mail->AddEmbeddedImage("vistas/img/plantilla/logocorreo.jpg", "my-attach", "logocorreo.jpg");

    $mail->isHTML(true);                                  // Establecer el formato de correo electrónico en HTML 
    $mail->Subject = 'Correo Growinrd de Empresa:_'.$_POST["NombreEmpresaCon"];
    $Body ='
    <table width="100%" border="0" cellspacing="10" cellpadding="0">
        <tr>
            <td>Estimado usuario ha Contestado un mensaje sistema Growinrd.</td>
        </tr>
        <tr>
            <td style="font-weight: bold">El Usuario: '.$_POST["NombreCreadorCon"].'.</td>
        </tr>
        <tr>
            <td style="font-weight: bold">Tipo de Comentario: '.$_POST["tipoCon"].'.</td>
        </tr>
        <tr>
            <td style="font-weight: bold">Empresa: '.$_POST["NombreEmpresaCon"].'.</td>
        </tr>
        <tr>
            <td style="font-weight: bold">RNC: '.$_POST["RncEmpresaComentarioCon"].'.</td>
        </tr>
        <tr>
            <td style="font-weight: bold">N° de Seguimiento: '.$_POST["NReporteCon"].'.</td>
        </tr>
        <tr>
            <td>
                <p style="color:black">Recuerde que el siguiente correo electrónico es totalmente confidencial, No responda a este correo electrónico.</p>
                <p style="color:black"></p>
                <p style="color:black; font-weight: bold">Atentamente.</p>
                <p style="color:black; font-weight: bold">Plataforma automatizada del portal www.growinrd.com</p>
                <p style="color:black; font-weight: bold">Por Favor ingrese a www.growinrd.com</p>
            </td>
        </tr>
    </table>';
    
     $Body.= '<img alt="PHPMailer" src="cid:my-attach">';
    
     $mail->Body = $Body;     
   
   
    $mail->send();
   echo '<script>
						swal({			
							type: "success",
							title: "¡El Comentario Se Guardo Correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result)=>{
						if(result.value){
							window.location = "bandejaentrada";
							}
							});
						</script>';
} catch(Exception $e) {
    echo '<script>
								swal({

									type: "error",
									title: "¡No se Puedo enviar el Correo al Usuario!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "bandejaentrada";
													
													});
												
								</script>';	
}
}

	}/*cierre isset*/

}/*cierre funcion*/


static public function ctrAVISO(){
	if(isset($_POST["RncEmpresaComentario"])){




require_once "extensiones/PHPMailer/Exception.php";
require_once "extensiones/PHPMailer/PHPMailer.php";
require_once "extensiones/PHPMailer/SMTP.php";



// La instanciación y el paso de `true` habilita excepciones 
$mail = new  PHPMailer (true);
$mail->CharSet = "UTF-8";

try {
     // Configuración del servidor 
    $mail->SMTPDebug = 0;//Habilita la salida de depuración detallada 
    $mail->isSMTP ();//Enviar usando SMTP 
    $mail->Host = 'smtp.gmail.com';  
    $mail->SMTPAuth = true;
    $mail->Username= 'noreplygrowin@gmail.com';
    $mail->Password  = 'Venkeylaso011212';                           
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;// Habilite el cifrado TLS; `PHPMailer :: ENCRYPTION_SMTPS` alentó 
    $mail->Port = 587;                                    // Puerto TCP para 
    // Destinatarios 
   
	$mail->addReplyTo($_POST["CorreoCreador"], $_POST["NombreCreador"]);
   
   $mail->setFrom('noreplygrowin@gmail.com', 'Correo de GrowinRD');
   $mail->addAddress ('laurarojas1986@gmail.com', 'LAURA ROJAS');
   $mail->addAddress ('joseantoniozapata@hotmail.com', 'ZAPATA');
   $mail->addAddress('kevin.zapatasantiago@gmail.com', 'KEVIN BRASSINGTON');
   $mail->addAddress('diegodeaza@zapatasantiago.com', 'DIEGO');
   $mail->addAddress('alexanderreynoso@zapatasantiago.com', 'NICOLE');
   $mail->addAddress('oficina@zapatasantiago.com', 'TERESA');
   $mail->addAddress('FRANCISCOGONZALEZ@zapatasantiago.com', 'FRANCISCO');
   $mail->addAddress('606@zapatasantiago.com', 'ALGENIS');
   $mail->addAddress('brauly2442@gmail.com', 'BRAULY');
   $mail->addAddress('Brayanzapatasantiago@gmail.com', 'BRAYAN');
   $mail->addAddress('hairosantos@gmail.com', 'HAIRO');
   $mail->addAddress('roberbz24@gmail.com', 'ROBERKIS');
//$mail->addCC ('kevin.zapatasantiago@gmail.com', 'kevin');// Agregar un destinatario 

//$mail -> addAttachment ( 'vistas/img/plantilla/logocorreo.jpg' , 'logocorreo.jpg' );    // Nombre opcional

    $mail->AddEmbeddedImage("vistas/img/plantilla/logocorreo.jpg", "my-attach", "logocorreo.jpg");

    $mail->isHTML(true);                                  // Establecer el formato de correo electrónico en HTML 
    $mail->Subject = 'Bienvenida de Correo Electronico de GrowinRD';
    $Body ='
    <table width="100%" border="0" cellspacing="10" cellpadding="0">
       
        <tr>
            <td>
                 <p style="color:black">Estimados usuarios, les damos la más cordial BIENVENIDA al nuevo módulo de correo del sistema administrativo - contable Growin, el cuál</p>
      <p style="color:black">está diseñado para que cada uno de los usuarios de la empresa puedan interactuar y mantener una comunicación directa, rápida y eficiente.</p>
      <p style="color:black">En el momento que le sea enviado un mensaje, le llegara una notificación de aviso a su correo personal.</p>
     
				<p style="color:black">por favor responder el correo como recibido.</p>
				<p style="color:black"></p>
                <p style="color:black; font-weight: bold">Atentamente.</p>
                <p style="color:black; font-weight: bold">Plataforma automatizada del portal www.growinrd.com</p>
                <p style="color:black; font-weight: bold">Por Favor ingrese a www.growinrd.com</p>
                 <p style="color:black; font-weight: bold">SISTEMA ADMINISTRATIVO - CONTABLE</p>
            </td>
        </tr>
    </table>';
    
     $Body.= '<img alt="PHPMailer" src="cid:my-attach">';
    
     $mail->Body = $Body;     
   
   
    $mail->send();
   echo '<script>
						swal({			
							type: "success",
							title: "¡El Comentario Se Guardo Correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result)=>{
						if(result.value){
							window.location = "bandejaentrada";
							}
							});
						</script>';
} catch(Exception $e) {
    echo '<script>
								swal({

									type: "error",
									title: "¡No se Puedo enviar el Correo al Usuario!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "bandejaentrada";
													
													});
												
								</script>';	
}


	}/*cierre isset*/

}/*cierre funcion*/


}/*CIERRE CLASS*/
