<?php
error_reporting(E_ERROR);
include("models/it12.model.php");
include("../models/it12.model.php");
class ControllerEmpit12{

	/*=============================================
	CREATE CUSTOMERS
	=============================================*/

	static public function ctrCreateEmpit12(){

		if(isset($_POST["newName"])){

			if(isset($_POST["newName"])
			   ){

			   	$table = "it12";
				
				$formatString = 'l, F j, Y';
				$date = date('l, F j, Y');
				
				$Currentdate = new DateTime($date);
				$date1 = new DateTime($_POST["newfileddate"]);
				
				$d1 = $date1->format('Ym');
				
				$d2 = $Currentdate->format('Ym');
				//echo $howmanyreturns = ($d2 / $d1);
				$howmanyreturns = ($d2/ 100 - $d1 / 100) * 12 + ($d2 % 100 - $d1 % 100);
				$howmanyreturns = ($howmanyreturns/12);
				$howmanyreturns = ($howmanyreturns-1);	
			       

				//NEXT DUE	
				$year = date('Y');
				
				$month = date('m');
				
				if($month >=02){$year= $year +1;}
				
				
				$nextdue = 'February 1,'.$year;
				
				//$reminder = $date1->modify('last day of +5 month')->format('l, F j, Y');
				
				$armonth = clone $date1;
				$armonth->modify('-1 month');
			
				
				
				$fileddate = $_POST["newfileddate"];
				
			   	$data = array("name"=>$_POST["newName"], 
					           "fileddate"=>$_POST["newfileddate"],
							   "armonths"=>$armonth->format('M'),
								"nextdue"=>$nextdue,
								"howmanyreturns"=> $howmanyreturns,
								//"statusreminder"=>$reminder,
					           "regnumber"=>$_POST["newRegNumber"] );
							 // print_r($data);exit;
		
			   	$answer = ModelEmpit12::mdlAddEmpit12($table, $data);
				//print_r($answer);
				//exit();
				
			   	if($answer == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "The customer has been saved",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
									if (result.value) {

									window.location = "it12";

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

							window.location = "it12";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	SHOW CUSTOMERS
	=============================================*/

	static public function ctrShowEmpit12($item, $value){

		$table = "it12";

		$answer = ModelEmpit12::mdlShowEmpit12($table, $item, $value);
		

		return $answer;

	}

	/*=============================================
	EDIT CUSTOMER
	=============================================*/

	static public function ctrEditEmpit12(){

		if(isset($_POST["editname"])){

			if($_POST["editname"]
			   ){

			   	$table = "it12";
				
				$formatString = 'l, F j, Y';
				$date = date('l, F j, Y');
				
				$Currentdate = new DateTime($date);
				$date1 = new DateTime($_POST["editfiledate"]);
				
				$d1 = $date1->format('Ym');
				
				$d2 = $Currentdate->format('Ym');
				//echo $howmanyreturns = ($d2 / $d1);
				$howmanyreturns = ($d2/ 100 - $d1 / 100) * 12 + ($d2 % 100 - $d1 % 100);
				$howmanyreturns = ($howmanyreturns/12);
				$howmanyreturns = ($howmanyreturns-1);		


				 //$howmanyreturns = round($howmanyreturns,0);
				
				

				$date2 = clone $date1;
				$date2->modify('+12 month');
				
				//$reminder = $date1->modify('last day of +2 month')->format('l, F j, Y');
				
				$armonth = clone $date1;
				$armonth->modify('-1 month');
			
				
				
				
				
			   	$data = array("name"=>$_POST["editname"], 
					           "fileddate"=>$_POST["editfiledate"],
								"nextdue"=>$date2->format($formatString),
								"howmanyreturns"=> $howmanyreturns,
								//"statusreminder"=>$reminder,
					           "regnumber"=>$_POST["editregnumber"] );
							 // print_r($data);exit;


			   	$answer = ModelEmpit12::mdlEditEmpit12($table, $data);
				//print_r($answer);
				

			   	if($answer == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "The customer has been edited",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
									if (result.value) {

									window.location = "it12";

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

							window.location =  "it12";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	DELETE CUSTOMER
	=============================================*/

	static public function ctrDeleteEmpit12(){

		if(isset($_GET["regNumber"])){

			$table ="it12";
			$data = $_GET["regNumber"];
		

			$answer = ModelEmpit12::mdlDeleteEmpit12($table, $data);
			
		

			if($answer == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "The customer has been deleted",
					  showConfirmButton: true,
					  confirmButtonText: "Close"
					  }).then(function(result){
								if (result.value) {

									window.location =  "it12";


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

		$table = "Empit12";

		$answer = ModelEmpit12::mdlSendReminder($table, $item, $value);

		return $answer;

	}
	//End Function 
	
	public function ctrSendEmail(){
		
		$body = "";
		$body .= "<table class='future col col-lg-12'>";

		$body .= "<tr>";
		$body .= "<td> <h2>File Annual Returns</h2></td>";
		$body .= "</tr>";

		$body .= "<tr>";
		$body .= "<td>Registration Number </td>";
		$body .= "<td>Company Name</td>";
		$body .= "<td>Date</td>";
		$body .= "<td>Number of returns</td>";

		$body .= "</tr>";
		//COMPARE
		$item = "NEXT_PERIOD";
		$date = date('l, F j, Y');
		$valor = $date;

		$Customers = controllerEmpit12::ctrSendReminder($item, $valor);
		
		//print_r($Customers);
		
		foreach ($Customers as $key => $value) 
		{
			
				$body .= "<tr>";
								 $body .= "<td>". $value["REGISTRATION_NUMBER"]."</td>";
								 $body .= "<td>".$value["ENTERPRISE_NAME"]."</td>";
								 $body .= "<td>".$value["NEXT_PERIOD"]."</td>";
								 $body .= "<td>".$value["RETURNS_DUE"]."</td>";
								 $body .= "</tr>";	
		} 

			//email start

				$body .= "</table>";
			
		  //echo  $body;

		if($value["STATUS_REMINDER"] == '0')
		{
								 
		//exit;
		
		$mail = new PHPMailer();

		// SMTP configuration
		$mail->isSMTP();
		$mail->Host = 'mail.masombukaimports.co.za';
		$mail->SMTPAuth = true;
		$mail->Username = 'info@masombukaimports.co.za';
		$mail->Password = 'q1w2e3r4t5';
		$mail->SMTPSecure = '';
		$mail->Port = 587;

		$mail->setFrom('emmanuel.molobela@gmail.com', 'CIPC Annual Reminder Automated System');

		// Add a recipient
		$to="info@masombukaimports.co.za";
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
			
			
		$table = "Empit12";
			
			foreach ($Customers as $key => $value) 
				{
			 
					$regnumber = $value["REGISTRATION_NUMBER"];
					$name = $value["ENTERPRISE_NAME"];
					$fileddate = $value["YEAR_FILED"];
					//$armonth = $value["AR_MONTH"];
					$nextdue = $value["NEXT_PERIOD"];
					$howmanyreturns = $value["RETURNS_DUE"];
					$reminder = "1";
								  
					$data = array("id"=>$regnumber,
								"name"=>$name,
								"fileddate"=>$fileddate,
								//"armonths"=>$armonth,
								"nextdue"=>$nextdue,
								"howmanyreturns"=> $howmanyreturns,
								"statusreminder"=>$reminder,
								"regnumber"=>$regnumber);
								   
					$answer = ModelEmpit12::mdlEditEmpit12($table, $data);
					
					//echo"updated";
				} 
			
		}else{
			//return FALSE;
			//echo " not Successful";
		}

		//email end

									
		}
	

	}
	//End Function




}

$ctrSendReminder = new ControllerEmpit12();
$ctrSendReminder->ctrSendEmail();
