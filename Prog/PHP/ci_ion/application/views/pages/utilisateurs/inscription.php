



<?php
echo form_open('index.php/pages/inscription_xml');?>
	<fieldset>
		<legend>Vos coordonnées</legend> <!-- Titre du fieldset -->

		<?=validation_errors ()?>
		<?= form_error()?>
		<?php
		/**
		 * pour creer un input text faut declarer un tableau qui contiendras ;
		 * name pour le nom, l'id
		 * placeHolder est une préSaisie
		 * set_value a chekcer
		 *
		 */
      $pseudo= array(

        'name'=>'pseudo',

        'id'=>'pseudo',

        'placeholder'=>'Votre Pseudo :) ! ',

        'value'=>set_value('pseudo')

      );
      //important pour qu'elle s'affcihe
		//echo set_value($pseudo);
      echo form_input($pseudo);

      //nom
      $nom= array(

        'name'=>'nom',

        'id'=>'nom',

        'placeholder'=>'Nom',

        'value'=>set_value('nom')

      );
      echo form_input($nom);
      //prenom
		$prenom= array(

			'name'=>'prenom',

			'id'=>'prenom',

			'placeholder'=>'Prenom',

			'value'=>set_value('prenom')

		);
		echo form_input($prenom);?>
		<br/>
		<?php
		//email
		$email= array(
			'type'=>'email',
			'name'=>'email',

			'id'=>'email',

			'placeholder'=>'votre@mail.ca',

			'value'=>set_value('email')

		);
		echo form_input($email);
		echo form_label('Mot De Passe :');
		//password
		$password= array(

			'name'=>'password',

			'id'=>'password',

			'placeholder'=>'Votre Mot de Passe',

			'value'=>set_value('password')

		);
		echo form_password($password);
		//date de naissance

		echo form_label('Date de naissance :');
		$date = array(
			'type' => 'date',
			'id' => 'validate_dd_id',
			'name' => 'date',

			'placeholder' => 'date de naissance : dd/mm/yyyy',
			'required' => ''
		);
		echo form_input($date);
		echo '<br/>';
		echo form_label('Teléphone :');
		$tel = array(
			'type' => 'tel',
			'id' => 'tel',
			'name' => 'tel',

			'placeholder' => 'telephone',

		);
		echo form_input($tel);

		?>

	</fieldset>

	<fieldset>
		<legend>Info Perso</legend> <!-- Titre du fieldset -->


		<p>
			<?= form_label('Décrivéz-Vous')?>
			<?php $description = array(
			'type' => 'textarea',
			'id' => 'description',
			'name' => 'description',
			'cols'=>'40',
			'rows'=>'4',
			'placeholder' => 'parlez nous un peux de vous .....',

		);
			?>
			<?= form_textarea($description)?>

		</p>
