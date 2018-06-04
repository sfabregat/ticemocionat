<?php
	/**
	 *  vCuentos
	 * 
	 * */
	class vCuentos extends View{

		function __construct(){
			parent::__construct();
			$this->tpl=Template::load('cuentos',$this->view_data);
		}

	}