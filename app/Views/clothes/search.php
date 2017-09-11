<?php $this->layout('layout', ['title' => $title ]) ?>

<?php $this->start('main_content') ?>

		<div id="recent-projects" class="padding">
			<div class="container">
				
				<div class="text-center section-title" id="section-title-search">
					<h2 id="searchTitle"><?= $title ?></h2>
				</div>
				<div class="row" id="searchRow">
					<div class="col-md-4 col-md-offset-4" >
						<form method="POST" id="search">
			        		<label for="search-input">
			        			<i class="fa fa-search" aria-hidden="true"></i>
			        			<span class="sr-only">Search icons</span>
			        		</label>
			        		<input id="search-input" class="form-control" name="search" placeholder="Un vêtement, une catégorie...">
							<button class="btn btn-primary" id="searchButton">OK</button>
						</form>
					</div>
					<div class="col-md-4">
						<form method="POST">
							<h1 id="categorySearchTitle">Afficher par catégorie</h1>
							<div class="row">
								<div class="col-md-6 categorySearch">
									<div class="text-right">
										<label for="tops">Tops</label>
										<input type="checkbox" name="tops">
									</div>
									<div class="text-right">
										<label for="sweater">Pulls</label>
										<input type="checkbox" name="sweater">
									</div>
									<div class="text-right">
										<label for="vest">Vestes</label>
										<input type="checkbox" name="vest">
									</div>
									<div class="text-right">
										<label for="coats">Manteaux</label>
										<input type="checkbox" name="coats">
									</div>	
								</div>
								
								<div class="col-md-6 categorySearch">
									<div class="text-right">
										<label for="pants">Pantalons</label>
										<input type="checkbox" name="pants">
									</div>
									<div class="text-right">
										<label for="shorts">Shorts</label>
										<input type="checkbox" name="shorts">
									</div>
									<div class="text-right">
										<label>Chaussures</label>
										<input type="checkbox" name="shoes">
									</div>
								</div>
							</div>
							<div class="text-center">
								<button class="btn btn-primary">OK</button>
							</div>
						</form>
					</div>
				</div>
							
								
				<?php

					$connected  = isset($_SESSION["user"]) && !empty($_SESSION["user"]);
					if($connected)
					{
						$idUser = $_SESSION["user"]["id"];
					}

					foreach ($results as $key => $result) 
					{
						if($key % 4 == 0)
						{
							?>
								<div class="row">
							<?php
						}
						?>
					
						<div class="col-md-3">		
										<div class="thumbnail" id="thumbnail-clothes-index">
											<a href="<?= $this->url('clothes_read', ["id" => $result["id"]]) ?>">
										      <img src="<?= $result["picture"]?>" alt="<?= $result["name"]?>"" class="img-responsive imgClothes imgWardrobe" id="imgClothesIndex">
										    </a>
											<div class="caption">
												<div class="text-center">
													<a href="<?= $this->url('clothes_read', ["id" => $result["id"]]) ?>">
									      				<h3><?= $result["name"] ?></h3>
									    			</a>	
							<?php

							if($connected)
							{
								if($result["inWardrobe"])
								{
									?>
									
													<p>Déjà ajouté à ma garde-robe</p>
													<a href="<?= $this->url('clothes_deleteW', ["id" => $result["id"], "idUser" => $idUser]) ?>"  class="btn btn-secondary">Supprimer de ma garde-robe</a> 
												</div>
											</div>
										</div><!-- Fin div thumbnail -->
									</div><!-- Fin div col -->

									<?php

								}
								else
								{
									?>
									
													<a href="<?= $this->url('clothes_addW', ["id" => $result["id"], "idUser" => $idUser]) ?>" class="btn btn-primary" id="add-search-btn">Ajouter à ma garde-robe</a> 
												</div>
											</div>
										</div><!-- Fin div thumbnail -->
									</div><!-- Fin div col -->

									<?php
								}
							}
							?>
						<?php
						if($key % 4 == 3)
						{
							?>
							</div>
							<?php
						}
					}

				?>
			</div>					
		</div>

<?php $this->stop('main_content'); ?>

