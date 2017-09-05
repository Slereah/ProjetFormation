<form method="post">
	
	<div class="rows">
		<div>
			<label for="name">Nom</label> <br>
			<input type="text" id="name" name="name" placeholder="Nom" value="<?= $name ?>">
		</div> <br>

		<div>
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

		<div>
			<label for="picture">Image</label> <br>
			<input type="text" id="picture" name="picture" placeholder="Image" value="<?= $picture ?>"> <br>
		</div><br>

		<button type="submit" class="btn btn-pink">Enregistrer</button>
	</div>
<<<<<<< Updated upstream
</form>
=======
</form>
>>>>>>> Stashed changes
