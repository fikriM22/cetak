<?php 
require __DIR__.'/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

ob_start();
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $data['no_usulan']; ?></title>
</head>
<body>
hasil cetak
</body>
</html>

<?php
$filename="cetak".".pdf"; 
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.$content.'</page>';

 try
 {
  $html2pdf = new HTML2PDF('P','F4','en', false, 'ISO-8859-15',array(10, 10, 0, 0));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
  $html2pdf->Output($filename);
 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>