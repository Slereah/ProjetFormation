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

							<!-- A EFFACER -->
							<a class="hidden" href="<?= $THE_TOKEN_URL ?>"><?= $THE_TOKEN_URL ?></a>
							<!-- A EFFACER -->

							<?php if (!empty($errors)): ?>
								
									<?php foreach ($errors as $error) : ?>
										<div class="alert alert-danger">
										<?= $error ?>
										</div>
									<?php endforeach; ?>
								
							<?php endif; ?>

				            <form action="<?= $this->url('security_lost_pwd') ?>" method="post">
				                <div class="form-group welcome-image form-sign">
				                    <label for="email">Email</label>
				                    <input type="email" class="form-control" id="email" name="user[email]" placeholder="Email">
				                </div>
				                <div class="text-center">
				                	<button type="submit" class="btn btn-primary">Se connecter</button>
				                </div>
				            </form>
						</div>
					</div>
				</div>

<?php $this->stop('main_content') ?>

	