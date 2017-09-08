<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>

	<div id="welcome-section" class="padding">
			<div class="container">
				<div class="text-center section-title">
					<h2 id="signinTitle"><?= $title ?></h2>
				</div>
				<div class="welcome-content">
					<div class="row">
						<div class="col-md-4 col-md-offset-4">

							<?php if (!empty($errors)): ?>
												
								<?php foreach ($errors as $error) : ?>
									<div class="alert alert-danger">
									<?= $error ?>
									</div>
								<?php endforeach; ?>
							
							<?php endif; ?>

							<form action="<?= $this->url('security_reset_pwd', ["token" => $token]) ?>" method="post">

				                <div class="form-group welcome-image form-sign">
				                    <label for="password">Nouveau mot de passe</label>
				                    <input type="password" class="form-control" id="password" name="password" placeholder="Nouveau mot de passe">
				                </div>

				                <div class="form-group welcome-image form-sign">
				                    <label for="repeat_password">Répéter le nouveau mot de passe</label>
				                    <input type="password" class="form-control" id="repeat_password" name="repeat_password" placeholder="Répéter le nouveau mot de passe">
				                </div>
				                <div class="text-center">
				                	<a href="<?= $this->url('security_signin') ?>" type="submit" class="btn btn-primary">Enregistrer</a>
				           		</div>
				            </form>
						</div>
					</div>
				</div>

<?php $this->stop('main_content') ?>