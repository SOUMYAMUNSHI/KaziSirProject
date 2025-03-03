<?php
$subject = htmlspecialchars($_REQUEST["subject"]);

include_once("../../pages/components/sub_components/show_question.php");

require("../../vendor/autoload.php");
use Dompdf\Dompdf;

$header = '<div style="text-align:center">
        <h1 class="heading">Kazi Sir Question Bank</h1>
        <h4 class="heading">Subject: ' . $subject . '</h4>
        <hr>
        </div>';

$dompdf = new Dompdf;
$dompdf->loadHtml($header);
$dompdf->setPaper("A4", "portrait");
$dompdf->render();
$dompdf->stream("sample.pdf", ["Attachment" => false]);

?>