<?phprequire_once "../controllers/it14sd.controller.php";require_once "../models/it14sd.model.php";class AjaxEmpit14sd{	/*=============================================	EDIT CUSTOMER	=============================================*/		public $regNumber;	public function ajaxEditEmpit14sd(){		$item = "REGISTRATION_NUMBER";		$value = $this->regNumber;		$answer = Controllerempit14sd::ctrShowempit14sd($item, $value);		//print_r($answer);					echo json_encode($answer);	}				/*=============================================	VALIDATE IF USER ALREADY EXISTS	=============================================*/	public $validateregNumber;	public function ajaxValidateRegNumber(){		$item = "REGISTRATION_NUMBER";		$value = $this->validateregNumber;		$answer = Controllerempit14sd::ctrShowempit14sd($item, $value);		//print_r($answer);		echo json_encode($answer);	}}/*=============================================EDIT Empit14sd=============================================*/	if(isset($_POST["regNumber"])){	$Customer = new AjaxEmpit14sd();	$Customer -> regNumber = $_POST["regNumber"];	$Customer -> ajaxEditEmpit14sd();}/*=============================================VALIDATE IF USER ALREADY EXISTS=============================================*/if (isset($_POST["validateregNumber"])) {	$valUser = new AjaxEmpit14sd();	$valUser -> validateregNumber = $_POST["validateregNumber"];	$valUser -> ajaxValidateRegNumber();}