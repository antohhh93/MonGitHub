<?php
/**
 * Created by PhpStorm.
 * User: Zachary
 * Date: 2018-04-06
 * Time: 22:54
 */



//cnstructeur , qui se connect a la bd
 class modelSing extends CI_Model{
	//singleton
	private $instance = null;
	private $crypte;

	public function __construct(){
		$instance =& get_instance();
		$instance->load->database();
		$this->load->library('encrypt');

	}


	 /**
	  * nous allon modifier la méthoe getjoueurs afin qu'elle puisse recevoir un param Id
	  * si ce dernier n,est pas egale a null on retourne la ligne de l'id concerner sinon
	  * on retournes tout les joueurs !
	  * @return mixed
	  */
	public function getJoueurs($id = false){
	if($id === false) {
		$query = $this->db->get('joueurs');
		return $query->result_array();
	}
		/**
		 * ici nous demandon a la bd de faire un select where id = $id (Param)
		 * si c'est pas null return row c a d la ligne
		 */
	$query = $this->db->get_where('joueurs', array('id_jou' => $id));
	return $query->row_array();

	}
	/**
	 * nouvelle méthode qui nous connecte a la table users
	 * et verifie si l'utilisateurs existe afin de lui permettre de se connecter au site
	 */
	public function getUserValidation($nom, $password){
		if($nom === null && $password === null){
			show_404();
		}
		$query = $this->db->get_where('users', array('nom_user' => $nom,
												  'passe_user' => $password));
		$haja = $query->row_array() ;
		$_SESSION['id'] = $haja['id_user'];
		return $query->row_array();
	}
	public function getstat(){
		//je recupere le nombre de ligne de la table joueurs !
		$query['compte'] =  $this -> db -> count_all( 'joueurs' );
		$query['platform'] =  $this -> db -> Platform( );
		$query['version'] =  $this->db->version();


		return $query;
	}

	/**
	 * function InscritUtilisateur
	 * une méthode qui êrmet de creer un ustilisateurs et le enregestrer dans la table utilisateurs
	 */
	public function inscritUtilisateur($pseudo, $nom, $prenom, $email, $passe, $dateNai,$tel , $desc){
		/**
		 * tres important il faut mettre tout les donner en paramatre dans un tableau
		 * les nom de variable declarer dans le tableau doivent etre les meme que ceux de la table concerner
		 */

		$crypte = $this->encrypt->encode($passe);
		$decode = $this->encrypt->decode($crypte);
		echo 'passe '.$crypte.'<br/>';
		echo 'decode:'.$decode;

		$data = array(
			'util_id' => 'default',
			'util_pseudo' => $pseudo,
			'util_nom' => $nom,
			'util_prenom'=>$prenom,
			'util_email'=>$email,
			'util_passe'=> $crypte,
			'util_date_nai'=>$dateNai,
			'util_tel'=>$tel,
			'util_desc'=>$desc
		);
				$this->db->insert('utilisateurs',$data);
	}
	 public function validerConnexion($pseudo, $password){
		//$result = false;
		 if($pseudo === null && $password === null){
			 show_404();
		 }
		 $query = $this->db->get_where('utilisateurs', array('util_pseudo' => $pseudo));

		 $var = $query->row_array() ;
		 $pass = $this->encrypt->decode($var['util_passe']);
		 //$pass = $this->encryption->decrypt($var['util_passe']);
		 	//echo $decryptePasse;

		 	if( $password == $pass){
				$_SESSION['id'] = $var['util_id'];
				return $query->row_array();
			}
		 return $query->row_array();







	 }

}


