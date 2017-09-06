<?php
	use \Controller\ClothesController;

?>

<div class="row">
	<div class="col-md-2">
		<form method="POST">
			<input type="text" name="search">
			<button>Submit</button>
		</form>
	</div>
	<div class="col-md-10">
		<?php

			$connected  = isset($_SESSION["user"]) && !empty($_SESSION["user"]);
			if($connected)
			{
				$idUser = $_SESSION["user"]["id"];
			}
			foreach ($results as $key => $result) 
			{
				?>
					<h3><?= $result["name"] ?></h3>
					<img src="<?= $result["picture"]?>" height="100px">
					<a href="<?= $this->url('clothes_read', ["id" => $result["id"]]) ?>">View</a>
					<?php

					if($connected)
					{
						if(ClothesController::clothesInWardrobe($result["id"], $userClothes))
						{
							?>
							| In profile | <a href="<?= $this->url('clothes_deleteW', ["id" => $result["id"], "idUser" => $idUser]) ?>">Delete</a>
							<?php

						}
						else
						{
							?>
							| <a href="<?= $this->url('clothes_addW', ["id" => $result["id"], "idUser" => $idUser]) ?>">Add</a>
							<?php
						}
					}
					?>
				<?php
			}

		?>
	</div>
	
</div>



