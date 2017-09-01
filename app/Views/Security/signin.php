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

			<form action="<?= $this->url('security_signin') ?>" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="user[email]" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="user[password]" placeholder="Mot de passe">
                </div>
                <button type="submit" class="btn btn-pink">Se connecter</button>
            </form><br>

            <a href="<?= $this->url('security_lost_Pwd')?>">Mot de passe oublié</a>

		</div>
	</div>



<?php $this->stop('main_content') ?>
