<?php 
$this->layout( 'layout', ['title' => $title ] );
?>

<?php $this->start('main_content') ?>
	
	<?php include 'form.php'; ?>

<?php $this->stop('main_content') ?>