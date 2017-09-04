<?php $this->layout('layout', ['title' => $title]); ?>

<?php $this->start('main_content'); ?>
	<h2> <?= $title ?> </h2>

<p></p>

	<form method="post">
		<button type="submit">Oui</button>
		<a href="<?= $this->url('clothes_read', ['id' => $clothes['id']]) ?>">Non</a>
	</form>

<?php $this->stop('main_content'); ?>