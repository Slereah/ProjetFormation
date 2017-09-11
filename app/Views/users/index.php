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
						<div class="col-md-4 personalData">
							<div class="text-center section-title">
								<h2 id="persDataTitle">Mes infos persos</h2>
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

							<?php
								foreach ($clothes as $key => $value) 
								{
									if($key % 3 == 0)
									{
										?>
								<div class="row">
										<?php
									}
									?>
									<div class="col-sm-6 col-md-4" id="wardrobeThumbnail">
								    	<div class="thumbnail">
								      		<img src="<?= $value["picture"] ?>" class="img-responsive imgClothes imgWardrobe" id="imgWardrobe" alt="vêtement">
								      		<div class="caption">
								        		<h3><?= $value["category"] ?></h3>
								        		<p><?= $value["name"] ?></p>
								        		<div class="text-center">
								        			<a href="<?= $this->url('clothes_deleteW', ["id" => $value["id"], "idUser" => $user["id"]]) ?>" class="btn btn-secondary indexButton" role="button">Effacer</a>
								        			<a href="<?= $this->url('clothes_update_user', ["id" => $value["id"], "idUser" => $user["id"]]) ?>" class="btn btn-secondary indexButton" role="button">Modifier</a>
								        		</div>
								      		</div>
								    	</div>
								  	</div>
									<?php
									if($key % 3 == 2 || $key == count($clothes) - 1)
									{
										?>
								</div>
										<?php
									}
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
								<a href="<?= $this->url("clothes_create", ["id" => $user["id"]]) ?>" class="btn btn-primary"  id="addButton">Ajouter un vêtement</a>
								<a href="<?= $this->url("search") ?>"  class="btn btn-primary">Chercher un vêtement</a>
							</div>
						</div>
					</div>
				</div>
			</div>				
		</div><!--/#Recent projects-->
	

<?php $this->stop('main_content') ?>