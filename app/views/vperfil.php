<?php
	/**
	 *  vPerfil
	 * 
	 * */
	class vPerfil extends View{

		function __construct(){
			parent::__construct();
			
			$this->tpl=Template::load('perfil',$this->view_data);
			
		}

	}