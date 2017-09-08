<form method="post">
	
	<div class="rows">
		<div class="form-group">
			<label for="name">Nom</label> <br>
			<input type="text" id="name" name="name" placeholder="Nom" value="<?= $name ?>">
		</div> <br>

		<div class="form-group">
			<label for="category">Catégorie</label> <br>
			<select id="category" name="category" rows="8" cols="80">
				<option value="">Sélectionner une catégorie :</option>
				<?php foreach ($categories as $category): ?>
					<option value="<?= $category ?>" <?php
					echo $selected_category == $category ? " selected" : null;
					 ?>><?= $category ?></option>
				<?php endforeach; ?>
			</select>
		</div><br>

		<div class="form-group">
			<label for="minTemp">Lowest temperature : </label>
			<input type="number" name="minTemp" id="minTemp" value="0">
		</div>

		<div class="form-group">
			<label for="maxTemp">Highest temperature : </label>
			<input type="number" name="maxTemp" id="maxTemp" value="10">
		</div>

		<div class="form-group">
			<label for="rain">Can be worn in the rain : </label>
			<input type="checkbox" name="rain" id="rain" value="10">
		</div>

		<div class="form-group">
			<label for="picture">Image</label> <br>
			<input type="text" id="picture" name="picture" placeholder="Image" value="<?= $picture ?>"> <br>
		</div><br>

		<div class="form-group">
			<label>Upload image</label>
			<input type="file" name="loadImage" id="loadImage" onchange="loadCropper(this)">
	  		<img id="image" src="" width="300px">
	  		<button onclick="cropImage()">Crop</button>
  		</div>


		<button type="submit" class="btn btn-pink">Enregistrer</button>
	</div>


</form>