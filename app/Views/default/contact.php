<?php $this->layout('layout', ['title' => $title ]) ?>

<?php $this->start('main_content') ?>	

	<?php

		if ($_SESSION['contactSubmit'] == true) {
			echo "Votre demande a bien été prise en compte";
			$_SESSION['contactSubmit'] = false;
		} 

	?>

	<div id="welcome-section" class="padding">
			<div class="container">
				<div class="text-center section-title">
					<h2 id="contactTitle"><?= $title ?></h2>
				</div>
				<div class="welcome-content">
					<div class="rows">
						<div class="col-md-4 col-md-offset-4">
							<form action="<?= $this->url('contact') ?>" method ="post" >
								<div class="form-group welcome-image form-sign">
									<label for="lastname">Votre Nom :</label>
									<input type="text" class="form-control" id="lastname" name="lastname" required="required" placeholder="Nom" value="<?php if (!$_SESSION['contactSubmit']) {
										echo "";
									} ?>">
								</div>
								<div class="form-group welcome-image form-sign">
									<label for="firstname">Votre Prénom :</label>
									<input type="text" class="form-control" id="firstname" name="firstname" required="required" placeholder="Prénom" value="<?php if (!$_SESSION['contactSubmit']) {
										echo "";
									} ?>">
								</div>
								<div class="form-group welcome-image form-sign">
									<label for="email">Votre email :</label>
									<input type="email" class="form-control" id="email" name="email" required="required" placeholder="Email" value="<?php if (!$_SESSION['contactSubmit']) {
										echo "";
									} ?>">
								</div>
								<div class="form-group welcome-image form-sign">
									<label for="message">Votre message :</label>
									<textarea id="message" class="form-control" placeholder="Entrez votre message .." name="message" required="required" rows="8", cols="80"><?php if (!$_SESSION['contactSubmit']) {
										echo "";
									}?></textarea>
								</div>
								<div class="text-center">
									<button type="submit" onClick="clearform()" class="btn btn-primary">Envoyez</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

<?php $this->stop('main_content') ?>