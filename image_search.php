<?php
	include('config.php');

if(isset($_POST['SEARCH']))
{
	$output = "";
	$img_search_name = $_POST['SEARCH'];

	// $search_keys = explode(',',$img_search_name);
	// $query_str = array();
	// foreach ($search_keys as $keyword) {
		// 	if($keyword){
			// 		$query_str[] = "img LIKE '%{$keyword}%'";
			// 		$query_str[] = "img_tag LIKE '%{$keyword}%'";
		// 	}
	// }
	// $sql = "select * from img_gallery where ".implode(' or ',$query_str);

	$sql = "select * from img_gallery where img LIKE '%{$img_search_name}%' or img_tag LIKE '%{$img_search_name}%'";
	
	$result = mysqli_query($con, $sql) or die("Failed to extract data");
	$img_count = mysqli_num_rows($result);
	
	if(mysqli_num_rows($result) > 0)
	{
		
		$output .= "<div class='modal-header '>
							<h5 class='modal-title' id='exampleModalLabel'>Total Image - $img_count</h5>
							<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
					</div>
					<div class='modal-body'>
							<div id='carouselExampleControls' class='carousel carousel-dark w-100 mx-auto slide' data-bs-touch='false' data-bs-interval='false' data-bs-ride='carousel'>
								<div class='carousel-inner' >";
					$i = 0;
					foreach ($result as $row)
					{
						$active = '';
						if($i == 0)
						{
							$active = 'active';
									}
								$output .= 	"<div class='carousel-item ".$active."' ><img src='img/".$row['img']."' class='d-block w-100' height='600'><div class='carousel-caption d-none d-md-block'><h5>".$row['img']."</h5><p><a href='img/".$row['img']."' class='btn btn-sm btn-secondary' download>download</a></p></div></div>";
						$i++;
					}
				$output .= "</div><button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleControls' data-bs-slide='prev'>
							<span class='carousel-control-prev-icon' aria-hidden='true'></span>
							<span class='visually-hidden'>Previous</span>
							</button>
							<button class='carousel-control-next' type='button' data-bs-target='#carouselExampleControls' data-bs-slide='next'>
							<span class='carousel-control-next-icon' aria-hidden='true'></span>
							<span class='visually-hidden'>Next</span>
							</button>
						</div>
								</div>";
		
		mysqli_close($con);
		echo $output;
	}
	else
	{
		echo "<div class='modal-header '>
					<h5 class='modal-title' id='exampleModalLabel'>No record Found!!</h5>
					<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
			</div>
			<div class='modal-body'>
					<div class='text-center mt-5 text-danger'><h2>No Record Found</h2></div>
			</div>";
	}
	
}
?>
