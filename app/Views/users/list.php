<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
	
	<div id="welcome-section" class="padding">
			<div class="container">
				<div class="text-center section-title">
					<h2 id="usersListTitle">Liste d'utilisateurs</h2>
				</div>
				<div class="welcome-content">
					
					<table class="table table-bordered">
						<tr>
							<th>id</th>
							<th>Nom d'utilisateur</th>
							<th>Nom</th>
							<th>Prénom</th>
							<th>Email</th>
							<th>Ville</th>
							<th>Pays</th>
							<th>Code postal</th>
							<th>Rôle</th>
							<th>Unité</th>
							<th>Supprimer</th>
						</tr>
					<?php
						foreach ($users as $key => $user) 
						{
							?>
								<tr>
									<td><?=$user["id"]?></td>
									<td><?=$user["username"]?></td>
									<td><?=$user["lastname"]?></td>
									<td><?=$user["firstname"]?></td>
									<td><?=$user["email"]?></td>
									<td><?=$user["city"]?></td>
									<td><?=$user["country"]?></td>
									<td><?=$user["zipcode"]?></td>
									<td><?=$user["role"]?></td>
									<td><?=$user["unit"]?></td>
									<td><a href="<?= $this->url('user_delete', ["id" => $user["id"]]) ?>">supprimer</a></td>
								</tr>
							<?php
						}


					?>
					</table>
					
				</div>
			</div>
		</div>
				
<?php $this->stop('main_content') ?>