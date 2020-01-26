<?php

require_once "../controllers/notes.controller.php";
require_once "../models/notes.model.php";

class AjaxNotes{

	/*=============================================
	EDIT Notes
	=============================================*/	

	public $idNotes;

	public function ajaxEditNotes(){

		$item = "id";
		$value = $this->idNotes;

		 $answer = ControllerNotes::ctrShowNotes($item, $value);

		//var_dump($answer);
	//$answer = array("Notes"=>"1","Cash"=>"600","id"=>$value);

		echo json_encode($answer);

	}
}

/*=============================================
EDIT Notes
=============================================*/	
if(isset($_POST["idNotes"])){

	$notes = new AjaxNotes();
	$notes -> idNotes = $_POST["idNotes"];
	$notes -> ajaxEditNotes();
}
