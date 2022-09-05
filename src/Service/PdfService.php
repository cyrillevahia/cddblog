<?php
namespace App\Service;

use Dompdf\Dompdf;
use Dompdf\Options;

class PdfService {
    private $domPdf;
    public function __construct() {
        $this->domPdf = new DomPdf();

        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Garamond');
       // $this->domPdf->setPaper('A4', 'landscape');        
        $this->domPdf->setOptions($pdfOptions);

        $orientation = 'landscape';
        $customPaper = array(0,0,950,950);
        $this->domPdf->setPaper($customPaper, $orientation);

    }
    public function showPdfFile($html){
        $this->domPdf->loadHtml($html);
        $this->domPdf->render();
        $this->domPdf->stream("detail.pdf", [
            'Attachement'=> false
        ]);
    }
    public function generateBinaryPdf($html){
        $this->domPdf->loadHtml($html);
        $this->domPdf->render();
        $this->domPdf->output();
    }
}