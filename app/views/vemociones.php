<?php
	/**
	 *  vEmociones
	 * 
	 * */
	class vEmociones extends View{

		function __construct(){
			parent::__construct();
			$this->tpl=Template::load('emociones',$this->view_data);
		}

	}