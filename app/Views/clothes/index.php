<h3>Index</h3>

	<div>
		<?php
			foreach ($clothes as $key => $clothe) 
			{
				?>

				<div>
					<h4><a href="<?= $this->url('clothes_read', ['id' => $clothe['id']]) ?>"><?= $clothe["name"] ?></a></h4>
				</div>

				<?php
			}
		?>
	</div>
	