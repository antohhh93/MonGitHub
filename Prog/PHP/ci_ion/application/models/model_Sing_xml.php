<?php

/**
 * Created by PhpStorm.
 * User: Zachary
 * Date: 2018-04-13
 * Time: 23:55
 */
class model_Sing_xml extends CI_Model
{
	private $instance;
	private $domDoc;
	private $utilisateurs_xml;

	public function __construct()
	{

		parent::__construct();


		$this->domDoc = new DOMDocument("1.0", "utf-8");
		//$this->domDoc->preserveWhiteSpace = true;
		//$this->domDoc->formatOutput = true;
		$this->domDoc->load(APPPATH . 'input_xml/inscription.xml');

	}

	public function inscription_xml()
	{
		$pseudo = $this->input->post('pseudo');
		$prenom = $this->input->post('prenom');
		$nom = $this->input->post('nom');
		$date_nai = $this->input->post('date');
		$email = $this->input->post('email');
		$desc = $this->input->post('description');
		$tel = $this->input->post('tel');
		$passe = $this->input->post('password');
		//id_ins_rang ; (a faire si possible)

		$personnes = $this->domDoc->getElementsByTagName('personnes');
		if ( !empty($personnes->item(0)) ) {
			//je crée mon element personne
			$personne_xml = $this->domDoc->createElement('personne');
			//pour l'id je récupère le compte +1 pour demarré de 1

			$this->domDoc->appendChild($personnes->item(0));

			//pour la gestion de l'id on recupére personne on ajoute +1 pour debuter de 1 pas de 0
			$personne_compte = $this->domDoc->getElementsByTagName('personne');
			$compte = $personne_compte->length + 1 ;


			//je donne compte a l'attribut !
			$personne_xml->setAttribute('id', $compte);

			// je le met dans mon domDoc
			$personnes->item(0)->appendChild($personne_xml);

			//faire la meme chose pour pseudo
			$pseudo_xml = $this->domDoc->createElement('pseudo', "$pseudo");
			//finit avec pseudo a ce niveau reste a le metrtre dans personne via achild ou sblingnext !
			$personne_xml->appendChild($pseudo_xml);




			//nom
			$nom_xml = $this->domDoc->createElement('nom', "$nom");
			$personne_xml->appendChild($nom_xml);

			//prenom
			$prenom_xml = $this->domDoc->createElement('prenom', "$prenom");
			$personne_xml->appendChild($prenom_xml);

			//email
			$email_xml = $this->domDoc->createElement('email', "$email");
			$personne_xml->appendChild($email_xml);

			//Mot de passe
			$passe_xml = $this->domDoc->createElement('paswword', "$passe");
			$personne_xml->appendChild($passe_xml);

			//date de Naissance
			$date_nai_xml = $this->domDoc->createElement('date_naissance', "$date_nai");
			$personne_xml->appendChild($date_nai_xml);

			//Téléphone
			$tel_xml = $this->domDoc->createElement('telephone', "$tel");
			$personne_xml->appendChild($tel_xml);

			//Description
			$desc_xml = $this->domDoc->createElement('description', "$desc");
			$personne_xml->appendChild($desc_xml);


		}else{
			$personnes = $this->domDoc->createElement('personnes');
			$this->domDoc->appendChild($personnes);
			//$personne_xml = $this->domDoc->createElement('personne');
//			$compte = $personnes->length + 1;
//			//echo 'Compte : '.$compte;
//			//$personnes->appendChild($personne_xml);
//
//			//je donne compte a l'attribut !
//			$personne_xml->setAttribute('id', "$compte");
//			$personnes->item(0)->appendChild($personne_xml);
//
//			//faire la meme chose pour pseudo
//			$pseudo_xml = $this->domDoc->createElement('pseudo', "$pseudo");
//			//finit avec pseudo a ce niveau reste a le metrtre dans personne via achild ou sblingnext !
//			$personne_xml->appendChild($pseudo_xml);
//
//			$this->domDoc->appendChild($personnes->item(0));
//
//			//nom
//			$nom_xml = $this->domDoc->createElement('nom', "$nom");
//			$personne_xml->appendChild($nom_xml);
//
//			//prenom
//			$prenom_xml = $this->domDoc->createElement('prenom', "$prenom");
//			$personne_xml->appendChild($prenom_xml);
//
//			//email
//			$email_xml = $this->domDoc->createElement('email', "$email");
//			$personne_xml->appendChild($email_xml);
//
//			//Mot de passe
//			$passe_xml = $this->domDoc->createElement('paswword', "$passe");
//			$personne_xml->appendChild($passe_xml);
//
//			//date de Naissance
//			$date_nai_xml = $this->domDoc->createElement('date_naissance', "$date_nai");
//			$personne_xml->appendChild($date_nai_xml);
//
//			//Téléphone
//			$tel_xml = $this->domDoc->createElement('telephone', "$tel");
//			$personne_xml->appendChild($tel_xml);
//
//			//Description
//			$desc_xml = $this->domDoc->createElement('description', "$desc");
//			$personne_xml->appendChild($desc_xml);



		}

		print_r( '<xmp>'.$this->domDoc->saveXML().'</xmp>');
		$this->domDoc->save(APPPATH.'input_xml/inscription.xml');


		//echo 'pas denfant';


//
//		$personne_xml = $this->domDoc->createElement('Personne');
//		/**
//		 * je donne l'attribut a ma varibale personne
//		 * ici je l'a crée manulemment comme balise parent !
//		 */
//		$personne_xml->setAttribute('class', 'personne_1');
//		//a partir de la on récupère les post ;)
//		$pseudo_xml = $this->domDoc->createElement('pseudo');
//		$pseudo_xml->nodeValue = $pseudo;
//		//finit avec pseudo a ce niveau reste a le metrtre dans personne via achild ou sblingnext !
//		$personne_xml->appendChild($pseudo_xml);
//
//
//		//prenom
//		$prenom_xml = $this->domDoc->createElement('prenom');
//		$prenom_xml->nodeValue = $prenom;
//		$personne_xml->appendChild($prenom_xml);
//
//		//nom
//		$nom_xml = $this->domDoc->createElement('nom');
//		$nom_xml->nodeValue = $nom;
//		$personne_xml->appendChild($nom_xml);
//
//		//date de naissance
//		$date_nai_xml = $this->domDoc->createElement('date_naissance');
//		$date_nai_xml->nodeValue = $date_nai;
//		$personne_xml->appendChild($date_nai_xml);
//
//		//telephone
//		$tel_xml = $this->domDoc->createElement('telephone');
//		$tel_xml->nodeValue = $tel;
//		$personne_xml->appendChild($tel_xml);
//
//		//courielle
//		$email_xml = $this->domDoc->createElement('email');
//		$email_xml->nodeValue = $email;
//		$personne_xml->appendChild($email_xml);
//
//		//descrition
//		$desc_xml = $this->domDoc->createElement('descrition');
//		$desc_xml->nodeValue = $desc;
//		$personne_xml->appendChild($desc_xml);
//
//
//		/**
//		 * tres important ne pas oublier de mettre tout ça dans le DOmdoc->$domDoc
//		 */
//		//$utilisateurs_xml->appendChild($personne_xml);
//		$this->domDoc->appendChild($personne_xml);
//
//
//		//je sauvegarde mon ficher !
//		$this->domDoc->save(APPPATH.'input_xml/inscription.xml');


	}
}
