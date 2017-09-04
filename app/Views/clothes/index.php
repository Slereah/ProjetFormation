<?php 

$this->layout('layout', ['title' => 'Vêtement']);

?>

<?php $this->start('main_content') ?>

	<h2> <?= $title ?> </h2>

	<?php if (count($clothes)): ?>

		<?php foreach ($categories as $category): ?> <br> 
			<div>
				<a href="<?= $this->url('clothes_read', ["id" => $clothes ['id']]) ?>">
				<?= $clothes['name']; ?></a>
				
			</div>
		<?php endforeach; ?>

	<?php else: ?>

		<p>Il n'y à aucun vêtement dans la BDD</p>
		<a href="<?= $this->url('clothes_create') ?>">Ajouter un vêtement</a>

	<?php endif; ?>

<?php $this->stop('main_content') ?>