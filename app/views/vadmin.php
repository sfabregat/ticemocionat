<?php
	/**
	 *  vAdmin
	 * 
	 * */
	class vAdmin extends View{

		function __construct(){
			parent::__construct();
			
			$this->tpl=Template::load('admin',$this->view_data);	
		}
	}