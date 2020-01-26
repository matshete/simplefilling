<?php
//require("../extensions/phpMailer/class.PHPMailer.php");
//require_once "models/annualreturns.model.php";
class Controllerdue{

	/*=============================================
	CREATE CUSTOMERS
	=============================================*/

	static public function ctrCreatedue(){

		if(isset($_POST["newName"])){

			if(isset($_POST["newName"])
			   ){

			   	$table = "due";
				
				$formatString = 'l, F j, Y';
				$date = date('l, F j, Y');
				
				$Currentdate = new DateTime($date);
				$date1 = new DateTime($_POST["newfileddate"]);

				$date2 = clone $date1;
				$date2->modify('+12 month');
				
				$reminder = $date2->modify('last day of -1 month')->format('l, F j, Y');
				
				$armonth = clone $date1;
				$armonth->modify('-1 month');
			
				
				
				$fileddate = $_POST["newfileddate"];
				
			   	$data = array("name"=>$_POST["newName"], 
					           "fileddate"=>$_POST["newfileddate"],
							   "armonths"=>$armonth->format('M'),
								"nextdue"=>$date2->format($formatString),
								"howmanyreturns"=> $Currentdate ->format('Y') - $date2->format('Y'),
								"statusreminder"=>$reminder,
					           "regnumber"=>$_POST["newRegNumber"] );
				
				
			   	$answer = Modeldue::mdlAdddue($table, $data);
				
				
			   	if($answer == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "The customer has been saved",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
									if (result.value) {

									window.location = "cipc-annual-returns";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "Customer cannot be blank or especial characters!",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
							if (result.value) {

							window.location = "cipc-annual-returns";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	SHOW CUSTOMERS
	=============================================*/

	static public function ctrShowdue($item, $value){
		
		$item = "RETURNS_DUE";

		$value = 1;

		$table = "cipc_annual_returns";

		$answer = Modeldue::mdlShowdue($table, $item, $value);

		return $answer;

	}

	/*=============================================
	EDIT CUSTOMER
	=============================================*/

	static public function ctrEditdue(){

		if(isset($_POST["editname"])){

			if(isset( $_POST["editname"]) 
			   ){

			   	$table = "cipc_annual_returns";
				
				$formatString = 'l, F j, Y';
				$date = date('l, F j, Y');
				
				$Currentdate = new DateTime($date);
				$date1 = new DateTime($_POST["editfiledate"]);

				$date2 = clone $date1;
				$date2->modify('+12 month');
				
				$reminder = $date2->modify('last day of -1 month')->format('l, F j, Y');
				
				$armonth = clone $date1;
				$armonth->modify('-1 month');

			   	$data = array("id"=>$_POST["editregnumber"],
			   				   "name"=>$_POST["editname"],
					           "fileddate"=>$_POST["editfiledate"],
							   "armonths"=>$armonth->format('M'),
								"nextdue"=>$date2->format($formatString),
								"howmanyreturns"=> $Currentdate ->format('Y') - $date2->format('Y'),
								"statusreminder"=>$reminder,
					           "regnumber"=>$_POST["editregnumber"]
					        );
				


			   	$answer = ModelAnnuals::mdlEditdue($table, $data);
				
				

			   	if($answer == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "The customer has been edited",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
									if (result.value) {

									window.location = "cipc-annual-returns";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "Customer cannot be blank or especial characters!",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
							if (result.value) {

							window.location =  "cipc-annual-returns";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	DELETE CUSTOMER
	=============================================*/

	static public function ctrDeletedue(){

		if(isset($_GET["regNumber"])){

			$table ="cipc_annual_returns";
			$data = $_GET["regNumber"];

			$answer = ModelAnnuals::mdlDeletedue($table, $data);

			if($answer == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "The customer has been deleted",
					  showConfirmButton: true,
					  confirmButtonText: "Close"
					  }).then(function(result){
								if (result.value) {

									window.location =  "due";


								}
							})

				</script>';

			}		

		}

	}
	/*=============================================
	SHOW Reminder Dates
	=============================================*/

	static public function ctrSendReminder($item, $value){

		$table = "cipc_annual_returns";

		$answer = ModelAnnuals::mdlSendReminder($table, $item, $value);

		return $answer;

	}
	
	public function ctrSendEmail(){
		
		$body = "";
$body .= "<table class='future col col-lg-12'>";

$body .= "<tr>";
$body .= "<td> <h2>Company Details</h2></td>";
$body .= "</tr>";

$body .= "<tr>";
$body .= "<td>Registration Number </td>";
$body .= "<td>Company Name</td>";
$body .= "<td>Returns Due</td>";
$body .= "<td>Due Date</td>";

$body .= "</tr>";

date_default_timezone_set('Africa/Johannesburg');
$item = "NEXT_PERIOD";
$date = date('l, F j, Y');
 $valor = $date;

$Customers = controllerAnnuals::ctrSendReminder($item, $valor);
foreach ($Customers as $key => $value) 
{
	 
						 $body .= "<tr>";
						 $body .= "<td>". $value["REGISTRATION_NUMBER"]."</td>";
						 $body .= "<td>".$value["ENTERPRISE_NAME"]."</td>";
						 
						 $body .= "<td>".$value["RETURNS_DUE"]."</td>";
						 $body .= "<td>".$value["NEXT_PERIOD"]."</td>";
						 $body .= "</tr>";		
} 

$body .= "</table>";
	
//echo  $body;

$subject = "CIPC Annual Returns Reminder Automated System";
$fromAddress = "info@simplefiling.co.za>";
$to_address = "emmanuel@technocreative.co.za.com";
	
$headers = "From:Masombuka<info@simplefiling.co.za>"."\r\n"."Reply-To:info@simplefiling.co.za>"."\r\n". 'Content-type:text/html;charset = us-ascii'."\r\n"."X-Mailer: PHP/" . phpversion();
//mail($to_address,$subject,$body,$headers)or die("Error connecting to mail server, please try again later");

	}
	



}
//$sendReminder = new  ControllerAnnuals();
//$sendReminder->ctrSendEmail();
