<?php
	/**
	 *  vGame
	 * 
	 * */
	class vGame extends View{

		function __construct(){
			parent::__construct();
			
			$this->tpl=Template::load('game',$this->view_data);
			
		}

	}