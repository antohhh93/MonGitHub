<?php
/**
 * Par exemple, supposons que vous ayez créé un fichier JavaScript sample.js et un fichier CSS style.css .
 * Maintenant, pour ajouter ces fichiers dans vos vues, chargez
 * l'assistant d'URL dans votre contrôleur comme indiqué ci-dessous.
		$this->load->helper('url');
Après avoir chargé l'assistant d'URL dans le contrôleur, ajoutez simplement
 * les lignes ci-dessous dans le fichier de vue, pour charger le fichier sample.js et le fichier style.css dans la vue.
 */
?>

<link rel = "stylesheet" type = "text/css"
	  href = "<?php echo base_url(); ?>css/StyleManu.css">
<div id="manuSolo">
	<table id="joueurSolo">
		<thead>
		<tr>
			<th>Nom Joueur</th>
			<th>date de naissance </th>
			<th>article</th>
		</tr>
		</thead>
		<tbody>
			<tr>
			<td><?=$joueur['nom_jou'] .' '.$joueur['prenom_jou']?></td>
			<td><?= $joueur['date_nai_jou']?></td>
			<td><?=$joueur['article_jou']?></td>
			</tr>
		</tbody>
	</table>
</div>


