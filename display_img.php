<?php
	include('config.php');
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Image Project</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
		<style>
			.form-control{
				font-weight: bold;
				font-size: 20px!important;
			}
			.card img{
				max-width: 150px!important;
				max-height: 150px!important;
				object-fit: cover;
			}
			.footer_text{
				font-weight: bold;
				font-size: 10px;
			}
			.nav-link{
				font-weight: bold;
			}
		</style>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<!-- <a class="navbar-brand" href="#">Navbar</a> -->
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active" href="index.php">Add Image</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="display_img.php">Display Image</a>
						</li>
					</ul>
					<form class="d-flex">
						<input type="search" name="img_search" id="img_search" placeholder="Search Image" class="form-control" >
					</form>
				</div>
			</div>
		</nav>
		<div class="container-fluid">
			<div class="row ml-auto">
				<div class="col-sm-12" id="img_data">
					<?php
						$result = mysqli_query($con,"select * from img_gallery");
						if(mysqli_num_rows($result) > 0)
						{
							// foreach ($result as $row)
							// {
							while ($row = mysqli_fetch_array($result)):
					?>
					<div class="card m-2" style="float: left" >
						<img src="<?php echo 'img/'.$row['img']; ?>" alt="image" title="<?php echo $row['img']; ?>" class="card-img-top" style="height:150px">
						<div class="card-footer">
							<span class="footer_text"><?php echo $row['img']; ?></span>
						</div>
					</div>
					<?php
						endwhile;
						// }
					}
					else
					{
						echo "<h2>No Record Found!</h2>";
					}
					?>
				</div>
			</div>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
							<div class="carousel-inner" >
								<?php 
									if($_SESSION['output']){
										print_r($_SESSION['output']['img']);

										// die();
								?>
								<div class='carousel-item active'>
									<img src="<?php //print_r($_SESSION['output']);?>" title='' class='card-img-top' style='height:100px' class='d-block w-100'>
								</div>
								<?php
									}
								?>
							</div>
							<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Previous</span>
							</button>
							<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Next</span>
							</button>
						</div>
					</div>
					<!-- <div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					</div> -->
				</div>
			</div>
		</div>
		
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script>
			$(document).ready(function(){
				$('#img_search').on("keyup",function(){
					var search_item = $(this).val();
					$.ajax({
						url : "image_search.php",
						type : "POST",
						data : {search:search_item},
						success : function(data){
							$('#img_data').html(data);
						}
					});
				});
			});
			// $('#img_search').onChange({
			// });	
		</script>
	</body>
</html>