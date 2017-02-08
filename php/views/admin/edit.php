<?php
require 'admin.header.php';
$id = $_GET['id'];
$query = $app['database'];
$user = $query->show('users', $id);
?>
<section class="main">
	<div class="container">
	<?php if(isset($_SESSION['message'])):  ?>
		<div style="background: #d9534f;">
			<p style="color: #fefefe;"><strong><?= $_SESSION['message']; ?></strong></p>
		</div>
	<?php unset($_SESSION['message']); ?>
	<?php endif; ?>
		<h1 style="font-family: Impact">Izmena Unosa - <span style="color: teal">
		<?= $user[0]['name'] . ' ' . $user[0]['surname']; ?></span></h1>
		<hr>
		<div class="row col-md-6">			
			<form method="POST" action="update.php" class="form-horizontal" role="form">
			<div class="form-group">
				<label for="email" class="control-label col-sm-2">Email:</label>
			    	<div class="col-sm-10">
			      		<input type="text" name="email" class="form-control" id="email" 
			      		placeholder="<?= $user[0]['email']; ?>">
				</div>
			</div>
			<br>
			<h3>Promena Lozinke</h3>
			<hr>
		  	<div class="form-group">
				<label for="password" class="control-label col-sm-2">Stara Lozinka:</label>
			    	<div class="col-sm-10"> 
			      		<input type="text" name="password" class="form-control" id="password">
			    	</div>
		    	</div>
		    	<div class="form-group">
				<label for="new_password" class="control-label col-sm-2">Nova Lozinka:</label>
			    	<div class="col-sm-10"> 
			      		<input type="text" name="new_password" class="form-control" id="new_password">
			    	</div>
		    	</div>
		    	<div class="form-group">
				<label for="confirm_password" class="control-label col-sm-2">Potvrdi Lozinku:</label>
			    	<div class="col-sm-10"> 
			      		<input type="text" name="confirm_password" class="form-control" id="confirm_password">
			    	</div>
		    	</div>
		    	<input type="hidden" name="id" value="<?= $_GET['id']; ?>">
			<div class="form-group"> 
				<div class="col-sm-offset-2 col-sm-10">
		      		<button type="submit" class="btn btn-warning">Unesi</button>
		    	</div>
			</div>
			</form>
			<a href="index.php" class="btn btn-default">Nazad</a>
		</div>		
	</div>
</section>
<?php require 'admin.footer.php'; ?>