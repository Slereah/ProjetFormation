<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>

		<div id="recent-projects" class="padding">
			<div class="container">
				<div class="text-center section-title">
					<h1><?= $title ?></h1>
				</div>
				<div class="row"> 
					<div class="recent-projects">
					
						<!-- Infos persos -->
						<div class="col-md-4">
							<div class="text-center section-title">
								<h2>Mes infos persos</h2>
							</div>
							<form class="userData">
								<div>
									<h3>Nom d'utilisateur : </h3><?= $user['username']?>
								</div>
								<div>
									<h3>Nom : </h3><?= $user['lastname']?>
								</div>
								<div>
									<h3>Prénom : </h3><?= $user['firstname']?>
								</div>
								<div>
									<h3>Adresse Email : </h3><?= $user['email']?>
								</div>
								<div>
									<h3>Ville : </h3><?= $user['city']?>
								</div>
								<div>
									<h3>Pays : </h3><?= $user['country']?>
								</div>
								<div>
									<h3>Code Postal : </h3><?= $user['zipcode']?>
								</div>
							</form>
							<div class="text-center">
								<button type="submit" class="btn btn-dark">Modifier mon profil</button>
							</div>
						</div>

						<!-- Ma garde-robe -->
						<div class="col-md-4 col-md-offset-4">
							<div class="text-center section-title">
								<a href="<?= $this->url('clothes_read') ?>"><h2>Ma garde-robe</h2></a>
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-dark">Créer ma garde-robe</button>
								<button type="submit" class="btn btn-dark">Modifier ma garde-robe</button>
							</div>
						</div>
					</div>
				</div>
			</div>				
		</div><!--/#Recent projects-->
	

<?php $this->stop('main_content') ?>