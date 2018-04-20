
<link rel = "stylesheet" type = "text/css"
	  href = "<?php echo base_url(); ?>css/StyleConnexion.css">


	<div id="manu">
		<table>
			<thead>
			<tr>
				<th>Nom Joueur</th>
				<th>date de naissance </th>
				<th>article</th>
			</tr>
			</thead>


			<tbody>
			<?php foreach ($joueurs as $joueur): ?>
			<tr>
				<td><a href="<?php echo site_url('index.php/pages/getManu/'.$joueur['id_jou']); ?>"><?=$joueur['nom_jou'] .' '.$joueur['prenom_jou']?></a></td>
				<td><?= $joueur['date_nai_jou']?></td>
				<td><?=$joueur['article_jou']?></td>
			</tr>
			<?php endforeach; ?>

			</tbody>

		</table>
	</div>



