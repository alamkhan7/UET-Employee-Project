<?php
require_once './script/dompdf/autoload.inc.php';
require_once './script/simple_html_dom.php' ;

//reference the Dompdf namespace
use Dompdf\Dompdf;



function render($htmlFile,$paperSize,$paperOrientation,$filename)
 {
  // require_once './dompdf/autoload.inc.php';

  // use Dompdf\Dompdf ;
  //instantiate and use the dompdf class
  $dompdf = new DOMPDF();

  $dompdf->load_html($htmlFile);

  // (Optional) Setup the paper size and orientation
  $dompdf->set_paper($paperSize, $paperOrientation );

  // Render the HTML as PDF
  $dompdf->render();

  /* Output the generated PDF to Browser
    stream() sends the resulting PDF as an attachment to the browser. The stream() method has an optional second parameter, an array of options

    Accept-Ranges – boolean, send “Accept-Ranges” header (false by default).
    Attachment – boolean, send “Content-Disposition: attachment” header forcing the browser to display a save prompt (true by default).
    compress – boolean, enable content compression (true by default).
    $dompdf->stream("$filename.pdf",array("Attachment"=>0));
  */
  $dompdf->stream("$filename.pdf");
 }

// $html = <<<'ENDHTML'
// <html>
//  <body>
//   <h1>Hello Dompdf</h1>
//  </body>
// </html>
// ENDHTML;

$empCode = $_POST['empCode'];
$empName = $_POST['empName'];
$date = date('d-m-y');

$page = "http://localhost/Project/pdfstyle.php?search=".$empCode."&submit=" ;

$html = file_get_contents($page) ;


$filename = "Id-".$empCode . "_" . $empName . "_" . $date ;
$paperSize = "A4" ;
$paperOrientation = "portrait" ;
render($html,$paperSize,$paperOrientation,$filename);



?>