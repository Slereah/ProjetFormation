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
						<div class="col-md-6 col-md-offset-2">
							<div class="text-center section-title">
								<a href="<?= $this->url('clothes_read') ?>"><h2>Ma garde-robe</h2></a>
							</div>

							<!-- Thumbnails -->
							<div class="row">
							  <div class="col-sm-6 col-md-4">
							    <div class="thumbnail">
							      <img src="https://photos6.spartoo.com/photos/365/3654062/3654062_350_A.jpg" class="img-responsive imgClothes" id="imgWardrobe" alt="vêtement">
							      <div class="caption">
							        <h3>Thumbnail label</h3>
							        <p>...</p>
							        <p><a href="#" class="btn btn-dark" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
							      </div>
							    </div>
							  </div>
							  <div class="col-sm-6 col-md-4">
							    <div class="thumbnail">
							      <img src="http://www.celio.com/medias/sys_master/productMedias/productMediasImport/h2e/hc5/9144818696222/product-media-import-1040935-3-weared.jpg?frz-v914" class="img-responsive imgClothes" id="imgWardrobe" alt="vêtement">
							      <div class="caption">
							        <h3>Thumbnail label</h3>
							        <p>...</p>
							        <p><a href="#" class="btn btn-dark" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
							      </div>
							    </div>
							  </div>
							
							  <div class="col-sm-6 col-md-4">
							    <div class="thumbnail">
							      <img src="https://media.quiksilver.co.id/media/catalog/product/cache/image/1000x1000/9df78eab33525d08d6e5fb8d27136e95/e/q/eqyws03252_quiksilver_mens_everyday_chino_walkshort_tmp0_1_h.jpg" class="img-responsive imgClothes" id="imgWardrobe" alt="vêtement">
							      <div class="caption">
							        <h3>Thumbnail label</h3>
							        <p>...</p>
							        <p><a href="#" class="btn btn-dark" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
							      </div>
							    </div>
							  </div>
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