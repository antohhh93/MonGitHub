<?php
/**
 * Created by PhpStorm.
 * User: Zachary
 * Date: 2018-04-15
 * Time: 00:17
 */
class XMLScriptExercice8 extends CI_Controller
{
	private $domDoc;

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url_helper');
		$this->domDoc = new DOMDocument();
		$this->domDoc->load(APPPATH.'input_xml/inscription.xml');
		$this->domDoc->schemaValidate(APPPATH.'input_xml/inscriptionXSD.xsd');
		$this->load->library('form_validation');
		$this->lang->load('form_validation', 'english');	}

	public function index(){
		$data['title'] = 'Les Nouvelles';
		$this->load->view('templates/header.php',  $data);
		$data['news_xml'] = $this->lire_xml();

		$this->load->view('news/view_e8_xml' , $data);
		$this->load->view('templates/footer.php');

	}

	public function ecrire_xml()
	{



		$s_title = $this->input->post('title');
		$s_texte = $this->input->post('text');

		$root = $this->domDoc->getElementsByTagName('nouvelles');
		//echo $root->count;
		if($root->length != 0){


			$nouvelle = $this->domDoc->createElement("nouvelle");
			$root->item(0)->appendChild($nouvelle);



			//$root = $xml->createElement('nouvelle');
			$title = $this->domDoc->createElement('title', "$s_title");
			//$title->nodeValue = $s_title;
			$nouvelle->appendChild($title);

			$texte = $this->domDoc->createElement("texte", "$s_texte");
			//$texte->nodeValue = $s_texte;
			$nouvelle->appendChild($texte);




			$this->domDoc->appendChild($root->item(0));

		}else{
			//root = nouvelles
			$root = $this->domDoc->createElement('nouvelles');


			//creation de nouvelle element
			$nouvelle = $this->domDoc->createElement("nouvelle");
			//$root->firstChild->appendChild($nouvelle);
			$root->appendChild($nouvelle);



			$title = $this->domDoc->createElement('title', "$s_title");

			$nouvelle->appendChild($title);

			$texte = $this->domDoc->createElement("texte", "$s_texte");

			$nouvelle->appendChild($texte);

			//pour l'affichage format xml sur le fichier !

			$this->domDoc->appendChild($root);

		}

	$this->domDoc->formatOutput = true;
	echo '<xmp>'.$this->domDoc->saveXML().'</xmp>' ;
	$this->domDoc->save(APPPATH.'input_xml/testXml.xml');


	$data['news_xml'] = $this->lire_xml();
	$this->load->view('news/view_e8_xml' , $data);

	}
	public function lire_xml(){
		$news_xml = array();
		$news = $this->domDoc->getElementsByTagName('nouvelles');
		foreach ($news as $new){
			$nouvelle = $new->getElementsByTagName('nouvelle');
			foreach ($nouvelle as $contenu){
				$titre = $contenu->getElementsByTagName('title');
				$titre_str = $titre->item(0)->nodeValue;

				$texte = $contenu->getElementsByTagName('texte');
				$texte_str = $texte->item(0)->nodeValue;

				$news_xml[] = array('titre_str' => $titre_str,
					'texte_str' => $texte_str

				);
				continue;
			}

		}

		return $news_xml;
	}
	public function create(){
		$this->load->view('e8/create');
	}

}
