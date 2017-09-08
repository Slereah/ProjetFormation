<?php $this->layout('layout', ['title' => 'Vêtement'])?>

<?php $this->start('main_content') ?>

	<div style="height: 80px;"></div>
	<div class="container">
		<h2> <?= $title ?> </h2>

		<?php if (count($clothes)): ?>

			<?php 
				foreach ($clothes as $key => $clothes):
					if($key % 4 == 0)
					{
						?><div class="row"><?php
					}
					?> 
					<div class="col-xs-12 col-md-3 thumbnail">
					    <a href="<?= $this->url('clothes_read', ["id" => $clothes ['id']]) ?>">
					      <img src="<?= $clothes ['picture'] ?>" alt="<?= $clothes ['name']?>" class="img-responsive imgClothesIndex">
					    </a>
					    <caption><?= $clothes ['name'] ?></caption>
					    <a href="<?= $this->url('clothes_delete', ["id" => $clothes["id"]]) ?>">delete</a> | 
					    <a href="<?= $this->url('clothes_update', ["id" => $clothes["id"]]) ?>">edit</a>
					</div>
	  				<?php
					if($key % 4 == 3)
					{
						?></div><?php
					}
				endforeach; ?>

		<?php else: ?>

			<p>Il n'y a aucun vêtement dans la BDD</p>
			<a href="<?= $this->url('clothes_create') ?>">Ajouter un vêtement</a>

		<?php endif; ?>
	</div>
	

<?php $this->stop('main_content') ?>