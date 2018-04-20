<h2><?php //echo $title; ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open('index.php/XMLScriptExercice8/ecrire_xml'); ?>
 <label for="title">Title</label>
 <input type="input" name="title" /><br />
 <label for="text">Text</label>
 <textarea name="text"></textarea><br />
 <input type="submit" name="submit" value="Create news item" /><br>
<input type ="radio" name="type" value="xml">XML<br>
<input type="radio" name="type" value="bd">BD<br>
</form>
