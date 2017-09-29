<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
	
		<div id="welcome-section" class="padding">
			<div class="container">
				<div class="text-center section-title">
					<h1 id="signupTitle">Etape 1 :</h1>
					<h2 class="accessible-blue"><?= $title ?></h2>
				</div>
				<div class="welcome-content">
					<div class="row">
						<div>
							<em style="display: block;" class="text-center">Les éléments munis d'un * sont obligatoires</em>
						</div>
						<form method="post">


							<?php if (!empty($errors)): ?>
								<ul>
									<?php foreach ($errors as $key => $error) : ?>
										<li>
											<div id="error<?= $key?>" class="alert alert-danger col-sm-4 col-sm-offset-4 text-center" tabindex="0">
											<?= $error ?>
											</div>
										</li>
									<?php endforeach; ?>
								</ul>			
								<script type="text/javascript">
									document.getElementById("error0").focus();
								</script>					
							<?php endif; ?>
							

							<div class="form-group welcome-image form-sign col-sm-4 col-sm-offset-4">
								<label for="username" class="control-label">Nom d'utilisateur*</label>
								<input type="text" class="form-control" id="username" name="username" placeholder="Nom d'utilisateur" value="<?= $username ?>" required>
							</div>

							<div class="form-group welcome-image form-sign col-sm-4 col-sm-offset-4">
								<label for="lastname" class="control-label">Nom*</label>
								<input type="text" class="form-control" id="lastname" name="lastname"  placeholder="Nom" value="<?= $lastname ?>" required>
							</div>

							<div class="form-group welcome-image form-sign col-sm-4 col-sm-offset-4">
								<label for="firstname" class="control-label">Prénom*</label>
								<input type="text" class="form-control" id="firstname" name="firstname"  placeholder="Prénom" value="<?= $firstname ?>" required>
							</div>

							<div class="form-group welcome-image form-sign col-sm-4 col-sm-offset-4">
								<label for="email" class="control-label">Adresse Email*</label>			
								<input class="form-control" type="email" id="email" name="email" placeholder="Email" value="<?= $email ?>" required>
							</div>

							<div class="form-group welcome-image form-sign col-sm-4 col-sm-offset-4">
								<label for="password" class="control-label">Mot de passe*</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe"  value="" required>
							</div>

							<div class="form-group welcome-image form-sign col-sm-4 col-sm-offset-4">
								<label for="repeat_password" class="control-label">Répéter le mot de passe*</label>
								<input type="password" class="form-control" id="repeat_password" name="repeat_password" placeholder=" Répéter le mot de passe" required>
							</div>

							<div class="form-group welcome-image form-sign col-sm-4 col-sm-offset-4">
								<label for="country" class="control-label">Pays*</label>
								<select id="country" name="country" required>
									<option value="">Sélectionner votre pays :</option>
									<?php
										foreach ($countryList as $key => $value) 
										{
											?>
												<option value="<?= $key ?>" <?= ($country == $key)?"selected":null ?>><?= $value ?></option>
											<?php
										}
									?>
								</select>
							</div>

							<div class="form-group welcome-image form-sign col-sm-4 col-sm-offset-4">
								<label for="city" class="control-label">Ville*</label>
								<input type="text" class="form-control" id="city" name="city" placeholder=" Ville " value="<?= $city ?>" required>
							</div>

							<div class="form-group welcome-image form-sign col-sm-4 col-sm-offset-4">
								<label for="zipcode" class="control-label">Code Postal*</label>
								<input type="text" class="form-control" id="zipcode" name="zipcode" placeholder=" Code Postale " value="<?= $zipcode ?>" required>
							</div>

							<div class="form-group welcome-image form-sign col-sm-4 col-sm-offset-4">
								<label for="unit" class="control-label">Unité*</label>
								<select id="unit" name="unit" required>
									<option value="">Sélectionner l'unité de degrés :</option>
									<option value="°C">Celsius</option>
									<option value="°F">Fahrenheit</option>
								</select>
							</div>
							<div class="text-center col-sm-2 col-sm-offset-5">
								<button type="submit" class="btn btn-primary">Je m'inscris<span class="sr-only">au site Weather&Wear</span></button>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>

<?php $this->stop('main_content') ?>



