<?php $this->layout('layout', ['title' => 'Weather & Wear']) ?>

<?php $this->start('main_content') ?>	
	
	<h1>Contactez-nous !</h1>

	<?php

		if ($_SESSION['contactSubmit'] == true) {
			echo "Votre demande a bien été prise en compte";
		}

	?>

	<div class="rows">
		<form method ="post" class="form-horizontal">
			<div>
				<label for="lastname">Votre Nom :</label>
				<input type="text" id="lastname" name="lastname" required="required" placeholder="Nom" value="<?php if (!$_SESSION['contactSubmit']) {
					echo "null";
				} else { echo "$lastname";} ?>">
			</div>
			<div>
				<label for="firstname">Votre Prénom :</label>
				<input type="text" id="firstname" name="firstname" required="required" placeholder="Prénom" value="<?php if (!$_SESSION['contactSubmit']) {
					echo "null";
				} else { echo "$firstname";} ?>">
			</div>
			<div>
				<label for="email">Votre email :</label>
				<input type="email" id="email" name="email" required="required" placeholder="Email" value="<?php if (!$_SESSION['contactSubmit']) {
					echo "null";
				} else { echo "$email";} ?>">
			</div>
			<div>
				<label for="message">Votre message :</label>
				<textarea id="message" name="message" required="required" rows="8", cols="80"><?php if (!$_SESSION['contactSubmit']) {
					echo "null";
				} else { echo "$message";} ?></textarea>
			</div>
			<button type="submit" onClick="clearform()" class="btn btn-default">Envoyez</button>
		</form>
	</div>

<?php $this->stop('main_content') ?>