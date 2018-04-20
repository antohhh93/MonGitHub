<?php
class Pages extends CI_Controller{
	public function view($page ='home')
	{
		if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
{
// attention, nous n’avons pas fait de page pour gérer ce cas.
show_404();
}
$data['title'] = ucfirst($page);
$this->load->view('pages/'.$page, $data);
$this->load->view('pages/'.$page, $data);
$this->load->view('templates/footer', $data);
	}
}