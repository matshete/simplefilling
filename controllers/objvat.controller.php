<?php
error_reporting(E_ERROR);
include("models/objvat.model.php");
include("../models/objvat.model.php");
class ControllerEmpobjvat{

	/*=============================================
	CREATE CUSTOMERS
	=============================================*/

	static public function ctrCreateEmpobjvat(){

		if(isset($_POST["newName"])){

			if(isset($_POST["newName"])
			   ){

			   	$table = "objvat";
				
				$year = date('Y');
				
				$month = date('m');
				
				if($month >=03){$year= $year +1;}
				
				
				$nextdue = 'March 31,'.$year;
				
				
				$fileddate = $_POST["newfileddate"];
				
			   	$data = array("name"=>$_POST["newName"], 
					           "fileddate"=>$_POST["newfileddate"],
							 
								"nextdue"=>$nextdue,
								"howmanyreturns"=> $howmanyreturns,
					           "regnumber"=>$_POST["newRegNumber"] );
							 // print_r($data);exit;
		
			   	$answer = ModelEmpobjvat::mdlAddEmpobjvat($table, $data);
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

									window.location = "objvat";

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

							window.location = "objvat";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	SHOW CUSTOMERS
	=============================================*/

	static public function ctrShowEmpobjvat($item, $value){

		$table = "objvat";

		$answer = ModelEmpobjvat::mdlShowEmpobjvat($table, $item, $value);
		

		return $answer;

	}

	/*=============================================
	EDIT CUSTOMER
	=============================================*/

	static public function ctrEditEmpobjvat(){

		if(isset($_POST["editname"])){

			if($_POST["editname"]
			   ){

			   	$table = "objvat";
				
				
				$year = date('Y');
				
				$month = date('m');
				
				if($month >=03){$year= $year +1;}
				
				
				$nextdue = 'March 31,'.$year;
				
			   	$data = array("name"=>$_POST["editname"], 
					           "fileddate"=>$_POST["editfiledate"],
								"nextdue"=>$nextdue,
								"howmanyreturns"=> $howmanyreturns,
					           "regnumber"=>$_POST["editregnumber"] );
							 // print_r($data);exit;


			   	$answer = ModelEmpobjvat::mdlEditEmpobjvat($table, $data);
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

									window.location = "objvat";

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

							window.location =  "objvat";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	DELETE CUSTOMER
	=============================================*/

	static public function ctrDeleteEmpobjvat(){

		if(isset($_GET["regNumber"])){

			$table ="objvat";
			$data = $_GET["regNumber"];
		

			$answer = ModelEmpobjvat::mdlDeleteEmpobjvat($table, $data);
			
		

			if($answer == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "The customer has been deleted",
					  showConfirmButton: true,
					  confirmButtonText: "Close"
					  }).then(function(result){
								if (result.value) {

									window.location =  "objvat";


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

		$table = "objvat";

		$answer = ModelEmpobjvat::mdlSendReminder($table, $item, $value);

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

		$Customers = ControllerEmpobjvat::ctrSendReminder($item, $valor);
		
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
			
			
		$table = "objvat";
			
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
								   
					$answer = Modelobjvat::mdlEditobjvat($table, $data);
					
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

$ctrSendReminder = new ControllerEmpobjvat();
$ctrSendReminder->ctrSendEmail();

