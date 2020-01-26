<?php

class ControllerEmpvatB{

	/*=============================================
	CREATE CUSTOMERS
	=============================================*/

	static public function ctrCreateEmpvatB(){

		if(isset($_POST["newName"])){

			if(isset($_POST["newName"])
			   ){

			   	$table = "vata";
				
				$formatString = 'l, F j, Y';
				$date = date('l, F j, Y');
				
				$Currentdate = new DateTime($date);
				$date1 = new DateTime($_POST["newfileddate"]);
				
				$d1 = $date1->format('Ym');
				
				$d2 = $Currentdate->format('Ym');
				//echo $howmanyreturns = ($d2 / $d1);
				$howmanyreturns = ($d2/ 100 - $d1 / 100) * 12 + ($d2 % 100 - $d1 % 100)-1;
				//$howmanyreturns = ($howmanyreturns/6);
				//$howmanyreturns = ($howmanyreturns)-1;

						


				//$howmanyreturns = round($howmanyreturns,);
				
				

				$date2 = clone $date1;
				$date2->modify('+3 month');
				
				//$reminder = $date1->modify('last day of +5 month')->format('l, F j, Y');
				
				$armonth = clone $date1;
				$armonth->modify('-1 month');
			
				
				
				$fileddate = $_POST["newfileddate"];
				
			   	$data = array("name"=>$_POST["newName"], 
					           "fileddate"=>$_POST["newfileddate"],
							   "armonths"=>$armonth->format('M'),
								"nextdue"=>$date2->format($formatString),
								"howmanyreturns"=> $howmanyreturns,
								//"statusreminder"=>$reminder,
					           "regnumber"=>$_POST["newRegNumber"] );
							 // print_r($data);exit;
		
			   	$answer = ModelEmpvatB::mdlAddEmpvatB($table, $data);
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

									window.location = "vatB";

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

							window.location = "vatB";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	SHOW CUSTOMERS
	=============================================*/

	static public function ctrShowEmpvatB($item, $value){

		$table = "vata";

		$answer = ModelEmpvatB::mdlShowEmpvatB($table, $item, $value);
		

		return $answer;

	}

	/*=============================================
	EDIT CUSTOMER
	=============================================*/

	static public function ctrEditEmpvatB(){

		if(isset($_POST["editname"])){

			if($_POST["editname"]
			   ){

			   	$table = "vata";
				
				$formatString = 'l, F j, Y';
				$date = date('l, F j, Y');
				
				$Currentdate = new DateTime($date);
				$date1 = new DateTime($_POST["editfiledate"]);
				
				$d1 = $date1->format('Ym');
				
				$d2 = $Currentdate->format('Ym');
				//echo $howmanyreturns = ($d2 / $d1);
				$howmanyreturns = ($d2/ 100 - $d1 / 100) * 12 + ($d2 % 100 - $d1 % 100)-1;
				//$howmanyreturns = ($howmanyreturns/6);
				//$howmanyreturns = ($howmanyreturns)-1;
						


				 //$howmanyreturns = round($howmanyreturns,0);
				
				

				$date2 = clone $date1;
				$date2->modify('+6 month');
				
				//$reminder = $date1->modify('last day of +2 month')->format('l, F j, Y');
				
				$armonth = clone $date1;
				$armonth->modify('+3 month');
			
				
				
				
				
			   	$data = array("name"=>$_POST["editname"], 
					           "fileddate"=>$_POST["editfiledate"],
								"nextdue"=>$date2->format($formatString),
								"howmanyreturns"=> $howmanyreturns,
								//"statusreminder"=>$reminder,
					           "regnumber"=>$_POST["editregnumber"] );
							 // print_r($data);exit;


			   	$answer = ModelEmpvatB::mdlEditEmpvatB($table, $data);
				print_r($answer);
				

			   	if($answer == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "The customer has been edited",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
									if (result.value) {

									window.location = "vatB";

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

							window.location =  "vatB";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	DELETE CUSTOMER
	=============================================*/

	static public function ctrDeleteEmpvatB(){

		if(isset($_GET["regNumber"])){

			$table ="vata";
			$data = $_GET["regNumber"];
		

			$answer = ModelEmpvatB::mdlDeleteEmpvatB($table, $data);
			
		

			if($answer == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "The customer has been deleted",
					  showConfirmButton: true,
					  confirmButtonText: "Close"
					  }).then(function(result){
								if (result.value) {

									window.location =  "vatB";


								}
							})

				</script>';

			}		

		}

	}

}

