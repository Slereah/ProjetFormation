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
								<button type="submit" class="btn btn-dark indexButton">Modifier mon profil</button>
							</div>
						</div>

						<!-- Ma garde-robe -->
						<div class="col-md-6 col-md-offset-2">
							<div class="text-center section-title">
								<h2>Ma garde-robe</h2>
							</div>

								<!-- Thumbnails -->

							<?php 
								foreach ($clothes as $key => $value) 
								{
									?>
									<div class="col-sm-6 col-md-3">
								    	<div class="thumbnail">
								      		<img src="<?= $value["picture"] ?>" class="img-responsive imgClothes" id="imgWardrobe" alt="vêtement">
								      		<div class="caption">
								        		<h3><?= $value["category"] ?></h3>
								        		<p><?= $value["name"] ?></p>
								        		<a href="<?= $this->url('clothes_deleteW', ["id" => $value["id"], "idUser" => $user["id"]]) ?>" role="button">Effacer</a>
								      		</div>
								    	</div>
								  	</div>
									<?php
								}

							?>
								<nav aria-label="Page navigation">
									<ul class="pagination pagination-sm">
										<li class="<?= ($page == 1)?"disabled":null ?>">
									  		<a href="?page=<?= ($page == 1)?$page:$page-1 ?>" aria-label="Previous">
										    	<span aria-hidden="true">&laquo;</span>
									  		</a>
										</li>
										<?php
											for($i = 1; $i <= $maxpage; $i++)
											{
												?>
												<li><a href="?page=<?= $i ?>"><?= $i ?></a></li>
												<?php
											}
										?>
										
										<li class="<?= ($page == $maxpage)?"disabled":null ?>">
									  		<a href="?page=<?= ($page == $maxpage)?$page:$page+1 ?>" aria-label="Next" >
								    			<span aria-hidden="true">&raquo;</span>
										  	</a>
										</li>
									</ul>
								</nav>
							</div><!-- Fin div row -->
							<div class="text-center">
								<a href="<?= $this->url("clothes_create", ["id" => $user["id"]]) ?>" class="btn btn-dark">Ajouter un vêtement</a>
								<a class="btn btn-dark">Chercher un vêtement</a>
								<a class="btn btn-dark">Modifier ma garde-robe</a>
							</div>
						</div>
					</div>
				</div>
			</div>				
		</div><!--/#Recent projects-->
	

<?php $this->stop('main_content') ?>