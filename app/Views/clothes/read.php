<?php $this->layout('layout', ['title' => $title ]) ?>

<?php $this->start('main_content') ?>

<h2> <?= $title?> </h2>

<dl>

	<dt>Nom :</dt>
	<dd> <?= $clothes['name'] ?> </dd>
	<br>

	<dt>Description :</dt>
	<dd> <?= $clothes['category'] ?> </dd>
	<br>

	<dt>Image :</dt>
	<dd> <img src="<?= $clothes['picture'] ?>"> </dd>
	<br>

</dl>

// <a href="<?= $this->url('clothes_update', ['id' => $clothes['id']]) ?>">Modifier</a>
|| <a href="<?= $this->url('clothes_delete', ['id' => $clothes['id']]) ?>">Supprimer</a>
\\
<?php $this->stop('main_content'); ?>