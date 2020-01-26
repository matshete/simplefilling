<?php

require_once "../../../controllers/annualreturns.controller.php";
require_once "../../../models/annualreturns.model.php";

require_once "../../../controllers/customers.controller.php";
require_once "../../../models/customers.model.php";

require_once "../../../controllers/users.controller.php";
require_once "../../../models/users.model.php";


class printBill{

public $code;

public function getBillPrinting(){

//WE BRING THE INFORMATION OF THE SALE

$itemSale = "REGISTRATION_NUMBER";
$valueSale = $this->code;

$answerAnnuals = ControllerAnnuals::ctrShowAnnuals($itemSale, $valueSale);

$regnumber = $answerAnnuals["REGISTRATION_NUMBER"];$name = $answerAnnuals["ENTERPRISE_NAME"];$yearfiled = $answerAnnuals["YEAR_FILED"];$nextperiod = $answerAnnuals["NEXT_PERIOD"];//$armonth = $answerAnnuals["AR_MONTH"];$due = $answerAnnuals["RETURNS_DUE"];
$date = $answerAnnuals["MODIFIED_DATE"];$date_generated = date('F j, Y');

//TRAEMOS LA INFORMACIÓN DEL Customer

//$itemCustomer = "id";
//$valueCustomer = $answerSale["idCustomer"];

//$answerCustomer = ControllerCustomers::ctrShowCustomers($itemCustomer, $valueCustomer);


//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

//$pdf->AddPage('P', 'A7');
$pdf->AddPage('P', 'A4');
//---------------------------------------------------------$block0 = <<<EOF<table style="font-size:9px; ">	<tr>		<td style="width:400PX;"><h1>SIMPLE FILLING </h1></td>		<td style="width:400PX;"><h1>$date_generated </h1><br></td>			</tr></table>EOF;$pdf->writeHTML($block0, false, false, false, false, '');// ---------------------------------------------------------
//---------------------------------------------------------

$block1 = <<<EOF

<table style="font-size:9px; ">
	<tr>
		<td style="width:80PX;">Registration Number <br></td>
		<td style="width:80PX; text-align:center" >Enterprise Name <br></td>
		<td style="width:80PX; text-align:right">Non Compliance Date</td>				<td style="width:80PX; text-align:right">AR Month</td>				<td style="width:80PX; text-align:right">Next Due Period</td>				<td style="width:80PX; text-align:right">No of Due Returns</td>				<td style="width:80PX; text-align:right">Date Modified</td>

	</tr>
</table>

EOF;

//$pdf->writeHTML($block1, false, false, false, false, '');

// ---------------------------------------------------------

$block2 = <<<EOF

<table style="font-size:9px; text-align:center" class="table table-bordered table-striped dt-responsive tables" width="100%">
	
	<tr>			<td>REGISTRATION NUMBER</td>
		<td style="width:80PX; text-align:right">
		$regnumber	<br>
		</td>	</tr>
	<tr>				<td>ENTERPRISE_NAME</td>
		<td style="width:80PX; text-align:right">
		$name
		<br>
		</td>	</tr>			<tr>			<td>YEAR_FILED</td>

			<td style="width:80PX; text-align:right">
			 $yearfiled 			 <br>
			</td>		</tr>					<tr>				<td>NEXT_PERIOD </td>				<td style="width:160PX; text-align:left">				 $nextperiod				 <br>				</td>		</tr>								<tr>						<td>Filling Due</td>		<td style="width:80PX; text-align:right">		$due		<br>		</td>		</tr>				<tr>		<td>Date Modified</td>		<td style="width:80PX; text-align:right">		 $date		 <br>		</td>

	</tr>

</table>

EOF;

$pdf->writeHTML($block2, false, false, false, false, '');




// ---------------------------------------------------------
//SALIDA DEL ARCHIVO 

// $pdf->Output('bill.pdf', 'D');

$pdf->Output('annual.pdf');

}

}

$bill = new printBill();
$bill -> code = $_GET["code"];
$bill -> getBillPrinting();

?>