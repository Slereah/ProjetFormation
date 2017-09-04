<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
	<h2><?= $title ?></h2>

	<div>	
		<strong>Nom : </strong> <?= $user['username']?>
	</div>
	<br>
	<div>	
		<strong>Email : </strong> <?= $user['email']?>
	</div><br>

	<div>	
		<strong>Nom : </strong> <?= $user['lastname']?>
	</div><br>

	<div>	
		<strong>Prénom : </strong> <?= $user['firstname']?>
	</div><br>

	<div>	
		<strong>Pays : </strong> <?= $user['country']?>
	</div><br>

	<div>	
		<strong>Ville : </strong> <?= $user['city']?>
	</div><br>

	<div>	
		<strong>Code Postale : </strong> <?= $user['zipcode']?>
	</div><br>

	<button type="submit" class="btn btn-default">
		<a href="<?= $this->url('security_logout')?>">Déconnexion</a>
	</button>

<?php $this->stop('main_content') ?>