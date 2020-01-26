<?php

class Controlleremp201{

	/*=============================================
	CREATE CUSTOMERS
	=============================================*/

	static public function ctrCreateemp201(){

		if(isset($_POST["newName"])){

			if(isset($_POST["newName"])
			   ){

			   	$table = "emp201";
				
				$formatString = 'l, F j, Y';
				$date = date('l, F j, Y');
				
				$Currentdate = new DateTime($date);
				$date1 = new DateTime($_POST["newfileddate"]);
				
				$d1 = $date1->format('Ym');
				
				$d2 = $Currentdate->format('Ym');
				//$howmanyreturns = ($d2 / $d1);
				$howmanyreturns = ($d2/ 100 - $d1 / 100) * 12 + ($d2 % 100 - $d1 % 100);

						


				$howmanyreturns = round($howmanyreturns,0);
				
				

				$date2 = clone $date1;
				$date2->modify('+2 month');
				
				$reminder = $date1->modify('last day of +2 month')->format('l, F j, Y');
				
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
		
			   	$answer = Modelemp201::mdlAddemp201($table, $data);
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

									window.location = "emp201";

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

							window.location = "emp201";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	SHOW CUSTOMERS
	=============================================*/

	static public function ctrShowemp201($item, $value){

		$table = "emp201";

		$answer = Modelemp201::mdlShowemp201($table, $item, $value);

		return $answer;

	}

	/*=============================================
	EDIT CUSTOMER
	=============================================*/

	static public function ctrEditemp201(){

		if(isset($_POST["editname"])){

			if($_POST["editname"]
			   ){

			   	$table = "emp201";
				
				$formatString = 'l, F j, Y';
				$date = date('l, F j, Y');
				
				$Currentdate = new DateTime($date);
				$date1 = new DateTime($_POST["editfiledate"]);
				
				$d1 = $date1->format('Ym');
				"<br>";
				$d2 = $Currentdate->format('Ym');
				//$howmanyreturns = ($d2 / $d1);
				$howmanyreturns = ($d2/ 100 - $d1 / 100) * 12 + ($d2 % 100 - $d1 % 100);

						


				 $howmanyreturns = round($howmanyreturns,0);
				
				

				$date2 = clone $date1;
				$date2->modify('+2 month');
				
				$reminder = $date1->modify('last day of +2 month')->format('l, F j, Y');
				
				$armonth = clone $date1;
				$armonth->modify('-1 month');
			
				
				
				
				
			   	$data = array("name"=>$_POST["editname"], 
					           "fileddate"=>$_POST["editfiledate"],
								"nextdue"=>$date2->format($formatString),
								"howmanyreturns"=> $howmanyreturns,
								"statusreminder"=>$reminder,
					           "regnumber"=>$_POST["editregnumber"] );
							  //print_r($data);exit;


			   	$answer = ModelEmp201::mdlEditemp201($table, $data);
				
				

			   	if($answer == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "The customer has been edited",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
									if (result.value) {

									window.location = "emp201";

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

							window.location =  "emp201";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	DELETE CUSTOMER
	=============================================*/

	static public function ctrDeleteemp201(){

		if(isset($_GET["regNumber"])){

			$table ="emp201";
			$data = $_GET["regNumber"];
		

			$answer = Modelemp201::mdlDeleteemp201($table, $data);
			
		

			if($answer == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "The customer has been deleted",
					  showConfirmButton: true,
					  confirmButtonText: "Close"
					  }).then(function(result){
								if (result.value) {

									window.location =  "emp201";


								}
							})

				</script>';

			}		

		}

	}

}

