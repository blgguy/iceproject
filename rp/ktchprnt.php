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
  
  $DQSendItems      = $user->viewByDate('sentitems', $dateee, 'Diplomatic Quarter');
  $RFSendItems      = $user->viewByDate('sentitems', $dateee, 'Riyard Front');
  $RPSendItems      = $user->viewByDate('sentitems', $dateee, 'Riyard Park');

  $DQReturnItems    = $user->viewByDate('itemsreturn', $dateee, 'Diplomatic Quarter');
  $RFReturnItems    = $user->viewByDate('itemsreturn', $dateee, 'Riyard Front');
  $RPReturnItems    = $user->viewByDate('itemsreturn', $dateee, 'Riyard Park');

  $DQRequestedItems    = $user->viewByDate('requestitems', $dateee, 'Diplomatic Quarter');
  $RFRequestedItems    = $user->viewByDate('requestitems', $dateee, 'Riyard Front');
  $RPRequestedItems    = $user->viewByDate('requestitems', $dateee, 'Riyard Park');
  $today = date('l');
  

  $salesdata      = $user->branchReport('salesreport78u', $branch);

if ($role === 'branch') {
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

$pdf->Write(0, $today.' kitchen report', '', 0, 'C', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 10);

// set bacground image

/**
$img_file = K_PATH_IMAGES.'confidential.png';
$pdf->Image($img_file, 0, 8, 600, 317, '', '', '', false, 300, '', false, false, 72);
**/
//  items sent

$pdf->SetFont('helvetica', 'B', 14);
$pdf->Write(0, 'ITEMS SENT TO BRANCH REPORTS', '', 0, 'L', true, 0, false, false, 0);
$pdf->SetFont('helvetica', '', 10);
// Fetch Item send to Diplomatic Quarters....

$tbl = '
<table border="1">
<tr>
<th colspan="2"><h3 align="center">ITEMS SEND TO Diplomatic Quarter</h3></th>
</tr>
<tr>
<th><b>ITEMS</b></th>
<th><b>QUANTITIES</b></th>
</tr>
</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------
if (!$RPSendItems) {
$pdf->SetTextColor(255, 0, 0);
  $tbl = "<em style='color:red; font-size:16ps;'><b>404: No data Found</b></em>";

$pdf->writeHTML($tbl, true, false, false, false, '');
$pdf->SetTextColor(0, 0, 0);
}else{
    foreach ($RPSendItems as $key) {
      $date     = $key['date']; 
      $currentDate = date('d/m/Y');
    } 
    if ($currentDate === $date) {
          
  foreach ($RPSendItems as $key) {
      $brnch    = $key['branch'];
      $date     = $key['date'];
      $items    = $key['items'];
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
}else{
  $pdf->SetTextColor(255, 0, 0);
  $tbl = "<em style='color:red; font-size:16ps;'>You have'nt Send any item to <b>Diplomatic Quarter</b> Today ".$today."</em>";

          $pdf->writeHTML($tbl, true, false, false, false, '');
          $pdf->SetTextColor(0, 0, 0);
}
}
// -----------------------------END---------------------------------------------

// Fetch Item send to Riyard Front....

$tbl = '
<table border="1">
<tr>
<th colspan="2"><h3 align="center">ITEMS SEND TO Riyard Front</h3></th>
</tr>
<tr>
<th><b>ITEMS</b></th>
<th><b>QUANTITIES</b></th>
</tr>
</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------
if (!$DQSendItems) {
$pdf->SetTextColor(255, 0, 0);
  $tbl = "<em style='color:red; font-size:16ps;'><b>404: No data Found</b></em>";

$pdf->writeHTML($tbl, true, false, false, false, '');
$pdf->SetTextColor(0, 0, 0);
}else{
    foreach ($DQSendItems as $key) {
      $date     = $key['date']; 
      $currentDate = date('d/m/Y');
    } 
    if ($currentDate === $date) {
          
  foreach ($DQSendItems as $key) {
      $brnch    = $key['branch'];
      $date     = $key['date'];
      $items    = $key['items'];
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
}else{
  $pdf->SetTextColor(255, 0, 0);
  $tbl = "<em style='color:red; font-size:16ps;'>You have'nt Send any item to <b>Riyard Front</b> Today ".$today."</em>";

          $pdf->writeHTML($tbl, true, false, false, false, '');
          $pdf->SetTextColor(0, 0, 0);
}
}
// -----------------------------END---------------------------------------------

// Fetch Item send to Diplomatic Quarters....

$tbl = '
<table border="1">
<tr>
<th colspan="2"><h3 align="center">ITEMS SEND TO Riyard Park</h3></th>
</tr>
<tr>
<th><b>ITEMS</b></th>
<th><b>QUANTITIES</b></th>
</tr>
</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------
if (!$RFSendItems) {
$pdf->SetTextColor(255, 0, 0);
  $tbl = "<em style='color:red; font-size:16ps;'><b>404: No data Found</b></em>";

$pdf->writeHTML($tbl, true, false, false, false, '');
$pdf->SetTextColor(0, 0, 0);
}else{
    foreach ($RFSendItems as $key) {
      $date     = $key['date']; 
      $currentDate = date('d/m/Y');
    } 
    if ($currentDate === $date) {
          
  foreach ($RFSendItems as $key) {
      $brnch    = $key['branch'];
      $date     = $key['date'];
      $items    = $key['items'];
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
}else{
  $pdf->SetTextColor(255, 0, 0);
  $tbl = "<em style='color:red; font-size:16ps;'>You have'nt Send any item to <b>Riyard Park</b> Today ".$today."</em>";

          $pdf->writeHTML($tbl, true, false, false, false, '');
          $pdf->SetTextColor(0, 0, 0);
}
}
// -----------------------------END---------------------------------------------


// -----------------------------------------------------------------------------



// -----------------------------------------------------------------------------
$pdf->SetFont('helvetica', 'B', 14);
$pdf->Write(0, ' BRANCH RETURNED REPORTS', '', 0, 'L', true, 0, false, false, 0);
$pdf->SetFont('helvetica', '', 10);
// Fetch Item return from Diplomatic Quarters....

$tbl = '
<table border="1">
<tr>
<th colspan="5"><h3 align="center">ITEMS RETURN FROM Diplomatic Quarter</h3></th>
</tr>
<tr>
<th><b>ITEMS</b></th>
<th><b>QUANTITIES</b></th>
<th><b>DIFFERENCE</b></th>
<th><b>STAFF</b></th>
<th><b>REASON</b></th>
</tr>
</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------
if (!$DQReturnItems) {
$pdf->SetTextColor(255, 0, 0);
  $tbl = "<em style='color:red; font-size:16ps;'><b>404: No data Found</b></em>";

$pdf->writeHTML($tbl, true, false, false, false, '');
$pdf->SetTextColor(0, 0, 0);
}else{
    foreach ($DQReturnItems as $key) {
      $date     = $key['date']; 
      $currentDate = date('d/m/Y');
    } 
    if ($currentDate === $date) {
          
  foreach ($DQReturnItems as $key) {
      $brnch    = $key['branch'];
      $date     = $key['date'];
      $staff    = $key['staff'];
      $reason   = $key['reason'];
      $difference   = $key['difference'];
      $items    = $key['items'];
      $quantity = $key['quantity'];
            
    $tbl = '
    <table border="1">
    <tr>
    <th>'.$items.'</th>
    <th>'.$quantity.'</th>
    <th>'.$difference.'</th>
    <th>'.$staff.'</th>
    <th>'.$reason.'</th>
    </tr>
    </table>';

    $pdf->writeHTML($tbl, true, false, false, false, '');
  }
}else{
  $pdf->SetTextColor(255, 0, 0);
  $tbl = "<em style='color:red; font-size:16ps;'><b>Diplomatic Quarter</b> have'nt return any item Today ".$today."</em>";

          $pdf->writeHTML($tbl, true, false, false, false, '');
          $pdf->SetTextColor(0, 0, 0);
}
}
// -----------------------------END---------------------------------------------

// Fetch Item RETURN FROM Riyard Front....

$tbl = '
<table border="1">
<tr>
<th colspan="5"><h3 align="center">ITEMS RETURN FROM Riyard Front</h3></th>
</tr>
<tr>
<th><b>ITEMS</b></th>
<th><b>QUANTITIES</b></th>
<th><b>DIFFERENCE</b></th>
<th><b>STAFF</b></th>
<th><b>REASON</b></th>
</tr>
</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------
if (!$RFReturnItems) {
$pdf->SetTextColor(255, 0, 0);
  $tbl = "<em style='color:red; font-size:16ps;'><b>404: No data Found</b></em>";

$pdf->writeHTML($tbl, true, false, false, false, '');
$pdf->SetTextColor(0, 0, 0);
}else{
    foreach ($RFReturnItems as $key) {
      $date     = $key['date']; 
      $currentDate = date('d/m/Y');
    } 
    if ($currentDate === $date) {
          
  foreach ($RFReturnItems as $key) {
      $brnch    = $key['branch'];
      $date     = $key['date'];
      $staff    = $key['staff'];
      $reason   = $key['reason'];
      $difference   = $key['difference'];
      $items    = $key['items'];
      $quantity = $key['quantity'];
            
    $tbl = '
    <table border="1">
    <tr>
    <th>'.$items.'</th>
    <th>'.$quantity.'</th>
    <th>'.$difference.'</th>
    <th>'.$staff.'</th>
    <th>'.$reason.'</th>
    </tr>
    </table>';

    $pdf->writeHTML($tbl, true, false, false, false, '');
  }
}else{
  $pdf->SetTextColor(255, 0, 0);
  $tbl = "<em style='color:red; font-size:16ps;'><b>Riyard Front</b> have'nt return any item Today ".$today."</em>";

          $pdf->writeHTML($tbl, true, false, false, false, '');
          $pdf->SetTextColor(0, 0, 0);
}
}
// -----------------------------END---------------------------------------------

// Fetch Item Return to Riyard Park....

$tbl = '
<table border="1">
<tr>
<th colspan="5"><h3 align="center">ITEMS RETURN FROM Riyard Park</h3></th>
</tr>
<tr>
<th><b>ITEMS</b></th>
<th><b>QUANTITIES</b></th>
<th><b>DIFFERENCE</b></th>
<th><b>STAFF</b></th>
<th><b>REASON</b></th>
</tr>
</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------
if (!$RPReturnItems) {
$pdf->SetTextColor(255, 0, 0);
  $tbl = "<em style='color:red; font-size:16ps;'><b>404: No data Found</b></em>";

$pdf->writeHTML($tbl, true, false, false, false, '');
$pdf->SetTextColor(0, 0, 0);
}else{
    foreach ($RPReturnItems as $key) {
      $date     = $key['date']; 
      $currentDate = date('d/m/Y');
    } 
    if ($currentDate === $date) {
          
  foreach ($RPReturnItems as $key) {
      $brnch    = $key['branch'];
      $date     = $key['date'];
      $staff    = $key['staff'];
      $reason   = $key['reason'];
      $difference   = $key['difference'];
      $items    = $key['items'];
      $quantity = $key['quantity'];

    $tbl = '
    <table border="1">
    <tr>
    <th>'.$items.'</th>
    <th>'.$quantity.'</th>
    <th>'.$difference.'</th>
    <th>'.$staff.'</th>
    <th>'.$reason.'</th>
    </tr>
    </table>';

    $pdf->writeHTML($tbl, true, false, false, false, '');
  }
}else{
  $pdf->SetTextColor(255, 0, 0);
  $tbl = "<em style='color:red; font-size:16ps;'><b>Riyard Park</b> have'nt return any item Today ".$today."</em>";

          $pdf->writeHTML($tbl, true, false, false, false, '');
          $pdf->SetTextColor(0, 0, 0);
}
}
// -----------------------------END---------------------------------------------

// --------------------------------------------------------------------------------


// -----------------------------------------------------------------------------
$pdf->SetFont('helvetica', 'B', 14);
$pdf->Write(0, ' REQUESTED ITEMS', '', 0, 'L', true, 0, false, false, 0);
$pdf->SetFont('helvetica', '', 10);

// Fetch Item request from Diplomatic Quarters....

$tbl = '
<table border="1">
<tr>
<th colspan="3"><h3 align="center">ITEMS REQUESTED FROM Diplomatic Quarter</h3></th>
</tr>
<tr>
<th><b>ITEMS</b></th>
<th><b>QUANTITIES</b></th>
<th><b>STAFF</b></th>
</tr>
</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------
if (!$DQRequestedItems) {
$pdf->SetTextColor(255, 0, 0);
  $tbl = "<em style='color:red; font-size:16ps;'><b>404: No data Found</b></em>";

$pdf->writeHTML($tbl, true, false, false, false, '');
$pdf->SetTextColor(0, 0, 0);
}else{
    foreach ($DQRequestedItems as $key) {
      $date     = $key['date']; 
      $currentDate = date('d/m/Y');
    } 
    if ($currentDate === $date) {
          
  foreach ($DQRequestedItems as $key) {
      $brnch    = $key['branch'];
      $date     = $key['date'];
      $staff    = $key['staff'];
      $items    = $key['items'];
      $quantity = $key['quantity'];
            
    $tbl = '
    <table border="1">
    <tr>
    <th>'.$items.'</th>
    <th>'.$quantity.'</th>
    <th>'.$staff.'</th>
    </tr>
    </table>';

    $pdf->writeHTML($tbl, true, false, false, false, '');
  }
}else{
  $pdf->SetTextColor(255, 0, 0);
  $tbl = "<em style='color:red; font-size:16ps;'><b>Diplomatic Quarter</b> have'nt request any item Today ".$today."</em>";

          $pdf->writeHTML($tbl, true, false, false, false, '');
          $pdf->SetTextColor(0, 0, 0);
}
}
// -----------------------------END---------------------------------------------

// Fetch Item REQUEST FROM Riyard Front....

$tbl = '
<table border="1">
<tr>
<th colspan="3"><h3 align="center">ITEMS REQUEST FROM Riyard Front</h3></th>
</tr>
<tr>
<th><b>ITEMS</b></th>
<th><b>QUANTITIES</b></th>
<th><b>STAFF</b></th>
</tr>
</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------
if (!$RFRequestedItems) {
$pdf->SetTextColor(255, 0, 0);
  $tbl = "<em style='color:red; font-size:16ps;'><b>404: No data Found</b></em>";

$pdf->writeHTML($tbl, true, false, false, false, '');
$pdf->SetTextColor(0, 0, 0);
}else{
    foreach ($RFRequestedItems as $key) {
      $date     = $key['date']; 
      $currentDate = date('d/m/Y');
    } 
    if ($currentDate === $date) {
          
  foreach ($RFRequestedItems as $key) {
      $brnch    = $key['branch'];
      $date     = $key['date'];
      $staff    = $key['staff'];
      $items    = $key['items'];
      $quantity = $key['quantity'];
            
    $tbl = '
    <table border="1">
    <tr>
    <th>'.$items.'</th>
    <th>'.$quantity.'</th>
    <th>'.$staff.'</th>
    </tr>
    </table>';

    $pdf->writeHTML($tbl, true, false, false, false, '');
  }
}else{
  $pdf->SetTextColor(255, 0, 0);
  $tbl = "<em style='color:red; font-size:16ps;'><b>Riyard Front</b> have'nt request any item Today ".$today."</em>";

          $pdf->writeHTML($tbl, true, false, false, false, '');
          $pdf->SetTextColor(0, 0, 0);
}
}
// -----------------------------END---------------------------------------------

// Fetch Item Return to Riyard Park....

$tbl = '
<table border="1">
<tr>
<th colspan="3"><h3 align="center">ITEMS REQUEST FROM Riyard Park</h3></th>
</tr>
<tr>
<th><b>ITEMS</b></th>
<th><b>QUANTITIES</b></th>
<th><b>STAFF</b></th>
</tr>
</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------
if (!$RPRequestedItems) {
$pdf->SetTextColor(255, 0, 0);
  $tbl = "<em style='color:red; font-size:16ps;'><b>404: No data Found</b></em>";

$pdf->writeHTML($tbl, true, false, false, false, '');
$pdf->SetTextColor(0, 0, 0);
}else{
    foreach ($RPRequestedItems as $key) {
      $date     = $key['date']; 
      $currentDate = date('d/m/Y');
    } 
    if ($currentDate === $date) {
          
  foreach ($RPRequestedItems as $key) {
      $brnch    = $key['branch'];
      $date     = $key['date'];
      $staff    = $key['staff'];
      $items    = $key['items'];
      $quantity = $key['quantity'];

    $tbl = '
    <table border="1">
    <tr>
    <th>'.$items.'</th>
    <th>'.$quantity.'</th>
    <th>'.$staff.'</th>
    </tr>
    </table>';

    $pdf->writeHTML($tbl, true, false, false, false, '');
  }
}else{
  $pdf->SetTextColor(255, 0, 0);
  $tbl = "<em style='color:red; font-size:16ps;'><b>Riyard Park</b> have'nt request any item Today ".$today."</em>";

          $pdf->writeHTML($tbl, true, false, false, false, '');
          $pdf->SetTextColor(0, 0, 0);
}
}
// -----------------------------END---------------------------------------------

// ------------------------------------------------------------------------------
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