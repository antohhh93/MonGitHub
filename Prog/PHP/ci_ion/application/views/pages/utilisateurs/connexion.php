<?php
/**
 * le fait qu'on laisse le form ouvert dans connexion la boutton submit fera partie du formulaire donc sera fonctionnel !
 */
?>
<form method="post" action="../pages/valider">

	<fieldset>
		<legend>Vos coordonnées</legend> <!-- Titre du fieldset -->

		<label for="utilisateur">Utilisateur</label>
		<input type="text" name="pseudo" id="pseudo" />

		<label for="pass">Password</label>
		<input type="password" name="motDePasse" id="motDePasse" />
		<a href="inscription"> Nouveau Membre ?</a><br/>


