<?php

class ControllerEmpobjemptax501{

	/*=============================================
	CREATE CUSTOMERS
	=============================================*/

	static public function ctrCreateEmpobjemptax501(){

		if(isset($_POST["newName"])){

			if(isset($_POST["newName"])
			   ){

			   	$table = "objemptax501";
				
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
		
			   	$answer = ModelEmpobjemptax501::mdlAddEmpobjemptax501($table, $data);
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

									window.location = "objemptax501";

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

							window.location = "objemptax501";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	SHOW CUSTOMERS
	=============================================*/

	static public function ctrShowEmpobjemptax501($item, $value){

		$table = "objemptax501";

		$answer = ModelEmpobjemptax501::mdlShowEmpobjemptax501($table, $item, $value);
		

		return $answer;

	}

	/*=============================================
	EDIT CUSTOMER
	=============================================*/

	static public function ctrEditEmpobjemptax501(){

		if(isset($_POST["editname"])){

			if($_POST["editname"]
			   ){

			   	$table = "objemptax501";
				
				
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


			   	$answer = ModelEmpobjemptax501::mdlEditEmpobjemptax501($table, $data);
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

									window.location = "objemptax501";

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

							window.location =  "objemptax501";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	DELETE CUSTOMER
	=============================================*/

	static public function ctrDeleteEmpobjemptax501(){

		if(isset($_GET["regNumber"])){

			$table ="objemptax501";
			$data = $_GET["regNumber"];
		

			$answer = ModelEmpobjemptax501::mdlDeleteEmpobjemptax501($table, $data);
			
		

			if($answer == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "The customer has been deleted",
					  showConfirmButton: true,
					  confirmButtonText: "Close"
					  }).then(function(result){
								if (result.value) {

									window.location =  "objemptax501";


								}
							})

				</script>';

			}		

		}

	}

}

