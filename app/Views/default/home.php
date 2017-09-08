<?php $this->layout('layout', ['title' => 'Weather & Wear']) ?>

<?php $this->start('main_content') ?>	

		<div id="home-section">
			<div class="container">
				<div class="home-content text-center">
					<h1 id="typer">"Des vêtements appropriés au temps"</h1>
					<h2>Weather & Wear</h2>
					<a href="#" class="btn btn-primary btn-animated">Commençons !</a>
					<div class="scroll-arrow">
						<div class="arrow-icon">
							<a class="animated" href="#"><i class="fa fa-angle-down"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div><!--/#home-section--> 
		

	    <div id="welcome-section" class="padding">
			<div class="container">
				<div class="text-center section-title">
					<h1><?= date("Y-m-d", $time)?></h1>
					<h2>Prévisions météo pour <?= $city ?></h2>
				</div>
				<div class="welcome-content">
					<div class="row">
						<div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3">
							<div class="welcome-image">
								<h3 id="tmpMin">Température minimale : <?= $weather["minTemp"] ?> <?= $unit?></h3>
							</div>						
						</div>
						<div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3">
							<div class="welcome-image">							
								<h3 id="tmpMax">Température maximale : <?= $weather["maxTemp"] ?> <?= $unit?></h3>
							</div>
						</div>
						<div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-4 col-xs-offset-4" id="weatherIcon">
							<?= $weather["icon"] ?>
						</div>
					</div>
				</div>
			</div>
	    </div><!--/#welcome-section-->
		

		<div id="recent-projects" class="padding">
			<div class="container">
				<form class="">
					<div>
						<label>Ville</label>
						<input type="text" name="city" id="city" value="<?= $cityInput ?>">
					</div>
					<div>
						<label>Pays</label>
						<input type="text" name="country" id="country" value="<?= $countryInput ?>">
					</div>
					<button id="upButton" type="button" onclick="update(<?= $day ?>, '<?= $city ?>', '<?= $country ?>', '<?= $unit ?>', 'upButton')">update</button>
				</div>


				<div id="datePicker" class="text-center section-title">
						<button id="prevButton" type="button" onclick="update(<?= ($day==0)?0:$day-1 ?>, '<?= $city ?>', '<?= $country ?>', '<?= $unit ?>', 'prevButton')">prev</button>
						<h1><?= $date ?></h1>
						<button id="nextButton" type="button" onclick="update(<?= ($day<6)?$day+1:6 ?>, '<?= $city ?>', '<?= $country ?>', '<?= $unit ?>', 'nextButton')">next</button>
					<h2>How to get dress today ?</h2>
				</div>
				<div class="recent-projects">
					<div class="row"> 
						<div class="carousel slides" id="mon-carrousel1">
							<!-- Carrousel d'images -->
							<div id="selectUpper" class="carousel-inner">
								<?php
									foreach ($upperClothes as $key => $value) 
									{
										?>
										<div class="item <?= ($key == 0) ? "active":"" ?>"> 
											<img class="img-responsive imgClothes" src="<?= $value["picture"] ?>">
										</div>
										<div class="carousel-caption">
								        	<h3>Haut</h3>
							      		</div>
										<?php
									}
								?>
							</div>

							<!-- Contrôleurs -->
							<a class="carousel-control right" href="#mon-carrousel" data-slide="next">
								<i class="fa fa-refresh" aria-hidden="true" alt="flèche"></i>
								<span class="sr-only">Change</span>
							</a>
						</div>
						<div class="carousel slide" id="mon-carrousel2">
							<div class="carousel-inner">
								<?php
									foreach ($lowerClothes as $key => $value) 
									{
										?>
										<div class="item <?= ($key == 0) ? "active":"" ?>"> 
											<img class="img-responsive imgClothes" src="<?= $value["picture"] ?>">
										</div>
										<div class="carousel-caption">
								        	<h3>Bas</h3>
							      		</div>
										<?php
									}
								?>
							</div>

			 				<!-- Contrôleurs -->
							<a class="carousel-control right" href="#mon-carrousel2" data-slide="next">
								<i class="fa fa-refresh" aria-hidden="true" alt="flèche"></i>
								<span class="sr-only">Change</span>
							</a>
						</div>
						<div class="carousel slide" id="mon-carrousel3">
							<div class="carousel-inner">
								<?php
									foreach ($shoes as $key => $value) 
									{
										?>
										<div class="item <?= ($key == 0) ? "active":"" ?>"> 
											<img class="img-responsive imgClothes" src="<?= $value["picture"] ?>">
										</div>
										<div class="carousel-caption">
								        	<h3>Chaussures</h3>
							      		</div>
										<?php
									}
								?>
							</div>

							<!-- Contrôleurs -->
							<a class="carousel-control right" href="#mon-carrousel3" data-slide="next">
								<i class="fa fa-refresh" aria-hidden="true" alt="flèche"></i>
								<span class="sr-only">Change</span>
							</a>
						</div>
					</div>
				</div>
			</div>
						
	    </div><!--/#Recent projects-->
<?php $this->stop('main_content') ?>
