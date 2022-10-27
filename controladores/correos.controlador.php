<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ControladorCorreos {

static public function ctrCorreoFactura(){
	if(isset($_POST["codigoVenta"]) && isset($_POST["CorreoEmpresa"])){


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
$mail->addReplyTo($_POST["CorreoEmpresa"], $_POST["NombreEmpresa"]);
$mail->setFrom('noreply@growinrd.com', 'FACTURA_'.$_POST["NombreEmpresa"]);
$mail->addAddress($_POST["CorreoEmpresaDirigida"], $_POST["nombreCliente"]);
$mail->addCC($_POST["CorreoEmpresa"], $_POST["NombreEmpresa"]);// Agregar un destinatario 

//$mail -> addAttachment ( 'vistas/img/plantilla/logocorreo.jpg' , 'logocorreo.jpg' );    // Nombre opcional
$url = 'http://www.growinrd.com/extensiones/tcpdf/pdf/Ejecutiva.php?Codigo='.$_POST[
"codigoVenta"];
$fichero = file_get_contents($url);
$mail->addStringAttachment($fichero, 'FACTURA.pdf');

$mail->AddEmbeddedImage("vistas/img/plantilla/logocorreo.jpg", "my-attach", "logocorreo.jpg");
$mail->isHTML(true);  // Establecer el formato de correo electrónico en HTML 
$mail->Subject = $_POST["Asunto"];
$Body = '<table width="60%" border="0" cellspacing="10" cellpadding="0">
     
        <tr>
            <td>
                <p style="text-align:justify;">'.$_POST["Comentario"].'</p>
                
            </td>
        </tr>
    </table>';

 $Body .='
    <table width="100%" border="0" cellspacing="10" cellpadding="0">
     
        <tr>
            <td>
                <p style="color:black">Recuerde que el siguiente correo electrónico es totalmente confidencial</p>
                <p style="color:black; font-weight: bold">Atentamente.</p>
                <p style="color:black; font-weight: bold">Plataforma automatizada del portal www.growinrd.com</p>
                
            </td>
        </tr>
    </table>';
    
   $Body.= '<img alt="PHPMailer" src="cid:my-attach">';
    
     $mail->Body = $Body;     
   
   
    $mail->send();
   echo '<script>
						swal({			
							type: "success",
							title: "¡Correo fue Enviado Exitosamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result)=>{
						if(result.value){
							window.location = "ventas";
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
									window.location = "ventas";
													
													});
												
								</script>';	
}

	}/*cierre isset*/

	}/*cierre funcion*/

static public function ctrCorreoFacturaNo(){
	if(isset($_POST["codigoVentaNo"]) && isset($_POST["CorreoEmpresaNo"])){


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
$mail->addReplyTo($_POST["CorreoEmpresaNo"], $_POST["NombreEmpresaNo"]);
$mail->setFrom('noreply@growinrd.com', 'FACTURA_'.$_POST["NombreEmpresaNo"]);
$mail->addAddress($_POST["CorreoEmpresaDirigidaNo"], $_POST["nombreClienteNo"]);
$mail->addCC($_POST["CorreoEmpresaNo"], $_POST["NombreEmpresaNo"]); 

if($_POST["tipo_FacturaNo"] == 1){
$url = 'http://www.growinrd.com/extensiones/tcpdf/pdf/facturaCon.php?Codigo='.$_POST["codigoVentaNo"];


}else{
$url = 'http://www.growinrd.com/extensiones/tcpdf/pdf/facturaNo.php?Codigo='.$_POST["codigoVentaNo"];

}



$fichero = file_get_contents($url);
$mail->addStringAttachment($fichero, 'FACTURA.pdf');

$mail->AddEmbeddedImage("vistas/img/plantilla/logocorreo.jpg", "my-attach", "logocorreo.jpg");
$mail->isHTML(true);  // Establecer el formato de correo electrónico en HTML 
$mail->Subject = $_POST["Asunto"];
$Body = '<table width="60%" border="0" cellspacing="10" cellpadding="0">
     
        <tr>
            <td>
                <p style="text-align:justify;">'.$_POST["Comentario"].'</p>
                
            </td>
        </tr>
    </table>';

 $Body .='
    <table width="100%" border="0" cellspacing="10" cellpadding="0">
     
        <tr>
            <td>
                <p style="color:black">Recuerde que el siguiente correo electrónico es totalmente confidencial.</p>
                <p style="color:black; font-weight: bold">Atentamente.</p>
                <p style="color:black; font-weight: bold">Plataforma automatizada del portal www.growinrd.com</p>
               
            </td>
        </tr>
    </table>';
    
   $Body.= '<img alt="PHPMailer" src="cid:my-attach">';
    
     $mail->Body = $Body;     
   
   
    $mail->send();
   echo '<script>
						swal({			
							type: "success",
							title: "¡Correo fue Enviado Exitosamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result)=>{
						if(result.value){
							window.location = "ventas";
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
									window.location = "ventas";
													
													});
												
								</script>';	
}

	}/*cierre isset*/

	}/*cierre funcion*/

}/*cierre class*/

