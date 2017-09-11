<?php $this->layout('layout', ['title' => $title ]) ?>

<?php $this->start('main_content') ?>

		<div id="recent-projects" class="padding">
			<div class="container">
				
				<div class="text-center section-title" id="section-title-search">
					<h2 id="searchTitle"><?= $title ?></h2>
				</div>
				<form method="POST" id="search">
					<div class="row" id="searchRow">
						<div class="col-sm-4 col-sm-offset-4" >
			        		<label for="search-input" id="fa-label">
			        			<i class="fa fa-search" aria-hidden="true"></i>
			        			<span class="sr-only">Search icons</span>
			        		</label>
			        		<input id="search-input" class="form-control" name="search" placeholder="Un vêtement, une catégorie...">
							<button class="btn btn-primary" id="searchButton">OK</button>
						</div>
						<div class="col-sm-4">
							<div class="text-center">
								<h1 id="categorySearchTitle" class="text-center">Afficher par catégorie</h1>
							</div>
							<div class="row">
								<div class="col-xs-6 categorySearch" id="categorySearchTops">
									<div class="text-right">
										<label for="tops">Tops</label>
										<input type="checkbox" name="tops" value="true" <?= ($tops)?"checked='checked'":null ?>">
									</div>
									<div class="text-right">
										<label for="sweater">Pulls</label>
										<input type="checkbox" name="sweater" value="true" <?= ($sweater)?"checked='checked'":null ?>">
									</div>
									<div class="text-right">
										<label for="vest">Vestes</label>
										<input type="checkbox" name="vest" value="true" <?= ($vest)?"checked='checked'":null ?>">
									</div>
									<div class="text-right">
										<label for="coat">Manteaux</label>
										<input type="checkbox" name="coat" value="true" <?= ($coat)?"checked='checked'":null ?>">
									</div>	
								</div>
								
								<div class="col-xs-6 categorySearch" id="categorySearchBottoms">
									<div class="text-right">
										<label for="pants">Pantalons</label>
										<input type="checkbox" name="pants" value="true" <?= ($pants)?"checked='checked'":null ?>">
									</div>
									<div class="text-right">
										<label for="shorts">Shorts</label>
										<input type="checkbox" name="shorts" value="true" <?= ($shorts)?"checked='checked'":null ?>">
									</div>
									<div class="text-right">
										<label for="shoes">Chaussures</label>
										<input type="checkbox" name="shoes" value="true" <?= ($shoes)?"checked='checked'":null ?>">
									</div>
								</div>
							</div>
							<div class="text-center">
								<button class="btn btn-primary">OK</button>
							</div>
						</div>
					</div>
				</form>
							
								
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
					      				<h3 id="clothesNameTitle"><?= $result["name"] ?></h3>
					    			</a>	
							<?php

							if($connected)
							{
								if($result["inWardrobe"])
								{
									?>
									
									<p>Déjà ajouté à ma garde-robe</p>
									<a href="<?= $this->url('clothes_deleteW', ["id" => $result["id"], "idUser" => $idUser]) ?>"  class="btn btn-secondary">Supprimer de ma garde-robe</a> 

									<?php

								}
								else
								{
									?>
									
									<a href="<?= $this->url('clothes_addW', ["id" => $result["id"], "idUser" => $idUser]) ?>" class="btn btn-primary" id="add-search-btn">Ajouter à ma garde-robe</a> 										

									<?php
								}
							}

							?>
								</div><!-- Fin div text-center -->
							</div><!-- Fin div caption -->
						</div><!-- Fin div thumbnail -->
					</div><!-- Fin div col -->
						<?php
						if($key % 4 == 3)
						{
							?>
							</div>
							<?php
						}
					}

				?>
				</div><!-- Fin div row -->					
			</div><!-- Fin div container -->
		</div><!-- Fin div recent-projects -->

<?php $this->stop('main_content'); ?>

