<?php
/**
	 *  vEnviado
	 * 
	 * */
	class vEnviado extends View{

		function __construct(){
			parent::__construct();
			
			$this->tpl=Template::load('enviado',$this->view_data);
			
		}

	}