<?php
/**
 * Created by PhpStorm.
 * User: Zachary
 * Date: 2018-04-09
 * Time: 00:24
 */
class Form extends CI_Controller {

	public function index()
	{
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules('util_nom', 'util_prenom', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required',
			array('required' => 'You must provide a %s.')
		);
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('pages/utilisateurs/connexion.php');
		}
		else
		{
			$this->load->view('pages/utilisateurs/connexion.php');
		}
	}
}
