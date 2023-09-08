<?php

$db = mysqli_connect("localhost", "root", "root", "shop");

function getcat()
{

	global $db;

	$get_cats = "select * from cate_gories";
	$run_cats = mysqli_query($db, $get_cats);

	while ($row_cats = mysqli_fetch_array($run_cats)) {

		$cate_id = $row_cats["cate_id"];
		$cate_title = $row_cats['cate_title'];
		# "?" is use for get method and single quotes are use because double qotes are outsie 
		echo "<li><a href='index.php?cate=$cate_id'>$cate_title</a></li>";
	}
}


function getbrand()
{

	global $db;

	$get_brand = "select * from brand";
	$run_brand = mysqli_query($db, $get_brand);

	while ($row_brand = mysqli_fetch_array($run_brand)) {

		$brand_id = $row_brand['brand_id'];
		$brand_title = $row_brand['brand_title'];
		# "?" is use for get method and single quotes are use because double qotes are outsie 
		echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
	}
}


function getpro()
{

	global $db;


	if (!isset($_GET['cate'])) {

		if (!isset($_GET['brand'])) {

			// Query
			$get_products = "select * from product order by rand() LIMIT 0,6";
			$run_products = mysqli_query($db, $get_products);
			while ($row_products = mysqli_fetch_array($run_products)) {

				$pro_id = $row_products['product_id'];
				$pro_title = $row_products['product_title'];
				$pro_cate = $row_products['cate_id'];
				$pro_brand = $row_products['brand_id'];
				$pro_desc = $row_products['product_desc'];
				$pro_price = $row_products['product_price'];
				$pro_image = $row_products['product_img1'];

				echo "
							<div id='single_product'>
								<h3>$pro_title</h3>
								<img src='admin_area/product_images/$pro_image' width='180px' height='180px'/><br>
								<p><b>Price: $pro_price PKR</b></p>
								<a href='detail.php?pro_id=$pro_id' style='float:left'>Details</a>
								<a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to cart</button></a> 							
							</div>
							";
			}
		}
	}
}


function getCatpro()
{

	global $db;

	if (isset($_GET['cate'])) {

		$cate_id = $_GET['cate'];

		$get_cat_pro = "select * from product where cate_id='$cate_id'";
		$run_cat_pro = mysqli_query($db, $get_cat_pro);

		$count = mysqli_num_rows($run_cat_pro);
		if ($count == 0) {

			echo "<h2>No products found in this category.";

		}

		while ($row_cat_pro = mysqli_fetch_array($run_cat_pro)) {

			$pro_id = $row_cat_pro['product_id'];
			$pro_title = $row_cat_pro['product_title'];
			$pro_desc = $row_cat_pro['product_desc'];
			$pro_price = $row_cat_pro['product_price'];
			$pro_image = $row_cat_pro['product_img1'];

			echo "
							<div id='single_product'>
								<h3>$pro_title</h3>
								<img src='admin_area/product_images/$pro_image' width='180px' height='180px'/><br>
								<p><b>Price: $pro_price</b></p>
								<a href='detail.php?pro_id=$pro_id' style='float:left'>Details</a>
								<a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to cart</button></a> 							
							</div>
							";

		}
	}
}

function getBrandpro()
{

	global $db;

	if (isset($_GET['brand'])) {

		$brand_id = $_GET['brand'];

		$get_brand_pro = "select * from product where brand_id='$brand_id'";
		$run_brand_pro = mysqli_query($db, $get_brand_pro);

		$count = mysqli_num_rows($run_brand_pro);
		if ($count == 0) {

			echo "<h2>No products found in this category.";

		}

		while ($row_brand_pro = mysqli_fetch_array($run_brand_pro)) {

			$pro_id = $row_brand_pro['product_id'];
			$pro_title = $row_brand_pro['product_title'];
			$pro_desc = $row_brand_pro['product_desc'];
			$pro_price = $row_brand_pro['product_price'];
			$pro_image = $row_brand_pro['product_img1'];

			echo "
							<div id='single_product'>
								<h3>$pro_title</h3>
								<img src='admin_area/product_images/$pro_image' width='180px' height='180px'/><br>
								<p><b>Price: $pro_price</b></p>
								<a href='detail.php?pro_id=$pro_id' style='float:left'>Details</a>
								<a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to cart</button></a> 							
							</div>
							";

		}
	}
}



?>