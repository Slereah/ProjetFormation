<?php $this->layout('layout', ['title' => $title]); ?>

<?php $this->start('main_content'); ?>
<div style="height: 80px;"></div>
<div class="container">
	<h2> <?= $title ?> </h2>
	
	<?php include 'form.php'; ?>
</div>

<?php $this->stop('main_content'); ?>