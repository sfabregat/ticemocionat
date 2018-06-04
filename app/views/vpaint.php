<?php
	/**
	 *  vPaint
	 * 
	 * */
	class vPaint extends View{

		function __construct(){
			parent::__construct();
			
			$this->tpl=Template::load('paint',$this->view_data);
			
		}

	}