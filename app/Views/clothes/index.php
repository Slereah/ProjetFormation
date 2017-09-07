<?php 

$this->layout('layout', ['title' => 'Vêtement']);

?>

<?php $this->start('main_content') ?>

	<h2> <?= $title ?> </h2>

	<?php if (count($clothes)): ?>

		<?php 
			foreach ($clothes as $key => $clothes):
				if($key % 4 == 0)
				{
					?><div class="row"><?php
				}
				?>
				<div class="col-xs-12 col-md-3">
				    <a href="<?= $this->url('clothes_read', ["id" => $clothes ['id']]) ?>" class="thumbnail">
				      <img src="<?= $clothes ['picture'] ?>" alt="<?= $clothes ['name']?> ">
				    </a>
				    <caption><?= $clothes ['name'] ?></caption>
				</div>
  				<?php
				if($key % 4 == 3)
				{
					?></div><?php
				}
			endforeach; ?>

	<?php else: ?>

		<p>Il n'y à aucun vêtement dans la BDD</p>
		<a href="<?= $this->url('clothes_create') ?>">Ajouter un vêtement</a>

	<?php endif; ?>

<?php $this->stop('main_content') ?>