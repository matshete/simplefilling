<?phprequire_once "../controllers/objirp6.controller.php";require_once "../models/objirp6.model.php";class AjaxEmpobjirp6{	/*=============================================	EDIT CUSTOMER	=============================================*/		public $regNumber;	public function ajaxEditEmpobjirp6(){		$item = "REGISTRATION_NUMBER";		$value = $this->regNumber;		$answer = Controllerempobjirp6::ctrShowempobjirp6($item, $value);		//print_r($answer);					echo json_encode($answer);	}				/*=============================================	VALIDATE IF USER ALREADY EXISTS	=============================================*/	public $validateregNumber;	public function ajaxValidateRegNumber(){		$item = "REGISTRATION_NUMBER";		$value = $this->validateregNumber;		$answer = Controllerempobjirp6::ctrShowempobjirp6($item, $value);		//print_r($answer);		echo json_encode($answer);	}}/*=============================================EDIT Empobjirp6=============================================*/	if(isset($_POST["regNumber"])){	$Customer = new AjaxEmpobjirp6();	$Customer -> regNumber = $_POST["regNumber"];	$Customer -> ajaxEditEmpobjirp6();}/*=============================================VALIDATE IF USER ALREADY EXISTS=============================================*/if (isset($_POST["validateregNumber"])) {	$valUser = new AjaxEmpobjirp6();	$valUser -> validateregNumber = $_POST["validateregNumber"];	$valUser -> ajaxValidateRegNumber();}