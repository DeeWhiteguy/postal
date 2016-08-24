<?php

class FMControllerVerify_email {
	////////////////////////////////////////////////////////////////////////////////////////
	// Events                                                                             //
	////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////
	// Constants                                                                          //
	////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////
	// Variables                                                                          //
	////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////
	// Constructor & Destructor                                                           //
	////////////////////////////////////////////////////////////////////////////////////////
	public function __construct() {
	}
	////////////////////////////////////////////////////////////////////////////////////////
	// Public Methods                                                                     //
	////////////////////////////////////////////////////////////////////////////////////////
	public function execute() {
		return $this->display();
	}

	public function display() {
		$gid = (int)((isset($_GET['gid']) && esc_html($_GET['gid']) != '') ? esc_html($_GET['gid']) : 0);
		$hashInfo = ((isset($_GET['h']) && esc_html($_GET['h']) != '') ? esc_html($_GET['h']) : 0);
		$hashInfo = explode("@",$hashInfo);
		
		$md5 = $hashInfo[0];
		$recipiend = isset($hashInfo[1]) ? $hashInfo[1] : '';	

		if($gid <= 0  or strlen($md5) <= 0 or strlen($recipiend) <= 0)
			return;

		require_once WD_FM_DIR . "/frontend/models/FMModelVerify_email.php";
		$model = new FMModelVerify_email();
		$result = $model->setValidation($gid,$md5,$recipiend);
		if($result!==NULL) {	
			require_once WD_FM_DIR . "/frontend/views/FMViewVerify_email.php";
			$view = new FMViewVerify_email($model);
			$view->display($result);
		}
	}
	////////////////////////////////////////////////////////////////////////////////////////
	// Getters & Setters                                                                  //
	////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////
	// Private Methods                                                                    //
	////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////
	// Listeners                                                                          //
	////////////////////////////////////////////////////////////////////////////////////////
}