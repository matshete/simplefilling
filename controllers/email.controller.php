<?php
//error_reporting(E_ERROR);
require("../extensions/phpMailer/class.PHPMailer.php");
require_once "../models/annualreturns.model.php";
class ControllerEmail{
	

	
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
		//COMPARE
		$item = "NEXT_PERIOD";
		$date = date('l, F j, Y');
		echo $valor = $date;

		$Customers = ControllerEmail::ctrSendReminder($item, $valor);
		
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
								 echo"updated";
				} 
			
		}else{
			//return FALSE;
			echo " not Successful";
			
		}
	}
	


}

$sendReminder = new  ControllerEmail();
$sendReminder->ctrSendEmail();