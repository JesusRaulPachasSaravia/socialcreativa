<?php

require_once '../vendor/autoload.php';


//Namespace 
use Spipu\Html2Pdf\Html2Pdf;//Core
use Spipu\Html2Pdf\Exception\Html2PdfException;//Manejo de errores
use Spipu\Html2Pdf\Exception\ExceptionFormatter;// Detallar el error

try{

  //Variables globales de prueba
  ob_start();

  //contiene todo lo que será renderizado PDF
  $data = "";

  //Páginas externas(opcional):
  // include '';

  //Depuración del contenido 
  $data .= ob_get_clean();

  //Creando espacio
  $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'utf-8', array(10,10,15,15));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($data);

  $html2pdf->output('reporte-demo.pdf');

}
catch(Html2PdfException $e){
  $html2pdf->clean();
  $formatter = new ExceptionFormatter($e);
  echo $formatter->getHtmlMessage();
}

?>