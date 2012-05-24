<?php
class ViewHelper {
	private $data;
	private $view;
	
	public function __construct($data, $view) {
		$this->data = $data;
		$this->view = $view;
	}
	
	public function printJsImports() {
		$static=$this->data->STATIC_BASE.'common/js/';
				
		$path = $static.str_replace('/', '-', $this->data->view).'.js';
        echo $this->getJsImport($path);
	}
    public function printCssImports() {
		$static=$this->data->STATIC_BASE.'common/css/';
				
		$path = $static.str_replace('/', '-', $this->data->view).'.css';
        echo $this->getCssImport($path);
	}
	
	private function getJsImport($path) {
		return '<script type="text/javascript" src="'.$path.'"></script>';
	}
    private function getCssImport($path) {
		return ' <link rel="stylesheet" href="'.$path.'"/>';
	}
	
}
