<?php $this->layout('layout', ['title' => $title ]) ?>

<?php $this->start('main_content') ?>

		<div id="recent-projects" class="padding">
			<div class="container">
				<div class="text-center section-title">
					<h1 id="indexTitle"><?= $title ?></h1>
				</div>
				<div class="row"> 
					<div class="recent-projects">
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