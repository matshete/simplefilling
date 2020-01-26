<?php
//error_reporting(E_ERROR);
require("../extensions/phpMailer/class.PHPMailer.php");
require_once "../models/annualreturns.model.php";
class ControllerAnnuals{

	/*=============================================
	CREATE CUSTOMERS
	=============================================*/

	static public function ctrCreateAnnuals(){

		if(isset($_POST["newName"])){

			if(preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["newName"])
			   ){

			   	$table = "cipc_annual_returns";
				
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
								"howmanyreturns"=> $Currentdate ->format('Y') - $date2->format('Y') + 1,
								"statusreminder"=>$reminder,
					           "regnumber"=>$_POST["newRegNumber"] );
		
			   	$answer = ModelAnnuals::mdlAddAnnuals($table, $data);
				
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

	static public function ctrShowAnnuals($item, $value){

		$table = "cipc_annual_returns";

		$answer = ModelAnnuals::mdlShowAnnuals($table, $item, $value);

		return $answer;

	}

	/*=============================================
	EDIT CUSTOMER
	=============================================*/

	static public function ctrEditAnnuals(){

		if(isset($_POST["editname"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editname"]) 
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
								"howmanyreturns"=> $Currentdate ->format('Y') - $date2->format('Y') + 1,
								"statusreminder"=>$reminder,
					           "regnumber"=>$_POST["editregnumber"]
					        );
				//print_r($data);


			   	$answer = ModelAnnuals::mdlEditAnnuals($table, $data);
				
				

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

	static public function ctrDeleteAnnuals(){

		if(isset($_GET["regNumber"])){

			$table ="cipc_annual_returns";
			$data = $_GET["regNumber"];

			$answer = ModelAnnuals::mdlDeleteAnnuals($table, $data);

			if($answer == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "The customer has been deleted",
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
		$body .= "<td> <h2>Details of the Current Due Companies For Filling</h2></td>";
		$body .= "</tr>";

		$body .= "<tr>";
		$body .= "<td>Registration Number </td>";
		$body .= "<td>Company Name</td>";
		$body .= "<td>Date</td>";
		$body .= "<td>status Reminder</td>";

		$body .= "</tr>";

		$item = "NEXT_PERIOD";
		$date = date('l, F j, Y');
		echo $valor = $date;

		$Customers = controllerAnnuals::ctrSendReminder($item, $valor);
		
		print_r($Customers);
		
		foreach ($Customers as $key => $value) 
		{
			echo $value["STATUS_REMINDER"];
				if($value["STATUS_REMINDER"] == '0')
				{
								 $body .= "<tr>";
								 $body .= "<td>". $value["REGISTRATION_NUMBER"]."</td>";
								 $body .= "<td>".$value["ENTERPRISE_NAME"]."</td>";
								 $body .= "<td>".$value["NEXT_PERIOD"]."</td>";
								 $body .= "<td>".$value["STATUS_REMINDER"]."</td>";
								 $body .= "</tr>";		
				}
		} 
	
		$body .= "</table>";
		
			
		echo  $body;
		//exit;
		
		$mail = new PHPMailer();

		// SMTP configuration
		$mail->isSMTP();
		$mail->Host = 'mail.technocreative.co.za';
		$mail->SMTPAuth = true;
		$mail->Username = 'emmanuel@technocreative.co.za';
		$mail->Password = 'Emmana3671';
		$mail->SMTPSecure = '';
		$mail->Port = 587;

		$mail->setFrom('emmanuel@technocreative.co.za', 'CIPC Annual Reminder Automated System');

		// Add a recipient
		$to="emmanuel.molobela@gmail.com";
		$mail->addAddress($to);



		// Email subject
		$sub="CIPC Annual Reminder Automated System";
		$mail->Subject = $sub;

		// Set email format to HTML
		$mail->isHTML(true);

		// Email body content
		$mailContent = $body;
		$mail->Body = $mailContent;

		// Send email
		if($mail->send()){
			//return TRUE;
			
			
			$table = "cipc_annual_returns";
			
			foreach ($Customers as $key => $value) 
				{
			 
								 $regnumber = $value["REGISTRATION_NUMBER"];
								 $name = $value["ENTERPRISE_NAME"];
								 $fileddate = $value["YEAR_FILED"];
								 $armonth = $value["AR_MONTH"];
								 $nextdue = $value["NEXT_PERIOD"];
								 $howmanyreturns = $value["RETURNS_DUE"];
								 $reminder = "1";
								  
								$data = array("id"=>$regnumber,
											"name"=>$name,
											"fileddate"=>$fileddate,
											"armonths"=>$armonth,
											"nextdue"=>$nextdue,
											"howmanyreturns"=> $howmanyreturns,
											"statusreminder"=>$reminder,
											"regnumber"=>$regnumber
								);
								   
								 $answer = ModelAnnuals::mdlEditAnnuals($table, $data);
								 print_r($answer);
								 echo"upadted";
				} 
			
		}else{
			//return FALSE;
			echo " not Successful";
			
		}
	}
	


}

$sendReminder = new  ControllerAnnuals();
$sendReminder->ctrSendEmail();