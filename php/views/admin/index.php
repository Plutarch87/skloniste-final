<?php 
	require 'admin.header.php';
	$query = $app['database'];
	$admini = $query->selectAll('users');
?>

<section class="main">
	<div class="container">
		<h1 style="font-family: Impact">Admin - Unos / Izmena</h1>
		<hr>
		<div class="row">
			<div class="list-group">				
			<?php if (!isset($admini)): ?>
			<?php else: ?>
			<?php foreach ($admini as $p): ?>
				<a href="show.php?id=<?= $_POST['id'] = $p['id']; ?>" class="list-group-item"><?= $p['name']. ' ' . $p['surname']; ?></a>
			<?php endforeach; ?>
			<?php endif; ?>
			</div>		
		</div>
		<div class="row">
			<a href="create.php" class="btn btn-info">Napravi Novi Unos</a>
			<a href="../admin.index.php" class="btn btn-info">Nazad</a>
		</div>		
	</div>
</section>

<?php require 'admin.footer.php'; ?>
