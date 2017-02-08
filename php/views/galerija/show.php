<?php
require 'galer.header.php';
$id = $_GET['id'];
$query = $app['database'];
$gallery = $query->show('galleries', $id);
$images = $query->find_all('images', $id);
?>
<section class="main">
	<div class="container">
		<h1 style="font-family: Impact"><?= $gallery[0]['title']; ?></h1>
		<hr>
		<?php
			if(!empty($_SESSION['message'])):
				echo '<div class="alert alert-success">'.$_SESSION['message'].'</div>';
				unset($_SESSION['message']);
			endif;
			if(!empty($_SESSION['errors'])):
				echo '<div class="alert alert-danger">'.$_SESSION['errors'].'</div>';
				unset($_SESSION['errors']);
			endif;
		?>

		<div class="container-fluid">
			<div class="row">

				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<div id="album" style="margin-top: 10px">
						<div class="header">
							<h4><strong>&nbsp;</strong></h4>
							<hr>			
						</div>
						<div class="body">
							<br>
							<a data-toggle="modal" href="#imageModal"><span>&plus;<br> Ubacite slike </span></a>
						</div>
						<div class="footer">
							
						</div>
					</div>
				</div>
	
			<?php if(!empty($images)):?>
				<?php foreach ($images as $image): ?>
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 imgWrap">
					<div id="album" style="margin-top: 10px;">
						<div class="header">
							<h4><strong><?= $image['filename']; ?></strong><span class="image-delete" style="margin-right: 15px; float: right; background: darkred; border-radius: 10%; cursor: pointer;">&times;</span></h4>
							<hr>			
						</div>
						<div class="body">
							<br>
							<img src="../assets/images/<?= $image['filename']; ?>" alt="<?= $image['filename']; ?>" />
						</div>
						<div class="footer">
							
						</div>
					</div>
				</div>

				<?php endforeach; ?>
			<?php endif; ?>

			</div>
		</div>
		<script>
		$(function(){					
			$('.image-delete').click(function(e){
				e.preventDefault();
				var data = $(this).siblings('h4 strong').html();
				if(confirm('Jeste li sigurni?')) {
					$.ajax({
						method: 'POST',
						data: data,
						url: 'deleteImg.php?filename=' + data, 
						success: function()
						{
							alert('Slika uspesno obrisana.');
						}
					})
					$(this).parents('.imgWrap').remove();
				}
			})
		})
		</script>
	</div>
</section>
<?php require '../admin.footer.php'; ?>