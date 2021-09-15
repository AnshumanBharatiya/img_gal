<?php
	session_start();
	include('config.php');

	if(isset($_POST['submit']))
	{
		// get img_name, img_file, img_tags from form
		$imgfile = $_FILES["img_file"]["name"];
		$imgname = mysqli_real_escape_string($con, $_POST['img_name']);
		$img_tag = mysqli_real_escape_string($con, $_POST['img_tags']);

		// echo "<pre>";
		// print_r($imgfile);
		// die();

		// get the image extension
		$extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));

		// allowed extensions
		$allowed_extensions = array(".jpg","jpeg",".png",".gif");
		// Validation for allowed extensions .in_array() function searches an array for a specific value.

		//rename the image file
		$newimgfile = $imgname.$extension;

		// fetch all image and display
		$img_fetch = mysqli_query($con, "select * from img_gallery where img='$newimgfile' ");
		$row_count = mysqli_num_rows($img_fetch);

		$error_msg1 = $error_msg2 = $error_msg3 = $msg = "";

		$arr = ['image_file_name'=> $imgfile, 'image_name' => $imgname, 'image_tag' => $img_tag];

		if($row_count > 0 || file_exists("img/".$newimgfile))
		{
			// echo "<script>alert('This image name already exists!!!');</script>";
			$error_msg1 = "This image name Already exists!!!";
			$_SESSION['error_msg1'] = $error_msg1;
			$_SESSION['data'] = $arr;
			header('location:index.php');
		}
		else
		{
			if(!in_array($extension,$allowed_extensions))
			{
				// echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
				$error_msg2 = "Invalid format. Only jpg / jpeg/ png /gif format allowed";
				$_SESSION['error_msg2'] = $error_msg2;
				$_SESSION['data'] = $arr;
				header('location:index.php');
			}
			else
			{				
				// Code for move image into directory
				move_uploaded_file($_FILES["img_file"]["tmp_name"],"img/".$newimgfile);

				$query = mysqli_query($con,"insert into img_gallery(img, img_tag) values('$newimgfile', '$img_tag')");
				if($query)
				{
					// echo "<script>alert('Successfully added');</script>";
					$msg = "Image Successfully Added";
					$_SESSION['msg'] = $msg;
					$_SESSION['data'] = $arr;
					header('location:index.php');
				}
				else
				{
					// echo "<script>alert('Something went wrong . Please try again.');</script>";
					$error_msg3 = "Something went wrong . Please try again";
					$_SESSION['error_msg3'] = $error_msg3;
					$_SESSION['data'] = $arr;
					header('location:index.php');
				}
			}
		}
	}
?>
