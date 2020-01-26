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

$regnumber = $answerAnnuals["REGISTRATION_NUMBER"];
$date = $answerAnnuals["MODIFIED_DATE"];

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

//---------------------------------------------------------

$block1 = <<<EOF

<table style="font-size:9px; ">
	<tr>
		<td style="width:80PX;">Registration Number <br></td>
		<td style="width:80PX; text-align:center" >Enterprise Name <br></td>
		<td style="width:80PX; text-align:right">Non Compliance Date</td>

	</tr>
</table>

EOF;



// ---------------------------------------------------------

$block2 = <<<EOF

<table style="font-size:9px; text-align:center" class="table table-bordered table-striped dt-responsive tables" width="100%">
	
	<tr>
		<td style="width:80PX; text-align:right">
		$regnumber
		</td>

		<td style="width:80PX; text-align:right">
		$name
		<br>
		</td>

			<td style="width:80PX; text-align:right">
			 $yearfiled 
			</td>

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