
/**
 * Created by PhpStorm.
 * User: Zachary
 * Date: 2018-04-06
 * Time: 20:34
 */

<div class ='formulaire'>
	<form method="post" action="">

		<fieldset>
			<legend>Vos coordonnées</legend> <!-- Titre du fieldset -->

			<label for="nom">Quel est votre nom ?</label>
			<input type="text" name="nom" id="nom" />

			<label for="prenom">Quel est votre prénom ?</label>
			<input type="text" name="prenom" id="prenom" />

			<label for="email">Quel est votre e-mail ?</label>
			<input type="email" name="email" id="email" />

		</fieldset>

		<fieldset>
			<legend>Votre souhait</legend> <!-- Titre du fieldset -->

			<p>
				Faites un souhait que vous voudriez voir exaucé :

				<input type="radio" name="souhait" value="riche" id="riche" /> <label for="riche">Etre riche</label>
				<input type="radio" name="souhait" value="celebre" id="celebre" /> <label for="celebre">Etre célèbre</label>
				<input type="radio" name="souhait" value="intelligent" id="intelligent" /> <label for="intelligent">Etre <strong>encore</strong> plus intelligent</label>
				<input type="radio" name="souhait" value="autre" id="autre" /> <label for="autre">Autre...</label>
			</p>

			<p>
				<label for="precisions">Si "Autre", veuillez préciser :</label>
				<textarea name="precisions" id="precisions" cols="40" rows="4"></textarea>
			</p>
		</fieldset>
	</form>
</div>
