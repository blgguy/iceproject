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
  $recieved         = $user->branchReport('sentitems', $branch);
  $itemsRecieved    = $user->viewByDate('sentitems', $dateee, $branch);
  $caseEndOfTheDay  = $user->viewByDate('cashendoftheday', $dateee, $branch);
  $itemsreturn      = $user->viewByDate('itemsreturn', $dateee, $branch);
  $signture         = $user->viewByDate('addsignature', $dateee, $branch);
  $requestItem      = $user->viewByDate('requestitems', $dateee, $branch);

  $today = date('l');

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
    $dateeee = date('d-m-Y h:m a');
    $this->Cell(0, 10, 'Printed with sh-Sys| On '.$dateeee.' |', 0, false, 'L', 0, '', 0, false, 'T', 'M');
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

$pdf->Write(0, $today.' '.$branch.' Branch report', '', 0, 'C', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 10);

// set bacground image

/**
$img_file = K_PATH_IMAGES.'confidential.png';
$pdf->Image($img_file, 0, 8, 600, 317, '', '', '', false, 300, '', false, false, 72);
**/
// -----------------------------------------------------------------------------

// Fetch Item return from Diplomatic Quarters....

$tbl = '
<table border="1">
<tr>
<th colspan="3"><h3 align="center">ITEMS RECIEVED</h3></th>
</tr>
<tr>
<th><b>ITEMS</b></th>
<th><b>QUANTITIES</b></th>
<th><b>FROM</b></th>
</tr>
</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------
if (!$itemsRecieved) {
$pdf->SetTextColor(255, 0, 0);
  $tbl = "<em style='color:red; font-size:16ps;'><b>404: No data Found</b></em>";

$pdf->writeHTML($tbl, true, false, false, false, '');
$pdf->SetTextColor(0, 0, 0);
}else{
  foreach ($itemsRecieved as $key) {
    $date     = $key['date']; 
  } 
  if ($dateee === $date) {
          
    foreach ($itemsRecieved as $dtt) {
      $items      = $dtt['items'];
      $quantity   = $dtt['quantity'];
      $from       = $dtt['staff'];
            
    $tbl = '
    <table border="1">
    <tr>
    <th>'.$items.'</th>
    <th>'.$quantity.'</th>
    <th>'.$from.'</th>
    </tr>
    </table>';

    $pdf->writeHTML($tbl, true, false, false, false, '');
  }
}else{
  $pdf->SetTextColor(255, 0, 0);
  $tbl = "<em style='color:red; font-size:16ps;'><b>$branch</b> have'nt recieve any item Today ".$today."</em>";

  $pdf->writeHTML($tbl, true, false, false, false, '');
  $pdf->SetTextColor(0, 0, 0);
}
}
// -----------------------------END---------------------------------------------

// Fetch Item RETURN....

$tbl = '
<table border="1">
<tr>
<th colspan="4"><h3 align="center">ITEMS RETURNED</h3></th>
</tr>
<tr>
<th><b>ITEMS</b></th>
<th><b>QUANTITIES</b></th>
<th><b>DIFFERENCE</b></th>
<th><b>REASON</b></th>
</tr>
</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------
if (!$itemsreturn) {
  $pdf->SetTextColor(255, 0, 0);
  $tbl = "<em style='color:red; font-size:16ps;'><b>404: No data Found</b></em>";

  $pdf->writeHTML($tbl, true, false, false, false, '');
  $pdf->SetTextColor(0, 0, 0);
}else{
  foreach ($itemsreturn as $keyR) {
    $date     = $keyR['date']; 
  } 
  if ($dateee === $date) {    
    foreach ($itemsreturn as $keyRR) {
        $reason       = $keyRR['reason'];
        $difference   = $keyRR['difference'];
        $items        = $keyRR['items'];
        $quantity     = $keyRR['quantity'];
              
      $tbl = '
      <table border="1">
      <tr>
      <th>'.$items.'</th>
      <th>'.$quantity.'</th>
      <th>'.$difference.'</th>
      <th>'.$reason.'</th>
      </tr>
      </table>';

      $pdf->writeHTML($tbl, true, false, false, false, '');
    }
  }else{
    $pdf->SetTextColor(255, 0, 0);
    $tbl = "<em style='color:red; font-size:16ps;'>you have'nt returned any item Today ".$today."</em>";

    $pdf->writeHTML($tbl, true, false, false, false, '');
    $pdf->SetTextColor(0, 0, 0);
  }
}
// -----------------------------END---------------------------------------------

// Fetch Item Return to Riyard Park....

$tbl = '
<table border="1">
<tr>
<th colspan="2"><h3 align="center">REQUEST ITEMS</h3></th>
</tr>
<tr>
<th><b>ITEMS</b></th>
<th><b>QUANTITIES</b></th>
</tr>
</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------
if (!$requestItem) {
$pdf->SetTextColor(255, 0, 0);
  $tbl = "<em style='color:red; font-size:16ps;'><b>404: No data Found</b></em>";

$pdf->writeHTML($tbl, true, false, false, false, '');
$pdf->SetTextColor(0, 0, 0);
}else{
    foreach ($requestItem as $key) {
      $date     = $key['date']; 
    } 
    if ($dateee === $date) {
          
  foreach ($requestItem as $key) {
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
  $tbl = "<em style='color:red; font-size:16ps;'>you have'nt request any item Today ".$today."</em>";

          $pdf->writeHTML($tbl, true, false, false, false, '');
          $pdf->SetTextColor(0, 0, 0);
}
}
// -----------------------------END---------------------------------------------


// Fetch CASH END OF THE DAY....

$tbl = '
<table border="1">
<tr>
<th colspan="2"><h3 align="center">CASH END OF THE DAY</h3></th>
</tr>
<tr>
<th><b>TITLE</b></th>
<th><b>QUANTITIES</b></th>
</tr>
</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------
if (!$caseEndOfTheDay) {
$pdf->SetTextColor(255, 0, 0);
  $tbl = "<em style='color:red; font-size:16ps;'><b>404: No data Found</b></em>";

$pdf->writeHTML($tbl, true, false, false, false, '');
$pdf->SetTextColor(0, 0, 0);
}else{
    foreach ($caseEndOfTheDay as $key) {
      $date     = $key['date']; 
    } 
    if ($dateee === $date) {
          
      foreach ($caseEndOfTheDay as $key) {
          $title    = $key['name'];
          $quantity = $key['quantity'];
                
        $tbl = '
        <table border="1">
        <tr>
        <th>'.$title.'</th>
        <th>'.$quantity.'</th>
        </tr>
        </table>';

    $pdf->writeHTML($tbl, true, false, false, false, '');
    }
  }else{
    $pdf->SetTextColor(255, 0, 0);
    $tbl = "<em style='color:red; font-size:16ps;'>You have'nt add any cash end of the day, Today ".$today."</em>";

    $pdf->writeHTML($tbl, true, false, false, false, '');
    $pdf->SetTextColor(0, 0, 0);
  }
}
// -----------------------------END---------------------------------------------

// Fetch SIGNATURE....

$tbl = '
<table border="1">
<tr>
<th colspan="11"><h3 align="center">SIGNATURE</h3></th>
</tr>
<tr>
<th><b>CAR DIESEL</b></th>
<th><b>DELIVERY CHARGES</b></th>
<th><b>DELIVERY ORDER</b></th>
<th><b>ATM</b></th>
<th><b>CASH</b></th>
<th><b>TRANSFER</b></th>
<th><b>TOTAL EXPENSES</b></th>
<th><b>TOTAL DISCOUNT</b></th>
<th><b>SALES SYSTEM</b></th>
<th><b>SIGNATURE</b></th>
<th><b>BRANCH</b></th>
</tr>
</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------
if (!$signture) {
$pdf->SetTextColor(255, 0, 0);
  $tbl = "<em style='color:red; font-size:16ps;'><b>404: No data Found</b></em>";

$pdf->writeHTML($tbl, true, false, false, false, '');
$pdf->SetTextColor(0, 0, 0);
}else{
  foreach ($signture as $key) {
    $date     = $key['date']; 
  } 
  if ($dateee === $date) {      
    foreach ($signture as $key) {
        $date             = $key['date'];
        $time             = $key['time'];
        $CarDiesel        = $key['CarDiesel'];
        $DeliveryCharges  = $key['DeliveryCharges'];
        $DeliveryOrder    = $key['DeliveryOrder'];
        $ATM              = $key['ATM'];
        $Cash             = $key['Cash'];
        $Transfer         = $key['Transfer'];
        $TotalExpemses    = $key['TotalExpemses'];
        $TotalDiscount    = $key['TotalDiscount'];
        $salesSystem      = $key['salesSystem'];
        $signature        = $key['signature'];
        $branch           = $key['branch'];
              
      $tbl = '
      <table border="1">
      <tr>
      <th>'.$CarDiesel.'</th>
      <th>'.$DeliveryCharges.'</th>
      <th>'.$DeliveryOrder.'</th>
      <th>'.$ATM.'</th>
      <th>'.$Cash.'</th>
      <th>'.$Transfer.'</th>
      <th>'.$TotalExpemses.'</th>
      <th>'.$TotalDiscount.'</th>
      <th>'.$salesSystem.'</th>
      <th>'.$signature.'</th>
      <th>'.$branch.'</th>
      </tr>
      </table>';

      $pdf->writeHTML($tbl, true, false, false, false, '');
    }
  }else{
    $pdf->SetTextColor(255, 0, 0);
    $tbl = "<em style='color:red; font-size:16ps;'>You have'nt add any Signature, Today ".$today."</em>";

            $pdf->writeHTML($tbl, true, false, false, false, '');
            $pdf->SetTextColor(0, 0, 0);
  }
}
// -----------------------------END---------------------------------------------

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