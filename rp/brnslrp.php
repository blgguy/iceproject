<?php
//start session
session_start();
// include class file.
require_once('../inc/engine.class.php');
// call the class obj
$user = new engine();
//redirect if not logged in
if (!$user->im_logIn() || (trim ($user->session()) == '')) {
  $user->rd('../signout.php');
}
$ky = $user->session();
$details = $user->viewById('mem74fi4rdh', $ky);
  foreach ($details as $key) {
      $role     = $key['codeKey'];
      $Name     = $key['firstName'].' '.$key['lastName'];
      $branch   = $key['branch'];
}

  $bdata      = $user->branchReport('itemsleft', $branch);
  $salesdata  = $user->branchReport('salesreport78u', $branch);

if ($role === 'kitchen') {
  $user->rd('../dashboard.php');
}else{

// TCPDF Script.......-----------------

require_once('tcpdf_include.php');

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
/**
  //Page header
  public function Header() {
    // Logo
    $image_file = K_PATH_IMAGES.'logo_example.jpg';
    $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    // Set font
    $this->SetFont('helvetica', 'B', 20);
    // Title
    $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
  }
**/
  // Page footer
  public function Footer() {
    // Position at 15 mm from bottom
    $this->SetY(-15);
    // Set font
    $this->SetFont('helvetica', 'B', 8);
    // Page number
    $dateee = date('d-m-Y h:m a');
    $this->Cell(0, 10, 'Printed with sh-Sys| On '.$dateee.' |', 0, false, 'L', 0, '', 0, false, 'T', 'M');
    $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
  }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$d  = date('l d/m/Y h:m a');
$d2  = date('l d/m/Y');
$d3  = date('l_d_m_Y-h-a');
// set document information
//$pdf->SetCreator($PDF_CREATOR);
$pdf->SetAuthor('Bbbbb');
$pdf->SetTitle($branch.' '.$d2);
//$pdf->SetSubject($d2);
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

$person = 'By '.$Name;
$PDF_CREATOR = 'Shamrock Project';

/**
 * Document author.
 */
$PDF_AUTHOR = 'Ice';

/**
 * Header title.
 */
$PDF_HEADER_TITLE = $d;

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $PDF_HEADER_TITLE, $person);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage();

$pdf->Write(0, $branch.' sales report', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 9);

// set bacground image
$img_file = K_PATH_IMAGES.'confidential.png';
$pdf->Image($img_file, 0, 8, 600, 317, '', '', '', false, 300, '', false, false, 72);


// -----------------------------------------------------------------------------

$tbl = '
<table border="1">
<tr>
<th colspan="12"><h3 align="center">REPORTS</h3></th>
</tr>
<tr>
<th><b>DELIVERY</b></th>
<th><b>DIESAL</b></th>
<th><b>CAR PETROL</b></th>
<th><b>OTHER EXPENSIVE</b></th>
<th><b>DISCOUNT</b></th>
<th><b>TOTAL EXPENSIVE</b></th>
<th><b>TOTAL CASH</b></th>
<th><b>ATM</b></th>
<th><b>TOTAL SALES</b></th>
<th><b>SALES IN SYSTEM</b></th>
<th><b>DIFFERENCES</b></th>
<th><b>DATE</b></th>
</tr>
</table>';
// itemsreturn
// id uniqKey items quantity  staff branch  reason  difference  date  time  timestamp 
$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------
  
if (!$salesdata) {
  $pdf->SetTextColor(255, 0, 0);
  $tbl = "<em style='color:red; font-size:16ps;'><b>No data Found</b>, you have'nt add any sales report</em>";

$pdf->writeHTML($tbl, true, false, false, false, '');
$pdf->SetTextColor(0, 0, 0);
}else{
foreach ($salesdata as $dt) {
      $delivery    = $dt['delivery'];
      $diesel    = $dt['diesel'];
      $carPetrol   = $dt['carPetrol'];
      $otherExpensive     = $dt['otherExpensive'];
      $discount    = $dt['discount'];
      $totalExpensive = $dt['totalExpensive'];
      $totalCash    = $dt['totalCash'];
      $ATM    = $dt['ATM'];
      $totalSales   = $dt['totalSales'];
      $salesInSystem     = $dt['salesInSystem'];
      $diffrences    = $dt['diffrences'];
      $signature = $dt['signature'];
      $datee = $dt['date'];

$tbl = '
<table border="1">
<tr>
<th>'.$delivery.'</th>
<th>'.$diesel.'</th>
<th>'.$carPetrol.'</th>
<th>'.$otherExpensive.'</th>
<th>'.$discount.'</th>
<th>'.$totalExpensive.'</th>
<th>'.$totalCash.'</th>
<th>'.$ATM.'</th>
<th>'.$totalSales.'</th>
<th>'.$salesInSystem.'</th>
<th>'.$diffrences.'</th>
<th>'.$datee.'</th>
</tr>
</table><hr>';

$pdf->writeHTML($tbl, true, false, false, false, '');
}
}
// -----------------------------------------------------------------------------

$tbl = '
<table border="1">
<tr>
<th colspan="2"><h3 align="center">ITEMS LEFT IN SHOP</h3></th>
</tr>
<tr>
<th><b>ITEMS</b></th>
<th><b>QUANTITIES</b></th>
</tr>
</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------
if (!$bdata) {
$pdf->SetTextColor(255, 0, 0);
  $tbl = "<em style='color:red; font-size:16ps;'><b>No data Found</b>, you have'nt add items left in shop</em>";

$pdf->writeHTML($tbl, true, false, false, false, '');
$pdf->SetTextColor(0, 0, 0);
}else{

foreach ($bdata as $key) {
      $refno    = $key['uniqKey'];
      $brnch    = $key['branch'];
      $reason   = $key['reasons'];
      $date     = $key['date'];
      $items    = $key['item'];
      $quantity = $key['quantity'];

$tbl = '
<table border="1">
<tr>
<th>'.$items.'</th>
<th>'.$quantity.'</th>
</tr>
</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');
}
}


// -----------------------------------------------------------------------------

$tbl = '<hr>';

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

// -----------------------------------------------------------------------------

$tbl = 'Signature <u>'.$Name.'</u><hr>';

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('DQ Report '.$d3.'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
}