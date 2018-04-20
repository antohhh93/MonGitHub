<?php  defined('BASEPATH') or exit('No direct script access allowed');
class Hello extends CI_Controller{

	public function __construct(){
		parent::__construct();
		//si je met le constructeur il sera toujours present !
		echo "Yo je suis le contructeur <br>";

	}
		public function index (){
		//
		echo "c'est la function Index ";
	}
	public function one($p1, $p2="Zakaria"){
		//
		echo "Salut Zak ! <br/>";
		echo "on travail avec les parametres $p1, $p2 ";
	}
	public function two (){
		//
		echo "je suis la function two !";
	}

}