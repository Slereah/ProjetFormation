<?php $this->layout('layout', ['title' => $title ])?>

<?php $this->start('main_content') ?>
		
		<div id="recent-projects" class="padding">
			<div class="container" id="homeContainer-recent-Projects">
				<div class="recent-projects">
					<div class="row"> 
						<div class="text-center section-title">
							<h2 id="clothes-index-Title"> <?= $title ?> </h2>
						</div>
						
						<?php if (count($clothes)): ?>

							<?php 
								foreach ($clothes as $key => $clothes):
									if($key % 4 == 0)
									{
										?><div class="row"><?php
									}
									?> 
									<div class="col-xs-12 col-md-3">
										<div class="thumbnail" id="thumbnail-clothes-index">
											<a href="<?= $this->url('clothes_read', ["id" => $clothes ['id']]) ?>">
										      <img src="<?= $clothes ['picture'] ?>" alt="<?= $clothes ['name']?>" class="img-responsive imgClothes imgWardrobe" id="imgClothesIndex">
										    </a>
										    <div class="caption">
										    	<h3 class="text-center"><?= $clothes ['name'] ?></h3>
										    	<div class="text-center">
										    		<a href="<?= $this->url('clothes_delete', ["id" => $clothes["id"]]) ?>" class="btn btn-secondary indexButton">Effacer</a>  
										    		<a href="<?= $this->url('clothes_update', ["id" => $clothes["id"]]) ?>" class="btn btn-secondary indexButton">Modifier</a>
										    	</div>
										    </div>
										    
										</div>
									    
									</div>
					  				<?php
									if($key % 4 == 3)
									{
										?></div><?php
									}
								endforeach; ?>

						<?php else: ?>

							<p>Il n'y a aucun vêtement dans la BDD</p>
							<a href="<?= $this->url('clothes_create', ["id" => $_SESSION["user"]["id"]]) ?>">Ajouter un vêtement</a>

						<?php endif; ?>
					</div>
	

<?php $this->stop('main_content') ?>