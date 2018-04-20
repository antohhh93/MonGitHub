<?php

class Pages extends CI_Controller
{
	/**
	 * Pages constructor.
	 */
	public function __construct()
	{
		//tres important lors de l'utilisation de la session !
		parent::__construct();
		$this->load->library('form_validation');
		$this->lang->load('form_validation');
		$this -> load -> library ( 'session' );
		$this->load->model('modelSing');
		$this->load->helper('url_helper');
		$this->load->helper('security');
		$this->load->helper('email');
	}

	public function index(){
		$data['titre'] = 'Veillez vous Connectez ';
		$this->load->view('templates/mesTemplates/myHead', $data);
		//je commence a me connecter a ma page connexion
		//$this->load->view('pages/utilisateurs/connexion');
		$this->connection();
		//lancement du boutton submit
		$this->load->view('templates/submit');
		$this->load->view('templates/footer', $data);


	}

	public function getJoueurs(){
		$data['titre'] = 'Mon super site ! ';
		$data['joueurs'] =  $this->modelSing->getJoueurs();

		$this->load->view('templates/mesTemplates/myHead', $data);
		$this->load->view('pages/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function view($page = 'home')
	{
		if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
// attention, nous n’avons pas fait de page pour gérer ce cas.
			show_404();
		}
		$data['title'] = ucfirst($page);
		$this->load->view('templates/header', $data);
		$this->load->view('pages/' . $page, $data);
		$this->load->view('templates/footer', $data);
	}

	/**
	 * nous alllons mettre en place une function qui fait une selection par id
	 * ce dernier va etre afficher a l'aide de href( qui est dans la page index
	 * @param  $id
	 */
	public function getJoueur($id = null){
		$data['titre'] = 'en Mode Affichage solo !';
		$data['joueur'] = $this->modelSing->getJoueurs($id);
		if(empty($data['joueur']))
		{
			show_404();
		}
		//$data['titre'] = $data['joueur'];
		$this->load->view('templates/mesTemplates/myHead',$data);
		$this->load->view('pages/vue', $data);
		$this->load->view('templates/footer', $data);
	}

	/**
	 * méthode special pour la page manutd
	 */

	public function getManu($id = null){
		$data['titre'] = 'en Mode Affichage solo !';
		$data['joueur'] = $this->modelSing->getJoueurs($id);
		if(empty($data['joueur']))
		{
			show_404();
		}
		//$data['titre'] = $data['joueur'];
		$this->load->view('templates/mesTemplates/myHead',$data);
		$this->load->view('pages/manutd', $data);
		$this->load->view('templates/footer', $data);
	}

	/**
	 * nous allons creer une méthode pour validere la connexion !
	 *
	 */
	public function validerConnexion(){


			$var['user'] = $this->modelSing->getUserValidation($_POST['pseudo'],$_POST['motDePasse']);
			$var['stat'] = $this->modelSing->getStat();
			$val['allo'] = 'allo';

			if($var['user'] !== null){
				$this->load->view('pages/connexionReussi', array( 'user' => $var['user'],
					'stat' => $var['stat'],
					'allo' => $val['allo']
				));
				$this->getJoueurs();


			}else{
				echo 'Erreur de connexion !!!!! ';
			}


		$var['stat'] = $this->modelSing->getStat();
		$val['allo'] = 'allo';

		if($var['user'] !== null){
		$this->load->view('pages/connexionReussi', array( 'user' => $var['user'],
																'stat' => $var['stat'],
																'allo' => $val['allo']
			));
		$this->getJoueurs();


		}else{
			echo 'Erreur de connexion !!!!! ';
		}

	}
	/**
	 * méthode qui lance la page inscription et tout ce qui concern le dossier utilisateur
	 */
		public function inscription($page = 'inscription'){

			if (!file_exists(APPPATH . 'views/pages/utilisateurs/' . $page . '.php')) {
// attention, nous n’avons pas fait de page pour gérer ce cas.
				show_404();
			}
			$data['title'] = ucfirst($page);
			$this->load->view('templates/header', $data);
			$this->load->view('pages/utilisateurs/' . $page, $data);
			$this->load->view('templates/submit');

			$this->load->view('templates/footer', $data);
	}
	public function test(){
		$regles = array(
			array(
				'field'  =>  'pseudo' ,
                'label'  =>  'pseudo' ,
                'rules'  =>  'required',
				//ic on peut recuper le label en utilisant %s !
				'errors'  =>  array (
					'required'  =>  'Vous devez fournir un pseudo. %s',

			)
			),
			array(
				'field'  =>  'nom' ,
				'label'  =>  'nom' ,
				'rules'  =>  'required',
				'errors'  =>  array (
					'required'  =>  'Vous devez fournir un nom .',

				)
			),
			array(
				'field'  =>  'prenom' ,
				'label'  =>  'prenom' ,
				'rules'  =>  'required',
				'errors'  =>  array (
			'required'  =>  'Vous devez fournir un prenom %s.',
				),
			),
			array(
				'field'  =>  'email' ,
				'label'  =>  'email' ,
				'rules'  =>  'required|valid_email',
				'errors'  =>  array (
					'required'  =>  'la case %s vide ! '
				),
			),
			array(
				'field'  =>  'password' ,
				'label'  =>  'Password' ,
				'rules'  =>  'required',
				'errors'  =>  array (
					'required'  =>  'Vous devez fournir un mot de passe .',
				),
			),
			array(
				'field'  =>  'tel' ,
				'label'  =>  'Telephone' ,
				'rules'  =>  'required|regex_match[/^[0-9]{10}$/]',
				'errors'  =>  array (
					'required'  =>  '%s vide ou incomplet veillez verifier cotre saisie ! .',
				),
			),
			array(
				'field'  =>  'description' ,
				'label'  =>  'Description' ,
				'rules'  =>  'required',
				'errors'  =>  array (
					'required'  =>  '%s vide faite pas le timide exprimez vous :) ! .',
				),
			),

		);

		//$this->form_validation->set_rules('date','date','callback_checkDateFormat()');

		$this->form_validation->set_rules($regles);

		if ($this->form_validation->run() == false) {

			$this->inscription();
		}else {
			$this->modelSing->inscritUtilisateur($_POST['pseudo'], $_POST['nom'], $_POST['prenom'], $_POST['email'],$_POST['password'] ,
				$_POST['date'],$_POST['tel'] , $_POST['description']);
			$this->index();

		}

	}

		public function valider(){


			$var['user'] = $this->modelSing->validerConnexion($_POST['pseudo'],$_POST['motDePasse']);
			$var['stat'] = $this->modelSing->getStat();
			$val['allo'] = 'allo';



			$var['stat'] = $this->modelSing->getStat();
			$val['allo'] = 'allo';

			if($var['user'] !== null){
				$this->load->view('pages/connexionUtil.php', array( 'user' => $var['user'],
					'stat' => $var['stat'],
					'allo' => $val['allo']
				));
				$_SESSION['id'] = $var['user']['util_id'];
				$this->getJoueurs();


			}else{
				echo 'Erreur de connexion !!!!! ';
			}

		}

		/**
		 * methode qui ecrite dans un fichier xml(input_xml/inscription) un utilisateur
		 * qui arrivera a se connecter apres le passage de validation des entrées
		 *
		 */
		public function inscription_xml(){
			$regles = array(
				array(
					'field'  =>  'pseudo' ,
					'label'  =>  'pseudo' ,
					'rules'  =>  'required',
					//ic on peut recuper le label en utilisant %s !
					'errors'  =>  array (
						'required'  =>  'Vous devez fournir un pseudo. %s',

					)
				),
				array(
					'field'  =>  'nom' ,
					'label'  =>  'nom' ,
					'rules'  =>  'required',
					'errors'  =>  array (
						'required'  =>  'Vous devez fournir un nom .',

					)
				),
				array(
					'field'  =>  'prenom' ,
					'label'  =>  'prenom' ,
					'rules'  =>  'required',
					'errors'  =>  array (
						'required'  =>  'Vous devez fournir un prenom %s.',
					),
				),
				array(
					'field'  =>  'email' ,
					'label'  =>  'email' ,
					'rules'  =>  'required|valid_email',
					'errors'  =>  array (
						'required'  =>  'la case %s vide ! '
					),
				),
				array(
					'field'  =>  'password' ,
					'label'  =>  'Password' ,
					'rules'  =>  'required',
					'errors'  =>  array (
						'required'  =>  'Vous devez fournir un mot de passe .',
					),
				),
				array(
					'field'  =>  'tel' ,
					'label'  =>  'Telephone' ,
					'rules'  =>  'required|regex_match[/^[0-9]{10}$/]',
					'errors'  =>  array (
						'required'  =>  '%s vide ou incomplet veillez verifier cotre saisie ! .',
					),
				),
				array(
					'field'  =>  'description' ,
					'label'  =>  'Description' ,
					'rules'  =>  'required',
					'errors'  =>  array (
						'required'  =>  '%s vide faite pas le timide exprimez vous :) ! .',
					),
				),

			);

			//$this->form_validation->set_rules('date','date','callback_checkDateFormat()');

			$this->form_validation->set_rules($regles);

			if ($this->form_validation->run() == false) {

				$this->inscription();
			}else {

				$this->load->model('model_Sing_xml');
				$this->model_Sing_xml->inscription_xml();

				$this->index();

			}

		}

		public function connection(){
			redirect('/Auth/');

		}



}
