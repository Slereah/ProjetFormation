<?php 
$this->layout( 'layout', ['title' => 'Ajouter un produit'] );
?>

<?php $this->start('main_content') ?>

	<h2> <?= $title ?> </h2>

	<?php include 'form.php'; ?>
<?php $this->stop('main_content') ?>