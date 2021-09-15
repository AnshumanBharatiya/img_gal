<?php 
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
			.bg-secondary{
				height: 90vh!important;
				background: rgba(0, 0, 0, .3)!important;
			}
			.nav-link{
				font-weight: bold;
			}
			label,.form-control{
				font-weight: bold;
				font-size: 20px!important;
			}
			.msg{
				font-weight: bold;
				font-size: 23px;
				color: forestgreen;
			}
			.error_msg{
				font-weight: bold;
				font-size: 23px;
				color: indianred;
			}
		</style>
	</head>
	<body>
		<div class="main_content">
			<nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
				<div class="container">
					<a class="navbar-brand" href="#"></a>
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
					</div>
				</div>
			</nav>
			<div class="container bg-secondary img_form">
				<div class="py-5 ">
					<h1 class="mb-4 text-center">Upload Image</h1>
					<form method="post" action="insert_img.php" enctype="multipart/form-data">
						<div class="row">
							<div class="col-sm-4 m-auto">
								<div class="card-box">
									<input type="file" name="img_file" id="img_file" class="form-control" accept="image/*" required>
									<span> <?php if(isset($_SESSION['data'])){echo 'Image -'.$_SESSION['data']['image_file_name'];}?></span>
								</div>
							</div>
						</div>
						<div class="row my-3">
							<div class="col-sm-4 m-auto">
								<div class="card-box">
									<label for="img_name" class="form-label">New Image Name</label>
									<input type="text" name="img_name" class="form-control"  required placeholder="Enter Image Name" value="<?php if(isset($_SESSION['data'])){echo $_SESSION['data']['image_name'];}?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4 m-auto">
								<div class="card-box">
									<label for="img_tags" class="form-label">Add Tags (Separate with , )</label>
									<textarea class="form-control" id="img_tags" name="img_tags" rows="3" required 	style="resize: none;"><?php if(isset($_SESSION['data'])){echo $_SESSION['data']['image_tag'];}?></textarea>
								</div>
							</div>
						</div>
						<div class="row my-3">
							<div class="col-sm-4 m-auto">
								<input type="submit" value="Upload" name="submit" class="btn btn-primary">
							</div>
						</div>
						<div class="row my-3">
							<div class="col-sm-4 m-auto">
								<?php
									if(isset($_SESSION['msg']))
									{
										echo "<div class='msg' role='alert'>". $_SESSION['msg'] ."</div>";
										unset($_SESSION['msg']);
									}
									else if(isset($_SESSION['error_msg1'])){
										echo "<div class='error_msg' role='alert'>". $_SESSION['error_msg1'] ."</div>";
										unset($_SESSION['error_msg1']);
									}
									else if(isset($_SESSION['error_msg2'])){
										echo "<div class='error_msg' role='alert'>". $_SESSION['error_msg2'] ."</div>";
										unset($_SESSION['error_msg2']);
									}
									else if(isset($_SESSION['error_msg3'])){
										echo "<div class='error_msg' role='alert'>". $_SESSION['error_msg3'] ."</div>";
										unset($_SESSION['error_msg3']);
									}
									else{
										$error_msg1 = $error_msg2 = $error_msg3 = $msg = "";
									}
								?>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
	</body>
</html>
