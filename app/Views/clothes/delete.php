<?php $this->layout('layout', ['title' => $title]); ?>

<?php $this->start('main_content'); ?>
	<div id="welcome-section" class="padding">
			<div class="container">
				<div class="text-center section-title">
					<h2 id="signinTitle"><?= $title ?></h2>
				</div>
				<div class="welcome-content">
					<div class="row">
						<div class="text-center">
							<form method="post">
								<button type="submit" class="btn btn-secondary text-center" id="yesButton">Oui</button>
								<a href="<?= $this->url('clothes_read', ['id' => $clothes['id']]) ?>">Non</a>
							</form>

<?php $this->stop('main_content'); ?>