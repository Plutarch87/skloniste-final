<?php
require 'admin.header.php';
$id = $_GET['id'];
$query = $app['database'];
$user = $query->show('users', $id);
?>
<section class="main">
	<div class="container">
		<h1 style="font-family: Impact"><?= $user[0]['name']. ' ' .$user[0]['surname']; ?></h1>
		<hr>		
		<div class="row">
			<ul>
				<li>Email: <?= $user[0]['email']; ?></li>
			</ul>
			<p>					
				<a href="edit.php?id=<?= $_POST['id'] = $id; ?>" class="btn btn-info">Izmeni</a>
				<a href="../admin/" class="btn btn-default">Nazad</a>
				&nbsp;
				<?php if($_SESSION['email'] == 'kulturnoskloniste@gmail.com'): ?>
				<form method="POST" action="delete.php?id=<?= $_POST['id'] = $id; ?>">
					<input type="hidden" method="DELETE">
					<button type="submit" class="btn btn-danger" onclick="return confirm('Da li ste sigurni?')">Izbriši</button>
				</form>
				<?php endif; ?>
			</p>
		</div>
	</div>

</section>
<?php require '../admin.footer.php'; ?>