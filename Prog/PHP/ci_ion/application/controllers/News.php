<?php
	class News extends CI_Controller {
		private $newType;
	public function __construct()
 {

	 parent::__construct();
	 //recupération de notre radio button
 	$this->newType = $this->input->post('type');
 	$this->load->model('news_model');
 	$this->load->model('news_model_xml');
 	$this->load->helper('url_helper');
	 $this->load->library('form_validation');

 }
 public function index()
 {
 	//connexion via bd
 $data['news_bd'] = $this->news_model->get_news();
 //connecion via Xml
 $data['news_xml'] = $this->news_model_xml->get_news();
 $data['title'] = 'Acceil';
 $this->load->view('templates/header', $data);
 $this->load->view('news/index', $data);
 $this->load->view('templates/footer');
 }
	public function viewPage($page = 'home')
	{
		if (!file_exists(APPPATH . 'views/news/' .$page. '.php')) {
// attention, nous n’avons pas fait de page pour gérer ce cas.
			show_404();
		}
		$data['title'] = ucfirst($page);
		$this->load->view('templates/header', $data);
		$this->load->view('news/'.$page);
		$this->load->view('templates/footer', $data);
	}
 public function view_bd($slug = null)
 {
$data['news_item'] = $this->news_model->get_news($slug);
 if (empty($data['news_item']))
 {
 show_404();
 }
 $data['title'] = $data['news_item']['title'];
 $this->load->view('templates/header', $data);
 $this->load->view('news/view', $data);
 $this->load->view('templates/footer');
  }
	public function view_xml($slug = null)
	{
		$data['news_item'] = $this->news_model->get_news($slug);
		if (empty($data['news_item']))
		{
			show_404();
		}
		$data['title'] = $data['news_item']['title'];
		$this->load->view('templates/header', $data);
		$this->load->view('news/view', $data);
		$this->load->view('templates/footer');
	}

public function create()
{
 $this->load->helper('form');
 $this->load->library('form_validation');
 $data['title'] = 'Create a news item';
 $this->form_validation->set_rules('title', 'Title', 'required');
 $this->form_validation->set_rules('text', 'Text', 'required');
 if ($this->form_validation->run() === FALSE)
 {
 $this->load->view('templates/header', $data);
 $this->load->view('news/create');
 $this->load->view('templates/footer');
 }
 else
 {
 	if($this->newType == 'BD')
 	{
		$this->news_model->set_news();
		$this->load->view('news/success');
	}else{
 		$this->news_model_xml->ecrire_xml();
		$this->load->view('news/success');
	}

 }
}


}
