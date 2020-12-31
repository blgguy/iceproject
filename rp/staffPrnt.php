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
  $dateee           = date('d/m/Y');
  
  $staffD = $user->viewNoAdmin();
  $today = date('l');
  


if ($role !== 'admin') {
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

$person = 'Printed By '.$Name;
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

$pdf->Write(0, 'All Staff Details', '', 0, 'C', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 10);

// Fetch All Staff....

$tbl = '
<table border="1">
<tr>
<th colspan="4" align="right">All password are <b>123456</b></th>
</tr>
<tr>
<th><b>First Name</b></th>
<th><b>Last Name</b></th>
<th><b>Username</b></th>
<th><b>Email</b></th>
</tr>
</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------
if (!$staffD) {
$pdf->SetTextColor(255, 0, 0);
  $tbl = "<em style='color:red; font-size:16ps;'><b>404: No data Found</b></em>";

$pdf->writeHTML($tbl, true, false, false, false, '');
$pdf->SetTextColor(0, 0, 0);
}else{
    foreach ($staffD as $key) {
      $fName      = $key['firstName'];
      $lName      = $key['lastName'];
      $emailAd    = $key['email'];
      $username   = $key['username'];

    $tbl = '
    <table border="1">
    <tr>
    <th>'.$fName.'</th>
    <th>'.$lName.'</th>
    <th>'.$username.'</th>
    <th>'.$emailAd.'</th>
    </tr>
    </table>';

    $pdf->writeHTML($tbl, true, false, false, false, '');
  }
}
// -----------------------------END---------------------------------------------

// ------------------------------------------------------------------------------
$tbl = '<hr>';

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

// -----------------------------------------------------------------------------

$tbl = 'Signature <u><em>'.$Name.'</em></u><hr>';

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('Staff Login Details '.$d3.'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
}