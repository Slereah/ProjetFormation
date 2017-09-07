<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>

		<div id="recent-projects" class="padding">
			<div class="container">
				<div class="text-center section-title">
					<h1 id="indexTitle"><?= $title ?></h1>
				</div>
				<div class="row"> 
					<div class="recent-projects">
					
						<!-- Infos persos -->
						<div class="col-md-4 col-xs-6 col-xs-offset-3 personalData">
							<div class="text-center section-title">
								<h2>Mes infos persos</h2>
							</div>
							<form class="userData">
								<div>
									<h3>Nom d'utilisateur : </h3><span class="profileData"><?= $user['username']?></span>
								</div>
								<div>
									<h3>Nom : </h3><span class="profileData"><?= $user['lastname']?></span>
								</div>
								<div>
									<h3>Prénom : </h3><span class="profileData"><?= $user['firstname']?></span>
								</div>
								<div>
									<h3>Adresse Email : </h3><span class="profileData"><?= $user['email']?></span>
								</div>
								<div>
									<h3>Ville : </h3><span class="profileData"><?= $user['city']?></span>
								</div>
								<div>
									<h3>Pays : </h3><span class="profileData"><?= $user['country']?></span>
								</div>
								<div>
									<h3>Code Postal : </h3><span class="profileData"><?= $user['zipcode']?></span>
								</div>
							</form>
							<div class="text-center">
								<button type="submit" class="btn btn-primary indexButton">Modifier mon profil</button>
							</div>
						</div>

						<!-- Ma garde-robe -->
						<div class="col-md-6 col-md-offset-2  col-xs-10 col-xs-offset-1 myWardrobe">
							<div class="text-center section-title">
								<h2>Ma garde-robe</h2>
							</div>

								<!-- Thumbnails -->
							<div class="row">
							  	<div class="col-md-4">
							    	<div class="thumbnail">
							      		<img src="https://photos6.spartoo.com/photos/365/3654062/3654062_350_A.jpg" class="img-responsive imgClothes imgWardrobe" alt="vêtement">
							      		<div class="caption">
							        		<h3>Catégorie du vêtement ici</h3>
							        		<p>Nom du vêtement ici</p>
							        		<p><a href="#" class="btn btn-secondary indexButton" role="button">Effacer</a></p>
							      		</div>
							    	</div>
							  	</div>
							  	<div class="col-md-4">
							    	<div class="thumbnail">
							      		<img src="http://www.celio.com/medias/sys_master/productMedias/productMediasImport/h2e/hc5/9144818696222/product-media-import-1040935-3-weared.jpg?frz-v914" class="img-responsive imgClothes imgWardrobe" alt="vêtement">
							      		<div class="caption">
									        <h3>Catégorie du vêtement ici</h3>
									        <p>Nom du vêtement ici</p>
									        <p><a href="#" class="btn btn-secondary indexButton" role="button">Effacer</a></p>
							      		</div>
							    	</div>
							  	</div>

							  	<div class="col-md-4">
							    	<div class="thumbnail">
							      		<img src="https://media.quiksilver.co.id/media/catalog/product/cache/image/1000x1000/9df78eab33525d08d6e5fb8d27136e95/e/q/eqyws03252_quiksilver_mens_everyday_chino_walkshort_tmp0_1_h.jpg" class="img-responsive imgClothes imgWardrobe" alt="vêtement">
							      		<div class="caption">
									        <h3>Catégorie du vêtement ici</h3>
									        <p>Nom du vêtement ici</p>
									        <p><a href="#" class="btn btn-secondary indexButton" role="button">Effacer</a></p>
							      		</div>
							    	</div>
							  	</div>
								<nav aria-label="Page navigation">
									<ul class="pagination pagination-sm">
										<li>
									  		<a href="#" aria-label="Previous">
										    	<span aria-hidden="true">&laquo;</span>
									  		</a>
										</li>
										<li><a href="#">1</a></li>
										<li><a href="#">2</a></li>
										<li><a href="#">3</a></li>
										<li><a href="#">4</a></li>
										<li><a href="#">5</a></li>
										<li>
									  		<a href="#" aria-label="Next">
								    			<span aria-hidden="true">&raquo;</span>
										  	</a>
										</li>
									</ul>
								</nav>
							</div><!-- Fin div row -->
							<div class="text-center">
								<button type="submit" class="btn btn-primary"  id="addButton">Ajouter un vêtement</button>
								<button type="submit" class="btn btn-primary">Modifier ma garde-robe</button>
							</div>
						</div>
					</div>
				</div>
			</div>				
		</div><!--/#Recent projects-->
	

<?php $this->stop('main_content') ?>