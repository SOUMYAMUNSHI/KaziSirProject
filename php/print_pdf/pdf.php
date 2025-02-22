<?php
require("../../vendor/autoload.php");
use Dompdf\Dompdf;

$html = $_REQUEST["html"];
$dompdf = new Dompdf;
$dompdf->loadHtml($html);
$dompdf->setPaper("A4", "portrait");
$dompdf->render();
$dompdf->stream("sample.pdf", ["Attachment" => false]);

?>