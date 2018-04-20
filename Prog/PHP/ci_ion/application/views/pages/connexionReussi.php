
<?php
/**
 * Created by PhpStorm.
 * User: Zachary
 * Date: 2018-04-07
 * Time: 16:55
 */
// echo 'felicitation '.$user['nom_user']. 'Vous etes connecter !';
 ?>
<link rel = "stylesheet" type = "text/css"
	  href = "<?php echo base_url(); ?>css/StyleConnexion.css">
<div id="connecter">
	<h2><?=$user['util_pseudo'];?>:<img src="../../css/login.jpg" width="40px" height="40px"></h2>
	<h3><?='ID :'.$_SESSION['id'];?></h3><br/>
		<?='state: '.$stat['compte'];?><br/>
		<?='Platform :'.$stat['platform'];?><br/>
	<?='Val  :'.$allo;?><br/>
</div>

