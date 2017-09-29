<div id="welcome-section" class="padding">
	<div class="container">
		<div class="text-center section-title">
			<h1 id="signupTitle" class="accessible-blue"><?= $title ?></h1>
		</div>
		<div class="welcome-content">

			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<form method="post">

						<?php if (!empty($errors)): ?>
								
							<?php foreach ($errors as $error) : ?>
								<div class="alert alert-danger">
									<?= $error ?>
								</div>
							<?php endforeach; ?>
								
						<?php endif; ?>

						<div class="form-group welcome-image form-sign">
							<label for="name">Nom</label>
							<input type="text" id="name" required class="form-control" name="name" placeholder="Nom" value="<?= $name ?>">
						</div> 

						<div class="form-group welcome-image form-sign">
							<label for="category">Catégorie</label>
							<select class="form-control" required id="category" name="category">
								<option value="">Sélectionner une catégorie :</option>
								<?php foreach ($categories as $category): ?>
									<option value="<?= $category ?>"
										<?php echo $selected_category == $category ? " selected" : null;
									 	?>><?= $category ?>
									 </option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="form-group welcome-image form-sign">
							<label for="minTemp">Température minimale : </label>
							<input type="number" class="form-control" id="minTemp" name="minTemp" value="<?= isset($minTemp)?$minTemp:0?>">
						</div>

						<div class="form-group welcome-image form-sign">
							<label for="maxTemp">Température maximale : </label>
							<input type="number" class="form-control" id="maxTemp" name="maxTemp" value="<?= isset($maxTemp)?$maxTemp:20 ?>">
						</div>

						<div class="form-group welcome-image form-sign">
							<label for="rain">Peut être porté en cas de pluie : </label>
							<input type="checkbox" id="rain" name="rain" value="10" <?= (isset($rain) && $rain)?"checked":null ?>>
						</div>

						<div class="form-group welcome-image form-sign">
							<label for="picture">Image</label>
							<input type="url"  class="form-control" id="picture" name="picture" placeholder="Veuillez indiquer l'Url de l'image du vêtement" value="<?= $picture ?>">
						</div>

					  	<div class="text-center">
					  		<button type="submit" class="btn btn-primary">
					  			Enregistrer
				  			</button>
					  	</div>
					</form>
				</div>
			</div><!-- Fin row -->
		</div><!-- Fin welcome-content -->		
	</div><!-- Fin container -->
</div><!-- Fin welcome-section -->