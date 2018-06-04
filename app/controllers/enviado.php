<?php
	final class Enviado extends Controller{
		function __construct($params=null){
			parent::__construct($params);
			$this->conf=Registry::getInstance();

			$this->model=new mEnviado;
			$this->view=new vEnviado;
		}
		function home(){
			
			
		}
	}