<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
	<h2><?= $title ?></h2>

	<div class="row">
		<div class="col-md4 col-md-offset-4">

		<!-- A EFFACER -->
		<a href="<?= $THE_TOKEN_URL ?>"><?= $THE_TOKEN_URL ?></a><br>
		<!-- A EFFACER -->
			
			<?php if (!empty($error)): ?>
				<div class="alert alert-danger">
					<?= $error ?>
				</div>
			<?php endif; ?>

			<form action="<?= $this->url('security_lost_pwd') ?>" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                
                <button type="submit" class="btn btn-pink">Enregistrer</button>
            </form><br>

		</div>
	</div>

<?php $this->stop('main_content') ?>