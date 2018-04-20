<h2><?php echo 'BD'; ?></h2>
<?php foreach ($news_bd as $news_item): ?>
 <h3><?php echo $news_item['slug']; ?></h3>
 <div class="main">


 </div>
 <p> <p><a href="<?php echo site_url('index.php/news/view_bd/'.$news_item['id']); ?>">View
article</a></p><br/>
<?php endforeach; ?>
<h2><?php echo '================================================================='; ?></h2>
<h2><?php echo 'XML'; ?></h2>
<?php foreach ($news_xml as $news_item): ?>
	<h3><?php  echo 'Titre : '. $news_item['title']; ?></h3>
	<h3><?php echo ' Text : '.$news_item['texte']; ?></h3>
	<div class="main">


	</div>

<?php endforeach; ?>
<a href="<?php echo site_url('index.php/news/viewPage/create'); ?>">Creer</a>
