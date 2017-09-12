<?php $this->layout('layout', ['title' => $title ]) ?>

<?php $this->start('main_content') ?>

		<div id="recent-projects" class="padding">
			<div class="container">
				
					<div class="row">
						<div class="text-center section-title">
							<h2 id="clothes-read-Title"><?= $title ?></h2>
						</div>

						
						<div class="col-md-4 col-md-offset-4">
							<?php 

								if(isset($_SESSION["ValidForm"]) && $_SESSION["ValidForm"] == true ) { 
									$_SESSION["ValidForm"] = false;
							?>	

								<div class="alert alert-success text-center" id="success-updateClothes">
									<p>Votre vêtement a bien été modifié.</p>
								</div>

							<?php

								}

							?>

							<div class="thumbnail" id="clothes-read-Thumbnail">
								<dl>
									<dt>Nom :</dt>
									<dd> <?= $clothes['name'] ?> </dd>

									<dt>Catégorie :</dt>
									<dd> <?= $clothes['category'] ?> </dd>
								</dl>
							
								<img src="<?= $clothes['picture'] ?>" class="img-responsive imgClothes imgWardrobe">
							
							 	<div class="caption">
							    	<h3 class="text-center"><?= $clothes ['name'] ?></h3>
							    	<div class="text-center" id="clothes-read-buttons">
							    		<a href="<?= $this->url('clothes_update', ['id' => $clothes['id']]) ?>" class="btn btn-primary indexButton" id="updateBtn">Modifier</a>
					 					<a href="<?= $this->url('clothes_delete', ['id' => $clothes['id']]) ?>"  class="btn btn-primary indexButton">Supprimer</a>
							    	</div>
							    </div>
							    
							</div><!-- Fin thumbnail -->
						</div><!-- Fin col -->
					</div><!-- Fin row -->
					
			</div><!-- Fin container -->			
		</div><!-- Fin recent-projects -->
						
<?php $this->stop('main_content'); ?>