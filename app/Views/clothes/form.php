<div id="welcome-section" class="padding">
	<div class="container">
		<div class="text-center section-title">
			<h2 id="signupTitle"><?= $title ?></h2>
		</div>
		<div class="welcome-content">

			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<form method="post">
						<div class="form-group welcome-image form-sign">
							<label for="name">Nom</label>
							<input type="text" id="name" class="form-control" name="name" placeholder="Nom" value="<?= $name ?>">
						</div> 

						<div class="form-group welcome-image form-sign">
							<label for="category">Catégorie</label>
							<select class="form-control" id="category" name="category" rows="8" cols="80">
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
							<input type="number" class="form-control" id="minTemp" name="minTemp" value="0">
						</div>

						<div class="form-group welcome-image form-sign">
							<label for="maxTemp">Température maximale : </label>
							<input type="number" class="form-control" id="maxTemp" name="maxTemp" value="10">
						</div>

						<div class="form-group welcome-image form-sign">
							<label for="rain">Peut être porté en cas de pluie : </label>
							<input type="checkbox" id="rain" name="rain" value="10">
						</div>

						<div class="form-group welcome-image form-sign">
							<label for="picture">Image</label>
							<input type="text" class="form-control" id="picture" name="picture" placeholder="Image" value="<?= $picture ?>">
						</div>

						<div class="form-group welcome-image form-sign">
							<label>Télécharger une image</label>
							<input type="file" class="form-control" id="loadImage" name="loadImage" onchange="loadCropper(this)">
						  	<img id="image" src="" width="300px">
						  	<button class="btn btn-secondary" id="cropButton" onclick="cropImage()">		Redimensionner
						  	</button>
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