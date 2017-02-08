<?php
require 'admin.header.php';
?>
<section class="main">
	<div class="container">
		<h1 style="font-family: Impact; text-align: center;">Nov Unos - Admina/ice</h1>
		<hr>
		<div class="row col-md-6" style="margin-left: auto; margin-right: auto; width: 100%;">
			<?php if(isset($_SESSION['message'])): ?>
			<div>			
				<p><?= $_SESSION['message']; ?></p>
			</div>
			<?php endif; ?>
			<?php unset($_SESSION['message']); ?>
			<form method="POST" action="store.php" class="form-horizontal" role="form">
			<div class="form-group">
				<label for="name" class="control-label col-sm-2">Ime:</label>
			    	<div class="col-sm-10">
			      	<input required type="text" name="name" class="form-control" id="name" placeholder="Ime">
				</div>
			</div>
		  	<div class="form-group">
				<label for="surname" class="control-label col-sm-2">Prezime:</label>
			    	<div class="col-sm-10"> 
			      	<input type="text" name="surname" class="form-control" id="surname" placeholder="Prezime">
			    	</div>
		    	</div>
			<div class="form-group">
			    	<label for="email" class="control-label col-sm-2">Email:</label>
			    	<div class="col-sm-10"> 
			      	<input type="email" name="email" class="form-control" id="email" placeholder="Email">
			    	</div>
			</div>
			<div class="form-group">
			    	<label for="password" class="control-label col-sm-2">Lozinka:</label>
			    	<div class="col-sm-10"> 
			      	<input type="password" name="password" class="form-control" id="password" placeholder="Lozinka">
			    	</div>
			</div>
			<div class="form-group">
			    	<label for="confirm_password" class="control-label col-sm-2">Potvrdi Lozinku:</label>
			    	<div class="col-sm-10"> 
			      	<input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Potvrdi Lozinku">
			    	</div>
			</div>
			<div class="form-group"> 
				<div class="col-sm-offset-2 col-sm-10">
			      	<button type="submit" name="submit" class="btn btn-warning">Unesi</button>
		    	</div>
			</div>
			</form>
			<a href="index.php" class="btn btn-default">Nazad</a>
		</div>		
	</div>
</section>
<?php require 'admin.footer.php'; ?>