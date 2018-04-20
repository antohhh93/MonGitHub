<?php
/**
 * Created by PhpStorm.
 * User: Zachary
 * Date: 2018-04-15
 * Time: 14:37
 */
class cordoba_ctrl extends CI_Controller{

	private $domDomc;
public function __construct()
{
	parent::__construct();
	//$this->load->model();
	//$this->domDomc = new DOMDocument();
	//$this->domDomc->load('input_xml/cordoba.xml');
}
public function index(){
	$data['title']='Rabi3 Corda Section Vide ton Coeur !';
	$this->load->view('templates/header', $data);


}

}
