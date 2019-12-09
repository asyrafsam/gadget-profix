<?php

tcpdf();
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// $obj_pdf->SetCreator(PDF_CREATOR);
$title = "PDF Report";
$obj_pdf->SetTitle($title);
// $obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();

foreach ($data as $c) {
	

echo $html = '<h1>Client Details</h1>
<table cellpadding="1" cellspacing="1" border="1" style="text-align:center;">
	<thead>
	    <tr>
	      <th>Client Name</th>
	      <th>Company</th>
	      <th>Address</th>
	      <th>Email</th>
	      <th>Telephone</th>
	      <th>Action</th>
	    </tr>
  	</thead>
  	<tfoot>
	    <tr>
	      <th>'.$c->c_name.'</th>
	      <th>Company</th>
	      <th>Address</th>
	      <th>Email</th>
	      <th>Telephone</th>
	      <th>Action</th>
    	</tr>
  	</tfoot>
</table>';
}

// output the HTML content
$obj_pdf->writeHTML($html, true, false, true, false, '');
ob_end_clean();
$obj_pdf->Output('output.pdf', 'I');
?>