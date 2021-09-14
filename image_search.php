<?php
	session_start();
	include('config.php');
	$img_search_name = $_POST['search'];
	
	$sql = "select * from img_gallery where img like '%{$img_search_name}%' or img_tag like '%{$img_search_name}%' ";

	$result = mysqli_query($con, $sql) or die("Failed to extract data");
	$img_count = mysqli_num_rows($result);
	$output = "";
	$imagecount = "";
	if(mysqli_num_rows($result) > 0)
	{
		while ($row = mysqli_fetch_array($result)):

			$output .= "<div class='card m-2' style='float: left'>";

			$output .=	"<img src='".'img/'.$row['img']."' title='".$row['img']."' class='card-img-top' style='height:100px' data-bs-toggle='modal' data-bs-target='#exampleModal'>";
			$output .= "<div class='card-footer'><span class='footer_text'>".$row['img']."</span></div></div>";

			$imagecount .= $img_count;


			// $output .= "<div class='carousel-item active'>";

			// $output .=	"<img src='".'img/'.$row['img']."' title='".$row['img']."' class='card-img-top' style='height:100px' class='d-block w-100' data-bs-toggle='modal' data-bs-target='#exampleModal'>";
			// $output .= "</div>";
			// $output .= "<div class='card-footer'><span class='footer_text'>".$row['img']."</span></div></div>";
			// $imagecount .= $img_count;								
			// $output .= "anshuman";
			$_SESSION['output'] = $output;
		endwhile;
		mysqli_close($con);
		echo "$output";
		// echo 
	}
	else
	{
		echo "<h2>No Record Found</h2>";
	}

?>
<!-- binary use for case-sensitive in db -->
