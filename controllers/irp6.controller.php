<?php

class Controllerempirp6{

	/*=============================================
	CREATE CUSTOMERS
	=============================================*/

	static public function ctrCreateempirp6(){

		if(isset($_POST["newName"])){

			if(isset($_POST["newName"])
			   ){

			   	$table = "irp6";
				$formatString = 'l, F j, Y';
				$date = date('l, F j, Y');
				
				$Currentdate = new DateTime($date);
				$date1 = new DateTime($_POST["newfileddate"]);
				
				$d1 = $date1->format('Ym');
				
				$d2 = $Currentdate->format('Ym');
				//echo $howmanyreturns = ($d2 / $d1);
				$howmanyreturns = ($d2/ 100 - $d1 / 100) * 12 + ($d2 % 100 - $d1 % 100);
				$howmanyreturns = ($howmanyreturns/6);
				$howmanyreturns = ($howmanyreturns)-1;

						


				//$howmanyreturns = round($howmanyreturns,);
				
				

				$date2 = clone $date1;
				$date2->modify('+6 month');
				
				//$reminder = $date1->modify('last day of +5 month')->format('l, F j, Y');
				
				$armonth = clone $date1;
				$armonth->modify('-1 month');
				
				$fileddate = $_POST["newfileddate"];
				
			   	$data = array("name"=>$_POST["newName"], 
					           "fileddate"=>$_POST["newfileddate"],
							   "armonths"=>$armonth->format('M'),
								"nextdue"=>$date2->format($formatString),
								"howmanyreturns"=> $howmanyreturns,
								"statusreminder"=>$reminder,
					           "regnumber"=>$_POST["newRegNumber"] );
							  //print_r($data);exit;
		
			   	$answer = Modelempirp6::mdlAddempirp6($table, $data);
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

									window.location = "irp6";

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

							window.location = "irp6";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	SHOW CUSTOMERS
	=============================================*/

	static public function ctrShowempirp6($item, $value){

		$table = "irp6";

		$answer = Modelempirp6::mdlShowempirp6($table, $item, $value);
		

		return $answer;

	}

	/*=============================================
	EDIT CUSTOMER
	=============================================*/

	static public function ctrEditempirp6(){

		if(isset($_POST["editname"])){

			if($_POST["editname"]
			   ){

			   	$table = "irp6";
				
				$formatString = 'l, F j, Y';
				$date = date('l, F j, Y');
				
				$Currentdate = new DateTime($date);
				$date1 = new DateTime($_POST["editfiledate"]);
				
				$d1 = $date1->format('Ym');
				
				$d2 = $Currentdate->format('Ym');
				//echo $howmanyreturns = ($d2 / $d1);
				$howmanyreturns = ($d2/ 100 - $d1 / 100) * 12 + ($d2 % 100 - $d1 % 100);
				$howmanyreturns = ($howmanyreturns/6);
				$howmanyreturns = ($howmanyreturns)-1;
						


				 //$howmanyreturns = round($howmanyreturns,0);
				
				

				$date2 = clone $date1;
				$date2->modify('+6 month');
				
				//$reminder = $date1->modify('last day of +2 month')->format('l, F j, Y');
				
				$armonth = clone $date1;
				$armonth->modify('-1 month');
			
				
				
				
				
			   	$data = array("name"=>$_POST["editname"], 
					           "fileddate"=>$_POST["editfiledate"],
								"nextdue"=>$date2->format($formatString),
								"howmanyreturns"=> $howmanyreturns,
								//"statusreminder"=>$reminder,
					           "regnumber"=>$_POST["editregnumber"] );
							  //print_r($data);exit;


			   	$answer = ModelEmpirp6::mdlEditempirp6($table, $data);
				
				

			   	if($answer == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "The customer has been edited",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
									if (result.value) {

									window.location = "irp6";

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

							window.location =  "irp6";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	DELETE CUSTOMER
	=============================================*/

	static public function ctrDeleteempirp6(){

		if(isset($_GET["regNumber"])){

			$table ="irp6";
			$data = $_GET["regNumber"];
		

			$answer = Modelempirp6::mdlDeleteempirp6($table, $data);
			
		

			if($answer == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "The customer has been deleted",
					  showConfirmButton: true,
					  confirmButtonText: "Close"
					  }).then(function(result){
								if (result.value) {

									window.location =  "irp6";


								}
							})

				</script>';

			}		

		}

	}

}

