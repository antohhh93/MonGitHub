<?php
class News_model_xml extends CI_Model {

	private $xml_file;
	/**
	 * News_model_xml constructor.
	 */
	private $nodeName;
	private $nodevalue;

	public function __construct()
{
	$this->xml_file = new DOMDocument() ;

	$this->xml_file->load(APPPATH.'input_xml/test.xml');




}

public function get_news()
{
	$tem = array();
	$news = $this->xml_file->getElementsByTagName('Nouvelles');
	foreach ($news as $var )
	{
			$titre = $val->getElementsByTagName('titre');
			//$titre = $var->getElementsByTagName('titre'); pour news.xml
			$title = $titre->item(0)->nodeValue;
			$txt = $val->getElementsByTagName('texte');
			$texte = $txt->item(0)->nodeValue;

			$tem[] = array('title' => $title,
				'texte' => $texte
			);
			continue;
		W

	}

	return $tem;
}

public function set_news()
{
	//recupératon de POST
	$titre = $this->input->post('title');
	$texte = $this->input->post('text');

	$nouvelle = $this->xml_file->createElement('nouvelle');
	$nouvelle = $this->xml_file->createAttribute('slug');
	$element_titre = $this->xml_file->createElement('title',$titre);
	$element_texte = $this->xml_file->createElement('texte', $texte);
	$child_titre = $this->xml_file->appendChild($element_titre);
	$child_texte = $this->xml_file->appendChild($element_texte);
	$nouvelle->firstChild($child_titre);
	$nouvelle->appendChild($child_texte);
	//$this->xml_file->appendChild($nouvelle);
	//$this->xml_file->appendChild($element_titre);
	//$this->xml_file->appendChild($element_texte);
	//$this->xml_file->save(APPPATH.'input_xml/news.xml'); la travail sur test!!

}
public function ecrire_xml()
{
	//je recupère mes input !
		$s_pseudo = $this->input->post('pseudo');
		$s_nom = $this->input->post('nom');
		$s_prenom = $this->input->post('prenom');
		$s_email = $this->input->post('email');
		$s_mot_passe = $this->input->post('password');
		$s_date = $this->input->post('date');
		$s_tel = $this->input->post('description');

	//le je recuperes nouvelles
	$nouvelles = $this->xml_file->getElementsByTagName('nouvelles');
	if($nouvelles->length == 0){
		echo "vide";
	}


}










}
