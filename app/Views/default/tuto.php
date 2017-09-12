<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>

		<div id="welcome-section" class="padding">
			<div class="container">
				<div class="text-center section-title">
					<h2 id="tutoTitle"><?= $title ?></h2>

					<h1 id="signupTitle">Etape 1 :</h1>
					<p>Inscrivez-vous !</p>
					<a href="<?= $this->url('security_signup') ?>">ICI</a>


					<h1 id="signupTitle">Etape 2 :</h1>
					<p>Si vous souhaitez personnaliser les vêtements proposés selon la météo sur la page d'accueil, vous pouvez vous rendre sur votre profil pour ajouter vos vêtements en téléchargeant vos photos.<br/>Sinon, des vêtements par défaut sont également proposés; ils sont également à ajouter à partir de votre profil.</p>
					
				</div>
			</div>
		</div>	


<?php $this->stop('main_content') ?>