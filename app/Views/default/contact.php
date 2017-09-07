<?php $this->layout('layout', ['title' => 'Weather & Wear']) ?>

<?php $this->start('main_content') ?>	
	
	<h1>Contactez-nous !</h1>

	<div class="rows">
		<form method ="post" class="form-horizontal">
			<div>
				<label for="lastname">Votre Nom :</label>
				<input type="text" id="lastname" name="lastname" placeholder="Nom" value="<?= $lastname ?>">
			</div>
			<div>
				<label for="firstname">Votre Prénom :</label>
				<input type="text" id="firstname" name="firstname" placeholder="Prénom" value="<?= $firstname ?>">
			</div>
			<div>
				<label for="email">Votre email :</label>
				<input type="text" id="email" name="email" placeholder="Email" value="<?= $email ?>">
			</div>
			<div>
				<label for="message">Votre message :</label>
				<textarea id="message" name="message" rows="8", cols="80"><?= $message ?></textarea>
			</div>
			<button type="submit" class="btn btn-default">Envoyez</button>
		</form>
	</div>

<?php $this->stop('main_content') ?>