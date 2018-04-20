
<h2><?php echo 'XML'; ?></h2>

<?php foreach ($news_xml as $news_item): ?>
	<h3><?php  echo 'Titre : '. $news_item['titre_str']; ?></h3>
	<h3><?php echo ' Text : '.$news_item['texte_str']; ?></h3>
	<div class="main">


	</div>

<?php endforeach; ?>
<a href="<?php echo site_url('index.php/XMLScriptExercice8/create'); ?>">Creer</a>
