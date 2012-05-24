<?php
Doo::loadClass ( "ViewHelper" );
Doo::loadClass ( "LangHelper" );
Doo::loadClass ( "VersionHelper" );
Doo::loadClass("Cache");
Doo::loadModel ( "User" );

class BaseController extends DooController {
	
	public function afterRun($routeResult) {
		parent::afterRun ( $routeResult );
	
	}
	public function beforeRun($resource, $action) {
		parent::beforeRun();
	}
	public function renderc($view, $data = NULL, $layout = 'qr-layout') {
		$this->model = $data;
		$data = $this;
		 
		parent::renderc ( '/template/' . $layout, $data );
	}
	 
	/***
	 * Todo redirect
	 * 
	 * */
	public function redirect($view) {
		//	     header("Location:".Doo::conf()->APP_URL.Doo::conf()->LANG.'/'.$view);
		echo '<html> 
<head> 
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf8"> 
<title></title> 
</head> 
<body> 
<meta http-equiv="refresh" content="0.1;url=' . Doo::conf ()->APP_URL . Doo::conf ()->LANG . '/' . $view . '"> 
</body> 
</html>';
		exit ();
	}
}