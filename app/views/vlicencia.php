<?php
	/**
	 *  vLicencia
	 * 
	 * */
	class vLicencia extends View{

		function __construct(){
			parent::__construct();
			
			$this->tpl=Template::load('licencia',$this->view_data);
			
		}

	}