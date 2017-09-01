<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
	<h2><?= $title ?></h2>

	<div class="row">
		<div class="col-md4 col-md-offset-4">

			<?php if (!empty($error)): ?>
				<div class="alert alert-danger">
					<?= $error ?>
				</div>
			<?php endif; ?>

			<form action="<?= $this->url('security_reset_Pwd', ["token" => $token]) ?>" method="post">

				<input type="text" name="token" value="<?= $token ?>">

                <div class="form-group">
                    <label for="password">Nouveau mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Nouveau mot de passe">
                </div>

                <div class="form-group">
                    <label for="repeat_password">Répéter le nouveau mot de passe</label>
                    <input type="password" class="form-control" id="repeat_password" name="repeat_password" placeholder="Répéter le nouveau mot de passe">
                </div>

                <button type="submit" class="btn btn-pink">Enregistrer</button>
            </form><br>

            <a href="<?= $this->url('security_lost_Pwd')?>">Mot de passe oublié</a>

		</div>
	</div>

<?php $this->stop('main_content') ?>