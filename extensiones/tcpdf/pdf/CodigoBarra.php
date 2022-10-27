<?php

require_once('tcpdf_include.php');




   
class imprimirCodigoBarra{
     

    public $CodigoBarra;
    public $MaquetaBarra;

    public function traerImpresionCodigoBarra(){

 $CodigoBarra = $this->CodigoBarra;
 $MaquetaBarra = $this->MaquetaBarra;

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);

$pdf -> AddPage('L', 'A7');
// print a message


// -----------------------------------------------------------------------------

$pdf->SetFont('helvetica', '', 14);

// define barcode style
$style = array(
    'position' => '',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => false,
    'cellfitalign' => '',
    'border' => false,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255),
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 20,
    'stretchtext' => 4
);




// add a page
$txt = $CodigoBarra;


$style['position'] = 'C';
$pdf->write1DBarcode($CodigoBarra, 'C128A', '', '', '', 30, 7, $style, 'N');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_027.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
}

}

$CodigoBarra = new imprimirCodigoBarra();
$CodigoBarra -> CodigoBarra = $_GET["CodigoBarra"];
$CodigoBarra -> MaquetaBarra = $_GET["MaquetaBarra"];
$CodigoBarra -> traerImpresionCodigoBarra();

 ?>

